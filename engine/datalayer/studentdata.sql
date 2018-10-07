-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 05:19 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentdata`
--
CREATE DATABASE IF NOT EXISTS `studentdata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentdata`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_studentinfo` (
  `id` varchar(8) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `othername` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `phonenum` varchar(13) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `campus` enum('main','city','other') DEFAULT NULL,
  `pic` blob,
  `programme` varchar(50) NOT NULL,
  `residency` varchar(50) NOT NULL,
  `entrydate` date NOT NULL,
  `exitdate` date NOT NULL,
  `height` float(3,2) DEFAULT NULL,
  `weight` float(3,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentlogin`
--

CREATE TABLE IF NOT EXISTS `tbl_studentlogin` (
  `usrname` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`usrname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_studentlogin`
--

INSERT INTO `tbl_studentlogin` (`usrname`, `name`, `password`, `email`) VALUES
('', '', '', ''),
('Alan', 'Alan Bentil', 'london05', 'alanbentil20@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
