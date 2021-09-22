-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 22, 2021 lúc 05:00 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `engzone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) NOT NULL,
  `re_password` varchar(69) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `fullname` varchar(29) DEFAULT NULL,
  `phonenumber` varchar(13) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `user_name`, `password`, `re_password`, `email`, `address`, `fullname`, `phonenumber`, `birthday`, `createdate`, `status`) VALUES
(1, 'namaeb', '$2y$10$l./t/cu64K0Gw6z0feC/2eDIYnqrofhyhEZHXv92GieJOWTiXlvta', '', 'leethanhlong2210@gmail.com', 'England city', 'Le Thanh Long', '0385230377', '2021-06-03', '2021-06-30', b'1'),
(2, 'aro', '$2y$10$nMwmizln0AhCSpV.fdU1L.hfuAyLk9qIYs3IPcaA49Rm27IPWJvvy', '', 'dearo29@gmail.com', 'Doriath', 'De aro', '0385230329', '0000-00-00', '2021-07-06', b'1'),
(24, 'michael', '$2y$10$G.SXSzm0QOpxhmDEDuqVluPyr0GwaZ5d1X6YG/Q/mZGtRC4pavWxa', '', 'leethanhlong2210@gmail.com', '', 'de de', 'avbc', '0000-00-00', '2021-07-29', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `post_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_img` varchar(256) COLLATE utf8_unicode_ci DEFAULT './images/1582709085nmk0pWUsEOvq5Cl.jpg',
  `tag_id` int(11) DEFAULT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog`
--

