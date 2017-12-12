-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 07:27 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`date`, `user`, `action`) VALUES
('2017-02-01 00:57:39', 'admin', 'Added Employee Record'),
('2017-02-01 01:01:41', 'admin', 'Added Supplier Record'),
('2017-02-01 01:01:55', 'admin', 'Restored Supplier Record'),
('2017-02-01 01:02:44', 'admin', 'Updated Supplier Record:Naga->Nagas'),
('2017-02-01 01:02:57', 'admin', 'Deleted Supplier Record'),
('2017-02-01 01:03:51', 'admin', 'Restored Supplier Record'),
('2017-02-01 01:05:37', 'admin', 'Added Position Record'),
('2017-02-01 01:05:44', 'admin', 'Added Position Record'),
('2017-02-01 01:06:07', 'admin', 'Restored Position Record'),
('2017-02-01 01:11:30', 'admin', 'Added Employee Record'),
('2017-02-01 01:13:24', 'cnieva', 'Restored Employee Record'),
('2017-02-01 01:15:23', 'cnieva', 'Restored Position Record'),
('2017-02-01 01:16:01', 'cnieva', 'Restored Position Record'),
('2017-02-01 01:16:22', 'cnieva', 'Updated Employee Record:admin->blank'),
('2017-02-01 01:27:01', 'admin', 'Restored Position Record'),
('2017-02-01 01:29:13', 'admin', 'Added Employee Record'),
('2017-02-01 01:33:43', 'admin', 'Restored Position Record'),
('2017-02-01 01:34:32', 'admin', 'Updated Employee Record:admin->blank'),
('2017-02-01 01:34:54', 'admin', 'Updated Employee Record:blank->admin'),
('2017-02-01 01:38:26', 'cnieva', 'Restored Employee Record'),
('2017-02-01 01:42:28', 'erickson', 'Updated Employee Record:blank->admin'),
('2017-02-01 01:45:12', 'cnieva', 'Added Position Record'),
('2017-02-01 01:46:02', 'cnieva', 'Added Position Record'),
('2017-02-01 01:46:23', 'cnieva', 'Added Position Record'),
('2017-02-01 01:46:32', 'cnieva', 'Added Position Record'),
('2017-02-01 01:48:09', 'cnieva', 'Added Employee Record'),
('2017-02-01 01:50:10', 'cnieva', 'Added Employee Record'),
('2017-02-01 01:51:28', 'cnieva', 'Added Employee Record'),
('2017-02-01 01:52:35', 'cnieva', 'Added Employee Record'),
('2017-02-01 01:53:04', 'cnieva', 'Deleted Employee Record'),
('2017-02-01 01:54:11', 'cnieva', 'Added Employee Record'),
('2017-02-01 01:54:29', 'cnieva', 'Added Category Record'),
('2017-02-01 01:54:35', 'cnieva', 'Added Category Record'),
('2017-02-01 01:54:47', 'cnieva', 'Updated Category Record:metal->metals'),
('2017-02-01 01:54:54', 'cnieva', 'Updated Category Record:wood->woods'),
('2017-02-01 01:55:06', 'cnieva', 'Added Subcategory Record'),
('2017-02-01 01:55:16', 'cnieva', 'Added Subcategory Record'),
('2017-02-01 01:55:23', 'cnieva', 'Added Subcategory Record'),
('2017-02-01 01:55:33', 'cnieva', 'Added Subcategory Record'),
('2017-02-01 01:55:55', 'cnieva', 'Updated Subcategory Record:pole->poles'),
('2017-02-01 01:56:09', 'cnieva', 'Deleted Subcategory Record'),
('2017-02-01 01:56:22', 'cnieva', 'Restored Subcategory Record'),
('2017-02-01 01:57:31', 'cnieva', 'Added Unit Measurement Record'),
('2017-02-01 01:57:38', 'cnieva', 'Added Unit Measurement Record'),
('2017-02-01 01:57:56', 'cnieva', 'Added Unit Measurement Record'),
('2017-02-01 01:58:05', 'cnieva', 'Updated Unit Measurement Record:m->mg'),
('2017-02-01 01:58:09', 'cnieva', 'Deleted Unit Measurement Record'),
('2017-02-01 01:58:31', 'cnieva', 'Restored Unit Measurement Record'),
('2017-02-01 01:59:29', 'cnieva', 'Added Unit Measurement Record'),
('2017-02-01 01:59:37', 'cnieva', 'Added Unit Measurement Record'),
('2017-02-01 01:59:44', 'cnieva', 'Added Unit Measurement Record'),
('2017-02-01 02:02:14', 'cnieva', 'Added Materials Record'),
('2017-02-01 02:02:33', 'cnieva', 'Added Materials Record'),
('2017-02-01 02:03:27', 'cnieva', 'Updated Material Record:blank->small'),
('2017-02-01 02:04:49', 'cnieva', 'Added Materials Record'),
('2017-02-01 02:05:18', 'cnieva', 'Added Materials Record'),
('2017-02-01 02:10:20', 'admin', 'Added Billing Record'),
('2017-02-01 02:11:23', 'admin', 'Added Billing Record'),
('2017-02-01 02:11:36', 'admin', 'Deleted Billing Record'),
('2017-02-01 02:13:31', 'admin', 'Added Billing Record'),
('2017-02-01 02:14:59', 'admin', 'Added Payment Record'),
('2017-02-01 02:15:00', 'admin', 'Updated Billing Record:300.00->blank'),
('2017-02-01 02:15:19', 'admin', 'Added Billing Record'),
('2017-02-01 02:15:49', 'admin', 'Added Payment Record'),
('2017-02-01 02:15:49', 'admin', 'Updated Billing Record:1000.00->blank'),
('2017-02-01 02:17:02', 'admin', 'Restored Materials Record'),
('2017-02-01 02:17:02', 'admin', 'Restored Materials Record'),
('2017-02-01 02:17:03', 'admin', 'Restored Materials Record'),
('2017-02-01 02:19:47', 'admin', 'Restored Materials Record'),
('2017-02-01 02:19:47', 'admin', 'Restored Materials Record'),
('2017-02-01 02:20:47', 'admin', 'Restored Materials Record'),
('2017-02-01 03:01:17', 'admin', 'Restored Materials Record'),
('2017-02-01 03:03:51', 'admin', 'Restored Materials Record'),
('2017-02-01 03:03:54', 'admin', 'Restored Materials Record'),
('2017-02-01 03:08:24', 'admin', 'Restored Materials Record'),
('2017-02-01 03:08:28', 'admin', 'Restored Materials Record'),
('2017-02-01 03:08:32', 'admin', 'Restored Materials Record'),
('2017-02-01 03:09:26', 'admin', 'Restored Materials Record'),
('2017-02-01 03:09:31', 'admin', 'Restored Materials Record'),
('2017-02-01 03:09:33', 'admin', 'Restored Materials Record'),
('2017-02-01 03:10:05', 'admin', 'Restored Materials Record'),
('2017-02-01 03:13:34', 'admin', 'Restored Employee Record'),
('2017-02-01 03:19:07', 'cnieva', 'Added Position Record'),
('2017-02-01 03:20:12', 'cnieva', 'Restored Position Record'),
('2017-02-01 03:21:00', 'cnieva', 'Added Employee Record'),
('2017-02-01 03:28:59', 'admin1', 'Added Materials Record'),
('2017-02-01 03:36:58', 'admin', 'Added Employee Record'),
('2017-02-01 03:37:22', 'admin', 'Updated Employee Record:blank-> E'),
('2017-02-01 03:37:30', 'admin', 'Deleted Employee Record'),
('2017-02-01 03:37:53', 'admin', 'Restored Employee Record'),
('2017-02-01 03:54:41', 'admin', 'Restored Employee Record'),
('2017-02-01 03:55:39', 'admin', 'Restored Employee Record'),
('2017-02-01 03:57:27', 'admin', 'Restored Materials Record'),
('2017-02-01 04:03:39', 'admin', 'Restored Materials Record'),
('2017-02-01 04:04:42', 'admin', 'Restored Materials Record'),
('2017-02-01 04:09:27', 'admin', 'Added Billing Record'),
('2017-02-01 04:09:51', 'admin', 'Added Payment Record'),
('2017-02-01 04:09:51', 'admin', 'Updated Billing Record:500.00->blank'),
('2017-02-01 05:36:42', 'admin', 'Added Supplier Record'),
('2017-02-01 05:45:20', 'admin', 'Added Position Record'),
('2017-02-01 05:46:55', 'admin', 'Added Employee Record'),
('2017-02-01 05:47:45', 'admin', 'Added Category Record'),
('2017-02-01 05:48:08', 'admin', 'Added Subcategory Record'),
('2017-02-01 05:48:41', 'admin', 'Added Unit Measurement Record'),
('2017-02-01 05:49:29', 'admin', 'Added Materials Record'),
('2017-02-01 05:53:13', 'admin', 'Added Materials Record'),
('2017-02-01 05:53:33', 'admin', 'Added Materials Record'),
('2017-02-01 05:59:15', 'admin', 'Restored Materials Record'),
('2017-02-01 05:59:16', 'admin', 'Restored Materials Record'),
('2017-02-01 05:59:16', 'admin', 'Restored Materials Record'),
('2017-02-01 05:59:16', 'admin', 'Restored Materials Record'),
('2017-02-01 06:05:36', 'admin', 'Restored Materials Record'),
('2017-02-01 06:05:37', 'admin', 'Restored Materials Record'),
('2017-02-01 06:05:37', 'admin', 'Restored Materials Record'),
('2017-02-01 06:06:47', 'admin', 'Added Billing Record'),
('2017-02-01 06:08:22', 'admin', 'Added Payment Record'),
('2017-02-01 06:08:22', 'admin', 'Updated Billing Record:500.00->blank'),
('2017-02-07 14:11:38', 'admin', 'Restored Materials Record'),
('2017-02-07 14:11:53', 'admin', 'Restored Materials Record'),
('2017-02-07 14:12:21', 'admin', 'Restored Materials Record'),
('2017-02-10 18:21:08', 'admin', 'Restored Materials Record');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_no` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `project` varchar(123) NOT NULL,
  `totalcost` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `topay` decimal(10,2) NOT NULL,
  `datee` varchar(50) NOT NULL,
  `enddate` date NOT NULL,
  `prepared` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_no`, `customer`, `project`, `totalcost`, `balance`, `topay`, `datee`, `enddate`, `prepared`, `status`) VALUES
