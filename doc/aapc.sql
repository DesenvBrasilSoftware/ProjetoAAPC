create database aapc;
use aapc;

-- -----------------------------------------------------
-- Table `uf`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uf` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `sigla` VARCHAR(2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `uf_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidade_uf_idx` (`uf_id` ASC),
  CONSTRAINT `fk_cidade_uf`
    FOREIGN KEY (`uf_id`)
    REFERENCES `uf` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bairro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bairro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cidade_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_bairro_cidade1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_bairro_cidade1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pessoa` (
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
-- Table `consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `consulta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `pessoa_id` INT NOT NULL,
  `realizada` TINYINT NOT NULL DEFAULT 0,
  `observacoes` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_consulta_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_consulta_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `data_nascimento` DATE NULL,
  `cpf` VARCHAR(11) NULL,
  `rg` VARCHAR(20) NULL,
  `data_cadastro` DATE NOT NULL,
  `sexo` VARCHAR(1) NOT NULL,
  `quantidade_filhos` INT NOT NULL DEFAULT 0,
  `estado_civil` VARCHAR(1) NOT NULL,
  `conjuge` VARCHAR(50) NULL,
  `escolaridade` VARCHAR(1) NULL,
  `profissao` VARCHAR(45) NULL,
  `renda_mensal` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `observacao` TEXT NULL,
  `cep` VARCHAR(8) NULL,
  `logradouro` VARCHAR(60) NULL,
  `numero` VARCHAR(6) NULL,
  `complemento` VARCHAR(45) NULL,
  `ponto_referencia` VARCHAR(45) NULL,
  `bairro_id` INT NOT NULL,
  `consulta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_paciente_bairro1_idx` (`bairro_id` ASC),
  INDEX `fk_paciente_consulta1_idx` (`consulta_id` ASC),
  CONSTRAINT `fk_paciente_bairro1`
    FOREIGN KEY (`bairro_id`)
    REFERENCES `bairro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_consulta1`
    FOREIGN KEY (`consulta_id`)
    REFERENCES `consulta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `acompanhante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `acompanhante` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `paciente_id` INT NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contato_paciente1_idx` (`paciente_id` ASC),
  INDEX `fk_contato_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_contato_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contato_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `paciente_id` INT NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contato_paciente2_idx` (`paciente_id` ASC),
  INDEX `fk_contato_pessoa2_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_contato_paciente2`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contato_pessoa2`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `grupo_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `grupo_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `perecivel` TINYINT NOT NULL DEFAULT 0,
  `refrigerado` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `classe_terapeutica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `classe_terapeutica` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `medicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medicamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `principio_ativo` VARCHAR(45) NULL,
  `classificacao` VARCHAR(1) NOT NULL DEFAULT 'R' COMMENT 'R-Referência, S-Similar, G-Genérico',
  `classe_terapeutica_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_medicamento_classe_terapeutica1_idx` (`classe_terapeutica_id` ASC),
  CONSTRAINT `fk_medicamento_classe_terapeutica1`
    FOREIGN KEY (`classe_terapeutica_id`)
    REFERENCES `classe_terapeutica` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `item` (
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
    REFERENCES `grupo_item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_medicamento1`
    FOREIGN KEY (`medicamento_id`)
    REFERENCES `medicamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entrada_doacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entrada_doacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_doacao_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_doacao_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entrada_doacao_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entrada_doacao_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `entrada_doacao_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  `quantidade` DECIMAL(12,4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_doacao_item_doacao1_idx` (`entrada_doacao_id` ASC),
  INDEX `fk_doacao_item_item1_idx` (`item_id` ASC),
  CONSTRAINT `fk_doacao_item_doacao1`
    FOREIGN KEY (`entrada_doacao_id`)
    REFERENCES `entrada_doacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_doacao_item_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kit_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kit_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantidade` DECIMAL(12,4) NOT NULL DEFAULT 0,
  `item_kit_id` INT NOT NULL,
  `item_composicao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_kit_item_item1_idx` (`item_kit_id` ASC),
  INDEX `fk_kit_item_item2_idx` (`item_composicao_id` ASC),
  CONSTRAINT `fk_kit_item_item1`
    FOREIGN KEY (`item_kit_id`)
    REFERENCES `item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_kit_item_item2`
    FOREIGN KEY (`item_composicao_id`)
    REFERENCES `item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conta_a_pagar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conta_a_pagar` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `valor_a_pagar` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `pessoa_id` INT NOT NULL,
  `valor_pago` DECIMAL(12,2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_conta_a_pagar_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_conta_a_pagar_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conta_a_receber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conta_a_receber` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NULL,
  `valor_a_receber` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `valor_recebido` DECIMAL(12,2) NOT NULL DEFAULT 0,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_conta_a_receber_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_conta_a_receber_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enfermidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cid` VARCHAR(45) NULL,
  `descricao` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `paciente_enfermidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `paciente_enfermidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_cadastro` DATE NOT NULL,
  `paciente_id` INT NOT NULL,
  `enfermidade_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_paciente_doenca_paciente1_idx` (`paciente_id` ASC),
  INDEX `fk_paciente_doenca_doenca1_idx` (`enfermidade_id` ASC),
  CONSTRAINT `fk_paciente_doenca_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_doenca_doenca1`
    FOREIGN KEY (`enfermidade_id`)
    REFERENCES `enfermidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saida_doacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saida_doacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_saida_doacao_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_saida_doacao_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `saida_doacao_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `saida_doacao_item` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `saida_doacao_id` INT NOT NULL,
  `item_id` INT NOT NULL,
  `quantidade` DECIMAL(12,4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_saida_doacao_item_saida_doacao1_idx` (`saida_doacao_id` ASC),
  INDEX `fk_saida_doacao_item_item1_idx` (`item_id` ASC),
  CONSTRAINT `fk_saida_doacao_item_saida_doacao1`
    FOREIGN KEY (`saida_doacao_id`)
    REFERENCES `saida_doacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_saida_doacao_item_item1`
    FOREIGN KEY (`item_id`)
    REFERENCES `item` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `acomodacao_paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `acomodacao_paciente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_entrada` DATE NOT NULL,
  `data_saida` DATE NULL,
  `paciente_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_acomodacao_paciente_paciente1_idx` (`paciente_id` ASC),
  CONSTRAINT `fk_acomodacao_paciente_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `acomodacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `acomodacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  `leitos` INT NOT NULL DEFAULT 1,
  `leitos_livres` INT NOT NULL DEFAULT 1,
  `refrigerado` TINYINT NOT NULL DEFAULT 0,
  `acomodacao_paciente_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_acomodacao_acomodacao_paciente1_idx` (`acomodacao_paciente_id` ASC),
  CONSTRAINT `fk_acomodacao_acomodacao_paciente1`
    FOREIGN KEY (`acomodacao_paciente_id`)
    REFERENCES `acomodacao_paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `refeicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `refeicao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `tipo` VARCHAR(1) NOT NULL,
  `paciente_id` INT NOT NULL,
  `acompanhante_id` INT NOT NULL,
  `servida` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_refeicao_paciente1_idx` (`paciente_id` ASC),
  INDEX `fk_refeicao_acompanhante1_idx` (`acompanhante_id` ASC),
  CONSTRAINT `fk_refeicao_paciente1`
    FOREIGN KEY (`paciente_id`)
    REFERENCES `paciente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_refeicao_acompanhante1`
    FOREIGN KEY (`acompanhante_id`)
    REFERENCES `acompanhante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

