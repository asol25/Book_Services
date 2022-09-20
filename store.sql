-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 08:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `AUTHOR_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AUTHOR_ID`, `name`) VALUES
(0, 'BEN'),
(1, 'JACK');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `isbn` int(11) NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `publisher` int(11) NOT NULL,
  `book_genres` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `subtitle`, `isbn`, `price`, `picture`, `url`, `author`, `publisher`, `book_genres`) VALUES
(0, 'Practical MongoDB', 'Architecting, Developing, and Administering MongoDB', 2147483647, 41, 'https://itbook.store/img/books/9781484206485.png', 'https://itbook.store/books/9781484206485', 0, 0, 1),
(1, 'harry potter', 'https://kenh14cdn.com/203336854389633024/2022/8/16/harry-potter-daniel-radcliffe-ngue1bb93n-time-magazine-1-1660639976671474783714.jpg', 12312, 500000, 'https://vcdn1-giaitri.vnecdn.net/2021/11/06/harry-potter-jpeg-9751-1636201178.jpg?w=0&h=0&q=100&dpr=2&fit=crop&s=5cPpUIHmfPUbCltjVjeizw', 'https://vnexpress.net/harry-potter-va-hon-da-phu-thuy-20-nam-giac-mong-ky-ao-4381965.html', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `book_ID` int(11) NOT NULL,
  `genres_ID` int(11) NOT NULL,
  `book_genres` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`book_ID`, `genres_ID`, `book_genres`) VALUES
(0, 1, 1),
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genres_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genres_ID`, `name`) VALUES
(0, 'coding'),
(1, 'programing');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `name`) VALUES
(0, 'Mongodb'),
(1, 'JAVA'),
(2, 'JS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`AUTHOR_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `author` (`author`),
  ADD KEY `publisher` (`publisher`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`book_ID`,`genres_ID`),
  ADD KEY `genres_ID` (`genres_ID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genres_ID`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author`) REFERENCES `authors` (`AUTHOR_ID`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publishers` (`publisher_id`);

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD CONSTRAINT `book_genres_ibfk_1` FOREIGN KEY (`book_ID`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `book_genres_ibfk_2` FOREIGN KEY (`genres_ID`) REFERENCES `genres` (`genres_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
