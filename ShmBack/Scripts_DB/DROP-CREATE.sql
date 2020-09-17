USE shm_dev;

DROP TABLE IF EXISTS `SHM_RelatorioAtendimentos`;
DROP TABLE IF EXISTS `SHM_Relatorios`;
DROP TABLE IF EXISTS `SHM_Atendimentos`;
DROP TABLE IF EXISTS `SHM_UsuariosTelefone`;
DROP TABLE IF EXISTS `SHM_PrestadoresTelefone`;
DROP TABLE IF EXISTS `SHM_PontosAtendEsp`;
DROP TABLE IF EXISTS `SHM_PontosAtendPrestadores`;
DROP TABLE IF EXISTS `SHM_PrestadoresEsp`;
DROP TABLE IF EXISTS `SHM_PontosAtendTelefone`;
DROP TABLE IF EXISTS `SHM_ClientesTelefone`;
DROP TABLE IF EXISTS `SHM_ClientesPrestadores`;
DROP TABLE IF EXISTS `SHM_ClientesPontosAtend`;
DROP TABLE IF EXISTS `SHM_Especializacoes`;
DROP TABLE IF EXISTS `SHM_PontosAtend`;
DROP TABLE IF EXISTS `SHM_Usuarios`;
DROP TABLE IF EXISTS `SHM_Prestadores`;
DROP TABLE IF EXISTS `SHM_Clientes`;
DROP TABLE IF EXISTS `SHM_UsuarioGrupo`;
DROP TABLE IF EXISTS `SHM_Usuario`;
DROP TABLE IF EXISTS `SHM_Config`;

