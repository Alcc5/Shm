--   --------------------------------------Ativo Cliente ------------------------------
DELIMITER $$
CREATE PROCEDURE SP_ativaCliente(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_Clientes WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo > 0 THEN
	UPDATE SHM_Clientes SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_Clientes SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;


CALL SP_ativaCliente('ID do cliente');

-- -----------------------------------------Ativo Prestador--------------------------------
DELIMITER $$
CREATE PROCEDURE SP_ativaPrestador(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_Prestadores WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo > 0 THEN
	UPDATE SHM_Prestadores SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_Prestadores SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;

CALL SP_ativaPrestador('ID do prestador');

-- -------------------------------------------------Ativo Ponto de Atendimento --------------------------------------

DELIMITER $$
CREATE PROCEDURE SP_ativaPonto(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_PontosAtend WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo > 0 THEN
	UPDATE SHM_PontosAtend SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_PontosAtend SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;

CALL SP_ativaPonto('ID DO PONTO');

-- -------------------------------------------------Ativo Usuários --------------------------------------

DELIMITER $$
CREATE PROCEDURE SP_ativaUsuario(IN IDENTIFICADOR int(11))
BEGIN
DECLARE b_Ativo tinyint(1);
SELECT ativo FROM SHM_Usuarios WHERE id = IDENTIFICADOR INTO b_Ativo;
IF b_Ativo > 0 THEN
	UPDATE SHM_Usuarios SET ativo = '0' WHERE id = IDENTIFICADOR;
ELSE 
	UPDATE SHM_Usuarios SET ativo = '1' WHERE id = IDENTIFICADOR;
END IF;    
END$$

DELIMITER ;

CALL SP_ativaUsuario('ID DO USUARIO');