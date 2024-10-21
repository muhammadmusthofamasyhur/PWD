-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 05:49 PM
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
-- Database: `pwd`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `institusi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role` enum('admin','visitor') NOT NULL DEFAULT 'visitor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `institusi`, `negara`, `alamat`, `role`) VALUES
(2, 'saya', 'saya@saya', '$2y$10$hismApqeOP5oqZrqmzjADOzTvB3MJYFIAf5BNPfil7KfNAhyreAL.', '', '', '', 'visitor'),
(3, 'admin', 'admin@admin', 'admin123', '', '', '', 'admin'),
(6, 'pakadmin', 'min@admin', '$2y$10$iGlHWoc/xxYsSrlGuREov.MijFX0Z/z2vPJQ2Qt.5lh8GqFXEfTyi', '', '', '', 'admin'),
(7, 'Musthofa', 'mhmsms12@gmail.com', '$2y$10$gr7B2USv43k/UcaFgFKtG.0vMJ1Y8IwdTlyukFft84AiPP9XlG/Z.', '', '', '', 'visitor'),
(8, 'ss', 'ss@ss', '$2y$10$4pQ.ZOn/RgVVVTrER/6nmOkXhNSOwVVgpT4lUGVQFu7eL6rCMseiu', 'aa', 'dds', 'ss', 'visitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
