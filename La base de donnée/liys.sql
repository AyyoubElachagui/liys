-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 01 juin 2020 à 18:10
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `liys`
--
CREATE DATABASE IF NOT EXISTS `liys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `liys`;

-- --------------------------------------------------------

--
-- Structure de la table `add_cour`
--
-- Création :  mer. 27 mai 2020 à 21:32
--

CREATE TABLE `add_cour` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `picture_cour` varchar(50) DEFAULT NULL,
  `link_cour` varchar(50) DEFAULT NULL,
  `id_formateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `add_cour`:
--   `id_formateur`
--       `formateur` -> `id`
--

--
-- Déchargement des données de la table `add_cour`
--

INSERT INTO `add_cour` (`id`, `title`, `picture_cour`, `link_cour`, `id_formateur`) VALUES
(1, 'Ado.Net', '.Net.jpg', 'Ado.Net.php', NULL),
(2, 'Ajax', 'ajax.png', 'Ajax.php', NULL),
(3, 'C++', 'C.png', 'C++.php', NULL),
(4, 'php', 'php.png', 'Cphp.php', NULL),
(5, 'Html5 & Css3', 'html5css3.png', 'html.php', NULL),
(6, 'JavaScript', 'js.png', 'javascript.php', NULL),
(7, 'jQuery', 'jQuery.png', 'jQuery.php', NULL),
(8, 'jQuery NFP', 'jQuery2.png', 'jQueryNFP.php', NULL),
(9, 'Js & Ajax', 'JsAjax.png', 'JsAjax.php', NULL),
(10, 'Laravel', 'laravel.png', 'laravel.php', NULL),
(11, 'Web Programming', 'webprogramming.png', 'webprogramming.php', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chat_friend`
--
-- Création :  lun. 25 mai 2020 à 21:49
--

CREATE TABLE `chat_friend` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_friend` int(11) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `compteur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `chat_friend`:
--   `id_user`
--       `user_` -> `id`
--   `id_friend`
--       `friends` -> `id_response`
--   `id_friend`
--       `friends` -> `id_request`
--

--
-- Déchargement des données de la table `chat_friend`
--

INSERT INTO `chat_friend` (`id`, `id_user`, `id_friend`, `message`, `compteur`) VALUES
(4, 1, 3, 'sqdqs', 'Mon, 25 May 2020 23:53:51'),
(8, 2, 1, 'sqdsd', 'Mon, 25 May 2020 23:56:11'),
(9, 2, 3, 'qsds', 'Mon, 25 May 2020 23:56:15'),
(10, 1, 2, 'wach hani a sat ', 'Mon, 25 May 2020 23:56:27'),
(11, 2, 1, 'hmd lah w nta ', 'Mon, 25 May 2020 23:56:43'),
(12, 1, 2, 'bikhir a sat w nta ', 'Mon, 25 May 2020 23:56:55');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--
-- Création :  lun. 25 mai 2020 à 21:42
--

CREATE TABLE `formateur` (
  `id` int(11) NOT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `cin` varchar(20) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `email` varchar(140) DEFAULT NULL,
  `password` text,
  `sipnneret` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `centreF` varchar(90) DEFAULT NULL,
  `status_` int(11) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `formateur`:
--

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`id`, `l_name`, `f_name`, `cin`, `user_name`, `email`, `password`, `sipnneret`, `phone`, `gender`, `centreF`, `status_`, `picture`) VALUES
(1, 'Touffela', 'Kneza', 'AA11111', 'touffela_for', 'kneza@kneza.com', '57d2f3c7c68826b5cb60404ccec816c2', 'TDI', 11111111, 'F', 'CFHN', 1, 'contactPic.png');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--
-- Création :  lun. 25 mai 2020 à 21:46
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `id_request` int(11) NOT NULL,
  `id_response` int(11) NOT NULL,
  `status_` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `friends`:
--   `id_request`
--       `user_` -> `id`
--   `id_response`
--       `user_` -> `id`
--

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id`, `id_request`, `id_response`, `status_`) VALUES
(1, 3, 1, 1),
(2, 2, 3, 1),
(4, 1, 2, 1),
(5, 3, 4, 0),
(6, 3, 5, 1),
(7, 3, 5, 1),
(8, 3, 5, 1),
(9, 5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--
-- Création :  lun. 25 mai 2020 à 22:13
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_formateur` int(11) DEFAULT NULL,
  `statut` text,
  `picture` varchar(100) DEFAULT NULL,
  `date_` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `news`:
--   `id_user`
--       `user_` -> `id`
--   `id_formateur`
--       `formateur` -> `id`
--

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `id_user`, `id_formateur`, `statut`, `picture`, `date_`) VALUES
(15, 3, NULL, 'hello', '', 'Tue, 26 May 2020 00:38:54'),
(16, 3, NULL, 'hbhbhbhb', '', 'Tue, 26 May 2020 00:39:26'),
(17, 1, NULL, 'bbbbbbbbbbbb', '', 'Tue, 26 May 2020 00:41:00'),
(18, 1, NULL, 'bbbbbbbbbbbb', '', 'Tue, 26 May 2020 00:41:12'),
(19, 3, NULL, 'hbhbhbhb', '', 'Tue, 26 May 2020 00:42:42'),
(22, 1, NULL, 'mmmmmmmmmmmm', 'html5.png', 'Tue, 26 May 2020 00:47:32');

-- --------------------------------------------------------

--
-- Structure de la table `user_`
--
-- Création :  Dim 24 mai 2020 à 18:14
--

CREATE TABLE `user_` (
  `id` int(11) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `email` varchar(140) DEFAULT NULL,
  `password` text,
  `sipnneret` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `status_` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `user_`:
--

--
-- Déchargement des données de la table `user_`
--

INSERT INTO `user_` (`id`, `last_name`, `first_name`, `user_name`, `email`, `password`, `sipnneret`, `phone`, `gender`, `level`, `picture`, `status_`) VALUES
(1, 'El achagui', 'Ayoub', 'Admin', 'best_way_development@outlook.fr', '57d2f3c7c68826b5cb60404ccec816c2', 'TDI', 640922035, 'M', 'Expert', 'IMG-20171015-WA0025.jpg', 0),
(2, 'Yacouri', 'Zouhir', 'zouhir_pro', 'clash-wld-dh@live.fr', '57d2f3c7c68826b5cb60404ccec816c2', 'TDI', 640922035, 'M', 'Expert', 'IMG-20171004-WA0001.jpg', 0),
(3, 'El achagui', 'Amine', 'Menara', 'best_development@outlook.fr', '57d2f3c7c68826b5cb60404ccec816c2', 'TDI', 640922035, 'M', 'Expert', 'IMG-20170814-WA0000.jpg', 1),
(4, 'chi', 'bante', 'bante', 'bante@bante.com', '57d2f3c7c68826b5cb60404ccec816c2', 'TDI', 644592880, 'F', 'Expert', 'amy.jpg', 0),
(5, 'Wa7d', 'Sata', 'sata', 'sata@sata.com', '57d2f3c7c68826b5cb60404ccec816c2', 'TDI', 122312, 'F', 'EXPERT', 'amy.jpg', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `add_cour`
--
ALTER TABLE `add_cour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `chat_friend`
--
ALTER TABLE `chat_friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_friend` (`id_friend`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`,`id_request`,`id_response`),
  ADD KEY `id_request` (`id_request`),
  ADD KEY `id_response` (`id_response`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_formateur` (`id_formateur`);

--
-- Index pour la table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `add_cour`
--
ALTER TABLE `add_cour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `chat_friend`
--
ALTER TABLE `chat_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `user_`
--
ALTER TABLE `user_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `add_cour`
--
ALTER TABLE `add_cour`
  ADD CONSTRAINT `add_cour_ibfk_1` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id`);

--
-- Contraintes pour la table `chat_friend`
--
ALTER TABLE `chat_friend`
  ADD CONSTRAINT `chat_friend_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_` (`id`),
  ADD CONSTRAINT `chat_friend_ibfk_2` FOREIGN KEY (`id_friend`) REFERENCES `friends` (`id_response`),
  ADD CONSTRAINT `chat_friend_ibfk_3` FOREIGN KEY (`id_friend`) REFERENCES `friends` (`id_request`);

--
-- Contraintes pour la table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`id_request`) REFERENCES `user_` (`id`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`id_response`) REFERENCES `user_` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_` (`id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`id_formateur`) REFERENCES `formateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
