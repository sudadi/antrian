-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 05 Sep 2019 pada 14.30
-- Versi Server: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `urut` smallint(4) NOT NULL,
  `tiket` smallint(2) NOT NULL,
  `loket` smallint(2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `loket`
--

CREATE TABLE `loket` (
  `id` smallint(2) NOT NULL,
  `nmloket` varchar(30) NOT NULL,
  `ket` varchar(30) NOT NULL,
  `sound` varchar(30) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `loket`
--

INSERT INTO `loket` (`id`, `nmloket`, `ket`, `sound`, `status`) VALUES
(1, 'LOKET CS', 'Customer Service', 'loketcs', 1),
(2, 'LOKET 1', 'Antrian  Loket 1', 'loket1', 1),
(3, 'LOKET 2', 'Antrian  Loket 2', 'loket2', 1),
(4, 'LOKET 3', 'Antrian  Loket 3', 'loket3', 1),
(5, 'LOKET 4', 'Antrian  Loket 4', 'loket4', 1),
(6, 'LOKET 5', 'Antrian  Loket 5', 'loket5', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` smallint(2) NOT NULL,
  `nmtiket` varchar(30) NOT NULL,
  `kdhuruf` varchar(2) NOT NULL,
  `ket` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `nmtiket`, `kdhuruf`, `ket`, `status`) VALUES
(1, 'Tiket Antrian CS', 'A', 'Tiket Antrian CS', 1),
(2, 'Tiket Antrian 1', 'B', 'Tiket Antrian 1', 1),
(3, 'Tiket Antrian 2', 'C', 'Tiket Antrian 2', 1),
(4, 'Tiket Antrian 3', 'D', 'Tiket Antrian 3', 1),
(5, 'Tiket Antrian 4', 'E', 'Tiket Antrian 4', 1),
(6, 'Tiket Antrian 5', 'F', 'Tiket Antrian 5', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `loket` smallint(2) NOT NULL,
  `tiket` smallint(2) NOT NULL,
  `tipe` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lastlog` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `loket`, `tiket`, `tipe`, `status`, `lastlog`) VALUES
(1, 'Administrator', 'admin', '$2y$10$gN5ZqHZQTeEEneBbUft./OIR4tD0kUW8EznSrtDuhHB.5uvyo7OKS', 0, 0, 0, 1, '2019-08-30 01:43:48'),
(2, 'Customer Service 1', 'informasi', '$2y$10$.wFXxlfz4614MFE9J22i..90PsgPUaXAE7FLO5K3MaVAbQMZY8Z.a', 1, 1, 1, 1, '2019-08-29 10:10:49'),
(3, 'Pendaftaran-1', 'loket1', '$2y$10$.wFXxlfz4614MFE9J22i..90PsgPUaXAE7FLO5K3MaVAbQMZY8Z.a', 2, 2, 1, 1, '2019-08-30 01:43:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loket`
--
ALTER TABLE `loket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loket`
--
ALTER TABLE `loket`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
