-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 18 Juillet 2013 à 09:22
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mycontacts`
--
DROP DATABASE `mycontacts`;
CREATE DATABASE `mycontacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mycontacts`;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `is_favorite` tinyint(1) NOT NULL,
  `first_name` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `last_name` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `home_phone` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `mobile_phone` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `office_phone` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `personal_mail` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `office_mail` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `manytomany_contacts_groups`
--

DROP TABLE IF EXISTS `manytomany_contacts_groups`;
CREATE TABLE IF NOT EXISTS `manytomany_contacts_groups` (
  `contact_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
