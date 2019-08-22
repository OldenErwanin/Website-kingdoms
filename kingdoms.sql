-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2019 at 10:28 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kingdoms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cID` int(11) NOT NULL AUTO_INCREMENT,
  `toID` int(11) NOT NULL,
  `cAuthor` tinytext COLLATE utf8_hungarian_ci NOT NULL,
  `cDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cText` longtext COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cID`, `toID`, `cAuthor`, `cDate`, `cText`) VALUES
(1, 4, 'OldenErwanin', '2019-08-22 08:20:00', '<p>This is a sample comment</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `nID` int(11) NOT NULL AUTO_INCREMENT,
  `nTitle` tinytext COLLATE utf8_hungarian_ci NOT NULL,
  `nAuthor` tinytext COLLATE utf8_hungarian_ci NOT NULL,
  `nDate` date NOT NULL,
  `nText` longtext COLLATE utf8_hungarian_ci NOT NULL,
  `nCategory` int(11) NOT NULL,
  `nFeatured` int(11) NOT NULL,
  `nFeaturedDate` date NOT NULL,
  `commentCount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nID`, `nTitle`, `nAuthor`, `nDate`, `nText`, `nCategory`, `nFeatured`, `nFeaturedDate`, `commentCount`) VALUES
(3, 'Simple, server title', 'asd', '2019-08-22', '<p>Pharetra sit amet aliquam id diam maecenas ultricies mi eget. Quisque sagittis purus sit amet volutpat consequat mauris nunc congue. Vitae congue eu consequat ac felis donec et odio. Quam elementum pulvinar etiam non quam lacus suspendisse. Pharetra convallis posuere morbi leo urna molestie at elementum eu. Adipiscing enim eu turpis egestas pretium. Dictum non consectetur a erat. Etiam non quam lacus suspendisse faucibus interdum. Nunc sed velit dignissim sodales ut eu sem integer. Diam donec adipiscing tristique risus nec feugiat. Hac habitasse platea dictumst quisque sagittis purus sit. Sit amet luctus venenatis lectus magna fringilla urna porttitor. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Ultricies mi quis hendrerit dolor magna eget est.</p>\r\n', 1, 0, '1970-01-01', 0),
(2, 'Featured news', 'asd', '2019-08-22', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi enim nunc faucibus a pellentesque. Non arcu risus quis varius. Elit at imperdiet dui accumsan sit. Sed viverra ipsum nunc aliquet bibendum enim. Venenatis a condimentum vitae sapien. Dictum non consectetur a erat nam at. Pharetra sit amet aliquam id diam maecenas. Nisl condimentum id venenatis a condimentum vitae sapien pellentesque. Pellentesque habitant morbi tristique senectus. Vel eros donec ac odio tempor. Sem viverra aliquet eget sit amet tellus cras. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Suscipit adipiscing bibendum est ultricies integer quis auctor. Leo integer malesuada nunc vel risus commodo viverra maecenas. Nibh tellus molestie nunc non blandit massa enim nec dui. Vel pharetra vel turpis nunc. Ornare arcu dui vivamus arcu felis bibendum ut. Nibh mauris cursus mattis molestie a iaculis at.</p>\r\n', 2, 1, '2019-12-24', 0),
(4, 'Simple, blog title', 'asd', '2019-08-22', '<p>Nibh tellus molestie nunc non blandit massa enim. In ante metus dictum at tempor. Vestibulum sed arcu non odio euismod lacinia at. Orci ac auctor augue mauris augue neque gravida. Sed egestas egestas fringilla phasellus faucibus. Quam quisque id diam vel quam elementum pulvinar etiam. Mi proin sed libero enim sed faucibus turpis in. Neque gravida in fermentum et sollicitudin. Dictum non consectetur a erat. Sit amet mattis vulputate enim. Sit amet nulla facilisi morbi. Venenatis urna cursus eget nunc scelerisque. Et egestas quis ipsum suspendisse. Lectus mauris ultrices eros in cursus turpis. Tincidunt eget nullam non nisi est sit amet. In pellentesque massa placerat duis ultricies lacus sed turpis tincidunt.</p>\r\n', 3, 0, '1970-01-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uID` int(11) NOT NULL AUTO_INCREMENT,
  `uName` tinytext COLLATE utf8_hungarian_ci NOT NULL,
  `uEmail` tinytext COLLATE utf8_hungarian_ci NOT NULL,
  `uPwd` longtext COLLATE utf8_hungarian_ci NOT NULL,
  `uAdmin` int(11) NOT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `uName`, `uEmail`, `uPwd`, `uAdmin`) VALUES
(4, 'OldenErwanin', 'arrow159474@gmail.com', '$2y$10$HRI87OrLHY2PZ1LrN.sZoevAZywMXp3hztu1mW8blsjWZ31THxZj.', 1),
(5, 'rtt', 'rtt@gmail.com', '$2y$10$g0u5eDpnn8M.b18h/UyXF.7wFsEYaLzALiWWaos48J5xIzY0hmyBG', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
