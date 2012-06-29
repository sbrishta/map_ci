-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2012 at 01:47 PM
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
-- Table structure for table `admin_table`
--

CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `type` char(1) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `bank_id` (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `firstname`, `lastname`, `username`, `type`, `bank_id`, `password`) VALUES
(1, 'site', 'admin', 'site_admin', 's', 1, '81dc9bdb52d04dc20036dbd8313ed055');

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
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `type` char(1) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `member`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_member`
--

CREATE TABLE IF NOT EXISTS `temp_member` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `temp_member`
--

INSERT INTO `temp_member` (`temp_id`, `firstname`, `lastname`, `username`, `bank_id`, `password`) VALUES
(3, 'shabnam', 'basera', 'rishta', 1, 'b411e17dde88bb00590aa7f831fbe5d0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
