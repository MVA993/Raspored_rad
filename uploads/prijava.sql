-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 02:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raspored_rada`
--

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

CREATE TABLE `prijava` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(100) NOT NULL,
  `lozinka` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prijava`
--

INSERT INTO `prijava` (`id`, `korisnicko_ime`, `lozinka`, `status`) VALUES
(1, 'marko_antic', 'ab37d6eb6a503d447ac02c5bc06bf3720878fda10f5e3df2b2c36833', '1'),
(2, 'marjan_stojanovi', '24ac972481afd506e6a8036bb6b828ceff4fd3b7daa2c55ce171fe3e', '1'),
(3, 'marina_antic', '9659f05365c1024555fb2914cb907967755a4622b1cfc8c163d5fe74', '2'),
(4, 'dragana_mitic', 'b38f06c0ba5e9ed6c063621bf3d4e29668e674c542833bd3f108a154', '0'),
(5, 'svetlana_misic', '0fb51a3f54d3ff8514caca81ab8ed475fa7ede6e0d65179856ada305', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prijava`
--
ALTER TABLE `prijava`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prijava`
--
ALTER TABLE `prijava`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
