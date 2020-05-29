-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2020 at 10:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RAQASH`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `Ausername` varchar(10) NOT NULL,
  `Apassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`Ausername`, `Apassword`) VALUES
('@admin', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Stand-in structure for view `allusers`
-- (See below for the actual view)
--
CREATE TABLE `allusers` (
`users` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `Artist`
--

CREATE TABLE `Artist` (
  `ARusername` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `ARpassword` varchar(100) NOT NULL,
  `email` text NOT NULL DEFAULT '@gmail.com',
  `admin_username` varchar(20) NOT NULL DEFAULT 'admin',
  `bio` varchar(500) DEFAULT NULL,
  `twitter` varchar(20) DEFAULT NULL,
  `account_image` varchar(300) DEFAULT 'download.png',
  `Approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Artist`
--

INSERT INTO `Artist` (`ARusername`, `name`, `ARpassword`, `email`, `admin_username`, `bio`, `twitter`, `account_image`, `Approved`) VALUES
('@renad2', 'Renad', 'e10adc3949ba59abbe56e057f20f883e', 'renad@gmail.com', 'admin', 'I am an ARTIST', NULL, 'download.png', 0),
('@Riham2', 'riham', 'e10adc3949ba59abbe56e057f20f883e', 'e@gmail.com', 'admin', 'riham ', NULL, 'draw-one-line-art.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ArtWork`
--

CREATE TABLE `ArtWork` (
  `AId` int(4) NOT NULL,
  `Title` text NOT NULL,
  `Art_description` text DEFAULT NULL,
  `Number_of_like` int(20) DEFAULT 0,
  `Number_of_dislike` int(20) DEFAULT 0,
  `Artist_username` varchar(20) DEFAULT 'a',
  `Published_date` date DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `disabel_comment` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ArtWork`
--

INSERT INTO `ArtWork` (`AId`, `Title`, `Art_description`, `Number_of_like`, `Number_of_dislike`, `Artist_username`, `Published_date`, `img`, `disabel_comment`) VALUES
(396, 'Art', 'Lovely Art', 0, 0, '@riham2', '2020-04-12', '1586680717_1586668227_1.jpeg', 1),
(397, 'it is about u', 'The line is one of the seven elements of art', 0, 0, '@riham2', '2020-04-12', '1586680850_1586667866_color.jpg', 1),
(398, 'how much longer', 'trying to draw a new way of art!', 0, 0, '@riham2', '2020-04-12', '1586680913_1586642256_701185780bf347d224c493d89bfe24a0.jpg', 0),
(399, 'Stars', 'Shine STARS!', 0, 0, '@riham2', '2020-04-12', '1586680959_1586303588_viewArtWorkImg.jpg', 0),
(400, 'Elephant ', 'This can be a great introductory drawing exercise', 0, 0, '@riham2', '2020-04-12', '1586680985_1586642293_aleph.jpg', 1),
(401, 'HEART', 'Small font drawn using only solid line', 0, 0, '@riham2', '2020-04-12', '1586681044_1586642265_Embedded – Dessins Minimalistes - Hollowen.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `Date` date NOT NULL,
  `Text` text NOT NULL,
  `CId` int(4) NOT NULL,
  `Vistor_username` varchar(20) NOT NULL,
  `Art_work_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`Date`, `Text`, `CId`, `Vistor_username`, `Art_work_id`) VALUES
('2020-04-12', 'riham', 4, '@rihamV', 387),
('2020-04-12', 'riham2', 5, '@rihamV', 387),
('2020-04-12', 'rihammm', 6, '@rihamV', 387);

-- --------------------------------------------------------

--
-- Table structure for table `dislike`
--

CREATE TABLE `dislike` (
  `Artwork_id` int(4) NOT NULL,
  `Vistor_username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Favourite`
--

CREATE TABLE `Favourite` (
  `Vistor_username` varchar(20) NOT NULL,
  `Artwork_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Favourite`
--

INSERT INTO `Favourite` (`Vistor_username`, `Artwork_id`) VALUES
('@rihamv', 401),
('@rihamv', 400);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `Vistor_username` varchar(20) NOT NULL,
  `Artwork_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`Vistor_username`, `Artwork_id`) VALUES
('@rihamv', 393);

-- --------------------------------------------------------

--
-- Table structure for table `Vistor`
--

CREATE TABLE `Vistor` (
  `Vusername` varchar(20) NOT NULL,
  `Vpassword` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Vistor`
--

INSERT INTO `Vistor` (`Vusername`, `Vpassword`, `email`, `name`) VALUES
('@rihamV', 'e10adc3949ba59abbe56e057f20f883e', 'r@gmail.com', 'riham'),
('riham1', 'e10adc3949ba59abbe56e057f20f883e', 'rihammastour@gmail.com', 'riham');

-- --------------------------------------------------------

--
-- Structure for view `allusers`
--
DROP TABLE IF EXISTS `allusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allusers`  AS  (select `Vistor`.`Vusername` AS `users` from `Vistor`) union (select `Artist`.`ARusername` AS `users` from `Artist`) union (select `Admin`.`Ausername` AS `users` from `Admin`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Ausername`);

--
-- Indexes for table `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`ARusername`),
  ADD KEY `admin_username` (`admin_username`);

--
-- Indexes for table `ArtWork`
--
ALTER TABLE `ArtWork`
  ADD PRIMARY KEY (`AId`),
  ADD KEY `Artist_username` (`Artist_username`),
  ADD KEY `Artist_username_2` (`Artist_username`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`CId`),
  ADD KEY `AId` (`Art_work_id`);

--
-- Indexes for table `dislike`
--
ALTER TABLE `dislike`
  ADD UNIQUE KEY `Vistor_username` (`Vistor_username`),
  ADD UNIQUE KEY `Artwork_id` (`Artwork_id`);

--
-- Indexes for table `Favourite`
--
ALTER TABLE `Favourite`
  ADD KEY `Vistor_username` (`Vistor_username`),
  ADD KEY `Artwork_id` (`Artwork_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `Artwork_id` (`Artwork_id`) USING BTREE,
  ADD UNIQUE KEY `Vistor_username` (`Vistor_username`(2)) USING BTREE,
  ADD KEY `Vistor_username_2` (`Vistor_username`);

--
-- Indexes for table `Vistor`
--
ALTER TABLE `Vistor`
  ADD PRIMARY KEY (`Vusername`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `Vusername` (`Vusername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ArtWork`
--
ALTER TABLE `ArtWork`
  MODIFY `AId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `CId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ArtWork`
--
ALTER TABLE `ArtWork`
  ADD CONSTRAINT `ArtWork_ibfk_1` FOREIGN KEY (`AId`) REFERENCES `Favourite` (`Artwork_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dislike`
--
ALTER TABLE `dislike`
  ADD CONSTRAINT `dislike_ibfk_1` FOREIGN KEY (`Artwork_id`) REFERENCES `ArtWork` (`AId`),
  ADD CONSTRAINT `dislike_ibfk_2` FOREIGN KEY (`Vistor_username`) REFERENCES `Vistor` (`Vusername`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`Artwork_id`) REFERENCES `ArtWork` (`AId`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`Vistor_username`) REFERENCES `Vistor` (`Vusername`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
