-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 17, 2020 at 11:12 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelandtourdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingschedule`
--

CREATE TABLE `bookingschedule` (
  `bookingscheduleid` varchar(50) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `scheduleid` int(11) DEFAULT NULL,
  `charactertogo` int(11) DEFAULT NULL,
  `promotionid` int(11) DEFAULT NULL,
  `paymenttype` varchar(20) DEFAULT NULL,
  `unitprice` int(11) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `amounttobepaid` int(11) DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingschedule`
--

INSERT INTO `bookingschedule` (`bookingscheduleid`, `customerid`, `scheduleid`, `charactertogo`, `promotionid`, `paymenttype`, `unitprice`, `totalprice`, `tax`, `amounttobepaid`, `paid`) VALUES
('BS-000001', 1, 1, 1, 4, 'VISA', 300000, 300000, 3000, 303000, 1),
('BS-000002', 4, 3, 2, 1, 'VISA', 1000000, 2000000, 20000, 1414000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookingticket`
--

CREATE TABLE `bookingticket` (
  `bookingticketid` varchar(50) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `ticketid` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `unitprice` int(11) DEFAULT NULL,
  `paymenttype` varchar(20) DEFAULT NULL,
  `totalprice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingticket`
--

INSERT INTO `bookingticket` (`bookingticketid`, `customerid`, `ticketid`, `amount`, `unitprice`, `paymenttype`, `totalprice`) VALUES
('BT-000001', 4, 3, 1, 60000, 'VISA', 60000),
('BT-000002', 1, 2, 1, 60000, 'VISA', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `customername` varchar(50) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nrc` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_img` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `customername`, `phone`, `email`, `password`, `dob`, `nrc`, `gender`, `address`, `profile_img`) VALUES
(1, 'koko', '09254325731', 'koko@gmail.com', 'koko123', '2002-03-28', '12/KaMaMa(N)999999', 'Male', 'Dagon, Yangon', 'customer_profile/man1.jpg'),
(4, 'Su Su', '09888888888', 'susu@gmail.com', 'susu123', '2020-03-22', '11/NaMaLa(N)23441', 'Female', 'Ahlone, Yangon', 'customer_profile/_gal_gadot.jpg'),
(6, 'harry', '09363736387', 'harry@gmail.com', 'harry123', '2020-10-01', '11/HaHaHa(N)938383', 'Male', 'dagon', 'customer_profile/_japan1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `feedback`, `customerid`) VALUES
(1, 'This website is so interactive. It gives us satisfaction!', 1),
(3, 'wow amazing\r\n', 1),
(5, 'apk', 1),
(6, 'Thank You So Much! I am so happy to use this website!', 4),
(7, 'Good User Interface! It is easy to use for all users.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelid` int(11) NOT NULL,
  `hotelname` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelid`, `hotelname`, `address`, `description`) VALUES
(1, 'Sedona Hotel', 'Kabaraye Phayar Road, Yangon', 'Sedona Hotel is a high end hotel in Yangon, Myanmar. The hotel consists of two buildings named Garden Wing and Inya Wing. The 29-story Inya Wing tower was the tallest building in Myanmar from May to December of 2016.'),
(2, 'Myint Mo', 'hello', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageid` int(11) NOT NULL,
  `packagename` varchar(50) DEFAULT NULL,
  `places` varchar(50) DEFAULT NULL,
  `departure_place` varchar(30) DEFAULT NULL,
  `arrival_place` varchar(30) DEFAULT NULL,
  `estimated_duration` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `short_description` varchar(100) DEFAULT NULL,
  `detail_description` varchar(255) DEFAULT NULL,
  `package_img1` text,
  `package_img2` text,
  `package_img3` text,
  `packagetypeid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageid`, `packagename`, `places`, `departure_place`, `arrival_place`, `estimated_duration`, `price`, `short_description`, `detail_description`, `package_img1`, `package_img2`, `package_img3`, `packagetypeid`) VALUES
