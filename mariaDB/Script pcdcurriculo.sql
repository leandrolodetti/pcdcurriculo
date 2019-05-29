-- MySQL Workbench Forward Engineering

-- -----------------------------------------------------
-- DATABASE pcdcurriculo
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `pcdcurriculo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `pcdcurriculo` ;

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Responsavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Responsavel` (
  `idResponsavel` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cpf` CHAR(14) NOT NULL,
  `contato` VARCHAR(14) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `data_nascimento` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idResponsavel`))
ENGINE = InnoDB;

INSERT INTO Responsavel (nome, cpf, contato, email, data_nascimento) VALUES ('','','','','');

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Candidato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Candidato` (
  `idCandidato` INT NOT NULL AUTO_INCREMENT,
  `cpf` CHAR(14) NOT NULL,
  `nome` VARCHAR(20) NOT NULL,
  `sobrenome` VARCHAR(30) NOT NULL,
  `data_nascimento` VARCHAR(10) NOT NULL,
  `contato` VARCHAR(14) NOT NULL,
  `genero` CHAR(1) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `estado_civil` VARCHAR(45) NOT NULL,
  `cep` CHAR(11) NOT NULL,
  `estado` CHAR(2) NOT NULL,
  `cidade` VARCHAR(25) NOT NULL,
  `logradouro` VARCHAR(50) NOT NULL,
  `num_logradouro` VARCHAR(5) NOT NULL,
  `bairro` VARCHAR(50) NOT NULL,
  `complemento` VARCHAR(20) NULL,
  `senha` VARCHAR(255) NOT NULL,
  `cid10` VARCHAR(45) NOT NULL,
  `ativo` CHAR(1) NOT NULL,
  `recebe_vagas` CHAR(1) NULL,
  `Responsavel_idResponsavel` INT NOT NULL,
  PRIMARY KEY (`idCandidato`),
    FOREIGN KEY (`Responsavel_idResponsavel`) REFERENCES `pcdcurriculo`.`Responsavel` (`idResponsavel`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pcdcurriculo`.`TiposDeficiencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`TiposDeficiencia` (
  `idTiposDeficiencia` INT NOT NULL AUTO_INCREMENT,
  `tipo_deficiencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTiposDeficiencia`))
ENGINE = InnoDB;

INSERT INTO TiposDeficiencia(tipo_deficiencia) VALUES('Auditiva');
INSERT INTO TiposDeficiencia(tipo_deficiencia) VALUES('Fala');
INSERT INTO TiposDeficiencia(tipo_deficiencia) VALUES('Física');
INSERT INTO TiposDeficiencia(tipo_deficiencia) VALUES('Intelectual/Mental');
INSERT INTO TiposDeficiencia(tipo_deficiencia) VALUES('Visual');


-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Deficiencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Deficiencia` (
  `idDeficiencia` INT NOT NULL AUTO_INCREMENT,
  `TiposDeficiencia_idTiposDeficiencia` INT NOT NULL,
  `Candidato_idCandidato` INT NOT NULL,
  PRIMARY KEY (`idDeficiencia`),
    FOREIGN KEY (`TiposDeficiencia_idTiposDeficiencia`) REFERENCES `pcdcurriculo`.`TiposDeficiencia` (`idTiposDeficiencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (`Candidato_idCandidato`) REFERENCES `pcdcurriculo`.`Candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Empresa` (
  `idEmpresa` INT NOT NULL AUTO_INCREMENT,
  `cnpj` CHAR(18) NOT NULL,
  `fantasia` VARCHAR(50) NOT NULL,
  `razao_social` VARCHAR(50) NOT NULL,
  `contato` VARCHAR(14) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `cep` CHAR(11) NOT NULL,
  `estado` CHAR(2) NOT NULL,
  `cidade` VARCHAR(25) NOT NULL,
  `logradouro` VARCHAR(50) NOT NULL,
  `num_logradouro` VARCHAR(5) NOT NULL,
  `bairro` VARCHAR(50) NOT NULL,
  `complemento` VARCHAR(20) NULL,
  `ramo_atividade` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `responsavel` VARCHAR(50) NOT NULL,
  `ativa` CHAR(1) NOT NULL,
  PRIMARY KEY (`idEmpresa`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;

INSERT INTO Categoria(descricao) VALUES ('Administração Comercial/Vendas');

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Nivel` (
  `idNivel` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idNivel`))
ENGINE = InnoDB;


INSERT INTO Nivel(descricao) VALUES ('Auxiliar/Operacional');
INSERT INTO Nivel(descricao) VALUES ('Técnico');
INSERT INTO Nivel(descricao) VALUES ('Estágio');
INSERT INTO Nivel(descricao) VALUES ('Júnior/Trainee');
INSERT INTO Nivel(descricao) VALUES ('Pleno');
INSERT INTO Nivel(descricao) VALUES ('Sênior');
INSERT INTO Nivel(descricao) VALUES ('Supervisão/Coordenação');
INSERT INTO Nivel(descricao) VALUES ('Gerência');
INSERT INTO Nivel(descricao) VALUES ('Diretoria');

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Vaga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Vaga` (
  `idVaga` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(60) NOT NULL,
  `descricao` TEXT NOT NULL,
  `requisitos` TEXT NOT NULL,
  `beneficios` TEXT NOT NULL,
  `salario` VARCHAR(12) NOT NULL,
  `carga_horaria` VARCHAR(80) NOT NULL,
  `data_atualizacao` DATE NULL,
  `Empresa_idEmpresa` INT NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  `Nivel_idNivel` INT NOT NULL,
  `ativa` CHAR(1) NOT NULL,
  PRIMARY KEY (`idVaga`),
    FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `pcdcurriculo`.`Empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `pcdcurriculo`.`Categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (`Nivel_idNivel`) REFERENCES `pcdcurriculo`.`Nivel` (`idNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Curriculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Curriculo` (
  `idCurriculo` INT NOT NULL AUTO_INCREMENT,
  `objetivo` VARCHAR(60) NOT NULL,
  `area` VARCHAR(60) NOT NULL,
  `nivel_area` VARCHAR(60) NOT NULL,
  `salario` VARCHAR(12) NOT NULL,
  `resumo_profissional` TEXT NOT NULL,
  `nivel_escolar` VARCHAR(40) NOT NULL,
  `graduacao` TEXT NULL,
  `curso_complemento` TEXT NULL,
  `idiomas` TEXT NOT NULL,
  `historico_profissional` TEXT NULL,
  `data_atualizacao` DATE NOT NULL,
  `Candidato_idCandidato` INT NOT NULL,
  PRIMARY KEY (`idCurriculo`),
    FOREIGN KEY (`Candidato_idCandidato`) REFERENCES `pcdcurriculo`.`Candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pcdcurriculo`.`Candidatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`Candidatura` (
  `idCandidatura` INT NOT NULL AUTO_INCREMENT,
  `Vaga_idVaga` INT NOT NULL,
  `Candidato_idCandidato` INT NOT NULL,
  `data_candidatura` DATE NULL,
  `data_contratacao` DATE NULL,
  `contratado` CHAR(1) NULL,
  PRIMARY KEY (`idCandidatura`),
    FOREIGN KEY (`Vaga_idVaga`) REFERENCES `pcdcurriculo`.`Vaga` (`idVaga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (`Candidato_idCandidato`) REFERENCES `pcdcurriculo`.`Candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`RestricaoDeficiencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`RestricaoDeficiencia` (
  `idRestricaoDeficiencia` INT NOT NULL AUTO_INCREMENT,
  `TiposDeficiencia_idTiposDeficiencia` INT NOT NULL,
  `Vaga_idVaga` INT NOT NULL,
  PRIMARY KEY (`idRestricaoDeficiencia`),
    FOREIGN KEY (`TiposDeficiencia_idTiposDeficiencia`) REFERENCES `pcdcurriculo`.`TiposDeficiencia` (`idTiposDeficiencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (`Vaga_idVaga`) REFERENCES `pcdcurriculo`.`Vaga` (`idVaga`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;


CREATE USER 'publico'@'localhost' IDENTIFIED BY 'ede02e60172b237f72e48299bce8ac8e';
GRANT ALL PRIVILEGES ON pcdcurriculo.* TO 'publico'@'localhost';



