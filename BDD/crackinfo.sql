-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 13 juil. 2022 à 02:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crackinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `admininfo`
--

DROP TABLE IF EXISTS `admininfo`;
CREATE TABLE IF NOT EXISTS `admininfo` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `idRole` int(11) NOT NULL,
  `idSexe` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idAdmin`),
  KEY `idRole` (`idRole`),
  KEY `idSexe` (`idSexe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admininfo`
--

INSERT INTO `admininfo` (`idAdmin`, `nom`, `prenom`, `idRole`, `idSexe`, `photo`, `login`, `password`) VALUES
(1, 'Tigoli', 'Frederic', 1, 1, NULL, 'admin', '123456'),
(2, 'tigoli', 'olivier', 2, 1, 'face2.jpg', 'tigoliol', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

DROP TABLE IF EXISTS `choix`;
CREATE TABLE IF NOT EXISTS `choix` (
  `idPart` int(11) NOT NULL,
  `idSpe` int(11) NOT NULL,
  KEY `idPart` (`idPart`),
  KEY `idSpe` (`idSpe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `choix`
--

INSERT INTO `choix` (`idPart`, `idSpe`) VALUES
(9240, 1),
(9240, 2),
(1162, 1),
(1162, 2),
(20, 1),
(20, 2),
(7845, 1),
(7845, 2);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `idPart` int(11) NOT NULL,
  `idSpe` int(11) NOT NULL,
  `codeGrp` int(11) NOT NULL,
  `datdeb` varchar(255) DEFAULT NULL,
  `datFin` varchar(255) DEFAULT NULL,
  KEY `idPart` (`idPart`),
  KEY `idSpe` (`idSpe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idPart`, `idSpe`, `codeGrp`, `datdeb`, `datFin`) VALUES
(9240, 1, 10, '2022-07-12', '2022-07-19'),
(9240, 2, 20, '2022-07-26', '2022-08-02'),
(1162, 1, 10, '2022-07-12', '2022-07-19'),
(1162, 2, 20, '2022-07-26', '2022-08-02'),
(20, 1, 10, '2022-07-12', '2022-07-19'),
(20, 2, 20, '2022-07-26', '2022-08-02'),
(7845, 1, 11, '2022-07-19', '2022-07-26'),
(7845, 2, 21, '2022-08-02', '2022-08-09');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `idNiv` int(11) NOT NULL AUTO_INCREMENT,
  `libNiv` varchar(255) NOT NULL,
  PRIMARY KEY (`idNiv`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`idNiv`, `libNiv`) VALUES
(1, 'Licence 1 '),
(2, 'Licence 2'),
(3, 'Licence 3 '),
(4, 'Master 1'),
(5, 'Master 2');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `idPart` int(11) NOT NULL,
  `idSpe` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  `Note` int(2) NOT NULL,
  KEY `IdAdmin` (`IdAdmin`),
  KEY `idSpe` (`idSpe`),
  KEY `idPart` (`idPart`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`idPart`, `idSpe`, `IdAdmin`, `Note`) VALUES
