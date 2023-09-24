-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jul 2023 pada 15.43
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_kuesioner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_status`) VALUES
(1, 'Samsul Bahri S.T', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'Pimpinan', 'pimpinan', '827ccb0eea8a706c4c34a16891f84e7b', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `jawaban_id` int NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `jawaban_pertanyaan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `masyarakat_id` int NOT NULL,
  `masyarakat_nama` varchar(50) NOT NULL,
  `masyarakat_email` varchar(50) NOT NULL,
  `masyarakat_jk` enum('L','P') NOT NULL,
  `masyarakat_pendidikan` enum('SD','SMP','SMA','D3 / D4','S1','S2','S3') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `masyarakat_pekerjaan` enum('PNS','POLRI','TNI','SWASTA','WIRAUSAHA','LAINNYA') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`masyarakat_id`, `masyarakat_nama`, `masyarakat_email`, `masyarakat_jk`, `masyarakat_pendidikan`, `masyarakat_pekerjaan`, `petugas`, `status`) VALUES
(141, 'kimochie', 'ari@gmail.comsq', 'L', 'SMA', 'SWASTA', 'In dolorem explicabo', '2'),
(142, 'err', 'asasasasasaqqqdad@gmail.comdsdsd', 'L', 'S1', 'SWASTA', 'Yanti', '2'),
(143, 'Jono', 'jono@gmail.com', 'L', 'S1', 'SWASTA', 'Yanti', '2'),
(144, 'yani', 'yani@gmail', 'P', 'S1', 'WIRAUSAHA', 'Yanti', '2'),
(145, 'Icha', 'Icha@gmail.com', 'L', 'S1', 'PNS', 'Yanti', '2'),
(146, 'Alki', 'alki@gmail.com', 'P', 'S1', 'LAINNYA', 'Yanti', '2'),
(147, 'Josep', 'josep@gmail.com', 'L', 'S1', 'TNI', 'Yanti', '2'),
(148, 'Dignissimos omnis in', 'jiqyryv@mailinator.com', 'P', 'S3', 'TNI', 'Yanti', '2'),
(149, 'Omnis laborum Eum t', 'qunetyt@mailinator.com', 'P', 'SMP', 'SWASTA', 'Yanti', '2'),
(150, 'Deleniti doloribus a', 'qizotereh@mailinator.com', 'P', 'SD', 'TNI', 'Yanti', '2'),
(151, 'Aliquip obcaecati eu', 'nufuheny@mailinator.com', 'L', 'S1', 'WIRAUSAHA', 'Yanti', '2'),
(152, 'Praesentium nulla re', 'xebytavu@mailinator.com', 'P', 'D3 / D4', 'WIRAUSAHA', 'Yanti', '2'),
(153, 'Adipisci ex voluptat', 'xevaj@mailinator.com', 'L', 'S1', 'WIRAUSAHA', 'Yanti', '2'),
(154, 'Optio aliquid conse', 'tifegidu@mailinator.com', 'L', 'S1', 'PNS', 'Yanti', '2'),
(155, 'Alias aliquid dolor ', 'huwykomox@mailinator.com', 'P', 'S3', 'SWASTA', 'Yanti', '2'),
(156, 'Totam blanditiis acc', 'rukel@mailinator.com', 'L', 'S2', 'TNI', 'Yanti', '2'),
(157, 'Cillum repellendus ', 'nerewimivo@mailinator.com', 'P', 'SMA', 'LAINNYA', 'Yanti', '2'),
(158, 'Veritatis deserunt e', 'dyxu@mailinator.com', 'P', 'S1', 'SWASTA', 'Yanti', '2'),
(159, 'Commodo excepturi ut', 'gugomu@mailinator.com', 'L', 'SMA', 'POLRI', 'Yanti', '2'),
(160, 'Natus sed odit vitae', 'powuguz@mailinator.com', 'P', 'SD', 'TNI', 'Yanti', '2'),
(161, 'Ducimus minima dolo', 'dipezabiw@mailinator.com', 'P', 'SMA', 'POLRI', 'Yanti', '2'),
(162, 'Labore voluptate rer', 'jozi@mailinator.com', 'P', 'SD', 'PNS', 'In dolorem explicabo', '2'),
(163, 'Officiis sunt fugiat', 'dihexanux@mailinator.com', 'P', 'SMP', 'WIRAUSAHA', 'In dolorem explicabo', '2'),
(164, 'Unde aut laboriosam', 'zenodima@mailinator.com', 'L', 'S1', 'LAINNYA', 'In dolorem explicabo', '2'),
(165, 'Lorem placeat volup', 'pyroc@mailinator.com', 'P', 'D3 / D4', 'SWASTA', 'In dolorem explicabo', '2'),
(166, 'Incididunt sunt fug', 'myhumepoli@mailinator.com', 'P', 'D3 / D4', 'PNS', 'In dolorem explicabo', '2'),
(167, 'Quo recusandae Sunt', 'piwibazyfa@mailinator.com', 'L', 'S3', 'PNS', 'In dolorem explicabo', '2'),
(168, 'Qui ut cupidatat occ', 'rupolu@mailinator.com', 'L', 'S2', 'TNI', 'In dolorem explicabo', '2'),
(169, 'Consequat Dolor dol', 'zyhij@mailinator.com', 'P', 'SMP', 'LAINNYA', 'In dolorem explicabo', '2'),
(170, 'Sunt consequat Off', 'wunyvirif@mailinator.com', 'P', 'S3', 'LAINNYA', 'In dolorem explicabo', '2'),
(171, 'Nobis et sed sunt si', 'cifydux@mailinator.com', 'L', 'SMA', 'PNS', 'In dolorem explicabo', '2'),
(172, 'Maxime autem et debi', 'nobare@mailinator.com', 'L', 'SMA', 'LAINNYA', 'In dolorem explicabo', '2'),
(173, 'Provident et aut te', 'dyhujeq@mailinator.com', 'P', 'S1', 'LAINNYA', 'In dolorem explicabo', '2'),
(174, 'Et unde labore solut', 'xyvo@mailinator.com', 'L', 'SMP', 'WIRAUSAHA', 'In dolorem explicabo', '2'),
(175, 'Amet earum quos eu ', 'memum@mailinator.com', 'P', 'SD', 'TNI', 'In dolorem explicabo', '2'),
(176, 'Eos nihil odit amet', 'bexapel@mailinator.com', 'P', 'S3', 'POLRI', 'In dolorem explicabo', '2'),
(177, 'Rerum iste minima au', 'hyxukijajy@mailinator.com', 'L', 'D3 / D4', 'SWASTA', 'In dolorem explicabo', '2'),
(178, 'Eveniet qui sint ut', 'woxohow@mailinator.com', 'L', 'S3', 'PNS', 'In dolorem explicabo', '2'),
(179, 'Culpa ea omnis dese', 'jycyvyfypa@mailinator.com', 'P', 'SD', 'POLRI', 'In dolorem explicabo', '2'),
(180, 'Ullamco molestiae te', 'fugu@mailinator.com', 'L', 'S3', 'SWASTA', 'In dolorem explicabo', '2'),
(181, 'Nulla nisi excepteur', 'rudip@mailinator.com', 'L', 'SMA', 'PNS', 'Zangib', '2'),
(182, 'Aut sunt non qui vo', 'tyqogif@mailinator.com', 'L', 'SMA', 'SWASTA', 'Zangib', '2'),
(183, 'Enim aut aliqua Odi', 'nijam@mailinator.com', 'P', 'SD', 'TNI', 'Zangib', '2'),
(184, 'Explicabo Quae et e', 'gyzop@mailinator.com', 'L', 'S3', 'POLRI', 'Zangib', '2'),
(185, 'Non debitis quam dol', 'lejony@mailinator.com', 'L', 'SMP', 'LAINNYA', 'Zangib', '2'),
(186, 'Consequatur Delenit', 'cysud@mailinator.com', 'L', 'S2', 'PNS', 'Zangib', '2'),
(187, 'Et ut excepteur est ', 'jabewyr@mailinator.com', 'L', 'S1', 'LAINNYA', 'Zangib', '2'),
(188, 'Nisi sint esse prae', 'nokarowi@mailinator.com', 'P', 'S2', 'POLRI', 'Zangib', '2'),
(189, 'Qui nemo molestiae q', 'xucymu@mailinator.com', 'P', 'S3', 'SWASTA', 'Zangib', '2'),
(190, 'Hic totam quae disti', 'vetydih@mailinator.com', 'P', 'D3 / D4', 'WIRAUSAHA', 'Zangib', '2'),
(191, 'Vel est dolor magni ', 'higyjikabe@mailinator.com', 'P', 'D3 / D4', 'PNS', 'Zangib', '2'),
(192, 'Qui sunt saepe est q', 'nibuzo@mailinator.com', 'L', 'S1', 'WIRAUSAHA', 'Zangib', '2'),
(193, 'Illo sunt eum sunt ', 'wynynuce@mailinator.com', 'L', 'SMA', 'TNI', 'Zangib', '2'),
(194, 'Animi ut sint libe', 'dohema@mailinator.com', 'L', 'SD', 'POLRI', 'Zangib', '2'),
(195, 'Ut voluptatum sit e', 'zozi@mailinator.com', 'P', 'S2', 'POLRI', 'Zangib', '2'),
(196, 'Accusamus vitae offi', 'dudonoq@mailinator.com', 'P', 'S2', 'PNS', 'Zangib', '2'),
(197, 'Qui id quae tempora ', 'zipa@mailinator.com', 'L', 'SMP', 'WIRAUSAHA', 'Zangib', '2'),
(198, 'Ullam nemo fugiat et', 'mehemetoh@mailinator.com', 'L', 'SD', 'POLRI', 'Zangib', '2'),
(199, 'Qui quia molestias v', 'xulyc@mailinator.com', 'P', 'SMA', 'LAINNYA', 'Zangib', '2'),
(200, 'Nisi praesentium at ', 'fepinyziva@mailinator.com', 'P', 'S1', 'TNI', 'Zangib', '2'),
(201, 'Molestias ut consequ', 'judo@mailinator.com', 'L', 'S2', 'WIRAUSAHA', '', '1'),
(202, 'Qui fuga Eaque vel ', 'dyzywavew@mailinator.com', 'P', 'D3 / D4', 'PNS', '', '1'),
(203, 'Explicabo Officia n', 'qugyc@mailinator.com', 'P', 'S2', 'WIRAUSAHA', 'Tole', '2'),
(204, 'Dicta mollit dolor i', 'morytipoc@mailinator.com', 'L', 'S2', 'PNS', 'Tole', '2'),
(205, 'Rerum sed harum pers', 'sexysun@mailinator.com', 'P', 'SMP', 'LAINNYA', 'Tole', '2'),
(206, 'Rerum non occaecat p', 'rogy@mailinator.com', 'L', 'SD', 'WIRAUSAHA', 'Tole', '2'),
(207, 'Consectetur occaeca', 'zyzef@mailinator.com', 'L', 'SMP', 'WIRAUSAHA', 'Tole', '2'),
(208, 'Maiores voluptatem t', 'tujyrir@mailinator.com', 'L', 'SD', 'SWASTA', 'Tole', '2'),
(209, 'Adipisicing hic repr', 'nypahagub@mailinator.com', 'P', 'S3', 'TNI', 'Tole', '2'),
(210, 'Dolore iste voluptat', 'ciroji@mailinator.com', 'P', 'S2', 'PNS', 'Tole', '2'),
(211, 'Ut consequatur quia ', 'zuxy@mailinator.com', 'L', 'D3 / D4', 'SWASTA', 'Tole', '2'),
(212, 'Consequatur odio ist', 'javivuzu@mailinator.com', 'P', 'S1', 'TNI', 'Tole', '2'),
(213, 'Consectetur quia ve', 'xarupujut@mailinator.com', 'P', 'S3', 'POLRI', 'Tole', '2'),
(214, 'Nesciunt dolor mole', 'tabydybec@mailinator.com', 'L', 'SMP', 'PNS', 'Tole', '2'),
(215, 'Doloremque officia n', 'liraxorub@mailinator.com', 'L', 'SD', 'POLRI', 'Tole', '2'),
(216, 'Atque tenetur in dig', 'zuzoz@mailinator.com', 'L', 'S1', 'WIRAUSAHA', 'Tole', '2'),
(217, 'Eaque et sint in ist', 'bevewy@mailinator.com', 'P', 'S2', 'LAINNYA', 'Tole', '2'),
(218, 'Est optio obcaecati', 'lativyzez@mailinator.com', 'L', 'SMA', 'LAINNYA', 'Tole', '2'),
(219, 'Aliquip asperiores e', 'nevys@mailinator.com', 'L', 'S2', 'SWASTA', 'Tole', '2'),
(220, 'Beatae enim vel veni', 'rezofugy@mailinator.com', 'P', 'S1', 'TNI', 'Tole', '2'),
(221, 'Voluptas maiores lab', 'rakufuhij@mailinator.com', 'P', 'SMP', 'LAINNYA', 'Tole', '2'),
(222, 'Aut officia praesent', 'robibi@mailinator.com', 'L', 'S2', 'TNI', 'Tole', '2'),
(223, 'Eligendi eaque sint ', 'sacebyt@mailinator.com', 'L', 'D3 / D4', 'WIRAUSAHA', 'Tole', '2'),
(224, 'Suscipit omnis aliqu', 'bejamiqom@mailinator.com', 'L', 'SMA', 'WIRAUSAHA', '', '1'),
(225, 'Sunt accusantium ir', 'lapumori@mailinator.com', 'L', 'SMP', 'POLRI', '', '1'),
(226, 'Possimus tempore v', 'qyjikiko@mailinator.com', 'P', 'SD', 'SWASTA', 'luffy', '2'),
(227, 'yii', 'alki1@gmail.com', 'L', 'S1', 'SWASTA', '', '1'),
(228, 'Rem consectetur exc', 'rahawimo@mailinator.com', 'L', 'S2', 'POLRI', 'luffy', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_dokter`
--

CREATE TABLE `pertanyaan_dokter` (
  `pertanyaan_id` int NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `pertanyaan_dokter`
--

INSERT INTO `pertanyaan_dokter` (`pertanyaan_id`, `pertanyaan`) VALUES
(1, 'Apakah Anda mampu menyelesaikan tugas yang diberikan dengan baik?'),
(2, 'Apakah jurusan/prodi saat ini sangat sesuai dengan kemampuan yang Anda miliki?'),
(3, 'Apakah benar rata-rata mahasiswa yang telah menikah kinerjanya tidak maksimal?'),
(4, 'Apakah daya ingat Anda semakin meningkat seiring bertambah nya usia?1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_petugas`
--

CREATE TABLE `pertanyaan_petugas` (
  `pertanyaan_id` int NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `pertanyaan_petugas`
--

INSERT INTO `pertanyaan_petugas` (`pertanyaan_id`, `pertanyaan`) VALUES
(1, 'Apakah Anda mampu menyelesaikan tugas yang diberikan dengan baik?'),
(2, 'Apakah jurusan/prodi saat ini sangat sesuai dengan kemampuan yang Anda miliki?'),
(3, 'Apakah benar rata-rata mahasiswa yang telah menikah kinerjanya tidak maksimal?'),
(4, 'Apakah daya ingat Anda semakin meningkat seiring bertambah nya usia?2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int NOT NULL,
  `petugas_nama` varchar(50) NOT NULL,
  `petugas_jenis` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `petugas_jenis`) VALUES
(1, 'Habib', '2'),
(2, 'Yanti', '2'),
(3, 'Zangib', '3'),
(4, 'Tole', '4'),
(8, 'luffy', '1'),
(9, 'Iusto accusantium no', '1'),
(10, 'Quae enim aliquip cu', '3'),
(11, 'In dolorem explicabo', '1'),
(12, 'Soluta modi placeat', '2'),
(13, 'Delectus accusamus ', '2'),
(14, 'Maxime ipsam delenit', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polling_dokter`
--

CREATE TABLE `polling_dokter` (
  `polling_id` int NOT NULL,
  `polling_masyarakat` int NOT NULL,
  `polling_pertanyaan` int NOT NULL,
  `polling_jawaban` int NOT NULL,
  `polling_petugas` int NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `polling_dokter`
--

INSERT INTO `polling_dokter` (`polling_id`, `polling_masyarakat`, `polling_pertanyaan`, `polling_jawaban`, `polling_petugas`, `tgl`) VALUES
(194, 201, 1, 5, 1, '2023-07-20'),
(195, 201, 2, 4, 1, '2023-07-20'),
(196, 201, 3, 4, 1, '2023-07-20'),
(197, 201, 4, 3, 1, '2023-07-20'),
(198, 202, 1, 5, 1, '2023-07-20'),
(199, 202, 2, 4, 1, '2023-07-20'),
(200, 202, 3, 5, 1, '2023-07-20'),
(201, 202, 4, 3, 1, '2023-07-20'),
(202, 224, 1, 4, 1, '2023-07-20'),
(203, 224, 2, 5, 1, '2023-07-20'),
(204, 224, 3, 3, 1, '2023-07-20'),
(205, 224, 4, 5, 1, '2023-07-20'),
(206, 225, 1, 4, 3, '2023-07-20'),
(207, 225, 2, 3, 3, '2023-07-20'),
(208, 225, 3, 5, 3, '2023-07-20'),
(209, 225, 4, 3, 3, '2023-07-20'),
(210, 227, 1, 5, 5, '2023-07-22'),
(211, 227, 2, 3, 5, '2023-07-22'),
(212, 227, 3, 4, 5, '2023-07-22'),
(213, 227, 4, 2, 5, '2023-07-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polling_petugas`
--

CREATE TABLE `polling_petugas` (
  `polling_id` int NOT NULL,
  `polling_masyarakat` int NOT NULL,
  `polling_pertanyaan` int NOT NULL,
  `polling_jawaban` int NOT NULL,
  `polling_petugas` int NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data untuk tabel `polling_petugas`
--

INSERT INTO `polling_petugas` (`polling_id`, `polling_masyarakat`, `polling_pertanyaan`, `polling_jawaban`, `polling_petugas`, `tgl`) VALUES
(403, 141, 1, 3, 11, '2023-07-20'),
(404, 141, 2, 4, 11, '2023-07-20'),
(405, 141, 3, 2, 11, '2023-07-20'),
(406, 141, 4, 4, 11, '2023-07-20'),
(407, 142, 1, 2, 2, '2023-07-20'),
(408, 142, 2, 3, 2, '2023-07-20'),
(409, 142, 3, 4, 2, '2023-07-20'),
(410, 142, 4, 3, 2, '2023-07-20'),
(411, 143, 1, 5, 2, '2023-07-20'),
(412, 143, 2, 3, 2, '2023-07-20'),
(413, 143, 3, 4, 2, '2023-07-20'),
(414, 143, 4, 2, 2, '2023-07-20'),
(415, 144, 1, 2, 2, '2023-07-20'),
(416, 144, 2, 4, 2, '2023-07-20'),
(417, 144, 3, 3, 2, '2023-07-20'),
(418, 144, 4, 5, 2, '2023-07-20'),
(419, 145, 1, 3, 2, '2023-07-20'),
(420, 145, 2, 3, 2, '2023-07-20'),
(421, 145, 3, 3, 2, '2023-07-20'),
(422, 145, 4, 3, 2, '2023-07-20'),
(423, 146, 1, 3, 2, '2023-07-20'),
(424, 146, 2, 4, 2, '2023-07-20'),
(425, 146, 3, 5, 2, '2023-07-20'),
(426, 146, 4, 5, 2, '2023-07-20'),
(427, 147, 1, 3, 2, '2023-07-20'),
(428, 147, 2, 4, 2, '2023-07-20'),
(429, 147, 3, 2, 2, '2023-07-20'),
(430, 147, 4, 4, 2, '2023-07-20'),
(431, 148, 1, 3, 2, '2023-07-20'),
(432, 148, 2, 5, 2, '2023-07-20'),
(433, 148, 3, 3, 2, '2023-07-20'),
(434, 148, 4, 3, 2, '2023-07-20'),
(435, 149, 1, 4, 2, '2023-07-20'),
(436, 149, 2, 4, 2, '2023-07-20'),
(437, 149, 3, 4, 2, '2023-07-20'),
(438, 149, 4, 4, 2, '2023-07-20'),
(439, 150, 1, 5, 2, '2023-07-20'),
(440, 150, 2, 5, 2, '2023-07-20'),
(441, 150, 3, 5, 2, '2023-07-20'),
(442, 150, 4, 5, 2, '2023-07-20'),
(443, 151, 1, 1, 2, '2023-07-20'),
(444, 151, 2, 2, 2, '2023-07-20'),
(445, 151, 3, 3, 2, '2023-07-20'),
(446, 151, 4, 4, 2, '2023-07-20'),
(447, 152, 1, 4, 2, '2023-07-20'),
(448, 152, 2, 3, 2, '2023-07-20'),
(449, 152, 3, 4, 2, '2023-07-20'),
(450, 152, 4, 4, 2, '2023-07-20'),
(451, 153, 1, 5, 2, '2023-07-20'),
(452, 153, 2, 3, 2, '2023-07-20'),
(453, 153, 3, 5, 2, '2023-07-20'),
(454, 153, 4, 4, 2, '2023-07-20'),
(455, 154, 1, 3, 2, '2023-07-20'),
(456, 154, 2, 4, 2, '2023-07-20'),
(457, 154, 3, 2, 2, '2023-07-20'),
(458, 154, 4, 3, 2, '2023-07-20'),
(459, 155, 1, 4, 2, '2023-07-20'),
(460, 155, 2, 3, 2, '2023-07-20'),
(461, 155, 3, 2, 2, '2023-07-20'),
(462, 155, 4, 4, 2, '2023-07-20'),
(463, 156, 1, 4, 2, '2023-07-20'),
(464, 156, 2, 3, 2, '2023-07-20'),
(465, 156, 3, 5, 2, '2023-07-20'),
(466, 156, 4, 3, 2, '2023-07-20'),
(467, 157, 1, 3, 2, '2023-07-20'),
(468, 157, 2, 4, 2, '2023-07-20'),
(469, 157, 3, 3, 2, '2023-07-20'),
(470, 157, 4, 3, 2, '2023-07-20'),
(471, 158, 1, 5, 2, '2023-07-20'),
(472, 158, 2, 5, 2, '2023-07-20'),
(473, 158, 3, 5, 2, '2023-07-20'),
(474, 158, 4, 5, 2, '2023-07-20'),
(475, 159, 1, 3, 2, '2023-07-20'),
(476, 159, 2, 5, 2, '2023-07-20'),
(477, 159, 3, 3, 2, '2023-07-20'),
(478, 159, 4, 2, 2, '2023-07-20'),
(479, 160, 1, 4, 2, '2023-07-20'),
(480, 160, 2, 3, 2, '2023-07-20'),
(481, 160, 3, 5, 2, '2023-07-20'),
(482, 160, 4, 3, 2, '2023-07-20'),
(483, 161, 1, 2, 2, '2023-07-20'),
(484, 161, 2, 3, 2, '2023-07-20'),
(485, 161, 3, 4, 2, '2023-07-20'),
(486, 161, 4, 1, 2, '2023-07-20'),
(487, 162, 1, 1, 11, '2023-07-20'),
(488, 162, 2, 1, 11, '2023-07-20'),
(489, 162, 3, 1, 11, '2023-07-20'),
(490, 162, 4, 1, 11, '2023-07-20'),
(491, 163, 1, 1, 11, '2023-07-20'),
(492, 163, 2, 1, 11, '2023-07-20'),
(493, 163, 3, 1, 11, '2023-07-20'),
(494, 163, 4, 1, 11, '2023-07-20'),
(495, 164, 1, 1, 11, '2023-07-20'),
(496, 164, 2, 1, 11, '2023-07-20'),
(497, 164, 3, 1, 11, '2023-07-20'),
(498, 164, 4, 1, 11, '2023-07-20'),
(499, 165, 1, 1, 11, '2023-07-20'),
(500, 165, 2, 1, 11, '2023-07-20'),
(501, 165, 3, 1, 11, '2023-07-20'),
(502, 165, 4, 1, 11, '2023-07-20'),
(503, 166, 1, 1, 11, '2023-07-20'),
(504, 166, 2, 1, 11, '2023-07-20'),
(505, 166, 3, 1, 11, '2023-07-20'),
(506, 166, 4, 1, 11, '2023-07-20'),
(507, 167, 1, 1, 11, '2023-07-20'),
(508, 167, 2, 1, 11, '2023-07-20'),
(509, 167, 3, 1, 11, '2023-07-20'),
(510, 167, 4, 1, 11, '2023-07-20'),
(511, 168, 1, 1, 11, '2023-07-20'),
(512, 168, 2, 1, 11, '2023-07-20'),
(513, 168, 3, 1, 11, '2023-07-20'),
(514, 168, 4, 1, 11, '2023-07-20'),
(515, 169, 1, 1, 11, '2023-07-20'),
(516, 169, 2, 1, 11, '2023-07-20'),
(517, 169, 3, 1, 11, '2023-07-20'),
(518, 169, 4, 1, 11, '2023-07-20'),
(519, 170, 1, 1, 11, '2023-07-20'),
(520, 170, 2, 1, 11, '2023-07-20'),
(521, 170, 3, 1, 11, '2023-07-20'),
(522, 170, 4, 1, 11, '2023-07-20'),
(523, 171, 1, 1, 11, '2023-07-20'),
(524, 171, 2, 1, 11, '2023-07-20'),
(525, 171, 3, 1, 11, '2023-07-20'),
(526, 171, 4, 1, 11, '2023-07-20'),
(527, 172, 1, 1, 11, '2023-07-20'),
(528, 172, 2, 1, 11, '2023-07-20'),
(529, 172, 3, 1, 11, '2023-07-20'),
(530, 172, 4, 1, 11, '2023-07-20'),
(531, 173, 1, 1, 11, '2023-07-20'),
(532, 173, 2, 1, 11, '2023-07-20'),
(533, 173, 3, 1, 11, '2023-07-20'),
(534, 173, 4, 1, 11, '2023-07-20'),
(535, 174, 1, 1, 11, '2023-07-20'),
(536, 174, 2, 1, 11, '2023-07-20'),
(537, 174, 3, 1, 11, '2023-07-20'),
(538, 174, 4, 1, 11, '2023-07-20'),
(539, 175, 1, 1, 11, '2023-07-20'),
(540, 175, 2, 1, 11, '2023-07-20'),
(541, 175, 3, 1, 11, '2023-07-20'),
(542, 175, 4, 1, 11, '2023-07-20'),
(543, 176, 1, 1, 11, '2023-07-20'),
(544, 176, 2, 1, 11, '2023-07-20'),
(545, 176, 3, 1, 11, '2023-07-20'),
(546, 176, 4, 1, 11, '2023-07-20'),
(547, 177, 1, 1, 11, '2023-07-20'),
(548, 177, 2, 1, 11, '2023-07-20'),
(549, 177, 3, 1, 11, '2023-07-20'),
(550, 177, 4, 1, 11, '2023-07-20'),
(551, 178, 1, 1, 11, '2023-07-20'),
(552, 178, 2, 1, 11, '2023-07-20'),
(553, 178, 3, 1, 11, '2023-07-20'),
(554, 178, 4, 1, 11, '2023-07-20'),
(555, 179, 1, 1, 11, '2023-07-20'),
(556, 179, 2, 1, 11, '2023-07-20'),
(557, 179, 3, 1, 11, '2023-07-20'),
(558, 179, 4, 1, 11, '2023-07-20'),
(559, 180, 1, 1, 11, '2023-07-20'),
(560, 180, 2, 1, 11, '2023-07-20'),
(561, 180, 3, 1, 11, '2023-07-20'),
(562, 180, 4, 1, 11, '2023-07-20'),
(563, 181, 1, 5, 3, '2023-07-20'),
(564, 181, 2, 5, 3, '2023-07-20'),
(565, 181, 3, 5, 3, '2023-07-20'),
(566, 181, 4, 5, 3, '2023-07-20'),
(567, 182, 1, 5, 3, '2023-07-20'),
(568, 182, 2, 5, 3, '2023-07-20'),
(569, 182, 3, 5, 3, '2023-07-20'),
(570, 182, 4, 5, 3, '2023-07-20'),
(571, 183, 1, 5, 3, '2023-07-20'),
(572, 183, 2, 5, 3, '2023-07-20'),
(573, 183, 3, 5, 3, '2023-07-20'),
(574, 183, 4, 5, 3, '2023-07-20'),
(575, 184, 1, 5, 3, '2023-07-20'),
(576, 184, 2, 5, 3, '2023-07-20'),
(577, 184, 3, 5, 3, '2023-07-20'),
(578, 184, 4, 5, 3, '2023-07-20'),
(579, 185, 1, 5, 3, '2023-07-20'),
(580, 185, 2, 5, 3, '2023-07-20'),
(581, 185, 3, 5, 3, '2023-07-20'),
(582, 185, 4, 5, 3, '2023-07-20'),
(583, 186, 1, 5, 3, '2023-07-20'),
(584, 186, 2, 5, 3, '2023-07-20'),
(585, 186, 3, 5, 3, '2023-07-20'),
(586, 186, 4, 5, 3, '2023-07-20'),
(587, 187, 1, 5, 3, '2023-07-20'),
(588, 187, 2, 5, 3, '2023-07-20'),
(589, 187, 3, 5, 3, '2023-07-20'),
(590, 187, 4, 5, 3, '2023-07-20'),
(591, 188, 1, 5, 3, '2023-07-20'),
(592, 188, 2, 5, 3, '2023-07-20'),
(593, 188, 3, 5, 3, '2023-07-20'),
(594, 188, 4, 5, 3, '2023-07-20'),
(595, 189, 1, 5, 3, '2023-07-20'),
(596, 189, 2, 5, 3, '2023-07-20'),
(597, 189, 3, 5, 3, '2023-07-20'),
(598, 189, 4, 5, 3, '2023-07-20'),
(599, 190, 1, 5, 3, '2023-07-20'),
(600, 190, 2, 5, 3, '2023-07-20'),
(601, 190, 3, 5, 3, '2023-07-20'),
(602, 190, 4, 5, 3, '2023-07-20'),
(603, 191, 1, 5, 3, '2023-07-20'),
(604, 191, 2, 5, 3, '2023-07-20'),
(605, 191, 3, 5, 3, '2023-07-20'),
(606, 191, 4, 5, 3, '2023-07-20'),
(607, 192, 1, 5, 3, '2023-07-20'),
(608, 192, 2, 5, 3, '2023-07-20'),
(609, 192, 3, 5, 3, '2023-07-20'),
(610, 192, 4, 5, 3, '2023-07-20'),
(611, 193, 1, 5, 3, '2023-07-20'),
(612, 193, 2, 5, 3, '2023-07-20'),
(613, 193, 3, 5, 3, '2023-07-20'),
(614, 193, 4, 5, 3, '2023-07-20'),
(615, 194, 1, 5, 3, '2023-07-20'),
(616, 194, 2, 5, 3, '2023-07-20'),
(617, 194, 3, 5, 3, '2023-07-20'),
(618, 194, 4, 5, 3, '2023-07-20'),
(619, 195, 1, 5, 3, '2023-07-20'),
(620, 195, 2, 5, 3, '2023-07-20'),
(621, 195, 3, 5, 3, '2023-07-20'),
(622, 195, 4, 5, 3, '2023-07-20'),
(623, 196, 1, 5, 3, '2023-07-20'),
(624, 196, 2, 5, 3, '2023-07-20'),
(625, 196, 3, 5, 3, '2023-07-20'),
(626, 196, 4, 5, 3, '2023-07-20'),
(627, 197, 1, 5, 3, '2023-07-20'),
(628, 197, 2, 5, 3, '2023-07-20'),
(629, 197, 3, 5, 3, '2023-07-20'),
(630, 197, 4, 5, 3, '2023-07-20'),
(631, 198, 1, 5, 3, '2023-07-20'),
(632, 198, 2, 5, 3, '2023-07-20'),
(633, 198, 3, 5, 3, '2023-07-20'),
(634, 198, 4, 5, 3, '2023-07-20'),
(635, 199, 1, 5, 3, '2023-07-20'),
(636, 199, 2, 5, 3, '2023-07-20'),
(637, 199, 3, 5, 3, '2023-07-20'),
(638, 199, 4, 5, 3, '2023-07-20'),
(639, 200, 1, 5, 3, '2023-07-20'),
(640, 200, 2, 5, 3, '2023-07-20'),
(641, 200, 3, 5, 3, '2023-07-20'),
(642, 200, 4, 5, 3, '2023-07-20'),
(643, 204, 1, 5, 4, '2023-07-20'),
(644, 204, 2, 3, 4, '2023-07-20'),
(645, 204, 3, 4, 4, '2023-07-20'),
(646, 204, 4, 2, 4, '2023-07-20'),
(647, 205, 1, 4, 4, '2023-07-20'),
(648, 205, 2, 3, 4, '2023-07-20'),
(649, 205, 3, 5, 4, '2023-07-20'),
(650, 205, 4, 3, 4, '2023-07-20'),
(651, 206, 1, 3, 4, '2023-07-20'),
(652, 206, 2, 2, 4, '2023-07-20'),
(653, 206, 3, 4, 4, '2023-07-20'),
(654, 206, 4, 2, 4, '2023-07-20'),
(655, 207, 1, 3, 4, '2023-07-20'),
(656, 207, 2, 4, 4, '2023-07-20'),
(657, 207, 3, 2, 4, '2023-07-20'),
(658, 207, 4, 5, 4, '2023-07-20'),
(659, 208, 1, 3, 4, '2023-07-20'),
(660, 208, 2, 5, 4, '2023-07-20'),
(661, 208, 3, 2, 4, '2023-07-20'),
(662, 208, 4, 4, 4, '2023-07-20'),
(663, 209, 1, 3, 4, '2023-07-20'),
(664, 209, 2, 5, 4, '2023-07-20'),
(665, 209, 3, 2, 4, '2023-07-20'),
(666, 209, 4, 4, 4, '2023-07-20'),
(667, 210, 1, 3, 4, '2023-07-20'),
(668, 210, 2, 4, 4, '2023-07-20'),
(669, 210, 3, 2, 4, '2023-07-20'),
(670, 210, 4, 5, 4, '2023-07-20'),
(671, 211, 1, 3, 4, '2023-07-20'),
(672, 211, 2, 3, 4, '2023-07-20'),
(673, 211, 3, 3, 4, '2023-07-20'),
(674, 211, 4, 3, 4, '2023-07-20'),
(675, 212, 1, 2, 4, '2023-07-20'),
(676, 212, 2, 4, 4, '2023-07-20'),
(677, 212, 3, 3, 4, '2023-07-20'),
(678, 212, 4, 3, 4, '2023-07-20'),
(679, 213, 1, 5, 4, '2023-07-20'),
(680, 213, 2, 5, 4, '2023-07-20'),
(681, 213, 3, 5, 4, '2023-07-20'),
(682, 213, 4, 5, 4, '2023-07-20'),
(683, 214, 1, 3, 4, '2023-07-20'),
(684, 214, 2, 4, 4, '2023-07-20'),
(685, 214, 3, 5, 4, '2023-07-20'),
(686, 214, 4, 3, 4, '2023-07-20'),
(687, 215, 1, 3, 4, '2023-07-20'),
(688, 215, 2, 5, 4, '2023-07-20'),
(689, 215, 3, 2, 4, '2023-07-20'),
(690, 215, 4, 3, 4, '2023-07-20'),
(691, 216, 1, 2, 4, '2023-07-20'),
(692, 216, 2, 4, 4, '2023-07-20'),
(693, 216, 3, 3, 4, '2023-07-20'),
(694, 216, 4, 5, 4, '2023-07-20'),
(695, 217, 1, 3, 4, '2023-07-20'),
(696, 217, 2, 5, 4, '2023-07-20'),
(697, 217, 3, 2, 4, '2023-07-20'),
(698, 217, 4, 4, 4, '2023-07-20'),
(699, 218, 1, 3, 4, '2023-07-20'),
(700, 218, 2, 4, 4, '2023-07-20'),
(701, 218, 3, 2, 4, '2023-07-20'),
(702, 218, 4, 4, 4, '2023-07-20'),
(703, 219, 1, 3, 4, '2023-07-20'),
(704, 219, 2, 2, 4, '2023-07-20'),
(705, 219, 3, 4, 4, '2023-07-20'),
(706, 219, 4, 3, 4, '2023-07-20'),
(707, 220, 1, 3, 4, '2023-07-20'),
(708, 220, 2, 4, 4, '2023-07-20'),
(709, 220, 3, 2, 4, '2023-07-20'),
(710, 220, 4, 4, 4, '2023-07-20'),
(711, 221, 1, 3, 4, '2023-07-20'),
(712, 221, 2, 4, 4, '2023-07-20'),
(713, 221, 3, 2, 4, '2023-07-20'),
(714, 221, 4, 1, 4, '2023-07-20'),
(715, 222, 1, 3, 4, '2023-07-20'),
(716, 222, 2, 5, 4, '2023-07-20'),
(717, 222, 3, 4, 4, '2023-07-20'),
(718, 222, 4, 1, 4, '2023-07-20'),
(719, 223, 1, 5, 4, '2023-07-20'),
(720, 223, 2, 5, 4, '2023-07-20'),
(721, 223, 3, 4, 4, '2023-07-20'),
(722, 223, 4, 3, 4, '2023-07-20'),
(723, 226, 1, 5, 8, '2023-07-21'),
(724, 226, 2, 3, 8, '2023-07-21'),
(725, 226, 3, 5, 8, '2023-07-21'),
(726, 226, 4, 2, 8, '2023-07-21'),
(727, 228, 1, 5, 8, '2023-07-22'),
(728, 228, 2, 2, 8, '2023-07-22'),
(729, 228, 3, 5, 8, '2023-07-22'),
(730, 228, 4, 3, 8, '2023-07-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id` int NOT NULL,
  `spesialis_id` int NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id`, `spesialis_id`, `nama`) VALUES
(1, 1, 'dr. Ayu Parameswari, Sp.KK1'),
(2, 1, 'dr. Nina Melita ,Sp.KK'),
(3, 2, 'dr. Elly Asriah, Sp.M'),
(4, 2, 'dr. Febrina Art, Sp.M'),
(5, 2, 'dr. Magdalena Siska Trisanti ,Sp.M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kritik`
--

CREATE TABLE `tb_kritik` (
  `id` int NOT NULL,
  `masyarakat_id` int NOT NULL,
  `petugas_id` int NOT NULL,
  `petugas_jenis` int NOT NULL,
  `kritik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_kritik`
--

INSERT INTO `tb_kritik` (`id`, `masyarakat_id`, `petugas_id`, `petugas_jenis`, `kritik`) VALUES
(1, 109, 0, 1, 'pelayanan nya sangat ramah'),
(2, 110, 0, 2, 'Ut nihil saepe tempo'),
(3, 111, 0, 1, 'Sangat tidak ramah bintang 2'),
(4, 112, 0, 1, 'Possimus repudianda'),
(5, 113, 0, 2, 'Ramah bgt'),
(6, 114, 0, 1, 'Union bruh lele'),
(7, 115, 0, 2, 'Mantap'),
(8, 116, 0, 2, 'Mantap'),
(9, 117, 0, 2, 'Mantap'),
(10, 118, 0, 2, 'Non eum proident ar'),
(11, 119, 0, 2, 'Cumque architecto qu'),
(12, 120, 0, 2, 'Amet quos quod aliq'),
(13, 121, 0, 2, 'Laboriosam ut lorem'),
(14, 122, 0, 2, 'Accusamus consequatu'),
(15, 123, 0, 2, 'Qui qui qui et beata'),
(16, 124, 0, 2, 'Voluptas lorem eum v'),
(17, 125, 0, 2, 'Ex officia aute mole'),
(18, 126, 0, 2, 'Reprehenderit molest'),
(19, 127, 0, 2, 'Atque commodi quibus'),
(20, 128, 0, 2, 'Omnis eum nulla solu'),
(21, 129, 0, 2, 'Unde sit id ducimus'),
(22, 130, 0, 2, 'Consequat Dolorem t'),
(23, 131, 0, 2, 'Tempor vero aut nihi'),
(24, 132, 0, 2, 'Et dolor sint reici'),
(25, 133, 0, 2, 'Enim laudantium ven'),
(26, 134, 0, 2, 'Quia aut repellendus'),
(27, 135, 0, 1, 'tonettt'),
(28, 136, 0, 1, 'test'),
(29, 137, 0, 1, 'test1'),
(30, 138, 0, 1, 'Molestias delectus '),
(31, 139, 0, 2, 'no komen'),
(32, 140, 0, 2, 'dadsasd'),
(33, 141, 0, 2, 'sqsqs'),
(34, 142, 0, 2, 'asasas'),
(35, 143, 0, 2, '-'),
(36, 144, 0, 2, '-'),
(37, 145, 0, 2, '-'),
(38, 146, 0, 2, '-'),
(39, 147, 0, 2, '-'),
(40, 148, 0, 2, 'Vel expedita qui vel'),
(41, 149, 0, 2, 'Atque modi enim quo '),
(42, 150, 0, 2, 'Voluptas asperiores '),
(43, 151, 0, 2, 'Necessitatibus rerum'),
(44, 152, 0, 2, 'Nemo quis dolor dele'),
(45, 153, 0, 2, 'Est et iste vel dolo'),
(46, 154, 0, 2, 'Quia veniam est se'),
(47, 155, 0, 2, 'Eius unde commodi qu'),
(48, 156, 0, 2, 'Voluptatum minima co'),
(49, 157, 0, 2, 'Exercitationem non q'),
(50, 158, 0, 2, 'Quo ipsa ut dolores'),
(51, 159, 0, 2, 'Qui corrupti quo do'),
(52, 160, 0, 2, 'At obcaecati exercit'),
(53, 161, 0, 2, 'Reprehenderit nihil '),
(54, 162, 0, 2, 'Numquam dolore duis '),
(55, 163, 0, 2, 'Aut exercitationem l'),
(56, 164, 0, 2, 'Cumque vel autem vel'),
(57, 165, 0, 2, 'Ullamco totam volupt'),
(58, 166, 0, 2, 'Proident in perfere'),
(59, 167, 0, 2, 'Et dolor est maiore'),
(60, 168, 0, 2, 'Dolore pariatur Qui'),
(61, 169, 0, 2, 'Id repudiandae cupi'),
(62, 170, 0, 2, 'Corporis voluptates '),
(63, 171, 0, 2, 'Illo accusamus quia '),
(64, 172, 0, 2, 'Est dolore ea est a'),
(65, 173, 0, 2, 'Numquam ad doloremqu'),
(66, 174, 0, 2, 'Et saepe ea voluptat'),
(67, 175, 0, 2, 'Consequatur Dolor r'),
(68, 176, 0, 2, 'Autem sint cumque a'),
(69, 177, 0, 2, 'Animi nihil magna q'),
(70, 178, 0, 2, 'Nostrum voluptatibus'),
(71, 179, 0, 2, 'Accusamus laboriosam'),
(72, 180, 0, 2, 'Earum rerum delectus'),
(73, 181, 0, 2, 'Omnis rerum hic aut '),
(74, 182, 0, 2, 'Voluptas eveniet es'),
(75, 183, 0, 2, 'Ipsa rerum nobis no'),
(76, 184, 0, 2, 'Officia sed ea ut ni'),
(77, 185, 0, 2, 'Veritatis laborum I'),
(78, 186, 0, 2, 'Sit ex ea aliquid su'),
(79, 187, 0, 2, 'Et in nostrud iusto '),
(80, 188, 0, 2, 'Voluptate sint reru'),
(81, 189, 0, 2, 'Consequuntur ut a do'),
(82, 190, 0, 2, 'Sit veniam quo prae'),
(83, 191, 0, 2, 'Ex sed vitae sit op'),
(84, 192, 0, 2, 'Laboriosam vel expl'),
(85, 193, 0, 2, 'Excepturi ex cupidat'),
(86, 194, 0, 2, 'Dignissimos voluptas'),
(87, 195, 0, 2, 'Optio facere dolori'),
(88, 196, 0, 2, 'Suscipit voluptas li'),
(89, 197, 0, 2, 'Similique ut sed cup'),
(90, 198, 0, 2, 'Ea ex quasi omnis ne'),
(91, 199, 0, 2, 'Non quis in eiusmod '),
(92, 200, 0, 2, 'Enim culpa aut et e'),
(93, 201, 0, 1, 'Nulla rerum voluptat'),
(94, 202, 1, 1, 'Est excepteur est '),
(95, 204, 4, 2, 'Kondisi kamar mandi siswa sangat tidak layak, terdapat banyak sekali kerusakan di pintu, dinding, dan atap kamar mandi.'),
(96, 205, 4, 2, 'Saran saya, pihak sekolah perlu membangun kembali kamar mandi siswa yang baru karena fasilitas ini sangat penting dan dibutuhkan siswa.'),
(97, 206, 4, 2, 'Sekolah seharusnya memberikan penilaian yang merata kepada setiap siswanya. Jangan hanya memberikan penilaian berdasarkan nilai saja, tetapi juga dari mental, adab, perilaku dan bagaimana keterlibatan orangtuanya'),
(98, 207, 4, 2, 'Banyak sekali siswa yang sering telat masuk sekolah. Hal ini terus terulang karena tidak adanya sanksi bagi siswa yang telat.'),
(99, 208, 4, 2, 'Saya berharap pihak sekolah lebih tegas dalam memberlakukan sanksi kepada siswa, sehingga siswa menjadi lebih patuh dan disiplin'),
(100, 209, 4, 2, 'Sekolah B merupakan sebuah sekolah yang banyak diincar oleh murid akan tetapi sangat disayangkan karena pergaulan di sana kurang baik, banyak siswa yang menjadikannya sebagai ajang untuk memamerkan kekayaan '),
(101, 210, 4, 2, 'Sebagai lembaga pendidikan sudah seharusnya sekolah meluruskan niat siswa yaitu untuk mengasah kreativitas dan kecerdasan bukan hanya pergi ke sekolah untuk mendapatkan nilai yang tinggi saja '),
(102, 211, 4, 2, 'Terdapat banyak meja dan kursi di ruangan kelas yang tidak layak pakai, sehingga mengganggu kegiatan belajar siswa'),
(103, 212, 4, 2, 'Saya harap pihak sekolah segera mengganti kursi dan meja yang rusak dengan yang baru, sehingga kegiatan belajar siswa dapat berjalan dengan lancar.'),
(104, 213, 4, 2, 'Sekolah seharusnya mengeluarkan tindakan tegas kepada wali murid yang tidak banyak terlibat dalam proses perkembangan siswanya '),
(105, 214, 4, 2, 'Sekolah merupakan tempat untuk mendidik siswa menjadi orang yang beradab bukan semata karena ingin mendapatkan nilai bagus saja '),
(106, 215, 4, 2, 'Sekolah ini tidak menyediakan fasilitas wifi, padahal di zaman yang serba digital saat ini, siswa dan guru membutuhkan koneksi internet yang baik untuk mendukung kegiatan belajar mengajar.'),
(107, 216, 4, 2, 'Saran saya, sekolah perlu menyediakan fasilitas wifi untuk mendukung kegiatan belajar-mengajar.'),
(108, 217, 4, 2, 'Sebagai sekolah terbaik di kota ini sudah seharusnya sekolah mengatur jam kerja guru. Sepertinya banyak guru yang merasa kelelahan dengan beban mengajarnya '),
(109, 218, 4, 2, 'Fasilitas olahraga di sekolah ini kurang memadai. Tidak ada lapangan bola voli, lapangan tenis, lapangan sepak bola, dan perlengkapan olahraga seperti bola voli, matras, dan bola basket'),
(110, 219, 4, 2, 'Saran saya, sekolah perlu mengalokasikan dana untuk melengkapi fasilitas olahraga di sekolah ini. Sebab, fasilitas olahraga sangat penting untuk mendukung minat dan bakat siswa dalam bidang olahraga'),
(111, 220, 4, 2, 'Sekolah A terlalu banyak meminta murid untuk membawa buku pelajaran ke sekolah, hal ini membuat siswa SD sering membawa tas yang berat'),
(112, 221, 4, 2, 'Ruang kelas di sekolah ini terasa sangat panas, hal tersebut mengganggu konsentrasi siswa dalam kegiatan belajar'),
(113, 222, 4, 2, 'Saran dari saya, sekolah perlu melengkapi fasilitas pendingin ruangan di setiap kelas, sehingga ruangan menjadi lebih sejuk dan meningkatkan kenyamanan belajar siswa.'),
(114, 223, 4, 2, 'Seharusnya agar siswa tidak perlu membawa tas dengan banyak buku, sekolah memberikan fasilitas loker setiap siswa untuk tempat buku '),
(115, 224, 1, 1, 'Seharusnya agar siswa tidak perlu membawa tas dengan banyak buku, sekolah memberikan fasilitas loker setiap siswa untuk tempat buku '),
(116, 225, 3, 1, 'Seharusnya agar siswa tidak perlu membawa tas dengan banyak buku, sekolah memberikan fasilitas loker setiap siswa untuk tempat buku '),
(117, 226, 8, 2, 'Perspiciatis nostru'),
(118, 227, 5, 1, 'Test'),
(119, 228, 8, 2, 'Sint id quam culpa ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spesialis`
--

CREATE TABLE `tb_spesialis` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_spesialis`
--

INSERT INTO `tb_spesialis` (`id`, `nama`) VALUES
(1, 'Spesialis Kulit dan Kelamin'),
(2, 'Spesialis Mata'),
(3, 'Spesialis Patologi Anatomi'),
(4, 'Spesialis Anak'),
(5, 'Spesialis Bedah'),
(6, 'Spesialis Penyakit Dalam'),
(7, 'Spesialis Saraf'),
(8, 'Spesialis THT KL'),
(9, 'Obstetrics and Gynecology'),
(10, 'Spesialis Orthopedi dan Traumatology'),
(11, 'Specialis Fetomaternal'),
(12, 'Spesialis Gigi dan Mulut'),
(13, 'Spesialis kedokteran jiwa dan psikiater'),
(14, 'Kardiovaskuler'),
(15, 'Hematology & Medical Oncology'),
(16, 'Spesialis Urology'),
(17, 'Spesialis Bedah Anak'),
(18, 'Specialis Paru'),
(19, 'Spesialis Bedah Saraf'),
(20, 'Specialis Neurology'),
(21, 'Specialis Kardiologi Anak'),
(22, 'Spesialis Ginjal Hipertensi'),
(23, 'Spesialis Bedah Mulut dan Maksiofasial'),
(24, 'Spesialis kedokteran fisik dan rehabilitasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`jawaban_id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`masyarakat_id`);

--
-- Indeks untuk tabel `pertanyaan_dokter`
--
ALTER TABLE `pertanyaan_dokter`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `pertanyaan_petugas`
--
ALTER TABLE `pertanyaan_petugas`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indeks untuk tabel `polling_dokter`
--
ALTER TABLE `polling_dokter`
  ADD PRIMARY KEY (`polling_id`);

--
-- Indeks untuk tabel `polling_petugas`
--
ALTER TABLE `polling_petugas`
  ADD PRIMARY KEY (`polling_id`);

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kritik`
--
ALTER TABLE `tb_kritik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_spesialis`
--
ALTER TABLE `tb_spesialis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `jawaban_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `masyarakat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_dokter`
--
ALTER TABLE `pertanyaan_dokter`
  MODIFY `pertanyaan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_petugas`
--
ALTER TABLE `pertanyaan_petugas`
  MODIFY `pertanyaan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `polling_dokter`
--
ALTER TABLE `polling_dokter`
  MODIFY `polling_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT untuk tabel `polling_petugas`
--
ALTER TABLE `polling_petugas`
  MODIFY `polling_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=731;

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_kritik`
--
ALTER TABLE `tb_kritik`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `tb_spesialis`
--
ALTER TABLE `tb_spesialis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