(3, 'Doe, John .', 'Road Widening', '2620.00', '2320.00', '0.00', '2017-02-01', '0000-00-00', 'Santos, Antonio C.', 'Active'),
(4, 'Doe, John .', 'Road Widening', '2320.00', '1320.00', '0.00', '2017-02-01', '0000-00-00', 'Santos, Antonio C.', 'Active'),
(5, 'Doe, John .', 'fareal', '1500.00', '1000.00', '0.00', '2017-02-01', '0000-00-00', 'Santos, Antonio C.', 'Active'),
(6, 'Doe, John .', 'Condominium', '1040.00', '540.00', '0.00', '2017-02-01', '2017-02-23', 'Santos, Antonio C.', 'Active');

--
-- Triggers `billing`
--
DELIMITER $$
CREATE TRIGGER `bill_add` AFTER INSERT ON `billing` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Billing Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bill_update` AFTER UPDATE ON `billing` FOR EACH ROW begin
declare a varchar(2000);
if(new.status <> old.status)
then set a='Deleted Billing Record';
end if;

if(new.billing_no<>old.billing_no)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.billing_no,''), 'blank'),'->',
                  coalesce(nullif(new.billing_no,''), 'blank'),'');
                  end if;
                  
                  if(new.customer<>old.customer)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.customer,''), 'blank'),'->',
                  coalesce(nullif(new.customer,''), 'blank'),'');
                  end if;
                  
                   if(new.project<>old.project)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.project,''), 'blank'),'->',
                  coalesce(nullif(new.project,''), 'blank'),'');
                  end if;
                  
                   if(new.totalcost<>old.totalcost)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.totalcost,''), 'blank'),'->',
                  coalesce(nullif(new.totalcost,''), 'blank'),'');
                  end if;
                  
                   if(new.balance<>old.balance)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.balance,''), 'blank'),'->',
                  coalesce(nullif(new.balance,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.topay<>old.topay)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.topay,''), 'blank'),'->',
                  coalesce(nullif(new.topay,''), 'blank'),'');
                  end if;
                  
                   if(new.datee<>old.datee)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.datee,''), 'blank'),'->',
                  coalesce(nullif(new.datee,''), 'blank'),'');
                  end if;
                  
                  
                  if(new.enddate<>old.enddate)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.enddate,''), 'blank'),'->',
                  coalesce(nullif(new.enddate,''), 'blank'),'');
                  end if;
                  
                   if(new.prepared<>old.prepared)
then set a=concat('Updated Billing Record:',
                  coalesce(nullif(old.prepared,''), 'blank'),'->',
                  coalesce(nullif(new.prepared,''), 'blank'),'');
                  end if;
                  
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_no` int(11) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_no`, `category_name`, `status`) VALUES
(1, 'metals', 'Active'),
(2, 'woods', 'Active'),
(3, 'electrical', 'Active');

--
-- Triggers `category`
--
DELIMITER $$
CREATE TRIGGER `category_add` AFTER INSERT ON `category` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Category Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `category_deleted_updated` AFTER UPDATE ON `category` FOR EACH ROW begin
declare a varchar(2000);
if(new.status='active' <> old.status='inactive')
then set a='Deleted Category Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Category Record';
end if;



if(new.category_no<>old.category_no)
then set a=concat('Updated Category Record:',
                  coalesce(nullif(old.category_no,''), 'blank'),'->',
                  coalesce(nullif(new.category_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category_name<>old.category_name)
then set a=concat('Updated Category Record:',
                  coalesce(nullif(old.category_name,''), 'blank'),'->',
                  coalesce(nullif(new.category_name,''), 'blank'),'');
                  end if;
                  
                  
                  
                  
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_no` int(11) NOT NULL,
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
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_no`, `username`, `password`, `cust_type`, `comp_name`, `phone_num`, `fax`, `email`, `firstname`, `middlename`, `lastname`, `contact`, `street`, `city`, `status`) VALUES
(1, 'john', 'admin', 'Individual', NULL, '', NULL, 'johndoe@yahoo.com', 'John', '', 'Doe', '09123786658', 'Ricoa', 'Valenzuela', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE `defect` (
  `def_no` int(111) NOT NULL,
  `pullout_no` int(111) NOT NULL,
  `req_no` int(111) NOT NULL,
  `code` varchar(1111) NOT NULL,
  `customer` varchar(111) NOT NULL,
  `project` varchar(111) NOT NULL,
  `material_no` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_no` int(11) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `verified_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_no`, `supplier`, `date`, `verified_by`, `status`) VALUES
