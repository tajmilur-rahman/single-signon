-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 05:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linkindb`
--

CREATE DATABASE IF NOT EXISTS `linkindb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `linkindb`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `uUsername` varchar(128) NOT NULL,
  `uPassword` varchar(40) NOT NULL,
  `uSalt` varchar(128) NOT NULL,
  `uActivity` datetime NOT NULL,
  `uCreated` datetime NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `uUsername` (`uUsername`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `uUsername`, `uPassword`, `uSalt`, `uActivity`, `uCreated`) VALUES
(1, 'huao', 'c00104938672559e95939fb2e20a73843a6f6c9d', '570fb112ab5588.74997320570fb112ab5603.49871228570fb112ab5651.99985971570fb112ab5690.45803984570fb112ab56e6.16400266570fb112ab572', '2016-04-14 11:02:50', '2016-04-14 11:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `users_information`
--

CREATE TABLE IF NOT EXISTS `users_information` (
  `userId` int(11) NOT NULL,
  `infoKey` varchar(128) NOT NULL,
  `InfoValue` text NOT NULL,
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
