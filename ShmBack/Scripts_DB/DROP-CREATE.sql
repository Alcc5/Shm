DROP TABLE `SHM_atendimentos`;
DROP TABLE `SHM_cliente`;
DROP TABLE `SHM_cliente_telefone`;
DROP TABLE `SHM_Config`;
DROP TABLE `SHM_especializacao`;
DROP TABLE `SHM_ponto_atend`;
DROP TABLE `SHM_ponto_atend_telefone`;
DROP TABLE `SHM_ponto_atend_tipo`;
DROP TABLE `SHM_prestadores`;
DROP TABLE `SHM_prestadores_esp`;
DROP TABLE `SHM_prestadores_telefones`;
DROP TABLE `SHM_relatorios`;
DROP TABLE `SHM_Usuario`;
DROP TABLE `SHM_UsuarioGrupo`;
DROP TABLE `SHM_usuarios`;
DROP TABLE `SHM_usuarios_telefone`;


CREATE TABLE `SHM_atendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Local` int(11) NOT NULL,
  `Entrada` datetime NOT NULL,
  `Saida` date DEFAULT NULL,
  `Atendimentos` int(10) unsigned DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL,
  `Medico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SHM_cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Fantasia` varchar(50) DEFAULT NULL,
  `Razao_Social` varchar(50) DEFAULT NULL,
  `CNPJ` varchar(14) NOT NULL,
  `Endereco` varchar(50) DEFAULT NULL,
  `Complemento` varchar(20) DEFAULT NULL,
  `Bairro` varchar(20) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Estado` char(2) NOT NULL,
  `Pontos_de_Atendimento` int(11) DEFAULT NULL,
  `Ativo` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_cliente_telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` int(11) NOT NULL,
  `Telefone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_Config` (
  `SMTPSecure` varchar(200) DEFAULT NULL,
  `HostServidor` varchar(200) DEFAULT NULL,
  `SMTPAuth` varchar(200) DEFAULT NULL,
  `PortServidor` varchar(200) DEFAULT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `PasswordServidor` varchar(200) DEFAULT NULL,
  `IdentName` varchar(200) DEFAULT NULL,
  `ModeloEmailNova` varchar(30000) DEFAULT NULL,
  `AssuntoEmailNova` varchar(200) DEFAULT NULL,
  `ModeloEmailRecuperar` varchar(30000) DEFAULT NULL,
  `AssuntoEmailRecuperar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_especializacao` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Especializacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_ponto_atend` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Fantasia` varchar(50) DEFAULT NULL,
  `Razao_Social` varchar(50) DEFAULT NULL,
  `CNPJ` varchar(14) NOT NULL,
  `Endereco` varchar(50) DEFAULT NULL,
  `Complemento` varchar(20) DEFAULT NULL,
  `Bairro` varchar(20) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Estado` char(2) NOT NULL,
  `Especialidades` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `SHM_ponto_atend_telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Ponto_de_Atendimento` int(11) NOT NULL,
  `Telefone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_ponto_atend_tipo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_prestadores` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `CRM` varchar(10) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Endereco` varchar(50) DEFAULT NULL,
  `Complemento` varchar(20) DEFAULT NULL,
  `Bairro` varchar(20) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Estado` char(2) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_prestadores_esp` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `especializacao` int(4) NOT NULL,
  `prestador` int(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_prestadores_telefones` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `prestador` int(10) NOT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_relatorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Medico` int(11) NOT NULL,
  `Especialidade` int(11) DEFAULT NULL,
  `Entrada` datetime NOT NULL,
  `Saida` datetime NOT NULL,
  `Atendimentos` int(10) unsigned DEFAULT NULL,
  `Valor` int(11) DEFAULT NULL,
  `Cliente` int(11) DEFAULT NULL,
  `Local_de_Atendimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_Usuario` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `grupo` int(4) NOT NULL,
  `conta` int(4) NOT NULL,
  `recuperar` varchar(50) DEFAULT NULL,
  `fl_excluido` int(4) NOT NULL,
  `fl_bloqueado` int(4) NOT NULL,
  `email64` varchar(300) DEFAULT NULL,
  `token64` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_UsuarioGrupo` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `conta` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `Seguranca` varchar(30000) DEFAULT NULL,
  `flDev` int(11) DEFAULT NULL,
  `flAtivo` int(11) DEFAULT NULL,
  `flExcluido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_usuarios` (
  `ID` int(11) DEFAULT NULL,
  `Nome` varchar(50) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Endereco` varchar(50) DEFAULT NULL,
  `Complemento` varchar(20) DEFAULT NULL,
  `Bairro` varchar(30) NOT NULL,
  `Cidade` varchar(50) NOT NULL,
  `Estado` char(2) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `SHM_usuarios_telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` int(11) NOT NULL,
  `Telefone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
