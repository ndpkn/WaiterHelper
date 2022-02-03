-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 12 2021 г., 12:44
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1135833_off`
--

-- --------------------------------------------------------

--
-- Структура таблицы `email`
--

CREATE TABLE `email` (
  `email_id` int(12) NOT NULL,
  `users_id` int(12) NOT NULL,
  `email_adress` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_confirmation` int(10) NOT NULL,
  `email_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_hash_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `email`
--

INSERT INTO `email` (`email_id`, `users_id`, `email_adress`, `email_confirmation`, `email_hash`, `email_hash_time`) VALUES
(1, 17, 'kor.dima97@mail.ru', 1, 'e2caa88596b7ea5d84c90aae00268035', '2021-12-05 16:34:39'),
(2, 19, 'denis.nedopokin@gmail.com', 1, '28bdd92d90971e1c89e58cfb02bc1771', '2021-11-17 18:24:24'),
(3, 23, '', 0, '', '0000-00-00 00:00:00'),
(4, 25, '', 0, '', '0000-00-00 00:00:00'),
(16, 0, '', 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `information`
--

CREATE TABLE `information` (
  `information_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `information_percent` int(11) DEFAULT NULL,
  `information_kassa` int(12) NOT NULL,
  `information_tips` int(11) DEFAULT NULL,
  `information_taxi` int(11) DEFAULT NULL,
  `information_rub` int(11) DEFAULT NULL,
  `information_other` int(11) DEFAULT NULL,
  `information_date` date NOT NULL,
  `information_work_place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `information`
--

INSERT INTO `information` (`information_id`, `users_id`, `information_percent`, `information_kassa`, `information_tips`, `information_taxi`, `information_rub`, `information_other`, `information_date`, `information_work_place`) VALUES
(2, 17, 1350, 27000, 1350, 150, 100, 0, '2021-08-08', 'Понтон'),
(3, 19, 1200, 24000, 700, 150, 150, 0, '2021-08-10', 'Понтон'),
(4, 17, 1900, 38000, 2500, 300, 100, 100, '2021-08-10', 'Понтон'),
(5, 17, 1000, 20000, 800, 100, 50, 0, '2021-08-01', 'Понтон'),
(6, 17, 1200, 24000, 1200, 200, 100, 900, '2021-08-02', 'Понтон'),
(7, 17, 1150, 23000, 1000, 150, 100, 400, '2021-08-03', 'Понтон'),
(8, 17, 1650, 33000, 1300, 150, 150, 0, '2021-08-07', 'Понтон'),
(9, 17, 2860, 57200, 3000, 100, 100, 0, '2021-07-01', 'Понтон'),
(10, 17, 1000, 20000, 400, 100, 100, 0, '2021-07-04', 'Понтон'),
(11, 17, 1000, 20000, 900, 100, 100, 0, '2021-07-05', 'Понтон'),
(12, 17, 1000, 20000, 800, 100, 100, 0, '2021-07-06', 'Понтон'),
(13, 17, 1240, 24800, 1950, 100, 100, 0, '2021-07-08', 'Понтон'),
(14, 17, 1540, 30800, 1100, 100, 100, 0, '2021-07-11', 'Понтон'),
(15, 17, 2500, 50000, 1650, 100, 100, 0, '2021-07-12', 'Понтон'),
(16, 17, 1750, 35000, 1750, 100, 100, 0, '2021-07-13', 'Понтон'),
(17, 17, 2000, 40000, 950, 100, 100, 0, '2021-07-14', 'Понтон'),
(18, 17, 1600, 32000, 1800, 100, 100, 0, '2021-07-17', 'Понтон'),
(19, 17, 1050, 21000, 1500, 100, 100, 0, '2021-07-18', 'Понтон'),
(20, 17, 1000, 20000, 900, 100, 100, 0, '2021-07-19', 'Понтон'),
(21, 17, 2640, 52800, 4800, 250, 150, 0, '2021-07-22', 'Понтон'),
(22, 17, 1421, 28420, 1450, 150, 100, 0, '2021-07-23', 'Понтон'),
(23, 17, 2800, 56000, 4500, 200, 150, 0, '2021-07-24', 'Понтон'),
(24, 17, 1962, 39240, 1350, 150, 100, 0, '2021-07-25', 'Понтон'),
(25, 17, 1650, 33000, 900, 150, 150, 300, '2021-07-26', 'Понтон'),
(26, 17, 1500, 30000, 2000, 100, 100, 0, '2021-07-28', 'Понтон'),
(27, 17, 1320, 26400, 750, 150, 150, 300, '2021-07-30', 'Понтон'),
(28, 17, 3250, 65000, 2400, 150, 150, 0, '2021-07-31', 'Понтон'),
(29, 19, 1700, 34000, 1250, 150, 100, 0, '2021-08-12', 'Понтон'),
(30, 17, 1000, 20000, 1300, 130, 100, 0, '2021-08-13', 'Понтон'),
(31, 17, 3400, 68000, 3200, 150, 200, 150, '2021-08-15', 'Понтон'),
(32, 17, 2615, 52300, 1400, 150, 150, 400, '2021-08-16', 'Понтон'),
(33, 17, 1100, 22000, 1200, 100, 100, 0, '2021-06-25', 'Понтон'),
(34, 17, 2050, 41000, 1900, 100, 100, 0, '2021-06-26', 'Понтон'),
(35, 17, 1200, 24000, 1350, 100, 100, 0, '2021-06-27', 'Понтон'),
(36, 17, 1100, 22000, 850, 100, 100, 0, '2021-06-28', 'Понтон'),
(37, 17, 1100, 22000, 1000, 100, 100, 0, '2021-06-29', 'Понтон'),
(38, 17, 1750, 35000, 1100, 150, 150, 0, '2021-06-30', 'Понтон'),
(39, 17, 1000, 20000, 1200, 100, 100, 0, '2021-06-21', 'Понтон'),
(40, 17, 2000, 40000, 2500, 100, 100, 0, '2021-06-20', 'Понтон'),
(41, 17, 1750, 35000, 2450, 400, 100, 600, '2021-08-18', 'Понтон'),
(42, 17, 1000, 20000, 1200, 150, 100, 650, '2021-08-20', 'Понтон'),
(43, 17, 1000, 20000, 850, 100, 100, 500, '2021-08-21', 'Понтон'),
(44, 17, 1750, 35000, 1700, 100, 100, 200, '2021-08-22', 'Понтон'),
(45, 17, 1993, 39860, 1900, 150, 100, 200, '2021-08-23', 'Понтон'),
(46, 17, 1578, 31560, 2100, 100, 100, 150, '2021-08-24', 'Понтон'),
(47, 17, 1450, 29000, 1580, 300, 100, 150, '2021-08-31', 'Понтон'),
(48, 17, 4835, 96700, 3500, 150, 150, 125, '2021-09-01', 'Понтон'),
(49, 17, 1164, 23280, 500, 200, 100, 100, '2021-09-03', 'Понтон'),
(50, 17, 1800, 36000, 2100, 150, 100, 0, '2021-09-04', 'Понтон'),
(51, 17, 2300, 46000, 1750, 150, 100, 0, '2021-09-05', 'Понтон'),
(52, 17, 1519, 30380, 1600, 100, 200, 0, '2021-09-09', 'Понтон'),
(53, 17, 3850, 77000, 3000, 250, 200, 0, '2021-09-11', 'Понтон'),
(54, 17, 1000, 20000, 700, 150, 0, 0, '2021-09-12', 'Понтон'),
(55, 17, 1017, 20340, 1100, 150, 100, 0, '2021-09-13', 'Понтон'),
(56, 17, 1688, 33760, 1600, 100, 100, 0, '2021-09-14', 'Понтон'),
(57, 17, 3570, 71400, 4800, 350, 150, 200, '2021-09-16', 'Понтон'),
(58, 17, 1117, 22340, 1350, 200, 100, 100, '2021-09-17', 'Понтон'),
(59, 17, 2400, 48000, 2400, 100, 150, 150, '2021-09-18', 'Понтон'),
(60, 17, 2550, 51000, 1800, 0, 150, 0, '2021-09-19', 'Понтон'),
(61, 17, 1132, 22640, 1200, 170, 100, 0, '2021-09-24', 'Бразилия'),
(62, 17, 3270, 65400, 2750, 150, 150, 0, '2021-09-25', 'Бразилия'),
(63, 17, 1500, 30000, 1000, 100, 100, 0, '2021-09-28', 'Бразилия'),
(64, 17, 1705, 34100, 1750, 150, 100, 0, '2021-09-29', 'Бразилия'),
(65, 17, 2016, 40320, 1100, 200, 100, 0, '2021-10-01', 'Бразилия'),
(66, 17, 1904, 38080, 1450, 150, 150, 0, '2021-10-02', 'Бразилия'),
(67, 17, 1904, 38080, 1200, 150, 100, 0, '2021-10-06', 'Бразилия'),
(68, 17, 1500, 30000, 1000, 200, 100, 0, '2021-10-07', 'Бразилия'),
(69, 17, 1500, 30000, 1200, 150, 0, 0, '2021-10-08', 'Бразилия'),
(70, 17, 2605, 52100, 3150, 300, 250, 0, '2021-10-09', 'Бразилия'),
(71, 17, 2000, 40000, 2250, 200, 100, 0, '2021-10-10', 'Бразилия'),
(72, 17, 1500, 30000, 1400, 200, 100, 0, '2021-10-12', 'Бразилия'),
(73, 17, 1935, 38700, 1250, 150, 100, 0, '2021-10-13', 'Бразилия'),
(74, 17, 3000, 60000, 1950, 250, 300, 0, '2021-10-16', 'Бразилия'),
(75, 17, 2900, 58000, 1000, 250, 100, 0, '2021-10-17', 'Бразилия'),
(76, 17, 1500, 30000, 1200, 170, 100, 125, '2021-10-19', 'Бразилия'),
(77, 17, 1500, 30000, 900, 170, 100, 125, '2021-10-22', 'Бразилия'),
(78, 17, 2000, 40000, 2000, 250, 100, 125, '2021-10-23', 'Бразилия'),
(79, 17, 2000, 40000, 1500, 170, 100, 0, '2021-10-24', 'Бразилия'),
(80, 17, 1500, 30000, 1700, 100, 150, 125, '2021-10-26', 'Бразилия'),
(81, 17, 1500, 30000, 1700, 100, 100, 0, '2021-10-27', 'Бразилия'),
(82, 17, 1500, 30000, 500, 0, 0, 0, '2021-10-30', 'Бразилия'),
(83, 17, 1500, 30000, 300, 0, 0, 0, '2021-10-31', 'Бразилия'),
(84, 17, 1650, 33000, 1900, 0, 200, 0, '2021-11-09', 'Бразилия'),
(88, 19, 720, 18000, 650, 0, 50, 0, '2021-11-08', 'Осака'),
(105, 17, 1500, 30000, 1100, 0, 100, 0, '2021-11-10', 'Бразилия'),
(107, 19, 1080, 27000, 1750, 0, 100, 0, '2021-11-13', 'Осака'),
(108, 17, 1920, 38400, 2350, 0, 150, 0, '2021-11-14', 'Бразилия'),
(110, 19, 560, 14000, 300, 0, 50, 0, '2021-11-12', 'Осака'),
(111, 19, 1000, 25000, 800, 0, 50, 0, '2021-11-14', 'Осака'),
(112, 17, 1500, 30000, 880, 0, 100, 130, '2021-11-15', 'Бразилия'),
(113, 17, 1500, 30000, 700, 0, 100, 130, '2021-11-16', 'Бразилия'),
(114, 17, 1500, 30000, 800, 0, 100, 0, '2021-11-17', 'Бразилия'),
(115, 19, 920, 23000, 900, 0, 50, 0, '2021-11-18', 'Осака'),
(119, 19, 1200, 30000, 1500, 0, 50, 0, '2021-11-19', 'Осака'),
(120, 19, 1080, 27000, 1700, 0, 50, 0, '2021-11-20', 'Осака'),
(121, 17, 2000, 40000, 1550, 0, 100, 480, '2021-11-21', 'Бразилия'),
(122, 17, 1500, 30000, 200, 0, 0, 130, '2021-11-22', 'Бразилия'),
(125, 17, 1500, 30000, 700, 0, 100, 130, '2021-11-23', 'Бразилия'),
(126, 19, 880, 22000, 1650, 0, 50, 0, '2021-11-24', 'Осака'),
(127, 19, 800, 20000, 1200, 0, 50, 0, '2021-11-25', 'Осака'),
(128, 17, 1639, 30000, 1600, 0, 150, 130, '2021-11-26', 'Бразилия'),
(129, 19, 1560, 39000, 2800, 0, 100, 0, '2021-11-26', 'Осака'),
(130, 17, 1900, 38000, 450, 0, 75, 130, '2021-11-27', 'Бразилия'),
(131, 17, 1500, 30000, 750, 0, 75, 0, '2021-11-28', 'Бразилия'),
(132, 17, 1500, 30000, 750, 0, 100, 130, '2021-11-30', 'Бразилия'),
(133, 19, 1280, 32000, 750, 0, 50, 0, '2021-11-30', 'Осака'),
(134, 19, 1520, 38000, 1900, 0, 50, 0, '2021-12-01', 'Осака'),
(143, 17, 1500, 30000, 500, 0, 0, 0, '2021-12-02', 'Бразилия'),
(144, 19, 1080, 27000, 2100, 0, 100, 0, '2021-12-02', 'Осака'),
(145, 23, 1356, 33900, 2600, 0, 50, 0, '2021-12-01', 'Осака'),
(148, 23, 1076, 26900, 800, 0, 50, 0, '2021-12-03', 'Осака'),
(149, 17, 2236, 44720, 1700, 0, 150, 230, '2021-12-04', 'Бразилия'),
(150, 23, 1920, 48000, 4950, 0, 100, 0, '2021-12-04', 'Осака'),
(151, 25, 3944, 98600, 5500, 0, 100, 0, '2021-12-04', 'Осака'),
(152, 25, 1400, 35000, 2000, 0, 100, 0, '2021-12-03', 'Осака'),
(153, 25, 1320, 33000, 1500, 0, 50, 0, '2021-12-02', 'Осака'),
(154, 23, 1860, 46500, 1850, 0, 50, 0, '2021-12-05', 'Осака'),
(155, 25, 504, 12600, 200, 0, 50, 0, '2021-12-05', 'Осака'),
(156, 19, 1520, 38000, 2050, 0, 50, 0, '2021-12-06', 'Осака'),
(159, 17, 1500, 30000, 850, 0, 100, 0, '2021-12-07', 'Бразилия'),
(160, 19, 1592, 39800, 2450, 0, 100, 0, '2021-12-07', 'Осака'),
(161, 23, 1320, 33000, 2200, 0, 50, 0, '2021-12-07', 'Осака'),
(162, 17, 1500, 30000, 1100, 0, 100, 0, '2021-12-08', 'Бразилия'),
(163, 19, 668, 16700, 550, 0, 50, 0, '2021-12-08', 'Осака'),
(165, 25, 1960, 49000, 4950, 0, 100, 0, '2021-12-09', 'Осака'),
(166, 23, 1640, 41000, 2100, 0, 100, 0, '2021-12-10', 'Осака'),
(167, 25, 1680, 42000, 3000, 0, 100, 0, '2021-12-10', 'Осака'),
(168, 19, 1980, 49500, 1450, 0, 100, 0, '2021-12-10', 'Осака'),
(169, 25, 2560, 64000, 4700, 0, 100, 0, '2021-12-11', 'Осака'),
(170, 23, 2120, 53000, 3500, 0, 100, 0, '2021-12-11', 'Осака'),
(171, 36, 1100, 22000, 500, 0, 150, 0, '2021-12-12', 'Осака');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `notifications_id` int(12) NOT NULL,
  `notifications_reg` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `notifications_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifications_text` text COLLATE utf8_unicode_ci NOT NULL,
  `notifications_read` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notifications_delete` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `notifications`