INSERT INTO `tbl_blog` (`post_id`, `client_id`, `author`, `title`, `post_content`, `post_img`, `tag_id`, `createdate`, `status`) VALUES
(11, 3, 'michael ex', 'michael story', '<p>Micheal is pretty, michael is clever, michael got everything but except me. sad for michael</p>', './images/1582709085nmk0pWUsEOvq5Cl.jpg', 9, '2021-06-30', b'1'),
(12, 3, 'namaeb', 'Our life ', '<p>Osmanthus wine taste the same that i remember but where are those who share the memory&nbsp;</p>', 'upload/genshin-impact-zhongli.jpg', 15, '2021-07-05', b'1'),
(13, 3, 'namaeb', 'young boyz', '<p>i am a boy and i am young</p>', 'upload/Free-English-courses-for-January-2019-1200x540.jpg', 2, '2021-07-10', b'1'),
(14, 3, 'namaeb', 'Story about a bossz', '<p>I am Duong Shang, a big boss from Thai Binh city.&nbsp;</p>', 'upload/128368637-english-concept-with-blurred-city-abstract-lights-background.jpg', 14, '2021-07-10', b'1'),
(22, 2, 'namaeb', 'lol', '<p>em dung cu hon bu lol thuy tuyen</p>', 'upload/learn-english-2960911.jpg', 11, '2021-08-12', b'0'),
(23, 2, 'namaeb', 'test', '<p>test test test&nbsp;</p>', 'upload/depositphotos_71121921-stock-photo-education-concept-english-on-digital.jpg', 3, '2021-08-19', b'1'),
(24, 2, 'dshang', 'test file', '<p>test file 2</p>', 'upload/Learn-English-Grammar-Online-Step-by-Step-Free-1-768x384.jpg', 3, '2021-08-19', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_book`
--

CREATE TABLE `tbl_book` (
  `book_id` int(11) NOT NULL,
  `book_cat_id` int(11) NOT NULL,
  `book_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `book_price` float NOT NULL,
  `book_sale` float DEFAULT NULL,
  `book_qty` int(11) NOT NULL,
  `book_img` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_description` blob DEFAULT NULL,
  `book_favorite` int(11) DEFAULT NULL,
  `status_book` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_book`
--

INSERT INTO `tbl_book` (`book_id`, `book_cat_id`, `book_name`, `book_price`, `book_sale`, `book_qty`, `book_img`, `book_description`, `book_favorite`, `status_book`) VALUES
(2, 2, 'English Vocabulary Builder', 190000, 200000, 10, './upload/book-1.png', '', 0, b'1'),
(3, 1, 'English Collocations in Use (Cambridge)', 450000, 500000, 50, 'upload/book-2.png', 0x7265616c20313030252066726f6d206368696e61, 3, b'1'),
(4, 4, 'Oxford Advanced Learner’s Dictionary (OALD)', 430000, 450000, 20, './upload/book-3.png', '', 0, b'1'),
(5, 2, 'English Grammar in Use (Cambridge)', 220000, 250000, 15, 'upload/book-3.png', '', 0, b'1'),
(6, 4, 'Practical English Usage (Oxford)', 500000, 550000, 29, './upload/book-4.png', '', 0, b'1'),
(7, 2, 'English Grammar: Understanding the Basics (Cambridge)', 199000, 200000, 29, './upload/book-5.jpg', '', 0, b'1'),
(8, 5, 'English Conversation (Practice Makes Perfect)', 280000, 300000, 15, './upload/book-6.jpg', '', 0, b'1'),
(9, 1, 'Ship or Sheep? An Intermediate Pronunciation Cours', 375000, 400000, 12, './upload/book-7.jpg', '', 0, b'1'),
(10, 4, 'The Official Cambridge Guide to IELTS', 750000, 770000, 50, './upload/book-8.png', '', 0, b'1'),
(11, 4, 'Vocabulary for IELTS Advanced (Cambridge Universit', 600000, 650000, 20, './upload/book-9.jpg', '', 0, b'1'),
(12, 2, 'Grammar for IELTS (Cambridge University Press)', 333000, 350000, 30, './upload/book-10.jpg', '', 0, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_book_category`
--

CREATE TABLE `tbl_book_category` (
  `book_cat_id` int(11) NOT NULL,
  `book_cat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_book_category`
--

INSERT INTO `tbl_book_category` (`book_cat_id`, `book_cat_name`, `status`) VALUES
(1, 'text bo0k', b'1'),
(2, 'grammar', b'1'),
(3, 'listening', b'1'),
(4, 'advanced', b'1'),
(5, 'speaking', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_book_favorite`
--

CREATE TABLE `tbl_book_favorite` (
  `favorite_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `favorite_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_book_favorite`
--

INSERT INTO `tbl_book_favorite` (`favorite_id`, `book_id`, `client_id`, `favorite_status`) VALUES
(1, 12, 2, b'1'),
(2, 11, 2, b'1'),
(3, 8, 2, b'0'),
(4, 10, 2, b'1'),
(5, 7, 2, b'0'),
(6, 6, 2, b'1'),
(7, 2, 2, b'0'),
(8, 3, 2, b'1'),
(9, 4, 2, b'1'),
(10, 5, 2, b'0'),
(11, 9, 2, b'1'),
(12, 9, 3, b'1'),
(13, 12, 3, b'1'),
(14, 5, 3, b'1'),
(15, 2, 3, b'1'),
(16, 3, 3, b'1'),
(17, 8, 3, b'1'),
(18, 11, 3, b'1'),
(19, 10, 14, b'1'),
(20, 11, 14, b'1'),
(21, 12, 14, b'1'),
(22, 9, 14, b'1'),
(23, 7, 14, b'1'),
(24, 8, 14, b'1'),
(25, 3, 14, b'1'),
(26, 5, 14, b'1'),
(27, 2, 14, b'1'),
(28, 6, 14, b'1'),
(29, 10, 3, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_book_review`
--

CREATE TABLE `tbl_book_review` (
  `review_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `reviewer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `review_content` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(256) COLLATE utf8_unicode_ci DEFAULT './images/default-user.png',
  `favorite` int(11) NOT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_book_review`
--

INSERT INTO `tbl_book_review` (`review_id`, `book_id`, `reviewer_name`, `review_content`, `img`, `favorite`, `createdate`, `status`, `client_id`) VALUES
(1, 3, 'me', 'this\'s greatest book i\'ve ever read in ma life ', './images/default-user.png', 4, '2021-06-30', b'1', 3),
(6, 2, 'mr coock', 'thiss greatest', './images/default-user.png', 5, '2021-06-30', b'1', 3),
(7, 6, 'diluc', 'this is greatest book i have ever read in ma life', './images/default-user.png', 5, '2021-06-30', b'1', 3),
(8, 7, 'mona', 'this book have so many knowledge\r\n', './images/default-user.png', 4, '2021-06-30', b'1', 3),
(9, 9, 'vago mundo', 'jesus christ this is masterpiece', './images/default-user.png', 5, '2021-06-30', b'1', 3),
(10, 4, 'bennet', 'one of these book you have to read in your life', './images/default-user.png', 4, '2021-06-30', b'1', 3),
(11, 3, 'namaeb', 'Very useful book', './images/default-user.png', 4, '2021-07-09', b'1', 3),
(15, 7, 'namaeb', 'this is a lot of knowledge here xd', './images/default-user.png', 5, '2021-07-13', b'1', 3),
(18, 9, 'namaeb', 'very useful for someone who start learning english\r\n', './images/default-user.png', 3, '2021-07-13', b'1', 3),
(24, 2, 'namaeb', 'i bought this book and it is pretty good honestly', './images/default-user.png', 4, '2021-08-19', b'1', 3),
(35, 11, 'namaeb', 'this is amazing book!', './images/default-user.png', 5, '2021-08-20', b'1', 3),
(36, 11, 'namaeb', 'i bought this book and it isnt make me disapoint', './images/default-user.png', 4, '2021-08-23', b'1', 3),
(37, 12, 'dshang', 'great book', './images/default-user.png', 3, '2021-08-24', b'1', 2),
(39, 12, 'namaeb', 'damn this is masterpieces', './images/default-user.png', 5, '2021-08-24', b'1', 3),
(40, 12, 'beeanhh', 'that is great', './images/default-user.png', 5, '2021-08-25', b'1', 14),
(41, 12, 'beeanhh', 'ohh i think again', './images/default-user.png', 3, '2021-08-25', b'1', 14),
(42, 10, 'namaeb', 'hay vai dai', './images/default-user.png', 5, '2021-08-25', b'0', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_book_review_like`
--

CREATE TABLE `tbl_book_review_like` (
  `like_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `like_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_book_review_like`
--

INSERT INTO `tbl_book_review_like` (`like_id`, `review_id`, `client_id`, `like_status`) VALUES
(1, 15, 3, b'1'),
(2, 8, 3, b'1'),
(3, 36, 3, b'1'),
(4, 35, 3, b'1'),
(5, 10, 14, b'1'),
(6, 7, 14, b'1'),
(7, 40, 14, b'1'),
(8, 41, 14, b'0'),
(9, 37, 14, b'1'),
(10, 39, 14, b'1'),
(12, 11, 2, b'1'),
(13, 1, 2, b'1'),
(14, 11, 3, b'1'),
(15, 1, 3, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_book_review_reply`
--

CREATE TABLE `tbl_book_review_reply` (
  `reply_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `reply_content` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status_reply` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_book_review_reply`
--

INSERT INTO `tbl_book_review_reply` (`reply_id`, `review_id`, `client_id`, `reply_content`, `createdate`, `status_reply`) VALUES
(1, 6, 3, 'exactly', '2021-08-17', b'1'),
(10, 11, 3, 'so true', '2021-08-18', b'1'),
(11, 15, 3, 'i totally agree with your idea', '2021-08-22', b'1'),
(12, 11, 3, 'youre right', '2021-08-22', b'1'),
(13, 36, 3, 'damn boyz', '2021-08-23', b'1'),
(14, 10, 14, 'i like your think', '2021-08-24', b'1'),
(15, 7, 14, 'good to help you', '2021-08-24', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_box_chat`
--

CREATE TABLE `tbl_box_chat` (
  `chat_id` int(11) NOT NULL,
  `client_sent` int(11) NOT NULL,
  `client_receive` int(11) NOT NULL,
  `chat_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_check_test`
--

CREATE TABLE `tbl_check_test` (
  `check_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_answer` int(11) NOT NULL,
  `check_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(13) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `client_img` varchar(250) DEFAULT './images/default-user.png',
  `about` varchar(250) DEFAULT 'about a client of engzone',
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `school` varchar(50) NOT NULL DEFAULT 'namaeb de creative',
  `grade` int(11) NOT NULL DEFAULT 1,
  `rank_id` int(11) NOT NULL DEFAULT 5,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `code` mediumint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_client`
--

INSERT INTO `tbl_client` (`client_id`, `username`, `password`, `fullname`, `email`, `address`, `phonenumber`, `client_img`, `about`, `createdate`, `school`, `grade`, `rank_id`, `status`, `code`) VALUES
(2, 'dshang', '123456', 'Dương Đình Shang', 'codersang@gmail.com', 'Thái Bình', '0984378921', './images/default-user.png', 'about a client of engzone', '2021-07-06', 'bk aptech', 13, 4, b'1', 0),
(3, 'namaeb', '8151', 'lee Thanh Long', 'leethanhlong2210@gmail.com', 'số nhà 21A, xóm Thọ, thôn Đoài, xã Nam Hồng', '0385230377', './images/default-user.png', 'about a client of engzone', '2021-07-09', 'bk aptech', 13, 4, b'1', 0),
(14, 'beeanhh', 'Khongcomatkhau', 'Thuy anh', 'adelia.le1402@gmail.com', '', '', './images/default-user.png', 'about a client of engzone', '2021-08-23', 'ULIS', 13, 4, b'1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_grade`
--

CREATE TABLE `tbl_grade` (
  `grade_id` int(11) NOT NULL,
  `grade_detail` varchar(29) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_grade`
--

INSERT INTO `tbl_grade` (`grade_id`, `grade_detail`) VALUES
(1, 'Grade 1'),
(2, 'Grade 2'),
(3, 'Grade 3'),
(4, 'Grade 4'),
(5, 'Grade 5'),
(6, 'Grade 6'),
(7, 'Grade 7'),
(8, 'Grade 8'),
(9, 'Grade 9'),
(10, 'Grade 10'),
(11, 'Grade 11'),
(12, 'Grade 12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lesson`
--

CREATE TABLE `tbl_lesson` (
  `lesson_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `lesson_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lesson_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lesson_video` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https://www.youtube.com/embed/dQw4w9WgXcQ',
  `teacher` varchar(29) COLLATE utf8_unicode_ci NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lesson`
--

INSERT INTO `tbl_lesson` (`lesson_id`, `test_id`, `grade_id`, `lesson_name`, `lesson_content`, `lesson_video`, `teacher`, `status`) VALUES
(1, 5, 1, 'Lesson 1: Listen and repeat', 'alodasdlkj alskdj oqiwdasd asddd', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'Namaeb', b'1'),
(2, 0, 7, 'Lesson 1: Reading', 'asdlkj lakjsdl l kjalskdj lkajs lkj lkajslk jlaks jlka jlkajsdlkajs lkj alksj lkajdas', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'Namaeb', b'1'),
(3, 0, 1, 'Lesson 2: Speaking', 'never gonna give you up, never gonna let you down', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'suckF', b'1'),
(4, 2, 12, 'Lesson 2: analysis', 'why mat bua eat shit?', 'https://www.youtube.com/embed/dQw4w9WgXcQ\r\n', 'suck face', b'1'),
(5, 0, 2, 'Lesson 1: test', 'test ', '', 'de suck', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lesson_save`
--

CREATE TABLE `tbl_lesson_save` (
  `save_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `lesson_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lesson_save`
--

INSERT INTO `tbl_lesson_save` (`save_id`, `lesson_id`, `client_id`, `lesson_status`) VALUES
(1, 2, 3, b'1'),
(2, 1, 2, b'1'),
(3, 3, 3, b'1'),
(4, 4, 3, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `client_id`, `client_name`, `email`, `address`, `phonenumber`, `createdate`, `status`) VALUES
(19, 2, 'Dương Đình Shang', 'codersang@gmail.com', 'Thái Bình', '0984378921', '2021-08-12', b'0'),
(20, 3, 'De Namaeb', 'leethanhlong2210@gmail.com', 'Ha Noi', '0385230377', '2021-08-13', b'1'),
(21, 3, 'Lê Thành Long', 'leethanhlong2210@gmail.com', 'số nhà 21A, xóm Thọ, thôn Đoài, xã Nam Hồng', '0385230377', '2021-08-13', b'0'),
(35, 3, 'Lê Thành Long', 'leethanhlong2210@gmail.com', 'số nhà 21A, xóm Thọ, thôn Đoài, xã Nam Hồng', '0385230377', '2021-08-20', b'0'),
(36, 2, 'Dương Đình Shang', 'codersang@gmail.com', 'Thái Bình', '0984378921', '2021-08-23', b'0'),
(37, 2, 'Dương Đình Shang', 'codersang@gmail.com', 'Thái Bình', '0984378921', '2021-08-23', b'0'),
(38, 2, 'Dương Đình Shang', 'codersang@gmail.com', 'Thái Bình', '0984378921', '2021-08-23', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orderdetail`
--

CREATE TABLE `tbl_orderdetail` (
  `orderdetail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orderdetail`
--

INSERT INTO `tbl_orderdetail` (`orderdetail_id`, `order_id`, `book_id`, `quantity`, `total_price`, `status`) VALUES
(1, 19, 3, 2, 900000, b'0'),
(2, 19, 2, 1, 190000, b'0'),
(3, 19, 4, 1, 430000, b'0'),
(4, 20, 3, 1, 450000, b'0'),
(5, 20, 2, 2, 380000, b'0'),
(6, 21, 3, 1, 450000, b'0'),
(7, 21, 2, 2, 380000, b'0'),
(60, 35, 10, 1, 750000, b'0'),
(61, 35, 12, 1, 333000, b'0'),
(62, 35, 11, 2, 1200000, b'0'),
(63, 35, 9, 1, 375000, b'0'),
(64, 36, 7, 3, 597000, b'0'),
(65, 37, 7, 3, 597000, b'0'),
(66, 38, 7, 3, 597000, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post_comment`
--

CREATE TABLE `tbl_post_comment` (
  `cmt_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cmter_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cmt_content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT './images/default-user.png',
  `favorite` int(11) DEFAULT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status_cmt` bit(1) NOT NULL DEFAULT b'1',
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post_comment`
--

INSERT INTO `tbl_post_comment` (`cmt_id`, `post_id`, `cmter_name`, `cmt_content`, `image`, `favorite`, `createdate`, `status_cmt`, `client_id`) VALUES
(20, 11, 'namaeb', 'great', './images/default-user.png', NULL, '2021-07-09', b'1', 3),
(23, 11, 'namaeb', 'so true', './images/default-user.png', NULL, '2021-08-18', b'1', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post_comment_like`
--

CREATE TABLE `tbl_post_comment_like` (
  `like_id` int(11) NOT NULL,
  `cmt_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `like_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post_comment_like`
--

INSERT INTO `tbl_post_comment_like` (`like_id`, `cmt_id`, `client_id`, `like_status`) VALUES
(1, 23, 3, b'1'),
(2, 20, 3, b'1'),
(3, 23, 2, b'0'),
(4, 20, 2, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post_comment_reply`
--

CREATE TABLE `tbl_post_comment_reply` (
  `reply_id` int(11) NOT NULL,
  `cmt_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `reply_content` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status_reply` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post_comment_reply`
--

INSERT INTO `tbl_post_comment_reply` (`reply_id`, `cmt_id`, `client_id`, `reply_content`, `createdate`, `status_reply`) VALUES
(1, 23, 3, 'dasdasdas', '2021-08-18', b'1'),
(2, 20, 3, 'alolo', '2021-08-18', b'1'),
(3, 23, 3, 'youre right', '2021-08-22', b'1'),
(4, 23, 3, 'tks all', '2021-08-22', b'1'),
(6, 20, 3, 'bruhhhh', '2021-08-22', b'1'),
(7, 20, 3, 'i agree with your idea', '2021-08-22', b'1'),
(8, 23, 3, 'so sad for michael right', '2021-08-22', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post_favorite`
--

CREATE TABLE `tbl_post_favorite` (
  `favorite_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `favorite_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post_favorite`
--

INSERT INTO `tbl_post_favorite` (`favorite_id`, `post_id`, `client_id`, `favorite_status`) VALUES
(1, 24, 14, b'1'),
(2, 23, 14, b'1'),
(3, 11, 14, b'1'),
(4, 12, 14, b'1'),
(5, 13, 14, b'1'),
(6, 23, 3, b'1'),
(7, 24, 3, b'1'),
(8, 13, 3, b'1'),
(9, 11, 3, b'1'),
(10, 12, 3, b'1'),
(11, 22, 14, b'1'),
(12, 14, 14, b'1'),
(13, 14, 2, b'1'),
(14, 22, 2, b'1'),
(15, 13, 2, b'1'),
(16, 12, 2, b'1'),
(17, 11, 2, b'1'),
(18, 14, 3, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post_save`
--

CREATE TABLE `tbl_post_save` (
  `save_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `save_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_post_save`
--

INSERT INTO `tbl_post_save` (`save_id`, `post_id`, `client_id`, `save_status`) VALUES
(1, 12, 3, b'1'),
(2, 11, 3, b'1'),
(3, 13, 3, b'1'),
(4, 22, 3, b'0'),
(5, 24, 3, b'1'),
(6, 23, 3, b'0'),
(7, 14, 3, b'0'),
(8, 23, 14, b'1'),
(9, 22, 14, b'1'),
(10, 11, 14, b'1'),
(11, 12, 14, b'1'),
(12, 12, 2, b'1'),
(13, 11, 2, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `question_content` text COLLATE utf8_unicode_ci NOT NULL,
  `answer_a` text COLLATE utf8_unicode_ci NOT NULL,
  `answer_b` text COLLATE utf8_unicode_ci NOT NULL,
  `answer_c` text COLLATE utf8_unicode_ci NOT NULL,
  `answer_d` text COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` text COLLATE utf8_unicode_ci NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `test_id`, `grade_id`, `rank_id`, `question_content`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`, `status`) VALUES
(1, 2, 12, 3, 'mat bua an cut gi?', 'trau ', 'bo ', 'ngua ', 'meo', 'C', b'1'),
(2, 2, 12, 3, 'meo moi la con gi', 'quy dau moi', 'cong chua dau moi', 'quy mat bua', 'cong chua mat bua', 'A', b'1'),
(3, 2, 12, 3, 'tai sao wut gia mat bua', 'an cut meo', 'ngui ram ', 'khong ai biet ca', 'tu khoi nguon cua vu tru', 'D', b'1'),
(4, 2, 12, 3, 'loai cut thang mat bua hay an nhat', 'an cut meo', 'an cut bo', 'an cut ngua', 'an cut trau', 'A', b'1'),
(5, 2, 12, 3, 'meo moi den tu dau', 'vu tru song song', 'the gioi tam linh', 'cai bung tay cua thanos', 'meo moi me', 'D', b'1'),
(6, 2, 12, 3, 'asd', 'asd', 'a', 's', 'd', 'A', b'1'),
(7, 3, 9, 2, 'abcd', 'a', 'b', 'c', 'd', 'A', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `rank_id` int(11) NOT NULL,
  `rank_detail` varchar(29) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_rank`
--

INSERT INTO `tbl_rank` (`rank_id`, `rank_detail`) VALUES
(1, 'Primary'),
(2, 'Secondary'),
(3, 'Highschool'),
(4, 'University'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review_web`
--

CREATE TABLE `tbl_review_web` (
  `review_id` int(11) NOT NULL,
  `reviewer_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `review_content` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(256) COLLATE utf8_unicode_ci DEFAULT './images/default-user.png',
  `rating` int(11) DEFAULT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_review_web`
--

INSERT INTO `tbl_review_web` (`review_id`, `reviewer_name`, `review_content`, `img`, `rating`, `createdate`, `status`, `client_id`) VALUES
(7, 'raiden', 'i really love this ', './images/default-user.png', 5, '2021-07-05', b'1', 3),
(9, 'namaeb', 'damn this is good. i read it every day\r\n', './images/default-user.png', 5, '2021-07-09', b'1', 3),
(10, 'dshang', 'nicer', './images/default-user.png', 3, '2021-07-09', b'1', 2),
(11, 'namaeb', 'impressive', './images/default-user.png', 4, '2021-07-21', b'1', 3),
(16, 'namaeb', 'em dung cu hon bu lol thuy tuyen', './images/default-user.png', 5, '2021-09-02', b'1', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review_web_like`
--

CREATE TABLE `tbl_review_web_like` (
  `like_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `like_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_review_web_like`
--

INSERT INTO `tbl_review_web_like` (`like_id`, `review_id`, `client_id`, `like_status`) VALUES
(1, 7, 3, b'1'),
(2, 9, 3, b'1'),
(3, 11, 3, b'0'),
(4, 10, 3, b'1'),
(5, 7, 2, b'1'),
(6, 9, 2, b'1'),
(7, 16, 3, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review_web_reply`
--

CREATE TABLE `tbl_review_web_reply` (
  `reply_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `reply_content` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `status_reply` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_review_web_reply`
--

INSERT INTO `tbl_review_web_reply` (`reply_id`, `review_id`, `client_id`, `reply_content`, `createdate`, `status_reply`) VALUES
(7, 7, 3, 'exactly', '2021-08-17', b'1'),
(8, 9, 3, 'i agree with tour idea', '2021-08-17', b'1'),
(11, 11, 3, 'so true', '2021-08-17', b'1'),
(12, 7, 3, 'i totally agree with your idea ', '2021-08-22', b'1'),
(13, 16, 3, 'hay ban oi', '2021-09-02', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(11) NOT NULL,
  `section_detail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `section_detail`) VALUES
(1, 'Test 15 min'),
(2, 'Test 60 min'),
(3, 'Test mid semester I'),
(4, 'Test end semester I'),
(5, 'Test mid semester II'),
(6, 'Test end semester II');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_student_test`
--

CREATE TABLE `tbl_student_test` (
  `student_test_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tag`
--

INSERT INTO `tbl_tag` (`tag_id`, `tag_name`, `status`) VALUES
(1, 'Art', b'1'),
(2, 'Beauty', b'1'),
(3, 'Business', b'1'),
(4, 'Culture', b'1'),
(5, 'Design', b'1'),
(6, 'English', b'1'),
(7, 'Lifestyle', b'1'),
(8, 'Quote', b'1'),
(9, 'Social', b'1'),
(10, 'Scientist', b'1'),
(11, 'Love', b'1'),
(12, 'Life hack', b'1'),
(13, 'Travel tips', b'1'),
(14, 'Daily life', b'1'),
(15, 'Gaming', b'1'),
(16, 'Sporty', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_test`
--

CREATE TABLE `tbl_test` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `grade_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `total_question` int(11) DEFAULT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_test`
--

INSERT INTO `tbl_test` (`test_id`, `test_name`, `grade_id`, `rank_id`, `total_question`, `time_limit`, `status`) VALUES
(2, 'Bai thi giua ky 1', 12, 3, 5, 60, b'1'),
(3, '15min test', 9, 2, 1, 15, b'1'),
(4, '60min test', 1, 1, NULL, 60, b'1'),
(5, '15min exam', 1, 1, NULL, 15, b'1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`) USING BTREE;

--
-- Chỉ mục cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_cat_id` (`book_cat_id`);

--
-- Chỉ mục cho bảng `tbl_book_category`
--
ALTER TABLE `tbl_book_category`
  ADD PRIMARY KEY (`book_cat_id`);

--
-- Chỉ mục cho bảng `tbl_book_favorite`
--
ALTER TABLE `tbl_book_favorite`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `tbl_book_favorite_ibfk_1` (`book_id`),
  ADD KEY `tbl_book_favorite_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_book_review`
--
ALTER TABLE `tbl_book_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `tbl_book_review_ibfk_1` (`book_id`);

--
-- Chỉ mục cho bảng `tbl_book_review_like`
--
ALTER TABLE `tbl_book_review_like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `tbl_book_review_like_ibfk_1` (`review_id`),
  ADD KEY `tbl_book_review_like_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_book_review_reply`
--
ALTER TABLE `tbl_book_review_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `tbl_book_review_reply_ibfk_2` (`review_id`),
  ADD KEY `tbl_book_review_reply_ibfk_1` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_box_chat`
--
ALTER TABLE `tbl_box_chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `client_sent` (`client_sent`),
  ADD KEY `client_receive` (`client_receive`);

--
-- Chỉ mục cho bảng `tbl_check_test`
--
ALTER TABLE `tbl_check_test`
  ADD PRIMARY KEY (`check_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`) USING BTREE,
  ADD KEY `rank_id` (`rank_id`);

--
-- Chỉ mục cho bảng `tbl_grade`
--
ALTER TABLE `tbl_grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Chỉ mục cho bảng `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Chỉ mục cho bảng `tbl_lesson_save`
--
ALTER TABLE `tbl_lesson_save`
  ADD PRIMARY KEY (`save_id`),
  ADD KEY `tbl_lesson_save_ibfk_1` (`lesson_id`),
  ADD KEY `tbl_lesson_save_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tbl_order_ibfk_1` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `tbl_orderdetail_ibfk_1` (`order_id`),
  ADD KEY `book` (`book_id`);

--
-- Chỉ mục cho bảng `tbl_post_comment`
--
ALTER TABLE `tbl_post_comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `tbl_post_comment_ibfk_1` (`post_id`),
  ADD KEY `tbl_post_comment_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_post_comment_like`
--
ALTER TABLE `tbl_post_comment_like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `tbl_post_comment_like_ibfk_3` (`cmt_id`),
  ADD KEY `tbl_post_comment_like_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_post_comment_reply`
--
ALTER TABLE `tbl_post_comment_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `tbl_post_comment_reply_ibfk_3` (`cmt_id`),
  ADD KEY `tbl_post_comment_reply_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_post_favorite`
--
ALTER TABLE `tbl_post_favorite`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `tbl_post_favorite_ibfk_1` (`post_id`),
  ADD KEY `tbl_post_favorite_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_post_save`
--
ALTER TABLE `tbl_post_save`
  ADD PRIMARY KEY (`save_id`),
  ADD KEY `tbl_post_save_ibfk_1` (`post_id`),
  ADD KEY `tbl_post_save_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `rank_id` (`rank_id`),
  ADD KEY `tbl_question_ibfk_1` (`grade_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Chỉ mục cho bảng `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Chỉ mục cho bảng `tbl_review_web`
--
ALTER TABLE `tbl_review_web`
  ADD PRIMARY KEY (`review_id`);

--
-- Chỉ mục cho bảng `tbl_review_web_like`
--
ALTER TABLE `tbl_review_web_like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `tbl_review_web_like_ibfk_1` (`review_id`),
  ADD KEY `tbl_review_web_like_ibfk_2` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_review_web_reply`
--
ALTER TABLE `tbl_review_web_reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `tbl_review_web_reply_ibfk_2` (`review_id`),
  ADD KEY `tbl_review_web_reply_ibfk_1` (`client_id`);

--
-- Chỉ mục cho bảng `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Chỉ mục cho bảng `tbl_student_test`
--
ALTER TABLE `tbl_student_test`
  ADD PRIMARY KEY (`student_test_id`),
  ADD KEY `tbl_student_test_ibfk_1` (`client_id`),
  ADD KEY `tbl_student_test_ibfk_2` (`test_id`);

--
-- Chỉ mục cho bảng `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Chỉ mục cho bảng `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `rank_id` (`rank_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_book_category`
--
ALTER TABLE `tbl_book_category`
  MODIFY `book_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_book_favorite`
--
ALTER TABLE `tbl_book_favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_book_review`
--
ALTER TABLE `tbl_book_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_book_review_like`
--
ALTER TABLE `tbl_book_review_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_book_review_reply`
--
ALTER TABLE `tbl_book_review_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_box_chat`
--
ALTER TABLE `tbl_box_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_check_test`
--
ALTER TABLE `tbl_check_test`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_grade`
--
ALTER TABLE `tbl_grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_lesson`
--
ALTER TABLE `tbl_lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_lesson_save`
--
ALTER TABLE `tbl_lesson_save`
  MODIFY `save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `tbl_post_comment`
--
ALTER TABLE `tbl_post_comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_post_comment_like`
--
ALTER TABLE `tbl_post_comment_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_post_comment_reply`
--
ALTER TABLE `tbl_post_comment_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_post_favorite`
--
ALTER TABLE `tbl_post_favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_post_save`
--
ALTER TABLE `tbl_post_save`
  MODIFY `save_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_review_web`
--
ALTER TABLE `tbl_review_web`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_review_web_like`
--
ALTER TABLE `tbl_review_web_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_review_web_reply`
--
ALTER TABLE `tbl_review_web_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_student_test`
--
ALTER TABLE `tbl_student_test`
  MODIFY `student_test_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_tag`
--
ALTER TABLE `tbl_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `tbl_blog_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`),
  ADD CONSTRAINT `tbl_blog_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tbl_tag` (`tag_id`);

--
-- Các ràng buộc cho bảng `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD CONSTRAINT `tbl_book_ibfk_1` FOREIGN KEY (`book_cat_id`) REFERENCES `tbl_book_category` (`book_cat_id`);

--
-- Các ràng buộc cho bảng `tbl_book_favorite`
--
ALTER TABLE `tbl_book_favorite`
  ADD CONSTRAINT `tbl_book_favorite_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `tbl_book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_book_favorite_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_book_review`
--
ALTER TABLE `tbl_book_review`
  ADD CONSTRAINT `tbl_book_review_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `tbl_book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_book_review_like`
--
ALTER TABLE `tbl_book_review_like`
  ADD CONSTRAINT `tbl_book_review_like_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `tbl_book_review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_book_review_like_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_book_review_reply`
--
ALTER TABLE `tbl_book_review_reply`
  ADD CONSTRAINT `tbl_book_review_reply_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_book_review_reply_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `tbl_book_review` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_box_chat`
--
ALTER TABLE `tbl_box_chat`
  ADD CONSTRAINT `tbl_box_chat_ibfk_1` FOREIGN KEY (`client_sent`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_box_chat_ibfk_2` FOREIGN KEY (`client_receive`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_check_test`
--
ALTER TABLE `tbl_check_test`
  ADD CONSTRAINT `tbl_check_test_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `tbl_question` (`question_id`),
  ADD CONSTRAINT `tbl_check_test_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tbl_test` (`test_id`),
  ADD CONSTRAINT `tbl_check_test_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`);

--
-- Các ràng buộc cho bảng `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD CONSTRAINT `tbl_client_ibfk_1` FOREIGN KEY (`rank_id`) REFERENCES `tbl_rank` (`rank_id`);

--
-- Các ràng buộc cho bảng `tbl_lesson_save`
--
ALTER TABLE `tbl_lesson_save`
  ADD CONSTRAINT `tbl_lesson_save_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `tbl_lesson` (`lesson_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lesson_save_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_orderdetail`
--
ALTER TABLE `tbl_orderdetail`
  ADD CONSTRAINT `book` FOREIGN KEY (`book_id`) REFERENCES `tbl_book` (`book_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post_comment`
--
ALTER TABLE `tbl_post_comment`
  ADD CONSTRAINT `tbl_post_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tbl_blog` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_post_comment_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post_comment_like`
--
ALTER TABLE `tbl_post_comment_like`
  ADD CONSTRAINT `tbl_post_comment_like_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_post_comment_like_ibfk_3` FOREIGN KEY (`cmt_id`) REFERENCES `tbl_post_comment` (`cmt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post_comment_reply`
--
ALTER TABLE `tbl_post_comment_reply`
  ADD CONSTRAINT `tbl_post_comment_reply_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_post_comment_reply_ibfk_3` FOREIGN KEY (`cmt_id`) REFERENCES `tbl_post_comment` (`cmt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post_favorite`
--
ALTER TABLE `tbl_post_favorite`
  ADD CONSTRAINT `tbl_post_favorite_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tbl_blog` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_post_favorite_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post_save`
--
ALTER TABLE `tbl_post_save`
  ADD CONSTRAINT `tbl_post_save_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tbl_blog` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_post_save_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD CONSTRAINT `tbl_question_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `tbl_grade` (`grade_id`),
  ADD CONSTRAINT `tbl_question_ibfk_2` FOREIGN KEY (`rank_id`) REFERENCES `tbl_rank` (`rank_id`),
  ADD CONSTRAINT `tbl_question_ibfk_3` FOREIGN KEY (`test_id`) REFERENCES `tbl_test` (`test_id`);

--
-- Các ràng buộc cho bảng `tbl_review_web_like`
--
ALTER TABLE `tbl_review_web_like`
  ADD CONSTRAINT `tbl_review_web_like_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `tbl_review_web` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_review_web_like_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_review_web_reply`
--
ALTER TABLE `tbl_review_web_reply`
  ADD CONSTRAINT `tbl_review_web_reply_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_review_web_reply_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `tbl_review_web` (`review_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_student_test`
--
ALTER TABLE `tbl_student_test`
  ADD CONSTRAINT `tbl_student_test_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_test_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tbl_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD CONSTRAINT `tbl_test_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `tbl_grade` (`grade_id`),
  ADD CONSTRAINT `tbl_test_ibfk_3` FOREIGN KEY (`rank_id`) REFERENCES `tbl_rank` (`rank_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
