-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 12:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

CREATE TABLE `zakat` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  `nominal_zakat` int(11) NOT NULL,
  `bukti_pembayaran` varchar(355) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_verifikasi` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zakat`
--

INSERT INTO `zakat` (`id`, `username`, `nominal_gaji`, `nominal_zakat`, `bukti_pembayaran`, `tanggal_input`, `tanggal_bayar`, `tanggal_verifikasi`, `status`) VALUES
(16, 'adi', 9000000, 225000, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(17, 'adi', 10000, 250, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(18, 'adi', 600000, 15000, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(19, 'adi', 8000000, 200000, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(20, 'adi', 9090909, 227273, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(21, 'adi', 9303030, 232576, '', '2019-04-02', '0000-00-00', '0000-00-00', 0),
(22, 'adi', 292992, 7325, '', '2019-04-02', '0000-00-00', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zakat`
--
ALTER TABLE `zakat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
