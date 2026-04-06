-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2026 pada 03.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `id_kategori`, `id_user`, `tanggal`) VALUES
(2, 'Pengaruh Teknologi terhadap Pendidikan', 'Teknologi telah menjadi bagian penting dalam kehidupan manusia, termasuk dalam bidang pendidikan. Perkembangan teknologi informasi dan komunikasi memberikan banyak perubahan dalam cara belajar dan mengajar, baik di sekolah maupun di perguruan tinggi.\r\nSalah satu pengaruh positif teknologi adalah memudahkan akses informasi. Dengan adanya internet, siswa dan mahasiswa dapat mencari berbagai sumber belajar dengan cepat dan mudah. Mereka tidak hanya bergantung pada buku, tetapi juga dapat belajar melalui artikel, jurnal, dan berbagai platform digital lainnya.\r\nSelain itu, teknologi juga membuat proses pembelajaran menjadi lebih menarik. Penggunaan media seperti video, animasi, dan aplikasi pembelajaran dapat meningkatkan minat belajar siswa. Hal ini membantu siswa lebih memahami materi yang disampaikan oleh guru.\r\nDi sisi lain, teknologi juga memungkinkan pembelajaran jarak jauh atau online. Dengan adanya aplikasi seperti Zoom, Google Meet, dan platform e-learning, kegiatan belajar tetap dapat dilakukan meskipun tidak bertatap muka secara langsung. Hal ini sangat membantu terutama dalam situasi tertentu seperti pandemi.\r\nNamun, teknologi juga memiliki dampak negatif jika tidak digunakan dengan bijak. Salah satunya adalah ketergantungan terhadap gadget yang dapat mengurangi konsentrasi belajar. Selain itu, adanya akses internet yang luas juga bisa membuat siswa terpapar informasi yang tidak sesuai.\r\nOleh karena itu, penggunaan teknologi dalam pendidikan harus disertai dengan pengawasan dan pemanfaatan yang tepat. Guru dan orang tua memiliki peran penting dalam mengarahkan siswa agar menggunakan teknologi untuk hal-hal yang bermanfaat.\r\nKesimpulannya, teknologi memberikan banyak manfaat dalam dunia pendidikan, seperti mempermudah akses informasi dan meningkatkan kualitas pembelajaran. Namun, penggunaannya harus tetap dikontrol agar tidak menimbulkan dampak negatif.', 3, 2, '2026-04-04 14:45:40'),
(5, 'Pengaruh Paparan Cahaya Biru terhadap Kualitas Tidur dan Ritme Sirkadian pada Remaja Usia 15–18 Tahun', 'Abstrak\r\nPenelitian ini bertujuan menganalisis dampak paparan cahaya biru dari layar digital terhadap kualitas tidur dan gangguan ritme sirkadian pada remaja. Sebanyak 120 responden dipilih menggunakan metode purposive sampling. Hasil menunjukkan korelasi negatif signifikan antara durasi paparan cahaya biru dengan kualitas tidur (r = -0,72; p &lt; 0,01).\r\nPendahuluan\r\nPenggunaan perangkat digital di kalangan remaja meningkat drastis dalam satu dekade terakhir. Cahaya biru (panjang gelombang 380–500 nm) yang dipancarkan layar elektronik diketahui menghambat sekresi melatonin, hormon yang berperan penting dalam regulasi tidur. Penelitian ini mengisi kesenjangan literatur mengenai populasi remaja di negara berkembang.\r\nMetode\r\nDesain studi menggunakan pendekatan kuantitatif korelasional. Data dikumpulkan melalui Pittsburgh Sleep Quality Index (PSQI) dan aktigrafi pergelangan tangan selama 14 hari. Analisis statistik menggunakan Pearson Correlation dan regresi linier berganda dengan SPSS v.26.\r\nHasil\r\nRata-rata paparan layar sebelum tidur adalah 2,4 jam/malam. Sebesar 68,3% responden mengalami kualitas tidur buruk (skor PSQI &gt; 5). Setiap penambahan 1 jam paparan cahaya biru berkorelasi dengan penundaan onset tidur rata-rata 23,7 menit.\r\nDiskusi\r\nTemuan ini konsisten dengan penelitian Chang et al. (2015) dan Harvard Medical School (2020) yang membuktikan bahwa cahaya biru menekan melatonin hingga dua kali lebih kuat dibanding cahaya hijau. Faktor sosioekonomis dan kebiasaan penggunaan media sosial turut memoderasi hubungan ini.\r\nKesimpulan\r\nPaparan cahaya biru berpengaruh signifikan terhadap penurunan kualitas tidur dan pergeseran fase sirkadian pada remaja. Intervensi berupa pembatasan screen time dan penggunaan filter cahaya biru direkomendasikan sebagai langkah preventif.\r\nDaftar Pustaka\r\nChang, A.M., et al. (2015). Evening use of light-emitting eReaders negatively affects sleep. PNAS, 112(4), 1232–1237.\r\nWalker, M. (2017). Why We Sleep. Scribner.\r\nWHO. (2022). Global report on adolescent health.', 1, 1, '2026-04-04 14:58:48'),
(7, 'Pentingnya Menjaga Pola Hidup Sehat di Era Modern', 'Di era modern saat ini, gaya hidup masyarakat cenderung berubah menjadi lebih praktis namun kurang sehat. Banyak orang yang lebih memilih makanan cepat saji dibandingkan makanan bergizi, serta menghabiskan waktu berjam-jam di depan layar tanpa aktivitas fisik yang cukup. Hal ini dapat berdampak buruk bagi kesehatan tubuh dalam jangka panjang.\r\n\r\nMenjaga pola hidup sehat merupakan langkah penting untuk meningkatkan kualitas hidup. Salah satu cara yang dapat dilakukan adalah dengan mengonsumsi makanan bergizi seimbang yang mengandung karbohidrat, protein, lemak sehat, vitamin, dan mineral. Selain itu, penting juga untuk memperbanyak konsumsi air putih agar tubuh tetap terhidrasi dengan baik.\r\n\r\nOlahraga secara rutin juga menjadi faktor penting dalam menjaga kesehatan. Aktivitas fisik seperti berjalan kaki, berlari, atau bersepeda dapat membantu meningkatkan kebugaran tubuh serta menjaga berat badan tetap ideal. Tidak perlu olahraga berat, yang penting dilakukan secara konsisten.\r\n\r\nSelain kesehatan fisik, kesehatan mental juga tidak boleh diabaikan. Stres yang berlebihan dapat memicu berbagai masalah kesehatan. Oleh karena itu, penting untuk mengelola stres dengan baik, seperti melakukan hobi, meditasi, atau beristirahat yang cukup.\r\n\r\nDengan menerapkan pola hidup sehat secara konsisten, kita dapat mencegah berbagai penyakit dan meningkatkan kualitas hidup. Mulailah dari hal kecil, karena perubahan besar selalu dimulai dari langkah sederhana.', 9, 1, '2026-04-06 00:00:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel_tag`
--

CREATE TABLE `artikel_tag` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Ilmiah'),
(3, 'Edukasi'),
(6, 'Teknologi'),
(7, 'Berita'),
(9, 'Kesehatan'),
(11, 'Opini');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_artikel`, `nama`, `isi`, `tanggal`) VALUES
(1, 2, 'tio', 'kerennn', '2026-04-04 15:15:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `nama_tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tag`
--

INSERT INTO `tag` (`id`, `nama_tag`) VALUES
(1, 'Pendidikan'),
(2, 'Sosial'),
(3, 'Budaya'),
(6, 'Machine Learning'),
(7, 'AI'),
(8, 'Politik'),
(9, 'Internasional'),
(10, 'Kesehatan'),
(11, 'Motivasi'),
(12, 'Sekolah'),
(15, 'Digital'),
(16, 'Pola makan'),
(17, 'Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','author') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'author', '202cb962ac59075b964b07152d234b70', 'author');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `artikel_tag`
--
ALTER TABLE `artikel_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `artikel_tag`
--
ALTER TABLE `artikel_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
