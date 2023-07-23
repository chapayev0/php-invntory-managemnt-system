DROP TABLE other;

CREATE TABLE `other` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `veh` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `km` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `time` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `cash` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_bill;

CREATE TABLE `tbl_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_time` varchar(15) NOT NULL,
  `bill_date` date NOT NULL,
  `u_id` int(11) NOT NULL,
  `bill_status` tinyint(2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `cash` decimal(10,2) NOT NULL,
  `bal` decimal(10,2) NOT NULL,
  `dis` decimal(10,2) DEFAULT NULL,
  `stotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bill VALUES("1","12:06 PM","2014-11-03","1","0","20.00","50.00","30.00","","");
INSERT INTO tbl_bill VALUES("2","12:26 PM","2014-11-03","1","0","83.00","100.00","17.00","","");
INSERT INTO tbl_bill VALUES("3","9:44 AM","2014-11-12","1","0","44.00","50.00","6.00","","");
INSERT INTO tbl_bill VALUES("4","9:48 AM","2014-11-12","1","0","22.00","122.00","100.00","","");
INSERT INTO tbl_bill VALUES("5","9:49 AM","2014-11-12","1","0","22.00","122.00","100.00","","");
INSERT INTO tbl_bill VALUES("6","9:57 AM","2014-11-12","1","0","22.00","42.00","20.00","","");
INSERT INTO tbl_bill VALUES("7","10:00 AM","2014-11-12","1","0","22.00","42.00","20.00","","");
INSERT INTO tbl_bill VALUES("8","10:02 AM","2014-11-12","1","0","22.00","42.00","20.00","","");
INSERT INTO tbl_bill VALUES("9","10:11 AM","2014-11-12","1","0","22.00","23.00","1.00","","");
INSERT INTO tbl_bill VALUES("10","10:19 AM","2014-11-12","1","0","466.00","500.00","34.00","","");
INSERT INTO tbl_bill VALUES("11","10:21 AM","2014-11-12","1","0","1596.00","2000.00","404.00","","");
INSERT INTO tbl_bill VALUES("12","10:23 AM","2014-11-12","1","0","44.00","51.00","7.00","","");
INSERT INTO tbl_bill VALUES("13","11:40 AM","2014-11-12","1","0","1020.00","2000.00","980.00","","");
INSERT INTO tbl_bill VALUES("14","11:50 AM","2014-11-12","1","0","466.00","500.00","34.00","","");
INSERT INTO tbl_bill VALUES("15","12:06 PM","2014-11-12","1","0","488.00","500.00","12.00","","");
INSERT INTO tbl_bill VALUES("16","12:20 PM","2014-11-12","1","0","466.00","500.00","34.00","","");
INSERT INTO tbl_bill VALUES("17","12:39 PM","2014-11-12","1","0","466.00","500.00","34.00","","");
INSERT INTO tbl_bill VALUES("18","12:41 PM","2014-11-12","1","0","466.00","500.00","34.00","","");
INSERT INTO tbl_bill VALUES("19","12:42 PM","2014-11-12","1","0","466.00","500.00","34.00","","");
INSERT INTO tbl_bill VALUES("20","12:43 PM","2014-11-12","1","0","1376.00","2000.00","624.00","","");
INSERT INTO tbl_bill VALUES("21","3:17 PM","2014-11-17","1","0","910.00","1000.00","90.00","","");
INSERT INTO tbl_bill VALUES("22","3:20 PM","2014-11-17","1","0","444.00","500.00","56.00","","");
INSERT INTO tbl_bill VALUES("23","3:26 PM","2014-11-17","1","0","220.00","400.00","180.00","","");
INSERT INTO tbl_bill VALUES("24","3:42 PM","2014-11-17","1","0","220.00","400.00","180.00","","");
INSERT INTO tbl_bill VALUES("25","11:25 AM","2014-11-20","1","0","44.00","50.00","6.00","","");
INSERT INTO tbl_bill VALUES("26","12:39 PM","2014-11-20","1","0","44.00","50.00","6.00","","");
INSERT INTO tbl_bill VALUES("27","12:40 PM","2014-11-20","1","0","22.00","32.00","10.00","","");
INSERT INTO tbl_bill VALUES("28","12:58 PM","2014-11-20","1","0","22.00","23.00","1.00","","");
INSERT INTO tbl_bill VALUES("29","12:59 PM","2014-11-20","1","0","22.00","23.00","1.00","","");
INSERT INTO tbl_bill VALUES("30","12:59 PM","2014-11-20","1","0","466.00","500.00","34.00","","");
INSERT INTO tbl_bill VALUES("31","2:23 PM","2014-11-21","1","0","2440.00","2500.00","60.00","40.00","");
INSERT INTO tbl_bill VALUES("32","2:52 PM","2014-11-21","1","0","260.00","300.00","36.00","4.00","264.00");
INSERT INTO tbl_bill VALUES("33","2:57 PM","2014-11-21","1","0","200.00","200.00","0.00","20.00","220.00");
INSERT INTO tbl_bill VALUES("34","11:56 AM","2014-11-26","1","0","21.00","122.00","101.00","1.00","22.00");



DROP TABLE tbl_bill_menu;

CREATE TABLE `tbl_bill_menu` (
  `bill_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `menu_name` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `menu_price` varchar(100) NOT NULL,
  `cprice` decimal(10,2) NOT NULL,
  `bill_menu_qty` decimal(10,2) NOT NULL,
  `u_id` int(11) NOT NULL,
  `menu_no` varchar(1000) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `menu_status` tinyint(2) DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`bill_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bill_menu VALUES("1","1","1","p001","product1","20.00","10.00","1.00","1","","20.00","1","2014-11-03");
INSERT INTO tbl_bill_menu VALUES("2","2","1","p001","product1","20.00","10.00","2.00","1","","40.00","1","2014-11-03");
INSERT INTO tbl_bill_menu VALUES("3","2","2","p002","product2","21.50","11.00","2.00","1","","43.00","1","2014-11-03");
INSERT INTO tbl_bill_menu VALUES("4","5","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("5","6","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("6","7","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("7","8","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("8","9","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("9","10","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("10","10","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("11","11","1","cc","nn","22.00","11.00","12.00","1","","264.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("12","11","2","ccc","nnn","444.00","333.00","3.00","1","","1332.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("13","12","1","cc","nn","22.00","11.00","2.00","1","","44.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("14","13","1","cc","nn","22.00","11.00","2.00","1","","44.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("15","13","1","cc","","22.00","11.00","4.00","1","","88.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("16","13","2","ccc","","444.00","333.00","2.00","1","","888.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("17","14","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("18","14","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("19","15","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("20","15","2","ccc","","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("21","15","1","cc","","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("22","16","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("23","16","2","ccc","","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("24","19","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("25","19","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("26","20","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("27","20","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("28","20","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("29","20","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("30","20","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-12");
INSERT INTO tbl_bill_menu VALUES("31","21","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-17");
INSERT INTO tbl_bill_menu VALUES("32","21","2","ccc","nnn","444.00","333.00","2.00","1","","888.00","0","2014-11-17");
INSERT INTO tbl_bill_menu VALUES("33","22","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-17");
INSERT INTO tbl_bill_menu VALUES("34","23","1","cc","nn","22.00","11.00","10.00","1","","220.00","0","2014-11-17");
INSERT INTO tbl_bill_menu VALUES("35","24","1","cc","nn","22.00","11.00","10.00","1","","220.00","0","2014-11-17");
INSERT INTO tbl_bill_menu VALUES("36","25","1","cc","nn","22.00","11.00","2.00","1","","44.00","0","2014-11-20");
INSERT INTO tbl_bill_menu VALUES("37","26","1","cc","nn","22.00","11.00","2.00","1","","44.00","0","2014-11-20");
INSERT INTO tbl_bill_menu VALUES("38","27","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-20");
INSERT INTO tbl_bill_menu VALUES("39","28","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-20");
INSERT INTO tbl_bill_menu VALUES("40","29","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-20");
INSERT INTO tbl_bill_menu VALUES("41","30","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-20");
INSERT INTO tbl_bill_menu VALUES("42","30","2","ccc","nnn","444.00","333.00","1.00","1","","444.00","0","2014-11-20");
INSERT INTO tbl_bill_menu VALUES("43","31","1","cc","nn","22.00","11.00","10.00","1","","220.00","0","2014-11-21");
INSERT INTO tbl_bill_menu VALUES("44","31","2","ccc","nnn","444.00","333.00","5.00","1","","2220.00","0","2014-11-21");
INSERT INTO tbl_bill_menu VALUES("45","32","1","cc","nn","22.00","11.00","12.00","1","","264.00","0","2014-11-21");
INSERT INTO tbl_bill_menu VALUES("46","33","1","cc","nn","22.00","11.00","10.00","1","","220.00","0","2014-11-21");
INSERT INTO tbl_bill_menu VALUES("47","34","1","cc","nn","22.00","11.00","1.00","1","","22.00","0","2014-11-26");



DROP TABLE tbl_category;

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(250) NOT NULL,
  `cat_status` tinyint(2) NOT NULL COMMENT '1=delete,0=active',
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_category VALUES("1","C111","0","1");
INSERT INTO tbl_category VALUES("2","C222","0","1");



DROP TABLE tbl_client;

CREATE TABLE `tbl_client` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(500) NOT NULL,
  `company` varchar(100) NOT NULL,
  `cl_mob` varchar(15) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `cl_address` varchar(600) NOT NULL,
  `cl_discount` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cl_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-active,1-delete',
  `cl_veh` varchar(15) NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_goods_received;

CREATE TABLE `tbl_goods_received` (
  `grn_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `grn_date` date NOT NULL,
  `grn_remarks` varchar(800) NOT NULL,
  `u_id` int(11) NOT NULL,
  `grn_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-active,1-cancel,2-confirm',
  `grn_pay_date` date NOT NULL,
  `grn_payment_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-no,1-yes',
  `grn_paid_u_id` int(11) NOT NULL,
  `grn_inv_no` varchar(500) NOT NULL,
  PRIMARY KEY (`grn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_grn;

CREATE TABLE `tbl_grn` (
  `grn_id` int(11) NOT NULL AUTO_INCREMENT,
  `grn_date` date NOT NULL,
  `grn_status` tinyint(4) NOT NULL DEFAULT '0',
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`grn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tbl_grn VALUES("1","2014-11-03","0","1");
INSERT INTO tbl_grn VALUES("2","2014-11-03","0","1");
INSERT INTO tbl_grn VALUES("3","2014-11-03","0","1");



DROP TABLE tbl_maincategory;

CREATE TABLE `tbl_maincategory` (
  `scat_id` int(11) NOT NULL AUTO_INCREMENT,
  `scat_name` varchar(1000) NOT NULL,
  `scat_status` tinyint(2) NOT NULL COMMENT 'active=0,delete=1',
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`scat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_order;

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_id` int(11) NOT NULL,
  `order_remarks` varchar(600) NOT NULL,
  `order_date` date NOT NULL,
  `order_total_qty` int(11) NOT NULL,
  `order_total_charge` decimal(10,2) NOT NULL,
  `order_payment` varchar(500) NOT NULL,
  `order_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-active,1-cancel',
  `u_id` int(11) NOT NULL,
  `order_used_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-no,1-yes',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_payment_types;

CREATE TABLE `tbl_payment_types` (
  `pay_tp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_tp_name` varchar(50) NOT NULL,
  PRIMARY KEY (`pay_tp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tbl_payment_types VALUES("1","Cash");
INSERT INTO tbl_payment_types VALUES("2","Credit");
INSERT INTO tbl_payment_types VALUES("3","Credit Card");



DROP TABLE tbl_product;

CREATE TABLE `tbl_product` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(400) NOT NULL,
  `service_price` decimal(10,2) NOT NULL,
  `sprice` decimal(10,2) NOT NULL,
  `service_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-active,1-delete',
  `cat_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `product_idn` varchar(100) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_product VALUES("1","nn","11.00","22.00","0","1","2","1","cc");
INSERT INTO tbl_product VALUES("2","nnn","333.00","444.00","0","2","1","1","ccc");



DROP TABLE tbl_sales;

CREATE TABLE `tbl_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_sales_item;

CREATE TABLE `tbl_sales_item` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(100) NOT NULL,
  `acc_date` date NOT NULL,
  `sim_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_service;

CREATE TABLE `tbl_service` (
  `ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `ser_name` varchar(100) NOT NULL,
  `ser_price` int(11) NOT NULL,
  `ser_status` tinyint(2) NOT NULL COMMENT 'active=0,delete=1',
  `u_id` int(11) NOT NULL,
  `ser_item` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  PRIMARY KEY (`ser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE tbl_stock;

CREATE TABLE `tbl_stock` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `grn_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `st_price` decimal(10,2) NOT NULL,
  `st_qty` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `st_remain_qty` decimal(10,2) NOT NULL,
  `st_status` tinyint(4) NOT NULL DEFAULT '0',
  `st_date` date NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tbl_stock VALUES("1","1","1","p001","10.00","5.00","50.00","5.00","0","2014-11-03");
INSERT INTO tbl_stock VALUES("2","1","2","p002","11.00","50.00","550.00","50.00","0","2014-11-03");
INSERT INTO tbl_stock VALUES("3","2","1","p001","10.00","5.00","50.00","5.00","0","2014-11-03");
INSERT INTO tbl_stock VALUES("4","3","1","p001","10.00","1.00","10.00","1.00","0","2014-11-03");
INSERT INTO tbl_stock VALUES("5","3","2","p002","11.00","1.00","11.00","1.00","0","2014-11-03");



DROP TABLE tbl_stockall;

CREATE TABLE `tbl_stockall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sprice` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tbl_stockall VALUES("1","1","product1","p001","10.00","20.00","-87","1");
INSERT INTO tbl_stockall VALUES("2","2","product2","p002","11.00","21.00","-22","1");
INSERT INTO tbl_stockall VALUES("3","3","name1","code1","111.00","222.00","0","1");
INSERT INTO tbl_stockall VALUES("4","4","nnn","cc","33.00","44.00","0","1");
INSERT INTO tbl_stockall VALUES("5","1","nn","cc","11.00","22.00","-87","0");
INSERT INTO tbl_stockall VALUES("6","2","nnn","ccc","333.00","444.00","-22","0");



DROP TABLE tbl_user;

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(300) NOT NULL,
  `u_nic` varchar(15) NOT NULL,
  `u_address` varchar(500) NOT NULL,
  `u_tel` varchar(15) NOT NULL,
  `u_email` varchar(400) NOT NULL,
  `u_uname` varchar(300) NOT NULL,
  `u_pwd` varchar(500) NOT NULL,
  `u_type` varchar(20) NOT NULL COMMENT 'admin,teacher',
  `u_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-active,1-delete',
  `u_added_u_id` int(11) NOT NULL,
  `u_date` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO tbl_user VALUES("1","","","","","","admin","81dc9bdb52d04dc20036dbd8313ed055","admin","0","0","0000-00-00");
INSERT INTO tbl_user VALUES("15","damith","90v","kuru","081","damith@gmail","user","202cb962ac59075b964b07152d234b70","suser","0","1","2012-07-13  8:52 AM");
INSERT INTO tbl_user VALUES("18","buddika","8620920545v","Colombo ","0712652536","buddikauwu@gmail.com","buddika","202cb962ac59075b964b07152d234b70","sadmin","0","1","2012-08-08  10:42 AM");
INSERT INTO tbl_user VALUES("22","abc","abc","abc","abc","abc","srilanka","bd36092fc3e31030bbd25e411c30328e","suser","0","1","2012-11-01  11:52 AM");



DROP TABLE tbl_veraity;

CREATE TABLE `tbl_veraity` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_veraity VALUES("1","VE1","0");
INSERT INTO tbl_veraity VALUES("2","V22","0");



