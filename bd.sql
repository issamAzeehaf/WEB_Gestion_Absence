-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 fév. 2021 à 16:01
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `absenter`
--

CREATE DATABASE db_mini;

use db_mini;

DROP TABLE IF EXISTS `absenter`;
CREATE TABLE IF NOT EXISTS `absenter` (
  `idEtu` int(11) DEFAULT NULL,
  `idAbs` int(11) DEFAULT NULL,
  KEY `idEtu` (`idEtu`),
  KEY `idAbs` (`idAbs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absenter`
--

INSERT INTO `absenter` (`idEtu`, `idAbs`) VALUES
(9, 144),
(11, 145),
(7, 146);

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `idUser` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  KEY `idUser` (`idUser`),
  KEY `idFiliere` (`idFiliere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseigner`
--

INSERT INTO `enseigner` (`idUser`, `idFiliere`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtu` int(11) NOT NULL AUTO_INCREMENT,
  `nomEtu` varchar(30) NOT NULL,
  `prenomEtu` varchar(30) NOT NULL,
  `telEtu` varchar(10) NOT NULL,
  `emailEtu` varchar(100) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  PRIMARY KEY (`idEtu`),
  KEY `idFiliere` (`idFiliere`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtu`, `nomEtu`, `prenomEtu`, `telEtu`, `emailEtu`, `idFiliere`) VALUES
(7, 'hmine', 'amine', '0524352944', 'Aminehmine1@gmail.com', 1),
(9, 'fertahi', 'tarik', '0504896145', 'tarik@gmail.com', 1),
(10, 'limouri', 'hamza', '0589706554', 'l.hamza@gmail.com', 2),
(11, 'azehaf', 'issam', '0601799139', 'issam.azf@gmail.com', 1),
(13, 'Koubaa', 'achraf', '0601020304', 'koubaa@gmail.com', 1),
(14, 'test', 'test', '0601020304', 'test@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `idFiliere` int(11) NOT NULL AUTO_INCREMENT,
  `nomFi` varchar(100) NOT NULL,
  PRIMARY KEY (`idFiliere`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`idFiliere`, `nomFi`) VALUES
(1, 'BDCC 1'),
(2, 'BDCC 2'),
(3, 'BDCC 3'),
(4, 'GLSID 1'),
(5, 'GLSID 2'),
(6, 'GLSID 3');

-- --------------------------------------------------------

--
-- Structure de la table `listeabs`
--

DROP TABLE IF EXISTS `listeabs`;
CREATE TABLE IF NOT EXISTS `listeabs` (
  `idAbs` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `heureDeb` varchar(50) NOT NULL,
  `heureFin` varchar(50) NOT NULL,
  `matiere` varchar(20) NOT NULL,
  PRIMARY KEY (`idAbs`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listeabs`
--

INSERT INTO `listeabs` (`idAbs`, `date`, `heureDeb`, `heureFin`, `matiere`) VALUES
(144, '2021-02-05', '1:30 AM', '3:30 AM', 'TEC'),
(145, '2021-02-05', '1:30 AM', '3:30 AM', 'TEC'),
(146, '2021-02-04', '3:00 AM', '5:00 AM', 'FRANCAIS');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`idUser`, `nom`, `prenom`, `login`, `pass`) VALUES
(1, 'QBADOU', 'Mohammed', 'admin1@enset.com', '1'),
(2, 'KHIAT', 'Azeddine', 'admin2@enset.com', '2');

-- --------------------------------------------------------

--
-- Structure de la table `remplir`
--

DROP TABLE IF EXISTS `remplir`;
CREATE TABLE IF NOT EXISTS `remplir` (
  `idUser` int(11) DEFAULT NULL,
  `idAbs` int(11) DEFAULT NULL,
  KEY `idUser` (`idUser`),
  KEY `idAbs` (`idAbs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remplir`
--

INSERT INTO `remplir` (`idUser`, `idAbs`) VALUES
(1, 144),
(1, 145),
(1, 146);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `enseigner_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `professeur` (`idUser`),
  ADD CONSTRAINT `enseigner_ibfk_2` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`idFiliere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
