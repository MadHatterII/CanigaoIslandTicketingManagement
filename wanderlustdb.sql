-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 05:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wanderlustdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FirstName`, `LastName`, `Birthdate`, `Email`, `Username`, `Password`) VALUES
(1, 'Admin', 'Admin', '2023-10-04', 'Admin@admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `boat`
--

CREATE TABLE `boat` (
  `BoatID` int(11) NOT NULL,
  `BoatName` varchar(255) NOT NULL,
  `BoatType` varchar(255) NOT NULL,
  `BoatCapacity` int(11) NOT NULL,
  `BoatStatus` enum('Active','Inactive') NOT NULL,
  `CaptainName` varchar(255) NOT NULL,
  `agentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cottages`
--

CREATE TABLE `cottages` (
  `id` int(11) NOT NULL,
  `price_overnight` decimal(10,2) NOT NULL,
  `price_day_tour` decimal(10,2) NOT NULL,
  `cottage_type` enum('Two-Story w/ Attic','Duplex Cottage(Right Side of  the Island)','Duplex Cottage(Right Side of  the Island)','Tourism Building Room') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cottages`
--

INSERT INTO `cottages` (`id`, `price_overnight`, `price_day_tour`, `cottage_type`) VALUES
(12, '15.00', '10.00', 'Two-Story w/ Attic'),
(13, '800.00', '1200.00', 'Duplex Cottage(Right Side of  the Island)'),
(14, '700.00', '1100.00', 'Duplex Cottage(Right Side of  the Island)'),
(15, '1500.00', '2500.00', 'Tourism Building Room');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(11) NOT NULL,
  `fee_type` enum('Entrance Fee','Environmental Fee','Boat Fee') DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `fee_type`, `amount`) VALUES
(1, 'Entrance Fee', '20.00'),
(2, 'Environmental Fee', '20.00'),
(3, 'Boat Fee', '3000.00');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `agentID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `BoatID` int(11) DEFAULT NULL,
  `Role` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`agentID`, `FirstName`, `LastName`, `Birthdate`, `Email`, `Username`, `Password`, `BoatID`, `Role`, `PhoneNumber`) VALUES
(61, 'Kyle', 'pitoc', '0000-00-00', 'pitockyle3@gmail.com', 'wqd', 'wqd', 3, 'Ticketing Agent', ''),
(62, 'sd', 'dscsd', '0000-00-00', 'dsc@swd', 'eww', 'wefwf', 3, 'Ticketing Agent', ''),
(63, 'Mihael', 'Goodes', '2023-10-05', 'goos@wq', 'wer12', '2121', 1, 'Ticketing Agent', '321321312'),
(64, 'Kyle', 'Kuizon', '2003-05-03', 'kuizonkylep@gmail.com', 'user', 'user', 1, 'Ticketing Agent', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `boat`
--
ALTER TABLE `boat`
  ADD PRIMARY KEY (`BoatID`),
  ADD KEY `agentID` (`agentID`);

--
-- Indexes for table `cottages`
--
ALTER TABLE `cottages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`agentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boat`
--
ALTER TABLE `boat`
  MODIFY `BoatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cottages`
--
ALTER TABLE `cottages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `agentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boat`
--
ALTER TABLE `boat`
  ADD CONSTRAINT `boat_ibfk_1` FOREIGN KEY (`agentID`) REFERENCES `useraccounts` (`agentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
