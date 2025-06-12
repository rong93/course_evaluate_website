-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-06-12 13:40:01
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `software_engineer_test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `course_name` text NOT NULL,
  `teacher` text NOT NULL,
  `comment_text` text NOT NULL,
  `comment_id` int(11) NOT NULL,
  `time` text NOT NULL,
  `comment_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`course_name`, `teacher`, `comment_text`, `comment_id`, `time`, `comment_user_id`) VALUES
('數位系統設計', '曾王道', '老師非常有熱情和知識，讓學習過程變得非常有趣!', 1, '2024-04-20 20:00:49', 1),
('人工智慧應用', '邱昭彰', '課程結構清晰，內容豐富，幫助我建立了很好的基礎。', 2, '2024-04-20 20:01:24', 1),
('攝影學', '張世明', '老師不願意傾聽學生的反饋意見，對改進課程內容和教學方法缺乏積極性', 3, '2024-04-20 20:01:32', 1),
('計算機網路概論', '黃毅然', '課程難度過高或過低，無法滿足不同學生的學習需求，造成學習壓力或無聊。', 4, '2024-04-20 20:02:13', 5),
('經濟學', '葉佳炫', '學習資源匱乏，教材陳舊，無法滿足當前學習和行業需求。', 5, '2024-04-20 20:02:27', 5),
('程式設計（一）', '張經略', '課程設計考慮到了不同學習風格，讓每個人都能找到適合自己的學習方式。', 6, '2024-04-20 20:02:36', 5),
('微積分（一）', '黃依賢', '學習資源匱乏，教材陳舊，無法滿足當前學習和行業需求。', 7, '2024-04-20 20:02:59', 5),
('Ｗｅｂ程式設計', '簡廷因', '課程對我的專業發展有很大幫助，讓我在職場上更加自信和有競爭力。', 8, '2024-04-20 20:03:15', 5),
('行動裝置程式設計', '張韶宸', '課程安排彈性大，考慮到了學生的日常生活和其他學業負擔。', 9, '2024-04-20 20:04:26', 11),
('攝影學', '張世明', '老師對學生的問題回答不及時，缺乏有效的支持和指導。', 10, '2024-04-20 20:04:53', 11),
('微積分（一）', '黃依賢', '老師願意花時間解答學生的問題，並且給予有價值的建議和反饋。', 11, '2024-04-20 20:05:17', 11),
('設計史', '陳麗秋', '課程內容與當今行業趨勢和需求相符，為我未來的職業發展奠定了良好的基礎。', 12, '2024-04-20 20:05:37', 11),
('軟體工程', '徐逸懷', '老師非常有熱情和知識，讓學習過程變得非常有趣。', 13, '2024-04-20 20:06:07', 11),
('離散數學', '許大偉', '課程安排彈性大，考慮到了學生的日常生活和其他學業負擔。', 14, '2024-04-20 20:06:42', 11),
('數位系統設計', '曾王道', '老師注重互動，鼓勵學生參與討論和小組活動，促進了彼此之間的學習和交流。', 15, '2024-04-20 20:07:05', 2),
('程式設計（一）', '張經略', '提供了許多實際案例和應用，使得理論知識更加生動和易於理解。', 16, '2024-04-20 20:07:36', 2),
('經濟學', '葉佳炫', '老師不願意傾聽學生的反饋意見，對改進課程內容和教學方法缺乏積極性。', 17, '2024-04-20 20:07:54', 2),
('數位系統設計', '曾王道', '課程安排彈性大，考慮到了學生的日常生活和其他學業負擔。', 18, '2024-04-20 20:08:52', 3),
('人工智慧應用', '邱昭彰', '課程對我的專業發展有很大幫助，讓我在職場上更加自信和有競爭力', 19, '2024-04-20 20:09:24', 3),
('設計史', '陳麗秋', '老師注重互動，鼓勵學生參與討論和小組活動，促進了彼此之間的學習和交流。', 20, '2024-04-20 20:09:47', 3),
('行動裝置程式設計', '張韶宸', '提供了許多實際案例和應用，使得理論知識更加生動和易於理解', 21, '2024-04-20 20:10:29', 6),
('經濟學', '葉佳炫', '課程難度過高或過低，無法滿足不同學生的學習需求，造成學習壓力或無聊。', 22, '2024-04-20 20:10:52', 6),
('程式設計（一）', '張經略', '老師非常有熱情和知識，讓學習過程變得非常有趣。', 23, '2024-04-20 20:11:10', 6),
('軟體工程', '徐逸懷', '提供了許多實際案例和應用，使得理論知識更加生動和易於理解。', 24, '2024-04-20 20:11:28', 6),
('Ｗｅｂ程式設計', '簡廷因', '老師注重互動，鼓勵學生參與討論和小組活動，促進了彼此之間的學習和交流。', 25, '2024-04-20 20:11:45', 6);

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `course_number` mediumtext NOT NULL,
  `course_name` mediumtext NOT NULL,
  `teacher` mediumtext NOT NULL,
  `department` int(11) NOT NULL,
  `star_1` int(11) NOT NULL,
  `star_2` int(11) NOT NULL,
  `star_3` int(11) NOT NULL,
  `star_4` int(11) NOT NULL,
  `number_of_people` int(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`course_number`, `course_name`, `teacher`, `department`, `star_1`, `star_2`, `star_3`, `star_4`, `number_of_people`, `course_id`, `time`) VALUES
