-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 16, 2022 at 01:38 PM
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
(3, 'Semy', 'semy@lazar.nl', 'Hoi');

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
-- Table structure for table `opleidingen`
--

CREATE TABLE `opleidingen` (
  `Id` int(11) NOT NULL,
  `naam` varchar(55) NOT NULL,
  `beschrijving` varchar(2555) NOT NULL,
  `niffo` varchar(50) NOT NULL,
  `isBOL` bit(1) NOT NULL DEFAULT b'1',
  `duur` varchar(55) NOT NULL,
  `fototjuh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opleidingen`
--

INSERT INTO `opleidingen` (`Id`, `naam`, `beschrijving`, `niffo`, `isBOL`, `duur`, `fototjuh`) VALUES
(1, 'Software developer', 'Business is global; to be successful you need to understand international cultures and markets and adapt your business to their needs. As an International Business student you develop the essential business skills to lead any business anywhere. Do you aspire to lead and make change across the international business landscape and boost your international experience and contacts? Then register! This program programme equips students with solid knowledge and transferable skills relevant to secure senior roles within many rewarding fields including; international trade, transports and logistics corporations, financial and investment institutions, government agencies and global business consultancies.\n\nThe program is in English. Therefore the program is open for students from countries of the European Union.\nThe internationally recognized associate program can be completed in 1 year. So this is a fast-track program.\nDuring the training you will carry out various unit assignments within the company where you work.\nIt goes without saying that after obtaining your Associate, you can continue for your Bachelor\'s degree.\n\nRegister for the one year, full-time Associate International Business at Kronenburgh International Business School in The Hague. Prepare for Business. Explore the world.', '3/4', b'0', '5', 'https://duo.nl/organisatie/werken-bij-duo/images/l-opleidingen.jpg'),
(2, 'Entree', 'Ben je zestien jaar of ouder en heb je nog geen diploma? Dan is de Entree-opleiding bij MBO Utrecht vast iets voor jou! Een Entree-opleiding (BOL) is een mooi opstapje naar een leuke baan. Ook is het Entree-diploma een prima basis om verder te leren.\r\n\r\nKies uit twee richtingen\r\nWil je je graag via de BOL-route opgeleid worden voor assisterende werkzaamheden? Bij MBO Utrecht kun je dan kiezen uit twee richtingen:\r\n\r\nAssistent Verkoop/Retail\r\nAssistent Dienstverlening\r\nDeze opleiding is heel breed. Daarna kun je nog verschillende kanten op.', '1', b'1', '1', 'https://www.mboutrecht.nl/wp-content/uploads/2018/08/MBOUtrecht-sept2018-193cwiepvanapeldoorn-fotograaf-1920x460.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `opleidingregistraties`
--

CREATE TABLE `opleidingregistraties` (
  `id` int(11) NOT NULL,
  `LeerlingId` int(11) NOT NULL,
  `OpleidingId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opleidingregistraties`
--

INSERT INTO `opleidingregistraties` (`id`, `LeerlingId`, `OpleidingId`) VALUES
(20, 1, 1);

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
-- Indexes for table `opleidingen`
--
ALTER TABLE `opleidingen`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `opleidingregistraties`
--
ALTER TABLE `opleidingregistraties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LeerlingPK` (`LeerlingId`),
  ADD KEY `OpleidingPK` (`OpleidingId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquetes`
--
ALTER TABLE `enquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `opleidingen`
--
ALTER TABLE `opleidingen`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `opleidingregistraties`
--
ALTER TABLE `opleidingregistraties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opleidingregistraties`
--
ALTER TABLE `opleidingregistraties`
  ADD CONSTRAINT `LeerlingPK` FOREIGN KEY (`LeerlingId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OpleidingPK` FOREIGN KEY (`OpleidingId`) REFERENCES `opleidingen` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
