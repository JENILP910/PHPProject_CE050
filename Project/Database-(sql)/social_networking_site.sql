-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 06:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_networking_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content_comment` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `name`, `content_comment`, `image`, `created`) VALUES
(1, 1, 1, 'ab cd', 'Hey There!', 'upload/default_profile.png', '2020-01-01 23:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `post_image` varchar(70) NOT NULL,
  `content` varchar(90) DEFAULT NULL,
  `created` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_image`, `content`, `created`) VALUES
(1, 1, 'upload/naruto-fox-anime-ninja-wallpaper-preview.jpg', 'hello!', '2020-01-01 13:31:15'),
(2, 1, 'upload/wallpaperflare.com_wallpaper (22).jpg', 'Pattern', '2020-03-01 13:31:15'),
(3, 1, 'upload/wallpaperflare.com_wallpaper (23).jpg', 'Pikachu', '2021-03-01 13:31:15'),
(4, 1, 'upload/783325.jpg', 'SAO', '2021-04-01 21:00:00'),
(5, 2, 'upload/LimpEcstaticGyrfalcon-max-1mb.gif', 'Sceneray', '2021-04-03 01:00:00'),
(6, 2, 'upload/619256.jpg', 'Cube', '2021-04-04 18:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `discription` varchar(200) DEFAULT 'Having wonderful days.',
  `birthday` varchar(40) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `number` int(15) NOT NULL,
  `cover_pic` varchar(50) NOT NULL DEFAULT '''upload/default_cover.png''',
  `profile_pic` varchar(50) NOT NULL DEFAULT 'upload/default_profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `active`, `discription`, `birthday`, `gender`, `number`, `cover_pic`, `profile_pic`) VALUES
(1, 'ab', 'cd', 'abcd', 'abcd', 'abcd@check.com', 0, 'Having wonderful day!!', '2000-11-11', 'Male', 1234567890, 'upload/default_cover.png', 'upload/default_profile.png'),
(2, 'John', 'Smith', 'JohnSmith12', 'johnsmith', 'JohnSmith@email.com', 0, 'Having wonderful days.', '1998-June-12', 'male', 2147483647, '\'upload/default_cover.png\'', 'upload/default_profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
