-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 06:16 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectmonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE IF NOT EXISTS `audit_trail` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`date`, `user`, `action`) VALUES
('2016-09-23 04:45:42', 'admin', 'Added category record'),
('2016-09-23 04:46:01', 'admin', 'Deleted category record'),
('2016-09-23 15:26:32', 'admin', 'Added category record'),
('2016-09-23 15:26:47', 'admin', 'Added category record'),
('2016-09-23 15:27:03', 'admin', 'Deleted category record'),
('2016-09-23 17:10:59', 'ag17', 'Updated Category namemetal->metals '),
('2016-09-23 17:11:53', 'ag17', 'Updated Category name abc->abcd '),
('2016-09-23 19:21:34', 'ag17', 'Updated Username blank->admin '),
('2016-09-23 19:21:39', 'ag17', 'Updated Password blank->admin '),
('2016-10-07 17:27:05', 'admin', 'Added category record'),
('2016-10-10 11:58:10', 'admin', 'Updated contact kyle->kylee '),
('2016-10-10 12:39:52', 'admin', 'Added category record'),
('2016-10-10 12:40:42', 'admin', 'Added unit measurement record'),
('2016-10-10 12:41:17', 'admin', 'Added materials record'),
('2016-10-10 12:53:34', 'admin', 'Updated Price 50.00->150.00 '),
('2016-10-10 12:53:56', 'admin', 'Updated Subcategory(Materials) blank->lumber '),
('2016-10-10 12:56:06', 'admin', 'Updated Abbreviation m->mm '),
('2016-10-10 12:56:09', 'admin', 'Updated Abbreviation mm->m '),
('2016-10-10 12:58:34', 'admin', 'Updated Price 150.00->1150.00 '),
('2016-10-10 12:59:50', 'admin', 'Updated Quantity blank->1 '),
('2016-10-10 12:59:58', 'admin', 'Updated Quantity 1->blank '),
('2016-10-10 13:00:00', 'admin', 'Updated Quantity blank->1 '),
('2016-10-10 13:08:02', 'admin', 'Updated Quantity 1->2 '),
('2016-10-10 13:10:44', 'admin', 'Updated Quantity 2->46 '),
('2016-10-10 13:17:05', 'admin', 'Updated Quantity 46->47 '),
('2016-10-10 13:20:25', 'admin', 'Updated Quantity 47->51 '),
('2016-10-10 15:15:25', 'admin', 'Updated Color blank->brown '),
('2016-10-10 15:15:59', 'admin', 'Updated Color brown->brownnnnnnn ');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `billing_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `quote_no` int(11) DEFAULT NULL,
  `payterms` varchar(50) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `totalcost` int(11) DEFAULT NULL,
  `totalamount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `prepared_by` varchar(50) DEFAULT NULL,
  `noted_by` varchar(50) DEFAULT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`billing_no`)
) --------------------------------------------------------

