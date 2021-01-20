-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2021 at 12:21 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15938463_db_roomreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `CourseID` varchar(10) NOT NULL,
  `Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`CourseID`, `Description`) VALUES
('CIDOO1', 'BSIT'),
('CIDOO2', 'BSED'),
('CIDOO3', 'BSIE'),
('CIDOO4', 'BSCE'),
('CIDOO5', 'DICT'),
('CIDOO6', 'DCET'),
('CIDOO7', 'BSA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `FacultyID` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Birthday` date NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `ReservationID` int(10) NOT NULL,
  `RoomID` varchar(10) NOT NULL,
  `FacultyID` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `TimeIn` time NOT NULL,
  `TimeOut` time NOT NULL,
  `SubjectID` varchar(10) NOT NULL,
  `CourseID` varchar(10) NOT NULL,
  `YearID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `RoomID` varchar(10) NOT NULL,
  `Description` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tbl_student` (
  `StudentID` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `CourseID` varchar(10) NOT NULL,
  `YearID` varchar(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `SubjectID` varchar(10) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`SubjectID`, `Description`) VALUES
('COMP 20123', 'Fundamentals of Research'),
('COMP 20163', 'Web Development'),
('COMP 20213', 'Database Administration'),
('GEED 10073', 'Art Appreciation'),
('INTE 30033', 'Systems Integration and Architecture 1'),
('INTE 30043', 'Multimedia'),
('INTE-E1', 'IT Elective 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `YearID` varchar(10) NOT NULL,
  `Description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`YearID`, `Description`) VALUES
('YR001', 1),
('YR002', 2),
('YR003', 3),
('YR004', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`FacultyID`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `SubjectID` (`SubjectID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `RoomID_2` (`RoomID`),
  ADD KEY `FacultyID` (`FacultyID`),
  ADD KEY `YearID` (`YearID`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `YearID` (`YearID`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`YearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `ReservationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

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
