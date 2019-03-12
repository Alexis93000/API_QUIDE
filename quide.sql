-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 12 mars 2019 à 15:39
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quide`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(10) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(64) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`) VALUES
(1, 'Les Incontournables'),
(2, 'Je découvre de nouveaux endroits'),
(3, 'J\'ai les crocs'),
(4, 'Je prends qu\'un verre'),
(5, 'Je veux m\'éclater'),
(6, 'Je sors entre amis'),
(7, 'Je me cultive'),
(8, 'Surprends-moi');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id_etab` int(5) NOT NULL AUTO_INCREMENT,
  `nom_etab` varchar(64) NOT NULL,
  `description_etab` text,
  `adresse_etab` varchar(128) NOT NULL,
  `codePostal_etab` int(5) NOT NULL,
  `ville_etab` varchar(128) NOT NULL,
  `site_etab` varchar(64) DEFAULT NULL,
  `sousCat_etab` int(4) NOT NULL,
  PRIMARY KEY (`id_etab`),
  KEY `sousCat_etab` (`sousCat_etab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_eve` int(10) NOT NULL AUTO_INCREMENT,
  `nom_eve` varchar(50) NOT NULL,
  `description_eve` text NOT NULL,
  `adresse_eve` varchar(40) NOT NULL,
  `codePostal_eve` int(5) NOT NULL,
  `ville_eve` varchar(128) NOT NULL,
  `prix_eve` int(2) NOT NULL,
  `paiement_eve` varchar(50) NOT NULL,
  `iduti_eve` int(10) NOT NULL,
  `dateDebut_eve` date NOT NULL,
  `dateFin_eve` date NOT NULL,
  `tel_eve` int(10) NOT NULL,
  `photo` varchar(64) NOT NULL,
  PRIMARY KEY (`id_eve`),
  KEY `evenement_ibfk_1` (`iduti_eve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id_fav` int(10) NOT NULL AUTO_INCREMENT,
  `idetab_fav` int(10) NOT NULL,
  `iduti_fav` int(10) NOT NULL,
  PRIMARY KEY (`id_fav`),
  KEY `idetab_fav` (`idetab_fav`),
  KEY `iduti_fav` (`iduti_fav`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `lieuinsolite`
--

DROP TABLE IF EXISTS `lieuinsolite`;
CREATE TABLE IF NOT EXISTS `lieuinsolite` (
  `id_lieu` int(4) NOT NULL AUTO_INCREMENT,
  `nom_lieu` varchar(128) NOT NULL,
  `adresse_lieu` varchar(64) DEFAULT NULL,
  `codePostal_lieu` int(5) NOT NULL,
  `ville_lieu` varchar(128) NOT NULL,
  `tel_lieu` int(10) DEFAULT NULL,
  `description_lieu` text,
  `verification_lieu` int(2) NOT NULL,
  `sousCat_lieu` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_lieu`),
  KEY `sousCat_lieu` (`sousCat_lieu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `noteetab`
--

DROP TABLE IF EXISTS `noteetab`;
CREATE TABLE IF NOT EXISTS `noteetab` (
  `idNoteEtab` int(4) NOT NULL AUTO_INCREMENT,
  `id_etab` int(4) NOT NULL,
  `noteEtablissement` int(2) NOT NULL,
  PRIMARY KEY (`idNoteEtab`),
  KEY `id_etab` (`id_etab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_pai` int(10) NOT NULL AUTO_INCREMENT,
  `id_eve` int(10) NOT NULL,
  `nompaypal_pai` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pai`),
  KEY `paiement_ibfk_1` (`id_eve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

DROP TABLE IF EXISTS `souscategorie`;
CREATE TABLE IF NOT EXISTS `souscategorie` (
  `id_sou` int(10) NOT NULL AUTO_INCREMENT,
  `nom_sou` varchar(30) NOT NULL,
  PRIMARY KEY (`id_sou`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souscategorie`
--

INSERT INTO `souscategorie` (`id_sou`, `nom_sou`) VALUES
(1, 'Bar'),
(2, 'Pub'),
(3, 'Restaurant'),
(4, 'Street Food'),
(5, 'Nightclub'),
(6, 'Cinéma');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_uti` int(10) NOT NULL AUTO_INCREMENT,
  `type_uti` varchar(20) NOT NULL,
  `civilite_uti` varchar(20) NOT NULL,
  `nom_uti` varchar(30) NOT NULL,
  `prenom_uti` varchar(40) NOT NULL,
  `dateNaissance_uti` date DEFAULT NULL,
  `tel_uti` varchar(10) NOT NULL,
  `mdp_uti` varchar(40) NOT NULL,
  `email_uti` varchar(50) NOT NULL,
  `adresse_uti` varchar(50) DEFAULT NULL,
  `codePostal_uti` int(5) DEFAULT NULL,
  `ville_uti` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_uti`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_uti`, `type_uti`, `civilite_uti`, `nom_uti`, `prenom_uti`, `dateNaissance_uti`, `tel_uti`, `mdp_uti`, `email_uti`, `adresse_uti`, `codePostal_uti`, `ville_uti`) VALUES
(1, 'Particulier', 'Mr', 'MOHAMED', 'Alec', '1997-08-28', '0651101010', 'azerty123', 'alec.mohamedbtssio@gmail.com', '40 rue faubourg', 75003, 'Paris');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`iduti_eve`) REFERENCES `utilisateur` (`id_uti`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`idetab_fav`) REFERENCES `etablissement` (`id_etab`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`iduti_fav`) REFERENCES `utilisateur` (`id_uti`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_eve`) REFERENCES `evenement` (`id_eve`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
