-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 04:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urlqu`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `input_url` varchar(100) DEFAULT NULL,
  `output_url` varchar(50) DEFAULT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `user_id`, `title`, `input_url`, `output_url`, `last_update`) VALUES
(1, 2, 'Youtube', 'https://www.youtube.com/', 'http://localhost/shortener/api/go/oAyLuW0e', '2018-12-15 14:50:32'),
(2, 2, 'User Manual CI', 'https://www.codeigniter.com/userguide3/libraries/output.html', 'http://localhost/shortener/api/go/BG2nuPGl', '2018-12-15 15:11:43'),
(3, 1, 'Nekonime', 'https://nekonime.tv/', 'http://localhost/shortener/api/go/BG2bHbGl', '2018-12-15 14:30:03'),
(5, 2, 'neko', 'https://nekonime.tv/daftar-anime', 'http://localhost/shortener/api/go/9djDuX0m', '2018-12-15 17:58:42'),
(6, 1, 'adinegoro', 'https://www.youtube.com/watch?v=WLhvhiz8i_s', 'http://localhost/shortener/api/go/9djrHMdm', '2018-12-15 13:19:00'),
(7, 1, '333', 'https://jwt.io/#libraries', 'http://localhost/shortener/api/go/jAD4H1A2', '2018-12-15 13:15:52'),
(9, 2, 'Sweet Child o Mine', 'https://www.youtube.com/watch?v=QBWFBKJ6nb0&start_radio=1&list=RDQBWFBKJ6nb0', 'http://localhost/shortener/api/go/XGkKuZGE', '2018-12-15 16:03:15'),
(10, 2, 'tes judul', 'https://github.com/adinegoro11', 'http://localhost/shortener/api/go/zA44ugAY', '2018-12-15 18:48:37'),
(11, 2, 'tes judul', 'https://github.com/adinegoro11', 'http://localhost/shortener/api/go/pdxKuQAO', '2018-12-15 17:55:09'),
(12, 2, 'Tutorial', 'http://htetcomp.blogspot.com/2018/03/validate-json-in-codeigniter.html', 'http://localhost/shortener/api/go/zdgLumGY', '2018-12-15 17:56:40'),
(14, 2, 'json', 'https://expressionengine.com/forums/archive/topic/238080/codeigniter-validation-rule-for-a-json-obje', 'http://localhost/shortener/api/go/wGnKuP0a', '2018-12-15 18:32:52'),
(15, 1, 'Ganti jadi Udemy', 'https://www.udemy.com/', 'http://localhost/shortener/api/go/wGn2HXGa', '2018-12-15 20:47:54'),
(16, 1, 'insert delapan', 'https://www.iplocate.io/', 'http://localhost/shortener/api/go/Dd89HEG8', '2018-12-15 20:26:15'),
(17, 1, 'CSS bootstrap', 'https://getbootstrap.com/docs/3.3/css/', 'http://localhost/shortener/api/go/OAZxHYGW', '2018-12-15 21:37:23'),
(18, 3, 'input', 'https://getbootstrap.com/docs/3.3/css/', 'http://localhost/shortener/api/go/VAoPh6dE', '2018-12-15 22:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `log_click`
--

CREATE TABLE `log_click` (
  `id` int(10) NOT NULL,
  `link_id` int(10) NOT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `click_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_click`
--

INSERT INTO `log_click` (`id`, `link_id`, `ip_address`, `country`, `click_at`) VALUES
(1, 3, '::1', 'tes country', '2018-12-15 07:35:28'),
(2, 6, '::1', 'tes country', '2018-12-15 07:52:57'),
(3, 3, '::1', 'tes country', '2018-12-15 08:04:04'),
(4, 3, '::1', 'tes country', '2018-12-15 14:43:49'),
(5, 3, '::1', 'tes country', '2018-12-15 14:47:57'),
(6, 3, '::1', 'tes country', '2018-12-15 14:48:53'),
(7, 3, '::1', 'tes country', '2018-12-15 14:49:12'),
(8, 1, '::1', 'tes country', '2018-12-15 14:50:38'),
(9, 1, '::1', 'tes country', '2018-12-15 14:50:49'),
(10, 1, '::1', 'tes country', '2018-12-15 14:54:09'),
(11, 1, '::1', 'tes country', '2018-12-15 14:55:14'),
(12, 2, '::1', 'tes country', '2018-12-15 15:11:48'),
(13, 9, '::1', 'tes country', '2018-12-15 16:03:28'),
(14, 11, '::1', 'tes country', '2018-12-15 17:57:15'),
(15, 12, '::1', 'tes country', '2018-12-15 17:57:32'),
(16, 5, '::1', 'tes country', '2018-12-15 17:58:44'),
(17, 10, '::1', 'tes country', '2018-12-15 18:48:39'),
(18, 15, '::1', 'tes country', '2018-12-15 19:21:07'),
(19, 15, '::1', 'tes country', '2018-12-15 20:48:09'),
(20, 6, '::1', 'tes country', '2018-12-15 21:20:30'),
(21, 7, '::1', 'tes country', '2018-12-15 21:37:38'),
(22, 17, '::1', 'tes country', '2018-12-15 21:37:50'),
(23, 17, '::1', 'tes country', '2018-12-15 21:54:18'),
(24, 17, '::1', 'tes country', '2018-12-15 21:54:20'),
(25, 17, '::1', 'tes country', '2018-12-15 21:54:20'),
(26, 17, '::1', 'tes country', '2018-12-15 21:54:21'),
(27, 17, '::1', 'tes country', '2018-12-15 21:54:31'),
(28, 15, '::1', 'tes country', '2018-12-15 22:09:04'),
(29, 16, '::1', 'tes country', '2018-12-15 22:09:42'),
(30, 16, '::1', 'tes country', '2018-12-15 22:09:44'),
(31, 16, '::1', 'tes country', '2018-12-15 22:09:46'),
(32, 16, '::1', 'tes country', '2018-12-15 22:09:47'),
(33, 18, '::1', 'tes country', '2018-12-15 22:48:32'),
(34, 18, '::1', 'tes country', '2018-12-15 22:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `passhash` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `passhash`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'gB0NV05e'),
(2, 'angga', '1fd5cd9766249f170035b7251e2c6b61', 'yLA6m0oM'),
(3, 'adi', 'c46335eb267e2e1cde5b017acb4cd799', 'http://localhost/shortener/api/go/oAyDh20e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_click`
--
ALTER TABLE `log_click`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `log_click`
--
ALTER TABLE `log_click`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
