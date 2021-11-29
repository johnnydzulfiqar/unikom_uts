-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 05:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `nama_ayah` text NOT NULL,
  `alamat_ayah` text NOT NULL,
  `pekerjaan_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `alamat_ibu` text NOT NULL,
  `pekerjaan_ibu` text NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`nama_ayah`, `alamat_ayah`, `pekerjaan_ayah`, `nama_ibu`, `alamat_ibu`, `pekerjaan_ibu`, `id_siswa`) VALUES
('Endang Suryana', 'pojok', 'wirausaha', 'Siti Patimah', 'pojok', 'ibu rumah tangga', 17),
('solihin', 'pojok', 'wirausaha', 'Barack', 'pojok', 'ibu rumah tangga', 18),
('Obama', 'pojok', 'wirausaha', 'Barack', 'pojok', 'ibu rumah tangga', 19);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kota` text NOT NULL,
  `pos` int(10) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jeniskelamin` text NOT NULL,
  `anak` text NOT NULL,
  `asal` text NOT NULL,
  `kelas` text NOT NULL,
  `status` text NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` int(11) NOT NULL,
  `rapor_buku` varchar(50) NOT NULL,
  `rapor_nilai` varchar(50) NOT NULL,
  `ijasah` varchar(50) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nama`, `alamat`, `kota`, `pos`, `ttl`, `jeniskelamin`, `anak`, `asal`, `kelas`, `status`, `id_siswa`, `image`, `image_text`, `rapor_buku`, `rapor_nilai`, `ijasah`, `kk`, `date`) VALUES
('Muhammad Naufa Dzulfiqar', 'Pojok tengah', 'Kota Cimahi', 56399, 'Cimahi ', 'Laki-Laki', '1 dari 3 bersaudara', 'Smkn 1 Cimahi', 'X', '', 17, '3x4.jpg', 0, 'Terisi', 'Terisi', 'Terisi', 'Terisi', '1999-11-07'),
('dadang', 'Pojok tengah', 'Kota Cimahi', 5758, 'Cimahi', 'Laki-Laki', '5 dari 10 bersaudara', 'Smp suram', 'XII', '', 18, '440px-SMK_Negeri_1_Cimahi.png', 0, 'Terisi', 'Tidak Terisi', 'Tidak Terisi', 'Tidak Terisi', '2021-11-28'),
('dadang', 'Pojok tengah', 'Kota Cimahi', 5758, 'New york ', 'Other', '5 dari 10 bersaudara', 'Smp suram', 'XII', '', 19, 'geralt-thumbs-up.jpg', 0, 'Terisi', 'Tidak Terisi', 'Tidak Terisi', 'Tidak Terisi', '2021-11-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD CONSTRAINT `orangtua_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
