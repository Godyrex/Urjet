-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 avr. 2022 à 02:40
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `urjet`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `IDdemande` int(2) NOT NULL,
  `diagnostic` varchar(20) NOT NULL,
  `urgence` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `descriptionpanne` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`IDdemande`, `diagnostic`, `urgence`, `type`, `descriptionpanne`) VALUES
(27, 'Diagnostic', 'pas urgent', '1', 'test1'),
(28, 'Réparation', 'pas urgent', '1', 'test1'),
(30, 'Diagnostic', 'pas urgent', '1', 'testtest'),
(31, 'Réparation', 'pas urgent', '1', 'nour'),
(32, 'Diagnostic', 'pas urgent', '1', 'oussema bhim'),
(33, 'Diagnostic', 'pas urgent', '1', 'bhim ousema');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`IDdemande`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `IDdemande` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
