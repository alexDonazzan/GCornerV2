-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 août 2018 à 19:43
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `groupcorner`
--

-- --------------------------------------------------------

--
-- Structure de la table `gcv2contents`
--

DROP TABLE IF EXISTS `gcv2contents`;
CREATE TABLE IF NOT EXISTS `gcv2contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(150) NOT NULL,
  `type` enum('general','landing_page') DEFAULT NULL,
  `sub_type` enum('event','geo') DEFAULT NULL,
  `sub_type_id` int(11) DEFAULT NULL,
  `smarty` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `css_class` varchar(20) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `radius` int(11) NOT NULL,
  `place_str` varchar(50) NOT NULL,
  `lastmod` datetime NOT NULL,
  `date_published` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gcv2contents_i18n`
--

DROP TABLE IF EXISTS `gcv2contents_i18n`;
CREATE TABLE IF NOT EXISTS `gcv2contents_i18n` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `meta_description` longtext NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `h1_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gcv2contents_i18n`
--
ALTER TABLE `gcv2contents_i18n`
  ADD CONSTRAINT `gcv2contents_i18n_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `gcv2contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