(20, 1, 1, 18);

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
CREATE TABLE IF NOT EXISTS `parametre` (
  `id` int(11) NOT NULL,
  `finInscrpt` varchar(255) DEFAULT NULL,
  `preparation` varchar(255) DEFAULT NULL,
  `debutEvent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parametre`
--

INSERT INTO `parametre` (`id`, `finInscrpt`, `preparation`, `debutEvent`) VALUES
(1, '2022-06-11', '31', '2022-07-12');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `idPart` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `idNiv` int(11) NOT NULL,
  `idSexe` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `numTel` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `dateCrea` datetime NOT NULL,
  PRIMARY KEY (`idPart`),
  KEY `idNiv` (`idNiv`),
  KEY `idSexe` (`idSexe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`idPart`, `nom`, `prenom`, `idNiv`, `idSexe`, `mail`, `numTel`, `photo`, `dateCrea`) VALUES
(20, 'tigoli', 'olivier', 3, 1, 'olivier@gmail.com', '0767630436', 'face2.jpg', '2022-06-11 14:44:47'),
(1162, 'tigoli', 'olivier', 3, 1, 'olivier@gmail.com', '0767630436', 'face2.jpg', '2022-06-11 14:44:37'),
(7845, 'tigoli', 'olivier', 3, 1, 'olivier@gmail.com', '0767630436', 'face2.jpg', '2022-06-11 14:44:58'),
(9240, 'tigoli', 'olivier', 3, 1, 'olivier@gmail.com', '0767630436', 'face2.jpg', '2022-06-11 14:43:31');

-- --------------------------------------------------------

--
-- Structure de la table `passage`
--

DROP TABLE IF EXISTS `passage`;
CREATE TABLE IF NOT EXISTS `passage` (
  `codeGrp` int(11) NOT NULL,
  `datePass` varchar(255) DEFAULT NULL,
  KEY `codeGrp` (`codeGrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `libRole` varchar(255) NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `libRole`) VALUES
(1, 'Admin'),
(2, 'Jury'),
(3, 'Participant');

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `idSexe` int(11) NOT NULL AUTO_INCREMENT,
  `libSexe` varchar(255) NOT NULL,
  PRIMARY KEY (`idSexe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sexe`
--

INSERT INTO `sexe` (`idSexe`, `libSexe`) VALUES
(1, 'Homme'),
(2, 'Femme');

-- --------------------------------------------------------

--
-- Structure de la table `specificite`
--

DROP TABLE IF EXISTS `specificite`;
CREATE TABLE IF NOT EXISTS `specificite` (
  `idSpe` int(11) NOT NULL AUTO_INCREMENT,
  `libSpe` varchar(255) NOT NULL,
  PRIMARY KEY (`idSpe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specificite`
--

INSERT INTO `specificite` (`idSpe`, `libSpe`) VALUES
(1, 'Big Data'),
(2, 'Mobile et Web'),
(3, 'Base de donnees et Systeme information'),
(4, 'Reseaux, Telecom et Securite');

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

DROP TABLE IF EXISTS `travaux`;
CREATE TABLE IF NOT EXISTS `travaux` (
  `idPart` int(11) NOT NULL,
  `idSpe` int(11) NOT NULL,
  `Travaux` varchar(255) NOT NULL,
  KEY `idPart` (`idPart`),
  KEY `idSpe` (`idSpe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `travaux`
--

INSERT INTO `travaux` (`idPart`, `idSpe`, `Travaux`) VALUES
(9240, 1, '186bd831b881fcb0ea20aab41f6edded.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `idPart` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idPart` (`idPart`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `photo`, `idPart`) VALUES
(1, 'Zowblazo', 'fred1910', 'face2.jpg', 9240),
(2, 'tigoli1162', '116213', 'face2.jpg', 1162),
(3, 'tigoli20', '2013', 'face2.jpg', 20),
(4, 'tigoli7845', '784513', 'face2.jpg', 7845);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admininfo`
--
ALTER TABLE `admininfo`
  ADD CONSTRAINT `admininfo_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`),
  ADD CONSTRAINT `admininfo_ibfk_2` FOREIGN KEY (`idSexe`) REFERENCES `sexe` (`idSexe`);

--
-- Contraintes pour la table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `choix_ibfk_1` FOREIGN KEY (`idPart`) REFERENCES `participant` (`idPart`),
  ADD CONSTRAINT `choix_ibfk_2` FOREIGN KEY (`idSpe`) REFERENCES `specificite` (`idSpe`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`idSpe`) REFERENCES `specificite` (`idSpe`),
  ADD CONSTRAINT `groupe_ibfk_3` FOREIGN KEY (`idPart`) REFERENCES `participant` (`idPart`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`IdAdmin`) REFERENCES `admininfo` (`idAdmin`),
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`idPart`) REFERENCES `participant` (`idPart`),
  ADD CONSTRAINT `note_ibfk_3` FOREIGN KEY (`idSpe`) REFERENCES `sexe` (`idSexe`);

--
-- Contraintes pour la table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`idSexe`) REFERENCES `sexe` (`idSexe`),
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`idNiv`) REFERENCES `niveau` (`idNiv`);

--
-- Contraintes pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD CONSTRAINT `travaux_ibfk_1` FOREIGN KEY (`idPart`) REFERENCES `participant` (`idPart`),
  ADD CONSTRAINT `travaux_ibfk_2` FOREIGN KEY (`idSpe`) REFERENCES `specificite` (`idSpe`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`idPart`) REFERENCES `participant` (`idPart`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
