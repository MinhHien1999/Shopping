-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2020 lúc 04:00 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `admin_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_ten`, `admin_email`, `admin_matkhau`, `created_at`, `updated_at`) VALUES
(1, 'minh hien', 'abc@gmail.com', '123456789', '2020-08-10 04:24:16', '2020-08-10 04:24:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethd`
--

CREATE TABLE `chitiethd` (
  `id_chitiet_hoadon` int(10) UNSIGNED NOT NULL,
  `chitiethd_id_sanpham` int(10) UNSIGNED NOT NULL,
  `chitiethd_gia` double(20,2) NOT NULL,
  `chitiethd_soluong` int(11) NOT NULL,
  `chitiethd_id_hd` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethd`
--

INSERT INTO `chitiethd` (`id_chitiet_hoadon`, `chitiethd_id_sanpham`, `chitiethd_gia`, `chitiethd_soluong`, `chitiethd_id_hd`, `created_at`, `updated_at`) VALUES
(168, 20, 6290000.00, 1, 104, '2020-08-23 08:00:25', '2020-08-23 08:00:25'),
(169, 9, 5690000.00, 1, 104, '2020-08-23 08:00:25', '2020-08-23 08:00:25'),
(170, 15, 36000000.00, 1, 105, '2020-08-23 08:06:54', '2020-08-23 08:06:54'),
(171, 9, 11380000.00, 2, 105, '2020-08-23 08:06:54', '2020-08-23 08:06:54'),
(172, 20, 6290000.00, 1, 106, '2020-08-23 08:14:58', '2020-08-23 08:14:58'),
(173, 9, 5690000.00, 1, 106, '2020-08-23 08:14:58', '2020-08-23 08:14:58'),
(174, 14, 44970000.00, 3, 106, '2020-08-23 08:14:58', '2020-08-23 08:14:58'),
(175, 18, 11070000.00, 3, 107, '2020-08-23 18:30:25', '2020-08-23 18:30:25'),
(176, 17, 18490000.00, 1, 107, '2020-08-23 18:30:25', '2020-08-23 18:30:25'),
(177, 20, 31450000.00, 5, 108, '2020-08-23 18:39:49', '2020-08-23 18:39:49'),
(178, 3, 7990000.00, 1, 108, '2020-08-23 18:39:49', '2020-08-23 18:39:49'),
(179, 14, 59960000.00, 4, 108, '2020-08-23 18:39:49', '2020-08-23 18:39:49'),
(184, 20, 6290000.00, 1, 112, '2020-08-29 08:45:43', '2020-08-29 08:45:43'),
(185, 19, 19470000.00, 3, 113, '2020-08-29 08:47:33', '2020-08-29 08:47:33'),
(186, 18, 3690000.00, 1, 113, '2020-08-29 08:47:33', '2020-08-29 08:47:33'),
(187, 20, 6290000.00, 1, 114, '2020-08-29 09:14:43', '2020-08-29 09:14:43'),
(188, 19, 32450000.00, 5, 114, '2020-08-29 09:14:43', '2020-08-29 09:14:43'),
(189, 18, 3690000.00, 1, 114, '2020-08-29 09:14:43', '2020-08-29 09:14:43'),
(190, 17, 924500000.00, 50, 114, '2020-08-29 09:14:43', '2020-08-29 09:14:43'),
(191, 16, 23990000.00, 1, 114, '2020-08-29 09:14:43', '2020-08-29 09:14:43'),
(192, 19, 6490000.00, 1, 115, '2020-08-29 09:21:01', '2020-08-29 09:21:01'),
(193, 20, 125800000.00, 20, 115, '2020-08-29 09:21:01', '2020-08-29 09:21:01'),
(194, 18, 3690000.00, 1, 115, '2020-08-29 09:21:01', '2020-08-29 09:21:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsp`
--

CREATE TABLE `chitietsp` (
  `id_chitiet_sanpham` int(10) UNSIGNED NOT NULL,
  `chitietsp_id_sp` int(10) UNSIGNED NOT NULL,
  `chitietsp_hedieuhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitietsp_camera_truoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitietsp_camera_sau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitietsp_cpu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitietsp_ram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitietsp_dungluongbonho` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitietsp_dungluongpin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chitietsp_mota` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsp`
--

INSERT INTO `chitietsp` (`id_chitiet_sanpham`, `chitietsp_id_sp`, `chitietsp_hedieuhanh`, `chitietsp_camera_truoc`, `chitietsp_camera_sau`, `chitietsp_cpu`, `chitietsp_ram`, `chitietsp_dungluongbonho`, `chitietsp_dungluongpin`, `chitietsp_mota`, `created_at`, `updated_at`) VALUES
(1, 1, 'Android 10', 'Chính 32 MP & Phụ cảm biến thông minh A.I', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'Snapdragon 720G 8 nhân', '8 GB', '128 GB', '4015 mAh, có sạc nhanh', 'OPPO Reno4 - Chiếc điện thoại có thiết kế thời thượng, hiệu năng mạnh mẽ cùng bộ ba camera siêu ấn tượng, tối ưu hóa cho chụp ảnh và quay phim siêu sắc nét, hứa hẹn sẽ là sản phẩm đáng để nâng cấp của hãng OPPO trong năm nay.\r\nThiết kế mới, hiện đại và ấn tượng \r\nĐầu tiên, OPPO Reno 4 có sự nâng cấp toàn diện so với người anh em Reno3, khi sử dụng chất liệu nhôm nguyên khối và được bọc kính cường lực Gorilla Glass 3 ở phần mặt trước và vỏ nhựa giả kính mặt lưng góp phần tăng độ cứng cáp lẫn nét sang trọng cho máy. \r\n\r\nTiếp đến là màn hình hyperbol kích thước 6.4 inch có phần viền benzel được làm siêu mỏng, độ phân giải Full HD+ (1080 x 2400 Pixels) trên nền màu AMOLED mang đến chất lượng hình ảnh rõ nét, sống động, trải nghiệm giải trí chơi game trên thiết bị này sẽ cực lỳ thích.', '2020-08-09 10:42:12', '2020-08-09 10:42:12'),
(2, 2, 'Android 10', '5 MP', 'Chính 13 MP & Phụ 2 MP', 'MediaTek Helio G35 8 nhân', '2 GB', '32 GB', '5000 mAh', 'Realme vừa chính thức trình làng mẫu điện thoại giá rẻ mới mang tên Realme C11. Smartphone hướng tới nhóm khách hàng đang tìm kiếm một sản phẩm có cấu hình tốt, camera chất lượng cùng một hiệu năng vừa đủ để có thể chiến mượt hầu hết các tựa game đình đám trên thị trường hiện nay (07/2020).\r\nThiết kế đẹp mắt, màu sắc ấn tượng\r\nRealme C11 được trang bị màn hình kích thước lớn 6.5 inch, mang phong cách thiết kế quen thuộc trên các dòng điện thoại giá rẻ Realme với phần notch giọt nước phía trên và phần viền bezel đã được tối giãn nhất có thể để có thể mang tới những trải nghiệm hình ảnh đầy đủ & trọn vẹn nhất.', '2020-08-09 10:46:13', '2020-08-09 11:03:22'),
(3, 3, 'Android 10', '32 MP', 'Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP', 'Exynos 9611 8 nhân', '6 GB', '128 GB', '4000 mAh, có sạc nhanh', 'Theo Strategy Analytics, Galaxy A51 là Smartphone Android Bán Chạy Nhất Thế Giới Quý 1/2020, máy sở hữu cụm 4 camera, bao gồm camera macro chụp cận cảnh lần đầu xuất hiện trên smartphone Samsung, màn hình tràn viền vô cực cùng mặt lưng họa tiết kim cương nổi bật.\r\nThiết kế thời thượng, bật cá tính\r\nMáy có thiết kế mỏng nhẹ thuộc hàng top trong phân khúc, chỉ 7.9 mm. Mặt lưng với họa tiết cắt kim cương đa sắc nổi bật, đi kèm là 3 tùy chọn màu sắc sành điệu: Xanh Crush Đa Sắc, Trắng Crush Lấp Lánh, Đen Crush Kim Cương.', '2020-08-09 10:57:50', '2020-08-09 11:02:53'),
(4, 4, 'Android 10', '16 MP', 'Chính 48 MP & Phụ 8 MP, 5 MP, 2 MP', '16 MP', '6 GB', '128 GB', '5020 mAh, có sạc nhanh', 'Đặc điểm nổi bật của Xiaomi Redmi Note 9S\r\n\r\nBộ sản phẩm chuẩn: Hộp, Sạc, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng\r\n\r\nRedmi Note 9s là sản phẩm tầm trung nhà Xiaomi, gây ấn tượng với thiết kế tràn viền độc đáo, cấu hình mạnh mẽ và hệ thống bốn camera sau chất lượng.\r\nThiết kế cao cấp, vân tay dời sang cạnh bên\r\nKhác với màn hình đục lỗ trên người anh tiền nhiệm Redmi Note 8, Redmi Note 9s có thiết kế màn hình đục lỗ với camera trước đặt trong màn hình tương tự như trên hầu hết các máy flagship hiện nay.', '2020-08-09 11:01:57', '2020-08-09 11:01:57'),
(5, 5, 'iOS 13', '12 MP', '3 camera 12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '64 GB', '3969 mAh, có sạc nhanh', 'Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.\r\nCamera được cải tiến mạnh mẽ\r\nChắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.', '2020-08-09 11:06:54', '2020-08-09 11:06:54'),
(6, 6, 'Android 10', '16 MP', 'Chính 12 MP & Phụ 8 MP, 2 MP, 2 MP', 'Snapdragon 665 8 nhân', '6 GB', '128 GB', '5000 mAh, có sạc nhanh', 'OPPO A52 là mẫu smartphone mới của OPPO hướng đến người dùng tầm trung. Thiết bị sở hữu sức mạnh từ vi xử lý Qualcomm Snapdragon, màn hình tràn viền nốt ruồi, pin khủng. Khiến cho chiếc điện thoại này trở thành một ứng cử viên cạnh tranh trong tầm giá.\r\nCấu hình mạnh nhiều tính năng hấp dẫn\r\nOPPO A52 trang bị vi xử lý Snapdragon 665 8 nhân tầm trung mới của Qualcomm hiệu năng được tối ưu bởi công nghệ Hyper Boost do OPPO phát triển mang đến sự phản hồi nhanh chóng từ các tác vụ hàng ngày, đặc biệt là trải nghiệm chơi game 3D khá mượt mà, ổn định.', '2020-08-09 11:09:22', '2020-08-09 11:09:22'),
(7, 7, 'iOS 13', '12 MP', 'Chính 12 MP & Phụ 12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '64 GB', '3110 mAh, có sạc nhanh', 'Sau bao nhiêu chờ đợi cũng như đồn đoán thì cuối cùng Apple đã chính thức giới thiệu bộ 3 siêu phẩm iPhone 11 mạnh mẽ nhất của mình vào tháng 9/2019. Có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như chiếc iPhone Xr năm ngoái, đó chính là phiên bản iPhone 11 64GB.', '2020-08-09 11:14:28', '2020-08-09 11:14:28'),
(8, 8, 'Android 9.0 (Pie)', '20 MP', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', 'Mediatek Helio G90T 8 nhân', '6 GB', '128 GB', '4500 mAh, có sạc nhanh', 'Là phiên bản nâng cấp của chiếc Xiaomi Redmi Note 7 Pro đã \"làm mưa làm gió\" trên thị trường trước đó, chiếc Xiaomi Redmi Note 8 Pro (6GB/128GB) sẽ là sự lựa chọn hàng đầu dành cho người dùng quan tâm nhiều về hiệu năng và camera của một chiếc máy tầm trung.', '2020-08-09 11:16:18', '2020-08-09 11:16:18'),
(9, 9, 'Android 10', '13 MP', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'Exynos 850 8 nhân', '6 GB', '64 GB', '5000 mAh, có sạc nhanh', 'Samsung Galaxy A21s là chiếc điện thoại tầm trung mới của Samsung, mang trong mình có thiết kế màn hình nốt ruồi thời thượng, cùng cụm 4 camera sau độ phân giải lên đến 48 MP hỗ trợ nhiều tính năng chụp ảnh hấp dẫn.', '2020-08-09 11:18:22', '2020-08-09 11:18:22'),
(14, 14, 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, TOF 3D', 'Chính 48 MP & Phụ 8 MP, TOF 3D', 'Snapdragon 730 8 nhân', '8 GB', '128 GB', '3700 mAh, có sạc nhanh', NULL, '2020-08-18 19:12:54', '2020-08-18 19:12:54'),
(15, 15, 'Android 10', '10 MP', 'Chính 12 MP & Phụ 12 MP', 'Snapdragon 855+ 8 nhân', '8 GB', '256 GB', '3300 mAh, có sạc nhanh', NULL, '2020-08-18 19:14:20', '2020-08-18 19:14:20'),
(16, 16, 'Android 10', '10 MP', 'Chính 12 MP & Phụ 64 MP, 12 MP, TOF 3D', 'Exynos 990 8 nhân', '8 GB', '128 GB', '4500 mAh, có sạc nhanh', NULL, '2020-08-18 19:15:58', '2020-08-18 19:15:58'),
(17, 17, 'Android 10', '10 MP', 'Chính 12 MP & Phụ 64 MP, 12 MP', 'Exynos 990 8 nhân', '8 GB', '128 GB', '4000 mAh, có sạc nhanh', NULL, '2020-08-18 19:17:00', '2020-08-18 19:17:00'),
(18, 18, 'Android 10', '8 MP', 'Chính 13 MP & Phụ 5 MP, 2 MP', 'Snapdragon 450 8 nhân', '3 GB', '32 GB', '4000 mAh, có sạc nhanh', 'Samsung Galaxy A11 với thiết kế màn hình Infinity-O siêu tràn viền, bộ ba camera ấn tượng, đi kèm với mức giá phải chăng hứa hẹn sẽ tạo nên cơn sốt trên thị trường điện thoại giá rẻ.', '2020-08-18 19:24:16', '2020-08-29 09:00:24'),
(19, 19, 'Android 10', '20 MP', 'Chính 48 MP & Phụ 8 MP, 5 MP, 5 MP', 'MediaTek MT6768 8 nhân (Helio P65)', '6 GB', '128 GB', '5000 mAh, có sạc nhanh', 'Galaxy A31 là mẫu smartphone tầm trung mới ra mắt đầu năm 2020 của Samsung. Thiết bị gây ấn tượng mạnh với ngoại hình thời trang, cụm 4 camera đa chức năng, vân tay dưới màn hình và viên pin khủng lên đến 5000 mAh.', '2020-08-18 19:25:47', '2020-08-18 19:25:47'),
(20, 20, 'Android 9.0 (Pie)', '16 MP', 'Chính 25 MP & Phụ 8 MP, 5 MP', 'Exynos 7904 8 nhân', '4 GB', '64 GB', '4000 mAh, có sạc nhanh', 'Samsung Galaxy A30s, chiếc smartphone mới ra mắt sở hữu nhiều ưu điểm nổi bật trong phân khúc, nổi bật nhất phải kể đến là dung lượng pin lên tới 4000 mAh,bộ 3 camera cùng vi xử lý đủ mạnh, ổn định.', '2020-08-18 19:28:19', '2020-08-18 19:28:19'),
(21, 21, 'Android 10', '32 MP', 'Chính 48 MP & Phụ 13 MP, 12 MP', 'Snapdragon 865 8 nhân', '12 GB', '256 GB', '4200 mAh, có sạc nhanh', 'Đặc điểm nổi bật của OPPO Find X2\r\n\r\nBộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng\r\n\r\nTiếp nối thành công vang dội của thế hệ Find X, OPPO chính thức ra mắt Find X2 với những đường nét thanh lịch từ thiết kế phần cứng cho đến trải nghiệm phần mềm, hứa hẹn một vẻ đẹp hoàn hảo, một sức mạnh xứng tầm.', '2020-08-29 12:48:37', '2020-08-29 12:57:10'),
(22, 22, 'iOS 13', '12 MP', 'Chính 12 MP & Phụ 12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '128 GB', '3110 mAh, có sạc nhanh', 'Được xem là phiên bản iPhone \"giá rẻ\" trong bộ 3 iPhone mới ra mắt nhưng iPhone 11 128GB vẫn sở hữu cho mình rất nhiều ưu điểm mà hiếm có một chiếc smartphone nào khác sở hữu.', '2020-08-29 12:58:36', '2020-08-29 12:58:36'),
(23, 23, 'Android 10', '13 MP', 'Chính 48 MP & Phụ 8 MP, 5 MP, 2 MP', 'Snapdragon 675 8 nhân', '4 GB', '64 GB', '5000 mAh, có sạc nhanh', 'Nối tiếp thành công Vsmart Live, Vsmart tiếp tục cho ra mắt chiếc Vsmart Live 4 nhằm cho người dùng thêm sự lựa chọn trong phân khúc, được kế thừa các ưu điểm từ đàn anh, Live 4 hứa hẹn sẽ mang lại thêm thành công cho điện thoại thương hiệu Việt.', '2020-08-29 13:00:15', '2020-08-29 13:00:15'),
(24, 24, 'Android 9.0 (Pie)', '16 MP', 'Chính 48 MP & Phụ 8 MP, 2 MP', 'MediaTek Helio P60 8 nhân', '6 GB', '64 GB', '4020 mAh, có sạc nhanh', 'Ra mắt vào đầu năm 2020, Vsmart Active 3 (4GB/64GB) là một smartphone có hiệu năng ổn định, thời lượng pin cả ngày dài và còn nhiều tính năng đặc biệt khác nữa, hứa hẹn sẽ mang đến cho bạn một thiết bị công nghệ chẳng những thời trang còn rất hiện đại.', '2020-08-29 13:02:23', '2020-08-29 13:02:23'),
(25, 25, 'Android 10', '32 MP', 'Chính 48 MP & Phụ 12 MP, 5 MP', 'Snapdragon 855 8 nhân', '8 GB', '128 GB', '4500 mAh, có sạc nhanh', NULL, '2020-08-29 13:04:32', '2020-08-29 13:04:32'),
(26, 26, 'Android 10', '10 MP', 'Chính 12 MP & Phụ 64 MP, 12 MP', 'Exynos 990 8 nhân', '8 GB', '256 GB', '4300 mAh, có sạc nhanh', 'Tháng 8/2020, Samsung Galaxy Note 20 chính thức được lên kệ, với thiết kế camera trước nốt ruồi quen thuộc, cụm camera hình chữ nhật mới lạ cùng với việc sử dụng vi xử lý Exynos 990 cao cấp của chính Samsung chắc hẳn sẽ mang lại một trải nghiệm thú vị cùng hiệu năng mạnh mẽ.', '2020-08-29 13:05:54', '2020-08-29 13:05:54'),
(27, 27, 'Android 10', '16 MP', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'Snapdragon 665 8 nhân', '8 GB', '128 GB', '5000 mAh, có sạc nhanh', 'OPPO A92 là mẫu smartphone tầm trung vừa mới được OPPO ra mắt đầu tháng 5/2020. Chiếc điện thoại gây ấn tượng với thiết kế màn hình khoét lỗ tràn viền, cụm 4 camera ấn tượng và được bán với mức giá vô cùng phải chăng.', '2020-08-29 13:07:24', '2020-08-29 13:07:24'),
(28, 28, 'Android 10', '44 MP', 'Chính 48 MP & Phụ 13 MP, 8 MP, 2 MP', 'MediaTek Helio P90 8 nhân', '8 GB', '128 GB', '4025 mAh, có sạc nhanh', 'OPPO Reno3 là một sản phẩm ở phân khúc tầm trung nhưng vẫn sở hữu cho mình ngoại hình bắt mắt, cụm camera chất lượng và cùng nhiều đột phá về màn hình cũng như hiệu năng.', '2020-08-29 13:09:07', '2020-08-29 13:09:07'),
(29, 29, 'Android 10', '8 MP', 'Chính 13 MP & Phụ 8 MP, 5 MP, 2 MP', 'MediaTek Helio G80 8 nhân', '4 GB', '64 GB', '5020 mAh, có sạc nhanh', 'Nhanh như một cơn gió, sức hot của Redmi Note 9 Pro chưa có dấu hiệu hạ nhiệt thì Xiaomi Redmi 9 vừa bất ngờ ra mắt sớm. Thiết bị mang một thiết kế mới, thời trang và nhỏ gọn, phần cứng được nâng cấp cùng thời lượng pin ấn tượng, đặc biệt đi kèm một mức giá bán không thể nào hấp dẫn hơn.', '2020-08-29 13:11:00', '2020-08-29 13:11:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `hoadon_id_kh` int(10) UNSIGNED DEFAULT NULL,
  `hoadon_tennguoinhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoadon_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoadon_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoadon_sdt` int(11) NOT NULL,
  `hoadon_tongtien` double(20,2) NOT NULL,
  `hoadon_ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hoadon_trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_hoadon`, `hoadon_id_kh`, `hoadon_tennguoinhan`, `hoadon_diachi`, `hoadon_email`, `hoadon_sdt`, `hoadon_tongtien`, `hoadon_ghichu`, `hoadon_trangthai`, `created_at`, `updated_at`) VALUES
(104, 7, 'nguyen van b', '123/456 abczy', 'bietchetlien346@gmail.com', 123456789, 11980000.00, NULL, 0, '2020-08-23 08:00:25', '2020-08-27 13:18:34'),
(105, 7, 'nguyen van a', '123/456 abczy', 'bietchetlien346@gmail.com', 123456789, 47380000.00, NULL, 1, '2020-06-23 08:06:54', '2020-08-23 14:15:32'),
(106, 7, 'nguyen van a', '123/456 abczy', 'bietchetlien346@gmail.com', 123456789, 56950000.00, NULL, 1, '2020-08-23 08:14:58', '2020-08-26 15:20:01'),
(107, NULL, 'tran van c', '963/852', 'bietchetlien346@gmail.com', 1234567890, 29560000.00, NULL, 1, '2020-10-23 18:30:25', '2020-08-23 18:31:08'),
(108, NULL, 'nguyen thi be', '852/741', 'bietchetlien346@gmail.com', 1234567890, 99400000.00, 'giao trong ngày', 1, '2020-08-23 18:39:49', '2020-08-29 10:01:20'),
(112, NULL, 'qwe', 'sdasdsa', 'sdsads@gmail.com', 123456789, 6290000.00, NULL, 0, '2020-08-29 08:45:43', '2020-08-29 08:45:43'),
(113, 7, 'nguyen van a', '123/456 abczy', 'bietchetlien346@gmail.com', 123456635, 23160000.00, 'sdasd', 1, '2020-08-29 08:47:33', '2020-08-29 09:10:02'),
(114, NULL, 'a b  c', 'dasdasdas', 'maiyeem852123456@gmail.com', 792696758, 990920000.00, 'giao trong ngày', 1, '2020-08-29 09:14:42', '2020-08-29 10:14:14'),
(115, 7, 'nguyen van a', '123/456 abczy', 'bietchetlien346@gmail.com', 123456789, 135980000.00, NULL, 1, '2020-08-29 09:21:01', '2020-08-29 10:00:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(10) UNSIGNED NOT NULL,
  `khachhang_tenkhachhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_sdt` int(11) NOT NULL,
  `khachhang_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `khachhang_tenkhachhang`, `khachhang_diachi`, `khachhang_sdt`, `khachhang_email`, `khachhang_matkhau`, `created_at`, `updated_at`) VALUES
(4, 'Minh Hien1', '123/456 abc', 123456789, 'abc@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2020-08-15 13:22:08', '2020-08-27 14:02:14'),
(5, 'zxc', '456/789 abc', 123456789, 'abc1@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-08-17 18:18:49', '2020-08-17 18:18:49'),
(7, 'nguyen van a', '123/456 abczy', 123456789, 'bietchetlien346@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-22 18:23:17', '2020-08-29 08:14:50'),
(8, 'sadasd', 'asdasdcass23ca', 123456783, 'zxc@gmail.com', 'e35cf7b66449df565f93c607d5a81d09', '2020-08-29 08:18:33', '2020-08-29 08:18:33'),
(9, 'sadasda', 'dsadsa', 456789123, 'asd@gmail.com', '467b617fec4d9fcb63505734ee224851', '2020-08-29 08:53:29', '2020-08-29 08:53:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id_lienhe` int(10) UNSIGNED NOT NULL,
  `lienhe_hoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lienhe_sdt` int(11) DEFAULT NULL,
  `lienhe_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lienhe_noidung` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2019_08_19_000000_create_failed_jobs_table', 1),
(63, '2020_07_03_153855_nsx', 1),
(64, '2020_07_03_154000_sanpham', 1),
(65, '2020_07_03_154351_chitietsp', 1),
(66, '2020_07_03_155500_khachhang', 1),
(67, '2020_07_03_155611_hoadon', 1),
(68, '2020_07_03_155646_chitiethd', 1),
(69, '2020_07_03_180410_slide', 1),
(70, '2020_07_03_180426_lienhe', 1),
(71, '2020_07_03_180450_tintuc', 1),
(72, '2020_07_03_195539_admin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nsx`
--

CREATE TABLE `nsx` (
  `id_nsx` int(10) UNSIGNED NOT NULL,
  `nsx_tennsx` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nsx_trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nsx`
--

INSERT INTO `nsx` (`id_nsx`, `nsx_tennsx`, `nsx_trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 1, '2020-08-09 10:40:21', '2020-08-29 11:34:50'),
(2, 'OPPO', 1, '2020-08-09 10:40:30', '2020-08-29 06:50:30'),
(3, 'Realme', 1, '2020-08-09 10:44:35', '2020-08-29 07:01:41'),
(4, 'Xiaomi', 1, '2020-08-09 10:59:33', '2020-08-09 10:59:33'),
(5, 'Apple', 1, '2020-08-09 11:04:06', '2020-08-09 11:04:06'),
(9, 'Vsmart', 0, '2020-08-29 12:58:56', '2020-08-29 13:28:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(10) UNSIGNED NOT NULL,
  `sanpham_id_nsx` int(10) UNSIGNED NOT NULL,
  `sanpham_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_gia` double(20,2) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `sanpham_id_nsx`, `sanpham_ten`, `sanpham_hinh`, `sanpham_gia`, `sanpham_soluong`, `sanpham_trangthai`, `created_at`, `updated_at`) VALUES
(1, 2, 'OPPO Reno4', 'IKgG9rvB9g_oppo-reno4-201120-111135-400x460.png', 8490000.00, 10, 1, '2020-08-09 10:42:12', '2020-08-29 06:51:32'),
(2, 3, 'Realme C11', 'eSTXBG8DHR_realme-c11-095320-035343-400x460.png', 2690000.00, 5, 1, '2020-08-09 10:46:13', '2020-08-09 11:07:28'),
(3, 1, 'Samsung Galaxy A51 (6GB/128GB)', 'fUqyhKV4Ra_samsung-galaxy-a51-400x460-new-400x460.png', 7990000.00, 10, 1, '2020-08-09 10:57:49', '2020-08-27 14:21:19'),
(4, 4, 'Xiaomi Redmi Note 9S', '5KCcJ6HQem_xiaomi-redmi-note-9s-400x460-400x460.png', 5990000.00, 5, 1, '2020-08-09 11:01:57', '2020-08-09 11:01:57'),
(5, 5, 'iPhone 11 Pro Max 64GB', 'Sb0IJWpiZ8_iphone-11-pro-max-black-400x460.png', 33990000.00, 3, 1, '2020-08-09 11:06:54', '2020-08-13 12:29:26'),
(6, 2, 'OPPO A52', 'k8CuXXmU9T_oppo-a52-black-400-400x460.png', 5990000.00, 10, 1, '2020-08-09 11:09:22', '2020-08-09 11:09:30'),
(7, 5, 'iPhone 11 64GB', 'GdemfST6xY_iphone-11-red-2-400x460-400x460.png', 21990000.00, 4, 0, '2020-08-09 11:14:28', '2020-08-27 14:43:30'),
(8, 4, 'Xiaomi Redmi Note 8 Pro (6GB/128GB)', 'nR1jHRzxVj_xiaomi-redmi-note-8-pro-6gb-128gb-white-400x460.png', 5990000.00, 10, 0, '2020-08-09 11:16:17', '2020-08-29 11:56:05'),
(9, 1, 'Samsung Galaxy A21s (6GB/64GB)', '3Z7IwFlbfX_samsung-galaxy-a21s-055620-045627-400x460.png', 5690000.00, 10, 1, '2020-08-09 11:18:21', '2020-08-09 11:18:21'),
(14, 1, 'Samsung Galaxy A80', 'n6Jx5hgoon_samsung-galaxy-a80-050220-050225-400x460.png', 14990000.00, 1, 1, '2020-08-18 19:12:54', '2020-08-18 19:12:54'),
(15, 1, 'Samsung Galaxy Z Flip', 'aNeZyanVZ9_samsung-galaxy-z-flip-chitiet-2-788x544.png', 36000000.00, 1, 0, '2020-08-18 19:14:20', '2020-08-29 06:33:16'),
(16, 1, 'Samsung Galaxy S20+', 'Djwwq3p4TB_samsung-galaxy-s20-plus-400x460-fix-400x460.png', 23990000.00, 1, 1, '2020-08-18 19:15:58', '2020-08-18 19:15:58'),
(17, 1, 'Samsung Galaxy S20', 'EDqjyapFOp_samsung-galaxy-s20-400x460-hong-400x460.png', 18490000.00, 1, 1, '2020-08-18 19:17:00', '2020-08-29 11:35:59'),
(18, 1, 'Samsung Galaxy A11', 'ckZK71IbCj_samsung-galaxy-a11-055320-045346-400x460.png', 3690000.00, 1, 1, '2020-08-18 19:24:16', '2020-08-18 19:24:16'),
(19, 1, 'Samsung Galaxy A31', '1xWCMmQLuI_samsung-galaxy-a31-400x460-white-400x460.png', 6490000.00, 1, 1, '2020-08-18 19:25:47', '2020-08-18 19:25:47'),
(20, 1, 'Samsung Galaxy A30s', 'tKwimpckmt_samsung-galaxy-a30s-055720-045727-400x460.png', 6290000.00, 1, 1, '2020-08-18 19:28:19', '2020-08-29 11:34:36'),
(21, 2, 'OPPO Find X2', 'VqC6cx8GJP_oppo-find-x2-xanh-400x460-1-400x460.png', 23990000.00, 1, 1, '2020-08-29 12:48:37', '2020-08-29 12:48:37'),
(22, 5, 'iPhone 11 128GB', 'BHGsI6mE6d_iphone-11-128gb-green-400x460.png', 23990000.00, 1, 1, '2020-08-29 12:58:35', '2020-08-29 12:58:35'),
(23, 9, 'Vsmart Live 4 4GB', 'JbptPyY9wK_vsmart-live-4-242920-072956-400x460.png', 4090000.00, 1, 1, '2020-08-29 13:00:15', '2020-08-29 13:00:15'),
(24, 9, 'Vsmart Active 3 (6GB/64GB)', 'MyaNXU2oOP_vsmart-active-3-6gb-purple-ruby-400x460-1-400x460.png', 3990000.00, 1, 1, '2020-08-29 13:02:23', '2020-08-29 13:02:23'),
(25, 1, 'Samsung Galaxy S10 Lite', '7CCjrRUeou_samsung-galaxy-s10-lite-blue-chi-tiet-400x460.png', 14990000.00, 1, 1, '2020-08-29 13:04:32', '2020-08-29 13:04:32'),
(26, 1, 'Samsung Galaxy Note 20', 'rr1thkfbMm_samsung-galaxy-note-20-062120-122128-400x460.png', 23990000.00, 1, 1, '2020-08-29 13:05:54', '2020-08-29 13:05:54'),
(27, 2, 'OPPO A92', 'uNJdCU64sW_oppo-a92-tim-400x460-400x460.png', 6490000.00, 1, 1, '2020-08-29 13:07:23', '2020-08-29 13:07:23'),
(28, 2, 'OPPO Reno3', 'OkFXikbA58_oppo-reno3-trang-400x460-400x460.png', 7490000.00, 1, 1, '2020-08-29 13:09:07', '2020-08-29 13:09:07'),
(29, 4, 'Xiaomi Redmi 9 (4GB/64GB)', 'fegu62Kfdd_xiaomi-redmi-9-114620-094649-400x460.png', 3790000.00, 1, 1, '2020-08-29 13:11:00', '2020-08-29 13:11:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(10) UNSIGNED NOT NULL,
  `ten_slide` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tieu_de` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `ten_slide`, `tieu_de`, `hinh`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Realme C11', 'Điện thoại Realme C11', 'm0bPbdCEDL_e17hshg4kW_Realme_c11_8.7.png', 1, '2020-08-09 10:49:17', '2020-08-29 07:20:17'),
(2, 'OPPO Reno4', 'Điện Thoại OPPO Reno4', 'Ff869j8dJu_reno4-chung-800-300-800x300.png', 1, '2020-08-09 10:50:08', '2020-08-09 10:50:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(10) UNSIGNED NOT NULL,
  `tintuc_tieude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tintuc_noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `tintuc_hinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_admin_email_unique` (`admin_email`);

--
-- Chỉ mục cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD PRIMARY KEY (`id_chitiet_hoadon`),
  ADD KEY `chitiethd_chitiethd_id_sanpham_foreign` (`chitiethd_id_sanpham`),
  ADD KEY `chitiethd_chitiethd_id_hd_foreign` (`chitiethd_id_hd`);

--
-- Chỉ mục cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD PRIMARY KEY (`id_chitiet_sanpham`),
  ADD KEY `chitietsp_chitietsp_id_sp_foreign` (`chitietsp_id_sp`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `hoadon_hoadon_id_kh_foreign` (`hoadon_id_kh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`),
  ADD UNIQUE KEY `khachhang_khachhang_email_unique` (`khachhang_email`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nsx`
--
ALTER TABLE `nsx`
  ADD PRIMARY KEY (`id_nsx`),
  ADD UNIQUE KEY `nsx_nsx_tennsx_unique` (`nsx_tennsx`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `sanpham_sanpham_id_nsx_foreign` (`sanpham_id_nsx`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  MODIFY `id_chitiet_hoadon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  MODIFY `id_chitiet_sanpham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hoadon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id_lienhe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `nsx`
--
ALTER TABLE `nsx`
  MODIFY `id_nsx` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_chitiethd_id_hd_foreign` FOREIGN KEY (`chitiethd_id_hd`) REFERENCES `hoadon` (`id_hoadon`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiethd_chitiethd_id_sanpham_foreign` FOREIGN KEY (`chitiethd_id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD CONSTRAINT `chitietsp_chitietsp_id_sp_foreign` FOREIGN KEY (`chitietsp_id_sp`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_hoadon_id_kh_foreign` FOREIGN KEY (`hoadon_id_kh`) REFERENCES `khachhang` (`id_khachhang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_sanpham_id_nsx_foreign` FOREIGN KEY (`sanpham_id_nsx`) REFERENCES `nsx` (`id_nsx`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
