/*
SQLyog Ultimate v8.53 
MySQL - 5.7.17 : Database - tam_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tam_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tam_db`;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `admin_table` */

insert  into `admin_table`(`adminid`,`firstname`,`middlename`,`lastname`,`username`,`password`) values (1,'Jarons1','Cordells1','Jocsons1','admin','21232f297a57a5a743894a0e4a801fc3'),(2,'Molly','Shayna',' Monton','molly','ed6658e6f22583ed66fb5e5e735b9e63'),(3,'Rogen','Ken','Flores','ken','f632fa6f8c3d5f551c5df867588381ab');

/*Table structure for table `cart_item_table` */

DROP TABLE IF EXISTS `cart_item_table`;

CREATE TABLE `cart_item_table` (
  `cartitemid` int(6) NOT NULL AUTO_INCREMENT,
  `orderid` int(6) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `menuitemid` int(6) DEFAULT NULL,
  PRIMARY KEY (`cartitemid`),
  KEY `FK_cart_item_table1` (`menuitemid`),
  KEY `FK_cart_item_table` (`orderid`),
  CONSTRAINT `FK_cart_item_table` FOREIGN KEY (`orderid`) REFERENCES `order_table` (`orderid`) ON DELETE SET NULL,
  CONSTRAINT `FK_cart_item_table1` FOREIGN KEY (`menuitemid`) REFERENCES `menu_item_table` (`menuitemid`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

/*Data for the table `cart_item_table` */

insert  into `cart_item_table`(`cartitemid`,`orderid`,`quantity`,`menuitemid`) values (1,NULL,1,1),(2,NULL,1,49),(3,NULL,1,60),(4,2,1,39),(5,2,1,49),(6,3,1,39),(7,3,1,49),(8,4,1,52),(9,4,1,128),(10,4,1,176),(11,5,1,52),(12,5,1,128),(13,5,1,176),(14,6,1,52),(15,6,1,128),(16,6,1,176),(17,7,1,61),(18,8,1,1),(19,9,2,53),(20,10,1,49),(21,10,1,164),(22,10,1,175),(23,NULL,2,148),(24,NULL,1,89),(25,NULL,1,171),(26,NULL,1,30),(27,NULL,1,179),(28,NULL,1,53),(29,NULL,1,59),(30,NULL,1,120),(31,NULL,1,180),(32,NULL,1,183),(33,NULL,1,38),(34,NULL,2,40),(35,NULL,1,58),(36,NULL,1,4),(37,NULL,1,94),(38,NULL,3,157),(39,NULL,1,121),(40,NULL,1,172),(41,NULL,1,37),(42,NULL,1,92),(43,NULL,1,60),(44,NULL,1,107),(45,NULL,1,47),(46,NULL,1,113),(47,NULL,1,163),(48,NULL,1,48),(49,NULL,1,109),(50,NULL,1,178),(51,NULL,1,129),(52,NULL,1,44),(53,NULL,1,181),(54,NULL,1,187),(55,NULL,1,186),(56,11,1,4),(57,12,1,117),(58,12,1,137),(59,12,1,104),(60,12,2,96),(61,12,1,176),(62,12,1,103),(63,12,1,114),(64,12,1,41),(65,12,1,165),(66,12,1,166),(67,12,1,187),(68,13,1,95),(69,13,1,91),(70,13,1,89),(71,13,2,64),(72,13,1,166),(73,13,1,86),(74,13,1,68),(75,13,1,38),(76,13,1,149),(77,13,1,130),(78,13,1,31),(79,13,1,85),(80,13,1,27),(81,13,1,59),(82,13,1,25),(83,13,1,150),(84,13,1,78),(85,13,1,11),(86,13,1,129),(87,13,2,138),(88,13,1,156),(89,13,1,159),(90,13,1,128),(91,13,4,187),(92,13,1,122),(93,13,1,108),(94,13,1,181),(95,13,1,174),(96,13,1,186);

/*Table structure for table `customer_table` */

DROP TABLE IF EXISTS `customer_table`;

CREATE TABLE `customer_table` (
  `customerid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `emailaddress` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `customer_table` */

insert  into `customer_table`(`customerid`,`firstname`,`middlename`,`lastname`,`gender`,`birthday`,`status`,`address`,`emailaddress`,`username`,`password`) values (3,'Benigna','Florida','Bailey','Male','1996-06-22','Single','Tower 1 1226 Ayala Avenue Ayala Triangle 1226','benigna@yahoo.com','benigna','d670799b6828b4e77edc5428853c0c96'),(6,'Rex1','Para','Sagolili','Male','1998-12-12','Single','Di makita Street Isulan','alyasrex@yahoo.com','rex','6b4023d367b91c97f19597c4069337d3'),(7,'fn','mn','ln','Male','2017-12-31','Female','asdasdasd','50asdasd@yaoo.com','asdasdasd','67117df1e2ca460c52084ca261aa85e8'),(8,'Mavie','B','Taypin','Female','1997-12-12','Female','Isulan Street','mavietaypin@gmail.com','mavie','5219951d5c78fc76426c812baada6867'),(9,'Janken','Alberto','Sabado','Male','1998-12-12','Single','Address St.','janken@gmail.com','janken','2696f89aa47e3b51f5ef7cd4fe96d56a');

/*Table structure for table `employee_table` */

DROP TABLE IF EXISTS `employee_table`;

CREATE TABLE `employee_table` (
  `employeeid` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) DEFAULT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `jobposition` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `employee_table` */

insert  into `employee_table`(`employeeid`,`firstname`,`middlename`,`lastname`,`username`,`password`,`jobposition`) values (1,'Jerardo','Anibal','Montecillo','cashier','6ac2470ed8ccf204fd5ff89b32a355cf','Cashier'),(2,' Kieran1','Elias1','Barrameda1','cook','e3e90fd6d2a7c4661a1a3acf2f60bc6d','Cook'),(3,'Ivan','Rayniel','Paclibar','ivan','2c42e5cf1cdbafea04ed267018ef1511','Cook');

/*Table structure for table `menu_category_table` */

DROP TABLE IF EXISTS `menu_category_table`;

CREATE TABLE `menu_category_table` (
  `menucategoryid` int(6) NOT NULL AUTO_INCREMENT,
  `menucategoryname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`menucategoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `menu_category_table` */

insert  into `menu_category_table`(`menucategoryid`,`menucategoryname`) values (1,'Short Order'),(2,'Single Serving'),(3,'Sandwiches'),(4,'bilao'),(5,'By Order'),(6,'Coolers'),(7,'Fruit Shakes'),(8,'Drinks'),(9,'Cakes and Pastries'),(10,'Delicacies');

/*Table structure for table `menu_item_table` */

DROP TABLE IF EXISTS `menu_item_table`;

CREATE TABLE `menu_item_table` (
  `menuitemid` int(6) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(60) DEFAULT NULL,
  `menucategoryid` int(6) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menuitemid`),
  KEY `FK_menu_item_table` (`menucategoryid`),
  CONSTRAINT `FK_menu_item_table` FOREIGN KEY (`menucategoryid`) REFERENCES `menu_category_table` (`menucategoryid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;

/*Data for the table `menu_item_table` */

insert  into `menu_item_table`(`menuitemid`,`menuname`,`menucategoryid`,`price`,`unit`) values (1,'Lomi Chicken',1,130,'aaa'),(2,'Lomi Pork',1,130,NULL),(3,'Lomi Seafood',1,150,NULL),(4,'Bam-e Chicken',1,160,NULL),(5,'Bam-e Pork',1,160,NULL),(6,'Bam-e Seafood',1,175,NULL),(7,'Bihon Chicken',1,130,NULL),(8,'Bihon Pork',1,130,NULL),(9,'Bihon Seafood',1,150,NULL),(10,'Pancit Canton Chicken',1,130,NULL),(11,'Pancit Canton  Pork',1,130,NULL),(14,'Pancit Canton  Seafood',1,150,NULL),(15,'Sotanghon Chicken',1,145,NULL),(16,'Sotanghon Pork',1,145,NULL),(17,'Sotanghon Seafood',1,160,NULL),(18,'Chopsuey Chicken',1,160,NULL),(19,'Chopsuey Pork',1,160,NULL),(20,'Chopsuey Seafood',1,175,NULL),(21,'Garlic Chicken',1,175,NULL),(22,'Fried Chicken',1,175,NULL),(23,'Battered Chicken',1,175,NULL),(25,'Sigang na Pasayan',1,175,NULL),(26,'Sigang na Pasayan',1,175,NULL),(27,'Sigang na Pasayan',1,175,NULL),(29,'Sigang na Pasayan',1,160,NULL),(30,'Sigang na Isda',1,175,NULL),(31,'Lengua',1,195,NULL),(32,'Kare-Kare',1,195,NULL),(33,'Beef Steak',1,195,NULL),(34,'Tinola na Manok',1,175,NULL),(35,'Fresh Pancit Chicken',1,130,NULL),(37,'Fresh Pancit Pork',1,130,NULL),(38,'Fresh Pancit Seafood',1,150,NULL),(39,'Molo Pork',2,45,NULL),(40,'5 pcs. Shanghai Pork',2,40,NULL),(41,'Palabok Pork',2,45,NULL),(42,'Spaghetti Beef',2,45,NULL),(43,'Baked Spaghetti serving Beef ',2,50,NULL),(44,'French Fries',2,25,NULL),(45,'Macaroni Salad serving',2,40,NULL),(46,'Batchoy Pork',2,45,NULL),(47,'Cheeze Roll ( 5 pcs)',2,35,NULL),(48,'Cheese Burger ',3,45,NULL),(49,'Cheese Burger with egg',3,55,NULL),(50,'Ham & Cheese Burger',3,45,NULL),(51,'Ham & Cheese Burger with egg',3,55,NULL),(52,'Clubhouse Sandwich ham',3,78,NULL),(53,'Clubhouse Sandwich beef',3,78,NULL),(54,'Toasted Bread (1 whole)',3,50,NULL),(55,'Toasted Bread (1/2)',3,25,NULL),(56,'Toasted Bread w/ Butter & Sugar (1 whole)',3,60,NULL),(57,'Toasted Bread w/ Butter & Sugar (1/2)',3,30,NULL),(58,'Chicken Sandwich',3,45,NULL),(59,'Tuna Sandwich',3,45,NULL),(60,'Bihon Chicken Small',4,520,NULL),(61,'Bihon Chicken Large',4,620,NULL),(62,'Bihon Pork Small',4,520,NULL),(63,'Bihon Pork Large',4,620,NULL),(64,'Bihon Seafood Small',4,555,NULL),(65,'Bihon Seafood Large',4,690,NULL),(66,'Pancit Canton Chicken Small',4,520,NULL),(67,'Pancit Canton Chicken Large',4,620,NULL),(68,'Pancit Canton  Pork Small',4,520,NULL),(69,'Pancit Canton  Pork  Large',4,620,NULL),(70,'Pancit Canton  Seafood Large',4,690,NULL),(71,'Pancit Canton  Seafood Small',4,555,NULL),(72,'Bam-e Chicken Small',4,690,NULL),(73,'Bam-e Chicken Large',4,780,NULL),(74,'Bam-e Pork Large',4,780,NULL),(75,'Bam-e Pork Small',4,690,NULL),(76,'Bam-e Seafood Small',4,700,NULL),(77,'Bam-e Seafood Large',4,800,NULL),(78,'Sotanghon Chicken Small',4,590,NULL),(79,'Sotanghon Chicken  Large',4,650,NULL),(80,'Sotanghon Pork Small',4,590,NULL),(81,'Sotanghon Seafood Small',4,670,NULL),(82,'Sotanghon Seafood Large',4,790,NULL),(83,'Palabok Pork  Small',4,420,NULL),(84,'Palabok Pork Large',4,620,NULL),(85,'Spaghetti Beef Small',4,420,NULL),(86,'Spaghetti Beef Large',4,620,NULL),(87,'Baked Spaghetti  (Tray) ',4,560,NULL),(88,'Macaroni Salad (Caterpan)',4,900,NULL),(89,'Fresh Pancit Pork Small',4,520,NULL),(90,'Fresh Pancit Pork Large',4,620,NULL),(91,'Fresh Pancit Chicken Small',4,520,NULL),(92,'Fresh Pancit Chicken Large',4,620,NULL),(93,'Chocolate Ganache',5,475,NULL),(94,'Vanilla Marble Fudge',5,575,NULL),(95,'Caramel Moist',5,525,'Good for 2 servings'),(96,'Crema de Fruta Small',5,225,NULL),(97,'Crema de Fruta Medium',5,365,NULL),(98,'Crema de Fruta Big',5,465,NULL),(99,'Ube Cake',5,475,NULL),(100,'Mocha Cake',5,475,NULL),(101,'Pandan Cake',5,475,NULL),(102,'Yema Cake',5,550,NULL),(103,'Strawberry',6,40,NULL),(104,'Sweet Corn',6,40,NULL),(105,'Vanilla',6,40,NULL),(106,'Pandan',6,40,NULL),(107,'Mocha',6,40,NULL),(108,'Melon',6,40,NULL),(109,'Cappucino',6,40,NULL),(110,'Ube',6,40,NULL),(111,'Chocolate',6,40,NULL),(112,'Halo-Halo Special',6,50,NULL),(113,'Guya-Calamansi Juice',6,30,NULL),(114,'Guya-Berry Juice  ',6,30,NULL),(115,'Calamansi Juice',6,30,NULL),(116,'Passion Fruit Juice',6,30,NULL),(117,'Mango',7,40,NULL),(118,'Carrot-Mango',7,45,NULL),(119,'Avocado',7,38,NULL),(120,'Guyabano',7,38,NULL),(121,'Black Gulaman',8,20,NULL),(122,'Ice Tea',8,25,NULL),(123,'Blue Lemonade',8,25,NULL),(124,'Pink Lemonade',8,25,NULL),(125,'8oz Coke',8,12,NULL),(126,'8oz  Sprite',8,12,NULL),(127,'8oz  Royal',8,12,NULL),(128,'12oz Coke',8,15,NULL),(129,'12oz Sprite',8,15,NULL),(130,'12oz Royal',8,15,NULL),(131,'Liter Coke',8,32,NULL),(132,'Liter Royal',8,32,NULL),(133,'Liter Sprite',8,32,NULL),(134,'1.5 Liters Coke',8,50,NULL),(135,'1.5 Liters Royal',8,50,NULL),(136,'1.5 Liters  Sprite',8,50,NULL),(137,'Mineral Water Small',8,12,NULL),(138,'Mineral Water Big (500 ml)',8,17,NULL),(139,'Chuckie',8,27,NULL),(140,'Chocolate Moist (8\"x12\")',9,435,NULL),(141,'Chocolate Moist Per Slice',9,30,NULL),(142,'Mango Cake (9\" dia.)',9,500,NULL),(143,'Mango Cake Per Slice',9,40,NULL),(144,'Carrot Walnut (10\" dia.)',9,600,NULL),(145,'Carrot Walnut Per Slice',9,45,NULL),(146,'Brazo de mercedez',9,300,NULL),(147,'Durian',9,300,NULL),(148,'Cream Vanilla',9,300,NULL),(149,'Brazo de mercedez Per Slice',9,30,NULL),(150,'Durian Per Slice',9,30,NULL),(151,'Cream Vanilla Per Slice',9,30,NULL),(152,'Chewy Brownies/box',9,200,NULL),(153,'Butterscotch/box',9,190,NULL),(154,'Mix Butterscotch/Brownies',9,195,NULL),(155,'Egg Pie',9,220,NULL),(156,'Egg Pie Per Slice',9,30,NULL),(157,'Buko Pie',9,220,NULL),(158,'Buko Pie Per Slice',9,30,NULL),(159,'Banana Cake Small',9,20,NULL),(160,'Banana Cake Large',9,40,NULL),(161,'Cassava Cake Small',9,100,NULL),(162,'Cassava Cake Large',9,250,NULL),(163,'Mango Float ',9,90,NULL),(164,'Barquillos Double Short',10,20,NULL),(165,'Barquillos  Double Long',10,27,NULL),(166,'Barquillos  Extra Thick',10,20,NULL),(167,'Barquillos  Jumbo',10,44,NULL),(168,'Biscocho',10,17,NULL),(169,'Piaya',10,19,NULL),(170,'Mini Piaya',10,44,NULL),(171,'Meringue Plain',10,14,NULL),(172,'Meringue Flavored',10,15,NULL),(173,'Barquiron',10,20,NULL),(174,'Polvoron Cashew',10,10,NULL),(175,'Cheese Cupcakes',10,10,NULL),(176,'Cheese Stick',10,5,NULL),(177,'Banana Chips Small',10,15,NULL),(178,'Banana Chips Large',10,50,NULL),(179,'Bukayo',10,27,NULL),(180,'Peanut Brittle',10,15,NULL),(181,'Peanut Balls',10,15,NULL),(182,'Pork Chicharon',10,45,NULL),(183,'Lengua de Gato',10,125,NULL),(184,'Durian Tart',10,60,NULL),(185,'Mango Tart',10,50,NULL),(186,'Yema',9,2,NULL),(187,'Sweet Candy',9,1,NULL),(188,'a',1,5000,'Good for 2');

/*Table structure for table `order_table` */

DROP TABLE IF EXISTS `order_table`;

CREATE TABLE `order_table` (
  `orderid` int(6) NOT NULL AUTO_INCREMENT,
  `customerid` int(6) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `employeeid` int(6) DEFAULT NULL,
  `totalpayment` double DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`orderid`),
  KEY `FK_order_table` (`customerid`),
  KEY `FK_order_table2` (`employeeid`),
  CONSTRAINT `FK_order_table` FOREIGN KEY (`customerid`) REFERENCES `customer_table` (`customerid`) ON DELETE SET NULL,
  CONSTRAINT `FK_order_table2` FOREIGN KEY (`employeeid`) REFERENCES `employee_table` (`employeeid`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `order_table` */

insert  into `order_table`(`orderid`,`customerid`,`orderdate`,`employeeid`,`totalpayment`,`status`) values (2,8,'2018-02-14',NULL,100,'pending'),(3,8,'2018-02-14',NULL,100,'pending'),(4,6,'2018-02-17',NULL,98,'pending'),(5,6,'2018-02-17',NULL,98,'pending'),(6,6,'2018-02-17',NULL,98,'pending'),(7,6,'2018-02-18',2,620,'confirmed'),(8,6,'2018-02-18',2,130,'cancelled'),(9,6,'2018-02-18',2,156,'paid'),(10,6,'2018-02-18',1,85,'paid'),(11,9,'2018-02-18',NULL,160,'pending'),(12,9,'2018-02-18',1,710,'paid'),(13,6,'2018-03-08',NULL,6000,'pending');

/*Table structure for table `cart_item_view` */

DROP TABLE IF EXISTS `cart_item_view`;

/*!50001 DROP VIEW IF EXISTS `cart_item_view` */;
/*!50001 DROP TABLE IF EXISTS `cart_item_view` */;

/*!50001 CREATE TABLE  `cart_item_view`(
 `cartitemid` int(6) ,
 `orderid` int(6) ,
 `quantity` int(3) ,
 `menuitemid` int(6) ,
 `menuname` varchar(60) ,
 `menucategoryid` int(6) ,
 `price` double ,
 `unit` varchar(100) ,
 `menucategoryname` varchar(60) ,
 `totalprice` double 
)*/;

/*Table structure for table `customer_view` */

DROP TABLE IF EXISTS `customer_view`;

/*!50001 DROP VIEW IF EXISTS `customer_view` */;
/*!50001 DROP TABLE IF EXISTS `customer_view` */;

/*!50001 CREATE TABLE  `customer_view`(
 `customerid` int(6) ,
 `firstname` varchar(60) ,
 `middlename` varchar(60) ,
 `lastname` varchar(60) ,
 `gender` varchar(20) ,
 `birthday` date ,
 `status` varchar(60) ,
 `address` varchar(100) ,
 `emailaddress` varchar(60) ,
 `username` varchar(60) 
)*/;

/*Table structure for table `employee_view` */

DROP TABLE IF EXISTS `employee_view`;

/*!50001 DROP VIEW IF EXISTS `employee_view` */;
/*!50001 DROP TABLE IF EXISTS `employee_view` */;

/*!50001 CREATE TABLE  `employee_view`(
 `employeeid` int(6) ,
 `firstname` varchar(60) ,
 `middlename` varchar(60) ,
 `lastname` varchar(60) ,
 `username` varchar(60) ,
 `password` varchar(60) ,
 `jobposition` varchar(60) ,
 `fullname` varchar(182) 
)*/;

/*Table structure for table `menu_item_view` */

DROP TABLE IF EXISTS `menu_item_view`;

/*!50001 DROP VIEW IF EXISTS `menu_item_view` */;
/*!50001 DROP TABLE IF EXISTS `menu_item_view` */;

/*!50001 CREATE TABLE  `menu_item_view`(
 `menuitemid` int(6) ,
 `menuname` varchar(60) ,
 `menucategoryid` int(6) ,
 `price` double ,
 `unit` varchar(100) ,
 `menucategoryname` varchar(60) 
)*/;

/*Table structure for table `order_view` */

DROP TABLE IF EXISTS `order_view`;

/*!50001 DROP VIEW IF EXISTS `order_view` */;
/*!50001 DROP TABLE IF EXISTS `order_view` */;

/*!50001 CREATE TABLE  `order_view`(
 `orderid` int(6) ,
 `customerid` int(6) ,
 `orderdate` date ,
 `employeeid` int(6) ,
 `totalpayment` double ,
 `status` varchar(60) ,
 `firstname` varchar(60) ,
 `middlename` varchar(60) ,
 `lastname` varchar(60) ,
 `fullname` varchar(182) 
)*/;

/*View structure for view cart_item_view */

/*!50001 DROP TABLE IF EXISTS `cart_item_view` */;
/*!50001 DROP VIEW IF EXISTS `cart_item_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_item_view` AS select `cart_item_table`.`cartitemid` AS `cartitemid`,`cart_item_table`.`orderid` AS `orderid`,`cart_item_table`.`quantity` AS `quantity`,`cart_item_table`.`menuitemid` AS `menuitemid`,`menu_item_table`.`menuname` AS `menuname`,`menu_item_table`.`menucategoryid` AS `menucategoryid`,`menu_item_table`.`price` AS `price`,`menu_item_table`.`unit` AS `unit`,`menu_category_table`.`menucategoryname` AS `menucategoryname`,(`menu_item_table`.`price` * `cart_item_table`.`quantity`) AS `totalprice` from ((`menu_item_table` join `menu_category_table` on((`menu_item_table`.`menucategoryid` = `menu_category_table`.`menucategoryid`))) join `cart_item_table` on((`cart_item_table`.`menuitemid` = `menu_item_table`.`menuitemid`))) */;

/*View structure for view customer_view */

/*!50001 DROP TABLE IF EXISTS `customer_view` */;
/*!50001 DROP VIEW IF EXISTS `customer_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_view` AS select `customer_table`.`customerid` AS `customerid`,`customer_table`.`firstname` AS `firstname`,`customer_table`.`middlename` AS `middlename`,`customer_table`.`lastname` AS `lastname`,`customer_table`.`gender` AS `gender`,`customer_table`.`birthday` AS `birthday`,`customer_table`.`status` AS `status`,`customer_table`.`address` AS `address`,`customer_table`.`emailaddress` AS `emailaddress`,`customer_table`.`username` AS `username` from `customer_table` */;

/*View structure for view employee_view */

/*!50001 DROP TABLE IF EXISTS `employee_view` */;
/*!50001 DROP VIEW IF EXISTS `employee_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_view` AS select `employee_table`.`employeeid` AS `employeeid`,`employee_table`.`firstname` AS `firstname`,`employee_table`.`middlename` AS `middlename`,`employee_table`.`lastname` AS `lastname`,`employee_table`.`username` AS `username`,`employee_table`.`password` AS `password`,`employee_table`.`jobposition` AS `jobposition`,concat(`employee_table`.`firstname`,' ',`employee_table`.`middlename`,' ',`employee_table`.`lastname`) AS `fullname` from `employee_table` */;

/*View structure for view menu_item_view */

/*!50001 DROP TABLE IF EXISTS `menu_item_view` */;
/*!50001 DROP VIEW IF EXISTS `menu_item_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `menu_item_view` AS select `menu_item_table`.`menuitemid` AS `menuitemid`,`menu_item_table`.`menuname` AS `menuname`,`menu_item_table`.`menucategoryid` AS `menucategoryid`,`menu_item_table`.`price` AS `price`,`menu_item_table`.`unit` AS `unit`,`menu_category_table`.`menucategoryname` AS `menucategoryname` from (`menu_item_table` join `menu_category_table` on((`menu_item_table`.`menucategoryid` = `menu_category_table`.`menucategoryid`))) */;

/*View structure for view order_view */

/*!50001 DROP TABLE IF EXISTS `order_view` */;
/*!50001 DROP VIEW IF EXISTS `order_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_view` AS select `order_table`.`orderid` AS `orderid`,`order_table`.`customerid` AS `customerid`,`order_table`.`orderdate` AS `orderdate`,`order_table`.`employeeid` AS `employeeid`,`order_table`.`totalpayment` AS `totalpayment`,`order_table`.`status` AS `status`,`customer_table`.`firstname` AS `firstname`,`customer_table`.`middlename` AS `middlename`,`customer_table`.`lastname` AS `lastname`,concat(`customer_table`.`firstname`,' ',`customer_table`.`middlename`,' ',`customer_table`.`lastname`) AS `fullname` from (`order_table` join `customer_table` on((`order_table`.`customerid` = `customer_table`.`customerid`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
