-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 04:25 PM
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
-- Database: `assignments4`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `allcomments`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `allcomments`;
CREATE TABLE `allcomments` (
`Cons_Name` varchar(30)
,`Email` varchar(30)
,`Vid_Title` varchar(1012)
,`Vid_Tags` text
,`Comm` text
,`Com_ID` int(11)
,`Vid_ID` int(11)
,`Date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `comments_list`
--

DROP TABLE IF EXISTS `comments_list`;
CREATE TABLE `comments_list` (
  `Com_ID` int(11) NOT NULL,
  `Vid_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Comm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments_list`
--

INSERT INTO `comments_list` (`Com_ID`, `Vid_ID`, `Date`, `U_ID`, `Comm`) VALUES
(1, 1, '2025-01-09', 1, 'First Comments_list'),
(2, 2, '0000-00-00', 1, 'asfasdf'),
(3, 2, '0000-00-00', 1, 'hello\n'),
(4, 2, '0000-00-00', 1, 'new comment'),
(5, 5, '2025-01-11', 4, 'adfasd'),
(6, 5, '2025-01-11', 4, 'abcdef'),
(7, 5, '2025-01-11', 4, 'ab'),
(8, 5, '2025-01-11', 4, 'non');

-- --------------------------------------------------------

--
-- Table structure for table `consumer_list`
--

DROP TABLE IF EXISTS `consumer_list`;
CREATE TABLE `consumer_list` (
  `Cons_ID` int(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Cons_Name` varchar(30) NOT NULL,
  `Pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `consumer_list`
--

INSERT INTO `consumer_list` (`Cons_ID`, `Email`, `Cons_Name`, `Pass`) VALUES
(1, 'azizimran72@gmail.com', 'Muhammad Naeem', '123'),
(2, 'naeem@assersoft.com', 'Kashif Ali', '12345'),
(3, 'fads@gmail.com', 'dsfasd', '123'),
(4, 'has@gmail.com', 'has', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `creators_list`
--

DROP TABLE IF EXISTS `creators_list`;
CREATE TABLE `creators_list` (
  `C_ID` int(10) NOT NULL,
  `C_Name` varchar(20) NOT NULL,
  `C_Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `creators_list`
--

INSERT INTO `creators_list` (`C_ID`, `C_Name`, `C_Password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `videos_list`
--

DROP TABLE IF EXISTS `videos_list`;
CREATE TABLE `videos_list` (
  `Vid_ID` int(11) NOT NULL,
  `Vid_Source` varchar(1012) NOT NULL,
  `Vid_Title` varchar(1012) NOT NULL,
  `Vid_Tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos_list`
--

INSERT INTO `videos_list` (`Vid_ID`, `Vid_Source`, `Vid_Title`, `Vid_Tags`) VALUES
(2, 'videoplayback (2).mp4', 'Third Title', '#Third,#Value3#3'),
(3, 'videoplayback (1).mp4', 'FourthTitle', '#Fourth,#FourthValue'),
(4, 'videoplayback (4).mp4', 'First Title', '#First,#1st,#Value1'),
(5, 'videoplayback (2).mp4', 'Latest Video', '#lates');

-- --------------------------------------------------------

--
-- Structure for view `allcomments`
--
DROP TABLE IF EXISTS `allcomments`;

DROP VIEW IF EXISTS `allcomments`;
CREATE   VIEW `allcomments`  AS SELECT `consumer_list`.`Cons_Name` AS `Cons_Name`, `consumer_list`.`Email` AS `Email`, `videos_list`.`Vid_Title` AS `Vid_Title`, `videos_list`.`Vid_Tags` AS `Vid_Tags`, `comments_list`.`Comm` AS `Comm`, `comments_list`.`Com_ID` AS `Com_ID`, `videos_list`.`Vid_ID` AS `Vid_ID`, `comments_list`.`Date` AS `Date` FROM ((`consumer_list` join `comments_list` on(`consumer_list`.`Cons_ID` = `comments_list`.`U_ID`)) join `videos_list` on(`videos_list`.`Vid_ID` = `comments_list`.`Vid_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments_list`
--
ALTER TABLE `comments_list`
  ADD PRIMARY KEY (`Com_ID`);

--
-- Indexes for table `consumer_list`
--
ALTER TABLE `consumer_list`
  ADD PRIMARY KEY (`Cons_ID`);

--
-- Indexes for table `creators_list`
--
ALTER TABLE `creators_list`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `videos_list`
--
ALTER TABLE `videos_list`
  ADD PRIMARY KEY (`Vid_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments_list`
--
ALTER TABLE `comments_list`
  MODIFY `Com_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consumer_list`
--
ALTER TABLE `consumer_list`
  MODIFY `Cons_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `creators_list`
--
ALTER TABLE `creators_list`
  MODIFY `C_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos_list`
--
ALTER TABLE `videos_list`
  MODIFY `Vid_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