('', '離散數學', '許大偉', 1, 8, 8, 8, 8, 1, 1, '2024-04-20 19:54:19'),
('', '程式設計（一）', '張經略', 2, 29, 21, 31, 30, 4, 2, '2024-04-20 19:55:28'),
('', '數位系統設計', '曾王道', 1, 25, 22, 20, 20, 4, 3, '2024-04-20 19:55:45'),
('', '人工智慧應用', '邱昭彰', 4, 15, 10, 15, 12, 2, 4, '2024-04-20 19:56:26'),
('', '設計史', '陳麗秋', 3, 13, 11, 11, 12, 2, 5, '2024-04-20 19:56:56'),
('', '微積分（一）', '黃依賢', 1, 7, 9, 11, 9, 2, 6, '2024-04-20 19:57:24'),
('', '計算機網路概論', '黃毅然', 1, 0, 0, 0, 0, 0, 7, '2024-04-20 19:57:32'),
('', '經濟學', '葉佳炫', 4, 6, 21, 8, 10, 3, 8, '2024-04-20 19:58:04'),
('', '攝影學', '張世明', 3, 2, 9, 3, 2, 1, 9, '2024-04-20 19:58:13'),
('', '軟體工程', '徐逸懷', 1, 14, 11, 15, 16, 2, 10, '2024-04-20 19:58:23'),
('', 'Ｗｅｂ程式設計', '簡廷因', 1, 17, 17, 16, 17, 2, 11, '2024-04-20 19:58:35'),
('', '行動裝置程式設計', '張韶宸', 3, 13, 8, 13, 13, 2, 12, '2024-04-20 19:58:46');

-- --------------------------------------------------------

--
-- 資料表結構 `user_information`
--

CREATE TABLE `user_information` (
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user_information`
--

INSERT INTO `user_information` (`name`, `mail`, `password`, `user_id`) VALUES
('漩渦鳴人', '1@mail', '111', 1),
('宇智波佐助', '2@mail', '111', 2),
('孫悟空', '3@mail', '111', 3),
('貝吉塔', '4@mail', '111', 4),
('艾倫', '5@mail', '111', 5),
('兩津勘吉', '6@mail', '111', 6),
('里維', '7@mail', '111', 7),
('哆啦A夢', '8@mail', '111', 8),
('奇犽', '9@mail', '111', 9),
('萊納', '10@mail', '111', 10),
('馬力歐', '11@mail', '111', 11),
('拉拉拉', 'la@mail', '111', 12),
('123', 'z@mail', '111', 13),
('123', '123@gmail', '123', 14),
('111', '123@gmail.com', '111', 15),
('456', '456@mail', '456', 16),
('test', 'test@mail.com', 'test', 17);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- 資料表索引 `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_information`
--
ALTER TABLE `user_information`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
