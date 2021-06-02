-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2021 pada 03.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `early_warning_system`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `ID` int(11) NOT NULL,
  `ID_Users` int(11) DEFAULT NULL,
  `No_Dokumen` varchar(100) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `ID_Kategori` int(11) DEFAULT NULL,
  `Pihak_Terkait` varchar(100) DEFAULT NULL,
  `Tanggal_Awal` date DEFAULT NULL,
  `Tanggal_Akhir` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Lampiran` varchar(100) DEFAULT NULL,
  `Status_Month` int(1) DEFAULT NULL,
  `Status_Week` int(1) DEFAULT NULL,
  `Status_Today` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`ID`, `ID_Users`, `No_Dokumen`, `Deskripsi`, `ID_Kategori`, `Pihak_Terkait`, `Tanggal_Awal`, `Tanggal_Akhir`, `Email`, `Lampiran`, `Status_Month`, `Status_Week`, `Status_Today`) VALUES
(4, 3, '12345678', 'Penting', 1, 'Riza', '2021-06-01', '2021-07-01', 'rizailhamsyah28@gmail.com', '', NULL, NULL, NULL),
(6, 3, '987654321', 'Penting', 1, 'Riza', '2021-06-01', '2021-06-08', 'rizailhamsyah28@gmail.com', 'b20b2a1d7e15db8caf83fb813eb358e2.pdf', NULL, 1, NULL),
(7, 3, '54321', 'Hehe', 2, 'Riza Ilhamsyah', '2021-06-01', '2021-06-02', 'rizailhamsyah28@gmail.com', NULL, NULL, NULL, 1),
(8, NULL, '8989898989', 'Hehe', 2, 'Riza Ilhamsyah', '2021-05-17', '2021-05-26', 'rizailhamsyah28@gmail.com', NULL, NULL, NULL, NULL),
(10, 18, '2021/12/sk/1', 'Penting', 1, 'Riza Ilhamsyah', '2021-06-01', '2021-07-02', 'rizailhamsyah021@gmail.com', '5f9c336e744b372b21b7fbc006bda989.pdf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ID` int(11) NOT NULL,
  `Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`ID`, `Kategori`) VALUES
(1, 'Personal'),
(2, 'Company');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_log`
--

