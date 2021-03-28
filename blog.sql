-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 28 mars 2021 à 13:40
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(3) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--
-- --------------------------------------------------------

--
-- Structure de la table `markbook`
--

DROP TABLE IF EXISTS `markbook`;
CREATE TABLE IF NOT EXISTS `markbook` (
  `id_mark` int(3) NOT NULL AUTO_INCREMENT,
  `id_pub` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mark`),
  KEY `id_pub` (`id_pub`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `markbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id_pub` int(3) NOT NULL AUTO_INCREMENT,
  `title_pub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `desc_pub` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cont_pub` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `img_pub` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tags_pub` text NOT NULL,
  `slug` varchar(30) NOT NULL,
  `id_cat` int(3) NOT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publications`
--
-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_f_name` varchar(20) NOT NULL,
  `user_l_name` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_f_name`, `user_l_name`, `mail`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'root', 'root', 'root@mail.com', 'root', '2021-03-17 12:52:39', '2021-03-17 12:52:39', 1),
(23, 'user', 'user', 'user@mail.com', 'user', '2021-03-18 12:17:16', '2021-03-18 12:17:16', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
