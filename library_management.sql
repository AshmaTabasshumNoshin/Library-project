-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 04:54 PM
-- Server version: 10.2.10-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_no` varchar(10) NOT NULL,
  `book_name` varchar(20) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_no`, `book_name`, `author`) VALUES
('B01', 'Pather Panchali', 'Bibhutivushon'),
('B02', 'Shesher Kabita', 'Rabindranath'),
('B03', 'Singhabahini', 'Somoresh'),
('B04', 'Aranyak', 'Bibhutivushon'),
('B05', 'Deyal', 'Humayun Ahmed'),
('B06', 'Srikanta', 'Sarat Chandra'),
('B07', 'Computer Networks', 'Tanenbum'),
('B08', 'Lalsalu', 'Waliullah'),
('B09', 'Chokher Bali', 'Rabindranath'),
('B10', 'Parimeeta', 'Sarat Chandra');

-- --------------------------------------------------------

--
-- Table structure for table `iss_rec`
--

CREATE TABLE `iss_rec` (
  `iss_no` int(11) NOT NULL,
  `iss_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Mem_no` varchar(10) DEFAULT NULL,
  `book_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iss_rec`
--

INSERT INTO `iss_rec` (`iss_no`, `iss_date`, `Mem_no`, `book_no`) VALUES
(1, '2019-08-31 16:00:56', '103', 'B03'),
(2, '2019-08-31 16:00:56', '102', 'B02'),
(3, '2019-08-31 16:00:56', '102', 'B07'),
(4, '2019-08-31 16:00:56', '105', 'B10'),
(5, '2019-08-31 16:00:56', '107', 'B09'),
(6, '2019-08-31 16:00:56', '101', 'B03'),
(7, '2019-08-31 16:00:56', '103', 'B02'),
(8, '2019-08-31 16:00:56', '106', 'B07'),
(9, '2019-08-31 16:00:56', '107', 'B03'),
(10, '2019-08-31 16:00:56', '103', 'B08'),
(11, '2019-08-31 16:00:56', '110', 'B05'),
(12, '2019-08-31 16:00:56', '108', 'B09'),
(13, '2019-09-02 03:32:59', '105', 'B04'),
(14, '2019-09-02 03:33:28', '110', 'B08'),
(15, '2019-09-02 03:33:38', '104', 'B01'),
(16, '2019-09-09 07:17:57', '106', 'B01'),
(17, '2019-09-09 07:24:11', '104', 'B03'),
(18, '2019-09-09 07:24:58', '102', 'B03');

--
-- Triggers `iss_rec`
--
DELIMITER $$
CREATE TRIGGER `book_limit` BEFORE INSERT ON `iss_rec` FOR EACH ROW BEGIN 
    IF ( SELECT COUNT(*) FROM iss_rec WHERE NEW.Mem_no = Mem_no ) = 3
    THEN SIGNAL SQLSTATE '45000' 
            SET MESSAGE_TEXT = 'Borrow limit reached !!!' ;
            END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `Mem_no` varchar(10) NOT NULL,
  `Stud_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`Mem_no`, `Stud_no`) VALUES
('108', 'C031012'),
('101', 'C033002'),
('103', 'C034102'),
('105', 'C035094'),
('102', 'C042056'),
('106', 'C042067'),
('104', 'C046034'),
('107', 'C052110'),
('110', 'C054038'),
('109', 'C062102');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Stud_no` varchar(10) NOT NULL,
  `Stud_name` varchar(20) DEFAULT NULL
) ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stud_no`, `Stud_name`) VALUES
('C031012', 'Tamanna'),
('C033002', 'Maisha'),
('C034102', 'Noshin'),
('C035094', 'Methela'),
('C042056', 'Prapti'),
('C042067', 'Swarna'),
('C046034', 'Upama'),
('C052110', 'Tisha'),
('C054038', 'Jeba'),
('C062102', 'Tadmira');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_no`);

--
-- Indexes for table `iss_rec`
--
ALTER TABLE `iss_rec`
  ADD PRIMARY KEY (`iss_no`),
  ADD KEY `Mem_no` (`Mem_no`),
  ADD KEY `book_no` (`book_no`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`Mem_no`),
  ADD KEY `Stud_no` (`Stud_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Stud_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iss_rec`
--
ALTER TABLE `iss_rec`
  MODIFY `iss_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iss_rec`
--
ALTER TABLE `iss_rec`
  ADD CONSTRAINT `iss_rec_ibfk_1` FOREIGN KEY (`Mem_no`) REFERENCES `membership` (`Mem_no`),
  ADD CONSTRAINT `iss_rec_ibfk_2` FOREIGN KEY (`book_no`) REFERENCES `book` (`book_no`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`Stud_no`) REFERENCES `student` (`Stud_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
