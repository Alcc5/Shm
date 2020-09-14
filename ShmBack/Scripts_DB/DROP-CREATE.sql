USE shm_dev;

DROP TABLE `SHM_Atendimentos`;
DROP TABLE `SHM_Cliente`;
DROP TABLE `SHM_ClientePonto`;
DROP TABLE `SHM_ClientePrestador`;
DROP TABLE `SHM_ClienteTelefone`;
DROP TABLE `SHM_Config`;
DROP TABLE `SHM_Especializacao`;
DROP TABLE `SHM_PontoAtend`;
DROP TABLE `SHM_PontoAtendTelefone`;
DROP TABLE `SHM_PontoAtendTipo`;
DROP TABLE `SHM_PontoPrestador`;
DROP TABLE `SHM_Prestadores`;
DROP TABLE `SHM_PrestadoresEsp`;
DROP TABLE `SHM_PrestadoresTelefones`;
DROP TABLE `SHM_Relatorios`;
DROP TABLE `SHM_UsuarioGrupo`;
DROP TABLE `SHM_Usuarios`;
DROP TABLE `SHM_UsuariosTelefone`;


CREATE TABLE `SHM_Atendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` int(11) NOT NULL,
  `entrada` datetime NOT NULL,
  `saida` datetime DEFAULT NULL,
  `atendimentos` int(10) unsigned DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `medico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SHM_Cliente` (
  `iD` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFantasia` varchar(50) DEFAULT NULL,
  `razaoSocial` varchar(50) DEFAULT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `pontoAtendimento` int(11) DEFAULT NULL,
  `ativo` boolean DEFAULT FALSE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_ClientePonto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `ponto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_ClientePrestador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `prestador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_ClienteTelefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `SHM_Especializacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especializacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_PontoAtend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFantasia` varchar(50) DEFAULT NULL,
  `razaoSocial` varchar(50) DEFAULT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `especialidades` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SHM_PontoAtendTelefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pontoAtendimento` int(11) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_PontoAtendTipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_PontoPrestador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ponto` int(11) NOT NULL,
  `prestador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_Prestadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `crm` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_PrestadoresEsp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prestador` int(10) NOT NULL,
  `especializacao` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_PrestadoresTelefones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prestador` int(10) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_Relatorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medico` int(11) NOT NULL,
  `especialidade` int(11) DEFAULT NULL,
  `entrada` datetime NOT NULL,
  `saida` datetime NOT NULL,
  `atendimentos` int(10) unsigned DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `localAtendimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
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

CREATE TABLE `SHM_Usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_UsuariosTelefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;