CREATE TABLE `tb_log` (
  `ID` varchar(15) NOT NULL,
  `Tanggal_Waktu` datetime DEFAULT NULL,
  `Aktivitas` text DEFAULT NULL,
  `User` varchar(100) DEFAULT NULL,
  `Sistem_Operasi` varchar(100) DEFAULT NULL,
  `Aplikasi` varchar(100) DEFAULT NULL,
  `IP_Address` varchar(100) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_log`
--

INSERT INTO `tb_log` (`ID`, `Tanggal_Waktu`, `Aktivitas`, `User`, `Sistem_Operasi`, `Aplikasi`, `IP_Address`, `Status`) VALUES
('LOG202100000004', '2021-04-28 08:56:09', 'Data user atas nama Riza Ilhamsyah berhasil ditambahkan', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000005', '2021-04-28 13:57:30', 'Data user atas nama Riza Ilhamsyah berhasil dihapus', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000006', '2021-04-28 14:08:35', 'Data user atas nama Riza Ilhamsyah berhasil ditambahkan', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000007', '2021-04-28 14:08:52', 'Data user atas nama Riza Ilhamsyah berhasil direset', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000008', '2021-04-28 14:10:28', 'Data user atas nama Riza Ilhamsyah 2 berhasil diubah', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000009', '2021-04-28 14:43:22', 'Data user atas nama Riza Ilhamsyah 2 berhasil dihapus', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000010', '2021-04-29 07:58:12', 'Data user atas nama Admin berhasil direset', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000011', '2021-04-29 08:21:13', 'Data user atas nama Admin Dokumen berhasil diubah', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000012', '2021-04-29 08:21:27', 'Data user atas nama User berhasil diubah', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000013', '2021-04-29 08:42:23', 'Username user berhasil logout', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000014', '2021-04-29 08:42:46', 'Username asdasdas gagal login, karena username / password salah', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000015', '2021-04-29 08:43:10', 'Username superadmin gagal login, karena username tersebut tidak aktif', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000016', '2021-04-29 08:43:35', 'Username superadmin berhasil login', '', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000017', '2021-04-29 08:51:01', 'Data user atas nama Riza Ilhamsyah berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000018', '2021-04-29 08:51:20', 'Data user atas nama Riza Ilhamsyah berhasil direset', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000019', '2021-04-29 08:51:26', 'Data user atas nama Riza Ilhamsyah 2 berhasil diubah', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000020', '2021-04-29 08:51:31', 'Data user atas nama Riza Ilhamsyah 2 berhasil dihapus', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000021', '2021-04-29 10:55:56', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000022', '2021-04-29 13:36:11', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000023', '2021-04-29 13:37:51', 'Username  berhasil logout', NULL, 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000024', '2021-04-29 13:38:02', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000025', '2021-04-29 13:39:26', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000026', '2021-04-29 13:42:03', 'Username  berhasil logout', NULL, 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000027', '2021-04-30 10:17:42', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000028', '2021-04-30 10:42:50', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000029', '2021-04-30 10:42:57', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000030', '2021-04-30 10:43:02', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000031', '2021-04-30 10:43:08', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000032', '2021-04-30 10:43:18', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000033', '2021-04-30 11:16:38', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000034', '2021-04-30 11:17:53', 'Username admindokumen berhasil login', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000035', '2021-04-30 11:18:31', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000036', '2021-04-30 11:18:49', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000037', '2021-04-30 11:20:31', 'Username admindokumen berhasil login', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000038', '2021-04-30 11:20:49', 'Username admindokumen berhasil logout', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000039', '2021-04-30 11:21:00', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000040', '2021-04-30 11:22:02', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000041', '2021-04-30 11:22:06', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000042', '2021-04-30 12:28:18', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000043', '2021-04-30 12:33:49', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000044', '2021-05-02 12:36:56', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000045', '2021-05-02 12:37:02', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000046', '2021-05-02 12:37:08', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000047', '2021-05-02 12:37:13', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000048', '2021-05-03 15:21:39', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000049', '2021-05-03 15:22:14', 'Kategori Personal berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000050', '2021-05-03 15:22:30', 'Kategori Company berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000051', '2021-05-03 15:38:07', 'Kategori Test berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000052', '2021-05-03 15:38:11', 'Kategori Test2 berhasil diubah', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000053', '2021-05-03 15:38:14', 'Kategori  berhasil dihapus', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000054', '2021-05-03 15:39:50', 'Kategori Test berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000055', '2021-05-03 15:39:52', 'Kategori Test berhasil dihapus', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000056', '2021-05-03 15:59:17', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000057', '2021-05-03 15:59:21', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000058', '2021-05-03 15:59:31', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000059', '2021-05-03 15:59:41', 'Username admindokumen berhasil login', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000060', '2021-05-04 14:42:13', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000061', '2021-05-04 14:42:22', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000062', '2021-05-04 14:42:26', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000063', '2021-05-05 08:16:09', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000064', '2021-05-05 09:16:09', 'Data dokumen dengan nomor dokumen 12345678 berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000065', '2021-05-05 10:26:52', 'Data dokumen dengan nomor dokumen 987654321 berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000066', '2021-05-05 10:30:08', 'Data dokumen dengan nomor dokumen 987654321 berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000067', '2021-05-05 10:37:42', 'Data dokumen dengan nomor dokumen 12345678 berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000068', '2021-05-05 10:38:10', 'Data dokumen dengan nomor dokumen 8765432 berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000069', '2021-05-05 10:38:17', 'Data dokumen dengan nomor dokumen 8765432 berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000070', '2021-05-05 10:39:39', 'Data dokumen dengan nomor dokumen 12345678 berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000071', '2021-05-05 11:09:03', 'Data dokumen dengan nomor dokumen 12345678 berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000072', '2021-05-05 11:12:11', 'Data dokumen dengan nomor dokumen 12345678 berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000073', '2021-05-05 11:14:11', 'Data reminder dengan email rizailhamsyah021@gmail.com berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000074', '2021-05-05 12:00:42', 'Data reminder dengan email rizailhamsyah021@gmail.com berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000075', '2021-05-05 12:05:04', 'Data reminder dengan email rizailhamsyah021@gmail.com berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000076', '2021-05-05 12:05:18', 'Data reminder dengen email rizailhamsyah@gmail.com berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000077', '2021-05-05 12:05:24', 'Data reminder dengan email rizailhamsyah@gmail.com berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000078', '2021-05-05 12:11:19', 'Data reminder dengan email rizailhamsyah021@gmail.com berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000079', '2021-05-05 12:11:32', 'Data reminder dengen email rizailhamsyah@gmail.com berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000080', '2021-05-05 12:11:37', 'Data reminder dengan email rizailhamsyah@gmail.com berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000081', '2021-05-05 12:15:40', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000082', '2021-05-05 12:15:49', 'Username admindokumen berhasil login', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000083', '2021-05-05 12:15:59', 'Data reminder dengan email rizailhamsyah021@gmail.com berhasil ditambahkan', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000084', '2021-05-05 12:16:12', 'Data reminder dengen email rizailhamsyah@gmail.com berhasil diubah', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 2),
('LOG202100000085', '2021-05-05 12:16:17', 'Data reminder dengan email rizailhamsyah@gmail.com berhasil dihapus', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 3),
('LOG202100000086', '2021-05-05 12:18:50', 'Username admindokumen berhasil logout', 'admindokumen', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000087', '2021-05-05 12:18:55', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000088', '2021-05-05 12:19:21', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000089', '2021-05-06 09:20:45', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.93', '::1', 1),
('LOG202100000090', '2021-05-17 10:08:45', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000091', '2021-05-17 10:42:30', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000092', '2021-05-17 10:42:35', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000093', '2021-05-17 10:42:38', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000094', '2021-05-17 10:42:44', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000095', '2021-05-17 10:42:57', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000096', '2021-05-17 10:43:01', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000097', '2021-05-17 10:43:06', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000098', '2021-05-17 10:43:10', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000099', '2021-05-17 10:43:14', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000100', '2021-05-17 10:43:17', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000101', '2021-05-17 10:43:21', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000102', '2021-05-17 10:43:25', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000103', '2021-05-17 10:43:29', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000104', '2021-05-17 10:43:33', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000105', '2021-05-17 10:43:36', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000106', '2021-05-17 10:43:41', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000107', '2021-05-17 20:26:45', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000108', '2021-05-18 06:54:05', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000109', '2021-05-18 07:20:09', 'Data reminder dengan email  berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000110', '2021-05-18 07:22:23', 'Data reminder dengen email  berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 2),
('LOG202100000111', '2021-05-18 07:27:17', 'Data reminder berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000112', '2021-05-18 07:27:28', 'Data reminder berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000113', '2021-05-18 07:37:19', 'Data dokumen dengan nomor dokumen 12345678 berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 2),
('LOG202100000114', '2021-05-18 07:37:38', 'Data dokumen dengan nomor dokumen 987654321 berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 2),
('LOG202100000115', '2021-05-18 07:38:56', 'Data dokumen dengan nomor dokumen 12345678 berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 2),
('LOG202100000116', '2021-05-18 07:39:04', 'Data dokumen dengan nomor dokumen 987654321 berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 2),
('LOG202100000117', '2021-05-18 07:40:30', 'Data reminder berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000118', '2021-05-18 07:41:13', 'Data reminder berhasil diubah', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 2),
('LOG202100000119', '2021-05-18 08:01:14', '3 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 2),
('LOG202100000120', '2021-05-18 08:01:50', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000121', '2021-05-18 08:01:56', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000122', '2021-05-18 08:03:06', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000123', '2021-05-18 08:03:12', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000124', '2021-05-18 08:03:51', '2 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000125', '2021-05-18 08:04:26', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000126', '2021-05-18 08:04:32', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000127', '2021-05-18 08:08:23', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000128', '2021-05-18 08:08:31', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000129', '2021-05-18 08:08:51', 'Username user berhasil export data dokumen', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000130', '2021-05-18 08:10:32', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000131', '2021-05-18 08:10:36', 'Username user berhasil export data dokumen pada tanggal2021-05-18', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000132', '2021-05-18 08:11:14', 'Username user berhasil export data dokumen pada tanggal 18-05-2021', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000133', '2021-05-18 08:11:55', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000134', '2021-05-18 08:12:03', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000135', '2021-05-18 08:12:27', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000136', '2021-05-18 08:12:40', 'Username \'=\'\'or\' gagal login, karena username / password salah', 'None', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000137', '2021-05-18 08:13:32', 'Username \" or \"\"=\" gagal login, karena username / password salah', 'None', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000138', '2021-05-18 08:35:16', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000139', '2021-05-19 07:43:46', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000140', '2021-05-19 08:01:23', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000141', '2021-05-19 08:01:28', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000142', '2021-05-19 10:48:35', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000143', '2021-05-19 10:48:44', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000144', '2021-05-19 11:13:57', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000145', '2021-05-19 11:14:02', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000146', '2021-05-19 11:14:40', 'Data dokumen dengan nomor dokumen 8472364724 berhasil ditambahkan', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000147', '2021-05-19 11:15:07', 'Data dokumen dengan nomor dokumen 8472364724 berhasil dihapus', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000148', '2021-05-19 11:19:00', 'Username user berhasil export data dokumen pada tanggal 19-05-2021', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000149', '2021-05-19 11:20:51', 'Username user berhasil export data dokumen pada tanggal 19-05-2021', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000150', '2021-05-19 11:22:00', 'Username user berhasil export data dokumen pada tanggal 19-05-2021', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000151', '2021-05-19 12:23:47', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000152', '2021-05-19 12:23:53', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000153', '2021-05-19 12:37:19', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000154', '2021-05-19 12:38:14', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000155', '2021-05-19 12:38:41', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000156', '2021-05-19 12:38:50', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000157', '2021-05-19 12:48:39', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000158', '2021-05-19 12:48:46', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000159', '2021-05-19 12:48:56', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000160', '2021-05-19 12:49:00', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000161', '2021-05-19 13:06:16', 'Username user berhasil logout', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000162', '2021-05-19 13:06:23', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000163', '2021-05-19 13:15:25', 'Username superadmin berhasil logout', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000164', '2021-05-20 05:05:28', 'Username superadmin berhasil login', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000165', '2021-05-20 05:06:06', 'Kategori <script>alert(\"Riza Ilhamsyah\");</script> berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000166', '2021-05-20 05:06:16', 'Kategori <script>alert(\"Riza Ilhamsyah\");</script> berhasil dihapus', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000167', '2021-05-20 05:16:53', 'Kategori [removed]alert&#40;\"Riza Ilhamsyah\"&#41;;[removed] berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000168', '2021-05-20 05:17:11', 'Kategori [removed]alert&#40;\"Riza Ilhamsyah\"&#41;;[removed] berhasil ditambahkan', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000169', '2021-05-20 05:17:18', 'Kategori [removed]alert&#40;\"Riza Ilhamsyah\"&#41;;[removed] berhasil dihapus', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000170', '2021-05-20 05:17:22', 'Kategori [removed]alert&#40;\"Riza Ilhamsyah\"&#41;;[removed] berhasil dihapus', 'superadmin', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 3),
('LOG202100000171', '2021-05-26 09:47:25', 'Data user atas nama  berhasil ditambahkan', NULL, 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000172', '2021-05-26 09:49:58', 'Data user atas nama Tono Sartono berhasil ditambahkan', NULL, 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000173', '2021-05-26 09:50:29', 'Username 3082625 berhasil login', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000174', '2021-05-26 09:51:59', 'Username 3082625 berhasil logout', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000175', '2021-05-26 10:47:05', 'Data user atas nama Tono Sartono berhasil diregistrasi', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000176', '2021-05-26 10:47:22', 'Username 3082625 berhasil login', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000177', '2021-05-26 11:45:19', 'Username 3082625 berhasil logout', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000178', '2021-05-27 17:09:23', 'Data user atas nama Tono Sartono berhasil diregistrasi', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000179', '2021-05-28 10:24:27', 'Username 3082625 berhasil login', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000180', '2021-05-28 10:25:49', 'Data dokumen dengan nomor dokumen 2021/12/sk/1 berhasil ditambahkan', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000181', '2021-05-28 10:26:05', 'Data reminder berhasil ditambahkan', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000182', '2021-05-28 10:27:28', '1 Reminder berhasil dikirim ke email', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000183', '2021-05-28 10:29:03', '1 Reminder berhasil dikirim ke email', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000184', '2021-05-28 10:30:19', '1 Reminder berhasil dikirim ke email', '3082625', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000185', '2021-06-01 08:06:41', 'Username user berhasil login', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000186', '2021-06-01 08:07:17', '1 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000187', '2021-06-01 08:07:17', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000188', '2021-06-01 08:07:23', '1 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000189', '2021-06-01 08:07:28', '1 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000190', '2021-06-01 08:09:31', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000191', '2021-06-01 08:09:31', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000192', '2021-06-01 08:09:31', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000193', '2021-06-01 08:09:32', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000194', '2021-06-01 08:16:18', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000195', '2021-06-01 08:16:18', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000196', '2021-06-01 08:16:18', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000197', '2021-06-01 08:16:18', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000198', '2021-06-01 08:22:45', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000199', '2021-06-01 08:22:45', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000200', '2021-06-01 08:22:45', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000201', '2021-06-01 08:22:45', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000202', '2021-06-01 08:23:25', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000203', '2021-06-01 08:23:31', '1 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000204', '2021-06-01 08:23:31', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1),
('LOG202100000205', '2021-06-01 08:23:31', '0 Reminder berhasil dikirim ke email', 'user', 'Windows 10', 'Chrome 90.0.4430.212', '::1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reminder`
--

CREATE TABLE `tb_reminder` (
  `ID_Reminder` int(11) NOT NULL,
  `ID_Dokumen` int(11) NOT NULL,
  `ID_Users` int(11) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_reminder`
--

INSERT INTO `tb_reminder` (`ID_Reminder`, `ID_Dokumen`, `ID_Users`, `Tanggal`, `Status`) VALUES
(5, 4, 3, '2021-06-01', 1),
(7, 6, 3, '2021-05-17', NULL),
(9, 4, NULL, '2021-05-19', 1),
(10, 10, 18, '2021-05-28', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Role` int(1) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`ID`, `Nama`, `Email`, `Username`, `Password`, `Role`, `Status`) VALUES
(2, 'Super Admin', 'superadmin@pupukkujang.com', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 1, 1),
(3, 'User', 'user@pupukkujang.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 1),
(18, 'Tono Sartono', '3082625@pkc.com', '3082625', 'e07c18028f9430948b7ed482d64a4207', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Kategori` (`ID_Kategori`),
  ADD KEY `ID_Users` (`ID_Users`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_reminder`
--
ALTER TABLE `tb_reminder`
  ADD PRIMARY KEY (`ID_Reminder`),
  ADD KEY `ID_Dokumen` (`ID_Dokumen`),
  ADD KEY `ID_Users` (`ID_Users`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_reminder`
--
ALTER TABLE `tb_reminder`
  MODIFY `ID_Reminder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD CONSTRAINT `tb_dokumen_ibfk_1` FOREIGN KEY (`ID_Kategori`) REFERENCES `tb_kategori` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_dokumen_ibfk_2` FOREIGN KEY (`ID_Users`) REFERENCES `tb_users` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_reminder`
--
ALTER TABLE `tb_reminder`
  ADD CONSTRAINT `tb_reminder_ibfk_1` FOREIGN KEY (`ID_Dokumen`) REFERENCES `tb_dokumen` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_reminder_ibfk_2` FOREIGN KEY (`ID_Users`) REFERENCES `tb_users` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
