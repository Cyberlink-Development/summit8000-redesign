-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2026 at 06:55 PM
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
-- Database: `summit8000`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_banner`
--

CREATE TABLE `activity_banner` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `picture` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_associated_posts`
--

CREATE TABLE `cl_associated_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `brief` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `thumbnail` varchar(191) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `uri` varchar(191) NOT NULL,
  `page_key` varchar(191) NOT NULL,
  `show_in_home` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_banner`
--

CREATE TABLE `cl_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `caption` varchar(500) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_banner`
--

INSERT INTO `cl_banner` (`id`, `title`, `caption`, `picture`, `link`, `youtube_link`, `status`, `video`, `created_at`, `updated_at`) VALUES
(10, 'Everest Expedition 2026', 'Stand Tall on the Roof of the World scheduled for 2026', 'a7309319-final-everest-C0SrG.png', 'https://summitsolutionexpeds.com/page/mt-everest-expedition.html', NULL, '0', NULL, '2024-01-20 17:33:06', '2026-01-02 23:08:43'),
(11, 'MANASLU EXPEDITION 2026', 'Find your rhythm on one of Nepal’s most graceful peaks scheduled for Autumn 2026.', 'm12-0evHi.png', 'https://summitsolutionexpeds.com/page/mt-manaslu-expedition.html', NULL, '1', NULL, '2025-01-30 06:34:20', '2026-01-03 02:50:06'),
(12, 'Everest Base Camp Trek 2026', 'Join the iconic Everest Base Camp Trek of a lifetime with Summit Solution in 2026.', 'm12-vUA3N.png', 'https://summitsolutionexpeds.com/page/everest-base-camp-trek.html', NULL, '0', NULL, '2026-01-02 23:05:15', '2026-01-06 23:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `cl_cost_excludes`
--

CREATE TABLE `cl_cost_excludes` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_detail_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `ordering` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_cost_excludes`
--

INSERT INTO `cl_cost_excludes` (`id`, `trip_detail_id`, `title`, `content`, `ordering`, `created_at`, `updated_at`) VALUES
(436, 122, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(437, 122, 'Nepal tourist visa fee.', NULL, 2, '2025-12-14 03:33:28', '2025-12-14 08:14:00'),
(438, 122, 'Lunch and dinner in Kathmandu except welcome and farewell dinners.', NULL, 3, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(439, 122, 'Extra hotel nights due to early arrival, late departure, or itinerary changes.', NULL, 4, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(440, 122, 'Personal insurance covering medical treatment, rescue, evacuation, high-altitude risk, and trip cancellation.', NULL, 5, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(441, 122, 'Personal climbing equipment including boots, down suit, gloves, sleeping bag, harness, and crampons.', NULL, 6, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(442, 122, 'Personal expenses such as phone calls, internet use, hot showers, battery charging, beverages, snacks, and laundry.', NULL, 7, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(443, 122, 'Drone permits, camera permits, and special filming fees.', NULL, 8, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(444, 122, 'Internet access at Everest Base Camp.', NULL, 9, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(445, 122, 'Summit bonus for climbing Sherpas.', NULL, 10, '2025-12-14 03:33:28', '2025-12-14 09:07:57'),
(446, 122, 'Tips for Base Camp and kitchen staff with a recommended minimum of USD 400 per member.', NULL, 11, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(447, 122, 'Costs arising from delays due to weather, flight disruptions, political issues, or natural disasters.', NULL, 12, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(448, 122, 'Any service not mentioned in the cost includes section.', NULL, 13, '2025-12-14 03:33:28', '2025-12-14 03:33:28'),
(449, 228, 'International flights to/from Nepal.', NULL, 1, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(450, 228, 'Nepal entry visa fee.', NULL, 2, '2025-12-14 03:47:40', '2025-12-14 08:13:13'),
(451, 228, 'Lunch and dinner dinner in Kathmandu.', NULL, 3, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(452, 228, 'Extra hotel nights in Kathmandu beyond 4 nights.', NULL, 4, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(453, 228, 'Personal travel and medical insurance covering high-altitude evacuation.', NULL, 5, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(454, 228, 'Personal expenses (phone, internet, laundry, beverages, etc.).', NULL, 6, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(455, 228, 'Personal climbing equipment and gear.', NULL, 7, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(456, 228, 'Filming, drone permits, or special photography fees.', NULL, 8, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(457, 228, 'Summit bonus for climbing Sherpas.', NULL, 9, '2025-12-14 03:47:40', '2025-12-14 09:07:34'),
(458, 228, 'Tips for base camp and high camp staff (approx. USD 350–400).', NULL, 10, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(459, 228, 'Any extra oxygen beyond included cylinders.', NULL, 11, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(460, 228, 'Any other services not mentioned in “Cost Includes.”', NULL, 12, '2025-12-14 03:47:40', '2025-12-14 03:47:40'),
(461, 226, 'International flights to/from Kathmandu.', NULL, 1, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(462, 226, 'Nepal entry visa fee.', NULL, 2, '2025-12-14 07:59:57', '2025-12-14 08:12:11'),
(463, 226, 'Meals in Kathmandu except welcome/farewell dinner.', NULL, 3, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(464, 226, 'Extra hotel nights due to early return, delays, or schedule changes.', NULL, 4, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(465, 226, 'Personal travel insurance covering high-altitude rescue, evacuation, and trip cancellation.', NULL, 5, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(466, 226, 'Personal climbing gear including down suit, boots, gloves, etc.', NULL, 6, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(467, 226, 'Personal expenses such as laundry, drinks, Wi-Fi, hot showers, phone, etc.', NULL, 7, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(468, 226, 'Drone or camera permits and special filming fees.', NULL, 8, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(469, 226, 'Internet charges at Base Camp.', NULL, 9, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(470, 226, 'Extra oxygen beyond the standard allocation.', NULL, 10, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(471, 226, 'Summit bonus for climbing Sherpas.', NULL, 11, '2025-12-14 07:59:57', '2025-12-14 09:06:46'),
(472, 226, 'Tips for Base Camp staff (minimum USD 400 per member).', NULL, 12, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(473, 226, 'Additional expenses due to unforeseen delays (weather, natural disasters, political issues).', NULL, 13, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(474, 226, 'Any other services not mentioned under “Cost Includes.”', NULL, 14, '2025-12-14 07:59:57', '2025-12-14 07:59:57'),
(475, 227, 'International flights to and from Kathmandu.', NULL, 1, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(476, 227, 'Nepal entry visa fee.', NULL, 2, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(477, 227, 'Lunch and dinner in Kathmandu.', NULL, 3, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(478, 227, 'Extra hotel nights in Kathmandu due to early or late arrival, or domestic flight cancellations.', NULL, 4, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(479, 227, 'Personal trekking and climbing equipment.', NULL, 5, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(480, 227, 'Excess luggage charges beyond 70 kg per member.', NULL, 6, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(481, 227, 'Personal travel insurance covering high-altitude evacuation, accidents, medical treatment, and trip interruption.', NULL, 7, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(482, 227, 'Filming permits including commercial filming and drone fees.', NULL, 8, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(483, 227, 'Additional oxygen beyond the included bottles.', NULL, 9, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(484, 227, 'Summit bonus for Sherpas.', NULL, 10, '2025-12-14 08:08:42', '2025-12-14 09:05:48'),
(485, 227, 'Tips for Base Camp and high camp staff (approximately USD 400).', NULL, 11, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(486, 227, 'Any other personal expenses not explicitly mentioned under “Cost Includes.”', NULL, 12, '2025-12-14 08:08:42', '2025-12-14 08:10:55'),
(487, 229, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(488, 229, 'Nepal entry visa fee.', NULL, 2, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(489, 229, 'Lunch and dinner in Kathmandu or Pokhara, except for the welcome or farewell dinners.', NULL, 3, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(490, 229, 'Extra hotel nights in Kathmandu or Pokhara beyond the included stay.', NULL, 4, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(491, 229, 'Personal travel, medical, and high-altitude evacuation insurance.', NULL, 5, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(492, 229, 'Personal climbing equipment, trekking gear, clothing, and personal medical kits.', NULL, 6, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(493, 229, 'Toiletries, battery recharging, hot showers, laundry services, and other personal expenses.', NULL, 7, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(494, 229, 'Summit bonus for climbing Sherpas and tips for Base Camp and trekking staff.', NULL, 8, '2025-12-14 08:22:56', '2025-12-14 09:08:24'),
(495, 229, 'Drone usage or special filming permits.', NULL, 9, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(496, 229, 'Any other services not specifically mentioned under “Cost Includes.”', NULL, 10, '2025-12-14 08:22:56', '2025-12-14 08:24:57'),
(497, 231, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(498, 231, 'Nepal entry visa fee.', NULL, 2, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(499, 231, 'Lunch and dinner in Kathmandu.', NULL, 3, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(500, 231, 'Extra hotel nights due to early arrival, late departure, or weather-related delays.', NULL, 4, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(501, 231, 'Personal travel, medical, and high-altitude emergency rescue insurance.', NULL, 5, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(502, 231, 'Personal climbing equipment and technical clothing.', NULL, 6, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(503, 231, 'Toiletries, soft drinks, alcoholic beverages, and personal expenses.', NULL, 7, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(504, 231, 'Filming, drone usage, or special camera permits.', NULL, 8, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(505, 231, 'Summit bonuses for expedition staff including climbing Sherpas and kitchen team.', NULL, 9, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(506, 231, 'Tips for Base Camp staff (recommended minimum USD 400).', NULL, 10, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(507, 231, 'Any other services not specifically mentioned under “Cost Includes.”', NULL, 11, '2025-12-14 08:35:07', '2025-12-14 08:37:14'),
(508, 232, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(509, 232, 'Nepal entry visa fee.', NULL, 2, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(510, 232, 'Lunch and dinner in Kathmandu except welcome or farewell dinners.', NULL, 3, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(511, 232, 'Extra hotel nights due to early arrival, late departure, weather delays, or flight cancellations.', NULL, 4, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(512, 232, 'Mandatory personal travel, medical, and high-altitude emergency rescue insurance (minimum coverage USD 90,000).', NULL, 5, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(513, 232, 'Personal climbing gear, clothing, and technical equipment.', NULL, 6, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(514, 232, 'Toiletries, soft drinks, alcoholic beverages, and personal expenses.', NULL, 7, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(515, 232, 'Filming, drone usage, or special camera permits.', NULL, 8, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(516, 232, 'Summit bonuses for expedition staff including climbing Sherpas and kitchen team.', NULL, 9, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(517, 232, 'Tips for Base Camp staff (recommended minimum USD 400).', NULL, 10, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(518, 232, 'Any other services or items not specifically mentioned under “Cost Includes.”', NULL, 11, '2025-12-14 08:49:17', '2025-12-14 08:52:01'),
(519, 233, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(520, 233, 'Nepal entry visa fee.', NULL, 2, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(521, 233, 'Lunch and dinner in Kathmandu except welcome and farewell dinners.', NULL, 3, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(522, 233, 'Extra hotel nights due to early arrival, late departure, weather delays, or flight cancellations.', NULL, 4, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(523, 233, 'Mandatory personal travel, medical, and high-altitude rescue insurance for participants (minimum coverage USD 90,000).', NULL, 5, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(524, 233, 'Personal climbing gear, clothing, and technical equipment.', NULL, 6, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(525, 233, 'Toiletries, soft drinks, alcoholic beverages, and personal expenses.', NULL, 7, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(526, 233, 'Filming, drone usage, or special camera permits.', NULL, 8, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(527, 233, 'Summit bonuses for expedition staff including climbing Sherpas and kitchen helpers.', NULL, 9, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(528, 233, 'Tips for Base Camp and High Camp staff (recommended minimum USD 400).', NULL, 10, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(529, 233, 'Any other services or items not specifically mentioned under “Cost Includes.”', NULL, 11, '2025-12-14 09:01:47', '2025-12-14 09:04:33'),
(530, 234, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(531, 234, 'Nepal entry visa fee.', NULL, 2, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(532, 234, 'Lunch and dinner in Kathmandu except welcome and farewell dinners.', NULL, 3, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(533, 234, 'Personal travel, medical, and high-altitude helicopter rescue insurance (minimum coverage USD 50,000).', NULL, 4, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(534, 234, 'Personal climbing equipment and technical gear.', NULL, 5, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(535, 234, 'Summit bonus payments including climbing guide and kitchen helper, payable in cash at Base Camp.', NULL, 6, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(536, 234, 'Tips for porters and Base Camp and High Camp staff (recommended minimum USD 400 per participant).', NULL, 7, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(537, 234, 'Drone usage or special filming permits.', NULL, 8, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(538, 234, 'Any other services or items not specifically mentioned under “Cost Includes.”', NULL, 9, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(539, 235, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(540, 235, 'Nepal entry visa fee.', NULL, 2, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(541, 235, 'Lunch and dinner in Kathmandu except welcome and farewell dinners.', NULL, 3, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(542, 235, 'Additional hotel nights in Kathmandu due to early arrival, late departure, or itinerary changes.', NULL, 4, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(543, 235, 'Personal travel, medical, and high-altitude helicopter rescue insurance (minimum coverage USD 50,000).', NULL, 5, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(544, 235, 'Personal climbing equipment and technical gear.', NULL, 6, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(545, 235, 'Summit bonus payment for climbing Sherpa and tips for Base Camp and High Camp staff.', NULL, 7, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(546, 235, 'Drone usage or special filming permits.', NULL, 8, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(547, 235, 'Any other services or items not specifically mentioned under “Cost Includes.”', NULL, 9, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(548, 236, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(549, 236, 'Nepal entry visa fee.', NULL, 2, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(550, 236, 'Lunch and dinner in Kathmandu during the stay.', NULL, 3, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(551, 236, 'Extra accommodation nights due to early arrival, delayed departure, or domestic flight cancellations.', NULL, 4, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(552, 236, 'Additional rest days or accommodation in lower villages not included in the itinerary.', NULL, 5, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(553, 236, 'Mandatory personal travel, medical, and high-altitude evacuation insurance.', NULL, 6, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(554, 236, 'Personal expenses including phone calls, internet usage, toiletries, bottled water, laundry, soft drinks, and alcoholic beverages.', NULL, 7, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(555, 236, 'Personal climbing gear, clothing, backpacks, trekking equipment, and personal medical kits.', NULL, 8, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(556, 236, 'Filming, drone usage, or special camera permits if required.', NULL, 9, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(557, 236, 'Summit bonus payment for climbing Sherpa and tips for cooks, kitchen helpers, and porters.', NULL, 10, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(558, 236, 'Any services or items not specifically mentioned under “Cost Includes.”', NULL, 11, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(559, 237, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(560, 237, 'Nepal entry visa fee.', NULL, 2, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(561, 237, 'Lunch and dinner in Kathmandu during the stay or in case of early return from the expedition.', NULL, 3, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(562, 237, 'Extra accommodation nights due to early arrival, late departure, or itinerary changes.', NULL, 4, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(563, 237, 'Mandatory personal travel, medical, high-altitude, and emergency evacuation insurance.', NULL, 5, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(564, 237, 'Personal expenses including phone usage, internet, toiletries, laundry, bottled water, soft drinks, alcoholic beverages, and personal gear.', NULL, 6, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(565, 237, 'Filming, drone usage, or special photography permits if required.', NULL, 7, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(566, 237, 'Summit bonus payment for climbing Sherpa and tips for Base Camp staff and cook.', NULL, 8, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(567, 237, 'Any services or items not specifically mentioned under “Cost Includes.”', NULL, 9, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(568, 190, 'International airfare to and from Nepal.', NULL, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(569, 190, 'Nepal entry visa fee.', NULL, 2, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(570, 190, 'Lunch and dinner in Kathmandu outside of welcome and farewell dinners.', NULL, 3, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(571, 190, 'Mandatory personal travel, medical, and high-altitude evacuation insurance.', NULL, 4, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(572, 190, 'Personal trekking and climbing equipment and gear.', NULL, 5, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(573, 190, 'Tips for guides, climbing Sherpas, and porters.', NULL, 6, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(574, 190, 'Summit bonus payment for climbing Sherpas for all three peaks.', NULL, 7, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(575, 190, 'Drone usage, filming permits, or special photography fees.', NULL, 8, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(576, 190, 'Personal expenses including internet, laundry, bottled water, and other incidental costs.', NULL, 9, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(577, 190, 'Any services or items not specifically mentioned under “Cost Includes.”', NULL, 10, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(578, 240, 'International airfare to and from Nepal.', NULL, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(579, 240, 'Nepal entry visa fee.', NULL, 2, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(580, 240, 'Lunch and dinner in Kathmandu except for welcome and farewell dinners.', NULL, 3, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(581, 240, 'Personal climbing gear, equipment, and technical clothing.', NULL, 4, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(582, 240, 'Mandatory personal insurance covering medical treatment and high-altitude evacuation.', NULL, 5, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(583, 240, 'Extra hotel nights in Kathmandu due to early return, delays, or flight cancellations.', NULL, 6, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(584, 240, 'Personal expenses including phone calls, laundry, hot showers, drinks, battery charging, and Wi-Fi.', NULL, 7, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(585, 240, 'Drone usage, filming permits, or special photography fees.', NULL, 8, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(586, 240, 'Internet and satellite communication charges during trekking and climbing.', NULL, 9, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(587, 240, 'Staff tips and summit bonus for climbing Sherpa.', NULL, 10, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(588, 240, 'Additional costs arising from unforeseen circumstances such as weather, strikes, political issues, or natural disasters.', NULL, 11, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(589, 240, 'Any services or items not specifically mentioned under “Cost Includes.”', NULL, 12, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(590, 241, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(591, 241, 'Nepal entry visa fees as per government regulations.', NULL, 2, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(592, 241, 'Lunch and dinner in Kathmandu except where specifically mentioned.', NULL, 3, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(593, 241, 'Personal climbing gear, technical equipment, and clothing.', NULL, 4, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(594, 241, 'Mandatory personal travel, medical, and high-altitude rescue insurance.', NULL, 5, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(595, 241, 'Extra hotel nights in Kathmandu due to early return, delays, or flight cancellations.', NULL, 6, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(596, 241, 'Personal expenses including phone calls, internet use, laundry, hot showers, and alcoholic beverages.', NULL, 7, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(597, 241, 'Drone usage, professional filming permits, or special photography fees.', NULL, 8, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(598, 241, 'Internet and satellite phone usage charges during the expedition.', NULL, 9, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(599, 241, 'Summit bonuses and staff tips for climbing Sherpa, cook or kitchen helper and porters.', NULL, 10, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(600, 241, 'Additional expenses caused by unforeseen circumstances such as weather conditions, natural disasters, political issues, or logistical disruptions.', NULL, 11, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(601, 241, 'Any services or items not specifically mentioned under “Cost Includes.”', NULL, 12, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(602, 243, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(603, 243, 'Nepal entry visa fee as per government regulation.', NULL, 2, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(604, 243, 'Lunches and dinners in Kathmandu during the city stay.', NULL, 3, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(605, 243, 'Personal trekking and climbing equipment and technical gear.', NULL, 4, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(606, 243, 'Extra nights’ accommodation in Kathmandu due to early arrival, late departure, or domestic flight delays.', NULL, 5, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(607, 243, 'Mandatory personal medical, travel, and high-altitude rescue insurance.', NULL, 6, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(608, 243, 'Alcoholic beverages, soft drinks, snacks, and personal expenses during the trek.', NULL, 7, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(609, 243, 'Hot showers, Wi-Fi, battery charging, and laundry services during the trek.', NULL, 8, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(610, 243, 'Tips for climbing Sherpas, trekking guides, and porters.', NULL, 9, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(611, 243, 'Special permits for filming, drone use, or professional photography.', NULL, 10, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(612, 243, 'Summit bonuses, contingency costs, or additional staff-related expenses.', NULL, 11, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(613, 243, 'Any services or items not specifically mentioned under “Cost Includes.”', NULL, 12, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(614, 244, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(615, 244, 'Nepal entry visa fee as per government regulation.', NULL, 2, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(616, 244, 'Lunches and dinners in Kathmandu during the city stay.', NULL, 3, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(617, 244, 'Extra accommodation in Kathmandu due to early return, late departure, or flight delays.', NULL, 4, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(618, 244, 'Personal trekking and climbing equipment and technical gear.', NULL, 5, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(619, 244, 'Mandatory personal travel, medical, and high-altitude evacuation insurance.', NULL, 6, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(620, 244, 'Rescue evacuation or helicopter service costs if required.', NULL, 7, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(621, 244, 'Alcoholic beverages, soft drinks, snacks, bottled water, and personal expenses during the trek.', NULL, 8, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(622, 244, 'Hot showers, Wi-Fi, battery charging, and laundry services during the trek.', NULL, 9, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(623, 244, 'Tips and bonuses for climbing Sherpas, trekking guides, and porters.', NULL, 10, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(624, 244, 'Special permits for filming, camera use, or drone operation.', NULL, 11, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(625, 244, 'Additional porter services beyond the included luggage allowance.', NULL, 12, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(626, 244, 'Summit bonuses for Sherpa staff.', NULL, 13, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(627, 244, 'Any services or items not specifically mentioned under “Cost Includes.”', NULL, 14, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(628, 247, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(629, 247, 'Nepal entry visa fee as per government regulations.', NULL, 2, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(630, 247, 'Lunches and dinners in Kathmandu and Pokhara during hotel stays.', NULL, 3, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(631, 247, 'Personal trekking and climbing equipment including technical gear.', NULL, 4, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(632, 247, 'Mandatory travel, medical, and high-altitude insurance including emergency evacuation coverage.', NULL, 5, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(633, 247, 'Rescue and evacuation expenses such as helicopter flights, hospitalization, and medication.', NULL, 6, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(634, 247, 'Personal expenses including alcoholic beverages, snacks, bottled water, laundry, internet, and battery charging.', NULL, 7, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(635, 247, 'Additional porter services beyond the included limit.', NULL, 8, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(636, 247, 'Summit bonus for climbing Sherpa and tips for guides, porters, and support staff.', NULL, 9, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(637, 247, 'Special permits for filming, camera use, or drone operation.', NULL, 10, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(638, 247, 'Any services or items not specifically mentioned under the “Cost Includes” section.', NULL, 11, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(639, 248, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(640, 248, 'Nepal entry visa fee as per current government regulations.', NULL, 2, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(641, 248, 'Lunches and dinners in Kathmandu and Pokhara during hotel stays.', NULL, 3, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(642, 248, 'Mandatory travel, medical, and high-altitude insurance including emergency evacuation coverage.', NULL, 4, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(643, 248, 'Personal trekking and climbing gear including technical equipment.', NULL, 5, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(644, 248, 'Rescue and evacuation expenses such as helicopter flights, hospitalization, and medication if required.', NULL, 6, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(645, 248, 'Personal expenses including alcoholic beverages, snacks, bottled water, laundry, phone or internet usage, and battery charging.', NULL, 7, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(646, 248, 'Additional porter services beyond the included limit.', NULL, 8, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(647, 248, 'Summit bonus for climbing Sherpa and tips for guides, porters, and support staff.', NULL, 9, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(648, 248, 'Special permits for filming, camera use, or drone operation.', NULL, 10, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(649, 248, 'Any services or items not specifically mentioned under the “Cost Includes” section.', NULL, 11, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(650, 250, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(651, 250, 'Nepal entry visa fees as per current immigration regulations.', NULL, 2, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(652, 250, 'Lunches and dinners in Kathmandu and Pokhara during hotel stays.', NULL, 3, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(653, 250, 'Personal trekking and climbing equipment including technical gear.', NULL, 4, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(654, 250, 'Mandatory travel, medical, and high-altitude insurance including emergency evacuation coverage.', NULL, 5, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(655, 250, 'Rescue and evacuation expenses such as helicopter flights, medication, or hospitalization if required.', NULL, 6, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(656, 250, 'Personal expenses including alcoholic beverages, snacks, bottled water, laundry services, internet usage, and battery charging.', NULL, 7, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(657, 250, 'Additional porter services beyond the included limit.', NULL, 8, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(658, 250, 'Summit bonus for climbing Sherpa and tips for guides, porters, and support staff.', NULL, 9, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(659, 250, 'Special permits for filming, photography, or drone operations.', NULL, 10, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(660, 250, 'Any services or items not specifically mentioned under the “Cost Includes” section.', NULL, 11, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(661, 131, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(662, 131, 'Nepal entry visa fee as per immigration rules.', NULL, 2, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(663, 131, 'Mandatory travel, medical, and high-altitude rescue insurance for all participants.', NULL, 3, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(664, 131, 'Lunches and dinners in Kathmandu except for the welcome dinner.', NULL, 4, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(665, 131, 'Extra nights of accommodation in Kathmandu due to early arrival, late departure, flight delays, or early return from the trek.', NULL, 5, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(666, 131, 'Personal expenses including telephone calls, internet use, battery charging, laundry services, hot showers, bottled or canned drinks, specialty coffee, and alcoholic beverages.', NULL, 6, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(667, 131, 'Personal trekking equipment including clothing, sleeping bag, daypack, footwear, and personal medical supplies.', NULL, 7, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(668, 131, 'Special permits required for professional filming, drone use, or media equipment.', NULL, 8, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(669, 131, 'Additional porter services if required beyond the included arrangement.', NULL, 9, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(670, 131, 'Tips and gratuities for trekking guides, porters, and support staff.', NULL, 10, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(671, 131, 'Expenses arising from flight delays, bad weather, natural disasters, political disturbances, or other unforeseen circumstances.', NULL, 11, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(672, 131, 'Any services or items not specifically mentioned under the “Cost Includes” section.', NULL, 12, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(673, 253, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(674, 253, 'Nepal entry visa fee as per immigration regulations.', NULL, 2, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(675, 253, 'Lunches and dinners in Kathmandu unless otherwise specified.', NULL, 3, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(676, 253, 'Additional hotel nights in Kathmandu due to early arrival, late departure, flight delays, weather conditions, or other unforeseen reasons.', NULL, 4, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(677, 253, 'Mandatory personal travel insurance covering medical treatment, trip cancellation, and high-altitude emergency evacuation.', NULL, 5, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(678, 253, 'Personal expenses including hot showers, battery charging, internet or Wi-Fi use, laundry services, mineral or bottled water, soft drinks, specialty coffee, and alcoholic beverages.', NULL, 6, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(679, 253, 'Personal trekking clothing, equipment, footwear, and personal medical supplies.', NULL, 7, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(680, 253, 'Extra porter services if required beyond the included arrangement.', NULL, 8, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(681, 253, 'Tips and gratuities for trekking guides, porters, and support staff as a customary practice.', NULL, 9, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(682, 253, 'Special permits required for professional filming, drone operation, or photography.', NULL, 10, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(683, 253, 'Any services, activities, or expenses not specifically mentioned under the “Cost Includes” section.', NULL, 11, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(684, 254, 'International airfare to and from Kathmandu.', NULL, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(685, 254, 'Nepal entry visa fee as per immigration regulations.', NULL, 2, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(686, 254, 'Lunches and dinners in Kathmandu unless otherwise specified.', NULL, 3, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(687, 254, 'Additional hotel nights in Kathmandu due to early arrival, late departure, domestic flight delays, or other unforeseen circumstances.', NULL, 4, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(688, 254, 'Mandatory personal travel insurance covering high-altitude trekking, medical treatment, trip cancellation, and helicopter evacuation.', NULL, 5, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(689, 254, 'Personal expenses including hot showers, battery charging, Wi-Fi, laundry services, bottled or canned beverages, soft drinks, snacks, and souvenirs.', NULL, 6, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(690, 254, 'Personal trekking gear, sleeping bag, backpack, trekking poles, toiletries, and personal hygiene items.', NULL, 7, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(691, 254, 'Extra porter services if required beyond the included arrangement.', NULL, 8, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(692, 254, 'Tips and gratuities for trekking guides, porters, and support staff as a customary practice.', NULL, 9, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(693, 254, 'Special permits required for professional filming, drone operation, or photography.', NULL, 10, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(694, 254, 'Any services, activities, or expenses not specifically mentioned under the “Cost Includes” section.', NULL, 11, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(695, 165, 'International airfare to and from Kathmandu, Nepal.', NULL, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(696, 165, 'Nepal entry visa fee as per immigration regulations payable upon arrival at Kathmandu International Airport.', NULL, 2, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(697, 165, 'Lunches and dinners in Kathmandu and Pokhara during hotel stays.', NULL, 3, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(698, 165, 'Extra hotel nights in Kathmandu or Pokhara due to early arrival, late departure, weather conditions, or changes in itinerary.', NULL, 4, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(699, 165, 'Mandatory personal travel insurance covering high-altitude trekking, medical emergencies, trip cancellation, and helicopter evacuation.', NULL, 5, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(700, 165, 'Personal expenses including telephone calls, Wi-Fi, battery charging, hot showers, laundry, bottled or mineral water, soft drinks, snacks, and alcoholic beverages.', NULL, 6, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(701, 165, 'Personal trekking equipment such as sleeping bags, jackets, trekking poles, backpacks, and personal medical supplies.', NULL, 7, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(702, 165, 'Charges for excess baggage beyond 15 kg per person during the trek.', NULL, 8, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(703, 165, 'Special permits required for drone operation, filming, or professional photography.', NULL, 9, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(704, 165, 'Optional activities not included in the trekking itinerary such as paragliding, boating, or cultural programs in Pokhara.', NULL, 10, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(705, 165, 'Tips and gratuities for trekking guides and porters as a customary and appreciated practice.', NULL, 11, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(706, 165, 'Any services, activities, or expenses not specifically mentioned under the “Cost Includes” section.', NULL, 12, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(707, 256, 'International airfare to and from Kathmandu, Nepal.', NULL, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(708, 256, 'Nepal entry visa fee payable upon arrival at Tribhuvan International Airport.', NULL, 2, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(709, 256, 'Lunch and dinner in Kathmandu and Pokhara during hotel stays.', NULL, 3, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(710, 256, 'Mandatory personal travel insurance covering high-altitude trekking, medical emergencies, trip interruption, and helicopter evacuation.', NULL, 4, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(711, 256, 'Extra nights’ accommodation in Kathmandu or Pokhara due to early arrival, delayed departure, flight cancellations, or itinerary changes.', NULL, 5, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(712, 256, 'Personal expenses including laundry, telephone calls, internet/Wi-Fi, battery charging, hot showers, bottled or mineral water, soft drinks, snacks, and alcoholic beverages.', NULL, 6, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(713, 256, 'Personal trekking gear and equipment including clothing, sleeping bag, backpack, trekking poles, and personal toiletries.', NULL, 7, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(714, 256, 'Fees for professional filming, photography, or drone usage permits if required.', NULL, 8, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(715, 256, 'Charges for battery charging and internet services at remote lodges and camps.', NULL, 9, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(716, 256, 'Optional additional porter service at USD 25 per day if requested.', NULL, 10, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(717, 256, 'Tips and gratuities for trekking guides, porters, and support staff.', NULL, 11, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(718, 256, 'Any services, activities, or expenses not specifically mentioned under the “Cost Includes” section.', NULL, 12, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(719, 257, 'International airfare to and from Kathmandu, Nepal.', NULL, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(720, 257, 'Nepal entry visa fees payable upon arrival at Tribhuvan International Airport.', NULL, 2, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(721, 257, 'Lunch and dinner in Kathmandu and Pokhara during hotel stays.', NULL, 3, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(722, 257, 'Mandatory personal travel insurance covering high-altitude trekking, medical emergencies, trip cancellation, and helicopter evacuation.', NULL, 4, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(723, 257, 'Extra nights’ accommodation in Kathmandu or Pokhara due to early arrival, delayed departure, flight cancellations, or itinerary changes.', NULL, 5, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(724, 257, 'Personal expenses such as telephone calls, internet/Wi-Fi, battery charging, hot showers, laundry, snacks, soft drinks, and alcoholic beverages.', NULL, 6, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(725, 257, 'Personal trekking gear and equipment including sleeping bag, down jacket, trekking poles, and other personal items.', NULL, 7, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(726, 257, 'Government fees or permits for professional filming, photography, or drone usage.', NULL, 8, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(727, 257, 'Costs for battery charging or internet/Wi-Fi in mountain lodges.', NULL, 9, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(728, 257, 'Bottled or mineral water (boiled or purified water is provided during trekking).', NULL, 10, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(729, 257, 'Optional additional porter service at USD 25 per day if required.', NULL, 11, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(730, 257, 'Tips and gratuities for guides, porters, and staff.', NULL, 12, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(731, 257, 'Any services, activities, or expenses not specifically mentioned under the \"Cost Includes\" section.', NULL, 13, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(732, 258, 'International airfare to and from Kathmandu, Nepal.', NULL, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(733, 258, 'Nepal entry visa fees payable upon arrival at Tribhuvan International Airport.', NULL, 2, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(734, 258, 'Lunch and dinner during hotel stays in Kathmandu and Pokhara or in case of early return from the trek.', NULL, 3, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(735, 258, 'Additional hotel accommodation in Kathmandu or Pokhara due to early arrival, late departure, or early trek completion for any reason.', NULL, 4, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(736, 258, 'Personal travel and rescue insurance covering medical expenses, high-altitude trekking, helicopter evacuation, and trip cancellation (mandatory).', NULL, 5, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(737, 258, 'Emergency evacuation costs including helicopter rescue, medical treatment, and hospital charges if required.', NULL, 6, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(738, 258, 'Personal expenses such as hot showers, Wi-Fi, telephone calls, laundry, battery charging, snacks, alcoholic drinks, soft drinks, and bottled water.', NULL, 7, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(739, 258, 'Personal trekking equipment and toiletries including clothing, sleeping bag, trekking poles, backpack, soap, shampoo, and tissues.', NULL, 8, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(740, 258, 'Optional flight upgrade between Kathmandu and Pokhara (available at an additional cost).', NULL, 9, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(741, 258, 'Additional porter service upon request at USD 20 per porter per day.', NULL, 10, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(742, 258, 'Tips and gratuities for trekking guides, porters, and drivers (customary and highly appreciated but not mandatory).', NULL, 11, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(743, 258, 'Fees for professional filming, photography, or drone usage if applicable.', NULL, 12, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(744, 258, 'Any services, activities, or expenses not specifically mentioned under the \"Cost Includes\" section.', NULL, 13, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(745, 259, 'International airfare to and from Nepal.', NULL, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(746, 259, 'Nepal entry visa fee payable upon arrival.', NULL, 2, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(747, 259, 'Lunch and dinner during stays in Kathmandu and Pokhara, and any meals not specified in the Cost Includes section.', NULL, 3, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(748, 259, 'Personal expenses such as alcoholic beverages, soft drinks, bottled water, snacks, hot showers, Wi-Fi, phone calls, battery charging, laundry, and personal trekking gear.', NULL, 4, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(749, 259, 'Entry fees for temples, heritage sites, or monuments during sightseeing in Kathmandu or Pokhara.', NULL, 5, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(750, 259, 'Personal travel and medical insurance covering high-altitude trekking, emergency evacuation, and helicopter rescue if required.', NULL, 6, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(751, 259, 'Additional porter charges for luggage exceeding 15 kg per trekker.', NULL, 7, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(752, 259, 'Tips and gratuities for trekking guides, porters, and drivers (customary and highly appreciated but not mandatory).', NULL, 8, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(753, 259, 'Costs arising from early return, late departure, or extra nights in Kathmandu or Pokhara due to weather, health issues, or other unforeseen circumstances.', NULL, 9, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(754, 259, 'Any services, activities, or expenses not specifically mentioned under the Cost Includes section.', NULL, 10, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(755, 191, 'International airfare to and from Kathmandu, Nepal.', NULL, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(756, 191, 'Nepal entry visa fee payable upon arrival.', NULL, 2, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(757, 191, 'Lunches and dinners in Kathmandu, except for the welcome dinner.', NULL, 3, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(758, 191, 'Personal travel and high-altitude insurance covering medical treatment, emergency helicopter evacuation, and repatriation.', NULL, 4, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(759, 191, 'Personal expenses such as alcoholic beverages, soft drinks, snacks, bottled water, hot showers, Wi-Fi, battery charging, laundry, and other incidental costs during the trek.', NULL, 5, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(760, 191, 'Personal trekking gear including clothing, sleeping bags, trekking poles, and other personal equipment.', NULL, 6, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(761, 191, 'Additional hotel nights in Kathmandu due to early arrival, late departure, trip interruption, or unforeseen circumstances.', NULL, 7, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(762, 191, 'Fees for drone usage, professional filming, or special permits if applicable.', NULL, 8, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(763, 191, 'Entry fees for monuments, temples, or heritage sites during sightseeing in Kathmandu.', NULL, 9, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(764, 191, 'Additional porter services beyond the standard allocation, arranged at an extra cost.', NULL, 10, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(765, 191, 'Tips and gratuities for trekking guides, porters, and drivers, given as a customary appreciation of service.', NULL, 11, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(766, 191, 'Any services, activities, or expenses not specifically mentioned under the \"Cost Includes\" section.', NULL, 12, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(767, 200, 'International airfare to and from Kathmandu, Nepal.', NULL, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(768, 200, 'Nepal entry visa fee payable upon arrival.', NULL, 2, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(769, 200, 'Lunches and dinners in Kathmandu, except for the welcome dinner.', NULL, 3, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(770, 200, 'Personal travel and high-altitude insurance covering medical treatment, emergency evacuation, and repatriation.', NULL, 4, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(771, 200, 'Personal expenses such as alcoholic beverages, soft drinks, bottled water, snacks, and other individual purchases.', NULL, 5, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(772, 200, 'Costs for hot showers, Wi-Fi, laundry, phone calls, and battery charging during the trek.', NULL, 6, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(773, 200, 'Personal trekking equipment including sleeping bags, trekking poles, backpacks, clothing, and other personal gear.', NULL, 7, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(774, 200, 'Additional hotel nights in Kathmandu due to early arrival, late departure, or unforeseen trek interruptions.', NULL, 8, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(775, 200, 'Drone permits, professional filming permits, or special filming-related permissions if required.', NULL, 9, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(776, 200, 'Entrance fees for temples or monuments not specified in the itinerary.', NULL, 10, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(777, 200, 'Tips and gratuities for trekking guides, porters, and drivers as a customary expression of appreciation.', NULL, 11, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(778, 200, 'Any activities, services, or expenses not specifically mentioned under the \"Cost Includes\" section.', NULL, 12, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(779, 263, 'International airfare to and from Kathmandu, Nepal.', NULL, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32');
INSERT INTO `cl_cost_excludes` (`id`, `trip_detail_id`, `title`, `content`, `ordering`, `created_at`, `updated_at`) VALUES
(780, 263, 'Nepal entry visa fee payable upon arrival.', NULL, 2, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(781, 263, 'Lunches and dinners in Kathmandu, except for the farewell dinner.', NULL, 3, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(782, 263, 'Personal travel and high-altitude trekking insurance covering medical treatment, emergency evacuation, and repatriation.', NULL, 4, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(783, 263, 'Personal expenses including alcoholic beverages, soft drinks, bottled water, snacks, and other individual purchases.', NULL, 5, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(784, 263, 'Costs for hot showers, Wi-Fi, laundry, phone calls, and battery charging during the trek.', NULL, 6, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(785, 263, 'Personal trekking equipment such as sleeping bags, trekking poles, backpacks, clothing, and other personal gear.', NULL, 7, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(786, 263, 'Additional hotel nights in Kathmandu due to early arrival, late departure, or unforeseen trek interruptions.', NULL, 8, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(787, 263, 'Drone permits, professional filming permits, or special filming-related permissions if required.', NULL, 9, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(788, 263, 'Entrance fees for temples or monuments not listed in the itinerary.', NULL, 10, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(789, 263, 'Tips and gratuities for trekking guides, porters, and drivers as a customary expression of appreciation.', NULL, 11, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(790, 263, 'Any services, activities, or expenses not specifically mentioned under the \"Cost Includes\" section.', NULL, 12, '2025-12-20 14:25:34', '2025-12-20 16:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `cl_cost_includes`
--

CREATE TABLE `cl_cost_includes` (
  `id` int(11) NOT NULL,
  `trip_detail_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `video` text DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_cost_includes`
--

INSERT INTO `cl_cost_includes` (`id`, `trip_detail_id`, `title`, `content`, `thumbnail`, `country`, `video`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(671, 122, 'All international and domestic airport transfers by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(672, 122, 'Four nights of single-occupancy accommodation in a 4-star hotel in Kathmandu on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(673, 122, 'Welcome and farewell dinners at a traditional Nepali cultural restaurant with expedition members.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(674, 122, 'Mount Everest expedition royalty, Sagarmatha National Park permit, Pasang Lhamu Rural Municipality fee, and Khumbu Icefall Management fee (SPCC).', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(675, 122, 'Government liaison officer with salary, insurance, equipment, food, accommodation, and logistics.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(676, 122, 'Comprehensive medical and rescue insurance for all Nepalese expedition staff.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(677, 122, 'Expedition cargo handling and customs clearance assistance in Kathmandu.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(678, 122, 'Domestic flights between Kathmandu and Lukla with all applicable taxes.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(679, 122, 'Baggage allowance of up to 70 kg per member for trekking and expedition equipment transported by yaks and porters.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(680, 122, 'Lodge accommodation during the trek with three meals per day including tea and coffee.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(681, 122, 'Everest Base Camp accommodation with personal box tent, mattress, pillow, dining tent, kitchen tent, toilet tent, shower tent, communication tent, and storage tents.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(682, 122, 'Freshly prepared Base Camp meals with vegetables, fruits, and meat with helicopter resupply, heated dining tent, and solar or generator-powered charging facilities.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(683, 122, 'Professional Base Camp staff including an experienced head cook and kitchen team.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(684, 122, 'Two medical check-ups at Everest Base Camp before the summit push.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(685, 122, 'Ice climbing, ladder crossing, fixed rope, and oxygen use training at Base Camp.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(686, 122, 'One experienced high-altitude climbing Sherpa per member on a 1:1 ratio with salary, food, equipment, insurance, summit bonus, and assistance carrying personal gear.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(687, 122, 'Five oxygen cylinders per member, three oxygen cylinders per Sherpa, oxygen masks, regulators, and emergency backup oxygen at Base Camp, payable if used.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(688, 122, 'High camp logistics including shared tents, group climbing equipment, fixed ropes, ladders, EPI gas, burners, high-altitude food, and Camp II kitchen facilities.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(689, 122, 'Full contribution to Khumbu Icefall and Everest route fixing by the rope-fixing team.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(690, 122, 'Communication facilities including walkie-talkies, emergency satellite phone access, and reliable daily weather forecasts.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(691, 122, 'Emergency backup support with additional Sherpas and helicopter availability, chargeable if used.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(692, 122, 'Official Mount Everest summit certificate from the Ministry of Culture, Tourism and Civil Aviation and a company souvenir.', NULL, NULL, NULL, NULL, 22, 1, '2025-12-14 03:28:41', '2025-12-14 03:28:41'),
(693, 228, 'Airport pickup and drop in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(694, 228, '4 nights’ hotel accommodation in Kathmandu on a bed & breakfast plan.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(695, 228, 'Domestic flights: Kathmandu–Tumlingtar–Kathmandu.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(696, 228, 'Land transportation for all expedition staff, porters, guides, and Liaison Officer.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(697, 228, 'Makalu Expedition Permit and Makalu Barun National Park entry fee.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(698, 228, 'Garbage management and shipment fees.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(699, 228, 'Full board meals during trekking, base camp, and high camps.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(700, 228, 'Lodging in lodges, tents, and base camp with all essential equipment including sleeping mats, pillows, dining and kitchen tents, shower & toilet tents.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(701, 228, 'Wages and allowances for porters, guides, climbing Sherpas, cooks, and base camp staff.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(702, 228, 'Liaison Officer fees and permits.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(703, 228, 'Luggage transport up to 60 kg per member.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(704, 228, 'Insurance coverage for all Nepalese staff.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(705, 228, 'Solar panels for electricity at Base Camp.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(706, 228, 'Heater service in dining tents at Base Camp.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(707, 228, 'Oxygen supply: 4 cylinders per member and 2 cylinders per high-altitude Sherpa.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(708, 228, 'Walkie-talkies for communication from Base Camp to high camps.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(709, 228, 'High Camp service including cooking gas, utensils, and equipment.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(710, 228, 'Route fixing and rope services by experienced Sherpas.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(711, 228, 'Satellite phone service (subject to nominal charge).', NULL, NULL, NULL, NULL, 19, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(712, 228, 'Daily weather reports.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(713, 228, 'Comprehensive medical kit at Base Camp.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(714, 228, 'Makalu Climbing Certificate issued by MoCTCA upon successful summit.', NULL, NULL, NULL, NULL, 22, 1, '2025-12-14 03:43:54', '2025-12-14 03:43:54'),
(715, 226, 'Airport transfers in Kathmandu (international and domestic) by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(716, 226, '4 nights’ hotel accommodation in Kathmandu in a 4-star hotel with breakfast.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(717, 226, 'Welcome dinner at a Nepali cultural restaurant with the team.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(718, 226, 'Domestic flights: Kathmandu–Bhadrapur–Kathmandu for members, Sherpas, and Liaison Officer.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(719, 226, 'Ground transport: Bhadrapur–Ilam–Jorpul by vehicle and Jorpul–Base Camp via porters/mules, return same route.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(720, 226, 'Helicopter support for resupply of food and fresh vegetables to Base Camp.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(721, 226, 'Permits and fees including Kanchenjunga Expedition Royalty, Restricted Area entry, Conservation Area permit, garbage deposit, and SPCC fees.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(722, 226, 'Liaison Officer with salary, insurance, and logistics support.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(723, 226, 'Comprehensive medical and rescue insurance for Sherpas, cooks, porters, and expedition staff.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(724, 226, 'Luggage transport up to 60 kg per member carried by porters or yaks.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(725, 226, 'Three meals a day with tea/coffee during trek and expedition; nutritious meals at Base Camp including fresh meat, vegetables, and fruits.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(726, 226, 'Base Camp facilities including spacious personal box tent with mattress and pillow, dining, kitchen, communication, toilet and shower tents, heaters in dining tent, and solar/generator for charging devices.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(727, 226, 'Professional cook and kitchen team at Base Camp.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(728, 226, 'Base Camp training on ice, ladder, rope, and oxygen use before summit rotation.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(729, 226, 'Climbing Sherpa support: one experienced Sherpa per climber (1:1 ratio), covering salary, insurance, equipment, food, clothing, summit bonus, and load carrying to high camps.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(730, 226, 'Oxygen and gear: 4 bottles per member, 2 bottles per high-altitude Sherpa, and one mask & regulator set per member and Sherpa (returnable).', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(731, 226, 'High Camp logistics including high-altitude tents (shared, 2 climbers per tent), EPI gas, stoves, high-altitude meals, dining tent at Camp II, and group climbing gear (ropes, ladders, anchors, ice screws).', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(732, 226, 'Route fixing contribution for rope-fixing team.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(733, 226, 'Communication and weather support with walkie-talkies for Base Camp and high camps, satellite phone (emergency use, nominal charge), and daily reliable weather forecast.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(734, 226, 'Comprehensive medical kit at Base Camp.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(735, 226, 'Official Kanchenjunga summit certificate from MoCTCA and company memento.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-14 07:56:52', '2025-12-14 07:56:52'),
(736, 227, 'Arrival and departure airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(737, 227, '4 nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(738, 227, 'One welcome dinner at a tourist-standard restaurant in Kathmandu.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(739, 227, 'Expedition permits including Lhotse expedition royalty, Sagarmatha National Park entry permit, and Pasang Lhamu Rural Municipality permit.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(740, 227, 'Khumbu Icefall climbing fee charged by SPCC.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(741, 227, 'Government Liaison Officer with full equipment, salary, accommodation, and logistics support.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(742, 227, 'Medical and rescue insurance coverage for all Nepali staff and climbers.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(743, 227, 'Complete Base Camp setup including individual tents, kitchen, dining, toilet and shower tents, heater, solar panels, generator, furniture, and cooking utensils.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(744, 227, 'Full board meals (three meals per day) during trekking and expedition, including fresh vegetables, meat, fruits, and beverages.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(745, 227, 'Climbing support with one experienced veteran Sherpa per climber (1:1 ratio), including route fixing, training, and assistance to higher camps.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(746, 227, 'Oxygen support including summit oxygen (three 4L bottles per climber and two 4L bottles per Sherpa), masks, regulators, and backup oxygen (chargeable if used).', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(747, 227, 'Communication facilities including satellite phone and walkie-talkies for Base Camp and high camps (satellite phone usage charged separately).', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(748, 227, 'Daily professional weather forecasts.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(749, 227, 'Medical facilities including two medical checkups at Base Camp and a comprehensive medical kit.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(750, 227, 'Transportation of expedition equipment from Kathmandu to Lukla by air cargo and from Lukla to Base Camp by porters or yaks, including return transport.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(751, 227, 'Base Camp staff including professional cook, kitchen helpers, and support staff with salaries, food, and clothing covered.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(752, 227, 'Official Lhotse climbing certificate issued by the Ministry of Culture, Tourism & Civil Aviation (MoCTCA).', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 08:08:42', '2025-12-14 08:08:42'),
(753, 229, 'Arrival and departure airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(754, 229, 'Four nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis, including single room supplement.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(755, 229, 'Traditional Nepali welcome dinner in Kathmandu with company staff.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(756, 229, 'Domestic flights and ground transportation between Kathmandu, Pokhara, Marpha, and the base of the mountain.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(757, 229, 'Government-issued expedition permits including Dhaulagiri climbing permit, conservation area fees, and Dhaulagiri National Park entry permit.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(758, 229, 'Experienced Nepal Government Liaison Officer with full equipment, salary, accommodation, and logistical support.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(759, 229, 'Base Camp garbage management and waste disposal fees.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(760, 229, 'Full board meals during trekking and at Base Camp, including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(761, 229, 'Complete Base Camp setup including individual member tents, dining tent, kitchen tent, toilet and shower tents, staff tents, tables, chairs, heaters, solar panels, and generator for charging devices.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(762, 229, 'Porter support for personal baggage transportation up to 60 kg per member.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(763, 229, 'Base Camp staffing including experienced cook and kitchen helpers.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(764, 229, 'Rotation and summit support by government-licensed climbing Sherpas on a 1:1 ratio.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(765, 229, 'High-altitude tents and logistical support at Camps I, II, and III.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(766, 229, 'Summit oxygen support including three bottles per member and one bottle per high-altitude Sherpa, along with oxygen masks, regulators, and backup equipment.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(767, 229, 'Ice wall, ladder, and oxygen usage training conducted at Base Camp.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(768, 229, 'Emergency communication facilities including satellite phone and walkie-talkie permits.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(769, 229, 'Regular professional weather updates.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(770, 229, 'Comprehensive first-aid and medical kits for members and expedition staff.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(771, 229, 'Official Dhaulagiri summit certificate and commemorative expedition memento upon successful completion.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(772, 229, 'All applicable Nepali government taxes and administrative charges.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-14 08:22:56', '2025-12-14 08:22:56'),
(773, 231, 'Arrival and departure airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(774, 231, 'Four nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis with single room.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(775, 231, 'Welcome dinner in Kathmandu with expedition staff.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(776, 231, 'Cargo clearance assistance at Nepal Customs for expedition equipment.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(777, 231, 'Government-issued expedition permits including Manaslu climbing permit, Conservation Area permit, and Restricted Area permit.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(778, 231, 'One Nepal Government Liaison Officer with full salary, equipment, and logistics.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(779, 231, 'Garbage management services and government-mandated deposit fees.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(780, 231, 'Member transportation by road from Kathmandu to Dharapani and return from Machha Khola to Kathmandu.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(781, 231, 'Transportation of expedition equipment from Kathmandu to Arughat, Sama Gaun, and Base Camp by helicopter or porters, including return logistics.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(782, 231, 'Personal luggage allowance of up to 60 kg per member during the trek.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(783, 231, 'Full board meals during trekking and at Base Camp, including tea, coffee, soft drinks, and fresh fruits.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(784, 231, 'Complete Base Camp setup including individual tents with mattress and pillow, dining tent, kitchen tent, toilet and shower facilities, tables, chairs, and heaters.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(785, 231, 'High Camp infrastructure including shared tents, EPI gas, gas burners, high-altitude meals, fixed ropes, snow bars, and ice screws.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(786, 231, 'Experienced Base Camp staff including sirdar, cook, and kitchen helpers.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(787, 231, 'One government-licensed climbing Sherpa per member providing full support during acclimatization rotations and summit push.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(788, 231, 'Summit oxygen support including three bottles per member and one bottle per Sherpa, along with masks and regulators.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(789, 231, 'Emergency communication facilities including satellite phone and walkie-talkies.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(790, 231, 'Internet service at Base Camp with limited bandwidth, subject to additional charge.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(791, 231, 'Regular weather forecasting services and comprehensive medical kits for members and staff.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(792, 231, 'Bakery and bar facilities available at Base Camp.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(793, 231, 'Ice wall, ladder, and oxygen usage training conducted at Base Camp.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(794, 231, 'Official Manaslu summit certificate issued by the Government of Nepal upon successful ascent.', NULL, NULL, NULL, NULL, 22, 1, '2025-12-14 08:35:07', '2025-12-14 08:35:07'),
(795, 232, 'Arrival and departure airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(796, 232, 'Four nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis with single room.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(797, 232, 'Welcome dinner in Kathmandu with expedition staff.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(798, 232, 'Cargo clearance assistance at Nepal Customs for expedition equipment.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(799, 232, 'Two nights’ accommodation in a 3-star hotel in Pokhara on a bed & breakfast basis (shared room).', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(800, 232, 'Government-issued expedition permits including Annapurna I climbing permit, Conservation Area permit, and Restricted Area permit.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(801, 232, 'One Nepal Government Liaison Officer with full equipment, salary, and accommodation.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(802, 232, 'Garbage management services and government-mandated deposit fees.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(803, 232, 'Domestic transportation including Kathmandu to Pokhara by flight, Pokhara to Dana by jeep, and return travel.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(804, 232, 'Shared helicopter transfers between Dana and Annapurna Base Camp.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(805, 232, 'Transportation of expedition equipment from Kathmandu to Dana by truck and from Dana to Base Camp by helicopter, porters, or mules, including return logistics.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(806, 232, 'Personal luggage allowance of up to 60 kg per member during the trek, carried by porters or mules.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(807, 232, 'Full board meals during trekking and at Base Camp including breakfast, lunch, dinner, tea, coffee, fresh fruits, vegetables, and soft drinks.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(808, 232, 'Complete Base Camp setup including individual tents with mattress and pillow, dining tent, kitchen tent, toilet and explained shower facilities, tables, chairs, and heaters.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(809, 232, 'High Camp infrastructure including shared tents, EPI gas, gas burners, high-altitude meals, ropes, snow bars, and ice screws.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(810, 232, 'Experienced Base Camp staff including sirdar, cook, and kitchen helpers.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(811, 232, 'One government-licensed climbing Sherpa per member providing full support throughout the expedition and summit push.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(812, 232, 'Summit oxygen support including three bottles per member and one bottle per Sherpa with masks and regulators.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(813, 232, 'Emergency communication facilities including satellite phone and walkie-talkies.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(814, 232, 'Internet service available at Base Camp, subject to additional charge.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(815, 232, 'Regular weather forecasting services and comprehensive medical kits for members and staff.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(816, 232, 'Ice wall, ladder, and oxygen usage training conducted at Base Camp.', NULL, NULL, NULL, NULL, 22, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(817, 232, 'Official Annapurna I summit certificate issued by the Government of Nepal upon successful ascent.', NULL, NULL, NULL, NULL, 23, 1, '2025-12-14 08:49:17', '2025-12-14 08:49:17'),
(818, 233, 'Arrival and departure airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(819, 233, 'Four nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis with single room.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(820, 233, 'Welcome dinner in Kathmandu with expedition staff.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(821, 233, 'Cargo clearance assistance at Nepal Customs for expedition equipment.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(822, 233, 'Government-issued expedition permits including Everest and Lhotse climbing permits, Sagarmatha National Park entry permit, and Pasang Lhamu Rural Municipality permit.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(823, 233, 'Khumbu Icefall climbing fee issued by the Sagarmatha Pollution Control Committee (SPCC).', NULL, NULL, NULL, NULL, 6, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(824, 233, 'One Government Liaison Officer for both peaks with full equipment, salary, and accommodation.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(825, 233, 'Garbage management and waste disposal fees as per government regulations.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(826, 233, 'Medical and emergency rescue insurance coverage for all Nepalese expedition staff.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(827, 233, 'Trekking and climbing route maps for the expedition.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(828, 233, 'Expedition duffle bag provided to each member.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(829, 233, 'Domestic flights between Kathmandu and Lukla.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(830, 233, 'Transportation of expedition equipment from Kathmandu to Lukla by air cargo and from Lukla to Base Camp by porters or yaks, including return logistics.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(831, 233, 'Personal baggage allowance of up to 70 kg per member carried by porters or yaks.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(832, 233, 'Full board meals during trekking and at Base Camp including breakfast, lunch, dinner, tea, coffee, fresh fruits, vegetables, and soft drinks.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(833, 233, 'Complete Base Camp setup including individual tents with mattress and pillow, dining tent, kitchen tent, toilet and shower tents, staff tents, tables, chairs, and heaters.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(834, 233, 'High Camp infrastructure including shared tents, EPI gas, gas burners, high-altitude meals, climbing ropes, snow bars, and ice screws.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(835, 233, 'Experienced Base Camp staff including sirdar, cook, and kitchen helpers.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(836, 233, 'One licensed climbing Sherpa per member providing full support during all rotations and summit attempts.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(837, 233, 'Supplemental oxygen support including eight bottles per member and five bottles per high-altitude Sherpa with masks and regulators, with backup oxygen available at additional cost.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(838, 233, 'Ice wall, ladder, and oxygen usage training at Base Camp conducted under certified guides.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(839, 233, 'Emergency communication facilities including satellite phone and walkie-talkies.', NULL, NULL, NULL, NULL, 22, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(840, 233, 'Internet service available at Base Camp, subject to additional charge.', NULL, NULL, NULL, NULL, 23, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(841, 233, 'Daily weather forecasting services.', NULL, NULL, NULL, NULL, 24, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(842, 233, 'Comprehensive medical kits available for members and staff at Base Camp.', NULL, NULL, NULL, NULL, 25, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(843, 233, 'Official Everest and Lhotse summit certificates issued by the Government of Nepal upon successful ascent.', NULL, NULL, NULL, NULL, 26, 1, '2025-12-14 09:01:47', '2025-12-14 09:01:47'),
(844, 234, 'Airport–hotel–airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(845, 234, 'Four nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(846, 234, 'Welcome dinner at a tourist-standard restaurant in Kathmandu.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(847, 234, 'Assistance with cargo clearance for expedition equipment in Nepal.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(848, 234, 'All required expedition permits including Himlung Himal climbing permit, restricted area permit, and conservation area entry fees.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(849, 234, 'One official Government Liaison Officer with full equipment, salary, and accommodation.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(850, 234, 'Garbage management and waste disposal fees as per government regulations.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(851, 234, 'Medical and emergency rescue insurance coverage for all Nepalese expedition staff.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(852, 234, 'Trekking and expedition route maps.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(853, 234, 'One expedition duffle bag provided to each participant.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(854, 234, 'Ground transportation between Kathmandu, Besisahar, and Koto including return journey.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(855, 234, 'Transportation of expedition equipment from Kathmandu to Base Camp and back by porters or mules.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(856, 234, 'Personal baggage allowance of up to 60 kg per participant during the trek.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(857, 234, 'Full board meals at Base Camp including three meals per day, hot drinks, fresh vegetables, meat, fruits, and soft drinks supplied regularly by helicopter.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(858, 234, 'Fully equipped Base Camp setup including individual tents, dining tent, kitchen tent, toilet and shower tents, tables, chairs, and heaters.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(859, 234, 'Experienced Base Camp staff including sirdar, cooks, and kitchen helpers.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(860, 234, 'High-altitude climbing training at Base Camp including ice wall practice and oxygen mask and regulator usage.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(861, 234, 'One experienced government-licensed climbing Sherpa per member on a one-to-one basis for the entire expedition.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(862, 234, 'High Camp services including tents, cooking equipment, high-altitude food, and fixed rope support.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(863, 234, 'Emergency communication facilities including satellite phone and walkie-talkies.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(864, 234, 'Regular weather forecast services throughout the expedition period.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(865, 234, 'Comprehensive first aid and medical kits for members and staff.', NULL, NULL, NULL, NULL, 22, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(866, 234, 'Official Himlung Himal summit certificate issued after successful ascent.', NULL, NULL, NULL, NULL, 23, 1, '2025-12-19 01:24:06', '2025-12-19 01:24:06'),
(867, 235, 'Airport–hotel–airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(868, 235, 'Four nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(869, 235, 'Welcome dinner at a tourist-standard restaurant in Kathmandu.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(870, 235, 'Assistance with cargo clearance for expedition equipment in Nepal.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(871, 235, 'All required permits including Baruntse climbing permit, Sagarmatha or Makalu National Park entry permit, and Pasang Lhamu Rural Municipality permit.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(872, 235, 'One official Government Liaison Officer with full equipment, salary, and accommodation.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(873, 235, 'Garbage management and waste disposal fees as per government regulations.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(874, 235, 'Medical and emergency rescue insurance coverage for all Nepalese expedition staff.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(875, 235, 'Trekking and expedition route maps.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(876, 235, 'One expedition duffle bag provided to each participant.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(877, 235, 'Domestic flights between Kathmandu and Lukla including return journey.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(878, 235, 'Transportation of expedition equipment to and from Base Camp by air cargo, porters, or yaks as required.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(879, 235, 'Personal baggage allowance of up to 60 kg per participant during the trek.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(880, 235, 'Full board meals at Base Camp including three meals per day with tea, coffee, hot drinks, fresh vegetables, meat, fruits, and soft drinks.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(881, 235, 'Fully equipped Base Camp setup including individual tents, dining tent, kitchen tent, toilet and shower tents, tables, chairs, and heaters.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(882, 235, 'Experienced Base Camp staff including sirdar, cooks, and kitchen helpers.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(883, 235, 'High-altitude climbing and technical training at Base Camp including ice wall practice, oxygen usage, and equipment handling.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(884, 235, 'One experienced government-licensed climbing Sherpa per participant on a one-to-one basis throughout the expedition.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(885, 235, 'High Camp services including tents, cooking equipment, high-altitude food supplies, fixed ropes, and safety equipment.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(886, 235, 'Emergency communication facilities including satellite phone and walkie-talkies.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(887, 235, 'Regular weather forecast services throughout the expedition period.', NULL, NULL, NULL, NULL, 21, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(888, 235, 'Comprehensive first aid and medical kits for all members and staff.', NULL, NULL, NULL, NULL, 22, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(889, 235, 'Official Baruntse summit certificate issued after successful ascent.', NULL, NULL, NULL, NULL, 23, 1, '2025-12-19 01:35:43', '2025-12-19 01:35:43'),
(890, 236, 'Private airport pick-up and drop-off services in Kathmandu.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(891, 236, 'Four nights’ accommodation in a 4-star hotel in Kathmandu on a bed & breakfast basis and one night hotel accommodation in Nepalgunj on a full board basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(892, 236, 'One traditional welcome dinner in Kathmandu with expedition staff.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(893, 236, 'All required permits and fees including expedition royalty, climbing permit, and conservation area entry fees.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(894, 236, 'One Government Liaison Officer with full equipment, salary, and accommodation.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(895, 236, 'Assistance with cargo clearance and transportation of expedition equipment from Kathmandu to Juphal or Dunai and onward to Base Camp by jeep, porters, or mules, including return.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(896, 236, 'Personal luggage allowance of up to 50 kg per participant during the trek to Base Camp.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(897, 236, 'Full board meals during the trek including breakfast, lunch, dinner, and tea or coffee at lodges, hotels, and camps.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(898, 236, 'Fully organized Base Camp logistics including comfortable tents, hygienic meals, dining, kitchen, toilet, and shower facilities with fresh vegetables, meat, and soft drinks.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(899, 236, 'Porters and full camping equipment support for the trek to and from Base Camp including tents, sleeping mats, and kitchen and dining gear.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(900, 236, 'Experienced Base Camp staff including cook, kitchen helpers, and support staff with salary, food, and equipment covered.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(901, 236, 'One government-licensed climbing Sherpa per member providing high-altitude support, route fixing assistance, and summit support.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(902, 236, 'Emergency oxygen backup including oxygen bottle, masks, regulators, and comprehensive first aid equipment.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(903, 236, 'High Camp infrastructure including tents, cooking equipment, EPI gas, and high-altitude food supplies.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(904, 236, 'Emergency communication facilities including satellite phone and walkie-talkies, with weather forecast services throughout the expedition.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(905, 236, 'Technical and safety training at Base Camp including ice wall practice, equipment handling, and oxygen usage.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(906, 236, 'Official Putha Hiunchuli summit certificate issued by the Ministry of Culture, Tourism & Civil Aviation and a commemorative memento upon completion of the expedition.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-19 01:49:32', '2025-12-19 01:49:32'),
(907, 237, 'Private airport pick-up and drop-off services in Kathmandu.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(908, 237, 'Four nights’ hotel accommodation in Kathmandu in a 3-star hotel on a bed & breakfast basis with twin sharing, lodge accommodation during the trek, and individual tents at Base Camp.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(909, 237, 'One welcome dinner at a local Nepali restaurant in Kathmandu with expedition staff.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(910, 237, 'All required permits and fees including Mount Pumori climbing permit, Sagarmatha National Park entry permit, TIMS card, and Pasang Lhamu Rural Municipality entry fee.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(911, 237, 'One Government-licensed Liaison Officer with full equipment, salary, and accommodation.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(912, 237, 'Air cargo transportation of expedition equipment from Kathmandu to Lukla, porter or yak support to Base Camp and return, and personal luggage allowance of up to 60 kg per member.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(913, 237, 'Full board meals during the trek and at Base Camp including breakfast, lunch, dinner, and tea or coffee, with well-organized Base Camp facilities including dining, kitchen, toilet, and shower tents.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(914, 237, 'Experienced Base Camp staff including cook and kitchen helpers with salaries, food, and equipment covered.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(915, 237, 'One licensed climbing Sherpa per member providing high-altitude support including gear assistance, route fixing, and summit support.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(916, 237, 'Emergency oxygen support including backup summit oxygen bottles, masks, regulators, and comprehensive first aid kits.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(917, 237, 'High Camp infrastructure including tents, cooking equipment, EPI gas, high-altitude food supplies, and route fixing by experienced Sherpas.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(918, 237, 'Emergency communication facilities including satellite phone and walkie-talkies, with daily weather forecasts throughout the expedition.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(919, 237, 'Technical training and safety briefing at Base Camp including climbing techniques and oxygen usage.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(920, 237, 'Official Pumori summit certificate issued by the Ministry of Culture, Tourism & Civil Aviation and a commemorative memento upon successful ascent.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-19 01:59:55', '2025-12-19 01:59:55'),
(921, 190, 'Airport pick-up and drop-off services in Kathmandu for both international and domestic flights.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(922, 190, 'Three nights’ hotel accommodation in Kathmandu on a bed & breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(923, 190, 'Welcome and farewell dinners in Kathmandu with expedition staff.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(924, 190, 'Domestic flights between Kathmandu and Lukla including all applicable airport taxes.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(925, 190, 'All required trekking and climbing permits including Mera Peak, Island Peak, Lobuche Peak, Sagarmatha National Park entry permit, and Pasang Lhamu Rural Municipality fee.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(926, 190, 'Tea house accommodation during trekking and camping facilities at all high camps.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(927, 190, 'High camp services including tents, high-altitude meals, ropes, and essential group climbing equipment.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(928, 190, 'Three meals per day during trekking and climbing periods including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(929, 190, 'Licensed and experienced trekking guides and climbing Sherpas with a 1:1 Sherpa-to-member ratio.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(930, 190, 'Porter support for baggage transportation with one porter allocated per participant.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(931, 190, 'Personal baggage allowance of approximately 20–25 kg per participant carried by porters.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(932, 190, 'Comprehensive insurance coverage for all Nepalese staff involved in the expedition.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(933, 190, 'Expedition duffle bags and a souvenir cap for each participant.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(934, 190, 'First aid and basic medical kits available throughout the expedition.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(935, 190, 'All applicable Nepal government taxes and service charges.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(936, 190, 'Official climbing certificates for Mera Peak, Island Peak, and Lobuche Peak upon successful ascents.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(937, 190, 'Guided sightseeing tour in Kathmandu Valley including Swayambhunath and Kathmandu Durbar Square.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12');
INSERT INTO `cl_cost_includes` (`id`, `trip_detail_id`, `title`, `content`, `thumbnail`, `country`, `video`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(938, 190, 'Emergency oxygen provision and high-altitude support to ensure safe summit attempts.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-19 02:35:12', '2025-12-19 02:35:12'),
(939, 240, 'Airport pick-up and drop-off services in Kathmandu for both international and domestic flights.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(940, 240, 'Three nights’ accommodation in Kathmandu at a 4-star hotel on a bed & breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(941, 240, 'Twin-sharing lodge accommodation during the trek and tented accommodation at High Camp.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(942, 240, 'Three meals per day during trekking and climbing periods including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(943, 240, 'Domestic flights between Kathmandu and Lukla via Ramechhap including all airport taxes.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(944, 240, 'All required permits including Lobuche Peak Climbing Permit (NMA), Sagarmatha National Park entry permit, and Pasang Lhamu Rural Municipality fee.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(945, 240, 'Licensed trekking guide and experienced climbing Sherpa with a 1:1 Sherpa-to-member ratio for the summit push.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(946, 240, 'Porter and yak support for baggage transportation with a maximum allowance of 25 kg per member during the trek.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(947, 240, 'Base Camp and High Camp facilities including dining tent, kitchen tent, cooking equipment, and comfortable member tents.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(948, 240, 'Climbing support with group climbing equipment, fixed ropes, ice screws, snow bars, cooking gas, and high-altitude food.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(949, 240, 'Pre-climb training at High Camp including use of crampons, ice axe, jumar, and basic climbing techniques.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(950, 240, 'Medical and emergency evacuation insurance coverage for all Nepalese staff.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(951, 240, 'Comprehensive first aid kit and satellite communication access for safety purposes.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(952, 240, 'Government formalities including expedition permit processing and liaison coordination.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(953, 240, 'Welcome and farewell dinners in Kathmandu, expedition duffle bag, and Lobuche Peak summit certificate after successful ascent.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-19 02:53:01', '2025-12-19 02:53:01'),
(954, 241, 'Airport pick-up and drop-off services in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(955, 241, 'Four nights’ accommodation in Kathmandu at a 4-star hotel on a bed & breakfast basis with single room.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(956, 241, 'Twin-sharing lodge accommodation during the trekking period.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(957, 241, 'Comfortable personal box tent at Base Camp and shared tent accommodation at high camps.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(958, 241, 'Full board meals during trekking and expedition period including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(959, 241, 'Fresh vegetables, fruits, and hygienically prepared meals at Base Camp.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(960, 241, 'Domestic flights between Kathmandu and Lukla including all airport taxes.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(961, 241, 'All required permits including Ama Dablam climbing permit, Sagarmatha National Park entry permit, and Pasang Lhamu Rural Municipality fee.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(962, 241, 'Licensed expedition leader and experienced climbing Sherpa with a 1:1 Sherpa-to-member ratio.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(963, 241, 'Base Camp cook, kitchen helpers, and porter or yak support for load transportation.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(964, 241, 'Base Camp facilities including dining tent, kitchen tent, toilet tent, and shower tent.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(965, 241, 'Heating facility in the dining tent along with solar or generator-powered charging facilities at Base Camp.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(966, 241, 'Climbing support including fixed ropes, group climbing equipment, cooking gas, high-altitude tents, and technical logistics.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(967, 241, 'Regular weather forecast updates and communication support through walkie-talkies and satellite phone.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(968, 241, 'Medical and emergency evacuation insurance coverage for all Nepalese staff.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(969, 241, 'Comprehensive first aid medical kit available at Base Camp.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(970, 241, 'Government liaison officer services and completion of all required official documentation.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(971, 241, 'Cargo handling and logistics support for transportation of expedition equipment from Kathmandu to Base Camp and return.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(972, 241, 'Ama Dablam summit certificate issued by the Ministry of Tourism after successful ascent.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(973, 241, 'Summit Solution Treks expedition duffle bag and farewell dinner in Kathmandu.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-19 03:34:56', '2025-12-19 03:34:56'),
(974, 243, 'Airport pick-up and drop-off services in Kathmandu by private vehicle for international and domestic flights.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(975, 243, 'Three nights’ hotel accommodation in Kathmandu at a 3-star category hotel on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(976, 243, 'Traditional welcome and farewell dinner hosted by Summit Solution in Kathmandu.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(977, 243, 'Round-trip domestic flights between Kathmandu or Ramechhap and Lukla including all airport taxes.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(978, 243, 'All required permits including Island Peak climbing permit issued by NMA, Sagarmatha National Park entry permit, and local municipality fee.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(979, 243, 'Twin-sharing lodge accommodation during the trekking period and tented accommodation at Base Camp and High Camp.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(980, 243, 'Three nutritious meals per day during the trek and expedition including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(981, 243, 'One experienced, government-licensed climbing Sherpa per member for summit attempt support.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(982, 243, 'Porter services for carrying expedition and personal equipment up to 25 kg per member.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(983, 243, 'High Camp services including high-altitude tents, cooking fuel, kitchen equipment, and climbing food during the summit period.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(984, 243, 'Group climbing equipment including fixed and dynamic ropes, ice screws, snow bars, and other essential technical gear.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(985, 243, 'Medical and emergency rescue insurance coverage for all Nepalese staff including climbing Sherpas and porters.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(986, 243, 'Emergency oxygen bottle with mask and regulator available at Base Camp.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(987, 243, 'Comprehensive first aid medical kit for members and staff.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(988, 243, 'Company-branded expedition duffle bag and detailed trekking route map.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(989, 243, 'Regular weather forecast updates throughout the expedition period.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(990, 243, 'Transportation and logistics of expedition equipment from Kathmandu to Lukla and return by air and porter or yak.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(991, 243, 'All applicable local and government taxes and service charges.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-20 01:52:36', '2025-12-20 01:52:36'),
(992, 244, 'Airport pick-up and drop-off services in Kathmandu by private vehicle for both international and domestic flights.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(993, 244, 'Three nights’ hotel accommodation in Kathmandu at a 3-star category hotel on a bed and breakfast basis in twin-sharing rooms.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(994, 244, 'Traditional welcome dinner with cultural performance hosted by Summit Solution in Kathmandu.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(995, 244, 'Round-trip domestic flights between Kathmandu or Ramechhap and Lukla including all airport taxes.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(996, 244, 'All required permits including Mera Peak climbing permit issued by NMA, Makalu-Barun National Park entry permit, and local area permits.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(997, 244, 'Lodge or teahouse accommodation during the trek and tented accommodation at High Camp.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(998, 244, 'Three nutritious meals per day during the trek and expedition including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(999, 244, 'One experienced, government-licensed climbing Sherpa per member for the summit period.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1000, 244, 'Porter services for carrying expedition and personal luggage up to 25 kg per member.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1001, 244, 'Group climbing equipment including ropes, anchors, snow bars, ice screws, and other essential technical gear.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1002, 244, 'High Camp services including high-altitude tents, cooking fuel, kitchen equipment, and high-altitude food during summit days.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1003, 244, 'Full insurance coverage for all Nepalese staff including trekking guides, porters, and climbing Sherpas.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1004, 244, 'Experienced cook and kitchen helpers at Base Camp or High Camp as required.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1005, 244, 'Emergency oxygen cylinder with mask and regulator available at Base Camp.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1006, 244, 'Comprehensive first aid medical kit for members and staff.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1007, 244, 'Government-licensed trekking and climbing guides fluent in English.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1008, 244, 'Regular weather forecast updates for safe summit planning.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1009, 244, 'Complimentary expedition duffle bag and detailed trekking map from Summit Solution.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1010, 244, 'Transportation and logistics of expedition equipment from Kathmandu to Lukla and return by air cargo and porter or yak.', NULL, NULL, NULL, NULL, 19, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1011, 244, 'All applicable local and government taxes and service charges.', NULL, NULL, NULL, NULL, 20, 1, '2025-12-20 02:04:07', '2025-12-20 02:04:07'),
(1012, 247, 'Airport pick-up and drop-off services in Kathmandu by private vehicle for international flights.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1013, 247, 'Hotel accommodation in Kathmandu and Pokhara on a bed and breakfast basis in twin-sharing rooms.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1014, 247, 'Welcome dinner in Kathmandu combined with a detailed expedition briefing.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1015, 247, 'All ground transportation during the expedition including Kathmandu–Besisahar–Chame and Jomsom–Pokhara sectors.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1016, 247, 'All required trekking and climbing permits including Chulu East Peak climbing permit issued by NMA, Annapurna Conservation Area entry permit, and TIMS card.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1017, 247, 'Lodge or teahouse accommodation during the trek on a twin-sharing basis and tented accommodation at Base Camp.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1018, 247, 'Full board meals during the trek including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1019, 247, 'Porter support at the ratio of one porter for two participants for carrying personal trekking and climbing equipment.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1020, 247, 'Licensed and experienced climbing Sherpa and trekking guides for summit and route support.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1021, 247, 'Salaries, meals, accommodation, and insurance coverage for all Nepalese staff and porters.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1022, 247, 'High-altitude equipment, cooking fuel, and essential group climbing gear provided at Base Camp.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1023, 247, 'Emergency oxygen cylinder with mask and regulator available at Base Camp.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1024, 247, 'Comprehensive first aid kit with basic medical support for members and staff.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1025, 247, 'Guided sightseeing in Kathmandu Valley with a licensed English-speaking guide.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1026, 247, 'Farewell dinner at a traditional Nepali restaurant.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1027, 247, 'All applicable government taxes, service charges, and expedition-related fees.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 02:13:34', '2025-12-20 02:13:34'),
(1028, 248, 'Airport pick-up and drop-off services in Kathmandu by private vehicle for international arrivals and departures.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1029, 248, 'Three nights of accommodation in a 3-star category hotel in Kathmandu on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1030, 248, 'Welcome dinner in Kathmandu with traditional cultural performance and detailed expedition briefing.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1031, 248, 'All ground transportation during the expedition including Kathmandu–Syange and Chame–Besisahar–Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1032, 248, 'All required domestic permits and fees including Chulu West Peak climbing permit issued by NMA, Annapurna Conservation Area entry permit, and TIMS card.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1033, 248, 'Lodge or teahouse accommodation during the trek on a twin-sharing basis and tented accommodation at both Base Camp and High Camp.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1034, 248, 'Full board meals during the trekking and climbing period including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1035, 248, 'One-to-one porter support for carrying personal luggage and trekking or climbing equipment up to 30 kg per participant.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1036, 248, 'Licensed and experienced climbing Sherpa for technical climbing and summit support.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1037, 248, 'Salaries, meals, accommodation, and insurance coverage for all Nepalese staff and porters throughout the expedition.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1038, 248, 'High Camp services including quality tents, cooking fuel, high-altitude food, and necessary group climbing equipment.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1039, 248, 'Emergency oxygen cylinder with mask and regulator available at Base Camp for safety support.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1040, 248, 'Comprehensive first aid kit with basic medical assistance for members and staff.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1041, 248, 'Walkie-talkie communication system between Base Camp and High Camp.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1042, 248, 'Guided sightseeing tour in Kathmandu Valley with a licensed English-speaking guide.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1043, 248, 'Official summit certificate issued by the Nepal Mountaineering Association upon successful ascent.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1044, 248, 'All applicable government taxes, service charges, and expedition-related fees.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-20 02:23:13', '2025-12-20 02:23:13'),
(1045, 250, 'Airport pick-up and drop-off services in Kathmandu by private vehicle for international arrivals and departures.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1046, 250, 'Accommodation in Kathmandu and Pokhara on a bed and breakfast basis at comfortable tourist-standard hotels.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1047, 250, 'Welcome and farewell dinners in Kathmandu hosted by the expedition team.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1048, 250, 'All required climbing and trekking permits including Thorong Peak (6,144 m) climbing permit and Annapurna Conservation Area (ACAP) entry permit.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1049, 250, 'Garbage deposit and environmental management fees as required by the concerned authorities.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1050, 250, 'All domestic flights and overland transportation required during the expedition period.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1051, 250, 'Lodge or teahouse accommodation during the trek on a twin-sharing basis and tented accommodation at Base Camp.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1052, 250, 'Full board meals during trekking and climbing days including breakfast, lunch, dinner, and tea or coffee.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1053, 250, 'One porter per climber for carrying personal luggage during the trekking and climbing period.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1054, 250, 'Licensed and experienced climbing Sherpa and trekking guides for technical climbing and summit support.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1055, 250, 'Salaries, insurance, meals, and daily allowances for all Nepalese staff and porters.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1056, 250, 'Complete expedition logistics and camping equipment including tents, cooking sets, kitchen equipment, and high-altitude food.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1057, 250, 'Necessary technical climbing equipment such as ropes, pitons, and essential safety gear for the expedition.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1058, 250, 'Comprehensive medical kit and emergency oxygen supply available at Base Camp.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1059, 250, 'All applicable government taxes, service charges, and expedition-related fees.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 02:32:17', '2025-12-20 02:32:17'),
(1060, 131, 'Airport pick-up and drop-off services in Kathmandu by private vehicle for both international and domestic flights.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1061, 131, 'Three nights of hotel accommodation in Kathmandu at a 3–4 star category hotel on a twin-sharing bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1062, 131, 'One authentic Nepali welcome dinner at a traditional cultural restaurant in Kathmandu.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1063, 131, 'Round-trip domestic flights between Kathmandu or Ramechhap and Lukla including airport taxes and all required transfers.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1064, 131, 'All required trekking permits and documentation including Sagarmatha National Park entry permit, Pasang Lhamu Rural Municipality permit, and TIMS card.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1065, 131, 'Services of a licensed, English-speaking trekking guide experienced in the Everest region, equipped with first aid supplies and satellite communication for emergencies.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1066, 131, 'Porter services on a shared basis with one porter for every two trekkers to carry personal luggage up to 14–15 kg per member.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1067, 131, 'Full board meals during the trek including breakfast, lunch, dinner, and tea or coffee with a variety of Nepali, Tibetan, and Continental options.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1068, 131, 'Accommodation in the best available mountain lodges and teahouses throughout the trekking route, with attached bathrooms in Namche Bazaar where available.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1069, 131, 'Two liters of boiled drinking water per trekker per day provided during the trekking period.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1070, 131, 'Full insurance coverage, food, accommodation, salary, and transportation for all Nepalese trekking staff.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1071, 131, 'Comprehensive first aid medical kit and emergency oxygen cylinder available for use during the trek.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1072, 131, 'Half-day guided sightseeing tour in Kathmandu covering Swayambhunath (Monkey Temple) and Kathmandu Durbar Square including entrance fees and private vehicle.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1073, 131, 'Detailed Everest Region trekking map and Summit Solution duffle bag.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1074, 131, 'All applicable government taxes, service charges, and trekking documentation fees.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 02:45:14', '2025-12-20 02:45:14'),
(1075, 253, 'Airport pick-up and drop-off services between Tribhuvan International Airport and the hotel in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1076, 253, 'Three nights of hotel accommodation in Kathmandu at a 3-star or equivalent category hotel on a twin-sharing bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1077, 253, 'One traditional Nepali welcome dinner at a cultural restaurant in Kathmandu hosted by Summit Solution.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1078, 253, 'All required trekking permits and documentation including Sagarmatha National Park entry permit, TIMS card, and local municipality entry fee.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1079, 253, 'Round-trip domestic flights between Kathmandu and Lukla including all applicable airport taxes.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1080, 253, 'Domestic transportation or flights for trekking staff as required by the itinerary.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1081, 253, 'Accommodation in comfortable lodges and tea houses throughout the trekking route on a twin-sharing basis with basic bedding.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1082, 253, 'Three freshly prepared meals per day during the trek including breakfast, lunch, dinner, and tea or coffee with a mix of Nepali, Sherpa, and continental dishes.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1083, 253, 'Provision of two liters of boiled and filtered drinking water per person per day during trekking days.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1084, 253, 'Services of an experienced, English-speaking, government-licensed trekking guide with strong knowledge of local culture and trekking routes.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1085, 253, 'Porter services on a shared basis with one porter for every two trekkers to carry luggage up to 15 kg per person.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1086, 253, 'Full medical and emergency rescue insurance coverage for all Nepalese trekking staff.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1087, 253, 'Complimentary Everest Region trekking map and Summit Solution duffle bag for use during the trek.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1088, 253, 'Comprehensive first aid medical kit carried by the trekking guide for emergency situations.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1089, 253, 'All applicable government taxes, company service charges, and administrative expenses.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 02:55:52', '2025-12-20 02:55:52'),
(1090, 254, 'Private airport pick-up and drop-off services between Tribhuvan International Airport and the hotel in Kathmandu.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1091, 254, 'Three nights of accommodation in a comfortable 3-star category hotel in Kathmandu on a twin-sharing bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1092, 254, 'One traditional Nepali welcome dinner with live cultural performances at a local restaurant in Kathmandu hosted by Summit Solution.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1093, 254, 'All required trekking permits and entry fees including Sagarmatha National Park entry permit, TIMS card, and Pasang Lhamu Rural Municipality entry permit.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1094, 254, 'Round-trip domestic flights between Kathmandu and Lukla including all applicable airport taxes.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1095, 254, 'Domestic transportation or flights for trekking staff as required by the itinerary.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1096, 254, 'Lodge and tea house accommodation during the trek on a twin-sharing basis in clean and comfortable locally operated lodges.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1097, 254, 'Three freshly prepared meals per day during the trek including breakfast, lunch, dinner, and tea or coffee with a mix of local and international dishes.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1098, 254, 'Provision of up to two liters of boiled and filtered drinking water per person per day during the trek.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1099, 254, 'Services of a government-licensed, English-speaking, and experienced trekking guide familiar with high-altitude terrain and Sherpa culture.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1100, 254, 'Porter services on a shared basis with one porter for every two trekkers carrying luggage up to 15 kg per person.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1101, 254, 'Full medical and emergency rescue insurance coverage for all trekking staff and porters.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1102, 254, 'Comprehensive first aid and medical kit carried by the trekking guide for safety and minor health issues.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1103, 254, 'Emergency supplemental oxygen with mask available during the trek for immediate support if required.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1104, 254, 'Helicopter rescue support on emergency standby throughout the trek.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1105, 254, 'Complimentary Everest Region trekking map and Summit Solution duffle bag to be returned after the trek.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1106, 254, 'All applicable government taxes, company service charges, and administrative expenses.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-20 03:05:25', '2025-12-20 03:05:25'),
(1107, 165, 'Private airport pick-up and drop-off services in Kathmandu to ensure smooth arrival and departure arrangements by Summit Solution Treks and Expedition.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1108, 165, 'Three nights of accommodation in a comfortable 3-star category hotel in Kathmandu on a twin-sharing bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1109, 165, 'Two nights of accommodation in a 3-star hotel in Pokhara on a bed and breakfast plan, offering a relaxing stay before and after the trek.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1110, 165, 'One traditional Nepali welcome dinner with cultural performance in Kathmandu hosted by the Summit Solution team.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1111, 165, 'All required trekking permits and entry fees including Annapurna Conservation Area Permit (ACAP) and TIMS Card.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1112, 165, 'Ground or domestic transportation between Kathmandu and Pokhara by tourist vehicle or flight as per itinerary and client preference.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1113, 165, 'Private vehicle transportation from Pokhara to Nayapul and return after completion of the trek.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1114, 165, 'Lodge and teahouse accommodation during the trek on a twin-sharing basis in clean and comfortable mountain lodges.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1115, 165, 'Three freshly prepared meals per day during the trek including breakfast, lunch, and dinner with tea or coffee, offering Nepali, Tibetan, and continental cuisine.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1116, 165, 'Services of a professional, English-speaking, government-licensed trekking guide provided by Summit Solution Treks and Expedition.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1117, 165, 'Porter services on a shared basis with one porter for every two trekkers, carrying up to 15 kg of luggage per person.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1118, 165, 'Provision of up to two liters of boiled or filtered drinking water per person per day during the trek.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1119, 165, 'Full medical, accident, and emergency rescue insurance coverage for all Nepalese trekking staff and porters.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1120, 165, 'Comprehensive first aid medical kit carried by the trekking guide for safety and emergency use.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1121, 165, 'Optional guided sightseeing tour in Kathmandu covering UNESCO World Heritage sites such as Swayambhunath (Monkey Temple) and Kathmandu Durbar Square upon request.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1122, 165, 'All applicable government taxes, official charges, and company service fees.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 03:25:15', '2025-12-20 03:25:15'),
(1123, 256, 'Private airport pick-up and drop-off services in Kathmandu for both arrival and departure.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1124, 256, 'Three nights’ accommodation in a 3-star category hotel in Kathmandu and two nights in Pokhara on a twin-sharing bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1125, 256, 'One complimentary welcome dinner at a traditional Nepali restaurant in Kathmandu hosted by Summit Solution Treks & Expedition.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1126, 256, 'All required trekking permits and documentation including Annapurna Conservation Area Project (ACAP) entry permit and TIMS (Trekkers’ Information Management System) card.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1127, 256, 'Domestic round-trip transportation between Kathmandu and Pokhara by flight as per the itinerary.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1128, 256, 'Private overland transportation from Pokhara to Humkhola (trek starting point) and return after completion of the trek.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1129, 256, 'Lodge, teahouse, and tented accommodation during the trek as per route conditions and remoteness.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1130, 256, 'Three freshly prepared meals per day during the trek including breakfast, lunch, and dinner with tea or coffee, using hygienic and locally sourced ingredients.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1131, 256, 'Full camping support in remote sections of the trek including tents, kitchen equipment, dining tents, tables, and chairs.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1132, 256, 'Services of an experienced, government-licensed, English-speaking trekking guide provided by Summit Solution Treks & Expedition.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1133, 256, 'Porter services on a shared basis with one porter for every two trekkers.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1134, 256, 'Transportation of personal luggage up to 15 kg per participant by porters during the trek.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1135, 256, 'Full wages, meals, accommodation, insurance, and necessary equipment for all trekking staff including guides, porters, and support crew.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1136, 256, 'Guided sightseeing tour in Kathmandu covering major UNESCO World Heritage Sites such as Swayambhunath (Monkey Temple) and Kathmandu Durbar Square, including private vehicle and professional guide.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1137, 256, 'Satellite phone carried by the trekking guide for emergency communication (available for use at minimal additional charge).', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1138, 256, 'Comprehensive first aid and medical kit carried by the trekking team for safety and emergency response.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1139, 256, 'Complimentary trek completion certificate and souvenir from Summit Solution Treks & Expedition.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1140, 256, 'All applicable government taxes, service charges, and administrative fees.', NULL, NULL, NULL, NULL, 18, 1, '2025-12-20 03:40:28', '2025-12-20 03:40:28'),
(1141, 257, 'Private airport pick-up and drop-off services in Kathmandu for both arrival and departure.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1142, 257, 'Three nights’ accommodation in a 4-star hotel in Kathmandu and two nights in a 3-star hotel in Pokhara on a twin-sharing, bed & breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1143, 257, 'One warm welcome dinner at a traditional Nepali restaurant in Kathmandu hosted by Summit Solution Treks & Expedition.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1144, 257, 'All required trekking permits and documentation including Annapurna Conservation Area Permit (ACAP) and TIMS (Trekkers’ Information Management System) card.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1145, 257, 'Land transportation: Private vehicle transfers from Pokhara to Beni at the trek start and Marpha to Pokhara after trek completion.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1146, 257, 'One-way domestic flight from Pokhara to Kathmandu as per itinerary.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1147, 257, 'Accommodation during the trek in local teahouses and tented camps along the Dhaulagiri Circuit route, ensuring comfort and an authentic experience.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1148, 257, 'Three nutritious meals per day during the trek (breakfast, lunch, and dinner) with tea or coffee, freshly prepared using local ingredients. Boiled or purified drinking water (2 liters per day per participant) provided.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1149, 257, 'Services of an experienced, government-licensed English-speaking trekking guide.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1150, 257, 'Trained porter support with one porter for every two trekkers to carry personal luggage (up to 15 kg per person).', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1151, 257, 'Full wages, meals, accommodation, insurance, and necessary equipment for all guides, porters, and support staff.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1152, 257, 'Guided sightseeing in Kathmandu covering cultural highlights such as Swayambhunath (Monkey Temple) and Kathmandu Durbar Square, including professional guide and private vehicle.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1153, 257, 'Basic medical kit and emergency oxygen cylinder for safety during the trek.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1154, 257, 'Complimentary farewell dinner and Summit Solution Trekking Certificate as a token of accomplishment.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1155, 257, 'All applicable government taxes, service charges, and administrative fees.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 03:56:52', '2025-12-20 03:56:52'),
(1156, 258, 'All airport to hotel and hotel to airport transfers in Kathmandu by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1157, 258, 'Three nights’ twin-sharing accommodation at a 3-star hotel in Kathmandu on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1158, 258, 'Two nights’ twin-sharing accommodation at a 3-star hotel in Pokhara on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1159, 258, 'One welcome dinner with the team at a traditional Nepali cultural restaurant in Kathmandu.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1160, 258, 'All required trekking permits and documentation including Annapurna Conservation Area Permit (ACAP), TIMS card, and applicable government taxes and service charges.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1161, 258, 'Ground transportation including Kathmandu to Pokhara and Pokhara to Kathmandu by tourist bus as per itinerary.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1162, 258, 'Private jeep or car transportation from Pokhara to Kande (trek starting point) and from Siding Village to Pokhara (trek ending point).', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1163, 258, 'Accommodation during the trek in the best available teahouses on a twin-sharing basis along the Mardi Himal trail.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1164, 258, 'Three freshly prepared meals per day during the trek (breakfast, lunch, and dinner) including tea or coffee.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1165, 258, 'Provision of boiled or filtered drinking water up to 2 liters per person per day during the trek.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1166, 258, 'Services of an experienced, government-licensed English-speaking trekking guide.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1167, 258, 'Porter support with one porter for every two trekkers, carrying up to 15 kg of personal luggage per person.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1168, 258, 'Full wages, meals, accommodation, insurance, and necessary equipment for all trekking staff and porters.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1169, 258, 'Comprehensive first-aid medical kit carried by the trekking guide for safety and emergencies.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1170, 258, 'Full insurance coverage for all trekking guides and porters as per Government of Nepal regulations.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1171, 258, 'Half-day guided sightseeing tour in Kathmandu covering major UNESCO World Heritage Sites such as Swayambhunath (Monkey Temple) and Kathmandu Durbar Square, including entrance fees, professional guide, and private vehicle.', NULL, NULL, NULL, NULL, 16, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1172, 258, 'All logistical arrangements and operational support managed by Summit Solution Treks & Expedition Pvt. Ltd. to ensure a safe and smooth trekking experience.', NULL, NULL, NULL, NULL, 17, 1, '2025-12-20 13:36:05', '2025-12-20 13:36:05'),
(1173, 259, 'Airport pick-up upon arrival at Tribhuvan International Airport and final drop-off after trip completion by private vehicle.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1174, 259, 'Two nights’ twin-sharing accommodation at a 3-star hotel in Kathmandu on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1175, 259, 'One night’s twin-sharing accommodation at a 3-star hotel in Pokhara on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1176, 259, 'One-way domestic flight from Kathmandu to Pokhara as per itinerary.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1177, 259, 'Private jeep or car transportation from Pokhara to Nayapul (trek starting point) and return to Pokhara after the trek.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1178, 259, 'Tourist bus transportation from Pokhara to Kathmandu at the end of the trip.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1179, 259, 'Accommodation during the trek in local lodges or teahouses on a twin-sharing basis along the Ghorepani–Poon Hill route.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1180, 259, 'Three freshly cooked meals per day during the trek (breakfast, lunch, and dinner) selected from the local lodge menu.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1181, 259, 'Tea or coffee served three times daily during the trekking days.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1182, 259, 'All required trekking permits and documentation including Annapurna Conservation Area Permit (ACAP), TIMS card, and applicable local and government taxes.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1183, 259, 'Services of a professional, government-licensed English-speaking trekking guide throughout the journey.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1184, 259, 'Porter support with one porter for every two trekkers, carrying up to 15 kg of personal luggage per person.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1185, 259, 'Salary, meals, accommodation, insurance, and necessary equipment for all trekking guides and porters.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1186, 259, 'A basic first-aid medical kit carried by the trekking guide for emergency support.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1187, 259, 'All logistical arrangements, coordination, and operational support managed by Summit Solution Treks & Expedition Pvt. Ltd. for a smooth and safe trekking experience.', NULL, NULL, NULL, NULL, 15, 1, '2025-12-20 13:54:34', '2025-12-20 13:54:34'),
(1188, 191, 'Private vehicle transfers for international airport pick-up and drop-off, along with all required ground transportation between hotels and trekking start and end points as per itinerary.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 14:08:57', '2025-12-20 14:08:57'),
(1189, 191, 'Three nights’ twin-sharing accommodation at a 3-star hotel in Kathmandu on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 14:08:57', '2025-12-20 14:08:57');
INSERT INTO `cl_cost_includes` (`id`, `trip_detail_id`, `title`, `content`, `thumbnail`, `country`, `video`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(1190, 191, 'A traditional Nepali welcome dinner at a cultural restaurant in Kathmandu hosted by Summit Solution Treks & Expedition.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 14:08:57', '2025-12-20 14:08:57'),
(1191, 191, 'Private jeep or bus transportation from Kathmandu to Soti Khola (trek starting point) and private jeep transportation from Dharapani to Kathmandu after trek completion.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1192, 191, 'All surface transportation arrangements as outlined in the detailed trekking itinerary.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1193, 191, 'All required trekking permits and documentation including Manaslu Restricted Area Permit (RAP), Manaslu Conservation Area Permit (MCAP), Annapurna Conservation Area Permit (ACAP), TIMS card, and applicable government and local entry fees.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1194, 191, 'Accommodation during the trek in clean and comfortable teahouses or lodges on a twin-sharing basis along the Manaslu Circuit route.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1195, 191, 'Three freshly prepared meals per day (breakfast, lunch, and dinner) during the trek, with tea or coffee served three times daily.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1196, 191, 'Services of an experienced, government-licensed, English-speaking trekking guide throughout the journey.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1197, 191, 'Porter support with one porter for every two trekkers, carrying approximately 15–20 kg of personal luggage per member.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1198, 191, 'Salary, meals, accommodation, equipment, and insurance coverage for all trekking guides and porters.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1199, 191, 'A comprehensive first-aid medical kit carried by the guide, along with basic emergency support and coordination when required.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1200, 191, 'A Manaslu Circuit Trek completion certificate provided upon successful completion of the trek.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1201, 191, 'All applicable government taxes, service charges, and full trekking logistics managed by Summit Solution Treks & Expedition for a seamless experience.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 14:08:58', '2025-12-20 14:08:58'),
(1202, 200, 'Private airport pick-up and drop-off for international arrivals and departures in Kathmandu.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1203, 200, 'Ground transportation by private jeep between Kathmandu hotels and Syabrubesi, including transfers to and from the trekking start and end points.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1204, 200, 'Three nights’ twin-sharing accommodation at a 3-star hotel in Kathmandu on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1205, 200, 'A traditional welcome dinner at a Thakali restaurant in Kathmandu with Summit Solution Treks & Expedition staff, along with a detailed trek briefing.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1206, 200, 'All required trekking permits and documentation including Langtang National Park Permit, TIMS card, and applicable local conservation and entry fees.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1207, 200, 'Services of an experienced, government-licensed, English-speaking trekking guide throughout the trek.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1208, 200, 'Porter support as required, carrying up to 20 kg of personal baggage per member.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1209, 200, 'Salary, accommodation, meals, insurance, and wages for all trekking guides and porters.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1210, 200, 'Three freshly prepared meals per day (breakfast, lunch, and dinner) during the trek, with tea or coffee served three times daily using hygienic and locally sourced ingredients.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1211, 200, 'Accommodation during the trek in safe and comfortable teahouses or lodges on a twin-sharing basis along the Langtang Valley route.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1212, 200, 'A comprehensive first-aid medical kit carried by the guide, along with emergency coordination and safety support throughout the trekking period.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1213, 200, 'Guided sightseeing in Kathmandu covering Swayambhunath (Monkey Temple), Kathmandu Durbar Square, and Boudhanath Stupa with a licensed city guide.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1214, 200, 'A detailed trekking map of the Langtang region provided for reference.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1215, 200, 'All applicable government taxes, service charges, and complete trekking logistics managed by Summit Solution Treks & Expedition for a smooth and well-organized experience.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 14:20:05', '2025-12-20 14:20:05'),
(1216, 263, 'Private airport pick-up and drop-off for all international arrivals and departures in Kathmandu.', NULL, NULL, NULL, NULL, 1, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1217, 263, 'Land transportation as per the itinerary, including transfers from Kathmandu to the trekking starting point and return to Kathmandu after trek completion.', NULL, NULL, NULL, NULL, 2, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1218, 263, 'Three nights’ twin-sharing accommodation at a 3-star hotel in Kathmandu on a bed and breakfast basis.', NULL, NULL, NULL, NULL, 3, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1219, 263, 'A farewell dinner at a local restaurant in Kathmandu with the team of Summit Solution Treks & Expedition Pvt. Ltd.', NULL, NULL, NULL, NULL, 4, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1220, 263, 'All required trekking permits and documentation, including TIMS card, Langtang National Park permit, Gosaikunda permit, Helambu region trekking permits, and all applicable conservation and entry fees.', NULL, NULL, NULL, NULL, 5, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1221, 263, 'Services of an experienced, government-licensed, English-speaking trekking guide throughout the trek.', NULL, NULL, NULL, NULL, 6, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1222, 263, 'Porter support as required, with one porter for every two trekkers, carrying up to 15–20 kg of personal luggage per member.', NULL, NULL, NULL, NULL, 7, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1223, 263, 'Salary, accommodation, meals, insurance, and wages for all trekking guides, porters, and support staff.', NULL, NULL, NULL, NULL, 8, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1224, 263, 'Three freshly prepared meals per day (breakfast, lunch, and dinner) during the trek, with tea or coffee served three times daily.', NULL, NULL, NULL, NULL, 9, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1225, 263, 'Accommodation during the trek in comfortable tea houses or lodges on a twin-sharing basis along the Langtang, Gosaikunda, and Helambu route.', NULL, NULL, NULL, NULL, 10, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1226, 263, 'A comprehensive first-aid medical kit carried by the guide, along with emergency coordination and safety support throughout the trekking period.', NULL, NULL, NULL, NULL, 11, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1227, 263, 'Guided sightseeing in Kathmandu including Swayambhunath (Monkey Temple), Boudhanath Stupa, and Kathmandu Durbar Square with a licensed city guide.', NULL, NULL, NULL, NULL, 12, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1228, 263, 'A detailed trekking map covering the Langtang, Gosaikunda, and Helambu regions for reference.', NULL, NULL, NULL, NULL, 13, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32'),
(1229, 263, 'All applicable Nepal government taxes, service charges, and complete logistical planning and trek management by Summit Solution Treks & Expedition Pvt. Ltd.', NULL, NULL, NULL, NULL, 14, 1, '2025-12-20 14:25:34', '2025-12-20 16:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `cl_multiple_banner`
--

CREATE TABLE `cl_multiple_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_id` int(11) DEFAULT 0,
  `picture` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_multiple_image`
--

CREATE TABLE `cl_multiple_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_posts`
--

CREATE TABLE `cl_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_author` int(11) NOT NULL DEFAULT 1,
  `template` varchar(191) DEFAULT NULL,
  `template_child` varchar(100) DEFAULT NULL,
  `post_title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `post_content` longtext DEFAULT NULL,
  `post_excerpt` text DEFAULT NULL,
  `uri` varchar(191) NOT NULL,
  `page_key` varchar(191) NOT NULL DEFAULT '0',
  `post_type` int(11) DEFAULT 0,
  `post_category` int(11) DEFAULT 0,
  `post_parent` int(11) DEFAULT 0,
  `post_order` int(11) DEFAULT 0,
  `page_banner` varchar(191) DEFAULT NULL,
  `page_thumbnail` varchar(191) DEFAULT NULL,
  `page_video` varchar(191) DEFAULT NULL,
  `meta_keyword` varchar(191) DEFAULT NULL,
  `meta_description` varchar(191) DEFAULT NULL,
  `associated_title` varchar(191) DEFAULT NULL,
  `external_link` varchar(191) DEFAULT NULL,
  `post_tags` varchar(191) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `published` enum('1','0') NOT NULL DEFAULT '1',
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_draft` enum('1','0') NOT NULL DEFAULT '0',
  `is_trashed` enum('1','0') NOT NULL DEFAULT '0',
  `show_in_home` enum('0','1') DEFAULT '0',
  `is_password_protected` enum('1','0') NOT NULL DEFAULT '0',
  `comment` enum('1','0') NOT NULL DEFAULT '0',
  `visiter` int(11) DEFAULT NULL,
  `lang` enum('en','np') NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_post_categories`
--

CREATE TABLE `cl_post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_type` varchar(191) NOT NULL,
  `category` varchar(191) NOT NULL,
  `category_caption` varchar(191) DEFAULT NULL,
  `category_content` text DEFAULT NULL,
  `uri` varchar(191) NOT NULL,
  `ordering` int(11) DEFAULT 0,
  `thumbnail` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_post_type`
--

CREATE TABLE `cl_post_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_type` varchar(191) NOT NULL,
  `uri` varchar(191) NOT NULL,
  `content` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `template` varchar(100) DEFAULT NULL,
  `ordering` int(11) DEFAULT 0,
  `is_menu` enum('0','1') DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `associated_title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_post_type`
--

INSERT INTO `cl_post_type` (`id`, `post_type`, `uri`, `content`, `banner`, `template`, `ordering`, `is_menu`, `status`, `associated_title`, `created_at`, `updated_at`) VALUES
(22, 'Who We Are?', 'who-we-are', 'Discover who we are, what we stand for, and why we do what we do.', 'l222-n4hpczsd3xiwnckdapaweppyeularglxfj6hi8rt-WShO5QSf4KeotiI7a2h8Q5NuGjm3gCw6GuniVm42.png', 'page', 1, '1', '1', 'Get to Know Summit 8000', '2023-04-30 07:17:00', '2026-02-02 17:24:18'),
(26, 'Contact Us', 'contact-us', 'We’re here to help with your travel plans, reach out to us anytime.', 'l333-CSf432BkNgF650QYgIv3sGlVHKQIhzrU5LthNrmq.png', 'posttypeTemplate-contact', 5, '0', '1', 'Call us for inquiry', '2023-07-27 19:32:19', '2026-02-02 17:44:41'),
(33, 'Blogs', 'blogs', 'Explore our journey through news, expedition stories, major achievements, and behind-the-scenes work at Summit Solution.', 'l222-wvbbq1ybsc0ix9npj1mflcdylsnrz8epfafz4hlj-e7OCvRnXnq5ElUWus1vmDOVQzZ46pmTNuM1DJNN7.png', 'posttypeTemplate-blog', 4, '1', '1', 'NEWS / BLOGS', '2025-02-02 06:20:08', '2026-01-03 02:15:46'),
(35, 'Our Team', 'our-team', 'At Summit 8000 we are more than just guides, we are a group of passionate mountaineers, tourism professionals, and academicians dedicated to reshaping Himalayan adventure. Our leadership team brings together years of climbing experience, guiding expertise, and academic knowledge, making us one of the few companies led by both field experts and researchers. \r\n\r\nTogether, we believe in guiding with knowledge, leading with trust, and climbing with responsibility. Meet the people behind Summit 8000', 'l222-vlkie7igsf7ljqncjr0moifvapl1adj3vygkbxtj-ANmveh7qwjbofttLW4rjAnrdZvWZKSF9ZESFhOi0.png', 'page', 2, '1', '1', NULL, '2025-02-12 07:50:44', '2026-02-02 17:25:24'),
(36, 'Legal Documents', 'legal-documents', NULL, '', 'page', 3, '1', '1', NULL, '2026-02-02 17:26:39', '2026-02-02 17:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `cl_related_trip_rel`
--

CREATE TABLE `cl_related_trip_rel` (
  `id` bigint(20) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `related_trip_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_related_trip_rel`
--

INSERT INTO `cl_related_trip_rel` (`id`, `trip_id`, `related_trip_id`, `created_at`, `updated_at`) VALUES
(95, 12, 3, NULL, NULL),
(96, 12, 5, NULL, NULL),
(97, 12, 7, NULL, NULL),
(105, 13, 3, NULL, NULL),
(106, 13, 4, NULL, NULL),
(107, 13, 5, NULL, NULL),
(108, 13, 7, NULL, NULL),
(109, 13, 12, NULL, NULL),
(204, 3, 5, NULL, NULL),
(205, 3, 7, NULL, NULL),
(206, 3, 12, NULL, NULL),
(207, 3, 13, NULL, NULL),
(212, 5, 3, NULL, NULL),
(213, 5, 4, NULL, NULL),
(214, 5, 7, NULL, NULL),
(215, 5, 12, NULL, NULL),
(277, 80, 39, NULL, NULL),
(278, 80, 57, NULL, NULL),
(279, 80, 79, NULL, NULL),
(280, 79, 39, NULL, NULL),
(281, 79, 56, NULL, NULL),
(282, 79, 57, NULL, NULL),
(325, 18, 36, NULL, NULL),
(326, 18, 45, NULL, NULL),
(327, 18, 82, NULL, NULL),
(370, 68, 4, NULL, NULL),
(371, 68, 5, NULL, NULL),
(372, 68, 35, NULL, NULL),
(448, 6, 3, NULL, NULL),
(449, 6, 4, NULL, NULL),
(450, 6, 5, NULL, NULL),
(454, 78, 42, NULL, NULL),
(455, 78, 44, NULL, NULL),
(456, 78, 77, NULL, NULL),
(475, 44, 40, NULL, NULL),
(476, 44, 42, NULL, NULL),
(477, 44, 77, NULL, NULL),
(481, 77, 42, NULL, NULL),
(482, 77, 43, NULL, NULL),
(483, 77, 78, NULL, NULL),
(490, 82, 18, NULL, NULL),
(491, 82, 23, NULL, NULL),
(516, 7, 3, NULL, NULL),
(517, 7, 5, NULL, NULL),
(518, 7, 12, NULL, NULL),
(563, 35, 4, NULL, NULL),
(564, 35, 36, NULL, NULL),
(565, 35, 38, NULL, NULL),
(569, 36, 4, NULL, NULL),
(570, 36, 35, NULL, NULL),
(571, 36, 38, NULL, NULL),
(586, 83, 56, NULL, NULL),
(587, 83, 57, NULL, NULL),
(588, 83, 84, NULL, NULL),
(595, 81, 6, NULL, NULL),
(596, 81, 35, NULL, NULL),
(597, 81, 46, NULL, NULL),
(613, 69, 4, NULL, NULL),
(614, 69, 35, NULL, NULL),
(615, 69, 84, NULL, NULL),
(616, 57, 6, NULL, NULL),
(617, 57, 46, NULL, NULL),
(618, 57, 84, NULL, NULL),
(619, 56, 56, NULL, NULL),
(620, 56, 69, NULL, NULL),
(621, 56, 84, NULL, NULL),
(628, 54, 4, NULL, NULL),
(629, 54, 69, NULL, NULL),
(630, 54, 75, NULL, NULL),
(634, 52, 4, NULL, NULL),
(635, 52, 46, NULL, NULL),
(636, 52, 81, NULL, NULL),
(649, 45, 4, NULL, NULL),
(650, 45, 36, NULL, NULL),
(651, 45, 82, NULL, NULL),
(661, 72, 4, NULL, NULL),
(662, 72, 23, NULL, NULL),
(663, 72, 48, NULL, NULL),
(664, 55, 23, NULL, NULL),
(665, 55, 70, NULL, NULL),
(666, 55, 74, NULL, NULL),
(676, 51, 23, NULL, NULL),
(677, 51, 55, NULL, NULL),
(678, 51, 70, NULL, NULL),
(682, 74, 4, NULL, NULL),
(683, 74, 48, NULL, NULL),
(684, 74, 76, NULL, NULL),
(691, 76, 4, NULL, NULL),
(692, 76, 35, NULL, NULL),
(693, 76, 36, NULL, NULL),
(697, 75, 6, NULL, NULL),
(698, 75, 46, NULL, NULL),
(699, 75, 84, NULL, NULL),
(700, 70, 23, NULL, NULL),
(701, 70, 55, NULL, NULL),
(702, 70, 82, NULL, NULL),
(721, 23, 35, NULL, NULL),
(722, 23, 55, NULL, NULL),
(723, 23, 70, NULL, NULL),
(731, 33, 84, NULL, NULL),
(747, 4, 38, NULL, NULL),
(748, 4, 39, NULL, NULL),
(749, 4, 46, NULL, NULL),
(750, 14, 4, NULL, NULL),
(751, 14, 5, NULL, NULL),
(752, 14, 6, NULL, NULL),
(753, 14, 13, NULL, NULL),
(760, 34, 86, NULL, NULL),
(761, 86, 34, NULL, NULL),
(762, 15, 3, NULL, NULL),
(777, 87, 34, NULL, NULL),
(778, 87, 86, NULL, NULL),
(836, 46, 4, NULL, NULL),
(837, 46, 36, NULL, NULL),
(838, 46, 53, NULL, NULL),
(845, 53, 4, NULL, NULL),
(846, 53, 36, NULL, NULL),
(847, 53, 46, NULL, NULL),
(854, 48, 4, NULL, NULL),
(855, 48, 35, NULL, NULL),
(856, 48, 74, NULL, NULL),
(867, 84, 6, NULL, NULL),
(868, 84, 56, NULL, NULL),
(937, 115, 113, NULL, NULL),
(938, 115, 114, NULL, NULL),
(939, 115, 115, NULL, NULL),
(1221, 231, 122, NULL, NULL),
(1222, 231, 227, NULL, NULL),
(1223, 231, 228, NULL, NULL),
(1224, 231, 233, NULL, NULL),
(1225, 232, 122, NULL, NULL),
(1226, 232, 227, NULL, NULL),
(1227, 232, 229, NULL, NULL),
(1231, 227, 122, NULL, NULL),
(1232, 227, 231, NULL, NULL),
(1233, 227, 233, NULL, NULL),
(1237, 226, 122, NULL, NULL),
(1238, 226, 227, NULL, NULL),
(1239, 226, 228, NULL, NULL),
(1240, 229, 122, NULL, NULL),
(1241, 229, 226, NULL, NULL),
(1242, 229, 232, NULL, NULL),
(1243, 228, 122, NULL, NULL),
(1244, 228, 226, NULL, NULL),
(1245, 228, 227, NULL, NULL),
(1246, 233, 122, NULL, NULL),
(1247, 233, 226, NULL, NULL),
(1248, 233, 227, NULL, NULL),
(1285, 234, 235, NULL, NULL),
(1286, 234, 236, NULL, NULL),
(1287, 234, 237, NULL, NULL),
(1291, 237, 234, NULL, NULL),
(1292, 237, 235, NULL, NULL),
(1293, 237, 236, NULL, NULL),
(1294, 236, 234, NULL, NULL),
(1295, 236, 235, NULL, NULL),
(1296, 236, 237, NULL, NULL),
(1297, 247, 190, NULL, NULL),
(1298, 247, 241, NULL, NULL),
(1299, 247, 244, NULL, NULL),
(1303, 243, 190, NULL, NULL),
(1304, 243, 240, NULL, NULL),
(1305, 243, 244, NULL, NULL),
(1306, 244, 190, NULL, NULL),
(1307, 244, 240, NULL, NULL),
(1308, 244, 243, NULL, NULL),
(1315, 241, 190, NULL, NULL),
(1316, 241, 243, NULL, NULL),
(1317, 241, 244, NULL, NULL),
(1321, 240, 190, NULL, NULL),
(1322, 240, 243, NULL, NULL),
(1323, 240, 244, NULL, NULL),
(1324, 190, 240, NULL, NULL),
(1325, 190, 243, NULL, NULL),
(1326, 190, 244, NULL, NULL),
(1354, 253, 131, NULL, NULL),
(1355, 253, 191, NULL, NULL),
(1356, 253, 254, NULL, NULL),
(1357, 254, 131, NULL, NULL),
(1358, 254, 165, NULL, NULL),
(1359, 254, 253, NULL, NULL),
(1363, 131, 191, NULL, NULL),
(1364, 131, 253, NULL, NULL),
(1365, 131, 254, NULL, NULL),
(1366, 165, 131, NULL, NULL),
(1367, 165, 191, NULL, NULL),
(1368, 165, 256, NULL, NULL),
(1375, 257, 191, NULL, NULL),
(1376, 257, 217, NULL, NULL),
(1377, 257, 262, NULL, NULL),
(1378, 258, 165, NULL, NULL),
(1379, 258, 256, NULL, NULL),
(1380, 258, 259, NULL, NULL),
(1381, 259, 165, NULL, NULL),
(1382, 259, 256, NULL, NULL),
(1383, 259, 258, NULL, NULL),
(1384, 256, 131, NULL, NULL),
(1385, 256, 165, NULL, NULL),
(1386, 256, 257, NULL, NULL),
(1387, 191, 131, NULL, NULL),
(1388, 191, 165, NULL, NULL),
(1389, 191, 257, NULL, NULL),
(1393, 263, 200, NULL, NULL),
(1394, 263, 265, NULL, NULL),
(1395, 263, 267, NULL, NULL),
(1396, 200, 191, NULL, NULL),
(1397, 200, 258, NULL, NULL),
(1398, 200, 263, NULL, NULL),
(1399, 217, 191, NULL, NULL),
(1400, 217, 262, NULL, NULL),
(1401, 217, 265, NULL, NULL),
(1405, 265, 203, NULL, NULL),
(1406, 265, 266, NULL, NULL),
(1407, 265, 267, NULL, NULL),
(1408, 266, 203, NULL, NULL),
(1409, 266, 262, NULL, NULL),
(1410, 266, 267, NULL, NULL),
(1411, 267, 203, NULL, NULL),
(1412, 267, 265, NULL, NULL),
(1413, 267, 266, NULL, NULL),
(1414, 203, 265, NULL, NULL),
(1415, 203, 266, NULL, NULL),
(1416, 203, 267, NULL, NULL),
(1420, 262, 217, NULL, NULL),
(1421, 262, 265, NULL, NULL),
(1422, 262, 266, NULL, NULL),
(1432, 235, 234, NULL, NULL),
(1433, 235, 236, NULL, NULL),
(1434, 235, 237, NULL, NULL),
(1441, 248, 190, NULL, NULL),
(1442, 248, 241, NULL, NULL),
(1443, 248, 244, NULL, NULL),
(1486, 122, 227, NULL, NULL),
(1487, 122, 231, NULL, NULL),
(1488, 122, 233, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cl_settings`
--

CREATE TABLE `cl_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `TTA1` varchar(191) DEFAULT NULL,
  `TTA2` varchar(191) DEFAULT NULL,
  `Affiliated1` varchar(255) DEFAULT NULL,
  `Affiliated2` varchar(255) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `usa_phone` varchar(255) DEFAULT NULL,
  `email_primary` varchar(191) DEFAULT NULL,
  `usa_email_primary` varchar(255) DEFAULT NULL,
  `email_secondary` varchar(191) DEFAULT NULL,
  `usa_email_secondary` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `usa_address` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(191) DEFAULT NULL,
  `linkedin_link` varchar(191) DEFAULT NULL,
  `youtube_link` varchar(191) DEFAULT NULL,
  `twitter_link` varchar(191) DEFAULT NULL,
  `google_plus` varchar(100) DEFAULT NULL,
  `instagram_link` varchar(100) DEFAULT NULL,
  `meta_key` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `google_map2` text DEFAULT NULL,
  `copyright_text` text DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `flight_link` varchar(255) DEFAULT NULL,
  `flight_brief` text DEFAULT NULL,
  `flight_photo` varchar(255) DEFAULT NULL,
  `text1_title` varchar(255) DEFAULT NULL,
  `text1_sub_title` varchar(255) DEFAULT NULL,
  `text2_title` varchar(255) DEFAULT NULL,
  `text2_sub_title` varchar(255) DEFAULT NULL,
  `text3_title` varchar(255) DEFAULT NULL,
  `text3_sub_title` varchar(255) DEFAULT NULL,
  `fp_activity` longtext DEFAULT NULL,
  `fp_training` text DEFAULT NULL,
  `fp_about` text DEFAULT NULL,
  `fp_about_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_settings`
--

INSERT INTO `cl_settings` (`id`, `site_name`, `logo`, `TTA1`, `TTA2`, `Affiliated1`, `Affiliated2`, `phone`, `usa_phone`, `email_primary`, `usa_email_primary`, `email_secondary`, `usa_email_secondary`, `address`, `usa_address`, `fax`, `skype`, `facebook_link`, `linkedin_link`, `youtube_link`, `twitter_link`, `google_plus`, `instagram_link`, `meta_key`, `meta_description`, `google_map`, `google_map2`, `copyright_text`, `link1`, `link2`, `flight_link`, `flight_brief`, `flight_photo`, `text1_title`, `text1_sub_title`, `text2_title`, `text2_sub_title`, `text3_title`, `text3_sub_title`, `fp_activity`, `fp_training`, `fp_about`, `fp_about_content`, `created_at`, `updated_at`) VALUES
(1, 'Summit 8000', '1720762126.png', 'nma-1689924306.png', 'ntb-1689924292.png', 'taan-1689924277.png', 'tripadvisor-1689924263.png', '+977 9800000001 / 9800000002', '1744362685_phone.jpg', 'info@summit8000.com', NULL, NULL, NULL, 'House 23, Street A Kapan, Budhanilkantha-11, Kathmandu', '1744362685_address.jpg', '+977 9800000003', NULL, 'https://www.facebook.com/', NULL, 'https://www.youtube.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://www.instagram.com/', NULL, NULL, '<iframe\r\n        src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d47501.31093049091!2d85.39329388471447!3d27.7618358070697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHouse%2023%2C%20Street%20A%20Kapan%2C%0D%0ABudhanilkantha-11%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1767274015124!5m2!1sen!2snp\"\r\n        width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"\r\n        referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<iframe\r\n        src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d47501.31093049091!2d85.39329388471447!3d27.7618358070697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHouse%2023%2C%20Street%20A%20Kapan%2C%0D%0ABudhanilkantha-11%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1767274015124!5m2!1sen!2snp\"\r\n        width=\"100%\" height=\"100%\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"\r\n        referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Copyright © 2026, Summit 8000', NULL, NULL, 'https://www.campbellirvinedirect.com/CIDirect/', 'All content on this website, including text and photographs, is the exclusive property of Summit 8000. Reproduction or use without prior written permission is strictly prohibited. © Summit 8000, 2025.', 'sidebar-1687779864.jpg', 'Dates & Prices', 'Gather a few friends, family or club and take over your own departure.', 'Summits, solved.', 'Every challenge addressed, every detail prepared.', 'From our clients', 'What our clients  say about their Experiences', '<p>Expeditions, trekking, skiing &amp; snowboarding, cultural and adventure tours, along with specialized rock and ice climbing trainings bring the best of Nepal’s adventure to life. From heli tours and jungle safaris to paragliding, rafting, and complete booking services, every journey is designed to explore both the thrill of the Himalayas and the richness of Nepali culture. We offer a wide range of mountain and adventure services designed for every type of explorer. From high-altitude expeditions on Nepal’s iconic peaks, to trekking adventures along world-famous trails, we make your Himalayan journey unforgettable. We also provide skiing and snowboarding experiences in pristine alpine terrain, along with cultural and sightseeing tours that showcase Nepal’s rich heritage, traditions, and natural beauty. Beyond the mountains, our tours cover exciting activities such as paragliding, bungee jumping, helicopter tours, bookings, and reservations, giving you the perfect balance of adventure and relaxation in Nepal</p>', 'We organize both rock climbing and ice climbing training programs led by our expert team and founders themselves. From beginner sessions covering top rope, belaying, and glacier basics to advanced courses on lead climbing, multipitch, and rescue techniques, we provide complete hands-on learning. Join us in mastering the art of climbing whether on rock or ice and take your skills to the next level with us!', 'More Than a Company. A Commitment.', 'We believe great adventures start with strong foundations. Our team brings technical skills, leadership, and real mountain experience together to create journeys you can trust, whether on treks, climbs, or global expeditions.', NULL, '2026-02-02 17:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `cl_team`
--

CREATE TABLE `cl_team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `uri` varchar(191) NOT NULL,
  `team_key` varchar(191) NOT NULL DEFAULT '0',
  `position` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT '0',
  `subcategory` varchar(191) DEFAULT NULL,
  `fb_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `brief` text DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT 0,
  `banner` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `published` enum('1','0') NOT NULL DEFAULT '1',
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_draft` enum('1','0') NOT NULL DEFAULT '0',
  `is_trashed` enum('1','0') NOT NULL DEFAULT '0',
  `is_password_protected` enum('1','0') NOT NULL DEFAULT '0',
  `comment` enum('1','0') NOT NULL DEFAULT '0',
  `lang` enum('en','np') NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_team`
--

INSERT INTO `cl_team` (`id`, `name`, `uri`, `team_key`, `position`, `category`, `subcategory`, `fb_url`, `instagram_url`, `twitter_url`, `linkedin_url`, `phone`, `email`, `content`, `brief`, `status`, `ordering`, `banner`, `thumbnail`, `published`, `is_active`, `is_draft`, `is_trashed`, `is_password_protected`, `comment`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Ashish Gurung', 'ashish-gurung', '1767355180215384079', 'Chairman', '1', NULL, NULL, NULL, NULL, NULL, '+977 9849707306', 'grgashish2010@gmail.com', '<p></p><div><p>Ashish Gurung is the visionary behind Summit Solution Treks &amp; Expedition Pvt. Ltd. A veteran of Nepal’s mountaineering industry, an IFMGA certified mountain guide, Ashish Gurung is a widely respected name among climbers, guides, and adventurers. With decades of hands-on mountaineering and guiding experience, he has been at the heart of numerous successful expeditions across Nepal and beyond. </p></div><div><p>As the Chairman of Summit Solution Treks &amp; Expedition Pvt. Ltd., Ashish provides vision, stability, and inspiration. His long-standing reputation as a leader, climber, and mentor anchors the company’s values of trust, responsibility, and professionalism. Ashish is not only admired for his technical skills on the mountains but also for his ability to guide teams, nurture young climbers, and maintain a culture of safety and ethics. His experience ensures that Summit Solution remains deeply rooted in the traditions of Himalayan guiding while pushing forward with innovation.</p></div><div><p>&nbsp;</p></div><br><p></p>', NULL, '1', 1, '', '2a6463d8-15ed-4145-bf22-387f0955a75d-572MA7vE3YIHn9Orw1IktetKMfh31egjI3mzfufj.JPG', '0', '1', '0', '0', '0', '0', 'en', '2021-03-13 18:39:54', '2026-01-02 22:44:40'),
(18, 'Wivas Poudel', 'wivas-poudel', '1767355720787103530', 'Managing Director', '1', NULL, NULL, NULL, NULL, NULL, '+977 9846049273', 'poudelwivasmbbs@gmail.com', '<p></p><div><p>Wivas Poudel, the driving force behind Summit Solution, brings to the team a rare combination of mountaineering knowledge, academic research, and entrepreneurial vision. Wivas represents the new generation of tourism leaders in Nepal, individuals who are equally comfortable in the field, in research, and in management. Beyond academics, he has contributed to various training programs related to mountaineering, helping future professionals understand the complexities of Himalayan expeditions. &nbsp;</p></div><div><p>Passionate about guiding Nepal’s tourism industry towards a brighter future, Wivas is committed to blending global expedition standards with local expertise. Wivas adds a research-driven perspective to expedition planning.  As Managing Director, Wivas oversees strategy, client relations, and overall company operations. His leadership is rooted in knowledge, sustainability, and innovation, making sure every expedition is not only successful but also safe, meaningful, and environmentally conscious. With his proactive approach, Summit Solution ensures every trip is designed with clarity, safety, and client satisfaction at its core. </p></div><br><p></p>', NULL, '1', 4, '', '5815d7b5-444f-4f3d-aa8f-8cff3a2b81db-jkotSTqj2khpxzB9XJ9w5KzWYyuEUcM1ES13QAii.PNG', '0', '1', '0', '0', '0', '0', 'en', '2025-11-14 09:38:47', '2026-01-02 22:53:40'),
(19, 'Sujan Gurung', 'sujan-gurung', '1767355209627530588', 'Executive Director', '1', NULL, NULL, NULL, NULL, NULL, '+977 9867098371', 'mtgurung706@gmail.com', '<p></p><div><p>A highly skilled IFMGA certified mountaineer with years of practical guiding experience, Sujan Gurung stands at the forefront of our expeditions. Having grown up surrounded by the Himalayan culture of adventure, Sujan has developed not only the technical climbing skills but also the resilience, adaptability, and leadership qualities that make him one of the strongest pillars of our company. </p></div><div><p>Sujan has worked extensively with both domestic and international climbers, supporting successful ascents and trekking journeys across Nepal’s major regions. His practical expertise is strengthened by his academic training in mountaineering studies, giving him a scientific understanding of mountains, safety, and risk management. Clients know Sujan for his approachable personality, motivational spirit, and ability to turn challenges into opportunities. With him as Expedition Director, every climber can be assured of a well-managed, safe, and memorable journey to the Himalayas.</p></div><div><p>&nbsp;</p></div><br><p></p>', NULL, '1', 5, '', 'img-9845-rvJlkpHglG0KsSUfQfX3trBrNzHotLXdAnw98sr3.JPG', '0', '1', '0', '0', '0', '0', 'en', '2025-11-14 09:40:45', '2026-01-02 22:45:09'),
(20, 'Dipan Gurung', 'dipan-gurung', '1767355252817606160', 'Field Director', '1', NULL, NULL, NULL, NULL, NULL, '+977 9840986178', 'gurungdipan08@gmail.com', '<p></p><div><p>Dipan Gurung represents the balance between field expertise and organizational leadership. With a strong background in trekking, expedition and expedition logistics, Dipan ensures that every Summit Solution project runs smoothly from planning to execution. </p></div><div><p>Having spent years in Nepal’s tourism and mountaineering field, Dipan understands both the client’s expectations and the mountain realities. His leadership lies in bridging these two worlds: delivering services that are professional, safe, and tailored to each adventurer’s needs. Dipan is a passionate mountaineer himself, always keen to explore new peaks, routes, and opportunities. His focus on client care, operational excellence, and sustainable tourism practices makes him an indispensable leader within Summit Solution. </p></div><br><p></p>', NULL, '1', 6, '', 'img-9954-3EC8aFOUQB8Xa6LD8XFEqQhzkcdRjjkNcGbl51Kr.JPG', '0', '1', '0', '0', '0', '0', 'en', '2025-11-14 09:42:13', '2026-01-02 22:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_activities`
--

CREATE TABLE `cl_trip_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `activity_parent` varchar(128) DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `sub_title` varchar(191) DEFAULT 'NULL',
  `template` varchar(255) DEFAULT 'single',
  `uri` varchar(191) NOT NULL,
  `thumbnail` varchar(191) DEFAULT 'NULL',
  `banner` varchar(191) DEFAULT 'NULL',
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `external_link` varchar(255) DEFAULT NULL,
  `category_video` varchar(255) DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `ordering` int(11) DEFAULT 0,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `isdefault` enum('0','1') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_activities`
--

INSERT INTO `cl_trip_activities` (`id`, `activity_parent`, `title`, `sub_title`, `template`, `uri`, `thumbnail`, `banner`, `excerpt`, `content`, `external_link`, `category_video`, `meta_keyword`, `meta_description`, `ordering`, `status`, `isdefault`, `created_at`, `updated_at`) VALUES
(41, 'trekking', 'Popular Treks', 'Follow legendary trails to the foot of the world’s highest peak.', 'triplist', 'popular-treks', '1764596682.png', '176734847633.png', NULL, '<p>The Everest region stands at the heart of Himalayan trekking, offering legendary trails, vibrant Sherpa culture, and unmatched views of the world’s tallest peaks. From the bustling villages of the Khumbu to the stunning vista points near Everest, every step carries history and excitement. With Summit Solution, trekkers can explore this world-famous region through well-planned itineraries that combine adventure, comfort, and authentic cultural encounters.</p>', NULL, NULL, NULL, NULL, 1, '0', NULL, '2023-07-13 07:28:34', '2026-02-02 15:44:09'),
(42, 'expedition', '8000ers', 'Dare to climb where few humans have ever stood.', 'triplist', '8000ers', '1764669141.png', '17700299749.jpg', 'Push beyond limits with world-class Himalayan expeditions led by experienced climbers and certified guides. From 6000-meter training peaks to legendary 8000-meter giants, our expeditions are built on precision planning, strong Sherpa support, and uncompromising safety—designed for climbers who seek true high-altitude achievement.', '<p>Climbing an 8,000-meter peak is the highest level of mountaineering—where skill, patience, and determination come together above the clouds. These giants offer extreme altitude, complex terrain, and some of the most demanding conditions on Earth. With Summit Solution Treks and Expedition, climbers receive expert guidance, precise planning, and the safety support needed for such serious objectives. From Everest and Kanchenjunga to Manaslu and beyond, our 8000ers expeditions are designed for experienced mountaineers ready to take on the ultimate Himalayan challenge and pursue the world’s most iconic summits with confidence.</p>', NULL, NULL, NULL, NULL, 1, '0', NULL, '2023-07-13 07:28:52', '2026-02-02 11:03:32'),
(43, 'expedition', '7000ers', 'Where climbers hone the skills for the world’s greatest peaks.', 'triplist', '7000ers', '1766306098.png', '176561756611.png', NULL, '<p>The 7,000-meter peaks of Nepal offer a perfect balance of high-altitude challenge and technical climbing—ideal for mountaineers looking to prepare for 8,000ers or pursue serious Himalayan goals. These mountains test endurance, skill, and decision-making in true expedition style while remaining more accessible than the 8000ers. With Summit Solution Treks and Expedition, climbers gain strong logistical support, professional guidance, and carefully structured acclimatization plans. Our 7000ers programs help build the experience, strength, and confidence needed for future high-altitude objectives while delivering a thrilling and rewarding Himalayan adventure.</p>', NULL, NULL, NULL, NULL, 2, '0', NULL, '2023-07-13 07:34:42', '2025-12-21 08:34:58'),
(44, 'trekking', 'Luxury Treks', 'Walk through Nepal’s classic trails surrounded by the Annapurna giants.', 'triplist', 'luxury-treks', '1766310395.png', '176630870511.png', NULL, '<p>The Annapurna region is one of Nepal’s most diverse and scenic trekking destinations, known for its dramatic landscapes, charming villages, and welcoming hospitality. From lush foothills and terraced farms to high mountain passes with panoramic vistas, this region captures the full beauty of Nepal’s terrain. Summit Solution offers thoughtfully curated treks in the Annapurnas, perfect for trekkers seeking variety, comfort, and breathtaking Himalayan views.</p>', NULL, NULL, NULL, NULL, 2, '0', NULL, '2023-07-13 07:35:10', '2026-02-02 15:43:42'),
(45, 'trekking', 'Short Treks', 'A remote, raw, and culturally rich journey around Mt. Manaslu.', 'triplist', 'short-treks', '1764489631.png', '176448968540.png', NULL, '<p>The Manaslu region offers a rare blend of remote wilderness, traditional culture, and impressive mountain scenery. Circling the world’s eighth-highest peak, this trek takes you through peaceful valleys, ancient monasteries, and rugged high-altitude terrain. With fewer crowds and a strong sense of authenticity, the Manaslu Circuit is ideal for trekkers seeking solitude and adventure. Summit Solution ensures safe logistics and meaningful experiences throughout this remarkable journey.</p>', NULL, NULL, NULL, NULL, 3, '0', NULL, '2023-07-13 10:27:36', '2026-02-02 15:44:33'),
(47, 'expedition', '6000ers', 'The ideal gateway to the world of mountaineering.', 'triplist', '6000ers', '1765708551.png', '176432095928.jpg', NULL, '<p data-start=\"1651\" data-end=\"2303\">The 6,000-meter peaks are the gateway to Himalayan mountaineering—challenging yet achievable for motivated climbers seeking their first real alpine summit experience. These peaks offer technical sections, beautiful landscapes, and a taste of true expedition climbing in a shorter, more accessible format. Summit Solution Treks and Expedition provides expert Sherpa guidance, safe climbing systems, and strong logistical support so climbers can learn, improve, and enjoy the climb with confidence. Our 6000ers expeditions are ideal for beginners stepping into high-altitude climbing as well as experienced mountaineers preparing for bigger future goals.</p>', NULL, NULL, NULL, NULL, 3, '0', NULL, '2023-07-28 16:37:25', '2025-12-28 10:35:59'),
(49, 'activity', 'Best Tour Of Nepal', 'Explore untouched Himalayan terrain on skis and snowboard', 'triplist', 'best-tour-of-nepal', '1764669577.png', '176554212147.png', 'We organize skiing and snowboarding adventures in Nepal’s stunning Himalayas, with slopes ideal for both beginners and advanced riders. For thrill seekers, we also offer exclusive heli-skiing and heli-snowboarding experiences—one of the very few companies in Nepal to do so. Join us in gliding through the Himalayan snow and experiencing the mountains in a whole new way!', NULL, NULL, NULL, NULL, NULL, 3, '0', NULL, '2024-07-15 10:40:17', '2026-02-02 15:58:58'),
(57, 'trekking', 'Long Treks', 'A close yet peaceful Himalayan escape filled with culture and glaciers.', 'triplist', 'long-treks', '1764950301.png', '176495024726.png', NULL, '<p data-start=\"2305\" data-end=\"2771\">Just a short distance from Kathmandu, the Langtang region offers a peaceful yet stunning Himalayan escape. Its trails wind through lush forests, traditional Tamang settlements, and glacial valleys framed by towering peaks. Known for its cultural richness and natural diversity, Langtang is perfect for trekkers who want both beauty and tranquillity. Summit Solution provides well-structured treks in this region, balancing cultural immersion with scenic exploration.</p>', NULL, NULL, NULL, NULL, 5, '0', NULL, '2024-08-22 14:06:51', '2026-02-02 15:44:55'),
(60, 'activity', 'Luxury Tour Of Nepal', 'Explore Nepal’s Culture, Nature & Adventure', 'triplist', 'luxury-tour-of-nepal', '1765708796.png', '176476481530.png', 'Experience the best of Nepal with Summit Solution through cultural tours, nature explorations, and thrilling adventures. We take care of all bookings and logistics, so you can enjoy a seamless journey.', NULL, NULL, NULL, NULL, NULL, 8, '0', NULL, '2024-08-22 14:14:53', '2026-02-02 15:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_activity_rel`
--

CREATE TABLE `cl_trip_activity_rel` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_activity_rel`
--

INSERT INTO `cl_trip_activity_rel` (`id`, `trip_id`, `activity_id`, `created_at`, `updated_at`) VALUES
(597, 94, 17, NULL, NULL),
(606, 29, 34, NULL, NULL),
(2046, 252, 64, NULL, NULL),
(2809, 250, 47, NULL, NULL),
(2913, 223, 70, NULL, NULL),
(2914, 222, 70, NULL, NULL),
(2918, 272, 71, NULL, NULL),
(2919, 274, 71, NULL, NULL),
(2985, 231, 42, NULL, NULL),
(2986, 232, 42, NULL, NULL),
(2988, 227, 42, NULL, NULL),
(2990, 226, 42, NULL, NULL),
(2991, 229, 42, NULL, NULL),
(2992, 228, 42, NULL, NULL),
(2993, 233, 42, NULL, NULL),
(3007, 234, 43, NULL, NULL),
(3009, 237, 43, NULL, NULL),
(3010, 236, 43, NULL, NULL),
(3012, 247, 47, NULL, NULL),
(3014, 243, 47, NULL, NULL),
(3015, 244, 47, NULL, NULL),
(3018, 241, 47, NULL, NULL),
(3020, 240, 47, NULL, NULL),
(3021, 190, 47, NULL, NULL),
(3031, 253, 41, NULL, NULL),
(3032, 254, 41, NULL, NULL),
(3034, 131, 41, NULL, NULL),
(3035, 165, 44, NULL, NULL),
(3038, 257, 44, NULL, NULL),
(3039, 258, 44, NULL, NULL),
(3040, 259, 44, NULL, NULL),
(3041, 256, 44, NULL, NULL),
(3042, 191, 45, NULL, NULL),
(3044, 263, 57, NULL, NULL),
(3045, 200, 57, NULL, NULL),
(3057, 235, 43, NULL, NULL),
(3060, 248, 47, NULL, NULL),
(3075, 122, 42, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_booking`
--

CREATE TABLE `cl_trip_booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_expire` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `trip_start_date` varchar(255) DEFAULT NULL,
  `trip_end_date` varchar(255) DEFAULT NULL,
  `trip_days` varchar(255) DEFAULT NULL,
  `total_travellers` varchar(255) DEFAULT NULL,
  `tshirt_size` varchar(255) DEFAULT NULL,
  `medication` varchar(255) DEFAULT NULL,
  `restrictions` varchar(255) DEFAULT NULL,
  `paid_status` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `hear` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_booking`
--

INSERT INTO `cl_trip_booking` (`id`, `trip_id`, `title`, `full_name`, `gender`, `dob`, `nationality`, `passport_number`, `passport_expire`, `email`, `phone`, `country`, `address`, `zip`, `trip_start_date`, `trip_end_date`, `trip_days`, `total_travellers`, `tshirt_size`, `medication`, `restrictions`, `paid_status`, `payment_type`, `hear`, `created_at`, `updated_at`) VALUES
(61, 122, 'MT. EVEREST EXPEDITION', 'Hiroko Wade', NULL, NULL, NULL, NULL, NULL, 'befoniwuz@mailinator.com', '56', 'Bulgaria', NULL, NULL, '2025-04-12', NULL, NULL, '28', NULL, NULL, NULL, NULL, NULL, 'Ratione ut facilis a', '2025-02-14 05:36:29', '2025-02-14 05:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_customize`
--

CREATE TABLE `cl_trip_customize` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `no_of_people` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `trip_start_date` date DEFAULT NULL,
  `trip_end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_customize`
--

INSERT INTO `cl_trip_customize` (`id`, `title`, `name`, `trip_id`, `email`, `phone`, `country`, `no_of_people`, `duration`, `comments`, `trip_start_date`, `trip_end_date`, `created_at`, `updated_at`) VALUES
(15, 'MT. EVEREST EXPEDITION', 'Juliet Wise', 122, 'wupupow@mailinator.com', '59', 'Puerto Rico', 79, NULL, 'A laudantium odio q', '2026-01-06', NULL, '2025-02-14 06:17:25', '2025-02-14 06:17:25'),
(16, 'MT. EVEREST EXPEDITION', 'Lyle Burnett', 122, 'vekynu@mailinator.com', '1', 'Northern Mariana Islands', 70, NULL, 'Iusto cillum commodi', '2075-02-03', NULL, '2025-03-19 11:47:25', '2025-03-19 11:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_destinations`
--

CREATE TABLE `cl_trip_destinations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `brief` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_destinations`
--

INSERT INTO `cl_trip_destinations` (`id`, `title`, `uri`, `content`, `thumbnail`, `banner`, `video`, `ordering`, `status`, `brief`, `created_at`, `updated_at`) VALUES
(15, 'Nepal', 'nepal', '<div class=\"OutlineElement Ltr SCXW142245824 BCX0\">\r\n<p class=\"Paragraph SCXW142245824 BCX0\"><span class=\"NormalTextRun SCXW142245824 BCX0\">At present, Summit Solution Treks &amp; Expedition proudly offers its services across Nepal — the land of the Himalayas, vibrant culture, and timeless adventure. Nepal is a dream destination for mountaineers, trekkers, and travel enthusiasts from all over the world. From the towering giants like Mt. Everest, Kanchenjunga, and Lhotse to countless other Himalayan peaks, Nepal is home to some of the world’s highest and most legendary mountains.</span><span class=\"EOP SCXW142245824 BCX0\" data-ccp-props=\"{}\"> </span></p>\r\n</div>\r\n<div class=\"OutlineElement Ltr SCXW142245824 BCX0\">\r\n<p class=\"Paragraph SCXW142245824 BCX0\"><span class=\"TextRun SCXW142245824 BCX0\" lang=\"EN-GB\" xml:lang=\"EN-GB\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW142245824 BCX0\">But Nepal is not just about mountains. This beautiful country offers world-renowned trekking trails, serene valleys, </span><span class=\"NormalTextRun SCXW142245824 BCX0\">crystal-clear</span><span class=\"NormalTextRun SCXW142245824 BCX0\"> lakes, roaring rivers, breathtaking waterfalls, and charming villages full of warmth and tradition. Add to that its rich cultural diversity, centuries-old traditions, and legendary hospitality, and </span><span class=\"NormalTextRun SCXW142245824 BCX0\">you’ll</span><span class=\"NormalTextRun SCXW142245824 BCX0\"> see why Nepal holds a special place in the hearts of </span><span class=\"NormalTextRun SCXW142245824 BCX0\">travellers</span><span class=\"NormalTextRun SCXW142245824 BCX0\">.</span></span><span class=\"EOP SCXW142245824 BCX0\" data-ccp-props=\"{}\"> </span></p>\r\n</div>\r\n<div class=\"OutlineElement Ltr SCXW142245824 BCX0\">\r\n<p class=\"Paragraph SCXW142245824 BCX0\"><span class=\"TextRun SCXW142245824 BCX0\" lang=\"EN-GB\" xml:lang=\"EN-GB\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW142245824 BCX0\">W</span><span class=\"NormalTextRun SCXW142245824 BCX0\">e believe that every journey in Nepal is more than just a trip — it is an experience of a lifetime. Whether you are aiming to climb a Himalayan giant, trek through iconic trails like Everest Base Camp, Annapurna Circuit, or Mardi Himal, or simply immerse yourself in Nepal’s cultural richness, we are here to guide you every step of the way.</span></span><span class=\"EOP SCXW142245824 BCX0\" data-ccp-props=\"{}\"> </span></p>\r\n</div>\r\n<div class=\"OutlineElement Ltr SCXW142245824 BCX0\">\r\n<p class=\"Paragraph SCXW142245824 BCX0\"><span class=\"TextRun SCXW142245824 BCX0\" lang=\"EN-GB\" xml:lang=\"EN-GB\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW142245824 BCX0\">While Nepal is our starting point, our vision reaches beyond its borders. </span><span class=\"NormalTextRun AdvancedProofingIssueV2Themed SCXW142245824 BCX0\">In the near future</span><span class=\"NormalTextRun SCXW142245824 BCX0\">, Summit Solution Treks &amp; Expedition will expand its services worldwide — from the Seven Summits to every corner of the globe. Wherever your adventure spirit takes you, we aim to be your trusted partner in creating safe, memorable, and life-changing experiences.</span></span><span class=\"EOP SCXW142245824 BCX0\" data-ccp-props=\"{}\"> </span></p>\r\n</div>\r\n<div class=\"OutlineElement Ltr SCXW142245824 BCX0\">\r\n<p class=\"Paragraph SCXW142245824 BCX0\"><span class=\"NormalTextRun SCXW142245824 BCX0\">With Nepal as our proud home base and the world as our future playground, we invite you to begin your adventure with us.</span><span class=\"EOP SCXW142245824 BCX0\" data-ccp-props=\"{}\"> </span></p>\r\n</div>', '1765707942.png', '1766161648.png', NULL, 1, 1, 'This is Nepal', '2022-11-30 06:28:47', '2025-12-28 10:24:32'),
(16, 'Tibet', 'tibet', '<p>ROOFTOP OF THE WORLD, LAND OF SNOWS, SHANGRILA, MYSTERIOUS BUDDHIST KINGDOM, FORBIDDEN CITY etc..  are the popular names for Tibet for centuries.  It is hidden behind the enormous Himalaya massif. Tibet is literally the highest nation on earth. Mysterious places are rare to be found in the world, but Tibet is an exception.    Now cautiously opening up to the western world and offering keen travel seekers a fulfilling authentic experience.    Tibet is a magical realm of clear blue skies, bright with pure color, rising more than two miles above sea level. After centuries of virtual isolation, local monasteries are striving to find a place in a country that’s crashing into the twentieth century. Tibet is the perfect destination to try exotic foods while embarking on a spiritual journey, leaving you feeling internally rejuvenated whilst stepping back in time. C  The wide-open spaces of the Tibetan Plateau are drenched in the dazzling light of altitude and topped by the towering peaks of the Himalayas. South of this vast Tibetan plateau is an extensive area of mountainous grazing land inhabited by wild-looking nomads, living in yak hair tents, their livelihood depends on their valuable herds of sheep, goats and yaks The majority of this land rests above 4,000m and it houses many secrets which present the perfect opportunity to explore the highest Himalayas in the world, giving you the ultimate thrill of climbing, trekking and other challenging adventurous activities Tibet can be approached overland or by air.</p>', NULL, '1724451957.jpg', NULL, 2, 0, 'This is Tibet', '2022-11-30 06:29:30', '2025-11-27 09:58:42'),
(18, 'Bhutan', 'bhutan', '<p>Bhutan often referred to as ‘land of the thunder dragon’ or ‘the last Shangri La’ on earth, is situated in the lap of Eastern Himalayas between India and the People\'s Republic of China. Covering an area of 18000 sq miles, the tiny Himalayan Kingdom is one of the most isolated nations in the world. Spectacular mountain terrain, varied flora and fauna, ancient Bhutan Buddhist monasteries, and the magnificent landscape of Bhutan have made it an exemplar tourist destination. Bhutan is bestowed with rich bio-diversity harbouring around 300 medicinal herbs and 165 endangered species. Each part of Bhutan has its own historical, geographical, cultural, traditional and religious significance. With its beautiful and largely unspoiled Himalayan setting, its rich flora and fauna and its vibrant Buddhist culture, Bhutan really is an idyllic place to visit.</p>\r\n<p>The Kingdom of Bhutan \"DRUK YUL (Land of the Dragon), sandwiched in the Himalayas between India and Tibet. It is approximately the size of Switzerland but sparsely populated.</p>\r\n<p>The mountains are magnificent, the forest is dense, the people are delightful, the air is pure, the architecture is imposing, and Culture is exciting and so on….  Dzongs, monasteries and houses with architectures found nowhere else in the world. Every local people wear beautifully hand-made Khos and Kiras dresses.  Bhutan is the only country in the world devoted to the Tantric form of MAHAYANA BUDDHISM with red-robed lamas seen all over the country.</p>\r\n<p>Visitors enter Bhutan by overland or by air. Best time to visit: March-May and September - November.</p>', '1724337833.jpg', '1724452021.jpg', NULL, 3, 0, 'This is Bhutan', '2022-12-08 06:49:20', '2025-06-18 05:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_destination_rel`
--

CREATE TABLE `cl_trip_destination_rel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_destination_rel`
--

INSERT INTO `cl_trip_destination_rel` (`id`, `trip_id`, `destination_id`, `created_at`, `updated_at`) VALUES
(663, 133, 16, NULL, NULL),
(996, 135, 16, NULL, NULL),
(2345, 250, 15, NULL, NULL),
(2490, 231, 15, NULL, NULL),
(2491, 232, 15, NULL, NULL),
(2493, 227, 15, NULL, NULL),
(2495, 226, 15, NULL, NULL),
(2496, 229, 15, NULL, NULL),
(2497, 228, 15, NULL, NULL),
(2498, 233, 15, NULL, NULL),
(2512, 234, 15, NULL, NULL),
(2514, 237, 15, NULL, NULL),
(2515, 236, 15, NULL, NULL),
(2517, 247, 15, NULL, NULL),
(2519, 243, 15, NULL, NULL),
(2520, 244, 15, NULL, NULL),
(2523, 241, 15, NULL, NULL),
(2525, 240, 15, NULL, NULL),
(2526, 190, 15, NULL, NULL),
(2536, 253, 15, NULL, NULL),
(2537, 254, 15, NULL, NULL),
(2539, 131, 15, NULL, NULL),
(2540, 165, 15, NULL, NULL),
(2543, 257, 15, NULL, NULL),
(2544, 258, 15, NULL, NULL),
(2545, 259, 15, NULL, NULL),
(2546, 256, 15, NULL, NULL),
(2547, 191, 15, NULL, NULL),
(2549, 263, 15, NULL, NULL),
(2550, 200, 15, NULL, NULL),
(2562, 235, 15, NULL, NULL),
(2565, 248, 15, NULL, NULL),
(2580, 122, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_details`
--

CREATE TABLE `cl_trip_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_title` varchar(191) NOT NULL,
  `sub_title` varchar(255) DEFAULT 'NULL',
  `duration` varchar(191) DEFAULT NULL,
  `max_altitude` varchar(191) DEFAULT 'NULL',
  `best_season` varchar(191) DEFAULT NULL,
  `walking_per_day` varchar(100) DEFAULT NULL,
  `group_size` varchar(100) DEFAULT NULL,
  `accommodation` varchar(100) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `trip_highlight` longtext DEFAULT NULL,
  `peak_name` varchar(255) DEFAULT NULL,
  `trip_type` int(11) DEFAULT NULL,
  `starting_price` varchar(191) DEFAULT 'NULL',
  `trip_map` varchar(255) DEFAULT NULL,
  `trip_video` text DEFAULT NULL,
  `trip_chart` varchar(255) DEFAULT NULL,
  `trip_excerpt` text DEFAULT NULL,
  `trip_content` longtext DEFAULT NULL,
  `trip_grade` varchar(191) DEFAULT NULL,
  `status_text` varchar(255) DEFAULT NULL,
  `uri` varchar(191) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `trip_code` varchar(191) DEFAULT NULL,
  `meta_key` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT 'NULL',
  `thumbnail` varchar(255) DEFAULT NULL,
  `trip_pdf` varchar(255) DEFAULT NULL,
  `visiter` int(11) DEFAULT 0,
  `is_draft` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `trip_of_the_month` enum('1','0') NOT NULL DEFAULT '0',
  `video_status` tinyint(4) DEFAULT 0,
  `start_date` varchar(191) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_details`
--

INSERT INTO `cl_trip_details` (`id`, `trip_title`, `sub_title`, `duration`, `max_altitude`, `best_season`, `walking_per_day`, `group_size`, `accommodation`, `route`, `trip_highlight`, `peak_name`, `trip_type`, `starting_price`, `trip_map`, `trip_video`, `trip_chart`, `trip_excerpt`, `trip_content`, `trip_grade`, `status_text`, `uri`, `ordering`, `trip_code`, `meta_key`, `meta_title`, `meta_description`, `banner`, `thumbnail`, `trip_pdf`, `visiter`, `is_draft`, `status`, `trip_of_the_month`, `video_status`, `start_date`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(122, 'Mt. Everest Expedition', 'Reach the Pinnacle of Adventure – Stand Tall on the Roof of the World!', '53 Days', '8,848.86m', 'Spring', '15 Nights 16 Days', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', '<p class=\"font-bold text-lg mb-4\">You must bring the following items:</p>\r\n<ul>\r\n<li class=\"flex items-center space-x-1 text-base\">Hiking boots (must be waterproof)</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Trekking poles (see notes)</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Microspikes (Kahtoola or similar) footwear traction (see notes)</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Trekking trousers</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Waterproof overtrousers</li>\r\n</ul>\r\n<p> </p>\r\n<p class=\"font-bold text-lg mb-4\">The following items are optional:</p>\r\n<ul>\r\n<li class=\"flex items-center space-x-1 text-base\">Trainers or similar for use in lodges</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Swimwear (for the hotel pool in Kathmandu)</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Earplugs (particularly if you are not eh one snoring)</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Pen-knife (remember to pack sharp objects in hold baggage)</li>\r\n<li class=\"flex items-center space-x-1 text-base\">Reusable cloth bag for shopping (to avoid plastic bags)</li>\r\n</ul>', 'Private Vechile & air', 2, NULL, 'himlung-kunchanjunga-WpgyH.jpg', 'bFy6jTEHlzQ', '', '<p><span class=\"TextRun SCXW203506836 BCX0\" lang=\"EN-GB\" xml:lang=\"EN-GB\" data-contrast=\"auto\"><span class=\"NormalTextRun SCXW203506836 BCX0\">Mount Everest, the highest mountain on Earth, is an iconic symbol of adventure, endurance, and human aspiration. Known as Sagarmatha in Nepal and Chomolungma in Tibet, this towering peak rises to 8,848.86 meters (29,032 ft) and continues to captivate mountaineers, adventurers, and dreamers worldwide. Standing atop Everest </span><span class=\"NormalTextRun SCXW203506836 BCX0\">represents</span><span class=\"NormalTextRun SCXW203506836 BCX0\"> not only a physical triumph but also a profound personal achievement—a moment where the sky seems within reach and every step tells a story of courage, preparation, and determination.</span></span><span class=\"EOP SCXW203506836 BCX0\" data-ccp-props=\"{}\"> </span></p>', '<p data-start=\"1181\" data-end=\"1667\">Mount Everest, rising to 8,848.86 meters (29,032 ft), stands as the highest mountain on Earth and an enduring symbol of human ambition. Known as Sagarmatha in Nepal and Chomolungma in Tibet, the mountain has inspired generations of explorers, climbers, and dreamers who seek to challenge their limits in the Himalaya. Every ascent to Everest tells a story of courage, discipline, and long-earned achievement, making it one of the most meaningful ventures in the world of mountaineering.</p>\r\n<p data-start=\"1669\" data-end=\"2249\">The history of Everest is filled with pioneering spirit, beginning with the early British reconnaissance missions of the 1920s and the heroic attempts by climbers like George Mallory and Andrew Irvine. The defining moment came on 29 May 1953, when Sir Edmund Hillary and Tenzing Norgay became the first confirmed team to reach the summit via the South Col route. Their achievement opened a new chapter in Himalayan climbing, and since then Everest has continued to attract climbers from across the world who seek the rare experience of standing on the highest point on the planet.</p>\r\n<p data-start=\"2251\" data-end=\"3079\">Climbing Everest requires deep preparation, both physically and mentally. The extreme altitude demands a carefully structured acclimatization process to help the body adjust to the thin air. Climbers must develop strong cardiovascular endurance, muscular strength, and the ability to carry significant loads through long, demanding days on the mountain. Technical familiarity with glacier travel, ladder crossings, and snow and ice climbing brings added confidence on the Khumbu Icefall and the upper slopes. Beyond physical readiness, mental resilience becomes essential — Everest is a mountain that rewards patience, focus, and steady decision-making in uncertain, high-altitude environments. From unpredictable weather to crevasses and avalanches, each phase of the climb requires respect for nature and disciplined judgment.</p>\r\n<p data-start=\"3081\" data-end=\"3732\">What makes the Everest expedition exceptional goes beyond the climb itself. The Khumbu region offers a rare cultural and natural richness that shapes the journey from the very first day. Climbers pass through traditional Sherpa settlements, visit ancient monasteries decorated with prayer flags, and witness a lifestyle deeply connected to the mountains. The trail weaves through forests, deep valleys, and glacial landscapes, eventually leading into the heart of the world’s highest peaks. The combination of cultural immersion and Himalayan scenery creates a sense of humility and perspective that stays with climbers long after the expedition ends.</p>\r\n<p data-start=\"3734\" data-end=\"4353\">Safety remains the foundation of every successful Everest ascent. Summit Solution Treks &amp; Expedition supports each climber with experienced Sherpa guides, high-altitude staff, and a dedicated base camp team. From weather analysis and rope fixing coordination to professional medical assistance and helicopter evacuation readiness, every element of the expedition is designed around risk management and strategic planning. Our logistics include high-quality oxygen systems, reliable equipment, nutritious meals, and efficient camp setups, ensuring that climbers can fully concentrate on their performance and well-being.</p>\r\n<p data-start=\"4355\" data-end=\"4703\">Climbing Everest is more than an expedition — it is a journey into the heart of the Himalayas, a test of human endurance, and a personal milestone that stays with you for a lifetime. With Summit Solution Treks and Expedition, you take on this challenge with a team committed to safety, professionalism, and an unforgettable experience on the world’s highest peak.</p>', '4', NULL, 'mt-everest-expedition', 93, NULL, 'MT. EVEREST EXPEDITION (8,848.86M)', NULL, NULL, 'everest-banner-final-1700-xtsd9.png', '1767349783_1767184900-l3333-s4cly-sBTzu.png', '', 1466, 0, '1', '0', 1, NULL, '12345', NULL, '2023-07-28 20:57:00', '2026-02-02 11:52:48'),
(131, 'Everest Base Camp Trek', 'Walk to the foot of the world’s highest mountain.', '15  Days', '5,545m', 'Spring/Autumn', '5-7 hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'Journey to the Foot of the World’s Highest Mountain', 'Private vehicle & Air', 1, NULL, 'ebc-1-1-S5Co9.jpg', NULL, 'altitude-chart-fsTeC.jpeg', '<p>The Everest Base Camp Trek is one of the world’s most iconic Himalayan journeys, guiding trekkers through the heart of the Khumbu region to the foot of Mount Everest at 5,364 meters. This unforgettable adventure blends stunning mountain scenery, centuries-old Sherpa culture, legendary trails, and unforgettable viewpoints like Kala Patthar. With Summit Solution Treks and Expedition, you experience the Everest region with expert guidance, cultural warmth, and a carefully planned itinerary designed for safety, acclimatization, and breathtaking Himalayan views. From the vibrant streets of Namche Bazaar to the spiritual tranquility of Tengboche Monastery, every step of this trek tells a story of tradition, adventure, and the human spirit’s longing for the mountains.</p>', '<p data-start=\"1308\" data-end=\"1846\">The Everest Base Camp Trek is more than a journey into the Himalayas — it is a deeply inspiring experience that brings trekkers face-to-face with the world’s highest peak, Mount Everest (8,848.86 m). Combining natural beauty, cultural immersion, and legendary mountaineering history, this trek offers everything an adventurer dreams of. Standing at Everest Base Camp, surrounded by towering ice cliffs and the mighty Khumbu Icefall, is a moment that stays with travelers forever, reminding them of the power and grandeur of the Himalayas.</p>\r\n<p data-start=\"1848\" data-end=\"2400\">The adventure begins with a thrilling mountain flight from Kathmandu to Lukla, where the gateway to the Khumbu region unfolds. From the very first steps, the trail offers enchanting views and a rich cultural atmosphere, passing through charming Sherpa villages, prayer-wheel-lined pathways, and suspension bridges draped in colorful prayer flags. As trekkers follow the Dudh Koshi River and ascend gradually into Sagarmatha National Park, they transition from lush forests into high alpine landscapes, each step bringing the mountains closer into view.</p>\r\n<p data-start=\"2402\" data-end=\"2987\">Namche Bazaar becomes the first major stop for acclimatization and exploration. As the bustling hub of the Khumbu, it offers vibrant markets, viewpoints, bakeries, and an opportunity to engage with the Sherpa community whose traditions and mountaineering history define the region. Climbing higher leads trekkers to Tengboche Monastery, one of the spiritual treasures of Nepal, offering unmatched vistas of Everest, Lhotse, Ama Dablam, and other Himalayan giants. The monastery’s peaceful atmosphere and dramatic setting make it one of the most memorable highlights of the entire trek.</p>\r\n<p data-start=\"2989\" data-end=\"3535\">Beyond Tengboche, the trail leads into the high mountain world of Dingboche, Lobuche, and Gorakshep — the final settlement before reaching the legendary Everest Base Camp at 5,364 meters. Standing at the base of the world’s tallest mountain is a surreal feeling, surrounded by massive glaciers, towering peaks, and the rich history of countless Everest expeditions. Trekkers then climb Kala Patthar (5,545 m), widely regarded as the best viewpoint in Nepal, offering unbeatable sunrise views of Mount Everest glowing gold under the morning light.</p>\r\n<p data-start=\"3537\" data-end=\"3960\">The Everest Base Camp Trek is not solely about reaching a destination; it is a cultural and spiritual journey through Sherpa heritage, Buddhist traditions, and Himalayan landscapes that shift from forested hillsides to rugged alpine terrain. At every stop, the warmth of local hospitality, the sound of prayer flags fluttering in the wind, and the breathtaking views deepen the sense of connection to this legendary region.</p>\r\n<p data-start=\"3962\" data-end=\"4567\">The best seasons for trekking are spring (March–May) and autumn (September–December), when the skies are clear, temperatures are stable, and the Himalayan panoramas are their brightest. Rhododendrons bloom across the trails in spring, while autumn offers crisp visibility and vibrant cultural celebrations. While the trek is achievable for anyone with moderate fitness, physical preparation and acclimatization are vital for safety and comfort. Summit Solution Treks and Expedition ensures that trekkers follow a well-structured itinerary, allowing proper adjustment to high altitude and minimizing risks.</p>\r\n<p data-start=\"4569\" data-end=\"4935\">With expert Sherpa guides, reliable logistical support, comfortable accommodations, and a deep commitment to safety, Summit Solution Treks and Expedition creates a trekking experience that blends adventure with peace of mind. From Lukla to Kala Patthar, every step tells a story — and the memories forged along the Everest Base Camp trail become a lifelong treasure.</p>', '2', NULL, 'everest-base-camp-trek', 101, NULL, NULL, NULL, NULL, 'treks123-HQDd3.png', '1765731838_l33-mPROU.png', '', 2942, 0, '1', '0', 1, NULL, NULL, NULL, '2023-07-30 17:05:06', '2026-01-16 04:20:05'),
(165, 'Annapurna Base Camp Trek', 'A Scenic Journey into Nepal’s Legendary Mountain Sanctuary', '13 Days', '4130m', 'Spring/autumn', '5-7 hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'A Scenic Journey into the Heart of the Annapurna Sanctuary', 'Private Vechile', 1, NULL, 'annapurna-base-campabc-trek-01-0s320.jpg', NULL, '', '<p>The Annapurna Base Camp Trek is one of Nepal’s most picturesque and culturally enriching journeys, guiding trekkers from lush terraced hills and rhododendron forests to the breathtaking amphitheater of the Annapurna Sanctuary. With its perfect balance of accessibility and adventure, this trek is ideal for both beginners and experienced hikers. Summit Solution Treks &amp; Expedition offers a well-designed route and professional guidance, ensuring a safe, memorable, and deeply immersive experience in the heart of the Himalayas.</p>', '<p data-start=\"874\" data-end=\"1352\">The Annapurna Base Camp Trek—often referred to as the Annapurna Sanctuary Trek—stands among Nepal’s most beloved and iconic Himalayan adventures. This incredible journey leads into the heart of the Annapurna massif, a naturally formed high-altitude basin surrounded by some of the tallest and most dramatic peaks in the world. With its blend of breathtaking scenery, diverse landscapes, and rich cultural immersion, it is a trek that captures the essence of Nepal in every step.</p>\r\n<p data-start=\"1354\" data-end=\"1937\">The journey typically begins with a drive or short flight from Kathmandu to Pokhara, a peaceful lakeside city that serves as the gateway to the Annapurna region. From here, the trail heads into the foothills, passing through charming villages such as Tikhedhunga, Ghorepani, and Chhomrong. These communities, home to the Gurung, Magar, and Thakali people, offer a warm welcome, traditional teahouses, and insight into a lifestyle deeply connected with the mountains. The route is lined with terraced farmland, cascading waterfalls, and forests blanketed with rhododendron and bamboo.</p>\r\n<p data-start=\"1939\" data-end=\"2444\">One of the early highlights of the trek is the visit to Poon Hill, a renowned viewpoint offering a magnificent sunrise over the Annapurna and Dhaulagiri ranges. As trekkers ascend higher, the landscape gradually shifts from dense forests to alpine meadows, with the distinctive peak of Machhapuchhre (Fishtail) rising dramatically above the valley. This sacred mountain, known for its pristine beauty and spiritual significance, accompanies trekkers all the way to the entrance of the Annapurna Sanctuary.</p>\r\n<p data-start=\"2446\" data-end=\"2916\">Reaching Annapurna Base Camp at 4,130 meters is a moment of pure wonder. The sanctuary opens into a sweeping 360-degree panorama of towering Himalayan peaks including Annapurna I, Annapurna South, Hiunchuli, Gangapurna, and Machhapuchhre. The golden glow of sunrise illuminating the surrounding mountains creates one of the most unforgettable sights in the Himalayas. The sense of isolation, peace, and natural grandeur at the base camp is unlike anywhere else in Nepal.</p>\r\n<p data-start=\"2918\" data-end=\"3226\">The return journey descends through Chhomrong and then to Jhinu Danda, where natural hot springs offer a relaxing and well-deserved break after days of trekking. From there, the trail winds back toward Pokhara, completing a route filled with natural beauty, cultural encounters, and inspiring mountain views.</p>\r\n<p data-start=\"3228\" data-end=\"3702\">The Annapurna Base Camp Trek is considered moderate in difficulty, making it accessible to both experienced hikers and first-time high-altitude trekkers. Well-marked trails, comfortable teahouse accommodations, and manageable daily distances ensure a smooth and enjoyable experience. Spring and autumn are the most popular seasons due to clear weather and excellent visibility, while winter offers quieter trails and pristine snow-covered scenery for those seeking solitude.</p>\r\n<p data-start=\"3704\" data-end=\"4066\">Summit Solution Treks &amp; Expedition provides carefully crafted itineraries, expert guides, and all necessary arrangements to make your Annapurna Base Camp experience safe, comfortable, and enriching. This trek offers not just stunning landscapes but a deeper connection with Nepal’s mountain culture—an adventure that leaves every traveler with lifelong memories.</p>', '2', NULL, 'annapurna-base-camp-trek', 133, NULL, NULL, NULL, NULL, 'annapurna-banner123-9815O.png', '1764514514_final9-uBRHM.png', '', 100, 0, '1', '0', 1, NULL, NULL, NULL, '2024-08-23 17:32:31', '2026-01-16 12:07:28'),
(190, 'Three Peaks Expedition', 'A complete climbing trilogy for ambitious mountaineers.', '27 Days', '6,476m', 'Spring/Autumn', '4-6 hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Conquer Mera, Island, and Lobuche in One Himalayan Journey', 'Private vehicle & Air', 2, NULL, '3-peak-combined-kunchanjunga-nXIMg.jpg', NULL, '', '<p data-start=\"197\" data-end=\"821\">The Three Peaks Combined Expedition in Nepal offers an extraordinary Himalayan adventure, combining the climbs of Mera Peak (6,476m), Island Peak (6,189m), and Lobuche East Peak (6,119m) in a single journey. Designed for adventure seekers aiming to develop high-altitude endurance and technical climbing skills, this expedition also includes the iconic Everest Base Camp trek. With Summit Solution Treks and Expedition’s professional guidance, Sherpa support, and full logistical arrangements, participants experience cultural immersion, breathtaking Himalayan vistas, and an unmatched multi-peak mountaineering challenge.</p>', '<p data-start=\"1011\" data-end=\"1586\">The Three Peaks Combined Expedition in Nepal is a one-of-a-kind adventure designed for climbers seeking to challenge themselves on multiple 6,000-meter peaks in a single journey. This carefully structured expedition combines the climbs of Mera Peak, Island Peak (Imja Tse), and Lobuche East Peak, providing a rare opportunity to gain both high-altitude endurance and technical climbing experience. Alongside the summits, participants trek through the legendary Everest Base Camp trail, blending Himalayan mountaineering with cultural immersion and awe-inspiring landscapes.</p>\r\n<p data-start=\"1588\" data-end=\"2079\">The expedition begins with Mera Peak, Nepal’s highest trekking peak at 6,476 meters. Located in the remote Hinku Valley, Mera Peak presents a relatively straightforward ascent suitable even for climbers with limited technical experience. Despite its accessibility, the altitude and physical endurance required make it a serious challenge. From the summit, climbers are rewarded with sweeping views of five 8,000-meter giants: Everest, Lhotse, Cho Oyu, Makalu, and the distant Kanchenjunga.</p>\r\n<p data-start=\"2081\" data-end=\"2551\">Next, climbers tackle Island Peak, locally known as Imja Tse, one of the most iconic peaks in the Khumbu region. Named by Eric Shipton in 1953 for its island-like appearance rising from the surrounding ice, Island Peak offers a moderately technical climb involving glacier crossings, fixed ropes, and steep ice slopes. This ascent provides excellent preparation for future 7,000-meter and 8,000-meter expeditions while delivering an unforgettable Himalayan experience.</p>\r\n<p data-start=\"2553\" data-end=\"2946\">The final summit challenge is Lobuche East Peak, a mountain known for its steep ridges and exposed sections. At 6,119 meters, Lobuche East demands both stamina and technical skill, making it the most challenging of the three peaks. Climbers are rewarded with a dramatic summit panorama, overlooking the Khumbu Glacier, Everest, Nuptse, Ama Dablam, and an endless horizon of Himalayan giants.</p>\r\n<p data-start=\"2948\" data-end=\"3293\">Between these climbs, the expedition incorporates trekking along the Everest Base Camp trail. This route immerses adventurers in Sherpa culture, historic monasteries, and some of the most spectacular landscapes in the world. Standing at the foot of Everest adds a unique sense of accomplishment and completes the holistic Himalayan experience.</p>\r\n<p data-start=\"3295\" data-end=\"3893\">The Three Peaks Combined Expedition is more than just summiting mountains; it is an integrated journey of high-altitude training, cultural exposure, and breathtaking natural beauty. Participants gain endurance on Mera Peak, technical climbing skills on Island and Lobuche, and a deeper appreciation of Khumbu heritage. With Summit Solution Treks and Expedition’s expert guidance, Sherpa support, and full logistical management, climbers experience a safe, professionally guided, and unforgettable multi-peak adventure that prepares them for future Himalayan expeditions of 7,000 meters and above.</p>', '3', NULL, 'three-peaks-expedition', 150, NULL, NULL, NULL, NULL, 'combo-banner-vc9tL.png', '1764241005_final-combo-uEg8G.png', '', 261, 0, '1', '0', 1, NULL, NULL, NULL, '2024-09-02 14:42:24', '2026-01-08 22:34:38'),
(191, 'Manaslu Circuit Trek', 'Circle the mighty Manaslu through remote Himalayan terrain.', '19 Days', '5160m', 'Spring/autonm', '5-7 hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'A Remote Himalayan Journey Around the Mighty Manaslu', 'Private Vehicle', 1, NULL, 'manaslu-ciruit-01-XVU2K.jpg', NULL, '', '<p>The Manaslu Circuit Trek with Summit Solution Treks and Expedition is an exceptional Himalayan journey for trekkers seeking untouched landscapes, deep cultural immersion, and a true sense of wilderness adventure. Circling the eighth-highest mountain in the world, this remote route offers dramatic scenery, Tibetan-influenced villages, ancient monasteries, and the thrilling crossing of the Larkya La Pass. Perfect for trekkers wanting a less-crowded alternative to the Annapurna and Everest regions, the Manaslu Circuit delivers raw beauty, spiritual atmosphere, and one of Nepal’s most rewarding long-distance trekking experiences.</p>', '<p data-start=\"1063\" data-end=\"1636\">The Manaslu Circuit Trek is one of Nepal’s most remarkable and less-traveled adventures, offering a rare blend of pristine nature, cultural authenticity, and dramatic high-mountain scenery. Opened to foreign trekkers only in 1991, the region still retains its untouched wilderness and centuries-old traditions, making it an ideal destination for those craving a pure Himalayan experience away from crowded commercial trails. Trekking with Summit Solution Treks and Expedition ensures a well-organized, safe, and culturally rich journey through this extraordinary landscape.</p>\r\n<p data-start=\"1638\" data-end=\"2184\">The name Manaslu comes from the Sanskrit word “Manasa,” meaning “Mountain of the Spirit,” a perfect reflection of the powerful and sacred atmosphere surrounding this area. Dominated by Mt. Manaslu (8,163m), the world’s eighth-highest peak, the trail circumnavigates deep valleys, terraced farmlands, dense forests, and high alpine terrain before reaching the iconic Larkya La Pass at 5,160 meters. Throughout the trek, you are treated to magnificent views of Himalchuli, Ngadi Chuli, Ganesh Himal, and even far-off peaks from the Annapurna range.</p>\r\n<p data-start=\"2186\" data-end=\"2755\">The journey begins along the Budhi Gandaki River, where narrow gorges, suspension bridges, and steep cliff-side paths set the tone for the adventure. As you ascend, the environment shifts from subtropical forests to Tibetan-influenced highlands where traditional lifestyles still flourish. Villages like Samagaon and Samdo showcase ancient monasteries, prayer wheels, mani walls, and a culture shaped by deep Buddhist faith. The friendly Gurung, Magar, and Tibetan-descended communities offer warm hospitality and a glimpse into mountain life preserved for generations.</p>\r\n<p data-start=\"2757\" data-end=\"3183\">The highlight of the trek is the crossing of Larkya La Pass. The climb is challenging yet deeply rewarding, and from the top, trekkers are greeted with sweeping panoramic views of glacial valleys, towering peaks, and the rugged beauty of the Himalayas. As you descend into the Marshyangdi Valley, the landscape softens into alpine meadows and rich farmlands, creating a beautiful contrast to the harsher terrain near the pass.</p>\r\n<p data-start=\"3185\" data-end=\"3551\">The best time to trek the Manaslu Circuit is in spring (March–May) and autumn (September–November), when the weather is stable, skies are clear, and the Himalayan vistas are at their finest. Spring brings vibrant rhododendron forests and fresh mountain breezes, while autumn offers crisp air and crystal-clear visibility perfect for photography and mountain viewing.</p>\r\n<p data-start=\"3553\" data-end=\"3963\">The Manaslu Circuit Trek is graded as moderate to challenging. While previous high-altitude trekking experience is helpful, it is not mandatory for those with good physical fitness and determination. With proper acclimatization and the support of trained professionals from Summit Solution Treks and Expedition, even first-time high-altitude trekkers can complete this inspiring journey safely and confidently.</p>\r\n<p data-start=\"3965\" data-end=\"4311\">Since its opening, the Manaslu Circuit has become known as one of Nepal’s most scenic long-distance treks, offering a perfect balance of adventure, cultural depth, and natural grandeur. Yet it remains beautifully untouched compared to other popular regions, preserving the raw charm and spiritual atmosphere that define the true Himalayan spirit.</p>\r\n<p data-start=\"4313\" data-end=\"4533\">For trekkers seeking wilderness, authenticity, and the thrill of exploring a remote mountain world, the Manaslu Circuit Trek promises an unforgettable Himalayan experience that stays with you long after the journey ends.</p>', '3', NULL, 'manaslu-circuit-trek', 151, NULL, NULL, NULL, NULL, 'l34-3IIum.png', '1764488234_manaslu-TirEZ.png', '', 128, 0, '1', '0', 1, NULL, NULL, NULL, '2024-09-02 16:38:30', '2026-01-11 04:16:46'),
(200, 'Langtang Valley Trek', 'The closest scenic trek to Kathmandu’s doorstep.', '11 Days', '4984m', 'Spring/Auomn', '4-6 hours', '2-10 pax', 'Hotels & Lodges', 'Ktm/Ktm', 'A Scenic Himalayan Journey Near Kathmandu', 'Private Vehicle/Helicopter', 1, NULL, 'langtang-valley-trek-01-jslmz.jpg', NULL, '', '<p>Langtang Valley Trek is one of Nepal’s most scenic and accessible Himalayan journeys, offering breathtaking landscapes, rich culture, and peaceful mountain trails just a short drive from Kathmandu. This beautiful trek leads through forests, waterfalls, alpine meadows, and traditional Tamang and Sherpa settlements, all surrounded by towering peaks like Langtang Lirung and Dorje Lakpa. With fewer crowds, comfortable teahouses, and a deep cultural connection, the region remains one of the most soulful trekking destinations in Nepal. Summit Solution Treks and Expedition organizes this journey with a focus on safety, comfort, and authentic Himalayan experiences, making it ideal for trekkers seeking a quiet, rewarding adventure in a short amount of time.</p>', '<p data-start=\"1106\" data-end=\"1684\">Langtang Valley Trek is a wonderful Himalayan adventure located just north of Kathmandu, offering a perfect blend of natural beauty, cultural richness, and peaceful trekking trails. Even though the region lies close to the capital, it still feels untouched and serene, providing trekkers a chance to explore authentic mountain villages and dramatic landscapes without needing long travel days. Summit Solution Treks and Expedition operates this trek with an emphasis on comfort, safety, and personalized service, ensuring every traveler experiences the true essence of Langtang.</p>\r\n<p data-start=\"1686\" data-end=\"2291\">The name Langtang comes from Tibetan words meaning “to follow the yak,” a reminder of the ancient legend in which a Buddhist monk discovered the valley while searching for a lost yak. This adds a timeless charm to a region already filled with spiritual and cultural depth. As the trek begins, the trail passes through forests of rhododendron, bamboo, and oak, where waterfalls, small streams, and wildlife accompany you along the way. Gradually, the valley opens into wide meadows that reveal spectacular views of Langtang Lirung, Dorje Lakpa, Gangchempo, and distant horizons dotted with Himalayan peaks.</p>\r\n<p data-start=\"2293\" data-end=\"2785\">The journey also offers a rich cultural experience. The Langtang region is home to Tamang and Sherpa communities, whose Buddhist traditions shape the identity of every village. Mani walls, prayer wheels, and fluttering prayer flags line the pathway, while the monastery at Kyanjin Gompa remains one of the spiritual highlights of the trek. Many trekkers take an additional hike to Tsergo Ri, a high viewpoint that provides breathtaking 360-degree views of snow-covered mountains and glaciers.</p>\r\n<p data-start=\"2787\" data-end=\"3136\">Langtang Valley lies within Langtang National Park, an area known for its diverse wildlife, including the red panda, Himalayan black bear, musk deer, and various bird species. The route also passes through yak pastures and traditional stone houses, and visitors often stop at a small local cheese factory that adds a unique flavor to the experience.</p>\r\n<p data-start=\"3138\" data-end=\"3660\">One of the reasons Langtang Valley Trek has become increasingly popular is its accessibility and moderate difficulty, making it suitable for both beginners and experienced trekkers. With well-managed teahouses, flexible itinerary options, and fewer crowds compared to Everest and Annapurna, the trek is an ideal choice for those seeking a peaceful yet rewarding Himalayan journey. Summit Solution Treks and Expedition ensures that each trekker enjoys a well-organized, comfortable, and memorable trip from start to finish.</p>\r\n<p data-start=\"3662\" data-end=\"4048\">The atmosphere of Langtang is quietly magical. Whether it’s the golden morning light touching the peaks, the sound of Buddhist chants drifting from a distant monastery, or the warm smiles of the mountain villagers, every moment spent in this valley feels pure and unforgettable. The Langtang Valley Trek remains a true gem of Nepal, offering beauty, culture, and serenity in every step.</p>', '2', NULL, 'langtang-valley-trek', 160, NULL, NULL, NULL, NULL, 'lang2-nxjGN.png', '1764941023_lang-1-wb9ec.png', '', 73, 0, '1', '0', 1, NULL, NULL, NULL, '2024-09-09 18:35:52', '2026-01-16 06:42:12'),
(226, 'Mt. Kanchenjunga Expedition', 'Explore the sacred summit of the world’s third-highest mountain.', '51 days', '8586m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Kanchenjunga Expedition – A Journey to the Five Treasures of Snow', 'Private vehicle & Air', 2, NULL, 'kanchanjunga-kunchanjunga-KAsst.jpg', NULL, '', '<p>Join through Summit Solution for one of the most challenging and meaningful Himalayan climbs — the Kanchenjunga Expedition. Standing as the world’s third-highest peak, Kanchenjunga offers a rare combination of extreme technical difficulty, raw wilderness, deep cultural significance, and remote high-altitude adventure. This expedition is designed for experienced climbers looking for a true test of endurance, skill, and patience in one of the least-touched regions of the Himalayas. With professional support, careful planning, and reliable logistics from Summit Solution, climbers can fully immerse themselves in the beauty, power, and mystery of the Five Treasures of Snow.</p>', '<p data-start=\"1177\" data-end=\"1906\">Kanchenjunga, the third-highest mountain in the world and the second-highest in Nepal, rises with breathtaking grandeur to 8,586 meters (28,169 ft) along the remote eastern border between Nepal and India’s Sikkim region. Its name originates from the Tibetan words <em data-start=\"1441\" data-end=\"1450\">Kanchen</em> and <em data-start=\"1455\" data-end=\"1463\">Dzonga</em>, meaning “The Five Treasures of Snow” — symbolizing gold, silver, gems, grain, and sacred scriptures. These sacred treasures are represented by its five prominent summits: Kanchenjunga Main, Kanchenjunga West, Kanchenjunga South, Kangbachen, and Jongsang. For centuries, this mountain has held deep spiritual significance among local communities, while simultaneously commanding global respect for its unmatched beauty and extreme difficulty.</p>\r\n<p data-start=\"1908\" data-end=\"2374\">Although the first reconnaissance was carried out by the British in 1849, the mountain remained unsummited until Joe Brown and George Band of the British expedition reached its heights in 1955. Even today, Kanchenjunga remains one of the least climbed and most technically demanding of the 8,000-meter peaks. Its remote location, unpredictable weather, and high avalanche risk make it an expedition reserved only for the most experienced and determined mountaineers.</p>\r\n<p data-start=\"2376\" data-end=\"3264\">Climbing Kanchenjunga involves navigating complex terrain consisting of steep ice slopes, unstable seracs, deep crevasses, and long glacier sections. Above 7,000 meters, oxygen levels drop dramatically, requiring precise acclimatization and careful movement to avoid altitude-related complications. The mountain’s notorious weather patterns bring sudden storms and heavy snowfall, which demand constant vigilance and flexibility in planning summit rotations. Physical and mental endurance become essential as climbers undertake multi-week journeys between camps, battling fierce winds, frigid temperatures, and high-altitude fatigue. For safety, most climbers rely on supplemental oxygen above 7,500 meters, combined with advanced rope techniques, technical ice climbing skills, and strong high-altitude experience — usually including previous ascents of multiple 6,000m and 7,000m peaks.</p>\r\n<p data-start=\"3266\" data-end=\"4082\">Beyond its physical challenges, the Kanchenjunga region is a sanctuary of untouched natural beauty and vibrant cultural heritage. The eastern Himalayas are home to pristine forests, cascading glacial rivers, high alpine meadows, and remote valleys that few travelers ever reach. Local Sherpa, Limbu, and other ethnic communities maintain ancient traditions, monasteries, and spiritual practices that enrich the climbing experience. The mountain itself is considered sacred, and in honor of local belief, the first successful summit team stopped just below the actual peak — a tradition that many climbers continue to respect today. This deep reverence gives the Kanchenjunga Expedition a uniquely spiritual atmosphere, making the journey not just a physical conquest but a profound cultural and emotional experience.</p>\r\n<p data-start=\"4084\" data-end=\"4773\">Summit Solution Treks &amp; Expedition provides professional, safety-focused support for climbers attempting Kanchenjunga. Our highly skilled Sherpa guides, basecamp staff, and logistic teams ensure that every stage of the expedition — from acclimatization to summit push — is carefully coordinated. Safety protocols include helicopter evacuation preparedness, advanced medical and rescue training, high-altitude first-aid procedures, and consistent monitoring of weather patterns to minimize risk during critical climbing periods. Regular supply rotations maintain fresh food, oxygen cylinders, ropes, and essential equipment at the camps, allowing climbers to focus entirely on their ascent.</p>\r\n<p data-start=\"4775\" data-end=\"5341\">The Kanchenjunga Expedition stands as one of the ultimate tests of Himalayan mountaineering. Its isolation, technical challenges, and spiritual significance create an adventure that is both rare and transformative. For elite mountaineers seeking a peak that demands skill, courage, and unwavering dedication, Kanchenjunga offers an experience of extraordinary magnitude. To stand beneath its Five Treasures of Snow is to embrace not only the thrill of high-altitude climbing but also the profound cultural and natural beauty of one of the Himalayas’ greatest giants.</p>\r\n<p data-start=\"5343\" data-end=\"5537\">If you are searching for a once-in-a-lifetime challenge — a journey far beyond ordinary expeditions — Kanchenjunga awaits with a promise of awe, resilience, and unforgettable Himalayan grandeur.</p>', '4', NULL, 'mt-kanchenjunga-expedition', 182, NULL, NULL, NULL, NULL, 'whatsapp-image-2025-07-10-at-10-mWFgm.jpeg', '1759139590_whatsapp-image-2025-07-10-at-10-Jsp6K.jpeg', '', 75, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-21 08:16:28', '2026-01-08 19:20:18'),
(227, 'Mt. Lhotse Expedition', 'Scale the elegant neighbor of Everest.', '60 days', '8516m', 'Spring', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'A Technical Ascent to the World’s Fourth-Highest Peak', 'Private vehicle & Air', 2, NULL, 'everest-lhotse-combined-1-01-Uj6Bg.jpg', NULL, '', '<p>The Lhotse Expedition is an elite mountaineering journey to the world’s fourth-highest mountain (8,516m), known for its steep faces, exposed couloirs, and raw Himalayan intensity. Sharing part of its route with Everest but offering far greater technical challenges and far fewer crowds, Lhotse stands as one of the most respected 8,000m peaks for serious climbers. From the dramatic Lhotse Face to the legendary Lhotse Couloir, this expedition demands advanced skills, unwavering endurance, and a deep respect for high-altitude climbing.</p>', '<p data-start=\"721\" data-end=\"1598\">The Mt. Lhotse Expedition is one of the Himalayas’ most demanding and prestigious high-altitude climbs, rising to an impressive 8,516 meters as the world’s fourth-highest peak. Towering directly south of Mount Everest, Lhotse forms a massive wall of rock, ice, and snow, with its three summits—Lhotse Main, Lhotse Shar, and Lhotse Middle—creating one of the most dramatic skylines in the Khumbu region. While it shares the South Col route with Everest up to a point, Lhotse is defined by its own identity: steep faces, narrow couloirs, and relentless alpine challenges that attract seasoned mountaineers seeking a technical, raw, and less crowded alternative to Everest. The mountain’s colossal South Face and the iconic Lhotse Couloir are renowned for their vertical exposure and demanding climbing conditions, where each step requires precision, skill, and mental resilience.</p>\r\n<p data-start=\"1600\" data-end=\"2439\">First summited in 1956 by Ernst Reiss and Fritz Luchsinger of Switzerland, Lhotse quickly earned a reputation as one of the most technical 8,000-meter giants. The climbing route features high-altitude ice climbing, rock sections, serac exposure, and crevassed glaciers. Beyond 8,000 meters—the infamous “Death Zone”—oxygen levels drop dramatically, requiring supplemental oxygen and careful acclimatization rotations between high camps. Climbers must navigate the Khumbu Icefall, ascend the Lhotse Face, and make the critical push through the Lhotse Couloir, where conditions vary drastically depending on seasonal snow and weather. This combination of technical complexity and extreme altitude makes Lhotse ideal for climbers with strong experience on 6,000m and 7,000m peaks, as well as advanced proficiency in mixed climbing techniques.</p>\r\n<p data-start=\"2441\" data-end=\"2996\">The expedition unfolds within the breathtaking Mahalangur Himalaya, home to Sherpa culture, ancient monasteries, and legendary Himalayan routes. Its proximity to Everest offers spectacular views of Nuptse, Everest Base Camp, and the Khumbu Glacier, while still allowing climbers to experience an atmosphere of solitude that Everest’s crowded slopes often lack. Lhotse is more than a climb—it is an immersion into Himalayan heritage, an encounter with pristine high-altitude terrain, and a powerful test of human endurance in an uncompromising environment.</p>\r\n<p data-start=\"2998\" data-end=\"3568\">Safety and support are essential on such a formidable peak, and Summit Solution Treks &amp; Expedition provides highly experienced Sherpa guides, comprehensive base camp services, high-altitude medical preparedness, and coordinated oxygen and supply rotations. Our team monitors weather patterns closely, ensuring well-timed summit pushes and minimizing risks associated with avalanches, storms, and altitude-related complications. With a strong logistical backbone and expert guidance, climbers can focus fully on the intense physical and technical demands of the mountain.</p>\r\n<p data-start=\"3570\" data-end=\"4075\" data-is-last-node=\"\" data-is-only-node=\"\">Standing atop Lhotse is a moment of profound achievement, earned through determination, skill, and respect for the challenges of extreme altitude. The Mt. Lhotse Expedition offers a rare chance to conquer one of the most technically formidable 8,000ers—an adventure defined by towering faces, narrow couloirs, and the sheer power of the Himalayan wilderness. For mountaineers seeking a peak that embodies both prestige and pure alpine challenge, Lhotse stands unmatched as a bold and unforgettable ascent.</p>', '4', NULL, 'mt-lhotse-expedition', 183, NULL, NULL, NULL, NULL, 'lhotse-banner-4EGDC.png', '1764053829_1234567890-PWFGf.jpg', '', 99, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-21 08:17:54', '2026-02-02 08:37:44'),
(228, 'Mt. Makalu Expedition', 'Challenge yourself on the untamed giant of the eastern Himalayas.', '50 days', '8485m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Makalu Expedition – A Technical Giant of the Himalaya', 'Private vehicle & Air', 2, NULL, 'makalu-kunchanjunga-T75eA.jpg', NULL, '', '<p>Makalu rises sharply on the Nepal–Tibet border, famous for its perfect pyramid summit and technical high-altitude terrain. It is quieter, more remote, and more demanding than the commercial giants, offering a true expedition atmosphere. With Summit Solution, you can take on this challenging peak with expert guidance, reliable logistics, and a team that prioritizes safety above everything.</p>', '<p data-start=\"1031\" data-end=\"1586\">Rising to <strong data-start=\"1041\" data-end=\"1069\">8,485 meters (27,766 ft)</strong> along the Nepal–Tibet border, Makalu stands as the world’s fifth-highest mountain and one of the most visually striking peaks on the planet. Unlike Everest’s massive snow slopes and broad shoulders, Makalu is a perfect pyramid—an elegant and symmetrical titan carved from four razor-sharp ridges. Its beauty is matched only by its difficulty. The mountain is widely regarded as one of the most technically challenging 8,000-meter peaks, demanding a rare combination of strength, experience, and refined alpine skill.</p>\r\n<p data-start=\"1588\" data-end=\"2098\">Makalu was first climbed in 1955 by a strong French team led by Jean Franco, Lionel Terray, and Jean Couzy, an ascent that is still remembered as a milestone in Himalayan mountaineering. Since then, Makalu has maintained its reputation as a mountain meant for true climbers—those who seek not just altitude but challenge, skill, and mastery. The mountain’s steep rock pitches, exposed ridges, and notoriously demanding summit pyramid have made it a coveted objective for experienced alpinists around the world.</p>\r\n<p data-start=\"2100\" data-end=\"2819\">One of the defining features of Makalu is its summit pyramid. The final 500 meters rise dramatically in a sustained climb of rock, ice, and hard snow where precision becomes non-negotiable. Climbers must navigate steep, exposed terrain with extremely limited room for error, making the summit push one of the most technical among all 8,000ers. The ridgelines leading up the mountain are narrow and knife-edged, constantly threatened by strong Himalayan winds. Makalu’s isolation exposes it to rapid weather changes, often forcing climbers to wait patiently for short summit windows. The mountain requires weeks of acclimatization, demanding physical endurance and the ability to operate confidently at extreme altitude.</p>\r\n<p data-start=\"2821\" data-end=\"3500\">The approach to Makalu Base Camp is an adventure in itself. The trail leads through the untouched landscapes of the <strong data-start=\"2937\" data-end=\"2967\">Makalu-Barun National Park</strong>, one of Nepal’s most pristine and biologically rich protected areas. The region feels far removed from the commercialized routes of Everest or Annapurna. Trekkers pass through rhododendron forests, high alpine valleys, glaciated basins, and traditional Sherpa settlements, experiencing deep cultural immersion before stepping into the raw wilderness that surrounds the mountain. From its higher slopes, Makalu reveals awe-inspiring views of Everest, Lhotse, Chamlang, Baruntse, and the vast, windswept plains of the Tibetan Plateau.</p>\r\n<p data-start=\"3502\" data-end=\"4097\">Climbing Makalu is a full-scale expedition that tests every dimension of a mountaineer’s ability. The ascent involves navigating challenging glaciers and icefalls, establishing multiple high camps, enduring fierce winds at Makalu La, and ultimately confronting the exposed summit pyramid that defines the climb. Above 8,000 meters in the Death Zone, climbers must move decisively while managing fatigue, altitude, and unpredictable weather. For those who stand on its summit, Makalu offers a deep and rare satisfaction—an achievement that represents true mastery of high-altitude mountaineering.</p>\r\n<p data-start=\"4099\" data-end=\"4770\">Summit Solution Treks &amp; Expedition approaches Makalu with a blend of academic knowledge and hands-on expertise. Our strategy emphasizes safe acclimatization, strong logistical preparation, and constant monitoring of weather and mountain conditions. At base camp, climbers benefit from high-altitude medical support, efficient communication systems, and experienced Sherpa teams whose knowledge of the route is unmatched. Oxygen support, contingency planning, emergency arrangements, and helicopter evacuation options ensure that safety remains our highest priority. Every aspect of the expedition is designed with precision so climbers can focus entirely on the mountain.</p>\r\n<p data-start=\"4772\" data-end=\"5137\">Makalu remains a climber’s mountain—demanding, elegant, and profoundly rewarding. It is not just a summit but a test of resilience, technique, and mental strength. To attempt Makalu is to step into a realm of high-altitude challenge that few peaks can offer, embracing the solitude, beauty, and intensity of one of the finest mountaineering objectives in the world.</p>\r\n<p data-start=\"4772\" data-end=\"5137\"> </p>', '3', NULL, 'mt-makalu-expedition', 184, NULL, NULL, NULL, NULL, 'untitled-final-combo-QzRZx.gif', '1743154850_untitled-makalu-12345-0gEXi.gif', '', 100, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-21 08:20:35', '2026-01-22 10:53:08');
INSERT INTO `cl_trip_details` (`id`, `trip_title`, `sub_title`, `duration`, `max_altitude`, `best_season`, `walking_per_day`, `group_size`, `accommodation`, `route`, `trip_highlight`, `peak_name`, `trip_type`, `starting_price`, `trip_map`, `trip_video`, `trip_chart`, `trip_excerpt`, `trip_content`, `trip_grade`, `status_text`, `uri`, `ordering`, `trip_code`, `meta_key`, `meta_title`, `meta_description`, `banner`, `thumbnail`, `trip_pdf`, `visiter`, `is_draft`, `status`, `trip_of_the_month`, `video_status`, `start_date`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(229, 'Mt. Dhaulagiri Expedition', 'Walk the ridge of ice and light on the White Mountain.', '40 Days', '8167m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Conquering the Seventh-Highest Mountain in the World', 'Private vehicle & Air', 2, NULL, 'dhaulagiri-kunchanjunga-6RCmT.jpg', NULL, '', '<p>The Dhaulagiri Expedition is a high-altitude adventure to the world’s seventh-highest peak (8,167m), renowned for its steep ridges, remote approach, and raw Himalayan environment. Known as “The White Mountain,” Dhaulagiri offers one of the most challenging and least-commercialized 8,000er climbs, attracting experienced mountaineers seeking technical terrain, isolation, and a truly authentic expedition in western Nepal. With dramatic glaciers, towering faces, and unpredictable weather, Dhaulagiri stands as a prestigious test of skill, endurance, and Himalayan expertise.</p>', '<p data-start=\"772\" data-end=\"1568\">The Dhaulagiri Expedition is an extraordinary high-altitude journey to Mount Dhaulagiri (8,167m), the seventh-highest mountain in the world and one of the most visually striking peaks in the Himalayas. Rising dramatically above the Kali Gandaki Valley, Dhaulagiri—aptly named “The White Mountain”—is admired for its immense snow-covered slopes, rugged ridgelines, and commanding presence in western Nepal. Its geographic isolation, nearly 120 km of sprawling mountain mass, and proximity to the world-deepest Kali Gandaki Gorge create a landscape of overwhelming grandeur. First climbed in 1960 via the Northeast Ridge, Dhaulagiri has earned a reputation as a true mountaineer’s mountain: challenging, remote, and deeply rewarding for those prepared to take on its technical and physical demands.</p>\r\n<p data-start=\"1570\" data-end=\"2331\">Unlike more frequented 8,000ers, Dhaulagiri offers a raw expedition experience with steep faces, complex glacial systems, and high exposure to weather systems sweeping across western Nepal. Climbers must navigate demanding sections of rock, ice, and snow while managing crevasses, seracs, and avalanche-prone slopes. The ascent typically involves establishing multiple high camps above the 4,750m Base Camp, with a classic route that pushes through glaciated terrain to Camp I, steep snow slopes to Camp II, and a dramatic high-altitude ridge leading to Camp III at around 7,400m. From here, climbers undertake a technical final push to the summit, standing atop a peak that offers sweeping views of the Annapurna range, Manaslu, and the vast Himalayan horizon.</p>\r\n<p data-start=\"2333\" data-end=\"3024\">The journey to Dhaulagiri is not only a mountaineering challenge but also a cultural and natural immersion into one of Nepal’s most remote regions. The approach follows rugged trails through Myagdi’s traditional villages, terraced fields, rhododendron forests, and high alpine valleys. Unlike the bustling trekking routes of Khumbu or Annapurna Base Camp, the Dhaulagiri region remains wild and quiet, offering a sense of isolation and untamed beauty that few Himalayan expeditions can match. Home to diverse flora and fauna within the Annapurna Conservation Area, the region blends high-altitude wilderness with rich cultural heritage, adding depth and meaning to the expedition experience.</p>\r\n<p data-start=\"3026\" data-end=\"3639\">Given its unpredictable weather patterns, steep technical sections, and demanding acclimatization schedule, Dhaulagiri is best suited for climbers with significant previous experience on 7,000m or 8,000m peaks. Summit Solution Treks &amp; Expedition ensures a high level of safety through expert Sherpa guides, well-established high camps, rope fixing support, supply rotations, communication systems, and high-altitude medical planning. Supplemental oxygen, emergency evacuation coordination, and reliable logistics help climbers stay focused on the ascent while minimizing risk in this remote Himalayan environment.</p>\r\n<p data-start=\"3641\" data-end=\"4168\" data-is-last-node=\"\" data-is-only-node=\"\">Climbing Dhaulagiri is an intense and transformative endeavor—one that combines physical endurance, technical alpine climbing, and the pure spirit of exploration. Its towering white slopes, dramatic ridges, and untouched landscapes make it one of the most authentic expeditions in Nepal. For mountaineers seeking a prestigious, less-crowded, and truly challenging 8,000-meter climb, the Dhaulagiri Expedition offers an unforgettable Himalayan adventure and the chance to stand on one of the world’s great high-altitude summits.</p>', '4', NULL, 'mt-dhaulagiri-expedition', 185, NULL, NULL, NULL, NULL, 'banner-dhau-Z1B7y.png', '1759140598_dsc-final-dhaulagri-oCCeG.png', '', 85, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-21 08:23:52', '2026-01-10 13:03:46'),
(231, 'Mt. Manaslu Expedition', 'Find your rhythm on one of Nepal’s most graceful peaks.', '36 Days', '8163m', 'Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Conquer the Mountain of the Spirit', 'Private vehicle & Air', 2, NULL, 'manaslu-kunchanjunga-OFAB2.jpg', NULL, '', '<p>The Mt. Manaslu Expedition takes you to the summit of the world’s eighth-highest peak (8,163m), known as the “Mountain of the Spirit.” Famous for its sweeping glaciers, long ridges, and spiritually rich Himalayan surroundings, Manaslu is a challenging yet accessible 8,000er—ideal for climbers preparing for Everest. Combining technical mountaineering, pristine landscapes, and deep cultural heritage, the Manaslu Expedition offers one of Nepal’s most rewarding and transformative alpine experiences.</p>', '<article class=\"text-token-text-primary w-full focus:outline-none [--shadow-height:45px] has-data-writing-block:pointer-events-none has-data-writing-block:-mt-(--shadow-height) has-data-writing-block:pt-(--shadow-height) [&amp;:has([data-writing-block])&gt;*]:pointer-events-auto scroll-mt-[calc(var(--header-height)+min(200px,max(70px,20svh)))]\" dir=\"auto\" tabindex=\"-1\" data-turn-id=\"request-68c13a9d-55a0-8333-92d7-6c904797b756-3\" data-testid=\"conversation-turn-196\" data-scroll-anchor=\"true\" data-turn=\"assistant\">\r\n<div class=\"text-base my-auto mx-auto pb-10 [--thread-content-margin:--spacing(4)] thread-sm:[--thread-content-margin:--spacing(6)] thread-lg:[--thread-content-margin:--spacing(16)] px-(--thread-content-margin)\">\r\n<div class=\"[--thread-content-max-width:40rem] thread-lg:[--thread-content-max-width:48rem] mx-auto max-w-(--thread-content-max-width) flex-1 group/turn-messages focus-visible:outline-hidden relative flex w-full min-w-0 flex-col agent-turn\" tabindex=\"-1\">\r\n<div class=\"flex max-w-full flex-col grow\">\r\n<div class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-1\" dir=\"auto\" data-message-author-role=\"assistant\" data-message-id=\"596b0d26-5276-4e32-944c-d417568a5fee\" data-message-model-slug=\"gpt-5-1\">\r\n<div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[1px]\">\r\n<div class=\"markdown prose dark:prose-invert w-full break-words light markdown-new-styling\">\r\n<p data-start=\"715\" data-end=\"1559\">The Mt. Manaslu Expedition is an iconic Himalayan adventure to the eighth-highest mountain in the world, standing at an impressive 8,163 meters in the Mansiri Himal range of Gorkha District. Revered as the “Mountain of the Spirit,” Manaslu derives its name from the Sanskrit word <em data-start=\"995\" data-end=\"1003\">Manasa</em>, meaning “soul” or “intellect,” reflecting both the physical intensity and spiritual depth this mountain embodies. First climbed on May 9, 1956, by Japanese mountaineer Toshio Imanishi and Sherpa Gyalzen Norbu, Manaslu has earned a reputation as one of the most rewarding 8,000ers—challenging, stunningly beautiful, and less technical than some of the more extreme giants like K2 or Kangchenjunga. Its dramatic glaciers, ridgelines, and panoramic views of the central Himalayas make the Manaslu Expedition an unforgettable experience for serious climbers.</p>\r\n<p data-start=\"1561\" data-end=\"2378\">Often considered the best preparatory climb for Everest, Manaslu offers a balance of technical complexity, high-altitude exposure, and manageable climbing conditions. Its Northeast Face—the standard route—provides a reliable ascent path featuring crevassed glaciers, steep snow slopes, and sections vulnerable to avalanches. Though known as a comparatively safer and more straightforward 8,000er, Manaslu demands strong mountaineering skills, previous high-altitude experience, and exceptional physical conditioning. With six potential climbing routes and a base camp located around 4,700 meters, the expedition involves multiple acclimatization rotations and a carefully executed summit strategy. The climb is both demanding and deeply rewarding, offering climbers invaluable experience for future 8,000-meter peaks.</p>\r\n<p data-start=\"2380\" data-end=\"3067\">What sets Manaslu apart is the purity of its cultural and natural environment. The Manaslu region, once closed to foreigners until 1991, retains its authentic Himalayan charm. The journey to base camp winds through traditional Gurung and Tibetan-influenced villages, surrounded by monasteries, prayer wheels, and fluttering prayer flags that fill the valleys with spiritual energy. As part of the Manaslu Conservation Area, the region is rich in biodiversity, home to snow leopards, Himalayan tahr, blue sheep, and rare bird species. Trekkers and climbers experience a landscape untouched by mass tourism, where ancient culture and raw Himalayan wilderness converge in a perfect harmony.</p>\r\n<p data-start=\"3069\" data-end=\"3707\">With stable climbing windows during spring (April–May) and autumn (September–October), the Manaslu Expedition typically spans 35–40 days. This duration allows proper acclimatization, climbing rotations, and flexibility for weather-dependent summit pushes. The expedition demands prior experience on 6,000m and 7,000m peaks, as well as strong technical understanding of glacier travel, rope handling, and high-altitude survival. Summit Solution Treks &amp; Expedition provides professional logistics, highly skilled Sherpa guides, advanced safety planning, and personalized support to maximize summit success while ensuring climber well-being.</p>\r\n<p data-start=\"3709\" data-end=\"4200\">Climbing Manaslu is not just an ascent—it is a profound Himalayan journey shaped by physical endurance, challenging high-altitude terrain, cultural immersion, and spiritual reflection. From the glacier-carved landscapes and remote valleys to the triumphant final push toward the 8,163m summit, every moment on Manaslu leaves a lasting impression. For climbers seeking a prestigious, attainable, and deeply meaningful 8,000-meter peak, the Mt. Manaslu Expedition stands as the perfect choice.</p>\r\n<p data-start=\"4202\" data-end=\"4367\" data-is-last-node=\"\" data-is-only-node=\"\">Join Summit Solution Treks &amp; Expedition and rise toward the “Mountain of the Spirit,” where the climb will test your limits and the Himalayas will inspire your soul.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"z-0 flex min-h-[46px] justify-start\"> </div>\r\n<div class=\"mt-3 w-full empty:hidden\">\r\n<div class=\"text-center\"> </div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n<div class=\"pointer-events-none h-px w-px\" aria-hidden=\"true\" data-edge=\"true\"> </div>', '3', NULL, 'mt-manaslu-expedition', 187, NULL, NULL, NULL, NULL, 'dsc-5042-last-final-final-fial-Yr6dx.png', '1744022093_img-6003mt-manaslu-xEgUK.png', '', 178, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-21 08:57:10', '2026-01-17 00:59:12'),
(232, 'Mt. Annapurna I Expedition', 'Climb the legendary peak that defines true mountaineering.', '41 Days', '8091m', 'Spring', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'A Legendary Climb to the First Conquered 8,000m Peak', 'Private vehicle & Air', 2, NULL, 'annapurna-kunchanjunga-irkvo.jpg', NULL, '', '<p>Join the Annapurna I Expedition, an elite mountaineering challenge to the world’s tenth-highest peak at 8,091m. Known for its dramatic beauty and extreme difficulty, Annapurna I stands as one of the most dangerous yet rewarding 8,000ers in the Himalayas. With its historical legacy, avalanche-prone slopes, and technical North Face route, this expedition offers a rare opportunity for skilled climbers seeking one of the most respected summits in mountaineering history.</p>', '<p data-start=\"838\" data-end=\"1558\">Rising to an elevation of 8,091 meters, Annapurna I stands as the tenth-highest mountain in the world and one of the most formidable challenges in high-altitude climbing. Located in the heart of the Annapurna Range of central Nepal, this majestic peak embodies raw Himalayan power with its massive walls, sweeping glaciers, and unpredictable conditions. The mountain’s Sanskrit name, meaning “Goddess of Nourishment,” evokes abundance and fertility, yet for climbers, Annapurna I represents hardship, thin safety margins, technical obstacles, and a level of danger that few peaks in the world can match. Its slopes are revered for their beauty, but equally feared for the difficulty and precision required to climb them.</p>\r\n<p data-start=\"1560\" data-end=\"2357\">Annapurna I holds a legendary place in mountaineering history because it was the first 8,000-meter peak ever summited. On June 3, 1950, Maurice Herzog and Louis Lachenal of France reached its summit after an expedition marked by extreme weather, intense physical suffering, and unbreakable determination. Their achievement—completed before teams stood on the tops of Everest or any other 8,000er—became a defining moment in Himalayan exploration. Since then, Annapurna I has continued to challenge climbers from around the world, maintaining one of the highest fatality rates among the 8,000ers due to its avalanche-prone slopes and volatile weather patterns. Even experienced mountaineers approach Annapurna with deep respect, knowing that its risks are real and its technical demands relentless.</p>\r\n<p data-start=\"2359\" data-end=\"3300\">The ascent typically follows the North Face, a steep and complex route requiring climbers to navigate mixed terrain of rock, snow, and ice while moving between several progressively higher camps. Every section is exposed, every hour demands caution, and every decision determines safety. The climb involves long days of effort, often five to seven hours at a time, as climbers ascend through hanging glaciers, traverse icy couloirs, and adjust to extreme altitude. Avalanches are an ever-present threat, and even minor weather shifts can transform the entire mountain, making strategy and timing essential. Yet those who reach the summit of Annapurna I describe it as one of the most powerful and humbling experiences imaginable. The panorama from the top reveals the full sweep of the Annapurna Massif, the towering Dhaulagiri Range, and the vast depth of the Kali Gandaki Gorge, creating a moment that feels both timeless and overwhelming.</p>\r\n<p data-start=\"3302\" data-end=\"3906\">Approaching the mountain is an immersive Himalayan experience on its own. The route to Annapurna Base Camp winds through traditional Gurung and Magar villages, Buddhist monasteries, and lush forested trails, gradually rising into rugged alpine terrain. The region lies within the Annapurna Conservation Area, a protected sanctuary home to snow leopards, Himalayan tahrs, musk deer, and vibrant Himalayan birdlife. The journey combines cultural richness with natural beauty, making Annapurna I not only a mountaineering objective but also a deeply meaningful encounter with Nepal’s heritage and landscape.</p>\r\n<p data-start=\"3908\" data-end=\"4619\">Climbing Annapurna I demands extensive high-altitude experience and advanced technical skills. It is a peak reserved for bold and accomplished mountaineers who have gained confidence through other major Himalayan expeditions. Many climbers attempt Annapurna only after summiting at least one or more 8,000m peaks, understanding the precision and mental resilience required to face its dangers. The best period for the expedition is during the spring climbing season, particularly April to May, when the weather is more stable and the avalanche risk is significantly lower compared to other times of the year. Although autumn can offer a possible window, spring remains the preferred choice for most expeditions.</p>\r\n<p data-start=\"4621\" data-end=\"5299\">For those who accept the challenge, the Annapurna I Expedition becomes far more than a climb. It becomes a journey into the heart of Himalayan history, a confrontation with nature’s extremes, and an opportunity to stand on a summit that only a select few in the world have reached. Annapurna I continues to draw climbers who seek not just adventure, but the honor of attempting one of the most respected and dangerous mountains on Earth. With Summit Solution Treks &amp; Expedition, climbers step into the legacy of a mountain that combines danger, beauty, culture, and monumental achievement, offering an experience that remains etched into memory long after the climb is complete.</p>', '4', NULL, 'mt-annapurna-i-expedition', 188, NULL, NULL, NULL, NULL, 'final-banneer-viitO.jpg', '1744027530_thumbnill-final-uVACm.png', '', 75, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-21 09:01:18', '2026-01-07 13:11:37'),
(233, 'Everest / Lhotse Combo', 'Two iconic summits — one historic journey.', '60 days', '8848.86m', 'Spring', '5-7 hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'The Ultimate Double 8,000m Himalayan Challenge', 'Private vehicle & Air', 2, NULL, 'everest-lhotse-combined-1-01-6v8LA.jpg', NULL, '', '<p>The Everest–Lhotse Combined Expedition offers one of the rarest and most prestigious opportunities in mountaineering: reaching the summit of the world’s highest peak, Mt. Everest (8,848.86m), and Mt. Lhotse (8,516m), the world’s fourth-highest mountain, in a single season. This extraordinary journey follows a shared route through the iconic Khumbu Icefall, Western Cwm, and Lhotse Face, enabling climbers to accomplish two 8,000-meter summits in one continuous push — a feat achieved by only the world’s most elite mountaineers.</p>', '<p data-start=\"1084\" data-end=\"1683\">The Everest–Lhotse Combined Expedition stands among the most ambitious achievements in the world of high-altitude mountaineering. It unites two legendary Himalayan giants into a single, continuous journey: Mt. Everest, rising at 8,848.86 meters as the highest mountain on Earth, and Mt. Lhotse, soaring to 8,516 meters as the fourth-highest peak. With both mountains connected along the same climbing corridor, this expedition offers a remarkable opportunity to scale two iconic 8,000-meter summits in one season, a challenge reserved for only the most skilled and determined climbers on the planet.</p>\r\n<p data-start=\"1685\" data-end=\"2289\">The route to both summits begins with the legendary approach through the Khumbu Icefall, an ever-shifting maze of seracs and crevasses that demands precision and courage. Climbers then move into the vast Western Cwm, one of the most spectacular glacial valleys in the Himalaya, before ascending the imposing Lhotse Face — a steep blue-ice wall that leads toward the South Col at 7,890 meters. This high saddle serves as the crucial junction point where the path to Everest and the path to Lhotse separate. Here, climbers prepare for the final, intense summit pushes that define the Everest–Lhotse double.</p>\r\n<p data-start=\"2291\" data-end=\"3034\">The first summit is typically Everest, a climb that requires mastery of high-altitude strategy, immense stamina, and unwavering mental strength. The final ridge to Everest’s summit offers an unparalleled view of the world below, stretching across the Himalayas toward Tibet, India, and the endless horizon. After descending safely back to the South Col or Camp 3, the second objective stands waiting: Lhotse. While slightly lower in height, Lhotse’s summit route is known for its steep, narrow couloir — a dramatic channel of rock and ice that challenges climbers with exposure, precision footwork, and sustained effort. Reaching the top of Lhotse after already summiting Everest is one of the clearest marks of elite high-altitude capability.</p>\r\n<p data-start=\"3036\" data-end=\"3604\">Beyond the climbing itself, the journey immerses mountaineers in the unparalleled beauty and cultural richness of the Khumbu region. From the Sherpa villages of Namche Bazaar and Tengboche to the towering peaks of Ama Dablam, Nuptse, Cho Oyu, Makalu, and Pumori, every step of the approach adds depth to the experience. The expedition is not only a physical test but also a transformative passage through one of the most inspiring landscapes on Earth, surrounded by centuries-old traditions, Buddhist monasteries, and the warm resilience of the local Sherpa community.</p>\r\n<p data-start=\"3606\" data-end=\"4199\">Completing the Everest–Lhotse combination is far more than a mountaineering accomplishment; it is a defining milestone in a climber’s life. Very few individuals in the world have stood on the summits of both of these giants in one continuous expedition. The achievement reflects discipline, precision, teamwork, and an exceptional level of high-altitude skill. For climbers seeking the ultimate Himalayan challenge — something beyond Everest alone — the Everest–Lhotse double presents an extraordinary opportunity to push personal boundaries and become part of a rare legacy in mountaineering.</p>\r\n<p data-start=\"4201\" data-end=\"4708\">With Summit Solution Treks &amp; Expedition, climbers benefit from experienced high-altitude Sherpa guides, meticulous logistics, and a commitment to safety that ensures the best possible chance of success. The Everest–Lhotse Combined Expedition is a journey into the heart of the Himalayas, offering the chance to write a unique chapter in one’s mountaineering story — a chapter defined by courage, endurance, and the unforgettable achievement of conquering two of the world’s highest peaks in a single season.</p>', '4', NULL, 'everest-lhotse-combo', 189, NULL, NULL, NULL, NULL, 'final-12-MmaWP.jpg', '1759200429_thumnill-YMZF1.jpg', '', 91, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-24 12:45:23', '2026-01-16 20:58:05'),
(234, 'Himlung Himal Expedition', 'A serene yet rewarding ascent into Nepal’s remote valleys.', '32 Days', '7126m', 'Autumn', '5-7 hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Your Gateway to High-Altitude Mountaineering', 'Private vehicle & Air', 2, NULL, 'himlung-kunchanjunga-MdXco.jpg', NULL, '', '<p>The Himlung Himal Expedition is an ideal high-altitude adventure for climbers preparing for future 8,000-meter summits. Rising to 7,126 meters in the remote Nar–Phu Valley, this peak combines approachable technical terrain, stunning Himalayan scenery, and an immersive cultural experience, making it one of Nepal’s most rewarding 7,000-meter climbs.</p>', '<p data-start=\"833\" data-end=\"1436\">The Himlung Himal Expedition stands among Nepal’s most sought-after 7,000-meter climbs, offering an exceptional opportunity for mountaineers who want to transition confidently toward the world of 8,000-meter expeditions. Towering at 7,126 meters and located deep within the secluded Nar–Phu Valley in western Nepal, Himlung delivers the perfect balance of challenge, beauty, and safety. Its strategic position near the Tibetan border and northeast of the Annapurna range places climbers in a landscape defined by rugged cliffs, pristine glaciers, ancient monasteries, and untouched Himalayan wilderness.</p>\r\n<p data-start=\"1438\" data-end=\"2007\">The journey to Himlung Base Camp begins along the famed Annapurna Circuit trail before veering into the isolated Nar–Phu Valley—a hidden world shaped by Tibetan-influenced culture and centuries-old traditions. As climbers progress through the valley, the scenery evolves dramatically from terraced farmland and dense pine forests to wind-sculpted canyons, icy moraines, and sweeping high-altitude desert plateaus. Along the way, views of Kang Guru, Ratna Chuli, Nemjung, and Gyaji Kang create a breathtaking panorama that makes every step of the approach unforgettable.</p>\r\n<p data-start=\"2009\" data-end=\"2649\">Upon reaching Himlung Base Camp at around 4,900 meters, the climbing phase officially begins. Expeditions typically establish three higher camps, gradually ascending through snow slopes, gentle ridgelines, and sections of moderate ice. While the mountain is considered less technical than many other peaks in the 7,000-meter category, it still demands strong physical conditioning, solid mountaineering skills, and the mental resilience required for multi-day climbing at high altitude. This makes Himlung an exceptional training ground for future climbs like Everest, Manaslu, Cho Oyu, and even the world’s most demanding peaks such as K2.</p>\r\n<p data-start=\"2651\" data-end=\"3160\">Since being opened to mountaineers in 1992—followed by the first ascent by a Japanese team that same year—Himlung has earned a reputation for its high summit success rate and its role as a premier preparation peak. Unlike many of Nepal’s busier expedition routes, Himlung offers an environment of solitude and purity. Climbers are fully immersed in remote Himalayan culture, surrounded by immense geological formations and towering snow peaks, far from the crowds and commercialization found in other regions.</p>\r\n<p data-start=\"3162\" data-end=\"3744\">Reaching the summit of Himlung Himal is not simply an achievement of altitude. It is a transformative experience that builds confidence, enhances technical ability, and strengthens a climber’s readiness for the highest mountains on Earth. The expedition creates a rare connection between adventure and cultural immersion, making it one of the most meaningful climbs in the entire Himalaya. For anyone preparing for the next stage of their mountaineering journey, the Himlung Himal Expedition stands as the perfect stepping stone toward the world’s greatest high-altitude challenges.</p>', '3', NULL, 'himlung-himal-expedition', 190, NULL, NULL, NULL, NULL, 'l33-mJpE1.png', '1764057427_himlung-2345-6gW6r.gif', '', 117, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-24 13:12:15', '2026-02-02 05:24:51'),
(235, 'Baruntse Expedition', 'Climb the beautiful pyramid rising between the giants.', '32 Days', '7129m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'A 7,129m Adventure with Summit Solution', 'Private vehicle & Air', 2, NULL, 'buruntse-kunchanjunga-Edo84.jpg', NULL, '', '<p>Experience the ultimate Himalayan adventure with the Baruntse Expedition in Nepal (7,129m / 23,389ft). Nestled between the remote Barun and Hunku Valleys, Baruntse is an ideal 7000-meter peak for climbers preparing for Everest, Makalu, or Lhotse. Navigate the challenging Southeast Ridge, traverse crevasses and steep ice slopes, and immerse yourself in pristine landscapes, Sherpa culture, and high-altitude Himalayan wilderness. With Summit Solution Treks and Expedition’s expert guides and fully supported logistics, Baruntse promises a safe, rewarding, and unforgettable mountaineering journey.</p>', '<p data-start=\"1017\" data-end=\"1719\">Rising dramatically in Nepal’s Mahalangur Himalayan Range, Mt. Baruntse (7,129m / 23,389ft) is one of the country’s most captivating 7000-meter peaks. Often considered a hidden gem among the giants of the Everest and Makalu regions, Baruntse’s symmetrical, snow-covered pyramid is formed by its four distinct ridges and summits. Surrounded by renowned Himalayan peaks like Makalu, Lhotse, Ama Dablam, and Cho Oyu, Baruntse offers climbers a perfect combination of breathtaking beauty, technical challenge, and high-altitude prestige. Its location between the remote Barun and Hunku Valleys ensures a peaceful Himalayan experience far from crowded trails, making it a true adventure in the wilderness.</p>\r\n<p data-start=\"1721\" data-end=\"2279\">Ideal for mountaineers preparing for future 8,000-meter expeditions, Baruntse provides an authentic high-altitude training experience. The classic Southeast Ridge Route, first ascended in 1954 by Sir Edmund Hillary’s New Zealand team, remains the preferred route for modern climbers. The climb requires physical fitness, proficiency with fixed ropes, and confidence on steep snow and ice slopes. Challenging sections include sustained 50-degree gradients, ice cliffs, and exposed ridgelines, giving adventurers the full Himalayan mountaineering experience.</p>\r\n<p data-start=\"2281\" data-end=\"2917\">Climbers progress through three higher camps above Base Camp at 5,300 meters, strategically placed to support acclimatization and summit attempts. The final ascent along the summit ridge rewards climbers with extraordinary panoramic views of Everest, Makalu, Lhotse, and Kanchenjunga. Beyond mountaineering challenges, the approach to Baruntse Base Camp is a cultural and natural journey. Trekking through parts of the Everest trail before branching into the Makalu-Barun National Park and Hunku Valley, adventurers witness untouched alpine landscapes, vibrant biodiversity, traditional Sherpa villages, and centuries-old monasteries.</p>\r\n<p data-start=\"2919\" data-end=\"3456\">Climbing Baruntse demands determination, skill, and resilience. Weather conditions at 7,000 meters can be severe, and technical sections require careful navigation. However, Summit Solution Treks and Expedition ensures climbers are fully supported with experienced Sherpa guides, comprehensive logistics, and tailored acclimatization plans, maximizing both safety and summit success. Baruntse serves as both a stepping stone for future 8,000-meter climbs and a chance to experience one of the Himalayas’ most remote and pristine peaks.</p>\r\n<p data-start=\"3458\" data-end=\"3764\">For adventurers seeking to test their high-altitude skills, immerse themselves in Nepal’s alpine wilderness, and embrace the challenge of a true Himalayan 7000-meter expedition, the Baruntse Expedition with Summit Solution is an unparalleled journey of achievement, discovery, and unforgettable memories.</p>', '3', NULL, 'baruntse-expedition', 191, NULL, NULL, NULL, NULL, 'finall-123-iVlbU.png', '1767350039_1767196583-l34-xu95g-jFAy4.png', '', 74, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-24 13:12:48', '2026-01-16 07:22:33'),
(236, 'Putha Hiunchuli Expedition', 'A high-altitude snow dome perfect for 8000m preparation.', '35 Days', '7246m', 'Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'A Remote 7,000m Himalayan Adventure in the Heart of Western Nepal', 'Private vehicle & Air', 2, NULL, 'putha-himchuli-kunchanjunga-JkdAo.jpg', NULL, '', '<p data-start=\"508\" data-end=\"983\">The Putha Hiunchuli Expedition offers one of the most authentic and rewarding high-altitude experiences in Nepal, rising to 7,246 meters at the western edge of the Dhaulagiri Range. Known as Dhaulagiri VII, this remarkably symmetrical peak combines manageable technical difficulty with true Himalayan wilderness, making it an ideal objective for climbers progressing toward 8,000-meter expeditions and a rising destination for ski mountaineering in the far-western Himalayas.</p>', '<p data-start=\"1035\" data-end=\"1765\">Putha Hiunchuli, also known as Dhaulagiri VII, stands proudly at 7,246 meters as one of Nepal’s most striking and secluded high-altitude peaks. Forming the westernmost extension of the mighty Dhaulagiri Range, this majestic mountain rises in pure isolation, surrounded by the rugged Churen Himal to the east and untouched Himalayan terrain stretching out in every direction. Its elegant shape, four distinct ridges, and sweeping snow slopes give Putha Hiunchuli a beauty and character that set it apart from the more commercialized peaks of central Nepal. For climbers seeking a true Himalayan adventure without the crowds, Putha Hiunchuli delivers an experience defined by purity, remoteness, and authentic mountaineering spirit.</p>\r\n<p data-start=\"1767\" data-end=\"2472\">Beyond its physical allure, Putha Hiunchuli holds deep historical and mountaineering significance. The mountain was first climbed in 1954 by Jimmy Roberts—later celebrated as the “Father of Trekking in Nepal”—alongside Ang Nyima Sherpa. Their ascent via the Northeast Face marked Putha Hiunchuli as one of the earliest explored 7,000-meter peaks in the country. Roberts’ pioneering effort not only introduced this mountain to the international climbing world but also established the foundations of trekking and exploration in Nepal. Today, Putha Hiunchuli continues to attract climbers who appreciate both its mountaineering legacy and its reputation as a stepping stone toward the world’s highest peaks.</p>\r\n<p data-start=\"2474\" data-end=\"3052\">The journey to the mountain is an expedition in itself. After flying into Juphal, climbers begin a trek deep into the wild and culturally rich Dolpo region—an isolated part of Nepal that remains untouched by modern tourism. The approach to German Base Camp winds through remote valleys, ancient villages, alpine meadows, and dramatic landscapes that are far removed from the well-known trails of Everest and Annapurna. Base Camp, situated around 4,910 meters, offers an atmosphere of complete solitude, surrounded by towering ridges, pristine glaciers, and boundless wilderness.</p>\r\n<p data-start=\"3054\" data-end=\"3764\">From Base Camp, the climb follows a series of strategically placed high camps along broad snow and ice slopes. While Putha Hiunchuli is considered less technical than many other 7,000-meter peaks, it still demands endurance, physical fitness, and solid mountaineering ability. Summit day is long and sustained, requiring climbers to ascend steady snow fields that gradually steepen toward the final ridge. The reward at the top is extraordinary—an uninterrupted 360-degree panorama featuring the entire Dhaulagiri Range, the vast Tibetan Plateau, Kanjiroba Himal, Nilgiri, and even the distant silhouettes of Annapurna. Few climbers in the world have seen this view, making the summit experience unforgettable.</p>\r\n<p data-start=\"3766\" data-end=\"4222\">Putha Hiunchuli is gaining increasing attention as Nepal’s premier ski mountaineering peak. Its expansive northern slopes offer ideal terrain for alpine ski descents, attracting adventurers who seek to combine high-altitude climbing with the thrill of skiing in one of the most remote corners of the Himalayas. Whether approached as a traditional climb or a ski expedition, the mountain provides an unmatched blend of adventure, challenge, and exploration.</p>\r\n<p data-start=\"4224\" data-end=\"4682\">What truly sets Putha Hiunchuli apart is the setting—far from busy commercial routes, deep within a land shaped by Tibetan Buddhism, ancient traditions, and untouched natural beauty. The Dolpo region enriches the expedition with cultural immersion, from centuries-old monasteries to high-altitude villages that preserve a way of life rarely seen elsewhere. Every step of the journey feels authentic, wild, and deeply connected to the spirit of the Himalayas.</p>\r\n<p data-start=\"4684\" data-end=\"5135\">Though more accessible than some technical 7,000-meter peaks, Putha Hiunchuli remains a serious expedition requiring determination, acclimatization, and strong guidance. Weather conditions can shift rapidly, and the elevation demands respect. With the professional support of Summit Solution Treks &amp; Expedition—experienced Sherpa climbers, well-organized logistics, and a commitment to safety—climbers gain a strong foundation for a successful ascent.</p>\r\n<p data-start=\"5137\" data-end=\"5607\">For mountaineers seeking a significant high-altitude achievement that bridges the gap between trekking peaks and the world’s 8,000ers, the Putha Hiunchuli Expedition stands as one of Nepal’s most rewarding objectives. It combines wilderness, culture, history, and adventure into one powerful experience—an expedition that leads into the untouched frontiers of the far-west Himalayas, where solitude meets challenge and every ascent becomes a journey of personal triumph.</p>', '3', NULL, 'putha-hiunchuli-expedition', 192, NULL, NULL, NULL, NULL, 'npl-UtD1I.png', '1766548942_npl-xxC1i.png', '', 62, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-24 13:13:22', '2026-01-07 09:00:18'),
(237, 'Mt. Pumori Expedition', 'Climb the Daughter of Everest — steep, striking, iconic.', '34 Days', '7145m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Conquering Pumori: Nepal’s 7,161m Pyramid Peak Adventure', 'Private vehicle & Air', 2, NULL, 'pumori-kunchanjunga-vSOsv.jpg', NULL, '', '<p>Experience the thrill of climbing Mt. Pumori (7,161m / 23,494ft) in Nepal with Summit Solution Treks and Expedition. Known as the “Unmarried Daughter,” Pumori’s iconic pyramid shape dominates the Everest skyline, offering climbers a technical yet rewarding high-altitude challenge. Traverse snow, ice, and exposed ridges while enjoying panoramic views of Everest, Lhotse, Nuptse, Ama Dablam, and Cho Oyu. With expert Sherpa support, strategic acclimatization, and fully managed logistics, the Pumori expedition provides a safe, unforgettable Himalayan adventure.</p>', '<p data-start=\"1008\" data-end=\"1544\">Mt. Pumori, meaning “Unmarried Daughter” in the Sherpa language, is a striking pyramid-shaped peak in the Everest region. Its iconic form dominates the skyline behind Kala Patthar and has made it one of the most recognizable mountains in Nepal. As a 7,161-meter Himalayan peak, Pumori presents a perfect combination of technical climbing challenge and breathtaking natural beauty. Surrounded by Everest, Lhotse, Nuptse, Ama Dablam, and Cho Oyu, it offers climbers both an exhilarating adventure and unforgettable high-altitude vistas.</p>\r\n<p data-start=\"1546\" data-end=\"1962\">The climb primarily follows the Southeast Ridge Route, which includes sections of snow, ice, and exposed terrain. This route demands previous mountaineering experience, strong physical conditioning, and confidence on high-altitude ridges. While challenging, the summit rewards climbers with panoramic views of the Himalayas, creating a visually and physically rewarding expedition that leaves a lasting impression.</p>\r\n<p data-start=\"1964\" data-end=\"2392\">The approach begins with a flight to Lukla, followed by a trek along the classic Everest Base Camp trail. This journey passes through traditional Sherpa villages, ancient monasteries, and the Khumbu Glacier, combining cultural immersion with spectacular scenery. Along the trail, adventurers witness the unique heritage of the Khumbu region and experience the remote Himalayan wilderness, adding depth to the climbing journey.</p>\r\n<p data-start=\"2394\" data-end=\"2844\">Summit Solution Treks and Expedition provides complete support for the climb, including experienced Sherpa guides who offer one-on-one assistance, fixed ropes for technical sections, carefully planned acclimatization schedules, and a fully managed logistics system with permits, high-altitude food, and camp setup. This ensures safety, efficiency, and a higher chance of reaching the summit while allowing climbers to focus on the adventure itself.</p>\r\n<p data-start=\"2846\" data-end=\"3367\">Climbing Mt. Pumori is more than just reaching a peak; it is an immersive Himalayan experience that blends cultural exploration, technical mountaineering, and the thrill of high-altitude achievement. Its exposed ridges, challenging slopes, and breathtaking summit panorama make it a must-do expedition for serious climbers. With Summit Solution Treks and Expedition, adventurers can safely conquer Pumori while enjoying a fully guided and unforgettable journey through one of Nepal’s most spectacular Himalayan regions.</p>', '3', NULL, 'mt-pumori-expedition', 193, NULL, NULL, NULL, NULL, 'pommuri-Tkymn.png', '1744422887_pomuri-egbM5.png', '', 67, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-24 13:13:59', '2026-01-06 01:50:55'),
(240, 'Lobuche Peak Expedition', 'A dramatic climb with world-class views of Everest.', '16 Days', '6119m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Trekking Peak Adventure and Himalayan Summit Experience', 'Private vehicle & Air', 2, NULL, 'lobuche-kunchanjunga-DAFEe.jpg', NULL, '', '<p>Lobuche Peak (6,119m) in Nepal is a premier trekking peak that combines accessibility with high-altitude adventure. Situated near the classic Everest Base Camp trail, Lobuche offers climbers an ideal introduction to Himalayan mountaineering, whether as a standalone summit or as preparation for Everest, Lhotse, or Ama Dablam. Ascend steep snow slopes and ridges with expert Sherpa guidance while enjoying panoramic views of Everest, Lhotse, Nuptse, Ama Dablam, Pumori, and the vast Khumbu Glacier. With Summit Solution Treks and Expedition’s full logistical support and safety-focused approach, Lobuche Peak promises a safe, thrilling, and unforgettable Himalayan journey.</p>', '<p data-start=\"1045\" data-end=\"1603\">Rising proudly above the Khumbu Valley, Lobuche Peak (6,119m) is one of Nepal’s most popular trekking peaks, offering climbers an ideal blend of challenge, accessibility, and high-altitude adventure. Located along the classic Everest Base Camp trail, Lobuche serves both as an excellent acclimatization peak for Everest aspirants and as a rewarding climbing objective for mountaineers seeking their first Himalayan summit. Its dramatic ridges and snow slopes provide a perfect introduction to the technical skills required for higher Himalayan expeditions.</p>\r\n<p data-start=\"1605\" data-end=\"2129\">Lobuche consists of two distinct summits—Lobuche East (6,119m) and Lobuche West (6,145m)—connected by a striking ridge. While Lobuche East is classified as a trekking peak and is more commonly climbed, Lobuche West presents more technical challenges and is considered an expedition peak. The ascent of Lobuche East involves steep snow slopes, ridges, and occasional technical sections, offering a balanced level of difficulty that is suitable for climbers new to Himalayan mountaineering without being excessively extreme.</p>\r\n<p data-start=\"2131\" data-end=\"2456\">From the summit, climbers are rewarded with panoramic vistas of Everest, Lhotse, Nuptse, Ama Dablam, Pumori, and the expansive Khumbu Glacier, providing one of the most spectacular viewpoints in the region. The climb is as visually impressive as it is physically challenging, creating an unforgettable Himalayan experience.</p>\r\n<p data-start=\"2458\" data-end=\"3148\">The expedition typically follows the Normal Route on Lobuche East. The journey begins with a scenic flight to Lukla, followed by trekking through iconic Sherpa villages such as Namche Bazaar, Tengboche, Dingboche, and Lobuche village itself. Base Camp at 4,900 meters provides the starting point for acclimatization and preparation, while High Camp at 5,400 meters serves as the launch site for the summit push. Climbers navigate steep snow slopes and ridgelines, often utilizing fixed ropes for safety. Although categorized as a trekking peak, Lobuche requires familiarity with crampons, ice axe techniques, and rope work, making it a perfect training ground for future technical climbs.</p>\r\n<p data-start=\"3150\" data-end=\"3610\">Summit Solution Treks and Expedition ensures a safe and highly supported experience. Our expert Sherpa guides provide one-on-one instruction, helping climbers gain confidence on technical terrain. Safety-focused logistics, including acclimatization rotations, fixed ropes, and contingency planning, maximize both security and summit success. Small group sizes allow personalized guidance, ensuring climbers receive tailored support throughout the expedition.</p>\r\n<p data-start=\"3612\" data-end=\"4068\">The Lobuche Peak Expedition is more than just a climb—it is a gateway to the greater Himalayas. Whether used as a stepping stone for Everest or undertaken for the sheer thrill of summiting a Himalayan peak, Lobuche combines challenge, adventure, and unmatched scenic reward. Summit Solution Treks and Expedition invites climbers to take on Lobuche Peak and experience a Himalayan journey that opens the door to high-altitude mountaineering like no other.</p>', '2', NULL, 'lobuche-peak-expedition', 200, NULL, NULL, NULL, NULL, 'pz0-dyyxs.png', '1764753335_1300-final-zzrzd.png', '', 93, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-24 13:31:54', '2026-01-10 04:44:54'),
(241, 'Mt. Amadablam Expedition', 'Climb the most beautiful mountain on Earth.', '26 Days', '6812m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Nepal’s Iconic 6,812m Pyramid Peak Challenge', 'Private vehicle & Air', 2, NULL, 'amadambla-kunchanjunga-B0CH3.jpg', NULL, '', '<p>Mt. Ama Dablam (6,812m), famously called the “Matterhorn of the Himalaya”, is one of Nepal’s most iconic and technically challenging peaks. Rising gracefully above the Khumbu Valley, its pyramid-shaped summit, hanging glacier, and exposed ridges demand advanced mountaineering skills and high-altitude experience. With Summit Solution Treks and Expedition’s expert Sherpa guidance, strategic acclimatization, and comprehensive logistics, climbers can safely navigate the Southwest Ridge route while enjoying panoramic views of Everest, Lhotse, Nuptse, Makalu, Cho Oyu, and the majestic Khumbu Valley. Ama Dablam promises a Himalayan journey of skill, challenge, and unforgettable beauty.</p>', '<p data-start=\"1053\" data-end=\"1620\">Known as the “Matterhorn of the Himalaya,” Mt. Ama Dablam (6,812m) stands as one of the most striking and admired peaks in Nepal. Its elegant pyramid shape rises above the Khumbu Valley, with ridges and a hanging glacier—called the Dablam—resembling a mother’s necklace, giving the mountain its name: Ama (mother) and Dablam (ornament). For decades, Ama Dablam has been celebrated not only for its aesthetic appeal but also for its demanding technical challenges, making it a dream climb for experienced mountaineers seeking one of the finest Himalayan expeditions.</p>\r\n<p data-start=\"1622\" data-end=\"2063\">Although not the tallest peak in the region, Ama Dablam’s steep rock faces, exposed ridges, and mixed terrain require advanced mountaineering skills, including proficiency in rock and ice climbing, high-altitude experience, and confidence on exposed sections. The summit offers climbers unparalleled panoramic views of Everest, Lhotse, Nuptse, Makalu, Cho Oyu, and the vast Khumbu Valley, providing a truly rewarding Himalayan perspective.</p>\r\n<p data-start=\"2065\" data-end=\"2811\">The Southwest Ridge, first ascended in 1961, is the classic route and remains the most popular line to the summit. Summit Solution Treks and Expedition follows a carefully planned itinerary with three high camps above Base Camp to optimize acclimatization and ensure climber safety: Base Camp (4,600m) serves as the main staging area, Camp I (5,800m) offers a safe resting point after moderate rock and snow climbing, Camp II (6,200m) includes exposed granite ridges and technical climbing sections, and Camp III (6,400m) is situated just below the hanging glacier “Dablam.” The final summit push demands determination, technical skill, and careful navigation, but the breathtaking Himalayan panorama from the top makes every effort worthwhile.</p>\r\n<p data-start=\"2813\" data-end=\"3251\">Summit Solution Treks and Expedition provides comprehensive support for climbers, including expert Sherpa guides with extensive Ama Dablam experience, 1:1 guidance on technical sections, fixed ropes, acclimatization rotations, and detailed contingency planning. Every aspect of the expedition—permits, logistics, food, tents, and high-altitude equipment—is professionally managed to ensure maximum safety and optimal chances of success.</p>\r\n<p data-start=\"3253\" data-end=\"3622\">Ama Dablam is more than a climb; it is a technical jewel of the Himalaya that combines aesthetic beauty, cultural significance, and challenging terrain. With Summit Solution Treks and Expedition, adventurers can undertake this iconic peak with confidence, experience the thrill of advanced mountaineering, and be rewarded with views and memories that last a lifetime.</p>', '4', NULL, 'mt-amadablam-expedition', 149, NULL, NULL, NULL, NULL, 'a7308360-ama-dablam-banner-kfnZ7.jpg', '1765375456_l2-mmGAG.png', '', 108, 0, '1', '0', 0, NULL, NULL, NULL, '2025-03-24 13:32:31', '2026-01-15 05:43:20');
INSERT INTO `cl_trip_details` (`id`, `trip_title`, `sub_title`, `duration`, `max_altitude`, `best_season`, `walking_per_day`, `group_size`, `accommodation`, `route`, `trip_highlight`, `peak_name`, `trip_type`, `starting_price`, `trip_map`, `trip_video`, `trip_chart`, `trip_excerpt`, `trip_content`, `trip_grade`, `status_text`, `uri`, `ordering`, `trip_code`, `meta_key`, `meta_title`, `meta_description`, `banner`, `thumbnail`, `trip_pdf`, `visiter`, `is_draft`, `status`, `trip_of_the_month`, `video_status`, `start_date`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(243, 'Island Peak Expedition', 'A perfect first Himalayan summit for aspiring alpinists.', '18 Days', '6189m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Conquer Imja Tse and Discover Nepal’s Himalayan Majesty', 'Private vehicle & Air', 2, NULL, 'island-peak-imja-tse-kunchanjunga-9KwIq.jpg', NULL, '', '<p>Island Peak (6,189m), locally known as Imja Tse, is one of Nepal’s most iconic trekking peaks and a gateway to Himalayan mountaineering. Nestled in the heart of Sagarmatha National Park, it offers climbers a thrilling blend of technical challenge, cultural immersion, and breathtaking panoramic views of Everest, Lhotse, Nuptse, Makalu, Baruntse, and Ama Dablam. With Summit Solution Treks and Expedition’s expert Sherpa guidance, structured acclimatization, and full logistical support, Island Peak provides both first-time Himalayan climbers and seasoned adventurers a safe, rewarding, and unforgettable summit experience.</p>', '<p data-start=\"1010\" data-end=\"1752\">Island Peak, known locally as Imja Tse, is one of Nepal’s most recognizable trekking peaks and serves as a premier introduction to Himalayan mountaineering. Named “Island Peak” in 1953 by Eric Shipton for its appearance as a solitary island rising from a sea of ice when viewed from Dingboche, this peak attracts adventurers from around the world. Standing at 6,189 meters in the heart of Sagarmatha National Park, Island Peak is surrounded by some of the world’s highest mountains, including Everest, Lhotse, Nuptse, Makalu, Baruntse, and Ama Dablam. Its approachable route and moderate technical challenges make it a popular choice for first-time Himalayan climbers as well as those seeking acclimatization before attempting higher peaks.</p>\r\n<p data-start=\"1754\" data-end=\"2289\">The expedition begins with a scenic flight to Lukla, followed by trekking through the legendary Everest Base Camp trail. Climbers pass through iconic Sherpa villages such as Namche Bazaar, Tengboche, and Dingboche, allowing gradual acclimatization while exploring the rich culture and stunning landscapes of the Khumbu region. Base Camp at 5,100 meters in the Imja Valley near Chhukung serves as the starting point for acclimatization and technical training, including essential rope skills under the guidance of experienced Sherpas.</p>\r\n<p data-start=\"2291\" data-end=\"2801\">High Camp at 5,600 meters is the launch point for the summit attempt. The final push involves ascending steep rocky slopes, traversing a glacier using crampons, ice axes, and ropes, and overcoming a headwall of fixed rope climbing approximately 100–120 meters to reach the narrow snow-covered summit ridge. While Island Peak is classified as a trekking peak, it requires basic mountaineering skills, making it an ideal training ground for future climbs of higher peaks such as Ama Dablam, Lhotse, or Everest.</p>\r\n<p data-start=\"2803\" data-end=\"3299\">Summit Solution Treks and Expedition provides comprehensive support throughout the journey. Our experienced Sherpa guides, many of whom are Everest veterans, offer one-on-one instruction and technical guidance. Safety-focused logistics, including acclimatization rotations, fixed ropes, and well-planned summit strategies, ensure a secure and well-prepared climb. Small group sizes allow for personalized support, enabling climbers to focus fully on the adventure and skill-building experience.</p>\r\n<p data-start=\"3301\" data-end=\"3857\">The Island Peak Expedition is more than just a climb—it is a personal milestone and an immersion into the culture, landscapes, and challenges of the Himalaya. Whether undertaken as a first Himalayan summit or as preparation for larger peaks, Island Peak provides climbers with confidence, technical skills, and memories that last a lifetime. Summit Solution Treks and Expedition invites adventurers to join this remarkable journey, where culture, high-altitude adventure, and the beauty of Nepal’s mountains come together in one unforgettable experience.</p>', '2', NULL, 'island-peak-expedition', 199, NULL, NULL, NULL, NULL, 'banner-imja-HSKvH.png', '1764064310_imja-9UOu5.png', '', 55, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 07:20:15', '2026-01-10 08:12:57'),
(244, 'Mera Peak Expedition', 'Reach one of Nepal’s highest trekking peaks with confidence.', '17 Days', '6476m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Conquer Nepal’s Highest Trekking Peak with Summit Solution', 'Private vehicle & Air', 2, NULL, 'mera-peak-kunchanjunga-CPOqr.jpg', NULL, '', '<p>Mera Peak (6,476m), the highest trekking peak in Nepal, offers climbers an unparalleled introduction to Himalayan mountaineering. Located in the Mahalangur Himal, just south of Everest, Mera Peak provides sweeping 360-degree views of five of the world’s tallest mountains — Everest, Lhotse, Makalu, Cho Oyu, and Kanchenjunga — along with numerous other Himalayan giants. With Summit Solution Treks and Expedition’s expert Sherpa guidance, strategic acclimatization, and full logistical support, climbers can navigate glaciers, high passes, and summit slopes safely while immersing themselves in Sherpa culture and the breathtaking Himalayan landscape. Mera Peak is a perfect stepping stone for aspiring mountaineers targeting 7,000m and 8,000m peaks.</p>', '<p data-start=\"1124\" data-end=\"1738\">Mera Peak, standing at 6,476 meters, is Nepal’s highest trekking peak and one of the most sought-after climbing objectives in the Himalayas. Located in the Mahalangur section, just south of Mount Everest, it offers climbers sweeping 360-degree panoramas of Everest, Lhotse, Makalu, Cho Oyu, Kanchenjunga, and dozens of other Himalayan giants. First summited on May 20, 1953, by J.O.M. Roberts and Sen Tenzing, Mera Peak has since become a globally recognized introduction to high-altitude climbing, balancing accessibility with the challenges of glacial terrain, high-altitude endurance, and snow-covered slopes.</p>\r\n<p data-start=\"1740\" data-end=\"2283\">The expedition begins with a thrilling mountain flight to Lukla, followed by trekking through picturesque Sherpa villages, lush forests, and high Himalayan passes. The route crosses the Zatrwa La Pass at 4,610 meters, offering incredible views of rolling hills and distant peaks. Base Camp is situated at 5,300 meters on the Mera Glacier, providing climbers with the opportunity to practice essential mountaineering skills such as crampon use, ice axe techniques, and navigating fixed ropes under the guidance of our experienced Sherpa team.</p>\r\n<p data-start=\"2285\" data-end=\"2817\">High Camp at 5,800 meters, located on a rocky outcrop above the glacier, serves as an important acclimatization stop and launch point for the summit push. Summit day begins in the early hours, with climbers traversing glacier terrain, ascending gradually steep snow slopes, and finally reaching the summit ridge. From the top, the unparalleled panoramic view of Everest, Lhotse, Makalu, Cho Oyu, Kanchenjunga, and surrounding peaks creates an unforgettable Himalayan experience that defines the essence of high-altitude adventure.</p>\r\n<p data-start=\"2819\" data-end=\"3302\">Although considered a trekking peak, Mera Peak requires preparation for glacier travel, high-altitude endurance, and basic technical climbing skills. Summit Solution Treks and Expedition provides expert Sherpa guidance, a safe and well-organized itinerary, and fully managed logistics from permits to high-altitude camp setup. Small group sizes ensure personalized attention, allowing climbers to focus on both safety and enjoyment while building confidence for future expeditions.</p>\r\n<p data-start=\"3304\" data-end=\"3820\">The Mera Peak Expedition is more than a climb; it is a transformative Himalayan journey. For first-time Himalayan summiteers, it represents a monumental achievement, while for aspiring mountaineers, it serves as essential training for technical 7,000m and 8,000m peaks. With Summit Solution Treks and Expedition, adventurers can experience Nepal’s highest trekking peak with professional guidance, cultural immersion, and breathtaking Himalayan vistas, making Mera Peak a climb that inspires both skill and wonder.</p>', '2', NULL, 'mera-peak-expedition', 200, NULL, NULL, NULL, NULL, 'bannermera-G6RGK.png', '1764321226_mera-profile-uRDra.png', '', 71, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 07:20:55', '2026-01-10 08:13:20'),
(247, 'Chulu East Expedition', 'Achieve Himalayan heights with a mix of skill and serenity.', '17 Days', '6584m', 'Spring/Autumn', '5-6 Hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Explore Nepal’s Annapurna Region and Summit 6,584m', 'Private vehicle & Air', 2, NULL, '', NULL, '', '<p data-start=\"191\" data-end=\"922\">Chulu East Peak (6,584m) is one of Nepal’s most captivating trekking peaks, offering an ideal mix of adventure, cultural immersion, and stunning Himalayan vistas. Located in the Damodar Himal Range, just north of the Annapurna massif, this frequently climbed peak provides both a technical challenge and an unforgettable high-altitude experience. With Summit Solution Treks and Expedition’s expert Sherpa guidance, structured acclimatization, and complete logistical support, climbers can safely navigate steep ridges, fixed rope sections, and high camp terrain while discovering the rich traditions of the Manang Valley. Chulu East is perfect for trekkers and aspiring mountaineers preparing for future 7,000m and 8,000m climbs.</p>', '<p data-start=\"1102\" data-end=\"1770\">Chulu East Peak, rising to 6,584 meters, is one of Nepal’s most rewarding trekking peaks, offering a harmonious blend of technical climbing, trekking adventure, and cultural exploration. Situated in the Damodar Himal Range, just north of the Annapurna massif, Chulu East is the most frequently climbed peak in the Chulu group. Its challenging ridges, fixed rope sections, and high-altitude terrain attract climbers who seek both adventure and panoramic Himalayan vistas. First summited in 1955 by a German expedition team, Chulu East has remained a favorite among mountaineers aiming to experience Nepal’s high Himalayas without the extremes of more technical peaks.</p>\r\n<p data-start=\"1772\" data-end=\"2455\">The expedition is often combined with the Annapurna Circuit Trek, enhancing the journey with cultural immersion and breathtaking landscapes. Trekkers pass through traditional villages inhabited by Gurungs, Mananges, Thakalis, and Tibetan-influenced communities, gaining insight into centuries-old farming traditions, Buddhist heritage, and Himalayan lifestyles. Along the route, climbers traverse diverse landscapes, from lush pine and rhododendron forests to arid high-altitude deserts sculpted by wind and ice. The trail to Chulu East Base Camp diverges near Ngawal village, eventually leading to High Camp perched on a rugged ridge that sets the stage for the final summit push.</p>\r\n<p data-start=\"2457\" data-end=\"2965\">The climb itself requires good physical fitness and some previous mountaineering experience. The ascent includes steep ridges and approximately 900 meters of fixed rope climbing, challenging yet accessible for trekking peak climbers. From the summit, adventurers are rewarded with sweeping views of Annapurna I (8,091m), Dhaulagiri (8,167m), Manaslu (8,163m), Tilicho Peak (7,134m), Nilgiri, Lamjung Himal, and Chulu West Peak, creating a panoramic Himalayan experience that is both inspiring and humbling.</p>\r\n<p data-start=\"2967\" data-end=\"3506\">Summit Solution Treks and Expedition ensures climbers enjoy a safe, well-organized, and fully supported journey. Our experienced Sherpa guides provide technical instruction, acclimatization guidance, and personal assistance, while logistics including permits, high-altitude food, and camp setup are professionally managed. The combination of cultural exposure, trekking, and technical climbing makes Chulu East a unique Himalayan adventure suitable for both first-time summit seekers and seasoned mountaineers preparing for higher peaks.</p>\r\n<p data-start=\"3508\" data-end=\"3825\">The best time for the Chulu East Expedition is spring (March–May) and autumn (September–November), when skies are clear and weather conditions stable. However, due to the rain shadow effect of the Annapurna range, even monsoon months (June–August) can be suitable for those seeking lush landscapes and fewer crowds.</p>\r\n<p data-start=\"3827\" data-end=\"4161\">Chulu East Peak is more than a climb; it is a journey into the heart of the Himalayas, blending adventure, culture, and nature into a single, unforgettable expedition. Summit Solution Treks and Expedition invites climbers to experience this remarkable Himalayan peak, where every step brings both challenge and awe-inspiring reward.</p>', '2', NULL, 'chulu-east-expedition', 203, NULL, NULL, NULL, NULL, 'banner-final-UAiRO.png', '1764237519_chulo-east-final-1-mOstU.png', '', 71, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 07:27:59', '2026-01-18 19:41:50'),
(248, 'Chulu West Expedition', 'A challenging but rewarding climb in the Annapurna region.', '15 Days', '6419m', 'Spring/Autumn', '5-7 hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Conquer the Annapurna Region’s Hidden Gem', 'Private vehicle & Air', 2, NULL, 'chulu-west-kunchanjunga-Z6oAJ.jpg', NULL, '', '<p>Chulu West Peak (6,419m) is one of Nepal’s most striking trekking peaks, offering a combination of technical climbing, alpine adventure, and cultural immersion in the Annapurna region. Located in the remote Manang Valley within the Damodar Himal, this peak challenges climbers with steep snow slopes, fixed-rope sections, and glacial terrain, while rewarding them with breathtaking panoramas of Annapurna, Dhaulagiri, Manaslu, Tilicho Peak, and beyond. With Summit Solution Treks and Expedition’s expert Sherpa guidance, thorough acclimatization plan, and complete logistical support, climbers can safely experience this Himalayan classic, ideal for both first-time high-altitude adventurers and those preparing for 7,000m and 8,000m expeditions.</p>', '<p data-start=\"1110\" data-end=\"1678\">Chulu West Peak, soaring to 6,419 meters, is a hidden gem in Nepal’s Annapurna region, offering an adventurous and culturally rich trekking peak experience. As the highest summit in the Chulu range, it rises majestically above the Manang Valley, providing panoramic views of Annapurna, Dhaulagiri, Manaslu, Tilicho Peak, and even Tibet’s high plateau. Unlike peaks in the Everest region, Chulu West combines Himalayan challenge with relative seclusion, allowing climbers to experience pristine landscapes, high alpine passes, and ancient Tibetan-influenced villages.</p>\r\n<p data-start=\"1680\" data-end=\"2200\">Although categorized as a trekking peak, Chulu West demands good physical conditioning and prior mountaineering familiarity. The climb involves glacier navigation, snow slopes, and fixed-rope sections that challenge both stamina and technical skill. For many, it serves as an excellent training ground for higher 7,000m and 8,000m peaks while still offering an unforgettable standalone summit experience. First-time high-altitude adventurers and seasoned climbers alike will find the peak both rewarding and inspiring.</p>\r\n<p data-start=\"2202\" data-end=\"2866\">The expedition follows a carefully planned route that combines the Annapurna Circuit Trek with a climb through the Manang Valley. Trekkers pass through terraced farmlands, rhododendron forests, and stark alpine landscapes while experiencing the culture and hospitality of the local Gurung and Manangi communities. Base Camp is established at 4,900 meters in a secluded valley surrounded by glaciers and rugged cliffs, serving as the foundation for acclimatization and preparation. High Camp at 5,500 meters provides a strategic launching point for the summit push along the North-West ridge, where climbers encounter snow and ice slopes with fixed-rope sections.</p>\r\n<p data-start=\"2868\" data-end=\"3294\">Summit day is both physically demanding and technically satisfying. Climbers navigate steep slopes and ridges to reach the sharp, snowy summit, where they are rewarded with a 360-degree panorama of the Annapurna and Dhaulagiri ranges. This combination of challenge, skill, and scenery makes Chulu West an ideal Himalayan adventure, offering the perfect mix of mountaineering training, natural beauty, and cultural immersion.</p>\r\n<p data-start=\"3296\" data-end=\"3684\">Summit Solution Treks and Expedition ensures a safe, well-organized, and fully supported journey. Our experienced Sherpa guides provide expert training in glacier travel, rope handling, and summit safety. We manage all logistics, including permits, high-altitude food, and camp setup, while maintaining small group sizes to provide personal attention and flexible expedition management.</p>\r\n<p data-start=\"3686\" data-end=\"4142\">Chulu West Peak is more than a climb; it is a Himalayan experience that combines adventure, culture, and high-altitude achievement. For climbers seeking to prepare for bigger peaks or simply pursue a remarkable standalone summit, Chulu West offers a challenging yet accessible Himalayan adventure. Summit Solution Treks and Expedition invites adventurers to conquer Chulu West — where the spirit of Annapurna meets the thrill of Himalayan mountaineering.</p>', '2', NULL, 'chulu-west-expedition', 204, NULL, NULL, NULL, NULL, 'a23-wiihr-1HsZF.png', '1767350137_1767198312-a1-oge1d-j7igX.png', '', 65, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 07:28:22', '2026-01-10 04:44:00'),
(250, 'Thorong Peak Expedition', 'Reward your journey to the high vantage point above the world-famous Thorong La.', '16 Days', '6144m', 'Spring/Autumn', '5-7 hours', '1-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'Summit the Annapurna Region’s High-Altitude Gem', 'Private vehicle & Air', 2, NULL, '', NULL, '', '<p>Thorong Peak (6,144m) is one of Nepal’s most accessible yet rewarding trekking peaks, offering climbers the perfect combination of high-altitude adventure, cultural immersion, and Himalayan scenery. Located near the iconic Thorong La Pass in the Annapurna region, this expedition provides a chance to summit a Himalayan 6,000er while exploring Tibetan-influenced villages, ancient monasteries, and the diverse landscapes of the Annapurna Circuit. With Summit Solution Treks and Expedition’s expert Sherpa guidance, acclimatization planning, and complete logistical support, climbers experience a safe, challenging, and unforgettable ascent. Thorong Peak is ideal for first-time high-altitude climbers and those preparing for future 7,000m and 8,000m Himalayan expeditions.</p>', '<p data-start=\"1141\" data-end=\"1661\">Thorong Peak, rising to 6,144 meters, is one of Nepal’s most inviting trekking peaks, offering a unique combination of high-altitude climbing and cultural exploration. Situated near the legendary Thorong La Pass, this peak allows climbers to experience the Annapurna region’s diverse landscapes, from lush valleys and pine forests to arid high-altitude deserts. Unlike some of the busier Himalayan summits, Thorong Peak offers a quieter, more personal adventure, ideal for climbers seeking both challenge and solitude.</p>\r\n<p data-start=\"1663\" data-end=\"2168\">Although less technically demanding than higher 7,000m or 8,000m peaks, Thorong Peak still requires physical endurance and basic mountaineering skills. The ascent involves snow slopes, glacier crossings, and careful navigation near the summit ridge, making it an excellent introduction to Himalayan climbing. For many climbers, this peak serves as a stepping stone for more technical and higher-altitude expeditions, while still providing the thrill and satisfaction of standing atop a Himalayan summit.</p>\r\n<p data-start=\"2170\" data-end=\"2679\">The expedition begins with a trek through the scenic Marsyangdi Valley, passing terraced farmlands, rivers, suspension bridges, and dense forests before entering the high-altitude desert landscapes of Manang. Here, climbers are immersed in Tibetan-influenced culture, visiting monasteries, prayer walls, and stone villages that reflect centuries-old traditions. From Manang, the route ascends toward Thorong High Camp and Base Camp, carefully planned for acclimatization and preparation for the summit push.</p>\r\n<p data-start=\"2681\" data-end=\"3145\">Summit day is both physically rewarding and visually spectacular. Reaching the top of Thorong Peak offers sweeping 360-degree views of the Annapurna massif, Dhaulagiri, Nilgiri, Tilicho Peak, Gangapurna, and surrounding high Himalaya. The solitude and grandeur of this less-crowded peak add to the sense of accomplishment, while the descent passes the sacred Muktinath Temple before continuing toward Jomsom and the Kali Gandaki Gorge, the world’s deepest gorge.</p>\r\n<p data-start=\"3147\" data-end=\"3586\">Summit Solution Treks and Expedition provides a fully supported experience, ensuring safety and comfort throughout the journey. Our experienced Sherpa guides provide one-on-one support, teach essential mountaineering techniques, and manage all logistics, including permits, high-altitude food, and camp setups. Small team sizes allow for personalized attention, ensuring climbers receive guidance tailored to their skills and experience.</p>\r\n<p data-start=\"3588\" data-end=\"4063\">The Thorong Peak Expedition is more than a climb — it is a holistic Himalayan adventure that blends physical challenge, cultural discovery, and breathtaking scenery. For first-time high-altitude climbers and seasoned trekkers alike, Thorong Peak offers a safe, exhilarating, and unforgettable Himalayan experience. Summit Solution Treks and Expedition invites adventurers to conquer Thorong Peak — where the beauty of Annapurna meets the thrill of Himalayan mountaineering.</p>', '2', NULL, 'thorong-peak-expedition', 206, NULL, NULL, NULL, NULL, '', '', '', 38, 0, '0', '0', 0, NULL, NULL, NULL, '2025-04-11 07:30:58', '2026-01-02 06:26:05'),
(253, 'Everest Base Camp Trek With Gokyo Lake', 'A richer and more scenic Everest adventure.', '18 Days', '5545m', 'Spring/Autumn', '5-7 hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'A Stunning Himalayan Journey Across Cho La Pass', 'Private vehicle & Air', 1, NULL, 'gokyo-lake-with-ebc-trek-01-lrzAn.jpg', NULL, '', '<p data-start=\"299\" data-end=\"979\">The Everest Base Camp Trek with Gokyo Lakes via Cho La Pass is one of the most scenic and rewarding journeys in the Himalayas, offering a perfect mix of adventure, culture, and dramatic landscapes. This route links the legendary Everest Base Camp with the serene turquoise lakes of Gokyo, connected by the high and exciting Cho La Pass. From rich Sherpa culture and peaceful monasteries to sweeping mountain views of Everest, Lhotse, Makalu, and Cho Oyu, the trek delivers an experience that goes far beyond a normal trail. Ideal for trekkers seeking a more immersive and visually stunning route in the Khumbu region, this journey captures the very essence of the Nepal Himalaya.</p>', '<p data-start=\"1131\" data-end=\"1589\">The Everest Base Camp Trek with Gokyo Lakes via Cho La Pass is among the most incredible multi-stage adventures Nepal has to offer. It combines two world-famous destinations — the historic Everest Base Camp and the crystal-clear Gokyo Lakes — creating a trail that is as culturally rich as it is visually breathtaking. This route offers trekkers the chance to explore the Khumbu on a deeper level, with every section revealing new layers of Himalayan beauty.</p>\r\n<p data-start=\"1591\" data-end=\"2044\">The journey begins with a short mountain flight to Lukla, the gateway to the Everest region. From here, trekkers follow a path that passes through dense rhododendron forests, yak pastures, suspension bridges, and vibrant Sherpa settlements. Namche Bazaar serves as the first major stop, a lively mountain town where trekkers acclimatize while enjoying traditional Sherpa culture, local bakeries, and stunning views of peaks like Thamserku and Kongde Ri.</p>\r\n<p data-start=\"2046\" data-end=\"2580\">Beyond Namche, the trail leads through Tengboche, home to one of the most important monasteries in the Khumbu. The views of Ama Dablam and Everest along this stretch create a sense of walking through a natural amphitheater of mountains. The landscape then shifts into alpine terrain as the trail approaches Dingboche, Lobuche, and eventually Everest Base Camp. Standing at the foot of the world\'s highest peak is an experience that stays with trekkers for a lifetime, capturing both the history and spirit of Himalayan mountaineering.</p>\r\n<p data-start=\"2582\" data-end=\"3014\">A sunrise ascent of Kala Patthar offers what many consider the most impressive mountain panorama in Nepal. From here, Everest, Lhotse, Nuptse, and numerous nearby peaks appear incredibly close, glowing golden in the early morning light. After exploring the Everest Base Camp side of the region, the journey continues toward the high crossing of Cho La Pass. This section brings excitement, challenge, and unmatched mountain scenery.</p>\r\n<p data-start=\"3016\" data-end=\"3398\">Descending from Cho La reveals an entirely different world — the quiet and pristine Gokyo Valley. The turquoise glacial lakes spread across this valley are among the most beautiful high-altitude sights in the country. A hike to Gokyo Ri provides one of the finest 360-degree viewpoints in the Himalayas, showcasing Everest, Lhotse, Makalu, Cho Oyu, and the massive Ngozumpa Glacier.</p>\r\n<p data-start=\"3400\" data-end=\"3863\">The combination of cultural encounters, varied landscapes, sacred sites, and towering Himalayan giants makes this trek more unique than the standard Everest Base Camp route. From valleys rich in Sherpa heritage to remote high passes and tranquil lakes, the experience captures the raw essence of the Khumbu region. The trek concludes with a scenic flight or helicopter ride back from Lukla, offering final sweeping views of the mountains that defined the journey.</p>\r\n<p data-start=\"3865\" data-end=\"4229\">Summit Solution Treks and Expedition organizes this route with a focus on safety, proper acclimatization, and meaningful cultural experiences. For trekkers seeking a route that offers more variation, more viewpoints, and deeper adventure than the regular trail, the Everest Base Camp and Gokyo Lakes via Cho La Pass trek remains one of the finest options in Nepal.</p>', '2', NULL, 'everest-base-camp-trek-with-gokyo-lake', 209, NULL, NULL, NULL, NULL, 'final-banner-6uTOH.png', '1764563653_final-final-kZ0LW.png', '', 77, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 08:58:35', '2026-01-11 05:08:28'),
(254, 'Everest 3 Passes Trek', 'Conquer the three highest passes of the Khumbu in one epic journey.', '20 Days', '5550m', 'Spring/Autumn', '5-7 hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'The Ultimate High-Altitude Adventure in the Khumbu', 'Private vehicle & Air', 1, NULL, '3-passes-trek-with-ebc-01-qIGU5.jpg', NULL, '', '<p data-start=\"268\" data-end=\"852\">The Everest Three Passes Trek is one of the most comprehensive and adventurous journeys in the Khumbu region, linking Everest Base Camp, the Gokyo Valley, Kala Patthar, and the high passes of Kongma La, Cho La, and Renjo La. This route offers a rare chance to experience every major highlight of the Everest region in one circuit, from remote valleys and massive glaciers to turquoise lakes and sweeping Himalayan panoramas. Designed for trekkers who want a demanding but deeply fulfilling journey, the Three Passes route showcases the full diversity and beauty of the Nepal Himalaya.</p>', '<p data-start=\"998\" data-end=\"1533\">The Everest Three High Passes Trek with Everest Base Camp is widely regarded as the most complete trekking experience in the entire Khumbu region. It brings together the major highlights of the Everest area into one continuous and unforgettable circuit, offering something far more immersive than the standard trails. With three high mountain passes over 5,000 meters, crystal-clear glacial lakes, dramatic valleys, and close-up views of the world’s tallest peaks, this is a journey that captures the very heart of Himalayan adventure.</p>\r\n<p data-start=\"1535\" data-end=\"2089\">The trek begins with the short flight to Lukla, followed by a gradual ascent through the Dudh Koshi Valley. Trekkers pass through Phakding and eventually reach Namche Bazaar, the main cultural and trading center of the Sherpa people. Namche is also the first place where the massive Himalayan skyline becomes visible, featuring Everest, Ama Dablam, and Thamserku towering above the valley. After proper acclimatization in Namche, the trail continues toward Tengboche, a peaceful settlement famous for its monastery surrounded by panoramic mountain views.</p>\r\n<p data-start=\"2091\" data-end=\"2648\">From Tengboche, the landscape shifts to open alpine terrain as the route heads toward Dingboche and the first major challenge of the trek — the Kongma La Pass. Crossing this pass delivers beautiful views of the eastern Himalayas, including Makalu, Lhotse, and snow-covered ridges stretching across the Khumbu. The trail then leads directly to Everest Base Camp, where trekkers stand at the foot of the world’s highest mountain. A climb to Kala Patthar the following morning gives the best sunrise view of Everest, glowing golden above the surrounding peaks.</p>\r\n<p data-start=\"2650\" data-end=\"3138\">The second pass, Cho La, brings the trek into the remote and peaceful Gokyo Valley. This region is known for its chain of turquoise lakes that sit beside the massive Ngozumpa Glacier. A climb to Gokyo Ri offers an unbeatable 360-degree panorama of Everest, Cho Oyu, Makalu, and Lhotse, making it one of the most dramatic viewpoints in Nepal. The third and final pass, Renjo La, is equally impressive, offering a sweeping view of the entire Everest range before the descent toward Lungden.</p>\r\n<p data-start=\"3140\" data-end=\"3655\">The last days of the trek follow a quieter route back to Namche and eventually Lukla, allowing trekkers to reflect on a journey filled with both challenge and beauty. The Three Passes Trek is ideal for experienced trekkers seeking a route that goes beyond Everest Base Camp and covers the full geographical and cultural richness of the region. It offers high-altitude excitement, diverse landscapes, and a deep connection with Sherpa heritage, making it one of the most memorable trekking circuits in the Himalayas.</p>\r\n<p data-start=\"3657\" data-end=\"4006\">Summit Solution Treks and Expedition organizes this demanding route with careful planning, acclimatization-focused itineraries, and experienced guides to ensure safety and an enriching Himalayan experience. For those wanting the most complete and adventurous trail in the Everest region, the Everest Three Passes Trek stands as an unbeatable choice.</p>', '3', NULL, 'everest-3-passes-trek', 210, NULL, NULL, NULL, NULL, '3-pass09-eNbUI.png', '1764566043_3pass12-D4WdJ.png', '', 54, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 09:00:10', '2026-01-05 20:22:07'),
(256, 'Annapurna North Base Camp (North ABC) Trek', 'Explore the lesser-known, wild northern approach to Annapurna I.', '12 Days', '4190m', 'Spring/Autumn', '5-7 hours', '2-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'A Remote Himalayan Adventure to the Foot of Annapurna I', 'Private vehicle & Air', 1, NULL, 'annapurna-north-base-camp-trek-01-h7xR7.jpg', NULL, '', '<p>The Annapurna North Base Camp Trek is a rare and rewarding Himalayan journey that leads trekkers toward the lesser-explored northern face of Annapurna I. This peaceful, off-the-beaten-path adventure blends dramatic landscapes, pristine wilderness, and authentic mountain culture. With professional guidance from Summit Solution Treks &amp; Expedition, trekkers experience a smooth and enriching journey through remote valleys, dense forests, and traditional villages — culminating in the breathtaking amphitheater of Annapurna North Base Camp (4,190m).</p>', '<p data-start=\"900\" data-end=\"1295\">The Annapurna North Base Camp (North ABC) Trek is a remarkable Himalayan journey designed for trekkers who want to experience the lesser-known side of the Annapurna region. Starting from the beautiful city of Pokhara, the trail steadily leads you through remote valleys, traditional settlements, and dense forested paths that showcase the true cultural and natural richness of Nepal’s mountains.</p>\r\n<p data-start=\"1297\" data-end=\"1781\">Unlike the popular southern route, the North Base Camp trail offers a peaceful and secluded trekking experience. This hidden trail allows trekkers to approach the rarely-seen northern face of Annapurna I (8,091 m), the 10th highest mountain in the world. As the route climbs from warm subtropical zones into open alpine terrain, you are rewarded with stunning views of Annapurna I, Machapuchare, Gangapurna, Tent Peak, and the impressive rock formations surrounding the entire region.</p>\r\n<p data-start=\"1783\" data-end=\"2159\">The journey reaches its highest point at Annapurna North Base Camp, located at 4,190 meters. This dramatic location, framed by towering Himalayan walls and a vast glacial environment, provides a sense of isolation and awe that few treks in Nepal can match. The peaceful surroundings and breathtaking landscapes create an unforgettable experience for every trekking enthusiast.</p>\r\n<p data-start=\"2161\" data-end=\"2502\">Classified as a moderate trek, the Annapurna North Base Camp trail is suitable for trekkers with a reasonable fitness level and some previous hiking experience. The ideal seasons for this adventure are spring (March to April) and autumn (September to October), when the weather is clear and stable, offering the best possible mountain views.</p>\r\n<p data-start=\"2504\" data-end=\"2804\">This 12-day journey is perfect for trekkers seeking a short yet highly rewarding Himalayan experience. It blends natural beauty, cultural encounters, and a touch of wilderness exploration, making it one of the most unique and enriching trekking routes offered by Summit Solution Treks and Expedition.</p>', '2', NULL, 'annapurna-north-base-camp-north-abc-trek', 212, NULL, NULL, NULL, NULL, '960-BRnZk.png', '1764515901_north-bW7OK.png', '', 57, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 09:13:16', '2026-01-09 12:12:06'),
(257, 'Dhaulagiri Circuit Trek', 'Circle one of Nepal’s toughest and most rewarding high-altitude circuits.', '16 Days', '5360m', 'Spring/Autumn', '5-7 hours', '2-10 Pax', 'Hotels, Lodges & Tent', 'Ktm/Ktm', 'A Challenging Journey Around the Mighty White Mountain', 'Private Vehicle', 1, NULL, 'dhaulagiri-circuit-trek-01-a7wJ7.jpg', NULL, '', '<p>The Dhaulagiri Circuit Trek with Summit Solution Treks and Expedition offers one of the most powerful and authentic Himalayan journeys for trekkers seeking real challenge and untouched wilderness. This demanding route circles the massive Dhaulagiri range, guiding you through remote valleys, high mountain passes, dramatic glaciers, and landscapes that remain far from mainstream tourism. With towering snow peaks rising in every direction and a true sense of isolation throughout the trail, this trek delivers an adventurous experience that reflects the pure, wild spirit of the Nepal Himalayas.</p>', '<p data-start=\"768\" data-end=\"1203\">The Dhaulagiri Circuit Trek is one of Nepal’s most iconic and demanding high-altitude adventures, taking trekkers on a full circuit around Mt. Dhaulagiri (8,167 m), the seventh-highest mountain in the world. Named after the Sanskrit word for “White Mountain,” Dhaulagiri stands as one of the most striking and formidable peaks in the Himalayas, and this trek offers the rare opportunity to explore its remote and pristine surroundings.</p>\r\n<p data-start=\"1205\" data-end=\"1622\">The journey begins from Beni in the Myagdi district, where the trail passes through traditional villages, terraced farmlands, and dense forests before gradually entering the isolated highlands of the Dhaulagiri region. As you progress deeper into the mountains, the landscape transforms dramatically — from warm river valleys to open alpine meadows and finally to the rugged ice fields that define the high Himalayas.</p>\r\n<p data-start=\"1624\" data-end=\"1912\">One of the major highlights of the trek is reaching Dhaulagiri Base Camp at 4,750 meters, an incredible location surrounded by towering peaks and massive glaciers. From here, trekkers gain a true appreciation of the mountain’s immense scale and the raw power of the Himalayan environment.</p>\r\n<p data-start=\"1914\" data-end=\"2233\">The adventure continues across two of the most dramatic high passes in Nepal — the French Col (5,360 m) and Dhampus Pass (5,200 m). These crossings offer breathtaking panoramic views of Dhaulagiri, Tukuche, Nilgiri, and the entire Annapurna range, creating some of the most unforgettable mountain scenery in the region.</p>\r\n<p data-start=\"2235\" data-end=\"2613\">Because of its high altitude, remote terrain, and technical sections, the Dhaulagiri Circuit Trek is classified as strenuous. It is recommended for trekkers with excellent physical fitness and prior high-altitude trekking experience. However, the rewards are exceptional: complete wilderness, rare solitude, and a sense of real adventure far from Nepal’s busier trekking routes.</p>\r\n<p data-start=\"2615\" data-end=\"2775\">The ideal seasons for this trek are spring (April to May) and autumn (September to October), when weather patterns are stable and the visibility is at its best.</p>\r\n<p data-start=\"2777\" data-end=\"3098\">For those who seek an expedition-style journey filled with challenge, raw beauty, and untouched landscapes, the Dhaulagiri Circuit Trek with Summit Solution Treks and Expedition delivers an unforgettable Himalayan experience — a journey where every step brings you closer to one of the world’s most magnificent mountains.</p>', '3', NULL, 'dhaulagiri-circuit-trek', 213, NULL, NULL, NULL, NULL, 'l33-xFPgU.png', '1765603203_l33-pcFKM.png', '', 43, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 09:13:51', '2026-01-15 17:17:04'),
(258, 'Mardi Himal Trek', 'A short, scenic trek to the foot of Mardi Himal’s sharp ridges.', '10 Days', '4250m', 'Spring/Autumn', '4-5 Hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'A Scenic Himalayan Escape on the Hidden Trails of Mardi Himal', 'Private vehicle & Air', 1, NULL, 'mardi-himal-trek-01-I9Ol8.jpg', NULL, '', '<p>The Mardi Himal Trek with Summit Solution Treks and Expedition is a beautiful short Himalayan journey designed for trekkers who want panoramic mountain views, peaceful trails, and an authentic cultural experience without extreme altitude. Tucked away on the eastern side of the Annapurna region, this route offers quiet forests, dramatic ridge lines, and close-up views of Machhapuchhre and Annapurna that feel almost unreal. Perfect for trekkers of all levels, Mardi Himal delivers the essence of the Himalayas in a compact and scenic adventure.</p>', '<p data-start=\"910\" data-end=\"1296\">The Mardi Himal Trek stands out as one of Nepal’s most rewarding short journeys, offering a serene route that captures the natural beauty and cultural charm of the Annapurna region. While located close to the famous Annapurna Base Camp trail, this path remains peaceful and less traveled, making it a perfect option for trekkers who want quieter trails and uninterrupted mountain views.</p>\r\n<p data-start=\"1298\" data-end=\"1801\">The journey begins in Pokhara, the lakeside city known for its relaxed atmosphere and stunning Himalayan backdrop. From here, the trail leads into dense forests filled with rhododendron, oak, and pine, where the fresh mountain air and gentle sounds of nature create an inviting atmosphere. Gradually, the climb becomes more open as the landscape shifts to alpine ridges, offering impressive views of the Annapurna Range, Dhaulagiri, and the unmistakable silhouette of Machhapuchhre rising sharply ahead.</p>\r\n<p data-start=\"1803\" data-end=\"2262\">Higher up, the trail reaches Low Camp and High Camp, where the scenery becomes even more dramatic. Early morning light paints the peaks in soft gold, and the horizon stretches endlessly across the Himalayan chain. The final push to Mardi Himal Base Camp (4,500 m) rewards trekkers with a breathtaking 360-degree panorama of snow-covered summits, sweeping valleys, and rugged ridgelines. Standing at this viewpoint is often the highlight of the entire journey.</p>\r\n<p data-start=\"2264\" data-end=\"2629\">Along the route, charming Gurung and Magar villages offer a glimpse into traditional mountain life. The teahouses and homestays provide cozy accommodations and warm hospitality, adding cultural depth to the adventure. Despite its moderate difficulty, the trek is suitable for beginners and families, as the distances are manageable and the altitude gain is gradual.</p>\r\n<p data-start=\"2631\" data-end=\"3010\">The best time to trek Mardi Himal is during spring and autumn, when clear skies reveal striking views and the surrounding forests burst into vibrant color. Whether you\'re searching for a short getaway, a first trekking experience, or a peaceful Himalayan escape, the Mardi Himal Trek offers a perfect combination of natural beauty, cultural encounters, and quiet mountain trails.</p>', '2', NULL, 'mardi-himal-trek', 214, NULL, NULL, NULL, NULL, 'mardi-12345-Oamtn.png', '1764519053_8b6f6439-1590-4cf8-a499-8f9f93acf2f4-0yrr7.PNG', '', 61, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 09:17:54', '2026-01-09 18:28:49'),
(259, 'Ghorepani Poon Hill Trek', 'Observe sunrise views that capture the Annapurna and Dhaulagiri ranges.', '8 Days', '3210m', 'Spring/Autumn', '4-5 Hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'A Classic Himalayan Sunrise Journey to Ghorepani and Poon Hill', 'Private Vehicle', 1, NULL, 'ghorepani-poon-hill-01-Nf6Tg.jpg', NULL, '', '<p>The Ghorepani Poon Hill Trek with Summit Solution Treks and Expedition is an ideal short Himalayan adventure for trekkers seeking breathtaking mountain views, rich cultural experiences, and easy accessibility. Known for its unforgettable sunrise over the Annapurna and Dhaulagiri ranges, this scenic route offers vibrant forests, charming villages, and panoramic Himalayan horizons without the challenges of extreme altitude. Perfect for families, beginners, and anyone limited on time, it delivers a complete Himalayan experience in just a few days.</p>', '<p data-start=\"943\" data-end=\"1357\">The Ghorepani Poon Hill Trek is one of Nepal’s most beloved short trekking routes, celebrated for its welcoming trails, picturesque villages, and stunning mountain views. It provides an excellent introduction to the beauty of the Annapurna region, making it a favorite among first-time trekkers, families, and travelers who want a rewarding Himalayan experience without committing to long or strenuous expeditions.</p>\r\n<p data-start=\"1359\" data-end=\"1811\">Beginning from Pokhara, the trail winds through peaceful forests of rhododendron, oak, and bamboo, offering a refreshing escape into nature. As you ascend, the landscape opens into terraced farmlands and traditional Gurung and Magar settlements where the warmth of rural Nepali hospitality adds depth to the journey. The villages of Ulleri, Ghorepani, and Ghandruk provide perfect stops along the way, each offering incredible views and cultural charm.</p>\r\n<p data-start=\"1813\" data-end=\"2196\">The highlight of the trek is the early morning hike to Poon Hill, perched at 3,210 meters. As the sun rises above the Himalayan horizon, the snowy peaks of Dhaulagiri, Annapurna I, Annapurna South, Nilgiri, Tukuche, and Machhapuchhre glow in shades of gold and red. This panoramic spectacle is one of the most iconic sunrise views in Nepal, attracting trekkers from around the world.</p>\r\n<p data-start=\"2198\" data-end=\"2513\">Throughout the journey, you walk through the Annapurna Conservation Area, home to rich biodiversity, vibrant forests, and a variety of birdlife. The trail is well-maintained, and the teahouses along the way offer comfort, delicious meals, and a welcoming environment that makes the trek suitable for all age groups.</p>\r\n<p data-start=\"2515\" data-end=\"2900\">The Ghorepani Poon Hill Trek is graded as easy to moderate, requiring no prior trekking experience. A basic level of fitness is enough to enjoy the daily walks of 4 to 6 hours through hilly terrain. The best seasons to trek are spring and autumn, when clear skies and pleasant temperatures create perfect conditions, though the trek can be organized year-round with proper preparation.</p>\r\n<p data-start=\"2902\" data-end=\"3124\">For those seeking a short yet truly fulfilling Himalayan journey, the Ghorepani Poon Hill Trek offers the perfect blend of scenery, culture, and adventure, making it one of the most accessible and enjoyable treks in Nepal.</p>', '1', NULL, 'ghorepani-poon-hill-trek', 215, NULL, NULL, NULL, NULL, 'final-poon123-gPlWb.png', '1764505792_poonhill1-8NkNg.png', '', 50, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-11 09:19:05', '2026-01-09 12:11:54');
INSERT INTO `cl_trip_details` (`id`, `trip_title`, `sub_title`, `duration`, `max_altitude`, `best_season`, `walking_per_day`, `group_size`, `accommodation`, `route`, `trip_highlight`, `peak_name`, `trip_type`, `starting_price`, `trip_map`, `trip_video`, `trip_chart`, `trip_excerpt`, `trip_content`, `trip_grade`, `status_text`, `uri`, `ordering`, `trip_code`, `meta_key`, `meta_title`, `meta_description`, `banner`, `thumbnail`, `trip_pdf`, `visiter`, `is_draft`, `status`, `trip_of_the_month`, `video_status`, `start_date`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(263, 'Langtang-Gosaikunda-Helambu Trek', 'Combine Langtang’s beauty with the holy Gosaikunda lakes.', '16 Days', '4610m', 'Spring/Autumn', '5-6 Hours', '2-10 Pax', 'Hotels & Lodges', 'Ktm/Ktm', 'Journey Through Sacred Lakes and Hidden Valleys', 'Private Vehicle/Helicopter', 1, NULL, '', NULL, '', '<p data-start=\"367\" data-end=\"1109\">The Langtang–Gosaikunda–Helambu Trek is a beautifully diverse Himalayan journey that brings together serene mountain valleys, sacred alpine lakes, traditional villages, and sweeping high-altitude landscapes. Starting close to Kathmandu yet offering the tranquility of remote trails, this trek provides a perfect mix of natural beauty, cultural immersion, and spiritual significance. From the peaceful forests of Langtang to the holy waters of Gosaikunda and the warm hospitality of Helambu, every step reveals something meaningful and memorable. Summit Solution Treks and Expedition organizes this trek with professional expertise, ensuring trekkers experience the true essence of the Himalayas in a safe, authentic, and deeply rewarding way.</p>', '<p data-start=\"1134\" data-end=\"1725\">The Langtang–Gosaikunda–Helambu Trek is one of Nepal’s most enriching journeys, combining breathtaking scenery, spiritual landmarks, and authentic Himalayan culture. Although it lies close to Kathmandu, the region feels wonderfully remote, allowing trekkers to experience peaceful mountain life and untouched wilderness without venturing far from the capital. Summit Solution Treks and Expedition carefully crafts this trek to provide a smooth balance of adventure, cultural exposure, and comfort, making it suitable for trekkers seeking a meaningful and diverse experience in the Himalayas.</p>\r\n<p data-start=\"1727\" data-end=\"2480\">The journey begins at Syabrubesi, where the trail enters the lush forests of Langtang National Park. Ascending steadily through rhododendron, pine, and bamboo forests, trekkers are welcomed by cascading waterfalls, vibrant wildlife, and the distant silhouettes of snow-capped mountains. As the valley widens, the scenery becomes increasingly dramatic with views of Langtang Lirung, Dorje Lakpa, Ganesh Himal, and other surrounding peaks. The cultural richness of the region becomes evident as you pass through Tamang and Sherpa villages, where the traditions, architecture, and daily lifestyle are deeply influenced by Tibetan Buddhism. Monasteries like Kyanjin Gompa, mani walls, and colorful prayer flags add a peaceful spiritual charm to the journey.</p>\r\n<p data-start=\"2482\" data-end=\"2964\">The highlight of the trek is the sacred Gosaikunda Lake situated at an altitude of 4,380 meters. According to Hindu mythology, the lake was created by Lord Shiva, and it is believed to cleanse the soul and purify the mind. Surrounded by rugged mountains and over a hundred smaller lakes, Gosaikunda is both a natural wonder and a spiritual haven. The reflections of nearby peaks on its still waters create a breathtaking atmosphere that leaves a lasting impression on every visitor.</p>\r\n<p data-start=\"2966\" data-end=\"3446\">From Gosaikunda, the trail climbs to the scenic Laurebina Pass at 4,610 meters. This high point of the trek offers sweeping panoramas of the Langtang, Ganesh Himal, Manaslu, and Annapurna ranges. After crossing the pass, the landscape shifts once again as the trail descends into the peaceful Helambu region. This valley is dotted with traditional Sherpa villages, terraced fields, and ancient monasteries that showcase the quiet, harmonious lifestyle of the mountain communities.</p>\r\n<p data-start=\"3448\" data-end=\"3886\">Throughout the trek, you walk through the diverse ecosystems of Langtang National Park, which is known for its rich biodiversity. Rare species such as the red panda, Himalayan black bear, musk deer, and various bird species inhabit the region, making the journey even more captivating. The changing landscapes—from dense forests and high meadows to rocky passes and sacred lakes—offer one of the most varied trekking experiences in Nepal.</p>\r\n<p data-start=\"3888\" data-end=\"4350\">The Langtang–Gosaikunda–Helambu Trek is ideal for trekkers who want a moderate to challenging journey with a blend of nature, culture, and spirituality. With proper acclimatization and guidance from Summit Solution Treks and Expedition, both experienced trekkers and well-prepared beginners can comfortably complete this trip. The combination of scenic valleys, holy lakes, and culturally rich villages creates a journey that feels complete and deeply memorable.</p>\r\n<p data-start=\"4352\" data-end=\"4730\" data-is-last-node=\"\" data-is-only-node=\"\">Every section of the trek carries its own charm, whether it’s the tranquil beauty of Langtang Valley, the sacred peace of Gosaikunda, the dramatic views from Laurebina Pass, or the gentle warmth of Helambu’s villages. This unforgettable route captures the essence of Nepal’s mountains and offers a meaningful Himalayan experience that stays with you long after the journey ends.</p>', '2', NULL, 'langtanggosaikundahelambu-trek', 219, NULL, NULL, NULL, NULL, 'w44-37WF2.png', '1764947882_w33-oUoz1.png', '', 44, 0, '1', '0', 0, NULL, NULL, NULL, '2025-04-18 09:29:00', '2026-01-14 07:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_faqs`
--

CREATE TABLE `cl_trip_faqs` (
  `id` int(11) NOT NULL,
  `trip_detail_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `ordering` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_faqs`
--

INSERT INTO `cl_trip_faqs` (`id`, `trip_detail_id`, `title`, `content`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(33, 122, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic mission to your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport size photos with you while traveling to Nepal.', 10, 1, '2022-03-27 10:07:34', '2024-07-08 10:03:59'),
(42, 346, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic missions in your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport-size photos with you while traveling to Nepal.', 1, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(43, 122, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by  our team after validating a climber’s attempt to climb a definite peak or a route.', 1, 1, '2022-03-28 03:50:16', '2026-02-02 08:26:20'),
(44, 122, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Conditions” section and the “Travel Insurance” section as well.', 3, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(45, 346, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on the final number of team members.', 4, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(46, 346, 'What is the best time of year to climb Everest?', 'The main climbing season on Mount Everest takes place during the spring when the weather is typically stable and the temperatures are warmer. This is the most popular time to climb the mountain, and it is also when the highest number of summit attempts are made.', 5, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(47, 346, 'What fitness level is required for climbing Everest?', 'Climbing Everest requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit. You should also focus on training at high altitudes, if possible, to get used to the thin air and cold temperatures you will encounter on the mountain.', 6, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(48, 346, 'How difficult is it to climb Everest?', 'Climbing Mt. Everest, the highest mountain in the world, is a physically and mentally challenging endeavor that requires a high level of fitness, experience, and determination. The climb is physically demanding, with steep and rugged terrain, extreme cold, and thin air at high altitudes.', 7, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(49, 346, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 8, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(50, 346, 'Is communication with the home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 9, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(51, 346, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters is provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 10, 1, '2022-03-28 03:50:16', '2023-01-09 10:16:11'),
(62, 352, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic mission to your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport size photos with you while traveling to Nepal.', 1, 1, '2022-03-31 07:12:13', '2022-03-31 07:12:13'),
(63, 352, 'Do I need to apply for my own climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-03-31 07:12:13', '2022-03-31 07:12:13'),
(64, 352, 'Will I need to arrange my own insurance?', 'Yes, insurance is absolutely necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Condition” section and in the “Travel Insurance” section as well.', 3, 1, '2022-03-31 07:12:13', '2022-03-31 07:12:13'),
(65, 352, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. There are other advertised pre-planned trips that already have associated cost details, after communicating we can adjust this cost on the basis of a final number of team members.', 4, 1, '2022-03-31 07:12:13', '2022-03-31 07:12:13'),
(66, 352, 'What fitness level is required for climbing?', 'Climbing requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit.', 5, 1, '2022-03-31 07:12:13', '2022-03-31 07:12:13'),
(67, 352, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 6, 1, '2022-03-31 07:12:13', '2022-03-31 07:12:13'),
(68, 352, 'Is communication with our home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 7, 1, '2022-03-31 07:12:14', '2022-03-31 07:12:14'),
(69, 352, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters are provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 8, 1, '2022-03-31 07:12:14', '2022-03-31 07:12:14'),
(70, 352, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 9, 1, '2022-03-31 07:12:14', '2022-03-31 07:12:14'),
(71, 352, 'What food will be served during the expedition?', 'All king of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 10, 1, '2022-03-31 07:12:14', '2022-03-31 07:12:14'),
(72, 345, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(73, 345, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Condition” section and the “Travel Insurance” section as well.', 3, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(74, 345, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on a final number of team members.', 4, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(75, 345, 'What fitness level is required for climbing?', 'Climbing requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit.', 5, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(76, 345, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 6, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(77, 345, 'Is communication with our home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 7, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(78, 345, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters are provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 8, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(79, 345, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 9, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(80, 345, 'What food will be served during the expedition?', 'All king of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 10, 1, '2022-04-08 06:35:35', '2022-04-08 06:35:35'),
(81, 353, 'How can I get a visa to travel to Pakistan?', NULL, 1, 1, '2022-04-12 04:12:18', '2022-04-12 04:12:18'),
(82, 353, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-04-12 04:12:18', '2022-04-12 04:12:18'),
(83, 353, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Condition” section and the “Travel Insurance” section as well.', 3, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(84, 353, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on a final number of team members.', 4, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(85, 353, 'What fitness level is required for climbing?', 'Climbing requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit.', 5, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(86, 353, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Islamabad, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 6, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(87, 353, 'Is communication with our home country possible while on an expedition?', NULL, 7, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(88, 353, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters are provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 8, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(89, 353, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 9, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(90, 353, 'What food will be served during the expedition?', 'All king of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 10, 1, '2022-04-12 04:12:19', '2022-04-12 04:12:19'),
(91, 358, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic missions in your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport-size photos with you while traveling to Nepal.', 1, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(92, 358, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-04-12 04:31:59', '2022-04-12 04:31:59'),
(93, 358, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Conditions” section and the “Travel Insurance” section as well.', 3, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(94, 358, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on the final number of team members.', 4, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(95, 358, 'What is the best time of year to climb Lhotse?', 'The main climbing season on Mt. Lhotse takes place during the spring when the weather is typically stable and the temperatures are warmer. This is the most popular time to climb the mountain, and it is also when the highest number of summit attempts are made.', 5, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(96, 358, 'What fitness level is required for climbing Lhotse?', 'Climbing Lhotse requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit. You should also focus on training at high altitudes, if possible, to get used to the thin air and cold temperatures you will encounter on the mountain.', 6, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(97, 358, 'How difficult is it to climb Lhotse?', 'Climbing Lhotse requires a high level of physical fitness, technical climbing skills, and mental fortitude. Mt. Lhotse is considered to be a difficult mountain to climb due to its high elevation, technical climbing routes, and challenging weather conditions.', 7, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(98, 358, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 8, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(99, 358, 'Is communication with the home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 9, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(100, 358, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters is provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 10, 1, '2022-04-12 04:31:59', '2023-01-10 03:46:41'),
(101, 357, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic missions in your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport-size photos with you while traveling to Nepal.', 1, 1, '2022-04-12 04:50:29', '2023-01-02 04:47:40'),
(102, 357, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-04-12 04:50:29', '2022-04-12 04:50:29'),
(103, 357, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Conditions” section and the “Travel Insurance” section as well.', 3, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(104, 357, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on the final number of team members.', 4, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(105, 357, 'What is the best time of year to climb Kangchenjunga?', 'The best time of year to climb Kangchenjunga depends on a variety of factors, including the weather, the condition of the mountain, and the goals of the expedition. Typically, the climbing season on Kangchenjunga runs from April to June, when the weather is relatively stable and the snow is firm. This is the time when most expeditions take place, as the conditions are generally more favorable for climbing.', 5, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(106, 357, 'What fitness level is required for climbing Kangchenjunga?', 'Climbing Kangchenjunga is a physically and mentally demanding activity that requires a high level of fitness. The mountain is located at a high altitude, and the thin air at high elevations can be challenging for even the most experienced climbers. In addition, the climb involves steep and icy slopes, which require physical strength and endurance to navigate.', 6, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(107, 357, 'How difficult is it to climb Kangchenjunga?', 'Kangchenjunga is a challenging mountain to climb, and it is considered to be one of the more difficult 8,000-meter peaks in the Himalayas. The climb involves a long and strenuous approach through rugged and remote terrain, followed by a series of technical ascents up steep and icy slopes.', 7, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(108, 357, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 8, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(109, 357, 'Is communication with the home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 9, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(110, 357, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters is provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 10, 1, '2022-04-12 04:50:29', '2023-01-02 04:59:45'),
(111, 359, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic missions in your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport-size photos with you while traveling to Nepal.', 1, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(112, 359, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-04-12 05:24:27', '2022-04-12 05:24:27'),
(113, 359, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Conditions” section and the “Travel Insurance” section as well.', 3, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(114, 359, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on the final number of team members.', 4, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(115, 359, 'What is the best time of year to climb Makalu?', 'The best time of year to climb Makalu depends on a variety of factors, including the weather, the condition of the mountain, and the goals of the expedition. Typically, the climbing season on Kangchenjunga runs from April to May, when the weather is relatively stable and the snow is firm. This is the time when most expeditions take place, as the conditions are generally more favorable for climbing.', 5, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(116, 359, 'What fitness level is required for climbing Makalu?', 'Climbing Makalu is a physically demanding activity that requires a high level of physical fitness. Climbers need to be in good physical condition, as the climb involves long days of physical exertion at high altitudes, where the air is thin and there is less oxygen available to sustain the body.', 6, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(117, 359, 'How difficult is it to climb Makalu?', 'Makalu is considered to be a difficult mountain to climb due to its high elevation, technical climbing routes, and challenging weather conditions. The mountain is located in the Himalayas, which are known for their extreme altitude and harsh weather, and the Northeast Ridge route to the summit of Makalu is steep and technical.', 7, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(118, 359, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 8, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(119, 359, 'Is communication with the home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 9, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(120, 359, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters is provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 10, 1, '2022-04-12 05:24:27', '2023-01-10 04:22:26'),
(121, 361, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic missions in your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport-size photos with you while traveling to Nepal.', 1, 1, '2022-04-12 07:40:05', '2023-02-09 06:23:00'),
(122, 361, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-04-12 07:40:05', '2022-04-12 07:40:05'),
(123, 361, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Conditions” section and the “Travel Insurance” section as well.', 3, 1, '2022-04-12 07:40:05', '2023-02-09 06:23:00'),
(124, 361, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on a final number of team members.', 4, 1, '2022-04-12 07:40:05', '2022-04-12 07:40:05'),
(125, 361, 'What is the best time of year to climb Dhaulagiri?', 'The best time of year to climb Dhaulagiri depends on several factors, including the weather, the route, and the individual preferences and goals of the climbers. In general, the climbing season on Dhaulagiri is during spring and autumn, when the weather is the most stable. During the spring season (April and May), the weather is generally dry and clear, with moderate temperatures and low winds. This is a good time to climb the mountain, as the snow conditions are usually good and the visibility is excellent. The autumn season (September and October) is also a good time to climb Dhaulagiri, as the weather is generally dry and stable. However, the temperatures can be colder and the winds may be stronger during this time of year.', 5, 1, '2022-04-12 07:40:05', '2023-02-09 06:23:00'),
(126, 361, 'What fitness level is required for climbing Dhaulagiri?', 'Climbing Dhaulagiri is a physically and mentally demanding activity that requires a high level of fitness. The mountain is located at a high altitude, and the thin air at high elevations can be challenging for even the most experienced climbers. In addition, the climb involves steep and icy slopes, which require physical strength and endurance to navigate.', 6, 1, '2022-04-12 07:40:05', '2023-02-09 06:23:00'),
(127, 361, 'How difficult is it to climb Dhaulagiri?', 'Dhaulagiri is considered a challenging mountain to climb due to several factors. These include its high altitude, steep and icy slopes, and unpredictable weather conditions. The mountain is also located in a remote and relatively inaccessible part of Nepal, which can add to the logistical challenges of the climb.', 7, 1, '2022-04-12 07:40:05', '2023-02-09 06:23:00'),
(128, 361, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 8, 1, '2022-04-12 07:40:05', '2023-02-09 06:23:00'),
(129, 361, 'Is communication with the home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 9, 1, '2022-04-12 07:40:05', '2023-02-09 06:23:00'),
(130, 361, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters is provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 10, 1, '2022-04-12 07:40:06', '2023-02-09 06:23:00'),
(131, 411, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic mission to your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport size photos with you while traveling to Nepal.', 1, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(132, 411, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(133, 411, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Condition” section and the “Travel Insurance” section as well.', 3, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(134, 411, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on a final number of team members.', 4, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(135, 411, 'What fitness level is required for climbing?', 'Climbing requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit.', 5, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(136, 411, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 6, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(137, 411, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters are provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 8, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(138, 411, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 9, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(139, 411, 'What food will be served during the expedition?', 'All king of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 10, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(140, 411, 'Is communication with our home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 7, 1, '2022-06-03 07:24:55', '2022-06-03 07:24:55'),
(141, 362, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic mission to your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport size photos with you while traveling to Nepal.', 1, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(142, 362, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(143, 362, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Condition” section and the “Travel Insurance” section as well.', 3, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(144, 362, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on a final number of team members.', 4, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(145, 362, 'What fitness level is required for climbing?', 'Climbing requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit.', 5, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(146, 362, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 6, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(147, 362, 'Is communication with our home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 7, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(148, 362, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters are provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 8, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(149, 362, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 9, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(150, 362, 'What food will be served during the expedition?', 'All king of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 10, 1, '2022-06-03 09:11:34', '2022-06-03 09:11:34'),
(151, 365, 'How can I get a visa to travel to Nepal?', 'You will need a valid visa to travel to Nepal. You can get a “VISA” to Nepal through the embassy or other diplomatic missions in your country. You can also get a visa at the entry points to Nepal or at the airport. Please make sure that the passport is valid till the expedition ends. You will also be responsible for any kind of visa requirements. And also, do not forget to carry some passport-size photos with you while traveling to Nepal.', 1, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(152, 365, 'Do I need to apply for my climbing permits?', 'No. All the permits will be arranged by the Seven Summit Treks team after validating a climber’s attempt to climb a definite peak or a route.', 2, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(153, 365, 'Will I need to arrange my insurance?', 'Yes, insurance is necessary for all our expeditions and trekking. You are responsible for getting the proper insurance for the trip. Please make sure your policy covers medical as well as rescue evacuation costs. You can find more details about insurance in the “Terms & Conditions” section and the “Travel Insurance” section as well.', 3, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(154, 365, 'How much does it cost for guiding services?', 'After you submit an inquiry through email, we will work closely with you to understand the objective and provide you with an estimated cost for the service you require. Other advertised pre-planned trips already have associated cost details, after communicating we can adjust this cost based on the final number of team members.', 4, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(155, 365, 'What is the best time of year to climb Annapurna-I?', 'The best time to climb Annapurna-I is during the spring season. The expedition normally starts in the 2nd week of March. It is the best season that offers the best weather conditions, with clear skies and relatively stable weather.', 5, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(156, 365, 'What fitness level is required for climbing Annapurna-I?', 'Climbing Annapurna-I requires certain preparation. Due to the nature of the landscapes within high-altitude environments, you need relevant experience, a high level of physical fitness, technical skills, and mental grit.', 6, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(157, 365, 'How difficult is it to climb Annapurna-I?', 'Annapurna-I is considered one of the most difficult and dangerous mountains to climb, with a high fatality rate. The routes are steep and exposed, and the weather in the Himalayas can be unpredictable. It requires a high level of skill and experience to successfully reach the summit, and it is not a mountain to be taken lightly.', 7, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(158, 365, 'What will be the condition of accommodation while climbing?', 'All accommodations are included throughout the trip. Before you reach a base camp, you will be staying in a hotel in a city like Kathmandu, and while traveling through more remote areas we always choose the highest quality lodge and tea house available. At base camp, our accommodation is also of the highest quality and comfort according to the program we tailored for you.', 8, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(159, 365, 'Is communication with the home country possible while on an expedition?', 'Most sections of the trekking routes have mobile coverage. At base camp, we will provide you with full facilities, including Wi-Fi, VHF, or satellite phones which are available throughout the expedition for emergency or common use.', 9, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(160, 365, 'What equipment will be provided during the expedition?', 'All communal equipment that includes high-quality ropes, tents, stoves, and heaters is provided. You will be responsible for your equipment like clothing, crampons, harness, helmet, etc. a list of full essentials that are required for the expedition will be provided upon request during the time of booking.', 10, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(161, 365, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 11, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(162, 365, 'What food will be served during the expedition?', 'All kind of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 12, 1, '2022-12-23 07:45:33', '2022-12-23 07:45:33'),
(163, 365, 'How long does it take to climb Annapurna I?', 'The length of time it takes to climb Annapurna I will depend on several factors, including the route being taken, the climber\'s experience and ability, and the weather conditions. A typical expedition to the summit of Annapurna I can take anywhere from five to six weeks.', 13, 1, '2022-12-23 07:45:33', '2022-12-23 07:51:19'),
(164, 357, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 11, 1, '2023-01-02 04:59:45', '2023-01-02 04:59:45'),
(165, 357, 'What food will be served during the expedition?', 'All kind of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 12, 1, '2023-01-02 04:59:45', '2023-01-02 04:59:45'),
(166, 357, 'How long does it take to climb Kangchenjunga?', 'The length of time it takes to climb Kangchenjunga will depend on several factors, including the route being taken, the climber\'s experience and ability, and the weather conditions. A typical expedition to the summit of Kangchenjunga can take anywhere from six to seven weeks.', 13, 1, '2023-01-02 04:59:45', '2023-01-02 04:59:45'),
(167, 346, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 11, 1, '2023-01-09 10:16:11', '2023-01-09 10:16:11'),
(168, 346, 'What food will be served during the expedition?', 'All kind of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 12, 1, '2023-01-09 10:16:11', '2023-01-09 10:16:11'),
(169, 346, 'How long does it take to climb Everest?', 'The length of time it takes to climb Everest will depend on several factors, including the route being taken, the climber\'s experience and ability, and the weather conditions. A typical expedition to the summit of Everest can take anywhere from seven to eight weeks.', 13, 1, '2023-01-09 10:16:11', '2023-01-09 10:16:11'),
(170, 358, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 11, 1, '2023-01-10 03:46:41', '2023-01-10 03:46:41'),
(171, 358, 'What food will be served during the expedition?', 'All kind of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 12, 1, '2023-01-10 03:46:41', '2023-01-10 03:46:41'),
(172, 358, 'How long does it take to climb Lhotse?', 'The length of time it takes to climb Lhotse will depend on several factors, including the route being taken, the climber\'s experience and ability, and the weather conditions. A typical expedition to the summit of Lhotse can take anywhere from seven to eight weeks.', 13, 1, '2023-01-10 03:46:41', '2023-01-10 03:46:41'),
(173, 359, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 11, 1, '2023-01-10 04:22:26', '2023-01-10 04:22:26'),
(174, 359, 'What food will be served during the expedition?', 'All kind of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 12, 1, '2023-01-10 04:22:26', '2023-01-10 04:22:26'),
(175, 359, 'How long does it take to climb Makalu?', 'The length of time it takes to climb Makalu will depend on several factors, including the route being taken, the climber\'s experience and ability, and the weather conditions. A typical expedition to the summit of Makalu can take anywhere from six to seven weeks.', 13, 1, '2023-01-10 04:22:26', '2023-01-10 04:22:26');
INSERT INTO `cl_trip_faqs` (`id`, `trip_detail_id`, `title`, `content`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(176, 361, 'Will the expedition cost include travel?', 'All domestic transport costs that are mentioned in the itinerary will be provided. This excludes international flights to and from the destination country. It is your responsibility to manage these details according to the itinerary.', 11, 1, '2023-02-09 06:23:00', '2023-02-09 06:23:00'),
(177, 361, 'What food will be served during the expedition?', 'All kind of meals is served during our expedition by our professional chefs at base camp and on the higher camps.', 12, 1, '2023-02-09 06:23:00', '2023-02-09 06:23:00'),
(178, 361, 'How long does it take to climb Dhaulagiri?', 'The length of time it takes to climb Dhaulagiri will depend on several factors, including the route being taken, the climber\'s experience and ability, and the weather conditions. A typical expedition to the summit of Dhaulagiri can take anywhere from seven to eight weeks.', 13, 1, '2023-02-09 06:23:00', '2023-02-09 06:23:00'),
(179, 164, 'What is the best time for EBC Trek ?', 'The most popular months for trekking in the Everest region are March, April, May, October and November, as these months are when the conditions are at their best. The spring and the autumn tend to offer reasonable temperatures, clear skies, little-to-no rain, and less chance of problematic snowfall.', 1, 1, '2024-08-23 17:01:38', '2024-08-23 17:01:38'),
(180, 164, 'Is Everest Base Camp trek worth it?', 'The Everest region is a beautiful place to visit and a trek to Everest Base Camp is an ambition for many trekkers. Trekking to the base of the world’s highest mountain is a fantastic achievement and it is well worth the effort. Most people think the positives outweigh the drawback of walking on busier trails', 2, 1, '2024-08-23 17:01:38', '2024-08-23 17:01:38'),
(181, 164, 'Training for EBC Trek ?', 'Most people will benefit from aerobic conditioning and strength endurance for Everest Base Camp. Although the trek is typically slow and steady, you will be trekking 5-8 hours per day and gaining on average 300m (1000 ft) in elevation each day', 3, 1, '2024-08-23 17:01:38', '2024-08-23 17:01:38'),
(182, 164, 'How difficult is Everest Base Camp Trek Trek ?', 'Trekking to Everest Base Camp is an adventure of a lifetime. This trek can be a life-changing experience for many people.  The difficulty level of the Everest Base Camp is moderate. The trekking time often requires two weeks. Even though the EBC Trek requires no prior trekking expertise, it is suggested that the trekker should be determined and be physically fit.  Altitude is by far the most challenging aspect of the trek and is what makes it more difficult than your average trek of the same length', 4, 1, '2024-08-23 17:01:38', '2024-08-23 17:01:38'),
(183, 165, 'When is the best time to do the trek?', 'The best times for the Annapurna Base Camp trek are during the spring (March to May) and autumn (September to November) seasons. These months offer clear skies, mild temperatures, and stunning views.', NULL, 1, '2024-08-23 17:32:31', '2024-09-11 14:49:54'),
(184, 165, 'What is the level of difficulty for the trek?', 'The Annapurna Base Camp Trek is considered to be of moderate difficulty. It involves some steep ascents and descents, but it doesn’t require technical climbing skills. Basic fitness and prior trekking experience are recommended.', NULL, 1, '2024-08-23 17:32:31', '2024-09-11 14:49:54'),
(185, 131, 'What is the best time for EBC Trek?', 'The most popular months for trekking in the Everest region are March, April, May, October and November, as these months are when the conditions are at their best. The spring and the autumn tend to offer reasonable temperatures, clear skies, little-to-no rain, and less chance of problematic snowfall.', NULL, 1, '2024-08-23 21:09:40', '2024-09-09 15:55:28'),
(187, 167, 'How difficult is Mardi Himal trek?', 'Mardi Himal trek is rate easy because it is one of the shorter treks and the path does not take you to difficult places but beginner trekkers do rate it as a medium difficult level trek. Exhausting long walks and uphill climbs make it medium level trek for beginners. Each day you walk around 5 to 6 hours on the foothills of Mardi Himal.', 1, 1, '2024-08-26 16:42:07', '2024-08-26 16:42:07'),
(188, 167, 'How long is Mardi Himal trek?', 'The total distance of Mardi Himal Trek is 41 km. The path follow from Kande to Australian Camp, Pothana, Deurali, Forest Camp, Badal Danda(Middle Camp), High Camp And finally Mardi HImal Base Camp then back to Low camp to Siding Village and drive to Pokhara.', 2, 1, '2024-08-26 16:42:07', '2024-08-26 16:42:07'),
(189, 167, 'How many days do we need for Mardi Himal trek?', 'This trek can be done within 4 days to 10 days. If you have short time period you can make the shortest (4 days) but you need to fly in and Fly out to Pokhara to Kathmandu. It can save your 2 days’ time. If you have more than a week’s time then you can take a bus to Pokhara for your trip and you can extend your trekking to Annapurna Base Camp or Annapurna Sunrise (Punhill Trek )  Taking Kathmandu to Pokhara and Pokhara to Kathmandu flights to start the trek on the same day is ideal for those who has holidays of less than a week. For customization for the tri  let us know your preference', 3, 1, '2024-08-26 16:42:07', '2024-08-26 16:42:07'),
(190, 138, 'What is the best time to climb Mera Peak?', 'We recommend climbing Mera Peak in late April, May, late September, October, and November. We find that when we climb on Mera Peak, generally the best months are May and October. If you decide to climb in late March, early April or late October into November, you need to be ready for colder conditions.', NULL, 1, '2024-08-26 18:20:10', '2024-08-26 18:20:10'),
(191, 138, 'How difficult is Mera Peak', 'Climbing Mera peak itself is not very technical and doesn’t consist of a steep technical climb but the high altitude reaching 6461m at the summit makes this a challenging climb. Unlike other trekking peaks in Nepal, the climb to Mera peak is straightforward.', NULL, 1, '2024-08-26 18:20:10', '2024-08-26 18:20:10'),
(192, 138, 'What preparation is required for Mera Peak Ski', 'FITNESS Climbers must be in excellent physical shape to join this expedition. This is perhaps the most important aspect of high altitude climbing, and cannot be stressed enough. Regular, challenging exercise for many months in advance of departure is the only way to gain the necessary level of fitness that is needed on big peaks. We highly recommend a structured training regime with a gym or personal trainer to assist you in preparing for climbing at altitude. Please contact us for more information on physical training.  TECHNICAL EXPERIENCE Skiers must be competent on a variety of terrain and snow conditions. Skiers must be able to link turns in steep terrain (up to 45 degrees) while maintaining control. Skiers must also have basic snow climbing experience including use of ice axe and crampons.  ALTITUDE EXPERIENCE It is required that climbers have prior experience at altitudes up to 14,000′ and it is strongly recommended that climbers have prior experience at altitudes over 15,000′', NULL, 1, '2024-08-26 18:20:10', '2024-08-26 18:20:10'),
(194, 168, 'What is the Everest Panorama Trek?', 'The Everest Panorama Trek is a short and scenic trek in the Everest region of Nepal that offers stunning views of Mount Everest and other Himalayan peaks. This trek is ideal for those who want to experience the beauty of the Everest region without committing to a longer and more challenging trek.', 1, 1, '2024-08-27 15:06:47', '2024-08-27 15:06:47'),
(195, 168, 'What is the best time to go on the Everest Panorama Trek?', 'The best time to embark on the Everest Panorama Trek is during the spring (March to May) and autumn (September to November) seasons. These months offer clear skies, mild temperatures, and the best views of the Himalayan peaks.', 2, 1, '2024-08-27 15:06:47', '2024-08-27 15:06:47'),
(196, 168, 'What is the Everest Panorama Trek?', 'The Everest Panorama Trek is a short and scenic trek in the Everest region of Nepal that offers stunning views of Mount Everest and other Himalayan peaks. This trek is ideal for those who want to experience the beauty of the Everest region without committing to a longer and more challenging trek.', 1, 1, '2024-08-27 15:06:47', '2024-08-27 15:06:47'),
(197, 168, 'What is the best time to go on the Everest Panorama Trek?', 'The best time to embark on the Everest Panorama Trek is during the spring (March to May) and autumn (September to November) seasons. These months offer clear skies, mild temperatures, and the best views of the Himalayan peaks.', 2, 1, '2024-08-27 15:06:47', '2024-08-27 15:06:47'),
(198, 171, 'How hard is Gokyo Trek ?', 'The Gokyo lake trek is moderately difficult. You need to be in good shape and stamina for this trek as it requires walking about 5 to 6 hours, excluding the acclimation days. The rugged trails, steep terrains, and high passes prove to be more burdensome.', 1, 1, '2024-08-27 15:32:03', '2024-08-27 15:32:03'),
(199, 171, 'What is the best time for Gokyo Valley Trek ?', 'October and November or April and May are widely considered to be the best times for this trekking. The weather during these two seasons is generally clear and dry, and so it’s not too cold when heading into high altitudes.', 2, 1, '2024-08-27 15:32:03', '2024-08-27 15:32:03'),
(200, 172, 'What is the best time to for this Trek ?', 'The best time for the Everest Luxury  Trek is in the pre-monsoon season, i.e., from March to May, and the post-monsoon season, i.e., from late September to December. It is also possible to do this trek in February and early September but the trek is best preferred during the above months.', 1, 1, '2024-08-27 18:14:23', '2024-08-27 18:14:23'),
(201, 173, 'What is the best time to for this Trek ?', 'The best time for the Everest Luxury  Trek is in the pre-monsoon season, i.e., from March to May, and the post-monsoon season, i.e., from late September to December. It is also possible to do this trek in February and early September but the trek is best preferred during the above months.', 1, 1, '2024-08-27 18:16:07', '2024-08-27 18:16:07'),
(202, 174, 'What is the best time to for this Trek ?', 'The best time for the Everest Luxury  Trek is in the pre-monsoon season, i.e., from March to May, and the post-monsoon season, i.e., from late September to December. It is also possible to do this trek in February and early September but the trek is best preferred during the above months.', 1, 1, '2024-08-27 18:17:11', '2024-08-27 18:17:11'),
(203, 174, 'How difficult is Everest Luxury Trek ?', 'Everest Luxury Trek is considered challenging due to high altitudes. The trail is relatively easier following good paths and yak trails but due to the increasing altitude, it’s graded challenging. The trek reaches a maximum elevation of 5545m/18,193ft at Kalapathar with a maximum overnight elevation of 5140m/16,865ft at Gorekshep.  Please be prepared to walk for 6-7 hrs every day on average carrying your backpack, which will consist of your valuable items, water, extra fleece, snacks, etc. The trek is challenging and it is a longer trek reaching up to an elevation of 5500m where some of the famous mountaineering Base Camps are located and you need to sleep at an elevation of 5000m+ for 1 night at Gorekshep', 2, 1, '2024-08-27 18:32:22', '2024-08-27 18:32:22'),
(204, 174, 'How do i train for the trek ?', 'Everest Base Camp Trek is a premier trek that most ardent backpackers, hikers, and lovers of wild places aspire to. The trek is graded challenging and training yourself well ahead will definitely improve your performance during the trek. Answering this question can be a challenge because everyone is starting from a different base of fitness, age, lifestyle, and diet (what you eat on a daily basis).  Always consult with your doctor first to establish if you are healthy enough for the challenges of all-day trekking at high elevation for over a week. Once cleared for takeoff, so to speak, consulting with a qualified trainer, and a nutritionist may also prove beneficial, though many do not.', 3, 1, '2024-08-27 18:32:22', '2024-08-27 18:32:22'),
(205, 180, 'what is the best time for this trek ?', 'Regarding the best time, the spring months of March, April, and May along with the autumn months of September, October, and November are peak times.', 1, 1, '2024-08-28 17:48:08', '2024-08-28 17:48:08'),
(206, 180, 'How difficult is Annapurna Balcony Trek ?', 'Annapurna Balcony trekking is a moderately graded trekking adventure suitable for first-timers to all those travel lovers looking forward to experiencing active journeys in Nepal. No particular difficulties on this trek apart from the stone staircase,', 2, 1, '2024-08-28 17:48:08', '2024-08-28 17:48:08'),
(207, 184, 'What is the best time to for Drukpath Trek ?', 'The best times to embark on the Druk Path Trek are between March-June or September-November.', NULL, 1, '2024-08-29 17:12:57', '2024-08-29 17:12:57'),
(208, 184, 'What is the Druk Path Trek difficulty?', 'The trek is rated by the Tourism Council of Bhutan as “medium”, mainly because of the higher elevations that you will reach during the trek. With a maximum elevation of around 4,235 meters, which is at the top of Labana La Pass, which is a long and hard climb.', NULL, 1, '2024-08-29 17:12:57', '2024-08-29 17:12:57'),
(209, 189, 'How is the weather ?', 'In the daytime the weather can get quite sunny and warm in the night it can get to freezing temperature as cold as -30c. So be prepared for the freezing nights inside the tents.', 1, 1, '2024-09-02 11:48:32', '2024-09-02 11:48:32'),
(210, 189, 'When is the best time to climb Himlung 7126M?', 'The best time for Himlung Expedition is during the spring (April-May) and fall (October-November) seasons. During these seasons, the weather is stable, and the skies are clear, making it easier to navigate the mountain.', 2, 1, '2024-09-02 11:48:32', '2024-09-02 11:48:32'),
(211, 189, 'How hard is himlung himal?', 'Himlung Himal (7126 meters) is a classic Himalayan expedition known for being one of the lesser difficult and least technical 7000 meter+ mountains to climb (although it should not be underestimated). It has the highest recorded summit success rate (according to the Himalayan Database) compared to other peaks.', 3, 1, '2024-09-02 11:48:32', '2024-09-02 11:48:32'),
(212, 178, 'What is the best time to climb Saribung', 'The best time to climb Saribung Peak is during the spring (April-May) and autumn (September-November) seasons. These months offer stable weather conditions, clear skies, and good visibility.', 1, 1, '2024-09-02 12:08:15', '2024-09-02 12:08:15'),
(213, 178, 'How hard is Saribung Peak climbing ?', 'Saribung Peak Climbing is a challenging adventure that requires a good level of physical fitness, technical climbing skills, and experience.', 2, 1, '2024-09-02 12:08:15', '2024-09-02 12:08:15'),
(214, 169, 'How hard is mera Peak climbing?', 'Climbing Mera peak itself is not very technical and doesn’t consist of a steep technical climb but the high altitude reaching 6461m at the summit makes this a challenging climb. Unlike other trekking peaks in Nepal, the climb to Mera peak is straightforward.', 1, 1, '2024-09-02 12:18:15', '2024-09-02 12:18:15'),
(215, 169, 'What is the best time to climb Mera Peak', 'We recommend climbing Mera Peak in late April, May, late September, October, and November. We find that when we climb on Mera Peak, generally the best months are May and October. If you decide to climb in late March, early April or late October into November, you need to be ready for colder conditions.', 2, 1, '2024-09-02 12:18:15', '2024-09-02 12:18:15'),
(216, 169, 'Can i see Everest from Mera Peak', 'There are several peaks, and among them, Mera Peak is one of them. It provides the view of five 8000 er including Everest. The peak gives a close-up view of Mount Everest, Cho Oyu, Makalu, Kanchenjunga, and Lhotse', 3, 1, '2024-09-02 12:18:15', '2024-09-02 12:18:15'),
(217, 159, 'What skillset and fitness level are required?', 'This expeditions are within extreme high altitude environments, with differing requirements for ability. Due to the nature of these operational landscapes it is essential you provide concise, honest descriptions of relevant experience and current fitness levels', NULL, 1, '2024-09-02 12:51:21', '2024-09-02 12:51:21'),
(218, 159, 'What is the requirements for this Exped?', 'Attempting any 8,000m peak is a significant endeavour, but our team will help put the peak of Manaslu within reach. We would expect anyone joining this expedition to have summited multiple 6,000m and 7,000m peaks.', NULL, 1, '2024-09-02 12:51:21', '2024-09-02 12:51:21'),
(219, 190, 'How difficult is Three peak climbing', 'Grading: 7-8 (Strenuous)  Three peak climbing is considered strenuous due to longer duration trek/climb in a remote and isolated area that goes above 5500m and you need to sleep at an elevation of 5000m+ for multiple days. Climbers are required to have an excellent physical level. On summit days, you will leave base camp at around 2 am and will only be back to base camp by late afternoon. This grade trip involves usages of climbing equipment (Harness, Ice Axe, Crampons, Mountaineering Boots, Ascender). Previous experience is essential and we also provide a climbing course at base camp before the actual climb where your guides will teach you the proper way to use the equipment.', NULL, 1, '2024-09-02 16:02:28', '2024-09-02 17:13:04'),
(220, 190, 'What physical condition is required ?', 'To partake in Three peaks climb, an excellent physical level is required as this trip involves a longer duration of trek/climb. Previous experience of high altitude treks and climbing smaller peaks is of great advantage while climbing 6000m peaks. While the previous experience of trek/climb is a requirement, our carefully planned itinerary allows people without previous experience to join as well. We begin the trip with an acclimatized trek to Mera peak and afterward cross the Amphu Laptha before heading to Island peak and Lobuche Peak. You should also be both mentally and physically prepared for this trip. A fierce determination, burning desire and teamwork is required. We have allowed ample time for acclimatization and contingency day on our itinerary and there will also be a climbing course at the base camp where your guide will teach you the proper way to use the equipment.', NULL, 1, '2024-09-02 16:03:27', '2024-09-02 16:03:27'),
(221, 190, 'What is the best season to climb Tree peaks ?', 'The best seasons for Three Peaks Climb are Autumn (from October till the end of November) and Spring (April to May). Temperatures will drop considerably as you ascend higher every day. The nights are cold (between 5C to -5C) and the days are sunny and hot (between 10C to 20C).  Mornings are usually clear, with clouds building up in the afternoon and disappearing at night. Trekking and climbing during the monsoon seasons and winters are not recommended as the visibility is poor and limited whilst upper parts and high passes could be covered with snow.  March, April, October, and November are the favored months. Please choose a date that is convenient for you.', NULL, 1, '2024-09-02 16:03:27', '2024-09-02 16:04:41'),
(222, 198, 'What is the best  time for this trek ?', 'The best times for trekking in Nepal are from March to Early May and from September to November. Trekking is possible from December to February and it\'s a good time to avoid the crowds but you will need to be prepared for colder temperatures. June to August is the rainy season and we don\'t generally recommend trekking. If June to August is the only time you can trek send us an email and we can provide some suggestions.', 1, 1, '2024-09-03 21:28:16', '2024-09-03 21:28:16'),
(223, 198, 'Is Everest BC trek worth it?', 'The Everest region is a beautiful place to visit and a trek to Everest Base Camp is an ambition for many trekkers. Trekking to the base of the world’s highest mountain is a fantastic achievement and it is well worth the effort. Most people think the positives outweigh the drawback of walking on busier trails', 2, 1, '2024-09-03 21:28:16', '2024-09-03 21:28:16'),
(224, 198, 'Training for this Trek ?', 'Most people will benefit from aerobic conditioning and strength endurance for Everest Base Camp. Although the trek is typically slow and steady, you will be trekking 5-8 hours per day and gaining on average 300m (1000 ft) in elevation each day', 3, 1, '2024-09-03 21:28:16', '2024-09-03 21:28:16'),
(225, 196, 'What is the best time for Lower Dolpa Trek', 'The best time for Lower Dolpo Trekking is during the Spring (March to May) and Autumn (September to November)', NULL, 1, '2024-09-04 22:18:50', '2024-09-04 22:18:50'),
(226, 195, 'How hard is annapurna circuit Trek', 'Annapurna Circuit Trekking is a moderately challenging trip around the popular Annapurna region suitable for experienced as well as novice hikers who are passionate about walking, exploring, and adventure with a good level of physical and mental fitness level.', 1, 1, '2024-09-05 14:53:58', '2024-09-05 14:53:58'),
(227, 195, 'What is the best time for Annapurna Circuit Trek?', 'For the Annapurna Circuit, October and November or April and May are widely considered to be the best times for trekking. The weather during these two seasons is generally clear and dry, and so it’s not too cold when heading into high altitudes.', 2, 1, '2024-09-05 14:53:58', '2024-09-05 14:53:58'),
(228, 195, 'Can i do this trek in December', 'Annapurna Circuit Trek in December is usually less crowded than any other seasons. The trekking trails are mostly empty and peaceful. The weather condition and temperature of the Annapurna region are bearable during December. The weather might be quite chilly in the higher areas', 3, 1, '2024-09-05 14:53:58', '2024-09-05 14:53:58'),
(229, 194, 'When is the best time to climb island peak?', 'The best time to climb Island peak is Autumn and Spring season. These seasons have very ideal climate and weather for Island peak climbing. The weather is stable with clear visibility of the views. But, this expedition is possible during the Winter and Monsoon season as well.', NULL, 1, '2024-09-05 21:44:51', '2024-09-05 21:44:51'),
(230, 194, 'How hard is island  Peak climbing?', 'Island peak climb is basically recommended for beginners willing to step into the world of mountaineering. Even then, climbing the Island peak requires having the experience of trekking in a high altitude.  Island peak is a difficult climb at an extreme altitude. The foot of the headwall is the toughest part of the climb. The ascent is very steep and the air at its thinnest. However, the climbing route is safe because of fixed lines.', NULL, 1, '2024-09-05 21:44:51', '2024-09-05 21:44:51'),
(231, 194, 'How hard is island  Peak climbing?', 'Grading: 7-8 (Strenuous), Alpine PD+   Climbing Island peak is considered strenuous due to longer duration trek/climb in a remote and isolated area that goes above 5500m. You need to sleep at an elevation of 5000m+ for multiple days. Climbers are required to have an excellent physical level with fierce determination. Daily walking hours include 6-7 hrs on average and summit day can be 10-14 hrs long.  This grade trip involves the usage of climbing equipment (Harness, Ice Axe, Crampons, Mountaineering Boots, Ascender). Previous experience is essential and we also provide a climbing course at base camp before the actual climb where your guides will teach you the proper way to use the equipment.', NULL, 1, '2024-09-05 21:44:51', '2024-09-05 21:44:51'),
(232, 194, 'How to prepare for island peak ?', 'High altitude treks and climbs especially in the Himalayas are challenging and require you to be in the top physical, emotional, and psychological condition. The more fitter you are, the more enjoyable your trip will be.  Do daily physical workouts (jogging, hiking, cycling, gym, etc) prior to a couple of weeks.  Climbing conditioning – pack-loaded uphill hiking, walking, and stair climbing. Strength training – for the lower body and core. Cardiovascular training – including both aerobic and anaerobic workouts without pack weight. Flexibility training.', NULL, 1, '2024-09-05 21:44:51', '2024-09-05 21:44:51'),
(233, 194, 'Which is harder island peak or Mera Peak ?', 'Bringing out typical tastes of peak climbing in Nepal, both Island Peak and Mera Peak have their own set of peculiarities. Mera Peak is slightly higher than Island Peak while Island Peak, with more steep ice climbs, is considered a little more technical than Mera Peak. There are some significant differences in the climbing aspects of  Climbing. While both peaks do not require specific mountaineering skills, many other factors differentiate these two peaks. Mera Peak is deemed the easier one to climb from the safety point, whereas in terms of adventure Island Peak offers more thrills of mountain climbing', NULL, 1, '2024-09-05 21:44:51', '2024-09-05 21:44:51'),
(234, 194, 'Can you see Everest from island peak ?', 'Mt. Everest is not visible from the summit of Island peak as the peak is tucked behind the shoulders of Mt. Lhotse. However, you can marvel at the magnificent views of Mt. Ama Dablam, Mt. Lhotse, and Mera Peak.', NULL, 1, '2024-09-05 21:44:51', '2024-09-05 21:44:51'),
(235, 193, 'How difficult is it to climb Ama Dablam?', 'Climbing Ama Dablam is considered technically challenging, requiring prior mountaineering experience. It includes steep ice and rock sections, exposed ridges, and technical climbing.', 1, 1, '2024-09-07 13:49:47', '2024-09-07 13:49:47'),
(236, 193, 'When is the best time to climb Ama Dablam?', 'The optimal climbing seasons are spring (April to May) and autumn (September to November). During these periods, you’ll find stable weather conditions and clear skies, making for safer and more enjoyable climbs.', 2, 1, '2024-09-07 13:49:47', '2024-09-07 13:49:47'),
(237, 193, 'How long does it take to climb Ama Dablam?', 'The typical Ama Dablam expedition lasts about 30 days how however you can climb Ama Dablam in just 14 days with our Speed summit pakage', 3, 1, '2024-09-07 13:49:47', '2024-09-07 13:49:47'),
(238, 192, 'How difficult is Everest Comfort Trek ?', 'In general, the trek is mostly moderate and slightly difficult at some places. Trekking to Namche Bazaar from Lukla itself is a challenging walk as the trail is very steep and sloppy. The farthest point on the trek is Tengboche at 3,870m (12,697ft.). You will take an acclimatization hike up to Everest View Hotel which is situated at 3,962m (13,000ft.) while you are in Namche Bazaar. This is in fact, the highest point on the trek. If you are physically fit and mentally strong with a strong determination, then this trek is not as difficult as one can reckon. The only factor that attributes to the difficulty of this trek is the altitude and the long walking hours on uneven terrains for several days.', 1, 1, '2024-09-07 13:56:56', '2024-09-07 13:56:56'),
(239, 192, 'What is the best time for this trek ?', 'In general, the trek is mostly moderate and slightly difficult at some places. Trekking to Namche Bazaar from Lukla itself is a challenging walk as the trail is very steep and sloppy. The farthest point on the trek is Tengboche at 3,870m (12,697ft.). You will take an acclimatization hike up to Everest View Hotel which is situated at 3,962m (13,000ft.) while you are in Namche Bazaar. This is in fact, the highest point on the trek. If you are physically fit and mentally strong with a strong determination, then this trek is not as difficult as one can reckon. The only factor that attributes to the difficulty of this trek is the altitude and the long walking hours on uneven terrains for several days.', 2, 1, '2024-09-07 13:56:56', '2024-09-07 13:56:56'),
(240, 191, 'What is the best time for Manaslu Circuit Trek ?', 'This Manaslu trek is best done in pre-monsoon season i.e. from March to May and post-monsoon season i.e. from late September to December. In general, any time during October, November, April and May are considered the best months. Other recommended months for this trek are September, December and March. We do not recommend doing this trek during the rest of the months. Due to heavy snowfall in January and February it becomes very risky to cross the Larkya La Pass. Likewise, heavy rainfall causing flood and landslide can be experienced during June, July and August, so it is better to avoid these months.', NULL, 1, '2024-09-08 14:50:09', '2024-09-08 14:50:09'),
(241, 191, 'How difficult is Manaslu Circuit Trek ?', 'The Manaslu Circuit Trek is a moderate to challenging trek that involves long hours of continuous hiking, steep ascents and descents, and high altitudes', NULL, 1, '2024-09-08 14:50:09', '2024-09-08 14:50:09'),
(244, 179, 'How is Automn  season for Pikey Pamggom Trek', 'The Autumn Season (September, October, and November) is considered as one of the best times for Pikey Peak Trek. During the autumn season, the weather is stable, and the environment is pleasant. The clear skies and. excellent visibility make autumn stand out as the ideal time to embark on this journey. The colorful autumn leaves perfectly complement the surroundings, creating an enchanting scenery. The daylight is beautiful, and crystal-clear views of the Himalayan Landscape can be seen during the autumn. The days are warm and pleasant, which creates favorable walking conditions for the trekkers.', NULL, 1, '2024-09-09 09:38:38', '2024-09-09 09:38:38'),
(245, 179, 'How is Spring Season for Pikey Panggom Trek ?', 'Spring Season (March, April, and May) stands out as the best time for Pikey Peak Trek. The vibrant atmosphere of spring creates a pleasant trekking environment for the trekkers. During the spring season, you will get to walk along the tranquil forests filled with blooming rhododendrons. The sweet aroma of blooming flowers will enhance your walking experience and make the whole journey pleasant. The weather is stable during the spring season, which creates a favorable walking environment for the trekkers.', NULL, 1, '2024-09-09 09:38:38', '2024-09-09 09:38:38'),
(246, 179, 'Where is Panggom Village ?', 'Panggom is a village located at a height of 2900 m.in the Solukhubu District in Nepal, 50 kilometers south of Everest, the world\'s highest peak.', NULL, 1, '2024-09-09 09:52:52', '2024-09-09 09:52:52'),
(247, 199, 'How difficult is the Langtang Valley trek?', 'This one is the most frequently asked question about the Langtang trek. so here I came with the answer. Langtang Valley Trek is an easy to moderate level of trek. even the beginner\'s trekker can complete this trek successfully, I mean you don’t need any other trekking experience.  You should be physically and mentally fit. For the seven days Langtang Trek, on average you should walk around 5-6 hours a day. Walking at a high altitude can be quite tough as you have to wake up early to avoid cold wind. But if you have strong wills and dedication you can easily complete the Langtang Valley Trek without much difficulty', NULL, 1, '2024-09-09 15:39:03', '2024-09-09 15:39:03'),
(248, 199, 'When is the best time to trek Langtang Valley Trek?', 'Trekking throughout the year is possible for Langtang Valley Trek but the spring and autumn season is considered the best among four-season due to the stable warm temperature, clear weather, mindblowing mountain views with clear skies, and this season is considered a safe season to explore as well. Being the best season, many trekkers choose this time of the year to explore so if you want peaceful travel, to avoid the crowd you can trek during winter (January to February) if the cold doesn’t bother you a lot, and during the summer season, these time in the years you will not see many peoples and can get comfortable accommodation with good discount in meals too.', NULL, 1, '2024-09-09 15:39:03', '2024-09-09 15:39:03'),
(249, 131, 'Is Everest Base Camp trek worth it?', 'The Everest region is a beautiful place to visit and a trek to Everest Base Camp is an ambition for many trekkers. Trekking to the base of the world’s highest mountain is a fantastic achievement and it is well worth the effort. Most people think the positives outweigh the drawback of walking on busier trails', NULL, 1, '2024-09-09 15:55:28', '2024-09-09 15:55:28'),
(250, 131, 'How difficult is Everest Base Camp Trek Trek ?', 'Trekking to Everest Base Camp is an adventure of a lifetime. This trek can be a life-changing experience for many people.  The difficulty level of the Everest Base Camp is moderate. The trekking time often requires two weeks. Even though the EBC Trek requires no prior trekking expertise, it is suggested that the trekker should be determined and be physically fit.  Altitude is by far the most challenging aspect of the trek and is what makes it more difficult than your average trek of the same length', NULL, 1, '2024-09-09 15:55:28', '2024-09-09 15:55:28'),
(251, 131, 'Training for EBC Trek ?', 'Most people will benefit from aerobic conditioning and strength endurance for Everest Base Camp. Although the trek is typically slow and steady, you will be trekking 5-8 hours per day and gaining on average 300m (1000 ft) in elevation each day', NULL, 1, '2024-09-09 15:55:28', '2024-09-09 15:55:28'),
(252, 200, 'What is the distance of the Langtang Valley Trek?', 'Langtang Valley Trek is one of the closest treks in Nepal. It is approximately 190 kilometers from Kathmandu and is among the shortest treks in Nepal. The tours last an average of 8 days, but other treks like Gosaikunda will give you more options to explore if you have more time', NULL, 1, '2024-09-09 22:06:10', '2024-09-09 22:06:10'),
(253, 200, 'How Difficult is Langtang Valley Trek?', 'Langtang Valley Trek is among the easy to moderate-level treks in Nepal. For the Langtang Valley Trek, you do not need any experience and also don’t need mountain climbing skills. Throughout the trek, you must walk at least 60-70 kilometers while covering at least 7 hours daily. Langtang Valley trek also takes you over 3000m, which causes a significant risk of altitude sickness. However, if you are better prepared and plan for the trek, you can quickly complete it.', NULL, 1, '2024-09-09 22:06:10', '2024-09-09 22:06:10'),
(254, 200, 'What is the best time to trek Langtang Valley?', 'The best time to trek in the Langang Valley depends on the season you are visiting. In Nepal, two seasons are considered peak seasons: spring and autumn. Similarly, two seasons that are considered off-season are Winter and Monsoon season. As the name suggests, peak season is ideal for trekking, whereas off-season treks are not ideal, especially for beginners.', NULL, 1, '2024-09-09 22:06:10', '2024-09-09 22:06:10'),
(255, 200, 'Do I need to have Travel Insurance?', 'Yes, getting travel insurance will help you in case of an emergency evacuation from a helicopter. It can help you from unexpected costs like medical, loss of baggage, or cancellation fees. Before doing insurance, read the terms and conditions well to ensure to meets your needs', NULL, 1, '2024-09-09 22:08:44', '2024-09-09 22:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_film_making`
--

CREATE TABLE `cl_trip_film_making` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `trip_id` int(11) NOT NULL,
  `num_ppl` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `full_name` varchar(191) NOT NULL,
  `contact` varchar(191) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(191) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_gear`
--

CREATE TABLE `cl_trip_gear` (
  `id` int(11) NOT NULL,
  `trip_detail_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `video` text DEFAULT NULL,
  `ordering` int(11) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_gear`
--

INSERT INTO `cl_trip_gear` (`id`, `trip_detail_id`, `title`, `content`, `thumbnail`, `video`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(387, 200, NULL, NULL, '1764942643-kNwEHLANG4.png', NULL, NULL, 1, '2024-09-09 21:24:42', '2025-12-05 13:50:43'),
(388, 200, NULL, NULL, '1764942675-76rT6LANG3.png', NULL, NULL, 1, '2024-09-09 21:24:42', '2025-12-05 13:51:16'),
(390, 200, NULL, NULL, '1764947103-a2jjDE1.png', NULL, NULL, 1, '2024-09-09 21:24:42', '2025-12-05 15:05:03'),
(391, 200, NULL, NULL, '1764947572-DG8v6W12.png', NULL, NULL, 1, '2024-09-09 21:30:13', '2025-12-05 15:12:52'),
(393, 235, NULL, NULL, '1759137290-XCT0iWhatsApp Image 2025-07-13 at 12.44.21 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:14:50', '2025-09-29 09:14:50'),
(394, 235, NULL, NULL, '1759137290-Rt4RzWhatsApp Image 2025-07-13 at 12.44.21.jpeg', NULL, NULL, 1, '2025-09-29 09:14:50', '2025-09-29 09:14:50'),
(395, 235, NULL, NULL, '1759137290-Ww2jbWhatsApp Image 2025-07-13 at 12.44.22 (1).jpeg', NULL, NULL, 1, '2025-09-29 09:14:50', '2025-09-29 09:14:50'),
(396, 235, NULL, NULL, '1759137290-If2bvGOPR1031.JPG', NULL, NULL, 1, '2025-09-29 09:14:50', '2025-09-29 09:14:50'),
(397, 235, NULL, NULL, '1759137290-zgvkaGOPR0997.JPG', NULL, NULL, 1, '2025-09-29 09:14:50', '2025-09-29 09:14:50'),
(398, 235, NULL, NULL, '1759137295-jooO3WhatsApp Image 2025-07-13 at 12.44.21 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:14:55', '2025-09-29 09:14:55'),
(399, 235, NULL, NULL, '1759137295-eOhFRWhatsApp Image 2025-07-13 at 12.44.21.jpeg', NULL, NULL, 1, '2025-09-29 09:14:55', '2025-09-29 09:14:55'),
(400, 235, NULL, NULL, '1759137295-mIJHeWhatsApp Image 2025-07-13 at 12.44.22 (1).jpeg', NULL, NULL, 1, '2025-09-29 09:14:55', '2025-09-29 09:14:55'),
(401, 235, NULL, NULL, '1759137298-xV0x2WhatsApp Image 2025-07-13 at 12.44.21 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:14:58', '2025-09-29 09:14:58'),
(402, 235, NULL, NULL, '1759137298-fB4EWWhatsApp Image 2025-07-13 at 12.44.21.jpeg', NULL, NULL, 1, '2025-09-29 09:14:58', '2025-09-29 09:14:58'),
(403, 235, NULL, NULL, '1759137298-8ExnlWhatsApp Image 2025-07-13 at 12.44.22 (1).jpeg', NULL, NULL, 1, '2025-09-29 09:14:58', '2025-09-29 09:14:58'),
(404, 235, NULL, NULL, '1759137298-MnIsAWhatsApp Image 2025-07-13 at 12.44.21 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:14:58', '2025-09-29 09:14:58'),
(405, 235, NULL, NULL, '1759137298-rwy7rWhatsApp Image 2025-07-13 at 12.44.21.jpeg', NULL, NULL, 1, '2025-09-29 09:14:58', '2025-09-29 09:14:58'),
(406, 235, NULL, NULL, '1759137298-LsQn0WhatsApp Image 2025-07-13 at 12.44.22 (1).jpeg', NULL, NULL, 1, '2025-09-29 09:14:58', '2025-09-29 09:14:58'),
(407, 235, NULL, NULL, '1759137299-B1yseWhatsApp Image 2025-07-13 at 12.44.21 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:14:59', '2025-09-29 09:14:59'),
(408, 235, NULL, NULL, '1759137299-hinLkWhatsApp Image 2025-07-13 at 12.44.21.jpeg', NULL, NULL, 1, '2025-09-29 09:14:59', '2025-09-29 09:14:59'),
(409, 235, NULL, NULL, '1759137299-yFxMJWhatsApp Image 2025-07-13 at 12.44.22 (1).jpeg', NULL, NULL, 1, '2025-09-29 09:14:59', '2025-09-29 09:14:59'),
(410, 235, NULL, NULL, '1759137300-BqL3jWhatsApp Image 2025-07-13 at 12.44.21 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:15:00', '2025-09-29 09:15:00'),
(411, 235, NULL, NULL, '1759137300-nrlofWhatsApp Image 2025-07-13 at 12.44.21.jpeg', NULL, NULL, 1, '2025-09-29 09:15:00', '2025-09-29 09:15:00'),
(412, 235, NULL, NULL, '1759137300-SYpQHWhatsApp Image 2025-07-13 at 12.44.22 (1).jpeg', NULL, NULL, 1, '2025-09-29 09:15:00', '2025-09-29 09:15:00'),
(413, 235, NULL, NULL, '1759137301-uXXgtWhatsApp Image 2025-07-13 at 12.44.21 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:15:01', '2025-09-29 09:15:01'),
(414, 235, NULL, NULL, '1759137301-eaGQKWhatsApp Image 2025-07-13 at 12.44.21.jpeg', NULL, NULL, 1, '2025-09-29 09:15:01', '2025-09-29 09:15:01'),
(415, 235, NULL, NULL, '1759137301-2T7svWhatsApp Image 2025-07-13 at 12.44.22 (1).jpeg', NULL, NULL, 1, '2025-09-29 09:15:01', '2025-09-29 09:15:01'),
(417, 234, NULL, NULL, '1759138594-HZa7BIMG_5113.JPG', NULL, NULL, 1, '2025-09-29 09:36:34', '2025-09-29 09:36:34'),
(422, 237, NULL, NULL, '1765546015-5gYMal33.png', NULL, NULL, 1, '2025-09-29 09:40:27', '2025-12-12 13:26:55'),
(423, 237, NULL, NULL, '1765545914-xGuHYl33.png', NULL, NULL, 1, '2025-09-29 09:40:27', '2025-12-12 13:25:14'),
(425, 237, NULL, NULL, '1759138827-sTyLLDSC08268.JPG', NULL, NULL, 1, '2025-09-29 09:40:27', '2025-09-29 09:40:27'),
(426, 237, NULL, NULL, '1759138827-inuwMDSC08059.JPG', NULL, NULL, 1, '2025-09-29 09:40:27', '2025-09-29 09:40:27'),
(431, 226, NULL, NULL, '1759139659-2LZ9GWhatsApp Image 2025-07-10 at 10.33.56 (2).jpeg', NULL, NULL, 1, '2025-09-29 09:54:19', '2025-09-29 09:54:19'),
(432, 226, NULL, NULL, '1759139659-fHlDCWhatsApp Image 2025-07-10 at 10.33.56 (6).jpeg', NULL, NULL, 1, '2025-09-29 09:54:19', '2025-09-29 09:54:19'),
(433, 226, NULL, NULL, '1759139659-SzK2fWhatsApp Image 2025-07-10 at 10.33.56 (4).jpeg', NULL, NULL, 1, '2025-09-29 09:54:19', '2025-09-29 09:54:19'),
(434, 229, NULL, NULL, '1759140976-NjnjtDSC_9210.JPG', NULL, NULL, 1, '2025-09-29 10:16:16', '2025-09-29 10:16:16'),
(435, 229, NULL, NULL, '1765378499-Samd6l33.png', NULL, NULL, 1, '2025-09-29 10:16:16', '2025-12-10 14:54:59'),
(436, 229, NULL, NULL, '1759140976-wDzYqatt.5gBL1fxQdVcR_Q7dSxgX3AifbcFtvhF0GA-busFTh2I.JPG', NULL, NULL, 1, '2025-09-29 10:16:16', '2025-09-29 10:16:16'),
(437, 229, NULL, NULL, '1759140976-rVK7iatt.ySnFakZemi6A0_eD7eA2ogEn47oOcZLCwkFtyR0h4Zs.JPG', NULL, NULL, 1, '2025-09-29 10:16:16', '2025-09-29 10:16:16'),
(438, 231, NULL, NULL, '1765433412-X7wFAl33.png', NULL, NULL, 1, '2025-09-29 10:48:06', '2025-12-11 06:10:12'),
(439, 231, NULL, NULL, '1764738031-qxKCKpx2.png', NULL, NULL, 1, '2025-09-29 10:48:06', '2025-12-03 05:00:31'),
(440, 231, NULL, NULL, '1765433191-gzCBhl33.png', NULL, NULL, 1, '2025-09-29 10:48:06', '2025-12-11 06:06:31'),
(441, 231, NULL, NULL, '1765433313-ti8JYl33.png', NULL, NULL, 1, '2025-09-29 10:48:06', '2025-12-11 06:08:33'),
(443, 232, NULL, NULL, '1759143472-04QJNIMG_2376 (1).jpeg', NULL, NULL, 1, '2025-09-29 10:57:52', '2025-09-29 10:57:52'),
(444, 232, NULL, NULL, '1759143472-SEmnaIMG_1945.jpg', NULL, NULL, 1, '2025-09-29 10:57:52', '2025-09-29 10:57:52'),
(445, 232, NULL, NULL, '1759143472-g8K4QLOISHONGVISION-09196.JPG', NULL, NULL, 1, '2025-09-29 10:57:52', '2025-09-29 10:57:52'),
(446, 228, NULL, NULL, '1759143647-C85DOatt.iIagPG042UFmIbRxTSSaxWClsMWDOJz3JIX9mX2Qh9M.JPG', NULL, NULL, 1, '2025-09-29 11:00:47', '2025-09-29 11:00:47'),
(447, 228, NULL, NULL, '1759143648-p2a0Fatt.7yJ4pO1UGqjdwdH2fVzrGdgF2OL4iaiBNR7Vvx1x-QE.JPG', NULL, NULL, 1, '2025-09-29 11:00:48', '2025-09-29 11:00:48'),
(448, 228, NULL, NULL, '1759143648-6NBTyatt.wa04p6_h7LHUH9TBnEpFlGr3J6GUbN8ySZGnChqHYtw.JPG', NULL, NULL, 1, '2025-09-29 11:00:48', '2025-09-29 11:00:48'),
(449, 228, NULL, NULL, '1759143648-rWdacatt.fv6r-88wGwWydQGR6NRxH_u0TXnj451L_MHi9hwdGFM.JPG', NULL, NULL, 1, '2025-09-29 11:00:48', '2025-09-29 11:00:48'),
(450, 226, NULL, NULL, '1759197530-fji06KHAN123456.png', NULL, NULL, 1, '2025-09-30 01:58:50', '2025-09-30 01:58:50'),
(452, 122, NULL, NULL, '1759199972-h8bXHeverest 1.jpg', NULL, 3, 1, '2025-09-30 02:09:28', '2026-02-02 06:37:18'),
(453, 122, NULL, NULL, '1765377421-RwaEvl33.png', NULL, 2, 1, '2025-09-30 02:15:22', '2026-02-02 06:37:18'),
(455, 122, NULL, NULL, '1765377584-QO4Zgl33.png', NULL, 1, 1, '2025-09-30 02:15:22', '2026-02-02 06:37:18'),
(456, 122, NULL, NULL, '1765377779-sD919l33.png', NULL, 4, 1, '2025-09-30 02:25:35', '2026-02-02 06:37:18'),
(457, 122, NULL, NULL, '1759199972-8uPBdeverrest 23.jpg', NULL, 5, 1, '2025-09-30 02:39:32', '2026-02-02 06:37:18'),
(464, 233, NULL, NULL, '1759201490-1Tq1l5.jpg', NULL, NULL, 1, '2025-09-30 03:04:50', '2025-09-30 03:04:50'),
(465, 233, NULL, NULL, '1759201490-cvtlxlhotse final .jpg', NULL, NULL, 1, '2025-09-30 03:04:50', '2025-09-30 03:04:50'),
(468, 232, NULL, NULL, '1759202076-gY0KCannapurna .jpg', NULL, NULL, 1, '2025-09-30 03:14:36', '2025-09-30 03:14:36'),
(470, 241, NULL, NULL, '1764754039-JZcUqSA3.png', NULL, NULL, 1, '2025-10-18 09:56:13', '2025-12-03 09:27:19'),
(471, 241, NULL, NULL, '1764754085-69jkzSA2.png', NULL, NULL, 1, '2025-10-18 09:57:44', '2025-12-03 09:28:05'),
(472, 241, NULL, NULL, '1764754369-4bOQjSA5.png', NULL, NULL, 1, '2025-10-18 09:57:44', '2025-12-03 09:32:49'),
(473, 241, NULL, NULL, '1764754560-LKS5lSA6.png', NULL, NULL, 1, '2025-10-18 09:57:44', '2025-12-03 09:36:00'),
(474, 241, NULL, NULL, '1760781465-G3pXWDSC07477.JPG', NULL, NULL, 1, '2025-10-18 09:57:45', '2025-10-18 09:57:45'),
(479, 234, NULL, NULL, '1764058896-1ocfmFINAL .png', NULL, NULL, 1, '2025-11-25 08:21:36', '2025-11-25 08:21:36'),
(480, 234, NULL, NULL, '1764059094-1yjQV2ND.png', NULL, NULL, 1, '2025-11-25 08:24:54', '2025-11-25 08:24:54'),
(481, 234, NULL, NULL, '1764059351-PwKQ03RD.png', NULL, NULL, 1, '2025-11-25 08:24:54', '2025-11-25 08:29:11'),
(482, 234, NULL, NULL, '1764059548-WCLcj4TH.png', NULL, NULL, 1, '2025-11-25 08:32:28', '2025-11-25 08:32:28'),
(485, 243, NULL, NULL, '1764065848-4jQkVimja ph.png', NULL, NULL, 1, '2025-11-25 10:17:28', '2025-11-25 10:17:28'),
(486, 243, NULL, NULL, '1764065971-qCUiQphoto2.png', NULL, NULL, 1, '2025-11-25 10:19:31', '2025-11-25 10:19:31'),
(487, 243, NULL, NULL, '1764066092-ym6iiislandphotos.png', NULL, NULL, 1, '2025-11-25 10:21:32', '2025-11-25 10:21:32'),
(488, 243, NULL, NULL, '1764067284-4j1Usimja tashi photos.png', NULL, NULL, 1, '2025-11-25 10:41:24', '2025-11-25 10:41:24'),
(489, 240, NULL, NULL, '1764753521-LeXqVSA.png', NULL, NULL, 1, '2025-11-27 09:25:20', '2025-12-03 09:18:41'),
(490, 240, NULL, NULL, '1764235629-fZz5In2d.png', NULL, NULL, 1, '2025-11-27 09:27:09', '2025-11-27 09:27:09'),
(491, 240, NULL, NULL, '1764235932-qRpCX3rdrow.png', NULL, NULL, 1, '2025-11-27 09:32:12', '2025-11-27 09:32:12'),
(492, 247, NULL, NULL, '1764239240-iSQKcchulochulo.png', NULL, NULL, 1, '2025-11-27 10:27:20', '2025-11-27 10:27:20'),
(493, 247, NULL, NULL, '1764239363-Bfh6mchulo22.png', NULL, NULL, 1, '2025-11-27 10:29:23', '2025-11-27 10:29:23'),
(494, 247, NULL, NULL, '1764239483-745WXchulo3333.png', NULL, NULL, 1, '2025-11-27 10:31:23', '2025-11-27 10:31:23'),
(495, 247, NULL, NULL, '1764239604-Ls861chulo444.png', NULL, NULL, 1, '2025-11-27 10:33:24', '2025-11-27 10:33:24'),
(496, 248, NULL, NULL, '1767198851-d1AZkA234.png', NULL, NULL, 1, '2025-11-27 10:42:16', '2025-12-31 16:34:11'),
(497, 248, NULL, NULL, '1767198911-ZEykdA234.png', NULL, NULL, 1, '2025-11-27 10:43:40', '2025-12-31 16:35:11'),
(498, 248, NULL, NULL, '1764240314-xv06pwest 2456.png', NULL, NULL, 1, '2025-11-27 10:45:14', '2025-11-27 10:45:14'),
(499, 190, NULL, NULL, '1764241480-2lwVkcombo1.png', NULL, NULL, 1, '2025-11-27 11:04:40', '2025-11-27 11:04:40'),
(500, 190, NULL, NULL, '1764241859-nDh73banner imja.png', NULL, NULL, 1, '2025-11-27 11:10:59', '2025-11-27 11:10:59'),
(501, 247, NULL, NULL, '1764486383-rnGW3chulo east final 246.png', NULL, NULL, 1, '2025-11-30 07:06:23', '2025-11-30 07:06:23'),
(502, 131, NULL, NULL, '1764487260-4S1Ffevererst11.png', NULL, NULL, 1, '2025-11-30 07:21:00', '2025-11-30 07:21:00'),
(503, 131, NULL, NULL, '1764487354-fk25Teverst 22.png', NULL, NULL, 1, '2025-11-30 07:22:34', '2025-11-30 07:22:34'),
(504, 131, NULL, NULL, '1764487593-DUrQ2namche.png', NULL, NULL, 1, '2025-11-30 07:26:33', '2025-11-30 07:26:33'),
(505, 131, NULL, NULL, '1764487813-1wv2Ofinal photos .png', NULL, NULL, 1, '2025-11-30 07:30:13', '2025-11-30 07:30:13'),
(506, 191, NULL, NULL, '1764489237-AeGBEgara1.png', NULL, NULL, 1, '2025-11-30 07:53:57', '2025-11-30 07:53:57'),
(507, 191, NULL, NULL, '1764489237-ecyxggara2.png', NULL, NULL, 1, '2025-11-30 07:53:57', '2025-11-30 07:53:57'),
(508, 191, NULL, NULL, '1764489367-t4XkFgara3.png', NULL, NULL, 1, '2025-11-30 07:56:07', '2025-11-30 07:56:07'),
(509, 191, NULL, NULL, '1765434634-Y9LpHl33.png', NULL, NULL, 1, '2025-11-30 07:57:36', '2025-12-11 06:30:34'),
(510, 259, NULL, NULL, '1764506710-5yJmepoonhill photo 1.png', NULL, NULL, 1, '2025-11-30 12:45:10', '2025-11-30 12:45:10'),
(511, 259, NULL, NULL, '1765439431-0q0bol33.png', NULL, NULL, 1, '2025-11-30 12:49:19', '2025-12-11 07:50:31'),
(512, 259, NULL, NULL, '1765438957-3cIBkl33.png', NULL, NULL, 1, '2025-11-30 12:55:50', '2025-12-11 07:42:37'),
(513, 165, NULL, NULL, '1764756267-wB0xYP1.png', NULL, NULL, 1, '2025-11-30 15:10:37', '2025-12-03 10:04:27'),
(514, 165, NULL, NULL, '1764515603-SzUiN0909.png', NULL, NULL, 1, '2025-11-30 15:13:23', '2025-11-30 15:13:23'),
(515, 256, NULL, NULL, '1764516844-jxUjRabc1.png', NULL, NULL, 1, '2025-11-30 15:34:04', '2025-11-30 15:34:04'),
(516, 256, NULL, NULL, '1764517054-85GLzabc22.png', NULL, NULL, 1, '2025-11-30 15:37:34', '2025-11-30 15:37:34'),
(517, 256, NULL, NULL, '1764517388-Cxeg6abc34.png', NULL, NULL, 1, '2025-11-30 15:43:08', '2025-11-30 15:43:08'),
(522, 253, NULL, NULL, '1764733946-VaVs7px3.png', NULL, NULL, 1, '2025-12-01 04:52:53', '2025-12-03 03:52:26'),
(523, 253, NULL, NULL, '1764734085-PeuG5px4.png', NULL, NULL, 1, '2025-12-01 04:56:53', '2025-12-03 03:54:45'),
(524, 253, NULL, NULL, '1764565128-nxVpM3 ota .png', NULL, NULL, 1, '2025-12-01 04:58:48', '2025-12-01 04:58:48'),
(525, 253, NULL, NULL, '1764565936-pH246final photoss.png', NULL, NULL, 1, '2025-12-01 05:02:23', '2025-12-01 05:12:16'),
(526, 254, NULL, NULL, '1764566723-jowplcopy1.png', NULL, NULL, 1, '2025-12-01 05:25:23', '2025-12-01 05:25:23'),
(527, 254, NULL, NULL, '1764566845-U2n4Wcopy 2.png', NULL, NULL, 1, '2025-12-01 05:27:25', '2025-12-01 05:27:25'),
(528, 254, NULL, NULL, '1764567001-wV4U1copy 3.png', NULL, NULL, 1, '2025-12-01 05:30:01', '2025-12-01 05:30:01'),
(529, 254, NULL, NULL, '1764567493-DBdXUcopy 4.png', NULL, NULL, 1, '2025-12-01 05:38:13', '2025-12-01 05:38:13'),
(538, 258, NULL, NULL, '1764605595-M84vlIMG_2952.JPG', NULL, NULL, 1, '2025-12-01 16:13:15', '2025-12-01 16:13:15'),
(540, 258, NULL, NULL, '1764605595-6JjtJ893e33a0-2917-4a94-8495-12c1ef797a33.JPG', NULL, NULL, 1, '2025-12-01 16:13:15', '2025-12-01 16:13:15'),
(542, 258, NULL, NULL, '1764605746-scyECIMG_2851.JPG', NULL, NULL, 1, '2025-12-01 16:15:46', '2025-12-01 16:15:46'),
(544, 258, NULL, NULL, '1764662114-CKhg0maedi 0988.png', NULL, NULL, 1, '2025-12-02 07:55:14', '2025-12-02 07:55:14'),
(549, 227, NULL, NULL, '1765378233-Cna4Dl33.png', NULL, NULL, 1, '2025-12-03 04:37:05', '2025-12-10 14:50:33'),
(550, 227, NULL, NULL, '1765378283-2WLErl33.png', NULL, NULL, 1, '2025-12-03 04:37:05', '2025-12-10 14:51:23'),
(552, 227, NULL, NULL, '1764737299-JOjYzpx9.png', NULL, NULL, 1, '2025-12-03 04:48:19', '2025-12-03 04:48:19'),
(553, 227, NULL, NULL, '1765378039-3aVB9l33.png', NULL, NULL, 1, '2025-12-03 04:50:16', '2025-12-10 14:47:19'),
(561, 233, NULL, NULL, '1764739220-SXqakpx1.png', NULL, NULL, 1, '2025-12-03 05:20:20', '2025-12-03 05:20:20'),
(562, 233, NULL, NULL, '1764739572-5y0pppx2.png', NULL, NULL, 1, '2025-12-03 05:20:21', '2025-12-03 05:26:12'),
(563, 244, NULL, NULL, '1764751952-I1rGhPX23.png', NULL, NULL, 1, '2025-12-03 07:26:02', '2025-12-03 08:52:32'),
(564, 244, NULL, NULL, '1764751995-iQcBLPX1.png', NULL, NULL, 1, '2025-12-03 08:53:15', '2025-12-03 08:53:15'),
(565, 244, NULL, NULL, '1764752152-7Q7HhPZ1.png', NULL, NULL, 1, '2025-12-03 08:54:48', '2025-12-03 08:55:52'),
(566, 244, NULL, NULL, '1764752224-iqOLEPZ34.png', NULL, NULL, 1, '2025-12-03 08:57:04', '2025-12-03 08:57:04'),
(567, 240, NULL, NULL, '1764753602-9knzKSA1.png', NULL, NULL, 1, '2025-12-03 09:20:02', '2025-12-03 09:20:02'),
(568, 165, NULL, NULL, '1764756367-AXSRdP2.png', NULL, NULL, 1, '2025-12-03 10:06:07', '2025-12-03 10:06:07'),
(569, 165, NULL, NULL, '1764756596-M5YFSP3.png', NULL, NULL, 1, '2025-12-03 10:09:56', '2025-12-03 10:09:56'),
(570, 263, NULL, NULL, '1764948979-2vDsPW55.png', NULL, NULL, 1, '2025-12-05 15:36:19', '2025-12-05 15:36:19'),
(571, 263, NULL, NULL, '1764949587-H2pySW12.png', NULL, NULL, 1, '2025-12-05 15:46:27', '2025-12-05 15:46:27'),
(572, 263, NULL, NULL, '1764949729-NSY7YW12.png', NULL, NULL, 1, '2025-12-05 15:48:49', '2025-12-05 15:48:49'),
(573, 263, NULL, NULL, '1764949821-MLPLtW1.png', NULL, NULL, 1, '2025-12-05 15:50:21', '2025-12-05 15:50:21'),
(574, 256, NULL, NULL, '1765433641-VkRYPl33.png', NULL, NULL, 1, '2025-12-11 06:14:01', '2025-12-11 06:14:01'),
(575, 259, NULL, NULL, '1765438711-8vOhfl33.png', NULL, NULL, 1, '2025-12-11 07:38:31', '2025-12-11 07:38:31'),
(576, 237, NULL, NULL, NULL, NULL, NULL, 1, '2025-12-12 13:26:55', '2025-12-12 13:26:55'),
(581, 257, NULL, NULL, '1765615511-Xr2Nfl33.png', NULL, NULL, 1, '2025-12-13 08:44:01', '2025-12-13 08:45:11'),
(582, 257, NULL, NULL, '1765615597-EGEdYl33.png', NULL, NULL, 1, '2025-12-13 08:46:37', '2025-12-13 08:46:37'),
(583, 257, NULL, NULL, '1765615747-cgjtql33.png', NULL, NULL, 1, '2025-12-13 08:49:07', '2025-12-13 08:49:07'),
(584, 257, NULL, NULL, '1765615856-AO4nal33.png', NULL, NULL, 1, '2025-12-13 08:50:56', '2025-12-13 08:50:56'),
(586, 190, NULL, NULL, '1765616102-81rUYl33.png', NULL, NULL, 1, '2025-12-13 08:55:02', '2025-12-13 08:55:02'),
(587, 190, NULL, NULL, '1765616450-dcuWel33.png', NULL, NULL, 1, '2025-12-13 09:00:50', '2025-12-13 09:00:50'),
(598, 236, NULL, NULL, '1766549450-CpPZoNPL1 .png', NULL, NULL, 1, '2025-12-24 04:10:50', '2025-12-24 04:10:50'),
(599, 236, NULL, NULL, '1766549530-k0yKwNPL1.png', NULL, NULL, 1, '2025-12-24 04:12:10', '2025-12-24 04:12:10'),
(600, 236, NULL, NULL, '1766549658-6BYcjNPL .png', NULL, NULL, 1, '2025-12-24 04:14:18', '2025-12-24 04:14:18'),
(601, 236, NULL, NULL, '1766549803-SqIbNNPL .png', NULL, NULL, 1, '2025-12-24 04:16:43', '2025-12-24 04:16:43'),
(602, 248, NULL, NULL, '1767198996-xbWFgA234.png', NULL, NULL, 1, '2025-12-31 16:36:36', '2025-12-31 16:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_grade`
--

CREATE TABLE `cl_trip_grade` (
  `id` int(11) NOT NULL,
  `grade_message` varchar(300) DEFAULT NULL,
  `trip_grade` varchar(191) DEFAULT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_grade`
--

INSERT INTO `cl_trip_grade` (`id`, `grade_message`, `trip_grade`, `icon`) VALUES
(1, 'Light walking and generally level hiking that is good for most fitness levels. During these trips, hill-walking experience is desirable.', 'Easy', 'easy.svg'),
(2, 'Trek has various types of moderate to difficult terrain, including rough trails and normally 3 to 5 hours a day. Requires an average to above average fitness level.', 'Moderate', 'moderate.svg'),
(3, 'High altitude treks above 3000 meters or in fairly difficult terrain- normally 4 to 6 hours a day. Requires an above average fitness level and high level of stamina.', 'Challenging', 'hard.svg'),
(4, 'These high altitude treks or passes are known to be the most strenuous and has difficult terrain and conditions. These treks may require a degree of mountaineering skills and you capability of carrying on normally at an altitude of 4000-5600 meters. Daily walking is 5-8 hours approx.', 'Strenuous', 'extreme.svg');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_groups`
--

CREATE TABLE `cl_trip_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `sub_title` varchar(191) DEFAULT 'NULL',
  `uri` varchar(191) NOT NULL,
  `banner` varchar(191) DEFAULT 'NULL',
  `content` longtext DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `ordering` varchar(191) DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_groups`
--

INSERT INTO `cl_trip_groups` (`id`, `title`, `sub_title`, `uri`, `banner`, `content`, `meta_keyword`, `meta_description`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Luxury Trips', '7Zg_aPM2pVc', 'luxury-trip', NULL, '<p>Tourism Industry has been highly commercialized in Nepal lately which instigated the birth of countless Travel enterprises, especially Trekking and Tours organizers. Nevertheless, it is a matter of the fact that one ought to cherry-pick their trip organizer very wisely in order to pursue their dream trip. The question is legitimate and logical that amongst numerous agencies, why to choose Nepal Mountain Trekkers and trust us to spend your valuable time and hard-earned money?</p>', 'Luxury Trips', 'Tourism Industry has been highly commercialized in Nepal lately which instigated the birth of countless Travel enterprises, especially Trekking and Tours organizers. Nevertheless, it is a matter of the fact that one ought to cherry-pick their trip organizer very wisely in order to pursue their dream trip. The question is legitimate and logical that amongst numerous agencies, why to choose Nepal Mountain Trekkers and trust us to spend your valuable time and hard-earned money?', '1', '1', '2022-11-29 08:32:14', '2023-02-01 18:23:36'),
(4, 'Is Popular', 'is popular', 'is-popular', NULL, '<p>For popular trips.</p>', NULL, NULL, '2', '1', '2022-12-09 08:38:26', '2022-12-29 03:02:42'),
(5, 'Experiences', NULL, 'experiences', 'koshi-tappu-national-park-oUnM1D4HSEBFsvGLKlvofwLYub7VZjLTO0FhumP1.jpg', NULL, 'Experiences', 'Experiences', '3', '1', '2023-02-01 18:24:01', '2023-02-01 19:40:24'),
(6, 'Holiday Types', NULL, 'holiday-types', '', NULL, NULL, NULL, '4', '1', '2023-04-27 10:31:05', '2023-04-27 10:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_group_rel`
--

CREATE TABLE `cl_trip_group_rel` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_itinerary`
--

CREATE TABLE `cl_trip_itinerary` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_detail_id` int(11) NOT NULL,
  `days` varchar(191) DEFAULT NULL,
  `meals` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `max_altitude` varchar(255) DEFAULT NULL,
  `distance` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `ordering` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_itinerary`
--

INSERT INTO `cl_trip_itinerary` (`id`, `trip_detail_id`, `days`, `meals`, `title`, `max_altitude`, `distance`, `duration`, `content`, `ordering`, `created_at`, `updated_at`) VALUES
(1300, 133, '1', NULL, 'Arrival in Islamabad', '500m', NULL, NULL, '<p>\r\n\r\nUpon arrival at Islamabad International Airport, you will be met by our representative and \r\ntransferred to your hotel. You will have the rest of the day to rest and explore the city.\r\n\r\n<br></p>', 1, '2023-07-30 17:33:20', '2023-07-30 17:33:57'),
(1301, 133, '2', NULL, 'Islamabad to Skardu', '2,228m', NULL, NULL, 'After breakfast, you will take a domestic flight to Skardu. Upon arrival, you will be transferred to your hotel. You will have the rest of the day to explore the town and acclimatize to the altitude.', 2, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1302, 133, '3', NULL, 'Skardu to Askole', '3,048m', NULL, '6-7 Hours', 'After breakfast, you will drive to Askole, the last village before the trek. The drive takes around 6-7 hours and passes through the beautiful Shigar Valley. You will camp overnight in Askole.', 3, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1303, 133, '4', NULL, 'Askole to Jhola', '3,100m', NULL, NULL, 'After breakfast, you will start your trek to Jhola. The trail follows the Braldu River and passes through the beautiful Biafo Glacier. You will camp overnight in Jhola', 4, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1304, 133, '5', NULL, 'Jhola to Paiyu', '3,450m', NULL, NULL, 'After breakfast, you will continue your trek to Paiyu. The trail passes through the beautiful Baltoro Glacier and offers stunning views of the surrounding peaks. You will camp overnight in Paiyu.', 5, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1305, 133, '6', NULL, 'Rest day in Paiyu', '3,450m', NULL, NULL, 'Today is a rest day to acclimatize to the altitude. You can explore the surrounding area and enjoy the beautiful views.', 6, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1306, 133, '7', NULL, 'Paiyu to Khoburtse', '3,800m', NULL, NULL, 'After breakfast, you will continue your trek to Khoburtse. The trail passes through the beautiful Paiyu Peak and offers stunning views of the surrounding peaks. You will camp overnight in Khoburtse.', 7, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1307, 133, '8', NULL, 'Khoburtse to Urdukas', '4,100m', NULL, NULL, 'After breakfast, you will continue your trek to Urdukas. The trail passes through the beautiful Goro II and offers stunning views of the surrounding peaks. You will camp overnight in Urdukas.', 8, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1308, 133, '9', NULL, 'Urdukas to Goro II', '4,500m', NULL, NULL, 'After breakfast, you will continue your trek to Goro II. The trail passes through the beautiful Baltoro Glacier and offers stunning views of the surrounding peaks. You will camp overnight in Goro II.', 9, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1309, 133, '10', NULL, 'Goro II to Concordia', '4,600m', NULL, NULL, 'After breakfast, you will continue your trek to Concordia. The trail passes through the beautiful K2 and offers stunning views of the surrounding peaks. You will camp overnight in Concordia.', 10, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1310, 133, '11', NULL, 'Rest day in Concordia', '4,600m', NULL, NULL, 'Today is a rest day to acclimatize to the altitude. You can explore the surrounding area and enjoy the beautiful views.', 11, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1311, 133, '12', NULL, 'Concordia to Masherbrum Base Camp', '4,800m', NULL, NULL, 'After breakfast, you will continue your trek to Masherbrum Base Camp. The trail passes through the beautiful Masherbrum Peak and offers stunning views of the surrounding peaks. You will camp overnight in Masherbrum Base Camp.', 12, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1312, 133, '13-14', NULL, 'Explore Masherbrum Base Camp', '4,800m', NULL, NULL, 'These two days are for exploring the Masherbrum Base Camp and surrounding areas. You can hike to nearby peaks and enjoy the beautiful views.', 13, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1313, 133, '15', NULL, 'Masherbrum Base Camp to Goro II', '4,500m', NULL, NULL, 'After breakfast, you will start your trek back to Goro II. You will camp overnight in Goro II.', 14, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1314, 133, '16', NULL, 'Goro II to Khoburtse', '3,800m', NULL, NULL, 'After breakfast, you will continue your trek to Khoburtse. You will camp overnight in Khoburtse.', 15, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1315, 133, '17', NULL, 'Khoburtse to Paiyu', '3,450m', NULL, NULL, 'After breakfast, you will continue your trek to Paiyu. You will camp overnight in Paiyu.', 16, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1316, 133, '18', NULL, 'Paiyu to Jhola', '3,100m', NULL, NULL, 'After breakfast, you will continue your trek to Jhola. You will camp overnight in Jhola.', 17, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1317, 133, '19', NULL, 'Jhola to Askole', '3,048m', NULL, NULL, 'After breakfast, you will continue your trek to Askole. You will camp overnight in Askole.', 18, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1318, 133, '20', NULL, 'Askole to Skardu', '2,228m', NULL, NULL, 'After breakfast, you will drive back to Skardu. You will have the rest of the day to explore the town and relax.', 19, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1319, 133, '21', NULL, 'Skardu to Islamabad', '500m', NULL, NULL, 'After breakfast, you will take a domestic flight back to Islamabad. Upon arrival, you will be transferred to your hotel. You will have the rest of the day to explore the city.', 20, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1320, 133, '22', NULL, 'Departure from Islamabad', NULL, NULL, NULL, 'After breakfast, you will be transferred to Islamabad International Airport for your departure flight.', 21, '2023-07-30 17:44:05', '2023-07-30 17:44:05'),
(1355, 135, '1', NULL, 'Arrival in Islamabad', NULL, NULL, NULL, 'Upon arrival in Islamabad, you will be greeted by our representative and transferred to your hotel. You will have a briefing about the trek and have time to explore the city.', 1, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1356, 135, '2', NULL, 'Islamabad to Skardu', NULL, NULL, '1 Hour', 'Today, you will take a flight from Islamabad to Skardu, which is the starting point of the trek. The flight takes around 1 hour and you will have stunning views of the Himalayas along the way.', 2, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1357, 135, '3', NULL, 'Skardu', NULL, NULL, NULL, 'Today, you will have a rest day in Skardu. You can explore the city and visit the famous Kharpocho Fort.', 3, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1358, 135, '4', NULL, 'Skardu to Askole', NULL, NULL, '6-7 Hours', 'Today, you will drive to Askole, which is the starting point of the trek. The drive takes around 6-7 hours and you will pass through beautiful landscapes and small villages.', 4, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1359, 135, '5', NULL, 'Askole to Jhola', '3,100m', NULL, NULL, 'Today, you will start your trek and walk through lush forests, rice paddies, and small villages. You will reach Jhola, which is a small village located at an altitude of 3,100 meters.', 5, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1360, 135, '6', NULL, 'Jhola to Paiju', '3,450m', NULL, NULL, 'Today, you will continue your trek and cross the Braldu River several times. You will pass through beautiful landscapes and reach Paiju, which is a small village located at an altitude of 3,450 meters.', 6, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1361, 135, '7', NULL, 'Paiju to Khoburtse', '3,600m', NULL, NULL, 'Today, you will trek through beautiful forests and reach Khoburtse, which is a small village located at an altitude of 3,600 meters. You will have stunning views of the Baltoro Glacier along the way.', 7, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1362, 135, '8', NULL, 'Khoburtse to Urdukas', '4,130m', NULL, NULL, 'Today, you will trek to Urdukas, which is a small village located at an altitude of 4,130 meters. You will pass through beautiful landscapes and have stunning views of the Himalayas.', 8, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1363, 135, '9', NULL, 'Urdukas to Goro II', '4,350m', NULL, NULL, 'Today, you will trek to Goro II, which is a small village located at an altitude of 4,350 meters. You will have stunning views of the Baltoro Glacier along the way.', 9, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1364, 135, '10', NULL, 'Goro II to Concordia', '4,600m', NULL, NULL, 'Today, you will trek to Concordia, which is a small village located at an altitude of 4,600 meters. You will have stunning views of the Himalayas, including K2, Broad Peak, and Gasherbrum.', 10, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1365, 135, '11', NULL, 'Rest day in Concordia', NULL, NULL, NULL, 'Today, you will have a rest day in Concordia. You can explore the village and interact with the locals.', 11, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1366, 135, '12', NULL, 'Trek to K2 Base Camp', '5,150m', NULL, NULL, 'Today, you will trek to K2 Base Camp, which is located at an altitude of 5,150 meters. You will have stunning views of K2 and the surrounding Himalayas.', 12, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1367, 135, '13-15', NULL, 'Explore K2 Base Camp', NULL, NULL, NULL, 'These days will be spent exploring K2 Base Camp and the surrounding areas. You can hike to nearby glaciers and have stunning views of the Himalayas.', 13, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1368, 135, '16', NULL, 'Trek back to Concordia', NULL, NULL, NULL, 'Today, you will trek back to Concordia and spend the night there.', 14, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1369, 135, '17', NULL, 'Trek to Ali Camp', '5,100m', NULL, NULL, 'Today, you will trek to Ali Camp, which is a small village located at an altitude of 5,100 meters. You will have stunning views of the Himalayas along the way.', 15, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1370, 135, '18', NULL, 'Trek to Goro I', '4,300m', NULL, NULL, 'Today, you will trek to Goro I, which is a small village located at an altitude of 4,300 meters. You will have stunning views of the Baltoro Glacier along the way.', 16, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1371, 135, '19', NULL, 'Trek to Khoburtse', NULL, NULL, NULL, 'Today, you will trek back to Khoburtse and spend the night there.', 17, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1372, 135, '20', NULL, 'Trek to Paiju', NULL, NULL, NULL, 'Today, you will trek back to Paiju and spend the night there.', 18, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1373, 135, '21', NULL, 'Trek to Jhola', NULL, NULL, NULL, 'Today, you will trek back to Jhola and spend the night there', 19, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1374, 135, '22', NULL, 'Trek to Askole', NULL, NULL, NULL, 'Today, you will trek back to Askole and spend the night there.', 20, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1375, 135, '23', NULL, 'Drive to Skardu', NULL, NULL, NULL, 'Today, you will drive back to Skardu and spend the night there.', 21, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1376, 135, '24', NULL, 'Skardu to Islamabad', NULL, NULL, NULL, 'Today, you will take a flight from Skardu to Islamabad and spend the night there.', 22, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(1377, 135, '25', NULL, 'Departure', NULL, NULL, NULL, 'Today, you will be transferred to the airport for your flight back home.', 23, '2023-07-30 18:34:25', '2023-07-30 18:34:25'),
(2501, 122, '52', NULL, 'Contingency/leisure day in Kathmandu.', NULL, NULL, NULL, '<blockquote><p></p><p></p><p></p></blockquote>', 17, '2025-12-03 13:53:24', '2025-12-03 13:58:31'),
(2502, 122, '2', NULL, 'Preparation day in Kathmandu for equipment and permits.', NULL, NULL, NULL, NULL, 2, '2025-12-03 13:53:24', '2025-12-03 13:54:57'),
(2503, 122, '3', NULL, 'Flight to Lukla (2,860m) and trek to Phakding (2,610m).', NULL, NULL, NULL, NULL, 3, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2504, 122, '4', NULL, 'Trek to Namche Bazaar (3,440m).', NULL, NULL, NULL, NULL, 4, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2505, 122, '5', NULL, 'Acclimatization and rest day in Namche Bazaar.', NULL, NULL, NULL, NULL, 5, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2506, 122, '6', NULL, 'Trek to Debuche (3,870m).', NULL, NULL, NULL, NULL, 6, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2507, 122, '7', NULL, 'Trek to Dingboche (4,410m).', NULL, NULL, NULL, NULL, 7, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2508, 122, '8', NULL, 'Trek to Lobuche (4,910m).', NULL, NULL, NULL, NULL, 8, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2509, 122, '9', NULL, 'Trek to Everest Base Camp (5,364m).', NULL, NULL, NULL, NULL, 9, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2510, 122, '10-30', NULL, 'Acclimatization rotations between Base Camp and higher camps (Camp I, II & III).', NULL, NULL, NULL, NULL, 10, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2511, 122, '31-46', NULL, 'Summit period – push to South Col, Everest Summit (8,849m), and return to Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2512, 122, '47', NULL, 'Base Camp clean-up and preparation for descent.', NULL, NULL, NULL, NULL, 12, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2513, 122, '48', NULL, 'Trek down to Pheriche (4,371m).', NULL, NULL, NULL, NULL, 13, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2514, 122, '49', NULL, 'Trek to Namche Bazaar.', NULL, NULL, NULL, NULL, 14, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2515, 122, '50', NULL, 'Trek to Lukla.', NULL, NULL, NULL, NULL, 15, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2516, 122, '51', NULL, 'Fly back to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 16, '2025-12-03 13:53:24', '2025-12-03 13:56:16'),
(2517, 122, '53', NULL, 'Transfer to international airport for final departure.', NULL, NULL, NULL, NULL, 18, '2025-12-03 13:53:24', '2025-12-03 13:58:31'),
(2518, 122, '1', NULL, 'Arrival in Kathmandu (1,400m), welcome dinner, and expedition briefing.', 'Hotel', NULL, 'Breakfast Included', '<p>\r\n\r\n</p><p>Welcome to Nepal! Upon arrival at Tribhuvan International Airport - TIA, you\'ll complete immigration and baggage collection before exiting the terminal. One of our representatives will be waiting outside the airport with a placard reading “Nepal Hiking Team” and will provide you with a transfer to your hotel.</p><p>The ride into the city gives you a first, honest look at Kathmandu as people go about their day, shops open their doors, and traffic weaves through the streets.</p>\r\n\r\n<br><p></p>', 1, '2025-12-03 14:00:28', '2026-02-02 07:01:42'),
(2519, 226, '1', NULL, 'Arrival in Kathmandu (1,400m), welcome dinner, and hotel transfer.', NULL, NULL, NULL, NULL, 1, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2520, 226, '2', NULL, 'Preparation day in Kathmandu with expedition briefing and equipment check.', NULL, NULL, NULL, NULL, 2, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2521, 226, '3', NULL, 'Fly to Bhadrapur (91m) and drive to Ilam Bazaar (1,200m).', NULL, NULL, NULL, NULL, 3, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2522, 226, '4', NULL, 'Drive to Jorpul (1,500m) via Phidim.', NULL, NULL, NULL, NULL, 4, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2523, 226, '5', NULL, 'Trek to Khebang (1,740m).', NULL, NULL, NULL, NULL, 5, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2524, 226, '6', NULL, 'Trek to Yamphudin (2,070m).', NULL, NULL, NULL, NULL, 6, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2525, 226, '7', NULL, 'Trek to Torongdin (2,995m).', NULL, NULL, NULL, NULL, 7, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2526, 226, '8-9', NULL, 'Trek to Tseram (3,870m) with acclimatization hike to Ramche (4,580m).', NULL, NULL, NULL, NULL, 8, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2527, 226, '10', NULL, 'Trek to Middle Camp (4,900m).', NULL, NULL, NULL, NULL, 9, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2528, 226, '11', NULL, 'Trek to Kanchenjunga Base Camp (5,143m) and set up Advance Base Camp.', NULL, NULL, NULL, NULL, 10, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2529, 226, '12-38', NULL, 'Acclimatization rotations to Camp I, II, and III, returning to Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2530, 226, '39-45', NULL, 'Summit period – push to Kanchenjunga Summit (8,586m) via Camp IV and return to Base Camp.', NULL, NULL, NULL, NULL, 12, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2531, 226, '46', NULL, 'Base Camp clean-up and preparation to descend.', NULL, NULL, NULL, NULL, 13, '2025-12-03 16:53:22', '2025-12-03 16:53:22'),
(2532, 226, '47', NULL, 'Trek back to Ramche (4,620m).', NULL, NULL, NULL, NULL, 14, '2025-12-03 16:53:22', '2025-12-03 16:55:28'),
(2533, 226, '48', NULL, 'Trek to Torongdin (2,995m).', NULL, NULL, NULL, NULL, 15, '2025-12-03 16:53:22', '2025-12-03 16:55:28'),
(2534, 226, '49', NULL, 'Trek to Yamphudin, drive to Jorpul and Birtamod.', NULL, NULL, NULL, NULL, 16, '2025-12-03 16:53:22', '2025-12-03 16:55:28'),
(2535, 226, '50', NULL, 'Drive to Bhadrapur, fly to Kathmandu, farewell dinner.', NULL, NULL, NULL, NULL, 17, '2025-12-03 16:53:22', '2025-12-03 16:55:28'),
(2536, 226, '51', NULL, 'Transfer to International Airport for final departure', NULL, NULL, NULL, NULL, 18, '2025-12-03 16:53:22', '2025-12-03 16:55:28'),
(2537, 228, '1', NULL, 'Arrival in Kathmandu (1,400m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2538, 228, '2', NULL, 'Rest day in Kathmandu, expedition briefing and preparation.', NULL, NULL, NULL, NULL, 2, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2539, 228, '3', NULL, 'Fly from Kathmandu to Tumlingtar and drive to Num (1,560m).', NULL, NULL, NULL, NULL, 3, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2540, 228, '4', NULL, 'Trek from Num to Seduwa (1,510m).', NULL, NULL, NULL, NULL, 4, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2541, 228, '5', NULL, 'Trek from Seduwa to Tashi Gaun (2,070m).', NULL, NULL, NULL, NULL, 5, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2542, 228, '6', NULL, 'Acclimatization day at Tashi Gaun.', NULL, NULL, NULL, NULL, 6, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2543, 228, '7', NULL, 'Trek from Tashi Gaun to Khongma (3,760m).', NULL, NULL, NULL, NULL, 7, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2544, 228, '8', NULL, 'Trek from Khongma to Dobato (4,010m).', NULL, NULL, NULL, NULL, 8, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2545, 228, '9', NULL, 'Trek from Dobato to Yangle Kharka (3,640m).', NULL, NULL, NULL, NULL, 9, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2546, 228, '10', NULL, 'Trek from Yangle Kharka to Langmale Kharka (4,450m).', NULL, NULL, NULL, NULL, 10, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2547, 228, '11', NULL, 'Trek from Langmale Kharka to Makalu Lower Base Camp (4,850m) and acclimatization.', NULL, NULL, NULL, NULL, 11, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2548, 228, '12-13', NULL, 'Rest and acclimatization at Lower Base Camp.', NULL, NULL, NULL, NULL, 12, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2549, 228, '14', NULL, 'Hike from Lower Base Camp to Higher (Main) Base Camp (5,600m).', NULL, NULL, NULL, NULL, 13, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2550, 228, '15-30', NULL, 'Rotational climbs between Base Camp and higher camps (Camp I, II, III).', NULL, NULL, NULL, NULL, 14, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2551, 228, '31-42', NULL, 'Summit attempt from Base Camp to Makalu summit (8,485m) and back.', NULL, NULL, NULL, NULL, 15, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2552, 228, '43', NULL, 'Base Camp cleanup and preparation for descent.', NULL, NULL, NULL, NULL, 16, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2553, 228, '44-47', NULL, 'Trek back through Yangle Kharka, Khongma, Seduwa, Num, and drive to Khandbari.', NULL, NULL, NULL, NULL, 17, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2554, 228, '48', NULL, 'Drive to Tumlingtar and fly back to Kathmandu; transfer to hotel.', NULL, NULL, NULL, NULL, 18, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2555, 228, '49', NULL, 'Leisure day in Kathmandu for sightseeing and shopping.', NULL, NULL, NULL, NULL, 19, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2556, 228, '50', NULL, 'Transfer to the international airport for departure.', NULL, NULL, NULL, NULL, 20, '2025-12-03 17:09:31', '2025-12-03 17:09:31'),
(2557, 227, '1', NULL, 'Arrival in Kathmandu (1,400m) & transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2558, 227, '2', NULL, 'Rest day in Kathmandu; expedition briefing, preparation, and shopping.', NULL, NULL, NULL, NULL, 2, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2559, 227, '3', NULL, 'Fly Kathmandu – Lukla, trek to Phakding (2,800m).', NULL, NULL, NULL, NULL, 3, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2560, 227, '4', NULL, 'Trek from Phakding to Namche Bazaar (3,440m).', NULL, NULL, NULL, NULL, 4, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2561, 227, '5', NULL, 'Acclimatization day at Namche Bazaar. Optional short hikes.', NULL, NULL, NULL, NULL, 5, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2562, 227, '6', NULL, 'Trek Namche Bazaar – Dibuche (3,870m).', NULL, NULL, NULL, NULL, 6, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2563, 227, '7', NULL, 'Trek Dibuche – Dingboche (4,243m).', NULL, NULL, NULL, NULL, 7, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2564, 227, '8', NULL, 'Trek Dingboche – Lobuche (4,930m).', NULL, NULL, NULL, NULL, 8, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2565, 227, '9', NULL, 'Trek Lobuche – Everest Base Camp (5,364m).', NULL, NULL, NULL, NULL, 9, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2566, 227, '10-39', NULL, 'Rotation period: Base Camp – Camp I, II, III – Base Camp (acclimatization and preparatory climbs).', NULL, NULL, NULL, NULL, 10, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2567, 227, '40-53', NULL, 'Summit period: Base Camp – Lhotse Summit – Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2568, 227, '54', NULL, 'Base Camp clean-up and preparation for descent.', NULL, NULL, NULL, NULL, 12, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2569, 227, '55', NULL, 'Trek Base Camp – Pheriche (4,371m).', NULL, NULL, NULL, NULL, 13, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2570, 227, '56', NULL, 'Trek Pheriche – Namche Bazaar.', NULL, NULL, NULL, NULL, 14, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2571, 227, '57', NULL, 'Trek Namche Bazaar – Lukla.', NULL, NULL, NULL, NULL, 15, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2572, 227, '58', NULL, 'Fly Lukla – Kathmandu; transfer to hotel.', NULL, NULL, NULL, NULL, 16, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2573, 227, '59', NULL, 'Leisure day in Kathmandu; cultural sightseeing and farewell dinner.', NULL, NULL, NULL, NULL, 17, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2574, 227, '60', NULL, 'Transfer to Kathmandu International Airport for departure.', NULL, NULL, NULL, NULL, 18, '2025-12-04 03:41:37', '2025-12-04 03:41:37'),
(2575, 229, '1', NULL, 'Arrival in Kathmandu (1,400 m) & transfer to hotel', NULL, NULL, NULL, NULL, 1, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2576, 229, '2', NULL, 'Rest day in Kathmandu; expedition briefing and preparation', NULL, NULL, NULL, NULL, 2, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2577, 229, '3', NULL, 'Fly to Pokhara (960 m) & transfer to hotel', NULL, NULL, NULL, NULL, 3, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2578, 229, '4', NULL, 'Drive from Pokhara to Marpha (2,670 m)', NULL, NULL, NULL, NULL, 4, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2579, 229, '5', NULL, 'Acclimatization day in Marpha; optional exploration of Muktinath', NULL, NULL, NULL, NULL, 5, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2580, 229, '6', NULL, 'Trek from Marpha to Yak Kharka (3,680 m)', NULL, NULL, NULL, NULL, 6, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2581, 229, '7', NULL, 'Trek to Dhampus Base Camp – Hidden Valley via Thapa Pass (5,244 m)', NULL, NULL, NULL, NULL, 7, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2582, 229, '8', NULL, 'Trek from Dhampus Base Camp to Dhaulagiri Base Camp (4,750 m)', NULL, NULL, NULL, NULL, 8, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2583, 229, '9-27', NULL, 'Rotation climbs: Base Camp – Camp I – Camp II – touch Camp III – Base Camp', NULL, NULL, NULL, NULL, 9, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2584, 229, '28-34', NULL, 'Summit push: Base Camp – Camp II – Camp III – Dhaulagiri Summit (8,167 m) – Return to Camp II/Base Camp', NULL, NULL, NULL, NULL, 10, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2585, 229, '35', NULL, 'Trek from Base Camp to Yak Kharka (3,680 m)', NULL, NULL, NULL, NULL, 11, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2586, 229, '36', NULL, 'Trek from Yak Kharka to Marpha', NULL, NULL, NULL, NULL, 12, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2587, 229, '37', NULL, 'Drive from Marpha to Pokhara', NULL, NULL, NULL, NULL, 13, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2588, 229, '38', NULL, 'Fly from Pokhara to Kathmandu & transfer to hotel', NULL, NULL, NULL, NULL, 14, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2589, 229, '39', NULL, 'Leisure day in Kathmandu; optional sightseeing', NULL, NULL, NULL, NULL, 15, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2590, 229, '40', NULL, 'Transfer to international airport for final departure', NULL, NULL, NULL, NULL, 16, '2025-12-05 06:33:08', '2025-12-05 06:33:08'),
(2591, 231, '1', NULL, 'Arrival in Kathmandu (1,400m) & transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-05 06:42:03', '2025-12-05 06:42:03'),
(2592, 231, '2', NULL, 'Rest day, expedition briefing, and preparation.', NULL, NULL, NULL, NULL, 2, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2593, 231, '3', NULL, 'Drive from Kathmandu to Besisahar (760m).', NULL, NULL, NULL, NULL, 3, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2594, 231, '4', NULL, 'Drive from Besisahar to Dharapani (1,860m).', NULL, NULL, NULL, NULL, 4, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2595, 231, '5', NULL, 'Trek from Dharapani to Gowa (2,530m).', NULL, NULL, NULL, NULL, 5, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2596, 231, '6', NULL, 'Trek from Gowa to Bhimthang (3,720m).', NULL, NULL, NULL, NULL, 6, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2597, 231, '7', NULL, 'Acclimatization day at Bhimthang.', NULL, NULL, NULL, NULL, 7, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2598, 231, '8', NULL, 'Trek from Bhimthang to Samdo (3,872m) via Larke Pass (5,160m).', NULL, NULL, NULL, NULL, 8, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2599, 231, '9', NULL, 'Trek from Samdo to Sama Gaun (3,541m).', NULL, NULL, NULL, NULL, 9, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2600, 231, '10', NULL, 'Trek from Sama Gaun to Manaslu Base Camp (4,700m).', NULL, NULL, NULL, NULL, 10, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2601, 231, '11-22', NULL, 'Rotation climbs: Base Camp – Camp I – Camp II – touch Camp III – back to Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2602, 231, '23-29', NULL, 'Summit push: Base Camp – Manaslu Summit (8,163m).', NULL, NULL, NULL, NULL, 12, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2603, 231, '30', NULL, 'Trek from Base Camp to Sama Gaun.', NULL, NULL, NULL, NULL, 13, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2604, 231, '31', NULL, 'Trek from Sama Gaun to Namrung (2,670m).', NULL, NULL, NULL, NULL, 14, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2605, 231, '32', NULL, 'Trek from Namrung to Philim (1,606m).', NULL, NULL, NULL, NULL, 15, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2606, 231, '33', NULL, 'Trek from Philim to Machha Khola (883m).', NULL, NULL, NULL, NULL, 16, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2607, 231, '34', NULL, 'Drive from Machha Khola to Kathmandu & transfer to hotel.', NULL, NULL, NULL, NULL, 17, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2608, 231, '35', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 18, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2609, 231, '36', NULL, 'Transfer to International Airport for final departure.', NULL, NULL, NULL, NULL, 19, '2025-12-05 06:42:04', '2025-12-05 06:42:04'),
(2610, 232, '1', NULL, 'Arrival in Kathmandu (1,400m) & transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2611, 232, '2', NULL, 'Rest day in Kathmandu; expedition briefing and preparation.', NULL, NULL, NULL, NULL, 2, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2612, 232, '3', NULL, 'Fly from Kathmandu to Pokhara & transfer to hotel.', NULL, NULL, NULL, NULL, 3, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2613, 232, '4', NULL, 'Drive from Pokhara to Dana (1,440m).', NULL, NULL, NULL, NULL, 4, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2614, 232, '5', NULL, 'Helicopter flight from Dana to Annapurna I Base Camp (4,190m).', NULL, NULL, NULL, NULL, 5, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2615, 232, '6-29', NULL, 'Rotation climbs: Base Camp – Camp I – Camp II – back to Base Camp.', NULL, NULL, NULL, NULL, 6, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2616, 232, '30-37', NULL, 'Summit push: Base Camp – Annapurna I Summit (8,091m) – Base Camp.', NULL, NULL, NULL, NULL, 7, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2617, 232, '38', NULL, 'Helicopter flight from Base Camp to Dana (1,440m).', NULL, NULL, NULL, NULL, 8, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2618, 232, '39', NULL, 'Drive from Dana to Pokhara & fly to Kathmandu.', NULL, NULL, NULL, NULL, 9, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2619, 232, '40', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 10, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2620, 232, '41', NULL, 'Transfer to International Airport for final departure.', NULL, NULL, NULL, NULL, 11, '2025-12-05 06:48:15', '2025-12-05 06:48:15'),
(2621, 233, '1', NULL, 'Arrival in Kathmandu (1,400m) and transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2622, 233, '2', NULL, 'Rest day in Kathmandu with expedition briefing and preparation.', NULL, NULL, NULL, NULL, 2, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2623, 233, '3', NULL, 'Fly to Lukla and trek to Phakding (2,800m).', NULL, NULL, NULL, NULL, 3, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2624, 233, '4', NULL, 'Trek from Phakding to Namche Bazaar (3,440m).', NULL, NULL, NULL, NULL, 4, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2625, 233, '5', NULL, 'Acclimatization day in Namche Bazaar.', NULL, NULL, NULL, NULL, 5, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2626, 233, '6', NULL, 'Trek from Namche Bazaar to Dibuche (3,870m).', NULL, NULL, NULL, NULL, 6, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2627, 233, '7', NULL, 'Trek from Dibuche to Dingboche (4,243m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2628, 233, '8', NULL, 'Trek from Dingboche to Lobuche (4,930m).', NULL, NULL, NULL, NULL, 8, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2629, 233, '9', NULL, 'Trek from Lobuche to Everest Base Camp (5,364m).', NULL, NULL, NULL, NULL, 9, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2630, 233, '10-39', NULL, 'Rotation climbs between Base Camp, Camp I, Camp II, and Camp III, returning to Base Camp.', NULL, NULL, NULL, NULL, 10, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2631, 233, '40-53', NULL, 'Summit push to Everest Summit (8,848.86m) and Lhotse Summit (8,516m), returning to Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2632, 233, '54', NULL, 'Base Camp clean-up and preparation to descend.', NULL, NULL, NULL, NULL, 12, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2633, 233, '55', NULL, 'Trek from Base Camp to Pheriche (4,371m).', NULL, NULL, NULL, NULL, 13, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2634, 233, '56', NULL, 'Trek from Pheriche to Namche Bazaar.', NULL, NULL, NULL, NULL, 14, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2635, 233, '57', NULL, 'Trek from Namche Bazaar to Lukla.', NULL, NULL, NULL, NULL, 15, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2636, 233, '58', NULL, 'Fly from Lukla to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 16, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2637, 233, '59', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 17, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2638, 233, '60', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 18, '2025-12-06 01:44:32', '2025-12-06 01:44:32'),
(2639, 234, '1', NULL, 'Arrival in Kathmandu (1,400m) & transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2640, 234, '2', NULL, 'Rest day in Kathmandu; expedition briefing & preparation.', NULL, NULL, NULL, NULL, 2, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2641, 234, '3', NULL, 'Drive Kathmandu to Besisahar (760m).', NULL, NULL, NULL, NULL, 3, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2642, 234, '4', NULL, 'Drive Besisahar to Koto (2,600m).', NULL, NULL, NULL, NULL, 4, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2643, 234, '5', NULL, 'Trek Koto to Meta (3,560m).', NULL, NULL, NULL, NULL, 5, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2644, 234, '6', NULL, 'Trek Meta to Kyang (3,840m).', NULL, NULL, NULL, NULL, 6, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2645, 234, '7', NULL, 'Trek Kyang to Phu Gaun (3,900m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2646, 234, '8', NULL, 'Acclimatization day at Phu Gaun.', NULL, NULL, NULL, NULL, 8, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2647, 234, '9', NULL, 'Trek Phu Gaun to Himlung Base Camp (4,900m).', NULL, NULL, NULL, NULL, 9, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2648, 234, '10-20', NULL, 'Rotation climbs: Base Camp → Camp I → Camp II → return to Base Camp.', NULL, NULL, NULL, NULL, 10, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2649, 234, '21-26', NULL, 'Summit period: Base Camp → Himlung Summit (7,126m) → return to Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2650, 234, '27', NULL, 'Trek Base Camp to Meta (3,560m).', NULL, NULL, NULL, NULL, 12, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2651, 234, '28', NULL, 'Trek Meta to Koto (2,600m).', NULL, NULL, NULL, NULL, 13, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2652, 234, '29', NULL, 'Drive Koto to Besisahar (760m).', NULL, NULL, NULL, NULL, 14, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2653, 234, '30', NULL, 'Drive Besisahar to Kathmandu; transfer to hotel.', NULL, NULL, NULL, NULL, 15, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2654, 234, '31', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 16, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2655, 234, '32', NULL, 'Transfer to International Airport for departure.', NULL, NULL, NULL, NULL, 17, '2025-12-06 02:24:42', '2025-12-06 02:24:42'),
(2656, 235, '1', NULL, 'Arrival in Kathmandu (1,400m) and transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2657, 235, '2', NULL, 'Rest day in Kathmandu with expedition briefing and preparation.', NULL, NULL, NULL, NULL, 2, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2661, 235, '4', NULL, 'Trek from Chutanga to Tuli Kharka (3,900m) via Zatrawa La Pass (4,610m).', NULL, NULL, NULL, NULL, 4, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2662, 235, '3', NULL, 'Fly from Kathmandu to Lukla and trek to Chutanga (3,060m).', NULL, NULL, NULL, NULL, 3, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2663, 235, '5', NULL, 'Trek from Tuli Kharka to Kothe (4,095m).', NULL, NULL, NULL, NULL, 5, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2665, 235, '6', NULL, 'Trek from Kothe to Thangnak (4,350m).', NULL, NULL, NULL, NULL, 6, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2667, 235, '7', NULL, 'Trek from Thangnak to Khare (5,054m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2670, 235, '8', NULL, 'Acclimatization day at Khare.', NULL, NULL, NULL, NULL, 8, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2673, 235, '9', NULL, 'Trek from Khare to Khongma Dingma.', NULL, NULL, NULL, NULL, 9, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2676, 235, '10', NULL, 'Trek from Khongma Dingma to Seto Pokhari (5,035m).', NULL, NULL, NULL, NULL, 10, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2680, 235, '11', NULL, 'Trek from Seto Pokhari to Baruntse Base Camp (5,400m).', NULL, NULL, NULL, NULL, 11, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2684, 235, '12-19', NULL, 'Rotation climbs between Base Camp, Camp I, and Camp II, returning to Base Camp.', NULL, NULL, NULL, NULL, 12, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2689, 235, '25', NULL, 'Trek from Base Camp to Amphu Lapcha High Camp.', NULL, NULL, NULL, NULL, 14, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2693, 235, '26', NULL, 'Cross Amphu Lapcha Pass and trek to Chhukung.', NULL, NULL, NULL, NULL, 15, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2696, 235, '27', NULL, 'Trek from Chhukung to Tengboche.', NULL, NULL, NULL, NULL, 16, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2698, 235, '28', NULL, 'Trek from Tengboche to Namche Bazaar.', NULL, NULL, NULL, NULL, 17, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2700, 235, '29', NULL, 'Trek from Namche Bazaar to Lukla.', NULL, NULL, NULL, NULL, 18, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2703, 235, '30', NULL, 'Fly from Lukla to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 19, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2706, 235, '31', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 20, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2709, 235, '32', NULL, 'Transfer to the International Airport for final departure.', NULL, NULL, NULL, NULL, 21, '2025-12-06 02:37:24', '2025-12-06 02:37:24'),
(2719, 235, '20-24', NULL, 'Summit push from Base Camp to Baruntse Summit (7,129m) and return to Base Camp.', NULL, NULL, NULL, NULL, 13, '2025-12-06 02:43:29', '2025-12-06 02:43:29'),
(2720, 236, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2721, 236, '2', NULL, 'Rest day in Kathmandu with expedition briefing and gear check.', NULL, NULL, NULL, NULL, 2, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2722, 236, '3', NULL, 'Fly from Kathmandu to Nepalgunj and transfer to the hotel.', NULL, NULL, NULL, NULL, 3, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2723, 236, '4', NULL, 'Fly from Nepalgunj to Juphal (2,470 m) and drive to Dunai (2,150 m).', NULL, NULL, NULL, NULL, 4, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2724, 236, '5', NULL, 'Trek from Dunai to Tarakot (2,537 m).', NULL, NULL, NULL, NULL, 5, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2725, 236, '6', NULL, 'Trek from Tarakot to Musi Khola (2,875 m).', NULL, NULL, NULL, NULL, 6, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2726, 236, '7', NULL, 'Trek from Musi Khola to Kagkot (3,200 m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2727, 236, '8', NULL, 'Acclimatization day at Kagkot.', NULL, NULL, NULL, NULL, 8, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2728, 236, '9', NULL, 'Trek from Kagkot to Panjing (4,200 m).', NULL, NULL, NULL, NULL, 9, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2729, 236, '10', NULL, 'Trek from Panjing to German Base Camp (4,500 m).', NULL, NULL, NULL, NULL, 10, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2730, 236, '11-13', NULL, 'Trek from German Base Camp to Putha Hiunchuli Base Camp (4,910 m).', NULL, NULL, NULL, NULL, 11, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2731, 236, '14-29', NULL, 'Climbing period from Base Camp to the Summit (7,246 m) and back to Base Camp.', NULL, NULL, NULL, NULL, 12, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2732, 236, '30', NULL, 'Trek from Base Camp to Kagkot.', NULL, NULL, NULL, NULL, 13, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2733, 236, '31', NULL, 'Trek from Kagkot to Lashicap (2,775 m).', NULL, NULL, NULL, NULL, 14, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2734, 236, '32', NULL, 'Trek from Lashicap to Dunai.', NULL, NULL, NULL, NULL, 15, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2735, 236, '33', NULL, 'Drive from Dunai to Juphal and fly to Nepalgunj, then to Kathmandu with hotel transfer.', NULL, NULL, NULL, NULL, 16, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2736, 236, '34', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 17, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2737, 236, '35', NULL, 'Transfer to the International Airport for final departure.Transfer to the International Airport for final departure.', NULL, NULL, NULL, NULL, 18, '2025-12-06 02:53:20', '2025-12-06 02:53:20'),
(2738, 237, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2739, 237, '2', NULL, 'Rest day in Kathmandu with expedition briefing and preparation.', NULL, NULL, NULL, NULL, 2, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2740, 237, '3', NULL, 'Fly from Kathmandu to Lukla and trek to Phakding (2,800 m).', NULL, NULL, NULL, NULL, 3, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2741, 237, '4', NULL, 'Trek from Phakding to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 4, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2742, 237, '5', NULL, 'Acclimatization day at Namche Bazaar.', NULL, NULL, NULL, NULL, 5, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2743, 237, '6', NULL, 'Trek from Namche to Tengboche Monastery (3,860 m).', NULL, NULL, NULL, NULL, 6, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2744, 237, '7', NULL, 'Trek from Tengboche to Dingboche (4,243 m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2745, 237, '8', NULL, 'Trek from Dingboche to Lobuche (4,930 m).', NULL, NULL, NULL, NULL, 8, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2746, 237, '9', NULL, 'Trek from Lobuche to Gorak Shep (5,140 m).', NULL, NULL, NULL, NULL, 9, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2747, 237, '10', NULL, 'Trek from Gorak Shep to Pumori Base Camp (5,220 m).', NULL, NULL, NULL, NULL, 10, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2748, 237, '11-28', NULL, 'Climbing period from Base Camp to Pumori Summit (7,145 m) and back to Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2749, 237, '29', NULL, 'Trek from Base Camp to Pangboche (3,930 m).', NULL, NULL, NULL, NULL, 12, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2750, 237, '30', NULL, 'Trek from Pangboche to Namche Bazaar.', NULL, NULL, NULL, NULL, 13, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2751, 237, '31', NULL, 'Trek from Namche Bazaar to Lukla.', NULL, NULL, NULL, NULL, 14, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2752, 237, '32', NULL, 'Fly from Lukla to Kathmandu and transfer to the hotel.', NULL, NULL, NULL, NULL, 15, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2753, 237, '33', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 16, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2754, 237, '34', NULL, 'Transfer to the International Airport for final departure.', NULL, NULL, NULL, NULL, 17, '2025-12-06 03:03:53', '2025-12-06 03:03:53'),
(2755, 190, '1', NULL, 'Arrival in Kathmandu (1,400m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2756, 190, '2', NULL, 'Permit preparation, gear check, and shopping in Kathmandu.', NULL, NULL, NULL, NULL, 2, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2757, 190, '3', NULL, 'Fly from Kathmandu to Lukla (2,860m) and trek to Chutanga (3,050m).', NULL, NULL, NULL, NULL, 3, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2758, 190, '4', NULL, 'Rest and acclimatization day at Chutanga.', NULL, NULL, NULL, NULL, 4, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2759, 190, '5', NULL, 'Trek from Chutanga to Thuli Kharka (4,100m) via Zatrwa La Pass (4,610m).', NULL, NULL, NULL, NULL, 5, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2760, 190, '6', NULL, 'Trek from Thuli Kharka to Kothe (3,700m).', NULL, NULL, NULL, NULL, 6, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2761, 190, '7', NULL, 'Trek from Kothe to Thangnak (4,350m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2762, 190, '8', NULL, 'Trek from Thangnak to Khare (5,054m).', NULL, NULL, NULL, NULL, 8, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2763, 190, '9', NULL, 'Acclimatization and training day at Khare.', NULL, NULL, NULL, NULL, 9, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2764, 190, '10', NULL, 'Trek from Khare to Mera Peak High Camp (5,790m).', NULL, NULL, NULL, NULL, 10, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2765, 190, '11', NULL, 'Summit Mera Peak (6,476m) and descend to Khare.', NULL, NULL, NULL, NULL, 11, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2766, 190, '12', NULL, 'Trek from Khare to Seto Pokhari (5,035m).', NULL, NULL, NULL, NULL, 12, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2767, 190, '13', NULL, 'Trek from Seto Pokhari to Baruntse Base / Amphu Lapcha Base Camp (5,400m).', NULL, NULL, NULL, NULL, 13, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2768, 190, '14', NULL, 'Cross Amphu Lapcha Pass (5,850m) and trek to Chhukung (4,730m).', NULL, NULL, NULL, NULL, 14, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2769, 190, '15', NULL, 'Trek from Chhukung to Island Peak High Camp (5,550m).', NULL, NULL, NULL, NULL, 15, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2770, 190, '16', NULL, 'Summit Island Peak (6,189m) and return to Chhukung.', NULL, NULL, NULL, NULL, 16, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2771, 190, '17', NULL, 'Trek from Chhukung to Lobuche Village (4,940m).', NULL, NULL, NULL, NULL, 17, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2772, 190, '18', NULL, 'Trek from Lobuche to Everest Base Camp and return to Gorakshep (5,170m).', NULL, NULL, NULL, NULL, 18, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2773, 190, '19', NULL, 'Trek to Kalapatthar (5,545m) for sunrise and return to Lobuche.', NULL, NULL, NULL, NULL, 19, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2774, 190, '20', NULL, 'Trek from Lobuche to Lobuche High Camp (5,400m).', NULL, NULL, NULL, NULL, 20, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2775, 190, '21', NULL, 'Summit Lobuche Peak (6,119m) and descend to Lobuche.', NULL, NULL, NULL, NULL, 21, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2776, 190, '22', NULL, 'Contingency day.', NULL, NULL, NULL, NULL, 22, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2777, 190, '23', NULL, 'Trek from Lobuche to Tengboche.', NULL, NULL, NULL, NULL, 23, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2778, 190, '24', NULL, 'Trek from Tengboche to Namche Bazaar.', NULL, NULL, NULL, NULL, 24, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2779, 190, '25', NULL, 'Trek from Namche Bazaar to Lukla.', NULL, NULL, NULL, NULL, 25, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2780, 190, '26', NULL, 'Fly from Lukla to Kathmandu and transfer to the hotel.', NULL, NULL, NULL, NULL, 26, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2781, 190, '27', NULL, 'Sightseeing in Kathmandu and final departure.', NULL, NULL, NULL, NULL, 27, '2025-12-06 03:21:14', '2025-12-06 03:21:14'),
(2782, 240, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2783, 240, '2', NULL, 'Expedition preparation, permit finalization, and briefing in Kathmandu.', NULL, NULL, NULL, NULL, 2, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2784, 240, '3', NULL, 'Fly from Kathmandu to Lukla (2,860 m) and trek to Phakding (2,610 m).', NULL, NULL, NULL, NULL, 3, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2785, 240, '4', NULL, 'Trek from Phakding to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 4, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2786, 240, '5', NULL, 'Acclimatization day at Namche Bazaar.', NULL, NULL, NULL, NULL, 5, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2787, 240, '6', NULL, 'Trek from Namche Bazaar to Tengboche (3,870 m).', NULL, NULL, NULL, NULL, 6, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2788, 240, '7', NULL, 'Trek from Tengboche to Dingboche (4,410 m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2789, 240, '8', NULL, 'Acclimatization and rest day at Dingboche.', NULL, NULL, NULL, NULL, 8, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2790, 240, '9', NULL, 'Trek from Dingboche to Lobuche Village (4,940 m).', NULL, NULL, NULL, NULL, 9, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2791, 240, '10', NULL, 'Trek from Lobuche Village to Lobuche High Camp (5,400 m).', NULL, NULL, NULL, NULL, 10, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2792, 240, '11', NULL, 'Summit Lobuche East (6,119 m) and descend to Thukla (4,620 m).', NULL, NULL, NULL, NULL, 11, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2793, 240, '12', NULL, 'Trek from Thukla back to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 12, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2794, 240, '13', NULL, 'Trek from Namche Bazaar to Lukla (2,860 m).', NULL, NULL, NULL, NULL, 13, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2795, 240, '14', NULL, 'Fly from Lukla to Kathmandu and transfer to the hotel.', NULL, NULL, NULL, NULL, 14, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2796, 240, '15', NULL, 'Leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 15, '2025-12-06 03:27:36', '2025-12-06 03:27:36');
INSERT INTO `cl_trip_itinerary` (`id`, `trip_detail_id`, `days`, `meals`, `title`, `max_altitude`, `distance`, `duration`, `content`, `ordering`, `created_at`, `updated_at`) VALUES
(2797, 240, '16', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 16, '2025-12-06 03:27:36', '2025-12-06 03:27:36'),
(2798, 241, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to hotel. Expedition briefing in the evening.', NULL, NULL, NULL, NULL, 1, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2799, 241, '2', NULL, 'Expedition preparation and gear check in Kathmandu.', NULL, NULL, NULL, NULL, 2, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2800, 241, '3', NULL, 'Fly from Kathmandu to Lukla (2,860 m) and trek to Phakding (2,610 m).', NULL, NULL, NULL, NULL, 3, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2801, 241, '4', NULL, 'Trek from Phakding to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 4, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2802, 241, '5', NULL, 'Acclimatization day at Namche Bazaar.', NULL, NULL, NULL, NULL, 5, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2803, 241, '6', NULL, 'Trek from Namche to Pangboche (3,985 m) via Tengboche Monastery.', NULL, NULL, NULL, NULL, 6, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2804, 241, '7', NULL, 'Trek from Pangboche to Ama Dablam Base Camp (4,600 m).', NULL, NULL, NULL, NULL, 7, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2805, 241, '8', NULL, 'Base Camp preparation and Puja ceremony.', NULL, NULL, NULL, NULL, 8, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2806, 241, '9-20', NULL, 'Rotation climbs to Camp I, II, III, and summit push to Ama Dablam. Return to Base Camp.', NULL, NULL, NULL, NULL, 9, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2807, 241, '21', NULL, 'Descend from Base Camp to Pangboche.', NULL, NULL, NULL, NULL, 10, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2808, 241, '22', NULL, 'Trek from Pangboche to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 11, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2809, 241, '23', NULL, 'Trek from Namche Bazaar to Lukla (2,860 m).', NULL, NULL, NULL, NULL, 12, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2810, 241, '24', NULL, 'Fly from Lukla to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 13, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2811, 241, '25', NULL, 'Contingency or leisure day in Kathmandu.', NULL, NULL, NULL, NULL, 14, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2812, 241, '26', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 15, '2025-12-06 03:43:39', '2025-12-06 03:43:39'),
(2813, 243, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2814, 243, '2', NULL, 'Rest and preparation day in Kathmandu with briefing, gear check, and permit processing.', NULL, NULL, NULL, NULL, 2, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2815, 243, '3', NULL, 'Fly from Kathmandu to Lukla (2,860 m) and trek to Phakding (2,610 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2816, 243, '4', NULL, 'Trek from Phakding to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2817, 243, '5', NULL, 'Acclimatization day in Namche Bazaar with a short hike to Syangboche or Everest View Hotel.', NULL, NULL, NULL, NULL, 5, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2818, 243, '6', NULL, 'Trek from Namche to Tengboche (3,860 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2819, 243, '7', NULL, 'Trek from Tengboche to Dingboche (4,410 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2820, 243, '8', NULL, 'Acclimatization day in Dingboche with a hike to Nagarjun Hill or Chhukung Ri.', NULL, NULL, NULL, NULL, 8, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2821, 243, '9', NULL, 'Trek from Dingboche to Chhukung (4,730 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2822, 243, '10', NULL, 'Trek from Chhukung to Island Peak Base Camp (5,000 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2823, 243, '11', NULL, 'Trek from Base Camp to High Camp (5,550 m).', NULL, NULL, NULL, NULL, 11, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2824, 243, '12', NULL, 'Summit Island Peak (6,189 m) and descend to Chhukung.', NULL, NULL, NULL, NULL, 12, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2825, 243, '13', NULL, 'Contingency day for weather or delays.', NULL, NULL, NULL, NULL, 13, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2826, 243, '14', NULL, 'Trek from Chhukung to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 14, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2827, 243, '15', NULL, 'Trek from Namche Bazaar to Lukla (2,860 m).', NULL, NULL, NULL, NULL, 15, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2828, 243, '16', NULL, 'Fly from Lukla to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 16, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2829, 243, '17', NULL, 'Leisure or backup day in Kathmandu.', NULL, NULL, NULL, NULL, 17, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2830, 243, '18', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 18, '2025-12-11 03:07:54', '2025-12-11 03:07:54'),
(2831, 244, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to hotel. Evening welcome dinner and briefing.', NULL, NULL, NULL, NULL, 1, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2832, 244, '2', NULL, 'Preparation day in Kathmandu with permit work, gear check, and last-minute shopping.', NULL, NULL, NULL, NULL, 2, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2833, 244, '3', NULL, 'Fly from Kathmandu to Lukla (2,860 m) and trek to Chutanga (3,060 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2834, 244, '4', NULL, 'Trek from Chutanga to Tuli Kharka (3,900 m) via Zatrawa La Pass (4,610 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2835, 244, '5', NULL, 'Trek from Tuli Kharka to Kothe (4,095 m).', NULL, NULL, NULL, NULL, 5, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2836, 244, '6', NULL, 'Trek from Kothe to Thangnak (4,350 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2837, 244, '7', NULL, 'Trek from Thangnak to Khare (5,054 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2838, 244, '8', NULL, 'Acclimatization and climbing preparation day in Khare.', NULL, NULL, NULL, NULL, 8, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2839, 244, '9', NULL, 'Trek from Khare to Mera High Camp (5,790 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2840, 244, '10', NULL, 'Summit Mera Peak (6,476 m) and descend to Khare.', NULL, NULL, NULL, NULL, 10, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2841, 244, '11', NULL, 'Contingency day for weather or delays.', NULL, NULL, NULL, NULL, 11, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2842, 244, '12', NULL, 'Trek from Khare to Kothe.', NULL, NULL, NULL, NULL, 12, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2843, 244, '13', NULL, 'Trek from Kothe to Tuli Kharka via Zatrawa La Pass.', NULL, NULL, NULL, NULL, 13, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2844, 244, '14', NULL, 'Trek from Tuli Kharka to Lukla (2,860 m).', NULL, NULL, NULL, NULL, 14, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2845, 244, '15', NULL, 'Fly from Lukla to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 15, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2846, 244, '16', NULL, 'Leisure or buffer day in Kathmandu.', NULL, NULL, NULL, NULL, 16, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2847, 244, '17', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 17, '2025-12-11 03:20:30', '2025-12-11 03:20:30'),
(2848, 247, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to hotel. Evening welcome dinner and briefing.', NULL, NULL, NULL, NULL, 1, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2849, 247, '2', NULL, 'Official preparations and trip briefing in Kathmandu.', NULL, NULL, NULL, NULL, 2, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2850, 247, '3', NULL, 'Drive from Kathmandu to Besisahar (760 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2851, 247, '4', NULL, 'Drive from Besisahar to Chame (2,650 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2852, 247, '5', NULL, 'Trek from Chame to Pisang (3,300 m).', NULL, NULL, NULL, NULL, 5, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2853, 247, '6', NULL, 'Trek from Pisang to Yak Kharka (4,210 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2854, 247, '7', NULL, 'Trek from Yak Kharka to Chulu East Base Camp (5,140 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2855, 247, '8', NULL, 'Acclimatization and climbing preparation day at Base Camp.', NULL, NULL, NULL, NULL, 8, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2856, 247, '9', NULL, 'Summit Chulu East Peak (6,584 m) and return to Base Camp.', NULL, NULL, NULL, NULL, 9, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2857, 247, '10', NULL, 'Trek from Base Camp to Manang (3,540 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2858, 247, '11', NULL, 'Trek from Manang to Yak Kharka.', NULL, NULL, NULL, NULL, 11, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2859, 247, '12', NULL, 'Trek from Yak Kharka to Thorong Phedi (4,540 m).', NULL, NULL, NULL, NULL, 12, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2860, 247, '13', NULL, 'Trek from Thorong Phedi to Muktinath via Thorong La Pass (5,416 m).', NULL, NULL, NULL, NULL, 13, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2861, 247, '14', NULL, 'Trek from Muktinath to Jomsom (2,750 m).', NULL, NULL, NULL, NULL, 14, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2862, 247, '15', NULL, 'Fly from Jomsom to Pokhara (822 m).', NULL, NULL, NULL, NULL, 15, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2863, 247, '16', NULL, 'Fly from Pokhara to Kathmandu.', NULL, NULL, NULL, NULL, 16, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2864, 247, '17', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 17, '2025-12-11 03:32:52', '2025-12-11 03:32:52'),
(2865, 248, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to hotel. Welcome dinner and expedition briefing.', NULL, NULL, NULL, NULL, 1, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2866, 248, '2', NULL, 'Drive from Kathmandu to Syange (1,100 m) via Besisahar.', NULL, NULL, NULL, NULL, 2, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2867, 248, '3', NULL, 'Drive from Syange to Lower Pisang (3,150 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2868, 248, '4', NULL, 'Trek from Lower Pisang to Manang (3,540 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2869, 248, '5', NULL, 'Acclimatization day in Manang.', NULL, NULL, NULL, NULL, 5, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2870, 248, '6', NULL, 'Trek from Manang to Ledar (4,200 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2871, 248, '7', NULL, 'Trek from Ledar to Chulu West Base Camp (4,900 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2872, 248, '8', NULL, 'Trek from Base Camp to High Camp (5,600 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2873, 248, '9', NULL, 'Summit Chulu West (6,419 m) and return to Base Camp.', NULL, NULL, NULL, NULL, 9, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2874, 248, '10', NULL, 'Trek from Base Camp to Manang.', NULL, NULL, NULL, NULL, 10, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2875, 248, '11', NULL, 'Trek from Manang to Chame (2,670 m).', NULL, NULL, NULL, NULL, 11, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2876, 248, '12', NULL, 'Drive from Chame to Besisahar.', NULL, NULL, NULL, NULL, 12, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2877, 248, '13', NULL, 'Drive from Besisahar to Kathmandu.', NULL, NULL, NULL, NULL, 13, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2878, 248, '14', NULL, 'Sightseeing day in Kathmandu Valley.', NULL, NULL, NULL, NULL, 14, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2879, 248, '15', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 15, '2025-12-11 03:43:11', '2025-12-11 03:43:11'),
(2880, 250, '1', NULL, 'Arrival in Kathmandu (1,400 m). Transfer to hotel and evening welcome dinner.', NULL, NULL, NULL, NULL, 1, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2881, 250, '2', NULL, 'Expedition briefing, gear check, and shopping day in Kathmandu.', NULL, NULL, NULL, NULL, 2, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2882, 250, '3', NULL, 'Drive from Kathmandu to Besisahar (760 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2883, 250, '4', NULL, 'Drive from Besisahar to Lower Pisang (3,250 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2884, 250, '5', NULL, 'Trek from Lower Pisang to Manang (3,450 m) via Upper Pisang.', NULL, NULL, NULL, NULL, 5, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2885, 250, '6', NULL, 'Rest and acclimatization day in Manang.', NULL, NULL, NULL, NULL, 6, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2886, 250, '7', NULL, 'Trek from Manang to Yak Kharka (4,000 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2887, 250, '8', NULL, 'Trek from Yak Kharka to Thorong Phedi (4,560 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2888, 250, '9', NULL, 'Trek from Thorong Phedi to Thorong Peak Base Camp (5,416 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2889, 250, '10', NULL, 'Acclimatization and training day at Base Camp.', NULL, NULL, NULL, NULL, 10, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2890, 250, '11-12', NULL, 'Summit attempt on Thorong Peak and return to Base Camp.', NULL, NULL, NULL, NULL, 11, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2891, 250, '13', NULL, 'Drive from Base Camp region to Tatopani (1,190 m).', NULL, NULL, NULL, NULL, 12, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2892, 250, '14', NULL, 'Drive from Tatopani to Pokhara (822 m).', NULL, NULL, NULL, NULL, 13, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2893, 250, '15', NULL, 'Fly from Pokhara back to Kathmandu.', NULL, NULL, NULL, NULL, 14, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2894, 250, '16', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 15, '2025-12-11 03:50:49', '2025-12-11 03:50:49'),
(2895, 131, '1', NULL, 'Arrival in Kathmandu (1,400 m). Airport pickup and transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2896, 131, '2', NULL, 'Fly from Kathmandu to Lukla (2,840 m) and trek to Phakding (2,610 m).', NULL, NULL, NULL, NULL, 2, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2897, 131, '3', NULL, 'Trek from Phakding to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2898, 131, '4', NULL, 'Acclimatization day in Namche and hike to Everest View Hotel (3,880 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2899, 131, '5', NULL, 'Trek from Namche Bazaar to Debuche (3,820 m) via Tengboche.', NULL, NULL, NULL, NULL, 5, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2900, 131, '6', NULL, 'Trek from Debuche to Dingboche (4,410 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2901, 131, '7', NULL, 'Acclimatization day in Dingboche with an optional hike to Nangkartshang Peak.', NULL, NULL, NULL, NULL, 7, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2902, 131, '8', NULL, 'Trek from Dingboche to Lobuche (4,940 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2903, 131, '9', NULL, 'Trek from Lobuche to Everest Base Camp (5,364 m) and return to Gorakshep (5,170 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2904, 131, '10', NULL, 'Hike to Kala Patthar (5,545 m) and trek to Pheriche (4,371 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2905, 131, '11', NULL, 'Trek from Pheriche to Namche Bazaar.', NULL, NULL, NULL, NULL, 11, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2906, 131, '12', NULL, 'Trek from Namche Bazaar to Lukla.', NULL, NULL, NULL, NULL, 12, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2907, 131, '13', NULL, 'Fly from Lukla to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 13, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2908, 131, '14', NULL, 'Optional sightseeing day in Kathmandu.', NULL, NULL, NULL, NULL, 14, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2909, 131, '15', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 15, '2025-12-11 05:27:18', '2025-12-11 05:27:18'),
(2910, 253, '1', NULL, 'Arrival in Kathmandu (1,400 m). Airport pickup and transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2911, 253, '2', NULL, 'Fly from Kathmandu to Lukla (2,840 m) and trek to Phakding (2,610 m).', NULL, NULL, NULL, NULL, 2, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2912, 253, '3', NULL, 'Trek from Phakding to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2913, 253, '4', NULL, 'Acclimatization day in Namche and hike to Everest View Hotel (3,880 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2914, 253, '5', NULL, 'Trek from Namche Bazaar to Dole (4,200 m).', NULL, NULL, NULL, NULL, 5, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2915, 253, '6', NULL, 'Trek from Dole to Machhermo (4,470 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2916, 253, '7', NULL, 'Trek from Machhermo to Gokyo (4,790 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2917, 253, '8', NULL, 'Acclimatization day and hike to Gokyo Ri (5,360 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2918, 253, '9', NULL, 'Trek from Gokyo to Thangnak (4,750 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2919, 253, '10', NULL, 'Cross Cho La Pass (5,420 m) and trek to Dzongla (4,830 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2920, 253, '11', NULL, 'Trek from Dzongla to Lobuche (4,940 m).', NULL, NULL, NULL, NULL, 11, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2921, 253, '12', NULL, 'Trek from Lobuche to Everest Base Camp (5,364 m) and return to Gorakshep (5,170 m).', NULL, NULL, NULL, NULL, 12, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2922, 253, '13', NULL, 'Hike to Kala Patthar (5,545 m) and trek to Dingboche (4,360 m).', NULL, NULL, NULL, NULL, 13, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2923, 253, '14', NULL, 'Contingency buffer day for weather or rest.', NULL, NULL, NULL, NULL, 14, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2924, 253, '15', NULL, 'Trek from Dingboche to Namche Bazaar.', NULL, NULL, NULL, NULL, 15, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2925, 253, '16', NULL, 'Trek from Namche Bazaar to Lukla.', NULL, NULL, NULL, NULL, 16, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2926, 253, '17', NULL, 'Fly from Lukla to Kathmandu and transfer to hotel.', NULL, NULL, NULL, NULL, 17, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2927, 253, '18', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 18, '2025-12-11 05:36:21', '2025-12-11 05:36:21'),
(2928, 254, '1', NULL, 'Arrival in Kathmandu (1,400 m) – Hotel Stay.', NULL, NULL, NULL, NULL, 1, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2929, 254, '2', NULL, 'Fly from Kathmandu to Lukla (2,840 m) and trek to Phakding (2,610 m).', NULL, NULL, NULL, NULL, 2, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2930, 254, '3', NULL, 'Trek from Phakding to Namche Bazaar (3,440 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2931, 254, '4', NULL, 'Acclimatization day at Namche Bazaar, hike to Khumjung (3,780 m) and return.', NULL, NULL, NULL, NULL, 4, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2932, 254, '5', NULL, 'Trek from Namche Bazaar to Thame (3,820 m).', NULL, NULL, NULL, NULL, 5, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2933, 254, '6', NULL, 'Trek from Thame to Marlung (4,210 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2934, 254, '7', NULL, 'Cross Renjo La Pass (5,360 m) and trek to Gokyo (4,790 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2935, 254, '8', NULL, 'Acclimatization day at Gokyo, hike to Gokyo Ri (5,360 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2936, 254, '9', NULL, 'Trek from Gokyo to Thangnak (4,750 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2937, 254, '10', NULL, 'Cross Cho La Pass (5,330 m) and trek to Dzongla (4,830 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2938, 254, '11', NULL, 'Trek from Dzongla to Lobuche (4,940 m).', NULL, NULL, NULL, NULL, 11, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2939, 254, '12', NULL, 'Trek to Everest Base Camp (5,364 m) via Gorakshep (5,170 m).', NULL, NULL, NULL, NULL, 12, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2940, 254, '13', NULL, 'Sunrise hike to Kala Patthar (5,545 m) and descend to Lobuche.', NULL, NULL, NULL, NULL, 13, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2941, 254, '14', NULL, 'Cross Kongma La Pass (5,535 m) and trek to Chhukung (4,730 m).', NULL, NULL, NULL, NULL, 14, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2942, 254, '15', NULL, 'Trek from Chhukung to Pangboche (3,930 m).', NULL, NULL, NULL, NULL, 15, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2943, 254, '16', NULL, 'Trek from Pangboche to Namche Bazaar.', NULL, NULL, NULL, NULL, 16, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2944, 254, '17', NULL, 'Trek from Namche Bazaar to Lukla.', NULL, NULL, NULL, NULL, 17, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2945, 254, '18', NULL, 'Fly from Lukla to Kathmandu.', NULL, NULL, NULL, NULL, 18, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2946, 254, '19', NULL, 'Sightseeing in Kathmandu.', NULL, NULL, NULL, NULL, 19, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2947, 254, '20', NULL, 'Final Departure.', NULL, NULL, NULL, NULL, 20, '2025-12-11 05:48:34', '2025-12-11 05:48:34'),
(2948, 165, '1', NULL, 'Arrival in Kathmandu (1,400 m) – Hotel Stay.', NULL, NULL, NULL, NULL, 1, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2949, 165, '2', NULL, 'Fly or drive to Pokhara (822 m).', NULL, NULL, NULL, NULL, 2, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2950, 165, '3', NULL, 'Drive to Nayapul and trek to Ghandruk (1,940 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2951, 165, '4', NULL, 'Trek from Ghandruk to Chhomrong (2,170 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2952, 165, '5', NULL, 'Trek from Chhomrong to Bamboo (2,310 m).', NULL, NULL, NULL, NULL, 5, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2953, 165, '6', NULL, 'Trek from Bamboo to Deurali (3,230 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2954, 165, '7', NULL, 'Trek to Annapurna Base Camp (4,130 m) via Machhapuchhre Base Camp (3,700 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2955, 165, '8', NULL, 'Trek from Annapurna Base Camp back to Bamboo (2,310 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2956, 165, '9', NULL, 'Trek from Bamboo to Jhinu Danda (1,760 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2957, 165, '10', NULL, 'Trek from Jhinu Danda to Nayapul and drive to Pokhara (822 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2958, 165, '11', NULL, 'Fly or drive back to Kathmandu (1,400 m).', NULL, NULL, NULL, NULL, 11, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2959, 165, '12', NULL, 'Sightseeing in Kathmandu Valley.', NULL, NULL, NULL, NULL, 12, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2960, 165, '13', NULL, 'Final Departure from Kathmandu.', NULL, NULL, NULL, NULL, 13, '2025-12-11 05:59:57', '2025-12-11 05:59:57'),
(2961, 256, '1', NULL, 'Arrival in Kathmandu (1,400 m) – Hotel Stay.', NULL, NULL, NULL, NULL, 1, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2962, 256, '2', NULL, 'Fly to Pokhara (822 m).', NULL, NULL, NULL, NULL, 2, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2963, 256, '3', NULL, 'Drive to Tatopani (1,190 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2964, 256, '4', NULL, 'Drive to Humkhola and trek to Sandhi Kharka (3,165 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2965, 256, '5', NULL, 'Trek to Bhusket Mela (3,650 m).', NULL, NULL, NULL, NULL, 5, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2966, 256, '6', NULL, 'Trek to Annapurna North Base Camp (4,190 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2967, 256, '7', NULL, 'Trek back to Sandhi Kharka (3,165 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2968, 256, '8', NULL, 'Trek to Humkhola and drive to Tatopani (1,190 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2969, 256, '9', NULL, 'Drive to Pokhara (822 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2970, 256, '10', NULL, 'Fly back to Kathmandu (1,400 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2971, 256, '11', NULL, 'Sightseeing in Kathmandu Valley.', NULL, NULL, NULL, NULL, 11, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2972, 256, '12', NULL, 'Final Departure from Kathmandu.', NULL, NULL, NULL, NULL, 12, '2025-12-11 06:05:46', '2025-12-11 06:05:46'),
(2973, 257, '1', NULL, 'Arrival in Kathmandu (1,400 m) – Hotel Stay.', NULL, NULL, NULL, NULL, 1, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2974, 257, '2', NULL, 'Fly from Kathmandu to Pokhara (822 m).', NULL, NULL, NULL, NULL, 2, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2975, 257, '3', NULL, 'Drive from Pokhara to Takam (1,500 m).', NULL, NULL, NULL, NULL, 3, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2976, 257, '4', NULL, 'Trek from Takam to Muri (1,850 m).', NULL, NULL, NULL, NULL, 4, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2977, 257, '5', NULL, 'Trek from Muri to Bagar (2,080 m).', NULL, NULL, NULL, NULL, 5, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2978, 257, '6', NULL, 'Trek from Bagar to Dobang (2,520 m).', NULL, NULL, NULL, NULL, 6, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2979, 257, '7', NULL, 'Trek from Dobang to Italian Base Camp (3,660 m).', NULL, NULL, NULL, NULL, 7, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2980, 257, '8', NULL, 'Acclimatization Day at Italian Base Camp (3,660 m).', NULL, NULL, NULL, NULL, 8, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2981, 257, '9', NULL, 'Trek from Italian Base Camp to Glacier Camp (4,210 m).', NULL, NULL, NULL, NULL, 9, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2982, 257, '10', NULL, 'Trek from Glacier Camp to Dhaulagiri Base Camp (4,750 m).', NULL, NULL, NULL, NULL, 10, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2983, 257, '11', NULL, 'Acclimatization Day at Dhaulagiri Base Camp (4,750 m).', NULL, NULL, NULL, NULL, 11, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2984, 257, '12', NULL, 'Trek from Base Camp to Hidden Valley via French Pass (5,360 m).', NULL, NULL, NULL, NULL, 12, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2985, 257, '13', NULL, 'Trek from Hidden Valley to Yak Kharka via Dhampus Pass (5,240 m).', NULL, NULL, NULL, NULL, 13, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2986, 257, '14', NULL, 'Trek to Jomsom (2,720 m) or Marpha (2,670 m).', NULL, NULL, NULL, NULL, 14, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2987, 257, '15', NULL, 'Fly to Pokhara and return to Kathmandu.', NULL, NULL, NULL, NULL, 15, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2988, 257, '16', NULL, 'Final Departure from Kathmandu.', NULL, NULL, NULL, NULL, 16, '2025-12-11 06:12:25', '2025-12-11 06:12:25'),
(2989, 258, '1', NULL, 'Arrival in Kathmandu (1,400 m). Airport pickup and transfer to hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2990, 258, '2', NULL, 'Drive or fly to Pokhara (822 m).', NULL, NULL, NULL, NULL, 2, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2991, 258, '3', NULL, 'Drive to Kande and trek to Pitam Deurali (2,100 m).', NULL, NULL, NULL, NULL, 3, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2992, 258, '4', NULL, 'Trek from Pitam Deurali to Forest Camp (2,520 m).', NULL, NULL, NULL, NULL, 4, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2993, 258, '5', NULL, 'Trek from Forest Camp to Badal Danda (2,970 m).', NULL, NULL, NULL, NULL, 5, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2994, 258, '6', NULL, 'Trek from Badal Danda to High Camp (3,540 m).', NULL, NULL, NULL, NULL, 6, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2995, 258, '7', NULL, 'Trek to Mardi Himal Base Camp (4,250 m) and return to Badal Danda (3,300 m).', NULL, NULL, NULL, NULL, 7, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2996, 258, '8', NULL, 'Trek from Badal Danda to Siding Village (1,700 m) and drive to Pokhara.', NULL, NULL, NULL, NULL, 8, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2997, 258, '9', NULL, 'Drive or fly back to Kathmandu.', NULL, NULL, NULL, NULL, 9, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2998, 258, '10', NULL, 'Final Departure.', NULL, NULL, NULL, NULL, 10, '2025-12-12 15:17:48', '2025-12-12 15:17:48'),
(2999, 259, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3000, 259, '2', NULL, 'Fly to Pokhara (822 m), drive to Nayapul, and trek to Tikhedhunga (1,540 m).', NULL, NULL, NULL, NULL, 2, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3001, 259, '3', NULL, 'Trek from Tikhedhunga to Ghorepani (2,850 m).', NULL, NULL, NULL, NULL, 3, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3002, 259, '4', NULL, 'Hike to Poon Hill (3,210 m) and trek to Tatopani (1,190 m).', NULL, NULL, NULL, NULL, 4, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3003, 259, '5', NULL, 'Trek from Tatopani to Ghandruk (2,000 m).', NULL, NULL, NULL, NULL, 5, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3004, 259, '6', NULL, 'Trek from Ghandruk to Nayapul and drive to Pokhara.', NULL, NULL, NULL, NULL, 6, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3005, 259, '7', NULL, 'Drive or fly back to Kathmandu.', NULL, NULL, NULL, NULL, 7, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3006, 259, '8', NULL, 'Final Departure.', NULL, NULL, NULL, NULL, 8, '2025-12-12 15:22:39', '2025-12-12 15:22:39'),
(3007, 191, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3008, 191, '2', NULL, 'Trek preparation and permits arrangement.', NULL, NULL, NULL, NULL, 2, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3009, 191, '3', NULL, 'Drive from Kathmandu to Lapubesi (884 m).', NULL, NULL, NULL, NULL, 3, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3010, 191, '4', NULL, 'Trek from Lapubesi to Khorlabesi (970 m).', NULL, NULL, NULL, NULL, 4, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3011, 191, '5', NULL, 'Trek from Khorlabesi to Jagat (1,410 m).', NULL, NULL, NULL, NULL, 5, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3012, 191, '6', NULL, 'Trek from Jagat to Deng (1,800 m).', NULL, NULL, NULL, NULL, 6, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3013, 191, '7', NULL, 'Trek from Deng to Namrung (2,630 m).', NULL, NULL, NULL, NULL, 7, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3014, 191, '8', NULL, 'Trek from Namrung to Lho (3,180 m).', NULL, NULL, NULL, NULL, 8, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3015, 191, '9', NULL, 'Trek from Lho to Sama Gaun (3,520 m).', NULL, NULL, NULL, NULL, 9, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3016, 191, '10', NULL, 'Acclimatization day in Sama Gaun.', NULL, NULL, NULL, NULL, 10, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3017, 191, '11', NULL, 'Trek from Sama Gaun to Samdo (3,875 m).', NULL, NULL, NULL, NULL, 11, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3018, 191, '12', NULL, 'Acclimatization day in Samdo.', NULL, NULL, NULL, NULL, 12, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3019, 191, '13', NULL, 'Trek from Samdo to Dharmasala (4,460 m).', NULL, NULL, NULL, NULL, 13, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3020, 191, '14', NULL, 'Cross Larkya La Pass (5,160 m) and trek to Bhimthang (3,720 m).', NULL, NULL, NULL, NULL, 14, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3021, 191, '15', NULL, 'Trek from Bhimthang to Gho (2,515 m).', NULL, NULL, NULL, NULL, 15, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3022, 191, '16', NULL, 'Trek from Gho to Tal (1,700 m).', NULL, NULL, NULL, NULL, 16, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3023, 191, '17', NULL, 'Drive from Tal to Besisahar and return to Kathmandu.', NULL, NULL, NULL, NULL, 17, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3024, 191, '18', NULL, 'Leisure day or sightseeing in Kathmandu.', NULL, NULL, NULL, NULL, 18, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3025, 191, '19', NULL, 'Final Departure.', NULL, NULL, NULL, NULL, 19, '2025-12-12 15:47:11', '2025-12-12 15:47:11'),
(3026, 200, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3027, 200, '2', NULL, 'Drive from Kathmandu to Syabrubesi (1,550 m).', NULL, NULL, NULL, NULL, 2, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3028, 200, '3', NULL, 'Trek from Syabrubesi to Lama Hotel (2,380 m).', NULL, NULL, NULL, NULL, 3, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3029, 200, '4', NULL, 'Trek from Lama Hotel to Langtang Village (3,430 m).', NULL, NULL, NULL, NULL, 4, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3030, 200, '5', NULL, 'Trek from Langtang Village to Kyanjin Gompa (3,870 m).', NULL, NULL, NULL, NULL, 5, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3031, 200, '6', NULL, 'Hike to Tsergo Ri (4,984 m) and return to Kyanjin Gompa.', NULL, NULL, NULL, NULL, 6, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3032, 200, '7', NULL, 'Trek from Kyanjin Gompa to Lama Hotel.', NULL, NULL, NULL, NULL, 7, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3033, 200, '8', NULL, 'Trek from Lama Hotel to Syabrubesi.', NULL, NULL, NULL, NULL, 8, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3034, 200, '9', NULL, 'Drive from Syabrubesi to Kathmandu.', NULL, NULL, NULL, NULL, 9, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3035, 200, '10', NULL, 'Sightseeing around Kathmandu Valley.', NULL, NULL, NULL, NULL, 10, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3036, 200, '11', NULL, 'Final departure.', NULL, NULL, NULL, NULL, 11, '2025-12-12 16:20:19', '2025-12-12 16:20:19'),
(3037, 263, '1', NULL, 'Arrival in Kathmandu (1,400 m) and transfer to the hotel.', NULL, NULL, NULL, NULL, 1, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3038, 263, '2', NULL, 'Trek preparation and Kathmandu exploration.', NULL, NULL, NULL, NULL, 2, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3039, 263, '3', NULL, 'Drive from Kathmandu to Syabrubesi (1,550 m).', NULL, NULL, NULL, NULL, 3, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3040, 263, '4', NULL, 'Trek from Syabrubesi to Lama Hotel (2,380 m).', NULL, NULL, NULL, NULL, 4, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3041, 263, '5', NULL, 'Trek from Lama Hotel to Langtang Village (3,430 m).', NULL, NULL, NULL, NULL, 5, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3042, 263, '6', NULL, 'Trek from Langtang Village to Kyanjin Gompa (3,870 m).', NULL, NULL, NULL, NULL, 6, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3043, 263, '7', NULL, 'Hike to Tsergo Ri (4,984 m) and return to Lama Hotel.', NULL, NULL, NULL, NULL, 7, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3044, 263, '8', NULL, 'Trek from Lama Hotel to Thulo Syabru (2,230 m).', NULL, NULL, NULL, NULL, 8, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3045, 263, '9', NULL, 'Trek from Thulo Syabru to Shin Gompa (3,330 m).', NULL, NULL, NULL, NULL, 9, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3046, 263, '10', NULL, 'Trek from Shin Gompa to Gosaikunda Lake (4,460 m).', NULL, NULL, NULL, NULL, 10, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3047, 263, '11', NULL, 'Trek from Gosaikunda to Ghopte (3,440 m) via Laurebina La Pass (4,610 m).', NULL, NULL, NULL, NULL, 11, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3048, 263, '12', NULL, 'Trek from Ghopte to Melamchi Gaon (2,560 m).', NULL, NULL, NULL, NULL, 12, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3049, 263, '13', NULL, 'Trek from Melamchi Gaon to Tarke Gyang (2,590 m).', NULL, NULL, NULL, NULL, 13, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3050, 263, '14', NULL, 'Trek from Tarke Gyang to Sermathang (2,610 m).', NULL, NULL, NULL, NULL, 14, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3051, 263, '15', NULL, 'Trek from Sermathang to Melamchi Pul Bazaar and drive to Kathmandu.', NULL, NULL, NULL, NULL, 15, '2025-12-12 16:26:44', '2025-12-12 16:26:44'),
(3052, 263, '16', NULL, 'Final departure from Kathmandu.', NULL, NULL, NULL, NULL, 16, '2025-12-12 16:26:44', '2025-12-12 16:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_itinerary_rel`
--

CREATE TABLE `cl_trip_itinerary_rel` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_regions`
--

CREATE TABLE `cl_trip_regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `sub_title` varchar(191) DEFAULT 'NULL',
  `uri` varchar(191) NOT NULL,
  `thumbnail` varchar(191) DEFAULT 'NULL',
  `banner` varchar(191) DEFAULT 'NULL',
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `ordering` varchar(191) DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_region_rel`
--

CREATE TABLE `cl_trip_region_rel` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_schedule`
--

CREATE TABLE `cl_trip_schedule` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_detail_id` int(11) NOT NULL,
  `start_date` varchar(191) DEFAULT NULL,
  `end_date` varchar(191) DEFAULT NULL,
  `group_size` varchar(191) DEFAULT NULL,
  `price` varchar(191) DEFAULT NULL,
  `remarks` varchar(191) DEFAULT NULL,
  `availability` enum('GUARANTEED','AVAILABLE','LIMITED','CLOSED') DEFAULT NULL,
  `ordering` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_schedule`
--

INSERT INTO `cl_trip_schedule` (`id`, `trip_detail_id`, `start_date`, `end_date`, `group_size`, `price`, `remarks`, `availability`, `ordering`, `created_at`, `updated_at`) VALUES
(73, 162, '2014-02-26', '2011-07-29', NULL, '219', 'Pariatur Qui cum cu', 'AVAILABLE', 44, '2024-08-15 05:36:55', '2024-08-15 05:36:55'),
(74, 162, '2017-06-06', '1998-04-30', NULL, '834', 'Pariatur Vel dolore', 'CLOSED', 152, '2024-08-15 05:36:55', '2024-08-15 05:36:55'),
(104, 191, '2025-10-08', '2024-09-26', NULL, '+ 2 pax', NULL, 'AVAILABLE', NULL, '2024-09-08 14:44:14', '2024-09-08 14:44:14'),
(105, 191, '2025-04-25', '2025-05-11', NULL, NULL, NULL, 'AVAILABLE', NULL, '2024-09-08 14:44:14', '2024-09-08 14:44:14'),
(112, 122, '2026-02-05', '2026-02-20', NULL, '10', NULL, 'AVAILABLE', NULL, '2026-02-02 07:26:30', '2026-02-02 07:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_tailor_made`
--

CREATE TABLE `cl_trip_tailor_made` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `trip_id` int(11) NOT NULL,
  `num_ppl` varchar(191) DEFAULT NULL,
  `duration` varchar(191) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `full_name` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `destination` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_tailor_made`
--

INSERT INTO `cl_trip_tailor_made` (`id`, `title`, `trip_id`, `num_ppl`, `duration`, `start_date`, `full_name`, `contact`, `email`, `country`, `message`, `created_at`, `updated_at`, `destination`) VALUES
(1, NULL, 94, '94', '30', '2023-08-01', 'Lucius Mendez', 'Corrupti ullamco qu', 'xumil@mailinator.com', 'Colombia', NULL, '2023-04-28 12:17:54', '2023-04-28 12:17:54', NULL),
(2, NULL, 111, '57', '33', '2012-05-07', 'Zephania Weaver', 'Omnis explicabo Ear', 'qutom@mailinator.com', 'Denmark', NULL, '2023-05-10 07:52:09', '2023-05-10 07:52:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cl_trip_type`
--

CREATE TABLE `cl_trip_type` (
  `id` int(11) NOT NULL,
  `trip_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cl_trip_type`
--

INSERT INTO `cl_trip_type` (`id`, `trip_type`, `created_at`, `updated_at`) VALUES
(1, 'Trekking', '2021-03-14 06:45:15', '2021-03-14 06:45:15'),
(2, 'Expedition', '2021-03-14 06:45:15', '2021-03-14 06:45:15'),
(3, 'Activity', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `country` varchar(225) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `is_checked` enum('0','1') DEFAULT NULL,
  `trip` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `email`, `number`, `message`, `country`, `title`, `is_checked`, `trip`, `created_at`, `updated_at`) VALUES
(1, 'NDQkACXhGOZhDBETWvxoHtcL', 'heka.siziwo.l.o05@gmail.com', '3866077932', 'CEwqZAjPhYdIGVoQiQv', 'Togo', NULL, NULL, '--Select Trip--', '2026-01-09 21:47:47', '2026-01-09 21:47:47'),
(2, 'nfUJCQQEDgPubhBOAjT', 'u.qi.g.ego.vup.48@gmail.com', '8050913858', 'VSoUthzgThPrFbrWvmlXEv', 'Liberia', NULL, NULL, '--Select Trip--', '2026-01-17 00:58:18', '2026-01-17 00:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `destination_activity_rel`
--

CREATE TABLE `destination_activity_rel` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direct_pays`
--

CREATE TABLE `direct_pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `no_of_people` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `paid_status` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `direct_pays`
--

INSERT INTO `direct_pays` (`id`, `trip_id`, `first_name`, `last_name`, `email`, `phone`, `country`, `price`, `no_of_people`, `message`, `start_date`, `end_date`, `paid_status`, `payment_type`, `created_at`, `updated_at`) VALUES
(79, '126', 'Lhakpa', 'Sherpa', 'emall2sherpa@gmail.com', '9860275519', 'Nepal', '500', '2', 'Chek', '2024-10-18', '2024-10-25', '0', 'hbl-pay', '2024-10-07 16:10:40', '2024-10-07 16:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `dymantic_instagram_basic_profiles`
--

CREATE TABLE `dymantic_instagram_basic_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dymantic_instagram_basic_profiles`
--

INSERT INTO `dymantic_instagram_basic_profiles` (`id`, `username`, `created_at`, `updated_at`) VALUES
(1, 'my-profile', '2022-12-12 06:58:21', '2022-12-12 06:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `dymantic_instagram_feed_tokens`
--

CREATE TABLE `dymantic_instagram_feed_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `access_code` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_profile_picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `emergency_fullname` varchar(255) DEFAULT NULL,
  `emergency_relation` varchar(255) DEFAULT NULL,
  `emergency_phone_no` varchar(255) DEFAULT NULL,
  `emergency_email` varchar(255) DEFAULT NULL,
  `emergency_address` varchar(255) DEFAULT NULL,
  `emergency_zip` varchar(255) DEFAULT NULL,
  `emergency_country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE `flight_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `airline_name` varchar(255) DEFAULT NULL,
  `airline_no` varchar(255) DEFAULT NULL,
  `arrival_from` varchar(255) DEFAULT NULL,
  `arrival_date` varchar(255) DEFAULT NULL,
  `arrival_time` varchar(255) DEFAULT NULL,
  `departure_airline_name` varchar(255) DEFAULT NULL,
  `departure_airline_no` varchar(255) DEFAULT NULL,
  `departure_from` varchar(255) DEFAULT NULL,
  `departure_date` varchar(255) DEFAULT NULL,
  `departure_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_brief`
--

CREATE TABLE `home_brief` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `brief` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_brief`
--

INSERT INTO `home_brief` (`id`, `title`, `brief`, `thumbnail`, `image`, `video`, `pic`, `created_at`, `updated_at`) VALUES
(1, 'We Travel To Destinations With A Story To Tell', 'Nepal is an adventure paradise from the world-famous trek to Everest Base Camp to the scenic routes in the Annapurna region. There\'s something for every travelers in Nepal whether you want to follow in the famous mountaineering footsteps, travel through remote villages or summit a 8000 m peak. You\'ll want to come back to the Himalayas again and again.', NULL, NULL, 'bY_gRApfoJk', NULL, '2023-06-25 09:01:17', '2024-10-05 09:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `insurance_company` varchar(255) DEFAULT NULL,
  `insurance_phone` varchar(255) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_01_135020_cl_trip_expedition_rel', 2),
(8, '2021_02_19_141602_create_cl_trip_expedition_expeditiongroup_rel_table', 4),
(9, '2022_02_21_143448_create_itinerary_categories_table', 5),
(10, '2022_03_28_173704_create_instagram_basic_profile_table', 6),
(11, '2022_03_28_173704_create_instagram_feed_token_table', 6),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 7),
(13, '2023_05_05_115754_create_trip_banners_table', 8),
(18, '2024_08_13_172021_create_cl_trip_booking_table', 9),
(19, '2024_08_13_172125_create_insurances_table', 9),
(20, '2024_08_13_172207_create_emergencies_table', 9),
(21, '2024_08_13_174508_create_flight_details_table', 9),
(23, '2024_08_16_165420_create_direct_pays_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_activity_rel`
--

CREATE TABLE `related_activity_rel` (
  `id` bigint(20) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `related_activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `related_activity_rel`
--

INSERT INTO `related_activity_rel` (`id`, `activity_id`, `related_activity_id`) VALUES
(2, 40, 29),
(4, 39, 30),
(5, 39, 32),
(6, 34, 31),
(7, 34, 39);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `verified`, `created_at`, `updated_at`) VALUES
(540, 'Avye Oconnor', 'majawef@mailinator.com', 0, '2023-05-09 06:48:29', '2023-05-09 06:48:29'),
(541, 'Allegra Johnston', 'hywe@mailinator.com', 0, '2023-06-20 06:59:54', '2023-06-20 06:59:54'),
(542, 'Levi Valencia', 'gerutuj@mailinator.com', 0, '2023-06-20 07:00:19', '2023-06-20 07:00:19'),
(547, 'Hedda Hartman', 'sudeepa.cyberlink@gmail.com', 0, '2023-06-20 11:41:59', '2023-06-20 11:41:59'),
(548, 'Victor Benjamin', 'subaj@yahoo.com', 0, '2023-06-20 11:43:18', '2023-06-20 11:43:18'),
(549, 'Irene Coleman', 'nacur@mailinator.com', 0, '2023-06-20 11:43:46', '2023-06-20 11:43:46'),
(550, 'Reece Mullen', 'jenixajud@yahoo.com', 0, '2023-06-20 11:44:58', '2023-06-20 11:44:58'),
(551, 'Brooke Maynard', 'bepebemis@yahoo.com', 0, '2023-06-20 11:49:06', '2023-06-20 11:49:06'),
(552, 'Victor Kinney', 'musarybabu@yahoo.com', 0, '2023-06-20 11:50:52', '2023-06-20 11:50:52'),
(553, 'Sara Booth', 'deme@outlook.com', 0, '2023-06-20 11:52:22', '2023-06-20 11:52:22'),
(554, 'Linda Wells', 'syzon@yahoo.com', 0, '2023-06-20 12:03:28', '2023-06-20 12:03:28'),
(555, 'Kelsie Frazier', 'jidaneky@gmail.com', 0, '2023-06-20 12:06:24', '2023-06-20 12:06:24'),
(556, 'Rebecca Burris', 'botazin@hotmail.com', 0, '2023-06-20 12:07:19', '2023-06-20 12:07:19'),
(557, 'Stephen Bowman', 'tepece@outlook.com', 0, '2023-06-20 12:08:54', '2023-06-20 12:08:54'),
(558, 'Avram Keller', 'pubi@gmail.com', 0, '2023-06-21 05:47:16', '2023-06-21 05:47:16'),
(559, 'Miriam Snyder', 'gidefula@gmail.com', 0, '2023-06-21 05:49:06', '2023-06-21 05:49:06'),
(560, 'Keith Paul', 'hujipuz@gmail.com', 0, '2023-06-21 05:52:20', '2023-06-21 05:52:20'),
(561, 'Ulla Nielsen', 'nyvos@gmail.com', 0, '2023-06-21 06:34:15', '2023-06-21 06:34:15'),
(562, 'Nero Grimes', 'fivujozice@gmail.com', 0, '2023-06-21 06:35:34', '2023-06-21 06:35:34'),
(563, 'Wylie Morrison', 'tonysahupe@gmail.com', 0, '2023-06-21 06:48:22', '2023-06-21 06:48:22'),
(564, 'Kato Brock', 'sitegeh@gmail.com', 0, '2023-06-21 06:51:05', '2023-06-21 06:51:05'),
(565, 'Emerald Sexton', 'ropateriso@gmail.com', 0, '2023-06-21 06:56:30', '2023-06-21 06:56:30'),
(566, 'Brittany Nunez', 'fazynaki@gmail.com', 0, '2023-06-21 06:58:00', '2023-06-21 06:58:00'),
(567, 'Leilani Leonard', 'mixoge@gmail.com', 0, '2023-06-21 06:59:09', '2023-06-21 06:59:09'),
(568, 'Larissa Woodward', 'vuzana@gmail.com', 0, '2023-06-21 08:41:30', '2023-06-21 08:41:30'),
(569, 'Driscoll Nolan', 'subaj2010@gmail.com', 0, '2023-06-21 08:44:48', '2023-06-21 08:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `team_categories`
--

CREATE TABLE `team_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uri` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `team_parent` int(11) DEFAULT 0,
  `picture` varchar(255) DEFAULT NULL,
  `ordering` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_categories`
--

INSERT INTO `team_categories` (`id`, `uri`, `caption`, `category`, `team_parent`, `picture`, `ordering`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bod', 'Board of Director', 'BOD', 0, 'board-director-RqlUx7DmnF3yPvzq53r3DbqKER3K6AdAIXA5o2Sy.jpg', '1', NULL, '1', '2021-03-12 23:16:49', '2022-06-26 09:35:22'),
(2, 'intl-leaders', NULL, 'Int\'l Leaders', 0, 'international-coordinator-AuJ6O8suyRAmhu2OcsZ8xYuUeSnH8scghFQXQPWx.jpg', '2', NULL, '0', '2021-03-12 23:16:54', '2025-06-18 06:34:09'),
(3, 'office-staffs', NULL, 'Office Staffs', 0, 'staff-9wMY2dABeaOidi8rNZWN59B4ddRoTApoDbhoJEbi.png', '3', NULL, '0', '2021-03-12 23:17:18', '2025-12-02 08:20:49'),
(4, 'field-staffs', NULL, 'Field Staffs', 0, 'field-staff-new-h5v8KgAtTZySLTNoHAYDre0WN9omRUyVDvhsziLz.jpg', '4', NULL, '0', '2021-03-12 23:17:25', '2025-06-18 06:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `trip_banners`
--

CREATE TABLE `trip_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_detail_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `ordering` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_banners`
--

INSERT INTO `trip_banners` (`id`, `trip_detail_id`, `title`, `video`, `banner`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 111, 'Banner1', NULL, '1683287241-G8pRw06.jpg', 1, '2023-05-05 07:36:07', '2023-05-05 11:47:21'),
(15, 112, 'Banner1', NULL, NULL, 1, '2023-05-08 12:05:02', '2023-05-11 12:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `trip_highlights`
--

CREATE TABLE `trip_highlights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_detail_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ordering` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trip_inquiries`
--

CREATE TABLE `trip_inquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `trip_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(512) DEFAULT NULL,
  `number` varchar(255) NOT NULL,
  `no_of_people` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `review` varchar(191) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `trip_start_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_inquiries`
--

INSERT INTO `trip_inquiries` (`id`, `title`, `trip_id`, `name`, `email`, `message`, `number`, `no_of_people`, `duration`, `review`, `country`, `trip_start_date`, `created_at`, `updated_at`) VALUES
(1, 'expedition', 122, 'Summit Solution', 'info@cyberlink.com.np', 'hgfc', '0980032231', NULL, NULL, NULL, 'Nepal', NULL, '2025-12-29 08:26:48', '2025-12-29 08:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `trip_reviews`
--

CREATE TABLE `trip_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `trip_id` int(10) UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_reviews`
--

INSERT INTO `trip_reviews` (`id`, `trip_id`, `full_name`, `country`, `email`, `contact`, `rating`, `image`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 234, 'Parshad Man Gubhaju', 'Nepal', NULL, NULL, 5, '1767351115.png', '<p>Had a wonderful experience with Summit Solution Treks &amp; Expeditions during my Himlung expedition. I was led by an experienced IFMGA guide, Sujan, throughout the journey, alongside a team of highly capable Sherpas. Facilities were never compromised, with excellent food, proper guidance, and clear communication at every stage. Highly recommended for serious Himalayan expeditions.<br></p>', 1, '2024-07-30 12:27:32', '2026-01-06 21:59:36'),
(11, 259, 'Tyler Kawai', 'Japan', NULL, NULL, 5, '1767351123.png', '<p></p><p>Me and my friend Atsu joined a trek organized by Summit Solution Treks &amp; Expeditions, from the villages overlooking Annapurna to Mardi Himal High Camp. Ashish guided us with great care, always looking after our physical and mental well-being. Wivas and Sujan also played an important role in making our stay smooth and enjoyable, helping with planning, coordination, and overall support throughout the trip. Thank you to the entire Summit Solution Treks &amp; Expedition team for creating such an unforgettable experience.</p><br><p></p>', 1, '2025-03-19 10:51:13', '2026-01-06 21:59:53'),
(13, 240, 'Shimizu Reiko', 'Japan', 'banana3panda3@gmail.com', NULL, NULL, '1767631312.png', '<p>I have been climbing with Summit Solution Treks &amp; Expeditions for over 10 years, including expeditions in Rolwaling, Chulu Far East, and an unforgettable 2022 journey where we summited four peaks in one month, finishing with Ama Dablam. Their team has deep experience on 8,000-meter peaks and is equally passionate about exploring unclimbed summits and remote Himalayan cultures. With multiple IFMGA-certified guides and fluency in Japanese and English, Summit Solution delivers world-class professionalism while treating clients like family. I recommend them wholeheartedly.<br></p>', 1, '2026-01-06 00:47:17', '2026-01-06 03:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `pin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `pin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'summit@admin.com', NULL, '$2y$10$bkfjB.2syJg78umiyDc4ruvL1eZQpAlWni1Tml8AdeGmK33xwPdoa', NULL, 8910, '2020-12-22 01:00:49', '2021-03-12 23:51:49'),
(2, 'Cyberlink', 'root@admin.com', NULL, '$2y$10$bkfjB.2syJg78umiyDc4ruvL1eZQpAlWni1Tml8AdeGmK33xwPdoa', 'aZPleowCXs0DhAav9OiEY5xOIZjZXXQmvFDrZZaeLstIQfbn6SXF0L4ugGXq', 1100, '2020-12-22 01:00:49', '2021-03-12 23:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(8, 540, 'iRdkJdGRTBVULVe1UNzN', '2023-05-09 06:48:29', '2023-05-09 06:48:29'),
(9, 541, 'TjKqhQ2QN5WnvIldZrzF', '2023-06-20 06:59:54', '2023-06-20 06:59:54'),
(10, 542, 'WIUbjDTixbcbbmWlnKLJ', '2023-06-20 07:00:19', '2023-06-20 07:00:19'),
(15, 547, 'dnCaFZdd0isDa67Ubq4h', '2023-06-20 11:41:59', '2023-06-20 11:41:59'),
(16, 548, '5UzvSQic2mZHOZHDXgi9', '2023-06-20 11:43:18', '2023-06-20 11:43:18'),
(17, 549, 'fNjwDNarhGqVLtgzrK7s', '2023-06-20 11:43:47', '2023-06-20 11:43:47'),
(18, 550, 'sEQA6L9edzp43NHYztNH', '2023-06-20 11:44:58', '2023-06-20 11:44:58'),
(19, 551, 'J292RgeiEq1SWYs2facG', '2023-06-20 11:49:06', '2023-06-20 11:49:06'),
(20, 552, 'cTnJ6EI8Kl52ip7ec5W7', '2023-06-20 11:50:52', '2023-06-20 11:50:52'),
(21, 553, '8niqw3MlVyboeqOVAzpO', '2023-06-20 11:52:22', '2023-06-20 11:52:22'),
(22, 554, 'B0FAs11yxeYaXCkBffOS', '2023-06-20 12:03:28', '2023-06-20 12:03:28'),
(23, 555, 'DIGEes68SRtaLpYkOpWI', '2023-06-20 12:06:24', '2023-06-20 12:06:24'),
(24, 556, 'fy7G3ZzD4UjpfyRDtkWj', '2023-06-20 12:07:19', '2023-06-20 12:07:19'),
(25, 557, '5eeXq7QyhZm4s5xOY1Xu', '2023-06-20 12:08:54', '2023-06-20 12:08:54'),
(26, 558, 'LuILrX7uniaw7GGKtTxD', '2023-06-21 05:47:16', '2023-06-21 05:47:16'),
(27, 559, 'MpSoVEsb6HsK5guUxid8', '2023-06-21 05:49:06', '2023-06-21 05:49:06'),
(28, 560, 'dHKKUlan5qfzyUDKu7tR', '2023-06-21 05:52:20', '2023-06-21 05:52:20'),
(29, 561, 'mGseXWPAAlIE7zi5HSjq', '2023-06-21 06:34:15', '2023-06-21 06:34:15'),
(30, 562, 'GwZzU3Q3kN5uWuDSANmg', '2023-06-21 06:35:34', '2023-06-21 06:35:34'),
(31, 563, 'vqfIM92pvDx3AdzU9gwP', '2023-06-21 06:48:23', '2023-06-21 06:48:23'),
(32, 564, 'IbUDMw0qosgJTCDSO1aU', '2023-06-21 06:51:06', '2023-06-21 06:51:06'),
(33, 565, '16JyVJnXh9TAku4kWLGX', '2023-06-21 06:56:32', '2023-06-21 06:56:32'),
(34, 566, '63ltRdq3dnVm43jyf15C', '2023-06-21 06:58:01', '2023-06-21 06:58:01'),
(35, 567, 'W2UNn2TRpLqSJ69q399C', '2023-06-21 06:59:09', '2023-06-21 06:59:09'),
(36, 568, 'r2x2nG3D6sG9U4Lu3rvn', '2023-06-21 08:41:30', '2023-06-21 08:41:30'),
(37, 569, 'P1M2ptKcQv5l6yRl1N8G', '2023-06-21 08:44:50', '2023-06-21 08:44:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_banner`
--
ALTER TABLE `activity_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_associated_posts`
--
ALTER TABLE `cl_associated_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_banner`
--
ALTER TABLE `cl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_cost_excludes`
--
ALTER TABLE `cl_cost_excludes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_cost_includes`
--
ALTER TABLE `cl_cost_includes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_multiple_banner`
--
ALTER TABLE `cl_multiple_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_multiple_image`
--
ALTER TABLE `cl_multiple_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_posts`
--
ALTER TABLE `cl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_post_categories`
--
ALTER TABLE `cl_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_post_type`
--
ALTER TABLE `cl_post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_related_trip_rel`
--
ALTER TABLE `cl_related_trip_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_settings`
--
ALTER TABLE `cl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_team`
--
ALTER TABLE `cl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_activities`
--
ALTER TABLE `cl_trip_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_activity_rel`
--
ALTER TABLE `cl_trip_activity_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_booking`
--
ALTER TABLE `cl_trip_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_customize`
--
ALTER TABLE `cl_trip_customize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_destinations`
--
ALTER TABLE `cl_trip_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_destination_rel`
--
ALTER TABLE `cl_trip_destination_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_details`
--
ALTER TABLE `cl_trip_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_faqs`
--
ALTER TABLE `cl_trip_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_film_making`
--
ALTER TABLE `cl_trip_film_making`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_gear`
--
ALTER TABLE `cl_trip_gear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_grade`
--
ALTER TABLE `cl_trip_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_groups`
--
ALTER TABLE `cl_trip_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_group_rel`
--
ALTER TABLE `cl_trip_group_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_itinerary`
--
ALTER TABLE `cl_trip_itinerary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_itinerary_rel`
--
ALTER TABLE `cl_trip_itinerary_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_regions`
--
ALTER TABLE `cl_trip_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_region_rel`
--
ALTER TABLE `cl_trip_region_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_schedule`
--
ALTER TABLE `cl_trip_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_tailor_made`
--
ALTER TABLE `cl_trip_tailor_made`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cl_trip_type`
--
ALTER TABLE `cl_trip_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination_activity_rel`
--
ALTER TABLE `destination_activity_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_pays`
--
ALTER TABLE `direct_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dymantic_instagram_basic_profiles`
--
ALTER TABLE `dymantic_instagram_basic_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dymantic_instagram_basic_profiles_username_unique` (`username`);

--
-- Indexes for table `dymantic_instagram_feed_tokens`
--
ALTER TABLE `dymantic_instagram_feed_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emergencies_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_details_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `home_brief`
--
ALTER TABLE `home_brief`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurances_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_activity_rel`
--
ALTER TABLE `related_activity_rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_categories`
--
ALTER TABLE `team_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_banners`
--
ALTER TABLE `trip_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_highlights`
--
ALTER TABLE `trip_highlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_inquiries`
--
ALTER TABLE `trip_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_reviews`
--
ALTER TABLE `trip_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_reviews_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `verify_users_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_banner`
--
ALTER TABLE `activity_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cl_associated_posts`
--
ALTER TABLE `cl_associated_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `cl_banner`
--
ALTER TABLE `cl_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cl_cost_excludes`
--
ALTER TABLE `cl_cost_excludes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;

--
-- AUTO_INCREMENT for table `cl_cost_includes`
--
ALTER TABLE `cl_cost_includes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1338;

--
-- AUTO_INCREMENT for table `cl_multiple_banner`
--
ALTER TABLE `cl_multiple_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_multiple_image`
--
ALTER TABLE `cl_multiple_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cl_posts`
--
ALTER TABLE `cl_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `cl_post_categories`
--
ALTER TABLE `cl_post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_post_type`
--
ALTER TABLE `cl_post_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cl_related_trip_rel`
--
ALTER TABLE `cl_related_trip_rel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1489;

--
-- AUTO_INCREMENT for table `cl_settings`
--
ALTER TABLE `cl_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cl_team`
--
ALTER TABLE `cl_team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cl_trip_activities`
--
ALTER TABLE `cl_trip_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `cl_trip_activity_rel`
--
ALTER TABLE `cl_trip_activity_rel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3076;

--
-- AUTO_INCREMENT for table `cl_trip_booking`
--
ALTER TABLE `cl_trip_booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `cl_trip_customize`
--
ALTER TABLE `cl_trip_customize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cl_trip_destinations`
--
ALTER TABLE `cl_trip_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cl_trip_destination_rel`
--
ALTER TABLE `cl_trip_destination_rel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2581;

--
-- AUTO_INCREMENT for table `cl_trip_details`
--
ALTER TABLE `cl_trip_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `cl_trip_faqs`
--
ALTER TABLE `cl_trip_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `cl_trip_film_making`
--
ALTER TABLE `cl_trip_film_making`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_trip_gear`
--
ALTER TABLE `cl_trip_gear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;

--
-- AUTO_INCREMENT for table `cl_trip_grade`
--
ALTER TABLE `cl_trip_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cl_trip_groups`
--
ALTER TABLE `cl_trip_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cl_trip_group_rel`
--
ALTER TABLE `cl_trip_group_rel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_trip_itinerary`
--
ALTER TABLE `cl_trip_itinerary`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3167;

--
-- AUTO_INCREMENT for table `cl_trip_itinerary_rel`
--
ALTER TABLE `cl_trip_itinerary_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_trip_regions`
--
ALTER TABLE `cl_trip_regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_trip_region_rel`
--
ALTER TABLE `cl_trip_region_rel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cl_trip_schedule`
--
ALTER TABLE `cl_trip_schedule`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `cl_trip_tailor_made`
--
ALTER TABLE `cl_trip_tailor_made`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cl_trip_type`
--
ALTER TABLE `cl_trip_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destination_activity_rel`
--
ALTER TABLE `destination_activity_rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direct_pays`
--
ALTER TABLE `direct_pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `dymantic_instagram_basic_profiles`
--
ALTER TABLE `dymantic_instagram_basic_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dymantic_instagram_feed_tokens`
--
ALTER TABLE `dymantic_instagram_feed_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight_details`
--
ALTER TABLE `flight_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_brief`
--
ALTER TABLE `home_brief`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `related_activity_rel`
--
ALTER TABLE `related_activity_rel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;

--
-- AUTO_INCREMENT for table `team_categories`
--
ALTER TABLE `team_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trip_banners`
--
ALTER TABLE `trip_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trip_highlights`
--
ALTER TABLE `trip_highlights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_inquiries`
--
ALTER TABLE `trip_inquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip_reviews`
--
ALTER TABLE `trip_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD CONSTRAINT `emergencies_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `cl_trip_booking` (`id`);

--
-- Constraints for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD CONSTRAINT `flight_details_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `cl_trip_booking` (`id`);

--
-- Constraints for table `insurances`
--
ALTER TABLE `insurances`
  ADD CONSTRAINT `insurances_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `cl_trip_booking` (`id`);

--
-- Constraints for table `trip_reviews`
--
ALTER TABLE `trip_reviews`
  ADD CONSTRAINT `trip_reviews_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `cl_trip_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD CONSTRAINT `verify_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `subscribers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
