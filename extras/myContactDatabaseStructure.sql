-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2013 at 03:42 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycontacts`
--
DROP DATABASE `mycontacts`;
CREATE DATABASE `mycontacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE `mycontacts`;

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
CREATE TABLE IF NOT EXISTS `achievements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_cs NOT NULL,
  `how_to` text COLLATE latin1_general_cs NOT NULL,
  `is_achieved` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=13 ;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `how_to`, `is_achieved`) VALUES
(1, 'About-er', 'Visit the ''About'' page.', 0),
(2, 'Eager Learner', 'Visit the ''Achievements'' page.', 1),
(3, 'I''m not alone!', 'Create a Contact', 0),
(4, 'Memoryless', 'View the information of a Contact', 0),
(5, 'Something''s alive out there', 'Edit and update a Contact', 0),
(6, 'Killer', 'Delete a Contact', 0),
(7, 'Lover', 'Set a Contact as ''favorite''', 0),
(8, 'Classifier', 'Create a Group', 0),
(9, 'Wording counts!', 'Update a Group', 0),
(10, 'Mass killer', 'Delete a Group', 0),
(11, 'Sorter', 'Assign a Contact to at least one Group', 0),
(12, 'Researcher', 'Use the innovative Search feature', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_group_links`
--

DROP TABLE IF EXISTS `contact_group_links`;
CREATE TABLE IF NOT EXISTS `contact_group_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` text COLLATE latin1_general_cs NOT NULL,
  `is_favorite` tinyint(1) NOT NULL,
  `first_name` text COLLATE latin1_general_cs NOT NULL,
  `last_name` text COLLATE latin1_general_cs NOT NULL,
  `home_phone` text COLLATE latin1_general_cs NOT NULL,
  `mobile_phone` text COLLATE latin1_general_cs NOT NULL,
  `office_phone` text COLLATE latin1_general_cs NOT NULL,
  `personal_mail` text COLLATE latin1_general_cs NOT NULL,
  `office_mail` text COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
