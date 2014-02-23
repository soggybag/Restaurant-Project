-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: mysql51-041.wc1:3306
-- Generation Time: Feb 23, 2014 at 10:37 AM
-- Server version: 5.1.70
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `669735_webdevils`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `price_per_glass` decimal(5,2) NOT NULL,
  `description` mediumtext CHARACTER SET latin1 NOT NULL,
  `category` varchar(40) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `price_per_glass`, `description`, `category`) VALUES
(1, 'The Satori ', 11.50, 0.00, 'Kampachi Sashimi (Kona White Fish), Cucumber, Pickled Red Onion, Sweet Corn, Red Tobiko, Avocado, Green Onions', '1'),
(2, 'Geisha''s Kiss', 10.50, 0.00, 'Yellowfin Tuna (Hand-Line Caught), Tamago, Piquillo Peppers, Yuzu Tobiko, Lotus Chips, Namasu Cucumber, Butter Lettuce, Avocado, Green Onions', '1'),
(3, 'Salmon Samba', 9.50, 0.00, 'Agave-Soy King Salmon (British Columbia), Tempura Asparagus, Namasu Cucumber, Butter Lettuce, Avocado, Pepitas, Green Onions, Wasabi Dust', '1'),
(4, 'Sumo Crunch', 9.00, 0.00, 'Surimi Crab, Shaved Cabbage, Cucumber, Avocado, Green Onions, Red Tempura Flakes', '1'),
(5, 'Porkivore ', 9.50, 0.00, 'Oven Roasted Pork Belly, Shaved Cabbage, Avocado, Cilantro, Green Onions, Red Radish', '1'),
(6, 'Mayan Dragon', 8.50, 0.00, 'Crispy Chicken Katsu, Purple Peruvian Potatoes, Julienne Carrots, Pickled Red Cabbage, Avocado, Shaved Jalapenos, Green Onions', '1'),
(7, 'Buddha Belly (Vegetarian)', 8.50, 0.00, 'Spicy Japanese Eggplant, Portobello Mushroom Fries, Julienne Carrots, Avocado, Green Onions\r\nRoasted Garlic Tofu Sauce\r\nAdd Vegan Ginger Chicken +$3.00', '1'),
(8, 'Bonsai Salad', 10.00, 0.00, 'Yellowfin Tuna (Hand-Line Caught), Romaine Lettuce, Julienne Carrots, Namasu Cucumber, Daikon Sprouts, Pepitas, Wasabi Dust\r\nPassion Fruit Miso Dressing', '2'),
(9, 'Lava Nachos (limited supply)', 8.00, 0.00, 'Brown Rice Chips topped with Tuna Picante, Melted Pepper Jack Cheese, Avocado, Green Onions, Nori Strips\r\nSriracha Aioli', '2'),
(10, 'Diablo Sauce', 0.50, 0.00, 'Habanero Salsa', '2'),
(11, 'New Item!', 99.99, 0.00, 'This is a new Item!\r\n    	', '4'),
(12, 'Wsabi Bacon', 3.99, 0.00, 'Hot spicy and greasy.', '3'),
(13, 'Soylent Green', 2.99, 0.00, 'Hearty and nutritious.', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