--

INSERT INTO `notifications` (`notifications_id`, `notifications_reg`, `users_id`, `notifications_to`, `notifications_text`, `notifications_read`, `notifications_delete`) VALUES
(1, 1, 24, '17, 19, 23, 24, 25', 'Первое уведомление на этом сайте', '23', '25');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `settings_percent` int(11) DEFAULT NULL,
  `settings_tips` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings_taxi` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings_rub` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settings_other` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`settings_id`, `users_id`, `settings_percent`, `settings_tips`, `settings_taxi`, `settings_rub`, `settings_other`) VALUES
(2, 17, 5, 'on', '', 'on', 'on'),
(3, 19, 4, 'on', '', 'on', ''),
(4, 23, 4, 'on', '', 'on', ''),
(6, 25, 4, 'on', '', 'on', ''),
(17, 36, 4, 'on', '', 'on', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_login` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `users_password_hash` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `users_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `users_last_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `users_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `users_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_date_reg` datetime DEFAULT CURRENT_TIMESTAMP,
  `users_work_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_work_adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `users_login`, `users_password_hash`, `users_name`, `users_last_name`, `users_type`, `users_hash`, `users_date_reg`, `users_work_place`, `users_work_adress`) VALUES
(17, 'Dmitry', 'bc7ad54f088c8da7a642c4c758a27179', 'Дмитрий', 'Корягин', 'user', '692a962996da8025673af4bde1668bf9', '2021-07-01 15:36:40', 'Бразилия', 'Нагибина'),
(19, 'Ndpkn', '9ac4cb5646e0724b2e997915faf7632d', 'Денис', 'Недопёкин', 'user', '07c404e82deb986ce86f890bbcc76643', '2021-07-01 15:35:16', 'Осака', 'Комарова'),
(23, 'Diana.TaranenkoDi.98', 'cc3a6e042a3951ad2f5df4865f2f9e18', 'Диана', 'Тараненко', 'user', '834c5d428bd2c723c44f577d12984bf4', '2021-12-02 15:35:16', 'Осака', 'Комарова'),
(24, 'QdbPQHQP13-0975312468Qdb', '61fcda55f7fe6ae30e5775b5734ec7f2', 'Admin', 'Admin', 'admin', '', '0000-00-00 00:00:00', NULL, NULL),
(25, 'essmevl', 'eb23b541d9f1b4652de3199c53acdaa4', 'Эсмира', 'Валиева', 'user', '8ba1f182228775673f9203971ece423e', '2021-12-04 15:35:16', 'Осака', 'Комарова'),
(36, 'Ghjrsgh', '4a31133725d57069e9518ff63f006544', 'София ', 'Подалко', 'user', '92f78383b6447d525061ecbcf6e34f1a', '2021-12-12 02:35:35', 'Осака', 'Комарова');

