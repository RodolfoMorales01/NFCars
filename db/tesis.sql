-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2018 at 08:12 PM
-- Server version: 10.1.23-MariaDB-9+deb9u1
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `guardias`
--

CREATE TABLE `guardias` (
  `id` int(30) NOT NULL,
  `UID` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `guardia` int(30) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acp` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `UID` varchar(10) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `scr` varchar(255) NOT NULL,
  `cuenta` int(8) NOT NULL,
  `UID` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `veiculo` varchar(255) NOT NULL,
  `placas` varchar(25) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guardias`
--
ALTER TABLE `guardias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guardias`
--
ALTER TABLE `guardias`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