--
-- 

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `cust_type` varchar(50) DEFAULT NULL,
  `comp_name` varchar(100) DEFAULT NULL,
  `phone_num` varchar(12) NOT NULL,
  `fax` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_no`, `username`, `password`, `cust_type`, `comp_name`, `phone_num`, `fax`, `email`, `firstname`, `middlename`, `lastname`, `contact`, `street`, `city`, `status`) VALUES
(1, 'admin', 'admin', 'Company', 'Tonios Heights', '7245961', '103642334', 'antonio_santos@yahoo.com', 'antonio', 'comendador', 'santos', '09276693860', 'f.roxas', 'san juan', 'hidden'),
(5, '', '', 'Company', 'Sitel', '7245961', '18734', 'antonio_santos17@yahoo.com', 'antonio', 'comendador', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'hidden'),
(6, '', '', 'Company', 'tonio''s mecha', '7245961', '12341', 'antonio_santos17@yahoo.com', 'antonio', 'comendador', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'Active'),
(7, 'ag17', 'admin', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'bets', 'rendon', 'jesena', '09276693860', '1 P.R sotto', 'san juan', 'Active'),
(8, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'pamela', 'comendador', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'hidden'),
(9, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'kiara', 'pauline', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'Active'),
(10, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'patrica', 'comendador', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'hidden'),
(11, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'kasandra', 'comendador', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'Active'),
(12, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'patrick', 'I', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'Active'),
(13, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'denise', 'comendador', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'Active'),
(14, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'Bong ', 'rendon', 'jesena', '09276693860', '1 P.R sotto', 'san juan', 'Active'),
(15, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'michelle', 'rendon', 'jesena', '09276693860', '1 P.R sotto', 'san juan', 'Active'),
(16, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'martha', 'rendon', 'jesena', '09276693860', '1 P.R sotto', 'san juan', 'Active'),
(17, '', '', 'Individual', '', '', '', 'antonio_santos17@yahoo.com', 'martha', 'rendon', 'jesena', '09276693860', '1 P.R sotto', 'san juan', 'Active'),
(18, '', '', 'Company', '123-abc company', '123456789012', '', 'ken@yahoo.com', 'ken', ' ', 'boris', '1234', '12 santos', 'manila', 'Active'),
(19, '', '', 'Individual', '', '', '', 'dex@gmail.com', 'dex', 'a', 'jackson-o''connor', '1', '1 gold', 'qc', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `verified_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`delivery_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_no`, `supplier`, `date`, `verified_by`, `status`) VALUES
(1, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(3, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(4, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(5, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(6, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(7, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(8, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(9, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(10, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(11, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(12, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(13, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(14, 'coco company', '2016-10-07', 'Santos, Anto''nio S.', 'active'),
(15, '', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(16, '', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(17, 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(18, 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(19, 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(20, 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(21, 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(22, 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(23, 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(24, 'San Miguel Corporation', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(25, 'gggggg', '2016-10-10', 'Santos, Anto''nio S.', 'active'),
(26, 'gggggg', '2016-10-10', 'Santos, Anto''nio S.', 'active'),
(27, 'gggggg', '2016-10-10', 'Santos, Anto''nio S.', 'active'),
(28, 'kalbonomics', '2016-10-10', 'Santos, Anto''nio S.', 'active'),
(29, 'kalbonomics', '2016-10-10', 'Santos, Anto''nio S.', ''),
(30, 'kalbonomics', '2016-10-10', 'Santos, Anto''nio S.', 'active'),
(31, 'kalbonomics', '2016-10-10', 'Santos, Anto''nio S.', 'active'),
(32, 'kalbonomics', '2016-10-10', 'Santos, Anto''nio S.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_cart`
--

CREATE TABLE IF NOT EXISTS `delivery_cart` (
  `delivery_no` int(11) DEFAULT NULL,
  `po_no` int(123) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `scategory_name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `unit_measurement` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `abbre` varchar(50) NOT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_cart`
--

INSERT INTO `delivery_cart` (`delivery_no`, `po_no`, `code`, `supplier`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(2, 3, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'coco company', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 1, 'w', 'active'),
(1, 1, '45c48cce2e2d7fbdea1afc51c7c6ad26', '', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 1, 'k', 'active'),
(1, 1, '98f13708210194c475687be6106a3b84', '', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 1, 'w', 'active'),
(24, 7, 'd3d9446802a44259755d38e6d163e820', 'San Miguel Corporation', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 51, 'k', 'active'),
(25, 8, 'c20ad4d76fe97759aa27a0c99bff6710', 'gggggg', 4, '', 'wood', 'lumber', 'gggg', '', '', '1', 11, 'k', 'active'),
(28, 11, 'mtrl1', 'kalbonomics', 1, 'nievas wood', 'wood', 'lumber', 'solid', '', '', '10x10x10', 1, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `contact` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_no`, `username`, `password`, `firstname`, `middlename`, `lastname`, `position`, `contact`, `email`, `street`, `city`, `status`) VALUES
(1, '', '', '', '', '', 'position', '', '', 'San Juan', '', 'hidden'),
(2, 'admin', 'admin', 'Anto''nio', 'santos', 'santos', 'stockman.', '09364693975', 'antonio@yahoo.com', 'as', 'a', 'hidden'),
(3, '', '', 'John Erickson ', 'Marella', 'Espinoza', 'Manager.', '09364693975', 'otieespinoza@gmail.com', 'Kapasigan', 'Pasig City', 'Active'),
(4, '', '', 'mark', 'atian', 'nay''re', 'engineer.', '09276693860', 'antonio@yahoo.com', '123', 'San Juan', 'Active'),
(5, '', '', 'John Erickson ', 'Marella', 'Espinoza', 'Manager.', '09364693975', 'otieespinoza@gmail.com', 'Dr.Pilapi', 'Pasig City', 'Active'),
(6, '', '', 'John Erickson ', 'Marella', 'Espinoza', 'Manager.', '09364693975', 'otieespinoza@gmail.com', 'Dr.Pilapi', 'Pasig City', 'Active'),
(7, '', '', 'John Erickson ', ' ', 'Espinoza', 'Manager.', '09364693975', 'otieespinoza@gmail.com', 'Dr.Pilapi', 'Pasig City', 'Active'),
(8, '', '', 'John Erickson ', ' ', 'Espinoza', 'Manager.', '09364693975', 'otieespinoza@gmail.com', 'Dr.Pilapi', 'Pasig City', 'Active'),
(9, '', '', 'antonio', 'comendador', 'santos', 'admin', '09276693860', 'antonio_santos17@yahoo.com', '144 f.roxas st', 'san juan', 'Active'),
(10, '', '', 'asd', 'asd', 'asd', 'accountant.', 'asd', 'asd', 'asdd', 'asd', 'hidden'),
(11, '', '', 'asdsa', 'dasdas', 'dasd', 'accountant.', '12345341234', 'asdasdsad', 'asdsad', 'asdasd', 'hidden'),
(12, '', '', 'asdsa', 'dasdas', 'dasd', 'accountant.', '12345341234', 'asdasdsad', 'asdsad', 'asdasd', 'hidden'),
(13, '', '', 'tony', ' ', 'henry', 'electrician', '12345678909', 'ton@yhaoo.com', '1', 'qc', 'Active'),
(14, '', '', 'gerry', 'g', 'ganz', 'supervisor', '12345678900', 'ggg@yahoo.com', '3', 'manila', 'Active'),
(15, '', '', 'John Erickson ', 'Marella', 'Espinoza', 'Foreman', '09364693975', 'otieespinoza@gmail.com', 'San Juan', 'San Juan', 'Active'),
(16, '', '', 'o''neal', 'o''neal', 'o''neal', 'Foreman', '09364693975', 'otieespinoza@gmail.com', 'oiuoiu', 'oiuiou', 'Active'),
(17, '', '', 'John Erickson ', 'Marella', 'Espinoza', 'Foreman', '09364693975', 'otieespinoza@gmail.com', 'San Juan', 'San Juan', 'Active'),
(18, '', '', 'John Erickson ', ' ', 'Espinoza', 'Foreman', '09364693975', 'otieespinoza@gmail.com', 'San Juan', 'San Juan', 'Active'),
(19, '', '', 'Christian', ' ', 'nay''re', 'Foreman', '09787', 'O_rylai@gmail.com', 'San Juan', 'San Juan', 'Active'),
(20, '', '', 'o''neal', 'o''neal', 'O''neal - santiago', 'Foreman', '09364693975', 'otieespinoza@gmail.com', 'San miguel', 'San Juan', 'Active'),
(21, '', '', 'Lola', ' ', 'Lols', 'Foreman', '09364693975', 'O_rylai@gmail.com', 'San Juan', 'San Juan', 'Active'),
(22, 'JohnErickson', 'Espinozaa', 'John Erickson ', ' ', 'Espinoza', 'Quantity Surveyor', '09364693975', 'otieespinoza@gmail.com', 'Antipolo', 'antipolo', 'Active');

--
-- Triggers `employee`
--
DROP TRIGGER IF EXISTS `employee_add`;
DELIMITER //
CREATE TRIGGER `employee_add` AFTER INSERT ON `employee`
 FOR EACH ROW begin
insert into audit_trail
values
(now(), (select user from sample where status = 'active'), 'Added employee record');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_form`
--

CREATE TABLE IF NOT EXISTS `inventory_form` (
  `Item_no` varchar(100) DEFAULT NULL,
  `Date_if` date DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Unit_Cost` int(11) DEFAULT NULL,
  `Grand_Total` int(11) DEFAULT NULL,
  `Company_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materialreq`
--

CREATE TABLE IF NOT EXISTS `materialreq` (
  `req_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) NOT NULL,
  `requested_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`req_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `materialreq`
--

INSERT INTO `materialreq` (`req_no`, `customer`, `project`, `date`, `requested_by`, `status`) VALUES
(1, 'Tonios Heights', 'jet', '07/10/2016', 'Santos, Anto''nio S.', 'active'),
(2, 'Jesena, Bets R.', 'meme', '08/10/2016', 'Santos, Anto''nio S.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `materialreq_cart`
--

CREATE TABLE IF NOT EXISTS `materialreq_cart` (
  `req_no` int(11) DEFAULT NULL,
  `code` varchar(123) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(50) DEFAULT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `abbre` varchar(50) NOT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialreq_cart`
--

INSERT INTO `materialreq_cart` (`req_no`, `code`, `customer`, `project`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(2, '3c59dc048e8850243be8079a5c74d079', 'Tonios Heights', 'jet', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 1, 'w', 'active'),
(1, '45c48cce2e2d7fbdea1afc51c7c6ad26', 'Tonios Heights', 'jet', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 7, 'k', 'active'),
(1, '98f13708210194c475687be6106a3b84', 'Tonios Heights', 'jet', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 9, 'w', 'active'),
(2, 'd3d9446802a44259755d38e6d163e820', 'Tonios Heights', 'jet', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 1, 'k', 'active'),
(2, 'e4da3b7fbbce2345d7772b0674a318d5', 'Jesena, Bets R.', 'meme', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 4, 'k', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `material_no` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `abbre` varchar(50) DEFAULT NULL,
  `quantity` int(12) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`material_no`),
  UNIQUE KEY `product_code` (`code`),
  UNIQUE KEY `product_code_2` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_no`, `code`, `category`, `scategory_name`, `description`, `brand_name`, `color`, `package`, `unit_measurement`, `abbre`, `quantity`, `price`, `status`) VALUES
(1, 'mtrl1', 'wood', 'lumber', 'solid', 'nievas wood', 'brownnnnnnn', 'box', '10x10x10', 'm', 51, '1150.00', 'hidden');

--
-- Triggers `materials`
--
DROP TRIGGER IF EXISTS `material_added`;
DELIMITER //
CREATE TRIGGER `material_added` AFTER INSERT ON `materials`
 FOR EACH ROW begin
insert into audit_trail
values
(now(), (select user from sample where status = 'active'), 'Added materials record');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `material_requisition`
--

CREATE TABLE IF NOT EXISTS `material_requisition` (
  `Requisition_slip_no` varchar(100) DEFAULT NULL,
  `Project` varchar(100) DEFAULT NULL,
  `Date_MR` varchar(100) DEFAULT NULL,
  `Item_no` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `UNIT_COST` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Total_Amount` int(11) DEFAULT NULL,
  `Released_by` varchar(100) DEFAULT NULL,
  `Checked_by` varchar(100) DEFAULT NULL,
  `Accepted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(50) NOT NULL,
  `topay` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `chequeno` int(20) NOT NULL,
  `chequedate` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`payment_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `position_no` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`position_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_no`, `position_name`, `status`) VALUES
(1, 'Foreman', 'Active'),
(2, 'electrician', 'Active'),
(3, 'supervisorss', 'Active'),
(4, 'admin', 'active'),
(5, 'Quantity Surveyor', 'Active'),
(6, 'Surveyor', 'Active'),
(7, 'President', 'Active'),
(8, 'Quan', 'hidden'),
(9, 'Secretary', 'Active'),
(10, 'Administrator', 'Active'),
(11, 'Analyst', 'hidden');

--
-- Triggers `position`
--
DROP TRIGGER IF EXISTS `position_add`;
DELIMITER //
CREATE TRIGGER `position_add` AFTER INSERT ON `position`
 FOR EACH ROW begin
insert into audit_trail
values
(now(), (select user from sample where status = 'active'), 'Added position record');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pullout`
--

CREATE TABLE IF NOT EXISTS `pullout` (
  `pullout_no` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) DEFAULT NULL,
  `accepted_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`pullout_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pullout`
--

INSERT INTO `pullout` (`pullout_no`, `customer`, `project`, `date`, `accepted_by`, `status`) VALUES
(1, 'Tonios Heights', 'jet', '2016-10-08', 'Santos, Anto''nio S.', 'active'),
(2, 'Jesena, Bets R.', 'meme', '2016-10-08', 'Santos, Anto''nio S.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pullout_cart`
--

CREATE TABLE IF NOT EXISTS `pullout_cart` (
  `pullout_no` int(11) DEFAULT NULL,
  `req_no` int(123) NOT NULL,
  `code` varchar(123) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `abbre` varchar(50) NOT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pullout_cart`
--

INSERT INTO `pullout_cart` (`pullout_no`, `req_no`, `code`, `customer`, `project`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(1, 1, '45c48cce2e2d7fbdea1afc51c7c6ad26', 'Tonios Heights', 'jet', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 3, 'k', 'active'),
(1, 1, '98f13708210194c475687be6106a3b84', 'Tonios Heights', 'jet', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 1, 'w', 'active'),
(2, 2, 'd3d9446802a44259755d38e6d163e820', 'Jesena, Bets R.', 'meme', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 5, 'k', 'active'),
(2, 2, 'e4da3b7fbbce2345d7772b0674a318d5', 'Jesena, Bets R.', 'meme', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 1, 'k', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pull_out_form`
--

CREATE TABLE IF NOT EXISTS `pull_out_form` (
  `Pull_out_form_no` varchar(100) DEFAULT NULL,
  `Project` varchar(100) DEFAULT NULL,
  `Date_pullout` date DEFAULT NULL,
  `Item_no` varchar(100) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Released_by` varchar(100) DEFAULT NULL,
  `Checked_by` varchar(100) DEFAULT NULL,
  `Accepted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_cart`
--

CREATE TABLE IF NOT EXISTS `purchase_cart` (
  `po_no` int(11) DEFAULT NULL,
  `code` varchar(123) NOT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `material_no` int(11) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `scategory_name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `unit_measurement` varchar(100) DEFAULT NULL,
  `abbre` varchar(123) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_cart`
--

INSERT INTO `purchase_cart` (`po_no`, `code`, `supplier`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `abbre`, `quantity`, `status`) VALUES
(0, '1f0e3dad99908345f7439f8ffabdffc4', '', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 'w', 0, 'active'),
(4, '37693cfc748049e45d87b8c7d8b9aacd', 'San Miguel Corporation', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 'w', 1, 'active'),
(1, '45c48cce2e2d7fbdea1afc51c7c6ad26', 'jet', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 'k', 0, 'active'),
(8, '6512bd43d9caa6e02c990b0a82652dca', 'gggggg', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 'k', 1, 'active'),
(9, '6f4922f45568161a8cdf4ad2299f6d23', 'gggggg', 9, '', 'wood', 'lumber', 'fgfg', '', '', '10', 'k', 1, 'active'),
(9, '70efdf2ec9b086079795c442636b55fb', 'gggggg', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 'k', 1, 'active'),
(1, '98f13708210194c475687be6106a3b84', 'jet', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 'w', 0, 'active'),
(3, '9bf31c7ff062936a96d3c8bd1f8f2ff3', 'coco company', 12, 'khkjh', 'electrical', 'wires', 'kjhkjh', 'kjhkjh', '', '10', 'k', 1, 'active'),
(9, 'aab3238922bcc25a6f606eb525ffdc56', 'gggggg', 5, '', 'electrical', 'wires', 'hhhhh', '', '', '10', 'k', 1, 'active'),
(3, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'coco company', 19, 'Akari', 'metal', 'pole', 'stainless', 'aluminum', '', '10', 'w', 8, 'active'),
(11, 'c20ad4d76fe97759aa27a0c99bff6710', 'kalbonomics', 1, 'nievas wood', 'wood', 'lumber', 'solid', '', '', '10x10x10', 'm', 51, 'active'),
(8, 'c51ce410c124a10e0db5e4b97fc2af39', 'gggggg', 5, '', 'electrical', 'wires', 'hhhhh', '', '', '10', 'k', 1, 'active'),
(8, 'c74d97b01eae257e44aa9d5bade97baf', 'gggggg', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 'k', 1, 'active'),
(0, 'c9f0f895fb98ab9159f51fd0297e236d', '', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 'k', 0, 'active'),
(7, 'd3d9446802a44259755d38e6d163e820', 'San Miguel Corporation', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 'k', -4, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `po_no` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `ordered_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`po_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`po_no`, `supplier`, `date`, `ordered_by`, `status`) VALUES
(1, 'San Miguel Corporation', '04/10/2016', 'Santos, Anto''nio S.', 'active'),
(2, 'kalbonomics', '07/10/2016', 'Santos, Anto''nio S.', 'active'),
(3, 'coco company', '07/10/2016', 'Santos, Anto''nio S.', 'active'),
(4, 'San Miguel Corporation', '07/10/2016', 'Santos, Anto''nio S.', 'active'),
(5, '', '07/10/2016', 'Santos, Anto''nio S.', 'active'),
(6, 'coco company', '08/10/2016', 'Santos, Anto''nio S.', 'active'),
(7, 'San Miguel Corporation', '08/10/2016', 'Santos, Anto''nio S.', 'active'),
(8, 'gggggg', '08/10/2016', 'Santos, Anto''nio S.', 'active'),
(9, 'gggggg', '08/10/2016', 'Santos, Anto''nio S.', 'active'),
(11, 'kalbonomics', '10/10/2016', 'Santos, Anto''nio S.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `quote_no` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `project` varchar(100) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sales_person` varchar(100) DEFAULT NULL,
  `prepared_by` varchar(100) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  `total_amount` double(100,2) DEFAULT NULL,
  PRIMARY KEY (`quote_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quote_no`, `username`, `password`, `customer`, `project`, `date`, `address`, `phone`, `email`, `sales_person`, `prepared_by`, `status`, `total_amount`) VALUES
(1, 'ag17', 'admin', 'Tonios Heights', 'jet', '2016-08-06', '144 f.roxas st', '09276693860', 'antonio_santos17@yahoo.com', 'otie', 'Santos, Anto''nio S.', 'active', 200.00),
(2, 'bettina', 'admin', 'bets, bets', 'Condo', '2016-08-06', 'san', '09276693860', 'otieespinoza@yahoo.com', 'antero', 'Santos, Anto''nio S.', 'active', 210.00),
(17, '', '', 'tonio', 'rain', '2016-08-16', '1 P.R sotto', '', 'antonio_santos17@yahoo.com', NULL, 'Santos, Anto''nioo S.', 'active', NULL),
(18, '', '', '', '', '0000-00-00', '1 P.R sotto', '', 'antonio_santos17@yahoo.com', NULL, 'Santos, Anto''nio S.', 'active', 210.00),
(19, 'ag17', 'admin', '', '', '0000-00-00', '1 P.R sotto', '', 'antonio_santos17@yahoo.com', NULL, 'Santos, Anto''nio S.', 'active', 210.00),
(20, 'ag17', 'admin', '', '', '23/09/2016', '1 P.R sotto', '', 'antonio_santos17@yahoo.com', NULL, 'Santos, Anto''nio S.', 'active', 210.00),
(21, 'ag17', 'admin', 'Jesena, Bets R.', 'meme', '2016-10-08', '1 P.R sotto', '', 'antonio_santos17@yahoo.com', NULL, 'Santos, Anto''nio S.', 'active', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_cart`
--

CREATE TABLE IF NOT EXISTS `quotation_cart` (
  `quote_no` int(11) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `project` varchar(50) DEFAULT NULL,
  `material_no` int(11) NOT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `abbre` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_cart`
--

INSERT INTO `quotation_cart` (`quote_no`, `company`, `project`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `price`, `abbre`) VALUES
(21, 'tonio', 'jet', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 1, 200, 'k'),
(21, 'tonio', 'rain', 5, '', 'electrical', 'wires', 'hhhhh', '', '', '10', 1, 10, 'k'),
(21, 'tonio', 'rain', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 1, 0, 'k'),
(21, 'tonio', 'rain', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 1, 200, 'k'),
(21, 'tonio', 'rain', 5, '', 'electrical', 'wires', 'hhhhh', '', '', '10', 1, 10, 'k'),
(21, 'tonio', 'rain', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 1, 0, 'k'),
(21, 'tonio', 'rain', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 1, 200, 'k'),
(21, 'tonio', 'rain', 5, '', 'electrical', 'wires', 'hhhhh', '', '', '10', 1, 10, 'k'),
(21, 'tonio', 'rain', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 1, 0, 'k'),
(21, 'tonio', 'rain', 3, '', 'wood', 'lumber', 'narra', '', '', '10', 1, 200, 'k'),
(21, 'tonio', 'rain', 5, '', 'electrical', 'wires', 'hhhhh', '', '', '10', 1, 10, 'k'),
(21, 'tonio', 'rain', 8, '', 'wood', 'lumber', 'fgfg', '', '', '10', 1, 0, 'k');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE IF NOT EXISTS `sample` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` varchar(123) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`no`, `user`, `pass`, `position`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'active'),
(2, 'ag17', 'admin', 'customer', 'inactive'),
(3, 'bettina', 'admin', 'customer', 'inactive'),
(4, 'bets', 'admin', '', 'inactive'),
(7, 'ag1771', 'bettina', '', 'inactive'),
(23, 'pogi', 'pogi', 'Quantity Surveyor', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `scategory_no` int(100) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `scategory_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`scategory_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`scategory_no`, `category_name`, `scategory_name`, `status`) VALUES
(1, 'metal', 'pole', 'Active'),
(2, 'metal', 'bar', 'Active'),
(3, 'wood', 'lumber', 'Active'),
(4, 'electrical', 'lights and bulb', 'Active'),
(5, 'electrical', 'wires', 'Active'),
(6, 'metal', 'poles', 'hidden');

--
-- Triggers `subcategory`
--
DROP TRIGGER IF EXISTS `subcategory_added`;
DELIMITER //
CREATE TRIGGER `subcategory_added` AFTER INSERT ON `subcategory`
 FOR EACH ROW begin
insert into audit_trail
values
(now(), (select user from sample where status = 'active'), 'Added subcategory record');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_no` int(11) NOT NULL AUTO_INCREMENT,
  `supp_name` varchar(25) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`supplier_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_no`, `supp_name`, `phone`, `fax`, `email`, `firstname`, `middlename`, `lastname`, `contact`, `street`, `city`, `status`) VALUES
(20, 'kalbonomics', '0094343', '150000', 'kalbo', 'kalbs', '09546462845', 'kalbo@yahoo.com', 'kylee', 'san juan', 'san juan', 'active'),
(21, 'Handy Manny', '09364693975', '123876441', 'hdmxv11@bringit.net', 'Yuri', 'Gino', 'Losswell''z', '09369469975', 'Pakito', 'Pasig City', 'hidden'),
(22, 'nievashops', '7245961', '1500', 'antonio@yahoo.com', 'Anto''nio', 'santos', 'santos', '09364693975', '144 f.roxas ', 'San Juan', 'hidden'),
(23, 'San Miguel Corporation', '908098', '98098', 'otieespinoza@gmail.c', 'otie', 'marella', 'espinoza', '09364693975', 'pasig', 'pasig', 'hidden'),
(24, 'San Miguel Corporation', '09364693975', '0973878', 'otieespinoza@gmail.com', 'John Erickson ', ' ', 'Espinoza', '09364693975', 'Pasig ', 'Pasig', 'hidden'),
(25, 'ministop', '7246561', '12341', 'ministop@yahoo.com', 'antoio', 'c', 'santos', '09276693860', '144 f.roxas st', 'san juan', 'hidden'),
(26, 'coco company', '12345678901', '1234567', 'coco@gmail.com', 'rocky', ' ', 'pi', '23456789011', '13', 'pasig', 'Active'),
(27, 'Antonio', '09364693975', '09809898', 'antonio@yahoo.com', 'antoi', 'a', 'a', '0936469975', 'a', 'a', 'Active'),
(28, 'Antonio', '09364693975', '09809898', 'antonio@yahoo.com', 'era', 'a', 'a', '09364693975', 'a', 'a', 'Active'),
(29, 'gggggg', '00000', '09809898', 'otieespinoza@gmail.com', 'John Erickson ', ' ', 'Espinoza', '09364697555', 'San Juan', 'San Juan', 'Active'),
(30, 'San Miguel Corporation', '0098908', '09809898', 'otieespinoza@gmail.com', 'John-Erickson ', 'Marella', 'Espinoza', '09364693975', 'San Juan', 'San Juan', 'Active'),
(31, 'San Miguel Corporation', '0098908', '09809898', 'otieespinoza@gmail.com', 'Joshua Carmellie', 'santos', 'Vicente', '09364693975', 'San Juan', 'San Juan', 'Active'),
(32, 'San Miguel Corporation', '54545', '54454', 'otieespinoza@gmail.com', 'sannnn', 'santos', 'santos', '09364693975', 'San ', 'san juan', 'Active'),
(33, 'San Miguel Corporation', '0098908', '09809898', 'otieespinoza@gmail.com', 'John Erickson ', ' ', 'Espinoza', '09364693975', 'San Juan', 'San Juan', 'Active');

--
-- Triggers `supplier`
--
DROP TRIGGER IF EXISTS `supplier_added`;
DELIMITER //
CREATE TRIGGER `supplier_added` AFTER INSERT ON `supplier`
 FOR EACH ROW begin
insert into audit_trail
values
(now(), (select user from sample where status = 'active'), 'Added supplier record');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unitmeasurement`
--

CREATE TABLE IF NOT EXISTS `unitmeasurement` (
  `unit_no` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `unit_measurment` varchar(50) DEFAULT NULL,
  `Abbreviation` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`unit_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `unitmeasurement`
--

INSERT INTO `unitmeasurement` (`unit_no`, `category`, `type`, `unit_measurment`, `Abbreviation`, `status`) VALUES
(1, 'paint', 'Metric', 'kilogram', 'k', 'hidden'),
(2, 'electrical', 'Other', 'watt', 'w', 'active'),
(3, 'metal', 'Weight', 'gram', 'g', 'Active'),
(4, NULL, NULL, 'liters', 'L', 'Active'),
(5, NULL, NULL, 'watts', 'w', 'hidden'),
(6, NULL, NULL, 'meter', 'm', 'Active'),
(7, NULL, NULL, 'ounce', 'oz', 'Active'),
(8, NULL, NULL, 'kilo', 'K', 'Active'),
(9, NULL, NULL, 'meters', 'm', 'Active');

--
-- Triggers `unitmeasurement`
--
DROP TRIGGER IF EXISTS `unitmeasurement_added`;
DELIMITER //
CREATE TRIGGER `unitmeasurement_added` AFTER INSERT ON `unitmeasurement`
 FOR EACH ROW begin
insert into audit_trail
values
(now(), (select user from sample where status = 'active'), 'Added unit measurement record');
end
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