(1, 'Otie Cement1', '2017-02-01', 'Santos, Antonio C', 'active'),
(2, 'Otie Cement1', '2017-02-01', 'Santos, Antonio C', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_cart`
--

CREATE TABLE `delivery_cart` (
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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_cart`
--

INSERT INTO `delivery_cart` (`delivery_no`, `po_no`, `code`, `supplier`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(1, 1, 'b321a284f16dcfb7f148a006aea26d2e', 'Otie Cement1', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 5, 'm', 'active'),
(2, 2, '2d6a0b05c47c1a3e27d0a2f647443ae7', 'Otie Cement1', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 5, 'm', 'active'),
(2, 2, '5c8662c6ea9e520a239c37960a207b7b', 'Otie Cement1', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 5, 'm', 'active'),
(2, 2, 'fdbc06badfa5bd6ce7c4266c1031fe9a', 'Otie Cement1', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 5, 'm', 'active'),
(2, 2, '9ab3eeeca2c9a1ac4ee6064e87db644b', 'Otie Cement1', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 5, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_no` int(11) NOT NULL,
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
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_no`, `username`, `password`, `firstname`, `middlename`, `lastname`, `position`, `contact`, `email`, `street`, `city`, `status`) VALUES
(1, 'admin', 'admin', 'antonio', 'comendador', 'santos', 'Admin', '09561574211', 'antonio_santos17@yahoo.com', '144 F.Roxas', 'San Juan', 'active'),
(2, 'cnieva', 'admin', 'Christian', 'Tagulao', 'Nieva', 'admin', '09489338914', 'cnieva@gmail.com', 'Sta.Cruz', 'Manila', 'active'),
(3, 'erickson', 'admin', 'Erickson', ' ', 'Espinoza', 'Foreman', '09093354326', 'jhnrcksn@gmail.com', 'Ilaya', 'Pampanga', 'Active'),
(4, 'marianne', 'admin', 'Marianne Angelica', 'Atienza', 'Bunyi', 'Quantity Surveyor', '09235637824', 'mariannebunyi@gmail.com', 'D. Macapagal', 'Manila', 'Active'),
(5, 'carmellie', 'admin', 'Carmellie ', ' ', 'Suban', 'Secretary', '09167872845', 'cjsuban@gmail.com', 'Iris', 'Mandaluyong', 'Active'),
(6, 'lyka', 'admin', 'Lyka', ' ', 'Antero', 'Stockman', '09237658902', 'lyka_antero@yahoo.com', 'Kalentong', 'Mandaluyong', 'inactive'),
(7, 'lyka', 'admin', 'Lyka', ' ', 'Antero', 'Stockman', '09127589903', 'lyka_antero@yahoo.com', 'Kalentong', 'Mandaluyong', 'Active'),
(8, 'lawrence', 'admin', 'Jan Law''rence', ' ', 'To''lentino', 'Accountant', '09186352227', 'jnlwrnce@gmail.com', 'Theodore', 'Pasig City', 'Active'),
(9, 'admin1', 'admin', 'Admin', ' ', 'admin', 'Admin', '09124676689', 'adminme@yehey.com', 'yiy', 'yie', 'Active'),
(10, 'otie', 'otie', 'John', ' E', 'Marella', 'Quantity Surveyor', '09364693975', 'otieespinoza@gmail.com', 'san miguel', 'pasig city', 'Active'),
(11, 'caban', 'admin', 'Nieva', 'caban', 'o''neal', 'Foreman', '12345678901', 'antonio_santos@17yahoo.com', '1 gold', 'Pasig City', 'Active');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `employee_added` AFTER INSERT ON `employee` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Employee Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `employee_update` AFTER UPDATE ON `employee` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Employee Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Employee Record';
end if;


if(new.emp_no<>old.emp_no)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.emp_no,''), 'blank'),'->',
                  coalesce(nullif(new.emp_no,''), 'blank'),'');
                  end if;
                  
                  if(new.username<>old.username)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.username,''), 'blank'),'->',
                  coalesce(nullif(new.username,''), 'blank'),'');
                  end if;
                  
                   if(new.password<>old.password)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.password,''), 'blank'),'->',
                  coalesce(nullif(new.password,''), 'blank'),'');
                  end if;
                  
                  
                  
                 
                  
                  
                  if(new.email<>old.email)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.email,''), 'blank'),'->',
                  coalesce(nullif(new.email,''), 'blank'),'');
                  end if;
                  
                   if(new.firstname<>old.firstname)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.firstname,''), 'blank'),'->',
                  coalesce(nullif(new.firstname,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.middlename<>old.middlename)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.middlename,''), 'blank'),'->',
                  coalesce(nullif(new.middlename,''), 'blank'),'');
                  end if;
                  
                   if(new.lastname<>old.lastname)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.lastname,''), 'blank'),'->',
                  coalesce(nullif(new.lastname,''), 'blank'),'');
                  end if;
                  
                   if(new.contact<>old.contact)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.contact,''), 'blank'),'->',
                  coalesce(nullif(new.contact,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.street<>old.street)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.street,''), 'blank'),'->',
                  coalesce(nullif(new.street,''), 'blank'),'');
                  end if;
            
            
             if(new.city<>old.city)
