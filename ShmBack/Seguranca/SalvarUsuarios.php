<?php


header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type");

include "../CheckLogin.php";
$seg = seguranca::check($_GET['tokenUsuario'],$_GET['token'],'3');
    
if ( ! session_id() ) @ session_start();

$data=json_decode(file_get_contents('php://input'),1);
print_r($data);

if(isset($_GET['check'])){
    $sql = "select COUNT(*) AS qtd
            FROM SHM_Usuario
            WHERE fl_excluido <> 1 AND LCASE(TRIM(email)) = LCASE(TRIM('" . $_GET['check'] . "'));";
    
    $connection = new Conn();    
    $db = $connection::getConn(); 
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
    $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($linha);

    exit;  
}

if($data["id"] == 0){
    $sql = "select COUNT(*) AS qtd
            FROM SHM_Usuario
            WHERE fl_excluido <> 1 AND LCASE(TRIM(email)) = LCASE(TRIM('" . $data['email'] . "'));";
    
    $connection = new Conn();    
    $db = $connection::getConn(); 
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
    $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);
    
    if($linha[0]['qtd'] > 0){
        exit;
    }
    
    $novaSenha = '';
    while(strlen($novaSenha) < 10){
        $novaSenha .= random_int(0,10);        
    }
    $novaSenha64 = base64_encode($novaSenha); 

    $sql = "INSERT INTO `SHM_Usuario`
            (`nome`,
            `senha`,
            `email`,
            `grupo`,
            `conta`,
            `recuperar`,
            `fl_bloqueado`,fl_excluido,
            `email64`)
            VALUES
            ('" . $data['nome'] . "',
            '" . $novaSenha64 . "',
            '" . $data['email'] . "',
            " . $data['idGrupo'] . ",
            20,
            '" . $novaSenha64 . "',
            " . $data['fl_bloqueado'] . ",0,
            '" . base64_encode(strtolower($data['email'])) . "');";
    
//    echo $sql;
//    exit;
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    $connection = new Conn();    
    $db = $connection::getConn(); 
    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
    
    exit;
}
else{
    $senha = '';
    
    if($data['statusSenha'] == 2){
        $novaSenha = base64_encode($data['senha']);
        $senha = " senha = '" . $novaSenha . "', ";
    }else if($data['statusSenha'] == 1){
        $novaSenha = '';
        while(strlen($novaSenha) < 10){
            $novaSenha .= random_int(0,10);        
        }
        $novaSenha64 = base64_encode($novaSenha);        
        $senha = " recuperar = '" . $novaSenha64 . "', ";
        
        $sql = "select email
            FROM SHM_Usuario
            WHERE id = " . $data['id'] . ";";
    
        $connection = new Conn();    
        $db = $connection::getConn(); 
        $retTokens = $db->prepare($sql);    
        $retTokens->execute();
        $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);
        
        $email = $linha[0]['email'];
        $nome = $data['nome'];
        
        $connection = new Conn();
            $sql = "SELECT * FROM `SHM_Config`;";
            $db = $connection::getConn();        
            $retTokens = $db->prepare($sql);
            $retTokens->execute();
            $linha = $retTokens->fetchAll(PDO::FETCH_ASSOC);

            $SMTPSecure = $linha[0]["SMTPSecure"];
            $Host = $linha[0]["HostServidor"];
            $SMTPAuth = $linha[0]["SMTPAuth"];
            $Port = $linha[0]["PortServidor"];
            $Username = $linha[0]["Username"];
            $Password = $linha[0]["PasswordServidor"];
            $IdentName = $linha[0]["IdentName"];

            $assuntoTmp = $linha[0]["AssuntoEmailRecuperar"];
            $corpoTmp = html_entity_decode($linha[0]["ModeloEmailRecuperar"]);

            $destinatario = $email;
            $assunto = $assuntoTmp;
            $msn = $corpoTmp;

            $assuntoTmp = str_replace('&lt;%NOME%&gt;', $nome, $assuntoTmp);
            $corpoTmp = str_replace('&lt;%NOME%&gt;', $nome, $corpoTmp);

            $assuntoTmp = str_replace('&lt;%USUARIO%&gt;', $email, $assuntoTmp);
            $corpoTmp = str_replace('&lt;%USUARIO%&gt;', $email, $corpoTmp);

            $corpoTmp = str_replace('&lt;%SENHA%&gt;', $novaSenha, $corpoTmp);

            try{
                   $mail = new \PHPMailer\PHPMailer\PHPMailer();
                   $mail->CharSet = "UTF-8";
                   $mail->IsSMTP();

                   $mail->Host = $Host; 
                   if($SMTPAuth=="1"){
                      $mail->SMTPAuth   = true;  
                   } else {
                      $mail->SMTPAuth   = false;  
                   }    

                   $mail->SMTPSecure = $SMTPSecure;
                   $mail->Port = $Port; 
                   $mail->Username = $Username; 
                   $mail->Password = $Password; 
                   $mail->SetFrom($Username, $IdentName); 
                   $mail->AddReplyTo($Username, $IdentName); 
                   $mail->Subject = $assuntoTmp;

                   $mail->AddAddress($email, $email);

                   $mail->IsHTML(true);  

                   $mail->Body = $corpoTmp;

                   $mail->Send();
              }catch (phpmailerException $e) {
                echo $e->errorMessage();
              }
        }
    
    
    $sql = "UPDATE `SHM_Usuario`
                SET
                `nome` = '" . $data['nome']. "', " . $senha . "
                `grupo` = " . $data['idGrupo']. ",
                `fl_bloqueado` = " . $data['fl_bloqueado']. "
                WHERE `id` = " . $data['id']. ";";   
    
    $connection = new Conn();    
    $db = $connection::getConn(); 

    $retTokens = $db->prepare($sql);    
    $retTokens->execute();
}


//echo $sql;
//exit;



