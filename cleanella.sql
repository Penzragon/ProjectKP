-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 08:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleanella`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin Rifky', 'admin@cleanella.com', 'admin123'),
(2, 'sdsa', 'cccc@cleanella.com', 'admin'),
(3, 'qwe', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama`, `slug`, `gambar`, `harga`, `deskripsi`) VALUES
(25, 'Dishwashing Liquid', 'dishwashing-liquid', 'Dishwashing Liquid 450mL_1.jpg', 'Rp. 45.000', 'Cairan pembersih piring berukuran 450mL dengan Turbo Clean.'),
(27, 'Liquid Detergent', 'liquid-detergent', 'Liquid Detergent 450mL.jpg', 'Rp. 50.000', 'Detergen cair berukuran 450mL dengan Super Clean.'),
(28, 'Handwash Large', 'handwash-large', 'Handwash 1L_1.jpg', 'Rp. 60.000', 'Cairan pencuci tangan berkuruan 1L dengan wangi bunga mawar.'),
(29, 'Handwash', 'handwash', 'Handwash 500mL_1.jpg', 'Rp. 45.000', 'Cairan pembersih tangan berukuran 500mL dengan wangi bunga mawar.'),
(30, 'Softener', 'softener', 'Softener 450mL_1.jpg', 'Rp. 45.000', 'Cairan pewangi pakaian berukuran 450mL dengan wangi bunga sakura.'),
(31, 'Hand Sanitizer Large', 'hand-sanitizer-large', 'Sanitizer 1L_1.jpg', 'Rp. 60.000', 'Hand sanitizer bersar dengan ukuran 1L.'),
(32, 'Hand Sanitizer', 'hand-sanitizer', 'Sanitizer 500mL.jpg', 'Rp. 45.000', 'Hand sanitizer berukuran 500mL.'),
(33, 'Disinfectant', 'disinfectant', 'Disinfectant 500mL.jpg', 'Rp. 45.000', 'Cairan disinfektan berukuran 450mL.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
