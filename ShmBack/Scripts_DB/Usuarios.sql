-- ------------------------------------ Usuários ------------------------------------------------
#Perfil
SELECT usu.id, usu.nome, usu.cpf, usu.endereco, usu.complemento, usu.bairro, usu.cidade, usu.estado, usu.email, group_concat(DISTINCT utel.telefone SEPARATOR ", ") AS telefones
FROM shm_dev.SHM_Usuarios AS usu
	JOIN shm_dev.SHM_UsuariosTelefone AS utel
	ON usu.id = utel.usuario
GROUP BY (usu.id);

#Insert
INSERT INTO shm_dev.SHM_Usuarios VALUES
(NULL, 'Suelen Cristina', '12983691287', 'Endereço 1', 'complemento 1', 'bairro 1', 'cidade 1', 'RJ', 'suelen@gmail'),
(NULL, 'Fulano de tal', '8237442389', 'Endereço 2', 'complemento 2', 'bairro 2', 'cidade 2', 'SP', 'fulano@gmail');

#Update
UPDATE shm_dev.SHM_Usuarios SET estado = 'SP' WHERE id = 1;

#Delete em usuário
DELETE FROM shm_dev.SHM_Usuarios WHERE id = 2;

#Insert Telefone
INSERT INTO shm_dev.SHM_UsuariosTelefone VALUES
(NULL,1,'2198888881'),
(NULL,1,'2198888882'),
(NULL,2,'2198888883'),
(NULL,2,'2198888884');

#Update Telefone
UPDATE shm_dev.SHM_UsuariosTelefone SET Telefone = '21981682937' WHERE id = 1;

#Delete Telefone
DELETE FROM shm_dev.SHM_UsuariosTelefone WHERE id = 1;