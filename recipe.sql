-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 01:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `post_id`, `comments`) VALUES
(1, 2, 1, 'Vary Good'),
(2, 2, 1, 'naa');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `user_id`, `post_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(15, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `post_id`, `value`) VALUES
(19, 2, 1, 3),
(20, 3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_chatagory`
--

CREATE TABLE `recipe_chatagory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_chatagory`
--

INSERT INTO `recipe_chatagory` (`id`, `name`) VALUES
(1, 'Burger'),
(2, 'Pasta'),
(3, 'Roll'),
(9, 'Tea');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_details`
--

CREATE TABLE `recipe_details` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `serving` float NOT NULL,
  `prep_time` float NOT NULL,
  `cook_time` float NOT NULL,
  `ingradiants` varchar(500) NOT NULL,
  `Video` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_details`
--

INSERT INTO `recipe_details` (`id`, `post_id`, `serving`, `prep_time`, `cook_time`, `ingradiants`, `Video`) VALUES
(2, 5, 10, 2, 3, '1 pic Bun', ''),
(3, 6, 1, 5, 2.5, '1 pic Bun', ''),
(22, 24, 2, 10, 15, 'Cheese:20gm,Pasta:200gm', '');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_instruct`
--

CREATE TABLE `recipe_instruct` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_instruct`
--

INSERT INTO `recipe_instruct` (`id`, `post_id`, `description`, `image`) VALUES
(11, 13, 'Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \"Content here, content here\", making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \"lorem ipsum\" will uncover many web sites still in their ', '2.png'),
(12, 14, 'Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \"Content here, content here\", making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \"lorem ipsum\" will uncover many web sites still in their ', '0.jpg'),
(29, 24, 'jn dajfh ohroe frpf2e3jphej ewroih3o2 2e r', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_post`
--

CREATE TABLE `recipe_post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `recipe_details` varchar(500) NOT NULL,
  `approve_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_post`
--

INSERT INTO `recipe_post` (`id`, `user_id`, `name`, `category`, `recipe_details`, `approve_status`) VALUES
(12, 2, 'Checken Beef', 'Burger', 'sndcuoa c ecg8fcef e9 ef', 1),
(24, 11, 'Pasta Basta', 'Pasta', 'This is A home made pasta.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Dob` varchar(12) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Favourite` varchar(500) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Name`, `Dob`, `Gender`, `Email`, `Favourite`, `Password`, `Type`) VALUES
(1, 'fas', '1995-05-05', 'Male', 'faisal@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', 1),
(2, 'Faisal', '1997-10-10', 'Male', 'a@a.com', '', '25d55ad283aa400af464c76d713c07ad', 2),
(3, 'wkdn', '3/6/1985', 'Male', 'awej@a.com', '', '25d55ad283aa400af464c76d713c07ad', 2),
(4, 'wkdn', '3/6/1985', 'Male', 'awej@a.com', '', '25d55ad283aa400af464c76d713c07ad', 2),
(5, '', '//', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(6, '', '//', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(7, '', '//', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2),
(8, 'Rezwan', '1995-05-05', 'Male', 'rezwan@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', 2),
(9, 'Antora', '1995-10-05', 'Female', 'antora@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', 2),
(10, 'Sheehab', '1995-10-10', 'Male', 'sheehab@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', 2),
(11, 'Faisal', '2018-12-11', 'Male', 'faisal1@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_chatagory`
--
ALTER TABLE `recipe_chatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_details`
--
ALTER TABLE `recipe_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_instruct`
--
ALTER TABLE `recipe_instruct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_post`
--
ALTER TABLE `recipe_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recipe_chatagory`
--
ALTER TABLE `recipe_chatagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recipe_details`
--
ALTER TABLE `recipe_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `recipe_instruct`
--
ALTER TABLE `recipe_instruct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `recipe_post`
--
ALTER TABLE `recipe_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
