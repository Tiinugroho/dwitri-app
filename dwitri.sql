-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2024 at 07:38 AM
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
-- Database: `dwitri`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda_pimpinan`
--

CREATE TABLE `agenda_pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `nama_pimpinan` varchar(255) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `ruangan` varchar(255) NOT NULL,
  `kegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda_pimpinan`
--

INSERT INTO `agenda_pimpinan` (`id_pimpinan`, `nama_pimpinan`, `hari`, `tanggal`, `jam`, `ruangan`, `kegiatan`) VALUES
(4, 'Dwitri', 'Kamis', '2024-01-18', '17:49', 'RA.302', 'Rapat Hima');

-- --------------------------------------------------------

--
-- Table structure for table `agenda_umum`
--

CREATE TABLE `agenda_umum` (
  `id_umum` int(11) NOT NULL,
  `nama_umum` varchar(255) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agenda_umum`
--

INSERT INTO `agenda_umum` (`id_umum`, `nama_umum`, `hari`, `tanggal`, `jam`, `ruangan`, `kegiatan`) VALUES
(1, 'Dwitri', 'Minggu', '2024-01-18', '17:47', 'GR.306', 'Seminar');

-- --------------------------------------------------------

--
-- Table structure for table `dataruang`
--

CREATE TABLE `dataruang` (
  `id_dataruang` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataruang`
--

INSERT INTO `dataruang` (`id_dataruang`, `hari`, `tanggal`, `jam`, `kegiatan`, `ruangan`) VALUES
(3, 'Rabu', '2024-01-18', '15:44', 'Rapat', 'GR.302');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'dwitri', 'c3304a3b30c1829735786afae6eba911');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_pimpinan`
--
ALTER TABLE `agenda_pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `agenda_umum`
--
ALTER TABLE `agenda_umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- Indexes for table `dataruang`
--
ALTER TABLE `dataruang`
  ADD PRIMARY KEY (`id_dataruang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda_pimpinan`
--
ALTER TABLE `agenda_pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agenda_umum`
--
ALTER TABLE `agenda_umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dataruang`
--
ALTER TABLE `dataruang`
  MODIFY `id_dataruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
