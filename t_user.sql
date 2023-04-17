-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 avr. 2023 à 12:46
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lafleur`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
  `email` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `codePostale` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `idPannier` int(11) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `T_USER_T_PANNIER0_AK` (`idPannier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`email`, `nom`, `prenom`, `adresse`, `ville`, `codePostale`, `motDePasse`, `idPannier`) VALUES
('aldupont@lafleur.fr', 'dupont', 'alex', '31 rue des petits chats ', 'orléans', '45000', '@lDupont45', 1),
('dylheur@gmail.com', 'lheur', 'dylan', '8 rue des fleurs', 'paris', '75000', 'Dylh€ur75', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `T_USER_T_PANNIER0_FK` FOREIGN KEY (`idPannier`) REFERENCES `t_pannier` (`idPannier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
