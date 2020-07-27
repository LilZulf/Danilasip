-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 02:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp_lukman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip`
--

CREATE TABLE `tb_arsip` (
  `ID` int(10) NOT NULL,
  `NAMA_ARSIP` varchar(50) DEFAULT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL,
  `id_user` bigint(4) NOT NULL,
  `FILE` varchar(25) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `is_delete` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `KODE_KELAS` varchar(10) NOT NULL,
  `NAMA_KELAS` varchar(50) DEFAULT NULL,
  `is_delete` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`KODE_KELAS`, `NAMA_KELAS`, `is_delete`) VALUES
('k7', 'KELAS 7', 0),
('k8', 'KELAS 8', 0),
('k9', 'KELAS 9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `KODE_MAPEL` varchar(16) NOT NULL,
  `NAMA_MAPEL` varchar(50) DEFAULT NULL,
  `is_delete` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`KODE_MAPEL`, `NAMA_MAPEL`, `is_delete`) VALUES
('a1', 'Agama', 0),
('ip1', 'Ilmu Pengetahuan Alam', 0),
('m1', 'Matematika', 0),
('p0', 'Petugas', 0),
('pj1', 'Penjas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `ID` int(16) NOT NULL,
  `NIP` varchar(16) NOT NULL DEFAULT '0',
  `NIS` varchar(16) NOT NULL DEFAULT '0',
  `KODE_KELAS` varchar(16) NOT NULL DEFAULT '0',
  `KODE_MAPEL` varchar(16) NOT NULL DEFAULT '0',
  `NILAI_UH` int(5) NOT NULL DEFAULT '0',
  `NILAI_UTS` int(5) NOT NULL DEFAULT '0',
  `NILAI_UAS` int(5) NOT NULL DEFAULT '0',
  `SEMESTER` int(5) NOT NULL DEFAULT '0',
  `is_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`ID`, `NIP`, `NIS`, `KODE_KELAS`, `KODE_MAPEL`, `NILAI_UH`, `NILAI_UTS`, `NILAI_UAS`, `SEMESTER`, `is_delete`) VALUES
(6, '999', '9137912', 'k7', 'm1', 90, 88, 89, 1, 0),
(8, '999', '9137912', 'k7', 'ip1', 79, 83, 88, 1, 0),
(9, '999', '9137912', 'k7', 'm1', 88, 84, 81, 2, 0),
(10, '923234', '9137912', 'k7', 'pj1', 77, 0, 0, 1, 1),
(12, '923234', '9137912', 'k7', 'a1', 88, 0, 0, 1, 1),
(13, '923234', '1923012830', 'k7', 'm1', 60, 0, 0, 1, 0),
(14, '923234', '9137912', 'k7', 'ip1', 99, 0, 0, 2, 0),
(15, '923234', '9137912', 'k7', 'm1', 14, 0, 0, 3, 1),
(16, '923234', '99187237712', 'k8', 'a1', 99, 0, 0, 3, 0),
(17, '123456789123', '9137912', 'k7', 'a1', 100, 95, 88, 1, 0),
(18, '123456789123', '9137912', 'k7', 'pj1', 0, 75, 0, 1, 1),
(19, '123456789123', '9137912', 'k7', 'pj1', 77, 0, 66, 1, 0),
(20, '123456789123', '320842309', 'k9', 'ip1', 90, 0, 98, 5, 1),
(21, '123456789123', '99187237712', 'k8', 'a1', 88, 0, 0, 1, 0),
(22, '123456789123', '99187237712', 'k8', 'a1', 88, 0, 0, 2, 0),
(23, '123456789123', '320842309', 'k9', 'a1', 44, 0, 0, 1, 0),
(24, '123456789123', '320842309', 'k9', 'a1', 55, 0, 0, 2, 0),
(25, '123456789123', '320842309', 'k9', 'a1', 99, 0, 0, 3, 0),
(26, '123456789123', '320842309', 'k9', 'a1', 33, 0, 0, 4, 0),
(27, '123456789123', '320842309', 'k9', 'a1', 78, 0, 0, 5, 0),
(28, '123456789123', '99187237712', 'k8', 'a1', 88, 0, 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `NIS` varchar(16) NOT NULL,
  `NAMA_SISWA` varchar(50) DEFAULT NULL,
  `JK` varchar(5) DEFAULT NULL,
  `KODE_KELAS` varchar(10) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `is_delete` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`NIS`, `NAMA_SISWA`, `JK`, `KODE_KELAS`, `ALAMAT`, `TGL_LAHIR`, `is_delete`) VALUES
