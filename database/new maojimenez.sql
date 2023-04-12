-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 11:20 AM
-- Server version: 10.4.10-MariaDB
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
-- Database: `maojimenez`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ann_id` int(15) NOT NULL,
  `ann_title` varchar(50) NOT NULL,
  `ann_body` text NOT NULL,
  `ann_publish` varchar(50) NOT NULL,
  `ann_status` varchar(255) NOT NULL,
  `ann_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ann_id`, `ann_title`, `ann_body`, `ann_publish`, `ann_status`, `ann_date`) VALUES
(3, 'sdasd', 'asdasdsaddddd', '09457664949', 'Posted', '2023-02-11 06:44:53'),
(4, 'Seed Released and other', 'Attention to all farmers adunay released sa atong mga seeds og fertilizer kini mag sugod sa berynes sa hapon 1pm dal-a ang mga requirements sama sa RSBSA ID mao ra salamat.', 'asdasd', 'Pending', '2023-04-09 01:24:57');

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
  `date_created` date NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`concern_id`, `user_id`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `date_created`, `status_id`) VALUES
(1, 13, 'asdasdasd', 'concern1_20230412_135052.png', 'concern2_20230412_135052.png', 'concern3_20230412_135052.png', 'concern4_20230412_135052.png', 'concern5_20230412_135052.png', 'concern6_20230412_135052.mp4', '2023-04-12', 1),
(2, 13, 'asdsadsads', 'concern1_20230412_135646.png', 'concern2_20230412_135646.png', 'concern3_20230412_135646.png', 'concern4_20230412_135646.png', 'concern5_20230412_135646.png', 'concern6_20230412_135646.mp4', '2023-04-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(15) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(15) NOT NULL,
  `exp_date` date NOT NULL,
  `product_category_id` int(15) NOT NULL,
  `product_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `product_quantity`, `exp_date`, `product_category_id`, `product_status`) VALUES
(2, 'Abuno', 'product_20230411_182044.jpg', 4, '2023-02-25', 8, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category_name` varchar(90) NOT NULL,
  `category_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `category_name`, `category_description`) VALUES
(8, 'Fertilizer', 'asdasdsaddddd');

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
  `date_created` datetime NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `user_id`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `date_created`, `status_id`) VALUES
(2, 13, 'sadsad', 'report1_20230412_120315.png', 'report2_20230412_120315.png', 'report3_20230412_120315.png', 'report4_20230412_120315.png', 'report5_20230412_120315.png', 'report6_20230412_120315.mp4', '2023-04-12 04:03:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(15) NOT NULL,
  `id` int(50) NOT NULL,
  `product_id` int(15) NOT NULL,
  `request_quantity` int(255) NOT NULL,
  `description` text NOT NULL,
  `reason` varchar(255) NOT NULL,
  `request_date` datetime NOT NULL,
  `status_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `id`, `product_id`, `request_quantity`, `description`, `reason`, `request_date`, `status_id`) VALUES
(2, 13, 2, 1, 'werwerwe', 'saba oi!', '2023-04-07 05:42:22', 3);

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
(3, 'User', '', 'Admin', '', 'Male', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '', '0', 'user_20230411_181908.jpg', '', '', '', '', '', '', '09457664949', 'sddsds', '1999-12-11', 'asdadadasdd', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(13, 'Francis Carlo', 'Abcede', 'Manlangit', '', 'Male', 'farmer@gmail.com', '4b3bcc3fd4c3c0ac234af3b9fd81c899', '00020101021127600012com.p2pqrpay0111USMEPHM2XXX020899964403041301566281770015204601653036085802PH5913GRACE N AMBAG6007JIMENEZ6304D502', '222222222222222', 'user_20230411_181908.jpg', 'sad', 'sdasd', 'Adorable', 'Jimenez', 'Misamis Occidental', '10', '09382732834', 'sdsdasd', '1313-12-13', 'sdasdasd', 'Single', 'Yes', 'Yes', 'Yes', 'sdsad', 'Yes', 'sdsad', 'Yes', 'fdsfsdf', 'Farmer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1);

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
(2, 'Inactive');

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
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`concern_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status_id`);

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
  ADD KEY `status` (`status_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `request_status` (`status_id`),
  ADD KEY `id` (`id`);

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
  MODIFY `ann_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `concern`
--
ALTER TABLE `concern`
  MODIFY `concern_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`id`) REFERENCES `user` (`user_id`);

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
