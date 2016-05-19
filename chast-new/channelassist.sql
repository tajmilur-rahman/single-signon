-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 03:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `channelassist`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `gender` varchar(30) NOT NULL,
  `lang` varchar(30) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `optin` tinyint(1) NOT NULL DEFAULT '0',
  `website` varchar(128) DEFAULT NULL,
  `max_payment_days` int(10) NOT NULL DEFAULT '60',
  `note` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `hire_date` date DEFAULT NULL,
  `department` varchar(32) DEFAULT NULL,
  `job_title` varchar(32) DEFAULT NULL,
  `avatar` text,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `gender`, `lang`, `company`, `firstname`, `lastname`, `email`, `passwd`, `birthday`, `newsletter`, `optin`, `website`, `max_payment_days`, `note`, `active`, `is_guest`, `date_add`, `date_upd`, `hire_date`, `department`, `job_title`, `avatar`) VALUES
(1, '1', NULL, NULL, 'ao', 'hu', 'huao@gmail.com', 'klf12345', NULL, 0, 0, NULL, 60, NULL, 0, 0, '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL),
(2, '', NULL, NULL, 'sdfsf', 'sdfsffsdfs', 'kkk@gmail.com', '12345', NULL, 0, 0, NULL, 60, NULL, 0, 0, '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
