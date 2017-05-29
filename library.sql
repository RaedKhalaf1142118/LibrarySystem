-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 04:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountNumber` int(11) NOT NULL,
  `username` char(100) DEFAULT NULL,
  `password` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountNumber`, `username`, `password`) VALUES
(1142118, '1142118', 'Rk23144132'),
(43214234, 'MohAliKh', 'Rk23144132');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` char(100) DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `salary` double DEFAULT NULL,
  `phoneNumber` char(30) DEFAULT NULL,
  `password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `id`, `salary`, `phoneNumber`, `password`) VALUES
('adminRaed', 'Raed Khalaf', 1142118, 2500, '598303257', 'Rk23144132');

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount`
--

CREATE TABLE `bankaccount` (
  `accountNumber` int(11) NOT NULL,
  `creditCardNumber` int(11) DEFAULT NULL,
  `bankName` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankaccount`
--

INSERT INTO `bankaccount` (`accountNumber`, `creditCardNumber`, `bankName`) VALUES
(1142118, 1142118, 'Palestine'),
(3141243, 31243123, 'Palestine');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` int(11) NOT NULL,
  `name` char(100) DEFAULT NULL,
  `authors` char(100) DEFAULT NULL,
  `publishers` char(100) DEFAULT NULL,
  `publishDate` date DEFAULT NULL,
  `edition` int(11) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT NULL,
  `genraId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `name`, `authors`, `publishers`, `publishDate`, `edition`, `disabled`, `genraId`) VALUES
(123, 'Raed', 'Raed', 'Raed', '0001-01-01', 2, 0, 1),
(1425, 'Raed Khalaf2', 'Laith', 'Luai', '2017-12-31', 2, 0, 1),
(877097, 'Raed Testing', 'Raedsknfd', 'OJW', '2013-10-27', 4, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bookcopy`
--

CREATE TABLE `bookcopy` (
  `borrowedDate` date DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `id` int(11) NOT NULL,
  `bookId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrowingmessage`
--

CREATE TABLE `borrowingmessage` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `userId` int(11) NOT NULL,
  `bookcopyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivers`
--

CREATE TABLE `delivers` (
  `bookcopyId` int(11) NOT NULL,
  `deliverymanId` int(11) NOT NULL,
  `borrowingmessageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `username` char(100) DEFAULT NULL,
  `fullname` char(150) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `salary` double DEFAULT NULL,
  `phoneNumber` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `title` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `title`) VALUES
(1, 'education'),
(2, 'Science'),
(3, 'space'),
(4, 'literature');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `deliverymanId` int(11) NOT NULL,
  `borrowingmessageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratereview`
--

CREATE TABLE `ratereview` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text,
  `userId` int(11) DEFAULT NULL,
  `bookId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratereview`
--

INSERT INTO `ratereview` (`id`, `rating`, `review`, `userId`, `bookId`) VALUES
(1, 4, 'This Book is good', 2147483647, 877097),
(2, 3, '													Write Your Review Here\r\n												', 3610388, 877097),
(3, 5, '													Write Your Review Here\r\n												', 3610388, 877097);

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

CREATE TABLE `systemuser` (
  `id` int(11) NOT NULL,
  `fullName` char(100) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `address` char(200) DEFAULT NULL,
  `phoneNumber` char(100) DEFAULT NULL,
  `accountId` int(11) DEFAULT NULL,
  `bankAccountID` int(11) DEFAULT NULL,
  `isFeasible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`id`, `fullName`, `email`, `dateOfBirth`, `address`, `phoneNumber`, `accountId`, `bankAccountID`, `isFeasible`) VALUES
(3610388, 'MohammedAli', 'Mohammed@mohammed.com', '2012-12-28', 'Birzeit', '953245', 43214234, 3141243, 1),
(2147483647, 'raed', 'Raed.Khalaf@exalt.ps', '2015-10-30', 'Ramallah', '0598303257', 1142118, 1142118, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toadminmessage`
--

CREATE TABLE `toadminmessage` (
  `id` int(11) NOT NULL,
  `subject` char(100) DEFAULT NULL,
  `contentText` text,
  `sendDate` date DEFAULT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toadminmessage`
--

INSERT INTO `toadminmessage` (`id`, `subject`, `contentText`, `sendDate`, `userId`) VALUES
(1, 'Service', 'The webSite is soo cool', '2017-05-29', 2147483647),
(3, 'Service', 'This is the Last Message', '2017-05-29', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountNumber`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`accountNumber`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `genraId` (`genraId`);

--
-- Indexes for table `bookcopy`
--
ALTER TABLE `bookcopy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `borrowingmessage`
--
ALTER TABLE `borrowingmessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`userId`,`bookcopyId`),
  ADD KEY `bookcopyId` (`bookcopyId`);

--
-- Indexes for table `delivers`
--
ALTER TABLE `delivers`
  ADD PRIMARY KEY (`bookcopyId`,`deliverymanId`,`borrowingmessageId`),
  ADD KEY `deliverymanId` (`deliverymanId`),
  ADD KEY `borrowingmessageId` (`borrowingmessageId`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`deliverymanId`,`borrowingmessageId`),
  ADD KEY `borrowingmessageId` (`borrowingmessageId`);

--
-- Indexes for table `ratereview`
--
ALTER TABLE `ratereview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountId` (`accountId`),
  ADD KEY `bankAccountID` (`bankAccountID`);

--
-- Indexes for table `toadminmessage`
--
ALTER TABLE `toadminmessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ratereview`
--
ALTER TABLE `ratereview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `toadminmessage`
--
ALTER TABLE `toadminmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`genraId`) REFERENCES `genre` (`id`);

--
-- Constraints for table `bookcopy`
--
ALTER TABLE `bookcopy`
  ADD CONSTRAINT `bookcopy_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `borrowingmessage`
--
ALTER TABLE `borrowingmessage`
  ADD CONSTRAINT `borrowingmessage_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `systemuser` (`id`),
  ADD CONSTRAINT `borrowingmessage_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `systemuser` (`id`),
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`bookcopyId`) REFERENCES `bookcopy` (`id`);

--
-- Constraints for table `delivers`
--
ALTER TABLE `delivers`
  ADD CONSTRAINT `delivers_ibfk_1` FOREIGN KEY (`bookcopyId`) REFERENCES `bookcopy` (`id`),
  ADD CONSTRAINT `delivers_ibfk_2` FOREIGN KEY (`deliverymanId`) REFERENCES `deliveryman` (`id`),
  ADD CONSTRAINT `delivers_ibfk_3` FOREIGN KEY (`borrowingmessageId`) REFERENCES `borrowingmessage` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`deliverymanId`) REFERENCES `deliveryman` (`id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`borrowingmessageId`) REFERENCES `borrowingmessage` (`id`);

--
-- Constraints for table `ratereview`
--
ALTER TABLE `ratereview`
  ADD CONSTRAINT `ratereview_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `systemuser` (`id`),
  ADD CONSTRAINT `ratereview_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD CONSTRAINT `systemuser_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `account` (`accountNumber`),
  ADD CONSTRAINT `systemuser_ibfk_2` FOREIGN KEY (`bankAccountID`) REFERENCES `bankaccount` (`accountNumber`);

--
-- Constraints for table `toadminmessage`
--
ALTER TABLE `toadminmessage`
  ADD CONSTRAINT `toadminmessage_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `systemuser` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
