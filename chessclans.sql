-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2019 at 12:46 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

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
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `gameID` int(11) NOT NULL,
  `p1id` int(11) NOT NULL,
  `p2id` int(11) NOT NULL,
  `winner` int(11) NOT NULL,
  `moveHistory` text NOT NULL,
  PRIMARY KEY (`gameID`),
  KEY `p1id` (`p1id`),
  KEY `p2id` (`p2id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `gameID` int(11) NOT NULL,
  `p1id` int(11) NOT NULL,
  `p2id` int(11) NOT NULL,
  `moves` text NOT NULL,
  `winner` int(11) NOT NULL,
  PRIMARY KEY (`gameID`),
  KEY `p1id` (`p1id`),
  KEY `p2id` (`p2id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

DROP TABLE IF EXISTS `rank`;
CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(11) NOT NULL,
  `CCpoints` int(11) NOT NULL,
  `games_won` int(11) DEFAULT NULL,
  `games_lost` int(11) DEFAULT NULL,
  `games_draw` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  `isOnline` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `isOnline`) VALUES
(1, 'djulo', 'djulo@gmail.com', '$2y$10$/hZMuL6I491XiMRfgSWbUeUTmzk6Tz.nt3uw2aYNqhFpgiD1v3sDK', 0, 0),
(2, 'sreto', 'sreto@gmail.com', '$2y$10$uHyp.RQclsoM1JMp2agt6OMhkMosSgodKDidKB4d29lO/ks2NKPRa', 0, 0),
(3, 'ogi', 'ogi@gmail.com', '$2y$10$j45SsLmp5YRg6lgAPU4XJuU/RDnSFPZjlW53ZRM7Iauxj3jop4Aha', 0, 0),
(4, 'steks', 'steks@gmail.com', '$2y$10$P63MZv/2rskLH4F/DFbH8.jhVZDpx.eao3ZFEF5RScios.jz6Ipk6', 0, 0),
(5, 'beks', 'beks@gmail.com', '$2y$10$lpamfrgi99K9BGjEPqBJCO5BE6yqU0L0BBiFvN5GwM1VcVC2x6fNK', 0, 0),
(6, 'sveta97', 'svmicanovic@gmail.com', '$2y$10$BUofrRuKbrD2DjBsk8/tn.sqMY1sJb5MJ99TMmtoPCPQG0WeHqL3u', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`p1id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`p2id`) REFERENCES `users` (`id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`gameID`) REFERENCES `game` (`gameID`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`p2id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
