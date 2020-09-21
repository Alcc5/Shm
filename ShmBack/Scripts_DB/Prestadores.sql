#Lista de Especialidades
INSERT INTO SHM_Especializacoes VALUE
('1', 'Pediatra');


#insert dos prestadores nos pontos de atendimento
INSERT INTO SHM_PontosAtendPrestadores VALUE
#('id ponto', 'id prestador', ativo)
('1', '1',DEFAULT),
('1', '2',DEFAULT),
('1', '3',DEFAULT),
('2', '1',DEFAULT),
('2', '3',DEFAULT),
('4', '4',DEFAULT);


#insert dos prestadores nos pontos de atendimento
INSERT INTO SHM_Prestadores VALUE
(NULL, DEFAULT, 'CPF','CRM', 'Nome3', 'email3', 'Rua 3', 'comp 3', 'Bairro 3', 'Cidade 3', 'RJ','CEP');

#Novo Telefone do Prestador
INSERT INTO SHM_PrestadoresTelefone VALUE
('1', 'TELEFONE');

#Update de Telefone

UPDATE SHM_PrestadoresTelefone SET telefone = 'TELEFONE' where id_prestador = 'id do prestador';

#Delete de Telefone

DELETE FROM SHM_PrestadoresTelefone WHERE id_prestador = 'id do prestador' AND telefone = 'TELEFONE';

#insert de especialidades
INSERT INTO SHM_PrestadoresEsp VALUE
#('id prestador', 'id especialidade')
('1', '2'),
('1', '3'),
('2', '4'),
('2', '2'),
('3', '2'),
('1', '4');





# Lista de prestadores

SELECT p.nome, p.crm, p.cidade,
GROUP_CONCAT(DISTINCT esp.especializacao SEPARATOR ", ") AS Especializacao,
GROUP_CONCAT(DISTINCT c.nomeFantasia SEPARATOR ", ") AS Clientes,
GROUP_CONCAT(DISTINCT pa.razaoSocial SEPARATOR ", ") AS Pontos
FROM SHM_Prestadores AS p 
JOIN SHM_PrestadoresEsp AS pes
ON p.ID = pes.id_prestador
JOIN SHM_Especializacoes AS esp
ON pes.id_esp = esp.id
JOIN SHM_ClientesPrestadores AS cpre
ON cpre.id_prestador = p.id
JOIN SHM_Clientes AS c
ON c.id = cpre.id_cliente
JOIN SHM_PontosAtendPrestadores AS pp
ON pp.id_prestador = p.id
JOIN SHM_PontosAtend AS pa
ON pp.id_ponto = pa.id
WHERE esp.especializacao LIKE '%ESPECIALIZACAO%' AND p.cidade = 'CIDADE' 
AND pa.razaoSocial = 'RAZAO SOCIAL DO POSTO' AND c.nomeFantasia = 'NOME FANTASIA DO CLIENTE'
AND p.nome = 'NOME DO PRESTADOR' AND p.crm = 'CRM DO PRESTADOR';


#perfil do prestador

SELECT pre.nome,pre.crm, pre.cpf, pre.endereco, pre.complemento, pre.bairro, pre.cidade, pre.estado, pre.email, 
GROUP_CONCAT(DISTINCT esp.especializacao SEPARATOR ", ") AS Especializacao,
GROUP_CONCAT(DISTINCT pt.telefone SEPARATOR ", ") AS Telefone,
GROUP_CONCAT(DISTINCT pa.nomeFantasia SEPARATOR ", ") AS Pontos
 FROM SHM_Prestadores AS pre
 JOIN SHM_PrestadoresEsp AS pes
ON pre.id = pes.id_prestador
JOIN SHM_Especializacoes AS esp
ON pes.id_esp = esp.id
JOIN SHM_PrestadoresTelefone AS pt
ON pre.id = pt.id_prestador
JOIN SHM_PontosAtendPrestadores as pap
ON pre.id = pap.id_prestador
JOIN SHM_PontosAtend as pa
ON pa.id = pap.id_ponto
WHERE pre.id = 'ID DO PRESTADOR';