-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2016 at 04:58 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(1000) NOT NULL,
  `tot` decimal(10,2) NOT NULL,
  `bill_type` varchar(100) NOT NULL,
  `c_id` int(11) NOT NULL,
  `bill_discount` decimal(10,2) NOT NULL,
  `cash` decimal(10,2) NOT NULL,
  `bill_time` varchar(15) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_status` varchar(20) NOT NULL,
  `u_id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `activity_status` varchar(100) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `balance` double(50,2) NOT NULL,
  `pay_typ` varchar(100) NOT NULL,
  `pay_date` date NOT NULL,
  `ftotal` decimal(10,2) NOT NULL,
  `po` varchar(20) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_id`, `inv_no`, `tot`, `bill_type`, `c_id`, `bill_discount`, `cash`, `bill_time`, `bill_date`, `bill_status`, `u_id`, `no`, `activity_status`, `pay_type`, `total`, `balance`, `pay_typ`, `pay_date`, `ftotal`, `po`) VALUES
(1, '', '0.00', '', 0, '0.00', '0.00', '9:59 PM', '2016-06-26', '0', 1, 0, 'pending', '', '44.00', 0.00, '', '0000-00-00', '0.00', ''),
(2, '444', '0.00', '', 1, '0.00', '0.00', '11:23 PM', '2016-06-26', '0', 1, 0, 'pending', 'Cash', '44.00', 0.00, '', '0000-00-00', '0.00', '33'),
(3, '3333', '0.00', '', 1, '0.00', '0.00', '11:55 PM', '2016-06-26', '0', 1, 0, 'pending', 'Credit', '88.00', 0.00, '', '0000-00-00', '0.00', '22'),
(4, '', '0.00', '', 1, '0.00', '0.00', '12:13 AM', '2016-06-27', '0', 1, 0, 'pending', 'Cheque', '22.00', 0.00, '', '0000-00-00', '0.00', ''),
(5, '', '0.00', '', 0, '0.00', '0.00', '12:17 AM', '2016-06-27', '0', 1, 0, 'pending', '', '44.00', 0.00, '', '0000-00-00', '0.00', ''),
(6, '', '0.00', '', 0, '0.00', '0.00', '12:21 AM', '2016-06-27', '0', 1, 0, 'pending', '', '88.00', 0.00, '', '0000-00-00', '0.00', ''),
(7, '', '0.00', '', 0, '0.00', '0.00', '12:22 AM', '2016-06-27', '0', 1, 0, 'pending', '', '88.00', 0.00, '', '0000-00-00', '0.00', ''),
(8, '', '0.00', '', 0, '0.00', '0.00', '12:23 AM', '2016-06-27', '0', 1, 0, 'pending', '', '88.00', 0.00, '', '0000-00-00', '0.00', ''),
(9, '', '0.00', '', 0, '0.00', '0.00', '12:23 AM', '2016-06-27', '0', 1, 0, 'completed', '', '22.00', 0.00, '', '2016-06-27', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_bill_menu` (
  `bill_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `menu_name` varchar(1000) NOT NULL,
  `menu_price` varchar(100) NOT NULL,
  `dis` decimal(10,2) NOT NULL,
  `bill_menu_qty` decimal(10,2) NOT NULL,
  `rqty` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `menu_no` varchar(1000) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `menu_status` tinyint(2) NOT NULL,
  `date` date NOT NULL,
  `rdate` date NOT NULL,
  `stock_price` decimal(10,2) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `tot_profit` decimal(10,2) NOT NULL,
  `dis_per` decimal(10,2) NOT NULL,
  PRIMARY KEY (`bill_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_bill_menu`
--

INSERT INTO `tbl_bill_menu` (`bill_menu_id`, `bill_id`, `name`, `menu_name`, `menu_price`, `dis`, `bill_menu_qty`, `rqty`, `u_id`, `menu_no`, `total`, `menu_status`, `date`, `rdate`, `stock_price`, `profit`, `tot_profit`, `dis_per`) VALUES
(1, 1, '', 'code1', '22.00', '0.00', '2.00', 0, 1, '', '44.00', 0, '2016-06-26', '0000-00-00', '0.00', '0.00', '0.00', '0.00'),
(2, 2, '', 'code1', '22.00', '0.00', '2.00', 0, 1, '', '44.00', 0, '2016-06-26', '0000-00-00', '0.00', '0.00', '0.00', '0.00'),
(3, 3, 'name1', 'code1', '22.00', '0.00', '4.00', 1, 1, '', '88.00', 0, '2016-06-26', '2016-06-26', '0.00', '0.00', '0.00', '0.00'),
(4, 4, 'name1', 'code1', '22.00', '0.00', '1.00', 0, 1, '', '22.00', 0, '2016-06-27', '0000-00-00', '0.00', '0.00', '0.00', '0.00'),
(5, 5, 'name1', 'code1', '22.00', '0.00', '2.00', 0, 1, '', '44.00', 0, '2016-06-27', '0000-00-00', '0.00', '0.00', '0.00', '0.00'),
(6, 6, 'name2', 'code2', '44.00', '0.00', '2.00', 0, 1, '', '88.00', 0, '2016-06-27', '0000-00-00', '0.00', '0.00', '0.00', '0.00'),
(7, 7, 'name2', 'code2', '44.00', '0.00', '2.00', 0, 1, '', '88.00', 0, '2016-06-27', '0000-00-00', '0.00', '0.00', '0.00', '0.00'),
(8, 8, 'name2', 'code2', '44.00', '0.00', '2.00', 0, 1, '', '88.00', 0, '2016-06-27', '0000-00-00', '0.00', '0.00', '0.00', '0.00'),
(9, 9, 'name1', 'code1', '22.00', '0.00', '1.00', 0, 1, '', '22.00', 0, '2016-06-27', '0000-00-00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(250) NOT NULL,
  `cat_status` tinyint(2) NOT NULL COMMENT '1=delete,0=active',
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_category`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_charity`
--

CREATE TABLE IF NOT EXISTS `tbl_charity` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cus_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `v` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_status` tinyint(2) NOT NULL,
  `date` date NOT NULL,
  `etf` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `st_photo_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_charity`
--

INSERT INTO `tbl_charity` (`c_id`, `c_name`, `cus_id`, `v`, `address`, `section`, `fname`, `description`, `c_status`, `date`, `etf`, `st_photo_url`, `type`) VALUES
(1, 'buddika1', '', 0, 'jhgj2', '07126525363', '', '', 0, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collecting`
--

CREATE TABLE IF NOT EXISTS `tbl_collecting` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `k_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `k_persentage` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `amount_chanter` decimal(10,2) NOT NULL,
  `amount_temple` decimal(10,2) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_collecting`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_grn`
--

CREATE TABLE IF NOT EXISTS `tbl_grn` (
  `grn_id` int(11) NOT NULL AUTO_INCREMENT,
  `grn_date` date NOT NULL,
  `grn_status` tinyint(4) NOT NULL DEFAULT '0',
  `u_id` int(11) NOT NULL,
  `bill_type` varchar(100) NOT NULL,
  `past_amt` decimal(10,2) NOT NULL,
  `add_amt` decimal(10,2) NOT NULL,
  `paid_amt` decimal(10,2) NOT NULL,
  `stotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pay_typ` varchar(50) NOT NULL,
  `diff` decimal(10,2) NOT NULL,
  `inv_no` varchar(500) NOT NULL,
  PRIMARY KEY (`grn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_grn`
--

INSERT INTO `tbl_grn` (`grn_id`, `grn_date`, `grn_status`, `u_id`, `bill_type`, `past_amt`, `add_amt`, `paid_amt`, `stotal`, `total`, `pay_typ`, `diff`, `inv_no`) VALUES
(1, '2016-06-26', 0, 1, '', '0.00', '0.00', '0.00', '22.00', '0.44', 'cash', '0.00', ''),
(2, '2016-06-26', 0, 1, '', '0.00', '0.00', '0.00', '44.00', '0.88', 'cash', '0.00', ''),
(3, '2016-06-27', 0, 1, '', '0.00', '0.00', '0.00', '198.00', '3.96', 'cash', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maincategory`
--

CREATE TABLE IF NOT EXISTS `tbl_maincategory` (
  `scat_id` int(11) NOT NULL AUTO_INCREMENT,
  `scat_name` varchar(1000) NOT NULL,
  `scat_status` tinyint(2) NOT NULL COMMENT 'active=0,delete=1',
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`scat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_maincategory`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `inv_no` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `late_amount` decimal(10,2) NOT NULL,
  `p_status` tinyint(2) NOT NULL,
  `c_status` tinyint(2) NOT NULL,
  `date` date NOT NULL,
  `cdate` date NOT NULL,
  `cno` varchar(200) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `bill_id`, `inv_no`, `type`, `cus_name`, `amount`, `late_amount`, `p_status`, `c_status`, `date`, `cdate`, `cno`) VALUES
(1, 9, '', 'cash', '', '20.00', '0.00', 0, 0, '2016-06-27', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(600) NOT NULL,
  `p_price` decimal(10,2) NOT NULL,
  `cprice` decimal(10,2) NOT NULL,
  `p_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-active,1-delete',
  `cat` varchar(100) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_code` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_price`, `cprice`, `p_status`, `cat`, `scat_id`, `u_id`, `p_code`) VALUES
(1, 'name1', '22.00', '11.00', 0, 'test', 0, 1, 'code1'),
(2, 'name2', '44.00', '33.00', 0, 'test', 0, 1, 'code2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rep`
--

CREATE TABLE IF NOT EXISTS `tbl_rep` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` decimal(10,2) NOT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_rep`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_rute`
--

CREATE TABLE IF NOT EXISTS `tbl_rute` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(100) NOT NULL,
  `r_status` tinyint(2) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_rute`
--

INSERT INTO `tbl_rute` (`r_id`, `r_name`, `r_status`) VALUES
(1, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `grn_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(400) NOT NULL,
  `p_code` varchar(100) NOT NULL,
  `st_price` decimal(10,2) NOT NULL,
  `st_qty` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `st_remain_qty` decimal(10,2) NOT NULL,
  `st_status` tinyint(4) NOT NULL DEFAULT '0',
  `st_date` date NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`st_id`, `grn_id`, `p_id`, `p_name`, `p_code`, `st_price`, `st_qty`, `amount`, `st_remain_qty`, `st_status`, `st_date`) VALUES
(1, 1, 1, 'code1', '', '11.00', '2.00', '22.00', '2.00', 0, '2016-06-26'),
(2, 2, 1, 'code1', '', '11.00', '4.00', '44.00', '4.00', 0, '2016-06-26'),
(3, 3, 2, 'code2', '', '33.00', '6.00', '198.00', '6.00', 0, '2016-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stockall`
--

CREATE TABLE IF NOT EXISTS `tbl_stockall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sprice` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `rqty` int(11) NOT NULL,
  `status` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_stockall`
--

INSERT INTO `tbl_stockall` (`id`, `p_id`, `name`, `code`, `price`, `sprice`, `qty`, `rqty`, `status`) VALUES
(1, 0, 'name1', 'code1', '11.00', '22.00', 3, 0, '0.00'),
(2, 2, 'name2', 'code2', '33.00', '44.00', 4, 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(300) NOT NULL,
  `u_nic` varchar(15) NOT NULL,
  `u_address` varchar(500) NOT NULL,
  `u_tel` varchar(15) NOT NULL,
  `date` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `u_uname` varchar(300) NOT NULL,
  `u_pwd` varchar(500) NOT NULL,
  `u_type` varchar(20) NOT NULL COMMENT 'admin,cashier',
  `u_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0-active,1-delete',
  `u_added_u_id` int(11) NOT NULL,
  `u_date` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_name`, `u_nic`, `u_address`, `u_tel`, `date`, `email`, `u_uname`, `u_pwd`, `u_type`, `u_status`, `u_added_u_id`, `u_date`) VALUES
(1, 'admin', 'kk', 'kk', 'kk', '', 'll', 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 0, 0, '0000-00-00');
