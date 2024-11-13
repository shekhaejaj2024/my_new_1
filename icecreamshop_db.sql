-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 10:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icecreamshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `price`, `qty`) VALUES
('4b1CDOdrPRt0JoKC5lNm', 'TAl1Ck3GFt1Bilg2sS64', 'PrztZw0rmxzfr89iGpg', '20', '2'),
('tytgitsRDYSdWnrWH5xj', 'e', 'RAG9e7dFoh52ckwlMxhR', '400', '1'),
('Bnl0F1M0yC0QM9gLXzHF', 'e', 'sDfzVCLzUtd1lDVKTDx1', '250', '1'),
('bufPatu6YoU605KdCrML', 'e', 'b6oWE5lxEmxBF5odNw30', '300', '1');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
('aA3h2GmQ14C2dbHGR8Sc', 'e', 'big B', 'shekh@gmail.com', 'for learning about online bussiness', 'i want to laern about online bussiness\r\n'),
('nFOGkjTIy3GNf6UlFtGb', 'e', 'katrina', 'shekh@gmail.com', 'cndchdsv', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `seller_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `address_type` varchar(10) NOT NULL,
  `method` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'in progress',
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `seller_id`, `name`, `number`, `email`, `address`, `address_type`, `method`, `product_id`, `price`, `qty`, `date`, `status`, `payment_status`) VALUES
('PQBWdkfkBCoPznwvn30J', 'e', 'R4aZLKzCll7QmVdN65Pd', 'sakilshekh', '9897857646', 'sakil2024@gmail.com', '941, mainroad, alina, india, 387305', 'home', 'cash on delivery', 'b6oWE5lxEmxBF5odNw30', '300', '1', '2024-11-12', 'cancled', 'pending'),
('qDbTwjmpBYQT2wddI2gb', 'e', 'R4aZLKzCll7QmVdN65Pd', 'shekhsakil', '8675947586', 'sakil2024@gmail.com', '322, mainroad, alina, india, 763958', 'home', 'cash on delivery', 'b6oWE5lxEmxBF5odNw30', '300', '1', '2024-11-12', 'cancled', 'pending'),
('dHmWZBlCvnEYZE8aql6c', 'e', 'R4aZLKzCll7QmVdN65Pd', 'shekhsahab', '8796879585', 'sakil2024@gmail.com', '1011, mainroad, alina, india, 768549', 'home', 'cash on delivery', 'b6oWE5lxEmxBF5odNw30', '300', '1', '2024-11-12', 'in progress', 'pending'),
('', 'e', 'R4aZLKzCll7QmVdN65Pd', 'sakil&#39;sBrother', '8769587955', 'shekh123@gmail.com', '1088, mainroad, mahudha, india, 878657', 'home', 'cash on delivery', 'RAG9e7dFoh52ckwlMxhR', '400', '1', '2024-11-12', 'in progress', 'pending'),
('', 'e', 'R4aZLKzCll7QmVdN65Pd', 'sakil&#39;sBrother', '8769587955', 'shekh123@gmail.com', '1088, mainroad, mahudha, india, 878657', 'home', 'cash on delivery', 'FDbKeLy7OD7xqiQ527Hb', '300', '1', '2024-11-12', 'in progress', 'pending'),
('', 'e', 'R4aZLKzCll7QmVdN65Pd', 'sakil&#39;sBrother', '8769587955', 'shekh123@gmail.com', '1088, mainroad, mahudha, india, 878657', 'home', 'cash on delivery', 'gfIzuYHnL8brCO5iSUMy', '250', '1', '2024-11-12', 'in progress', 'pending'),
('', 'e', 'R4aZLKzCll7QmVdN65Pd', 'sakil&#39;sBrother', '8769587955', 'shekh123@gmail.com', '1088, mainroad, mahudha, india, 878657', 'home', 'cash on delivery', '1Rlp1WAJ9f3zR5DIvrED', '590', '1', '2024-11-12', 'in progress', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(255) NOT NULL,
  `seller_id` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(100) NOT NULL,
  `product_detail` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `name`, `price`, `image`, `stock`, `product_detail`, `status`) VALUES
('RAG9e7dFoh52ckwlMxhR', 'R4aZLKzCll7QmVdN65Pd', 'dsfasf', '400', '514215896_012c012ccc@2x.jpg', 100, 'mjjj', 'active'),
('sDfzVCLzUtd1lDVKTDx1', 'R4aZLKzCll7QmVdN65Pd', 'gg', '250', '518151488_012c012ccc@2x.jpg', 50, 'ttttt', 'active'),
('FDbKeLy7OD7xqiQ527Hb', 'R4aZLKzCll7QmVdN65Pd', 'hjj', '300', '547235148_012c012ccc@2x.jpg', 200, 'rtrfdgdfd', 'active'),
('b6oWE5lxEmxBF5odNw30', 'R4aZLKzCll7QmVdN65Pd', 'family', '300', 'product6.jpg', 1, 'fgnfnyttjt', 'active'),
('sWzlymxYory3tA4oPaTX', 'h', 'xyz', '20', 'boc.webp', 500, 'kscjsdiohcduilfc', 'deactive'),
('fDtBjujq3hZWLe9uRYiz', 'h', 'qrt', '200', 'product.webp', 8, 'eodiedofh', 'active'),
('owRWOu2eSTtLFiMZWbpC', 'h', 'loser-power', '400', 'product13-removebg-preview.png', 1000, 'iiutrrdddd', 'active'),
('gfIzuYHnL8brCO5iSUMy', 'R4aZLKzCll7QmVdN65Pd', 'icegola', '250', 'product2-removebg-preview.png', 300, 'wdwdadada', 'active'),
('okLQAJ85RMsFfBjHvT4n', 'R4aZLKzCll7QmVdN65Pd', 'win', '470', 'product3-removebg-preview.png', 50, 'hdichuicyICKXJLc;oad', 'active'),
('1Rlp1WAJ9f3zR5DIvrED', 'R4aZLKzCll7QmVdN65Pd', 'liqu', '590', 'product0.jpg', 100, 'sjacugyuctfcudvh', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `password`, `image`) VALUES
('R4aZLKzCll7QmVdN65Pd', 'admin', 'aejaj@gmail.com', '590b98aa8e9e022c0d205ddf596ff878f3180ea9', '672e5d80ac715.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`) VALUES
('e', 'shekh sakil', 'sakil2024@gmail.com', 'ebe4d10a2a395fa9efb9a36f5b431bde6eaa6587', '8wwoar9GOBuIkRbhSWa9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
