-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2012 at 10:48 PM
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
-- --------------------------------------------------------

--
-- Table structure for table `login`
--

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'gseeto', 'gseeto', 'Gareth', 'Seeto', 'gareth.seeto@gmail.com'),
(2, 'lwidjaja', 'lwidjaja', 'Linda', 'Widjaja', 'lindaw@inst.net');


-- --------------------------------------------------------

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

-- --------------------------------------------------------

--
-- Dumping data for table `meal_type`
--

INSERT INTO `meal_type` (`id`, `name`) VALUES
(1, 'Appetizer'),
(3, 'Dessert'),
(2, 'Main Meal');

-- --------------------------------------------------------

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

-- --------------------------------------------------------


--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`, `unit_of_measurement_id`, `initial_amount`, `cost`, `cost_unit_of_measurement`) VALUES
(2, 'All-Purpose Flour', 9, 2, 7, 9),
(3, 'Baking soda', 1, 1, 1, 1),
(4, 'ground round beef', 10, 1.5, 4, 10),
(5, 'onion chopped', 9, 1, 9.1, 9),
(6, 'vegetables - chopped carrots, corn, peas', 9, 2, 6.2, 9),
(7, 'potatoes', 10, 2, 2, 10),
(8, 'butter', 1, 8, 0.2, 9),
(9, 'beef broth', 9, 0.5, 0.03, 9),
(10, 'Worcestershire sauce', 1, 1, 4, 1),
(11, 'All-Purpose Flour', 1, 1, 0, 1),
(12, 'egg', 5, 1, 0, 1);


-- --------------------------------------------------------


--
-- Dumping data for table `quality`
--

INSERT INTO `quality` (`id`, `rating`) VALUES
(1, 'Poor'),
(2, 'Reasonable'),
(3, 'Good'),
(4, 'Excellent');

-- --------------------------------------------------------

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `description`, `Instructions`, `preparation_time`, `serving_size`, `owner_id`, `meal_type_id`) VALUES
(14, 'Bannana Bread', 'This banana bread is moist and delicious with loads of banana flavor! ', 'Preheat oven to 350 degrees F (175 degrees C). \n\nLightly grease a 9x5 inch loaf pan.\n\nIn a large bowl, combine flour, baking soda and salt. \n\nIn a separate bowl, cream together butter and brown sugar. \n\nStir in eggs and mashed bananas until well blended. \n\nStir banana mixture into flour mixture; stir just to moisten. \n\nPour batter into prepared loaf pan.', 16, 6, NULL, 3),
(21, 'Shepherds Pie', 'Shepherd''s Pie is originally an English dish, traditionally made with lamb or mutton. Americans typically make Shepherd''s Pie with beef, I think mostly because we are much more of a beef-eating culture than a lamb-eating one.', '1 Peel and quarter potatoes, boil in salted water until tender (about 20 minutes).\n2 While the potatoes are cooking, melt 4 Tablespoons butter (1/2 a stick) in large frying pan.\n3 SautÃ© onions in butter until tender over medium heat (10 mins). If you are adding vegetables, add them according to cooking time. Put any carrots in with the onions. Add corn or peas either at the end of the cooking of the onions, or after the meat has initially cooked.\n4 Add ground beef and sautÃ© until no longer pink. Add salt and pepper. Add worcesterchire sauce. Add half a cup of beef broth and cook, uncovered, over low heat for 10 minutes, adding more beef broth as necessary to keep moist.\n5 Mash potatoes in bowl with remainder of butter, season to taste.\n6 Place beef and onions in baking dish. Distribute mashed potatoes on top. Rough up with a fork so that there are peaks that will brown nicely. You can use the fork to make some designs in the potatoes as well.\n7 Cook in 400 degree oven until bubbling and brown (about 30 minutes). Broil for last few minutes if necessary to brown.\n', 50, 4, NULL, 2);

--
-- Dumping data for table `recipe_category_assn`
--

INSERT INTO `recipe_category_assn` (`recipe_id`, `category_id`) VALUES
(21, 6),
(14, 1),
(21, 6),
(21, 6),
(14, 1);

-- --------------------------------------------------------

--
-- Dumping data for table `recipe_ingredient_assn`
--

INSERT INTO `recipe_ingredient_assn` (`recipe_id`, `ingredient_id`) VALUES
(14, 2),
(14, 3),
(21, 4),
(21, 5),
(21, 6),
(21, 7),
(21, 8),
(21, 9),
(21, 10),
(21, 11),
(21, 12);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
