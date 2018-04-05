-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 03:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utube`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'kulpat bhaskar', 'kulpatbhaskar@gmail.com', 'b809a530e8a8405a02ff1f5db886f978'),
(2, 'Piyush Srivastav', 'piyush1997@gmail.com', '86f500cd7b7d38e5d4ae6cde3920f589');

-- --------------------------------------------------------

--
-- Table structure for table `user_video`
--

CREATE TABLE `user_video` (
  `v_id` int(10) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `v_name` varchar(55) DEFAULT NULL,
  `v_dir` varchar(55) DEFAULT NULL,
  `cat` enum('movies','songs','news') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_video`
--

INSERT INTO `user_video` (`v_id`, `id`, `v_name`, `v_dir`, `cat`) VALUES
(101, 1, 'Hacker', 'movie/Hacker.mp4', 'movies'),
(104, 1, 'FIFA 18', 'news/FIFA 18.mkv', 'news'),
(105, 1, 'Hack HTTPS', 'news/Hack HTTPS.mp4', 'news'),
(106, 1, 'Judwaa', 'songs/Judwaa.mp4', 'songs'),
(114, 1, 'suna suna', 'movie//bepanahh.MP4', ''),
(115, 2, 'bepanaha', 'movie//bepanahh.MP4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_video`
--
ALTER TABLE `user_video`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_video`
--
ALTER TABLE `user_video`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
