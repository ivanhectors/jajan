-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 04:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `username` varchar(50) NOT NULL,
  `kunci` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `aturan` varchar(50) NOT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `dibuat` date NOT NULL DEFAULT '0000-00-00',
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`username`, `kunci`, `nama`, `email`, `telp`, `aturan`, `dob`, `dibuat`, `photo`) VALUES
('72160057', '81dc9bdb52d04dc20036dbd8313ed055', 'Ivan Hector Sinambela', 'ivan.hector@si.ukdw.ac.id', '08238694219', 'administrator', '0000-00-00', '0000-00-00', ''),
('hector', '81dc9bdb52d04dc20036dbd8313ed055', 'Ivan Hector Sinambela', 'ivan@gmail.com', '082386943219', 'administrator', '0000-00-00', '0000-00-00', ''),
('ivansinambela', '81dc9bdb52d04dc20036dbd8313ed055', 'Ivan Hector Sinambela', 'ivan.hector@si.ukdw.ac.id', '082386943219', 'administrator', '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `c_u_id` int(11) NOT NULL,
  `c_p_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_image` varchar(500) NOT NULL,
  `c_price` int(11) NOT NULL,
  `qty` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empty`
--

CREATE TABLE `empty` (
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktbl`
--

CREATE TABLE `feedbacktbl` (
  `f_id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacktbl`
--

INSERT INTO `feedbacktbl` (`f_id`, `fullname`, `feedback`) VALUES
(1, 'Donald Maity', 'Best E-comm website ever... Easy GUI.. Fast working..'),
(2, 'Donald ', 'Best E-comm website');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(30) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `p_id`, `fullname`, `address`, `pincode`, `city`, `state`, `mobile`, `date`) VALUES
(30, 22, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-06-02'),
(20, 1, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(21, 25, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(22, 25, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(23, 25, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(24, 25, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(25, 10, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(26, 24, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(27, 1, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(28, 23, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(29, 2, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-05-29'),
(31, 1, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-06-02'),
(32, 2, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-06-04'),
(40, 10, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-06-05'),
(41, 4, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-06-05'),
(42, 1, 'd', 'd', 77777, 'd', 'd', 'd', '2018-06-05'),
(43, 1, 'd', 'd', 77777, 'd', 'd', 'd', '2018-06-05'),
(38, 11, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-06-04'),
(39, 11, 'Ivan Hector Sinam', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '+628238694321', '2018-06-04'),
(44, 10, 'Ivan Hector Sinambela', 'Dr. Wahidin St No. 488', 55224, 'Yogyakarta', 'D.I Yogyakarta', '082386943219', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_image` varchar(500) DEFAULT NULL,
  `p_price` int(11) NOT NULL,
  `p_desc` text NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `p_type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_image`, `p_price`, `p_desc`, `stock`, `p_type`) VALUES
(1, 'Reebok RUNNER Shoes (Blue)', 'images/1.png', 300000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 4, 'Shoes'),
(2, 'Nike LITE Running Shoes (Red)', 'images/2.png', 299000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 3, 'Shoes'),
(3, 'Woodland Men Boots (Camel)', 'images/3.png', 150900, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 10, 'Shoes'),
(4, 'Sparx Running Shoes (Grey)', 'images/4.png', 298000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 20, 'Shoes'),
(5, 'Puma Jago Men Running Shoes', 'images/5.png', 700000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 5, 'Shoes'),
(10, 'Puma Printed Men Round Neck Black T-Shirt', 'images/10.png', 240000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 7, 'Tshirt'),
(11, 'Lee Printed Men Round Neck Black T-Shirt', 'images/11.png', 75000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 9, 'Tshirt'),
(12, 'Adidas Originals Men Round Neck Black T-Shirts', 'images/12.png', 93000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 78, 'Tshirt'),
(13, 'Nike Printed Men Polo Neck Blue T-Shirt', 'images/13.png', 79000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 28, 'Tshirt'),
(6, 'Puma Wnomen Running Shoes', 'images/6.png', 700000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 69, 'Shoes'),
(7, 'Bata Women Red Wedges', 'images/7.png', 600000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 70, 'Shoes'),
(8, 'Skechers Women Flip Flops', 'images/8.png', 900000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 23, 'Shoes'),
(9, 'Paduki Ethnic Women Flats', 'images/9.png', 500000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 12, 'Shoes'),
(15, 'BLACK AND DENIM V-neck Blue T-Shirt', 'images/15.png', 40000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 12, 'Tshirt'),
(16, 'DENIM Harringbone Round Neck T-Shirt', 'images/16.png', 89000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 22, 'Tshirt'),
(17, 'Lee Printed Women Round Neck White T-Shirt', 'images/17.png', 67500, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 5, 'Tshirt'),
(18, 'Puma Women Round Neck Blue T-Shirt\r\n', 'images/18.png', 45000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 8, 'Tshirt'),
(19, 'Elle Printed Women Round Neck Blue T-Shirt', 'images/19.png', 60000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 5, 'Tshirt'),
(20, 'Levis Women Round Neck Maroon T-Shirt', 'images/20.png', 34000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 9, 'Tshirt'),
(21, 'Clo Clu Solid Women Denim Jacket', 'images/21.png', 120000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 7, 'Tshirt'),
(22, 'Fastrack NG3089SL01 Black Analog Watch - For Men', 'images/22.png', 1200000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 9, 'Watches'),
(23, 'Titan NH90024BM01 Karishma Analog Watch - For Men', 'images/23.png', 900000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 8, 'Watches'),
(24, 'Sonata 77037PP07J Sonata Digital Watch - For Men', 'images/24.png', 850000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 2, 'Watches'),
(25, 'Diesel DZ1609 Double Down Analog Watch - For Men', 'images/25.png', 500000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 9, 'Watches'),
(26, 'Fastrack NG6078SL05C Analog Watch - For Women', 'images/26.png', 1890, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 1, 'Watches'),
(27, 'Fossil ES3060 Georgia Analog Watch - For Women', 'images/27.png', 1999, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 0, 'Watches'),
(41, 'Nike Running Shoes', 'images/5b1500376e280nike-running-shoes.png', 290000, 'Synthetic, Synthetic sole, Platform measures approximately .25\", Premium Leather Lining with Cushioned Footbed for comfort, Flexible and Comfortable Classic Cap Toe Lace up oxfords,Great for any Dress, Formal, or Party Occasions.', 20, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mobile`, `email`) VALUES
(28, 'ivan', '123456789', '+6282386943219', 'ivan@gmail.com'),
(27, 'ivansinambela', '123456789', '+6282386943220', 'ivan.hector@si.ukdw.ac.id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbacktbl`
--
ALTER TABLE `feedbacktbl`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
