-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Facture_DB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Facture_DB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Facture_DB` DEFAULT CHARACTER SET utf8 ;
USE `Facture_DB` ;

-- -----------------------------------------------------
-- Table `Facture_DB`.`Marque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Marque` (
  `idMarque` INT NOT NULL AUTO_INCREMENT,
  `lib_Marque` VARCHAR(45) NOT NULL,
  `logo_Marque` BLOB NULL,
  PRIMARY KEY (`idMarque`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Categorie` (
  `idCategorie` INT NOT NULL AUTO_INCREMENT,
  `lib_Categorie` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`idCategorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Sous_Categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Sous_Categorie` (
  `idSous_Categorie` INT NOT NULL AUTO_INCREMENT,
  `lib_Sous_Categorie` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  `Categorie_idCategorie` INT NOT NULL,
  PRIMARY KEY (`idSous_Categorie`, `Categorie_idCategorie`),
  INDEX `fk_Sous_Categorie_Categorie1_idx` (`Categorie_idCategorie` ASC) ,
  CONSTRAINT `fk_Sous_Categorie_Categorie1`
    FOREIGN KEY (`Categorie_idCategorie`)
    REFERENCES `Facture_DB`.`Categorie` (`idCategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Solde_Article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Solde_Article` (
  `idSolde_Article` INT NOT NULL AUTO_INCREMENT,
  `lib_Solde` VARCHAR(100) NULL,
  `date_Debut_Solde` DATETIME NOT NULL,
  `date_Fin_Solde` DATETIME NULL,
  `pourcentage` DECIMAL NOT NULL,
  PRIMARY KEY (`idSolde_Article`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`CodePostale_Ville`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`CodePostale_Ville` (
  `CodePostale` INT NOT NULL,
  `ville` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`CodePostale`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Adresse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Adresse` (
  `idAdresse` INT NOT NULL AUTO_INCREMENT,
  `Adresse` TEXT(300) NOT NULL,
  `CodePostale` INT NOT NULL,
  PRIMARY KEY (`idAdresse`, `CodePostale`),
  INDEX `fk_Adresse_CodePostale_Ville1_idx` (`CodePostale` ASC) ,
  CONSTRAINT `fk_Adresse_CodePostale_Ville1`
    FOREIGN KEY (`CodePostale`)
    REFERENCES `Facture_DB`.`CodePostale_Ville` (`CodePostale`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Fournisseur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Fournisseur` (
  `idFournisseur` INT NOT NULL AUTO_INCREMENT,
  `nom_Fournisseur` VARCHAR(45) NOT NULL,
  `numero_tel` VARCHAR(45) NOT NULL,
  `e_mail` VARCHAR(100) NOT NULL,
  `idAdresse` INT NOT NULL,
  PRIMARY KEY (`idFournisseur`, `idAdresse`),
  INDEX `fk_Fournisseur_Adresse1_idx` (`idAdresse` ASC) ,
  CONSTRAINT `fk_Fournisseur_Adresse1`
    FOREIGN KEY (`idAdresse`)
    REFERENCES `Facture_DB`.`Adresse` (`idAdresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Article` (
  `idArticle` INT NOT NULL AUTO_INCREMENT,
  `lib_Article` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  `image_Article` BLOB NULL,
  `qte_Stock` INT NOT NULL,
  `date_Ajout` DATE NOT NULL,
  `prix_Unitaire_HT` DECIMAL NOT NULL,
  `montant_TVA` DECIMAL NOT NULL,
  `idMarque` INT NOT NULL,
  `idSous_Categorie` INT NULL,
  `idSolde_Article` INT NULL,
  `idCategorie` INT NULL,
  `idFournisseur` INT NOT NULL,
  PRIMARY KEY (`idArticle`, `idMarque`, `idSous_Categorie`, `idSolde_Article`, `idCategorie`, `idFournisseur`),
  INDEX `fk_Article_Marque_idx` (`idMarque` ASC) ,
  INDEX `fk_Article_Sous_Categorie1_idx` (`idSous_Categorie` ASC) ,
  INDEX `fk_Article_Solde_Article1_idx` (`idSolde_Article` ASC) ,
  INDEX `fk_Article_Categorie1_idx` (`idCategorie` ASC) ,
  INDEX `fk_Article_Fournisseur1_idx` (`idFournisseur` ASC) ,
  CONSTRAINT `fk_Article_Marque`
    FOREIGN KEY (`idMarque`)
    REFERENCES `Facture_DB`.`Marque` (`idMarque`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Article_Sous_Categorie1`
    FOREIGN KEY (`idSous_Categorie`)
    REFERENCES `Facture_DB`.`Sous_Categorie` (`idSous_Categorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Article_Solde_Article1`
    FOREIGN KEY (`idSolde_Article`)
    REFERENCES `Facture_DB`.`Solde_Article` (`idSolde_Article`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Article_Categorie1`
    FOREIGN KEY (`idCategorie`)
    REFERENCES `Facture_DB`.`Categorie` (`idCategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Article_Fournisseur1`
    FOREIGN KEY (`idFournisseur`)
    REFERENCES `Facture_DB`.`Fournisseur` (`idFournisseur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Mode_Commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Mode_Commande` (
  `idMode` INT NOT NULL AUTO_INCREMENT,
  `lib_Mode` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMode`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NULL,
  `numero_Tel` VARCHAR(45) NOT NULL,
  `e_mail` VARCHAR(100) NOT NULL,
  `sexe` VARCHAR(45) NOT NULL,
  `date_Naissance` DATE NULL,
  `idAdresse` INT NOT NULL,
  PRIMARY KEY (`idClient`, `idAdresse`),
  INDEX `fk_Client_Adresse1_idx` (`idAdresse` ASC) ,
  CONSTRAINT `fk_Client_Adresse1`
    FOREIGN KEY (`idAdresse`)
    REFERENCES `Facture_DB`.`Adresse` (`idAdresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Remise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Remise` (
  `idRemise` INT NOT NULL AUTO_INCREMENT,
  `lib_Remise` VARCHAR(60) NULL,
  `date_debut_Remise` DATE NULL,
  `date_Fin_Remise` DATE NULL,
  PRIMARY KEY (`idRemise`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Commande` (
  `numero_Commande` INT NOT NULL AUTO_INCREMENT,
  `date_Commande` DATETIME NOT NULL,
  `etat_Commande` BIT(0) NULL,
  `numero_Tel` VARCHAR(45) NOT NULL,
  `e_mail` VARCHAR(100) NOT NULL,
  `idMode_Commande` INT NOT NULL,
  `idClient` INT NOT NULL,
  `idRemise` INT NULL,
  PRIMARY KEY (`numero_Commande`, `idMode_Commande`, `idClient`, `idRemise`),
  INDEX `fk_Commande_Mode_Commande1_idx` (`idMode_Commande` ASC) ,
  INDEX `fk_Commande_Client1_idx` (`idClient` ASC) ,
  INDEX `fk_Commande_Remise1_idx` (`idRemise` ASC) ,
  CONSTRAINT `fk_Commande_Mode_Commande1`
    FOREIGN KEY (`idMode_Commande`)
    REFERENCES `Facture_DB`.`Mode_Commande` (`idMode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_Client1`
    FOREIGN KEY (`idClient`)
    REFERENCES `Facture_DB`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_Remise1`
    FOREIGN KEY (`idRemise`)
    REFERENCES `Facture_DB`.`Remise` (`idRemise`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Articles_Commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Articles_Commande` (
  `idArticle` INT NOT NULL,
  `numero_Commande` INT NOT NULL,
  `qte_Commande` INT NOT NULL,
  PRIMARY KEY (`idArticle`, `numero_Commande`),
  INDEX `fk_Article_has_Commande_Commande1_idx` (`numero_Commande` ASC) ,
  INDEX `fk_Article_has_Commande_Article1_idx` (`idArticle` ASC) ,
  CONSTRAINT `fk_Article_has_Commande_Article1`
    FOREIGN KEY (`idArticle`)
    REFERENCES `Facture_DB`.`Article` (`idArticle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Article_has_Commande_Commande1`
    FOREIGN KEY (`numero_Commande`)
    REFERENCES `Facture_DB`.`Commande` (`numero_Commande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Facture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Facture` (
  `numero_Facture` INT NOT NULL AUTO_INCREMENT,
  `numero_Commande` INT NOT NULL,
  PRIMARY KEY (`numero_Facture`, `numero_Commande`),
  INDEX `fk_Facture_Commande1_idx` (`numero_Commande` ASC) ,
  CONSTRAINT `fk_Facture_Commande1`
    FOREIGN KEY (`numero_Commande`)
    REFERENCES `Facture_DB`.`Commande` (`numero_Commande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Magasin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Magasin` (
  `idMagasin` INT NOT NULL AUTO_INCREMENT,
  `lib_Magasin` VARCHAR(100) NOT NULL,
  `numero_Tel` VARCHAR(45) NOT NULL,
  `e_mail` VARCHAR(100) NOT NULL,
  `idAdresse` INT NOT NULL,
  PRIMARY KEY (`idMagasin`, `idAdresse`),
  INDEX `fk_Magasin_Adresse1_idx` (`idAdresse` ASC) ,
  CONSTRAINT `fk_Magasin_Adresse1`
    FOREIGN KEY (`idAdresse`)
    REFERENCES `Facture_DB`.`Adresse` (`idAdresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Mode_Livraison`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Mode_Livraison` (
  `idMode` INT NOT NULL AUTO_INCREMENT,
  `lib_Mode` VARCHAR(60) NULL,
  PRIMARY KEY (`idMode`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Livraison`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Livraison` (
  `idLivraison` INT NOT NULL AUTO_INCREMENT,
  `delai_Livraison` DATE NOT NULL,
  `numero_Commande` INT NOT NULL,
  `idAdresse` INT NULL,
  `idMode_Livraison` INT NOT NULL,
  `idMagasin` INT NULL,
  PRIMARY KEY (`idLivraison`, `numero_Commande`, `idAdresse`, `idMode_Livraison`, `idMagasin`),
  INDEX `fk_Livraison_Commande1_idx` (`numero_Commande` ASC) ,
  INDEX `fk_Livraison_Adresse1_idx` (`idAdresse` ASC) ,
  INDEX `fk_Livraison_Mode_Livraison1_idx` (`idMode_Livraison` ASC) ,
  INDEX `fk_Livraison_Magasin1_idx` (`idMagasin` ASC) ,
  CONSTRAINT `fk_Livraison_Commande1`
    FOREIGN KEY (`numero_Commande`)
    REFERENCES `Facture_DB`.`Commande` (`numero_Commande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Livraison_Adresse1`
    FOREIGN KEY (`idAdresse`)
    REFERENCES `Facture_DB`.`Adresse` (`idAdresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Livraison_Mode_Livraison1`
    FOREIGN KEY (`idMode_Livraison`)
    REFERENCES `Facture_DB`.`Mode_Livraison` (`idMode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Livraison_Magasin1`
    FOREIGN KEY (`idMagasin`)
    REFERENCES `Facture_DB`.`Magasin` (`idMagasin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Aticle_Livraison`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Aticle_Livraison` (
  `idAticle_Livraison` INT NOT NULL AUTO_INCREMENT,
  `montant_TVA` DECIMAL NOT NULL,
  `montant_Livraison_HT` DECIMAL NULL,
  `idArticle` INT NOT NULL,
  PRIMARY KEY (`idAticle_Livraison`, `idArticle`),
  INDEX `fk_Aticle_Livraison_Article1_idx` (`idArticle` ASC) ,
  CONSTRAINT `fk_Aticle_Livraison_Article1`
    FOREIGN KEY (`idArticle`)
    REFERENCES `Facture_DB`.`Article` (`idArticle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Facture_DB`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Facture_DB`.`Utilisateur` (
  `idUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `mdp` VARCHAR(45) NOT NULL,
  `e_mail` VARCHAR(100) NOT NULL,
  `status` VARCHAR(10) NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
