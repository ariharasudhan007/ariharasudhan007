-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.infinityfree.com
-- Generation Time: Oct 27, 2023 at 08:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35300730_medical_report`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `ContactNumber` varchar(15) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `FirstName`, `LastName`, `DateOfBirth`, `Gender`, `ContactNumber`, `Address`) VALUES
(1, 'Kesavan', 'R', '2003-06-10', 'Male', '6382440275', 'nallanur dharmapuri'),
(2, 'Ariharasudhan', 'P', '2003-06-10', 'Male', '7200314099', 'nallanur dharmapuri'),
(3, 'Ganesh', 'S', '2003-06-10', 'Female', '6380440278', 'nallanur dharmapuri'),
(4, 'Nethaji', 'M', '2003-06-10', 'Male', '6380440271', 'nallanur dharmapuri'),
(5, 'kabir', 'h', '2003-06-10', 'Male', '345635345', 'nallanur dharmapuri'),
(6, 'kathir', 'm', '2003-06-10', 'Male', '435345435', 'nallanur dharmapuri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
