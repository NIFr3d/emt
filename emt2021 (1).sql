-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 18 Janvier 2022 à 08:03
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `emt2021`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `dataid` varchar(20) NOT NULL,
  `temps` int(11) NOT NULL,
  `vitesse` float NOT NULL,
  `consommation` float NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `acces` int(11) NOT NULL,
  `userid` text NOT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`, `token`) VALUES
('Wagner', 'Frédéric', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'fred1', NULL),
('Printz', 'Lucas', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'lucas1', NULL),
('TestUser', 'TestUser', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 0, 'test', NULL),
('voiture', 'voiture', '$2y$10$gr.4p784oPrKWN.vZl.G7..Bi/xi6Y04yyHzo2b2HVjHu1QNPVd6a', 1, 'voiture', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurattente`
--

CREATE TABLE `utilisateurattente` (
  `userid` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `acces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurattente`
--

INSERT INTO `utilisateurattente` (`userid`, `nom`, `prenom`, `mdp`, `acces`) VALUES
('uhg', 'jhsvhu', 'ohiuhiyg', '$2y$10$Lgyketz16VNhWuQuntptC.8FYZZCR4GosEydClD2/Xop55l3n.1yS', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