(1, 'Bagan Package', 'Bagan, Nyaung Oo, PoPa', 'Yangon', 'Bagan', '1 week', 300000, 'A type of historical package. It can be a member of cultural and heritage.', 'Bagan, Myanmar is a plain covering about 16 square meters and its monuments seem to overwhelm its landscape. The 2000 monuments in the region have different sizes and shapes. The Temples and Pagodas were constructed between the 11th and 13th centuries. Fi', 'image/bagan.jpg', 'image/bd2.jpg', 'image/bd3.jpg', 1),
(2, 'Beach Package', 'Chaung Tha, Nway Saung, Resorts', ' Aung Mingalar,Yangon,', 'ChaungTha', '8 days', 1000000, 'this is beach package', 'this  is beach package', 'image/_7314.jpg', 'image/_145368.jpg', 'image/_152582.jpg', 2),
(3, 'Upper Myanmar', 'Myitkyinar, Mandalay', 'yangon', 'myitkyinar', '6 days', 800000, 'this is myitkyinar trip.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 'image/_152582.jpg', 'image/_biovdo10.jfif', 'image/_biovdo9.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `packagetype`
--

CREATE TABLE `packagetype` (
  `packagetypeid` int(11) NOT NULL,
  `packagetype` varchar(50) DEFAULT NULL,
  `typedescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packagetype`
--

INSERT INTO `packagetype` (`packagetypeid`, `packagetype`, `typedescription`) VALUES
(1, 'Cultural and Heritage Tour', 'Culture and heritage come in many forms, whether youâ€™re enjoying the food, art, language, music, architecture, museums or ancient sites of your chosen destination, culture and heritage are at the very heart of your trip. UNESCO have recognized 1,073 sit'),
(2, 'Day Trip', 'This  is day trip		 					'),
(3, 'Holiday Trip', 'Oh my god! so good! I am so happy at my holidays'),
(5, 'Historical Trip', ' 						this is historical tour. 					'),
(6, 'Summer Trip', 'this is summer trip.');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotionid` int(11) NOT NULL,
  `promotionname` varchar(50) DEFAULT NULL,
  `discountpercentage` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotionid`, `promotionname`, `discountpercentage`, `description`) VALUES
(1, 'Thidingyut Promotion', 30, 'Between October 1 and October 31! Discount 30% of total amount!'),
(2, 'Group Promotion', 20, 'More than Six 6 Characters of Booking! Discount 20% of total amount'),
(3, 'New Year Promotion', 40, 'Between December 29 and January 3! Discount 40% of total amount'),
(4, 'No Promotion', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurantid` int(11) NOT NULL,
  `restaurantname` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurantid`, `restaurantname`, `address`, `description`) VALUES
(1, 'Shwe Myat Mhan', 'BeLin City, Mon State', 'This restaurant is myanmar traditional restuarant! The common foods in this restaurant are myanmar traditional chicken curry and white rice! They are packed in the leaf! You will feel nature!'),
(3, 'Lucky 7', 'yangon, mingalardon', 'hellojdkljdkljkjldkjdk;jlsfdkjl;fdklj;fddfkjldsfjkkkddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'),
(4, 'MorningStar', 'morning star', 'morning morning morning morning');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleid` int(11) NOT NULL,
  `packageid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `departuredate` date DEFAULT NULL,
  `departuretime` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `arrivaldate` date DEFAULT NULL,
  `maxcharacter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `packageid`, `staffid`, `departuredate`, `departuretime`, `duration`, `arrivaldate`, `maxcharacter`) VALUES
(1, 1, 1, '2020-10-02', '9:00 PM', '1 week', '2020-10-09', 12),
(2, 1, 4, '2020-08-01', '2:00 PM', '4 days', '2020-08-04', 30),
(3, 2, 1, '2020-10-17', '9:00 AM', '3 days', '2020-10-20', 12);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceid` int(11) NOT NULL,
  `packageid` int(11) DEFAULT NULL,
  `restaurantid` int(11) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `packageid`, `restaurantid`, `hotelid`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `staffname` varchar(50) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `stafftype` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `staffname`, `phone`, `email`, `password`, `stafftype`, `gender`, `address`) VALUES
(1, 'mgmg', '09254325731', 'mgmg@gmail.com', 'mgmg123', 'Admin Staff', 'Male', 'USA'),
(2, 'Ko Ko', '09256763511', 'koko@gmail.com', 'koko123', 'Operational Staff', 'Male', 'yangon'),
(3, 'Zaw Zaw', '09843748748', 'zawzaw@gmail.com', 'zawzaw123', 'Admin Staff', 'Male', 'bago'),
(4, 'susu', '093783773', 'susu@gmail.com', 'susu123', 'Operational Staff', 'Female', 'yangon'),
(5, 'myomyo', '0938373738', 'myomyo@gmail.com', 'myomyo123', 'Operational Staff', 'Female', 'pin ta ya'),
(6, 'jisoo', '0938733838', 'jisoo@gmail.com', 'jisoo123', 'Admin Staff', 'Female', 'korea, seoul');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketid` int(11) NOT NULL,
  `to_place` varchar(50) DEFAULT NULL,
  `from_place` varchar(50) DEFAULT NULL,
  `tripdate` date DEFAULT NULL,
  `triptime` varchar(30) DEFAULT NULL,
  `companyname` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketid`, `to_place`, `from_place`, `tripdate`, `triptime`, `companyname`, `price`, `quantity`, `description`) VALUES
