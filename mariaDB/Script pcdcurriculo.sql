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
  `idTiposDeficiencia` INT NOT NULL,
  `tipo_deficiencia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTiposDeficiencia`))
ENGINE = InnoDB;

INSERT INTO TiposDeficiencia(idTiposDeficiencia, tipo_deficiencia) VALUES(0,'Vazio');
INSERT INTO TiposDeficiencia(idTiposDeficiencia, tipo_deficiencia) VALUES(1,'Auditiva');
INSERT INTO TiposDeficiencia(idTiposDeficiencia, tipo_deficiencia) VALUES(2,'Fala');
INSERT INTO TiposDeficiencia(idTiposDeficiencia, tipo_deficiencia) VALUES(3,'Física');
INSERT INTO TiposDeficiencia(idTiposDeficiencia, tipo_deficiencia) VALUES(4,'Intelectual/Mental');
INSERT INTO TiposDeficiencia(idTiposDeficiencia, tipo_deficiencia) VALUES(5,'Visual');


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
INSERT INTO Categoria(descricao) VALUES ('Administração de Empresas');
INSERT INTO Categoria(descricao) VALUES ('Administração Pública');
INSERT INTO Categoria(descricao) VALUES ('Advocacia/Jurídica');
INSERT INTO Categoria(descricao) VALUES ('Agronomia');
INSERT INTO Categoria(descricao) VALUES ('Arquitetura/Urbanismo');
INSERT INTO Categoria(descricao) VALUES ('Arquivologia');
INSERT INTO Categoria(descricao) VALUES ('Artes Cênicas');
INSERT INTO Categoria(descricao) VALUES ('Artes Gráficas');
INSERT INTO Categoria(descricao) VALUES ('Artes Plásticas');
INSERT INTO Categoria(descricao) VALUES ('Atend. a cliente - Bares e Restaurantes');
INSERT INTO Categoria(descricao) VALUES ('Atend. a cliente - Telefonistas/Recepcionistas');
INSERT INTO Categoria(descricao) VALUES ('Atend. a cliente - Telemarketing/Call Center');
INSERT INTO Categoria(descricao) VALUES ('Atend. a cliente');
INSERT INTO Categoria(descricao) VALUES ('Auditoria');
INSERT INTO Categoria(descricao) VALUES ('Bancos');
INSERT INTO Categoria(descricao) VALUES ('Biblioteconomia');
INSERT INTO Categoria(descricao) VALUES ('Biologia/Ciências Biológicas');
INSERT INTO Categoria(descricao) VALUES ('Biomedicina');
INSERT INTO Categoria(descricao) VALUES ('Ciências Sociais');
INSERT INTO Categoria(descricao) VALUES ('Cinema');
INSERT INTO Categoria(descricao) VALUES ('Comércio Exterior');
INSERT INTO Categoria(descricao) VALUES ('Compras');
INSERT INTO Categoria(descricao) VALUES ('Comunicação');
INSERT INTO Categoria(descricao) VALUES ('Construção Civil');
INSERT INTO Categoria(descricao) VALUES ('Contabilidade');
INSERT INTO Categoria(descricao) VALUES ('Controladoria');
INSERT INTO Categoria(descricao) VALUES ('Culinária/Gastronomia');
INSERT INTO Categoria(descricao) VALUES ('Desenho Industrial');
INSERT INTO Categoria(descricao) VALUES ('Design de Interiores');
INSERT INTO Categoria(descricao) VALUES ('Design Gráfico');
INSERT INTO Categoria(descricao) VALUES ('Ecologia/Meio Ambiente');
INSERT INTO Categoria(descricao) VALUES ('Economia');
INSERT INTO Categoria(descricao) VALUES ('Enfermagem');
INSERT INTO Categoria(descricao) VALUES ('Engenharia de Alimentos');
INSERT INTO Categoria(descricao) VALUES ('Engenharia Civil');
INSERT INTO Categoria(descricao) VALUES ('Engenharia Eletrônica');
INSERT INTO Categoria(descricao) VALUES ('Engenharia Eletrotécnica');
INSERT INTO Categoria(descricao) VALUES ('Engenharia Mecânica');
INSERT INTO Categoria(descricao) VALUES ('Engenharia Metalúrgica e de Materiais');
INSERT INTO Categoria(descricao) VALUES ('Engenharia de Minas');
INSERT INTO Categoria(descricao) VALUES ('Engenharia de Produção');
INSERT INTO Categoria(descricao) VALUES ('Engenharia Química');
INSERT INTO Categoria(descricao) VALUES ('Engenharia - Outras');
INSERT INTO Categoria(descricao) VALUES ('Ensino Superior e Pesquisa');
INSERT INTO Categoria(descricao) VALUES ('Ensino - Outros');
INSERT INTO Categoria(descricao) VALUES ('Entretenimento');
INSERT INTO Categoria(descricao) VALUES ('Esportes');
INSERT INTO Categoria(descricao) VALUES ('Estética');
INSERT INTO Categoria(descricao) VALUES ('Farmácia');
INSERT INTO Categoria(descricao) VALUES ('Filosofia');
INSERT INTO Categoria(descricao) VALUES ('Finanças');
INSERT INTO Categoria(descricao) VALUES ('Fiscal');
INSERT INTO Categoria(descricao) VALUES ('Física');
INSERT INTO Categoria(descricao) VALUES ('Fisioterapia');
INSERT INTO Categoria(descricao) VALUES ('Fonoaudiologia');
INSERT INTO Categoria(descricao) VALUES ('Geografia');
INSERT INTO Categoria(descricao) VALUES ('Geologia');
INSERT INTO Categoria(descricao) VALUES ('Gestão Empresarial');
INSERT INTO Categoria(descricao) VALUES ('História');
INSERT INTO Categoria(descricao) VALUES ('Hotelaria');
INSERT INTO Categoria(descricao) VALUES ('Informática/T.I.');
INSERT INTO Categoria(descricao) VALUES ('Internet');
INSERT INTO Categoria(descricao) VALUES ('Jornalismo');
INSERT INTO Categoria(descricao) VALUES ('Letras');
INSERT INTO Categoria(descricao) VALUES ('Logística');
INSERT INTO Categoria(descricao) VALUES ('Manutenção Industrial');
INSERT INTO Categoria(descricao) VALUES ('Manutenção Predial');
INSERT INTO Categoria(descricao) VALUES ('Marketing');
INSERT INTO Categoria(descricao) VALUES ('Matemática/Estatística');
INSERT INTO Categoria(descricao) VALUES ('Medicina/Hospitalar');
INSERT INTO Categoria(descricao) VALUES ('Meteorologia');
INSERT INTO Categoria(descricao) VALUES ('Mineração');
INSERT INTO Categoria(descricao) VALUES ('Moda');
INSERT INTO Categoria(descricao) VALUES ('Museologia');
INSERT INTO Categoria(descricao) VALUES ('Música');
INSERT INTO Categoria(descricao) VALUES ('Nutrição');
INSERT INTO Categoria(descricao) VALUES ('Oceanografia');
INSERT INTO Categoria(descricao) VALUES ('Odontologia');
INSERT INTO Categoria(descricao) VALUES ('Organização de Eventos/Produção Cultural');
INSERT INTO Categoria(descricao) VALUES ('Organização e Métodos');
INSERT INTO Categoria(descricao) VALUES ('Pesquisa de Mercado');
INSERT INTO Categoria(descricao) VALUES ('Petrolífera');
INSERT INTO Categoria(descricao) VALUES ('Produção/Fabricação');
INSERT INTO Categoria(descricao) VALUES ('Propaganda');
INSERT INTO Categoria(descricao) VALUES ('Psicologia');
INSERT INTO Categoria(descricao) VALUES ('Qualidade');
INSERT INTO Categoria(descricao) VALUES ('Química');
INSERT INTO Categoria(descricao) VALUES ('Radialismo e Televisão');
INSERT INTO Categoria(descricao) VALUES ('Recursos Humanos');
INSERT INTO Categoria(descricao) VALUES ('Relações Internacionais');
INSERT INTO Categoria(descricao) VALUES ('Relações Públicas');
INSERT INTO Categoria(descricao) VALUES ('Secretariado');
INSERT INTO Categoria(descricao) VALUES ('Segurança e Saúde no Trabalho');
INSERT INTO Categoria(descricao) VALUES ('Segurança Patrimonial');
INSERT INTO Categoria(descricao) VALUES ('Seguros');
INSERT INTO Categoria(descricao) VALUES ('Serviço Social');
INSERT INTO Categoria(descricao) VALUES ('Serviços Administrativos');
INSERT INTO Categoria(descricao) VALUES ('Serviços Domésticos');
INSERT INTO Categoria(descricao) VALUES ('Serviços Especializados - Açougue');
INSERT INTO Categoria(descricao) VALUES ('Serviços Especializados - Padaria/Confeitaria');
INSERT INTO Categoria(descricao) VALUES ('Serviços Especializados - Peixaria');
INSERT INTO Categoria(descricao) VALUES ('Serviços Gerais');
INSERT INTO Categoria(descricao) VALUES ('Serviços Técnicos - Elétricos');
INSERT INTO Categoria(descricao) VALUES ('Serviços Técnicos - Eletrônicos');
INSERT INTO Categoria(descricao) VALUES ('Serviços Técnicos - Mecânicos');
INSERT INTO Categoria(descricao) VALUES ('Serviços Técnicos - Outros');
INSERT INTO Categoria(descricao) VALUES ('Suprimentos');
INSERT INTO Categoria(descricao) VALUES ('Telecomunicações');
INSERT INTO Categoria(descricao) VALUES ('Terapia Ocupacional');
INSERT INTO Categoria(descricao) VALUES ('Terceiro Setor/Responsabilidade Social');
INSERT INTO Categoria(descricao) VALUES ('Tradução/Interpretação');
INSERT INTO Categoria(descricao) VALUES ('Transporte Aéreo');
INSERT INTO Categoria(descricao) VALUES ('Transporte Marítimo');
INSERT INTO Categoria(descricao) VALUES ('Transporte Terrestre');
INSERT INTO Categoria(descricao) VALUES ('Tributária');
INSERT INTO Categoria(descricao) VALUES ('Turismo');
INSERT INTO Categoria(descricao) VALUES ('Vendas');
INSERT INTO Categoria(descricao) VALUES ('Vendas - Varejo');
INSERT INTO Categoria(descricao) VALUES ('Vendas Técnicas');
INSERT INTO Categoria(descricao) VALUES ('Veterinária');
INSERT INTO Categoria(descricao) VALUES ('Web Design');
INSERT INTO Categoria(descricao) VALUES ('Zoologia');
INSERT INTO Categoria(descricao) VALUES ('Zootecnia');

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

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`RecuperaLogin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`RecuperaLogin` (
  `idRecuperaLogin` INT NOT NULL AUTO_INCREMENT,
  `token` VARCHAR(255) NOT NULL,
  `data_criacao` DATETIME NOT NULL,
  `Empresa_idEmpresa` INT NULL,
  `Candidato_idCandidato` INT NULL,
  PRIMARY KEY (`idRecuperaLogin`),
  UNIQUE INDEX `Candidato_idCandidato_UNIQUE` (`Candidato_idCandidato` ASC),
  UNIQUE INDEX `Empresa_idEmpresa_UNIQUE` (`Empresa_idEmpresa` ASC),
    FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `pcdcurriculo`.`Empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (`Candidato_idCandidato`) REFERENCES `pcdcurriculo`.`Candidato` (`idCandidato`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `pcdcurriculo`.`DisparaEmail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pcdcurriculo`.`DisparaEmail` (
  `idDisparaEmail` INT NOT NULL AUTO_INCREMENT,
  `email_candidato` VARCHAR(45) NOT NULL,
  `titulo_vaga` VARCHAR(60) NOT NULL,
  `Vaga_idVaga` INT NOT NULL,
  PRIMARY KEY (`idDisparaEmail`),
  UNIQUE INDEX `email_candidato_UNIQUE` (`email_candidato` ASC),
    FOREIGN KEY (`Vaga_idVaga`) REFERENCES `pcdcurriculo`.`Vaga` (`idVaga`) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = InnoDB;

CREATE USER 'publico'@'localhost' IDENTIFIED BY 'ede02e60172b237f72e48299bce8ac8e';
GRANT ALL PRIVILEGES ON pcdcurriculo.* TO 'publico'@'localhost';



