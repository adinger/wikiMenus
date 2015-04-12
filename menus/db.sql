-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2015 at 04:56 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wikiMenus`
--

-- --------------------------------------------------------

--
-- Table structure for table `chainrestaurant`
--

CREATE TABLE IF NOT EXISTS `chainrestaurant` (
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Dish`
--

CREATE TABLE IF NOT EXISTS `Dish` (
`ID` int(11) NOT NULL,
  `restaurantName` char(30) NOT NULL,
  `dishName` char(30) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `averageRating` int(11) NOT NULL,
  `type` char(20) NOT NULL,
  `course` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Dish`
--

INSERT INTO `Dish` (`ID`, `restaurantName`, `dishName`, `price`, `description`, `averageRating`, `type`, `course`) VALUES
(1, 'Potbelly', 'Turkey Breast', 5, 'Our turkey is hand-sliced from the whole breast – no pressed turkey here. Create your sandwich the way you want to – leave off the mayo, or load up on lettuce, tomatoes or our unique Potbelly Hot Peppers ... it is all up to you.', 3, 'Sandwich', 'Entree'),
(2, 'Potbelly', 'A Wreck', 5, 'One of our signature sandwiches and the same since 1977. Salami, Angus Roast Beef, Turkey, Ham and Swiss cheese are hand-sliced and layered for a delicious disarray of flavors. Made to order with your choice of toppings.', 3, 'Sandwich', 'Entree'),
(3, 'Potbelley', 'Grilled Chicken and Chedder', 5, 'Less guilt. More flavor. All-natural grilled chicken breast hand sliced in shop and topped with real New York cheddar cheese plus your choice of toppings.', 3, 'Sandwich', 'Entree'),
(4, 'Potbelly', 'Chicken Salad', 5, 'Potbelly Chicken Salad is made fresh in shop with our simple recipe: all-natural chicken, celery salt, chopped celery, just the right amount of mayo, salt and pepper.', 3, 'Sandwich', 'Entree'),
(5, 'Potbelly', 'Grilled Chicken Mediterrarean', 5, 'Made with chickpeas, roasted red peppers, lemon juice, tahini, seasoning and the zip of Potbelly’s Hot Peppers Oil,Feta Cheese, Artichoke Hearts, Roasted Red Peppers and Crispy Cucumbers.', 3, 'Sandwich', 'Entree'),
(6, 'Potbelly', 'Italian', 5, 'Capicola, Mortadella, Pepperoni, Salami and Provolone Cheese', 3, 'Sandwich', 'Entree'),
(7, 'Potbelly', 'Pizza Sandwich', 5, 'Pepperoni, Meatball, Capicola, Marinara Sauce, Provolone Cheese, Mushrooms & Italian Seasoning', 3, 'Sandwich', 'Entree'),
(8, 'Potbelly', 'Tuna Salas', 5, '100% Albacore with Swiss Cheese', 3, 'Sandwich', 'Entree'),
(9, 'Potbelly', 'Uptown Salad', 7, 'All-natural grilled chicken,\r\ngrapes, apples, dried cranberries,\r\ncandied walnuts, red onion, blue cheese', 3, 'Salad', 'Entree'),
(10, 'Potbelly', 'Farmhouse Salad w/ Chicken', 7, 'All-natural grilled chicken,\r\nhard-boiled egg, bacon, blue cheese,\r\ntomatoes, red onion, cucumbers', 3, 'Salad', 'Entree'),
(11, 'Potbelly', 'Chicken Salad Salad', 6, 'Our own Chicken Salad, Provolone \r\ncheese, dried cranberries,\r\ncucumbers, tomatoes\r\n', 3, 'Salad', 'Entree'),
(12, 'Potbelly', 'A Wreck Salad', 6, 'Salami, Roast Beef, Turkey, Ham,\r\nSwiss cheese, blue cheese, hard-boiled egg,\r\ncucumbers, tomatoes', 3, 'Salad', 'Entree'),
(13, 'Potbelly', 'Chili', 4, 'Our Chili is a hearty recipe of ground beef, kidney beans, onions and bell peppers,\r\nsweetened with a touch of molasses. Oyster crackers on the side. Cheese and onions\r\nare available as toppings.', 3, 'Side', 'Side'),
(14, 'Potbelly', 'Chicken Noodle', 3, 'Chicken Noodle Soup', 3, 'Soup', 'Entree'),
(15, 'Potbelly', 'Spicy Southwest Veggie', 3, 'Spicy Southwest Veggie', 3, 'Soup', 'Soup'),
(16, 'Potbelly', 'Classic Shake', 3, 'Your choice of vanilla, chocolate, coffee, oreo.', 3, 'Shakes', 'Side'),
(17, 'Potbelly', 'Real Fruit Shake', 3, 'Your choice of banana, mixed berry, strawberry', 3, 'Shake', 'Side');

-- --------------------------------------------------------

--
-- Table structure for table `dishRequests`
--

CREATE TABLE IF NOT EXISTS `dishRequests` (
`id` int(11) NOT NULL,
  `restaurant` varchar(30) NOT NULL,
  `dishName` varchar(30) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `averageRating` decimal(10,0) NOT NULL,
  `typetag` char(30) NOT NULL,
  `course` char(30) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishRequests`
--

INSERT INTO `dishRequests` (`id`, `restaurant`, `dishName`, `price`, `averageRating`, `typetag`, `course`, `Description`) VALUES


-- --------------------------------------------------------

--
-- Table structure for table `dishreview`
--

CREATE TABLE IF NOT EXISTS `dishreview` (
  `reviewid` int(5) NOT NULL,
  `useremail` varchar(3) NOT NULL,
  `dishid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nonchainrestaurant`
--

CREATE TABLE IF NOT EXISTS `nonchainrestaurant` (
  `name` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurantRequests`
--

CREATE TABLE IF NOT EXISTS `restaurantRequests` (
  `Name` char(30) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Type` char(20) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurantRequests`
--

INSERT INTO `restaurantRequests` (`Name`, `Address`, `Type`, `ID`) VALUES
('Chipotle', '1010 W. Green St Urbana Il 61801', 'Sandwich', 0),
('Subway', '6000 N. Sheridan', 'Chain', 1),
('Papa Johns', '1061 W. Rosemont', 'Chain', 2),
('Mashawi', '1432 W. Green', 'NonChain', 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `reviewid` int(5) NOT NULL,
  `verbalreview` text,
  `numbericalrating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(30) NOT NULL,
  `username` char(20) DEFAULT NULL,
  `password` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chainrestaurant`
--
ALTER TABLE `chainrestaurant`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Dish`
--
ALTER TABLE `Dish`
 ADD PRIMARY KEY (`ID`,`restaurantName`);

--
-- Indexes for table `dishRequests`
--
ALTER TABLE `dishRequests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurantRequests`
--
ALTER TABLE `restaurantRequests`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Dish`
--
ALTER TABLE `Dish`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `dishRequests`
--
ALTER TABLE `dishRequests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
