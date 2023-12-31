-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema aapc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aapc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aapc` DEFAULT CHARACTER SET utf8 ;
USE `aapc` ;

-- -----------------------------------------------------
-- Table `aapc`.`uf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`uf` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `sigla` VARCHAR(2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`cidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `uf_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidade_uf_idx` (`uf_id` ASC),
  CONSTRAINT `fk_cidade_uf`
    FOREIGN KEY (`uf_id`)
    REFERENCES `aapc`.`uf` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `aapc`.`bairro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`bairro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cidade_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bairro_cidade1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_bairro_cidade1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `aapc`.`cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`paciente`
-- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `aapc`.`paciente` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `nome` VARCHAR(50) NOT NULL,
--   `data_nascimento` DATE NULL,
--   `cpf` VARCHAR(11) NULL,
--   `rg` VARCHAR(20) NULL,
--   `data_cadastro` DATE NOT NULL,
--   `sexo` VARCHAR(1) NOT NULL,
--   `quantidade_filhos` INT NOT NULL DEFAULT 0,
--   `estado_civil` VARCHAR(1) NOT NULL,
--   `conjuge` VARCHAR(50) NULL,
--   `escolaridade` VARCHAR(1) NULL,
--   `profissao` VARCHAR(45) NULL,
--   `renda_mensal` DECIMAL(12,2) NOT NULL DEFAULT 0,
--   `observacao` TEXT NULL,
--   `cep` VARCHAR(8) NULL,
--   `logradouro` VARCHAR(60) NULL,
--   `numero` VARCHAR(6) NULL,
--   `complemento` VARCHAR(45) NULL,
--   `ponto_referencia` VARCHAR(45) NULL,
--   `bairro_id` INT NOT NULL,
--   PRIMARY KEY (`id`),
--   INDEX `fk_paciente_bairro1_idx` (`bairro_id` ASC),
--   CONSTRAINT `fk_paciente_bairro1`
--     FOREIGN KEY (`bairro_id`)
--     REFERENCES `aapc`.`bairro` (`id`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION)
-- ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `aapc`.`paciente` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_general_ci',
	`data_nascimento` DATE NULL DEFAULT NULL,
	`cpf` VARCHAR(11) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`rg` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`data_cadastro` DATE NOT NULL,
	`data_obito` DATE NULL DEFAULT NULL,
	`sexo` VARCHAR(1) NOT NULL COLLATE 'utf8mb3_general_ci',
	`quantidade_filhos` INT(10),
	`estado_civil` VARCHAR(1) COLLATE 'utf8mb3_general_ci',
	`conjuge` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`escolaridade` VARCHAR(1) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`profissao` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`renda_mensal` DECIMAL(12,2),
	`observacao` TEXT NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`cep` VARCHAR(8) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`endereco` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`complemento` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`ponto_referencia` VARCHAR(45) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`bairro` VARCHAR(60),
	`cidade_id` INT(10),
  `radioterapia` TINYINT(3) NOT NULL DEFAULT '0',
	`quimioterapia` TINYINT(3) NOT NULL DEFAULT '0',
	`moradia` CHAR(1) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`data_biopsia` DATE NULL DEFAULT NULL,
	`data_alta` DATE NULL DEFAULT NULL,
  `medicamento` VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	`clinica` VARCHAR(60) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `cidade_id` (`cidade_id`) USING BTREE,
	CONSTRAINT `fk_paciente_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

-- -----------------------------------------------------
-- Table `aapc`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`pessoa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `colaborador` TINYINT NOT NULL DEFAULT 0,
  `profissional` TINYINT NULL DEFAULT 0,
  `voluntario` TINYINT NOT NULL DEFAULT 0,
  `fornecedor` TINYINT NOT NULL DEFAULT 0,
  `clinica` TINYINT NOT NULL DEFAULT 0,
  `cpf` VARCHAR(11) NULL,
  `cnpj` VARCHAR(14) NULL,
  `rg` VARCHAR(20) NULL,
  `data_cadastro` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`acompanhante`
-- -----------------------------------------------------
CREATE TABLE `acompanhante` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`paciente_id` INT(10) NOT NULL,
	`pessoa_id` INT(10) NOT NULL,
	`moradia` CHAR(1) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`telefone` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`profissao` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	`grau` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb3_general_ci',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `fk_contato_paciente1_idx` (`paciente_id`) USING BTREE,
	INDEX `fk_contato_pessoa1_idx` (`pessoa_id`) USING BTREE,
	CONSTRAINT `fk_contato_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `fk_contato_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb3_general_ci'
ENGINE=InnoDB
;

-- -----------------------------------------------------
-- Table `aapc`.`contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`contato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `paciente_id` INT NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contato_paciente2_idx` (`paciente_id` ASC),
  INDEX `fk_contato_pessoa2_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_contato_paciente2`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `aapc`.`paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contato_pessoa2`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `aapc`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`grupo_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`grupo_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `perecivel` TINYINT NOT NULL DEFAULT 0,
  `refrigerado` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`classe_terapeutica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`classe_terapeutica` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`medicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`medicamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `principio_ativo` VARCHAR(45) NULL,
  `classificacao` VARCHAR(1) NOT NULL DEFAULT 'R' COMMENT 'R-Referência, S-Similar, G-Genérico',
  `classe_terapeutica_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_medicamento_classe_terapeutica1_idx` (`classe_terapeutica_id` ASC),
  CONSTRAINT `fk_medicamento_classe_terapeutica1`
    FOREIGN KEY (`classe_terapeutica_id`)
    REFERENCES `aapc`.`classe_terapeutica` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `grupo_item_id` INT NOT NULL,
  `descricao` VARCHAR(60) NOT NULL,
  `fabricacao` DATE NULL,
  `validade` DATE NULL,
  `kit` TINYINT NOT NULL DEFAULT 0,
  `medicamento_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_item_grupo_item1_idx` (`grupo_item_id` ASC),
  INDEX `fk_item_medicamento1_idx` (`medicamento_id` ASC),
  CONSTRAINT `fk_item_grupo_item1`
    FOREIGN KEY (`grupo_item_id`)
    REFERENCES `aapc`.`grupo_item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_medicamento1`
    FOREIGN KEY (`medicamento_id`)
    REFERENCES `aapc`.`medicamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`entrada_doacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`entrada_doacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_doacao_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_doacao_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `aapc`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`entrada_doacao_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`entrada_doacao_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `entrada_doacao_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  `quantidade` DECIMAL(12,4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_doacao_item_doacao1_idx` (`entrada_doacao_id` ASC),
  INDEX `fk_doacao_item_item1_idx` (`item_id` ASC),
  CONSTRAINT `fk_doacao_item_doacao1`
    FOREIGN KEY (`entrada_doacao_id`)
    REFERENCES `aapc`.`entrada_doacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_doacao_item_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `aapc`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`kit_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`kit_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantidade` DECIMAL(12,4) NOT NULL DEFAULT 0,
  `item_kit_id` INT NOT NULL,
  `item_composicao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_kit_item_item1_idx` (`item_kit_id` ASC),
  INDEX `fk_kit_item_item2_idx` (`item_composicao_id` ASC),
  CONSTRAINT `fk_kit_item_item1`
    FOREIGN KEY (`item_kit_id`)
    REFERENCES `aapc`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_kit_item_item2`
    FOREIGN KEY (`item_composicao_id`)
    REFERENCES `aapc`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`conta_a_pagar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`conta_a_pagar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `valor_a_pagar` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `pessoa_id` INT NOT NULL,
  `valor_pago` DECIMAL(12,2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_conta_a_pagar_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_conta_a_pagar_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `aapc`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`conta_a_receber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`conta_a_receber` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NULL,
  `valor_a_receber` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `valor_recebido` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_conta_a_receber_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_conta_a_receber_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `aapc`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`enfermidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`enfermidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cid` VARCHAR(10) NULL,
  `descricao` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `aapc`.`paciente_enfermidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`paciente_enfermidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_cadastro` DATE NOT NULL,
  `paciente_id` INT NOT NULL,
  `enfermidade_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_paciente_doenca_paciente1_idx` (`paciente_id` ASC),
  INDEX `fk_paciente_doenca_doenca1_idx` (`enfermidade_id` ASC),
  CONSTRAINT `fk_paciente_doenca_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `aapc`.`paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_doenca_doenca1`
    FOREIGN KEY (`enfermidade_id`)
    REFERENCES `aapc`.`enfermidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`saida_doacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`saida_doacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_saida_doacao_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_saida_doacao_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `aapc`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`saida_doacao_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`saida_doacao_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `saida_doacao_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  `quantidade` DECIMAL(12,4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_saida_doacao_item_saida_doacao1_idx` (`saida_doacao_id` ASC),
  INDEX `fk_saida_doacao_item_item1_idx` (`item_id` ASC),
  CONSTRAINT `fk_saida_doacao_item_saida_doacao1`
    FOREIGN KEY (`saida_doacao_id`)
    REFERENCES `aapc`.`saida_doacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_saida_doacao_item_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `aapc`.`item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`consulta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `pessoa_id` INT NOT NULL,
  `realizada` TINYINT NOT NULL,
  `observacoes` TEXT NULL,
  `paciente_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_consulta_pessoa1_idx` (`pessoa_id` ASC),
  INDEX `fk_consulta_paciente1_idx` (`paciente_id` ASC),
  CONSTRAINT `fk_consulta_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `aapc`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consulta_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `aapc`.`paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`acomodacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`acomodacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `leitos` INT NOT NULL DEFAULT 1,
  `leitos_livres` INT NOT NULL DEFAULT 1,
  `refrigerado` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`acomodacao_paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`acomodacao_paciente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_entrada` DATE NOT NULL,
  `data_saida` DATE NULL,
  `paciente_id` INT NOT NULL,
  `acomodacao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_acomodacao_paciente_paciente1_idx` (`paciente_id` ASC),
  INDEX `fk_acomodacao_paciente_acomodacao1_idx` (`acomodacao_id` ASC),
  CONSTRAINT `fk_acomodacao_paciente_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `aapc`.`paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acomodacao_paciente_acomodacao1`
    FOREIGN KEY (`acomodacao_id`)
    REFERENCES `aapc`.`acomodacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`refeicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`refeicao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `tipo` VARCHAR(1) NOT NULL,
  `paciente_id` INT NULL,
  `acompanhante_id` INT NULL,
  `servida` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_refeicao_paciente1_idx` (`paciente_id` ASC),
  INDEX `fk_refeicao_acompanhante1_idx` (`acompanhante_id` ASC),
  CONSTRAINT `fk_refeicao_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `aapc`.`paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_refeicao_acompanhante1`
    FOREIGN KEY (`acompanhante_id`)
    REFERENCES `aapc`.`acompanhante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aapc`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aapc`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


INSERT INTO uf (nome, sigla)
VALUES
('Acre', 'AC'),
('Alagoas', 'AL'),
('Amazonas', 'AM'),
('Amapá', 'AP'),
('Bahia', 'BA'),
('Ceará', 'CE'),
('Distrito Federal', 'DF'),
('Espírito Santo', 'ES'),
('Goiás', 'GO'),
('Maranhão', 'MA'),
('Minas Gerais', 'MG'),
('Mato Grosso do Sul', 'MS'),
('Mato Grosso', 'MT'),
('Pará', 'PA'),
('Paraíba', 'PB'),
('Pernambuco', 'PE'),
('Piauí', 'PI'),
('Paraná', 'PR'),
('Rio de Janeiro', 'RJ'),
('Rio Grande do Norte', 'RN'),
('Rondônia', 'RO'),
('Roraima', 'RR'),
('Rio Grande do Sul', 'RS'),
('Santa Catarina', 'SC'),
('Sergipe', 'SE'),
('São Paulo', 'SP'),
('Tocantins', 'TO'),
('Exterior', 'EX');

ALTER TABLE pessoa
    CHANGE COLUMN profissional profissional
    TINYINT(3) NOT NULL DEFAULT '0' AFTER colaborador;

ALTER TABLE usuario
ADD COLUMN visualiza_acomodacao TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_localidade TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_pessoa TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_paciente TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_refeicao TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_doacoes TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_financeiro TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_classe_terapeutica TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_enfermidade TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_estoque TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_medicamentos TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_usuarios TINYINT(3) NOT NULL DEFAULT 0,
ADD COLUMN visualiza_relatorios TINYINT(3) NOT NULL DEFAULT 0;

ALTER TABLE item
ADD COLUMN `quantidade` DECIMAL(12,4) NOT NULL DEFAULT '0.0000';

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `visualiza_acomodacao`, `visualiza_localidade`, `visualiza_pessoa`, `visualiza_paciente`, `visualiza_refeicao`, `visualiza_doacoes`, `visualiza_financeiro`, `visualiza_classe_terapeutica`, `visualiza_enfermidade`, `visualiza_estoque`, `visualiza_medicamentos`, `visualiza_usuarios`, `visualiza_relatorios`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
