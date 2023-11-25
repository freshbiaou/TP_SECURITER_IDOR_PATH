-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2023 at 06:14 PM
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
-- Database: `tp`
--

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `choix` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `name`, `full_name`, `email`, `choix`, `message`, `date`, `updated_at`, `user_id`) VALUES
(1, 'Juste un Clavier', 'Satournin', 'saturnindimon@gmail.com', 'Disque dur', 'okay . c\'est not&eacute; merci bien', '2023-11-02 00:17:14', '2023-11-01 23:17:14', 4),
(2, 'okay', 'sat', 'cadnel@gmail.com', 'Clavier', 'pour', '2023-10-30 04:31:08', '2023-11-01 23:16:38', 4),
(3, 'Disque Dur', 'Deuxième ', 'ok@gmail.com', 'Disque dur', 'juste un test', '2023-10-30 05:05:46', '2023-11-01 23:16:38', 4),
(9, 'Produit', 'Element', 'saturnindimon@gmail.com', 'Clavier', 'Juste pour un test part de klarita', '2023-11-02 23:18:48', '2023-11-02 22:18:48', 2),
(11, 'Disque Dur ', 'Vianney', 'vianney@gmail.com', 'Disque dur', 'C&#039;est pour un test', '2023-11-05 16:19:21', '2023-11-05 15:19:21', 5),
(12, 'DISQUE DUR SSD', 'RAPIDE', 'vianney@gmail.com', 'Disque dur', 'Un test Encore', '2023-11-05 20:19:25', '2023-11-05 19:19:25', 35),
(30, 'tets', 'stet', 'saturnindimon@gmail.com', 'Clavier', 'ok', '2023-11-10 21:27:44', '2023-11-10 20:27:44', 8),
(32, 'New Keyboard', 'Okay', 'saturnindimon@gmail.com', 'Disque dur', 'test', '2023-11-11 12:08:11', '2023-11-11 11:08:11', 8),
(34, 'Test Produit', 'okay', 'victime@idor.bj', 'Disque dur', 'test', '2023-11-17 17:06:17', '2023-11-17 16:06:17', 10),
(35, 'Second Produit', 'Juste', 'saturnindimon@gmail.com', 'Clavier', 'ok ', '2023-11-11 13:54:46', '2023-11-11 12:54:46', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(2, 'BLENON', 'Cadnel', 'blenonjolidon@gmail.com', '$2y$10$jJ111xvsnuVL7JbwbIDNfusUp6ujp5sEMA66V4Nqi7tTNIygvunK2'),
(4, 'Biaou Satournin', 'DIMON', 'saturnindimon@gmail.com', '$2y$10$aEGpvPMuY4GljRxV6roZyeeH8r/1PsOmH3pLm5bl4EWHPwY6lZp9C'),
(5, 'Chim&egrave;ne', 'DIMON', 'chimenedimon@gmail.com', '$2y$10$PIMiG92omdEW2dxQhoU2auvDJDFKOMDEeJqT3UOk7v6RKiZUNS80m'),
(6, 'ALASSANE', 'Kabirou', 'blackgost@gmail.com', '$2y$10$tAaxw.xmlaEhsKF/9LGYAe3jk7dlehc4ouzjpkJJj6wlZKv3xaXCy'),
(7, 'DIMON', 'Obed', 'obeddimon@gmail.com', '$2y$10$ayxtb8K4S.fFr0x81xuMc.LbtID5DcuVGPtkCc5y0N2xi9TT1WrHC'),
(8, 'KOLAWOLE', 'Waliath', 'waliath@gmail.com', '$2y$10$uoaqD6Nrv00OuTQa6nQkGuG2iE7gvBhX/snwcqCWKgV10uROCkgOW'),
(10, 'Victime', 'The First', 'victime@idor.bj', '$2y$10$wxZyCyksfkKWnrE.gmK3MuLoddoaIJtxP05Gc0mne9ukcSFeiJTQC'),
(12, 'HACK', 'BLACK', 'hack@idor.bj', '$2y$10$3VjYPXKQn6iHlFdhKtzhCebCWsfi6J4t2hwjw4wRDIRcOexWy6eAW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
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
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
