-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2017 at 10:47 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mash_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_db`
--

CREATE TABLE IF NOT EXISTS `contact_db` (
`CONTACT_ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `MESSAGE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register_tb`
--

CREATE TABLE IF NOT EXISTS `register_tb` (
`USER ID` int(11) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_tb`
--

INSERT INTO `register_tb` (`USER ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `Date`) VALUES
(1, 'roger', 'roger.isingoma@gmail.com', '12345', '2016-12-05 06:49:35'),
(2, 'vinay', 'vinay@gmail.com', '123', '2016-12-05 06:49:35'),
(3, 'Jsco', 'Jsco@gmail.com', 'jsco1', '2016-12-05 12:26:14'),
(4, 'Rukidi Garcon', 'rukidigarcon@yahoo.com', 'realnigga', '2016-12-08 06:25:09'),
(5, 'minason', 'minason@gmail.com', '123m', '2016-12-08 13:18:47'),
(6, 'luleraymond', 'luleraymond@gmail.com', 'lule123', '2016-12-12 08:25:16'),
(7, 'levi', 'levi@gmil.com', '123456', '2016-12-19 06:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_tb`
--

CREATE TABLE IF NOT EXISTS `reserve_tb` (
`PASSENGER_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `TELEPHONE_NUMBER` int(10) NOT NULL,
  `EMAIL_ADDRESS` varchar(50) NOT NULL,
  `PASSPORT_NUMBER` varchar(10) NOT NULL,
  `NUMBER_OF_TRAVELERS` int(10) NOT NULL,
  `TRAVEL_SCHEDULE` enum('Morning','Evening') NOT NULL,
  `AMOUNT` int(10) NOT NULL,
  `SEAT_CLASS` enum('VIP CLASS','BUSINESS CLASS','NORMAL','MASH COOL GOLD CLASS') NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve_tb`
--

INSERT INTO `reserve_tb` (`PASSENGER_ID`, `FIRST_NAME`, `LAST_NAME`, `TELEPHONE_NUMBER`, `EMAIL_ADDRESS`, `PASSPORT_NUMBER`, `NUMBER_OF_TRAVELERS`, `TRAVEL_SCHEDULE`, `AMOUNT`, `SEAT_CLASS`, `DateCreated`) VALUES
(11, 'Roger', 'Isngoma', 782327351, 'roger.isingoma@gmail.com', '00949865', 1, 'Morning', 20, 'NORMAL', '2016-12-09 13:33:08'),
(12, 'Lule', 'Raymond', 704485992, 'roger.isingoma@gmail.com', '008457324', 1, 'Morning', 20, 'NORMAL', '2016-12-12 08:31:44'),
(13, 'Roger', 'Isingoma', 782327351, 'roger.isingoma@gmail.com', '000949865', 1, 'Morning', 20, 'NORMAL', '2016-12-12 10:20:07'),
(14, 'Levi', 'Aleon', 704484648, 'levi@gmail.com', '0059598671', 1, 'Morning', 20, 'NORMAL', '2016-12-19 06:35:28'),
(15, 'Roger', 'Isingoma', 755108303, 'roger.isingoma@gmail.com', '000949865', 1, 'Evening', 20, 'NORMAL', '2017-01-04 16:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `travel_tb`
--

CREATE TABLE IF NOT EXISTS `travel_tb` (
`TRAVEL_ID` int(11) NOT NULL,
  `TRAVELING_FROM` varchar(10) NOT NULL,
  `TRAVELING_TO` varchar(10) NOT NULL,
  `TRAVEL_DATE` varchar(10) NOT NULL,
  `RETURN_DATE` varchar(10) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_tb`
--

INSERT INTO `travel_tb` (`TRAVEL_ID`, `TRAVELING_FROM`, `TRAVELING_TO`, `TRAVEL_DATE`, `RETURN_DATE`, `Date`) VALUES
(7, 'Kampala', 'Kigali', '23/11/2016', '30/11/2016', '2016-12-08 13:05:25'),
(8, 'Kigali', 'Kampala', '26/12/2016', '4/1/2017', '2016-12-08 13:20:21'),
(9, 'Kampala', 'Kigali', '12/12/2016', '24/12/2016', '2016-12-09 09:24:28'),
(10, 'Kigali', 'Kampala', '2016-09-14', '2016-12-21', '2016-12-09 10:38:39'),
(11, 'Nairobi', 'Mombasa', '24/12/2016', '30/12/2016', '2016-12-09 10:51:31'),
(12, 'Kitui', 'Mombasa', '12/24/2016', '12/30/2016', '2016-12-09 13:10:39'),
(13, 'Kampala', 'Nairobi', '12/24/2016', '12/30/2016', '2016-12-12 08:29:04'),
(14, 'Kampala', 'Kigali', '12/14/2016', '12/18/2016', '2016-12-12 10:17:51'),
(15, 'Mombasa', 'Kitui', '1/4/2017', '1/10/2017', '2016-12-12 11:01:33'),
(16, 'Kampala', 'Kigali', '12/28/2016', '1/10/2017', '2016-12-13 13:25:57'),
(17, 'Kampala', 'Kigali', '12/23/2016', '12/30/2016', '2016-12-19 06:33:45'),
(18, 'Kampala', 'Kigali', '1/5/2017', '1/10/2017', '2017-01-04 16:46:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_db`
--
ALTER TABLE `contact_db`
 ADD PRIMARY KEY (`CONTACT_ID`);

--
-- Indexes for table `register_tb`
--
ALTER TABLE `register_tb`
 ADD PRIMARY KEY (`USER ID`);

--
-- Indexes for table `reserve_tb`
--
ALTER TABLE `reserve_tb`
 ADD PRIMARY KEY (`PASSENGER_ID`);

--
-- Indexes for table `travel_tb`
--
ALTER TABLE `travel_tb`
 ADD PRIMARY KEY (`TRAVEL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_db`
--
ALTER TABLE `contact_db`
MODIFY `CONTACT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register_tb`
--
ALTER TABLE `register_tb`
MODIFY `USER ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reserve_tb`
--
ALTER TABLE `reserve_tb`
MODIFY `PASSENGER_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `travel_tb`
--
ALTER TABLE `travel_tb`
MODIFY `TRAVEL_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
