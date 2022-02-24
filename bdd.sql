-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour emt
CREATE DATABASE IF NOT EXISTS `emt` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `emt`;

-- Listage de la structure de la table emt. data
CREATE TABLE IF NOT EXISTS `data` (
  `dataid` varchar(20) NOT NULL,
  `temps` int(11) NOT NULL,
  `vitesse` float NOT NULL,
  `intensite` float NOT NULL,
  `tension` float NOT NULL,
  `energie` float NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table emt.data : ~0 rows (environ)
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
/*!40000 ALTER TABLE `data` ENABLE KEYS */;

-- Listage de la structure de la table emt. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `acces` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL DEFAULT '0',
  `email` text NOT NULL,
  `token` text,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table emt.utilisateur : ~8 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`, `email`, `token`) VALUES
	('Hurdebourg', 'Arthur', '$2y$10$osbfbnf9JnK38OIUGkVjbeHngi/ibmM6oPIHfZRvPx1Ux1kGW/vJy', 0, 'ArthurH', 'arthur.hurdebourg7@etu.univ-lorraine.fr', NULL),
	('Baby', 'Estelle', '$2y$10$SYH56IqvNQ1Vy.Bzx.swxutTSgQHL2vfsskhWMuE/xXDqkrtS/RG.', 2, 'Babymaki', 'estelle.baby3@etu.univ-lorraine.fr', NULL),
	('Wagner', 'Frédéric', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'fred1', 'frederic.wagner2@etu.univ-lorraine.fr', 'bAXhh6p5Car8iyZI/SyFQ5+PCCI='),
	('JEANNIN ', 'Lucie', '$2y$10$G00/t/544cxWJSpk76I6GO9B9IR5pSU1I8dTgIEzBvomoLKOpjYX2', 2, 'jeannin18u', 'lucie.jeannin6@etu.univ-lorraine.fr', NULL),
	('Printz', 'Lucas', '$2y$10$OaYYkwwrp21VagtLy7QSPuY2LsIDEeyjDzcU0YS1y73p0GMIsUwei', 0, 'lucas', 'lucasprintz57@gmail.com', NULL),
	('Printz', 'Lucas', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 1, 'lucas1', 'lucas.printz6@etu.univ-lorraine.fr', 'wMcuQPfWghO04+ABQS6AAVXXUh8='),
	('TestUser', 'TestUser', '$2y$10$cIBMkYNjdq/2PSP6UpbXeusmUCbkXcFqS2LtlSKSBn3nS5216gOg.', 0, 'test', '', NULL),
	('voiture', 'voiture', '$2y$10$gr.4p784oPrKWN.vZl.G7..Bi/xi6Y04yyHzo2b2HVjHu1QNPVd6a', 1, 'voiture', '', NULL);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

-- Listage de la structure de la table emt. utilisateurattente
CREATE TABLE IF NOT EXISTS `utilisateurattente` (
  `userid` varchar(50) NOT NULL DEFAULT '',
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mdp` text NOT NULL,
  `acces` int(11) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table emt.utilisateurattente : ~3 rows (environ)
/*!40000 ALTER TABLE `utilisateurattente` DISABLE KEYS */;
INSERT INTO `utilisateurattente` (`userid`, `nom`, `prenom`, `mdp`, `acces`, `email`) VALUES
	('ff', 'ff', 'ff', '$2y$10$meUMqOXSqfqhLHSu62Oot.WjUrJi.x3fK3S0n6rLan1pEIOPqXxiK', 0, ''),
	('oajozidjazjdz', 'odij', 'ùdùzadjoia', '$2y$10$NFe26bd65NHidbzrG9KTUOKDvKIaIXyuZ5j67NAQeG35Jkiqk914e', 0, ''),
	('zadoi', 'adoziaj', 'ajdojzz', '$2y$10$7Tvxe0rNfarDrHca3tcSXOzjEhYFh2RVRex5irGSXf4Adrnynfb0y', 0, '');
/*!40000 ALTER TABLE `utilisateurattente` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
