USE shm_dev;

--   --------------------------------------Ativo Cliente ------------------------------
DELIMITER $$
CREATE PROCEDURE shm_dev.SP_ativaCliente(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_Clientes WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo = 1 THEN
	UPDATE SHM_Clientes SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_Clientes SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;


-- CALL SP_ativaCliente('ID do cliente');

-- -----------------------------------------Ativo Prestador--------------------------------
DELIMITER $$
CREATE PROCEDURE SP_ativaPrestador(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_Prestadores WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo = 1 THEN
	UPDATE SHM_Prestadores SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_Prestadores SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;

-- CALL SP_ativaPrestador('ID do prestador');

-- -------------------------------------------------Ativo Ponto de Atendimento --------------------------------------

DELIMITER $$
CREATE PROCEDURE SP_ativaPonto(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_PontosAtend WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo = 1 THEN
	UPDATE SHM_PontosAtend SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_PontosAtend SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;

-- CALL SP_ativaPonto('ID DO PONTO');

-- -------------------------------------------------Ativo Usuários --------------------------------------

DELIMITER $$
CREATE PROCEDURE SP_ativaUsuario(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_Usuarios WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo = 1 THEN
	UPDATE SHM_Usuarios SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_Usuarios SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;

-- CALL SP_ativaUsuario('ID DO USUARIO');

-- -------------------------------------------------Ativo Cliente/Ponto --------------------------------------

DELIMITER $$
CREATE PROCEDURE SP_ativaClientePonto(IN CLIENTE int(11), IN PONTO int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_ClientesPontosAtend WHERE id_cliente = CLIENTE AND id_ponto = PONTO INTO b_Ativo;
IF b_Ativo = 1 THEN
	UPDATE SHM_ClientesPontosAtend SET ativo = '0' WHERE id_cliente = CLIENTE AND id_ponto = PONTO;
ELSE 
	UPDATE SHM_ClientesPontosAtend SET ativo = '1' WHERE id_cliente = CLIENTE AND id_ponto = PONTO;
END IF;   
END$$

DELIMITER ;

-- CALL SP_ativaClientePonto('ID DO CLIENTE', 'ID DO PONTO');

-- -------------------------------------------------Ativo Cliente/Prestador --------------------------------------

DELIMITER $$
CREATE PROCEDURE SP_ativaClientePrestador(IN CLIENTE int(11), IN PRESTADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_ClientesPrestadores WHERE id_cliente = CLIENTE AND id_prestador = PRESTADOR INTO b_Ativo;
IF b_Ativo = 1 THEN
	UPDATE SHM_ClientesPrestadores SET ativo = '0' WHERE id_cliente = CLIENTE AND id_prestador = PRESTADOR;
ELSE 
	UPDATE SHM_ClientesPrestadores SET ativo = '1' WHERE id_cliente = CLIENTE AND id_prestador = PRESTADOR;
END IF;    
END$$

DELIMITER ;


-- CALL SP_ativaClientePrestador(ID CLIENTE, ID PRESTADOR);

-- -------------------------------------------------Ativo Ponto / Prestador --------------------------------------

DELIMITER $$
CREATE PROCEDURE SP_ativaPontoPrestador(IN PONTO int(11), IN PRESTADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_PontosAtendPrestadores WHERE id_ponto = PONTO AND id_prestador = PRESTADOR INTO b_Ativo;
IF b_Ativo = 1 THEN
	UPDATE SHM_PontosAtendPrestadores SET ativo = '0' WHERE id_ponto = PONTO AND id_prestador = PRESTADOR;
ELSE 
	UPDATE SHM_PontosAtendPrestadores SET ativo = '1' WHERE id_ponto = PONTO AND id_prestador = PRESTADOR;
END IF;    
END$$

DELIMITER ;


-- CALL SP_ativaPontoPrestador(ID PONTO, ID PRESTADOR);