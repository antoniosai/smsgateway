-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `smsgateway` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `smsgateway`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Administrator',	'admin',	'admin@mail.com',	'$2y$10$mfxBez4A3x9kSFZq39B6UuyyNJovC4IPWb42d.Vo9mt77rcDGp.gG',	'PjB4d2g5MLpGeo0vrImmhYp4y9rj4dEK86Odz64LM2Y6o1wuy9WGtvYCAQFL',	'2018-08-26 05:58:43',	'2018-08-28 07:08:52');

DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `broadcasts`;
CREATE TABLE `broadcasts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `broadcasts` (`id`, `name`, `destination`, `message`, `created_at`, `updated_at`) VALUES
(1,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Selemat Pagi Antonio McRae, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:32',	'2018-08-26 23:51:32'),
(2,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Selemat Pagi Diky Anggara, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:32',	'2018-08-26 23:51:32'),
(3,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Selemat Pagi Antonio McRae, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:32',	'2018-08-26 23:51:32'),
(4,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Selemat Pagi Diky Anggara, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:32',	'2018-08-26 23:51:32'),
(5,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Selemat Pagi Antonio McRae, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:45',	'2018-08-26 23:51:45'),
(6,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Selemat Pagi Diky Anggara, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:45',	'2018-08-26 23:51:45'),
(7,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Selemat Pagi Antonio McRae, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:45',	'2018-08-26 23:51:45'),
(8,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Selemat Pagi Diky Anggara, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:51:45',	'2018-08-26 23:51:45'),
(9,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Selemat Pagi Antonio McRae, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:52:01',	'2018-08-26 23:52:01'),
(10,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Selemat Pagi Diky Anggara, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:52:01',	'2018-08-26 23:52:01'),
(11,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Selemat Pagi Antonio McRae, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:52:01',	'2018-08-26 23:52:01'),
(12,	'Pemberitahuan Jadwal Belajar Hari Senin tanggal 26-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Selemat Pagi Diky Anggara, Jadwal Belajar pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:52:01',	'2018-08-26 23:52:01'),
(13,	'Pemberitahuan Jadwal Mengajar pada Hari Senin tanggal 26-Aug-2018 untuk Guru Dadang Suhendar S.Pd, (08121494007)',	'08121494007',	'Selemat Pagi Dadang Suhendar S.Pd,, Jadwal Mengajar Anda pada hari Senin tanggal 26 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:20:00 di Kelas XI TKJ 3\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:52:01',	'2018-08-26 23:52:01'),
(14,	'Pemberitahuan Jadwal Mengajar pada Hari Senin tanggal 26-Aug-2018 untuk Guru Dadang Suhendar S.Pd, (08121494007)',	'08121494007',	'Selemat Pagi Dadang Suhendar S.Pd,, Jadwal Mengajar Anda pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 di Kelas XI TKJ 3\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:52:01',	'2018-08-26 23:52:01'),
(15,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Pemberitahuan, Kepada :  Antonio McRae, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(16,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Pemberitahuan, Kepada :  Diky Anggara, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(17,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Dadang (081214940074)',	'081214940074',	'Pemberitahuan, Kepada :  Dadang, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(18,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio Saiful (081213123213)',	'081213123213',	'Pemberitahuan, Kepada :  Antonio Saiful, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(19,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Pemberitahuan, Kepada :  Antonio McRae, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(20,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Pemberitahuan, Kepada :  Diky Anggara, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(21,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Dadang (081214940074)',	'081214940074',	'Pemberitahuan, Kepada :  Dadang, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(22,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio Saiful (081213123213)',	'081213123213',	'Pemberitahuan, Kepada :  Antonio Saiful, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(23,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Lilis Holisoh (1231321)',	'1231321',	'Pemberitahuan, Kepada :  Lilis Holisoh, Jadwal Belajar anak Anda Antonio McRae pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:22:26',	'2018-08-28 06:22:26'),
(24,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Pemberitahuan, Kepada :  Antonio McRae, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(25,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Pemberitahuan, Kepada :  Diky Anggara, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(26,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio Saiful (081213123213)',	'081213123213',	'Pemberitahuan, Kepada :  Antonio Saiful, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(27,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio McRae (08121494007)',	'08121494007',	'Pemberitahuan, Kepada :  Antonio McRae, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(28,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Diky Anggara (087878268445)',	'087878268445',	'Pemberitahuan, Kepada :  Diky Anggara, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(29,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Antonio Saiful (081213123213)',	'081213123213',	'Pemberitahuan, Kepada :  Antonio Saiful, Jadwal Belajar pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(30,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Lilis Holisoh (1231321)',	'1231321',	'Pemberitahuan, Kepada :  Lilis Holisoh, Jadwal Belajar anak Anda Antonio McRae pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(31,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Lilis Holisoh (1231321)',	'1231321',	'Pemberitahuan, Kepada :  Lilis Holisoh, Jadwal Belajar anak Anda Diky Anggara pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(32,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Lilis Holisoh (0812142214124)',	'0812142214124',	'Pemberitahuan, Kepada :  Lilis Holisoh, Jadwal Belajar anak Anda Antonio Saiful pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(33,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Lilis Holisoh (1231321)',	'1231321',	'Pemberitahuan, Kepada :  Lilis Holisoh, Jadwal Belajar anak Anda Antonio McRae pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(34,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Lilis Holisoh (1231321)',	'1231321',	'Pemberitahuan, Kepada :  Lilis Holisoh, Jadwal Belajar anak Anda Diky Anggara pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(35,	'Pemberitahuan Jadwal Belajar Hari Selasa tanggal 28-Aug-2018 untuk Siswa Lilis Holisoh (0812142214124)',	'0812142214124',	'Pemberitahuan, Kepada :  Lilis Holisoh, Jadwal Belajar anak Anda Antonio Saiful pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 oleh Guru Dadang Suhendar S.Pd,\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(36,	'Pemberitahuan Jadwal Mengajar pada Hari Selasa tanggal 28-Aug-2018 untuk Guru Dadang Suhendar S.Pd, (08121494007)',	'08121494007',	'Pemberitahuan, Kepada :  Dadang Suhendar S.Pd,, Jadwal Mengajar Anda pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 08:40:00 sampai 10:00:00 di Kelas X TKJ 3\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(37,	'Pemberitahuan Jadwal Mengajar pada Hari Selasa tanggal 28-Aug-2018 untuk Guru Dadang Suhendar S.Pd, (08121494007)',	'08121494007',	'Pemberitahuan, Kepada :  Dadang Suhendar S.Pd,, Jadwal Mengajar Anda pada hari Selasa tanggal 28 Aug 2018 adalah Matematika pada jam 07:00:00 sampai 08:00:00 di Kelas X TKJ 3\n        \n        Jangan membalas Pesan Ini',	'2018-08-28 06:28:42',	'2018-08-28 06:28:42'),
(38,	'Pengumuman Tanggal 28 Aug 2018',	'08121494007',	'test',	'2018-08-28 06:42:44',	'2018-08-28 06:42:44'),
(39,	'Pengumuman Tanggal 28 Aug 2018',	'087878268445',	'test',	'2018-08-28 06:42:44',	'2018-08-28 06:42:44'),
(40,	'Pengumuman Tanggal 28 Aug 2018',	'081213123213',	'test',	'2018-08-28 06:42:44',	'2018-08-28 06:42:44'),
(41,	'Pengumuman Tanggal 28 Aug 2018',	'08121494007',	'Untuk Semua Guru!!!',	'2018-08-28 06:43:20',	'2018-08-28 06:43:20'),
(42,	'Pengumuman Tanggal 28 Aug 2018',	'082121739371',	'Untuk Semua Guru!!!',	'2018-08-28 06:43:20',	'2018-08-28 06:43:20');

DROP TABLE IF EXISTS `days`;
CREATE TABLE `days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `days` (`id`, `name`) VALUES
(1,	'Senin'),
(2,	'Selasa'),
(3,	'Rabu'),
(4,	'Kamis'),
(5,	'Jumat'),
(6,	'Sabtu');

DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `genders` (`id`, `name`) VALUES
(1,	'Laki-laki'),
(2,	'Peremupuan');

DROP TABLE IF EXISTS `konten`;
CREATE TABLE `konten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `lessons`;
CREATE TABLE `lessons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `lessons` (`id`, `teacher_id`, `name`, `description`) VALUES
(1,	1,	'Matematika',	'Matematika'),
(2,	1,	'Bahasa Inggris',	'Bahasa Inggris'),
(3,	2,	'Komputer dan Jaringan',	'123123');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2018_05_27_060415_create_admins_table',	1),
(4,	'2018_05_27_060416_create_admin_password_resets_table',	1),
(5,	'2018_05_27_060422_create_students_table',	1),
(6,	'2018_05_27_060423_create_student_password_resets_table',	1),
(7,	'2018_05_27_060427_create_teachers_table',	1),
(8,	'2018_05_27_060428_create_teacher_password_resets_table',	1),
(9,	'2018_05_27_060836_create_genders_table',	1),
(10,	'2018_05_27_060944_create_religions_table',	1),
(11,	'2018_05_27_075346_create_rooms_table',	1),
(12,	'2018_05_27_075354_create_rombels_table',	1),
(13,	'2018_05_27_154133_create_infos_table',	1),
(14,	'2018_05_27_202848_create_kontens_table',	1),
(15,	'2018_05_28_145806_create_jadwals_table',	1),
(16,	'2018_05_28_150510_create_days_table',	1),
(17,	'2018_05_28_152940_create_lessons_table',	1),
(18,	'2018_08_19_102936_create_broadcasts_table',	1);

