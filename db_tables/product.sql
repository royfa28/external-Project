-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2019 at 10:20 PM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.2.15-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `onspecial` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `onspecial`, `type` , `modified`) VALUES
(1, 'Pan-Seared Sea Scallops', 'Served with spicy chili and lime sauce.', '1090', 0, 1, 'Entree'),

(2, 'Pork and Prawn Dumplings', 'With spicy green nahm-jim and crispy garlic oil. (Nahm-jim: Thai style hot and sour dip).', '11.90', 0, 1, 'Entree'),

(3, 'Sichuan Style Prawn and Pork Wontons', 'In hot and sour vinegar chilli oil sauce, sprinkled with toasted crushed peanut and minced cilantro.
', '12.90', 0, 1, 'Entree'),

(4, 'Pan-Seared Salmon Fillet', 'With lemongrass scented coconut milk, sawtooth coriander and chilli. ', '24.90', 0, 1, 'Mains'),

(5, 'Hoy Mok', 'Seared scallops in creamy red curry paste with steamed cabbage and sweet basil. ', '25.90', 0, 1, 'Mains'),

(6, 'Tom Yum Seafood Spring Rolls', 'Marinated seafood tom yum paste (lemongrass, galangal, lime leaves), sweet corn and chilli.', '10.90'. 0, 1, '3 Seasons Thai Fusion Cuisine Special'),

(7, 'Salmon Larb', 'The favourite dish of north Eastern Thailand ; Pan-fried salmon with red onion, mint, shallot, sun dried chilli in lime dressing with ground roasted rice and lime leaves.', '22.90', 0, 1, '3 Seasons Thai Fusion Cuisine Special'),

(8, 'Stir Fried Baby Calms', 'Housemade chilli jam, garlic, chilli and Thai basil.', '20.90', 0, 1,'3 Seasons Thai Fusion Cuisine Special'),

(9, 'Lightly Batter Fried King Prawns', 'With tamarind sauce.', '26.90', 0, 1, '3 Seasons Thai Fusion Cuisine Special'),

(10, 'Pad Thai King Prawns', 'Authenthiuc Thai rice noodles stir-fried in house pride tamarind & palm sugar flavours, served with grilled king prawns, crunchy bean sprouts and roasted peanuts.', '26.90', 0, 1, '3 Seasons Thai Fusion Cuisine'),

(11, 'Delicious Caramelised Crisp Skin Pork Belly', 'Tossed in five spice and chilli vinegar dressing, fried shallot and garlic.', '18.90', 0, 1, 'Chef Special Pride'),

(12, 'Prik Khing Moo Krob', 'Stir fried homemade rich flavor dried curry with crispy prok belly and fresh aromatic Thai herbs', '17.90', 0, 1, 'Chef Special Pride'),

(13, 'Ka Na Moo Krob', 'Most popular Thais eater, stir fried Kai-lan,  Asian green leaf and crispy pork belly.', '17.90', 0, 1, 'Chef Special Pride'),

(14, 'Thai BBQ Chicken', 'Grilled BBQ chicken bites along with grilled vegetable and sweet chilli dip.', '19.90', 0, 1, 'Chef Special Pride'),

(15, 'Crispy Salt and Pepper Squid', 'Crispy deep fried squid wok tossed with salt and pepper mixture and five spices. ', '19.90', 0, 1, 'Chef Special Pride'),

(17, 'Crying Tiger', 'Grilled marinated Angus beef served with grilled vegetables and tamarind dip. ', '20.90', 0, 1, 'Chef Special Pride'),

(18, 'Sizzling Sesame Beef', 'Stir fried sliced Angus beef in sesame sauce, cashew nuts and fried vegetables. ', '19.90', 0, 1, 'Chef Special Pride'),

(19, 'Sizzling Sesame Tiger Prawn', 'Stir fried sliced tiger prawns in sesame sauce, cashew nuts and fried vegetables. ', '22.90', 0, 1, 'Chef Special Pride'),

(20, 'Crispy Soft Shell Crab', 'Crispy soft shell crab comes with mixed mayonnaise, honey soy and garden salad. ', '21.90', 0, 1, 'Chef Special Pride'),

(21, 'Creamy Sweet Basil with Prawn', 'Creamy coconut and curry spice stimulating with Thai basil, prawns and egg. ', '21.90', 0, 1, 'Chef Special Pride'),

(22, 'Asparagus and Snow Pea with Prawns', 'Crunchy tiger king prawns, asparagus, snow peas and shiitake in soya bean-oyster sauce. ', '22.90', 0, 1, 'Chef Special Pride'),

(23, 'Braised Roast Duck in Plum Sauce', 'Grilled marinated Angus beef served with grilled vegetables and tamarind dip. ', '20.90', 0, 1, 'Chef Special Pride'),

(24, 'Vegatarian Curry Puffs', '4 Pieces. ', '8.90', 0, 1, 'Appetizer'),

(25, 'Vegetarian Spring Rolls', '4 Pieces. ', '8.90', 0, 1, 'Appetizer'),

(26, 'Thai Fish Cakes', '4 Pieces. ', '9.90', 0, 1, 'Appetizer'),

(27, 'Satay Chicken', '4 Pieces. ', '9.90', 0, 1, 'Appetizer'),

(28, 'Steamed Chicken Dim Sim', '4 Pieces. ', '10.90', 0, 1, 'Appetizer'),

(29, 'Entree Platter', '1 x Satay Chicken, 1 x Spring Roll, 1 x Curry Puff, 1 x Fish Cake. ', '10.90', 0, 1, 'Appetizer'),

(30, 'Deluxe Entree Platter', '1 x Satay Chicken, 1 x Spring Roll, 1 x Golden Bag, 1 x Tempura Coconut Prawn. ', '12.90', 0, 1, 'Appetizer'),

(31, '3 Seasons Golden Bags', '4 Pieces. ', '10.90', 0, 1, 'Appetizer'),

(32, 'Sichuan Style Prawn and Pork Wontons', 'In hot and sour vinegar, chilli oil sauce, sprinkle with crushed peanuts and minced cilantro. ', '12.90', 0, 1, 'Appetizer'),

(33, 'Peking Duck Wraps', '4 Pieces. ', '13.90', 0, 1, 'Appetizer'),

(34, 'Tempura Coconut Prawns', '4 Pieces. ', '13.90', 0, 1, 'Appetizer'),

(35, 'Cashew Nut in Chilli Jam Sauce', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Stir - Fried'),

(36, 'Peanut Sauce', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Stir - Fried'),

(37, 'Oyster Sauce', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Stir - Fried'),

(38, 'Garlic and Pepper Sauce', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Stir - Fried'),

(39, 'Chilli and Holy Thai Basil Sauce', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Stir - Fried'),

(40, 'Ginger and Shallots Sauce', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Stir - Fried'),

(41, 'Green Curry', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Curry'),

(42, 'Red Curry', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Curry'),

(43, 'Yellow Curry', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Curry'),

(44, 'Penang Curry', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '14.90', 0, 1, 'Curry'),

(45, 'Massaman Beef', 'Choices between Beef, Chicken, Crispy Pork, Pork, Prawn, Roasted Duck, Seafood or Vegetable and Tofu. ', '18.90', 0, 1, 'Curry'),

(46, 'Pad Thai', 'Thin rice noodles stir fried in tamarind and palm sugar with tofu and bean sprouts. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(47, 'Pad See Ew', 'Flat rice noodles stir fried in sweet soya sauce. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(48, 'Cashew Nut Noodle', 'Stir fried flat rice noodles with cashew nuts and chili jam sauce. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(49, 'Satay Noodle', 'Rich flavor of creamy peanut sauce, wok fried with fresh rice noodles. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(50, 'Pad Thai', 'Thin rice noodles stir fried in tamarind and palm sugar with tofu and bean sprouts. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(51, 'Pad Thai', 'Thin rice noodles stir fried in tamarind and palm sugar with tofu and bean sprouts. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(52, 'Pad Thai', 'Thin rice noodles stir fried in tamarind and palm sugar with tofu and bean sprouts. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(53, 'Pad Thai', 'Thin rice noodles stir fried in tamarind and palm sugar with tofu and bean sprouts. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

(54, 'Pad Thai', 'Thin rice noodles stir fried in tamarind and palm sugar with tofu and bean sprouts. ', '14.90', 0, 1, 'Noodles and Fried Rice'),

;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
