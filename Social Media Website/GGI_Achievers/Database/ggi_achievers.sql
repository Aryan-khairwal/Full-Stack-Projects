-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 07:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ggi_achievers`
--
CREATE DATABASE IF NOT EXISTS `ggi_achievers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ggi_achievers`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_img` text NOT NULL,
  `caption` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_img`, `caption`, `created_at`) VALUES
(6, 20, '169924994520210808_150945.jpg', 'Happy Independence Day', '2023-11-06 05:52:25'),
(7, 22, '1699250376football.jpg', 'Proud moment for us, our Football team secured 3rd Position in Inter-college Football Tournament', '2023-11-06 05:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dp` text NOT NULL DEFAULT 'defaultDP.jpg',
  `ac_status` int(11) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `roll_no`, `password`, `created_at`, `updated_at`, `dp`, `ac_status`, `department`) VALUES
(20, 'Aryan', '', 'male', 'ggi2021.2287@ggi.ac.in', 2112630, '827ccb0eea8a706c4c34a16891f84e7b', '2023-11-01 15:53:08', '2023-11-05 17:03:53', '1699203833Myphoto.jpg', 1, 'BCA'),
(22, 'Abhishek', 'Kumar', 'male', 'ggi2021.1329@ggi.ac.in', 2112612, 'e10adc3949ba59abbe56e057f20f883e', '2023-11-02 06:08:47', '2023-11-06 05:56:05', '1699250165Screenshot 2023-11-06 112535.png', 1, 'BCA'),
(23, 'Shalini', 'Karn', 'female', 'ggi2021.1675@ggi.ac.in', 2112732, 'cd6da6e376e22ff1dfbcd415ea104ad1', '2023-11-02 06:12:54', '2023-11-06 05:45:52', '1699249552g log.jpg', 1, 'BCA'),
(25, 'Nitisha', 'Saini', 'female', 'ggi2020.1476@ggi.ac.in', 2027146, '41a7f49bfe3999f2af861266b63b1047', '2023-11-05 16:19:14', '2023-11-05 16:28:42', '1699201275nitisha.png', 1, 'MBA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