then set a=concat('Updated Employee Record:',
                  coalesce(nullif(old.city,''), 'blank'),'->',
                  coalesce(nullif(new.city,''), 'blank'),'');
                  end if;
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_form`
--

CREATE TABLE `inventory_form` (
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

CREATE TABLE `materialreq` (
  `req_no` int(11) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) NOT NULL,
  `requested_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialreq`
--

INSERT INTO `materialreq` (`req_no`, `customer`, `project`, `date`, `requested_by`, `status`) VALUES
(1, 'Doe, John .', 'fareal', '01/02/2017', 'Santos, Antonio C', 'active'),
(2, 'Doe, John .', 'Condominium', '01/02/2017', 'Santos, Antonio C', 'active'),
(3, 'Doe, John .', 'Condominium', '07/02/2017', 'Santos, Antonio C', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `materialreq_cart`
--

CREATE TABLE `materialreq_cart` (
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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialreq_cart`
--

INSERT INTO `materialreq_cart` (`req_no`, `code`, `customer`, `project`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(3, '2d46f7bd000ba733dcd071f9245a05f8', 'Doe, John .', 'Condominium', 6, '', 'electrical', 'wires', 'aluminum', '', '', '100', 1, 'm', 'active'),
(2, '55e783de4345fd9ae5f370b83cef5b47', 'Doe, John .', 'Condominium', 8, '', 'woods', 'ply wood', '', '', '', '50', 0, 'm', 'active'),
(1, '9312f61cd346132f1f3d8852739952cd', 'Doe, John .', 'fareal', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 1, 'm', 'active'),
(2, 'a97ae82b5602aba3ba053fffcb6936a7', 'Doe, John .', 'Condominium', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', '', '100', 0, 'm', 'active'),
(2, 'c66f0edddecf766ec22a696558561a4c', 'Doe, John .', 'Condominium', 7, '', 'metals', 'poles', 'long', '', '', '100', 0, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `material_no` int(11) NOT NULL,
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
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`material_no`, `code`, `category`, `scategory_name`, `description`, `brand_name`, `color`, `package`, `unit_measurement`, `abbre`, `quantity`, `price`, `status`) VALUES
(5, 'mtrl1', 'metals', 'nail', 'heyya', 'mets', 'silver', 'box', '100', 'm', 5, '100.00', 'Active'),
(6, 'mtrl6', 'electrical', 'wires', 'aluminum', '', '', '', '100', 'm', 1, '150.00', 'Active'),
(7, 'mtrl7', 'metals', 'poles', 'long', '', '', '', '100', 'm', 3, '20.00', 'Active'),
(8, 'mtrl8', 'woods', 'ply wood', '', '', '', '', '50', 'm', 3, '150.00', 'Active');

--
-- Triggers `materials`
--
DELIMITER $$
CREATE TRIGGER `materials_added` AFTER INSERT ON `materials` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Materials Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `materials_update` AFTER UPDATE ON `materials` FOR EACH ROW begin
declare a varchar(2000);


if(new.status='active' <> old.status='inactive')
then set a='Deleted Materials Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Materials Record';
end if;


if(new.material_no<>old.material_no)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.material_no,''), 'blank'),'->',
                  coalesce(nullif(new.material_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category<>old.category)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.category,''), 'blank'),'->',
                  coalesce(nullif(new.category,''), 'blank'),'');
                  end if;
                  
                   if(new.scategory_name<>old.scategory_name)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.scategory_name,''), 'blank'),'->',
                  coalesce(nullif(new.scategory_name,''), 'blank'),'');
                  end if;
                  
                   if(new.description<>old.description)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.description,''), 'blank'),'->',
                  coalesce(nullif(new.description,''), 'blank'),'');
                  end if;
                  
                   if(new.brand_name<>old.brand_name)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.brand_name,''), 'blank'),'->',
                  coalesce(nullif(new.brand_name,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.color<>old.color)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.color,''), 'blank'),'->',
                  coalesce(nullif(new.color,''), 'blank'),'');
                  end if;
                  
                
                  
                  if(new.package<>old.package)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.package,''), 'blank'),'->',
                  coalesce(nullif(new.package,''), 'blank'),'');
                  end if;
                  
                   if(new.unit_measurement<>old.unit_measurement)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.unit_measurement,''), 'blank'),'->',
                  coalesce(nullif(new.unit_measurement,''), 'blank'),'');
                  end if;
                  

 if(new.abbre<>old.abbre)
