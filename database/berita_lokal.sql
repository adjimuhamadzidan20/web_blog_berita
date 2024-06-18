-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 16.10
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

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_admin`, `username`, `password`, `created_at`) VALUES
(1, 'BeyourselfIT', 'adminberita20', '5d439babbcd75e98aecf36824f58cd66', '2024-06-09 02:31:17');

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
(1, 'Olahraga', '2024-06-17 20:48:00', '0000-00-00 00:00:00'),
(2, 'Teknologi', '2024-06-17 20:48:20', '0000-00-00 00:00:00'),
(3, 'Kesehatan', '2024-06-17 21:33:20', '0000-00-00 00:00:00'),
(4, 'Kuliner Makanan', '2024-06-17 21:33:35', '0000-00-00 00:00:00'),
(5, 'Sosial', '2024-06-18 05:48:51', '0000-00-00 00:00:00'),
(6, 'Politik', '2024-06-18 05:49:05', '0000-00-00 00:00:00'),
(7, 'Pendidikan', '2024-06-18 05:49:20', '0000-00-00 00:00:00'),
(8, 'Kebudayaan', '2024-06-18 05:49:34', '0000-00-00 00:00:00'),
(9, 'Keagamaan', '2024-06-18 05:50:01', '0000-00-00 00:00:00');

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
(1, 'pemerintah gimana sih ini, mestinya hati&quot;...', 4, '2024-06-18 12:27:55', '2024-06-18 12:27:55'),
(2, 'pemerintah lagi, udah gk salah lagi..', 4, '2024-06-18 12:28:28', '2024-06-18 12:28:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(20) NOT NULL,
  `judul_post` varchar(255) NOT NULL,
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
(1, 'Kronologi FK Senica Menuju Bangkrut', '2024-06-18', '6670e92f468d2.jpeg', '<p style=\"text-align:justify;\">Jakarta - Klub Liga Slovakia FK Senica berada dalam masalah finansial serius dan menuju bangkrut. Berikut kronologinya. Masalah di tubuh manajemen FK Senica semakin runyam lantaran utang besar yang menjerat klub. Media Slovakia Sport.sk mengklaim FK Senica terlilit utang dengan nilai mencapai 1 juta euro atau setara dengan Rp15,4 miliar.</p><p style=\"text-align:justify;\">\"Tim belum bisa keluar dari masalah dan berdasarkan informasi yang diterima Sport.sk, nilai utang mencapai 1 juta euro,\" tulis pemberitaan tersebut.</p><p style=\"text-align:justify;\">Masalah finansial serius itu bahkan membuat Fk Senica dikabarkan sempat tidak mampu membayar tunggakan operasional laman website resmi klub sebelum pandemi Covid-19 menghantam seluruh dunia.</p><p style=\"text-align:justify;\">\"Website resmi fksenica.eu sempat dinonaktifkan karena klub belum membayar tagihan operasional sejak Februari 2020. ayangnya, belum ada komunikasi dari manajemen klub dengan kami. Kami menagih pembayaran 400 euro untuk mengembalikan laman tersebut,\" kata pemimpin pihak penyedia layanan website setempat David Schlegel.</p><p style=\"text-align:justify;\">Krisis keuangan FK Senica juga menyebabkan para pemain dan pegawai klub kabarnya tidak mendapat gaji sejak September 2021. Akibat gaji yang tersendat selama tujuh bulan hal tersebut menggulirkan gelombang pengunduran diri besar-besaran dari beberapa pemain.</p><p style=\"text-align:justify;\">Lagi-lagi, media Slovakia Esencia Hry menyebut sepak terjang Fk Senica sudah berakhir. Sikap pemain yang memilih angkat kaki dinilai bakal membuat tim terseok-seok untuk bertahan di Fortuna Liga.</p><p style=\"text-align:justify;\">\"Sepertinya sudah waktunya untuk mengakhiri Senica di Liga Fortuna. Menurut informasi kami di klub FK Senica, delapan pemain dan tim pelaksana telah mengundurkan diri hingga saat ini,\" tulis pemberitaan tersebut.</p><p style=\"text-align:justify;\">\"Pemilik [klub] tidak menepati janji yang mereka berikan di ruang ganti. Gaji yang dijanjikan juga tidak datang,\" lanjut laporan itu.</p><p style=\"text-align:justify;\">Nama bintang Timnas Indonesia, Egy Maulana Vikri dan Witan Sulaeman disebut-sebut masuk ke dalam daftar pemain yang tidak melanjutkan kerjasama dengan FK Senica. Kedua pemain itu sudah absen dalam pertandingan terakhir antara FK Senica melawan Michalovce di laga play-off Liga Slovakia, Sabtu (24/4) lalu.</p><p style=\"text-align:justify;\">\"Egy datang di musim panas tahun lalu dan mencetak dua gol. Dia tampil apik terutama di awal musim. Tapi seiring berjalannya wakktu, dia menghilang dari pertandingan yang kemungkinan penyebabnya adalah situasi buruk yang ada di klub,\" bunyi pemberitaan Esencia Hry. \"Senica juga merekrut Witan, teman dari Egy dan rekan di Timnas [Indonesia]. Keduanya kini sudah tidak bekerja di klub itu lagi,\" lanjut laporan tersebut.</p><p style=\"text-align:justify;\">Dalam sebuah wawancara Esencia Hry dengan sumber anonim yang dekat dengan klub, masalah finansial sejak tahun lalu memaksa pemain hidup dari tabungan hingga dibiayai oleh keluarga masing-masing. \"Beberapa dari mereka mengambil tabungan dari aktivitas sepak bola sebelumnya, dan sebagian pemain mendapat pembiayaan dari orangtua,\" kata sumber tersebut.</p><p style=\"text-align:justify;\">Menurutnya, pemain tidak memiliki pilihan yang banyak untuk menghadapi situasi sulit yang sedang dialami klub. Ia berharap permasalahan segera berakhir dan kondisi kembali seperti sedia kala. \"Ini adalah pertanyaan yang sulit. Tidak ada satupun dari kami yang pernah mengalami situasi ini. Opsi pertama adalah pemain bisa mengakhiri kontrak secepat mungkin. Opsi lainnya adalah setuju dengan para pemilik,\" ucapnya. Sampai saat ini, pihak FK Senica belum memberikan pernyataan resmi ihwal persoalan finansial yang sedang dialami klub.</p>', 1, '2024-06-18 03:52:07', '2024-06-18 03:55:59'),
(2, 'Man City vs Real Madrid: Momen Balas Dendam', '2024-06-18', '6670e993c3d92.jpeg', '<p style=\"text-align:justify;\">Jakarta - Real Madrid memiliki peluang untuk membalaskan dendam kepada Manchester City di semifinal Liga Champions musim ini. Man City vs Madrid sudah enam kali bertemu di Liga Champions. Keduanya sama-sama meraih dua kemenangan dan sisanya berakhir imbang.</p><p style=\"text-align:justify;\">Dua kemenangan terakhir Man City terjadi di babak 16 besar Liga Champions 2019/2020. Kala itu Man City sukses mempermalukan Madrid baik di laga kandang maupun tandang.</p><p style=\"text-align:justify;\">Real Madrid lebih dulu kalah 1-2 dari Man City pada leg pertama di Santiago Bernabeu. Unggul lebih dulu melalui Isco, gawang Madrid malah dua kali dibobol Gabriel Jesus dan Kevin De Bruyne.</p><p style=\"text-align:justify;\">Hasil pahit juga dialami Los Merengues kalah melawat ke Etihad. Man City kembali meraih kemenangan dengan skor identik lewat gol Raheem Sterling dan Gabriel Jesus. Sementara gol tim tamu diceploskan Karim Benzema.</p><p style=\"text-align:justify;\">Dua kekalahan beruntun dari City membuat Madrid tersingkir lebih awal. Padahal raksasa Spanyol itu tercatat sebagai tim paling sukses di Liga Champions dengan koleksi 13 gelar.</p><p style=\"text-align:justify;\">Kekalahan dari Man City cukup membekas di benak para pemain Madrid. Benzema, Marcelo, Casemiro, Toni Kroos, dan Luka Modric adalah deretan pemain yang jadi saksi mata kehebatan klub arahan Pep Guardiola itu.</p>', 1, '2024-06-18 03:57:39', '0000-00-00 00:00:00'),
(3, 'Alex Marquez: Dikecam Espargaro, Tak Diperdulikan Marc', '2024-06-18', '6670ea1550fb1.jpeg', '<p style=\"text-align:justify;\">Jakarta - Penampilan Alex Marquez di MotoGP Portugal 2022 berbuah reaksi dari dua rival, termasuk sang kakak Marc Marquez. Alex finis ketujuh dalam MotoGP Portugal 2022. Hasil terbaik sejauh ini pada musim balap MotoGP 2022. Kendati meraih prestasi terbaik di musim ini, Alex justru mendapat respons negatif dari Espargaro. Pembalap tim Aprilia itu menilai gaya balap Alex brutal.</p><p style=\"text-align:justify;\">Espargaro pun komplain karena merasa ditabrak-tabrak oleh Alex. Dengan nada kesal Espargaro bahkan menyebut Alex sudah gila.</p><p style=\"text-align:justify;\">\"Saya mencoba semuanya. Saya melakukan start yang buruk, kami memiliki masalah dengan kopling, itu sesuatu yang harus kami perbaiki. Kemudian saya kehilangan banyak waktu dengan Alex Marquez, sekali lagi seperti di MotoGP Mandalika dia membalap melebihi batas, dia menabrak saya tiga kali,\" ujar Espargaro usai balapan dikutip dari Spotv Asia.</p><p style=\"text-align:justify;\">\"Saya tidak mengerti kenapa, karena pada akhirnya dia tidak punya kecepatan untuk bersaing. Dia benar-benar gila. Kami kehilangan banyak waktu, saya pikir hal itu tidak perlu terjadi. Tapi ini adalah balapan, pada akhirnya saya berusaha melakukan comeback sekuat mungkin,\" sambung Espargaro.</p><p style=\"text-align:justify;\">Alex pun menanggapi komentar Espargaro dengan santai dan menyebut saling balap dan saling sikut dalam balapan adalah hal wajar. Alex bahkan tak sungkan jika harus menabrak Espargaro lagi di lain kesempatan.</p><p style=\"text-align:justify;\">\"Ini adalah balapan dan mereka mengajarkan saya seperti itu, untuk membela posisi dan tim saya, dan saya akan melakukannya di setiap balapan. Saya rasa itulah mengapa mereka membayar saya, bukan?\" terangnya.</p><p style=\"text-align:justify;\">\"Jika saya harus membela dan ada kontak, maka itu wajar kan? Dia membela timnya, dan saya membela tim saya dan saya akan melakukannya sekali lagi jika dibutuhkan,\" ucap Marquez dikutip dari Corsedimoto.</p><p style=\"text-align:justify;\">Selain bersaing sengit dengan Espargaro, Alex juga berduel melawan sang kakak. Alex merasa senang meski harus kalah tipis dari Marc yang bisa memacu motornya menjelang garis finis.</p><p style=\"text-align:justify;\">Marc yang finis di posisi keenam juga menyatakan senang bisa berduel melawan Alex. Mantan juara dunia itu menegaskan tidak pandang bulu saat berada di lintasan balap, meski harus berduel dengan sang adik.</p><p style=\"text-align:justify;\">\"Saya membalap sangat baik, meski di lap terakhir saya bisa mengejar Alex, tidak peduli jika dia adik Anda atau bukan, dia pasti akan berusaha menyalip saya lagi,\" ucap Marquez.</p>', 1, '2024-06-18 03:59:49', '2024-06-18 04:46:50'),
(4, 'Bocor Data, Pakar Ungkap Banyak Situs Pemerintah Tak Pakai HTTPS', '2024-06-18', '6670ec084fbda.png', '<p style=\"text-align:justify;\">Jakarta - Pakar siber Alfons Tanujaya menyebut kebocoran data kredensial di Layanan Pengadaan Secara Elektronik (LPSE) terjadi bukan hanya karena malware pada pengguna, tapi juga karena kelemahan di sistemnya. Berdasarkan laporan platform investigasi peretasan Dark Tracer beberapa institusi pemerintah yang mengalami kebocoran data kredensial alias nama pengguna dan data password. Misalnya, situs CPNS, Bea Cukai, Kementerian Keuangan, Kementerian Sosial, Kementerian Perindustrian dan Perdagangan.</p><p style=\"text-align:justify;\">Alfons menuturkan, berdasarkan laporan Dark Tracer, \"banyak institusi pemerintah yang tidak menerapkan HTTPS yang baik pada situsnya\".</p><p style=\"text-align:justify;\">Diketahui, Hypertext Transfer Protocol atau HTTP adalah protokol untuk mengirimkan data dari web server ke browser serta mengatur proses tampilan situs. Bentuk yang lebih aman dari sistem itu adalah HTTPS.</p><p style=\"text-align:justify;\">Jika mengandung informasi yang penting seperti kredensial atau data penting lainnya, maka informasi ini akan sangat mudah diambil dan digunakan untuk aksi kejahatan.</p><p style=\"text-align:justify;\">\"Kebocoran kredensial yang disebabkan oleh HTTPS maksudnya, situs HTTP yang harusnya mengimplementasikan pengamanan trafik sehingga menjadi HTTPS (secure) tidak mengimplementasikan sehingga aksesnya tetap HTTP,\" jelas Alfons kepada CNNIndonesia.com, Selasa (26/4).</p><p style=\"text-align:justify;\">\"Jadi akibatnya lalu lintas trafik ke situs tersebut akan tidak terenkripsi sehingga bisa disadap dan dibaca oleh penyadap. Kalau HTTPS maka trafiknya akan dienkripsi sehingga sekalipun disadap, informasinya tidak bisa dibaca karena terenkripsi,\" lanjutnya menjelaskan.</p><p style=\"text-align:justify;\">Menurut pengamatan Vaksincom dari daftar yang diberikan oleh Dark Tracer, sambungnya, LPSE merupakan salah satu institusi yang kurang menerapkan pengamanan data kredensial dengan baik.</p><p style=\"text-align:justify;\">\"Setidaknya 470 subdomain LPSE lintas institusi mengalami kebocoran kredensial dengan jumlah kredensial yang bocor sebanyak 11.507 kredensial,\" sambungnya.</p><p style=\"text-align:justify;\">Menurutnya, kelemahan pada pengamanan subdomain dapat dieksploitasi sebagai pintu samping untuk menyerang domain utama yang telah diamankan dengan baik.</p><p style=\"text-align:justify;\">BSSN dalam rilisnya mengatakan pada dasarnya pengguna yang terinfeksi stealer malware itu merupakan pengguna di situs pemerintah ataupun pengguna dari layanan publik. Sebagai informasi, 878.319 kredensial atau data rahasia dari 34.714 situs pemerintah berbagai negara bocor akibat infeksi program berbahaya atau malware.</p>', 2, '2024-06-18 04:08:08', '2024-06-18 04:45:46'),
(6, 'Krisis Chip, Penjualan Motor Honda Januari-Maret Turun 5 Persen Selasa, 26 April 2', '2024-06-18', '6670edb5dab6e.jpeg', '<p style=\"text-align:justify;\">Jakarta - Krisis komponen chip yang melanda industri global berdampak pada penurunan penjualan sepeda motor Honda. Direktur Marketing Astra Honda Motor (AHM) Thomas Wijaya menyampaikan penjualan pada Januari-Maret 2022 surut 5 persen jika dibandingkan periode yang sama untuk tahun sebelumnya.</p><p style=\"text-align:justify;\">\"Dan kami memang mengalami dampak negatif di sini. [Penjualan] kami di 951 ribu unit, sehingga sedikit menurun dibanding tahun tahun lalu 5 persen,\" kata Thomas melalui pemaparan virtual, Selasa (26/4).</p><p style=\"text-align:justify;\">Minimnya pasokan material tersebut membuat proses produksi terganggu dan ujungnya membuat inden mengular. Thomas mengungkapkan inden paling banyak ada pada produk skuter matik dengan kapasitas mesin 110cc- 150cc. Sedangkan masa inden yang diakui perusahaan selama satu bulan. \"Jadi untuk inden itu sekarang sekitar satu bulan,\" kata dia.</p><p style=\"text-align:justify;\">Di sisi lain, Thomas tetap optimistis penjualan sepeda motor Honda tembus target pada 2022, yaitu antara 4,2 juta unit hingga 4,4 juta unit.</p><p style=\"text-align:justify;\">\"Kami meski turun lima persen harapannya bisa kasih 4,2-4,4 juta unit. Jadi kami bisa memenuhi apa yang diinginkan konsumen,\" ungkapnya.</p><p style=\"text-align:justify;\">Sementara itu, Executive Vice President Director AHM Johannes Loman yang juga menjabat sebagai Ketua Asosiasi Industri Sepeda Motor Indonesia (AISI) menyatakan industri sepeda motor Tanah Air masih berkembang pasca pemulihan efek pandemi.</p><p style=\"text-align:justify;\">Industri dikatakan tumbuh seiring meningkatnya aktivitas perekonomian masyarakat. Menurut Loman target AISI 2022 masih tidak berubah untuk penjualan roda dua yaitu sebesar 5,4 juta unit.</p><p style=\"text-align:justify;\">\"Saya tapi masih optimis target aisi 5,1 juta hingga 5,4 juta unit. Dan bisa lebih kalau pasokan dari komponen bisa berjalan lancar,\" kata Loman.</p><p style=\"text-align:justify;\">Berdasarkan data AISI pada kuartal pertama 2022, wholesales atau distribusi dari pabrik ke dealer lima produsen yakni Honda, Yamaha, Suzuki, Kawasaki, dan TVS berjumlah 1.262.586 unit.</p>', 2, '2024-06-18 04:15:17', '2024-06-18 04:46:14'),
(7, 'Jebakan Lingkaran Setan GERD dan Kecemasan yang Tak Berujung', '2024-06-18', '6670eef40d84a.jpeg', '<p>Sudah bukan rahasia lagi, penyakit asam lambung atau refluks gastroesofagus saling berkait kelindan dengan kecemasan atau stres berlebih.<br>Refluks gastroesofagus (GERD) merupakan kondisi kronis saat cairan asam lambung kembali naik ke kerongkongan. Kondisi ini bisa menimbulkan sejumlah gejala yang mengganggu, mulai dari sering sendawa hingga sesak napas.</p><p>Sedangkan kecemasan merupakan rasa cemas yang terjadi secara intens hingga mengganggu aktivitas sehari-hari.</p><p>\"Artinya, kalau pasien melakukan pemeriksaan, hasilnya tidak ditemukan kelainan [pada pencernaan],\" ujar Ari, pada CNNIndonesia.com, Rabu (20/4). Tak ditemukannya penyebab yang jelas mengindikasikan ada faktor lain yang menyertai seperti kecemasan dan stres berlebih.</p><p>Hal yang sama juga disampaikan oleh dokter spesialis kesehatan jiwa sekaligus pakar psikosomatik, Andri. Ia mengatakan, orang yang cemas sering mengalami masalah pada lambung, termasuk GERD.</p><blockquote><p>\"Orang yang mengalami GERD itu sering kali lebih dominan cemasnya, apalagi kalau kondisi GERD-nya tidak terlalu bisa ditangani dengan baik,\" ujar Andri pada CNNIndonesia.com, Rabu (20/4).</p></blockquote><p>Kondisi ini disebabkan karena kecemasan yang berlebihan bisa mengurangi tekanan pada sfingter esofagus bawah. Bagian ini merupakan pita otot yang menjaga lambung tetap tertutup dan mencegah asam naik k ke kerongkongan. Hal ini yang kemudian menyebabkan GERD.</p><p>Respon stres dan kecemasan juga dapat menyebabkan ketegangan otot yang lama. Jika kondisi ini terjadi pada otot-otot di sekitar perut, maka tekanan pada perut akan meningkat dan mendorong asam naik ke atas.</p><p>Namun, Andri menegaskan bahwa kecemasan tak menjadi penyebab utama, tetapi memperparah gejala GERD.</p><p>\"Jadi, kalau dilihat GERD penyebabnya kecemasan atau stres secara langsung itu tidak ada. Yang paling dominan dikaitkan dengan ini adalah kecemasan atau stres bisa membuat parah GERD,\" ujar Andri.</p>', 3, '2024-06-18 04:20:36', '2024-06-18 04:42:27'),
(8, 'Resep Praktis Sahur: Tahu Telur Lada Hitam', '2024-06-18', '6670f099f1cbd.png', '<p style=\"text-align:justify;\">Momen makan sahur umumnya lebih singkat sehingga Anda perlu menyiapkan makanan yang mudah dibuat. Salah satunya seperti resep praktis sahur tahu telur lada hitam. Selain proses memasak yang tidak lama, menu tahu telur lada hitam ini termasuk comfort food yang anti gagal untuk dibuat. Bahan utama yang dibutuhkan cukup tahu, telur, dan saus lada hitam instan, sedangkan bumbu selebihnya opsional. Berikut resepnya untuk porsi 2 orang.</p><p>Bahan membuat tahu telur lada hitam :</p><ol style=\"list-style-type:decimal;\"><li>2 butir telur, kocok lepas</li><li>Tahu putih secukupnya, potong dadu agak kecil</li><li>5 sdm saus lada hitam instan</li><li>3 siung bawang putih</li><li>½ bagian bawang bombay (opsional)</li><li>Cabai rawit secukupnya (opsional)</li><li>Lada hitam secukupnya</li><li>Merica putih secukupnya</li><li>Garam secukupnya</li><li>Minyak secukupnya</li><li>5 sdm air</li></ol><p>Cara membuat tahu telur lada hitam :</p><ol><li>Masukkan potongan tahu ke dalam kocokan telur.</li><li>Goreng tahu bersama telur sampai kekuningan, jangan terlalu dihancurkan lalu angkat tiriskan.</li><li>Di wajan sama tumis bawang putih, bombay, cabai sampai wangi.</li><li>Masukkan saus lada hitam, garam, lada hitam bubuk, merica, dan air.</li><li>Koreksi rasa terlebih dulu. Apabila sudah pas tinggal tambahkan tahu telur.</li><li>Aduk sebentar sampai bercampur dengan bumbu.</li><li>Matikan kompor dan tahu telur lada hitam siap disajikan.</li></ol><p>Resep praktis sahur tahu telur lada hitam bisa dimakan langsung atau ditambah nasi hangat serta taburan bawang goreng supaya lebih nikmat.</p>', 4, '2024-06-18 04:27:37', '2024-06-18 04:34:49'),
(9, 'WHO Serukan Pentingnya Inovasi dalam Pengendalian Malaria', '2024-06-18', '6670f899ec404.jpg', '<p style=\"text-align:justify;\">Malaria masih jadi penyakit menular yang mengancam banyak masyarakat. Organisasi Kesehatan Dunia (WHO) menyerukan pentingnya inovasi dalam mengendalikan malaria.<br>Menukil laman resmi Organisasi Kesehatan Dunia (WHO), badan kesehatan dunia tersebut mengungkapkan tidak ada alat tunggal yang tersedia saat ini yang akan menyelesaikan masalah malaria.</p><p style=\"text-align:justify;\">WHO menyerukan tentang pentingnya investasi dan inovasi yang membawa pendekatan pengendalian vektor baru, diagnostik, obat antimalaria, dan alat lain untuk mempercepat kemajuan melawan malaria.</p><p style=\"text-align:justify;\">Malaria telah berdampak buruk bagi kesehatan dan mata mata pencaharian orang-orang di seluruh dunia. Laporan WHO memperkirakan ada 241 juta kasus malaria dan 627.000 kematian akibat malaria di seluruh dunia pada 2020.</p><p style=\"text-align:justify;\">Di Indonesia, tercatat sebanyak 304.606 kasus malaria ditemukan pada tahun 2021. Angka ini lebih rendah dari 2019 yang mencapai lebih dari 418 ribu kasus.</p>', 3, '2024-06-18 05:01:45', '0000-00-00 00:00:00'),
(10, 'Timnas Indonesia U23 Lolos ke Piala Dunia', '2024-06-18', '66715e7660449.jpeg', '<p style=\"text-align:justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, id iure error, illo earum autem maiores sit sed iusto quia nemo, quasi sapiente necessitatibus accusamus! Magnam nobis unde itaque vitae! Iure ipsa expedita quos corrupti, voluptate voluptatum explicabo vero recusandae aliquid accusamus. Laboriosam fugiat commodi debitis vel reprehenderit repellat, iusto facilis, mollitia quibusdam, corrupti unde explicabo a consequuntur. Voluptas, qui. Ut vitae facilis molestias quod commodi? At rem sit sunt iusto dolorum quia, velit odit fuga ea quos. Voluptatum deserunt optio, sed velit odit aliquam fuga ea iure cupiditate. Deserunt.<br>Eveniet adipisci, perspiciatis eius voluptatem in omnis, nisi culpa enim! Corrupti itaque voluptates quasi sit blanditiis beatae assumenda, sed, fuga nulla fugit laudantium debitis dolorem ipsa nesciunt error doloribus ratione.</p><p style=\"text-align:justify;\">Ea exercitationem, aperiam dolor maxime quasi assumenda cupiditate iure corrupti, ipsa quam perspiciatis consequatur! Voluptatum laboriosam necessitatibus illo praesentium harum quos sequi fuga, facere, voluptatem molestias, est odio ipsa, quam. Error, est! Eveniet sunt fuga voluptate? Ad officia labore perspiciatis, illum modi delectus expedita hic inventore. Eligendi, qui, possimus. Delectus, commodi. Consectetur veniam quisquam sunt tempora molestiae reiciendis quidem ullam. Aut dolor, nemo reprehenderit commodi eaque expedita dolorum dolorem quidem explicabo ullam placeat. Deserunt eius beatae alias, ratione laboriosam necessitatibus voluptates quam reprehenderit soluta esse magni accusantium laborum cumque ex. Dolorem, deserunt, tempore! Ea delectus amet sed illo, totam repellat quidem tenetur itaque, iste nihil suscipit vero numquam quaerat nemo quas qui necessitatibus recusandae voluptatem doloremque error vitae quibusdam animi! Cumque itaque optio nihil mollitia quo rerum perferendis possimus quos, sed ipsa suscipit voluptatem cupiditate quae accusantium dolor necessitatibus. Unde consectetur blanditiis eveniet deserunt vel, omnis assumenda ratione temporibus architecto. Beatae nobis sit totam tempora natus sunt, nesciunt, dolor ratione possimus mollitia officia minima dicta repellendus nisi rerum ipsum, fugiat aliquam dolores, quod neque accusamus et ipsa atque? Maiores, iusto.</p><p style=\"text-align:justify;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, id iure error, illo earum autem maiores sit sed iusto quia nemo, quasi sapiente necessitatibus accusamus! Magnam nobis unde itaque vitae! Iure ipsa expedita quos corrupti, voluptate voluptatum explicabo vero recusandae aliquid accusamus. Laboriosam fugiat commodi debitis vel reprehenderit repellat, iusto facilis, mollitia quibusdam, corrupti unde explicabo a consequuntur. Voluptas, qui. Ut vitae facilis molestias quod commodi? At rem sit sunt iusto dolorum quia, velit odit fuga ea quos. Voluptatum deserunt optio, sed velit odit aliquam fuga ea iure cupiditate. Deserunt. Eveniet adipisci, perspiciatis eius voluptatem in omnis, nisi culpa enim! Corrupti itaque voluptates quasi sit blanditiis beatae assumenda, sed, fuga nulla fugit laudantium debitis dolorem ipsa nesciunt error doloribus ratione. Ea exercitationem, aperiam dolor maxime quasi assumenda cupiditate iure corrupti, ipsa quam perspiciatis consequatur! Voluptatum laboriosam necessitatibus illo praesentium harum quos sequi fuga, facere, voluptatem molestias, est odio ipsa, quam.</p><p style=\"text-align:justify;\">Error, est! Eveniet sunt fuga voluptate? Ad officia labore perspiciatis, illum modi delectus expedita hic inventore. Eligendi, qui, possimus. Delectus, commodi. Consectetur veniam quisquam sunt tempora molestiae reiciendis quidem ullam. Aut dolor, nemo reprehenderit commodi eaque expedita dolorum dolorem quidem explicabo ullam placeat. Deserunt eius beatae alias, ratione laboriosam necessitatibus voluptates quam reprehenderit soluta esse magni accusantium laborum cumque ex. Dolorem, deserunt, tempore! Ea delectus amet sed illo, totam repellat quidem tenetur itaque, iste nihil suscipit vero numquam quaerat nemo quas qui necessitatibus recusandae voluptatem doloremque error vitae quibusdam animi! Cumque itaque optio nihil mollitia quo rerum perferendis possimus quos, sed ipsa suscipit voluptatem cupiditate quae accusantium dolor necessitatibus. Unde consectetur blanditiis eveniet deserunt vel, omnis assumenda ratione temporibus architecto. Beatae nobis sit totam tempora natus sunt, nesciunt, dolor ratione possimus mollitia officia minima dicta repellendus nisi rerum ipsum, fugiat aliquam dolores, quod neque accusamus et ipsa atque? Maiores, iusto.</p>', 1, '2024-06-18 12:16:22', '2024-06-18 12:21:14'),
(11, 'Apple: Mengintegrasikan AI pada Produk dan Menjaga Privasi Pengguna', '2024-06-18', '667163c090d1e.png', '<p>Apple adalah perusahaan teknologi informasi teknologi terbesar didunia berdasarkan pendapatan. Perusahaan yang berbasis di California tersebut mendesain, mengembangkan dan menjual produk-produk teknologi cerdas ikonik seperti iPhone, iPad, Macs, Apple, Watch, TV, juga software dan layanan-layanan yang menyertainya. Pada tahun 2018, Apple menjadi perusahaan publik pertama yang bernilai di atas AS $1-triliun.</p><p><strong>Bagaimana Apple Menggunakan Artificial Intelligence?</strong><br>Visi Apple untuk masa depan adalah perangkat genggam yang mampu menjalankan machine learningnya sendiri pada rangkaian data yang dikumpulkan melalui rangkaian sensor mereka sendiri, Ini jelas berlawanan dengan visi masa depan yang didominasi oleh komputansi cloud dan terminal yang relatif berdaya rendah yang sering kali diunggulkan oleh perusahaan teknologi lainnya.</p><p>Satu contoh terbaru adalah pengembangan Neural Engine dalam model iPhone X terbaru. ini adalah chip yang didesain khusus untuk menjalankan kalkulasi jaringan saraf yang diperlukan untuk deep learning. Ini menjadikannya lebih cepat memproses fungsi-fungsi seperti login FaceID, fitur-fitur dalam kamera yang membantu pengguna mengambil gambar-gambar yang lebih baik (atau menambahkan efek-efek konyol), augmented reality dan mengatur daya tahan baterai.</p><p>Ini berkaitan dengan fokus Apple untuk mengamankan data pengguna. Dengan memastikan bahwa data pribadi yang sensitif tidak harus meninggalkan telepon sebelum bisa diproses oleh machine learning, Apple berharap konsumennya akan mempercayai data mereka aman bersama Apple.</p><p><strong>Apps yang Lebih Cerdas</strong><br>Memahami bagaimana ekosistem app-nya membuat para konsumen terus kembali ke Apple dari tahun ke tahun saat kontrak telepon mereka harus diperbaharui, Apple mendorong para developer mengintegrasikan AI dalam aplikasi pihak ketiganya. Taktik ini ditujukan untuk terus memberikan fungsionalitas yang menarik yang tidak tersedia pada platform mobile lainnya, Hingga saat ini Apple menyediakan perangkat-perangkat seperti Create ML pada para developer, yang memungkinkan mereka menjalankan aplikasi dengan machine learning pada perangkat para pengguna.</p><p>Satu contoh yang sangat baik adalah aplikasi yang bernama Homecourt, yang didesain untuk membantu menjadi wasit dalam pertandingan basket amatir. Yang harus pengguna lakukan hanyalah menunjuk kamera pada pertandingan yang sedang berlangsung, dan machine learning akan menamai pemain-pemain dalam pertandingan, mencatat kapan mereka mengoper dan menembakkan bola, juga merekam posisi mereka dilapangan. Semua ini dilakukan melalui teknologi computer vision yang dijalankan perangkat itu sendiri.</p><p><strong>Natural Language Processing</strong><br>Saat Apple meluncurkan Siri, Siri menjadi asisten pertama yang menggunakan AI dan natural language processing yang digunakan secara luas. Meskipun dikritik kurang inovatif dibandingkan yang terlihat dalam persaingan AI, pembaruan terkini menyediakan penerjemahan langsung antara 40 pasang bahasa yang dijalankan machine learning.</p><p>Penelitian NLP terkini di Apple fokus pada memberikan pengguna Siri hasil yang lebih akurat saat mereka mencari informasi tentang bisnis atau tempat-tempat menarik dalam area lokal mereka. Para peneliti memperkenalkan sinyal lokasi pada data training memberikan Siri akses untuk melokalisasi rangkaian data, termasuk nama-nama tempat dan perusahaan-perusahaan kecil. Secara teori, ia akan menggunakan data lokasi saat menerjemahkan bahasa yang diucapkan untuk menambahkan pemahaman akan apa yang pengguna maksudkan. Alexa akan memiliki kesempatan yang lebih baik dalam menebak, misalnya, jika seseorang mengutarakan kata-kata \"Aku akan ke Kilkenny\" bermaksud pergi ke sebuah kota di Irlandia (bernama Kilkenny) atau membunuh seseorang bernama Kenny (kill kenny).</p><p><strong>Tantangan Utama, Poin Pembelajaran, dan Hal yang Perlu Diingat</strong></p><ol><li>AI adalah inti dari strategi Apple, yang bertujuan menyertakan AI dalam susunan perangkat dan layanan pendukungnya.</li><li>Apple memprioritaskan privasi pengguna dibandingkan kemampuan untuk memompa semua data ke dalam cloud untuk melatih algoritma pada kumpulan data yang lebih besar.</li><li>Apple juga mempromosikan penggunaan platform machine learning miliknya Create ML unuk membuat aplikasi yang hanya bekerja pada perangkat-perangkat Apple, menjadikannya eksklusif dalam lingkup aplikasi Apple sendiri.</li></ol>', 2, '2024-06-18 12:38:56', '0000-00-00 00:00:00'),
(12, 'Twitter: Menggunakan Artificial Intelligence untuk Memerangi Berita Palsu dan Spambot', '2024-06-18', '667164d434b20.jpg', '<p style=\"text-align:justify;\">Ada lebih dari 330 juta pengguna Twitter menggunakan platform media sosial tersebut untuk mengirimkan ratusan juta tweet setiap hari. Sayangnya, karena besarnya jumlah pengguna yang menggunakan layanan tersebut dan sifatnya yang anonim, kadang berita yang diunggah 24/7 setiap harinya adalah palsu. Dan kadang orang lain yang menggunakan layanan tersebut sebenarnya tidak cocok dengan anda.</p><p style=\"text-align:justify;\">Raksasa media sosial tersebut menggunakan artificial intelligence (AI) untuk mengatasi tantangan besar menjaga penggunanya aman dari mereka yang menggunakan Twitter untuk menyebarkan informasi yang berbahaya.</p><p style=\"text-align:justify;\"><strong>Masalah Apa yang Artificial Intelligence Bantu Pecahkan?</strong><br>Era media sosial telah memberikan suara bagi semua orang. Dan, seperti yang selalu terjadi, beberapa orang memilih menggunakannya untuk menyebarkan kebohongan dan informasi yang salah. Entah itu karena alasan politik atau ketamakan, sejak kemunculan media sosial telah menjadi magnet bagi segala jenis penyebar berita palsu dan propaganda, hingga dan termasuk masalah-masalah yang berkaitan dengan pemilihan umum suatu negara.</p><p style=\"text-align:justify;\">Masalah ini timbul sebagian karena siapa pun bisa menampilkan diri mereka sebagai apa pun. Hanya dengan memilih satu nama dan sebuah avatar Anda memiliki profil tanpa nama yang dari situ anda bisa menyebarkan apa pun mulai dari rencana penipuan berantai hingga teori konspirasi dan propaganda teroris. Penelitian yang dilakukan oleh Knight Foundation menggambarkan masalah itu saat menemukan jutaan tweet berita palsu disebarkan melalui Twitter. Seperti banyak media sosial lainnya, Twitter ingin mengatasi masalah ini.</p><p style=\"text-align:justify;\"><strong>Bagaimana Artificial Intelligence Digunakan dalam Praktik?</strong><br>Sejak kesadaran publik mulai meningkat tentang seriusnya berita-berita palsu, Twitter mulai mengambil langkah proaktif untuk mengidentifikasikan dan menghapus akun-akun yang mengganggu dari layanannya. Dengan AI Twitter bisa mengidentifikasikan dan menutup hampir 10 juta akun setiap minggunya, tanpa harus menunggu sampai akun-akun tersebut dilaporkan oleh pengguna.</p><p style=\"text-align:justify;\">Cara kerjanya adalah mengidentifikasikan pola-pola dalam perilaku akun misalnya, akun tersebut terkait dengan situs berita yang dikenal menyebarkan berita palsu dan mencocokkan dengan pola-pola yang sebelumnya ditunjukkan oleh akun-akun palsu atau penipu. Jika satu akun telah ditandai sebagai akun yang mengganggu, akun tersebut akan dijadikan hanya bisa membaca, jadi pemilik akun tidak bisa menggunakan akunnya untuk mengunggah post.</p><p style=\"text-align:justify;\">Kemudian Twitter meminta pemilik akun untuk memverifikasikan diri mereka sendiri dengan sebagai manusia aktual dengan nomor telepon dan alamat email yang sebenarnya.</p><p style=\"text-align:justify;\"><strong>Teknologi, Perangkat, dan Data Apa yang Digunakan?</strong><br>Twitter mengatakan bahwa layanan tersebut tidak mau mendiskusikkan secara publik tanda-tanda apa yang Twitter gunakan untuk mendeteksi apakah sebuah akun palsu atau tidak untuk menghindari mereka yang ingin menggunakan informasi tersebut untuk mencari cara baru memberitakan berita palsu. Namun, sepertinya Twitter mencari akun-akun yang menunjukkan pola-pola aktivitas yang berhubungan dengan akun-akun palsu yang mengidentifikasikan sebelumnya.</p><p style=\"text-align:justify;\">Saat akun-akun yang mengikuti pola-pola tertentu di seputaran aktivitas-aktivitas tersebut juga secara konsisten terlihat menyerbarkan konten dari website-website yang diidentifikasikan tidak bisa dipercaya atau tidak jujur, maka kemungkinan besar akun-akun tersebut adalah akun-akun palsu.</p><p style=\"text-align:justify;\">AI melakukan hal ini dengan menganalisis semua tweet pribadi dari akun-akun yang diikuti seseorang pengguna, dan menilainya berdasarkan seberapa populernya tweet itu, interaksi-interaksi pengguna dengan pembuat tweet itu sebelumnya dan seberapa cocoknya tweet tersebut dengan tweet-tweet lain yang sudah berinteraksi dengan anda sebelumnya.</p><p style=\"text-align:justify;\"><strong>Apa Hasilnya?</strong><br>Dalam dua bulan, Twitter menggunakan perangkat deteksi otomatis untuk menutup lebih dari 70 juta akun palsu dan mencurigakan. Tahun demi tahun, 214% lebih banyak akun dihilangkan karena melanggar kebijakan spam. Pada saat yang sama, lapran-laporan dari para pengguna bahwa mereka menemukan akun spam menurun dari 25.000 laporan perhari di Maret 2018 menjadi 17.000 laporan perhari pada bulan Mei 2018.Twitter menganggap ini adalah bukti bahwa kebijakan proaktifnya menghapuskan akun palsu dan penipuan dari platform tersebut bahkan sebelum pengguna melihatnya.</p><p style=\"text-align:justify;\"><strong>Tantangan Utama, Poin Pembelajaran, dan Hal yang Harus Diingat</strong></p><ol><li><p style=\"text-align:justify;\">Para penipu dan mereka yang bertujuan jahat bisa diidentifikasikan dari perilaku online mereka menggunakan AI, menggunakan teknik-teknik yang sangat mirip dengan teknik yang digunakan oleh para pemasar untuk menentukan target iklan mereka.</p></li><li><p style=\"text-align:justify;\">Kadang anonimitas penting, oleh karena Twitter memahami bahwa sesekali meminta akun-akun mengidentifikasikan diri mereka bisa membatasi keterbatasan berbicara dalam cara-cara yang bisa jadi berbahaya, Twitter menjalankan badan penanggung jawab dan keamanan.</p></li><li><p style=\"text-align:justify;\">Twitter menyadari bahwa kebebasan berbicara yang diberikan platformnya penting, tapi yang paling penting adalah keamanan pada penggunanya. &nbsp;</p></li></ol>', 2, '2024-06-18 12:43:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sidebar`
--

CREATE TABLE `tb_sidebar` (
  `id` int(20) NOT NULL,
  `id_sidepost` int(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sidebar`
--

INSERT INTO `tb_sidebar` (`id`, `id_sidepost`, `created_at`) VALUES
(1, 7, '2024-06-18 05:09:30'),
(2, 9, '2024-06-18 05:09:30'),
(3, 8, '2024-06-18 05:09:30');

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
-- Indeks untuk tabel `tb_sidebar`
--
ALTER TABLE `tb_sidebar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sidepost` (`id_sidepost`),
  ADD KEY `id_sidepost_2` (`id_sidepost`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_sidebar`
--
ALTER TABLE `tb_sidebar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `tb_post_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_sidebar`
--
ALTER TABLE `tb_sidebar`
  ADD CONSTRAINT `tb_sidebar_ibfk_1` FOREIGN KEY (`id_sidepost`) REFERENCES `tb_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
