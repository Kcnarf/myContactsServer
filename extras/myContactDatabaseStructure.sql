-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2013 at 09:35 PM
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
CREATE DATABASE `mycontacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mycontacts`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `favorite` tinyint(1) NOT NULL,
  `first_name` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `last_name` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `home_phone` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `mobile_phone` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `office_phone` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `personal_mail` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `office_mail` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `alias`, `favorite`, `first_name`, `last_name`, `home_phone`, `mobile_phone`, `office_phone`, `personal_mail`, `office_mail`) VALUES
(1, 'Foo', 0, '', '', '', '', '', '', ''),
(2, 'Bar', 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5416 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `name`) VALUES
(1, 'FooBar');

-- --------------------------------------------------------

--
-- Table structure for table `manytomany_contacts_groups`
--

CREATE TABLE IF NOT EXISTS `manytomany_contacts_groups` (
  `contactId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
