-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2014 at 05:38 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `upi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE IF NOT EXISTS `attendances` (
`id` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tipo` varchar(255) NOT NULL,
  `idsubject` int(11) NOT NULL,
  `iddevice` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `start`, `end`, `tipo`, `idsubject`, `iddevice`) VALUES
(41, '2014-12-15 02:42:28', '2014-12-15 03:02:28', 'T', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('admin', '1', NULL, 'N;'),
('professor', '3', NULL, 'N;'),
('student', '4', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;'),
('professor', 2, '', NULL, 'N;'),
('student', 2, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `MAC` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bMAC` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `MAC`, `bname`, `bMAC`) VALUES
(1, 'Clase 0.1', 'b8:27:eb:57:62:14', 'Clase 0.1', '00:15:83:0C:BF:EB');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` float DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visibility` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `size`, `date`, `visibility`, `idsubject`, `path`, `file`) VALUES
(11, 'Presentation', 0.437432, '2014-12-15 01:47:53', 1, 3, '/files/TFG', 'pre.pdf'),
(14, 'Documentation', 0.437432, '2014-12-15 04:36:38', 1, 3, '/files/TFG', 'doc.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `iniciales` varchar(255) NOT NULL,
  `creditos` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `codigo`, `nombre`, `iniciales`, `creditos`) VALUES
(1, 'ALEM-001', 'Algebra Lineal y Estructuras Matematicas', 'ALEM', 6),
(2, 'CA-001', 'Calculo', 'CA', 6),
(3, '007', 'Trabajo Fin de Grado', 'TFG', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `dni`, `password`, `photo`, `rol`) VALUES
(1, 'Francisco', 'Carranza', 'carranzafr@gmail.com', '76423660-L', '20ac3c66cc14f0680f99fb5e66532cb7f601020d', 'default.png', 'admin'),
(3, 'Almudena', 'Pavon', 'pavonal@gmail.com', '75168772-B', '20ac3c66cc14f0680f99fb5e66532cb7f601020d', 'default.png', 'professor'),
(4, 'Pilar', 'Garcia', 'garciapi@gmail.com', '12345678-A', '20ac3c66cc14f0680f99fb5e66532cb7f601020d', 'default.png', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `usersattendances`
--

CREATE TABLE IF NOT EXISTS `usersattendances` (
  `iduser` int(11) NOT NULL,
  `idattendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userssubjects`
--

CREATE TABLE IF NOT EXISTS `userssubjects` (
  `iduser` int(11) NOT NULL,
  `idsubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userssubjects`
--

INSERT INTO `userssubjects` (`iduser`, `idsubject`) VALUES
(1, 1),
(1, 2),
(1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
 ADD PRIMARY KEY (`id`), ADD KEY `idsubject` (`idsubject`), ADD KEY `iddevice` (`iddevice`);

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
 ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `MAC` (`MAC`), ADD UNIQUE KEY `bMAC` (`bMAC`), ADD UNIQUE KEY `bMAC_2` (`bMAC`), ADD UNIQUE KEY `bname` (`bname`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
 ADD PRIMARY KEY (`id`), ADD KEY `idsubject` (`idsubject`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `dni` (`dni`);

--
-- Indexes for table `usersattendances`
--
ALTER TABLE `usersattendances`
 ADD PRIMARY KEY (`iduser`,`idattendance`), ADD KEY `idattendance` (`idattendance`);

--
-- Indexes for table `userssubjects`
--
ALTER TABLE `userssubjects`
 ADD PRIMARY KEY (`iduser`,`idsubject`), ADD KEY `idsubject` (`idsubject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`idsubject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`iddevice`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`idsubject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usersattendances`
--
ALTER TABLE `usersattendances`
ADD CONSTRAINT `usersattendances_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `usersattendances_ibfk_2` FOREIGN KEY (`idattendance`) REFERENCES `attendances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userssubjects`
--
ALTER TABLE `userssubjects`
ADD CONSTRAINT `userssubjects_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `userssubjects_ibfk_2` FOREIGN KEY (`idsubject`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
