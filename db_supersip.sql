-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 11:38 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_supersip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggotakeluarga`
--

CREATE TABLE `tbl_anggotakeluarga` (
  `nik` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenkel` varchar(2) DEFAULT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `status_kawin` varchar(30) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `penghasilan` varchar(100) NOT NULL,
  `foto_penghasilan` varchar(500) DEFAULT NULL,
  `noKK` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id` int(3) NOT NULL,
  `status` int(2) NOT NULL,
  `dr_kpd` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `no_urut` varchar(10) NOT NULL,
  `indeks` varchar(40) NOT NULL,
  `kode_surat` varchar(2) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_simpan` date NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `jenis_surat` varchar(20) NOT NULL,
  `b_s_sr` varchar(10) NOT NULL,
  `no_laci` varchar(10) NOT NULL,
  `sistem_simpan` varchar(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `isi_ringkas` varchar(50) NOT NULL,
  `scan_arsip` varchar(100) NOT NULL,
  `arsiparis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kartukeluarga`
--

CREATE TABLE `tbl_kartukeluarga` (
  `no_kk` varchar(30) NOT NULL,
  `foto_kk` varchar(500) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(100) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `tanggal_simpan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(3) NOT NULL,
  `nama_peminjam` varchar(20) NOT NULL,
  `indeks` varchar(40) NOT NULL,
  `kode_surat` varchar(2) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `no_laci` varchar(10) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$iLvmh9VSYgNdoQpCqPivT.FOklop8fxOS1DHLoN9ZcS.OM9jVmT3q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggotakeluarga`
--
ALTER TABLE `tbl_anggotakeluarga`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kartukeluarga`
--
ALTER TABLE `tbl_kartukeluarga`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