DROP TABLE IF EXISTS `parents`;
CREATE TABLE `parents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  `phone` varchar(50) DEFAULT '0',
  `birthplace` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `parents` (`id`, `name`, `phone`, `birthplace`, `birthdate`, `job`) VALUES
(1,	'Lilis Holisoh',	'0812142214124',	'Garut',	'1996-09-09',	'IRT'),
(5,	'Lilis Holisoh',	'1231321',	'Garut',	'1996-09-09',	'08121494007'),
(6,	'Lilis Holisoh',	'1231321',	'Garut',	'1996-09-09',	'08121494007');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `religions`;
CREATE TABLE `religions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `religions` (`id`, `name`) VALUES
(1,	'Islam'),
(2,	'Potestan'),
(3,	'Katholik'),
(4,	'Hindu'),
(5,	'Kong Hu Cu');

DROP TABLE IF EXISTS `rombels`;
CREATE TABLE `rombels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rooms` (`id`, `teacher_id`, `student_id`, `name`) VALUES
(2,	2,	NULL,	'X TKJ 3');

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(10) unsigned NOT NULL,
  `lesson_id` int(10) unsigned NOT NULL,
  `day_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `schedule` (`id`, `room_id`, `lesson_id`, `day_id`, `start`, `end`, `created_at`, `updated_at`) VALUES
(3,	2,	3,	1,	'07:40:00',	'08:40:00',	'2018-08-27 13:39:29',	'2018-08-27 13:39:29'),
(4,	2,	1,	2,	'08:40:00',	'10:00:00',	'2018-08-27 13:39:57',	'2018-08-27 13:39:57'),
(5,	2,	1,	1,	'07:00:00',	'07:40:00',	'2018-08-28 05:13:31',	'2018-08-28 05:13:31'),
(6,	2,	1,	2,	'07:00:00',	'08:00:00',	'2018-08-28 05:14:49',	'2018-08-28 05:14:49');

DROP TABLE IF EXISTS `schedule_exam`;
CREATE TABLE `schedule_exam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(10) unsigned NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `lesson_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_schedule_exam_rooms` (`room_id`),
  KEY `FK_schedule_exam_teachers` (`teacher_id`),
  KEY `FK_schedule_exam_lessons` (`lesson_id`),
  CONSTRAINT `FK_schedule_exam_lessons` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_schedule_exam_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_schedule_exam_teachers` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `schedule_exam` (`id`, `room_id`, `teacher_id`, `lesson_id`, `date`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1,	2,	1,	2,	'2018-08-28',	'12:11:48',	'12:11:49',	'2018-08-28 12:11:50',	'2018-08-28 12:11:51'),
(2,	2,	1,	1,	'2018-08-29',	'10:00:00',	'13:00:00',	'2018-08-28 05:28:36',	'2018-08-28 05:29:28');

DROP TABLE IF EXISTS `school_info`;
CREATE TABLE `school_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_semester` enum('I','II') COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `school_info` (`id`, `name`, `address`, `email`, `phone`, `active_year`, `active_semester`, `logo`) VALUES
(1,	'SMK Al-Ghifari',	'Jl. Banyuresmi',	'smk@gmail.com',	'0812312312321',	'2018/2019',	'I',	'logo.png');

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(10) unsigned DEFAULT NULL,
  `parents_id` int(10) unsigned DEFAULT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthplace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender_id` int(10) unsigned NOT NULL,
  `religion_id` int(10) unsigned NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_nis_unique` (`nis`),
  UNIQUE KEY `students_username_unique` (`username`),
  UNIQUE KEY `students_phone_unique` (`phone`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `students` (`id`, `room_id`, `parents_id`, `nis`, `username`, `birthplace`, `birthdate`, `gender_id`, `religion_id`, `phone`, `name`, `address`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	2,	6,	'1406019',	'1406019',	'Garut',	'1996-09-09',	1,	1,	'08121494007',	'Antonio McRae',	'Garut',	'finallyantonio@gmail.com',	'$2y$10$HiXh/v.av3zcNRsnRU4igesVYPhqj4JD/GLgjMKKCx4bJUq6txxhe',	NULL,	'2018-08-25 23:18:01',	'2018-08-28 06:13:56'),
(6,	2,	5,	'1406009',	'1406009',	'Garut',	'1996-09-09',	1,	1,	'087878268445',	'Diky Anggara',	'Garut',	'1406009@gmail.com',	'$2y$10$6KH4ylYA7UfDmMB/w8vciuTCtXcY6UQap2Tzeb5KrCeYzb4e6fyNq',	NULL,	'2018-08-25 23:18:01',	'2018-08-28 06:14:01'),
(9,	2,	1,	'14051023213',	'14051023213',	'Garut',	'1996-09-09',	1,	1,	'081213123213',	'Antonio Saiful',	'Garut',	'test@mail.com',	'$2y$10$koais85lHxZrAZLZLbtUn.4tqoapcPH08Rm5lyM0C32piFnh6H2fe',	NULL,	'2018-08-28 05:48:59',	'2018-08-28 05:48:59');

DROP TABLE IF EXISTS `student_password_resets`;
CREATE TABLE `student_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `student_password_resets_email_index` (`email`),
  KEY `student_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthplace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender_id` int(10) unsigned NOT NULL,
  `religion_id` int(10) unsigned NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_nip_unique` (`nip`),
  UNIQUE KEY `teachers_username_unique` (`username`),
  UNIQUE KEY `teachers_phone_unique` (`phone`),
  UNIQUE KEY `teachers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `teachers` (`id`, `nip`, `username`, `birthplace`, `birthdate`, `gender_id`, `religion_id`, `phone`, `name`, `address`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'1404521',	'1404521',	'Garut',	'1996-09-09',	1,	5,	'08121494007',	'Dadang Suhendar S.Pd,',	'Grut',	'dadang@gmail.com',	'$2y$10$Kv2mdb51n5VJ.M5X63ygXuDnsEuyXF7PHoKcQHaA2jVeuEA8gOfLi',	NULL,	'2018-08-25 23:15:48',	'2018-08-25 23:15:48'),
(2,	'14060111',	'14060111',	'Garut',	'1995-04-12',	1,	1,	'082121739371',	'Rizki Slamet Priadi',	'Garut',	'rizki@gmail.com',	'$2y$10$DfPQwKOoJtFf2GKogzA9y.Zkn4Y9NWOK7X1wP351MS2.Fa6zTEFxW',	NULL,	'2018-08-27 13:35:55',	'2018-08-27 13:35:55');

DROP TABLE IF EXISTS `teacher_password_resets`;
CREATE TABLE `teacher_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `teacher_password_resets_email_index` (`email`),
  KEY `teacher_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2018-08-28 15:15:26