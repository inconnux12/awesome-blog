-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 20 mars 2021 à 12:14
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `name_cat`, `created_at`, `updated_at`) VALUES
(8, 'biologie', '2021-03-19 20:01:03', '2021-03-19 20:01:03'),
(5, 'informatique', '2021-03-19 10:07:30', '2021-03-19 13:36:53'),
(9, 'medecine', '2021-03-19 20:03:23', '2021-03-19 20:03:23'),
(10, 'physique', '2021-03-19 20:04:28', '2021-03-19 20:04:28'),
(11, 'chimie', '2021-03-20 12:09:13', '2021-03-20 12:09:13');

-- --------------------------------------------------------

--
-- Structure de la table `markbook`
--

DROP TABLE IF EXISTS `markbook`;
CREATE TABLE IF NOT EXISTS `markbook` (
  `id_pub` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `id_pub` (`id_pub`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `markbook`
--

INSERT INTO `markbook` (`id_pub`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 23, '2021-03-19 20:05:09', '2021-03-19 20:05:09'),
(1, 1, '2021-03-19 19:30:19', '2021-03-19 19:30:19'),
(1, 23, '2021-03-19 20:05:05', '2021-03-19 20:05:05'),
(5, 1, '2021-03-19 21:45:58', '2021-03-19 21:45:58');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id_pub` int(3) NOT NULL AUTO_INCREMENT,
  `title_pub` varchar(30) NOT NULL,
  `desc_pub` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cont_pub` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_cat` int(3) NOT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id_pub`, `title_pub`, `desc_pub`, `cont_pub`, `created_at`, `uploaded_at`, `id_cat`) VALUES
(1, 'php in laravel', 'this is an article about php in laravel', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. \r\n                  Deserunt consequuntur vero, sapiente minus soluta nisi enim debitis id!\r\n                  Dolorem molestias accusamus eos possimus,\r\n                  incidunt nobis repellat eum laboriosam quam aliquam?', '2021-03-18 14:37:43', '2021-03-19 10:08:31', 5),
(3, 'react JS', 'this article is about reactjs', 'React est une bibliothÃ¨que JavaScript libre dÃ©veloppÃ©e par Facebook depuis 2013. Le but principal de cette bibliothÃ¨que est de faciliter la crÃ©ation d\'application web monopage, via la crÃ©ation de composants dÃ©pendant d\'un Ã©tat et gÃ©nÃ©rant une page HTML Ã  chaque changement d\'Ã©tat', '2021-03-18 15:01:51', '2021-03-19 10:08:31', 5),
(4, 'Angular JS', 'this article is about AngularJS', 'DÃ©veloppÃ© par Google, Angular est un Framework open source Ã©crit en JavaScript qui permet la crÃ©ation dâ€™applications Web et plus particuliÃ¨rement de ce quâ€™on appelle des Single Page Applications', '2021-03-18 15:03:10', '2021-03-19 10:08:31', 5),
(5, 'cancer', 'this article is about cancer.', 'Le cancer est une maladie provoquée par la transformation de cellules qui deviennent anormales et prolifèrent de façon excessive. Ces cellules déréglées finissent parfois par former une masse qu\'on appelle tumeur maligne.', '2021-03-19 10:09:38', '2021-03-19 10:09:38', 6),
(7, 'JSON ', 'this article is about Json', 'JavaScript Object Notation (JSON) est un format de donnÃ©es textuelles dÃ©rivÃ© de la notation des objets du langage JavaScript. Il permet de reprÃ©senter de l\'information structurÃ©e comme le permet XML par exemple.', '2021-03-19 20:00:14', '2021-03-19 20:00:14', 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

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
