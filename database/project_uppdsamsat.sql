-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2021 at 06:05 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uppdsamsat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `nama_agenda` varchar(200) NOT NULL,
  `ket_agenda` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_daftar`, `tgl_agenda`, `nama_agenda`, `ket_agenda`) VALUES
(1, 1, '2021-06-16', 'Pengarahan dari pembimbing ', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(100) NOT NULL,
  `deskrip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`, `deskrip`) VALUES
(1, 'Administrasi', '-\r\n'),
(2, 'Tata Usaha', '-');

-- --------------------------------------------------------

--
-- Table structure for table `daftarpkl`
--

CREATE TABLE `daftarpkl` (
  `id_daftar` int(11) NOT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `id_pembimbing` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `judulpkl` varchar(150) DEFAULT NULL,
  `laporan` varchar(255) DEFAULT NULL,
  `nilaipkl` varchar(20) DEFAULT NULL,
  `status_akhir` varchar(40) DEFAULT 'Belum Selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarpkl`
--

INSERT INTO `daftarpkl` (`id_daftar`, `id_peserta`, `id_bagian`, `id_pembimbing`, `status`, `tgl_awal`, `tgl_akhir`, `judulpkl`, `laporan`, `nilaipkl`, `status_akhir`) VALUES
(1, 1, 2, 2, 'Terverifikasi', '2021-06-16', '2021-07-16', 'Laporan PKL', '2812.pdf', '89', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama_pembimbing` varchar(50) NOT NULL,
  `hp_pembimbing` varchar(20) NOT NULL,
  `alamat_pembimbing` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `nik`, `nama_pembimbing`, `hp_pembimbing`, `alamat_pembimbing`) VALUES
(1, '67231 88 121', 'Ruslan', '082192938888', 'Sungai Raya'),
(2, '67231 72 3111', 'Hj. Rusmini', '082147771823', 'Zafri Zam Zam');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_p` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_p` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_p`, `judul`, `isi`, `tgl_p`) VALUES
(1, 'Welcome ..!', '<p>Selamat Datang Diaplikasi Praktik Kerja Lapangan UPPD Samsat Kandangan.</p>', '2021-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `npm` varchar(13) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` varchar(25) DEFAULT NULL,
  `prodi` varchar(40) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(18) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `slip_bayar` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `npm`, `nama`, `jk`, `prodi`, `agama`, `alamat`, `telp`, `foto`, `slip_bayar`, `id_user`) VALUES
(1, '52316666', 'Syamsuri', 'Laki-laki', 'RPL', 'Islam', 'Kandangan', '08977231221', '27212.png', '15316.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL,
  `tgl_sm` date NOT NULL,
  `no_sm` varchar(100) NOT NULL,
  `isi_sm` text NOT NULL,
  `tgl_t_sm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ttd_uppd`
--

CREATE TABLE `ttd_uppd` (
  `idTtd` int(11) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `kepalaUppd` varchar(60) NOT NULL,
  `jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttd_uppd`
--

INSERT INTO `ttd_uppd` (`idTtd`, `nip`, `kepalaUppd`, `jabatan`) VALUES
(1, '160 08823 9 92', 'H. Jumbrean, S.H', 'Kepala UPPD Samsat Kandangan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'peserta1', '289dff07669d7a23de0ef88d2f7129e7', 'Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Peserta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `daftarpkl`
--
ALTER TABLE `daftarpkl`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_mhs` (`id_peserta`),
  ADD KEY `id_sekolah` (`id_bagian`),
  ADD KEY `id_dosen` (`id_pembimbing`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indexes for table `ttd_uppd`
--
ALTER TABLE `ttd_uppd`
  ADD PRIMARY KEY (`idTtd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftarpkl`
--
ALTER TABLE `daftarpkl`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttd_uppd`
--
ALTER TABLE `ttd_uppd`
  MODIFY `idTtd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