then set a=concat('Updated Material Record:',
                  coalesce(nullif(old.abbre,''), 'blank'),'->',
                  coalesce(nullif(new.abbre,''), 'blank'),'');
                  end if;
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `material_requisition`
--

CREATE TABLE `material_requisition` (
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

CREATE TABLE `payment` (
  `payment_no` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `project` varchar(123) NOT NULL,
  `topay` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `chequeno` int(20) NOT NULL,
  `chequedate` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_no`, `customer`, `project`, `topay`, `amount`, `bankname`, `chequeno`, `chequedate`, `type`, `status`) VALUES
(1, 'Doe, John .', '', '300.00', '300.00', '', 0, '0000-00-00', 'Cash', 'Active'),
(2, 'Doe, John .', '', '1000.00', '1000.00', '', 0, '0000-00-00', 'Cash', 'Active'),
(3, 'Doe, John .', '', '500.00', '500.00', '', 0, '0000-00-00', 'Cash', 'Active'),
(4, 'Doe, John .', '', '500.00', '500.00', '', 0, '0000-00-00', 'Cash', 'Active');

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `payment_add` AFTER INSERT ON `payment` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Payment Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `payment_update` AFTER UPDATE ON `payment` FOR EACH ROW begin
declare a varchar(2000);
if(new.status <> old.status)
then set a='Deleted Payment Record';
end if;

if(new.payment_no<>old.payment_no)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.payment_no,''), 'blank'),'->',
                  coalesce(nullif(new.payment_no,''), 'blank'),'');
                  end if;
                  
                  if(new.customer<>old.customer)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.customer,''), 'blank'),'->',
                  coalesce(nullif(new.customer,''), 'blank'),'');
                  end if;
                  
                   if(new.amount<>old.amount)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.amount,''), 'blank'),'->',
                  coalesce(nullif(new.amount,''), 'blank'),'');
                  end if;
                  
                   if(new.bankname<>old.bankname)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.bankname,''), 'blank'),'->',
                  coalesce(nullif(new.bankname,''), 'blank'),'');
                  end if;
                  
                   if(new.chequeno<>old.chequeno)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.chequeno,''), 'blank'),'->',
                  coalesce(nullif(new.chequeno,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.topay<>old.topay)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.topay,''), 'blank'),'->',
                  coalesce(nullif(new.topay,''), 'blank'),'');
                  end if;
                  
                   if(new.chequedate<>old.chequedate)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.chequedate,''), 'blank'),'->',
                  coalesce(nullif(new.chequedate,''), 'blank'),'');
                  end if;
                  
                  
                  if(new.type<>old.type)
then set a=concat('Updated Payment Record:',
                  coalesce(nullif(old.type,''), 'blank'),'->',
                  coalesce(nullif(new.type,''), 'blank'),'');
                  end if;
                  
                  
                  
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_no` int(11) NOT NULL,
  `position_name` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_no`, `position_name`, `status`) VALUES
(1, 'Admin', 'Active'),
(2, 'Foreman', 'Active'),
(9, 'Quantity Surveyor', 'Active'),
(10, 'Secretary', 'Active'),
(11, 'Stockman', 'Active'),
(12, 'Accountant', 'Active'),
(13, 'Ehem', 'Active'),
(14, 'Foremans', 'Active');

--
-- Triggers `position`
--
DELIMITER $$
CREATE TRIGGER `position_added` AFTER INSERT ON `position` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Position Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `position_update` AFTER UPDATE ON `position` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Position Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Position Record';
end if;




if(new.position_no<>old.position_no)
then set a=concat('Updated Position Record:',
                  coalesce(nullif(old.position_no,''), 'blank'),'->',
                  coalesce(nullif(new.position_no,''), 'blank'),'');
                  end if;
                  
                  if(new.position_name<>old.position_name)
then set a=concat('Updated Position Record:',
                  coalesce(nullif(old.position_name,''), 'blank'),'->',
                  coalesce(nullif(new.position_name,''), 'blank'),'');
                  end if;
                  
                  
                  
               
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pullout`
--

CREATE TABLE `pullout` (
  `pullout_no` int(11) NOT NULL,
  `customer` varchar(123) NOT NULL,
  `project` varchar(123) NOT NULL,
  `date` varchar(123) DEFAULT NULL,
  `accepted_by` varchar(123) NOT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pullout`
--

INSERT INTO `pullout` (`pullout_no`, `customer`, `project`, `date`, `accepted_by`, `status`) VALUES
(1, 'Doe, John .', 'fareal', '2017-02-01', 'Santos, Antonio C', 'active'),
(2, 'Doe, John .', 'Condominium', '2017-02-01', 'Santos, Antonio C', 'active'),
(3, 'Doe, John .', 'Condominium', '2017-02-07', 'Santos, Antonio C', 'active'),
(4, 'Doe, John .', 'Condominium', '2017-02-10', 'Santos, Antonio C', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pullout_cart`
--

CREATE TABLE `pullout_cart` (
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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pullout_cart`
--

INSERT INTO `pullout_cart` (`pullout_no`, `req_no`, `code`, `customer`, `project`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `abbre`, `status`) VALUES
(1, 1, '0638fc039c98a2d90e3414cabbe171b3', 'Doe, John .', 'fareal', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 4, 'm', 'active'),
(2, 2, '351e52cf533540975d33c1762aae6694', 'Doe, John .', 'Condominium', 7, '', 'metals', 'poles', 'long', '', '', '100', 2, 'm', 'active'),
(2, 2, '48f4e333ec7bcbdd4a0abf45af429437', 'Doe, John .', 'Condominium', 8, '', 'woods', 'ply wood', '', '', '', '50', 2, 'm', 'active'),
(4, 3, '749f88508fa2044990a629edbeb64796', 'Doe, John .', 'Condominium', 6, '', 'electrical', 'wires', 'aluminum', '', '', '100', 1, 'm', 'active'),
(3, 3, 'c135eed170fda1a6e6f273f9ce508122', 'Doe, John .', 'Condominium', 6, '', 'electrical', 'wires', 'aluminum', '', '', '100', 3, 'm', 'active'),
(2, 2, 'c7a425f5b1257a058200d77d4a587b1a', 'Doe, John .', 'Condominium', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', '', '100', 2, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pull_out_form`
--

CREATE TABLE `pull_out_form` (
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

CREATE TABLE `purchase_cart` (
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
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_cart`
--

INSERT INTO `purchase_cart` (`po_no`, `code`, `supplier`, `material_no`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `abbre`, `quantity`, `status`) VALUES
(2, '09a2d1e1aec9aee0352a13e3eda84895', '1', 8, '', 'woods', 'ply wood', '', '', 'box', '50', 'm', 5, 'active'),
(2, '4af97ceed7071d0bae0f3e6dc6e5bd11', '1', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 'm', 5, 'active'),
(2, '69f66b85404bed4680be69b8e8b57700', '1', 6, '', 'electrical', 'wires', 'aluminum', '', 'box', '100', 'm', 5, 'active'),
(1, '8b11c545a802b4c508c2943ff7c8849b', '1', 5, 'mets', 'metals', 'nail', 'heyya', 'silver', 'box', '100', 'm', 5, 'active'),
(2, 'ece9f3d3e39d7b0d37d176198307543c', '1', 7, '', 'metals', 'poles', 'long', '', 'box', '100', 'm', 5, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `po_no` int(11) NOT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `ordered_by` varchar(50) DEFAULT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`po_no`, `supplier`, `date`, `ordered_by`, `status`) VALUES
(1, 'Otie Cement1', '01/02/2017', 'Santos, Antonio C', 'active'),
(2, 'Otie Cement1', '01/02/2017', 'Santos, Antonio C', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quote_no` int(11) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `project` varchar(100) DEFAULT NULL,
  `date` varchar(123) DEFAULT NULL,
  `due_date` varchar(123) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sales_person` varchar(100) DEFAULT NULL,
  `prepared_by` varchar(100) DEFAULT NULL,
  `status` varchar(123) NOT NULL,
  `total_amount` double(100,2) DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quote_no`, `username`, `password`, `customer`, `project`, `date`, `due_date`, `address`, `phone`, `email`, `sales_person`, `prepared_by`, `status`, `total_amount`, `balance`) VALUES
(1, 'john', 'admin', 'Doe, John .', 'fareal', '2017-02-01', '2017-01-21', 'Ricoa', '', 'johndoe@yahoo.com', NULL, 'Santos, Antonio C', 'active', 1500.00, '1000.00'),
(2, 'john', 'admin', 'Doe, John .', 'Condominium', '2017-02-01', '2017-02-23', 'Ricoa', '', 'johndoe@yahoo.com', NULL, 'Santos, Antonio C', 'active', 150.00, '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_cart`
--

CREATE TABLE `quotation_cart` (
  `quote_no` int(11) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `project` varchar(50) DEFAULT NULL,
  `material_no` int(11) NOT NULL,
  `code` varchar(123) NOT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `scategory_name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `unit_measurement` varchar(50) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `quantity_remaining` int(123) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `abbre` varchar(11) NOT NULL,
  `status` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation_cart`
--

INSERT INTO `quotation_cart` (`quote_no`, `company`, `project`, `material_no`, `code`, `brand_name`, `category`, `scategory_name`, `description`, `color`, `package`, `unit_measurement`, `quantity`, `quantity_remaining`, `price`, `abbre`, `status`) VALUES
(2, 'Doe, John .', 'Condominium', 7, '07bd9ad622ebfc020cdc8c83fd9c048f', '', 'metals', 'poles', 'long', '', '', '100', 2, 3, 20, 'm', 'active'),
(2, 'Doe, John .', 'Condominium', 5, '1a0f7df48b464edffa43d2e12788a7f1', 'mets', 'metals', 'nail', 'heyya', 'silver', '', '100', 4, 1, 100, 'm', 'active'),
(3, 'Doe, John .', 'Condominium', 6, '8b82d85f60e1ce5ba2984e4fca9acfd0', '', 'electrical', 'wires', 'aluminum', '', '', '100', 1, 0, 150, 'm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `no` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` varchar(123) NOT NULL,
  `account_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`no`, `user`, `pass`, `position`, `status`, `account_status`) VALUES
(1, 'admin', 'admin', 'admin', 'inactive', 'active'),
(2, 'cnieva', 'admin', 'admin', 'inactive', 'active'),
(3, 'erickson', 'admin', 'Foreman', 'inactive', 'active'),
(4, 'marianne', 'admin', 'Quantity Surveyor', 'inactive', 'Active'),
(5, 'carmellie', 'admin', 'Secretary', 'inactive', 'Active'),
(6, 'lyka', 'admin', 'Stockman', 'inactive', 'inactive'),
(8, 'lawrence', 'admin', 'Accountant', 'inactive', 'Active'),
(9, 'john', 'admin', 'customer', 'inactive', 'active'),
(10, 'admin1', 'admin', 'Admin', 'inactive', 'Active'),
(11, 'otie', 'otie', 'Quantity Surveyor', 'inactive', 'Active'),
(12, 'caban', 'admin', 'Foreman', 'inactive', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `scategory_no` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `scategory_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`scategory_no`, `category_name`, `scategory_name`, `status`) VALUES
(1, 'metals', 'trusses', 'Active'),
(2, 'woods', 'ply wood', 'Active'),
(3, 'metals', 'nail', 'Active'),
(4, 'metals', 'poles', 'active'),
(5, 'electrical', 'wires', 'Active');

--
-- Triggers `subcategory`
--
DELIMITER $$
CREATE TRIGGER `subcategory_added` AFTER INSERT ON `subcategory` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Subcategory Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `subcategory_update` AFTER UPDATE ON `subcategory` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Subcategory Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Subcategory Record';
end if;




if(new.scategory_no<>old.scategory_no)
then set a=concat('Updated Subcategory Record:',
                  coalesce(nullif(old.scategory_no,''), 'blank'),'->',
                  coalesce(nullif(new.scategory_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category_name<>old.category_name)
then set a=concat('Updated Subcategory Record:',
                  coalesce(nullif(old.category_name,''), 'blank'),'->',
                  coalesce(nullif(new.category_name,''), 'blank'),'');
                  end if;
                  
                   if(new.scategory_name<>old.scategory_name)
then set a=concat('Updated Subcategory Record:',
                  coalesce(nullif(old.scategory_name,''), 'blank'),'->',
                  coalesce(nullif(new.scategory_name,''), 'blank'),'');
                  end if;
                  
               
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_no` int(11) NOT NULL,
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
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_no`, `supp_name`, `phone`, `fax`, `email`, `firstname`, `middlename`, `lastname`, `contact`, `street`, `city`, `status`) VALUES
(1, 'Otie Cement1', '5456261', '', 'otieespinoza1@gmail.com', 'Ericksone', 'Johne', 'Doey', '09236873123', 'Mahayahayie', 'Nagas', 'active'),
(2, 'fareal', '7245961', '1234567891', 'antonio_santos17@yahoo.com', 'o''neal', 'harts', 'suban', '09353791848', '183f dr.Pilapil st, ', 'San juan', 'Active');

--
-- Triggers `supplier`
--
DELIMITER $$
CREATE TRIGGER `supplier_added` AFTER INSERT ON `supplier` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Supplier Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `supplier_update` AFTER UPDATE ON `supplier` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Supplier Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Supplier Record';
end if;



if(new.supplier_no<>old.supplier_no)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.supplier_no,''), 'blank'),'->',
                  coalesce(nullif(new.supplier_no,''), 'blank'),'');
                  end if;
                  
                
                   if(new.supp_name<>old.supp_name)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.supp_name,''), 'blank'),'->',
                  coalesce(nullif(new.supp_name,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.phone<>old.phone)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.phone,''), 'blank'),'->',
                  coalesce(nullif(new.phone,''), 'blank'),'');
                  end if;
                  
                   if(new.fax<>old.fax)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.fax,''), 'blank'),'->',
                  coalesce(nullif(new.fax,''), 'blank'),'');
                  end if;
                  
                  
                  if(new.email<>old.email)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.email,''), 'blank'),'->',
                  coalesce(nullif(new.email,''), 'blank'),'');
                  end if;
                  
                   if(new.firstname<>old.firstname)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.firstname,''), 'blank'),'->',
                  coalesce(nullif(new.firstname,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.middlename<>old.middlename)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.middlename,''), 'blank'),'->',
                  coalesce(nullif(new.middlename,''), 'blank'),'');
                  end if;
                  
                   if(new.lastname<>old.lastname)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.lastname,''), 'blank'),'->',
                  coalesce(nullif(new.lastname,''), 'blank'),'');
                  end if;
                  
                   if(new.contact<>old.contact)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.contact,''), 'blank'),'->',
                  coalesce(nullif(new.contact,''), 'blank'),'');
                  end if;
                  
                  
                   if(new.street<>old.street)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.street,''), 'blank'),'->',
                  coalesce(nullif(new.street,''), 'blank'),'');
                  end if;
            
            
             if(new.city<>old.city)
