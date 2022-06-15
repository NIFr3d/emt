-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 22 fév. 2022 à 10:47
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
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
  `temps` varchar(20) NOT NULL,
  `vitesse` float NOT NULL,
  `intensite` float NOT NULL,
  `tension` float NOT NULL,
  `energie` float NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `data`
--

INSERT INTO `data` (`dataid`, `temps`, `vitesse`, `intensite`, `tension`, `energie`, `lat`, `lon`) VALUES
('21/01/2022-17h32m38s', 0, 0.393, 0, 0, 0, 43.7702, -0.04083),
('21/01/2022-17h32m38s', 1, 4.884, 0.1, 10, 100, 43.770210000000006, -0.040819999999999995),
('21/01/2022-17h32m38s', 2, 9.865, 0.2, 20, 200, 43.770230000000005, -0.040799999999999996),
('21/01/2022-17h32m38s', 3, 14.769, 0.3, 30, 300, 43.77026000000001, -0.040769999999999994),
('21/01/2022-17h32m38s', 4, 19.75, 0.4, 40, 400, 43.770300000000006, -0.040729999999999995),
('21/01/2022-17h32m38s', 5, 24.713, 0.5, 50, 500, 43.77035000000001, -0.040679999999999994),
('21/01/2022-17h32m38s', 6, 29.715, 0.6, 60, 600, 43.770410000000005, -0.040619999999999996),
('21/01/2022-17h32m38s', 7, 34.529, 0.7, 70, 700, 43.770480000000006, -0.040549999999999996),
('21/01/2022-17h32m38s', 8, 39.981, 0.8, 80, 800, 43.77056, -0.04047),
('21/01/2022-17h32m38s', 9, 43.782, 0.9, 90, 900, 43.77065, -0.04038),
('08/02/2022-08h52m03s', 0, 53.633, 0, 0, 0, 43.7702, -0.04083),
('08/02/2022-08h52m03s', 1, 4.987, 0.1, 10, 100, 43.770210000000006, -0.040819999999999995),
('08/02/2022-08h52m03s', 3, 5.741, 0.2, 20, 200, 43.770230000000005, -0.040799999999999996),
('08/02/2022-08h52m03s', 4, 14.637, 0.3, 30, 300, 43.77026000000001, -0.040769999999999994),
('08/02/2022-08h52m03s', 5, 19.99, 0.4, 40, 400, 43.770300000000006, -0.040729999999999995),
('08/02/2022-08h52m03s', 6, 24.468, 0.5, 50, 500, 43.77035000000001, -0.040679999999999994),
('08/02/2022-08h52m03s', 7, 29.775, 0.6, 60, 600, 43.770410000000005, -0.040619999999999996),
('08/02/2022-08h52m03s', 8, 34.221, 0.7, 70, 700, 43.770480000000006, -0.040549999999999996),
('08/02/2022-08h52m03s', 9, 39.86, 0.8, 80, 800, 43.77056, -0.04047),
('08/02/2022-08h52m03s', 10, 44.086, 0.9, 90, 900, 43.77065, -0.04038),
('08/02/2022-08h52m03s', 11, 49.425, 1, 100, 1000, 43.77075000000001, -0.040279999999999996),
('08/02/2022-08h52m03s', 12, 54.641, 1.1, 110, 1100, 43.770860000000006, -0.04017),
('08/02/2022-08h52m03s', 13, 59.609, 1.2, 120, 1200, 43.77098000000001, -0.040049999999999995),
('08/02/2022-08h52m03s', 14, 63.742, 1.3, 130, 1300, 43.77111000000001, -0.03992),
('08/02/2022-08h52m03s', 15, 68.646, 1.4, 140, 1400, 43.77125000000001, -0.039779999999999996),
('08/02/2022-08h52m03s', 16, 74.361, 1.5, 150, 1500, 43.77140000000001, -0.03963),
('08/02/2022-08h52m03s', 16, 112.698, 1.6, 160, 1600, 43.77156000000001, -0.03947),
('08/02/2022-08h52m03s', 17, 147.003, 1.7, 170, 1700, 43.771730000000005, -0.0393),
('08/02/2022-08h52m03s', 19, 58.976, 1.8, 180, 1800, 43.771910000000005, -0.03912),
('08/02/2022-08h52m03s', 20, 77.34, 1.9, 190, 1900, 43.77210000000001, -0.03893),
('08/02/2022-16h42m05s', 0, 0.033, 0, 0, 0, 43.7702, -0.04083),
('08/02/2022-16h42m05s', 1, 4.913, 0.1, 10, 100, 43.770210000000006, -0.040819999999999995),
('08/02/2022-16h42m05s', 2, 9.787, 0.2, 20, 200, 43.770230000000005, -0.040799999999999996),
('08/02/2022-16h42m05s', 3, 15.038, 0.3, 30, 300, 43.77026000000001, -0.040769999999999994),
('08/02/2022-16h42m05s', 4, 19.731, 0.4, 40, 400, 43.770300000000006, -0.040729999999999995),
('08/02/2022-16h42m05s', 6, 15.459, 0.5, 50, 500, 43.77035000000001, -0.040679999999999994),
('08/02/2022-16h42m05s', 6, 71.045, 0.6, 60, 600, 43.770410000000005, -0.040619999999999996),
('08/02/2022-16h42m05s', 7, 34.772, 0.7, 70, 700, 43.770480000000006, -0.040549999999999996),
('08/02/2022-16h42m05s', 8, 28.812, 0.8, 80, 800, 43.77056, -0.04047),
('08/02/2022-16h42m05s', 9, 71.675, 0.9, 90, 900, 43.77065, -0.04038),
('08/02/2022-16h42m05s', 10, 49.179, 1, 100, 1000, 43.77075000000001, -0.040279999999999996),
('08/02/2022-16h42m05s', 11, 54.205, 1.1, 110, 1100, 43.770860000000006, -0.04017),
('08/02/2022-16h42m05s', 12, 58.956, 1.2, 120, 1200, 43.77098000000001, -0.040049999999999995),
('08/02/2022-16h42m05s', 13, 64.253, 1.3, 130, 1300, 43.77111000000001, -0.03992),
('08/02/2022-16h42m05s', 14, 68.919, 1.4, 140, 1400, 43.77125000000001, -0.039779999999999996),
('08/02/2022-16h42m05s', 15, 75.115, 1.5, 150, 1500, 43.77140000000001, -0.03963),
('08/02/2022-16h42m05s', 16, 78.452, 1.6, 160, 1600, 43.77156000000001, -0.03947),
('08/02/2022-16h42m28s', 0, 93.357, 0, 0, 0, 43.7702, -0.04083),
('08/02/2022-16h42m28s', 1, 4.869, 0.1, 10, 100, 43.770210000000006, -0.040819999999999995),
('08/02/2022-16h42m28s', 2, 9.965, 0.2, 20, 200, 43.770230000000005, -0.040799999999999996),
('08/02/2022-16h42m28s', 3, 14.594, 0.3, 30, 300, 43.77026000000001, -0.040769999999999994),
('08/02/2022-16h42m28s', 4, 19.85, 0.4, 40, 400, 43.770300000000006, -0.040729999999999995),
('08/02/2022-16h42m28s', 5, 24.887, 0.5, 50, 500, 43.77035000000001, -0.040679999999999994),
('08/02/2022-16h42m28s', 6, 29.715, 0.6, 60, 600, 43.770410000000005, -0.040619999999999996),
('08/02/2022-16h42m28s', 7, 34.255, 0.7, 70, 700, 43.770480000000006, -0.040549999999999996),
('08/02/2022-16h42m28s', 8, 39.54, 0.8, 80, 800, 43.77056, -0.04047),
('08/02/2022-16h42m28s', 9, 44.752, 0.9, 90, 900, 43.77065, -0.04038),
('08/02/2022-16h42m28s', 10, 49.425, 1, 100, 1000, 43.77075000000001, -0.040279999999999996),
('08/02/2022-16h42m28s', 11, 54.587, 1.1, 110, 1100, 43.770860000000006, -0.04017),
('08/02/2022-16h42m28s', 12, 58.376, 1.2, 120, 1200, 43.77098000000001, -0.040049999999999995),
('08/02/2022-16h42m28s', 13, 65.034, 1.3, 130, 1300, 43.77111000000001, -0.03992),
('08/02/2022-16h42m28s', 14, 49.376, 1.4, 140, 1400, 43.77125000000001, -0.039779999999999996),
('08/02/2022-16h42m28s', 15, 74.138, 1.5, 150, 1500, 43.77140000000001, -0.03963),
('08/02/2022-16h42m28s', 16, 78.844, 1.6, 160, 1600, 43.77156000000001, -0.03947),
('08/02/2022-16h42m28s', 17, 82.293, 1.7, 170, 1700, 43.771730000000005, -0.0393),
('08/02/2022-16h42m28s', 18, 90.598, 1.8, 180, 1800, 43.771910000000005, -0.03912),
('08/02/2022-16h42m28s', 19, 94.096, 1.9, 190, 1900, 43.77210000000001, -0.03893),
('08/02/2022-16h43m06s', 0, 51.82, 0, 0, 0, 43.7702, -0.04083),
('08/02/2022-16h43m06s', 1, 4.938, 0.1, 10, 100, 43.770210000000006, -0.040819999999999995),
('08/02/2022-16h43m06s', 2, 9.807, 0.2, 20, 200, 43.770230000000005, -0.040799999999999996),
('08/02/2022-16h43m06s', 4, 7.813, 0.3, 30, 300, 43.77026000000001, -0.040769999999999994),
('08/02/2022-16h43m06s', 5, 19.87, 0.4, 40, 400, 43.770300000000006, -0.040729999999999995),
('08/02/2022-16h43m06s', 6, 40.406, 0.5, 50, 500, 43.77035000000001, -0.040679999999999994),
('08/02/2022-16h43m06s', 6, 60.461, 0.6, 60, 600, 43.770410000000005, -0.040619999999999996),
('08/02/2022-16h43m06s', 7, 25.1, 0.7, 70, 700, 43.770480000000006, -0.040549999999999996),
('08/02/2022-16h43m06s', 8, 62.799, 0.8, 80, 800, 43.77056, -0.04047),
('08/02/2022-16h43m06s', 9, 44.707, 0.9, 90, 900, 43.77065, -0.04038),
('08/02/2022-16h43m06s', 11, 26.042, 1, 100, 1000, 43.77075000000001, -0.040279999999999996),
('08/02/2022-16h43m06s', 12, 54.314, 1.1, 110, 1100, 43.770860000000006, -0.04017),
('08/02/2022-16h43m06s', 13, 59.015, 1.2, 120, 1200, 43.77098000000001, -0.040049999999999995),
('08/02/2022-16h43m06s', 14, 64.189, 1.3, 130, 1300, 43.77111000000001, -0.03992),
('08/02/2022-16h43m06s', 15, 68.988, 1.4, 140, 1400, 43.77125000000001, -0.039779999999999996),
('08/02/2022-16h43m06s', 16, 74.138, 1.5, 150, 1500, 43.77140000000001, -0.03963),
('08/02/2022-16h43m06s', 17, 79.239, 1.6, 160, 1600, 43.77156000000001, -0.03947),
('08/02/2022-16h43m06s', 18, 84.023, 1.7, 170, 1700, 43.771730000000005, -0.0393),
('08/02/2022-16h43m06s', 19, 89.054, 1.8, 180, 1800, 43.771910000000005, -0.03912),
('08/02/2022-16h43m06s', 20, 93.908, 1.9, 190, 1900, 43.77210000000001, -0.03893),
('22/02/2022-11h07m28s', 0, 0.001, 0, 0, 0, 43.7702, -0.04083),
('22/02/2022-11h07m28s', 1, 4.884, 0.1, 10, 100, 43.770210000000006, -0.040819999999999995),
('22/02/2022-11h07m28s', 2, 9.865, 0.2, 20, 200, 43.770230000000005, -0.040799999999999996),
('22/02/2022-11h07m28s', 3, 14.857, 0.3, 30, 300, 43.77026000000001, -0.040769999999999994),
('22/02/2022-11h07m28s', 4, 19.93, 0.4, 40, 400, 43.770300000000006, -0.040729999999999995),
('22/02/2022-11h07m28s', 5, 24.444, 0.5, 50, 500, 43.77035000000001, -0.040679999999999994),
('22/02/2022-11h07m28s', 6, 29.745, 0.6, 60, 600, 43.770410000000005, -0.040619999999999996),
('22/02/2022-11h07m28s', 7, 34.598, 0.7, 70, 700, 43.770480000000006, -0.040549999999999996),
('22/02/2022-11h07m28s', 8, 39.739, 0.8, 80, 800, 43.77056, -0.04047),
('22/02/2022-11h07m28s', 9, 43.739, 0.9, 90, 900, 43.77065, -0.04038),
('22/02/2022-11h10m51s', 0, 1.148, 0, 0, 0, 43.7702, -0.04083),
('22/02/2022-11h10m51s', 1, 4.923, 0.1, 10, 100, 43.770210000000006, -0.040819999999999995),
('22/02/2022-11h10m51s', 2, 9.816, 0.2, 20, 200, 43.770230000000005, -0.040799999999999996),
('22/02/2022-11h10m51s', 3, 14.783, 0.3, 30, 300, 43.77026000000001, -0.040769999999999994),
('22/02/2022-11h10m51s', 4, 19.99, 0.4, 40, 400, 43.770300000000006, -0.040729999999999995),
('22/02/2022-11h10m51s', 5, 24.468, 0.5, 50, 500, 43.77035000000001, -0.040679999999999994),
('22/02/2022-11h10m51s', 6, 28.596, 0.6, 60, 600, 43.770410000000005, -0.040619999999999996),
('22/02/2022-11h10m51s', 7, 35.743, 0.7, 70, 700, 43.770480000000006, -0.040549999999999996),
('22/02/2022-11h10m51s', 8, 39.9, 0.8, 80, 800, 43.77056, -0.04047),
('22/02/2022-11h10m51s', 9, 43.998, 0.9, 90, 900, 43.77065, -0.04038),
('22/02/2022-11h10m51s', 10, 49.976, 1, 100, 1000, 43.77075000000001, -0.040279999999999996),
('22/02/2022-11h10m51s', 11, 51.531, 1.1, 110, 1100, 43.770860000000006, -0.04017),
('22/02/2022-11h10m51s', 12, 62.501, 1.2, 120, 1200, 43.77098000000001, -0.040049999999999995),
('22/02/2022-11h10m51s', 13, 45.363, 1.3, 130, 1300, 43.77111000000001, -0.03992),
('22/02/2022-11h10m51s', 14, 69.824, 1.4, 140, 1400, 43.77125000000001, -0.039779999999999996),
('22/02/2022-11h10m51s', 15, 73.769, 1.5, 150, 1500, 43.77140000000001, -0.03963),
('22/02/2022-11h10m51s', 16, 78.297, 1.6, 160, 1600, 43.77156000000001, -0.03947),
('22/02/2022-11h10m51s', 17, 84.701, 1.7, 170, 1700, 43.771730000000005, -0.0393),
('22/02/2022-11h10m51s', 18, 87.563, 1.8, 180, 1800, 43.771910000000005, -0.03912),
('22/02/2022-11h10m51s', 19, 94.666, 1.9, 190, 1900, 43.77210000000001, -0.03893),
('22/02/2022-11h26m00s', 0, 0, 0, 0, 0, 43.77210000000001, -0.03893),
('22/02/2022-11h26m00s', 1, 4.938, 0.1, 10, 100, 43.77211000000001, -0.038919999999999996),
('22/02/2022-11h26m00s', 2, 9.935, 0.2, 20, 200, 43.77213000000001, -0.0389),
('22/02/2022-11h26m00s', 3, 14.71, 0.3, 30, 300, 43.772160000000014, -0.038869999999999995),
('22/02/2022-11h26m00s', 4, 19.79, 0.4, 40, 400, 43.77220000000001, -0.038829999999999996),
('22/02/2022-11h26m00s', 5, 24.565, 0.5, 50, 500, 43.772250000000014, -0.038779999999999995),
('22/02/2022-11h26m00s', 6, 29.894, 0.6, 60, 600, 43.77231000000001, -0.03872),
('22/02/2022-11h26m00s', 7, 34.255, 0.7, 70, 700, 43.77238000000001, -0.03865),
('22/02/2022-11h26m00s', 8, 39.739, 0.8, 80, 800, 43.77246000000001, -0.03857),
('22/02/2022-11h26m00s', 9, 43.954, 0.9, 90, 900, 43.77255000000001, -0.03848),
('22/02/2022-11h26m00s', 10, 49.824, 1, 100, 1000, 43.77265000000001, -0.03838),
('22/02/2022-11h26m00s', 11, 54.422, 1.1, 110, 1100, 43.77276000000001, -0.03827),
('22/02/2022-11h26m00s', 12, 58.897, 1.2, 120, 1200, 43.772880000000015, -0.038149999999999996),
('22/02/2022-11h26m00s', 13, 64.317, 1.3, 130, 1300, 43.77301000000001, -0.03802),
('22/02/2022-11h26m00s', 14, 69.473, 1.4, 140, 1400, 43.773150000000015, -0.03788),
('22/02/2022-11h26m00s', 15, 73.694, 1.5, 150, 1500, 43.77330000000001, -0.03773),
('22/02/2022-11h26m00s', 16, 79.557, 1.6, 160, 1600, 43.773460000000014, -0.03757),
('22/02/2022-11h26m00s', 17, 83.272, 1.7, 170, 1700, 43.77363000000001, -0.0374),
('22/02/2022-11h26m00s', 18, 86.623, 1.8, 180, 1800, 43.77381000000001, -0.03722),
('22/02/2022-11h26m00s', 19, 96.914, 1.9, 190, 1900, 43.774000000000015, -0.03703);

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
  `email` text NOT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`, `email`, `token`) VALUES
('Wagner', 'Frédéric', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'fred1', 'frederic.wagner2@etu.univ-lorraine.fr', NULL),
('Printz', 'Lucas', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'lucas1', 'lucas.printz6@etu.univ-lorraine.fr', NULL),
('TestUser', 'TestUser', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 0, 'test', '', NULL),
('voiture', 'voiture', '$2y$10$gr.4p784oPrKWN.vZl.G7..Bi/xi6Y04yyHzo2b2HVjHu1QNPVd6a', 1, 'voiture', '', NULL),
('Admin', 'Admin', '$2y$10$imNMpLyCM5ao.cFZ8Otmc.cZBYfmS52RtrttTbEo9TvjarA0lz9KG', 1, 'testAdmin', '', NULL),
('Hurdebourg', 'Arthur', '$2y$10$osbfbnf9JnK38OIUGkVjbeHngi/ibmM6oPIHfZRvPx1Ux1kGW/vJy', 0, 'ArthurH', 'arthur.hurdebourg7@etu.univ-lorraine.fr', NULL),
('JEANNIN ', 'Lucie', '$2y$10$G00/t/544cxWJSpk76I6GO9B9IR5pSU1I8dTgIEzBvomoLKOpjYX2', 2, 'jeannin18u', 'lucie.jeannin6@etu.univ-lorraine.fr', NULL),
('Baby', 'Estelle', '$2y$10$SYH56IqvNQ1Vy.Bzx.swxutTSgQHL2vfsskhWMuE/xXDqkrtS/RG.', 2, 'Babymaki', 'estelle.baby3@etu.univ-lorraine.fr', NULL),
('Printz', 'Lucas', '$2y$10$OaYYkwwrp21VagtLy7QSPuY2LsIDEeyjDzcU0YS1y73p0GMIsUwei', 0, 'lucas', 'lucasprintz57@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurattente`
--

CREATE TABLE `utilisateurattente` (
  `userid` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `acces` int NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurattente`
--

INSERT INTO `utilisateurattente` (`userid`, `nom`, `prenom`, `mdp`, `acces`, `email`) VALUES
('zadoi', 'adoziaj', 'ajdojzz', '$2y$10$7Tvxe0rNfarDrHca3tcSXOzjEhYFh2RVRex5irGSXf4Adrnynfb0y', 0, ''),
('oajozidjazjdz', 'odij', 'ùdùzadjoia', '$2y$10$NFe26bd65NHidbzrG9KTUOKDvKIaIXyuZ5j67NAQeG35Jkiqk914e', 0, ''),
('ff', 'ff', 'ff', '$2y$10$meUMqOXSqfqhLHSu62Oot.WjUrJi.x3fK3S0n6rLan1pEIOPqXxiK', 0, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
