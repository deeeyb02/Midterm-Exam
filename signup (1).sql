-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 02:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `authen`
--

CREATE TABLE `authen` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `code` int(100) NOT NULL,
  `oras` datetime(6) NOT NULL,
  `exptime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authen`
--

INSERT INTO `authen` (`id`, `userid`, `code`, `oras`, `exptime`) VALUES
(1, 1, 645214, '2021-04-22 06:37:17.000000', '2021-04-21 22:42:17.000000'),
(2, 1, 381316, '2021-04-22 09:09:03.000000', '2021-04-22 01:14:03.000000'),
(3, 1, 522187, '2021-04-22 09:14:14.000000', '2021-04-22 01:19:14.000000'),
(4, 1, 194295, '2021-04-22 09:17:13.000000', '2021-04-22 01:22:13.000000'),
(5, 1, 221626, '2021-04-22 09:17:35.000000', '2021-04-22 01:22:35.000000'),
(6, 1, 167625, '2021-04-22 09:23:41.000000', '2021-04-22 01:28:41.000000'),
(7, 1, 535181, '2021-04-22 11:21:40.000000', '2021-04-22 03:26:40.000000'),
(8, 1, 857903, '2021-04-22 11:22:38.000000', '2021-04-22 03:27:38.000000'),
(9, 1, 189164, '2021-04-22 11:23:48.000000', '2021-04-22 03:28:48.000000'),
(10, 1, 393734, '2021-04-24 02:15:35.000000', '2021-04-23 18:20:35.000000'),
(11, 1, 604848, '2021-04-24 08:22:09.000000', '2021-04-24 00:27:09.000000'),
(12, 2, 860703, '2021-04-24 08:33:41.000000', '2021-04-24 00:38:41.000000'),
(13, 2, 266290, '2021-04-24 08:33:55.000000', '2021-04-24 00:38:55.000000'),
(14, 2, 419337, '2021-04-24 08:35:49.000000', '2021-04-24 00:40:49.000000'),
(15, 2, 154768, '2021-04-24 08:36:37.000000', '2021-04-24 00:41:37.000000'),
(16, 2, 162927, '2021-04-24 08:40:11.000000', '2021-04-24 00:45:11.000000'),
(17, 1, 474313, '2021-04-24 08:41:27.000000', '2021-04-24 00:46:27.000000'),
(18, 1, 831841, '2021-04-24 08:42:30.000000', '2021-04-24 00:47:30.000000'),
(19, 1, 170045, '2021-04-24 08:42:59.000000', '2021-04-24 00:47:59.000000'),
(20, 1, 199375, '2021-04-24 08:43:53.000000', '2021-04-24 00:48:53.000000'),
(21, 1, 651692, '2021-04-24 08:45:21.000000', '2021-04-24 00:50:21.000000'),
(22, 1, 442598, '2021-04-24 08:46:16.000000', '2021-04-24 00:51:16.000000'),
(23, 1, 469930, '2021-04-24 09:15:21.000000', '2021-04-24 01:20:21.000000'),
(24, 1, 674266, '2021-04-24 09:16:53.000000', '2021-04-24 01:21:53.000000'),
(25, 1, 821906, '2021-04-24 09:22:50.000000', '2021-04-24 01:27:50.000000'),
(26, 1, 872067, '2021-04-24 09:24:34.000000', '2021-04-24 01:29:34.000000'),
(27, 1, 868269, '2021-04-24 09:47:49.000000', '2021-04-24 01:52:49.000000'),
(28, 1, 117651, '2021-04-24 09:51:03.000000', '2021-04-24 01:56:03.000000'),
(29, 1, 226378, '2021-04-24 09:55:51.000000', '2021-04-24 02:00:51.000000'),
(30, 1, 883091, '2021-04-24 09:57:45.000000', '2021-04-24 02:02:45.000000'),
(31, 2, 508592, '2021-04-24 10:00:54.000000', '2021-04-24 02:05:54.000000'),
(32, 1, 707582, '2021-04-25 02:50:37.000000', '2021-04-24 18:55:37.000000'),
(33, 2, 867740, '2021-04-25 02:59:23.000000', '2021-04-24 19:04:23.000000'),
(34, 1, 324157, '2021-04-25 03:41:11.000000', '2021-04-24 19:46:11.000000'),
(35, 1, 875193, '2021-04-25 03:45:24.000000', '2021-04-24 19:50:24.000000'),
(36, 1, 224194, '2021-04-25 03:58:36.000000', '1970-01-01 00:05:00.000000'),
(37, 1, 912408, '2021-04-25 04:00:01.000000', '2021-04-24 20:05:01.000000'),
(38, 3, 185113, '2021-04-25 04:05:05.000000', '2021-04-24 20:10:05.000000'),
(39, 3, 570690, '2021-04-25 04:05:26.000000', '2021-04-24 20:10:26.000000'),
(40, 1, 433721, '2021-04-25 07:58:43.000000', '2021-04-25 00:03:43.000000'),
(41, 1, 455723, '2021-04-25 08:07:38.000000', '2021-04-25 00:12:38.000000'),
(42, 1, 566912, '2021-04-25 08:09:03.000000', '2021-04-25 00:14:03.000000'),
(43, 2, 911324, '2021-04-26 07:29:49.000000', '2021-04-25 23:34:49.000000'),
(44, 2, 791270, '2021-04-26 07:31:34.000000', '2021-04-25 23:36:34.000000'),
(45, 2, 654727, '2021-04-26 07:33:53.000000', '2021-04-25 23:38:53.000000'),
(46, 2, 174191, '2021-04-26 07:35:09.000000', '2021-04-25 23:40:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `e_id` int(100) NOT NULL,
  `activity` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`e_id`, `activity`, `username`, `date_time`) VALUES
(1, 'LOGIN ATTEMPT', 'juan', '2021-04-25 23:33:53'),
(2, 'LOGIN SUCCESSFUL', 'juan', '2021-04-25 23:34:02'),
(3, 'LOGOUT', 'juan', '2021-04-25 23:34:15'),
(4, 'FORGOT PASSWORD', 'juan', '2021-04-25 23:34:27'),
(5, 'RESET PASSWORD', 'juan', '2021-04-25 23:34:35'),
(6, 'LOGIN ATTEMPT', 'juan', '2021-04-25 23:35:09'),
(7, 'LOGIN SUCCESSFUL', 'juan', '2021-04-25 23:35:15'),
(8, 'CHANGE PASSWORD', 'juan', '2021-04-25 23:35:43'),
(9, 'LOGOUT', 'juan', '2021-04-25 23:35:56'),
(10, 'LOGIN SUCCESSFUL', 'ADMIN', '2021-04-25 23:36:04'),
(11, 'LOGOUT', 'ADMIN', '2021-04-25 23:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `registerform`
--

CREATE TABLE `registerform` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registerform`
--

INSERT INTO `registerform` (`id`, `username`, `cpassword`, `email`) VALUES
(1, 'deeeyb', '123', 'estacionmiko@gmail.com'),
(2, 'juan', 'Qwertyuiop@25', 'deeeyb@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authen`
--
ALTER TABLE `authen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `registerform`
--
ALTER TABLE `registerform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authen`
--
ALTER TABLE `authen`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `e_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registerform`
--
ALTER TABLE `registerform`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
