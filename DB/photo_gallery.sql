-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2019 at 07:39 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.3.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `comment_body`) VALUES
(1, 1, 'John', 'This is a comment'),
(2, 2, 'Jane', 'This is a comment2'),
(5, 3, 'John', 'This is a comment'),
(6, 4, 'John', 'Comment');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo_title` varchar(255) NOT NULL,
  `photo_caption` varchar(255) NOT NULL,
  `photo_des` text NOT NULL,
  `photo_filename` varchar(255) NOT NULL,
  `photo_altText` varchar(255) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `photo_size` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_title`, `photo_caption`, `photo_des`, `photo_filename`, `photo_altText`, `photo_type`, `photo_size`, `user_id`) VALUES
(1, 'The Car Company', 'Caption1', '<p>This is a car company 1</p>', 'images-35.jpg', 'Alternate Text1', 'image/jpeg', 23672, 0),
(2, 'The Car Company', '', 'This is a car company', 'images-2.jpg', '', 'image/jpeg', 18578, 0),
(3, 'The Car Company3', 'Caption3', 'Description3', 'images-3.jpg', 'Alternate Text3', 'image/jpeg', 18096, 0),
(4, 'The Car Company', 'Caption1', '<p>This is a car company 1</p>', 'images-10.jpg', 'Alternate Text1', 'image/jpeg', 20401, 0),
(5, 'The Car Company', 'Caption1', '<p>This is a car company 1</p>', 'images-5.jpg', 'Alternate Text1', 'image/jpeg', 33192, 0),
(7, 'A book', 'Caption1', '<p>Bangladesh</p>', 'images-7.jpg', 'Alternate Text', 'image/jpeg', 24140, 0),
(8, 'Image 1', '', '', 'images-1.jpg', '', 'image/jpeg', 28947, 0),
(9, 'Image 4', '', '', 'images-4.jpg', '', 'image/jpeg', 23270, 0),
(10, 'Image 6', '', '', 'images-6.jpg', '', 'image/jpeg', 21886, 0),
(11, 'Image 7', '', '', 'images-7.jpg', '', 'image/jpeg', 24140, 0),
(12, 'Image 8', '', '', 'images-8.jpg', '', 'image/jpeg', 20810, 0),
(13, 'Image 9', '', '', 'images-9.jpg', '', 'image/jpeg', 21108, 0),
(14, 'Image 10', '', '', 'images-10.jpg', '', 'image/jpeg', 20401, 0),
(15, 'Image 11', '', '', 'images-11.jpg', '', 'image/jpeg', 27916, 0),
(16, 'Image 12', '', '', 'images-12.jpg', '', 'image/jpeg', 18540, 0),
(17, 'Image 13', '', '', 'images-17.jpg', '', 'image/jpeg', 22792, 0),
(18, 'Image 14', '', '', 'images-14.jpg', '', 'image/jpeg', 21992, 0),
(19, 'Image 15', '', '', 'images-15.jpg', '', 'image/jpeg', 28466, 0),
(20, 'Image 15', '', '', 'images-15.jpg', '', 'image/jpeg', 28466, 0),
(21, 'Image 16', '', '', 'images-16.jpg', '', 'image/jpeg', 21133, 0),
(27, 'Image 17', '', '', 'images-17.jpg', '', 'image/jpeg', 22792, 0),
(29, '', '', '', 'images-21.jpg', '', 'image/jpeg', 19957, 0),
(30, '', '', '', 'images-22.jpg', '', 'image/jpeg', 21133, 0),
(31, '', '', '', 'images-23.jpg', '', 'image/jpeg', 22792, 0),
(32, '', '', '', 'images-24.jpg', '', 'image/jpeg', 29850, 0),
(33, '', '', '', 'images-25.jpg', '', 'image/jpeg', 19363, 0),
(34, '', '', '', 'images-26.jpg', '', 'image/jpeg', 21802, 0),
(35, '', '', '', 'images-27.jpg', '', 'image/jpeg', 17662, 0),
(36, '', '', '', 'images-28.jpg', '', 'image/jpeg', 17662, 0),
(37, '', '', '', 'images-29.jpg', '', 'image/jpeg', 25493, 0),
(38, '', '', '', 'images-30.jpg', '', 'image/jpeg', 20257, 0),
(39, '', '', '', 'images-31.jpg', '', 'image/jpeg', 20928, 0),
(40, '', '', '', 'images-32.jpg', '', 'image/jpeg', 22772, 0),
(41, '', '', '', 'images-33.jpg', '', 'image/jpeg', 16855, 0),
(42, '', '', '', 'images-34.jpg', '', 'image/jpeg', 23587, 0),
(43, '', '', '', 'images-35.jpg', '', 'image/jpeg', 23672, 0),
(44, '', '', '', 'images-36.jpg', '', 'image/jpeg', 21672, 0),
(45, '', '', '', 'images-37.jpg', '', 'image/jpeg', 20381, 0),
(46, '', '', '', 'images-38.jpg', '', 'image/jpeg', 21857, 0),
(47, '', '', '', 'images-39.jpg', '', 'image/jpeg', 24969, 0),
(48, '', '', '', 'images-40.jpg', '', 'image/jpeg', 24385, 0),
(49, '', '', '', 'images-41.jpg', '', 'image/jpeg', 16296, 0),
(50, '', '', '', 'images-42.jpg', '', 'image/jpeg', 22401, 0),
(51, '', '', '', 'images-43.jpg', '', 'image/jpeg', 27955, 0),
(52, '', '', '', 'images-44.jpg', '', 'image/jpeg', 29486, 0),
(55, 'New Image', '', '<p>This is a new image</p>', 'dual-btn-7.jpg', '', 'image/jpeg', 78117, 0),
(56, 'The Car Company', '', '', 'dual-btn-5.jpg', '', 'image/jpeg', 47366, 0),
(57, 'The Car Company', '', '', 'advanced-heading-2.jpg', '', 'image/jpeg', 26243, 1),
(58, 'Dual Button', '', '', 'dual-btn-7.jpg', '', 'image/jpeg', 78117, 1),
(59, '', '', '', 'images-1.jpg', '', 'image/jpeg', 28947, 1),
(60, '', '', '', 'image-1.jpg', '', 'image/jpeg', 328747, 1),
(61, '', '', '', 'images-2.jpg', '', 'image/jpeg', 18578, 1),
(62, '', '', '', 'images-3.jpg', '', 'image/jpeg', 18096, 1),
(63, '', '', '', 'images-4.jpg', '', 'image/jpeg', 23270, 1),
(64, '', '', '', 'images-5.jpg', '', 'image/jpeg', 33192, 1),
(65, '', '', '', 'images-6.jpg', '', 'image/jpeg', 21886, 1),
(66, '', '', '', 'images-7.jpg', '', 'image/jpeg', 24140, 1),
(67, '', '', '', 'images-8.jpg', '', 'image/jpeg', 20810, 1),
(68, '', '', '', 'images-9.jpg', '', 'image/jpeg', 21108, 1),
(69, '', '', '', 'images-10.jpg', '', 'image/jpeg', 20401, 1),
(70, '', '', '', 'images-11.jpg', '', 'image/jpeg', 27916, 1),
(71, '', '', '', 'images-12.jpg', '', 'image/jpeg', 18540, 1),
(72, '', '', '', 'images-13.jpg', '', 'image/jpeg', 22082, 1),
(73, '', '', '', 'images-14.jpg', '', 'image/jpeg', 21992, 1),
(74, '', '', '', 'images-15.jpg', '', 'image/jpeg', 28466, 1),
(75, '', '', '', 'images-16.jpg', '', 'image/jpeg', 21133, 1),
(76, '', '', '', 'images-17.jpg', '', 'image/jpeg', 22792, 1),
(77, '', '', '', 'images-18.jpg', '', 'image/jpeg', 27595, 1),
(78, '', '', '', 'images-19.jpg', '', 'image/jpeg', 22792, 1),
(79, '', '', '', 'images-20.jpg', '', 'image/jpeg', 22942, 1),
(80, '', '', '', 'images-21.jpg', '', 'image/jpeg', 19957, 1),
(81, '', '', '', 'images-22.jpg', '', 'image/jpeg', 21133, 1),
(82, '', '', '', 'images-23.jpg', '', 'image/jpeg', 22792, 1),
(83, '', '', '', 'images-24.jpg', '', 'image/jpeg', 29850, 1),
(84, '', '', '', 'images-25.jpg', '', 'image/jpeg', 19363, 1),
(85, '', '', '', 'images-26.jpg', '', 'image/jpeg', 21802, 1),
(86, '', '', '', 'images-27.jpg', '', 'image/jpeg', 17662, 1),
(87, '', '', '', 'images-28.jpg', '', 'image/jpeg', 17662, 1),
(88, '', '', '', 'images-29.jpg', '', 'image/jpeg', 25493, 1),
(89, '', '', '', 'images-30.jpg', '', 'image/jpeg', 20257, 1),
(90, '', '', '', 'images-31.jpg', '', 'image/jpeg', 20928, 1),
(91, '', '', '', 'images-32.jpg', '', 'image/jpeg', 22772, 1),
(92, '', '', '', 'images-33.jpg', '', 'image/jpeg', 16855, 1),
(93, '', '', '', 'images-34.jpg', '', 'image/jpeg', 23587, 1),
(94, '', '', '', 'images-35.jpg', '', 'image/jpeg', 23672, 1),
(95, '', '', '', 'images-36.jpg', '', 'image/jpeg', 21672, 1),
(96, '', '', '', 'images-37.jpg', '', 'image/jpeg', 20381, 1),
(97, '', '', '', 'images-38.jpg', '', 'image/jpeg', 21857, 1),
(98, '', '', '', 'images-39.jpg', '', 'image/jpeg', 24969, 1),
(99, '', '', '', 'images-40.jpg', '', 'image/jpeg', 24385, 1),
(100, '', '', '', 'images-41.jpg', '', 'image/jpeg', 16296, 1),
(101, '', '', '', 'images-42.jpg', '', 'image/jpeg', 22401, 1),
(102, '', '', '', 'images-43.jpg', '', 'image/jpeg', 27955, 1),
(103, '', '', '', 'images-44.jpg', '', 'image/jpeg', 29486, 1),
(104, '', '', '', 'images-50.jpg', '', 'image/jpeg', 21652, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(1, 'admin', 'txdemo123', 'John', 'Doe', 'images-43.jpg'),
(2, 'karim', '123', 'Muhmmad', 'Karim', 'person.png'),
(3, 'kamal', '123', 'Muhmmad', 'Kamal', 'person.png'),
(5, 'Kamal', '123', 'Muhmmad', 'Kamal', 'person.webp'),
(6, 'jamal', '123', 'Mohmmad', 'Jamal', 'person.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
