-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2021 at 02:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronics_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'yashfa@gmail.com', '96e79218965eb72c92a549dd5a330112'),
(2, 'sharmin.tushi95@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `review` int(255) NOT NULL,
  `total_rating` int(255) NOT NULL,
  `avg_rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `description`, `price`, `image`, `review`, `total_rating`, `avg_rating`) VALUES
(18, 'Light', 5, 'Indoor & Outdoor Decoration--This artificial fiddle leaf fig tree is very beautiful, with moss on the basin, which can be placed indoors and outdoors. Our tree can match perfectly with any decor theme, showing much freshness and elegance. Bring a touch of greenery to desks, coffee tables, patios, and more.', 80, 'lighting2.jpg', 0, 0, 0),
(23, 'Blender', 3, 'Indoor & Outdoor Decoration--This artificial fiddle leaf fig tree is very beautiful, with moss on the basin, which can be placed indoors and outdoors. Our tree can match perfectly with any decor theme, showing much freshness and elegance. Bring a touch of greenery to desks, coffee tables, patios, and more.', 120, 'kitchen5.jpg', 0, 0, 0),
(24, 'Artificial Plant', 2, 'Indoor & Outdoor Decoration--This artificial fiddle leaf fig tree is very beautiful, with moss on the basin, which can be placed indoors and outdoors. Our tree can match perfectly with any decor theme, showing much freshness and elegance. Bring a touch of greenery to desks, coffee tables, patios, and more.', 60, 'home1.jpg', 0, 0, 0),
(28, 'Floor Cleaner', 8, 'Indoor & Outdoor Decoration--This artificial fiddle leaf fig tree is very beautiful, with moss on the basin, which can be placed indoors and outdoors. Our tree can match perfectly with any decor theme, showing much freshness and elegance. Bring a touch of greenery to desks, coffee tables, patios, and more.', 100, 'floor2.jpg', 0, 0, 0),
(30, 'Fan', 2, 'Indoor & Outdoor Decoration--This artificial fiddle leaf fig tree is very beautiful, with moss on the basin, which can be placed indoors and outdoors. Our tree can match perfectly with any decor theme, showing much freshness and elegance. Bring a touch of greenery to desks, coffee tables, patios, and more.', 180, 'home3.jpg', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
