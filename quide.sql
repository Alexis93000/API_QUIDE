-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 08 mars 2019 à 14:19
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

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

CREATE TABLE `categorie` (
  `id_cat` int(10) NOT NULL,
  `nom_cat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`) VALUES
(1, 'bar'),
(2, 'pub'),
(3, 'restaurant'),
(4, 'street food');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_etab` int(10) NOT NULL,
  `nom_etab` varchar(50) NOT NULL,
  `description_etab` text NOT NULL,
  `adresse_etab` varchar(50) NOT NULL,
  `codePostal_etab` int(5) NOT NULL,
  `ville_etab` varchar(40) NOT NULL,
  `tel_etab` varchar(10) NOT NULL,
  `note_etab` int(2) NOT NULL,
  `avis_etab` text NOT NULL,
  `site_etab` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id_etab`, `nom_etab`, `description_etab`, `adresse_etab`, `codePostal_etab`, `ville_etab`, `tel_etab`, `note_etab`, `avis_etab`, `site_etab`) VALUES
(1, 'Institut G4', 'Établissement scolaire future chef de projet ', '30 Rue de turbigo', 75003, 'Paris', '', 1, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie`
--

CREATE TABLE `souscategorie` (
  `id_sou` int(10) NOT NULL,
  `nom_sou` varchar(30) NOT NULL,
  `idcat_sou` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `souscategorieetab`
--

CREATE TABLE `souscategorieetab` (
  `id_sce` int(10) NOT NULL,
  `idetab_sce` int(10) NOT NULL,
  `idsou_sce` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_uti` int(10) NOT NULL,
  `type_uti` varchar(20) NOT NULL,
  `civilite_uti` varchar(20) NOT NULL,
  `nom_uti` varchar(30) NOT NULL,
  `prenom_uti` varchar(40) NOT NULL,
  `dateNaissance_uti` date NOT NULL,
  `tel_uti` varchar(10) NOT NULL,
  `mdp_uti` varchar(40) NOT NULL,
  `email_uti` varchar(50) NOT NULL,
  `adresse_uti` varchar(50) NOT NULL,
  `codePostal_uti` int(5) NOT NULL,
  `ville_uti` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_uti`, `type_uti`, `civilite_uti`, `nom_uti`, `prenom_uti`, `dateNaissance_uti`, `tel_uti`, `mdp_uti`, `email_uti`, `adresse_uti`, `codePostal_uti`, `ville_uti`) VALUES
(1, 'test', 'test', 'test', 'test', '2019-03-07', '0625854120', 'ertyu', 'test@hotmail.fr', 'azerty', 75000, 'Paris');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id_etab`);

--
-- Index pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD PRIMARY KEY (`id_sou`),
  ADD KEY `idcat_sou` (`idcat_sou`);

--
-- Index pour la table `souscategorieetab`
--
ALTER TABLE `souscategorieetab`
  ADD PRIMARY KEY (`id_sce`),
  ADD KEY `idetab_sce` (`idetab_sce`),
  ADD KEY `idsou_sce` (`idsou_sce`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_uti`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id_etab` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  MODIFY `id_sou` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `souscategorieetab`
--
ALTER TABLE `souscategorieetab`
  MODIFY `id_sce` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_uti` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `souscategorie`
--
ALTER TABLE `souscategorie`
  ADD CONSTRAINT `souscategorie_ibfk_1` FOREIGN KEY (`idcat_sou`) REFERENCES `categorie` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
