-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 18, 2021 at 03:21 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_roomreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE IF NOT EXISTS `tbl_course` (
  `CourseID` varchar(10) NOT NULL,
  `Description` varchar(20) NOT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`CourseID`, `Description`) VALUES
('CIDOO1', 'BSIT'),
('CIDOO2', 'BSED'),
('CIDOO3', 'BSIE'),
('CIDOO4', 'BSCE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

DROP TABLE IF EXISTS `tbl_faculty`;
CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `FacultyID` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Birthday` date NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`FacultyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`FacultyID`, `FirstName`, `MiddleName`, `LastName`, `Birthday`, `Password`) VALUES
('dsfsd', 'dsfsf', 'dsf', 'sds', '2021-01-12', 'dsf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

DROP TABLE IF EXISTS `tbl_reservation`;
CREATE TABLE IF NOT EXISTS `tbl_reservation` (
  `ReservationID` int(10) NOT NULL AUTO_INCREMENT,
  `RoomID` varchar(10) NOT NULL,
  `FacultyID` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `TimeIn` time NOT NULL,
  `TimeOut` time NOT NULL,
  `SubjectID` varchar(10) NOT NULL,
  `CourseID` varchar(10) NOT NULL,
  `YearID` varchar(10) NOT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `SubjectID` (`SubjectID`),
  KEY `RoomID` (`RoomID`),
  KEY `CourseID` (`CourseID`),
  KEY `RoomID_2` (`RoomID`),
  KEY `FacultyID` (`FacultyID`),
  KEY `YearID` (`YearID`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`ReservationID`, `RoomID`, `FacultyID`, `Date`, `TimeIn`, `TimeOut`, `SubjectID`, `CourseID`, `YearID`) VALUES
(107, 'RM005', 'dsfsd', '2021-01-18', '23:12:00', '23:15:00', 'INTE004', 'CIDOO1', 'YR001'),
(108, 'RM001', 'dsfsd', '2021-01-18', '23:14:00', '23:14:00', 'INTE004', 'CIDOO1', 'YR001'),
(109, 'RM001', 'dsfsd', '2021-01-18', '23:15:00', '23:19:00', 'INTE004', 'CIDOO1', 'YR001'),
(110, 'RM001', 'dsfsd', '2021-01-18', '23:21:00', '23:26:00', 'INTE004', 'CIDOO1', 'YR001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

DROP TABLE IF EXISTS `tbl_room`;
CREATE TABLE IF NOT EXISTS `tbl_room` (
  `RoomID` varchar(10) NOT NULL,
  `Description` varchar(10) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`RoomID`, `Description`) VALUES
('RM001', '504'),
('RM002', '503'),
('RM003', '502'),
('RM004', '501'),
('RM005', '404'),
('RM006', '403'),
('RM007', '402'),
('RM008', '401'),
('RM009', '304'),
('RM010', '303'),
('RM011', '302'),
('RM012', '301'),
('RM013', '204'),
('RM014', '203'),
('RM015', '202'),
('RM016', '201');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `StudentID` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `CourseID` varchar(10) NOT NULL,
  `YearID` varchar(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`StudentID`),
  KEY `CourseID` (`CourseID`),
  KEY `YearID` (`YearID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`StudentID`, `FirstName`, `MiddleName`, `LastName`, `CourseID`, `YearID`, `Birthday`, `Password`) VALUES
('2018-00111-BN-0', 'Gerald', 'Lerio', 'Orzal', 'CIDOO1', 'YR003', '2021-01-06', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `SubjectID` varchar(10) NOT NULL,
  `Description` varchar(20) NOT NULL,
  PRIMARY KEY (`SubjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`SubjectID`, `Description`) VALUES
('INTE004', 'ORALCOM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

DROP TABLE IF EXISTS `tbl_year`;
CREATE TABLE IF NOT EXISTS `tbl_year` (
  `YearID` varchar(10) NOT NULL,
  `Description` int(11) NOT NULL,
  PRIMARY KEY (`YearID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`YearID`, `Description`) VALUES
('YR001', 1),
('YR002', 2),
('YR003', 3),
('YR004', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `tbl_room` (`RoomID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `tbl_course` (`CourseID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_3` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_subject` (`SubjectID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_4` FOREIGN KEY (`FacultyID`) REFERENCES `tbl_faculty` (`FacultyID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_5` FOREIGN KEY (`YearID`) REFERENCES `tbl_year` (`YearID`);

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`YearID`) REFERENCES `tbl_year` (`YearID`),
  ADD CONSTRAINT `tbl_student_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `tbl_course` (`CourseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
