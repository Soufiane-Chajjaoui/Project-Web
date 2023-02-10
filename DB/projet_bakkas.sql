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
(1, 'chajjaoui', 'soufian', '0000000000', 'schajjaoui@gmail.com', '123456', '../Uploads/1671576219.png');

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
(84, '2022-11-01 23:00:00', 39, 0, NULL);


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

ools 

 
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
