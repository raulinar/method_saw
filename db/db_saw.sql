-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 06:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `c1` varchar(10) NOT NULL,
  `c2` varchar(10) NOT NULL,
  `c3` varchar(10) NOT NULL,
  `c4` varchar(10) NOT NULL,
  `c5` varchar(10) NOT NULL,
  `c6` varchar(10) NOT NULL,
  `hasil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `nama_siswa`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `hasil`) VALUES
(1, 'Ambalika Satia Parwati', '4', '4', '4', '4', '4', '4', '1'),
(2, 'Jabbar Tsany Ramadhan', '4', '4', '4', '4', '4', '4', '1'),
(3, 'Bagas Septyawan', '4', '3', '3', '4', '4', '4', '0.925'),
(4, 'Fahmi Indramanto', '4', '3', '4', '4', '3', '3', '0.875'),
(5, 'Lazuardi', '4', '3', '3', '4', '4', '4', '0.925'),
(6, 'Fatwa Mauliza', '4', '3', '3', '3', '4', '4', '0.888'),
(7, 'Iqbal Farrossandy', '4', '4', '4', '3', '3', '4', '0.913'),
(8, 'Ivananto Adi', '4', '4', '4', '4', '4', '4', '1'),
(9, 'Puspita Sari', '4', '4', '4', '4', '3', '3', '0.913'),
(10, 'Fairuz Insani', '4', '4', '3', '3', '4', '3', '0.888'),
(11, 'Prastanti', '4', '3', '4', '3', '4', '4', '0.925'),
(12, 'Himmah', '3', '4', '4', '3', '4', '3', '0.875'),
(13, 'Diba Farah', '3', '3', '4', '4', '3', '4', '0.863'),
(14, 'Dwiky Ariyanto', '4', '4', '4', '3', '3', '3', '0.875'),
(15, 'Shevira Larasati', '4', '3', '3', '3', '4', '4', '0.888'),
(16, 'Aqil Rezaldi', '4', '3', '3', '4', '4', '4', '0.925'),
(17, 'Fatkhur Rohman', '4', '4', '4', '4', '3', '3', '0.913'),
(18, 'Yasmin Fatharani', '3', '3', '4', '4', '3', '3', '0.825'),
(19, 'Bhayu Rangga', '3', '4', '4', '4', '3', '4', '0.9'),
(20, 'Shabiha Farhana', '3', '4', '4', '4', '4', '4', '0.95');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
('C1', 'NILAI METEMATIKA'),
('C2', 'NILAI BAHASA INGGRIS'),
('C3', 'NILAI BAHASA INDONESIA'),
('C4', 'NILAI KIMIA'),
('C5', 'NILAI FISIKA'),
('C6', 'NILAI BIOLOGI');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `c1` varchar(10) NOT NULL,
  `c2` varchar(10) NOT NULL,
  `c3` varchar(10) NOT NULL,
  `c4` varchar(50) NOT NULL,
  `c5` varchar(10) NOT NULL,
  `c6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(1, 'Ambalika Satia Parwati', '4', '4', '4', '4', '4', '4'),
(3, 'Jabbar Tsany Ramadhan', '4', '4', '4', '4', '4', '4'),
(4, 'Bagas Septyawan', '4', '3', '3', '4', '4', '4'),
(5, 'Fahmi Indramanto', '4', '3', '4', '4', '3', '3'),
(6, 'Lazuardi', '4', '3', '3', '4', '4', '4'),
(7, 'Fatwa Mauliza', '4', '3', '3', '3', '4', '4'),
(8, 'Iqbal Farrossandy', '4', '4', '4', '3', '3', '4'),
(9, 'Ivananto Adi', '4', '4', '4', '4', '4', '4'),
(10, 'Puspita Sari', '4', '4', '4', '4', '3', '3'),
(11, 'Fairuz Insani', '4', '4', '3', '3', '4', '3'),
(12, 'Prastanti', '4', '3', '4', '3', '4', '4'),
(13, 'Himmah', '3', '4', '4', '3', '4', '3'),
(14, 'Diba Farah', '3', '3', '4', '4', '3', '4'),
(15, 'Dwiky Ariyanto', '4', '4', '4', '3', '3', '3'),
(16, 'Shevira Larasati', '4', '3', '3', '3', '4', '4'),
(17, 'Aqil Rezaldi', '4', '3', '3', '4', '4', '4'),
(18, 'Fatkhur Rohman', '4', '4', '4', '4', '3', '3'),
(19, 'Yasmin Fatharani', '3', '3', '4', '4', '3', '3'),
(20, 'Bhayu Rangga', '3', '4', '4', '4', '3', '4'),
(21, 'Shabiha Farhana', '3', '4', '4', '4', '4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`) VALUES
('1', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
