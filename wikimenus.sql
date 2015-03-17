-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 06:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wikimenus`
--

-- --------------------------------------------------------

--
-- Table structure for table `chainrestaurant`
--

CREATE TABLE IF NOT EXISTS `chainrestaurant` (
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE IF NOT EXISTS `dish` (
`dishid` int(5) NOT NULL,
  `restaurant` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `averagerating` decimal(2,1) DEFAULT NULL,
  `typetag` char(30) DEFAULT NULL,
  `course` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dishreview`
--

CREATE TABLE IF NOT EXISTS `dishreview` (
  `reviewid` int(5) NOT NULL,
  `useremail` varchar(3) NOT NULL,
  `dishid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nonchainrestaurant`
--

CREATE TABLE IF NOT EXISTS `nonchainrestaurant` (
  `name` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
`reviewid` int(5) NOT NULL,
  `verbalreview` text,
  `numbericalrating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(30) NOT NULL,
  `username` char(20) DEFAULT NULL,
  `password` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chainrestaurant`
--
ALTER TABLE `chainrestaurant`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
 ADD PRIMARY KEY (`dishid`);

--
-- Indexes for table `nonchainrestaurant`
--
ALTER TABLE `nonchainrestaurant`
 ADD PRIMARY KEY (`name`,`address`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`reviewid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
MODIFY `dishid` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
MODIFY `reviewid` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
