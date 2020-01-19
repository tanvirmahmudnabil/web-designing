

--
-- Database: `php-crud`
--

CREATE DATABASE `php-crud`;

-- --------------------------------------------------------

--
-- Table structure for table `user-info`
--

CREATE TABLE `user-info` (
  `id` int(11) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_user` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

-- --------------------------------------------------------

--
-- Table structure for table `user-info-hobbies`
--

CREATE TABLE `user-info-hobbies` (
  `id` int(11) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `user-info-id` int(11) UNSIGNED NOT NULL,
  `hobby_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated-at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user-info-hobbies`
--
ALTER TABLE `user-info-hobbies`
  ADD KEY `user-info-id` (`user-info-id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user-info-hobbies`
--
ALTER TABLE `user-info-hobbies`
  ADD CONSTRAINT `user-info-id` FOREIGN KEY (`user-info-id`) REFERENCES `user-info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
