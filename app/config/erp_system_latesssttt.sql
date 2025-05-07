-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 06:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `description`, `created_at`) VALUES
(1, NULL, 'add', 'Users', 'Added user name Jude', '2025-04-30 21:20:41'),
(2, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:20:51'),
(3, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:20:52'),
(4, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:20:52'),
(5, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:20:54'),
(6, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:20:56'),
(7, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:21:04'),
(8, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:21:08'),
(9, NULL, 'add', 'Users', 'Added user name ', '2025-04-30 21:21:13'),
(10, NULL, 'update', 'Users', 'Updated user id ', '2025-04-30 21:21:53'),
(11, NULL, 'add', 'Role', 'Added employee ID 12345', '2025-04-30 21:27:22'),
(12, NULL, 'update', 'Users', 'Updated user id ', '2025-04-30 21:27:33'),
(13, NULL, 'add', 'Role', 'Added employee ID 131244', '2025-04-30 21:29:10'),
(14, NULL, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:29:15'),
(15, NULL, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:29:19'),
(16, NULL, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:29:24'),
(17, NULL, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:30:14'),
(18, NULL, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:36:09'),
(19, NULL, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:36:13'),
(20, NULL, 'update', 'Role', 'Updated role ID 4', '2025-04-30 21:43:44'),
(21, NULL, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:47:07'),
(22, 10093, 'update', 'Permission', 'Updated permission ID 3', '2025-04-30 21:47:16'),
(23, 0, 'update', 'Users', 'Updated user id 3', '2025-04-30 21:47:59'),
(24, 10093, 'update', 'Users', 'Updated user id 2', '2025-04-30 21:48:26'),
(25, 10093, 'logout', 'Auth', 'User logged out', '2025-04-30 21:52:20'),
(26, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-04-30 21:52:31'),
(27, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 15:56:16'),
(28, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 16:34:24'),
(29, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 16:34:28'),
(30, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 16:49:21'),
(31, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 16:50:10'),
(32, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 17:04:48'),
(33, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 17:04:52'),
(34, 10093, 'update', 'Role', 'Updated role ID 3', '2025-05-01 17:06:18'),
(35, 10093, 'update', 'Role', 'Updated role ID 1', '2025-05-01 17:06:23'),
(36, 10093, 'update', 'Role', 'Updated role ID 5', '2025-05-01 17:06:32'),
(37, 10093, 'update', 'Users', 'Updated user id 1', '2025-05-01 17:30:47'),
(38, 10093, 'update', 'Permission', 'Updated permission ID 1', '2025-05-01 17:30:56'),
(39, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 17:37:32'),
(40, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 17:37:33'),
(41, NULL, 'logout', 'Auth', 'User logged out', '2025-05-01 17:37:34'),
(42, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 17:37:39'),
(43, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 17:39:43'),
(44, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 18:13:49'),
(45, 10093, 'update', 'Users', 'Updated user id 1', '2025-05-01 18:14:08'),
(46, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 19:01:50'),
(47, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 20:14:52'),
(48, NULL, 'add', 'Role', 'Added role ID 6', '2025-05-01 20:15:15'),
(49, 10093, 'delete', 'Role', 'Deleted role ID 6', '2025-05-01 20:15:29'),
(50, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 20:17:25'),
(51, 12345, 'login', 'Auth', 'User Jude logged in', '2025-05-01 20:17:33'),
(52, 12345, 'logout', 'Auth', 'User logged out', '2025-05-01 20:18:30'),
(53, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 20:18:33'),
(54, 10093, 'add', 'Permission', 'Added permission name view_report', '2025-05-01 20:18:41'),
(55, 10093, 'add', 'Permission', 'Added permission name can_add', '2025-05-01 20:18:48'),
(56, 10093, 'add', 'Permission', 'Added permission name can_disapproved', '2025-05-01 20:19:05'),
(57, 10093, 'update', 'Permission', 'Updated permission ID 4', '2025-05-01 20:19:08'),
(58, 10093, 'update', 'Role', 'Updated role ID 1', '2025-05-01 20:22:35'),
(59, 10093, 'update', 'Role', 'Updated role ID 1', '2025-05-01 20:24:00'),
(60, 10093, 'update', 'Role', 'Updated role ID 1', '2025-05-01 20:37:08'),
(61, 10093, 'add', 'Permission', 'Added permission name edit_user', '2025-05-01 20:37:37'),
(62, 10093, 'add', 'Permission', 'Added permission name delete_user', '2025-05-01 20:37:43'),
(63, 10093, 'update', 'Role', 'Updated role ID 1', '2025-05-01 20:37:48'),
(64, 10093, 'add', 'Role', 'Added employee ID 123123', '2025-05-01 20:47:34'),
(65, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 20:47:35'),
(66, 123123, 'login', 'Auth', 'User JUDE logged in', '2025-05-01 20:47:39'),
(67, 123123, 'logout', 'Auth', 'User logged out', '2025-05-01 20:47:47'),
(68, 12345, 'login', 'Auth', 'User Jude logged in', '2025-05-01 20:47:50'),
(69, 12345, 'logout', 'Auth', 'User logged out', '2025-05-01 20:47:56'),
(70, 123123, 'login', 'Auth', 'User JUDE logged in', '2025-05-01 20:48:07'),
(71, 123123, 'update', 'Users', 'Updated user id 1', '2025-05-01 20:48:20'),
(72, 123123, 'update', 'Role', 'Updated role ID 1', '2025-05-01 20:48:28'),
(73, 123123, 'logout', 'Auth', 'User logged out', '2025-05-01 20:48:35'),
(74, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 20:48:38'),
(75, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 20:48:41'),
(76, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 20:48:53'),
(77, 10093, 'add', 'Permission', 'Added permission name manage_users', '2025-05-01 20:55:04'),
(78, 10093, 'add', 'Permission', 'Added permission name manage_permissions', '2025-05-01 20:55:12'),
(79, 10093, 'add', 'Permission', 'Added permission name manage_roles', '2025-05-01 20:55:19'),
(80, 10093, 'add', 'Permission', 'Added permission name view_logs', '2025-05-01 20:55:29'),
(81, 10093, 'update', 'Role', 'Updated role ID 1', '2025-05-01 20:55:35'),
(82, 10093, 'update', 'Role', 'Updated role ID 1', '2025-05-01 20:55:49'),
(83, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 20:55:51'),
(84, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-01 20:55:55'),
(85, 10093, 'logout', 'Auth', 'User logged out', '2025-05-01 20:58:01'),
(86, 12345, 'login', 'Auth', 'User Jude logged in', '2025-05-01 20:58:05'),
(87, 12345, 'logout', 'Auth', 'User logged out', '2025-05-01 20:58:07'),
(88, 12345, 'login', 'Auth', 'User Jude logged in', '2025-05-01 20:58:18'),
(89, 12345, 'logout', 'Auth', 'User logged out', '2025-05-02 00:17:03'),
(90, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-02 00:17:07'),
(91, 10093, 'logout', 'Auth', 'User logged out', '2025-05-02 01:05:43'),
(92, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-02 01:05:48'),
(93, 10093, 'logout', 'Auth', 'User logged out', '2025-05-02 01:05:53'),
(94, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-02 01:05:57'),
(95, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-02 17:05:04'),
(96, 10093, 'update', 'House', 'Updated house on lot ID 4', '2025-05-02 19:04:59'),
(97, 10093, 'update', 'Lot', 'Updated lot ID 4', '2025-05-02 19:04:59'),
(98, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-02 22:19:21'),
(99, 10093, 'create', 'Lot', 'Created new lot with number 1', '2025-05-02 22:47:41'),
(100, 10093, 'create', 'Lot', 'Created new lot with number 13', '2025-05-02 22:51:25'),
(101, 10093, 'create', 'Lot', 'Created new lot with number 1', '2025-05-02 22:54:02'),
(102, 10093, 'create', 'Lot', 'Created new lot with number 4', '2025-05-02 23:19:25'),
(103, 10093, 'logout', 'Auth', 'User logged out', '2025-05-02 23:19:32'),
(104, 123123, 'login', 'Auth', 'User JUDE logged in', '2025-05-02 23:19:37'),
(105, 123123, 'create', 'Lot', 'Created new lot with number 1', '2025-05-02 23:19:54'),
(106, 123123, 'logout', 'Auth', 'User logged out', '2025-05-02 23:20:03'),
(107, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-02 23:20:07'),
(108, 10093, 'create', 'Lot', 'Created new lot with number 12', '2025-05-03 00:13:28'),
(109, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-03 02:17:10'),
(110, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-04 15:34:53'),
(111, 10093, 'create', 'Lot', 'Created new lot with number 2', '2025-05-04 16:11:11'),
(112, 10093, 'update', 'Lot', 'Updated lot ID 5', '2025-05-04 16:17:38'),
(113, 10093, 'update', 'Lot', 'Updated lot ID 9', '2025-05-04 16:19:10'),
(114, 10093, 'create', 'Lot', 'Created new lot with number 1', '2025-05-04 16:33:47'),
(115, 10093, 'add', 'Role', 'Added role ID 7', '2025-05-04 17:07:54'),
(116, 10093, 'update', 'Role', 'Updated role ID 3', '2025-05-04 17:08:21'),
(117, 10093, 'update', 'Permission', 'Updated permission ID 1', '2025-05-04 17:08:40'),
(118, 10093, 'update', 'Permission', 'Updated permission ID 2', '2025-05-04 17:08:45'),
(119, 10093, 'update', 'Permission', 'Updated permission ID 3', '2025-05-04 17:08:53'),
(120, 10093, 'update', 'Permission', 'Updated permission ID 1', '2025-05-04 17:09:03'),
(121, 10093, 'update', 'Permission', 'Updated permission ID 2', '2025-05-04 17:09:10'),
(122, 10093, 'update', 'Permission', 'Updated permission ID 3', '2025-05-04 17:09:18'),
(123, 10093, 'update', 'Permission', 'Updated permission ID 1', '2025-05-04 17:09:26'),
(124, 10093, 'update', 'Permission', 'Updated permission ID 1', '2025-05-04 17:09:28'),
(125, 10093, 'update', 'Permission', 'Updated permission ID 2', '2025-05-04 17:09:31'),
(126, 10093, 'update', 'Permission', 'Updated permission ID 3', '2025-05-04 17:09:33'),
(127, 10093, 'update', 'Permission', 'Updated permission ID 5', '2025-05-04 17:09:42'),
(128, 10093, 'update', 'Permission', 'Updated permission ID 6', '2025-05-04 17:09:55'),
(129, 10093, 'add', 'Permission', 'Added permission name reservation_application_add', '2025-05-04 17:12:37'),
(130, 10093, 'add', 'Permission', 'Added permission name reservation_application_edit', '2025-05-04 17:12:51'),
(131, 10093, 'add', 'Permission', 'Added permission name reservation_application_delete', '2025-05-04 17:13:04'),
(132, 10093, 'create', 'Fence', 'Added fence to lot ID 12', '2025-05-04 17:17:23'),
(133, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-04 18:18:19'),
(134, 10093, 'update', 'Users', 'Updated user id 4', '2025-05-04 18:35:29'),
(135, 10093, 'update', 'Role', 'Updated role ID 7', '2025-05-04 18:35:56'),
(136, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-04 20:08:13'),
(137, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-05 08:04:23'),
(138, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-05 15:14:28'),
(139, 10093, 'update', 'Agent', 'Updated agent id 1', '2025-05-05 15:15:00'),
(140, 10093, 'update', 'Agent', 'Updated agent id 1', '2025-05-05 15:15:05'),
(141, 10093, 'update', 'Agent', 'Updated agent id 1', '2025-05-05 15:15:11'),
(142, 10093, 'add', 'Agent', 'Added agent with code 12345', '2025-05-05 15:59:51'),
(143, 10093, 'update', 'Agent', 'Updated agent id 1', '2025-05-05 15:59:58'),
(144, 10093, 'update', 'Agent', 'Updated agent id 3', '2025-05-05 16:00:02'),
(145, 10093, 'update', 'Agent', 'Updated agent id 8', '2025-05-05 16:00:04'),
(146, 10093, 'delete', 'Agent', 'Deleted agent id 394', '2025-05-05 16:00:23'),
(147, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-05 16:00:53'),
(148, 10093, 'delete', 'Agent', 'Deleted agent id 225', '2025-05-05 16:01:15'),
(149, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-05 20:25:40'),
(150, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-05 21:46:06'),
(151, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-05 22:47:31'),
(152, NULL, 'delete', 'Model House', 'Deleted Model House ID 6', '2025-05-05 23:05:22'),
(153, 10093, 'create', 'Lot', 'Created new lot with number ', '2025-05-05 23:05:34'),
(154, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-07 18:27:41'),
(155, 10093, 'update', 'Role', 'Updated role ID 4', '2025-05-07 18:28:11'),
(156, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-07 20:34:49'),
(157, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-07 23:04:21'),
(158, 10093, 'login', 'Auth', 'User Admin User logged in', '2025-05-07 23:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `additional_costs`
--

CREATE TABLE `additional_costs` (
  `id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_costs`
--

INSERT INTO `additional_costs` (`id`, `lot_id`, `description`, `cost`, `remarks`) VALUES
(2, 4, '1', 1.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agent_commissions`
--

CREATE TABLE `agent_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_no` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `commission_amount` double DEFAULT NULL,
  `paid` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent_commissions`
--

INSERT INTO `agent_commissions` (`id`, `account_no`, `agent_id`, `commission_amount`, `paid`) VALUES
(1, 1001, 101, 15000, 0),
(2, 1002, 102, 18000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `full_name`, `contact_number`) VALUES
(1, 'John Doe', '09171234567'),
(2, 'Jane Smith', '09182345678'),
(3, 'Tom Harris', '09193456789'),
(4, 'Lucy Martin', '09204567890');

-- --------------------------------------------------------

--
-- Table structure for table `buyers_account`
--

CREATE TABLE `buyers_account` (
  `account_no` bigint(20) UNSIGNED NOT NULL,
  `lot_id` int(11) NOT NULL,
  `primary_buyer_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `property_id` varchar(30) DEFAULT NULL,
  `date_of_sale` date NOT NULL DEFAULT curdate(),
  `account_status` varchar(50) NOT NULL DEFAULT 'Active',
  `account_type_primary` varchar(50) NOT NULL,
  `account_type_secondary` varchar(50) DEFAULT NULL,
  `lot_area` double DEFAULT NULL,
  `lot_price_per_sqm` double DEFAULT NULL,
  `lot_discount_percent` double DEFAULT 0,
  `lot_discount_amount` double DEFAULT 0,
  `house_model` varchar(100) DEFAULT NULL,
  `floor_area` double DEFAULT NULL,
  `house_price_per_sqm` double DEFAULT NULL,
  `house_discount_percent` double DEFAULT 0,
  `house_discount_amount` double DEFAULT 0,
  `tcp_discount_percent` double DEFAULT 0,
  `tcp_discount_amount` double DEFAULT 0,
  `total_contract_price` double DEFAULT NULL,
  `vat_amount` double DEFAULT 0,
  `net_total_contract_price` double DEFAULT NULL,
  `reservation_fee` double DEFAULT 0,
  `payment_type_primary` varchar(100) DEFAULT NULL,
  `payment_type_secondary` varchar(100) DEFAULT NULL,
  `down_payment_percent` double DEFAULT NULL,
  `net_down_payment` double DEFAULT NULL,
  `number_of_payments` int(11) DEFAULT NULL,
  `monthly_down_payment` double DEFAULT NULL,
  `first_down_payment_date` date DEFAULT NULL,
  `full_down_payment_due_date` date DEFAULT NULL,
  `amount_financed` double DEFAULT NULL,
  `financing_terms_months` int(11) DEFAULT NULL,
  `interest_rate` double DEFAULT NULL,
  `fixed_factor` double DEFAULT NULL,
  `monthly_amortization` double DEFAULT NULL,
  `amortization_start_date` date DEFAULT NULL,
  `has_retention` tinyint(1) DEFAULT 0,
  `is_restructured` tinyint(1) DEFAULT 0,
  `has_changed_terms` tinyint(1) DEFAULT 0,
  `account_active_status` tinyint(1) DEFAULT 1 COMMENT '0=Backout, 1=Active, 2=Transferred',
  `backout_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers_account`
--

INSERT INTO `buyers_account` (`account_no`, `lot_id`, `primary_buyer_id`, `agent_id`, `property_id`, `date_of_sale`, `account_status`, `account_type_primary`, `account_type_secondary`, `lot_area`, `lot_price_per_sqm`, `lot_discount_percent`, `lot_discount_amount`, `house_model`, `floor_area`, `house_price_per_sqm`, `house_discount_percent`, `house_discount_amount`, `tcp_discount_percent`, `tcp_discount_amount`, `total_contract_price`, `vat_amount`, `net_total_contract_price`, `reservation_fee`, `payment_type_primary`, `payment_type_secondary`, `down_payment_percent`, `net_down_payment`, `number_of_payments`, `monthly_down_payment`, `first_down_payment_date`, `full_down_payment_due_date`, `amount_financed`, `financing_terms_months`, `interest_rate`, `fixed_factor`, `monthly_amortization`, `amortization_start_date`, `has_retention`, `is_restructured`, `has_changed_terms`, `account_active_status`, `backout_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1001, 1, 1, 101, 'P123456789', '2025-01-15', 'Active', 'Residential', 'Secondary', 150, 1000, 10, 15000, 'Model A', 120, 1500, 5, 15000, 0, 0, 150000, 10000, 140000, 20000, 'Cash', 'Loan', 30, 30000, 36, 8333, '2025-02-01', '2025-03-01', 100000, 36, 6.5, 1.5, 3800, '2025-03-01', 0, 0, 0, 1, NULL, 'First payment made on time', '2025-05-07 15:53:10', '2025-05-07 15:53:10'),
(1002, 2, 2, 102, 'P987654321', '2025-02-10', 'Active', 'Residential', 'Secondary', 100, 950, 15, 14250, 'Model B', 110, 1200, 7, 14000, 0, 0, 130000, 8000, 122000, 15000, 'Loan', 'Cash', 25, 25000, 48, 5208, '2025-03-01', '2025-04-01', 95000, 48, 7, 1.7, 2200, '2025-04-01', 1, 0, 0, 1, NULL, 'Buyer made an additional down payment', '2025-05-07 15:53:10', '2025-05-07 15:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `buyers_accounts_buyers`
--

CREATE TABLE `buyers_accounts_buyers` (
  `account_no` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers_accounts_buyers`
--

INSERT INTO `buyers_accounts_buyers` (`account_no`, `buyer_id`, `is_primary`) VALUES
(1001, 1, 1),
(1001, 2, 0),
(1002, 2, 1),
(1002, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fences`
--

CREATE TABLE `fences` (
  `id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `fence_type` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `length` decimal(10,2) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fences`
--

INSERT INTO `fences` (`id`, `lot_id`, `fence_type`, `material`, `length`, `cost`, `remarks`) VALUES
(2, 4, '1', '1', 1.00, 1.00, NULL),
(3, 12, 'a', '1', 1.00, 3313.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `model` varchar(100) DEFAULT NULL,
  `floor_area` decimal(10,2) DEFAULT NULL,
  `price_per_sqm` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `unit_status` varchar(50) DEFAULT NULL,
  `house_type` smallint(6) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `lot_id`, `model`, `floor_area`, `price_per_sqm`, `status`, `unit_status`, `house_type`, `remarks`) VALUES
(2, 2, 'Annika', 159.00, 12222.00, 'Available', 'For Construction', NULL, NULL),
(3, 4, 'Freya', 120.00, 15000.00, 'Sold', 'For Construction', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lots`
--

CREATE TABLE `lots` (
  `id` int(11) NOT NULL,
  `site_id` smallint(6) DEFAULT NULL,
  `block` smallint(6) DEFAULT NULL,
  `lot` smallint(6) DEFAULT NULL,
  `lot_area` decimal(10,2) DEFAULT NULL,
  `price_per_sqm` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_owner` varchar(255) DEFAULT NULL,
  `previous_owner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `site_id`, `block`, `lot`, `lot_area`, `price_per_sqm`, `status`, `remarks`, `title`, `title_owner`, `previous_owner`, `created_at`) VALUES
(1, 152, 2, 2, 120.00, 10000.00, 'Available', 'test', 'With Title', 'ALSC', 'MT-CBG', '2025-05-02 09:36:54'),
(2, 152, 2, 3, 120.00, 20000.00, 'Available', 'test', NULL, NULL, NULL, '2025-05-02 10:00:44'),
(4, 152, 2, 1, 120.00, 15000.00, 'Sold', 'test', '', '', '', '2025-05-02 10:56:03'),
(5, 152, 10, 1, 100.00, NULL, 'On Hold', 'test', '', '', '', '2025-05-02 14:47:41'),
(6, 152, 12, 13, 12313.00, 15000.00, 'Available', 'test', '', '', '', '2025-05-02 14:51:25'),
(7, 152, 12, 1, 121334.00, NULL, 'Sold', 'test', '', '', '', '2025-05-02 14:54:02'),
(8, 152, 14, 4, 100.00, NULL, 'On Hold', 'test', '', '', '', '2025-05-02 15:19:25'),
(9, 152, 12, 1, 100.00, NULL, 'Sold', 'test', '', '', '', '2025-05-02 15:19:54'),
(10, 152, 112, 12, 100.00, 8000.00, 'Available', 'rt', '', '', '', '2025-05-02 16:13:28'),
(11, 107, 12, 2, 120.00, 6000.00, 'Available', 'test', 'With Title', 'ALSC', '', '2025-05-04 08:11:11'),
(12, 102, 2, 1, 120.00, NULL, 'Sold', 'test', 'Without Title', 'ALSC', '', '2025-05-04 08:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `is_read`, `created_at`) VALUES
(1, 0, 'New lot #5 added by ', 0, '2025-05-02 14:47:41'),
(2, 1, 'New lot #6 added by ', 0, '2025-05-02 14:51:25'),
(3, 10093, 'New lot #7 added by Admin User', 1, '2025-05-02 14:54:02'),
(4, 10093, 'New lot #8 added by Admin User', 1, '2025-05-02 15:19:25'),
(5, 10093, 'New lot #9 added by JUDE', 1, '2025-05-02 15:19:54'),
(6, 10093, 'New lot #10 added by Admin User', 1, '2025-05-02 16:13:28'),
(7, 10093, 'New lot #11 added by Admin User', 1, '2025-05-04 08:11:11'),
(8, 10093, 'Lot # was deleted by Admin User', 1, '2025-05-04 08:17:38'),
(9, 10093, 'Lot # was deleted by Admin User', 1, '2025-05-04 08:19:10'),
(10, 10093, 'New lot #12 added by Admin User', 1, '2025-05-04 08:33:47'),
(11, 10093, 'New lot #CASA JUDZ added by Admin User', 1, '2025-05-05 15:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `account_no` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `principal` decimal(10,2) DEFAULT NULL,
  `interest` decimal(10,2) DEFAULT NULL,
  `surcharge` decimal(10,2) DEFAULT NULL,
  `rebate` decimal(10,2) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'inventory_edit', 'inventory'),
(2, 'inventory_delete', 'inventory'),
(3, 'inventory_view', 'inventory'),
(4, 'can_approved', ''),
(5, 'report_view', ''),
(6, 'inventory_add', ''),
(7, 'can_disapproved', ''),
(8, 'edit_user', ''),
(9, 'delete_user', ''),
(10, 'manage_users', ''),
(11, 'manage_permissions', ''),
(12, 'manage_roles', ''),
(13, 'view_logs', ''),
(14, 'reservation_application_add', ''),
(15, 'reservation_application_edit', ''),
(16, 'reservation_application_delete', '');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(3, 1),
(3, 2),
(3, 3),
(4, 3),
(5, 3),
(7, 3),
(7, 14),
(7, 15),
(7, 16);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `buyer1_name` varchar(100) NOT NULL,
  `buyer1_contact` varchar(50) NOT NULL,
  `buyer2_name` varchar(100) DEFAULT NULL,
  `buyer2_contact` varchar(50) DEFAULT NULL,
  `address` text NOT NULL,
  `lot_id` int(11) NOT NULL,
  `house_id` int(11) DEFAULT NULL,
  `fence` tinyint(1) DEFAULT 0,
  `down_payment` decimal(12,2) NOT NULL,
  `term_months` int(11) NOT NULL,
  `status` enum('pending','validated','approved','booked') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_agents`
--

CREATE TABLE `reservation_agents` (
  `reservation_id` int(11) NOT NULL,
  `agent_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(3, 'Accountant'),
(1, 'Admin'),
(7, 'Agent'),
(2, 'Cashier'),
(5, 'Frontliner'),
(4, 'Viewer');

-- --------------------------------------------------------

--
-- Table structure for table `t_agents`
--

CREATE TABLE `t_agents` (
  `id` int(11) NOT NULL,
  `c_code` int(11) NOT NULL,
  `c_last_name` text DEFAULT NULL,
  `c_first_name` text DEFAULT NULL,
  `c_middle_initial` text DEFAULT NULL,
  `c_nick_name` text DEFAULT NULL,
  `c_sex` text DEFAULT NULL,
  `c_birthdate` date DEFAULT NULL,
  `c_birth_place` text DEFAULT NULL,
  `c_address_ln1` text DEFAULT NULL,
  `c_address_ln2` text DEFAULT NULL,
  `c_tel_no` text DEFAULT NULL,
  `c_civil_status` text DEFAULT NULL,
  `c_sss_no` text DEFAULT NULL,
  `c_tin` text DEFAULT NULL,
  `c_status` text DEFAULT NULL,
  `c_recruited_by` text DEFAULT NULL,
  `c_hire_date` date DEFAULT NULL,
  `c_position` text DEFAULT NULL,
  `c_network` text DEFAULT NULL,
  `c_division` text DEFAULT NULL,
  `c_rate` double NOT NULL,
  `c_withholding_tax` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_agents`
--

INSERT INTO `t_agents` (`id`, `c_code`, `c_last_name`, `c_first_name`, `c_middle_initial`, `c_nick_name`, `c_sex`, `c_birthdate`, `c_birth_place`, `c_address_ln1`, `c_address_ln2`, `c_tel_no`, `c_civil_status`, `c_sss_no`, `c_tin`, `c_status`, `c_recruited_by`, `c_hire_date`, `c_position`, `c_network`, `c_division`, `c_rate`, `c_withholding_tax`) VALUES
(1, 100269, 'Camingal', 'Raymond', '', 'Raymond', 'Male', '1976-10-29', 'Sagrada Paobong, Hagonoy, Bulacan', '#318 SAGRADA PAOMBONG, HAGONOY, BULACAN', 'M1029CR0', '', 'Single', '', '', 'Active', 'Reynaldo J. Camingal', '1996-11-16', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(2, 100302, 'Ysais', 'Lynnet', 'C.', 'Lynneth', 'Female', '1974-04-22', 'Catmon, Malolos, Bulacan', '012 CATMON, MALOLOS, BULACAN', 'M0422YL0', '791-03-38', 'Single', '', '', 'Active', 'Lucita C. Ysais', '1995-06-10', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(3, 100492, 'Hernandez', 'Marcelo', 'A.', 'Mar', 'Male', '1951-09-04', 'Caloocan, Metro Manila', '375 SAN PABLO, MALOLOS, BULACAN', 'M0904HM0', '791-36-73', 'Married', '323782432', '56159932', 'Active', 'Rosita S. Hernandez', '1995-11-15', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(4, 100577, 'Magtira', 'Eugenio', '', 'Gene', 'Male', '1944-01-14', 'Mojon, Malolos, Bulacan', '118 LIBRA ST., SAN FELIPE SUBD., MOJON', 'M0114ME0', '', 'Married', '', '', 'Active', 'Leonora D. Punongbayan', '2006-10-16', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(5, 100590, 'Magtira', 'Francisca', '', 'Francisca', 'Female', '1954-07-04', 'Mojon, Malolos, Bulacan', '118 LIBRA ST., SAN FELIPE SUBD., MOJON', 'M0704MF0', '', 'Married', '', '', 'Active', 'Eugenio Magtira', '2012-08-24', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(6, 100824, 'Lizarondo', 'Regina', '', '', 'Female', '1899-12-31', '', '', 'M0101LR1', '', 'Single', '', '', 'Active', '', '2012-04-10', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(7, 100901, 'Rebina', 'Bienvenida', '', '', 'Female', '1899-12-31', '', '', 'M0101RB0', '', 'Single', '', '', 'Active', '', '2009-10-13', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(8, 100902, 'Santos', 'Remedios', '', '', 'Female', '1971-01-01', '', '', 'M0101SR4', '', 'Single', '', '', 'Active', '', '2005-06-14', 'SM', 'ACHIEVERS', 'Achievers - Direct', 1.5, 0),
(9, 100922, 'Quilantang', 'Annalyn', '', '', 'Female', '1971-01-01', '', '', 'M0101QA1', '', 'Single', '', '', 'Active', '', '2006-06-13', 'AVP', 'ACHIEVERS', 'Adrenaline', 0, 0),
(10, 101700, 'Carbo', 'William', 'R.', '', 'Male', '1971-01-01', '', '', 'M0101CW0', '', 'Single', '', '', 'Active', '', '2005-01-26', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(11, 101787, 'Manalo', 'Rolando', 'Dj', '', 'Male', '1899-12-31', '', '', 'M0101MR3', '', 'Single', '', '', 'Active', '', '2007-02-07', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(12, 102669, 'Mallari', 'Damasa', '', '', 'Female', '1899-12-31', '', '', 'M0101MD8', '', 'Single', '', '', 'Active', '', '2006-07-31', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(13, 102685, 'Viterbo', 'Norelrin', '', '', 'Female', '1971-01-01', '', '', 'M0101VN3', '', 'Single', '', '', 'Active', '', '2004-06-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(14, 102792, 'Bautista', 'Daisy', 'F.', '', 'Female', '1899-12-31', '', '', 'M0101BD4', '', 'Single', '', '', 'Active', '', '2011-03-01', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(15, 102813, 'Lacanlale', 'Remedios', '', '', 'Female', '1899-12-31', '', '', 'M0101LR9', '', 'Single', '', '', 'Active', '', '2015-06-02', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(16, 102980, 'Alipio', 'Shirley', 'F.', '', 'Female', '1900-02-01', '', '', 'M0202AS0', '', 'Single', '', '', 'Active', '', '2015-04-14', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(17, 103098, 'Carbo', 'Mahnny', 'R.', '', 'Male', '1971-01-01', '', '', 'M0203CM2', '', 'Single', '', '', 'Active', '', '2004-05-31', 'SM', 'ACHIEVERS', 'Achievers - Direct', 1.5, 0),
(18, 103227, 'Nieves', 'Cecilia', '', '', 'Female', '1971-01-01', '', '', 'M0101NC0', '', 'Single', '', '', 'Active', '', '2004-06-22', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(19, 103323, 'Amurao', 'Marissa', '', '', 'Female', '1900-02-02', '', '', 'M0203AM0', '', 'Single', '', '', 'Active', '', '2007-01-23', 'SMG', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(20, 103806, 'Ocampo', 'Herminia', '', '', 'Female', '1971-01-01', '', '', 'M0101OH2', '', 'Single', '', '', 'Active', '', '2005-06-14', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(21, 104216, 'Valencia', 'Marietta', '', '', 'Female', '1900-03-03', '', '', 'M0303VM0', '', 'Single', '', '', 'Active', '', '2011-02-02', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(22, 104235, 'Camingal', 'Rinagen', 'A.', '', 'Female', '1971-01-01', '', '', 'M0303AR2', '', 'Single', '', '', 'Active', '', '2018-06-01', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(23, 104245, 'Nieves', 'Reynaldo', '', '', 'Male', '1971-01-01', '', '', 'M0303NR0', '', 'Single', '', '', 'Active', '', '2004-07-17', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(24, 104685, 'Mariano', 'Richard', 'A.', '', 'Male', '1900-03-03', '', '', 'M0303MR4', '', 'Single', '', '', 'Active', '', '2009-02-10', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(25, 104744, 'Brillante', 'Edna', 'R.', '', 'Female', '1900-03-03', '', '', 'M0303BE3', '', 'Single', '', '', 'Active', '', '2007-02-15', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(26, 105283, 'Umali', 'Joyce', '', '', 'Female', '1900-01-26', '', '', 'M0127UJ0', '', 'Single', '', '', 'Active', '', '2012-10-03', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(27, 105332, 'Mananghaya', 'Ludivina', 'S.', '', 'Female', '1971-01-01', '', '', 'M0712ML0', '', 'Single', '', '', 'Active', '', '2004-06-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(28, 105429, 'Soria', 'Mayreen Grace', '', '', 'Female', '1980-07-12', '', '', '', '', 'Single', '', '', 'Active', '', '2004-03-26', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(29, 105766, 'Magsakay', 'Ma. Jelyn', '', '', 'Female', '1980-07-12', '', '', '', '', 'Single', '', '', 'Active', '', '2004-08-02', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(30, 105938, 'Carbo', 'Mary Grace', '', '', 'Female', '2004-10-09', '', '', '', '', 'Single', '', '', 'Active', '', '2004-10-09', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(31, 106095, 'Roque', 'Devie', '', '', 'Female', '2004-12-13', '', '', '', '', 'Married', '', '', 'Active', '', '2004-12-13', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(32, 106261, 'Bautista', 'Richard', '', '', 'Female', '2005-02-26', '', '', '', '', 'Single', '', '', 'Active', '', '2005-02-26', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(33, 106473, 'Bantog', 'Angelita', '', '', 'Female', '2005-06-08', '', '', '', '', 'Single', '', '', 'Active', '', '2005-06-08', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(34, 106590, 'Flores Jr.', 'Bernardo', '', '', 'Male', '2005-08-02', '', '', '', '', 'Single', '', '', 'Active', '', '2005-08-02', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(35, 106708, 'Villatura', 'Daisy', '', '', 'Female', '2005-10-03', '', '', '', '', 'Single', '', '', 'Active', '', '2005-10-03', 'SM', 'ACHIEVERS', 'Adrenaline', 1.5, 0),
(36, 107010, 'Rivera', 'Rosenda', '', '', 'Female', '2006-03-22', '', '', '', '', 'Single', '', '', 'Active', '', '2006-03-22', 'SMG', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(37, 107098, 'Santos', 'Agnes', '', '', 'Female', '2006-05-17', '', '', '', '', 'Single', '', '', 'Active', '', '2006-05-17', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(38, 107203, 'Carbo', 'Leonarda', '', '', 'Female', '2006-07-17', '', '', '', '', 'Single', '', '', 'Active', '', '2004-10-09', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(39, 107311, 'Manlapaz', 'Anna Marie', '', '', 'Female', '2006-09-04', '', '', '', '', 'Single', '', '', 'Active', '', '2006-09-04', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(40, 107380, 'Aberia', 'Joseph', '', '', 'Male', '2006-10-07', '', '', '', '', 'Single', '', '', 'Active', '', '2006-10-09', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(41, 107390, 'Lim', 'Marites', '', '', 'Male', '2006-10-10', '', '', '', '', 'Single', '', '', 'Active', '', '2006-10-16', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(42, 107588, 'Villatura', 'Reynaldo', 'O', '', 'Female', '2007-01-29', '', '', '', '', 'Single', '', '', 'Active', '', '2005-10-03', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(43, 107597, 'Rodriguez', 'Rico', '', '', 'Male', '2007-01-31', '', '', '', '', 'Single', '', '', 'Active', '', '2007-02-01', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(44, 107755, 'Andan', 'Edna', 'S', '', 'Male', '2007-03-22', '', '', '', '', 'Single', '', '', 'Active', '', '2007-04-18', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(45, 107832, 'Cruz', 'Gorgonia', 'C', '', 'Male', '2007-05-31', '', '', '', '', 'Single', '', '', 'Active', '', '2007-06-02', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(46, 107957, 'Quindao', 'Asuncion', '', '', 'Male', '2007-08-24', '', '', '', '', 'Single', '', '', 'Active', '', '2007-08-28', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(47, 107989, 'Morales', 'Arlene', '', '', 'Male', '2007-09-16', '', '', '', '', 'Single', '', '', 'Active', '', '2007-09-18', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(48, 108024, 'Buquid', 'Analyn', '', '', 'Male', '2007-09-29', '', '', '', '', 'Single', '', '', 'Active', '', '2007-10-04', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(49, 108083, 'Galang', 'Josefina', 'A', '', 'Male', '2007-10-31', '', '', '', '', 'Single', '', '', 'Active', '', '2007-11-08', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(50, 108094, 'Hernando', 'Mary Ann', '', '', 'Male', '2007-11-18', '', '', '', '', 'Single', '', '', 'Active', '', '2007-11-19', 'SM', 'ACHIEVERS', 'Achievers - Direct', 1.5, 0),
(51, 108239, 'San Pedro', 'Elsa', 'R', '', 'Female', '2008-02-04', '', '', '', '', 'Single', '', '', 'Active', '', '2008-02-08', 'AVP', 'ACHIEVERS', 'Awesome', 0, 0),
(52, 108422, 'Carbo', 'Mildred', '', '', 'Female', '2008-04-25', '', '', '', '', 'Single', '', '', 'Active', '', '2008-04-28', 'AVP', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(53, 108427, 'Hernando Jr.', 'Rodolfo', '', '', 'Male', '2008-05-02', '', '', '', '', 'Single', '', '', 'Active', '', '2007-06-22', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(54, 108458, 'Guelas', 'Maylene', 'P', '', 'Female', '1977-08-21', '', '', '', '', 'Married', '33-6454233-7', '226-710-213-000', 'Active', '', '2000-07-10', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(55, 108478, 'Cruz', 'Maritess', 'M', '', 'Female', '2008-05-24', '', '', '', '', 'Single', '', '', 'Active', '', '2008-05-26', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(56, 108554, 'Cruz', 'Mercedes', 'P', '', 'Female', '2008-06-22', '', '', '', '', 'Married', '', '', 'Active', '', '1996-02-07', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(57, 108648, 'Mendoza', 'Medy', 'S', '', 'Female', '2008-08-08', '', '', '', '', 'Single', '', '', 'Active', '', '2008-08-11', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(58, 108662, 'Daquigan', 'Maria Cristina', '', '', 'Female', '2008-08-29', '', '', '', '', 'Single', '', '', 'Active', '', '2008-09-01', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(59, 108764, 'Pandacan', 'Rosemarie', '', '', 'Female', '2008-10-11', '', '', '', '', 'Single', '', '', 'Active', '', '2008-10-14', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(60, 108804, 'Flores', 'Edna', '', '', 'Female', '2008-10-31', '', '', '', '', 'Single', '', '', 'Active', '', '2008-11-06', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(61, 108828, 'Caparas', 'Geronima', 'M', '', 'Female', '2008-11-18', '', '', '', '', 'Single', '', '', 'Active', '', '2008-11-18', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(62, 108829, 'Santos', 'Marilyn', 'S', '', 'Female', '2008-11-18', '', '', '', '', 'Single', '', '', 'Active', '', '2008-11-19', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(63, 108910, 'Alcantara', 'Mary Ann', '', '', 'Female', '1980-03-16', '', '', '', '', 'Married', '', '', 'Active', '', '2009-01-13', 'SM', 'ACHIEVERS', 'Adrenaline', 1.5, 0),
(64, 108915, 'Sandoval', 'Milagros', '', '', 'Female', '1899-12-31', '', '', '', '', 'Single', '', '', 'Active', '', '2009-01-14', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(65, 108920, 'Manalad', 'Mercy', '', '', 'Female', '2009-01-09', '', '', '', '', 'Single', '', '', 'Active', '', '2009-01-15', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(66, 108941, 'Santos', 'Rodan', 'M', '', 'Male', '2009-01-23', '', '', '', '', 'Single', '', '', 'Active', '', '2009-01-26', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(67, 109036, 'Cruz', 'Puirficacion', '', '', 'Female', '2009-03-03', '', '', '', '', 'Married', '', '', 'Active', '', '2009-03-03', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(68, 109078, 'Reyes', 'Mary Ann', '', '', 'Female', '2009-03-15', '', '', '', '', 'Single', '', '', 'Active', '', '2009-03-17', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(69, 109100, 'Angeles', 'Romeo', '', '', 'Male', '2009-03-31', '', '', '', '', 'Single', '', '', 'Active', '', '2009-04-03', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(70, 109101, 'Sy', 'Myrna', '', '', 'Female', '2009-03-31', '', '', '', '', 'Single', '', '', 'Active', '', '2006-07-03', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(71, 109102, 'Santos', 'Deborah', '', '', 'Female', '2009-03-31', '', '', '', '', 'Single', '', '', 'Active', '', '2009-04-03', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(72, 109126, 'De Rueda', 'Ma. Rowena', '', '', 'Female', '2009-04-07', '', '', '', '', 'Single', '', '', 'Active', '', '2009-04-14', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(73, 109139, 'Villaluz', 'Maria', '', '', 'Female', '2009-04-19', '', '', '', '', 'Single', '', '', 'Active', '', '2009-04-21', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(74, 109166, 'Herrera', 'Bernardo', '', '', 'Male', '2009-04-30', '', '', '', '', 'Single', '', '', 'Active', '', '2009-05-05', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(75, 109169, 'Dela Cruz', 'Grace', 'M', '', 'Female', '2009-04-30', '', '', '', '', 'Single', '', '', 'Active', '', '2009-05-06', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(76, 109170, 'Calonzo', 'Maria Luisa', '', '', 'Female', '2009-05-06', '', '', '', '', 'Single', '', '', 'Active', '', '2005-01-08', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(77, 109184, 'Evangelista', 'Maria', '', '', 'Female', '2009-03-11', '', '', '', '', 'Single', '', '', 'Active', '', '2009-05-14', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(78, 109192, 'Galvez', 'Elizabeth', '', '', 'Female', '2009-05-17', '', '', '', '', 'Single', '', '', 'Active', '', '2009-05-19', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(79, 109218, 'Sabornido', 'Sophia', 'P', '', 'Female', '2009-05-29', '', '', '', '', 'Single', '', '', 'Active', '', '2009-06-03', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(80, 109219, 'Panaligan', 'Cecilia', '', '', 'Female', '2009-05-29', '', '', '', '', 'Single', '', '', 'Active', '', '2009-06-03', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(81, 109237, 'Reyes', 'Teodoro', '', '', 'Male', '2009-05-29', '', '', '', '', 'Single', '', '', 'Active', '', '2009-06-08', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(82, 109250, 'Barrun', 'Marilou', '', '', 'Female', '2009-06-14', '', '', '', '', 'Single', '', '', 'Active', '', '2004-03-24', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(83, 109267, 'Timbang', 'Juanito', '', '', 'Female', '2009-06-16', '', '', '', '', 'Single', '', '', 'Active', '', '2009-06-05', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(84, 109273, 'Manuel', 'Herminia', 'R', '', 'Female', '2009-06-29', '', '', '', '', 'Single', '', '', 'Active', '', '2009-06-30', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(85, 109278, 'Calonzo', 'Renato', '', '', 'Male', '2009-06-29', '', '', '', '', 'Single', '', '', 'Active', '', '2009-06-30', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(86, 109326, 'Lazos', 'Mary Ann', '', '', 'Female', '2009-07-19', '', '', '', '', 'Single', '', '', 'Active', '', '2009-07-20', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(87, 109354, 'Yamatsuda', 'Edlyn', 'G', '', 'Female', '2009-07-31', '', '', '', '', 'Single', '', '', 'Active', '', '2009-08-03', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(88, 109356, 'Lacanlale', 'Mary Grace', '', '', 'Female', '2009-07-31', '', '', '', '', 'Single', '', '', 'Active', '', '2009-08-03', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(89, 109370, 'Sablan', 'Jiji', 'M', '', 'Female', '2009-07-31', '', '', '', '', 'Single', '', '', 'Active', '', '2009-08-06', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(90, 109399, 'Gerona', 'Nelia', 'C', '', 'Female', '2009-08-04', '', '', '', '', 'Single', '', '', 'Active', '', '2006-04-12', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(91, 109431, 'Mangalili', 'Angelus', '', '', 'Female', '2009-08-27', '', '', '', '', 'Single', '', '', 'Active', '', '2009-08-28', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(92, 109438, 'Quijano', 'Criselda', '', '', 'Female', '2009-09-02', '', '', '', '', 'Single', '', '', 'Active', '', '2009-09-02', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(93, 109475, 'Esterban', 'Viobennyll', 'C', '', 'Male', '2009-09-14', '', '', '', '', 'Single', '', '', 'Active', '', '2009-09-16', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(94, 109477, 'Varilla', 'Eugene Dexter', '', '', 'Male', '2009-09-14', '', '', '', '', 'Single', '', '', 'Active', '', '2009-09-16', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(95, 109483, 'Gilo', 'Ma. Grazel', 'M', '', 'Female', '2009-09-20', '', '', '', '', 'Single', '', '', 'Active', '', '2009-09-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(96, 109494, 'Quiambao', 'Karen', '', '', 'Female', '2009-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2009-10-01', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(97, 109533, 'Ang', 'Rowena', 'G', '', 'Female', '2009-10-10', '', '', '', '', 'Single', '', '', 'Active', '', '2009-10-21', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(98, 109538, 'Reyes', 'Ian', 'M', '', 'Male', '2009-10-18', '', '', '', '', 'Single', '', '', 'Active', '', '2009-10-22', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(99, 109585, 'Marcos', 'Edna', '', '', 'Female', '2009-11-26', '', '', '', '', 'Single', '', '', 'Active', '', '2009-11-27', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(100, 109628, 'Perez', 'Rosario', 'E', '', 'Female', '2009-12-29', '', '', '', '', 'Single', '', '', 'Active', '', '2010-01-05', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(101, 109657, 'Taguigui', 'Pilar', 'L', '', 'Female', '2010-01-17', '', '', '', '', 'Single', '', '', 'Active', '', '2010-01-18', 'SM', 'ACHIEVERS', 'Achievers - Direct', 1.5, 0),
(102, 109661, 'Disangcopan', 'Madrigal Jehan', '', '', 'Male', '2010-01-17', '', '', '', '', 'Single', '', '', 'Active', '', '2010-01-19', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(103, 109671, 'Torres', 'Imelda', 'C', '', 'Female', '2010-01-25', '', '', '', '', 'Single', '', '', 'Active', '', '2010-01-25', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(104, 109697, 'Aguas', 'Janet', 'C', '', 'Female', '2010-02-04', '', '', '', '', 'Single', '', '', 'Active', '', '2010-02-04', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(105, 109719, 'Mercado', 'Marianita', 'C', '', 'Female', '2010-02-18', '', '', '', '', 'Single', '', '', 'Active', '', '2010-02-18', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(106, 109787, 'Caberte', 'Mary Grace', '', '', 'Female', '2010-03-22', '', '', '', '', 'Single', '', '', 'Active', '', '2010-03-22', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(107, 109918, 'Dabatos', 'Jovita', '', '', 'Female', '2010-05-18', '', '', '', '', 'Single', '', '', 'Active', '', '2010-05-18', 'SM', 'ACHIEVERS', 'Awesome', 1.5, 0),
(108, 109936, 'Robles', 'Erwin', '', '', 'Male', '2010-05-26', '', '', '', '', 'Single', '', '', 'Active', '', '2010-05-26', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(109, 109950, 'Santos', 'Luzviminda', '', '', 'Female', '2010-06-01', '', '', '', '', 'Single', '', '', 'Active', '', '2010-06-01', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(110, 109970, 'Dequina', 'Richard', '', '', 'Male', '2010-06-16', '', '', '', '', 'Single', '', '', 'Active', '', '2010-06-16', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(111, 109983, 'Villadarez', 'Evangeline', 'K.', '', 'Female', '2010-06-22', '', '', '', '', 'Single', '', '', 'Active', '', '2010-06-22', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(112, 109993, 'Bulaclac', 'Nerisa', 'J.', '', 'Female', '2010-06-24', '', '', '', '', 'Single', '', '', 'Active', '', '2010-06-24', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(113, 110011, 'Martinez', 'Lolita', '', '', 'Female', '2010-07-01', '', '', '', '', 'Single', '', '', 'Active', '', '2010-07-01', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(114, 110019, 'Matibag', 'Emerita', '', '', 'Female', '2010-07-05', '', '', '', '', 'Single', '', '', 'Active', '', '2010-07-05', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(115, 110043, 'Bombase', 'Ma. Gertrudez', '', '', 'Female', '2010-07-22', '', '', '', '', 'Single', '', '', 'Active', '', '2010-07-22', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(116, 110050, 'Robles', 'Herminia', '', '', 'Female', '2010-07-26', '', '', '', '', 'Single', '', '', 'Active', '', '2010-07-26', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(117, 110055, 'Bautista', 'Ma. Rebecca', '', '', 'Female', '2010-07-27', '', '', '', '', 'Single', '', '', 'Active', '', '2010-07-27', 'SM', 'ACHIEVERS', 'Achievers - Direct', 1.5, 0),
(118, 110065, 'Francisco', 'Ma. Melody', '', '', 'Female', '2010-08-02', '', '', '', '', 'Single', '', '', 'Active', '', '2010-08-02', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(119, 110083, 'Gallego', 'Feliciana', '', '', 'Female', '2010-08-09', '', '', '', '', 'Single', '', '', 'Active', '', '2010-08-09', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(120, 110089, 'Lazaro', 'Evangelina', '', '', 'Female', '2010-08-11', '', '', '', '', 'Single', '', '', 'Active', '', '2010-08-11', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(121, 110111, 'Tan', 'Raymond Ryan', '', '', 'Male', '2010-08-23', '', '', '', '', 'Single', '', '', 'Active', '', '2010-08-23', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(122, 110151, 'Chan', 'Elsa', 'A.', '', 'Female', '2010-09-13', '', '', '', '', 'Single', '', '', 'Active', '', '2010-09-13', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(123, 110156, 'Danga', 'Marlon', '', '', 'Male', '2010-09-14', '', '', '', '', 'Single', '', '', 'Active', '', '2010-09-14', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(124, 110173, 'Brillantes', 'Levi', '', '', 'Male', '2010-09-27', '', '', '', '', 'Single', '', '', 'Active', '', '2010-09-27', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(125, 110224, 'Torres', 'Alice', 'Q.', '', 'Female', '2010-10-19', '', '', '', '', 'Single', '', '', 'Active', '', '2010-10-19', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(126, 110249, 'Dela Cruz', 'Ma. Luisa', '', '', 'Female', '2010-11-02', '', '', '', '', 'Single', '', '', 'Active', '', '2010-11-02', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(127, 110297, 'Ordinario', 'Mary Grace', 'R.', '', 'Female', '2010-12-13', '', '', '', '', 'Single', '', '', 'Active', '', '2010-12-13', 'SM', 'VP/DIRECTOR OF SALES', 'Sm/pc', 1.5, 0),
(128, 110313, 'Urbano', 'Jocelyn', '', '', 'Female', '2010-12-16', '', '', '', '', 'Single', '', '', 'Active', '', '2010-12-16', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(129, 110320, 'Santiago', 'Diana Gwen', '', '', 'Female', '2010-12-28', '', '', '', '', 'Single', '', '', 'Active', '', '2010-12-28', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(130, 110376, 'Catacutan', 'Gazelle', '', '', 'Female', '2011-01-21', '', '', '', '', 'Single', '', '', 'Active', '', '2011-01-21', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(131, 110378, 'Arriola', 'Elvira', 'S.', '', 'Female', '2011-01-21', '', '', '', '', 'Single', '', '', 'Active', '', '2011-01-21', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(132, 110381, 'Capisonda', 'Bernadette', '', '', 'Female', '2011-01-25', '', '', '', '', 'Single', '', '', 'Active', '', '2011-01-25', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(133, 110456, 'San Pedro', 'Ramil', '', '', 'Male', '2011-02-18', '', '', '', '', 'Single', '', '', 'Active', '', '2011-02-18', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(134, 110469, 'Peneyra', 'Nerisa', '', '', 'Female', '2011-02-21', '', '', '', '', 'Single', '', '', 'Active', '', '2011-02-21', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(135, 110474, 'Nacional', 'Rogelio', '', '', 'Male', '2011-02-24', '', '', '', '', 'Single', '', '', 'Active', '', '2011-02-24', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(136, 110480, 'Ongkeko', 'Amalia', 'V.', '', 'Female', '2011-02-24', '', '', '', '', 'Single', '', '', 'Active', '', '2011-02-24', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(137, 110517, 'Ramirez', 'Carolina', '', '', 'Female', '2011-03-08', '', '', '', '', 'Single', '', '', 'Active', '', '2011-03-08', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(138, 110552, 'Carbo', 'Jimmel', '', '', 'Male', '2011-03-31', '', '', '', '', 'Single', '', '', 'Active', '', '2011-03-31', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(139, 110553, 'Clemente', 'Joy Angeline', '', '', 'Female', '2011-03-31', '', '', '', '', 'Single', '', '', 'Active', '', '2011-03-31', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(140, 110568, 'Peneyra', 'Baldwin', 'M.', '', 'Male', '2011-04-05', '', '', '', '', 'Single', '', '', 'Active', '', '2011-04-05', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(141, 110570, 'Tan', 'Leticia', 'S.', '', 'Female', '2011-04-06', '', '', '', '', 'Single', '', '', 'Active', '', '2011-04-06', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(142, 110607, 'Santiago', 'Evelyn', '', '', 'Female', '2011-04-24', '', '', '', '', 'Single', '', '', 'Active', '', '2011-04-27', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(143, 110610, 'Valenzuela', 'Melody', 'P.', '', 'Female', '2011-04-28', '', '', '', '', 'Single', '', '', 'Active', '', '2011-04-28', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(144, 110634, 'Manansala', 'Angelito', '', '', 'Female', '2011-05-05', '', '', '', '', 'Single', '', '', 'Active', '', '2011-05-05', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(145, 110658, 'Garcia', 'Aldwin', 'L.', '', 'Male', '2011-05-19', '', '', '', '', 'Single', '', '', 'Active', '', '2011-05-19', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(146, 110663, 'Ramat', 'Merlito', '', '', 'Female', '2011-05-20', '', '', '', '', 'Single', '', '', 'Active', '', '2011-05-20', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(147, 110673, 'Sevilla', 'Lucila', '', '', 'Female', '2011-05-31', '', '', '', '', 'Single', '', '', 'Active', '', '2011-05-31', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(148, 110675, 'Juliano', 'Giselda', '', '', 'Female', '2011-05-31', '', '', '', '', 'Single', '', '', 'Active', '', '2011-05-31', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(149, 110687, 'Magsakay', 'Pamela', 'Z.', '', 'Female', '2011-06-01', '', '', '', '', 'Single', '', '', 'Active', '', '2011-06-01', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(150, 110717, 'Flores', 'Lucita', '', '', 'Female', '2011-06-21', '', '', '', '', 'Single', '', '', 'Active', '', '2011-06-21', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(151, 110741, 'Geronimo', 'Renier', '', '', 'Male', '2011-06-30', '', '', '', '', 'Single', '', '', 'Active', '', '2011-06-30', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(152, 110742, 'Nabong', 'Gladys', 'T.', '', 'Female', '2011-06-30', '', '', '', '', 'Single', '', '', 'Active', '', '2011-06-30', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(153, 110753, 'Rodriguez', 'Archie', '', '', 'Male', '2011-07-01', '', '', '', '', 'Single', '', '', 'Active', '', '2011-07-01', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(154, 110759, 'Hilario', 'Corazon', '', '', 'Female', '2011-07-04', '', '', '', '', 'Single', '', '', 'Active', '', '2009-12-23', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(155, 110775, 'Figueroa', 'Flordeliza', '', '', 'Female', '2011-07-11', '', '', '', '', 'Single', '', '', 'Active', '', '2011-07-11', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(156, 110781, 'Alfaro', 'Wilma', '', '', 'Female', '2011-07-18', '', '', '', '', 'Single', '', '', 'Active', '', '2011-07-18', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(157, 110789, 'Gutierrez', 'John Robert', 'S.', '', 'Male', '2011-07-21', '', '', '', '', 'Single', '', '', 'Active', '', '2011-07-21', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(158, 110791, 'Dela Cruz', 'Gerlie Ann', '', '', 'Female', '2011-07-21', '', '', '', '', 'Single', '', '', 'Active', '', '2011-07-21', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(159, 110806, 'Santos', 'Charmaine', 'C.', '', 'Female', '2011-07-29', '', '', '', '', 'Single', '', '', 'Active', '', '2011-07-29', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(160, 110824, 'Tan', 'Micah Blessy', '', '', 'Female', '2011-08-05', '', '', '', '', 'Single', '', '', 'Active', '', '2011-08-05', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(161, 110861, 'Flores', 'Rosita', '', '', 'Female', '2011-09-01', '', '', '', '', 'Single', '', '', 'Active', '', '2011-09-01', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(162, 110883, 'Agra', 'Karen', '', '', 'Female', '2011-08-31', '', '', '', '', 'Single', '', '', 'Active', '', '2011-09-05', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(163, 110908, 'Cruz', 'Manolito', '', '', 'Male', '2011-07-29', '', '', '', '', 'Single', '', '', 'Active', '', '2011-09-20', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(164, 110950, 'Rodriguez', 'Maricel', 'P', '', 'Female', '2011-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2011-10-06', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(165, 110983, 'Vergara', 'Shirley', '', '', 'Female', '2011-10-16', '', '', '', '', 'Single', '', '', 'Active', '', '2011-10-24', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(166, 111006, 'Geronimo', 'Ederlyn Muriel', '', '', 'Female', '2011-10-28', '', '', '', '', 'Single', '', '', 'Active', '', '2011-11-03', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(167, 111034, 'Yambao', 'Rowena', '', '', 'Female', '2011-10-28', '', '', '', '', 'Single', '', '', 'Active', '', '2011-11-18', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(168, 111047, 'Buhain', 'Reynan', 'E', '', 'Male', '2011-11-27', '', '', '', '', 'Single', '', '', 'Active', '', '2011-12-01', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(169, 111078, 'Tuazon', 'Sheena', '', '', 'Male', '2011-12-11', '', '', '', '', 'Single', '', '', 'Active', '', '2011-12-14', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(170, 111113, 'Del Rosario', 'Rowena', 'A', '', 'Female', '2012-01-08', '', '', '', '', 'Single', '', '', 'Active', '', '2012-01-10', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(171, 111124, 'Arceo', 'Marianne', 'M', '', 'Female', '2012-01-08', '', '', '', '', 'Single', '', '', 'Active', '', '2012-01-11', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(172, 111126, 'Bolado', 'Zenaida', '', '', 'Female', '2012-01-08', '', '', '', '', 'Single', '', '', 'Active', '', '2012-01-13', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(173, 111130, 'Arthur', 'Maria Teresa', '', '', 'Female', '2012-01-15', '', '', '', '', 'Single', '', '', 'Active', '', '2012-01-17', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(174, 111139, 'Valdez', 'Rosella', '', '', 'Female', '2012-01-15', '', '', '', '', 'Single', '', '', 'Active', '', '2012-01-20', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(175, 111143, 'Romasanta', 'Christine Lorraine', 'D', '', 'Female', '2012-01-19', '', '', '', '', 'Single', '', '', 'Active', '', '2012-01-20', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(176, 111144, 'Idio', 'Jilly Lyneth', 'O', '', 'Female', '2012-01-18', '', '', '', '', 'Single', '', '', 'Active', '', '2012-01-20', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(177, 111171, 'Garcia', 'Necita', '', '', 'Female', '2012-01-31', '', '', '', '', 'Single', '', '', 'Active', '', '2012-02-06', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(178, 111188, 'Cristobal', 'Aiza', 'G', '', 'Female', '2012-02-05', '', '', '', '', 'Single', '', '', 'Active', '', '2012-02-10', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(179, 111191, 'Fajardo', 'Ian', '', '', 'Male', '2012-02-05', '', '', '', '', 'Single', '', '', 'Active', '', '2012-02-10', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(180, 111201, 'Pascual', 'Michelle', '', '', 'Female', '2012-02-12', '', '', '', '', 'Single', '', '', 'Active', '', '2012-02-15', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(181, 111223, 'Gutierrez', 'Teresa', 'P', '', 'Female', '2012-02-27', '', '', '', '', 'Single', '', '', 'Active', '', '2012-03-01', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(182, 111226, 'Fajardo', 'Julito', 'S', '', 'Male', '2012-02-27', '', '', '', '', 'Single', '', '', 'Active', '', '2012-03-02', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(183, 111227, 'Munoz', 'George', 'P', '', 'Male', '2012-02-29', '', '', '', '', 'Single', '', '', 'Active', '', '2012-03-05', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(184, 111260, 'Gonzales', 'Linela', '', '', 'Female', '2012-03-11', '', '', '', '', 'Single', '', '', 'Active', '', '2012-03-14', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(185, 111268, 'Montes', 'Nimfa', '', '', 'Female', '2012-03-22', '', '', '', '', 'Single', '', '', 'Active', '', '2012-03-27', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(186, 111291, 'Amurao', 'Aaron Jehrome', '', '', 'Male', '2012-04-10', '', '', '', '', 'Single', '', '', 'Active', '', '2012-04-10', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(187, 111298, 'Bantog', 'Feliza', '', '', 'Female', '2012-03-30', '', '', '', '', 'Single', '', '', 'Active', '', '2012-04-10', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(188, 111304, 'Grospe', 'Maricel', '', '', 'Female', '2012-03-30', '', '', '', '', 'Single', '', '', 'Active', '', '2012-04-11', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(189, 111308, 'Dumaguete', 'Janneth', 'R', '', 'Female', '2012-03-16', '', '', '', '', 'Single', '', '', 'Active', '', '2012-04-16', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(190, 111311, 'Jimenez', 'Ronalyn', 'P', '', 'Female', '2012-04-11', '', '', '', '', 'Single', '', '', 'Active', '', '2012-04-17', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(191, 111317, 'Ramirez', 'Julie Ann', 'C', '', 'Female', '2012-03-27', '', '', '', '', 'Single', '', '', 'Active', '', '2012-04-19', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(192, 111353, 'Alcoriza', 'Mylene', 'T', '', 'Female', '2012-04-29', '', '', '', '', 'Single', '', '', 'Active', '', '2012-04-10', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(193, 111369, 'Dela Pena', 'Ma. Rosalinda', 'Dc', '', 'Female', '2012-05-07', '', '', '', '', 'Single', '', '', 'Active', '', '2012-05-25', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(194, 111379, 'Sotta', 'Matilde', '', '', 'Female', '2012-04-29', '', '', '', '', 'Single', '', '', 'Active', '', '2012-06-01', 'SM', 'ACHIEVERS', 'Awesome', 1.5, 0),
(195, 111412, 'Javier', 'Brian', '', '', 'Male', '2012-05-31', '', '', '', '', 'Single', '', '', 'Active', '', '2012-06-19', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(196, 111423, 'Dela Cruz', 'Katherine', 'B', '', 'Female', '2012-06-24', '', '', '', '', 'Single', '', '', 'Active', '', '2012-06-28', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(197, 111434, 'Privaldos', 'Maricris', 'V', '', 'Female', '2012-06-26', '', '', '', '', 'Single', '', '', 'Active', '', '2012-07-03', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(198, 111435, 'Lopez', 'Armelinda', 'A.', '', 'Female', '2012-07-03', '', '', '', '', 'Single', '', '', 'Active', '', '2012-07-03', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(199, 111463, 'Timbang', 'Milie', 'C', '', 'Female', '2012-05-31', '', '', '', '', 'Single', '', '', 'Active', '', '2012-07-12', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(200, 111482, 'Russel', 'Gorgonia', '', '', 'Female', '2012-07-29', '', '', '', '', 'Single', '', '', 'Active', '', '2012-08-01', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(201, 111487, 'Clemente', 'Icy Angeline', '', '', 'Female', '2012-07-31', '', '', '', '', 'Single', '', '', 'Active', '', '2012-08-03', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(202, 111521, 'Alejandro', 'Ariel', 'C', '', 'Male', '2012-08-24', '', '', '', '', 'Single', '', '', 'Active', '', '2012-08-28', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(203, 111537, 'Cunan', 'Cherry', 'D', '', 'Female', '2012-08-22', '', '', '', '', 'Single', '', '', 'Active', '', '2012-09-04', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(204, 111555, 'Martinez', 'Candy', 'P', '', 'Female', '2012-08-19', '', '', '', '', 'Single', '', '', 'Active', '', '2012-09-14', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(205, 111613, 'Manalaysay', 'Elizabeth', '', '', 'Female', '2012-10-23', '', '', '', '', 'Single', '', '', 'Active', '', '2012-10-29', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(206, 111627, 'Bautista', 'Gerardo', 'J', '', 'Male', '2012-10-31', '', '', '', '', 'Single', '', '', 'Active', '', '2012-11-07', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(207, 111669, 'Dela Paz', 'Mark Joseph', 'F', '', 'Male', '2012-12-18', '', '', '', '', 'Single', '', '', 'Active', '', '2012-12-26', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(208, 111672, 'Reyes', 'Edgar', '', '', 'Female', '2012-12-28', '', '', '', '', 'Single', '', '', 'Active', '', '2012-12-28', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(209, 111688, 'Bautista', 'Daisy', '', '', 'Female', '2013-01-08', '', '', '', '', 'Single', '', '', 'Active', '', '2011-03-01', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(210, 111697, 'Sotta', 'Reynan', 'V', '', 'Male', '2013-01-13', '', '', '', '', 'Single', '', '', 'Active', '', '2012-06-01', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(211, 111711, 'Ferrer', 'Norielia', '', '', 'Female', '2013-01-10', '', '', '', '', 'Single', '', '', 'Active', '', '2013-01-29', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(212, 111750, 'Salmos', 'Jaypee', '', '', 'Male', '2013-02-07', '', '', '', '', 'Single', '', '', 'Active', '', '2013-02-13', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(213, 111756, 'Carbo', 'Melissa', 'M', '', 'Female', '2013-02-15', '', '', '', '', 'Single', '', '', 'Active', '', '2013-02-18', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(214, 111770, 'Torres', 'Liezl', 'R', '', 'Female', '2013-02-26', '', '', '', '', 'Single', '', '', 'Active', '', '2013-02-27', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(215, 111773, 'Alvaro', 'Michael', '', '', 'Male', '2013-02-24', '', '', '', '', 'Single', '', '', 'Active', '', '2008-04-24', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(216, 111797, 'Mallari', 'Noelito', 'I', '', 'Male', '2013-03-11', '', '', '', '', 'Single', '', '', 'Active', '', '2013-03-15', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(217, 111804, 'Manlapig', 'Ma. Victoria', '', '', 'Female', '2013-03-21', '', '', '', '', 'Single', '', '', 'Active', '', '2013-03-25', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(218, 111806, 'Reyes', 'Ciela', 'N', '', 'Female', '2013-03-20', '', '', '', '', 'Single', '', '', 'Active', '', '2013-03-25', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(219, 111811, 'Mercado', 'Samantha Elaine', '', '', 'Female', '2013-03-20', '', '', '', '', 'Single', '', '', 'Active', '', '2013-04-01', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(220, 111844, 'Cruz', 'Jhoane', '', '', 'Female', '2013-04-14', '', '', '', '', 'Single', '', '', 'Active', '', '2013-04-16', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(221, 111853, 'Benson', 'Katherine Louise', 'C.', '', 'Female', '2013-04-15', '', '', '', '', 'Single', '', '', 'Active', '', '2013-04-18', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(222, 111863, 'Santiago', 'Rhodora', '', '', 'Female', '2013-04-22', '', '', '', '', 'Single', '', '', 'Active', '', '2013-04-24', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(223, 111864, 'Danga', 'Demy', '', '', 'Male', '2013-02-22', '', '', '', '', 'Single', '', '', 'Active', '', '2013-04-24', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(224, 111867, 'Ocampo', 'Lolita', '', '', 'Female', '2013-04-24', '', '', '', '', 'Single', '', '', 'Active', '', '2013-04-24', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(226, 111873, 'Alberto', 'Rica', 'C', '', 'Female', '2013-04-28', '', '', '', '', 'Single', '', '', 'Active', '', '2013-04-29', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(227, 111896, 'Canto', 'Eulogia', '', '', 'Female', '2013-05-09', '', '', '', '', 'Single', '', '', 'Active', '', '2013-05-10', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(228, 111905, 'De Leon', 'Osmond', 'L', '', 'Male', '2013-05-21', '', '', '', '', 'Single', '', '', 'Active', '', '2013-05-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(229, 111906, 'Maniego', 'Jenarose', '', '', 'Female', '2013-07-07', '', '', '', '', 'Single', '', '', 'Active', '', '2013-05-23', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(230, 111907, 'Maniego', 'Paulo Edwin', '', '', 'Male', '2013-07-07', '', '', '', '', 'Single', '', '', 'Active', '', '2013-05-24', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(231, 111915, 'Santos', 'Helen', 'C', '', 'Male', '2013-05-27', '', '', '', '', 'Single', '', '', 'Active', '', '2013-05-29', 'MA', 'ACHIEVERS', 'Acts', 0, 0),
(232, 111943, 'Benedictos', 'Aiza', '', '', 'Female', '2013-06-17', '', '', '', '', 'Single', '', '', 'Active', '', '2013-06-18', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(233, 111954, 'Santiago', 'Louie', '', '', 'Male', '2013-06-24', '', '', '', '', 'Single', '', '', 'Active', '', '2013-06-26', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(234, 111969, 'Vinoya', 'Dorothy May', '', '', 'Female', '2013-07-05', '', '', '', '', 'Single', '', '', 'Active', '', '2008-04-01', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(235, 111973, 'Cogama', 'Dorotea', '', '', 'Female', '2013-07-08', '', '', '', '', 'Single', '', '', 'Active', '', '2013-07-15', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(236, 111987, 'Soto', 'Marina', 'O', '', 'Female', '2013-06-28', '', '', '', '', 'Single', '', '', 'Active', '', '2005-10-03', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(237, 112007, 'Heredia', 'Alfredo', '', '', 'Male', '2013-07-31', '', '', '', '', 'Single', '', '', 'Active', '', '2013-08-07', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(238, 112023, 'Alfonso', 'Perla', 'B', '', 'Female', '2013-08-14', '', '', '', '', 'Single', '', '', 'Active', '', '2013-08-23', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(239, 112037, 'Almario', 'Sandra', '', '', 'Female', '2013-08-28', '', '', '', '', 'Single', '', '', 'Active', '', '2013-09-03', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(240, 112047, 'Meneses', 'Carmen', '', '', 'Female', '2013-08-30', '', '', '', '', 'Single', '', '', 'Active', '', '2013-09-05', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(241, 112057, 'Rodriguez', 'Charlene', '', '', 'Female', '2013-08-30', '', '', '', '', 'Single', '', '', 'Active', '', '2013-09-09', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(242, 112076, 'Manzano', 'Elieta', 'B', '', 'Female', '2013-09-20', '', '', '', '', 'Single', '', '', 'Active', '', '2013-09-25', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(243, 112113, 'Parinas', 'Agustin', 'C', '', 'Male', '2013-10-14', '', '', '', '', 'Single', '', '', 'Active', '', '2006-07-03', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(244, 112116, 'Lazaro', 'Rogelyn', '', '', 'Female', '2013-10-08', '', '', '', '', 'Single', '', '', 'Active', '', '2013-10-18', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(245, 112117, 'Avendano', 'Fe', '', '', 'Female', '2013-10-16', '', '', '', '', 'Single', '', '', 'Active', '', '2013-10-18', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(246, 112133, 'Ramirez', 'Agrifina', 'F', '', 'Female', '2013-10-25', '', '', '', '', 'Single', '', '', 'Active', '', '2013-10-30', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(247, 112140, 'Alsaihati', 'Alice', 'A', '', 'Female', '2013-10-27', '', '', '', '', 'Single', '', '', 'Active', '', '2013-11-04', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(248, 112161, 'Nanol', 'Jean Mae', 'Dy', '', 'Female', '2013-11-19', '', '', '', '', 'Single', '', '', 'Active', '', '2013-11-20', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(249, 112185, 'Valencia', 'Jonathan', '', '', 'Male', '2013-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2013-12-10', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(250, 112188, 'Watanabe', 'Luzviminda', 'D', '', 'Female', '2013-11-26', '', '', '', '', 'Single', '', '', 'Active', '', '2013-12-11', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(251, 112194, 'Taberdo', 'Hermie', '', '', 'Female', '2013-12-22', '', '', '', '', 'Single', '', '', 'Active', '', '2013-12-26', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(252, 112212, 'Miranda', 'Charmaine', 'V', '', 'Female', '2014-01-02', '', '', '', '', 'Single', '', '', 'Active', '', '2014-01-10', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(253, 112227, 'Santos', 'Violeta', 'C', '', 'Female', '2014-01-13', '', '', '', '', 'Single', '', '', 'Active', '', '2014-01-15', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(254, 112230, 'Yoneda', 'Chellimar', '', '', 'Female', '2014-01-17', '', '', '', '', 'Single', '', '', 'Active', '', '2014-01-20', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(255, 112248, 'Nieves', 'Reycel Marie', '', '', 'Female', '2014-01-22', '', '', '', '', 'Single', '', '', 'Active', '', '2014-01-27', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(256, 112252, 'Zartiga', 'Josie Ann', 'A', '', 'Female', '2014-01-27', '', '', '', '', 'Single', '', '', 'Active', '', '2014-01-29', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(257, 112266, 'Tacandong', 'Karen', 'M', '', 'Female', '2014-01-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-02-07', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(258, 112283, 'Gabriel', 'Janice', 'T', '', 'Female', '2014-01-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-02-10', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(259, 112304, 'De Leon', 'Daisy', 'P', '', 'Female', '2014-02-09', '', '', '', '', 'Single', '', '', 'Active', '', '2014-02-13', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(260, 112312, 'Jimenez', 'Archie', 'L', '', 'Male', '2014-02-12', '', '', '', '', 'Single', '', '', 'Active', '', '2014-02-14', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(261, 112314, 'Samson', 'Martie', 'G', '', 'Male', '2014-02-07', '', '', '', '', 'Single', '', '', 'Active', '', '2014-02-14', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(262, 112340, 'Mananghaya', 'Sarah', '', '', 'Female', '2014-02-14', '', '', '', '', 'Single', '', '', 'Active', '', '2014-02-26', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(263, 112348, 'Chico', 'Emeriza', '', '', 'Female', '2014-02-28', '', '', '', '', 'Single', '', '', 'Active', '', '2014-03-04', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(264, 112352, 'Arnejo', 'Adelfa', 'C', '', 'Female', '2014-02-28', '', '', '', '', 'Single', '', '', 'Active', '', '2014-03-07', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(265, 112360, 'Mariano', 'Marlyn', 'A', '', 'Female', '2014-02-28', '', '', '', '', 'Single', '', '', 'Active', '', '2014-03-07', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(266, 112387, 'Francisco', 'Rosanne', '', '', 'Female', '2014-03-23', '', '', '', '', 'Single', '', '', 'Active', '', '2014-03-25', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(267, 112401, 'Posillo', 'Marielle', '', '', 'Female', '2014-03-27', '', '', '', '', 'Single', '', '', 'Active', '', '2014-03-28', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(268, 112425, 'Espinola', 'Angelita', '', '', 'Female', '2014-03-31', '', '', '', '', 'Single', '', '', 'Active', '', '2014-04-04', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(269, 112462, 'Agustin', 'Angie', '', '', 'Female', '2014-04-23', '', '', '', '', 'Single', '', '', 'Active', '', '2014-05-07', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(270, 112482, 'Varilla', 'Kristel', '', '', 'Female', '2014-04-25', '', '', '', '', 'Single', '', '', 'Active', '', '2014-05-12', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(271, 112498, 'Ramos', 'Reymundo', '', '', 'Male', '2014-05-16', '', '', '', '', 'Single', '', '', 'Active', '', '2014-05-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(272, 112510, 'King', 'Isabelita', '', '', 'Male', '2014-05-20', '', '', '', '', 'Single', '', '', 'Active', '', '2014-05-30', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(273, 112516, 'Tabalbag', 'Gil', 'D', '', 'Male', '2014-02-10', '', '', '', '', 'Single', '', '', 'Active', '', '2014-06-03', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(274, 112533, 'Acobo', 'Shiela', 'B.', '', 'Female', '2014-05-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-06-10', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(275, 112579, 'Calderon', 'Ronalyn', '', '', 'Female', '2014-06-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-07-10', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(276, 112595, 'Villafuerte', 'Maricel', 'S', '', 'Female', '2014-06-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-07-14', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(277, 112599, 'Mercado', 'Irene', '', '', 'Female', '2014-07-14', '', '', '', '', 'Single', '', '', 'Active', '', '2014-07-21', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(278, 112606, 'Singson', 'Michael', '', '', 'Male', '2014-07-13', '', '', '', '', 'Single', '', '', 'Active', '', '2014-07-24', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(279, 112607, 'Singson', 'Noviemae', '', '', 'Female', '2014-07-13', '', '', '', '', 'Single', '', '', 'Active', '', '2014-07-24', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(280, 112636, 'Gabriel', 'Gina', '', '', 'Female', '2014-08-13', '', '', '', '', 'Single', '', '', 'Active', '', '2014-08-14', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(281, 112646, 'Crisostomo', 'Jonas Arnel', 'Dc', '', 'Male', '2014-07-25', '', '', '', '', 'Single', '', '', 'Active', '', '2014-09-02', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(282, 112658, 'Sison', 'Elena', '', '', 'Female', '2014-08-31', '', '', '', '', 'Single', '', '', 'Active', '', '2014-09-08', 'MA', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(283, 112661, 'Castro', 'Andrea', 'E', '', 'Female', '2014-08-31', '', '', '', '', 'Single', '', '', 'Active', '', '2014-09-09', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(284, 112689, 'De Castro', 'Lucilo', '', '', 'Male', '2014-09-14', '', '', '', '', 'Single', '', '', 'Active', '', '2014-09-30', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(285, 112706, 'Crecencio', 'Carolina', '', '', 'Female', '2014-08-31', '', '', '', '', 'Single', '', '', 'Active', '', '2014-10-09', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(286, 112710, 'Formento, Jr.', 'Rodolfo', '', '', 'Male', '2014-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2004-04-05', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(287, 112715, 'Fajardo', 'Cherry Rose', 'B', '', 'Female', '2014-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-10-10', 'MA', 'ACHIEVERS', 'Amazing', 0, 0),
(288, 112716, 'Banaban', 'Alona', '', '', 'Female', '2014-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-10-10', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(289, 112727, 'Mabini', 'Karen', '', '', 'Female', '2014-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2014-10-13', 'MA', 'ACHIEVERS', 'Achievers - Direct', 0, 0),
(290, 112763, 'Dawang', 'Regina', '', '', 'Female', '1899-12-31', '', '', '', '', 'Single', '', '', 'Active', '', '2014-11-10', 'MA', 'ACHIEVERS', 'Awesome', 0, 0),
(291, 112770, 'Rodriguez', 'Alma', 'R', '', 'Female', '2014-10-31', '', '', '', '', 'Single', '', '', 'Active', '', '2014-11-12', 'MA', 'ACHIEVERS', 'Awesome', 0, 0);
INSERT INTO `t_agents` (`id`, `c_code`, `c_last_name`, `c_first_name`, `c_middle_initial`, `c_nick_name`, `c_sex`, `c_birthdate`, `c_birth_place`, `c_address_ln1`, `c_address_ln2`, `c_tel_no`, `c_civil_status`, `c_sss_no`, `c_tin`, `c_status`, `c_recruited_by`, `c_hire_date`, `c_position`, `c_network`, `c_division`, `c_rate`, `c_withholding_tax`) VALUES
(292, 112784, 'Angeles', 'Lenita', '', '', 'Female', '2014-11-13', '', '', '', '', 'Single', '', '', 'Active', '', '2014-11-20', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(293, 112794, 'Felipe', 'Maria Vilma', 'S', '', 'Female', '2014-11-25', '', '', '', '', 'Single', '', '', 'Active', '', '2014-11-27', 'MA', 'ACHIEVERS', 'Adrenaline', 0, 0),
(294, 112857, 'Vice President', 'Sales', '', '', 'Male', '2015-01-01', '', '', '', '', 'Single', '', '', 'Active', '', '2015-01-01', 'VPS', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(295, 112858, 'Director', 'Sales', '', '', 'Male', '2015-01-01', '', '', '', '', 'Single', '', '', 'Active', '', '2015-01-01', 'DS', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(296, 112859, 'Presidents', 'Direct', '', '', 'Male', '2015-01-01', '', '', '', '', 'Single', '', '', 'Active', '', '2015-01-01', 'PD', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(297, 112860, 'Psmi', '', '', '', 'Male', '2015-01-01', '', '', '', '', 'Single', '', '', 'Active', '', '2015-01-01', 'PSMI', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(298, 112861, 'Victoria', 'Marie Sheane', 'Del Rosario', '', 'Male', '2015-10-29', '', '', '', '', 'Single', '', '', 'Active', '', '2015-10-29', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(299, 112862, 'Victorio', 'Amos', '', '', 'Male', '2016-02-01', '', '', '', '', 'Single', '', '', 'Active', '', '2016-02-02', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(300, 112863, 'Remax Premier', 'Real Estate Manila Inc.', '', '', 'Male', '2016-01-01', '', '', '', '', 'Single', '', '', 'Active', '', '2016-01-01', 'Remax', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(301, 112871, 'Rodriguez', 'Wendy', '', '', 'Female', '2017-06-20', '', '', '', '', 'Married', '', '', 'Active', '', '2017-06-20', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(302, 112874, 'Fonbuena', 'Pacifico', '', '', 'Male', '2017-07-24', '', '', '', '', 'Single', '', '', 'Active', '', '2017-07-26', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(303, 112875, 'Borlongan', 'Violeta', '', '', 'Female', '2017-07-31', '', '', '', '', 'Married', '', '', 'Active', '', '2017-08-01', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(304, 112880, 'Francisco', 'Angelito', '', '', 'Male', '2017-09-23', '', '', '', '', 'Single', '', '', 'Active', '', '2017-09-23', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(305, 112881, 'Gonzales', 'Verlyn', '', '', 'Female', '1992-11-20', '', '', '', '', 'Single', '', '', 'Active', '', '2017-06-28', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(306, 112883, 'Luces', 'Rei', '', '', 'Male', '2017-09-29', '', '', '', '', 'Single', '', '', 'Active', '', '2017-09-29', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(307, 112886, 'Santiago', 'Rhoda', 'B', '', 'Female', '2017-11-02', '', '', '', '', 'Single', '', '', 'Active', '', '2017-11-02', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(308, 112887, 'Cruz', 'Janine', 'B.', '', 'Female', '1917-11-03', '', '', '', '', 'Single', '', '', 'Active', '', '2017-11-03', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(309, 112889, 'Cajucom', 'Marygrace', '', '', 'Female', '1976-07-07', '', '', '', '', 'Married', '', '', 'Active', '', '2000-02-10', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(310, 112890, 'Dela Cruz', 'Ethelmae', '', 'Ethel', 'Female', '1979-07-12', '', '', '', '', 'Single', '33-4813223-9', '300-098-813-000', 'Active', '', '2018-01-05', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(311, 112892, 'Benedictos', 'Michael', '', '', 'Male', '1971-01-01', '', '', '', '', 'Single', '', '', 'Active', '', '2018-01-24', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(312, 112893, 'Delos Santos', 'Merlyn', 'Pangan', 'Len', 'Female', '1978-07-10', '', '', '', '', 'Single', '33-4133078-2', '219-406-636    ', 'Active', '', '2018-02-06', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(313, 112894, 'Rodil', 'Celso', '', '', 'Male', '1972-09-15', '', '', '', '', 'Single', '33-6315912-9', '916-885-715-000', 'Active', '', '2018-02-20', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(314, 112895, 'Palencia', 'Nilo', '', '', 'Male', '1960-01-22', '', '', '', '', 'Married', '03-9098049-0', '115-834-946-000', 'Active', '', '2018-02-26', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(315, 112897, 'San Pedro', 'Rosalyn', 'Bulaong', '', 'Female', '1975-07-26', '', '', '', '', 'Married', '33-2791649-2', '903-705-238-000', 'Active', '', '2018-03-02', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(316, 112898, 'De Jesus', 'Victor', '', '', 'Male', '1972-07-28', '', '', '', '', 'Married', '33-2603621-8', '226-715-145-000', 'Active', '', '2018-03-08', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(317, 112900, 'Figueroa', 'Eliza', '', '', 'Female', '1980-11-10', '', '', '', '', 'Married', '33-5884885-6', '234-599-268-000', 'Active', '', '2018-03-13', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(318, 112901, 'Saad', 'Gerry', '', '', 'Male', '1964-02-05', '', '', '', '', 'Single', '03-8768316-6', '911-503-277-000', 'Active', '', '2018-04-18', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(319, 112904, 'Castillo', 'May Kathyrine', '', '', 'Female', '1993-01-26', '', '', '', '', 'Single', '34-3997336-5', '315-397-294-000', 'Active', '', '2018-06-04', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(320, 112905, 'Borlongan', 'Violeta', '', '', 'Female', '2018-06-13', '', '', '', '', 'Single', '', '', 'Active', '', '2018-06-13', 'SM', 'VP/DIRECTOR OF SALES', 'Sm/pc', 1.5, 0),
(321, 112906, 'Posillo', 'Ma. Lourdes', '', '', 'Female', '2018-06-20', '', '', '', '', 'Single', '', '', 'Active', '', '2018-06-20', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(322, 112907, 'Cruz', 'Teresita', 'G', '', 'Female', '2018-06-20', '', '', '', '', 'Single', '', '', 'Active', '', '2018-06-20', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(323, 112909, 'Santos', 'Zandro Lemuel', '', '', 'Male', '2018-07-23', '', '', '', '', 'Single', '', '', 'Active', '', '2018-07-23', 'DS', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(324, 112910, 'Javier', 'Sheila May', '', '', 'Female', '2018-07-27', '', '', '', '', 'Single', '', '', 'Active', '', '2018-07-27', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(325, 112912, 'Concepcion', 'Danilo', '', '', 'Male', '2018-08-02', '', '', '', '', 'Single', '', '', 'Active', '', '2018-08-02', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(326, 112913, 'Cruz Iii', 'Eusebio', '', '', 'Male', '2018-08-07', '', '', '', '', 'Single', '', '', 'Active', '', '2018-08-07', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(327, 112914, 'Sanchez', 'Liezl', 'Sg', 'Matet', 'Female', '1984-12-02', '', '', '', '', 'Single', '', '', 'Active', '', '2018-08-14', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(328, 112915, 'Reyes', 'Ma. Cecilia', 'B.', '', 'Female', '2018-09-12', '', '', '', '', 'Single', '', '', 'Active', '', '2018-09-12', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(329, 112917, 'Geronimo Jr', 'Mariano', '', '', 'Male', '2018-09-24', '', '', '', '', 'Single', '', '', 'Active', '', '2018-09-25', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(330, 112919, 'Caballero', 'Mary Jean', '', '', 'Female', '1977-10-05', '', '', '', '', 'Single', '33-2587940-5', '480-493-451-000', 'Active', '', '2018-09-28', 'SM', 'VP/DIRECTOR OF SALES', 'Sm/pc', 1.5, 0),
(331, 112920, 'Caballero', 'Marydhelle', '', '', 'Female', '2018-08-29', '', '', '', '', 'Single', '', '', 'Active', '', '2018-10-01', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(332, 112921, 'Linaban', 'Jemelyn Kris', '', '', 'Female', '2018-10-01', '', '', '', '', 'Single', '', '', 'Active', '', '2018-10-01', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(333, 112922, 'Pabustan', 'Sharon', '', '', 'Female', '2018-10-01', '', '', '', '', 'Single', '', '', 'Active', '', '2004-05-24', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(334, 112923, 'Lopez', 'Precious Veronica', '', '', 'Female', '2018-10-22', '', '', '', '', 'Single', '', '', 'Active', '', '2018-10-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(335, 112924, 'Simbulan', 'Daisylyn', '', '', 'Female', '2018-10-22', '', '', '', '', 'Single', '', '', 'Active', '', '2018-10-22', 'SM', 'VP/DIRECTOR OF SALES', 'Sm/pc', 1.5, 0),
(336, 112925, 'Dela Cruz', 'Jadeth', 'B', '', 'Female', '2018-11-07', '', '', '', '', 'Single', '', '', 'Active', '', '2018-11-07', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(337, 112928, 'Aguilar', 'Joy', 'P', '', 'Female', '2018-12-20', '', '', '', '', 'Single', '', '', 'Active', '', '2018-12-20', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(338, 112930, 'De Guzman', 'Richie', '', '', 'Female', '2019-01-24', '', '', '', '', 'Single', '', '', 'Active', '', '2019-01-24', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(339, 112931, 'Malta', 'Benjamin', '', '', 'Male', '2019-02-19', '', '', '', '', 'Single', '', '', 'Active', '', '2019-02-19', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(340, 112932, 'Santos', 'Rommel', 'T', '', 'Female', '2019-03-13', '', '', '', '', 'Single', '', '', 'Active', '', '2019-03-13', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(341, 112933, 'Nuque', 'Marlon', '', '', 'Male', '2019-03-13', '', '', '', '', 'Single', '', '', 'Active', '', '2019-03-13', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(342, 112934, 'Santos', 'Santiago', '', '', 'Male', '1966-12-26', '', '`', '', '', 'Single', '', '', 'Active', '', '2019-03-14', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(343, 112935, 'Lopez', 'Liezl', 'B', '', 'Female', '2019-03-28', '', '', '', '', 'Single', '', '', 'Active', '', '2019-03-28', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(344, 112936, 'Salcedo', 'Ronnie', '', '', 'Male', '2019-04-01', '', '', '', '', 'Single', '', '', 'Active', '', '2019-04-01', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(345, 112937, 'Biong', 'Aileen', 'C', '', 'Female', '2019-04-01', '', '', '', '', 'Single', '', '', 'Active', '', '2019-04-01', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(346, 112938, 'Dabon', 'Ada', 'M', '', 'Female', '2019-04-01', '', '', '', '', 'Single', '', '', 'Active', '', '2019-04-01', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(347, 112939, 'Atencio', 'Michael', 'C', '', 'Male', '2019-04-12', '', '', '', '', 'Single', '', '', 'Active', '', '2019-04-12', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(348, 112940, 'Roque', 'Raquel', 'Pascual', '', 'Female', '2019-05-07', '', '', '', '', 'Single', '', '', 'Active', '', '2019-05-08', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(349, 112941, 'Santiago', 'Jomai', '', '', 'Male', '2019-05-17', '', '', '', '', 'Single', '', '', 'Active', '', '2019-05-17', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(350, 112942, 'Salvador', 'Allan Christian', '', '', 'Male', '2019-05-30', '', '', '', '', 'Single', '', '', 'Active', '', '2019-05-30', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(351, 112943, 'Faustino', 'Teodulo', '', '', 'Male', '2019-06-07', '', '', '', '', 'Single', '', '', 'Active', '', '2019-06-07', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(352, 112944, 'Capule', 'Rose Anne', '', '', 'Female', '2019-06-07', '', '', '', '', 'Single', '', '', 'Active', '', '2019-06-07', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(353, 112945, 'Ramos', 'Reymundo', '', '', 'Male', '1971-01-01', '', '', '', '', 'Single', '', '', 'Active', '', '2019-05-01', 'SM', 'VP/DIRECTOR OF SALES', 'Sm/pc', 1.5, 0),
(354, 112947, 'Borja', 'Dennis', '', '', 'Male', '2019-06-28', '', '', '', '', 'Single', '', '', 'Active', '', '2019-06-28', 'EMP', 'VP/DIRECTOR OF SALES', 'Employee Referral', 0, 0),
(355, 112949, 'Palomares', 'Julie', 'V.', '', 'Female', '2019-07-05', '', '', '', '', 'Single', '', '', 'Active', '', '2019-07-05', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(356, 112950, 'Amurao', 'Keemy Ann', '', '', 'Female', '2019-07-09', '', '', '', '', 'Single', '', '', 'Active', '', '2019-07-09', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(357, 112951, 'Caparas', 'Elenita', '', '', 'Female', '2019-07-09', '', '', '', '', 'Single', '', '', 'Active', '', '2019-07-09', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(358, 112952, 'Reyna', 'Evelyn', '', '', 'Female', '2019-07-10', '', '', '', '', 'Single', '', '', 'Active', '', '2019-07-11', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(359, 112953, 'Rivera, Jr.', 'Rafael', 'F', '', 'Male', '2019-07-17', '', '', '', '', 'Single', '', '', 'Active', '', '2019-07-17', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(360, 112954, 'Diamante', 'Evangeline', 'P', '', 'Female', '2019-08-28', '', '', '', '', 'Single', '', '', 'Active', '', '2019-08-29', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(361, 112955, 'Salvador', 'Michelle', 'P', '', 'Female', '2019-09-03', '', '', '', '', 'Single', '', '', 'Active', '', '2019-09-06', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(362, 112957, 'Alonzo', 'Imelda', 'D', '', 'Female', '2019-09-19', '', '', '', '', 'Single', '', '', 'Active', '', '2019-09-19', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(363, 112959, 'Casia', 'Ma. Elena', '', '', 'Female', '2019-10-29', '', '', '', '', 'Single', '', '', 'Active', '', '2019-10-29', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(364, 112960, 'Francisco', 'Menchie', 'M', '', 'Female', '2019-10-30', '', '', '', '', 'Single', '', '', 'Active', '', '2019-10-31', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(365, 112961, 'Calderon', 'Corazon', 'M', '', 'Female', '2019-11-04', '', '', '', '', 'Single', '', '', 'Active', '', '2019-11-04', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(366, 112962, 'Reyes', 'Meijie Moore', 'M', '', 'Female', '2019-11-04', '', '', '', '', 'Single', '', '', 'Active', '', '2019-11-04', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(367, 112963, 'Maranan', 'Roberto', 'Y', '', 'Male', '2019-11-14', '', '', '', '', 'Single', '', '', 'Active', '', '2019-11-14', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(368, 112964, 'Gonzales', 'Elizabeth', '', '', 'Female', '2019-11-29', '', '', '', '', 'Single', '', '', 'Active', '', '2019-11-29', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(369, 112966, 'Bernal', 'Diana', '', '', 'Female', '2019-12-17', '', '', '', '', 'Single', '', '', 'Active', '', '2019-12-17', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(370, 112967, 'Carlos', 'Leslie', 'A', '', 'Male', '2020-01-21', '', '', '', '', 'Single', '', '', 'Active', '', '2020-01-21', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(371, 112968, 'Guirhem', 'Amor', '', '', 'Female', '2020-02-05', '', '', '', '', 'Single', '', '', 'Active', '', '2020-02-11', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(372, 112969, 'Ramos', 'Paulo', 'E.', '', 'Male', '2020-06-08', '', '', '', '', 'Single', '', '', 'Active', '', '2020-06-08', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(373, 112970, 'Malto', 'Nelce', 'N', '', 'Female', '2020-06-16', '', '', '', '', 'Single', '', '', 'Active', '', '2020-06-16', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(374, 112971, 'Reyes', 'Eliza', '', '', 'Female', '2020-07-13', '', '', '', '', 'Single', '', '', 'Active', '', '2020-07-13', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(375, 112972, 'Diaz', 'B.', 'Beverly', '', 'Female', '2020-10-13', '', '', '', '', 'Single', '', '', 'Active', '', '2020-10-13', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(376, 112973, 'Gran', 'Patricia May', '', '', 'Female', '2020-10-21', '', '', '', '', 'Single', '', '', 'Active', '', '2020-10-23', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(377, 112974, 'Yamat', 'Remedios', '', '', 'Female', '2020-11-18', '', '', '', '', 'Single', '', '', 'Active', '', '2020-11-18', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(378, 112975, 'Yutuc', 'Eden', '', '', 'Male', '2020-12-02', '', '', '', '', 'Single', '', '', 'Active', '', '2020-12-02', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(379, 112976, 'Caluag', 'Careen Ivy', '', '', 'Male', '1990-02-08', '', '', '', '', 'Single', '', '', 'Active', '', '2021-01-06', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(380, 112977, 'Fulgencio', 'Jennielyn', '', '', 'Female', '2021-01-08', '', '', '', '', 'Single', '', '', 'Active', '', '2021-01-08', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(381, 112978, 'Tan', 'Katrina Keith', '', '', 'Female', '2021-01-13', '', '', '', '', 'Single', '', '', 'Active', '', '2021-01-13', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(382, 112982, 'Mendoza', 'Ryan Karlo', '', '', 'Male', '2021-04-12', '', '', '', '', 'Single', '', '', 'Active', '', '2021-04-12', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(383, 112986, 'Damo', 'Joycelyn', '', '', 'Female', '2021-06-10', '', '', '', '', 'Single', '', '', 'Active', '', '2008-02-05', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(384, 112987, 'Sison', 'Ma. Elena', '', '', 'Female', '2021-06-28', '', '', '', '', 'Single', '', '', 'Active', '', '2021-06-28', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(385, 112988, 'Caballero', 'Ferdinand', 'D', '', 'Male', '2021-07-28', '', '', '', '', 'Single', '', '', 'Active', '', '2021-07-28', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(386, 112990, 'Gregorio', 'Bernadette', '', '', 'Female', '2021-10-29', '', '', '', '', 'Single', '', '', 'Active', '', '2021-10-29', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(387, 112991, 'Reyes', 'Renante', 'D', '', 'Male', '2021-12-01', '', '', '', '', 'Single', '', '', 'Active', '', '2021-12-01', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(388, 112993, 'Tanghal', 'Rosallie', '', '', 'Female', '2022-04-01', '', '', '', '', 'Single', '', '', 'Active', '', '2022-04-01', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(389, 112994, 'Malbataan', 'Sta. Anna', 'C', '', 'Male', '2022-04-25', '', '', '', '', 'Single', '', '', 'Active', '', '2022-04-25', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(390, 112997, 'Del Rosario', 'Ria', '', 'Iyah', 'Female', '1988-12-08', '', '0029 kalye onse st dampol 1st pulilan bulacan', '', '9230200260', 'Married', '', '432-902-099-000', 'Active', '', '2022-07-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(391, 112998, 'Viterbo', 'Norelrin', '', '', 'Female', '1971-01-01', '', '', 'M0101VN3', '', 'Single', '', '', 'Active', '', '2022-08-02', 'SPC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 0, 0),
(392, 112999, 'Faustino', 'Aeleen', '', '', 'Female', '2022-09-22', '', '', '', '', 'Single', '', '', 'Active', '', '2022-09-22', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0),
(393, 113000, 'Carasig', 'Elizabeth', '', '', 'Female', '2022-09-30', '', '', '', '', 'Single', '', '', 'Active', '', '2022-09-30', 'PC', 'VP/DIRECTOR OF SALES', 'Sm/pc', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_model_house`
--

CREATE TABLE `t_model_house` (
  `id` int(11) NOT NULL,
  `c_code` int(11) NOT NULL,
  `c_model` text NOT NULL,
  `c_acronym` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_model_house`
--

INSERT INTO `t_model_house` (`id`, `c_code`, `c_model`, `c_acronym`) VALUES
(1, 100, 'NATHALIA', 'NAT'),
(2, 101, 'ANNIKA', 'ANK'),
(3, 102, 'SASHA', 'SAS'),
(4, 104, 'FENCE', 'FNC'),
(5, 105, 'FREYA', 'FRY'),
(7, 988, 'ZINNIA', 'ZNA'),
(8, 111, 'CASA JUDZ', 'JUD');

-- --------------------------------------------------------

--
-- Table structure for table `t_projects`
--

CREATE TABLE `t_projects` (
  `c_code` smallint(6) NOT NULL,
  `c_project_code` smallint(6) NOT NULL,
  `c_name` text DEFAULT NULL,
  `c_acronym` text DEFAULT NULL,
  `c_address` text DEFAULT NULL,
  `c_province` text DEFAULT NULL,
  `c_status` smallint(6) DEFAULT NULL,
  `c_zip` smallint(6) DEFAULT NULL,
  `c_rate` double DEFAULT NULL,
  `c_reservation` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_projects`
--

INSERT INTO `t_projects` (`c_code`, `c_project_code`, `c_name`, `c_acronym`, `c_address`, `c_province`, `c_status`, `c_zip`, `c_rate`, `c_reservation`) VALUES
(101, 16, 'ROYALE ESTATE', 'RE', 'Bulihan', 'Malolos City', 1, 3000, 1, 10000),
(102, 11, 'CASA ROYALE', 'CR', 'Sapang Putol', 'San Ildefonso, Bulacan', 1, 3010, 20, 5000),
(103, 14, 'GRAND ROYALE 1', 'GR-1', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(104, 12, 'DREAMCREST HOMES 1', 'DCH-1', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(105, 14, 'GRAND ROYALE 2', 'GR-2', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(106, 13, 'GRAND INDUSTRIAL ESTATE', 'GIE', 'Div. Rd, Parulan', 'Plaridel, Bulacan', 1, 3004, 0, 100000),
(107, 12, 'DREAMCREST HOMES 2-A', 'DCH-2A', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(108, 14, 'GRAND ROYALE 2-A', 'GR-2A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(109, 12, 'DREAMCREST HOMES 2-B', 'DCH-2B', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(110, 14, 'GRAND ROYALE 1-A', 'GR-1A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(111, 14, 'GRAND ROYALE 3', 'GR-3', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(112, 12, 'DREAMCREST HOMES 3', 'DCH-3', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(113, 14, 'GRAND ROYALE 4', 'GR-4', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(114, 12, 'DREAMCREST HOMES 1-A', 'DCH-1A', 'Bulihan', 'Malolos City', 1, 3000, 21, 5000),
(115, 14, 'GRAND ROYALE 5', 'GR-5', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(116, 12, 'DREAMCREST HOMES 4', 'DCH-4', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(117, 12, 'DREAMCREST HOMES 5', 'DCH-5', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(118, 14, 'GRAND ROYALE 5-A', 'GR-5A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(119, 14, 'GRAND ROYALE 6', 'GR-6', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(120, 14, 'GRAND ROYALE 7', 'GR-7', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(121, 14, 'GRAND ROYALE 8', 'GR-8', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(122, 14, 'GRAND ROYALE 9', 'GR-9', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(123, 15, 'THE MEADOWS', 'MEADOWS', 'San Jose Patag', 'Sta. Maria, Bulacan', 1, 3022, 0, 20000),
(124, 14, 'GRAND ROYALE 8-A', 'GR-8A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(125, 14, 'GRAND ROYALE 8-B', 'GR-8B', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(126, 14, 'GRAND ROYALE 8-C', 'GR-8C', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(127, 14, 'GRAND ROYALE 9-A', 'GR-9A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(128, 14, 'GRAND ROYALE 10', 'GR-10', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(129, 14, 'GRAND ROYALE 8-D', 'GR-8D', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(130, 14, 'GRAND ROYALE 7-A', 'GR-7A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(131, 14, 'GRAND ROYALE 8-E', 'GR-8E', 'Longos', 'Malolos City', 1, 3000, 0, 10000),
(132, 14, 'GRAND ROYALE 7-B', 'GR-7B', 'Pinagbakahan', 'Malolos City', 1, 3000, 0, 10000),
(133, 14, 'GRAND ROYALE 1-B', 'GR-1B', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(134, 14, 'GRAND ROYALE 1-C', 'GR-1C', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(135, 14, 'GRAND ROYALE 7-C', 'GR-7C', 'Longos', 'Malolos City', 1, 3000, 0, 10000),
(136, 14, 'GRAND ROYALE 4-A', 'GR-4A', 'Pinagbakahan', 'Malolos City', 1, 3000, 0, 10000),
(137, 12, 'DREAMCREST HOMES 2-C', 'DCH-2C', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(138, 12, 'DREAMCREST HOMES 5-A', 'DCH-5A', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(139, 14, 'GRAND ROYALE 3-A', 'GR-3A', 'Pinagbakahan', 'Malolos City', 1, 3000, 0, 10000),
(140, 14, 'GRAND ROYALE 7-D', 'GR-7D', 'Look 1st', 'Malolos City', 1, 3000, 0, 10000),
(141, 14, 'GRAND ROYALE 7-E', 'GR-7E', 'Lugam', 'Malolos City', 1, 3000, 0, 10000),
(142, 14, 'GRAND ROYALE 5-B', 'GR-5B', 'Pinagbakahan', 'Malolos City', 1, 3000, 0, 10000),
(143, 14, 'GRAND ROYALE 6-A', 'GR-6A', 'Pinagbakahan', 'Malolos City', 1, 3000, 0, 10000),
(144, 14, 'GRAND ROYALE 5-C', 'GR-5C', 'Mojon', 'Malolos City', 1, 3000, 0, 10000),
(145, 12, 'DREAMCREST HOMES 5-B', 'DCH-5B', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(146, 14, 'GRAND ROYALE 7-F', 'GR-7F', 'Longos', 'Malolos City', 1, 3000, 0, 10000),
(147, 12, 'DREAMCREST HOMES 5-C', 'DCH-5C', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(148, 14, 'GRAND ROYALE 6-B', 'GR-6B', 'Pinagbakahan', 'Malolos City', 1, 3000, 0, 10000),
(149, 17, 'WOODLANDS OF GRAND ROYALE', 'WGR', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(150, 16, 'ROYALE ESTATE 2', 'RE-2', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(151, 14, 'GRAND ROYALE 5-D', 'GR-5D', 'Mojon', 'Malolos City', 1, 3000, 0, 10000),
(152, 10, 'CASABUENA DE PULILAN', 'CBP', 'Cutcot', 'Pulilan, Bulacan', 1, 3005, 0, 10000),
(153, 14, 'GRAND ROYALE 1-D', 'GR-1D', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(154, 14, 'GRAND ROYALE 1-E', 'GR-1E', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(155, 14, 'GRAND ROYALE 7-G', 'GR-7G', 'Look 1st', 'Malolos City', 1, 3000, 0, 10000),
(156, 17, 'WOODLANDS OF GRAND ROYALE 2', 'WGR-2', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(157, 10, 'CASABUENA DE PULILAN 2', 'CBP-2', 'Cutcut', 'Pulilan, Bulacan', 1, 3005, 0, 10000),
(158, 12, 'DREAMCREST HOMES 2-D', 'DCH-2D', 'Longos', 'Malolos City', 1, 3000, 21, 5000),
(159, 14, 'GRAND ROYALE 7-H', 'GR-7H', 'Longos', 'Malolos City', 0, 3000, 0, 10000),
(160, 14, 'GRAND ROYALE 1-F', 'GR-1F', 'Mojon', 'Malolos City', 0, 3000, 0, 10000),
(161, 10, 'CASABUENA DE PULILAN 1-A', 'CBP-1A', 'Cutcut', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(162, 12, 'DREAMCREST HOMES 5-D', 'DCH-5D', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(163, 17, 'WOODLANDS OF GRAND ROYALE 3', 'WGR-3', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(164, 15, 'THE MEADOWS 2', 'MEADOWS-2', 'San Jose Patag', 'Sta. Maria, Bulacan', 0, 3022, 0, 20000),
(165, 14, 'GRAND ROYALE 3-B', 'GR-3B', 'Pinagbakahan', 'Malolos City', 0, 3000, 0, 10000),
(166, 10, 'CASABUENA DE PULILAN 2A', 'CBP-2A', 'Cutcut', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(167, 17, 'WOODLANDS OF GRAND ROYALE 1-A', 'WGR-1A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(168, 10, 'CASABUENA DE PULILAN 3', 'CBP-3', 'Cutcot', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(169, 10, 'CASABUENA DE PULILAN 4', 'CBP-4', 'Cutcut', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(170, 10, 'CASABUENA DE PULILAN 2B', 'CBP-2B', 'Cutcot', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(171, 14, 'GRAND ROYALE 7-I', 'GR-7I', 'Longos', 'Malolos City', 0, 3000, 0, 10000),
(172, 10, 'CASABUENA DE PULILAN 5', 'CBP-5', 'Cutcut', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(173, 14, 'GRAND ROYALE 6-C', 'GR-6C', 'Pinagbakahan', 'Malolos City', 0, 3000, 0, 10000),
(174, 17, 'WOODLANDS OF GRAND ROYALE 4', 'WGR-4', 'Anilao', 'Malolos City', 0, 3000, 0, 10000),
(175, 14, 'GRAND ROYALE 9-B', 'GR-9B', 'Lugam', 'Malolos City', 0, 3000, 0, 10000),
(176, 17, 'WOODLANDS OF GRAND ROYALE 2-A', 'WGR-2A', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(177, 17, 'WOODLANDS OF GRAND ROYALE 1-B', 'WGR-1B', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(178, 14, 'GRAND ROYALE 8-F', 'GR-8F', 'Longos', 'Malolos City', 0, 3000, 0, 10000),
(179, 14, 'GRAND ROYALE 6-E', 'GR-6E', 'Pinagbakahan', 'Malolos City', 0, 3000, 0, 10000),
(180, 10, 'CASABUENA DE PULILAN 1B', 'CBP-1B', 'Cutcot', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(181, 17, 'WOODLANDS OF GRAND ROYALE 2-B', 'WGR-2B', 'Bulihan', 'Malolos City', 0, 3000, 0, 10000),
(182, 10, 'CASABUENA DE PULILAN 3A', 'CBP-3A', 'Cutcot', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(183, 10, 'CASABUENA DE PULILAN 5-A', 'CBP-5A', 'Cutcut', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(184, 14, 'GRAND ROYALE 6-D', 'GR-6D', 'Pinagbakahan', 'Malolos City', 0, 3000, 0, 10000),
(185, 12, 'DREAMCREST HOMES 5-E', 'DCH-5E', 'Longos', 'Malolos City', 0, 3000, 21, 5000),
(186, 10, 'CASABUENA DE PULILAN 3-B', 'CBP-3B', 'Paltao', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(187, 10, 'CASABUENA DE PULILAN 5-B', 'CBP-5B', 'Cutcot', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(188, 14, 'GRAND ROYALE 7-J', 'GR-7J', 'Looc 1st', 'Malolos City', 0, 3000, 0, 10000),
(189, 10, 'CASABUENA DE PULILAN 3-C', 'CBP-3C', 'Paltao', 'Pulilan, Bulacan', 0, 3005, 0, 10000),
(190, 16, 'ROYALE ESTATE - HOUSE', 'RE-AH', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(191, 11, 'CASA ROYALE - HOUSE', 'CR-AH', 'Sapang Putol', 'San Ildefonso, Bulacan', 1, 3010, 20, 5000),
(192, 12, 'DREAMCREST HOMES - HOUSE', 'DCH-AH', 'Longos', 'Malolos City', 1, 3000, 21, 5000),
(193, 14, 'GRAND ROYALE - HOUSE', 'GR-AH', 'Bulihan', 'Malolos City', 1, 3000, 0, 10000),
(194, 15, 'THE MEADOWS - HOUSE', 'MEAD-AH', 'San Jose Patag', 'Sta. Maria, Bulacan', 1, 3022, 0, 10000),
(195, 10, 'CASABUENA DE PULILAN', 'CBP-2C', '', 'Pulilan, Bulacan', 1, 3005, 0, 0),
(196, 10, 'CASABUENA DE PULILAN', 'CBP-3D', '', 'Pulilan, Bulacan', 1, 3005, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `name`, `password`, `role_id`, `is_active`) VALUES
(1, '10093', 'Admin User', '$2y$10$0U6bF7SGh7cUssMu8q5hNeLx1m.AN9hTi/Mz63vqxMZb86F/nDRkK', 1, 1),
(2, '12345', 'Jude', 'admin123', 2, 1),
(3, 'dd3131', 'STICKER', 'admin', 5, 1),
(4, '123123', 'Agent Judz', '$2y$10$LJPlUcVyvg7sNsZRodx9d.TbU1L3D9HZQXoooBGfDsFQKMr/oYnbK', 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_costs`
--
ALTER TABLE `additional_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_id` (`lot_id`);

--
-- Indexes for table `agent_commissions`
--
ALTER TABLE `agent_commissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_no` (`account_no`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers_account`
--
ALTER TABLE `buyers_account`
  ADD PRIMARY KEY (`account_no`),
  ADD UNIQUE KEY `property_id` (`property_id`),
  ADD KEY `lot_id` (`lot_id`),
  ADD KEY `primary_buyer_id` (`primary_buyer_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `buyers_accounts_buyers`
--
ALTER TABLE `buyers_accounts_buyers`
  ADD PRIMARY KEY (`account_no`,`buyer_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `fences`
--
ALTER TABLE `fences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_id` (`lot_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_id` (`lot_id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_no` (`account_no`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_id` (`lot_id`),
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `reservation_agents`
--
ALTER TABLE `reservation_agents`
  ADD PRIMARY KEY (`reservation_id`,`agent_code`),
  ADD KEY `agent_code` (`agent_code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `t_agents`
--
ALTER TABLE `t_agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_code` (`c_code`);

--
-- Indexes for table `t_model_house`
--
ALTER TABLE `t_model_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `additional_costs`
--
ALTER TABLE `additional_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agent_commissions`
--
ALTER TABLE `agent_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyers_account`
--
ALTER TABLE `buyers_account`
  MODIFY `account_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `fences`
--
ALTER TABLE `fences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_agents`
--
ALTER TABLE `t_agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `t_model_house`
--
ALTER TABLE `t_model_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_costs`
--
ALTER TABLE `additional_costs`
  ADD CONSTRAINT `additional_costs_ibfk_1` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`);

--
-- Constraints for table `agent_commissions`
--
ALTER TABLE `agent_commissions`
  ADD CONSTRAINT `agent_commissions_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `buyers_account` (`account_no`),
  ADD CONSTRAINT `agent_commissions_ibfk_2` FOREIGN KEY (`agent_id`) REFERENCES `t_agents` (`id`);

--
-- Constraints for table `buyers_account`
--
ALTER TABLE `buyers_account`
  ADD CONSTRAINT `buyers_account_ibfk_1` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`),
  ADD CONSTRAINT `buyers_account_ibfk_2` FOREIGN KEY (`primary_buyer_id`) REFERENCES `buyers` (`id`),
  ADD CONSTRAINT `buyers_account_ibfk_3` FOREIGN KEY (`agent_id`) REFERENCES `t_agents` (`id`);

--
-- Constraints for table `buyers_accounts_buyers`
--
ALTER TABLE `buyers_accounts_buyers`
  ADD CONSTRAINT `buyers_accounts_buyers_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `buyers_account` (`account_no`),
  ADD CONSTRAINT `buyers_accounts_buyers_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`);

--
-- Constraints for table `fences`
--
ALTER TABLE `fences`
  ADD CONSTRAINT `fences_ibfk_1` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`);

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_ibfk_1` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `buyers_account` (`account_no`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`);

--
-- Constraints for table `reservation_agents`
--
ALTER TABLE `reservation_agents`
  ADD CONSTRAINT `reservation_agents_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_agents_ibfk_2` FOREIGN KEY (`agent_code`) REFERENCES `t_agents` (`c_code`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
