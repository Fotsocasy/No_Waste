-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 oct. 2023 à 08:55
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nowaste`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tel` int NOT NULL,
  `ville` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `email`, `tel`, `ville`, `login`, `mdp`) VALUES
(1, 'root', '', 0, '', 'root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `chauffeurs`
--

DROP TABLE IF EXISTS `chauffeurs`;
CREATE TABLE IF NOT EXISTS `chauffeurs` (
  `idChauffeur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `ville` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quartier` varchar(200) NOT NULL,
  `telephone` text NOT NULL,
  `loginChauffeur` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`idChauffeur`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chauffeurs`
--

INSERT INTO `chauffeurs` (`idChauffeur`, `nom`, `email`, `ville`, `quartier`, `telephone`, `loginChauffeur`, `password`) VALUES
(1, 'Premier chauffeur', '', 'yaounde', 'essos', '690235679', '', ''),
(21, 'Herve1', 'deuxiemeChauffeur@gmail.com', 'yaounde', 'messassi', '6849374023', 'herveae237', 'herveae237'),
(19, 'deuxieme chauffeur', 'deuxiemeChauffeur@gmail.com', 'yaounde', 'messassi', '6849384054', 'jjjonshon2222', 'hjklkjhgf'),
(22, 'John j johnson', 'jjjhonson@gmail.com', 'yaounde', 'essos', '6849384054', 'jjjonshon2222', '1234567'),
(23, 'Herve', 'herveae@gmail.com', 'yaounde', 'mvog Atangana Mballa', '695209406', 'herveae237', 'herveae237');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `idMessage` int NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `messages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`idMessage`, `pseudo`, `messages`) VALUES
(1, 'admin', 'bonjour comment vous allez'),
(2, 'admin', 'bonjour'),
(3, 'admin', 'ugydytdtd'),
(4, 'admin', 'ugydytdtd'),
(5, 'admin', 'tuyu'),
(6, 'admin', 'ghfddg'),
(7, 'admin', 'ghfddg'),
(8, 'admin', 'wEARSDDSF'),
(9, 'YYI', 'IY');

-- --------------------------------------------------------

--
-- Structure de la table `poubelles`
--

DROP TABLE IF EXISTS `poubelles`;
CREATE TABLE IF NOT EXISTS `poubelles` (
  `idPoubelle` int NOT NULL AUTO_INCREMENT,
  `ville` varchar(250) NOT NULL,
  `quartier` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `niveau` float NOT NULL,
  PRIMARY KEY (`idPoubelle`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poubelles`
--

INSERT INTO `poubelles` (`idPoubelle`, `ville`, `quartier`, `description`, `niveau`) VALUES
(1, 'Yaounde', 'petit marche odza', 'C\'est un bac a ordures vert un peu usee', 90),
(29, 'Douala', 'newbell', 'dseydghsfgsfsfg', 30.1),
(30, 'Douala', 'messassi', 'eghherytuyutytretrtrt', 70.39),
(39, 'Douala', 'bonamoussadi', 'poubelle rouge au niveau du carrefour bonamoussadi', 23);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
