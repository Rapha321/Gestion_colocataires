-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2021 at 04:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_coloc`
--

-- --------------------------------------------------------

--
-- Table structure for table `favori`
--

DROP TABLE IF EXISTS `favori`;
CREATE TABLE IF NOT EXISTS `favori` (
  `id_favori` int(11) NOT NULL AUTO_INCREMENT,
  `locations` int(11) DEFAULT NULL,
  `locataire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_favori`),
  KEY `FOREIGN` (`locations`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favori`
--

INSERT INTO `favori` (`id_favori`, `locations`, `locataire`) VALUES
(75, 45, 87),
(79, 47, 81),
(80, 48, 87),
(81, 45, 90),
(84, 44, 81),
(85, 44, 89),
(87, 49, 87);

-- --------------------------------------------------------

--
-- Table structure for table `locataire`
--

DROP TABLE IF EXISTS `locataire`;
CREATE TABLE IF NOT EXISTS `locataire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `descriptions` varchar(200) DEFAULT NULL,
  `pic` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locataire`
--

INSERT INTO `locataire` (`id`, `nom`, `prenom`, `email`, `pwd`, `descriptions`, `pic`) VALUES
(81, 'Paola', 'Nikita', 'paola@email.com', 'test', 'Je cherche un coloc.... premiere mois gratuit!!!', 0x3032665f696d616765732d362e6a706567),
(87, 'James', 'Konan', 'jim@email.com', 'test', 'Bonjour je m’appelle James, je suis joueur de tennis et j’aimerai trouvé une bonne colocation avec quelqu’un de sympa et marrant haha.', 0x31306d5f696d616765732d31342e6a706567),
(88, 'Sylvie', 'Do', 'sylvie@email.com', 'test', 'Bonjour, Je m\'appelle Sylvie, je cherche une chambre dans une colocation avec un loyer de 200. Si mon profil vous intéresse, envoyez moi un Message Flash ou un email. Merci, Clara', 0x3034665f696d616765732d31362e6a706567),
(89, 'Enzo', 'Pontiaz', 'enzo@email.com', 'test', 'Bonjour, Je m\'appelle Enzo, je cherche une chambre dans une colocation avec un loyer de 300. Si mon profil vous intéresse, envoyez moi un Message Flash ou un email. Merci, Enzo', 0x30366d5f696d616765732d31302e6a706567),
(90, 'Remi', 'Lebel', 'remy@email.com', 'test', 'Je souhaite avoir un logement, que ça soit colocation ou autre, au près de gens sympas. Merci beaucoup.', 0x30376d5f696d616765732d31312e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `types` varchar(20) DEFAULT NULL,
  `grandeur` varchar(10) DEFAULT NULL,
  `descriptions` varchar(300) DEFAULT NULL,
  `bail` varchar(10) DEFAULT NULL,
  `montantloyer` int(11) DEFAULT NULL,
  `meubler` varchar(10) DEFAULT NULL,
  `fumeur` varchar(10) DEFAULT NULL,
  `animal` varchar(10) DEFAULT NULL,
  `electricite` varchar(10) DEFAULT NULL,
  `chauffage` varchar(10) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `pays` varchar(10) DEFAULT NULL,
  `codePostal` varchar(10) DEFAULT NULL,
  `pic` longblob,
  `id_proprietaire` int(11) NOT NULL,
  `latitude` decimal(8,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  PRIMARY KEY (`id_location`),
  KEY `FOREIGN` (`id_proprietaire`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id_location`, `types`, `grandeur`, `descriptions`, `bail`, `montantloyer`, `meubler`, `fumeur`, `animal`, `electricite`, `chauffage`, `ville`, `province`, `street`, `pays`, `codePostal`, `pic`, `id_proprietaire`, `latitude`, `longitude`) VALUES
(44, 'Studio', '1 1/2', 'Dans une maison de plus de 150 m², située dans un quartier très calme (à 2 minutes de la forêt), nous proposons une chambre à la colocation. ', 'Annuel', 650, 'Oui', 'Non', 'Oui', 'Oui', 'Non', 'Montreal', 'Quebec', '3090 Rue du Quesne', 'Canada', 'H1N 2X2', 0x41315f706578656c732d70686f746f2d3433393232372e6a706567, 32, '45.576050', '-73.542600'),
(45, 'Appartment', '3 1/2', 'Dans un immeuble hyper centre de St Etienne ( Peuple/Gambetta) loue une chambre de 12m² en colocation dans un appartement de 121 M² situé au 1er étage', 'Annuel', 800, 'Non', 'Oui', 'Oui', 'Non', 'Non', 'Montreal', 'Quebec', '1720 Bourbonniere', 'Canada', 'H1W 3N4', 0x41315f706578656c732d70686f746f2d313735373332322e6a706567, 32, '45.547130', '-73.540780'),
(47, 'Appartment', '4 1/2', 'A 2 min à pied de l\'appartement: un supermarché qui ferme tard le soir, un marché de producteurs locaux deux fois par semaine, mais aussi un parking souterrain sécurisé', 'Annuel', 1000, 'Non', 'Oui', 'Oui', 'Oui', 'Oui', 'Ottawa', 'Ontario', '362 Ted Kelly Lane Cumberland ', 'Canada', 'K4C 1A7', 0x3035706578656c732d70686f746f2d3237313632342e6a706567, 33, '45.510454', '-75.462359'),
(48, 'Chambre', '1 1/2', 'Un nouvelle proposition de colocation sympathique ouvre Rue de la richelandière. À proximité de l’hyper centre...', 'Mensuel', 500, 'Oui', 'Non', 'Non', 'Oui', 'Oui', 'Ottawa', 'Ontario', '455 Dawson Ave', 'Canada', 'K1Z 5V6', 0x41315f61706172745f706578656c2e6a706567, 33, '45.392354', '-75.745416'),
(49, 'Maison', '4 1/2', 'Lappartement est idéal si vous souhaitez partager des moments conviviaux tout en gardant un espace personnel indépendant.', 'Annuel', 1400, 'Non', 'Oui', 'Oui', 'Non', 'Non', 'Montreal', 'Quebec', '3435 Gouin E Montréal-Nord ', 'Canada', 'H1H 1B1', 0x41315f706578656c732d70686f746f2d313534333433392e6a706567, 34, '45.590100', '-73.651140');

-- --------------------------------------------------------

--
-- Table structure for table `proprietaire`
--

DROP TABLE IF EXISTS `proprietaire`;
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `descriptions` varchar(200) DEFAULT NULL,
  `pic` longblob,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proprietaire`
--

INSERT INTO `proprietaire` (`id`, `nom`, `prenom`, `email`, `pwd`, `descriptions`, `pic`) VALUES
(32, 'Robert', 'Klein', 'bob@email.com', 'test', 'Près de Fontainebleau : chambre de 28 m², dans une maison entièrement rénovée', 0x30396d5f696d616765732d31332e6a706567),
(33, 'Peter', 'Peterson', 'peter@email.com', 'test', 'L\'appartement refait à neuf récemment est entièrement meublé et spécialement adapté pour la colocation pour permettre à chacun de bénéficier de son propre confort sans gêner les autres.', 0x30326d5f696d616765732d332e6a706567),
(34, 'Joe', 'Colbert', 'joe@email.com', 'test', 'Je m\'appelle Joe, j\'ai 24 ans et je suis originaire de Berlin. Je vais étudier à Angers pour un semestre Erasmus de janvier à mai et je suis actuellement à la...', 0x30316d5f696d616765732d322e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `review_locataire`
--

DROP TABLE IF EXISTS `review_locataire`;
CREATE TABLE IF NOT EXISTS `review_locataire` (
  `id_reviewLocataire` int(11) NOT NULL AUTO_INCREMENT,
  `etoile` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_proprietaire` int(11) NOT NULL,
  PRIMARY KEY (`id_reviewLocataire`),
  UNIQUE KEY `FOREIGN` (`id_proprietaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_location`
--

DROP TABLE IF EXISTS `review_location`;
CREATE TABLE IF NOT EXISTS `review_location` (
  `id_reviewLocation` int(11) NOT NULL AUTO_INCREMENT,
  `etoile` tinyint(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_locataire` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  PRIMARY KEY (`id_reviewLocation`),
  KEY `FOREIGN` (`id_locataire`) USING BTREE,
  KEY `FOREIGN1` (`id_location`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_location`
--

INSERT INTO `review_location` (`id_reviewLocation`, `etoile`, `description`, `id_locataire`, `id_location`) VALUES
(1, 4, 'Tres bien! ', 81, 45),
(5, 4, 'Tres confortable :)', 81, 44),
(9, 3, 'Moyenne!!!', 81, 47),
(10, 4, 'Je recommande!!!', 81, 48),
(11, 5, 'Tres bien', 87, 48),
(12, 4, 'Tres grand, tres beau et tres confortable mais un peu cher :)', 81, 49),
(13, 4, 'Highly recommended!', 87, 49),
(14, 3, 'Pas mal!', 89, 44),
(15, 3, 'Bien situé mais trop petit', 87, 44);

-- --------------------------------------------------------

--
-- Table structure for table `review_proprietaire`
--

DROP TABLE IF EXISTS `review_proprietaire`;
CREATE TABLE IF NOT EXISTS `review_proprietaire` (
  `id_reviewProprietaire` int(11) NOT NULL AUTO_INCREMENT,
  `etoile` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_locataire` int(11) NOT NULL,
  PRIMARY KEY (`id_reviewProprietaire`),
  UNIQUE KEY `FOREIGN` (`id_locataire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favori`
--
ALTER TABLE `favori`
  ADD CONSTRAINT `favori_ibfk_1` FOREIGN KEY (`locations`) REFERENCES `locations` (`id_location`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `review_locataire`
--
ALTER TABLE `review_locataire`
  ADD CONSTRAINT `review_locataire_ibfk_1` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `review_location`
--
ALTER TABLE `review_location`
  ADD CONSTRAINT `review_location_ibfk_1` FOREIGN KEY (`id_locataire`) REFERENCES `locataire` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_location_ibfk_2` FOREIGN KEY (`id_location`) REFERENCES `locations` (`id_location`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `review_proprietaire`
--
ALTER TABLE `review_proprietaire`
  ADD CONSTRAINT `review_proprietaire_ibfk_1` FOREIGN KEY (`id_locataire`) REFERENCES `locataire` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
