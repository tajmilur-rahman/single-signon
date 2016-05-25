-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 09:16 PM
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
  `newsletter` varchar(20) NOT NULL,
  `optin` varchar(20) NOT NULL,
  `website` varchar(128) DEFAULT NULL,
  `max_payment_days` int(10) NOT NULL DEFAULT '60',
  `note` text,
  `hire_date` date DEFAULT NULL,
  `department` varchar(32) DEFAULT NULL,
  `job_title` varchar(32) DEFAULT NULL,
  `avatar` text,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `gender`, `lang`, `company`, `firstname`, `lastname`, `email`, `passwd`, `birthday`, `newsletter`, `optin`, `website`, `max_payment_days`, `note`, `hire_date`, `department`, `job_title`, `avatar`) VALUES
(1, '1', NULL, NULL, 'ao', 'hu', 'huao@gmail.com', '1234567', NULL, '0', '0', NULL, 60, NULL, NULL, NULL, NULL, NULL),
(2, 'man', 'English', 'KLF media', 'Mike', 'Smith', 'Mike@gmail.com', '12345', '1978-12-02', 'Yes', 'Yes', 'http://www.google.com', 60, 'test', '2015-04-13', 'IT', 'engineer', 'test'),
(3, 'man', 'English', 'tttt', 'Jack', 'Chen', 'chen@gmail.com', '12345', '2000-05-04', '0', '0', NULL, 60, NULL, '2016-05-04', NULL, NULL, NULL),
(4, 'woman', 'English', 'klf', 'Mary', 'Brown', 'mary@gmail.com', '12345', '1987-05-02', '0', '0', NULL, 60, NULL, NULL, NULL, NULL, NULL),
(5, 'wewesdfs', 'sdfwrwerw', 'ddgdfgdfg', 'rwrwer', 'hfghf', 'aaaa@gmail.com', '1234', NULL, '', '1', NULL, 60, NULL, '2016-05-21', 'sdfsfsdfs', 'sdfsdfdsf', NULL),
(6, 'Man', 'English', 'klf', 'oka', 'jin', 'jin@gmail.com', '12345', '1956-05-03', '', '', NULL, 60, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
