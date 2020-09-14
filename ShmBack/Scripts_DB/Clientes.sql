-- ----------------------------------------------Clientes-------------------------------------------------------------
#Lista Clientes
SELECT nomeFantasia, cidade, ativo FROM shm_dev.SHM_Cliente;

#Novo Cliente
INSERT INTO shm_dev.SHM_Cliente VALUES
(NULL, 'Cliente 1', 'Razao - Cliente 1', 'CNPJ1', 'Rua 1', 'comp 1', 'Bairro 1', 'Cidade 1', 'SP','1','1'),
(NULL, 'Cliente 2', 'Razao - Cliente 2', 'CNPJ2', 'Rua 2', 'comp 2', 'Bairro 2', 'Cidade 2', 'RJ','2','0');


#Novo Telefone de Cliente
INSERT INTO shm_dev.SHM_ClienteTelefone VALUES(DEFAULT,'1', '210937829');

#Update de Telefone
UPDATE shm_dev.SHM_ClienteTelefone SET Telefone = '21981682937' WHERE id = '1';

#Delete de Telefone
DELETE FROM shm_dev.SHM_ClienteTelefone WHERE id = '1';

#Insert Pontos Atendimento
INSERT INTO shm_dev.SHM_PontoAtend VALUES
(NULL, 'Ponto 1', 'Razao - ponto 1', 'CNPJ1', 'Rua 1', 'comp 1', 'Bairro 1', 'Cidade 1', 'SP','1','1'),
(NULL, 'Ponto 2', 'Razao - ponto 2', 'CNPJ2', 'Rua 2', 'comp 2', 'Bairro 2', 'Cidade 2', 'RJ','2','2');

#Insert Ponto Atendimento Cliente
INSERT INTO shm_dev.SHM_ClientePonto VALUES
(NULL,'1', '1'),
(NULL,'1', '2'),
(NULL,'1', '3'),
(NULL,'2', '1'),
(NULL,'2', '3');

#Insert Cliente Prestador
INSERT INTO shm_dev.SHM_ClientePrestador VALUES
(NULL,'1', '1'),
(NULL,'1', '2'),
(NULL,'1', '3'),
(NULL,'2', '1'),
(NULL,'2', '3');

#Ficha Cliente
SELECT c.nomeFantasia, c.razaoSocial, c.cnpj, c.endereco, c.complemento, c.bairro, c.cidade, c.estado, c.ativo,
group_concat(distinct pa.nomeFantasia separator ", ") AS nomePonto,
group_concat(distinct pre.nome separator ", ") AS prestadores
 FROM shm_dev.SHM_Cliente AS c 
	JOIN shm_dev.SHM_ClientePonto AS cp
		ON c.id = cp.cliente
	JOIN shm_dev.SHM_PontoAtend AS pa
		ON cp.ponto = pa.id
	JOIN shm_dev.SHM_ClientePrestador AS cpre
		ON c.id = cpre.cliente
	JOIN shm_dev.SHM_Prestadores AS pre
		ON cpre.prestador = pre.id
GROUP BY(c.id);
 
#Pegar crm de cada medico da lista
SELECT crm FROM shm_dev.SHM_Prestadores WHERE id = 1;