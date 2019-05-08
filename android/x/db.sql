/*
SQLyog Ultimate v8.53 
MySQL - 5.7.17 : Database - oors_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`oors_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `oors_db`;

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `adminid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin_table` */

/*Table structure for table `customer_table` */

DROP TABLE IF EXISTS `customer_table`;

CREATE TABLE `customer_table` (
  `customerid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `contactnumber` varchar(60) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `emailaddress` varchar(60) DEFAULT NULL,
  `facebookprofileaddress` varchar(200) DEFAULT NULL,
  `isbogus` tinyint(1) DEFAULT '0',
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `customer_table` */

/*Table structure for table `dress_table` */

DROP TABLE IF EXISTS `dress_table`;

CREATE TABLE `dress_table` (
  `dressid` int(6) NOT NULL AUTO_INCREMENT,
  `dressname` varchar(100) DEFAULT NULL,
  `dresstypeid` int(6) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `imagelocation` varchar(200) DEFAULT NULL,
  `dressdescription` text,
  `stocks` int(6) DEFAULT NULL,
  `downpaymentamount` double DEFAULT NULL,
  PRIMARY KEY (`dressid`),
  KEY `FK_dress_table` (`dresstypeid`),
  CONSTRAINT `FK_dress_table` FOREIGN KEY (`dresstypeid`) REFERENCES `dress_type_table` (`dresstypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `dress_table` */

/*Table structure for table `dress_type_table` */

DROP TABLE IF EXISTS `dress_type_table`;

CREATE TABLE `dress_type_table` (
  `dresstypeid` int(6) NOT NULL AUTO_INCREMENT,
  `dresstypename` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`dresstypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `dress_type_table` */

/*Table structure for table `order_cart_item_table` */

DROP TABLE IF EXISTS `order_cart_item_table`;

CREATE TABLE `order_cart_item_table` (
  `ordercartitemid` int(6) NOT NULL AUTO_INCREMENT,
  `orderid` int(6) DEFAULT NULL,
  `dressid` int(6) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  PRIMARY KEY (`ordercartitemid`),
  KEY `FK_order_cart_item_table` (`orderid`),
  KEY `FK_order_cart_item_table1` (`dressid`),
  CONSTRAINT `FK_order_cart_item_table` FOREIGN KEY (`orderid`) REFERENCES `order_table` (`orderid`),
  CONSTRAINT `FK_order_cart_item_table1` FOREIGN KEY (`dressid`) REFERENCES `dress_table` (`dressid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `order_cart_item_table` */

/*Table structure for table `order_table` */

DROP TABLE IF EXISTS `order_table`;

CREATE TABLE `order_table` (
  `orderid` int(6) NOT NULL AUTO_INCREMENT,
  `customerid` int(6) DEFAULT NULL,
  `dateoforder` date DEFAULT NULL,
  `dateofpickup` date DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  `totalpayment` double DEFAULT NULL,
  PRIMARY KEY (`orderid`),
  KEY `FK_order_table1` (`customerid`),
  KEY `FK_order_table2` (`adminid`),
  CONSTRAINT `FK_order_table1` FOREIGN KEY (`customerid`) REFERENCES `customer_table` (`customerid`),
  CONSTRAINT `FK_order_table2` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `order_table` */

/*Table structure for table `reservation_cart_item_table` */

DROP TABLE IF EXISTS `reservation_cart_item_table`;

CREATE TABLE `reservation_cart_item_table` (
  `reservationcartitemid` int(6) NOT NULL AUTO_INCREMENT,
  `reservationid` int(6) DEFAULT NULL,
  `dressid` int(6) DEFAULT NULL,
  `quantity` int(4) DEFAULT NULL,
  PRIMARY KEY (`reservationcartitemid`),
  KEY `FK_cart_item_table` (`reservationid`),
  KEY `FK_cart_item_table1` (`dressid`),
  CONSTRAINT `FK_cart_item_table` FOREIGN KEY (`reservationid`) REFERENCES `reservation_table` (`reservationid`),
  CONSTRAINT `FK_cart_item_table1` FOREIGN KEY (`dressid`) REFERENCES `dress_table` (`dressid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reservation_cart_item_table` */

/*Table structure for table `reservation_table` */

DROP TABLE IF EXISTS `reservation_table`;

CREATE TABLE `reservation_table` (
  `reservationid` int(6) NOT NULL AUTO_INCREMENT,
  `customerid` int(6) DEFAULT NULL,
  `dateofreservation` date DEFAULT NULL,
  `dateofpickup` date DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `downpaymentamount` double DEFAULT NULL,
  `deadlineofdownpayment` date DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  `totalpayment` double DEFAULT NULL,
  PRIMARY KEY (`reservationid`),
  KEY `FK_reservation_table` (`customerid`),
  KEY `FK_reservation_table1` (`adminid`),
  CONSTRAINT `FK_reservation_table` FOREIGN KEY (`customerid`) REFERENCES `customer_table` (`customerid`),
  CONSTRAINT `FK_reservation_table1` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reservation_table` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
