-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2012 at 07:25 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `map_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm_data`
--

CREATE TABLE IF NOT EXISTS `atm_data` (
  `atm_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  PRIMARY KEY (`atm_id`),
  UNIQUE KEY `lon` (`lon`,`lat`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `atm_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `bank_info`
--

CREATE TABLE IF NOT EXISTS `bank_info` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  PRIMARY KEY (`bank_id`),
  UNIQUE KEY `bank_name` (`bank_name`),
  UNIQUE KEY `bank_name_2` (`bank_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bank_info`
--

INSERT INTO `bank_info` (`bank_id`, `bank_name`) VALUES
(1, 'DBBL'),
(4, 'HSBC'),
(3, 'EBL');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` char(1) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`admin_id`, `username`, `email`, `type`, `bank_id`, `password`) VALUES
(1, 'site_admin', NULL, 's', 1, '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'rahim', 'you@gmail.com', 'a', 3, '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'karim', 'you@gmail.com', 'a', 1, '2167a6ac80340b69f3b05b800417d6c7'),
(5, 'maddy', 'yourmail@gmail.com', 'm', 1, '66db6f4bfafbe4a0175bd34ab3f26566');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
