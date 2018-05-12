-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Mai 2018 à 09:45
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `terrestre`
--

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `idvehicule` int(2) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `nbPortes` int(2) NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `climatisation` tinyint(1) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bateau`
--

INSERT INTO `vehicule` (`idvehicule`, `categorie`,`marque`, `modele`, `nbPortes`, `transmission`, `climatisation`, `disponibilite`) VALUES
(1,'voiture', 'fiat', '500', 3, "manuelle", 1, 1),
(2,'voiture', 'fiat', 'punto', 5, "automatique", 1, 1),
(3,'voiture', 'mercedes-benz', 'classe c', 5, "automatique", 1, 1),
(4,'voiture', 'audi', 'A4', 5, "automatique", 1, 1),
(5,'camion', 'mercedes-benz', 'Atego', 5, "manuelle", 1, 1),
(6,'camion', 'renauld', 'xload', 3, "automatique", 1, 1),
(7,'camion', 'man', 'tgx', 5, "manuelle", 1, 1),
(8,'autocar', 'fiat', '308', 2, "manuelle", 1, 1),
(9,'autocar' ,'iveco', '370', 2, "automatique", 1, 1),
(10,'autocar', 'renauld', 'tracer', 4, "manuelle", 1, 1);


--
-- Index pour les tables exportées
--

--
-- Index pour la table `véhicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`idvehicule`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bateau`
--
ALTER TABLE `vehicule`
  MODIFY `idvehicule` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE membre (
	id int(11) NOT NULL auto_increment,
	login text NOT NULL,
	pass_md5 text NOT NULL,
	PRIMARY KEY  (id)
) TYPE=MyISAM;
