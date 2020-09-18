-- ----------------------------------------------Clientes-------------------------------------------------------------
# lista de clientes

SELECT nomeFantasia,cidade, ativo FROM shm_dev.SHM_Clientes;

#Novo Cliente
INSERT INTO shm_dev.SHM_Clientes VALUE
(NULL, DEFAULT,'CNPJ1','Cliente 1', 'Razao - Cliente 1',  'Rua 1', 'comp 1', 'Bairro 1', 'Cidade 1', 'SP','24435647'),
(NULL, DEFAULT,'CNPJ2','Cliente 2', 'Razao - Cliente 2',  'Rua 2', 'comp 2', 'Bairro 2', 'Cidade 2', 'RJ','24433726');

#Novo Telefone de Cliente
INSERT INTO SHM_ClientesTelefone VALUE
('1', '210937829');

#Update de Telefone

UPDATE SHM_ClientesTelefone SET telefone = '21981682937' WHERE id_cliente = '1';

#Delete de Telefone

DELETE FROM SHM_ClientesTelefone WHERE id_cliente = 'id do cliente' AND telefone = 'o numero pra apagar aqui';

#insert ponto de atendimento no cliente

INSERT INTO SHM_PontosAtend value
(NULL, DEFAULT,'CNPJ1','Ponto 1', 'Razao - ponto 1',  'Rua 1', 'comp 1', 'Bairro 1', 'Cidade 1', 'SP','CEP'),
(NULL, DEFAULT,'CNPJ2','Ponto 2', 'Razao - ponto 2',  'Rua 2', 'comp 2', 'Bairro 2', 'Cidade 2', 'RJ','CEP');

INSERT INTO SHM_ClientesPontosAtend VALUE
#('id cliente', 'id ponto', ativo)
('17', '4',DEFAULT),
('18', '5',DEFAULT);



#Insert de prestador no cliente
INSERT INTO SHM_ClientesPrestadores VALUE
#('id cliente', 'id prestador',ativo)
('17', '4',DEFAULT),
('18','4',DEFAULT),
('21','4',DEFAULT);


#Ficha do cliente

SELECT c.nomeFantasia, c.razaoSocial, c.cnpj, c.endereco, c.complemento, c.bairro, c.cidade, c.estado, c.ativo,
GROUP_CONCAT(DISTINCT pa.nomeFantasia SEPARATOR ", ") AS Nome_ponto,
GROUP_CONCAT(DISTINCT pre.nome SEPARATOR ", ") AS Prestadores
 FROM SHM_Clientes AS c 
    JOIN SHM_ClientesPontosAtend AS cp
        ON c.id = cp.id_cliente
    JOIN SHM_PontosAtend AS pa
        ON cp.id_ponto = pa.id
    JOIN SHM_ClientesPrestadores AS cpre
        ON c.id = cpre.id_cliente
    JOIN SHM_Prestadores AS pre
        ON cpre.id_prestador = pre.id
WHERE c.id = 'id do cliente';
 
#pegar o crm de cada medico da lista
SELECT crm FROM SHM_Prestadores WHERE id = '1';