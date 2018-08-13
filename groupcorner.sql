-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 août 2018 à 16:28
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
  `parent` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `IDX_C46160443D8E604F` (`parent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gcv2contents`
--

INSERT INTO `gcv2contents` (`id`, `parent`, `slug`, `type`, `sub_type`, `sub_type_id`, `smarty`, `name`, `css_class`, `latitude`, `longitude`, `radius`, `place_str`, `lastmod`, `date_published`, `active`) VALUES
(1, NULL, 'test', NULL, NULL, NULL, 1, 'test1', 'main.css', 2, 2, 2, 'place des Jacobins', '2018-08-13 00:00:00', '2018-08-14 00:00:00', 1),
(2, NULL, 'test2', NULL, NULL, NULL, 1, 'test2', 'main.css', 2, 2, 2, 'place des Jacobins', '2018-08-13 00:00:00', '2018-08-14 00:00:00', 1);

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
  `meta_title` varchar(200) NOT NULL,
  `meta_description` longtext NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `h1_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Article_Traduction` (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gcv2contents_i18n`
--

INSERT INTO `gcv2contents_i18n` (`id`, `content_id`, `lang`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `h1_title`) VALUES
(1, 1, 'fr', 'testlang', 'test hotel toto', 'lorem ipsum toto test hotel', 'test toto hotel', 'test'),
(2, 1, 'fr', 'testlang2', 'test hotel toto titi', 'lorem ipsum toto test hotel titi', 'test toto hotel titi', 'titi'),
(3, 2, 'fr', 'testlang2', 'hotel toto titi', 'lorem ipsum toto hotel titi', ' toto hotel titi', 'titi'),
(4, 2, 'fr', 'testlang3', 'hotel toto titi galapagos', 'lorem ipsum toto hotel galapagos', ' toto hotel titi', 'galapagos');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gcv2contents`
--
ALTER TABLE `gcv2contents`
  ADD CONSTRAINT `FK_C46160443D8E604F` FOREIGN KEY (`parent`) REFERENCES `gcv2contents` (`id`);

--
-- Contraintes pour la table `gcv2contents_i18n`
--
ALTER TABLE `gcv2contents_i18n`
  ADD CONSTRAINT `FK_Article_Traduction` FOREIGN KEY (`content_id`) REFERENCES `gcv2contents` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
