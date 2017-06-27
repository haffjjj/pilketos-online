-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jun 2017 pada 18.15
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pilketos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(6, 'admin', '$2y$10$V6IwLUMfctAGmUjEi3mC8.xmgEdq3TJfoTjeRQEiQklhRAj/uEvjq'),
(9, 'test', '$2y$10$/Jf0W2.XE918/4MgvYKQKO7hBPlxR2lYN3e38EtaDwobs3UkQE.xq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kanidat`
--

CREATE TABLE `kanidat` (
  `id` int(4) NOT NULL,
  `nis` double NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` int(2) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kanidat`
--

INSERT INTO `kanidat` (`id`, `nis`, `nama`, `kelas`, `jurusan`, `imgpath`, `visi`, `misi`) VALUES
(1, 3103115230, 'Umaru', 12, 'RPL', 'http://localhost/imagesaya.png', 'Lorem Ipsum Lorem Ipsum Lorem Lorem Ipsum Lorem Ipsum Lorem Ipsum  Lorem Ipsum Lorem ', 'Lorem Ipsum Lorem Ipsum Lorem Lorem Ipsum Lorem Ipsum Lorem Ipsum  Lorem Ipsum Lorem '),
(2, 3103115231, 'Hinata', 12, 'TKJ', 'http://localhost/imagesaya.png', 'ini Visi', 'ini misi'),
(3, 3103115232, 'Sasuke', 12, 'TJA', 'http://localhost/imagesaya.png', 'hoho', 'hihihi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilihan`
--

CREATE TABLE `pemilihan` (
  `id` int(4) NOT NULL,
  `idsiswa` int(4) NOT NULL,
  `idkanidat` int(4) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilihan`
--

INSERT INTO `pemilihan` (`id`, `idsiswa`, `idkanidat`, `datetime`) VALUES
(19, 1, 1, '2017-06-27 14:27:10'),
(20, 2, 2, '2017-06-27 14:27:50'),
(21, 7, 1, '2017-06-27 17:52:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(4) NOT NULL,
  `nis` double NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` int(2) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `jurusan`, `password`) VALUES
(1, 3103115257, 'Hafiz Joundy Syafie', 12, 'RPL', '$2y$10$FTAvq62JKtCIV0vdnuurEeb1ajzeBqpFEv7ohrL25fRCskh73bj.e'),
(2, 3103115230, 'Umaru', 12, 'RPL', '$2y$10$RD1or5goynIwNGDofY9cAepsw5rpmfQnP.oqyZDA7WJqLMPXAABLe'),
(7, 1231, 'haha', 12, 'RPL', '$2y$10$T2fRr5y2KCRBsWGNyfHo6OepiNKjMRS1WAknNkG/XGWE3ZyXkCUXO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kanidat`
--
ALTER TABLE `kanidat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idsiswa_2` (`idsiswa`),
  ADD KEY `idsiswa` (`idsiswa`),
  ADD KEY `idkanidat` (`idkanidat`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kanidat`
--
ALTER TABLE `kanidat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemilihan`
--
ALTER TABLE `pemilihan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD CONSTRAINT `pemilihan_ibfk_1` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `pemilihan_ibfk_2` FOREIGN KEY (`idkanidat`) REFERENCES `kanidat` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
