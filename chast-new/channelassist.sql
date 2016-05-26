-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2016 at 04:35 PM
-- Server version: 5.5.46
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `channelassist`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id_customer_account` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `comment` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_customer_account`, `customer_id`, `amount`, `date_add`, `comment`) VALUES
(55, 1, -8580, '2016-05-26', 'test'),
(56, 1, 1000, '2016-05-26', 'test2'),
(57, 6, 9000, '2016-05-26', 'new'),
(58, 6, -8000, '2016-05-26', 'test'),
(59, 6, 2000, '2016-05-26', 'test3'),
(60, 4, 0, '2016-05-26', 'sfsfs');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL,
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
  `avatar` text
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_customer_account`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_customer_account` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
