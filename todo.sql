-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2024 lúc 02:38 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `todo`
--

INSERT INTO `todo` (`id`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Học Tiếng Việt', 'Nâng cao kỹ năng nghe, nói, đọc và viết tiếng Việt', '2024-12-14 08:13:55', '2024-12-14 08:13:55'),
(2, 'Ôn tập ngữ pháp', 'Học và luyện tập các quy tắc ngữ pháp tiếng Việt cơ bản', '2024-12-14 08:13:55', '2024-12-14 08:13:55'),
(3, 'Đọc sách văn học', 'Đọc các tác phẩm văn học Việt Nam để cải thiện khả năng đọc hiểu', '2024-12-14 08:13:55', '2024-12-14 08:13:55'),
(4, 'Huỳnh Tấn Phúc', 'Bình thường', '2024-12-05 09:23:00', '2024-12-14 09:23:09'),
(5, 'Huỳnh Tấn Phúc', 'Môn học về số học và hình học', '2024-12-07 09:23:00', '2024-12-14 09:23:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
