-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 07:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `admin_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`admin_username`, `admin_password`, `admin_fullname`) VALUES
('admin1', '14e1b600b1fd579f47433b88e8d85291', 'Administrator 1'),
('admin2', '14e1b600b1fd579f47433b88e8d85291', 'Administrator 2');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_title`, `contact_message`, `contact_time`) VALUES
(13, 'User 01', 'user1@gmail.com', 'Help me', 'I don not know how to purchase, please guide me. Thank you.', '2022-12-03'),
(14, 'User 02', 'user02@yahoo.com', 'User 02 feedback', 'Please guide me how to change password.\r\nThanks.', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `total_price`, `create_date`, `address`) VALUES
(4, 15, 50000, '2022-12-03', '41 CMT8, Q.Ninh Kiều, TP.Cần Thơ'),
(5, 16, 210000, '2022-12-03', '66 Võ Văn Tần, quận Thanh Khê, Đà Nẵng');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `product_id`, `quantity`, `invoice_id`) VALUES
(8, 78, 3, 4),
(9, 82, 2, 4),
(10, 88, 2, 5),
(11, 82, 3, 5),
(12, 80, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_description` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(78, 'Bánh bèo', 10000, 'Bánh bèo đậu xanh', 'Images/1669703334-BanhBeo.jpg'),
(79, 'Bánh bò', 8000, 'Bánh bò thốt nốt', 'Images/1669703358-BanhBo.jfif'),
(80, 'Bánh chuối', 12000, 'Bánh chuối nước cốt dừa', 'Images/1669703380-BanhChuoi.jpg'),
(81, 'Bánh cống', 30000, 'Bánh cống tôm thịt', 'Images/1669703403-BanhCong.jfif'),
(82, 'Bánh da lợn', 10000, 'Bánh da lợn đậu xanh', 'Images/1669703425-BanhDaLon.jpg'),
(83, 'Bánh đúc', 20000, 'Bánh đúc nước cốt dừa', 'Images/1669703453-BanhDuc.webp'),
(84, 'Bánh khọt', 25000, 'Bánh khọt Nam bộ', 'Images/1669703488-BanhKhot.jfif'),
(85, 'Bánh lá dừa', 12000, 'Bánh lá dừa Bến Tre', 'Images/1669703513-BanhLaDua.jpg'),
(86, 'Bánh lá mơ', 15000, 'Bánh làm từ lá mơ', 'Images/1669703536-BanhLaMo.jpg'),
(87, 'Bánh mì', 20000, 'Bánh mì Sài Gòn', 'Images/1669703557-BanhMi.jfif'),
(88, 'Bánh pía', 60000, 'Bánh pía Sóc Trăng', 'Images/1669703585-BanhPia.jpg'),
(89, 'Bánh tai yến', 4000, 'Bánh tai yến thơm ngon', 'Images/1669703626-BanhTaiYen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(9) NOT NULL,
  `user_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phonenumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_fullname`, `user_email`, `user_phonenumber`, `user_password`, `user_address`, `user_status`) VALUES
(15, 'User 01', 'user1@gmail.com', '0988888777', 'e10adc3949ba59abbe56e057f20f883e', '41 CMT8, Q.Ninh Kiều, TP.Cần Thơ', 1),
(16, 'User 02', 'user2@yahoo.com', '0911223344', 'e10adc3949ba59abbe56e057f20f883e', '66 Võ Văn Tần, quận Thanh Khê, Đà Nẵng', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
