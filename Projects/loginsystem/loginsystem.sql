-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 08:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `sno` int(11) NOT NULL,
  `username` varchar(21) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'KOKP', '$2y$10$9AK.P9SUYSUmx8Iy9Br7ku4/BfKJb.1HOxKI74o44u9dDN6K.X89a', '2023-02-17 22:45:50'),
(2, 'parag', '$2y$10$80cROhnoaq371lliscwqrebj2f7C3kQZYR5ub7EXi79nJeUvuMoZC', '2023-02-17 22:46:01'),
(3, 'Saurabh', '$2y$10$49wz0odC43a9gM5/kFGX6.Lyax4UlxcSTPZJR6BK.f0tjmwQ1q/.G', '2023-02-18 11:09:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logininfo`
--
ALTER TABLE `logininfo`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
