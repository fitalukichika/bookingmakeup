-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Des 2018 pada 02.11
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dinasku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenispelatihan`
--

CREATE TABLE IF NOT EXISTS `tb_jenispelatihan` (
  `id_jenispelatihan` varchar(7) NOT NULL,
  `nama_pelatihan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenispelatihan`
--

INSERT INTO `tb_jenispelatihan` (`id_jenispelatihan`, `nama_pelatihan`) VALUES
('DM0002', 'AMT'),
('DM0001', 'CEFE'),
('DM0003', 'Kewirausahaan'),
('DM0004', 'Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kehadiran`
--

CREATE TABLE IF NOT EXISTS `tb_kehadiran` (
  `id_hadir` int(11) NOT NULL,
  `id_pelatihan` varchar(7) NOT NULL,
  `presensi` enum('masuk','tidak','diterbitkan') NOT NULL,
  `tgl` date NOT NULL,
  `id_peserta` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id_hadir`, `id_pelatihan`, `presensi`, `tgl`, `id_peserta`) VALUES
(1, 'MG0002', 'masuk', '2018-12-20', 'P0001'),
(2, 'MG0002', 'masuk', '2018-12-20', 'P0002'),
(3, 'MG0002', 'masuk', '2018-12-20', 'P0003'),
(4, 'MG0002', 'masuk', '2018-12-20', 'P0004'),
(5, 'MG0002', 'masuk', '2018-12-20', 'P0005'),
(6, 'MG0003', 'masuk', '2018-12-20', 'P0008'),
(7, 'MG0003', 'masuk', '2018-12-20', 'P0009'),
(8, 'MG0003', 'masuk', '2018-12-20', 'P0010'),
(9, 'MG0002', 'masuk', '2018-12-21', 'P0001'),
(10, 'MG0002', 'tidak', '2018-12-21', 'P0002'),
(11, 'MG0002', 'masuk', '2018-12-21', 'P0003'),
(12, 'MG0002', 'masuk', '2018-12-21', 'P0004'),
(13, 'MG0002', 'tidak', '2018-12-21', 'P0005'),
(14, 'MG0003', 'masuk', '2018-12-21', 'P0008'),
(15, 'MG0003', 'masuk', '2018-12-21', 'P0009'),
(16, 'MG0003', 'masuk', '2018-12-21', 'P0010'),
(17, 'MG0002', 'masuk', '2018-12-23', 'P0001'),
(18, 'MG0002', 'masuk', '2018-12-23', 'P0002'),
(19, 'MG0002', 'masuk', '2018-12-23', 'P0003'),
(20, 'MG0002', 'masuk', '2018-12-23', 'P0004'),
(21, 'MG0002', 'masuk', '2018-12-23', 'P0005'),
(22, 'MG0003', 'masuk', '2018-12-23', 'P0008'),
(23, 'MG0003', 'masuk', '2018-12-23', 'P0009'),
(24, 'MG0003', 'masuk', '2018-12-23', 'P0010'),
(25, 'MG0002', 'masuk', '2018-12-24', 'P0001'),
(26, 'MG0002', 'masuk', '2018-12-24', 'P0002'),
(27, 'MG0002', 'masuk', '2018-12-24', 'P0003'),
(28, 'MG0002', 'masuk', '2018-12-24', 'P0004'),
(29, 'MG0003', 'masuk', '2018-12-24', 'P0008'),
(30, 'MG0003', 'masuk', '2018-12-24', 'P0009'),
(31, 'MG0003', 'masuk', '2018-12-24', 'P0010'),
(32, 'MG0002', 'masuk', '2018-12-25', 'P0001'),
(33, 'MG0002', 'masuk', '2018-12-25', 'P0002'),
(34, 'MG0002', 'masuk', '2018-12-25', 'P0005'),
(35, 'MG0002', 'masuk', '2018-12-25', 'P0004'),
(36, 'MG0003', 'masuk', '2018-12-25', 'P0008'),
(37, 'MG0003', 'masuk', '2018-12-25', 'P0009'),
(38, 'MG0003', 'masuk', '2018-12-25', 'P0010'),
(39, 'MG0002', 'masuk', '2018-12-25', 'P0003'),
(40, 'MG0002', 'masuk', '2018-11-26', 'P0014'),
(41, 'MG0002', 'masuk', '2018-11-27', 'P0014');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelatihan`
--

CREATE TABLE IF NOT EXISTS `tb_pelatihan` (
  `id_pelatihan` varchar(7) NOT NULL,
  `id_jenispelatihan` varchar(7) NOT NULL,
  `id_pendamping` varchar(10) NOT NULL,
  `tempat` varchar(15) NOT NULL,
  `jadwal` date NOT NULL,
  `kuota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelatihan`
--

INSERT INTO `tb_pelatihan` (`id_pelatihan`, `id_jenispelatihan`, `id_pendamping`, `tempat`, `jadwal`, `kuota`) VALUES
('MG0002', 'DM0002', 'PB0001', 'LIK Kudus', '2018-12-22', 12),
('MG0003', 'DM0001', 'PB0001', 'LIK Kudus', '2018-12-20', 14),
('MG0004', 'DM0003', 'PB0003', 'Aula BLK', '2018-12-25', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `tb_pendaftaran` (
  `id_peserta` varchar(12) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama_peserta` varchar(30) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `produk` varchar(30) NOT NULL,
  `id_pelatihan` varchar(7) NOT NULL,
  `foto_diri` text NOT NULL,
  `tdi` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` enum('calon','diterima','ditolak','diterbitkan') NOT NULL,
  `id_periode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id_peserta`, `no_ktp`, `nama_peserta`, `jekel`, `alamat`, `no_hp`, `nama_perusahaan`, `produk`, `id_pelatihan`, `foto_diri`, `tdi`, `username`, `password`, `status`, `id_periode`) VALUES
('P0001', '6346798690797689', 'Muhammad Abdul Rohman s', 'L', 'Desa Colo Rt 03/01', '081325219392', 'Argo Mulyo', 'Keripik Ganyong', 'MG0002', 'P0001_ft_abdul.jpg', 'P0001_tdi_TDP1.JPG', 'abdul', 'abdul', 'diterima', 'PER0001'),
('P0002', '8923490729712974', 'Ahmad Marzuqi', 'L', 'Desa Besito Kauman Rt 06 Rw 03', '081226659969', 'Cipta Rasa Abadi', 'Emping Jagung', 'MG0002', 'P0002_ft_ahmad.jpg', 'P0002_tdi_TDP1.JPG', 'ahmad', 'ahmad', 'diterima', 'PER0001'),
('P0003', '9234729837489723', 'Candrasari Ida P', 'P', 'Tenggeles Rt 01 Rw 05', '085729016844', 'Chantiqa', 'Makanan Basah/Kering', 'MG0002', 'P0003_ft_candrasari.jpg', 'P0003_tdi_tdp2.jpg', 'candra', 'candra', 'diterima', 'PER0001'),
('P0004', '6327472539469263', 'Eko Dewi Susiana', 'L', 'Loram Wetan Rt 04 Rw 05', '085326232334', 'DW', 'MINUMAN', 'MG0002', 'P0004_ft_EKO.jpg', 'P0004_tdi_tdi4.jpg', 'eko', 'eko', 'diterima', 'PER0001'),
('P0005', '4184572354986230', 'Elsya Vera Indraswati', 'P', 'Japan Rt 02 Rw 03 Dawe Kudus', '085200494289', 'ASSIRY ART', 'Kaligrafi', 'MG0002', 'P0005_ft_elsya.jpg', 'P0005_tdi_TDI5.jpg', 'elsya', 'elsya', 'diterima', 'PER0001'),
('P0006', '6912639818368912', 'Endang Herawati', 'P', 'Klaling Rt 03 Rw 02 Jekulo Kud', '08122617276', 'FAEN', 'Tas', 'MG0002', 'P0006_ft_endang.jpg', 'P0006_tdi_TDI6.jpg', 'endang', 'endang', 'diterima', 'PER0001'),
('P0007', '7093278478623984', 'Loviana', 'P', 'Jepang Pakis Rt 01 Rw 06 Kudus', '081298026402', 'LOVE', 'Singkong', 'MG0002', 'P0007_ft_loviana.jpg', 'P0007_tdi_TDI8.jpg', 'loviana', 'loviana', 'calon', 'PER0001'),
('P0008', '7797864534542452', 'Siti Kholidah', 'P', 'Karang Bener Rt 04 Rw 04 Bae K', '085325484733', 'CHOLIEQ', 'Madumongso dan Keciput', 'MG0003', 'P0008_ft_siti.jpg', 'P0008_tdi_TDI9.jpg', 'siti', 'siti', 'diterima', 'PER0001'),
('P0009', '7986785646753457', 'Nur Hayati', 'P', 'Bulung Cangkring Rt 03 Rw 03', '082325459964', 'ELSANA', 'STIK, KUKIS LABU', 'MG0003', 'P0009_ft_nur.jpg', 'P0009_tdi_TDI10.jpg', 'nurhayati', 'nurhayati', 'diterima', 'PER0001'),
('P0010', '7578447348759757', 'Dwi Maryaningsih', 'P', 'Purwosari No 618 Rt 01 Rw 06', '085713854455', 'MI-MAY', 'Keripik Singkong', 'MG0003', 'P0010_ft_dwi.jpg', 'P0010_tdi_TDI11.jpg', 'dwi', 'dwi', 'diterima', 'PER0001'),
('P0011', '4766468467475356', 'B.M. IQBAL', 'L', 'Bulung Cangkring Rt 02 Rw 07', '081372792799', 'UKKIMILK', 'Olahan Minuman dan makanan', 'MG0003', 'P0011_ft_bmiqbal.jpg', 'P0011_tdi_TDI10.jpg', 'iqbal', 'iqbal', 'calon', 'PER0001'),
('P0012', '3896895696435763', 'Okvianti W', 'P', 'Loram Wetan Rt 03 Rw 04', '081390024332', 'FA-FAN', 'Stick Aneka Rasa', 'MG0003', 'P0012_ft_okvianti.jpg', 'P0012_tdi_TDI5.jpg', 'okvianti', 'okvianti', 'calon', 'PER0001'),
('P0013', '8932645763496593', 'Ariyanto Wicaksono', 'L', 'Perum Megawon Indah No 34 Kudu', '081317369238', 'Telur Asin AW', 'Telur Asin', 'MG0003', 'P0013_ft_ariyanto.jpg', 'P0013_tdi_TDI10.jpg', 'ariyanto', 'ariyanto', 'ditolak', 'PER0001'),
('P0014', '4766647646453536', 'Evi Juvia', 'P', 'Ngembalrejo Rt 07 Rw 02', '089634746238', 'Ayam Broiler Kudus', 'Ayam Broiler', 'MG0002', 'P0014_ft_normi.jpg', 'P0014_tdi_TDI10.jpg', 'evi', 'evi', 'ditolak', 'PER0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendamping`
--

CREATE TABLE IF NOT EXISTS `tb_pendamping` (
  `id_pendamping` varchar(10) NOT NULL,
  `nik` varchar(12) NOT NULL,
  `nama_pendamping` varchar(30) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendamping`
--

INSERT INTO `tb_pendamping` (`id_pendamping`, `nik`, `nama_pendamping`, `jekel`, `alamat`, `no_hp`, `foto`) VALUES
('PB0001', '788027023821', 'Ahmad Dahlan,ST', 'L', 'Semarang', '071240149732', 'ahmad_damping.jpg'),
('PB0002', '478927489237', 'Leni Anggreani', 'P', 'Gebog Kudus', '081467829874', 'P0001_ft_Peserta_ (60).jpg'),
('PB0003', '785487348234', 'Lukman', 'L', 'desa dersalam', '089345678999', 'P0008_ft_Peserta_ (53).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode`
--

CREATE TABLE IF NOT EXISTS `tb_periode` (
  `id_periode` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `tahun`, `tgl_mulai`, `tgl_selesai`) VALUES
('PER0001', 2018, '2018-11-26', '2018-11-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(20) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `status` enum('petugas','kabid','kadin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik`, `nama`, `jekel`, `alamat`, `no_hp`, `username`, `password`, `foto`, `status`) VALUES
('U0001', '199524040001', 'Fita Choiyanti', 'P', 'Kudus', '089345956025', 'fita', 'fita', 'img048.jpg', 'petugas'),
('U0002', '196006091986071001', 'BAMBANG TRI WALUYO, S.H', 'L', 'Jati Kulon', '085276385936', 'kadin', 'kadin', 'U0002_kadin.jpg', 'kadin'),
('U0003', '197012141998031003', 'Drs. ADI SUMARNO', 'L', 'Undaan Kidul', '085640128537', 'kabid', 'kabid', 'kabid.jpg', 'kabid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenispelatihan`
--
ALTER TABLE `tb_jenispelatihan`
  ADD PRIMARY KEY (`id_jenispelatihan`),
  ADD KEY `nama_magang` (`nama_pelatihan`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`id_hadir`),
  ADD KEY `id_pelatihan` (`id_pelatihan`),
  ADD KEY `id_pemagangan` (`id_pelatihan`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`),
  ADD KEY `id_magang` (`id_jenispelatihan`),
  ADD KEY `id_pembimbing` (`id_pendamping`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_periode_2` (`id_periode`),
  ADD KEY `id_pelatihan` (`id_pelatihan`);

--
-- Indexes for table `tb_pendamping`
--
ALTER TABLE `tb_pendamping`
  ADD PRIMARY KEY (`id_pendamping`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`id_periode`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_periode_2` (`id_periode`),
  ADD KEY `id_periode_3` (`id_periode`),
  ADD KEY `id_periode_4` (`id_periode`),
  ADD KEY `id_periode_5` (`id_periode`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `id_hadir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD CONSTRAINT `tb_kehadiran_ibfk_4` FOREIGN KEY (`id_pelatihan`) REFERENCES `tb_pelatihan` (`id_pelatihan`),
  ADD CONSTRAINT `tb_kehadiran_ibfk_5` FOREIGN KEY (`id_peserta`) REFERENCES `tb_pendaftaran` (`id_peserta`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
  ADD CONSTRAINT `tb_pelatihan_ibfk_1` FOREIGN KEY (`id_pendamping`) REFERENCES `tb_pendamping` (`id_pendamping`),
  ADD CONSTRAINT `tb_pelatihan_ibfk_3` FOREIGN KEY (`id_jenispelatihan`) REFERENCES `tb_jenispelatihan` (`id_jenispelatihan`);

--
-- Ketidakleluasaan untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `tb_pendaftaran_ibfk_4` FOREIGN KEY (`id_periode`) REFERENCES `tb_periode` (`id_periode`),
  ADD CONSTRAINT `tb_pendaftaran_ibfk_5` FOREIGN KEY (`id_pelatihan`) REFERENCES `tb_pelatihan` (`id_pelatihan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
