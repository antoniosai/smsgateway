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
(1,	'Administrator',	'admin',	'admin@mail.com',	'$2y$10$mfxBez4A3x9kSFZq39B6UuyyNJovC4IPWb42d.Vo9mt77rcDGp.gG',	NULL,	'2018-08-26 05:58:43',	'2018-08-25 23:01:07');

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
(14,	'Pemberitahuan Jadwal Mengajar pada Hari Senin tanggal 26-Aug-2018 untuk Guru Dadang Suhendar S.Pd, (08121494007)',	'08121494007',	'Selemat Pagi Dadang Suhendar S.Pd,, Jadwal Mengajar Anda pada hari Senin tanggal 26 Aug 2018 adalah Bahasa Inggris pada jam 07:00:00 sampai 08:20:00 di Kelas XI TKJ 3\n        \n        Jangan membalas Pesan Ini',	'2018-08-26 23:52:01',	'2018-08-26 23:52:01');

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
(2,	1,	'Bahasa Inggris',	'Bahasa Inggris');

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
  `student_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rooms` (`id`, `teacher_id`, `student_id`, `name`) VALUES
(1,	1,	1,	'XI TKJ 3');

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
(1,	1,	1,	1,	'07:00:00',	'08:20:00',	'2018-08-26 20:32:34',	'2018-08-26 20:32:34'),
(2,	1,	2,	1,	'07:00:00',	'08:20:00',	'2018-08-26 20:32:34',	'2018-08-26 20:32:34');

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


DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(10) unsigned DEFAULT NULL,
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

INSERT INTO `students` (`id`, `room_id`, `nis`, `username`, `birthplace`, `birthdate`, `gender_id`, `religion_id`, `phone`, `name`, `address`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	'1406019',	'1406019',	'Garut',	'1996-09-09',	1,	1,	'08121494007',	'Antonio McRae',	'Garut',	'finallyantonio@gmail.com',	'$2y$10$wC7dU/xz4e7hB3ErumRvueS1Fjzew4dOrHpAEoZIdAVGrvcsUTEO6',	NULL,	'2018-08-25 23:18:01',	'2018-08-25 23:18:01'),
(6,	1,	'1406009',	'1406009',	'Garut',	'1996-09-09',	1,	1,	'087878268445',	'Diky Anggara',	'Garut',	'1406009@gmail.com',	'$2y$10$wC7dU/xz4e7hB3ErumRvueS1Fjzew4dOrHpAEoZIdAVGrvcsUTEO6',	NULL,	'2018-08-25 23:18:01',	'2018-08-25 23:18:01');

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
(1,	'1404521',	'1404521',	'Garut',	'1996-09-09',	1,	5,	'08121494007',	'Dadang Suhendar S.Pd,',	'Grut',	'dadang@gmail.com',	'$2y$10$Kv2mdb51n5VJ.M5X63ygXuDnsEuyXF7PHoKcQHaA2jVeuEA8gOfLi',	NULL,	'2018-08-25 23:15:48',	'2018-08-25 23:15:48');

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


-- 2018-08-27 05:12:15