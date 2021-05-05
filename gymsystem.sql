-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2019 at 02:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `gid` int(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pfees` int(20) NOT NULL,
  `ldate` date NOT NULL,
  `nddate` date NOT NULL,
  KEY `gid` (`gid`),
  KEY `pname` (`pname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`gid`, `gname`, `pname`, `pfees`, `ldate`, `nddate`) VALUES
(1, 'vedant', 'gold', 15000, '2019-03-17', '2020-03-17'),
(2, 'arshad ', 'norml', 1500, '2019-03-17', '2019-04-17'),
(3, 'vedant nandi', 'gold', 15000, '2019-03-20', '2020-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `ginout`
--

DROP TABLE IF EXISTS `ginout`;
CREATE TABLE IF NOT EXISTS `ginout` (
  `gid` int(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `intime` varchar(50) NOT NULL,
  `outtime` varchar(50) NOT NULL,
  `iodate` date NOT NULL,
  `location` varchar(50) NOT NULL,
  KEY `gid` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ginout`
--

INSERT INTO `ginout` (`gid`, `gname`, `intime`, `outtime`, `iodate`, `location`) VALUES
(1, 'vedant', '11:13:16pm', '12:13:16am', '2019-03-17', 'ahmednagar'),
(1, 'vedant', '11:13:21pm', '12:13:21am', '2019-03-17', 'ahmednagar'),
(2, 'arshad ', '11:58:09pm', '12:58:09am', '2019-03-17', 'ahmednagar');

-- --------------------------------------------------------

--
-- Table structure for table `gym_mem`
--

DROP TABLE IF EXISTS `gym_mem`;
CREATE TABLE IF NOT EXISTS `gym_mem` (
  `gid` int(10) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `mno` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `doj` date NOT NULL,
  `pname` varchar(50) NOT NULL,
  `tname` varchar(50) NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `pname` (`pname`),
  KEY `tname` (`tname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_mem`
--

INSERT INTO `gym_mem` (`gid`, `gname`, `mno`, `address`, `dob`, `weight`, `height`, `doj`, `pname`, `tname`) VALUES
(1, 'vedant', '7875336749', 'ahmednagar', '1997-06-14', '70', '5.7', '2019-03-17', 'gold', 'ved'),
(2, 'arshad ', '7875336749', 'ahmednagar', '2019-03-04', '70', '5.7', '2019-03-17', 'norml', 'ved'),
(3, 'vedant nandi', '7875336749', 'ahmednagar', '1997-06-14', '70', '5.7', '2019-03-20', 'gold', 'ved');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `uname`, `pass`, `location`) VALUES
(1, 'ved', 'ved', 'ahmednagar');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `pid` int(10) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pfees` int(10) NOT NULL,
  `duration` varchar(50) NOT NULL,
  PRIMARY KEY (`pname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pid`, `pname`, `pfees`, `duration`) VALUES
(3, 'gold', 15000, '12 Months'),
(1, 'norml', 1500, '1 Months'),
(2, 'silver', 10000, '6 Months');

-- --------------------------------------------------------

--
-- Table structure for table `recipt`
--

DROP TABLE IF EXISTS `recipt`;
CREATE TABLE IF NOT EXISTS `recipt` (
  `reno` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `mno` varchar(50) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pfees` int(10) NOT NULL,
  `rdate` date NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`reno`),
  KEY `gid` (`gid`),
  KEY `pname` (`pname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipt`
--

INSERT INTO `recipt` (`reno`, `gid`, `gname`, `mno`, `pname`, `pfees`, `rdate`, `location`) VALUES
(1, 1, 'vedant', '7875336749', 'gold', 15000, '2019-03-17', 'ahmednagar'),
(2, 2, 'arshad ', '7875336749', 'norml', 1500, '2019-03-17', 'ahmednagar'),
(3, 3, 'vedant nandi', '7875336749', 'gold', 15000, '2019-03-20', 'ahmednagar');

-- --------------------------------------------------------

--
-- Table structure for table `tinout`
--

DROP TABLE IF EXISTS `tinout`;
CREATE TABLE IF NOT EXISTS `tinout` (
  `tid` int(10) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `tout` varchar(50) NOT NULL,
  `tdate` date NOT NULL,
  `location` varchar(50) NOT NULL,
  KEY `tid` (`tid`),
  KEY `tid_2` (`tid`),
  KEY `tid_3` (`tid`),
  KEY `tname` (`tname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `traner`
--

DROP TABLE IF EXISTS `traner`;
CREATE TABLE IF NOT EXISTS `traner` (
  `tid` int(10) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `tjoin` varchar(50) NOT NULL,
  `tsal` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mono` varchar(50) NOT NULL,
  PRIMARY KEY (`tname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traner`
--

INSERT INTO `traner` (`tid`, `tname`, `tjoin`, `tsal`, `address`, `mono`) VALUES
(2, 'kirn', '2019-03-20', 15000, 'ahmednagar', '7875336749'),
(1, 'ved', '2019-03-14', 10000, 'nagar', '78755');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `gym_mem` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fees_ibfk_2` FOREIGN KEY (`pname`) REFERENCES `package` (`pname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ginout`
--
ALTER TABLE `ginout`
  ADD CONSTRAINT `ginout_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `gym_mem` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gym_mem`
--
ALTER TABLE `gym_mem`
  ADD CONSTRAINT `gym_mem_ibfk_1` FOREIGN KEY (`pname`) REFERENCES `package` (`pname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gym_mem_ibfk_2` FOREIGN KEY (`tname`) REFERENCES `traner` (`tname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipt`
--
ALTER TABLE `recipt`
  ADD CONSTRAINT `recipt_ibfk_1` FOREIGN KEY (`pname`) REFERENCES `package` (`pname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipt_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `gym_mem` (`gid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tinout`
--
ALTER TABLE `tinout`
  ADD CONSTRAINT `tinout_ibfk_1` FOREIGN KEY (`tname`) REFERENCES `traner` (`tname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