('1234567', 'Nekomata Okayu', 'P', 'k7', 'Malang', '2001-09-12', 1),
('1234568', 'Murasaki Shion', 'P', 'k8', 'Malang', '2001-09-12', 1),
('1234569', 'Minato Aqua', 'P', 'k9', 'Malang', '2001-09-12', 1),
('1923012830', 'Megumin', 'P', 'k7', 'Japan', '2003-04-11', 0),
('1949823', 'Jandia', 'L', 'k8', 'Magelang', '2001-08-10', 1),
('23121340', 'Tyler The Creator', 'L', 'k9', 'Amerika', '1998-01-01', 0),
('320842309', 'Wokoka', 'L', 'k9', 'California', '1992-08-10', 0),
('34241234', 'Jandia', 'L', 'k7', 'Bululawang', '2001-08-10', 1),
('623546', 'Wawan da Silvi', 'P', 'k8', 'Kertomanunggal gang 5 no 54', '2001-09-27', 1),
('7887324', 'Tester The wawan', 'L', 'k9', 'Japan', '2003-04-11', 1),
('9137912', 'Sagiri Izumi', 'P', 'k7', 'Japan', '2003-04-10', 0),
('9382', 'Senpai', 'L', 'k8', 'Bululawang', '2003-04-11', 1),
('99187237712', 'Lil Teca Ransom', 'L', 'k8', 'New York', '2001-08-10', 0),
('999', 'Juicy Wrld', 'L', 'k7', 'California', '1992-08-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `ID` int(10) NOT NULL,
  `NIP` varchar(16) NOT NULL,
  `NAMA_GURU` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `KODE_MAPEL` varchar(16) NOT NULL,
  `cookie` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `LEVEL` int(3) NOT NULL,
  `is_delete` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`ID`, `NIP`, `NAMA_GURU`, `USERNAME`, `PASSWORD`, `KODE_MAPEL`, `cookie`, `gambar`, `updated_at`, `LEVEL`, `is_delete`) VALUES
(1, '123456789123', 'Shirakami Fubuki', 'Fubuki', 'hatsunemiku00', 'p0', 'fvJ6kEQOl52jnYuKL3IqDN0u5VcBkGxppbLyWAITWYRNsjiRv82Fm80BMP3chleh', 'gambar_profile/1575336024.png', '2020-01-21 20:36:27', 0, 0),
(3, '19237123', 'Bismillah', 'Bismillah', 'estehanget', 'm1', 'ZsQVPuE4xpbBnDKk3fROjxM4z6109wJjCvSZFfmlSA3tuUKv8EgThNICHTrGJ9oN', 'gambar_profile/1578971095.png', '2020-01-14 10:20:35', 0, 0),
(6, '6283456', 'Wawan', 'Wawan', '123123', 'm1', 'CFcqr4Y456ezTefvjwE1Z5UAkMZX80LJGuN3mxKypp2aHuDKgDj9TROdoWovc2gy', 'gambar_profile/1579061293.png', '2020-01-15 11:08:55', 1, 0),
(5, '865878958', 'Mamank Kesbor', 'Mamank Kesbor', '12345678', 'p0', '', 'gambar_profile/1579012293.png', '2020-01-14 21:31:35', 1, 0),
(4, '923234', 'Mewah', 'Mewah', '03414457274', 'pj1', 'jPqYMSO5JCOjvXcDnm5w9PTcrZDIQsNkaFksJdKWV3go16F6Mn9efy8yhzfCBuXw', 'gambar_profile/1578981938.png', '2020-01-14 13:05:59', 1, 0),
(2, '999', 'Lil Zulf', 'Lil Zulf', 'estehanget', 'm1', '9zNVzJc4lJ7M1FSOnLu53PdgiYplxssi5DTohrGwEMIkHapWhRkHXeWSwm6IOU4V', 'gambar_profile/1575336024.png', '2020-01-14 08:02:34', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`KODE_KELAS`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`KODE_MAPEL`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD UNIQUE KEY `NIS` (`NIS`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
