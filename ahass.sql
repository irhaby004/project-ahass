-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 08:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahass`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `kode` double NOT NULL,
  `ahass` varchar(30) NOT NULL,
  `c1` float NOT NULL,
  `c2` float NOT NULL,
  `c3` float NOT NULL,
  `c4` float NOT NULL,
  `c5` float NOT NULL,
  `c5_2` int(11) NOT NULL DEFAULT 0,
  `t1` float NOT NULL,
  `t2` float NOT NULL,
  `t3` float NOT NULL,
  `t5` float NOT NULL,
  `id_kategori` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode`, `ahass`, `c1`, `c2`, `c3`, `c4`, `c5`, `c5_2`, `t1`, `t2`, `t3`, `t5`, `id_kategori`) VALUES
(35, 1054, 'PT. Rotella Persada Mandiri', 1614, 9, 146047, 10, 75, 4, 1515, 9, 148812, 68, 1),
(36, 1055, 'PT. Rotella Persada Mandiri', 1674, 10, 154784, 10, 120, 4, 1527, 10, 165517, 68, 1),
(37, 1251, 'PT. Berlian Bintang Mas ', 1511, 8, 144049, 10, 104, 4, 1421, 8, 152, 64, 1),
(38, 3172, 'CV. Honda Kita', 936, 5, 78167, 0, 32, 4, 999, 5, 83556, 64, 3),
(39, 3609, 'CV. Deli Motor', 1368, 8, 147878, 10, 104, 4, 1242, 7, 146358, 64, 1),
(40, 6870, 'CV. Sungai Mas', 1557, 7, 137829, 10, 87, 4, 1308, 7, 151573, 64, 1),
(41, 7150, 'PT. Sumber Perintis Jaya ', 935, 7, 87994, 0, 19, 3, 954, 6, 96989, 64, 1),
(42, 7859, 'PT. Pilar Deli Labumas', 906, 5, 122419, 10, 0, 0, 901, 5, 148930, 64, 1),
(44, 8563, 'PT. Buana Jaya Lestari', 1134, 7, 150789, 10, 15, 2, 1382, 7, 153076, 64, 1),
(45, 13139, 'PT. Daya Anugrah Mandiri', 723, 3, 137540, 0, 61, 4, 1018, 4, 139638, 64, 1),
(46, 286, 'CV. Sungai Mas', 1393, 7, 128963, 0, 157, 4, 1330, 7, 139443, 64, 1),
(47, 873, 'PT. Rotella Persada Mandiri', 1343, 9, 136235, 0, 39, 4, 1337, 9, 138917, 64, 1),
(48, 1092, 'PT. Sagita Mulia Laras', 1731, 9, 126669, 0, 109, 4, 1583, 10, 129916, 64, 1),
(49, 13141, 'CV. Satu Hati Perkasa', 629, 5, 93414, 0, 44, 4, 726, 4, 80161, 64, 1),
(50, 12614, 'PT. Nusantara Surya Sakti', 505, 4, 106222, 0, 22, 3, 737, 4, 132992, 64, 1),
(51, 10115, 'PT. Pilar Deli Labumas', 524, 3, 130256, 0, 0, 0, 375, 3, 120000, 64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(5) NOT NULL,
  `id_alternatif` int(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(919, 35, 0.251),
(920, 36, 0.251),
(921, 37, 0.475),
(922, 38, -0.301),
(923, 39, 0.675),
(924, 40, 0.251),
(925, 41, -0.007),
(926, 42, -0.096),
(927, 44, -0.351),
(928, 45, -0.707),
(929, 46, -0.102),
(930, 47, -0.138),
(931, 48, -0.073),
(932, 49, 0.13),
(933, 50, -0.541),
(934, 51, 0.281);

-- --------------------------------------------------------

--
-- Table structure for table `kategory`
--

CREATE TABLE `kategory` (
  `id_kategori` int(5) NOT NULL,
  `nama` varchar(5) NOT NULL,
  `detail` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategory`
--

INSERT INTO `kategory` (`id_kategori`, `nama`, `detail`) VALUES
(1, 'A', '> 140.000'),
(2, 'B', '100.000 - 140.000'),
(3, 'C', '< 100.000');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(4) NOT NULL,
  `kriteria` varchar(2) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `keterangan`, `bobot`) VALUES
(4, 'C4', 'Keaktifan AHASS dalam Berbagai Event', 0.076),
(3, 'C3', 'Sales Ability', 0.186),
(2, 'C2', 'Jumlah Mekanik', 0.281),
(1, 'C1', 'Unit Entry', 0.408),
(5, 'C5', 'AHASS Buka 7 Hari', 0.049);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub` int(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_kriteria` int(4) NOT NULL,
  `id_kat` int(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub`, `keterangan`, `nilai`, `id_kriteria`, `id_kat`) VALUES
(22, 'Pencapaian UE 70% - 79%', 2, 1, 1),
(21, 'Pencapaian UE 80% - 84%', 3, 1, 1),
(20, 'Pencapaian UE 85% - 89%', 4, 1, 1),
(19, 'Pencapaian UE 90% - 94%', 5, 1, 1),
(18, 'Pencapaian UE 95% - 100%', 6, 1, 1),
(17, 'Pencapaian UE 101% - 105%', 7, 1, 1),
(16, 'Pencapaian UE > 105%', 8, 1, 1),
(23, 'Pencapaian UE < 70% ', 1, 1, 1),
(24, 'lebih 2 orang ', 5, 2, 1),
(25, 'lebih 1 orang', 4, 2, 1),
(26, 'sesuai target', 3, 2, 1),
(27, 'kurang 1 orang', 2, 2, 1),
(28, 'kurang ≥ 2 orang', 1, 2, 1),
(29, 'naik 13-15%', 5, 3, 1),
(30, 'naik 10-12%', 4, 3, 1),
(31, 'naik 7-9%', 3, 3, 1),
(32, 'naik 4-6%', 2, 3, 1),
(33, 'naik 1-3%', 1, 3, 1),
(34, 'naik 17-20%', 5, 3, 2),
(35, 'naik 13-16%', 4, 3, 2),
(36, 'naik 9-12%', 3, 3, 2),
(37, 'naik 7-8%', 2, 3, 2),
(38, 'naik 1-4%', 1, 3, 2),
(39, 'naik 25-30%', 5, 3, 3),
(40, 'naik 19-24%', 4, 3, 3),
(41, 'naik 13-18%', 3, 3, 3),
(42, 'naik 7-12%', 2, 3, 3),
(43, 'naik 1-6%', 1, 3, 3),
(44, 'Booking dan Event', 3, 4, 1),
(45, 'Booking atau Event', 2, 4, 1),
(46, 'Tidak ada', 1, 4, 1),
(47, 'buka 4x minggu + capai UE', 5, 5, 1),
(48, 'buka 4x minggu + tidak  capai UE', 4, 5, 1),
(49, 'buka 2-3x minggu + capai UE', 4, 5, 1),
(50, 'buka 2-3x minggu + tidak capai UE', 3, 5, 1),
(51, 'buka 1x minggu + capai UE', 3, 5, 1),
(52, 'buka 1x minggu + tidak capai UE', 2, 5, 1),
(53, 'Tidak buka di hari minggu', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `username`, `nama`, `password`, `level`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kategory`
--
ALTER TABLE `kategory`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=935;

--
-- AUTO_INCREMENT for table `kategory`
--
ALTER TABLE `kategory`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
