-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2022 pada 18.19
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
  `id_judul` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(40) NOT NULL,
  `isi` text NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diary`
--

INSERT INTO `diary` (`id_judul`, `tanggal`, `judul`, `isi`, `kategori_id`) VALUES
(2, '2022-06-09', 'My first 1', 'Hello nana! Aku sedih liat kamu terpapar covid kemaren. Tapi gapapa, kamu langsung gercep kasih kabar ke czeni. Speedy recovery ya! Kita menunggu dreamies tampil promosi album hihii. Saranghaeeee!\n\nNa, bangun rumah tangga sama aku yuk. Udah rajin, pinter, baik, mandiri, aku juga bisa sepenuhnya ada untuk kamu xixi.\n\nSementara ini aku lagi berjuang buat masa depanku, yaa biar sejajar sama kamu gitu. Kan aku gamau malu-maluin kamu yang high class.\n\nSemogaa kita bisa ketemu yaa na! \n\n:)', 2),
(3, '2022-06-12', 'NEW update 2', 'dddd', 5),
(16, '2022-06-12', 'KOS PERTAMA', 'Bismillah', 1),
(20, '2022-06-12', 'test alerttt', 'Bismillah', 5),
(22, '2022-06-15', 'TEST !', 'bismillah', 1),
(23, '2022-06-16', 'BISMILLAH', 'yes', 1),
(24, '2022-06-16', 'TODAY', 'Alhamdulillah', 1);

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
(5, 'TEST 4', '2022-06-13', 'Alhamdulillah', 'Selesai'),
(16, 'test 6', '2022-06-13', 'bismillah', 'Selesai'),
(17, 'TEST 3', '2022-06-13', 'bismillah test', 'Selesai'),
(18, 'TESTiii', '2022-06-13', 'test', 'Selesai'),
(19, 'TEST UPDATE', '2022-06-14', 'bismillah', 'Selesai'),
(21, 'TEST', '2022-06-16', 'test\n', 'Selesai'),
(22, 'TEST ADD', '2022-06-16', 'bismillah', 'Dikerjakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wish_list`
--

CREATE TABLE `wish_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_item` varchar(40) NOT NULL,
  `link_item` varchar(1000) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `jumlah` int(100) DEFAULT NULL,
  `status` enum('Belum','Terpenuhi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wish_list`
--

INSERT INTO `wish_list` (`id`, `nama_item`, `link_item`, `catatan`, `harga`, `jumlah`, `status`) VALUES
(1, 'Album NCT DREAM Beatbox', 'https://shopee.co.id/READY-NCT-DREAM---The-2nd-Album-Repackage-Beatbox-Photobook-Ver-i.27428917.18502535214?gclid=CjwKCAjwnZaVBhA6EiwAVVyv9CuYagebwWTw7m3wdRG5_5olnM0INslU8kMbvLhnseBN_LjXn77X6BoCYO4QAvD_BwE', 'Kalo ada uang', 550000, 1, 'Terpenuhi'),
(2, 'Gelas', 'https://shopee.co.id/Gelas-Anak-Kaca-Bening-dengan-Gagang-dan-Tutup-Anti-Bocor-400ml-Gelas-Mug-Gelas-tumbler-Lucu-GRATIS-SEDOTAN-i.389619733.13464526144?sp_atk=37537bcd-bd66-4f7b-9c73-2152e343d068&xptdk=37537bcd-bd66-4f7b-9c73-2152e343d068', NULL, 20000, 4, 'Terpenuhi'),
(9, 'Crop Top', 'https://shopee.co.id/FEMEI-OUTER-CROP-i.146198073.11385114174?sp_atk=d3c57ba0-abd9-4b8b-b0fd-6542a21ccfa0&xptdk=d3c57ba0-abd9-4b8b-b0fd-6542a21ccfa0', 'Bismillah test', 45000, 1, 'Terpenuhi'),
(10, 'Midi Dress', 'https://shopee.co.id/product/146198073/8696369371', 'Bismillah', 67000, 1, 'Belum'),
(11, 'DRESS', 'https://shopee.co.id/LEENBENKA-Clairin-Polo-Dress-Shirt-4136-i.178392881.15825964358?sp_atk=2e720a51-48a8-4395-b0cc-618d8d9a8494&xptdk=2e720a51-48a8-4395-b0cc-618d8d9a8494', 'Bismillah', 89000, 1, 'Belum'),
(15, 'TEST 5', 'https://shopee.co.id/Busana-wanita-Korea-temperamen-retro-kerah-persegi-gaun-kasual-hitam-i.358660241.11422442756?sp_atk=731d8e20-2227-420d-a569-c0ee083d75bc&xptdk=731d8e20-2227-420d-a569-c0ee083d75bc', 'Bismillah testing', 80000, 2, 'Terpenuhi'),
(16, 'Sandal', 'https://shopee.co.id/sandal-slop-import-wanita-polos-sandal-import-sendal-wanita-sandal-sepon-pylon-kuat-dan-ringan-i.172556976.15329597952?sp_atk=f5e098ba-9a20-48ab-9d6c-a03d03457f89&xptdk=f5e098ba-9a20-48ab-9d6c-a03d03457f89', 'Bismillah', 35000, 1, 'Belum'),
(17, 'TOPI', 'https://shopee.co.id/WIDE-BUCKET-HAT-BUCKET-HAT-PANTAI-SELEBGRAM-REMAJA-DEWASA-i.273899099.13876475297?sp_atk=56651337-33d4-4981-bd6d-0e4077776cb9&xptdk=56651337-33d4-4981-bd6d-0e4077776cb9', 'test', 28000, 1, 'Belum'),
(18, 'DRESS PARTY', 'https://shopee.co.id/Long-Sleeve-Velvet-Midi-Party-Dress-Wanita-Beludru-1173-(S-M-L)-i.16762565.6077615841?sp_atk=83b95c1d-5d5e-4e77-92f9-1a2db2da1fd0&xptdk=83b95c1d-5d5e-4e77-92f9-1a2db2da1fd0', 'test', 137000, 1, 'Belum'),
(20, 'TEST', 'https://shopee.co.id/Basic-Oversize-Midi-Dress-Short-Sleeve-Dress-Wanita-Lengan-Pendek-1037-(S-M-L)-i.16762565.7841028621?sp_atk=95a29bc9-24b8-43c0-8a17-d9f11a9450e0&xptdk=95a29bc9-24b8-43c0-8a17-d9f11a9450e0', 'test', 290000, 1, 'Terpenuhi'),
(21, 'CANDLE', 'https://shopee.co.id/DRIED-FLOWER-SCENTED-CANDLE-LILIN-AROMATERAPI-100-NATURAL-WAX-i.393000420.8626394572?sp_atk=07387da6-b7b6-4db2-a0fc-621c28459a3d&xptdk=07387da6-b7b6-4db2-a0fc-621c28459a3d', 'bismillah', 45000, 1, 'Belum'),
(22, 'TEST', 'https://shopee.co.id/FEMEI-OUTER-CRINCLE-BOW-BACK-CROP-CARDIE', 'testing', 34000, 2, 'Belum'),
(24, 'CANDLE', 'https://shopee.co.id/FEMEI-OUTER-CROP-i.146198073.11385114174?sp_atk=d3c57ba0-abd9-4b8b-b0fd-6542a21ccfa0&xptdk=d3c57ba0-abd9-4b8b-b0fd-6542a21ccfa0', 'bismillah', 34000, 1, 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id_judul`),
  ADD UNIQUE KEY `id` (`id_judul`),
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
  MODIFY `id_judul` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
