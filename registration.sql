-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 06:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `picture` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `Name`, `Email`, `Password`, `picture`) VALUES
(3, 'ahkjsdjhkjahs', 'siguaeduardo3@gmail.com', '$2y$10$WqsdFTgY', 'uploads/Screenshot 2025-01-14 000754.png'),
(4, 'lenard', 'siguaeduardo3@gmail.com', '$2y$10$nZ810bdZ', 'uploads/Screenshot 2025-01-14 000754.png'),
(5, 'lenard', 'siguaeduardo3@gmail.com', '$2y$10$w9mWKNMi', 'uploads/Screenshot 2025-01-14 000754.png'),
(8, 'jacky', 'Chenjasdjsa@gmail.com', '$2y$10$qVkTiDGA', 'uploads/Screenshot 2025-01-14 000754.png'),
(9, 'jacky', 'Chenjasdjsa@gmail.com', '$2y$10$83lgfmFx', 'uploads/Screenshot 2025-01-14 000754.png'),
(10, 'jacky', 'Chenjasdjsa@gmail.com', '$2y$10$Z4Mc7nKX', 'uploads/Screenshot 2025-01-14 000754.png'),
(12, 'yuti', 'markanthony.ureta@concentrix.com', '$2y$10$fycgLj6Y', 'uploads/Screenshot 2025-01-19 152849.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
