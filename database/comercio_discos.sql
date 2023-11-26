-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2023 at 05:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comercio_discos`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id` int(10) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`id`, `nombre`) VALUES
(1, 'Giusy Ferreri'),
(2, 'Pink Floyd'),
(3, 'Los Fundamentalistas del aire acondicionado'),
(4, 'AC-DC'),
(5, 'Led Zeppelin'),
(6, 'Soda Stereo'),
(7, 'Eric Clapton');

-- --------------------------------------------------------

--
-- Table structure for table `discos`
--

CREATE TABLE `discos` (
  `id` int(10) NOT NULL,
  `autor_id` int(10) NOT NULL,
  `genero_id` int(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discos`
--

INSERT INTO `discos` (`id`, `autor_id`, `genero_id`, `nombre`, `precio`) VALUES
(1, 1, 4, 'Girotondo', 7500.5),
(2, 2, 1, 'The Wall', 8750.25),
(3, 7, 2, 'Crossroads', 10502),
(4, 5, 1, 'Led Zeppelin I', 8500.25);

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `id` int(10) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Rock'),
(2, 'Blues'),
(3, 'Cumbia'),
(4, 'Pop');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nivel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `nivel`) VALUES
(1, 'omar@email.com', '$2y$10$Ok1SIqiVKjesOXh/uUHKge/F9LFvFTqhpu8hdnBfxZ7iRqItW1Dou', 'admin'),
(2, 'matias@email.com', '$2y$10$NqrD5XR954nuZPsfs8rRzeOBVAdBLfEVaYj2gHFVaNPpCOLJjxDC.', 'admin'),
(3, 'guest@email.com', '$2y$10$a2R1d1falFvRJc0hm0knWeZygzcgHnpXXQ2FtjWy59Ny5jJ8D9jhW', 'user'),
(4, 'webadmin', '$2y$10$b095X3XhrDjPwzbj3BgwiuN.1RyATcDddARL7yxi5.pBuLItt4w9K', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_id` (`genero_id`) USING BTREE,
  ADD KEY `autor_id` (`autor_id`) USING BTREE;

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discos`
--
ALTER TABLE `discos`
  ADD CONSTRAINT `discos_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`),
  ADD CONSTRAINT `discos_ibfk_2` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