-- Configurações
CREATE TABLE `SHM_Config` (
  `smtpSecure` varchar(200) DEFAULT NULL,
  `hostServidor` varchar(200) DEFAULT NULL,
  `smtpAuth` varchar(200) DEFAULT NULL,
  `portServidor` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `passwordServidor` varchar(200) DEFAULT NULL,
  `identName` varchar(200) DEFAULT NULL,
  `modeloEmailNova` varchar(30000) DEFAULT NULL,
  `assuntoEmailNova` varchar(200) DEFAULT NULL,
  `modeloEmailRecuperar` varchar(30000) DEFAULT NULL,
  `assuntoEmailRecuperar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_Usuario` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `grupo` int(11) NOT NULL,
  `conta` int(11) NOT NULL,
  `recuperar` varchar(50) DEFAULT NULL,
  `fl_excluido` int(11) NOT NULL,
  `fl_bloqueado` int(11) NOT NULL,
  `email64` varchar(300) DEFAULT NULL,
  `token64` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_UsuarioGrupo` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `conta` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `seguranca` varchar(30000) DEFAULT NULL,
  `flDev` int(11) DEFAULT NULL,
  `flAtivo` int(11) DEFAULT NULL,
  `flExcluido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Entidades Fortes
CREATE TABLE `SHM_Clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ativo` tinyint(1) DEFAULT '0',
  `cnpj` varchar(14) NOT NULL,
  `nomeFantasia` varchar(50) DEFAULT NULL,
  `razaoSocial` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_Prestadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ativo` tinyint(1) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `crm` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  UNIQUE KEY `crm_UNIQUE` (`crm`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_Usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ativo` tinyint(1) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_PontosAtend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ativo` tinyint(1) DEFAULT NULL,
  `cnpj` varchar(14) NOT NULL,
  `nomeFantasia` varchar(50) DEFAULT NULL,
  `razaoSocial` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

CREATE TABLE `SHM_Especializacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especializacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Entidades Fracas
CREATE TABLE `SHM_ClientesPontosAtend` ( 
     `id_cliente` INT(11) NOT NULL, 
     `id_ponto`   INT(11) NOT NULL, 
     FOREIGN KEY (`id_cliente`) REFERENCES shm_dev.SHM_Clientes(`id`), 
     FOREIGN KEY (`id_ponto`) REFERENCES shm_dev.SHM_PontosAtend(`id`) 
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

CREATE TABLE `SHM_ClientesPrestadores` ( 
     `id_cliente`   INT(11) NOT NULL, 
     `id_prestador` INT(11) NOT NULL, 
     FOREIGN KEY (`id_cliente`) REFERENCES shm_dev.SHM_Clientes(`id`), 
     FOREIGN KEY (`id_prestador`) REFERENCES shm_dev.SHM_Prestadores(`id`) 
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 
  
CREATE TABLE `SHM_ClientesTelefone` ( 
     `id_cliente` INT(11) NOT NULL, 
     `telefone`   VARCHAR(20) NOT NULL, 
     FOREIGN KEY (`id_cliente`) REFERENCES shm_dev.SHM_Clientes(`id`) 
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

CREATE TABLE `SHM_PontosAtendEsp` (
  `id_ponto` int(11) NOT NULL, 
  `id_esp` int(11) NOT NULL, 
  FOREIGN KEY (`id_ponto`) REFERENCES shm_dev.SHM_PontosAtend(`id`), 
  FOREIGN KEY (`id_esp`) REFERENCES shm_dev.SHM_Especializacoes(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `SHM_PontosAtendTelefone` (
  `id_ponto` int(11) NOT NULL, 
  `telefone` varchar(20) NOT NULL, 
  FOREIGN KEY (`id_ponto`) REFERENCES shm_dev.SHM_PontosAtend(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `SHM_PontosAtendPrestadores` (
  `id_ponto` int(11) NOT NULL, 
  `id_prestador` int(11) NOT NULL, 
  FOREIGN KEY (`id_ponto`) REFERENCES shm_dev.SHM_PontosAtend(`id`), 
  FOREIGN KEY (`id_prestador`) REFERENCES shm_dev.SHM_Prestadores(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `SHM_PrestadoresEsp` (
  `id_prestador` int(11) NOT NULL, 
  `id_esp` int(11) NOT NULL, 
  FOREIGN KEY (`id_prestador`) REFERENCES shm_dev.SHM_Prestadores(`id`), 
  FOREIGN KEY (`id_esp`) REFERENCES shm_dev.SHM_Especializacoes(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `SHM_PrestadoresTelefone` (
  `id_prestador` int(11) NOT NULL, 
  `telefone` varchar(20) DEFAULT NULL, 
  FOREIGN KEY (`id_prestador`) REFERENCES shm_dev.SHM_Prestadores(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `SHM_UsuariosTelefone` (
  `id_usuario` int(11) NOT NULL, 
  `telefone` varchar(20) NOT NULL, 
  FOREIGN KEY (`id_usuario`) REFERENCES shm_dev.SHM_Usuarios(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `SHM_Atendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT, 
  `id_prestador` int(11) NOT NULL, 
  `id_ponto` int(11) NOT NULL, 
  `valor` int(11) DEFAULT NULL, 
  `entrada` datetime NOT NULL, 
  `saida` datetime DEFAULT NULL, 
  PRIMARY KEY (`id`), 
  FOREIGN KEY (`id_prestador`) REFERENCES shm_dev.SHM_Prestadores(`id`), 
  FOREIGN KEY (`id_ponto`) REFERENCES shm_dev.SHM_PontosAtend(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

CREATE TABLE `SHM_Relatorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT, 
  `id_prestador` int(11) NOT NULL, 
  `id_cliente` int(11) DEFAULT NULL, 
  `id_ponto` int(11) DEFAULT NULL, 
  `entrada` datetime NOT NULL, 
  `saida` datetime NOT NULL, 
  `valor` int(11) DEFAULT NULL, 
  PRIMARY KEY (`id`), 
  FOREIGN KEY (`id_prestador`) REFERENCES shm_dev.SHM_Prestadores(`id`), 
  FOREIGN KEY (`id_cliente`) REFERENCES shm_dev.SHM_Clientes(`id`), 
  FOREIGN KEY (`id_ponto`) REFERENCES shm_dev.SHM_PontosAtend(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- Entidades Fracas Nível 2
CREATE TABLE `SHM_RelatorioAtendimentos` (
  `id_relatorio` int(11) NOT NULL, 
  `id_atendimento` int(11) UNIQUE NOT NULL, 
  FOREIGN KEY (`id_relatorio`) REFERENCES shm_dev.SHM_Relatorios(`id`), 
  FOREIGN KEY (`id_atendimento`) REFERENCES shm_dev.SHM_Atendimentos(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
