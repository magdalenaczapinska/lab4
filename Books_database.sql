-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2017 at 02:35 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Books database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `First name` varchar(30) NOT NULL,
  `Last name` varchar(30) NOT NULL,
  `Social security number` int(11) NOT NULL,
  `Birth year` date NOT NULL,
  `Link` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `ISBN` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Edition` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `Publishing` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `onloan` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`ISBN`, `Title`, `Pages`, `Edition`, `Year`, `Publishing`, `Author`, `onloan`) VALUES
(123, 'Commonwealth', 120, 1, 2016, 'Publisher', 'Ann Patchett', 0),
(234, 'Evicted', 300, 1, 2016, 'Puvblisher', 'Matthew Desmond', 0),
(345, 'Swing Time', 144, 1, 2015, 'Publisher ', 'Zadie Smith', 1),
(434, 'Mockingjay', 392, 1, 2010, 'Scholastic Press', 'Suzanne Collins', 1),
(665, 'Gone Girl', 415, 1, 2014, 'Broadway Books', 'Gillian Flynn', 1),
(767, 'The Martian ', 369, 1, 2014, 'Crown', 'Andy Weir ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Primary keys`
--

CREATE TABLE `Primary keys` (
  `ISBN` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `Primary keys`
--
ALTER TABLE `Primary keys`
  ADD KEY `ID key` (`ID`),
  ADD KEY `ISBN key` (`ISBN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Primary keys`
--
ALTER TABLE `Primary keys`
  ADD CONSTRAINT `ID key` FOREIGN KEY (`ID`) REFERENCES `Author` (`ID`),
  ADD CONSTRAINT `ISBN key` FOREIGN KEY (`ISBN`) REFERENCES `Book` (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
