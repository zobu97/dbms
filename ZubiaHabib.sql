-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 04, 2018 at 05:59 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ZubiaHabib`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CID` varchar(5) NOT NULL,
  `SNAME` varchar(20) NOT NULL,
  `CNAME` varchar(20) NOT NULL,
  `CNUMBER` varchar(20) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  `AREA` varchar(20) NOT NULL,
  `COORDINATES` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CID`, `SNAME`, `CNAME`, `CNUMBER`, `ADDRESS`, `AREA`, `COORDINATES`) VALUES
('2', 'MEDICOS', 'FAHEEM', '03008207472', 'BLOCK M', 'KARSAZ', '32.3333'),
('4', '2WS', 'BISMA', '03214567890', 'BLOCK L', 'NAZIMABAD', '21.789'),
('6', 'BARBER SALON', 'KHAN', '03456789012', 'SHOP 35', 'HASSAN SQUARE', '23.45678'),
('7', 'DILPASAND', 'NAWAL AKI', '03425678912', 'BUILDING 25', 'CLIFTON', '34.678');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `PCODE` varchar(25) NOT NULL,
  `BRAND` varchar(25) NOT NULL,
  `TYPE` varchar(25) NOT NULL,
  `SHADE` varchar(25) NOT NULL,
  `SIZE` varchar(25) NOT NULL,
  `SALESPRICE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`PCODE`, `BRAND`, `TYPE`, `SHADE`, `SIZE`, `SALESPRICE`) VALUES
('1', 'nelson', 'xyz', 'black', '21', '120'),
('2', 'deluxe', 'acb', 'purple', '11', '300'),
('3', 'hoola', 'ergf', 'yellow', '32', '500'),
('4', 'beauty', 'kdjfs', 'green', '33', '10002');

-- --------------------------------------------------------

--
-- Table structure for table `Salesperson`
--

CREATE TABLE `Salesperson` (
  `Name` varchar(20) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `CustomersAssigned` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Salesperson`
--

INSERT INTO `Salesperson` (`Name`, `ContactNumber`, `CustomersAssigned`) VALUES
('Zubia', '03412771353', '50'),
('Fatima', '12345678', '210'),
('Saim', '0345456', '4'),
('Abdullah', '34567891', '14');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `ACTIVE` varchar(20) NOT NULL,
  `SALESPERSON` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `PASSWORD`, `ACTIVE`, `SALESPERSON`) VALUES
('1', 'apple', 'yes', 'kamran'),
('2', 'bag', 'no', 'zubia'),
('3', 'yellow', 'yes', 'saim'),
('4', 'black', 'no', 'fatima'),
('5', 'laptop', 'no', 'faheem'),
('6', 'pencil', 'no', 'eruj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`PCODE`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
