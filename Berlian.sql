-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2020 at 04:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Berlian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(32) DEFAULT NULL,
  `gaji_pokok` varchar(10) DEFAULT NULL,
  `tunj_jabatan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tunj_jabatan`) VALUES
('J001', 'HRD', '3.000.000', '500.000'),
('J002', 'Staff Keuangan', '2.500.000', '5.000.000'),
('J003', 'Security', '3.000.000', '500.000'),
('J004', 'IT ', '5.000.000', '5.000.000'),
('J005', 'Office Boy', '2.500.000', '200.000');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(9) NOT NULL,
  `nama_pegawai` varchar(32) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(128) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `tgl_masuk` varchar(128) DEFAULT NULL,
  `status_pernikahan` varchar(25) DEFAULT NULL,
  `jumlah_anak` int(11) DEFAULT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `poto` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama_pegawai`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `tgl_masuk`, `status_pernikahan`, `jumlah_anak`, `id_jabatan`, `poto`) VALUES
(24, 'A00012', 'Hasbi Simaulansyah', 'Bandung', '26-10-1990', 'Pria', 'Perum GrandPark Cimalaka Blok G 10 Rt 5 Rw 10 Cimalaka Sumedang', '08127845649', '29-06-2010', 'Menikah', 1, 'J004', 'foto.jpg'),
(31, 'K0002', 'Nenden Kalipa', 'Pandeglang', '11-10-1994', 'Wanita', 'dsn Ciwaruga Rt 5 Rw 4 Desa Pajaten Pamanukan', '084544612', '18-11-2020', 'Menikah', 7, 'J001', 'serly.jpg'),
(32, 'P0002', 'Intan Rahayu Winata', 'Garut', '18-11-2020', 'Wanita', 'Jl Sumedang no 90 RT 4 RW 5 Desa kedungdawu Cisaranten Kidul', '08889431456', '16-11-2020', 'Lajang', 0, 'J005', 'merah.jpg'),
(37, 'A0009', 'Agus Anang Suherly', 'Sumedang', '04-11-2020', 'Pria', 'Conggeang', '08454564', '17-11-2020', 'Lajang', 8, 'J001', 'default.jpg'),
(41, 'd324234', 'Moh Zamaludin R', 'sada', '24-11-2020', 'Pria', 'dfsfdsd', '234324', '24-11-2020', 'Menikah', 4, 'J002', 'betadine.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `image`, `password`, `role_id`, `date_created`) VALUES
(2, 'agus', '', '9fab6755cd2e8817d3e73b0978ca54a6', 2, '2020-11-17'),
(3, 'hasbi', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(128) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Perawat'),
(3, 'Apotek'),
(4, 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
