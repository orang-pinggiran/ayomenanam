-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 08:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_menanam`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pohon`
--

CREATE TABLE `jenis_pohon` (
  `id_jenis_pohon` int(11) NOT NULL,
  `nama_jenis_pohon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pohon`
--

INSERT INTO `jenis_pohon` (`id_jenis_pohon`, `nama_jenis_pohon`) VALUES
(1, 'Jati'),
(2, 'Mahoni'),
(3, 'Cemara'),
(4, 'Palem'),
(5, 'Enceng gondok');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adopsi`
--

CREATE TABLE `tbl_adopsi` (
  `id_adopsi` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jenis_adopsi` varchar(100) NOT NULL,
  `id_posko` int(11) NOT NULL,
  `id_jenis_pohon` int(11) NOT NULL,
  `nama_pohon` varchar(100) NOT NULL,
  `jumlah_pohon` int(11) NOT NULL,
  `tgl_adopsi` date NOT NULL,
  `waktu_adopsi` time NOT NULL,
  `status_adopsi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adopsi`
--

INSERT INTO `tbl_adopsi` (`id_adopsi`, `id_event`, `id_pengguna`, `jenis_adopsi`, `id_posko`, `id_jenis_pohon`, `nama_pohon`, `jumlah_pohon`, `tgl_adopsi`, `waktu_adopsi`, `status_adopsi`, `keterangan`) VALUES
(2, 1, 14, 'Tanam bersama', 3, 2, 'Unyil', 2, '2019-04-29', '14:55:36', 'Disetujui', 'Disetujui'),
(3, 1, 23, 'Titip Tanam', 3, 1, 'Usrok', 3, '2019-05-07', '09:27:16', 'Terdaftar', 'Menunggu konfirmasi'),
(4, 1, 23, 'Tanam bersama', 3, 2, 'Ucul', 1, '2019-05-27', '10:51:06', 'Disetujui', 'Telah disetujui'),
(5, 3, 24, 'Tanam bersama', 4, 2, 'Usrok', 1, '2019-05-20', '09:13:03', 'Disetujui', 'Telah disetujui'),
(6, 3, 20, 'Tanam bersama', 3, 1, 'Usrok', 1, '2019-05-27', '10:51:39', 'Disetujui', 'Telah disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_posko` int(11) NOT NULL,
  `id_jenis_pohon` int(11) NOT NULL,
  `jumlah_pohon` int(11) NOT NULL,
  `tgl_donasi` date NOT NULL,
  `waktu_donasi` time NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `id_pengguna`, `id_posko`, `id_jenis_pohon`, `jumlah_pohon`, `tgl_donasi`, `waktu_donasi`, `status`, `keterangan`) VALUES
(1, 17, 3, 1, 2, '2019-04-02', '08:00:00', 'Terdaftar', 'Menunggu konfirmasi'),
(2, 14, 3, 1, 2, '2019-04-29', '09:11:36', 'Disetujui', 'Disetujui'),
(3, 14, 3, 2, 4, '2019-04-29', '09:22:12', 'Terdaftar', 'Masih terdaftar'),
(4, 23, 4, 1, 2, '2019-05-07', '13:06:59', 'Terdaftar', ''),
(5, 20, 3, 3, 3, '2019-05-13', '08:49:37', 'Terdaftar', ''),
(6, 24, 3, 3, 2, '2019-05-13', '13:44:50', 'Terdaftar', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id_event` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `judul_event` varchar(255) NOT NULL,
  `poster` varchar(100) NOT NULL,
  `keterangan_event` longtext NOT NULL,
  `hari_event` varchar(100) NOT NULL,
  `tanggal_event` date NOT NULL,
  `waktu_event` time NOT NULL,
  `tempat_event` varchar(255) NOT NULL,
  `longitude_event` varchar(100) NOT NULL,
  `latitude_event` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tgl_event` date NOT NULL,
  `jam_event` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id_event`, `id_pengguna`, `judul_event`, `poster`, `keterangan_event`, `hari_event`, `tanggal_event`, `waktu_event`, `tempat_event`, `longitude_event`, `latitude_event`, `status`, `tgl_event`, `jam_event`) VALUES
(1, 20, 'Bulan Menanam Nasional 2019 DLH Kabupaten Blitar', '171.jpeg', 'Setelah sukses mengadakan fun run #KulariKehutan pada 2016 dan 2017, Hutan Itu Indonesia kembali mengadakan #KuLariKeHutan pada 30 Juni 2019 di Jakarta.\r\n#KuLariKeHutan mengajak siapa saja – baik pelari maupun non-pelari, tua maupun muda – untuk berkontribusi langsung menjaga hutan Indonesia dengan cara mudah, yaitu berlari.\r\n#KuLariKeHutan mengajakmu berlari sejauh lima kilometer untuk mengadopsi satu pohon di hutan Indonesia. Masih sanggup berlari lagi? Kamu juga bisa berlari sejauh mungkin untuk mengadopsi pohon sebanyak mungkin dalam waktu dua jam. Contohnya jika kamu berlari 10 kilometer maka sama dengan mengadopsi dua pohon, berlari 15 kilometer sama dengan mengadopsi tiga pohon, dan seterusnya.', 'Senin', '2019-04-12', '10:00:00', 'Hutan Konservasi Wisata Gua Umbultuk', '112.17386484146118', '-8.094782823963358', 'Belum berlangsung', '0000-00-00', '00:00:00'),
(2, 14, 'Haha', '14.jpg', 'ahaha', 'Senin', '2019-05-25', '05:08:00', 'jl. dahlia', '112.17345714569092', '-8.095175835519308', 'Belum berlangsung', '2019-05-10', '16:03:06'),
(3, 14, 'Haha', '15.jpg', 'gsgs', 'Senin', '2019-05-25', '03:02:00', 'Jl. Dahlia no. 33', '112.16993808746338', '-8.095643200113749', 'Belum berlangsung', '2019-05-10', '16:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Hutan gundul'),
(3, 'Hutan bakau'),
(4, 'Hutan gambut');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komunitas`
--

CREATE TABLE `tbl_komunitas` (
  `id_komunitas` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `nama_wakil` varchar(100) NOT NULL,
  `nama_sekretaris` varchar(100) NOT NULL,
  `nama_bendahara` varchar(100) NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komunitas`
--

INSERT INTO `tbl_komunitas` (`id_komunitas`, `id_pengguna`, `nama_ketua`, `nama_wakil`, `nama_sekretaris`, `nama_bendahara`, `visi`, `misi`) VALUES
(4, 20, 'Pak Nur', 'Nindy Alvy', 'Syukron', 'Izza', 'Visi', 'Misi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_map`
--

CREATE TABLE `tbl_map` (
  `id_map` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `latitude_map` varchar(255) NOT NULL,
  `longitude_map` varchar(255) NOT NULL,
  `alamat_map` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_map`
--

INSERT INTO `tbl_map` (`id_map`, `id_kategori`, `latitude_map`, `longitude_map`, `alamat_map`) VALUES
(3, 3, '-8.095069616217673', '112.17038869857788', 'Pasar pon'),
(4, 4, '-8.093285127762709', '112.17241644859314', 'Pasar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `waktu_registrasi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nama`, `email`, `password`, `level`, `alamat`, `tlp`, `foto`, `waktu_registrasi`, `status`) VALUES
(14, 'Yohanes', 'trestiarso@gmail.com', '58fb7a1f6ec8e950d6fc6bdb4ccbb83d', 1, 'Sentul', '085735270360', 'img.jpg', '2019-05-14 10:55:43', 'Terverifikasi'),
(20, 'Yesika Trestiarso', 'yesikatrestiarso@gmail.com', '7db7599adccc1f85b5bdb7c4d94e937d', 2, 'Selopuro', '085735270368', 'group.png', '2019-05-14 10:55:43', 'Terverifikasi'),
(21, 'Nindy', 'admin@bewithdhanu.in', '7db7599adccc1f85b5bdb7c4d94e937d', 4, 'Selopuro', '085735270367', 'group.png', '2019-05-14 10:55:43', 'Terverifikasi'),
(23, 'Yesika', 'yohanesarifin@gmail.com', '7db7599adccc1f85b5bdb7c4d94e937d', 3, 'Kalipang', '085735270366', 'avatar5.png', '2019-05-14 10:55:43', 'Terverifikasi'),
(24, 'Ervin', 'ervin@gmail.com', '7db7599adccc1f85b5bdb7c4d94e937d', 4, 'Jl. Dieng no. 19', '085735270360', 'group.png', '2019-05-14 10:55:43', 'Terverifikasi'),
(25, 'Syukron', 'syukron@gmail.com', '7db7599adccc1f85b5bdb7c4d94e937d', 4, 'Lodoyo', '085735270365', 'group.png', '2019-05-14 10:55:43', 'Terverifikasi'),
(26, 'Rio Eka', 'rioekaretandi@gmail.com', '7db7599adccc1f85b5bdb7c4d94e937d', 3, 'Wlingi', '085735270360', 'default.png', '2019-05-14 12:51:30', 'Terverifikasi'),
(37, 'Yesika Trestiarso', 'yesikatrestiarso@gmail.com', '7db7599adccc1f85b5bdb7c4d94e937d', 3, '', '', 'default.png', '2019-05-28 13:43:42', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pohon`
--

CREATE TABLE `tbl_pohon` (
  `id_pohon` int(11) NOT NULL,
  `id_posko` int(11) NOT NULL,
  `id_jenis_pohon` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pohon`
--

INSERT INTO `tbl_pohon` (`id_pohon`, `id_posko`, `id_jenis_pohon`, `jumlah`) VALUES
(1, 3, 1, 11),
(4, 3, 2, 17),
(5, 3, 3, 2),
(6, 3, 4, 5),
(7, 3, 5, 7),
(8, 4, 1, 6),
(9, 4, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posko`
--

CREATE TABLE `tbl_posko` (
  `id_posko` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_posko` varchar(255) NOT NULL,
  `alamat_posko` varchar(255) NOT NULL,
  `longitude_posko` varchar(255) NOT NULL,
  `latitude_posko` varchar(255) NOT NULL,
  `tlp_posko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posko`
--

INSERT INTO `tbl_posko` (`id_posko`, `id_pengguna`, `nama_posko`, `alamat_posko`, `longitude_posko`, `latitude_posko`, `tlp_posko`) VALUES
(3, 21, 'Banaran', 'Jl.  banaran no.10', '112.03148245811462', '-7.834292076846573', '085735270367'),
(4, 24, 'Kaulon', 'Kaulon desa entah', '112.26660272470576', '-8.153224774813541', '085735270360'),
(8, 25, 'Mbetet', 'Jl. Mbetet', '112.20486189999997', '-8.168144', '085735270365');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timeline`
--

CREATE TABLE `tbl_timeline` (
  `id_timeline` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `foto_timeline` varchar(100) NOT NULL,
  `deskripsi_timeline` longtext NOT NULL,
  `tanggal_timeline` date NOT NULL,
  `waktu_timeline` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_timeline`
--

INSERT INTO `tbl_timeline` (`id_timeline`, `id_pengguna`, `foto_timeline`, `deskripsi_timeline`, `tanggal_timeline`, `waktu_timeline`) VALUES
(1, 20, '12.jpg', 'hahaha', '2019-04-04', '19:00:00'),
(3, 23, '17.jpeg', 'Program ini memiliki dua kegiatan utama: Kompetisi #CeritaDariHutan pada Mei-Juli 2019 yang mengajak peserta untuk mengirim artikel blog dan video/foto yang menceritakan kerennya hutan Indonesia dan Forest Camp pada November-Desember 2018 yang mengajak media, influencers, dan publik untuk menjelajah 5 hutan di Indonesia.', '2019-05-03', '14:50:29'),
(4, 14, '21.jpeg', 'FGHBJN', '2019-04-25', '05:57:32'),
(5, 23, '13.jpg', 'Program ini memiliki dua kegiatan utama: Kompetisi #CeritaDariHutan pada Mei-Juli 2019 yang mengajak peserta untuk mengirim artikel blog dan video/foto yang menceritakan kerennya hutan Indonesia dan Forest Camp pada November-Desember 2018 yang mengajak media, influencers, dan publik untuk menjelajah 5 hutan di Indonesia.', '2019-05-10', '08:50:05'),
(6, 24, '16.jpg', 'hahahaha', '2019-05-11', '14:27:11'),
(7, 24, '17.jpg', 'Waktu potong padi di tengah sawah sambil bernyanyi riuh rendah', '2019-05-13', '10:32:00'),
(8, 20, '2.jpg', 'waktu potong padi di tengah sawah sambil bernyanyi riuh rendah', '2019-05-13', '10:43:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_pohon`
--
ALTER TABLE `jenis_pohon`
  ADD KEY `id_jenis_pohon` (`id_jenis_pohon`);

--
-- Indexes for table `tbl_adopsi`
--
ALTER TABLE `tbl_adopsi`
  ADD KEY `id_adopsi` (`id_adopsi`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD KEY `id_donasi` (`id_donasi`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_komunitas`
--
ALTER TABLE `tbl_komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indexes for table `tbl_map`
--
ALTER TABLE `tbl_map`
  ADD PRIMARY KEY (`id_map`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_pohon`
--
ALTER TABLE `tbl_pohon`
  ADD PRIMARY KEY (`id_pohon`);

--
-- Indexes for table `tbl_posko`
--
ALTER TABLE `tbl_posko`
  ADD PRIMARY KEY (`id_posko`);

--
-- Indexes for table `tbl_timeline`
--
ALTER TABLE `tbl_timeline`
  ADD PRIMARY KEY (`id_timeline`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_pohon`
--
ALTER TABLE `jenis_pohon`
  MODIFY `id_jenis_pohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_adopsi`
--
ALTER TABLE `tbl_adopsi`
  MODIFY `id_adopsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_komunitas`
--
ALTER TABLE `tbl_komunitas`
  MODIFY `id_komunitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_map`
--
ALTER TABLE `tbl_map`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_pohon`
--
ALTER TABLE `tbl_pohon`
  MODIFY `id_pohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_posko`
--
ALTER TABLE `tbl_posko`
  MODIFY `id_posko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_timeline`
--
ALTER TABLE `tbl_timeline`
  MODIFY `id_timeline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
