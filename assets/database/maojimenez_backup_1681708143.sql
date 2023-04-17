

CREATE TABLE `announcement` (
  `ann_id` int(15) NOT NULL AUTO_INCREMENT,
  `ann_title` varchar(50) NOT NULL,
  `ann_body` text NOT NULL,
  `ann_publish` varchar(50) NOT NULL,
  `ann_status` varchar(255) NOT NULL,
  `ann_date` datetime NOT NULL,
  PRIMARY KEY (`ann_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO product VALUES("1","RAMGO UREA","Used for fertilizer products","product1_20230416_182626.jpg","product2_20230416_184820.jpeg","product3_20230416_182527.png","product4_20230416_182527.png","23","2023-08-29","1","Not Available");



CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(90) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO product_category VALUES("1","Fertilizer","Any material, organic or inorganic, natural or synthetic, which supplies one or more of the chemical elements required for the plant growth.");
INSERT INTO product_category VALUES("2","Seeds","It is an undeveloped plant embryo and food reserve enclosed in a protective outer covering called a seed coat.");
INSERT INTO product_category VALUES("3","Pesticide","Insecticides kill insects and other arthropods. Miticides (also called acaricides) kill mites that feed on plants and animals.");
INSERT INTO product_category VALUES("4","Equipments","Equipment, machinery, and repair parts manufactured for use on farms in connection with the production or preparation for market use of food resources.");



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
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`report_id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status_id`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `report_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO report VALUES("1","4","AMBOT!!!","report1_20230417_124207.png","report2_20230417_124222.png","","","","report6_20230417_124154.mp4","","2023-04-16 14:32:19","1");
INSERT INTO report VALUES("2","4","ambot oi","report1_20230416_223521.jpeg","report2_20230416_223521.jpeg","report3_20230416_223521.jpeg","report4_20230416_223521.jpeg","report5_20230416_223521.jpeg","report6_20230416_223522.mp4","","2023-04-16 14:35:22","1");
INSERT INTO report VALUES("3","4","dkasdkjahdjkashdjkhdsd","report1_20230416_224358.jpeg","report2_20230416_224358.png","","","","report6_20230416_224358.mp4","","2023-04-16 14:43:58","1");
INSERT INTO report VALUES("4","4","askdjaskldjalkdjkld","report1_20230416_224715.jpg","report2_20230416_224715.png","","","","report6_20230416_224715.mp4","","2023-04-16 14:47:15","1");
INSERT INTO report VALUES("5","4","sdfdsfsdfsdf","report1_20230416_224839.jpg","report2_20230416_224839.png","","","","report6_20230416_224839.mp4","","2023-04-16 14:48:39","1");
INSERT INTO report VALUES("6","4","wesdfsdfsdfdsff","report1_20230416_225101.jpg","report2_20230416_225101.jpg","","","","report6_20230416_225101.mp4","","2023-04-16 14:51:01","1");
INSERT INTO report VALUES("7","4","sadasdasdasd","report1_20230416_230005.png","report2_20230416_230005.jpg","","","","report6_20230416_230005.mp4","sdasdasdd","2023-04-16 15:00:05","3");



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("1","User","","Admin","","Male","admin@gmail.com","0192023a7bbd73250516f069df18b500","","","user_20230416_133835.jpg","","","","","","","09457664949","","2000-11-13","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","1","1");
INSERT INTO user VALUES("4","Francis Carlo","","Manlangit","","Male","franzcarl13@yahoo.com","0192023a7bbd73250516f069df18b500","00020101021127600012com.p2pqrpay0111USMEPHM2XXX020899964403041301566281770015204601653036085802PH5913GRACE N AMBAG6007JIMENEZ6304D502","123456789101112","user_20230416_193834.jpg","5","Villamor","Gata","Jimenez","Misamis Occidental","10","09457664949","Catholic","2000-12-11","Pakil, Laguna","Single","No","No","No","","No","","No","","Farmer","Rice","","","","","","","","","","","","","","","","","","3","1");



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