then set a=concat('Updated Supplier Record:',
                  coalesce(nullif(old.city,''), 'blank'),'->',
                  coalesce(nullif(new.city,''), 'blank'),'');
                  end if;
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `unitmeasurement`
--

CREATE TABLE `unitmeasurement` (
  `unit_no` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `unit_measurment` varchar(50) DEFAULT NULL,
  `Abbreviation` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitmeasurement`
--

INSERT INTO `unitmeasurement` (`unit_no`, `category`, `type`, `unit_measurment`, `Abbreviation`, `status`) VALUES
(1, NULL, NULL, 'kilogram', 'kg', 'Active'),
(2, NULL, NULL, 'gram', 'g', 'Active'),
(3, NULL, NULL, 'milligram', 'mg', 'active'),
(4, NULL, NULL, 'inch', 'in', 'Active'),
(5, NULL, NULL, 'centimeter', 'cm', 'Active'),
(6, NULL, NULL, 'meter', 'm', 'Active'),
(7, NULL, NULL, 'liters', 'L', 'Active');

--
-- Triggers `unitmeasurement`
--
DELIMITER $$
CREATE TRIGGER `unitmeasurement_added` AFTER INSERT ON `unitmeasurement` FOR EACH ROW begin
insert into audit_trail
(date, user, action)
values
(now(), (select user from sample where status='active'),'Added Unit Measurement Record');
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `unitmeasurement_update` AFTER UPDATE ON `unitmeasurement` FOR EACH ROW begin
declare a varchar(2000);

if(new.status='active' <> old.status='inactive')
then set a='Deleted Unit Measurement Record';
end if;

if(new.status='inactive'<>old.status='active')
then set a='Restored Unit Measurement Record';
end if;


if(new.unit_no<>old.unit_no)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.unit_no,''), 'blank'),'->',
                  coalesce(nullif(new.unit_no,''), 'blank'),'');
                  end if;
                  
                  if(new.category<>old.category)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.category,''), 'blank'),'->',
                  coalesce(nullif(new.category,''), 'blank'),'');
                  end if;
                  
                   if(new.type<>old.type)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.type,''), 'blank'),'->',
                  coalesce(nullif(new.type,''), 'blank'),'');
                  end if;
                  
                   if(new.unit_measurment<>old.unit_measurment)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.unit_measurment,''), 'blank'),'->',
                  coalesce(nullif(new.unit_measurment,''), 'blank'),'');
                  end if;
                  
                   if(new.Abbreviation<>old.Abbreviation)
then set a=concat('Updated Unit Measurement Record:',
                  coalesce(nullif(old.Abbreviation,''), 'blank'),'->',
                  coalesce(nullif(new.Abbreviation,''), 'blank'),'');
                  end if;
                  
                  
                  
                  
            
                  
                 insert into audit_trail
                 values
                 (now(),(select user from sample where status='active'),a);
                 end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_no`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_no`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_no`);

