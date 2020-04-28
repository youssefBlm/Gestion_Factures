INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `login`, `mdp`, `e_mail`, `status`) VALUES
(1, 'BOUALAM', 'YOUSSEF', 'admin', '12345', 'youssefblm@live.fr', 'admin'),
(2, 'blm', 'brahim', 'slaiver', '12345', 'slaiver.blm@live.fr', NULL),
(3, 'blm', 'hamid', 'hamid', '12345', 'hamidblm@hotmail.com', 'com');





INSERT INTO `codepostale_ville` (`CodePostale`, `ville`) VALUES
(1200, 'Haute-Savoie'),
(13780, 'Var'),
(31000, 'TOULOUSE'),
(31100, 'TOULOUSE'),
(31200, 'TOULOUSE'),
(31300, 'TOULOUSE'),
(31400, 'TOULOUSE'),
(31500, 'TOULOUSE'),
(34000, 'MONTPELLIER'),
(34060, 'MONTPELLIER'),
(34070, 'MONTPELLIER'),
(34080, 'MONTPELLIER'),
(34090, 'MONTPELLIER'),
(37160, 'Vienne'),
(68100, 'MULHOUSE'),
(68350, 'BRUNSTATT'),
(75001, 'PARIS'),
(75002, 'PARIS'),
(75003, 'PARIS'),
(75004, 'PARIS'),
(75005, 'PARIS');


INSERT INTO `adresse` (`idAdresse`, `Adresse`, `CodePostale`) VALUES
(1, '26 RUE DES FRÈRES LUMIERE', 68350),
(2, 'N002, 15 rue des frères lumiere', 68350),
(3, 'N123, 22 rue des frères lumiere', 34080);




INSERT INTO `categorie` (`idCategorie`, `lib_Categorie`, `description`) VALUES
(1, 'NULL', 'Article sans catégorie` '),
(2, 'Catégorie001', 'Catégorie Numéro 001 '),
(3, 'Catégorie002', 'Catégorie Numéro 002 '),
(4, 'Catégorie003 ', 'Catégorie Numéro 003'),
(5, 'Catégorie004', 'Catégorie Numéro 004'),
(6, 'Catégorie005', 'Catégorie Numéro 005'),
(7, 'Catégorie006', 'Catégorie Numéro 006'),
(8, 'Catégorie007', 'Catégorie Numéro 007'),
(9, 'Catégorie008', 'Catégorie Numéro 008'),
(10, 'Catégorie009', 'Catégorie Numéro 009');

INSERT INTO `sous_categorie` (`idSous_Categorie`, `lib_Sous_Categorie`, `description`, `Categorie_idCategorie`) VALUES
(1, 'NULL', 'Article sans Sous-Catégorie', 1),
(2, 'SousCatégorie0012', 'Sous-Catégorie numéro 0012', 2),
(3, 'SousCatégorie0013', 'Sous-Catégorie numéro 0013', 2),
(4, 'SousCatégorie0031', 'Sous-Catégorie numéro 0031', 3),
(5, 'SousCatégorie0031', 'Sous-Catégorie numéro 0032', 3),
(6, 'SousCatégorie0041', 'Sous-Catégorie numéro 0041', 4),
(7, 'SousCatégorie0033', 'Sous-Catégorie numéro 0033', 3),
(8, 'SousCatégorie0042', 'Sous-Catégorie numéro 0042', 4),
(9, 'SousCatégorie0051', 'Sous-Catégorie numéro 0051', 5);

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `numero_Tel`, `e_mail`, `sexe`, `date_Naissance`, `idAdresse`) VALUES
(1, 'DUVAL', 'Adam', '0606465465', 'yoko', 'masculin', '2020-04-14', 2),
(2, 'FAURE', 'Ambre', '0746465465', 'yoko', 'féminin', '2020-04-14', 1),
(3, 'Thomas', 'Zoé', '0646465465', 'yoko', 'féminin', '2020-04-14', 1),
(4, 'GARNIER', 'Paul', '0759884106', 'youssefblm@live.fr', 'masculin', '2020-04-11', 3);



INSERT INTO `fournisseur` (`idFournisseur`, `nom_Fournisseur`, `numero_tel`, `e_mail`, `idAdresse`) VALUES
(1, 'Fournisseur001', '0655661122', 'fournisseur001@gmail.com', 3);


INSERT INTO `marque` (`idMarque`, `lib_Marque`, `logo_Marque`) VALUES
(1, 'Marque 01', NULL),
(2, 'Marque 02', NULL);


INSERT INTO `mode_commande` (`idMode`, `lib_Mode`) VALUES
(1, 'A emporter'),
(2, 'En Livraison');


INSERT INTO `mode_livraison` (`idMode`, `lib_Mode`) VALUES
(1, 'A domicile'),
(2, 'Au magasin');


INSERT INTO `solde_article` (`idSolde_Article`, `lib_Solde`, `date_Debut_Solde`, `date_Fin_Solde`, `pourcentage`) VALUES
(1, 'NULL', '2020-04-18 00:00:00', '2030-04-30 00:00:00', 0),
(2, 'Solde de printemps', '2020-04-18 00:00:00', '2020-04-30 00:00:00', 0.4);




INSERT INTO `article` (`idArticle`, `lib_Article`, `description`, `image_Article`, `qte_Stock`, `date_Ajout`, `prix_Unitaire_HT`, `montant_TVA`, `idMarque`, `idSous_Categorie`, `idSolde_Article`, `idCategorie`, `idFournisseur`) VALUES
 (1, 'Produit_N001', NULL, NULL, '2000', '2020-04-17', '10', '0.2', '2', '1', '1', '2', '1'),
 (2, 'Produit_N002', NULL, NULL, '2000', '2020-04-17', '10', '0.2', '2', '1', '2', '2', '1');
 
 INSERT INTO `magasin` (`idMagasin`, `lib_Magasin`, `numero_Tel`, `e_mail`, `idAdresse`) VALUES 
 (NULL, 'Magasin001_MULHOUSE', '0706060606', 'magasin001mulhouse@gmail.com', '1'),
(NULL, 'Magasin002_MULHOUSE', '0706060606', 'magasin002mulhouse@gmail.com', '1'),
(NULL, 'Magasin003_BRUNSTTAT', '0706060606', 'magasin003mulhouse@gmail.com', '1'),
(NULL, 'Magasin004_PARIS', '0706060606', 'magasin004mulhouse@gmail.com', '1'),
(NULL, 'Magasin005_MONTPELLIER', '0706060606', 'magasin005mulhouse@gmail.com', '1'),
(NULL, 'Magasin006_TOULOUSE', '0706060606', 'magasin006mulhouse@gmail.com', '1'),
(NULL, 'Magasin007_DIDENHEIM', '0706060606', 'magasin007mulhouse@gmail.com', '1');


