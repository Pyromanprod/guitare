-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 01 sep. 2021 à 06:05
-- Version du serveur : 5.7.35
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `guitare`
--
CREATE DATABASE IF NOT EXISTS `guitare` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `guitare`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(36) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'acoustique'),
(2, 'basse'),
(3, 'electrique');

-- --------------------------------------------------------

--
-- Structure de la table `fabricant`
--

DROP TABLE IF EXISTS `fabricant`;
CREATE TABLE IF NOT EXISTS `fabricant` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_fabricant` varchar(36) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fabricant`
--

INSERT INTO `fabricant` (`id`, `nom_fabricant`, `nationalite`, `date_creation`) VALUES
(1, 'Lag', 'FR', '1930-05-24'),
(2, 'Vigier', 'FR', '1980-08-17'),
(3, 'Francis', 'USA', '1910-02-20');

-- --------------------------------------------------------

--
-- Structure de la table `guitare`
--

DROP TABLE IF EXISTS `guitare`;
CREATE TABLE IF NOT EXISTS `guitare` (
  `id_guitare` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_model` varchar(36) NOT NULL,
  `annee_prod` int(11) NOT NULL,
  `prix` float NOT NULL,
  `nb_corde` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fabricant_id` int(10) UNSIGNED NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_guitare`),
  KEY `fabricant_id` (`fabricant_id`,`categorie_id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `guitare`
--

INSERT INTO `guitare` (`id_guitare`, `nom_model`, `annee_prod`, `prix`, `nb_corde`, `image`, `fabricant_id`, `categorie_id`) VALUES
(1, 'premiereguitare', 2020, 2000, 5, NULL, 1, 2),
(2, 'deuxiemeguitare', 1920, 50000, 1, NULL, 2, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `guitare`
--
ALTER TABLE `guitare`
  ADD CONSTRAINT `guitare_ibfk_1` FOREIGN KEY (`fabricant_id`) REFERENCES `fabricant` (`id`),
  ADD CONSTRAINT `guitare_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
