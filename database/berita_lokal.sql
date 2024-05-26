-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2024 pada 17.03
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_lokal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(13, 'Bisnis', '2024-05-18 23:56:48', '2024-05-19 06:58:06'),
(14, 'Olahraga', '2024-05-18 23:56:58', '0000-00-00 00:00:00'),
(17, 'Kesehatan', '2024-05-21 00:42:48', '0000-00-00 00:00:00'),
(18, 'Pendidikan', '2024-05-24 21:03:13', '0000-00-00 00:00:00'),
(19, 'Teknologi', '2024-05-26 09:54:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(20) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `id_post` int(20) NOT NULL,
  `tanggal_komentar` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `komentar`, `id_post`, `tanggal_komentar`, `created_at`) VALUES
(1, 'artikel bagus', 2, '2024-05-24 06:02:04', '2024-05-24 06:02:04'),
(2, 'jelek bgt hehehe', 3, '2024-05-24 06:02:48', '2024-05-24 06:02:48'),
(3, 'luar biasa, membantu sekali', 3, '2024-05-24 06:10:49', '2024-05-24 06:10:49'),
(4, 'Luar biasa sekali', 2, '2024-05-25 05:14:24', '2024-05-25 05:14:24'),
(6, 'mantab...', 6, '2024-05-25 05:22:51', '2024-05-25 05:22:51'),
(9, 'sebuah revolusioner dari elon musk untuk indonesia..', 9, '2024-05-26 16:55:56', '2024-05-26 16:55:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(20) NOT NULL,
  `judul_post` varchar(50) NOT NULL,
  `tanggal_post` date DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `artikel_post` longtext NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_post`
--

INSERT INTO `tb_post` (`id`, `judul_post`, `tanggal_post`, `thumbnail`, `artikel_post`, `id_kategori`, `created_at`, `updated_at`) VALUES
(2, 'Timnas Indonesia Senior', '2024-05-21', '664c339981fa1.jpg', '<p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p>', 14, '2024-05-21 03:58:16', '2024-05-25 12:14:03'),
(3, 'Piala Dunia 2026', '2024-05-21', '664c007c31a5d.jpg', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus assumenda corrupti a atque doloribus vel laudantium! Officiis, minima! Lorem ipsum.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p>', 14, '2024-05-21 04:01:32', '2024-05-25 12:14:28'),
(5, 'Piala Eropa 2024', '2024-05-24', '664ff28daede0.jpg', '<p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p>', 14, '2024-05-24 03:51:09', '2024-05-25 12:14:50'),
(6, 'Demam Berdarah Merajalela Kembali', '2024-05-24', '66500e11d8107.jpg', '<p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p>', 17, '2024-05-24 05:48:33', '2024-05-25 12:15:12'),
(7, 'Covid 19 Sudah Lenyap dari Indonesia', '2024-05-25', '66514725d27ab.jpg', '<p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p><p>timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus timnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimustimnas indonesia kalah melawan guinea ketika perebutan olimpiade paris 2024, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis non maxime culpa, eos labore porro sed nemo libero, nesciunt illo possimus.</p>', 17, '2024-05-25 04:04:21', '2024-05-25 12:15:29'),
(8, 'Pemilu Presiden 2024', '2024-05-25', '66520d301fafb.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi blanditiis possimus alias eaque laboriosam maxime nobis incidunt sit officia aperiam non ducimus et optio accusamus, culpa quisquam impedit dolores facere. Iste, unde ducimus, saepe distinctio officiis perspiciatis sint. Minus magni repellendus iure. Quo, cum excepturi sint cumque quas, assumenda illum mollitia ea veritatis! Obcaecati temporibus possimus maiores eligendi tempore saepe! Eligendi officiis illum atque ipsum beatae, iste necessitatibus cupiditate blanditiis at minus alias, praesentium nulla esse tempore fugit earum iusto eaque, non ipsa quo, aspernatur sint animi vitae. Nihil, tenetur.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi blanditiis possimus alias eaque laboriosam maxime nobis incidunt sit officia aperiam non ducimus et optio accusamus, culpa quisquam impedit dolores facere. Iste, unde ducimus, saepe distinctio officiis perspiciatis sint. Minus magni repellendus iure. Quo, cum excepturi sint cumque quas, assumenda illum mollitia ea veritatis! Obcaecati temporibus possimus maiores eligendi tempore saepe Eligendi officiis illum atque ipsum beatae, iste necessitatibus cupiditate blanditiis at minus alias, praesentium nulla esse tempore fugit earum iusto eaque, non ipsa quo, aspernatur sint animi vitae. Nihil, tenetur.</p>', 18, '2024-05-25 18:09:20', '2024-05-25 18:09:40'),
(9, 'Starlink Resmi Diluncurkan', '2024-05-26', '66534cdde7d41.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi blanditiis possimus alias eaque laboriosam maxime nobis incidunt sit officia aperiam non ducimus et optio accusamus, culpa quisquam impedit dolores facere. Iste, unde ducimus, saepe distinctio officiis perspiciatis sint. Minus magni repellendus iure. Quo, cum excepturi sint cumque quas, assumenda illum mollitia ea veritatis! Obcaecati temporibus possimus maiores eligendi tempore saepe! Eligendi officiis illum atque ipsum beatae, iste necessitatibus cupiditate blanditiis at minus alias, praesentium nulla esse tempore fugit earum iusto eaque, non ipsa quo, aspernatur sint animi vitae. Nihil, tenetur.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi blanditiis possimus alias eaque laboriosam maxime nobis incidunt sit officia aperiam non ducimus et optio accusamus, culpa quisquam impedit dolores facere. Iste, unde ducimus, saepe distinctio officiis perspiciatis sint. Minus magni repellendus iure. Quo, cum excepturi sint cumque quas, assumenda illum mollitia ea veritatis! Obcaecati temporibus possimus maiores eligendi tempore saepe! Eligendi officiis illum atque ipsum beatae, iste necessitatibus cupiditate blanditiis at minus alias, praesentium nulla esse tempore fugit earum iusto eaque, non ipsa quo, aspernatur sint animi vitae. Nihil, tenetur.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi blanditiis possimus alias eaque laboriosam maxime nobis incidunt sit officia aperiam non ducimus et optio accusamus, culpa quisquam impedit dolores facere. Iste, unde ducimus, saepe distinctio officiis perspiciatis sint. Minus magni repellendus iure. Quo, cum excepturi sint cumque quas, assumenda illum mollitia ea veritatis! Obcaecati temporibus possimus maiores eligendi tempore saepe! Eligendi officiis illum atque ipsum beatae, iste necessitatibus cupiditate blanditiis at minus alias, praesentium nulla esse tempore fugit earum iusto eaque, non ipsa quo, aspernatur sint animi vitae. Nihil, tenetur.</p>', 19, '2024-05-26 16:53:17', '2024-05-26 16:54:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_post` (`id_post`);

--
-- Indeks untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `tb_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  ADD CONSTRAINT `tb_post_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
