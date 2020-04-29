-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 07:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_covid`
--

CREATE TABLE `tbl_covid` (
  `id` int(11) NOT NULL,
  `nama_negara` varchar(20) NOT NULL,
  `total_kasus` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_covid`
--

INSERT INTO `tbl_covid` (`id`, `nama_negara`, `total_kasus`) VALUES
(1, 'USA', 1029878),
(2, 'Spain', 232128),
(3, 'Italy', 201505),
(4, 'France', 165911),
(5, 'UK', 161145),
(6, 'Germany', 159431),
(7, 'Turkey', 114653),
(8, 'Russia', 93558),
(9, 'Iran', 92584),
(10, 'China', 82536);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_covid`
--
ALTER TABLE `tbl_covid`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_covid`
--
ALTER TABLE `tbl_covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
