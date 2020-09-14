import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Grupo } from '../grupos/grupo';
import { Usuario } from '../usuarios/usuarios';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertController } from '@ionic/angular';


@Component({
  selector: 'app-usuarios-formulario',
  templateUrl: './usuarios-formulario.page.html',
  styleUrls: ['./usuarios-formulario.page.scss'],
})
export class UsuariosFormularioPage implements OnInit {

  constructor(private route: ActivatedRoute, private router: Router, private httpClient: HttpClient, public alertController: AlertController) { }

  grupos: Grupo[];
  usuario: Usuario = {id:0,nome:'',idGrupo: 0, grupo: '', fl_bloqueado: 0, email: '', statusLogin: '', statusSenha: 0, senha: ''};
  idUsuario: string = '0';


  defaultHref = '/usuarios';

  async ionViewDidEnter() { 
    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}

    this.usuario = {id:0,nome:'',idGrupo: 0, grupo: '', fl_bloqueado: 0, email: '', statusLogin: '', statusSenha: 0, senha: ''};

    this.idUsuario=this.route.snapshot.paramMap.get('id');

    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/Grupos.php?token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    await this.httpClient.get<Grupo[]>(urlBack,httpOptions).subscribe((lista: Grupo[]) => {
      this.grupos = lista;     
      
      if(this.idUsuario!='0'){
        urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
        urlBack = urlBack + 'Seguranca/Usuarios.php?id=' + this.idUsuario + '&token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
        this.httpClient.get<Usuario>(urlBack,httpOptions).subscribe((lista: Usuario) => {
          this.usuario = lista[0];
          },error  => {
            if(error['error']['text'] == 'LOGIN'){
              document.getElementById('checkLogin').click();
            }
          });
      }

    },error  => {
      if(error['error']['text'] == 'LOGIN'){
        document.getElementById('checkLogin').click();
      }
    });

    
    

    
  }

  changeSenha(){
    this.usuario.statusSenha = parseInt((<HTMLInputElement>document.getElementById('SenhaStr')).value.toString().trim());
  }

  excluirSim(){
    const httpOptions = {
      headers: new HttpHeaders({ 
        'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
    })}
    
    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
    urlBack = urlBack + 'Seguranca/ExcluirUsuario.php?id=' + this.idUsuario + '&token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
    this.httpClient.get(urlBack,httpOptions).subscribe();
    this.router.navigate(['/usuarios']);
}

async excluir(){
  const alert = await this.alertController.create({
    cssClass: 'my-custom-class',
    header: 'Deseja realmente excluir o Usuário?',
    message: 'Excluir Usuário?',
    buttons: [
      {
        text: 'Não',
        role: 'cancel'
      },
      {
        text: 'Sim',
        handler: () => {
          this.excluirSim();
        }
      }
    ]
  });      
  await alert.present();
  return;
}

  async salvar(){
  var nome = (<HTMLInputElement>document.getElementById('Nome')).value.toString().trim();  
  var bloqueado = 1;
  if((<HTMLInputElement>document.getElementById('Ativo')).checked)
  {
    bloqueado = 0;
  }  
  var email = (<HTMLInputElement>document.getElementById('Email')).value.toString().trim();  
  var grupo = (<HTMLInputElement>document.getElementById('Grupo')).value.toString().trim();  
  var statusSenha = '0';
  
  if(this.idUsuario!='0'){
    statusSenha = (<HTMLInputElement>document.getElementById('SenhaStr')).value.toString().trim();  
  }

  var senha = '';
  if(statusSenha == '2'){
    senha = (<HTMLInputElement>document.getElementById('Senha')).value.toString().trim();  
  }

  //alert(nome);
  this.usuario.nome = nome;
  this.usuario.fl_bloqueado = bloqueado;
  this.usuario.email = email;
  this.usuario.idGrupo = parseInt(grupo);
  this.usuario.senha = senha;
  this.usuario.statusSenha = parseInt(statusSenha);

  if(this.usuario.nome == ''){
    const alert = await this.alertController.create({
      cssClass: 'my-custom-class',
      header: 'Não foi possível salvar o Usuário',
      message: 'Informe o nome do Usuário.',
      buttons: ['OK']
    });      
    await alert.present();
    return;
  }

  if(this.usuario.statusSenha == 2){
    if(this.usuario.senha == ''){
      const alert = await this.alertController.create({
        cssClass: 'my-custom-class',
        header: 'Não foi possível salvar o Usuário',
        message: 'Informe a Nova Senha do Usuário.',
        buttons: ['OK']
      });      
      await alert.present();
      return;
    }
  }



  if(this.usuario.id == 0){
    if(this.usuario.email == ''){
      const alert = await this.alertController.create({
        cssClass: 'my-custom-class',
        header: 'Não foi possível salvar o Usuário',
        message: 'Informe o Email do Usuário.',
        buttons: ['OK']
      });      
      await alert.present();
      return;
    }
    else{

    }
  }

  if(this.usuario.idGrupo == 0){
      const alert = await this.alertController.create({
        cssClass: 'my-custom-class',
        header: 'Não foi possível salvar o Usuário',
        message: 'Informe o Grupo do Usuário.',
        buttons: ['OK']
      });      
      await alert.present();
      return;    
  }

  const httpOptions = {
    headers: new HttpHeaders({ 
      'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9'
  })}

  if(this.usuario.id == 0){

    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.usuario.email))
    {
      const alert = await this.alertController.create({
        cssClass: 'my-custom-class',
        header: 'Não foi possível salvar o Usuário',
        message: 'Email Inválido.',
        buttons: ['OK']
      });      
      await alert.present();
      return;
    }

    var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
      urlBack = urlBack + 'Seguranca/SalvarUsuarios.php?check=' + this.usuario.email + '&token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
      await this.httpClient.get(urlBack,httpOptions).subscribe(async data => {
        if(data[0]['qtd']>0){
            const alert = await this.alertController.create({
              cssClass: 'my-custom-class',
              header: 'Não foi possível salvar o Usuário',
              message: 'Já existe um usuário atribuído à esse Email.',
              buttons: ['OK']
            });      
            await alert.present();
            return;
        }
        else{
          var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
          urlBack = urlBack + 'Seguranca/SalvarUsuarios.php?token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
          this.httpClient.post(urlBack,this.usuario,httpOptions).subscribe(data => {
            console.log(data['_body']);
          },error  => {
            if(error['error']['text'] == 'LOGIN'){
              document.getElementById('checkLogin').click();
            }
          });

          this.router.navigate(['/usuarios']);
        }
      },error  => {
        if(error['error']['text'] == 'LOGIN'){
          document.getElementById('checkLogin').click();
        }
      });
    }
    else{
        var urlBack = document.getElementsByTagName('baseUrl')[0].getAttribute('urlBack');
        urlBack = urlBack + 'Seguranca/SalvarUsuarios.php?token=' + sessionStorage.getItem('token') + '&tokenUsuario=' + sessionStorage.getItem('usuario');
        this.httpClient.post(urlBack,this.usuario,httpOptions).subscribe(data => {
          console.log(data['_body']);
        },error  => {
          if(error['error']['text'] == 'LOGIN'){
            document.getElementById('checkLogin').click();
          }
        });

        this.router.navigate(['/usuarios']);
    }
}

  ngOnInit() {
  }

}
