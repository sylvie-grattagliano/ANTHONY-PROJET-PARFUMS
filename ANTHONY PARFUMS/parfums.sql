-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 août 2024 à 13:21
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parfums`
--

-- --------------------------------------------------------

--
-- Structure de la table `sylvie`
--

DROP TABLE IF EXISTS `sylvie`;
CREATE TABLE IF NOT EXISTS `sylvie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `genre` text NOT NULL,
  `alcool_degres` int NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `quantite_ml` int NOT NULL,
  `createur` varchar(50) NOT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='CREATION DE MES PARFUMS';

--
-- Déchargement des données de la table `sylvie`
--

INSERT INTO `sylvie` (`id`, `nom`, `genre`, `alcool_degres`, `couleur`, `quantite_ml`, `createur`, `prix`) VALUES
(1, 'coco', 'femme', 75, 'rose', 500, 'coco_sylvie', 100),
(2, 'joe', 'homme', 86, 'jaune', 1000, 'johnBo', 140),
(3, 'berlingo', 'homme', 80, 'ambre', 250, 'berger', 80),
(4, 'harmonie', 'femme', 75, 'bleue', 250, 'Anthony', 120),
(5, 'sensation', 'femme', 86, 'Naturel', 500, 'PascalP', 99),
(6, 'prasanna', 'femme', 80, 'ambre', 1000, 'soliste', 110),
(7, 'tatou', 'homme', 75, 'ambre', 1000, 'douxit', 135),
(8, 'alicia', 'femme', 75, 'orange', 500, 'ac', 300),
(9, 'poupette', 'femme', 80, 'rouge', 250, 'dodo', 67),
(10, 'alibaba', 'homme', 86, 'jaune', 250, 'tonton', 123);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
