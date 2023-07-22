-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2023 at 03:46 AM
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
  `ann_id` int(11) NOT NULL,
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
(3, 1, 'Annoucement to all farmers', 'Adunay kitay fertilizer diris office kung kinsa man mo kuha palihog og gamit sa system og request kamo sa product, daghang salamat...', 'Posted', '2023-05-15 01:47:41', 'Marissa Malon', '2023-07-14 22:28:25', 1),
(5, 1, 'Pahibalo sa tanan farmers', 'Naay mo abot stock sa fertilizer karon April 27 2023 sa gusto og fertilizer request lang mo gamit sa atong system daghan salamat!', 'Posted', '2023-04-19 10:45:41', '', '0000-00-00 00:00:00', 0),
(6, 1, 'Annoucement To all farmers', 'Naay potato seeds available sa office kung kinsa gusto pwede ramo mag request gamit sa system salamat!', 'Posted', '2023-04-23 17:41:59', '', '0000-00-00 00:00:00', 0),
(8, 1, 'Announcement to all Farmers', 'Adunay kitay libre seeds diri sa office RAMGO Seeds sa gusto mag kuha request kamo gamit sa system daghang salamat.', 'Pending', '2023-07-20 18:37:43', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE `concern` (
  `concern_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
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

INSERT INTO `concern` (`concern_id`, `user_id`, `title`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `reason`, `date_created`, `date_updated`, `date_deleted`, `deleted_by`, `person`, `status_id`, `concern_status`) VALUES
(1, 9, 'Na guba ang tanom', 'na guba among tanom diri. sa taraka', 'concern1_20230720_133804.jpg', 'concern2_20230720_133804.jpg', 'concern3_20230720_133804.jpg', '', '', '', '', '2023-07-20 22:36:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(2, 9, 'Damage Corn Plants', 'Nangatumba akong tanon mga mais dri sa Barangay Carmen tungod sa kusog nga hangin gabie.', 'concern1_20230720_134043.jpeg', 'concern2_20230720_134043.jpeg', 'concern3_20230720_134043.jpeg', '', '', '', '', '2023-07-10 13:40:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 3, 1),
(3, 11, 'Damage petchay plants', 'Nangadamage akong petchay kay gi insekto.', 'concern1_20230720_135048.jpeg', 'concern2_20230720_135048.jpeg', 'concern3_20230720_135048.jpeg', '', '', '', '', '2023-07-13 13:50:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 1),
(4, 13, 'G baha among katanoman', 'Need kog assistance ngayo kog tabang ninyo kay na wash out akong tanom sa ulan gahapon.', 'concern1_20230720_135245.jpg', 'concern2_20230720_135245.jpg', 'concern3_20230720_135245.jpg', '', '', '', '', '2023-07-16 13:52:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(5, 9, 'Eggplant damage', 'Maayong hapon mam maona ni ang akong tinanom nga talong apan gedugokan ug daghang mga pesticide sama sa mga ulod ug uban pang nangdapo ug nagkaon sa mga dahon sa mga talong.', 'concern1_20230720_140957.jpg', 'concern2_20230720_140957.jpg', 'concern3_20230720_140957.jpg', '', '', '', '', '2023-07-17 14:09:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(6, 16, 'Tree assistance', 'need kog assistance diri sa sibaroc kay na wash out akong g tanom nga cacao.', 'concern1_20230720_164955.jpeg', 'concern2_20230720_164955.jpeg', 'concern3_20230720_164955.jpeg', '', '', '', '', '2023-07-18 16:49:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(7, 17, 'Need cash assistance', 'na tumba ang akong g tanom 5 years need kog cash assistance.', 'concern1_20230720_165938.jpeg', 'concern2_20230720_165938.jpeg', 'concern3_20230720_165938.jpeg', '', '', '', '', '2023-07-19 16:59:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(8, 9, 'need kog pa assist diri sa macabayao', 'akong mga g tanom na bungkag na..', 'concern1_20230720_170936.jpeg', 'concern2_20230720_170936.jpeg', 'concern3_20230720_170936.jpeg', '', '', '', '', '2023-07-20 17:09:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `product_category_id` int(15) NOT NULL,
  `product_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `photo`, `photo1`, `photo2`, `photo3`, `product_quantity`, `exp_date`, `product_category_id`, `product_status`) VALUES
(1, 'Home Grown', 'Used for Tomato, Vegetable, and Herb Fertilizer.', 'product1_20230719_083942.jpg', 'product2_20230719_083942.jpg', 'product3_20230719_083942.jpg', 'product4_20230719_083942.jpg', 100, '2023-12-12', 1, '1'),
(2, 'Premium Gold', 'It is used for all kinds of upland and downland in this fertilizer.', 'product1_20230719_084114.jpg', 'product2_20230719_084114.jpg', 'product3_20230719_084114.jpg', 'product4_20230719_084114.jpg', 213, '2023-05-15', 1, '1'),
(3, 'Natural Wonder', 'It is used for Fruit Tree only this fertilizer.', 'product1_20230719_084335.jpg', 'product2_20230719_084335.jpg', 'product3_20230719_084335.jpg', 'product4_20230719_084335.jpg', 0, '2024-07-05', 1, '2'),
(4, 'Upo Tambuli', 'Upo Tambuli - is an herbaceous, annual climbing plant.', 'product1_20230719_091545.jpg', 'product2_20230719_091545.jpg', 'product3_20230719_091545.jpg', 'product4_20230719_091545.jpg', 57, '2025-07-16', 5, '1'),
(5, 'Hybrid Cucumber Hera', 'Cucumbers (Cucumis sativus) are classified as naturally occurring vegetables, but some cucumber varieties are hybrids. Cucumber plants likely originated in India and were introduced into China.', 'product1_20230719_092625.jpg', 'product2_20230719_092625.jpg', 'product3_20230719_092625.jpg', 'product4_20230719_092625.jpg', 523, '2025-12-13', 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
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
(4, 'Equipments', 'Equipment, machinery, and repair parts manufactured for use on farms in connection with the production or preparation for market use of food resources.', 1),
(5, 'Seeds', 'Fertilized, matured ovule consisting of an embryonic plant together with a store of food, all surrounded by a protective coat.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
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

INSERT INTO `report` (`report_id`, `user_id`, `title`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `reason`, `date_created`, `date_updated`, `date_deleted`, `deleted_by`, `person`, `status_id`, `report_status`) VALUES
(1, 9, 'Update sa akong g tanom nga rice', 'mao ni akong update sa akong tanom hapit nani anihon Salamat kayo mao jimenez.', 'report1_20230720_134224.jpeg', 'report2_20230720_134224.jpeg', 'report3_20230720_134224.jpeg', '', '', '', '', '2023-07-20 22:31:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(2, 10, 'Update sa akong gitanom nga mais', 'Mao nani kahimtang sa akong gitanom nga mais, salamat sa Ginoo kay maayo ang pagtubo niini ug way insekto nga nakadaot niini.', 'report1_20230720_134439.jpeg', 'report2_20230720_134439.jpeg', 'report3_20230720_134439.jpeg', '', '', '', '', '2023-07-07 13:44:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 1),
(3, 9, 'Mao ni akong report sa g tanom nakong Ramgo Seeds', 'mao ni akong update sa tanom g kuha gkan ninyo Salamat kayo ni tubona siya og Salamat sa nindot nga panahon.', 'report1_20230720_134843.jpg', 'report2_20230720_134843.jpg', 'report3_20230720_134843.jpg', '', '', '', '', '2023-07-12 13:48:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 3, 1),
(4, 11, 'update sa akong petchay plants', 'Mao mani update sa akong tanom nga petchay karon\r\n', 'report1_20230720_135155.jpeg', 'report2_20230720_135155.jpeg', 'report3_20230720_135155.jpeg', '', '', '', '', '2023-07-15 13:51:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(5, 15, 'Update sakong talong', 'Thanks god maayo ug bos ok na kaayo akng mga tanom makapang harvest nami ani.', 'report1_20230720_141730.jpg', 'report2_20230720_141730.jpeg', '', '', '', '', '', '2023-07-18 14:17:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(6, 9, 'Report for my output', 'Ni dako na siya ang akong g kuha nga tanom.', 'report1_20230720_164456.jpg', 'report2_20230720_164456.jpeg', 'report3_20230720_164456.jpg', '', '', '', '', '2023-07-19 16:44:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(7, 17, 'Akong report sa mangustan', 'Ni dako na akong g tanom nga mangustan sa 3 months. hapit nani mangunga', 'report1_20230720_165517.jpeg', 'report2_20230720_165517.jpeg', 'report3_20230720_165517.jpeg', '', '', '', '', '2023-07-20 16:55:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(8, 9, 'Report for the fertilizer progress', 'mao ni akong tanom dali na ni tubo kay g gamitan og fertilizer salamat kaayo mao jimenez.', 'report1_20230720_170742.jpeg', 'report2_20230720_170742.jpg', 'report3_20230720_170742.jpeg', '', '', '', '', '2023-07-20 17:07:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `request_quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `reason` varchar(255) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_updated` datetime NOT NULL,
  `date_deleted` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `person` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `request_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `user_id`, `product_id`, `request_quantity`, `description`, `reason`, `request_date`, `request_updated`, `date_deleted`, `deleted_by`, `person`, `status_id`, `request_status`) VALUES
(1, 9, 2, 10, 'Gamiton nako ning fertilizer sa akong g tanom nga okra.', '', '2023-07-20 22:27:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(2, 10, 4, 4, 'Mag tanom ko ani sa akong garden.', '', '2023-07-03 10:22:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 1),
(3, 9, 5, 5, 'Mangayo ko ani para e tanom nako sa kabukiran.', '', '2023-07-15 10:26:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 2, 1),
(4, 9, 5, 3, 'Mag tanom ko ani sa akong backyard.', '', '2023-07-17 14:01:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(5, 16, 4, 6, 'Mangayo ko ani itanom nako sa upland nako diris sibaroc.', '', '2023-07-18 16:39:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(6, 9, 1, 2, 'Kuha ko ani duha lang para itanom namo ni darling diri sa sinara alto.', '', '2023-07-19 16:52:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1),
(7, 18, 2, 17, 'Need kog fertilizer para sa upland nakong area.', '', '2023-07-20 17:04:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, 1);

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
  `reference_number` varchar(19) NOT NULL,
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
  `user_type_id` int(11) NOT NULL,
  `user_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `password`, `qrcode`, `reference_number`, `picture`, `purok`, `street`, `barangay`, `municipality`, `province`, `region`, `phone`, `religion`, `birthday`, `birthplace`, `civil_status`, `pwd`, `4ps`, `ig`, `ig_specify`, `govid`, `govid_specify`, `farmersassoc`, `farmersassoc_specify`, `livelihood`, `rice`, `corn`, `other_crops_specify`, `livestock`, `livestock_specify`, `poultry`, `poultry_specify`, `owner`, `land`, `planting`, `cultivation`, `harvesting`, `other_farmworker_specify`, `part_of_farming`, `attending_formal`, `attending_nonformal`, `participated`, `other_agri_youth_specify`, `user_type_id`, `user_status_id`) VALUES
(1, 'Marissa', '', 'Malon', '', 'Male', 'franzcarl13@yahoo.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230719_092931.jpg', '', '', '', '', '', '', '09457664949', 'Catholic', '2000-11-13', 'Pakil, Laguna', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(2, 'CHERLIE Cherlie', '', 'Pino', '', 'Female', 'pino28@gmail.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230718_164147.jpg', '', '', '', '', '', '', '09196374602', 'Catholic', '1995-06-15', 'Butuay, Jimenez, Misamis Occidental', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1),
(3, 'Mariefe', 'G', 'Galbo', '', 'Female', 'mariefebarrientos135@yahoo.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230718_164520.jpg', '', '', '', '', '', '', '09475883531', 'Roman Catholic', '1996-02-18', 'Nacional, Jimenez, Misamis Occidental', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1),
(4, 'Lendie', '', 'Barrientos', '', 'Female', 'lendi24@gmail.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230718_164941.jpg', '', '', '', '', '', '', '09375837563', 'Grace Gospel Church', '1998-05-24', 'Gango, Ozamiz, Misamis Occidental', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1),
(5, 'John Mark', '', 'Malalis', '', 'Male', 'john.mark78@yahoo.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230718_165403.jpg', '', '', '', '', '', '', '09324635661', 'United Church Of Christ In The Philippines', '1989-08-29', 'Punta, Panaon, Misamis Occidental', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1),
(6, 'Roshelle Ann', '', 'Tabuzo', '', 'Female', 'roshelleann15@yahoo.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230718_165738.jpg', '', '', '', '', '', '', '09357267824', 'Assembly of God', '1998-06-05', 'Mialem, Jimenez, Misamis Occidental', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1),
(7, 'Marry Joy', '', 'Banque', '', 'Female', 'marryjoy.banque42@yahoo.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230718_170129.jpg', '', '', '', '', '', '', '09682643748', 'Iglesia Filipina Independiente', '1997-11-19', 'Santa Cruz, Jimenez, Misamis Occidental', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1),
(8, 'Juvy', '', 'Palanas', '', 'Male', 'palanas24@gmail.com', '0192023a7bbd73250516f069df18b500', '', '', 'user_20230718_170400.jpg', '', '', '', '', '', '', '09238798474', 'Roman Catholic', '1972-10-11', 'Cagay-anon, Jimenez, Misamis Occidental', 'Married', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1),
(9, 'Ronald', 'G', 'Galindo', '', 'Male', 'ronald.galindo11@yahoo.com', '0192023a7bbd73250516f069df18b500', '00020101021127600012com.p2pqrpay0111USMEPHM2XXX020899964403041301566281770015204601653036085802PH5913GRACE N AMBAG6007JIMENEZ6304D502', '10-42-07-019-000001', 'user_20230718_173452.jpg', '5', 'Julyet Street', 'Palilan', 'Jimenez', 'Misamis Occidental', '10', '09347689447', 'Roman Catholic', '1975-09-14', 'Gata, Jimenez, Misamis Occidental', 'Married', 'Yes', 'Yes', 'No', '', 'No', '', 'No', '', 'Farmer', 'Rice', 'Corn', 'Banana, Mango, Papaya', 'Livestock', 'Baboy, Chicken, Pato, Goat', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1),
(10, 'Karl', 'D', 'Cuadra', '', 'Male', 'karl.cuadra143@gmail.com', '0192023a7bbd73250516f069df18b500', '', '10-42-07-019-000002', 'user_20230718_174238.jpg', '1', 'Yungkoi Street', 'Nacional', 'Jimenez', 'Misamis Occidental', '10', '09254789579', 'Grace Gospel Church', '1999-07-17', 'Nacional, Jimenez, Misamis Occidental', 'Single', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmer', 'Rice', '', 'Mango, Banana', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1),
(11, 'Jham', 'H', 'Maghuyop', 'II', 'Female', 'maghuyop.jham17@yahoo.com', '0192023a7bbd73250516f069df18b500', '', '10-42-07-019-000003', 'user_20230718_174919.jpg', '6', 'Jero Street', 'Carmen', 'Jimenez', 'Misamis Occidental', '10', '09323478957', 'Roman Catholic', '1996-12-14', 'Carmen, Jimenez, Misamis Occidental', 'Single', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmworker', '', '', '', '', '', '', '', 'Owner', '', 'Planting', '', 'Harvesting', '', '', '', '', '', '', 3, 1),
(12, 'Kim August', 'J', 'Apao', '', 'Male', 'kimoyapao54@gmail.com', '0192023a7bbd73250516f069df18b500', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000004', 'user_20230718_175353.jpg', '3', 'Jojo Street', 'Gata', 'Jimenez', 'Misamis Occidental', '10', '09257856783', 'Catholic', '1995-04-14', 'Sampaloc, Manila', 'Single', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmworker', '', '', '', '', '', '', '', '', 'Land Preparation', '', 'Cultivation', 'Harvesting', '', '', '', '', '', '', 3, 1),
(13, 'Abel', 'S', 'Gomonit', 'Jr', 'Male', 'gomonitabel@gmail.com', '0192023a7bbd73250516f069df18b500', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000005', 'user_20230719_140727.jpg', '4', 'Villamor', 'Gata', 'Jimenez', 'Misamis Occidental', '10', '09374635874', 'Roman Catholic', '1991-02-03', 'Gango, Ozamiz, Misamis Occidental', 'Married', 'No', 'Yes', 'No', '', 'No', '', 'No', '', 'Agri Youth', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Part of a farming household', 'Attending/Attended formal agri-fishery related course', 'Attending/Attended non-formal agri-fishery related course', '', '', 3, 1),
(14, 'Kier', '', 'Patac', '', 'Male', 'kier.patac@yahoo.com', '0192023a7bbd73250516f069df18b500', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000006', 'user_20230719_143025.jpg', '2', 'Fundado', 'San Isidro', 'Jimenez', 'Misamis Occidental', '10', '09346745676', 'Catholic', '1993-04-18', 'Delapaz, Sinacaban, Misamis Occidental', 'Married', 'Yes', 'No', 'No', '', 'No', '', 'No', '', 'Farmworker', '', '', '', '', '', '', '', 'Owner', 'Land Preparation', 'Planting', '', '', '', '', '', '', '', '', 3, 1),
(15, 'Stephanie', '', 'Capada', '', 'Female', 'stephanie.capada@gmail.com', '0192023a7bbd73250516f069df18b500', '', '10-42-07-019-000007', 'user_20230719_143445.jpg', '6', 'Albaro Street', 'Carmen', 'Jimenez', 'Misamis Occidental', '10', '09573447392', 'Catholic', '1983-08-18', 'Aloran, Misamis Occidental', 'Married', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmer', 'Rice', 'Corn', 'Banana, Papaya', 'Livestock', 'Chicken', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1),
(16, 'John Mark', '', 'Ebarat', '', 'Male', 'johnmark.ebarat@gmail.com', '0192023a7bbd73250516f069df18b500', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000008', 'user_20230719_144025.jpg', '3', 'Harayo Street', 'Rizal', 'Jimenez', 'Misamis Occidental', '10', '09236387463', 'Catholic', '1990-05-16', 'Delapaz, Tudela, Misamis Occidental', 'Married', 'Yes', 'Yes', 'No', '', 'No', '', 'No', '', 'Agri Youth', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Part of a farming household', '', 'Attending/Attended non-formal agri-fishery related course', 'Participated in any agricultural activity/program', '', 3, 1),
(17, 'Jenmar', '', 'Masin', 'IV', 'Male', 'jenmar.masin@gmail.com', '0192023a7bbd73250516f069df18b500', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000009', 'user_20230719_144548.png', '1', 'Labadas Street', 'Guintomoyan', 'Jimenez', 'Misamis Occidental', '10', '09237648372', 'Roman Catholic', '1992-02-27', 'Nacional, Jimenez, Misamis Occidental', 'Married', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Agri Youth', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Part of a farming household', 'Attending/Attended formal agri-fishery related course', '', '', '', 3, 1),
(18, 'Andrew Campbell', '', 'Campbell', '', 'Male', 'andrew@gmail.com', '0192023a7bbd73250516f069df18b500', '', '10-42-07-019-000010', 'user_20230719_144945.jpg', '3', 'Tigdok Street', 'Malibacsan', 'Jimenez', 'Misamis Occidental', '10', '09234385748', 'Roman Catholic', '1987-03-21', 'Carmen, Jimenez, Misamis Occidental', 'Married', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmer', 'Rice', '', 'Banana, Cacao, Star apple', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1),
(19, 'Abigail', '', 'Damason', 'II', 'Female', 'abigail.damason@yahoo.com', '0192023a7bbd73250516f069df18b500', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000011', 'user_20230719_145359.jpg', '5', 'Tonyo Street', 'Matugas Bajo', 'Jimenez', 'Misamis Occidental', '10', '09273687467', 'Roman Catholic', '1995-01-16', 'Lupagan, Clarin, Misamis Occidental', 'Married', 'No', 'Yes', 'No', '', 'No', '', 'No', '', 'Agri Youth', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Part of a farming household', '', 'Attending/Attended non-formal agri-fishery related course', 'Participated in any agricultural activity/program', '', 3, 1),
(20, 'Rennie', '', 'Gordon', '', 'Male', 'rennie.gordon@yahoo.com', 'b38532f4bf0736c23d72246a5549520e', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000012', 'user_20230719_145843.jpg', '1', 'Kanisa Street', 'Gata', 'Jimenez', 'Misamis Occidental', '10', '09237584598', 'Roman Catholic', '1997-07-17', 'Palilan, Jimenez, Misamis Occidental', 'Married', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmworker', '', '', '', '', '', '', '', 'Owner', '', 'Planting', '', '', '', '', '', '', '', '', 3, 1),
(21, 'Lisa', '', 'Gamayao', 'IV', 'Female', 'gamayao.lisa@gmail.com', '148705579939c64632db96774122e5cb', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000013', 'user_20230719_150150.jpg', '5', 'Bagas Street', 'Santa Cruz', 'Jimenez', 'Misamis Occidental', '10', '09232478236', 'Roman Catholic', '1998-02-17', 'Naga, Jimenez, Misamis Occidental', 'Single', 'Yes', 'No', 'No', '', 'No', '', 'No', '', 'Farmworker', '', '', '', '', '', '', '', '', 'Land Preparation', '', '', 'Harvesting', '', '', '', '', '', '', 3, 1),
(22, 'Jeffry', '', 'Cabalog', '', 'Male', 'jeffry.cabalog@yahoo.com', 'd848fc54e9cd0335cfaa32223ddbeb1c', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000014', 'user_20230719_150923.jpg', '4', 'Gaza Street', 'Sibaroc', 'Jimenez', 'Misamis Occidental', '10', '09237683783', 'Roman Catholic', '1992-09-17', 'Santa Cruz, Jimenez, Misamis Occidental', 'Married', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Agri Youth', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Part of a farming household', '', 'Attending/Attended non-formal agri-fishery related course', '', '', 3, 1),
(23, 'Marisa', '', 'Maghanoy', '', 'Female', 'francismanlangit13@gmail.com', 'e9684a32808efcbc9a9944aa36c0a6a7', 'http://app.lb-link.cn/router/down.html', '10-42-07-019-000015', 'user_20230719_151931.jpg', '3', 'Hardo Street', 'Matugas Bajo', 'Jimenez', 'Misamis Occidental', '10', '09236837638', 'Roman Catholic', '1997-10-13', 'Rizal, Jimenez, Misamis Occidental', 'Married', 'No', 'No', 'No', '', 'No', '', 'No', '', 'Farmer', '', 'Corn', 'Banana, Papaya, Rambutan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `log` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `type`, `log`, `date`) VALUES
(1, 1, 'Login', 'success using email and password', '2023-07-18 14:50:15'),
(2, 1, 'Login', 'success using email and password', '2023-07-19 08:31:23'),
(3, 1, 'Update account', 'change password', '2023-07-19 08:33:46'),
(4, 1, 'Update account', 'update information', '2023-07-19 08:33:46'),
(5, 1, 'Update account', 'change profile', '2023-07-19 09:29:31'),
(6, 9, 'Login', 'success using email and password', '2023-07-19 09:31:09'),
(7, 10, 'Login', 'success using email and password', '2023-07-19 10:21:34'),
(8, 11, 'Login', 'success using email and password', '2023-07-19 10:24:44'),
(9, 1, 'Login', 'success using email and password', '2023-07-19 11:45:48'),
(10, 1, 'Login', 'success using email and password', '2023-07-19 14:00:10'),
(11, 1, 'Login', 'success using email and password', '2023-07-20 13:29:20'),
(12, 10, 'Login', 'success using email and password', '2023-07-20 13:30:26'),
(13, 12, 'Login', 'success using email and password', '2023-07-20 13:31:26'),
(14, 10, 'Login', 'success using email and password', '2023-07-20 13:37:24'),
(15, 10, 'Login', 'success using email and password', '2023-07-20 13:37:24'),
(16, 13, 'Login', 'success using email and password', '2023-07-20 13:44:06'),
(17, 11, 'Login', 'success using email and password', '2023-07-20 13:49:14'),
(18, 15, 'Login', 'success using email and password', '2023-07-20 13:59:11'),
(19, 12, 'Login', 'success using email and password', '2023-07-20 13:59:44'),
(20, 10, 'Login', 'success using email and password', '2023-07-20 14:11:01'),
(21, 15, 'Login', 'success using email and password', '2023-07-20 14:12:42'),
(22, 15, 'Login', 'success using email and password', '2023-07-20 14:12:42'),
(23, 16, 'Login', 'success using email and password', '2023-07-20 16:38:04'),
(24, 17, 'Login', 'success using email and password', '2023-07-20 16:51:17'),
(25, 18, 'Login', 'success using email and password', '2023-07-20 17:01:03'),
(26, 1, 'Login', 'success using email and password', '2023-07-20 17:10:28'),
(27, 1, 'Login', 'success using email and password', '2023-07-20 19:55:37'),
(28, 1, 'Login', 'success using email and password', '2023-07-20 20:24:26'),
(29, 3, 'Login', 'success using email and password', '2023-07-20 21:47:44'),
(30, 9, 'Login', 'success using email and password', '2023-07-20 22:06:30'),
(31, 1, 'Login', 'success using email and password', '2023-07-21 00:29:33'),
(32, 3, 'Login', 'success using email and password', '2023-07-21 01:06:07'),
(33, 9, 'Login', 'success using email and password', '2023-07-21 01:27:32'),
(34, 1, 'Login', 'success using email and password', '2023-07-22 07:48:07'),
(35, 23, 'Login', 'success using QR Code', '2023-07-22 08:27:13'),
(36, 23, 'Login', 'success using QR Code', '2023-07-22 08:28:01'),
(37, 23, 'Login', 'success using QR Code', '2023-07-22 08:28:35'),
(38, 9, 'Login', 'success using QR Code', '2023-07-22 08:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `user_status_id` int(11) NOT NULL,
  `user_status_name` varchar(255) NOT NULL
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
  `user_type_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_name`) VALUES
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
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `user_type` (`user_type_id`,`user_status_id`),
  ADD KEY `user_status` (`user_status_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`user_status_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `concern`
--
ALTER TABLE `concern`
  MODIFY `concern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD CONSTRAINT `password_reset_temp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`user_status_id`);

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
