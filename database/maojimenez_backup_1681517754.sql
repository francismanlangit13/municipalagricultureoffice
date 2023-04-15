

CREATE TABLE `announcement` (
  `ann_id` int(15) NOT NULL AUTO_INCREMENT,
  `ann_title` varchar(50) NOT NULL,
  `ann_body` text NOT NULL,
  `ann_publish` varchar(50) NOT NULL,
  `ann_status` varchar(255) NOT NULL,
  `ann_date` datetime NOT NULL,
  PRIMARY KEY (`ann_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO announcement VALUES("3","sdasd","asdasdsaddddd","09457664949","Posted","2023-02-11 06:44:53");
INSERT INTO announcement VALUES("4","Seed Released and other","Attention to all farmers.","asdasd","Posted","2023-04-09 01:24:57");



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
  `date_created` date NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`concern_id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status_id`),
  CONSTRAINT `concern_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `concern_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO concern VALUES("1","13","asdasdasd","concern1_20230412_135052.png","concern2_20230412_135052.png","concern3_20230412_135052.png","concern4_20230412_135052.png","concern5_20230412_135052.png","concern6_20230412_135052.mp4","2023-04-12","1");
INSERT INTO concern VALUES("2","13","asdsadsads","concern1_20230412_135646.png","concern2_20230412_135646.png","concern3_20230412_135646.png","concern4_20230412_135646.png","concern5_20230412_135646.png","concern6_20230412_135646.mp4","2023-04-12","1");



CREATE TABLE `product` (
  `product_id` int(15) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(15) NOT NULL,
  `exp_date` date NOT NULL,
  `product_category_id` int(15) NOT NULL,
  `product_status` varchar(15) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO product VALUES("2","Abuno","product_20230411_182044.jpg","4","2023-02-25","8","Available");



CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(90) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO product_category VALUES("8","Fertilizer","asdasdsaddddd");



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
  `date_created` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status_id`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `report_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO report VALUES("2","13","sadsad","report1_20230412_120315.png","report2_20230412_120315.png","report3_20230412_120315.png","report4_20230412_120315.png","report5_20230412_120315.png","report6_20230412_120315.mp4","2023-04-12 04:03:15","1");



CREATE TABLE `request` (
  `request_id` int(15) NOT NULL AUTO_INCREMENT,
  `id` int(50) NOT NULL,
  `product_id` int(15) NOT NULL,
  `request_quantity` int(255) NOT NULL,
  `description` text NOT NULL,
  `reason` varchar(255) NOT NULL,
  `request_date` datetime NOT NULL,
  `status_id` int(50) NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `product_id` (`product_id`),
  KEY `request_status` (`status_id`),
  KEY `id` (`id`),
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `request_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`),
  CONSTRAINT `request_ibfk_4` FOREIGN KEY (`id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO request VALUES("2","13","2","1","werwerwe","saba oi!","2023-04-07 05:42:22","3");



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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("3","User","","Admin","","Male","admin@gmail.com","0192023a7bbd73250516f069df18b500","","0","user_20230411_181908.jpg","","","","","","","09457664949","sddsds","1999-12-11","asdadadasdd","Single","","","","","","","","","","","","","","","","","","","","","","","","","","","","1","1");
INSERT INTO user VALUES("13","Francis Carlo","Abcede","Manlangit","","Male","farmer@gmail.com","4b3bcc3fd4c3c0ac234af3b9fd81c899","00020101021127600012com.p2pqrpay0111USMEPHM2XXX020899964403041301566281770015204601653036085802PH5913GRACE N AMBAG6007JIMENEZ6304D502","222222222222222","user_20230411_181908.jpg","sad","sdasd","Adorable","Jimenez","Misamis Occidental","10","09457664949","sdsdasd","1313-12-13","sdasdasd","Single","Yes","Yes","Yes","sdsad","Yes","sdsad","Yes","fdsfsdf","Farmer","","","","","","","","","","","","","","","","","","","3","1");
INSERT INTO user VALUES("45","ssdfsdfsd","","adasdasd","","Male","franzcarl13@yahoo.com","0fb09b1f2a18e8f6e4b2294b4075f155","ewerwerwe","342342342342342","user_20230415_080953.jpg","5","sadasdasd","Adorable","Jimenez","Misamis Occidental","10","09347264264","rsfsdfsf","1311-12-13","sdasdasd","Single","Yes","Yes","No","","No","","No","","Farmer","Rice","","","","","","","","","","","","","","","","","","3","1");



CREATE TABLE `user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_status VALUES("1","Active");
INSERT INTO user_status VALUES("2","Inactive");



CREATE TABLE `user_type` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO user_type VALUES("1","Admin");
INSERT INTO user_type VALUES("2","Staff");
INSERT INTO user_type VALUES("3","Farmer");