-- --------------------------------------------------------

--
-- Структура таблицы `users_work`
--

CREATE TABLE `users_work` (
  `users_work_id` int(12) NOT NULL,
  `users_id` int(12) NOT NULL,
  `work_place_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users_work`
--

INSERT INTO `users_work` (`users_work_id`, `users_id`, `work_place_id`) VALUES
(1, 17, 2),
(2, 19, 3),
(3, 23, 3),
(4, 25, 3),
(5, 36, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `work_places`
--

CREATE TABLE `work_places` (
  `work_places_id` int(12) NOT NULL,
  `work_places_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `work_places_adress` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `work_places`
--

INSERT INTO `work_places` (`work_places_id`, `work_places_name`, `work_places_adress`) VALUES
(1, 'Понтон', 'Набережная'),
(2, 'Бразилия', 'Нагибина'),
(3, 'Осака', 'Комарова');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Индексы таблицы `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`information_id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifications_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Индексы таблицы `users_work`
--
ALTER TABLE `users_work`
  ADD PRIMARY KEY (`users_work_id`);

--
-- Индексы таблицы `work_places`
--
ALTER TABLE `work_places`
  ADD PRIMARY KEY (`work_places_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `information`
--
ALTER TABLE `information`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifications_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `users_work`
--
ALTER TABLE `users_work`
  MODIFY `users_work_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `work_places`
--
ALTER TABLE `work_places`
  MODIFY `work_places_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
