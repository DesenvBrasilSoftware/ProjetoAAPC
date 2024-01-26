-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.33 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para aapc
CREATE DATABASE IF NOT EXISTS `aapc` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `aapc`;

-- Copiando estrutura para tabela aapc.acomodacao
CREATE TABLE IF NOT EXISTS `acomodacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `refrigerado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.acompanhante
CREATE TABLE IF NOT EXISTS `acompanhante` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `pessoa_id` int NOT NULL,
  `moradia` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `profissao` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `grau` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_contato_paciente1_idx` (`paciente_id`) USING BTREE,
  KEY `fk_contato_pessoa1_idx` (`pessoa_id`) USING BTREE,
  CONSTRAINT `fk_contato_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  CONSTRAINT `fk_contato_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=777 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.bairro
CREATE TABLE IF NOT EXISTS `bairro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cidade_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bairro_cidade1_idx` (`cidade_id`),
  CONSTRAINT `fk_bairro_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.cidade
CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `uf_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cidade_uf_idx` (`uf_id`),
  CONSTRAINT `fk_cidade_uf` FOREIGN KEY (`uf_id`) REFERENCES `uf` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.classe_terapeutica
CREATE TABLE IF NOT EXISTS `classe_terapeutica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.consulta
CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `pessoa_id` int NOT NULL,
  `realizada` tinyint NOT NULL,
  `observacoes` text,
  `paciente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_consulta_pessoa1_idx` (`pessoa_id`),
  KEY `fk_consulta_paciente1_idx` (`paciente_id`),
  CONSTRAINT `fk_consulta_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  CONSTRAINT `fk_consulta_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente_id` int NOT NULL,
  `pessoa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contato_paciente2_idx` (`paciente_id`),
  KEY `fk_contato_pessoa2_idx` (`pessoa_id`),
  CONSTRAINT `fk_contato_paciente2` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  CONSTRAINT `fk_contato_pessoa2` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.conta_a_pagar
CREATE TABLE IF NOT EXISTS `conta_a_pagar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `valor_a_pagar` decimal(12,2) NOT NULL DEFAULT '0.00',
  `pessoa_id` int NOT NULL,
  `valor_pago` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `fk_conta_a_pagar_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_conta_a_pagar_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.conta_a_receber
