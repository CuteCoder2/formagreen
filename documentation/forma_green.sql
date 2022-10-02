-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 oct. 2021 à 19:44
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forma_green`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `id_abon` varchar(30) NOT NULL,
  `date_start` datetime NOT NULL DEFAULT current_timestamp(),
  `date_end` datetime NOT NULL,
  `login` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `login`, `PASSWORD`) VALUES
(1, 'admin', 'nixon', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `green_area`
--

CREATE TABLE `green_area` (
  `id_membre` int(11) NOT NULL,
  `longitude` varchar(60) NOT NULL,
  `latitute` varchar(60) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `login` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `green_area`
--

INSERT INTO `green_area` (`id_membre`, `longitude`, `latitute`, `area_name`, `login`) VALUES
(10, '50.47788', '40.45555', 'poto pass', 'nixon'),
(12, '60.8887', '60.114', 'kabral', 'fotso pires');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `login` varchar(200) NOT NULL,
  `mot_pass` varchar(100) NOT NULL,
  `id_type_membre` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `barcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`login`, `mot_pass`, `id_type_membre`, `nom`, `prenom`, `age`, `gender`, `email`, `phone`, `postal_code`, `photo`, `barcode`) VALUES
('fotso pires', '123123', 1, 'fotso', 'pires', '2021-10-13', 'male', 'admin@admin', '5646', 'church street', 'photo', '../barcode/fotso pires.png'),
('nixon', '123', 1, 'xoxo', 'nic', '2021-10-12', 'male', 'nix@gmail;com', '789456', '75 st street', 'photo', '../barcode/nixon.png');

-- --------------------------------------------------------

--
-- Structure de la table `type_membre`
--

CREATE TABLE `type_membre` (
  `id_type_membre` int(11) NOT NULL,
  `type_membre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_membre`
--

INSERT INTO `type_membre` (`id_type_membre`, `type_membre`) VALUES
(1, 'individua'),
(2, 'school');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id_abon`),
  ADD KEY `fk_abon_abon` (`login`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `green_area`
--
ALTER TABLE `green_area`
  ADD PRIMARY KEY (`id_membre`),
  ADD KEY `login` (`login`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`login`),
  ADD KEY `fk_membre_id_typ` (`id_type_membre`);

--
-- Index pour la table `type_membre`
--
ALTER TABLE `type_membre`
  ADD PRIMARY KEY (`id_type_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `green_area`
--
ALTER TABLE `green_area`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `type_membre`
--
ALTER TABLE `type_membre`
  MODIFY `id_type_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `fk_abon_abon` FOREIGN KEY (`login`) REFERENCES `membre` (`login`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `green_area`
--
ALTER TABLE `green_area`
  ADD CONSTRAINT `fk_log_green` FOREIGN KEY (`login`) REFERENCES `membre` (`login`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_membre_id_typ` FOREIGN KEY (`id_type_membre`) REFERENCES `type_membre` (`id_type_membre`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
