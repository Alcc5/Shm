-- -----------------------------------------------PRESTADORES-------------------------------------------------------------------
#Insert Prestadores Pontos Atendimento
INSERT INTO shm_dev.SHM_PontoPrestador VALUES
(NULL,'1', '1'),
(NULL,'1', '2'),
(NULL,'1', '3'),
(NULL,'2', '1'),
(NULL,'2', '3');

#Insert Prestadores
INSERT INTO shm_dev.SHM_Prestadores VALUES
(NULL, 'Nome', 'CRM', 'CPF', 'Rua 1', 'comp 1', 'Bairro 1', 'Cidade 1', 'SP', 'email');

#Novo Telefone Prestador
INSERT INTO shm_dev.SHM_PrestadoresTelefones VALUES
(NULL, '1', '210937829');

#Update Telefone Prestador
UPDATE shm_dev.SHM_PrestadoresTelefones SET telefone = '21981682937' WHERE id = '1';

#Delete Telefone
DELETE FROM shm_dev.SHM_PrestadoresTelefones WHERE id = '1';

#Insert Especialidades Prestador
INSERT INTO shm_dev.SHM_PrestadoresEsp VALUES (DEFAULT, '1', '1');

# Lista Prestadores
SELECT p.nome, p.crm, p.cidade,
group_concat(DISTINCT esp.especializacao SEPARATOR ", ") AS especializacao,
group_concat(DISTINCT c.nomeFantasia SEPARATOR ", ") AS clientes,
group_concat(DISTINCT pa.nomeFantasia SEPARATOR ", ") AS pontos
FROM shm_dev.SHM_Prestadores AS p 
	JOIN shm_dev.SHM_PrestadoresEsp AS pes
		ON p.id = pes.prestador
	JOIN shm_dev.SHM_Especializacao AS esp
		ON pes.especializacao = esp.id
	JOIN shm_dev.SHM_ClientePrestador AS cpre
		ON cpre.prestador = p.id
	JOIN shm_dev.SHM_Cliente AS c
		ON c.id = cpre.cliente
	JOIN shm_dev.SHM_PontoPrestador AS pp
		ON pp.prestador = p.id
	JOIN shm_dev.SHM_PontoAtend AS pa
		ON pp.ponto = pa.id
GROUP BY(p.id);

SELECT * FROM shm_dev.SHM_PontoAtend;