(2, 'Bago', 'MawLaMyine', '2020-12-10', '2:00 PM', 'Madalar min', 60000, 18, 'this is from malamyine to bago'),
(3, 'Nay Pyi Taw', 'Yangon', '2020-10-26', '1:00 PM', 'Golden Trip Company', 60000, 24, 'it is available before October 25'),
(4, 'Taunggyi', 'Yangon', '2020-09-29', '8:00 PM', 'JJ Express', 40000, 24, 'it is available before September 29'),
(5, 'Nway Saung', 'Yangon', '2020-10-30', '9:00 AM', 'JJ Express', 35000, 35, 'This ticket is available before Octorber 30, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `travelguide`
--

CREATE TABLE `travelguide` (
  `travelguideid` int(11) NOT NULL,
  `travelguidename` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `nrc` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travelguide`
--

INSERT INTO `travelguide` (`travelguideid`, `travelguidename`, `email`, `phone`, `nrc`, `address`) VALUES
(1, 'Steven', 'steven@gmail.com', '09765434456', '12/LaMaTa(T)938374', 'South Dagon Township, Yangon'),
(2, 'Su Su', 'susu@gmail.com', '098273738', '1/jfdsjfdslkji93', 'MawLamyaing');

-- --------------------------------------------------------

--
-- Table structure for table `travelguidedetail`
--

CREATE TABLE `travelguidedetail` (
  `tgdid` int(11) NOT NULL,
  `scheduleid` int(11) DEFAULT NULL,
  `travelguideid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travelguidedetail`
--

INSERT INTO `travelguidedetail` (`tgdid`, `scheduleid`, `travelguideid`) VALUES
(2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingschedule`
--
ALTER TABLE `bookingschedule`
  ADD PRIMARY KEY (`bookingscheduleid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `scheduleid` (`scheduleid`),
  ADD KEY `promotionid` (`promotionid`);

--
-- Indexes for table `bookingticket`
--
ALTER TABLE `bookingticket`
  ADD PRIMARY KEY (`bookingticketid`),
  ADD KEY `customerid` (`customerid`),
  ADD KEY `ticketid` (`ticketid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageid`),
  ADD KEY `packagetypeid` (`packagetypeid`);

--
-- Indexes for table `packagetype`
--
ALTER TABLE `packagetype`
  ADD PRIMARY KEY (`packagetypeid`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotionid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurantid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleid`),
  ADD KEY `packageid` (`packageid`),
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceid`),
  ADD KEY `packageid` (`packageid`),
  ADD KEY `restaurantid` (`restaurantid`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketid`);

--
-- Indexes for table `travelguide`
--
ALTER TABLE `travelguide`
  ADD PRIMARY KEY (`travelguideid`);

--
-- Indexes for table `travelguidedetail`
--
ALTER TABLE `travelguidedetail`
  ADD PRIMARY KEY (`tgdid`),
  ADD KEY `scheduleid` (`scheduleid`),
  ADD KEY `travelguideid` (`travelguideid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packagetype`
--
ALTER TABLE `packagetype`
  MODIFY `packagetypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `travelguide`
--
ALTER TABLE `travelguide`
  MODIFY `travelguideid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `travelguidedetail`
--
ALTER TABLE `travelguidedetail`
  MODIFY `tgdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingschedule`
--
ALTER TABLE `bookingschedule`
  ADD CONSTRAINT `bookingschedule_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`),
  ADD CONSTRAINT `bookingschedule_ibfk_2` FOREIGN KEY (`scheduleid`) REFERENCES `schedule` (`scheduleid`),
  ADD CONSTRAINT `bookingschedule_ibfk_3` FOREIGN KEY (`promotionid`) REFERENCES `promotion` (`promotionid`);

--
-- Constraints for table `bookingticket`
--
ALTER TABLE `bookingticket`
  ADD CONSTRAINT `bookingticket_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`),
  ADD CONSTRAINT `bookingticket_ibfk_2` FOREIGN KEY (`ticketid`) REFERENCES `ticket` (`ticketid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer` (`customerid`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`packagetypeid`) REFERENCES `packagetype` (`packagetypeid`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`packageid`) REFERENCES `package` (`packageid`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`packageid`) REFERENCES `package` (`packageid`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`restaurantid`) REFERENCES `restaurant` (`restaurantid`),
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`hotelid`) REFERENCES `hotel` (`hotelid`);

--
-- Constraints for table `travelguidedetail`
--
ALTER TABLE `travelguidedetail`
  ADD CONSTRAINT `travelguidedetail_ibfk_1` FOREIGN KEY (`scheduleid`) REFERENCES `schedule` (`scheduleid`),
  ADD CONSTRAINT `travelguidedetail_ibfk_2` FOREIGN KEY (`travelguideid`) REFERENCES `travelguide` (`travelguideid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