--
-- Indexes for table `delivery_cart`
--
ALTER TABLE `delivery_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_no`);

--
-- Indexes for table `materialreq`
--
ALTER TABLE `materialreq`
  ADD PRIMARY KEY (`req_no`);

--
-- Indexes for table `materialreq_cart`
--
ALTER TABLE `materialreq_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_no`),
  ADD UNIQUE KEY `product_code` (`code`),
  ADD UNIQUE KEY `product_code_2` (`code`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_no`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_no`);

--
-- Indexes for table `pullout`
--
ALTER TABLE `pullout`
  ADD PRIMARY KEY (`pullout_no`);

--
-- Indexes for table `pullout_cart`
--
ALTER TABLE `pullout_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `purchase_cart`
--
ALTER TABLE `purchase_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`po_no`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quote_no`);

--
-- Indexes for table `quotation_cart`
--
ALTER TABLE `quotation_cart`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`scategory_no`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_no`);

--
-- Indexes for table `unitmeasurement`
--
ALTER TABLE `unitmeasurement`
  ADD PRIMARY KEY (`unit_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `materialreq`
--
ALTER TABLE `materialreq`
  MODIFY `req_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `material_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pullout`
--
ALTER TABLE `pullout`
  MODIFY `pullout_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `po_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quote_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `scategory_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unitmeasurement`
--
ALTER TABLE `unitmeasurement`
  MODIFY `unit_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
