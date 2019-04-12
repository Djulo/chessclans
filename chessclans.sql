-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2019 at 07:42 PM
-- Server version: 10.3.13-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chessclans`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'djulo', 'djulo@gmail.com', '$2y$10$/hZMuL6I491XiMRfgSWbUeUTmzk6Tz.nt3uw2aYNqhFpgiD1v3sDK'),
(2, 'sreto', 'sreto@gmail.com', '$2y$10$uHyp.RQclsoM1JMp2agt6OMhkMosSgodKDidKB4d29lO/ks2NKPRa'),
(3, 'ogi', 'ogi@gmail.com', '$2y$10$j45SsLmp5YRg6lgAPU4XJuU/RDnSFPZjlW53ZRM7Iauxj3jop4Aha'),
(4, 'steks', 'steks@gmail.com', '$2y$10$P63MZv/2rskLH4F/DFbH8.jhVZDpx.eao3ZFEF5RScios.jz6Ipk6'),
(5, 'beks', 'beks@gmail.com', '$2y$10$lpamfrgi99K9BGjEPqBJCO5BE6yqU0L0BBiFvN5GwM1VcVC2x6fNK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
