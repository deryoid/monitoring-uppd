-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jul 2020 pada 01.56
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `debi_plp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `nama_agenda` varchar(200) NOT NULL,
  `ket_agenda` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_daftar`, `tgl_agenda`, `nama_agenda`, `ket_agenda`) VALUES
(4, 6, '2020-06-19', 'Jaga Lab', 'Terverifikasi'),
(5, 6, '2020-06-20', 'Mendata Barang', 'Terverifikasi'),
(6, 7, '2020-06-20', 'Duduk Saja', 'Belum Terverifikasi'),
(7, 1, '2020-07-05', 'perkenalan diri ', 'Terverifikasi'),
(8, 2, '2020-07-06', 'perkenalan diri pada siswa dan guru', 'Terverifikasi'),
(9, 2, '2020-07-06', 'memberikan arahan pada siswa kelas 7b', 'Belum Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarppl`
--

CREATE TABLE `daftarppl` (
  `id_daftar` int(11) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `judulppl` varchar(150) DEFAULT NULL,
  `laporan` varchar(255) DEFAULT NULL,
  `nilaippl` varchar(20) DEFAULT NULL,
  `status_akhir` varchar(40) DEFAULT 'Belum Selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftarppl`
--

INSERT INTO `daftarppl` (`id_daftar`, `id_mhs`, `id_sekolah`, `id_dosen`, `status`, `tgl_awal`, `tgl_akhir`, `judulppl`, `laporan`, `nilaippl`, `status_akhir`) VALUES
(1, 13, 4, 1, 'Terverifikasi', '2020-07-05', '2020-07-05', 'pengenalan lapangan persekolah di smp negeri 4 banjarmasin ', '53003.pdf', '80', 'Selesai'),
(2, 14, 5, 3, 'Terverifikasi', '2019-03-09', '2019-03-11', NULL, NULL, NULL, 'Belum Selesai'),
(3, 15, 0, 0, 'Belum Terverifikasi', '0000-00-00', '0000-00-00', NULL, NULL, NULL, 'Belum Selesai'),
(4, 16, 5, 3, 'Terverifikasi', '2019-03-09', '2019-03-11', NULL, NULL, NULL, 'Belum Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `prodi_dosen` varchar(40) NOT NULL,
  `hp_dosen` varchar(20) NOT NULL,
  `alamat_dosen` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `nama_dosen`, `agama`, `tmp_lahir`, `tgl_lahir`, `prodi_dosen`, `hp_dosen`, `alamat_dosen`, `email`, `foto`, `id_user`) VALUES
(1, '101123451', 'budi setiadi m.pd', 'Islam', 'banjarmasin', '1988-01-05', 'Bimbingan dan Konseling', '511222134', 'jalan gatot subroto', 'budi11@gmail.com', '81350.jpg', 4),
(3, '1126089201', 'Rudi Haryadi, M.Pd', 'Islam', 'Banjarmasin', '1989-11-02', 'Bimbingan dan Konseling', '082164874529', 'jalan simpang gusti no.17', 'rudi11@gmail.com', '26657.jpg', 10),
(4, '0306047404', 'Neneng Islamiah, M.Pd          ', 'Islam', 'Banjarmasin', '1989-07-22', 'Pendidikan Bahasa Inggris', '082285116614', 'Jalan Ahmad Yani Km.09 Komp.Citraland', 'neneng44@hotmail.com', '24860.jpg', 11),
(5, '', '', '', '', '0000-00-00', '', '', '', '', NULL, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `npm` varchar(13) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `prodi` varchar(40) DEFAULT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(18) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `slip_bayar` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `npm`, `nama`, `prodi`, `agama`, `alamat`, `telp`, `foto`, `slip_bayar`, `id_user`) VALUES
(9, '16630477', 'Debifelicia', 'Bimbingan dan Konseling', 'Islam', 'Banjarmasin', '08213721738', '40004.jpg', '63683.png', 14),
(10, '123', 'Udin Gambuts', 'Pendidikan Kimia', 'Kristen', 'awdnioawdnaowdnaoi', '08193993998', '99375.jpeg', '45948.jpg', 17),
(11, '15638882', 'Ferdy Hasen', 'Pendidikan Kimia', 'Islam', 'Banjarmasin', '08213721738', '87750.jpg', '26222.png', 20),
(12, NULL, NULL, NULL, '', '', '', '', '', 21),
(13, '16220013', 'Andi Alvhina Risky', 'Bimbingan dan Konseling', 'Islam', 'Kompleks Bumi Raya Permai 1, Jl. Harmoni III No.37, RT.31, Pekapuran Raya, Kec. Banjarmasin Timur', '0511112223', '90240.jpg', '95761.jpg', 5),
(14, '16220008', 'Norasiah', 'Bimbingan dan Konseling', 'Islam', 'jalan sungai andai', '082285777711', '71957.jpg', '26343.jpg', 7),
(15, '16220009', 'Noor Vita Sari', 'Bimbingan dan Konseling', 'Islam', 'jalan manggis no.22', '087811435254', '21537.jpg', '', 8),
(16, '16220015', 'Satriya Tubagus', 'Bimbingan dan Konseling', 'Islam', 'jalan sungai lulut', '089877712216', '59534.jpg', '95596.jpg', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_p` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_p` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_p`, `judul`, `isi`, `tgl_p`) VALUES
(2, 'dwadaw', '<p><b>awdawd</b></p><p><b><br></b></p><p><b><br></b></p><p style=\"text-align: center; \"><span style=\"font-family: Verdana;\">﻿dfafawfwafaw</span><b><br></b></p>', '2020-07-07'),
(3, 'acce', '<p><b>GW GANTENG DERY&nbsp;</b></p><p><b><br></b></p>', '2020-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `nama_kepsek` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `no_telp`, `nama_kepsek`) VALUES
(4, 'SMP NEGERI 4 BANJARMASIN', 'Jl. Teluk Tiram Darat No. 01 Banjarmasin', '051123127', 'Barkiyah'),
(5, 'SMP NEGERI 14 BANJARMASIN', 'Jl. Benua Anyar RT. 3 No. 14', '-', 'Aminsyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` int(11) NOT NULL,
  `tgl_sm` date NOT NULL,
  `no_sm` varchar(100) NOT NULL,
  `isi_sm` text NOT NULL,
  `tgl_t_sm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `tgl_sm`, `no_sm`, `isi_sm`, `tgl_t_sm`) VALUES
(3, '2020-06-07', '50/BNVM/KAL-SEL-TENG/LOD/V.1/2020', 'Surat Balasan dari sekolah SMPN 4 BJM mahasiswa BK', '2020-06-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd_uppl`
--

CREATE TABLE `ttd_uppl` (
  `idTtd` int(11) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `kepalaUppl` varchar(60) NOT NULL,
  `jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttd_uppl`
--

INSERT INTO `ttd_uppl` (`idTtd`, `nip`, `kepalaUppl`, `jabatan`) VALUES
(1, '016504805', 'Dr.H.Kasypul Anwar, M.M.Pd', 'Kepala UPPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(4, 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'Dosen'),
(5, 'mhsbk1', '09ef163ee581de3b464642173f2d3333', 'Mahasiswa'),
(7, '16220008', '941c741121a11e62372994bdda047867', 'Mahasiswa'),
(8, '16220009', '8ed2eb8a36abd9101b04cb0434c0ba13', 'Mahasiswa'),
(9, '16220015', 'e67133b8e1ef600de7775f45e2e16bd7', 'Mahasiswa'),
(10, '1126089201', '387b57c5b71ad9cbaaa7fa9a0b158caa', 'Dosen'),
(11, '0306047404', 'c1a7d077314456047aa8dc62d1623723', 'Dosen'),
(13, 'dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 'Dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa'),
(3, 'Dosen');

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
-- Indexes for table `daftarppl`
--
ALTER TABLE `daftarppl`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_mhs` (`id_mhs`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indexes for table `ttd_uppl`
--
ALTER TABLE `ttd_uppl`
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
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `daftarppl`
--
ALTER TABLE `daftarppl`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ttd_uppl`
--
ALTER TABLE `ttd_uppl`
  MODIFY `idTtd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
