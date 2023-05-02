-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 09:20 AM
-- Server version: 10.3.22-MariaDB-log
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1201860`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ann_id` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ann_title` varchar(50) NOT NULL,
  `ann_body` text NOT NULL,
  `ann_status` varchar(255) NOT NULL,
  `ann_date` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `date_deleted` datetime NOT NULL,
  `ann_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ann_id`, `user_id`, `ann_title`, `ann_body`, `ann_status`, `ann_date`, `deleted_by`, `date_deleted`, `ann_deleted`) VALUES
(3, 1, 'Annoucement to all farmers', 'Adunay kitay fertilizer diris office kung kinsa man mo kuha palihog og gamit sa system og request kamo sa product, daghang salamat...', 'Posted', '2023-04-24 18:35:18', '', '0000-00-00 00:00:00', 0),
(5, 1, 'Pahibalo sa tanan farmers', 'Naay mo abot stock sa fertilizer karon April 27 2023 sa gusto og fertilizer request lang mo gamit sa atong system daghan salamat!', 'Posted', '2023-04-19 10:45:41', '', '0000-00-00 00:00:00', 0),
(6, 1, 'Annoucement To all farmers', 'Naay potato seeds available sa office kung kinsa gusto pwede ramo mag request gamit sa system salamat!', 'Posted', '2023-04-22 17:41:59', '', '0000-00-00 00:00:00', 0),
(8, 1, 'Announcement to all farmers', 'Karong April 27 2023 naay orientation sa barangay nacional didto ta magkita daghan salamat...', 'Posted', '2023-04-25 17:42:02', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE `concern` (
  `concern_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `message` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `date_deleted` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `concern_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`concern_id`, `user_id`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `reason`, `date_created`, `date_updated`, `date_deleted`, `deleted_by`, `person`, `status_id`, `concern_status`) VALUES
(2, 4, 'NA GUBA AMONG TANOM!! PLEASE!!!', 'concern1_20230418_010207.jpeg', 'concern2_20230417_234723.jpeg', '', '', '', 'concern6_20230417_234723.mp4', 'AMBOT SA IMONG CONCERN!!!', '2023-04-24 01:00:00', '2023-04-22 23:12:30', '2023-04-23 01:18:23', 'User Admin', 'User Admin', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(15) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `product_quantity` int(15) NOT NULL,
  `exp_date` date NOT NULL,
  `product_category_id` int(15) NOT NULL,
  `product_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `photo`, `photo1`, `photo2`, `photo3`, `product_quantity`, `exp_date`, `product_category_id`, `product_status`) VALUES
