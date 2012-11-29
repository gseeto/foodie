-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2012 at 12:12 AM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodie`
--

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'gseeto', 'gseeto', 'Gareth', 'Seeto', 'gareth.seeto@gmail.com'),
(2, 'lwidjaja', 'lwidjaja', 'Linda', 'Widjaja', 'lindaw@inst.net');


--
-- Dumping data for table `unit_of_measurement_type`
--

INSERT INTO `unit_of_measurement_type` (`id`, `type`, `conversion_ratio`) VALUES
(1, 'teaspoons', 0.167),
(2, 'tablespoons', 0.5),
(3, 'Quarts', 32),
(4, 'pints', 16),
(5, 'ounces', 1),
(6, 'milliliters', 0.034),
(7, 'liters', 33.8),
(8, 'gallons', 128),
(9, 'Cups', 8),
(10, 'Pounds', 16),
(11, 'stone', 224),
(12, 'Kilograms', 35.27),
(13, 'Grams', 0.035);

--
-- Dumping data for table `meal_type`
--
INSERT INTO `meal_type` (`id`, `name`) VALUES
(1, 'Appetizer'),
(3, 'Dessert'),
(2, 'Main Meal');

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `group`, `name`) VALUES
(1, 'Cuisine', 'French'),
(2, 'Cuisine', 'Italian'),
(3, 'Cuisine', 'Indonesian'),
(4, 'Cuisine', 'Thai'),
(5, 'Cuisine', 'Chinese'),
(6, 'Cuisine', 'American'),
(7, 'Cuisine', 'Vietnamese'),
(8, 'Cuisine', 'Japanese'),
(9, 'Cooking Style', 'Fried'),
(10, 'Cooking Style', 'Baked'),
(11, 'Cooking Style', 'Boiled'),
(12, 'Cooking Style', 'Grilled');