CREATE TABLE IF NOT EXISTS `conta_a_receber` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `valor_a_receber` decimal(12,2) NOT NULL DEFAULT '0.00',
  `valor_recebido` decimal(12,2) NOT NULL DEFAULT '0.00',
  `pessoa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_conta_a_receber_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_conta_a_receber_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.enfermidade
CREATE TABLE IF NOT EXISTS `enfermidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cid` varchar(10) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.entrada_doacao
CREATE TABLE IF NOT EXISTS `entrada_doacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `pessoa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_doacao_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_doacao_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.entrada_doacao_item
CREATE TABLE IF NOT EXISTS `entrada_doacao_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `entrada_doacao_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantidade` decimal(12,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `fk_doacao_item_doacao1_idx` (`entrada_doacao_id`),
  KEY `fk_doacao_item_item1_idx` (`item_id`),
  CONSTRAINT `fk_doacao_item_doacao1` FOREIGN KEY (`entrada_doacao_id`) REFERENCES `entrada_doacao` (`id`),
  CONSTRAINT `fk_doacao_item_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.grupo_item
CREATE TABLE IF NOT EXISTS `grupo_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `perecivel` tinyint NOT NULL DEFAULT '0',
  `refrigerado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.item
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grupo_item_id` int NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `kit` tinyint NOT NULL DEFAULT '0',
  `medicamento_id` int DEFAULT NULL,
  `quantidade` decimal(12,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `fk_item_grupo_item1_idx` (`grupo_item_id`),
  KEY `fk_item_medicamento1_idx` (`medicamento_id`),
  CONSTRAINT `fk_item_grupo_item1` FOREIGN KEY (`grupo_item_id`) REFERENCES `grupo_item` (`id`),
  CONSTRAINT `fk_item_medicamento1` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamento` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.kit_item
CREATE TABLE IF NOT EXISTS `kit_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `item_kit_id` int NOT NULL,
  `item_composicao_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kit_item_item1_idx` (`item_kit_id`),
  KEY `fk_kit_item_item2_idx` (`item_composicao_id`),
  CONSTRAINT `fk_kit_item_item1` FOREIGN KEY (`item_kit_id`) REFERENCES `item` (`id`),
  CONSTRAINT `fk_kit_item_item2` FOREIGN KEY (`item_composicao_id`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.leito
CREATE TABLE IF NOT EXISTS `leito` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `acomodacao_id` int NOT NULL,
  `ocupado` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_acomodacao_leito` (`acomodacao_id`),
  CONSTRAINT `fk_acomodacao_leito` FOREIGN KEY (`acomodacao_id`) REFERENCES `acomodacao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.leito_paciente
CREATE TABLE IF NOT EXISTS `leito_paciente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_entrada` date NOT NULL,
  `data_saida` date DEFAULT NULL,
  `paciente_id` int NOT NULL,
  `leito_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_leito_paciente_paciente1_idx` (`paciente_id`),
  KEY `fk_leito_paciente_acomodacao1_idx` (`leito_id`) USING BTREE,
  CONSTRAINT `FK_leito_paciente_aapc.leito` FOREIGN KEY (`leito_id`) REFERENCES `leito` (`id`),
  CONSTRAINT `fk_leito_paciente_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.medicamento
CREATE TABLE IF NOT EXISTS `medicamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `principio_ativo` varchar(45) DEFAULT NULL,
  `classificacao` varchar(1) NOT NULL DEFAULT 'R' COMMENT 'R-Referência, S-Similar, G-Genérico',
  `classe_terapeutica_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_medicamento_classe_terapeutica1_idx` (`classe_terapeutica_id`),
  CONSTRAINT `fk_medicamento_classe_terapeutica1` FOREIGN KEY (`classe_terapeutica_id`) REFERENCES `classe_terapeutica` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.paciente
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `rg` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `data_obito` date DEFAULT NULL,
  `sexo` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quantidade_filhos` int DEFAULT NULL,
  `estado_civil` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `conjuge` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `escolaridade` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `profissao` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `observacao` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `cep` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `endereco` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `complemento` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ponto_referencia` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade_id` int DEFAULT NULL,
  `radioterapia` tinyint NOT NULL DEFAULT '0',
  `quimioterapia` tinyint NOT NULL DEFAULT '0',
  `vulnerabilidade_social` tinyint NOT NULL DEFAULT '0',
  `aposentado` tinyint NOT NULL DEFAULT '0',
  `moradia` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `data_biopsia` date DEFAULT NULL,
  `data_alta` date DEFAULT NULL,
  `medicamento` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `clinica` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `telefone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_rg` (`rg`),
  UNIQUE KEY `unique_cpf` (`cpf`),
  KEY `cidade_id` (`cidade_id`) USING BTREE,
  CONSTRAINT `fk_paciente_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3438 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.paciente_enfermidade
CREATE TABLE IF NOT EXISTS `paciente_enfermidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_cadastro` date NOT NULL,
  `paciente_id` int NOT NULL,
  `enfermidade_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_paciente_doenca_paciente1_idx` (`paciente_id`),
  KEY `fk_paciente_doenca_doenca1_idx` (`enfermidade_id`),
  CONSTRAINT `fk_paciente_doenca_doenca1` FOREIGN KEY (`enfermidade_id`) REFERENCES `enfermidade` (`id`),
  CONSTRAINT `fk_paciente_doenca_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3279 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.pessoa
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `colaborador` tinyint NOT NULL DEFAULT '0',
  `profissional` tinyint NOT NULL DEFAULT '0',
  `voluntario` tinyint NOT NULL DEFAULT '0',
  `fornecedor` tinyint NOT NULL DEFAULT '0',
  `clinica` tinyint NOT NULL DEFAULT '0',
  `acompanhante` tinyint NOT NULL DEFAULT '0',
  `contato` tinyint NOT NULL DEFAULT '0',
  `cpf` varchar(11) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `telefone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_rg` (`rg`),
  UNIQUE KEY `unique_cpf` (`cpf`),
  UNIQUE KEY `unique_cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=767 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.refeicao
CREATE TABLE IF NOT EXISTS `refeicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `paciente_id` int DEFAULT NULL,
  `acompanhante_id` int DEFAULT NULL,
  `servida` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_refeicao_paciente1_idx` (`paciente_id`),
  KEY `fk_refeicao_acompanhante1_idx` (`acompanhante_id`),
  CONSTRAINT `fk_refeicao_acompanhante1` FOREIGN KEY (`acompanhante_id`) REFERENCES `acompanhante` (`id`),
  CONSTRAINT `fk_refeicao_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.saida_doacao
CREATE TABLE IF NOT EXISTS `saida_doacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `pessoa_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_saida_doacao_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_saida_doacao_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.saida_doacao_item
CREATE TABLE IF NOT EXISTS `saida_doacao_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `saida_doacao_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantidade` decimal(12,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `fk_saida_doacao_item_saida_doacao1_idx` (`saida_doacao_id`),
  KEY `fk_saida_doacao_item_item1_idx` (`item_id`),
  CONSTRAINT `fk_saida_doacao_item_item1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  CONSTRAINT `fk_saida_doacao_item_saida_doacao1` FOREIGN KEY (`saida_doacao_id`) REFERENCES `saida_doacao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.uf
CREATE TABLE IF NOT EXISTS `uf` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela aapc.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` text NOT NULL,
  `visualiza_acomodacao` tinyint NOT NULL DEFAULT '0',
  `visualiza_localidade` tinyint NOT NULL DEFAULT '0',
  `visualiza_pessoa` tinyint NOT NULL DEFAULT '0',
  `visualiza_paciente` tinyint NOT NULL DEFAULT '0',
  `visualiza_refeicao` tinyint NOT NULL DEFAULT '0',
  `visualiza_doacoes` tinyint NOT NULL DEFAULT '0',
  `visualiza_financeiro` tinyint NOT NULL DEFAULT '0',
  `visualiza_classe_terapeutica` tinyint NOT NULL DEFAULT '0',
  `visualiza_enfermidade` tinyint NOT NULL DEFAULT '0',
  `visualiza_estoque` tinyint NOT NULL DEFAULT '0',
  `visualiza_medicamentos` tinyint NOT NULL DEFAULT '0',
  `visualiza_usuarios` tinyint NOT NULL DEFAULT '0',
  `visualiza_relatorios` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
