-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 06:50 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `userId` int(11) NOT NULL,
  `tokenId` int(11) NOT NULL,
  KEY `userId` (`userId`,`tokenId`),
  KEY `tokenId` (`tokenId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`userId`, `tokenId`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `tokenId` int(11) NOT NULL AUTO_INCREMENT,
  `tokenName` varchar(30) NOT NULL,
  PRIMARY KEY (`tokenId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`tokenId`, `tokenName`) VALUES
(2, 'fghgfhfhfhffgh');

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
  `uAge` int(3) DEFAULT NULL,
  `uEmail` varchar(30) DEFAULT NULL,
  `uPhone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `uUsername` (`uUsername`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `uUsername`, `uPassword`, `uSalt`, `uActivity`, `uCreated`, `uAge`, `uEmail`, `uPhone`) VALUES
(1, 'huao', '5f34378ec3617bd18a29df00329a280ec9c4c19d', '570d5efddc31b3.16642310570d5efddc3245.53101715570d5efddc3292.75808712570d5efddc32f6.07992550570d5efddc3343.18409390570d5efddc33a', '2016-04-18 10:56:25', '2016-04-12 16:47:57', 40, 'huao@gmail.com', '2332789234234'),
(2, 'kkkk', '3e807e633e1a3766aa10c2a3fb76e62f528313ac', '570d61653c4856.43561165570d61653c4902.49056076570d61653c4944.31574701570d61653c4994.98477415570d61653c49e2.30098278570d61653c4a2', '2016-04-18 11:16:55', '2016-04-12 16:58:13', 35, 'ewrwr@gmail.com', '4534535345');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `FK_LINK_TOKENID` FOREIGN KEY (`tokenId`) REFERENCES `token` (`tokenId`),
  ADD CONSTRAINT `FK_LINK_USERID` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
