-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 09:55 AM
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
-- Database: `login_pagew`
--

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL DEFAULT '0',
  `age` varchar(10) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `name`, `username`, `email`, `password`, `dob`, `phone_number`, `age`, `address`) VALUES
(1, 'athi', 'athi', 'athi@gmail.com', '$2y$10$nxszfdgE4z2r.u26qdHwPO9QCjZEDl8hL6.1PBqXbhIjC4PgWZoIa', NULL, '0', '0', '0'),
(2, 'a', 'a', 'a@gmail.com', '$2y$10$SCt3lwRazDFkN0G5Y7sErOP7/dhdNdSD03xlo4X5VLdRux9GfAkIm', '2023-09-06', '23456', '12', 'ew'),
(3, 'arv', 'arv', 'arv@hhh.com', '$2y$10$iZXXvMY0z0aH3ogtd4632uDJx0Za6yif2wolDFTefpvt6/SvxsQ1a', '2023-09-20', '2345678', '12', 'dfgh'),
(4, 'al', 'al', 'al@gmail.com', '$2y$10$i.ON.NLeVvzC3dZcGPWgfOBkvjroH42c0WmxzOmgbBGnBkuw9SuUm', NULL, '0', '0', '0'),
(5, 'arvi', 'arvi', 'ar@gmail.com', '$2y$10$/RnIvbd3wLYpekmz9nDZB.05be1lJgU4TK4oBu32QFlq9PzsDUtse', NULL, '0', '0', '0'),
(6, 'sabari', 'sab', 'sa@gmail.com', '$2y$10$8OgnA8SWvY4BUQtJGm/JuuPz0lBONjqnwkj6/qGIQRMazJ8Y0yRpq', '2023-09-06', '12345678', '1234', 'wert'),
(7, 'a', 'a', 'a@gmail.com', '$2y$10$SCt3lwRazDFkN0G5Y7sErOP7/dhdNdSD03xlo4X5VLdRux9GfAkIm', '2023-09-06', '23456', '12', 'ew'),
(8, 'a', 'aaaa', 'a@gmail.com', '$2y$10$/U00jPK.ylgFmjmfGF4.Ue6iodCCMkgvs2pkhLQZ8GV.y3TEnfdi2', NULL, '0', '0', '0'),
(9, 'albin', 'albin', 'a@g.co', '$2y$10$Pqcdf28Oh22UTe6ah2RXIuFQTHIRz59pseA9p3LrnvnI2EDpFgyQm', '2023-09-13', '345678', '345', 'sdfghj'),
(10, 'ss', 'ss', 'sss@gmail.com', '$2y$10$YnTJ3u7NEvtF3GqDuxrUL.nkgUCjRx.g5p6Z6xDP6P3ZznV1smtO.', NULL, '0', '0', '0'),
(11, 'a', 'a', 'a@h.cmm', '$2y$10$NnWUEh/89T9jO9m58A0kHOZSRji9hZkuOpMXw6r/aS8FWaHcWygme', NULL, '0', '0', '0'),
(12, 'a', 'a', 'a@hjk.cn', '$2y$10$hZ/3ksErS5Wp24PaQlYWXOIjm92IiUpTiu4MxIuxh.1KHLyOt.XMO', NULL, '0', '0', '0'),
(13, 'arv', 'arv', 'arv@g.c', '$2y$10$0fI9V1SdTjJJNkU7fw5PWuxm15XTVs59QfhUm/lpAJsDvQpGqsrgG', NULL, '0', '0', '0'),
(14, 'arvinth', 'aak1', 'arv@g.com', '$2y$10$HrdXGKAZ7wYxQJHOTgBHXOxTi5pcACY2t80qiTWlMGeVHrO8XezNS', '2023-09-16', '112345', '12', 'sdf'),
(15, 'x', 'x', 'xx@m.v', '$2y$10$lAvxK.lqLmnz9napttF8EuexEM/RZF3pcpFJza0aAJ6gug6Q.8uoS', '2023-09-15', '1234', '12', '123es'),
(16, 'x', 'x', 'xx@m.v', '$2y$10$lAvxK.lqLmnz9napttF8EuexEM/RZF3pcpFJza0aAJ6gug6Q.8uoS', '2023-09-15', '1234', '12', '123es'),
(17, 'sriram', 'sri', 's@gmail.com', '$2y$10$YpHjT8a54SpYCGRd1bRmSeei6HZCPtGQkS1EyHg2bQ5d4vjTra5ni', '2023-09-15', '22', '12', 'ds'),
(18, 's', 's', 's@g.com', '$2y$10$if0b1rPGv/nq8uY6dZbl4u3rAPW21biFJRoPE0/Ym5IzumTiEkAzS', NULL, '0', '0', '0'),
(19, 'qq', 'qq', 'q@g.cin', '$2y$10$QkXjjcXJ.QtNkIufkF80nePpMAtSVa2XTgyY7UOCotsK9Hj8z8a.O', NULL, '0', '0', '0'),
(20, 'c', 'c', 'c@g.co', '$2y$10$jvk/zA.oeEOrprPsUEe/N.HP3lWtJtqfdz3g9M4JSf2xm2.xcPB4C', '2023-09-28', '2121212', '21', 'ds'),
(21, 'kes', 'kes', 'ksa@gmail.com', '$2y$10$lvLSjnG8t4iYk3S1nn8XAuLeL5RDc58MTQJ4.SaC.uW4x2NMS0Gma', NULL, '0', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
