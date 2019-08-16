-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2019 pada 02.19
-- Versi Server: 5.5.61
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kios`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga`
--

CREATE TABLE IF NOT EXISTS `tb_harga` (
  `id_harga` int(11) NOT NULL,
  `id_kios` int(11) NOT NULL,
  `id_sembako` int(11) NOT NULL,
  `harga` float NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_harga`
--

INSERT INTO `tb_harga` (`id_harga`, `id_kios`, `id_sembako`, `harga`, `tanggal`, `hari`) VALUES
(4, 20, 44, 150000, '2019-08-07', 'Senin'),
(5, 20, 45, 175000, '2019-08-08', 'Selasa'),
(6, 24, 46, 25000, '2019-08-10', 'Rabu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kios`
--

CREATE TABLE IF NOT EXISTS `tb_kios` (
  `id_kios` int(11) NOT NULL,
  `nama_kios` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kios`
--

INSERT INTO `tb_kios` (`id_kios`, `nama_kios`, `gambar`, `lat`, `lng`, `lokasi`, `deskripsi`) VALUES
(20, 'KIOS Agung Pratama', '7957klpnoab0qa.jpg', 2.9589192665913906, 99.06164962878643, 'Gedung 3 Lantai 1 Pasar Horas Jaya', '<p>Kios Ini Menyediakan Berbagai Macam Semabako. Pada Pasar Horas Jaya Kota Pematangsiantar</p>'),
(23, 'Kios Jaya Selalu', '9475621854579p.jpg', 2.9611347000000223, 99.06017070000007, 'Lt. 3 Gedung 2 Pasar Horas Jaya Pematangsiantar', '<p>Menyedikan berbagai macam sembako. Untuk keperluan Rumah Tanggan</p>'),
(24, 'Kios Simanjutak', '1780pasar-santa_20160923_200053.jpg', 2.9608182097842826, 99.06017070000007, 'Lt. 1 Gedung 1 Pasar Horas Jaya Kota Pematangsiantar', '<p>Menyediakan berbagai macar sembako pada untuk keperluan rumah tangga.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_options`
--

CREATE TABLE IF NOT EXISTS `tb_options` (
  `option_name` varchar(16) NOT NULL,
  `option_value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_options`
--

INSERT INTO `tb_options` (`option_name`, `option_value`) VALUES
('default_lat', '2.9611347'),
('default_lng', '99.0601707'),
('default_zoom', '13.7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sembako`
--

CREATE TABLE IF NOT EXISTS `tb_sembako` (
  `id_sembako` int(11) NOT NULL,
  `nama_sembako` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sembako`
--

INSERT INTO `tb_sembako` (`id_sembako`, `nama_sembako`, `gambar`, `satuan`, `deskripsi`) VALUES
(44, 'Beras Kepala Super', '3190images-(1).jpg', 'Bungkus', '<p>Beras ini sangat enak untuk dimakan, memiliki rasa manis sekali.</p>'),
(45, 'Beras Pulen', '3549fs_fs-beras-sentra-ramoslong-grain-5kg_full02.jpg', 'Bungkus', '<p><strong>Beras pulen</strong>&nbsp;mengandung sekitar 20 persen kadar amilopektin sehingga&nbsp;<strong>beras</strong>menjadi lengket saat menjadi nasi.</p>'),
(46, 'Minyak Goreng Bimoli', '8727minyak-goreng-bimoli-kebutuhan-rumah-tangga-makanan-14193573.jpg', 'Bungkus', '<p><strong>Bimoli</strong>&nbsp;terbuat dari&nbsp;<strong>kelapa sawit</strong>&nbsp;Golden Grade yang diproses dengan Golden Refinery Technology dan Pemurnian Multi Proses. Hasilnya adalah&nbsp;<strong>minyak goreng</strong>&nbsp;berwarna kuning yang lebih tahan panas dan mengandung Omega 9 atau asam oleat, Omega 6, Vitamin E, serta Beta Karoten (Pro Vitamin A alami).</p>'),
(47, 'Minyak Goreng Tropical', '2065tropical_tropical-2l-minyak-goreng--6-pouch-_full02.jpg', 'Bungkus', '<p>Minyak goreng Tropical adalah minyak goreng&nbsp; yang kualitasnya disempurnakan dengan proses 2 x penyaringan. Mengandung asam lemak tak jenuh (omega 9) paling tinggi. Tropical minyak goreng 2 x penyaringan tetap bening dan mengandung Vitamin E sebagai antioksidan serta Pro Vitamin A.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user`, `pass`) VALUES
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `tb_kios`
--
ALTER TABLE `tb_kios`
  ADD PRIMARY KEY (`id_kios`);

--
-- Indexes for table `tb_sembako`
--
ALTER TABLE `tb_sembako`
  ADD PRIMARY KEY (`id_sembako`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_kios`
--
ALTER TABLE `tb_kios`
  MODIFY `id_kios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_sembako`
--
ALTER TABLE `tb_sembako`
  MODIFY `id_sembako` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
