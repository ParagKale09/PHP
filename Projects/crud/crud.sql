-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 08:14 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `sno` int(11) NOT NULL,
  `username` varchar(21) NOT NULL,
  `password` text NOT NULL,
  `dt` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'parag', '$2y$10$rAb4D1mui0289Ktl.ZvRUuqszq7Dv75JciuN1GMW5/MRylCxar63C', 2147483647),
(2, 'Admin', '$2y$10$pwWU/2C1FqvpCJpYNdLNRuGrkKJ.sTUb3S7R.w/d.2j8tEZn4F9ym', 2147483647),
(3, 'groot', '$2y$10$/tFkrh8yLsygOTIL3BZNeud7oX94Qo4j/AhOLoS6/PGqfL2EeaaBS', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `title`, `description`) VALUES
(1, 'Learn PHP', 'Resource - Codewithharry'),
(2, 'Learn C++', 'Resource - CWH'),
(6, 'Groceries List', 'Daal, Rice, Wheat'),
(7, 'List of Books', 'Bio, Phy, Chem, IT'),
(12, 'Events', 'Attend an event today at 7PM.'),
(13, 'Assignment', 'Complete the Bio and chem assignment.'),
(15, 'IMP Links', 'codevita - https://www.codevita .com/'),
(16, 'Passowords', 'Phonepe - 143\r\nGooglepay - 593'),
(17, 'Tasks', '1-Go and get some Tea from market'),
(19, 'Series to watch', 'La casa De Papel, Dahmer'),
(20, 'Mobile no', '9584824343'),
(21, 'Marvel Characters', 'Cap, Moonknight, Daredevil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logininfo`
--
ALTER TABLE `logininfo`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
