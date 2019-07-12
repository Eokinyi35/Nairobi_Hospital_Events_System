-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 01:50 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tnhevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'qwertyuiop'),
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `eventchoice`
--

CREATE TABLE `eventchoice` (
  `eventId` int(11) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `firstdate` date NOT NULL,
  `seconddate` date NOT NULL,
  `eventtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventchoice`
--

INSERT INTO `eventchoice` (`eventId`, `eventname`, `image`, `firstdate`, `seconddate`, `eventtype`) VALUES
(2, 'Sports day', 'events.png', '2019-03-27', '2019-03-28', 'Sports'),
(15, 'Jazz lounge', 'events.png', '2019-03-31', '2019-04-05', 'Party'),
(16, 'Oral health campaign', 'events.png', '2019-06-28', '2019-06-27', 'Campaigns'),
(17, 'hand wash', 'events.png', '2019-06-16', '2019-06-23', 'Campaigns'),
(18, 'Oral health campaign 2', 'events.png', '2019-06-21', '2019-06-23', 'Campaigns'),
(19, 'Tree planting', 'events.png', '2019-07-12', '2019-07-11', 'Campaigns'),
(21, 'Cadbury festival', 'events.png', '2019-07-15', '2019-07-16', 'Party');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `payroll` int(20) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `payroll` int(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `eventdate` date NOT NULL,
  `eventId` int(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `eventtype` varchar(50) NOT NULL,
  `transportation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`payroll`, `fullname`, `eventname`, `eventdate`, `eventId`, `phone`, `department`, `eventtype`, `transportation`) VALUES
(7745, 'Emmanuel Okinyi ', 'Jazz lounge', '2019-04-05', 15, 706192543, 'ICT', 'Party', 'Allocated'),
(7745, 'Emmanuel Okinyi ', 'Sports day', '2019-03-27', 2, 706192543, 'ICT', 'Sports', 'Allocated'),
(7745, 'Emmanuel Okinyi ', 'Oral health campaign', '2019-06-28', 16, 706192543, 'ICT', 'Campaigns', 'Private'),
(7744, 'Emmanuel Okinyi', 'Tree planting', '2019-07-12', 19, 0, '', 'Campaigns', 'Institution provision'),
(7745, 'Emmanuel Okinyi ', 'hand wash', '2019-06-16', 17, 706192543, 'ICT', 'Campaigns', 'Private'),
(7745, 'Emmanuel Okinyi ', 'Oral health campaign 2', '2019-06-21', 18, 706192543, 'ICT', 'Campaigns', 'Institution provision');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `payroll` int(50) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `department` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`payroll`, `fullname`, `email`, `password`, `department`, `phone`) VALUES
(0, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0),
(1, 'admin', 'admin@nbihosp.org', '21232f297a57a5a743894a0e4a801fc3', 'admin', 711223344),
(2211, 'rajesh', 'rajesh@nbihosp.org', '', 'security', 2147483647),
(3322, 'Mani', 'mani@nbihosp.org', '', 'endoscopy', 2147483647),
(4433, 'Prakesh', 'prakesh@nbihosp.org', '', 'Maintainance', 766122211),
(5544, 'Qwera4', 'qwera@gmail.com', '28fc5456a17a685c0fb4d61596005e3d', 'ICT', 765432234),
(6655, 'Ishmael', 'ishmael@nbihosp.org', '6eea9b7ef19179a06954edd0f6c05ceb', 'ICT', 1234567890),
(7744, 'Emmanuel Okinyi', 'eokinyi35@gmail.com', '6eea9b7ef19179a06954edd0f6c05ceb', '', 0),
(7745, 'Emmanuel Okinyi ', 'odera@nbihosp.org', '6eea9b7ef19179a06954edd0f6c05ceb', 'ICT', 706192543);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventchoice`
--
ALTER TABLE `eventchoice`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD KEY `payroll` (`payroll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`payroll`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventchoice`
--
ALTER TABLE `eventchoice`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
