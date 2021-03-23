-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 03:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annuaireeleve`
--

-- --------------------------------------------------------

--
-- Table structure for table `associer`
--

CREATE TABLE `associer` (
  `idExperience` int(11) NOT NULL,
  `IdSecteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attribuer`
--

CREATE TABLE `attribuer` (
  `idExperience` int(11) NOT NULL,
  `IdDomaine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `domainecompetence`
--

CREATE TABLE `domainecompetence` (
  `IdDomaine` int(11) NOT NULL,
  `nomDomaine` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domainecompetence`
--

INSERT INTO `domainecompetence` (`IdDomaine`, `nomDomaine`) VALUES
(0, NULL),
(1, 'Experience utilisateur(UX)'),
(2, 'Facteur humains (FH)'),
(3, 'Robotique'),
(4, 'Intelligence Artificielle'),
(5, 'Programmation'),
(6, 'web'),
(7, 'Ergonomie'),
(8, 'Ergonomie Cognitive'),
(9, 'Base de donnees'),
(10, 'Gestion de donnees'),
(11, 'Traitement statistique'),
(12, 'Gestion de projet'),
(14, 'Conception centree utilisateur');

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

CREATE TABLE `eleve` (
  `login` varchar(50) NOT NULL,
  `promotion` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `numRue` int(11) DEFAULT NULL,
  `nomRue` varchar(50) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `motDePasse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`login`, `promotion`, `mail`, `telephone`, `genre`, `numRue`, `nomRue`, `valide`, `codePostal`, `ville`, `nom`, `prenom`, `motDePasse`) VALUES
('lmessi', '2015', 'lmessi@ensc.fr', 607060706, 'Femme', 2, 'Rue de l\'arbre', 1, 74000, 'Annecy', 'Messi', 'Lionel', 'leo74'),
('zzidane', '2006', 'zzidane@ensc.fr', 606060606, 'Homme', 1, 'Rue de la paix', 1, 13000, 'Marseille', 'Zidane', 'Zinedine', 'zizou13');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `idExperience` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `dateDeb` date DEFAULT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `organisation` varchar(50) DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `salaire` double DEFAULT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`idExperience`, `type`, `dateDeb`, `libelle`, `dateFin`, `description`, `organisation`, `lieu`, `salaire`, `login`) VALUES
(1, 'Stage', '2015-02-01', 'Stage en ergonomie web au fc Barcelone', '2015-08-01', 'Ce Stage avais pour but la refonte du site du Fc Barcelone afin de le rendre pus UX et plus adapté aux besoins des utilisateurs.', 'Fc Barcelone', 'Barcelone', 4500, 'lmessi'),
(2, 'Stage', '2006-06-01', 'Stage en CCU a Samsung', '2006-07-01', 'ce stage avais pour but la réalisation de tri de cartes et de personnas pour la conception d\'une nouvelle tablette', 'Samsung', 'Paris', 5000, 'zzidane');

-- --------------------------------------------------------

--
-- Table structure for table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `login` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `motDePasse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gestionnaire`
--

INSERT INTO `gestionnaire` (`login`, `nom`, `motDePasse`) VALUES
('ebalatti', 'Balatti', 'crapulito'),
('ngautier', 'Gautier', 'souhouu');

-- --------------------------------------------------------

--
-- Table structure for table `secteuractivite`
--

CREATE TABLE `secteuractivite` (
  `IdSecteur` int(11) NOT NULL,
  `nomSecteur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `secteuractivite`
--

INSERT INTO `secteuractivite` (`IdSecteur`, `nomSecteur`) VALUES
(1, 'Ingenierie'),
(2, 'Recherche fondamentale'),
(3, 'Recherche Appliquée'),
(4, 'Agriculture'),
(5, 'Art'),
(6, 'Finance'),
(7, 'Immobilier'),
(8, 'Humanitaire'),
(9, 'Transport'),
(10, 'Restauration'),
(11, 'Enseignement'),
(12, 'Communication'),
(13, 'Information'),
(14, 'Santé'),
(15, 'Action sociale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `associer`
--
ALTER TABLE `associer`
  ADD PRIMARY KEY (`idExperience`,`IdSecteur`),
  ADD KEY `IdSecteur` (`IdSecteur`);

--
-- Indexes for table `attribuer`
--
ALTER TABLE `attribuer`
  ADD PRIMARY KEY (`idExperience`,`IdDomaine`),
  ADD KEY `IdDomaine` (`IdDomaine`);

--
-- Indexes for table `domainecompetence`
--
ALTER TABLE `domainecompetence`
  ADD PRIMARY KEY (`IdDomaine`);

--
-- Indexes for table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`idExperience`),
  ADD KEY `login` (`login`);

--
-- Indexes for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `secteuractivite`
--
ALTER TABLE `secteuractivite`
  ADD PRIMARY KEY (`IdSecteur`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `associer`
--
ALTER TABLE `associer`
  ADD CONSTRAINT `associer_ibfk_1` FOREIGN KEY (`idExperience`) REFERENCES `experience` (`idExperience`),
  ADD CONSTRAINT `associer_ibfk_2` FOREIGN KEY (`IdSecteur`) REFERENCES `secteuractivite` (`IdSecteur`);

--
-- Constraints for table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `attribuer_ibfk_1` FOREIGN KEY (`idExperience`) REFERENCES `experience` (`idExperience`),
  ADD CONSTRAINT `attribuer_ibfk_2` FOREIGN KEY (`IdDomaine`) REFERENCES `domainecompetence` (`IdDomaine`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`login`) REFERENCES `eleve` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
