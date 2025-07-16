-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 09:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animodiso`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`emailid`, `password`) VALUES
('', ''),
('', ''),
('atharvgaikwad414@gmail.com', 'Atharv@123');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `emailid` varchar(50) NOT NULL,
  `productid` int(100) NOT NULL,
  `productimages` varchar(1000) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productprice` int(10) NOT NULL,
  `productquantity` int(50) NOT NULL,
  `totalamount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`emailid`, `productid`, `productimages`, `productname`, `productprice`, `productquantity`, `totalamount`) VALUES
('atharvgaikwad@414gmail.com', 37, 'd7.jpg', 'Dog Food by Pedigree for Adults', 750, 1, 750),
('anujagaikwadbcse@gmail.com', 36, 'd6.jpg', 'Dog Food by Royal Canin for German Shephard', 600, 2, 1200),
('anujagaikwadbcse@gmail.com', 37, 'd7.jpg', 'Dog Food by Pedigree for Adults', 750, 1, 750),
('anujagaikwadbcse@gmail.com', 37, 'd7.jpg', 'Dog Food by Pedigree for Adults', 750, 1, 750);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `emailid` varchar(50) NOT NULL,
  `productid` int(11) NOT NULL,
  `productimages` varchar(1000) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productprice` int(11) NOT NULL,
  `productquantity` int(11) NOT NULL,
  `totalamount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdet`
--

CREATE TABLE `orderdet` (
  `ordno` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordermst`
--

CREATE TABLE `ordermst` (
  `odt` varchar(30) NOT NULL,
  `ordno` int(11) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `odt` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `cardnumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`odt`, `emailid`, `mode`, `amount`, `cardnumber`) VALUES
('25-02-2024', 'atharvgaikwad@414gmail.com', '', 500, 0),
('25-02-2024', 'atharvgaikwad@414gmail.com', '', 750, 0),
('26-02-2024', 'pratikshabhosale639@gmail.com', '', 1000, 0),
('26-02-2024', 'pratikshabhosale639@gmail.com', '', 2000, 0),
('26-02-2024', 'sudhirbhosale1939@gmail.com', '', 2100, 0),
('26-02-2024', 'sudhirbhosale1939@gmail.com', '', 2100, 0),
('28-02-2024', 'atharvgaikwad@414gmail.com', '', 4100, 0),
('29-02-2024', 'anujagaikwadbcse@gmail.com', '', 1100, 0),
('29-02-2024', 'anujagaikwadbcse@gmail.com', '', 1200, 0),
('06-03-2024', 'anujagaikwadbcse@gmail.com', '', 750, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(20) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productprice` int(10) NOT NULL,
  `productimages` varchar(1000) NOT NULL,
  `productquantity` int(50) NOT NULL,
  `productcategories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `productprice`, `productimages`, `productquantity`, `productcategories`) VALUES
(35, 'Dog Food by Royal Canin', 700, 'd4.jpg', 10, 'Shop for Dogs'),
(37, 'Dog Food by Pedigree for Adults', 750, 'd7.jpg', 7, 'Shop for Dogs'),
(38, 'Dog Food by SuperCoats for puppies', 300, 'd8.jpg', 4, 'Shop for Dogs'),
(40, 'Dog Food by One', 750, 'd10.jpg', 2, 'Shop for Dogs'),
(41, 'Dog Food by Goofy Fresh', 450, 'd11.jpg', 12, 'Shop for Dogs'),
(42, 'Dog Food by Goofy Tarts', 600, 'd12.jpg', 14, 'Shop for Dogs'),
(43, 'Dog Food by Wellness', 350, 'd13.jpg', 3, 'Shop for Dogs'),
(44, 'Cat Food by Whiskas Ocean fish', 320, 'c1.jpg', 15, 'Shop for  Cats'),
(45, 'Cat Food by Kit Cat', 200, 'c2.jpg', 6, 'Shop for  Cats'),
(46, 'Cat Food by Kit Cat for kittens', 450, 'c3.jpg', 9, 'Shop for  Cats'),
(47, 'Cat Food by Kit Cat River Fish', 400, 'c4.jpg', 8, 'Shop for  Cats'),
(48, 'Cat Food by Whiskas Chicken', 700, 'c5.jpg', 12, 'Shop for  Cats'),
(49, 'Cat Food by World Best', 500, 'c6.jpg', 8, 'Shop for  Cats'),
(50, 'Cat Food by PurePet', 600, 'c7.jpg', 8, 'Shop for  Cats'),
(51, 'Cat Food by Whiskas Fish Flavor', 600, 'c8.jpg', 8, 'Shop for  Cats'),
(52, 'Cat Food by Billi', 450, 'c9.jpg', 6, 'Shop for  Cats'),
(53, 'Cat Food by Whiskas HairBall', 750, 'c10.jpg', 6, 'Shop for  Cats'),
(54, 'Cat Food by Ocatts', 450, 'c11.jpg', 6, 'Shop for  Cats'),
(55, 'Cat Food by Kiity Yumms', 15, 'c12.jpg', 16, 'Shop for  Cats'),
(56, 'Cat Food by Flutd', 650, 'c13.jpg', 14, 'Shop for  Cats'),
(57, 'Cat Food by Whiskas Tasty Mix', 900, 'c14.jpg', 16, 'Shop for  Cats'),
(58, 'Cat food by Royal Canin Persian', 650, 'c15.jpg', 16, 'Shop for  Cats'),
(59, 'Cat Food by Sheba', 820, 'c16.jpg', 16, 'Shop for  Cats'),
(60, 'Cat food meat', 560, 'c16.jpg', 16, 'Shop for  Cats');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `name` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `securityquestion` varchar(100) NOT NULL,
  `securityanswer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `contact`, `address`, `emailid`, `password`, `securityquestion`, `securityanswer`) VALUES
('Anuja Sunil Gaikwad', '8010247412', 'Satara', 'anujagaikwadbcse@gmail.com', 'anuja@123', 'What is your childhood nickname?', 'anu'),
('Atharv Sunil Gaikwad', '8459702327', '11,Ganesh Colony satara.', 'atharvgaikwad414@gmail.com', 'Atharv@1909', 'In which city you born?', 'satara'),
('omkar vijay gaikwad', '7385613935', 'abc', 'omkargaikwad9805@gmail.com', 'OmkarGaikwad2005@', 'In which city you born?', 'Satara'),
('omkar Gaikwad', '7385613935', '11,Ganesh Colony satara.', 'omkargaikwad@gmail.com', 'OmkarGaikwad1234@', 'What is your childhood nickname?', 'om'),
('Pratiksha Bhosale', '8983664974', 'abcd', 'pratikshabhosale639@gmail.com', 'Pratiksha@123', 'In which city you born?', 'satara'),
('Sudhir Pramod Bhosal', '8983664974', 'jkbhcguydwuyga', 'sudhirbhosale1939@gmail.com', 'Sudhir@123', 'In which city you born?', 'satara is alok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`emailid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
