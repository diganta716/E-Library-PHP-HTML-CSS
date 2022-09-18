-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 03:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `BID` int(11) NOT NULL,
  `AUTHOR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`BID`, `AUTHOR`) VALUES
(1, 'A.CONAN DOYLE'),
(2, 'H. G. WELLS'),
(3, 'HELEN KELLER');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `EDITION` int(11) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `TOTAL_PG` int(11) NOT NULL,
  `RATING` int(11) NOT NULL,
  `PUB_DATE` date NOT NULL,
  `PID` int(11) NOT NULL,
  `PDF` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BID`, `ISBN`, `TITLE`, `EDITION`, `DESCRIPTION`, `TOTAL_PG`, `RATING`, `PUB_DATE`, `PID`, `PDF`) VALUES
(1, 192835085, 'The Adventures of Sherlock Holmes', 0, 'A delight for a public that enjoys incident, mystery, and above all that matching of the wits of a clever man against the dumb resistance of the secrecy of inanimate things, which results in the triumph of the human intelligence.                                                        ', 236, 0, '1892-01-01', 3, 'The-Adventures-of-Sherlock-Holmes.pdf'),
(2, 451528522, 'The Invisible Man', 1, 'The Invisible Man of the title is Griffin, a scientist', 145, 0, '1897-01-03', 3, 'The-Invisible-Man.pdf'),
(3, 140439153, 'The Story of My Life', 1, 'Edited by John Albert Macy. This is the autobiography written by the amazing deafblind woman Helen Keller at the early age of 22.', 405, 0, '1903-02-03', 6, 'The-Story-of-My-Life.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `BID` int(11) NOT NULL,
  `ACTION` tinyint(1) NOT NULL,
  `ADV` tinyint(1) NOT NULL,
  `COMEDY` tinyint(1) NOT NULL,
  `DYSTOPIAN` tinyint(1) NOT NULL,
  `EDUCATIONAL` tinyint(1) NOT NULL,
  `FANTASY` tinyint(1) NOT NULL,
  `HISTORY` tinyint(1) NOT NULL,
  `HORROR` tinyint(1) NOT NULL,
  `MATURE` tinyint(1) NOT NULL,
  `MYSTERY` tinyint(1) NOT NULL,
  `ROMANCE` tinyint(1) NOT NULL,
  `SOL` tinyint(1) NOT NULL,
  `THRILLER` tinyint(1) NOT NULL,
  `TRAGEDY` tinyint(1) NOT NULL,
  `OTHER` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`BID`, `ACTION`, `ADV`, `COMEDY`, `DYSTOPIAN`, `EDUCATIONAL`, `FANTASY`, `HISTORY`, `HORROR`, `MATURE`, `MYSTERY`, `ROMANCE`, `SOL`, `THRILLER`, `TRAGEDY`, `OTHER`) VALUES
(1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PID` int(11) NOT NULL,
  `ADDRESS` text NOT NULL,
  `P_RATING` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PID`, `ADDRESS`, `P_RATING`) VALUES
(3, 'Dhaka, Bangladesh', 5),
(6, 'Mohakhali, Dhaka, Bangladesh', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `RID` int(11) NOT NULL,
  `BID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`RID`, `BID`) VALUES
(1, 2),
(2, 3),
(5, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_stat`
--

CREATE TABLE `sub_stat` (
  `TRXID` varchar(50) NOT NULL,
  `RID` int(11) NOT NULL,
  `TRX_DATE` date NOT NULL,
  `S_END` date NOT NULL,
  `B_FLAG` tinyint(1) NOT NULL,
  `N_FLAG` tinyint(1) NOT NULL,
  `R_FLAG` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_stat`
--

INSERT INTO `sub_stat` (`TRXID`, `RID`, `TRX_DATE`, `S_END`, `B_FLAG`, `N_FLAG`, `R_FLAG`) VALUES
('201049', 5, '2022-03-15', '2022-04-15', 0, 1, 0),
('248168', 2, '2022-02-01', '2022-03-01', 0, 0, 1),
('284791', 2, '2022-04-10', '2022-05-10', 0, 1, 0),
('837592', 1, '2022-04-01', '2022-05-01', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userbase`
--

CREATE TABLE `userbase` (
  `EMAIL` varchar(50) NOT NULL,
  `UNAME` varchar(50) NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `GENDER` char(1) NOT NULL,
  `AGE` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `ADMIN_FLAG` tinyint(1) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userbase`
--

INSERT INTO `userbase` (`EMAIL`, `UNAME`, `BIRTHDATE`, `GENDER`, `AGE`, `UID`, `ADMIN_FLAG`, `PASSWORD`) VALUES
('labib@gmail.com', 'Labib', '1983-02-19', 'M', 39, 1, 1, 'asdf'),
('hasinifty@live.com', 'Hasin', '1998-12-01', 'M', 23, 2, 0, 'asdfg'),
('publisher1@mail.com', 'Publisher One', '2002-01-01', 'P', 20, 3, 0, 'pub654321'),
('admin@admin.com', 'Admin', '2012-04-01', 'M', 10, 4, 1, 'admin654321'),
('alfessani@mail.com', 'Alfessani', '1999-01-01', 'M', 23, 5, 0, '123'),
('cse@bracu.ac.bd', 'BRAC CSE', '2001-01-01', 'P', 21, 6, 0, 'pub789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BID`,`ISBN`),
  ADD KEY `FK_PUBID_BOOK` (`PID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD KEY `FK_RID` (`RID`),
  ADD KEY `FK_BOOKID` (`BID`);

--
-- Indexes for table `sub_stat`
--
ALTER TABLE `sub_stat`
  ADD PRIMARY KEY (`TRXID`,`RID`),
  ADD KEY `FK_USERID_TRX` (`RID`);

--
-- Indexes for table `userbase`
--
ALTER TABLE `userbase`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `UNAME` (`UNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userbase`
--
ALTER TABLE `userbase`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `FK_BOOKID_AUTHOR` FOREIGN KEY (`BID`) REFERENCES `book` (`BID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_PUBID_BOOK` FOREIGN KEY (`PID`) REFERENCES `publisher` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `FK_BOOKID_GENRE` FOREIGN KEY (`BID`) REFERENCES `book` (`BID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `publisher`
--
ALTER TABLE `publisher`
  ADD CONSTRAINT `FK_PUBID` FOREIGN KEY (`PID`) REFERENCES `userbase` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reader`
--
ALTER TABLE `reader`
  ADD CONSTRAINT `FK_BOOKID` FOREIGN KEY (`BID`) REFERENCES `book` (`BID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RID` FOREIGN KEY (`RID`) REFERENCES `userbase` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_stat`
--
ALTER TABLE `sub_stat`
  ADD CONSTRAINT `FK_USERID_TRX` FOREIGN KEY (`RID`) REFERENCES `reader` (`RID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
