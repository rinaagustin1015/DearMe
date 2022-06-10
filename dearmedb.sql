-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2022 pada 08.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dearme`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diary`
--

CREATE TABLE `diary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(40) NOT NULL,
  `isi` text NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diary`
--

INSERT INTO `diary` (`id`, `tanggal`, `judul`, `isi`, `kategori_id`) VALUES
(1, '2022-06-09', 'My first diary', 'Hello nana! Aku sedih liat kamu terpapar covid kemaren. Tapi gapapa, kamu langsung gercep kasih kabar ke czeni. Speedy recovery ya! Kita menunggu dreamies tampil promosi album hihii. Saranghaeeee!\r\n\r\nNa, bangun rumah tangga sama aku yuk. Udah rajin, pinter, baik, mandiri, aku juga bisa sepenuhnya ada untuk kamu xixi.\r\n\r\nSementara ini aku lagi berjuang buat masa depanku, yaa biar sejajar sama kamu gitu. Kan aku gamau malu-maluin kamu yang high class.\r\n\r\nSemogaa kita bisa ketemu yaa na! \r\n\r\n:)', 1),
(2, '2022-06-10', 'Aku dan Hari ini', 'Pada hari sabtu ini aku akan mengerjakan beberapa tugas kuliah. Dari pagi aku sudah mulai duduk di depan laptop. Hah ini seperti rutinitas ku setiap hari, bertemu tugas tugas dan tugas. Tapi gapapa, setidaknya aku tidak pusing sendirian. Karena apa ? karena ini adalah tugas kelompok, jadi pusingnya bareng bareng xixixixi.\r\n\r\nokey bibye :*', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(2) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Kebahagiaan'),
(2, 'Kesedihan'),
(3, 'Ketakutan'),
(4, 'Marah'),
(5, 'Terkejut'),
(6, 'Jijik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `to_do_list`
--

CREATE TABLE `to_do_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to_do` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `status` enum('Akan Dikerjakan','Dikerjakan','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `to_do_list`
--

INSERT INTO `to_do_list` (`id`, `to_do`, `tanggal`, `catatan`, `status`) VALUES
(1, 'Mengerjakan Data mining', '2022-06-09', 'PUSINK TSAY', 'Akan Dikerjakan'),
(2, 'Mengerjakan TKTI', '2022-06-09', 'Pusink bngt kek ngawang gitu :(', 'Dikerjakan'),
(3, 'Mengerjakan Pweb', '2022-06-09', NULL, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wish_list`
--

CREATE TABLE `wish_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_item` varchar(40) NOT NULL,
  `img` varchar(1000) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `jumlah` int(100) DEFAULT NULL,
  `status` enum('Belum','Terpenuhi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wish_list`
--

INSERT INTO `wish_list` (`id`, `nama_item`, `img`, `catatan`, `harga`, `jumlah`, `status`) VALUES
(1, 'Album NCT DREAM Beatbox', 'https://i.scdn.co/image/ab67616d0000b2734fbde4c63b86079e0517b1cb', 'Kalo ada uang', 550000, 1, 'Belum'),
(2, 'Gelas', 'https://cf.shopee.co.id/file/a127d9c6518c639e4cd9104713974a56', NULL, 20000, 4, 'Terpenuhi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diary`
--
ALTER TABLE `diary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `diary_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
