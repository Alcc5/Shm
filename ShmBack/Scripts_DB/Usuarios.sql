# menu

SELECT Nome,ID FROM shm_dev.SHM_Usuarios;

-- ------------------------------------ Usuários ------------------------------------------------
#Novo usuário
INSERT INTO SHM_Usuarios VALUE
(NULL, DEFAULT, '12983691287', 'Suelen Cristina','Endereço 1', 'complemento 1', 'bairro 1', 'cidade 1', 'RJ', 'suelen@gmail', '24413255'),
(NULL, DEFAULT, '8237442389','Fulano de tal', 'Endereço 2', 'complemento 2', 'bairro 2', 'cidade 2', 'SP', 'fulano@gmail', '26435866');


# insert de telefone

INSERT INTO SHM_UsuariosTelefone VALUE
('1','2198888881'),
('2','2198888882'),
('1','2198888883');

#Perfil

SELECT usu.ID, usu.Nome, usu.CPF, usu.Endereco, usu.Complemento, usu.Bairro, usu.Cidade, usu.Estado, usu.email,
group_concat(DISTINCT utel.Telefone SEPARATOR ", ") AS Telefones
FROM shm_dev.SHM_Usuarios AS usu
    JOIN shm_dev.SHM_UsuariosTelefone AS utel  
        ON usu.ID = utel.id_usuario
WHERE usu.ID = '1';

# update em usuário
UPDATE SHM_Usuarios SET Estado = 'RJ' WHERE ID = '1';

# delete em usuário

DELETE FROM SHM_Usuarios WHERE ID = '2';

#Update de Telefone

UPDATE SHM_UsuariosTelefone SET Telefone = '21981682937' WHERE id = '1';

#Delete de Telefone

DELETE FROM SHM_UsuariosTelefone WHERE id = '1';