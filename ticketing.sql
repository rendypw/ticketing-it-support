-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2025 pada 22.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id` int(5) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `ticket_id` varchar(50) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `file_catatan` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id`, `user_id`, `ticket_id`, `catatan`, `file_catatan`, `updated_at`, `created_at`) VALUES
(1, '1', '2', 'dalam pengecekan, membutuhkan waktu 2 hari', 'FileCatatan/1752591244-coba2.jpg', '2025-07-15 07:54:04', '2025-07-15 07:54:04'),
(2, '1', '7', 'sedang di cek', NULL, '2025-07-15 10:46:35', '2025-07-15 10:46:35'),
(3, '1', '7', 'sudah berhasil silahkan cek', 'FileCatatan/1752601627-persentasi HRD fixed.pdf', '2025-07-15 10:47:07', '2025-07-15 10:47:07'),
(4, '1', '5', 'sedang dilakukan uji coba', NULL, '2025-07-15 11:46:07', '2025-07-15 11:46:07'),
(5, '1', '5', 'sudah bisa', NULL, '2025-07-15 11:47:05', '2025-07-15 11:47:05'),
(6, '1', '3', 'itu hanya butuh restart', NULL, '2025-07-15 12:23:32', '2025-07-15 12:23:32'),
(7, '1', '1', 'coba restart', NULL, '2025-07-15 12:24:41', '2025-07-15 12:24:41'),
(8, '1', '1', 'jika masih terasa silahkan ajukan ticket kembali', NULL, '2025-07-15 12:25:01', '2025-07-15 12:25:01'),
(9, '1', '9', 'user segera cek ke lokasi', NULL, '2025-07-15 12:41:11', '2025-07-15 12:41:11'),
(10, '1', '9', 'sudah selesai, bila ada kendala lain silahkan buat ticket baru', NULL, '2025-07-15 12:41:35', '2025-07-15 12:41:35'),
(11, '1', '10', 'dicoba terlebih dahulu', NULL, '2025-07-15 12:41:59', '2025-07-15 12:41:59'),
(12, '1', '10', 'jika masih terkendala silangkah buat ticket baru', NULL, '2025-07-15 12:42:29', '2025-07-15 12:42:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Hardware', NULL, NULL),
(2, 'Software', NULL, NULL),
(3, 'Jaringan', NULL, NULL),
(4, 'Lain-lain', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_history`
--

CREATE TABLE `log_history` (
  `id` int(20) NOT NULL,
  `db_ticket` varchar(50) DEFAULT NULL,
  `db_user` varchar(10) DEFAULT NULL,
  `db_catatan` varchar(10) DEFAULT NULL,
  `user_id` varchar(5) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_history`
--

INSERT INTO `log_history` (`id`, `db_ticket`, `db_user`, `db_catatan`, `user_id`, `tindakan`, `catatan`, `updated_at`, `created_at`) VALUES
(3, '-', '1', '-', '1', 'update', 'Melakukan perubahan data User', '2025-07-15 11:25:42', '2025-07-15 11:25:42'),
(4, '-', '1', '-', '1', 'update', 'Melakukan perubahan data User', '2025-07-15 11:26:46', '2025-07-15 11:26:46'),
(5, '-', '3', '-', '1', 'update', 'Melakukan perubahan data User', '2025-07-15 11:27:12', '2025-07-15 11:27:12'),
(6, '-', '5', '-', '1', 'create', 'Melakukan penambahan User', '2025-07-15 11:34:51', '2025-07-15 11:34:51'),
(7, '8', '-', '-', '4', 'create', 'Melakukan pengajuan Ticket', '2025-07-15 11:38:41', '2025-07-15 11:38:41'),
(8, '-', '-', '4', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 11:46:07', '2025-07-15 11:46:07'),
(9, '-', '-', '5', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 11:47:05', '2025-07-15 11:47:05'),
(10, '5', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : Closed', '2025-07-15 11:48:11', '2025-07-15 11:48:11'),
(11, '-', '-', '6', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 12:23:32', '2025-07-15 12:23:32'),
(12, '3', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : On Progress', '2025-07-15 12:23:32', '2025-07-15 12:23:32'),
(13, '-', '-', '7', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 12:24:41', '2025-07-15 12:24:41'),
(14, '1', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : On Progress', '2025-07-15 12:24:41', '2025-07-15 12:24:41'),
(15, '-', '-', '8', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 12:25:01', '2025-07-15 12:25:01'),
(16, '1', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : Resolved', '2025-07-15 12:25:01', '2025-07-15 12:25:01'),
(17, '9', '-', '-', '3', 'create', 'Melakukan pengajuan Ticket', '2025-07-15 12:36:37', '2025-07-15 12:36:37'),
(18, '10', '-', '-', '3', 'create', 'Melakukan pengajuan Ticket', '2025-07-15 12:36:49', '2025-07-15 12:36:49'),
(19, '11', '-', '-', '3', 'create', 'Melakukan pengajuan Ticket', '2025-07-15 12:37:07', '2025-07-15 12:37:07'),
(20, '-', '-', '9', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 12:41:11', '2025-07-15 12:41:11'),
(21, '9', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : On Progress', '2025-07-15 12:41:11', '2025-07-15 12:41:11'),
(22, '-', '-', '10', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 12:41:35', '2025-07-15 12:41:35'),
(23, '9', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : Resolved', '2025-07-15 12:41:35', '2025-07-15 12:41:35'),
(24, '9', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : Closed', '2025-07-15 12:41:38', '2025-07-15 12:41:38'),
(25, '-', '-', '11', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 12:41:59', '2025-07-15 12:41:59'),
(26, '10', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : On Progress', '2025-07-15 12:41:59', '2025-07-15 12:41:59'),
(27, '-', '-', '12', '1', 'create', 'Memberikan catatan Ticketing', '2025-07-15 12:42:29', '2025-07-15 12:42:29'),
(28, '10', '-', '-', '1', 'create', 'Melakukan perubahan status ticket menjadi : Resolved', '2025-07-15 12:42:29', '2025-07-15 12:42:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_15_134621_create_kategoris_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticketing`
--

CREATE TABLE `ticketing` (
  `id` int(5) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `kategori_id` varchar(2) NOT NULL,
  `ticket_no` varchar(50) NOT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ticketing`
--

INSERT INTO `ticketing` (`id`, `user_id`, `kategori_id`, `ticket_no`, `file_upload`, `keterangan`, `status`, `updated_at`, `created_at`) VALUES
(1, '1', '4', 'IT-LL/0001', NULL, 'komputer lag tidak bisa buka apapun', 'Resolved', '2025-07-15 12:25:01', '2025-07-14 07:43:03'),
(2, '2', '4', 'IT-LL/0002', NULL, 'Printer tidak konek', 'On Progress', '2025-07-14 07:54:04', '2025-07-14 07:43:26'),
(3, '2', '1', 'IT-H/0003', NULL, 'komputer hang', 'On Progress', '2025-07-15 12:23:32', '2025-07-14 07:47:05'),
(4, '1', '2', 'IT-S/0004', NULL, 'word error', 'Open', '2025-07-15 07:55:55', '2025-07-14 07:55:55'),
(5, '2', '4', 'IT-LL/0005', 'FileUpload/1752591936-coba1.png', 'komputer tiba tiba mati', 'Closed', '2025-07-15 11:48:11', '2025-07-15 08:05:36'),
(6, '2', '2', 'IT-S/0006', NULL, 'internet mati', 'Open', '2025-07-15 08:07:46', '2025-07-15 08:07:46'),
(7, '4', '2', 'IT-S/0007', 'FileUpload/1752598109-persentasi HRD.pdf', 'pdf tidak bisa dibuka', 'Closed', '2025-07-15 11:02:29', '2025-07-15 09:48:29'),
(8, '4', '2', 'IT-S/0008', 'FileUpload/1752604721-soal_tes.docx', 'word tidak berfungsi', 'Open', '2025-07-15 11:38:41', '2025-07-15 11:38:41'),
(9, '3', '1', 'IT-H/0009', 'FileUpload/1752608197-coba1.png', 'tidak bisa login', 'Closed', '2025-07-15 12:41:38', '2025-07-15 12:36:37'),
(10, '3', '2', 'IT-S/0010', 'FileUpload/1752608209-coba2.jpg', 'lupa password', 'Resolved', '2025-07-15 12:42:29', '2025-07-15 12:36:49'),
(11, '3', '3', 'IT-J/0011', NULL, 'tidak bisa internet', 'Open', '2025-07-15 12:37:07', '2025-07-15 12:37:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rendyanto', 'rendypw', 'rendyanto.dev@gmail.com', NULL, '$2y$10$/F2tBs3S7eab1gzrnQ.uXuT6MpB1K5f0kYg9kZ.kt5qR1tqqhQby6', 'Admin', NULL, '2025-07-15 14:17:46', '2025-07-15 11:26:46'),
(2, 'Produksi', 'produksi', 'produksi@gmail.com', NULL, '$2y$10$/F2tBs3S7eab1gzrnQ.uXuT6MpB1K5f0kYg9kZ.kt5qR1tqqhQby6', 'User', NULL, '2025-07-15 14:31:47', '2025-07-15 14:31:47'),
(3, 'Produksi S.T', 'produksi2', 'produksi2@gmail.com', NULL, '$2y$10$oGUd2zqDmQ9kI8gENyVRmeqXCYfhk6gI55n58iezkh5lPGYRy6hqq', 'User', NULL, '2025-07-15 09:18:40', '2025-07-15 11:27:12'),
(4, 'HRD', 'hrd', 'hrd@mgil.com', NULL, '$2y$10$TTGmVraTMkklb7WVps.Mp.u1/zWh.B0/hDo3gxG4xIsO9P6e/nF66', 'User', NULL, '2025-07-15 09:34:15', '2025-07-15 09:34:15'),
(5, 'Manajemen', 'manajemen', 'manajemen@gmail.com', NULL, '$2y$10$2R8IcGTNHKSTUcIrm8OiN.OWtqrwDxTXLk.DiaZhCSoS9puxFyXH.', 'User', NULL, '2025-07-15 11:34:51', '2025-07-15 11:34:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `ticketing`
--
ALTER TABLE `ticketing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `log_history`
--
ALTER TABLE `log_history`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ticketing`
--
ALTER TABLE `ticketing`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
