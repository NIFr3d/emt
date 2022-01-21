-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 21 jan. 2022 à 15:02
-- Version du serveur :  8.0.27-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emt`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `dataid` varchar(20) NOT NULL,
  `temps` int NOT NULL,
  `vitesse` float NOT NULL,
  `intensite` float NOT NULL,
  `tension` float NOT NULL,
  `energie` float NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `acces` int NOT NULL,
  `userid` text NOT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`, `token`) VALUES
('Wagner', 'Frédéric', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'fred1', NULL),
('Printz', 'Lucas', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'lucas1', NULL),
('TestUser', 'TestUser', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 0, 'test', NULL),
('voiture', 'voiture', '$2y$10$gr.4p784oPrKWN.vZl.G7..Bi/xi6Y04yyHzo2b2HVjHu1QNPVd6a', 1, 'voiture', NULL),
('Admin', 'Admin', '$2y$10$imNMpLyCM5ao.cFZ8Otmc.cZBYfmS52RtrttTbEo9TvjarA0lz9KG', 1, 'testAdmin', NULL),
('Hurdebourg', 'Arthur', '$2y$10$osbfbnf9JnK38OIUGkVjbeHngi/ibmM6oPIHfZRvPx1Ux1kGW/vJy', 0, 'ArthurH', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurattente`
--

CREATE TABLE `utilisateurattente` (
  `userid` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `acces` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurattente`
--

INSERT INTO `utilisateurattente` (`userid`, `nom`, `prenom`, `mdp`, `acces`) VALUES
('zadoi', 'adoziaj', 'ajdojzz', '$2y$10$7Tvxe0rNfarDrHca3tcSXOzjEhYFh2RVRex5irGSXf4Adrnynfb0y', 0),
('oajozidjazjdz', 'odij', 'ùdùzadjoia', '$2y$10$NFe26bd65NHidbzrG9KTUOKDvKIaIXyuZ5j67NAQeG35Jkiqk914e', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
