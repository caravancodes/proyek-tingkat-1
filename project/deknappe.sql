-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 05:29 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deknappe`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `alamat_guru` varchar(30) NOT NULL,
  `gender_guru` varchar(30) NOT NULL,
  `telp_guru` varchar(16) NOT NULL,
  `email_guru` varchar(30) NOT NULL,
  `id_mapel` varchar(3) NOT NULL,
  `foto_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `password`, `nama_guru`, `alamat_guru`, `gender_guru`, `telp_guru`, `email_guru`, `id_mapel`, `foto_guru`) VALUES
(1111, '1111', 'Gatot, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gatot@gmail.com', 'MAT', 'G1.png'),
(2222, '2222', 'Dadang, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIN', 'G1.png'),
(3333, '3333', 'Udin, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIG', 'G1.png'),
(4444, '4444', 'Doyok, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'FIS', 'G1.png'),
(5555, '5555', 'Torik, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'KIM', 'G1.png'),
(6666, '6666', 'Bimo, S.Pd.', 'Bandung', 'Pria', '081234567098', 'gato@gmail.com', 'BIO', 'G1.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(3) NOT NULL,
  `nama_mapel` varchar(15) NOT NULL,
  `jurusan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `jurusan`) VALUES
('BIG', 'B.Inggris', 'ALL'),
('BIN', 'B.Indonesia', 'ALL'),
('BIO', 'Biologi', 'MIA'),
('EKO', 'Ekonomi', 'IIS'),
('FIS', 'Fisika', 'MIA'),
('GEO', 'Geografi', 'IIS'),
('KIM', 'Kimia', 'MIA'),
('MAT', 'Matematika', 'ALL'),
('SOS', 'Sosiologi', 'IIS');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_siswa` int(15) NOT NULL,
  `id_mapel` varchar(3) NOT NULL,
  `id_remedi` varchar(3) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `remedi`
--

CREATE TABLE `remedi` (
  `id_remedi` varchar(4) NOT NULL,
  `remedi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remedi`
--

INSERT INTO `remedi` (`id_remedi`, `remedi`) VALUES
('UAS', 'Ulangan Akhir Semester'),
('UH1', 'Ulangan Harian 1'),
('UH2', 'Ulangan Harian 2'),
('UTS', 'Ulangan Tengah Semester');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas_siswa` varchar(30) NOT NULL,
  `alamat_siswa` varchar(30) NOT NULL,
  `gender_siswa` varchar(30) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `foto_siswa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `password`, `nama_siswa`, `kelas_siswa`, `alamat_siswa`, `gender_siswa`, `no_telp`, `foto_siswa`) VALUES
(9, '009', 'Jati', '12 MIA', 'Solo', 'Laki-Laki', '', '121542student.png'),
(881, '0881', 'dony', '10 MIA', 'jakarta', 'Laki-Laki', '0817231233123', '12233374972.jpg'),
(3333, '3333', 'Krisna Setiawan', '11 MIA', 'Bandung', 'Laki-Laki', '08134567892', '042012316453.jpg'),
(8888, '8888', 'RIVKAL SUKMA SANJAYA', '12 MIA', 'Bandung', 'Laki-Laki', '081357108568', '164129IMG_20170206_093638.jpg'),
(11762, '11762', 'MUHAMMAD FAISAL AMIR', '12 MIA', 'Bandung', 'Laki-Laki', 'no_telp', '194517Upload-Foto.jpg'),
(12333, '12333', 'saiful', '11 MIA', 'gatel', 'Laki-Laki', 'no_telp', '10032174971.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `no_soal` int(4) NOT NULL,
  `id_mapel` varchar(3) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `id_remedi` varchar(4) NOT NULL,
  `soal` varchar(10000) NOT NULL,
  `pil_a` varchar(500) NOT NULL,
  `pil_b` varchar(500) NOT NULL,
  `pil_c` varchar(500) NOT NULL,
  `pil_d` varchar(500) NOT NULL,
  `jawaban` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`no_soal`, `id_mapel`, `kelas`, `id_remedi`, `soal`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `jawaban`) VALUES
(3, 'SOS', '10', 'UAS', 'Soal 1', 'IPS', 'IPS', 'IPS', 'IPS', 'a'),
(4, 'BIO', '10', 'UH1', 'Soal 1', 'bio', 'bio', 'bio', 'bio', 'b'),
(5, 'BIO', '10', 'UH1', 'soal 2', 'bio', 'bio', 'bio', 'bio', 'c'),
(10, 'BIG', '10', 'UAS', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(11, 'BIG', '10', 'UAS', 'Apa kepanjangan b.ing?', 'Pelajaran', 'Ilmu', 'bahasainggris', 'Jajan', 'c'),
(12, 'BIG', '10', 'UAS', 'berapa nilai bahasa inggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'seratus', 'd'),
(13, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'a'),
(14, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'b'),
(15, 'BIG', '10', 'UH1', 'Apa itu bahasainggris ?', 'Pelajaran', 'Ilmu', 'Makanan', 'Jajan', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `kode_remedi` (`id_remedi`);

--
-- Indexes for table `remedi`
--
ALTER TABLE `remedi`
  ADD PRIMARY KEY (`id_remedi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`no_soal`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_remedi` (`id_remedi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `no_soal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_remedi`) REFERENCES `remedi` (`id_remedi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
