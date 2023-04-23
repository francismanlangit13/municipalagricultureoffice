

CREATE TABLE `announcement` (
  `ann_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ann_title` varchar(50) NOT NULL,
  `ann_body` text NOT NULL,
  `ann_status` varchar(255) NOT NULL,
  `ann_date` datetime NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `date_deleted` datetime NOT NULL,
  `ann_deleted` int(11) NOT NULL,
  PRIMARY KEY (`ann_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO announcement VALUES("3","1","Annoucement to all farmers","Adunay kitay fertilizer diris office kung kinsa man mo kuha palihog og gamit sa system og request kamo sa product, daghang salamat...","Posted","2023-04-22 08:53:26","","0000-00-00 00:00:00","0");
INSERT INTO announcement VALUES("5","1","new","new","Pending","2023-04-23 10:45:41","","0000-00-00 00:00:00","0");



CREATE TABLE `concern` (
  `concern_id` int(15) NOT NULL AUTO_INCREMENT,
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
  `concern_status` int(11) NOT NULL,
  PRIMARY KEY (`concern_id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`) USING BTREE,
  CONSTRAINT `concern_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `concern_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO concern VALUES("2","4","NA GUBA AMONG TANOM!! PLEASE!!!","concern1_20230418_010207.jpeg","concern2_20230417_234723.jpeg","","","","concern6_20230417_234723.mp4","AMBOT SA IMONG CONCERN!!!","2023-04-17 02:12:09","2023-04-22 23:12:30","2023-04-23 01:18:23","User Admin","User Admin","2","2");



CREATE TABLE `product` (
  `product_id` int(15) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `product_quantity` int(15) NOT NULL,
  `exp_date` date NOT NULL,
  `product_category_id` int(15) NOT NULL,
  `product_status` varchar(15) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO product VALUES("1","RAMGO UREA","Used for fertilizer products","product1_20230416_182626.jpg","product2_20230416_184820.jpeg","product3_20230416_182527.png","product4_20230416_182527.png","18","2023-04-30","1","1");
INSERT INTO product VALUES("2","RAMBOTAN","","product1_20230420_150716.png","product2_20230420_150716.png","product3_20230420_150911.png","product4_20230420_150716.png","50","2024-12-25","1","1");



CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(90) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `product_category_status` int(11) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO product_category VALUES("1","Fertilizer","Any material, organic or inorganic, natural or synthetic, which supplies one or more of the chemical elements required for the plant growth.","1");
INSERT INTO product_category VALUES("2","Seeds","It is an undeveloped plant embryo and food reserve enclosed in a protective outer covering called a seed coat.","2");
INSERT INTO product_category VALUES("3","Pesticide","Insecticides kill insects and other arthropods. Miticides (also called acaricides) kill mites that feed on plants and animals.","1");
INSERT INTO product_category VALUES("4","Equipments","Equipment, machinery, and repair parts manufactured for use on farms in connection with the production or preparation for market use of food resources.","1");



CREATE TABLE `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `report_status` int(11) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `user_id` (`user_id`),
  KEY `status_id` (`status_id`) USING BTREE,
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `report_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO report VALUES("1","4","AMBOT!!!","report1_20230417_124207.png","report2_20230417_124222.png","","","","report6_20230417_124154.mp4","asdasdasdasddasd","2023-04-16 14:32:19","0000-00-00 00:00:00","2023-04-22 22:22:18","User Admin","","3","2");
INSERT INTO report VALUES("2","4","ambot oi","report1_20230416_223521.jpeg","report2_20230416_223521.jpeg","report3_20230416_223521.jpeg","report4_20230416_223521.jpeg","report5_20230416_223521.jpeg","report6_20230416_223522.mp4","","2023-04-16 14:35:22","0000-00-00 00:00:00","2023-04-22 22:24:31","User Admin","","1","2");
INSERT INTO report VALUES("3","4","dkasdkjahdjkashdjkhdsd","report1_20230416_224358.jpeg","report2_20230416_224358.png","","","","report6_20230416_224358.mp4","","2023-04-16 14:43:58","0000-00-00 00:00:00","2023-04-22 22:29:48","User Admin","","1","2");
INSERT INTO report VALUES("4","4","askdjaskldjalkdjkld","report1_20230416_224715.jpg","report2_20230416_224715.png","","","","report6_20230416_224715.mp4","BAHALA KA THESIS","2023-04-16 14:47:15","2023-04-22 23:00:26","2023-04-22 23:03:32","User Admin","User Admin","2","1");
INSERT INTO report VALUES("5","4","sdfdsfsdfsdf","report1_20230416_224839.jpg","report2_20230416_224839.png","","","","report6_20230416_224839.mp4","","2023-04-16 14:48:39","0000-00-00 00:00:00","0000-00-00 00:00:00","","","1","1");
INSERT INTO report VALUES("6","4","wesdfsdfsdfdsff","report1_20230416_225101.jpg","report2_20230416_225101.jpg","","","","report6_20230416_225101.mp4","","2023-04-16 14:51:01","0000-00-00 00:00:00","0000-00-00 00:00:00","","","1","1");
INSERT INTO report VALUES("7","4","sadasdasdasd","report1_20230416_230005.png","report2_20230416_230005.jpg","","","","report6_20230416_230005.mp4","sdasdasdd","2023-04-16 15:00:05","0000-00-00 00:00:00","0000-00-00 00:00:00","","","3","1");



CREATE TABLE `request` (
  `request_id` int(15) NOT NULL AUTO_INCREMENT,
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
  `request_status` int(11) NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `product_id` (`product_id`),
  KEY `status_id` (`status_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `request_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  CONSTRAINT `request_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO request VALUES("2","4","1","1","fsfsdfsdfsdf","","2023-04-22 23:55:33","0000-00-00 00:00:00","2023-04-23 00:24:04","User Admin","","1","2");



CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO status VALUES("1","Pending");
INSERT INTO status VALUES("2","Approved");
INSERT INTO status VALUES("3","Deny");



CREATE TABLE `user` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
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
  `user_status` int(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_type` (`user_type`,`user_status`),
  KEY `user_status` (`user_status`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("1","User","","Admin","","Male","admin@gmail.com","0192023a7bbd73250516f069df18b500","","","user_20230416_133835.jpg","","","","","","","09457664949","","2000-11-13","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","1","1");
INSERT INTO user VALUES("4","Francis Carlo","","Manlangit","","Male","franzcarl13@yahoo.com","0192023a7bbd73250516f069df18b500","00020101021127600012com.p2pqrpay0111USMEPHM2XXX020899964403041301566281770015204601653036085802PH5913GRACE N AMBAG6007JIMENEZ6304D502","123456789101112","user_20230416_193834.jpg","5","Villamor","Gata","Jimenez","Misamis Occidental","10","09457664949","Catholic","2000-12-11","Pakil, Laguna","Single","No","No","No","","No","","No","","Farmer","Rice","","","","","","","","","","","","","","","","","","3","1");
INSERT INTO user VALUES("5","Francis Carlo","Abcede","Manlangit","","Male","francismanlangit13@gmail.com","9b493afc99e02b43c337bae0ccefd592","","","user_20230418_170052.png","","","","","","","09457664948","Catholic","2000-11-13","Catholic","Single","","","","","","","","","","","","","","","","","","","","","","","","","","","","1","3");
INSERT INTO user VALUES("6","ambot","sdasdHATDOG","asdasdsadKA","Sr","Male","franzcarl13@gmail.com","817341573e2d56a72c5314b9492b01c1","","","user_20230420_144327.png","","","","","","","09457664947","5555555","2000-11-13","4444444","Single","","","","","","","","","","","","","","","","","","","","","","","","","","","","2","3");



CREATE TABLE `user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_status VALUES("1","Active");
INSERT INTO user_status VALUES("2","Inactive");
INSERT INTO user_status VALUES("3","Archive");



CREATE TABLE `user_type` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_type VALUES("1","Admin");
INSERT INTO user_type VALUES("2","Staff");
INSERT INTO user_type VALUES("3","Farmer");
