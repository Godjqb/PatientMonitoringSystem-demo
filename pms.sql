-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-01-25 12:21:56
-- 服务器版本： 5.7.21-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- 表的结构 `cases`
--

CREATE TABLE `cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `bedNo` int(10) UNSIGNED NOT NULL,
  `bp` int(4) NOT NULL,
  `temp` float NOT NULL,
  `pulse` int(4) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cases`
--

INSERT INTO `cases` (`id`, `bedNo`, `bp`, `temp`, `pulse`, `time`) VALUES
(11, 1, 20, 20, 20, '2018-01-23 19:36:31'),
(12, 2, 10, 1, 1, '2018-01-23 19:53:05'),
(13, 10, 10, 10, 10, '2018-01-23 19:53:34'),
(14, 1, 1, 1, 1, '2018-01-23 19:57:10'),
(15, 10, 10, 10, 10, '2018-01-23 19:57:30'),
(16, 10, 10, 10, 10, '2018-01-23 19:59:12'),
(17, 10, 10, 10, 10, '2018-01-23 19:59:21'),
(18, 10, 1, 1, 1, '2018-01-23 20:05:28'),
(19, 10, 1, 1, 1, '2018-01-23 20:05:36'),
(20, 1, 1, 1, 1, '2018-01-23 20:07:47'),
(21, 1, 1, 1, 1, '2018-01-23 20:29:08'),
(22, 1, 2, 2, 2, '2018-01-23 20:29:36'),
(23, 1, 50, 37, 20, '2018-01-24 14:43:12'),
(24, 1, 1, 1, 1, '2018-01-24 14:59:24'),
(25, 1, 1, 1, 1, '2018-01-24 15:00:08'),
(26, 1, 1, 1, 1, '2018-01-24 15:00:42');

-- --------------------------------------------------------

--
-- 表的结构 `nurses`
--

CREATE TABLE `nurses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(20) NOT NULL,
  `username` char(16) NOT NULL,
  `password` char(32) NOT NULL,
  `tel` bigint(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `nurses`
--

INSERT INTO `nurses` (`id`, `name`, `username`, `password`, `tel`) VALUES
(9, '1', '1', '1', 1),
(10, '3', 'a', '2', 4),
(12, 'jack', 'foo', 'test', 18636039798),
(13, '宋子钰', '宋子钰', '123', 110);

-- --------------------------------------------------------

--
-- 表的结构 `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(20) NOT NULL,
  `bedNo` int(10) UNSIGNED NOT NULL,
  `sex` char(6) NOT NULL,
  `age` int(3) UNSIGNED NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `patients`
--

INSERT INTO `patients` (`id`, `name`, `bedNo`, `sex`, `age`, `time`) VALUES
(1, 'a', 1, '男', 1, '2018-01-23 19:03:48'),
(3, 'a', 2, '男', 1, '2018-01-23 19:04:37'),
(5, 'a', 3, '男', 1, '2018-01-23 19:05:12'),
(6, 'a', 4, '男', 4, '2018-01-23 19:05:42'),
(8, 'b', 20, '男', 10, '2018-01-24 14:41:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bedNo` (`bedNo`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用表AUTO_INCREMENT `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