(1, 'RAMGO UREA', 'Used for fertilizer products', 'product1_20230416_182626.jpg', 'product2_20230416_184820.jpeg', 'product3_20230416_182527.png', 'product4_20230416_182527.png', 18, '2023-04-30', 1, '1'),
(2, 'RAMBOTAN', '', 'product1_20230420_150716.png', 'product2_20230420_150716.png', 'product3_20230420_150911.png', 'product4_20230420_150716.png', 50, '2023-04-30', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category_name` varchar(90) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `product_category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `category_name`, `category_description`, `product_category_status`) VALUES
(1, 'Fertilizer', 'Any material, organic or inorganic, natural or synthetic, which supplies one or more of the chemical elements required for the plant growth.', 1),
(2, 'Seeds', 'It is an undeveloped plant embryo and food reserve enclosed in a protective outer covering called a seed coat.', 2),
(3, 'Pesticide', 'Insecticides kill insects and other arthropods. Miticides (also called acaricides) kill mites that feed on plants and animals.', 1),
(4, 'Equipments', 'Equipment, machinery, and repair parts manufactured for use on farms in connection with the production or preparation for market use of food resources.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `message` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `date_deleted` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `report_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `user_id`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `reason`, `date_created`, `date_updated`, `date_deleted`, `deleted_by`, `person`, `status_id`, `report_status`) VALUES
(1, 4, 'AMBOT!!!', 'report1_20230417_124207.png', 'report2_20230417_124222.png', '', '', '', 'report6_20230417_124154.mp4', 'asdasdasdasddasd', '2023-04-16 14:32:19', '0000-00-00 00:00:00', '2023-04-22 22:22:18', 'User Admin', '', 3, 2),
(2, 4, 'ambot oi', 'report1_20230416_223521.jpeg', 'report2_20230416_223521.jpeg', 'report3_20230416_223521.jpeg', 'report4_20230416_223521.jpeg', 'report5_20230416_223521.jpeg', 'report6_20230416_223522.mp4', '', '2023-04-16 14:35:22', '0000-00-00 00:00:00', '2023-04-22 22:24:31', 'User Admin', '', 1, 2),
(3, 4, 'dkasdkjahdjkashdjkhdsd', 'report1_20230416_224358.jpeg', 'report2_20230416_224358.png', '', '', '', 'report6_20230416_224358.mp4', '', '2023-04-16 14:43:58', '0000-00-00 00:00:00', '2023-04-22 22:29:48', 'User Admin', '', 1, 2),
(4, 4, 'askdjaskldjalkdjkld', 'report1_20230416_224715.jpg', 'report2_20230416_224715.png', '', '', '', 'report6_20230416_224715.mp4', 'BAHALA KA THESIS', '2023-04-24 21:47:15', '2023-04-22 23:00:26', '2023-04-22 23:03:32', 'User Admin', 'User Admin', 1, 1),
(5, 4, 'sdfdsfsdfsdf', 'report1_20230416_224839.jpg', 'report2_20230416_224839.png', '', '', '', 'report6_20230416_224839.mp4', '', '2023-04-20 14:48:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(6, 4, 'wesdfsdfsdfdsff', 'report1_20230416_225101.jpg', 'report2_20230416_225101.jpg', '', '', '', 'report6_20230416_225101.mp4', '', '2023-04-16 14:51:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(7, 4, 'sadasdasdasd', 'report1_20230416_230005.png', 'report2_20230416_230005.jpg', '', '', '', 'report6_20230416_230005.mp4', 'sdasdasdd', '2023-04-16 15:00:05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(15) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(15) NOT NULL,
  `request_quantity` int(255) NOT NULL,
  `description` text NOT NULL,
  `reason` varchar(255) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_updated` datetime NOT NULL,
  `date_deleted` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `status_id` int(50) NOT NULL,
  `request_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `user_id`, `product_id`, `request_quantity`, `description`, `reason`, `request_date`, `request_updated`, `date_deleted`, `deleted_by`, `person`, `status_id`, `request_status`) VALUES
(3, 4, 1, 17, 'wesadasd', '', '2023-04-24 00:00:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Deny');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `qrcode` varchar(255) NOT NULL,
  `reference_number` varchar(15) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `4ps` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `ig_specify` varchar(255) NOT NULL,
  `govid` varchar(255) NOT NULL,
  `govid_specify` varchar(255) NOT NULL,
  `farmersassoc` varchar(255) NOT NULL,
  `farmersassoc_specify` varchar(255) NOT NULL,
  `livelihood` varchar(255) NOT NULL,
  `rice` varchar(255) NOT NULL,
  `corn` varchar(255) NOT NULL,
  `other_crops_specify` varchar(255) NOT NULL,
  `livestock` varchar(255) NOT NULL,
  `livestock_specify` varchar(255) NOT NULL,
  `poultry` varchar(255) NOT NULL,
  `poultry_specify` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `land` varchar(255) NOT NULL,
  `planting` varchar(255) NOT NULL,
  `cultivation` varchar(255) NOT NULL,
  `harvesting` varchar(255) NOT NULL,
  `other_farmworker_specify` varchar(255) NOT NULL,
  `part_of_farming` varchar(255) NOT NULL,
  `attending_formal` varchar(255) NOT NULL,
  `attending_nonformal` varchar(255) NOT NULL,
  `participated` varchar(255) NOT NULL,
  `other_agri_youth_specify` varchar(255) NOT NULL,
  `user_type` int(10) NOT NULL,
  `user_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `password`, `qrcode`, `reference_number`, `picture`, `purok`, `street`, `barangay`, `municipality`, `province`, `region`, `phone`, `religion`, `birthday`, `birthplace`, `civil_status`, `pwd`, `4ps`, `ig`, `ig_specify`, `govid`, `govid_specify`, `farmersassoc`, `farmersassoc_specify`, `livelihood`, `rice`, `corn`, `other_crops_specify`, `livestock`, `livestock_specify`, `poultry`, `poultry_specify`, `owner`, `land`, `planting`, `cultivation`, `harvesting`, `other_farmworker_specify`, `part_of_farming`, `attending_formal`, `attending_nonformal`, `participated`, `other_agri_youth_specify`, `user_type`, `user_status`) VALUES
(1, 'User', '', 'Admin', '', 'Male', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230416_133835.jpg', '', '', '', '', '', '', '09816208309', '', '2000-11-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(4, 'User', '', 'Farmer', '', 'Male', 'franzcarl13@yahoo.com', 'c20e6c573ea8e9b197d665a7f2a41882', '00020101021127600012com.p2pqrpay0111USMEPHM2XXX020899964403041301566281770015204601653036085802PH5913GRACE N AMBAG6007JIMENEZ6304D502', '123456789101112', 'user_20230416_193834.jpg', '5', 'Villamor', 'Gata', 'Jimenez', 'Misamis Occidental', '10', '09457664949', 'Catholic', '2000-12-11', 'Pakil, Laguna', 'Single', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmer', 'Rice', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1),
(5, 'User', '', 'Staff', '', 'Male', 'staff@gmail.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230418_170052.png', '', '', '', '', '', '', '09673044680', 'Catholic', '2000-11-13', 'Catholic', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1),
(6, 'Francis Carlo', 'Abcede', 'Manlangit', '', 'Male', 'franzcarl13@gmail.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230420_144327.png', '', '', '', '', '', '', '09171234794', '5555555', '2000-11-13', '4444444', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `user_status_id` int(11) NOT NULL,
  `user_status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_status_id`, `user_status_name`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Archive');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_id`, `user_name`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Farmer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ann_id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`concern_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`) USING BTREE;

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `status_id` (`status_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type`,`user_status`),
  ADD KEY `user_status` (`user_status`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`user_status_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ann_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `concern`
--
ALTER TABLE `concern`
  MODIFY `concern_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `concern`
--
ALTER TABLE `concern`
  ADD CONSTRAINT `concern_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `concern_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`user_status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
