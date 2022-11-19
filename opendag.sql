-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 19, 2022 at 04:14 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opendag`
--
DROP DATABASE IF EXISTS `opendag`;
CREATE DATABASE IF NOT EXISTS `opendag` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `opendag`;

-- --------------------------------------------------------

--
-- Table structure for table `antwoorden`
--

CREATE TABLE `antwoorden` (
  `id` int(11) NOT NULL,
  `enqueteId` int(11) NOT NULL,
  `answeredById` int(11) NOT NULL,
  `antwoord1` varchar(200) NOT NULL,
  `antwoord2` varchar(200) DEFAULT NULL,
  `antwoord3` varchar(200) DEFAULT NULL,
  `antwoord4` varchar(200) DEFAULT NULL,
  `antwoord5` varchar(200) DEFAULT NULL,
  `antwoord6` varchar(200) DEFAULT NULL,
  `antwoord7` varchar(200) DEFAULT NULL,
  `antwoord8` varchar(200) DEFAULT NULL,
  `antwoord9` varchar(200) DEFAULT NULL,
  `antwoord10` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `antwoorden`
--

INSERT INTO `antwoorden` (`id`, `enqueteId`, `answeredById`, `antwoord1`, `antwoord2`, `antwoord3`, `antwoord4`, `antwoord5`, `antwoord6`, `antwoord7`, `antwoord8`, `antwoord9`, `antwoord10`) VALUES
(1, 1, 1, 'Cool antwoord 1', 'Cool antwoord 2', 'Cool antwoord 3', 'Cool antwoord 4', 'Cool antwoord 5', 'Cool antwoord 6', 'Cool antwoord 7', 'Cool antwoord 8', 'Cool antwoord 9', 'Cool antwoord 10'),
(2, 1, 2, 'antwoord 1', 'antwoord 2', 'antwoord 3', 'antwoord 4', 'antwoord 5', 'antwoord 6', 'antwoord 7', 'antwoord 8', 'antwoord 9', 'antwoord 10'),
(3, 1, 2, 'Echt', 'Hele', 'Mooie', 'Antwoorden', 'Speciaal', 'Gemaakt', 'Voor', 'Jouw', 'Alsjeblieft', 'Meneer :)');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`) VALUES
(1, 'ABC', 'abc@gmail.com', 'ABC'),
(2, 'Test', 'persoon@mail', 'lol'),
(3, 'dad', 'sadd@dada.d', 'dadwad\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `enquetes`
--

CREATE TABLE `enquetes` (
  `id` int(11) NOT NULL,
  `Vraag1` varchar(50) NOT NULL,
  `Vraag2` varchar(50) DEFAULT NULL,
  `Vraag3` varchar(50) DEFAULT NULL,
  `Vraag4` varchar(50) DEFAULT NULL,
  `Vraag5` varchar(50) DEFAULT NULL,
  `Vraag6` varchar(50) DEFAULT NULL,
  `Vraag7` varchar(50) DEFAULT NULL,
  `Vraag8` varchar(50) DEFAULT NULL,
  `Vraag9` varchar(50) DEFAULT NULL,
  `Vraag10` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquetes`
--

INSERT INTO `enquetes` (`id`, `Vraag1`, `Vraag2`, `Vraag3`, `Vraag4`, `Vraag5`, `Vraag6`, `Vraag7`, `Vraag8`, `Vraag9`, `Vraag10`) VALUES
(1, 'Mooie vraag 1', 'Mooie vraag 2', 'Mooie vraag 3', 'Mooie vraag 4', 'Mooie vraag 5', 'Mooie vraag 6', 'Mooie vraag 7', 'Mooie vraag 8', 'Mooie vraag 9', 'Mooie vraag 10'),
(2, 'Vraag 1', 'Vraag 2', 'Vraag 3', 'Vraag 4', 'Vraag 5', 'Vraag 6', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@admin.admin', '$2y$10$uuHAyBNah8U9JRsLQhW58.KPqNSRzePQa5BAi8BXXAG5kLB9IzYlW', 'admin'),
(2, 'nietadmin', 'nietadmin@nietadmin.nietadmin', '$2y$10$wahE6iR9uAAbFQZCby90pOAce4Mt6szTQdx5jHGnvSKIgyFLwUn6S', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antwoorden`
--
ALTER TABLE `antwoorden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `antwoorden_ibfk_1` (`enqueteId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquetes`
--
ALTER TABLE `enquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antwoorden`
--
ALTER TABLE `antwoorden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enquetes`
--
ALTER TABLE `enquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
