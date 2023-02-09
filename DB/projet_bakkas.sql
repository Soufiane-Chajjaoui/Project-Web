-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 23 déc. 2022 à 01:43
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_bakkas`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(12) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `phone`, `email`, `password`, `photo`) VALUES
(1, 'chajjaoui', 'soufian', 607025329, 'schajjaoui@gmail.com', '123456', '../Uploads/1671576219.png');

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement`
--

CREATE TABLE `approvisionnement` (
  `numero` int(12) NOT NULL,
  `date_approvionne` datetime NOT NULL,
  `id` int(12) NOT NULL,
  `reference` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(12) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `deleteAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle`, `deleteAt`) VALUES
(1, 'iphone 7', NULL),
(2, 'telephone', NULL),
(3, 'televesion', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `ref_command` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(12) NOT NULL COMMENT ' FOREIGN KEY Person',
  `statut` tinyint(1) NOT NULL DEFAULT 0,
  `deleteAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `command`
--

INSERT INTO `command` (`ref_command`, `date`, `id`, `statut`, `deleteAt`) VALUES
(84, '2022-11-01 23:00:00', 39, 0, NULL),
(85, '2022-12-20 01:00:22', 39, 0, NULL),
(86, '2022-12-20 01:01:07', 39, 0, NULL),
(87, '2022-12-20 01:01:35', 39, 0, NULL),
(88, '2022-12-20 01:03:44', 39, 0, NULL),
(89, '2022-12-20 01:05:27', 39, 0, NULL),
(90, '2022-12-20 01:05:42', 39, 0, NULL),
(91, '2022-12-20 01:08:03', 39, 0, NULL),
(92, '2022-06-07 01:08:29', 39, 0, NULL),
(93, '2022-06-07 23:00:00', 39, 0, NULL),
(94, '2022-12-20 01:12:26', 39, 0, NULL),
(95, '2022-12-20 01:12:48', 39, 0, NULL),
(96, '2022-12-20 01:13:10', 39, 0, NULL),
(97, '2022-12-20 01:13:57', 39, 0, NULL),
(98, '2022-12-20 01:15:11', 39, 0, NULL),
(99, '0000-00-00 00:00:00', 39, 0, NULL),
(100, '2022-11-08 01:27:25', 39, 0, NULL),
(101, '0000-00-00 00:00:00', 39, 0, NULL),
(102, '2022-12-20 01:30:10', 39, 0, NULL),
(105, '2022-12-20 01:59:41', 39, 0, NULL),
(110, '0000-00-00 00:00:00', 39, 0, NULL),
(111, '2022-12-20 15:57:19', 39, 0, NULL),
(112, '2022-12-20 16:28:45', 39, 0, NULL),
(114, '2022-06-09 16:31:55', 39, 0, NULL),
(115, '2022-06-23 16:32:47', 39, 0, NULL),
(116, '2022-12-20 16:34:06', 39, 0, NULL),
(117, '2022-12-20 16:34:45', 39, 0, NULL),
(118, '2022-12-20 16:35:24', 39, 0, NULL),
(119, '2022-12-20 16:37:07', 39, 0, NULL),
(120, '2022-12-20 16:37:52', 39, 0, NULL),
(121, '2022-12-20 16:40:40', 39, 0, NULL),
(122, '2022-12-20 16:59:38', 39, 0, NULL),
(123, '2022-12-20 17:00:51', 39, 0, NULL),
(124, '2022-12-20 17:00:51', 39, 0, NULL),
(125, '2022-12-20 17:02:02', 39, 0, NULL),
(126, '2022-12-20 17:02:53', 39, 0, NULL),
(127, '2022-12-20 17:05:01', 39, 0, NULL),
(128, '2022-12-20 17:05:46', 39, 0, NULL),
(129, '2022-12-20 17:12:24', 39, 0, NULL),
(130, '2022-12-20 18:20:21', 39, 0, NULL),
(132, '2022-12-20 18:48:30', 43, 0, NULL),
(133, '2022-12-20 22:30:54', 43, 0, NULL),
(134, '2022-12-20 23:41:36', 42, 0, NULL),
(135, '2022-12-20 23:51:52', 41, 0, NULL),
(136, '2022-12-21 14:17:04', 46, 0, NULL),
(137, '2022-12-21 14:20:24', 46, 0, NULL),
(138, '2022-12-21 14:21:34', 46, 0, NULL),
(139, '2022-12-21 14:28:14', 46, 0, NULL),
(140, '2022-12-21 14:29:56', 46, 0, NULL),
(141, '2022-12-21 17:05:06', 46, 0, NULL),
(142, '2022-12-21 17:10:11', 41, 0, NULL),
(143, '2022-12-21 17:10:32', 41, 0, NULL),
(144, '2022-12-21 17:10:33', 41, 0, NULL),
(145, '2022-12-21 17:10:33', 41, 0, NULL),
(146, '2022-12-21 17:11:54', 41, 0, NULL),
(147, '2022-12-21 17:13:43', 41, 0, NULL),
(148, '2022-12-21 17:14:03', 41, 0, NULL),
(149, '2022-12-21 17:14:23', 41, 0, NULL),
(150, '2022-12-21 17:14:49', 41, 0, NULL),
(151, '2022-12-21 17:17:29', 39, 0, NULL),
(152, '2022-12-21 17:17:29', 39, 0, NULL),
(153, '2022-12-21 17:18:16', 39, 0, NULL),
(154, '2022-12-21 17:18:57', 39, 0, NULL),
(155, '2022-12-21 17:20:01', 42, 0, NULL),
(156, '2022-12-21 17:21:26', 46, 0, NULL),
(157, '2022-12-21 17:24:04', 41, 0, NULL),
(158, '2022-12-21 17:24:27', 41, 0, NULL),
(159, '2022-12-21 17:39:23', 41, 0, NULL),
(160, '2022-12-21 17:39:44', 42, 0, NULL),
(161, '2022-12-21 17:42:40', 40, 0, NULL),
(162, '2022-12-21 17:46:24', 41, 0, NULL),
(163, '2022-12-21 17:46:38', 41, 0, NULL),
(164, '2022-12-21 21:27:07', 41, 0, NULL),
(165, '2022-12-21 23:07:20', 42, 0, NULL),
(166, '2022-12-21 23:07:28', 42, 0, NULL),
(167, '2022-12-22 03:08:34', 43, 0, NULL),
(168, '2022-12-22 03:40:30', 42, 0, NULL),
(169, '2022-12-22 03:46:17', 43, 0, NULL),
(170, '2022-12-22 03:48:37', 46, 0, NULL),
(171, '2022-12-22 03:48:46', 46, 0, NULL),
(172, '2022-12-22 03:48:47', 46, 0, NULL),
(173, '2022-12-22 03:48:47', 46, 0, NULL),
(174, '2022-12-22 03:48:48', 46, 0, NULL),
(175, '2022-12-22 03:49:09', 46, 0, NULL),
(176, '2022-12-22 04:27:18', 41, 0, NULL),
(177, '2022-12-22 04:27:29', 41, 0, NULL),
(178, '2022-12-22 04:27:38', 42, 0, NULL),
(179, '2022-12-22 20:41:52', 39, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `line_de_command`
--

CREATE TABLE `line_de_command` (
  `id_line` int(12) NOT NULL,
  `ref_command` int(12) NOT NULL COMMENT 'FK_command\r\n',
  `reference` int(12) NOT NULL COMMENT 'FK_product',
  `qnt` int(12) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `line_de_command`
--

INSERT INTO `line_de_command` (`id_line`, `ref_command`, `reference`, `qnt`) VALUES
(3, 97, 35, 1),
(4, 97, 37, 1),
(5, 97, 39, 1),
(6, 98, 35, 1),
(7, 98, 37, 1),
(8, 100, 35, 1),
(9, 100, 37, 1),
(10, 100, 38, 1),
(11, 100, 39, 1),
(12, 101, 35, 1),
(13, 101, 37, 1),
(14, 101, 38, 1),
(15, 101, 39, 1),
(16, 102, 35, 1),
(17, 102, 37, 1),
(18, 105, 35, 1),
(19, 105, 37, 1),
(20, 110, 35, 1),
(21, 110, 37, 1),
(22, 111, 35, 1),
(23, 111, 37, 1),
(24, 118, 35, 1),
(25, 118, 37, 1),
(26, 118, 38, 1),
(27, 118, 39, 1),
(28, 85, 26, 1),
(29, 129, 35, 4),
(30, 130, 35, 9),
(31, 130, 35, 3),
(32, 130, 37, 9),
(33, 130, 37, 3),
(34, 132, 35, 5),
(35, 133, 35, 10),
(36, 133, 35, 9),
(37, 133, 35, 4),
(38, 133, 35, 11),
(39, 133, 37, 10),
(40, 133, 37, 9),
(41, 133, 37, 4),
(42, 133, 37, 11),
(43, 133, 38, 10),
(44, 133, 38, 9),
(45, 133, 38, 4),
(46, 133, 38, 11),
(47, 133, 39, 10),
(48, 133, 39, 9),
(49, 133, 39, 4),
(50, 133, 39, 11),
(51, 134, 35, 1),
(52, 135, 35, 2),
(53, 136, 35, 7),
(54, 136, 35, 4),
(55, 136, 37, 7),
(56, 136, 37, 4),
(57, 137, 35, 2),
(58, 138, 35, 1),
(59, 138, 35, 3),
(60, 138, 35, 2),
(61, 138, 37, 1),
(62, 138, 37, 3),
(63, 138, 37, 2),
(64, 138, 38, 1),
(65, 138, 38, 3),
(66, 138, 38, 2),
(67, 140, 35, 2),
(68, 141, 35, 6),
(69, 141, 35, 3),
(70, 141, 37, 6),
(71, 141, 37, 3),
(72, 153, 35, 5),
(73, 153, 37, 7),
(74, 154, 35, 0),
(75, 154, 37, 0),
(76, 154, 38, 0),
(77, 155, 35, 4),
(78, 155, 37, 3),
(79, 155, 38, 3),
(80, 156, 35, 0),
(81, 156, 37, 0),
(82, 157, 35, 2),
(83, 158, 35, 3),
(84, 158, 37, 2),
(85, 159, 35, 3),
(86, 159, 37, 2),
(87, 160, 38, 4),
(88, 161, 39, 3),
(89, 162, 39, 3),
(90, 163, 39, 1),
(91, 164, 41, 3),
(92, 165, 41, 1),
(93, 166, 41, 2),
(94, 167, 42, 14),
(95, 168, 43, 2),
(96, 169, 43, 2),
(97, 176, 40, 6),
(98, 177, 44, 8),
(99, 177, 45, 1),
(100, 178, 45, 5),
(101, 179, 45, 3);

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE `person` (
  `id` int(12) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `numero_tele` int(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `photo` longtext NOT NULL,
  `role_as` int(1) NOT NULL DEFAULT 0,
  `deleteAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `person`
--

INSERT INTO `person` (`id`, `prenom`, `nom`, `numero_tele`, `email`, `adress`, `photo`, `role_as`, `deleteAt`) VALUES
(39, 'soufiane', 'chajjaoui', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671497438.png', 0, NULL),
(40, 'soufiane', 'chajjaoui', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671497438.png', 0, NULL),
(41, 'soufiane', 'chajjaoui', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671497462.png', 0, NULL),
(42, 'soufiane', 'chajjaoui', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671497473.pdf', 0, NULL),
(43, 'soufiane', 'chajjaoui', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671497513.jpeg', 0, NULL),
(44, 'soufiane4444', 'chajjaoui', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671497664.png', 1, NULL),
(45, 'soufiane', 'chajjaouihhhhhhh', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671561387.pdf', 1, '2022-12-21 11:28:04'),
(46, 'Mahdi', 'chajjaoui', 607025329, 'schajjaoui@gmail.com', 'rue 19 okba bnou nafia safi  42', '../Uploads/1671632203.png', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `reference` int(12) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantite` int(4) NOT NULL,
  `prix_achat` varchar(10) NOT NULL,
  `prix_vent` varchar(10) NOT NULL,
  `photo_produit` text NOT NULL,
  `id_categorie` int(12) NOT NULL,
  `deleteAt` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`reference`, `libelle`, `description`, `quantite`, `prix_achat`, `prix_vent`, `photo_produit`, `id_categorie`, `deleteAt`) VALUES
(26, '9999999999999999', 'yyyyy', 10, '950', '../Uploads', '1', 800, '2022-12-17 07:29:16'),
(27, 'ddddddddddddd', 'iphone 10', 12, '950', '../Uploads', '1', 800, '2022-12-17 07:31:16'),
(28, 'iphone 7', '4444444444444444444', 17, '9503', '../Uploads', '1', 95032, '2022-12-17 14:54:00'),
(29, 'ssssssssssssssss', 't-shirt', 5, '950', '../Uploads', '1', 2, '2022-12-17 20:52:03'),
(30, '55555555555555555555', 'iphone 9999', 9, '950', '../Uploads', '11', 2, '2022-12-17 20:51:59'),
(31, 'sh', 'h', 10, '../Uploads', '../Uploads', '0', 0, '2022-12-17 03:58:12'),
(32, 'mmmmmmmmmmmmmmmmmmm ', '888888888881133', 1438, '../Uploads', '../Uploads', '0', 4, '2022-12-17 10:31:40'),
(33, 'ssssssssssssssssssssssssss    ', 'cccddddd', 1, '950', '../Uploads', '13', 3, '2022-12-18 01:51:26'),
(34, 'dddddddddddddddddddd7777777777    ', '44444444444', 9, '3', '4441', '../Uploads/pngwing.png', 1, '2022-12-17 22:13:35'),
(35, 'sou\r\n   ', 'ddddddddddd555', 3, '7', '122', '../Uploads/1671297557.png', 1, '2022-12-21 17:39:23'),
(36, 'iphone 7 ', 'ddddddddddd', 0, '800', '1111', '../Uploads/1671317184.jpg', 9, '2022-12-18 22:06:43'),
(37, 'shoes', 'dddddddd', 5, '800', '950', '../Uploads/1671407664.jpg', 14, '2022-12-21 17:39:24'),
(38, 'yyyyy', 'dddddddddd', -16, '1111', 'ddd', '../Uploads/pngwing.png', 1, '2022-12-21 17:39:45'),
(39, 'iphone 7', 'mmmmmmmmmmmmmm', 0, '800', '950', '../Uploads/1671482740.png', 12, NULL),
(40, 'xiaomi', 'fffffffffffffffffffffffffffffff\r\n', -3, '800', '950', '../Uploads/1671657901.png', 2, NULL),
(41, 'iphone 7', 'ROM 64GB\r\nRAM 4GB\r\n12.5 inche', 0, '800', '950', '../Uploads/1671657989.png', 2, NULL),
(42, 'iphone 7', 'sssssssssssssss', -8, '800', '950', '../Uploads/1671678426.jpeg', 3, NULL),
(43, 'iphone 7', 'mmmmm', 0, '800', '950', '../Uploads/pngwing.png', 2, NULL),
(44, 'shoes', 'ddddd', -4, '800', '950', '../Uploads/1671682854.png', 2, NULL),
(45, 'shoes', 'ssssssssss', 0, '555', '700', '../Uploads/pngwing.png', 3, NULL),
(46, 'iphone 7', 'mmmmmmmmmmmmmm', 2, '800', '950', '../Uploads/1671756020.pdf', 2, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `FK_produits` (`reference`),
  ADD KEY `FK_fournisseur` (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`ref_command`),
  ADD KEY `FK_person` (`id`);

--
-- Index pour la table `line_de_command`
--
ALTER TABLE `line_de_command`
  ADD PRIMARY KEY (`id_line`),
  ADD KEY `FK_Command` (`ref_command`),
  ADD KEY `FK_Product` (`reference`);

--
-- Index pour la table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  MODIFY `numero` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `command`
--
ALTER TABLE `command`
  MODIFY `ref_command` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT pour la table `line_de_command`
--
ALTER TABLE `line_de_command`
  MODIFY `id_line` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `reference` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD CONSTRAINT `FK_fournisseur` FOREIGN KEY (`id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `FK_produits` FOREIGN KEY (`reference`) REFERENCES `produit` (`reference`);

--
-- Contraintes pour la table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `FK_person` FOREIGN KEY (`id`) REFERENCES `person` (`id`);

--
-- Contraintes pour la table `line_de_command`
--
ALTER TABLE `line_de_command`
  ADD CONSTRAINT `FK_Command` FOREIGN KEY (`ref_command`) REFERENCES `command` (`ref_command`),
  ADD CONSTRAINT `FK_Product` FOREIGN KEY (`reference`) REFERENCES `produit` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
