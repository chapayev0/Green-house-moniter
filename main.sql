-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 04:48 AM
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
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` text NOT NULL,
  `usr_name` text NOT NULL,
  `usr_name2` text NOT NULL,
  `mail` text NOT NULL,
  `phone` text NOT NULL,
  `passw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usr_name`, `usr_name2`, `mail`, `phone`, `passw`) VALUES
('ID1', 'shashika', 'dilhara', 'sdilhara544@gmail.com', '+94784580996', '123'),
('ID2', 'yasitha', 'gamage', 'yasitha@gmail.com', '222222222222', '123'),
('ID3', 'wwwww', 'wwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwww@ddd.com', '22222222', '123'),
('ID4', 'wwwwwwww', 'wwwwwwwww', 'www@g.com', '22222222', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
