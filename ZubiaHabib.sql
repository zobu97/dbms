-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 03:43 PM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(5) NOT NULL,
  `SNAME` varchar(20) NOT NULL,
  `CNAME` varchar(20) NOT NULL,
  `CNUMBER` varchar(20) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `AREA` varchar(20) NOT NULL,
  `COORDINATES` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `SNAME`, `CNAME`, `CNUMBER`, `ADDRESS`, `AREA`, `COORDINATES`) VALUES
(2, 'MEDICOS', 'FAHEEM ALI', '03008207472', 'BLOCK M', 'KARSAZ', '32.3333'),
(4, '2WS', 'BISMA', '03214567890', 'BLOCK L', 'NAZIMABAD', '21.789'),
(6, 'BARBER SALON', 'KHAN', '03456789012', 'SHOP 35', 'HASSAN SQUARE', '23.45678'),
(8, 'fgfhgfhj', 'dfdgfdg', '12344', 'gfhhg', 'ghghfg', '3455');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PCODE` int(5) NOT NULL,
  `BRAND` varchar(25) NOT NULL,
  `TYPE` varchar(25) NOT NULL,
  `SHADE` varchar(25) NOT NULL,
  `SIZE` varchar(25) NOT NULL,
  `SALESPRICE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PCODE`, `BRAND`, `TYPE`, `SHADE`, `SIZE`, `SALESPRICE`) VALUES
(1, 'nelson', 'xyz', 'black', '21', '120'),
(2, 'deluxe', 'acb', 'purple', '11', '300'),
(3, 'hoola', 'ergf', 'yellow', '32', '500'),
(4, 'beauty', 'kdjfs', 'green', '33', '10002');

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

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE `salesperson` (
  `SPERSONID` int(5) NOT NULL,
  `SName` varchar(20) NOT NULL,
  `CONTACTNO` varchar(20) NOT NULL,
  `CUSTOMERASSIGNED` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`SPERSONID`, `SName`, `CONTACTNO`, `CUSTOMERASSIGNED`) VALUES
(1, 'Abdullah', '34567891', '14'),
(2, 'Fatima', '12345678', '210'),
(3, 'Saim', '0345456', '4'),
(4, 'Zubia', '03412771353', '50'),
(7, 'fgfgf', '5677', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(5) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `ACTIVE` varchar(20) NOT NULL,
  `SName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `USERNAME`, `PASSWORD`, `ACTIVE`, `SName`) VALUES
(1, 'Zaidi WOW', 'apple', 'yes', 'kamran'),
(2, 'suhaiba', 'bag', 'no', 'zubia'),
(5, 'maryam', 'laptop', 'no', 'faheem'),
(6, 'KK', 'LL', 'NO', 'MM'),
(8, 'ghf', 'asdf', 'NO', 'yyut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PCODE`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SName` (`SName`),
  ADD KEY `PCODE` (`PCODE`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`SPERSONID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PCODE` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salesperson`
--
ALTER TABLE `salesperson`
  MODIFY `SPERSONID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
