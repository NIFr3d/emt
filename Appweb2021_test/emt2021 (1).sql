-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 04 Janvier 2022 à 13:41
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
  `dataid` int(11) NOT NULL,
  `temps` int(11) NOT NULL,
  `vitesse` int(11) NOT NULL,
  `consommation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`dataid`, `temps`, `vitesse`, `consommation`) VALUES
(1, 0, 0, 0);

-- --------------------------------------------------------

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
('Wagner', 'Frédéric', 'test', 1, 'fred1', '(ÛoPÁy)0ÛKRozÂw‡‡N%'),
('TestUser', 'TestUser', 'test', 0, 'test', 'ÚÝ˜&p>=ôðòœ¾PÙDÅSlA'),
('voiture', 'voiture', 'voiture', 1, 'voiture', NULL),
('ceciest', 'untest', 'test', 0, 'test2', NULL),
('Printz', 'Lucas', 'test', 1, 'lucas1', NULL),
('iuh', 'iuh', 'uih', 0, 'sdv', NULL),
('rg', 'rg', 'jb', 0, 'eryghiurgheiuhrgeuihrgieurhguerg', NULL);

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
('', '', '', '', 0),
('', '', '', '', 0),
('fred2', 'Wagner', 'Frederic', 'test', 0),
('fred2', 'Wagner', 'Frederic', 'test', 0),
('fred2', 'Wagner', 'Frederic', 'test', 0),
('fred2', 'Wagner', 'Frederic', 'test', 0),
('fred2', 'Wagner', 'Frederic', 'test', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
