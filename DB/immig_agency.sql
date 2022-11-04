-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 02:29 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immig_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '4ba674d85fbee92042e7d76e61145904');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `short` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `image` varchar(40) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `slug`, `short`, `detail`, `image`, `at`, `updated_at`, `updated_by`, `meta_title`, `meta_key`, `meta_desc`) VALUES
(1, 'First Blog', 'first-blog', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.', '06a66baca4864037497b89aef987badb.jpg', '2021-10-18 13:01:05', '2021-10-18 13:01:05', 0, 'First Blog', 'First Blog', 'First Blog'),
(2, 'Second Blog Post', 'second-post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.', 'e5e3e3345428f2fe0da19f9392ada372.jpg', '2021-10-18 13:01:48', '2021-10-18 13:01:48', 0, 'Second Blog Post', 'Second Blog Post', 'Second Blog Post'),
(3, 'Third Post', 'third-post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem alias neque amet, delectus quaerat, nisi impedit voluptate corrupti aut aspernatur dolorem harum, iste tenetur nihil aliquid cumque ad repellendus nemo.', '06a66baca4864037497b89aef987badb.jpg', '2021-10-18 13:02:20', '2021-10-18 13:02:20', 0, 'Third Post', 'Third Post', 'Third Post');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `contact_form_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('new','seen') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`contact_form_id`, `name`, `email`, `subject`, `phone`, `message`, `type`, `at`, `updated_at`, `status`) VALUES
(1, 'dsad', 'me.select@ymail.com', 'Test', '', 'dsad', '', '2022-10-05 07:58:13', '2022-10-05 07:58:13', 'new'),
(2, 'Nadeem Akram', 'nakram035@gmail.com', '', '0312456789', '', 'contact us form', '2022-11-03 14:18:07', '2022-11-03 14:18:07', 'new'),
(3, 'Nadeem Akram', 'nakram035@gmail.com', '', '0312456789', '', 'callback request', '2022-11-03 14:19:14', '2022-11-03 14:19:14', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `image` varchar(40) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `title`, `image`, `at`) VALUES
(1, 'Testing', 'c6a54d516a34698f9078b7bec0e2c533.jpg', '2022-11-02 12:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `tag_line` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `image` varchar(40) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_title` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `title`, `tag_line`, `detail`, `image`, `at`, `updated_at`, `meta_title`, `meta_key`, `meta_desc`) VALUES
(1, 'Home', '', '', '', '2021-10-04 13:15:56', '2022-11-02 06:49:21', 'ovalldull', 'ovalldull', 'ovalldull'),
(2, 'About Us', 'Welcome to Our Agency', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quasi aliquam possimus explicabo, enim architecto maxime odio, accusantium, nostrum, illo ex fugiat est reiciendis. Id quidem cum tempora explicabo aut?', '243b35b1026f83a016dd147a126cb169.jpg', '2021-10-04 13:15:56', '2022-11-02 06:49:23', 'About Ovalldull', 'About Ovalldull', 'About Ovalldull'),
(3, 'Privacy Policy', '', 'Privacy Policy', '', '2021-10-04 13:16:15', '2021-10-04 13:17:10', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy'),
(4, 'terms', '', 'terms', '', '2021-10-04 13:16:41', '2022-09-16 15:20:44', 'terms', 'terms', 'terms'),
(5, 'Contact Us', '', '', '06a66baca4864037497b89aef987badb.jpg', '2021-10-04 13:17:22', '2022-09-16 16:12:24', 'Contact Us', 'Contact Us', 'Contact Us'),
(8, 'Team', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quasi aliquam possimus explicabo, enim architecto maxime odio, accusantium, nostrum, illo ex fugiat est reiciendis. Id quidem cum tempora explicabo aut?', '', '2021-10-04 13:17:22', '2022-09-16 15:47:48', 'Team', 'Team', 'Team'),
(9, 'services', '', '', 'e5e3e3345428f2fe0da19f9392ada372.jpg', '2021-10-04 13:17:22', '2022-09-16 16:47:38', 'services', 'services', 'services'),
(10, 'Team', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quasi aliquam possimus explicabo, enim architecto maxime odio, accusantium, nostrum, illo ex fugiat est reiciendis. Id quidem cum tempora explicabo aut?', '06a66baca4864037497b89aef987badb.jpg', '2021-10-04 13:17:22', '2022-09-16 15:51:16', 'Team', 'Team', 'Team'),
(11, 'The Blog', '', '', '06a66baca4864037497b89aef987badb.jpg', '2021-10-04 13:17:22', '2022-09-16 16:03:32', 'Blogs', 'Blogs', 'Blogs'),
(12, 'Portfolio', '', '', '06a66baca4864037497b89aef987badb.jpg', '2021-10-04 13:17:22', '2022-09-16 16:03:32', 'Portfolio', 'Portfolio', 'Portfolio');

-- --------------------------------------------------------

--
-- Table structure for table `page_setting`
--

CREATE TABLE `page_setting` (
  `page_setting_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL,
  `slider_overlay_text` varchar(40) NOT NULL,
  `contect_heading_text` varchar(20) NOT NULL,
  `request_call_back_heading` varchar(40) NOT NULL,
  `request_call_back_text` varchar(255) NOT NULL,
  `request_call_back_button` varchar(20) NOT NULL,
  `counter1_heading` varchar(20) NOT NULL,
  `counter1_value` varchar(10) NOT NULL,
  `counter2_heading` varchar(20) NOT NULL,
  `counter2_value` varchar(10) NOT NULL,
  `counter3_heading` varchar(20) NOT NULL,
  `counter3_value` varchar(10) NOT NULL,
  `counter4_heading` varchar(20) NOT NULL,
  `counter4_value` varchar(10) NOT NULL,
  `footer_contact_form_heading` varchar(20) NOT NULL,
  `footer_contact_form_button` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_setting`
--

INSERT INTO `page_setting` (`page_setting_id`, `image`, `slider_overlay_text`, `contect_heading_text`, `request_call_back_heading`, `request_call_back_text`, `request_call_back_button`, `counter1_heading`, `counter1_value`, `counter2_heading`, `counter2_value`, `counter3_heading`, `counter3_value`, `counter4_heading`, `counter4_value`, `footer_contact_form_heading`, `footer_contact_form_button`) VALUES
(1, '662a16dad17c651b6e79c3f7f3214120.png', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Years of experience', '18', 'Offices worldwide', '23', 'Professional migrati', '69', 'Offices worldwide', '1500', 'Testing', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `tag_line` varchar(255) NOT NULL DEFAULT '',
  `detail` text NOT NULL,
  `slug` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(40) NOT NULL DEFAULT '',
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Ui/UX design','mobile app development','website development') DEFAULT 'mobile app development'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `title`, `tag_line`, `detail`, `slug`, `image`, `at`, `updated_at`, `status`) VALUES
(1, 'Skilled Worker Visa', 'Migrate as a skilled worker', 'Skilled Worker Visa', '', '485fb5ee89aa99af73db2903465c8c7d.png', '2022-11-02 07:02:53', '2022-11-02 07:02:53', 'mobile app development'),
(2, 'Business Immigration Visa', 'Relocate or invest in a new business abroad', '<span style="font-family: Muli, sans-serif; font-size: 18px;">Relocate or invest in a new business abroad</span>', '', '76a9cff21ed1469bf0a9953ec41d62cb.png', '2022-11-02 07:03:24', '2022-11-02 07:03:24', 'mobile app development'),
(3, 'Green Card', 'Migrate to the USA', '<h3 class="moto-text_system_8" style="box-sizing: inherit; margin: 0em 0px; padding: 0px; font-family: Muli, sans-serif; color: rgb(0, 0, 0); font-size: 21px; line-height: 1.4; transition: all 0.3s ease 0s;">Green Card</h3>', '', '05927efb42869a082cb8bbf7bce64754.png', '2022-11-02 07:03:58', '2022-11-02 07:03:58', 'mobile app development'),
(4, 'Visitor Visa', 'Travel abroad for business or vacation', '<span style="font-family: Muli, sans-serif; font-size: 18px;">Travel abroad for business or vacation</span>', '', '9ca806236d584798fff2e172451e834a.png', '2022-11-02 07:04:27', '2022-11-02 07:04:27', 'mobile app development'),
(5, 'Student or Study Visa', 'Pursue your studies abroad', '<span style="font-family: Muli, sans-serif; font-size: 18px;">Pursue your studies abroad</span>', '', 'c48e13e2d3b21fce6477a58c5d0ce60f.png', '2022-11-02 07:04:57', '2022-11-02 07:04:57', 'mobile app development'),
(6, 'Family Visa', 'Join Your Family', '<span style="font-family: Muli, sans-serif; font-size: 18px;">Join Your Family</span>', '', '9af112ef1b4e100363500981aea68ceb.png', '2022-11-02 07:05:21', '2022-11-02 07:05:21', 'mobile app development');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `name`, `country`, `msg`, `image`) VALUES
(1, 'M AB Khan', 'Pakistan', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio eius assumenda mollitia eos aliquid laudantium suscipit? Laudantium quidem neque, similique perferendis, recusandae qui error mollitia reiciendis in nam numquam ut.', '25aefe43dda72900559d54fbc5b5f8c6.jpg'),
(2, 'Ahsan', 'UAE', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio eius assumenda mollitia eos aliquid laudantium suscipit? Laudantium quidem neque, similique perferendis, recusandae qui error mollitia reiciendis in nam numquam ut.', 'f1871d036b6c76896c624083c52a826c.jpg'),
(3, 'Naveed Alam', 'UK', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Distinctio eius assumenda mollitia eos aliquid laudantium suscipit? Laudantium quidem neque, similique perferendis, recusandae qui error mollitia reiciendis in nam numquam ut.', '9203aa055ebfe1456d14a5c3010c567b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `image` varchar(40) NOT NULL,
  `detail` longtext NOT NULL,
  `tag_line` varchar(255) NOT NULL,
  `at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `title`, `slug`, `image`, `detail`, `tag_line`, `at`, `updated_at`, `meta_title`, `meta_desc`, `meta_key`, `status`) VALUES
(1, 'First Service', 'first-service', '6112eeaa02543ddb3538e232bd7f055f.jpg', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut temporibus tempore velit voluptatum optio, quo nostrum repudiandae sint illo neque iste officia fugit. Illum iusto dolores nisi, libero ut assumenda.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut temporibus tempore velit voluptatum optio, quo nostrum repudiandae sint illo neque iste officia fugit. Illum iusto dolores nisi, libero ut assumenda.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut temporibus tempore velit voluptatum optio, quo nostrum repudiandae sint illo neque iste officia fugit. Illum iusto dolores nisi, libero ut assumenda.</p><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut temporibus tempore velit voluptatum optio, quo nostrum repudiandae sint illo neque iste officia fugit. Illum iusto dolores nisi, libero ut assumenda.<br></p>', 'First Service', '2021-10-04 13:56:00', '2022-08-05 07:36:35', 'First Service', 'First Service', 'First Service', 'active'),
(2, 'Second Service', 'second-service', 'e5e3e3345428f2fe0da19f9392ada372.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium fugiat non in dolor, necessitatibus consectetur odit consequuntur autem commodi, doloremque, cumque illo! Voluptate dolorem excepturi tenetur maiores modi quaerat fugit.', 'Second Service', '2021-10-04 13:58:33', '2022-08-05 07:36:19', 'Second Service', 'Second Service', 'Second Service', 'active'),
(3, 'Third Service', 'third-service', '06a66baca4864037497b89aef987badb.jpg', 'Third ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird ProductThird Product', 'Third Service', '2021-10-04 14:05:16', '2022-09-24 07:43:25', 'Third Service', 'Third Service', 'Third Service', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `service_type_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `image` varchar(40) NOT NULL,
  `at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`service_type_id`, `title`, `image`, `at`) VALUES
(1, 'Testing', '62f7522631f5e2de6929cd8c4e84fc2c.jpg', '0000-00-00 00:00:00'),
(2, 'jhasjh', '4278b487f6ea55c81886fbd1331a824c.jpg', '0000-00-00 00:00:00'),
(3, 'Tetst 2', '13f889fb3818e64e0c027b474f1f3c1f.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `opening_hours` text NOT NULL,
  `facebook_link` varchar(100) NOT NULL DEFAULT '',
  `twitter_link` varchar(100) NOT NULL DEFAULT '',
  `pinterest_link` varchar(100) NOT NULL DEFAULT '',
  `linkedin_link` varchar(100) NOT NULL DEFAULT '',
  `youtube_link` varchar(100) NOT NULL DEFAULT '',
  `google_map` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `address`, `phone`, `email`, `opening_hours`, `facebook_link`, `twitter_link`, `pinterest_link`, `linkedin_link`, `youtube_link`, `google_map`) VALUES
(1, 'ABC, Lahore Pakistan', '+92 333 123 4567', 'info@domain.com', 'Mon – Fri : 9 am to 9 pm', 'javascript://', 'javascript://', 'javascript://', '', '', '//maps.google.com/maps?q=New York, USA&amp;z=10&amp;t=m&amp;output=embed');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `image`) VALUES
(1, '2c63f7ce8bb54c641eadf5158a469403.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `position` varchar(50) NOT NULL DEFAULT '',
  `image` varchar(40) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `name`, `position`, `image`) VALUES
(1, 'Rashmi Momin', 'CEO', '243b35b1026f83a016dd147a126cb169.jpg'),
(2, 'Mubarak Khawaja, MD', 'MD', '2c63f7ce8bb54c641eadf5158a469403.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`contact_form_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `page_setting`
--
ALTER TABLE `page_setting`
  ADD PRIMARY KEY (`page_setting_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`service_type_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contact_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `page_setting`
--
ALTER TABLE `page_setting`
  MODIFY `page_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `service_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
