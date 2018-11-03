-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2018 at 04:19 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zubiahabib`
--

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `id` int(5) NOT NULL,
  `CID` varchar(5) NOT NULL,
  `SDATE` date NOT NULL,
  `SName` varchar(20) NOT NULL,
  `PCODE` varchar(25) NOT NULL,
  `QUANTITY` varchar(20) NOT NULL,
  `RATE` varchar(20) NOT NULL,
  `AMOUNT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`id`, `CID`, `SDATE`, `SName`, `PCODE`, `QUANTITY`, `RATE`, `AMOUNT`) VALUES
(1, '2', '2018-10-02', 'Zubia Habib', '1', '4', '100', '400'),
(2, '3', '2018-08-07', 'Fatima', '2', '3', '200', '60'),
(4, '4', '2018-11-04', 'Saim', '3', '7', '655', '233'),
(6, '5', '2018-11-19', 'dum', '4', '3', '21', '100'),
(8, '6', '2018-11-13', 'Abdullah', '5', '40', '7', '65'),
(9, '8', '2017-09-11', 'Bilal', '9', '45', '22', '1'),
(10, '9', '2016-02-07', 'Sidra', '10', '5', '100', '500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CID` (`CID`),
  ADD KEY `SName` (`SName`),
  ADD KEY `PCODE` (`PCODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
