-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2019 lúc 09:14 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `id_customer` int(10) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(1, 11, 18000000, 'Credit Card', 'Đã hoàn tất', '2019-03-18 17:40:06', '2019-03-18 17:40:06'),
(2, 12, 25000000, 'Tiền mặt', 'Đã hoàn tất', '2019-03-18 17:40:47', '2019-03-18 17:40:47'),
(3, 13, 25000000, 'Tiền mặt', 'Đã hoàn tất', '2019-03-18 17:41:16', '2019-03-18 17:41:16'),
(4, 14, 30000000, 'Tiền mặt', 'Trả trước 50% - Còn 15000000', '2019-03-18 17:42:21', '2019-03-18 17:42:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) NOT NULL,
  `id_bills` int(10) DEFAULT NULL,
  `id_produce` int(10) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_ at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bills`, `id_produce`, `quantity`, `price`, `created_at`, `updated_ at`) VALUES
(1, 1, 1, 0, 15000000, '2019-03-18 17:44:03', '2019-03-18 17:44:03'),
(2, 2, 1, 0, 18000000, '2019-03-18 17:44:28', '2019-03-18 17:44:28'),
(3, 3, 1, 0, 18000000, '2019-03-18 17:44:48', '2019-03-18 17:44:48'),
(4, 4, 1, 0, 25790000, '2019-03-18 17:45:05', '2019-03-18 17:45:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `address`, `phone`, `note`, `email`, `created_at`, `updated_at`) VALUES
(5, 'Chí Phèo', 'Nam', '116 Làng lá, Quận Cam, TP.HCM', '062636395', 'x', 'pheodeptrai@gmail.com', '2019-03-18 17:46:48', '2019-03-18 17:46:48'),
(6, 'Michael Kor', 'Nam', '78 Lê Quang Định, Quận 3 , TP.HCM', '0258536526', 'x', 'mckor59@gmail.com', '2019-03-18 17:48:26', '2019-03-18 17:48:26'),
(7, 'Lê Bảo Minh', 'Nữ', '36 Nguyễn Thị Thập, Quận 7, TP.HCM', '0252365412', 'x', 'minhyun258@gmail.com', '2019-03-18 17:50:14', '2019-03-18 17:50:14'),
(11, 'Lê Văn Đạt', 'Nam', '69 Quận Cam, Thành phố Hồ Chí Minh', '0926462626', 'x', 'datcutelacloi@gmail.com', '2019-03-18 17:25:30', '2019-03-18 17:26:30'),
(12, 'Michael', 'Nam', '119 Paster, Quận 1, tp.HCM', '052626275', 'x', 'michael123@gmail.com', '2019-03-18 17:36:28', '2019-03-18 17:36:28'),
(13, 'Thomas', 'Nam', '121 Tân Định , Quận 1, Tp.HCM', '032623266', 'x', 'hoantu147@gmail.com', '2019-03-18 17:37:29', '2019-03-18 17:37:29'),
(14, 'Nguyễn Thị Dậu', 'Nữ', '152 D2, Quận Bình Thạnh, tp.HCM', '035963512', 'x', 'daulovely@gmail.com', '2019-03-18 17:38:49', '2019-03-18 17:38:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apple', '2019-03-16 17:00:00', '2019-03-16 17:00:00'),
(2, 'Samsung', '2019-03-16 17:00:00', '2019-03-16 17:00:00'),
(3, 'Huawei', '2019-03-16 17:00:00', '2019-04-08 10:28:36'),
(4, 'Xiaomi', '2019-03-16 17:00:00', '2019-03-16 17:00:00'),
(5, 'Nokia', '2019-03-16 17:00:00', '2019-03-16 17:00:00'),
(6, 'Asus', '2019-03-16 17:00:00', '2019-03-16 17:00:00'),
(7, 'Oppo', '2019-03-17 09:30:01', '2019-03-17 09:30:01'),
(9, 'Sony', '2019-03-19 17:19:27', '2019-03-19 17:19:27'),
(10, 'Xmobile', '2019-03-19 17:20:42', '2019-03-19 17:20:42'),
(11, 'Lenovo', '2019-03-20 18:22:56', '2019-03-20 18:22:56'),
(12, 'Fenda', '2019-03-20 18:25:50', '2019-03-20 18:25:50'),
(13, 'Apacer', '2019-03-20 18:26:11', '2019-03-20 18:26:11'),
(14, 'Anitech', '2019-03-20 18:26:22', '2019-03-20 18:26:22'),
(15, 'Vivo', '2019-04-08 11:33:28', '2019-04-08 11:33:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `produce`
--

CREATE TABLE `produce` (
  `id` int(10) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_manu` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `promotion_price` int(100) DEFAULT NULL,
  `new` int(10) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `produce`
--

INSERT INTO `produce` (`id`, `id_type`, `id_manu`, `name`, `vat`, `description`, `price`, `promotion_price`, `new`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Iphone 6 Plus 32GB', 10, 'iPhone 6s Plus 32 GB là phiên bản nâng cấp hoàn hảo từ iPhone 6 Plus với nhiều tính năng mới hấp dẫn.\r\nCamera được cải tiến\r\nĐiện thoại iPhone 6s Plus 32 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng. Chất lượng ảnh trong các điều kiện chụp khác nhau tốt.', 9790000, 9190000, 0, '1.png', '2019-03-13 17:00:00', '2019-03-19 17:32:13'),
(2, 1, 1, 'iPhone 7 Plus 32GB', 10, 'Mặc dù giữ nguyên vẻ bề ngoài so với dòng điện thoại iPhone đời trước, bù lại iPhone 7 Plus 32GB lại được trang bị nhiều nâng cấp đáng giá như camera kép đầu tiên cũng như cấu hình mạnh mẽ.\r\nChiếc điện thoại sở hữu camera kép đầu tiên của Apple\r\nCamera kép mặt lưng của điện thoại iPhone 7 Plus\r\n\r\niPhone 7 Plus là chiếc iPhone đầu tiên được trang bị camera kép có cùng độ phân giải 12 MP, đem lại khả năng chụp ảnh ở hai tiêu cự khác nhau.\r\n\r\nCamera chính chụp hình góc rộng, còn camera phụ có tiêu cự phù hợp để chụp chân dung, có tính năng chụp chân dung xóa phông (làm mờ hậu cảnh). \r\n\r\nVới 1 chạm nhanh chóng bạn có thể chuyển đổi giữa chế độ 1x và zoom 2x, hoặc bạn có thể kéo thanh trượt hay dùng 2 ngón tay đến zoom. Apple đã thêm tính năng zoom kỹ thuật số lên đến 10x.\r\n\r\nCamera kép mặt lưng của điện thoại iPhone 7 Plus\r\nCamera trước nâng cấp độ phân giải 7MP với khẩu độ mở lớn f/2.2 hỗ trợ chụp trong điều kiện thiếu sáng tuyệt vời với công nghệ Retina Flash, Auto HDR.\r\n\r\nẢnh selfie từ điện thoại iPhone 7 Plus\r\n\r\nChụp thiếu sáng với Retina Flash trên điện thoại iPhone 7 Plus\r\n\r\nCấu hình mạnh mẽ với chip Apple A10\r\nKhả năng chơi game của điện thoại iPhone 7 Plus\r\n\r\nNgoài trái tim Apple A10 Fusion 4 nhân với hiệu năng cực kì mạnh mẽ và ấn tượng thì iPhone 7 Plus còn được cập nhật hệ điều hành mới nhất với nhiều tính năng bất ngờ, và thú vị.\r\n\r\n“Táo khuyết” cũng không quên nhấn mạnh iPhone 7 Plus sẽ nhanh hơn iPhone đời đầu tới… 140 lần. Những ai mê chơi game trên di động cũng sẽ “phải lòng” iPhone mới khi có chip xử lý đồ họa được nâng tầm đúng chất “máy chơi game”.\r\n\r\nMàn hình Retina sắc nét\r\nMàn hình Retina sáng và sắc nét trên điện thoại iPhone 7 PlusMàn hình Retina trên 7 Plus hỗ trợ DCI-P3 gam màu rộng, nghĩa là chúng có khả năng tái tạo màu sắc trong phạm vi của sRGB. Nói đơn giản, chúng có thể hiển thị sống động hơn, sắc thái hình ảnh tốt hơn trước đó. Độ phân giải, mật độ điểm ảnh và kích thước màn hình vẫn giữ nguyên so với iPhone 6s Plus.\r\n\r\nDàn loa stereo sống động\r\nDàn loa stereo của điện thoại iPhone 7 PlusLần đầu tiên iPhone xuất hiện tính năng âm thanh Stereo. Phim ảnh, podcast và các cuộc gọi loa ngoài bây giờ âm thanh rõ ràng hơn rất nhiều. Đó là do Apple đã dùng công nghệ thiết lập loa chứ không phải thiết kế 2 loa ngay trên mặt.\r\n\r\nThiết kế có sự thay đổi nhẹ\r\nĐiểm nhấn ấn tượng nhất nằm ở mặt lưng của sản phẩm với hiệu ứng phản chiếu ánh sáng khi thay đổi góc nhìn rất đặc biệt. Hiệu ứng này cũng được áp dụng cho toàn bộ khung máy, từ cạnh trên, cạnh dưới cho đến các nút bấm nên cho cảm giác một thiết bị cực kỳ hoàn thiện, gần như không có bất kỳ một chi tiết thừa nào cả. \r\n\r\nDiện mạo mới của điện thoại iPhone 7 PlusThay đổi dãy nhựa an-ten bắt sóng được đưa vòng lên trên thay vì cắt ngang ở mặt lưng như trước.\r\n\r\nDiện mạo mới của điện thoại iPhone 7 PlusNút Home quen thuộc không còn là phím vật lý nữa mà được thay thế bằng cảm ứng, nó sẽ rung lên khi bạn ấn. Vì đã dùng iPhone một thời gian rất dài, nên tôi công nhận rằng hơi khó để làm quen với nó, nhưng có lẽ chỉ mất vài ngày thôi.\r\n\r\nIPhone 7 Plus theo bản thân đánh giá là một sự  lựa chọn hợp lý trong tầm giá:\r\n\r\nƯu điểm:\r\nHiệu năng rất cao\r\nCamera trước sau rất tuyệt vời\r\nThời lượng pin tốt\r\nNhược điểm:\r\nLoại bỏ jack 3.5mm\r\nKhông thay đổi thiết kế quá nhiều mặc dù đã 3 năm\r\nPhím Home cần thời gian để làm quen', 15000000, 13900000, 0, '2.png', '2019-03-18 17:08:51', '2019-03-19 17:32:18'),
(3, 1, 1, 'iPhone 8 Plus 64GB', 10, 'Thừa hưởng những thiết kế đã đạt đến độ chuẩn mực, thế hệ iPhone 8 Plus thay đổi phong cách bóng bẩy hơn và bổ sung hàng loạt tính năng cao cấp cho trải nghiệm sử dụng vô cùng tuyệt vời.\r\nĐánh giá điện thoại iPhone 8 Plus 64GB\r\n\r\nThiết kế từ kính và kim loại\r\nSmartphone iPhone 8 Plus giữ nguyên hoàn toàn những đường nét thiết kế đã hoàn thiện từ thế hệ trước nhưng sử dụng phong cách 2 mặt kính cường lực kết hợp bộ khung kim loại.\r\n\r\nThiết kế điện thoại iPhone 8 Plus 64GB\r\n\r\nMặt lưng kính bo cong 2.5D thời thượng, khung kim loại được gia cố cứng cáp, bền bỉ hơn với 7 lớp xử lý màu sơn, hạn chế bong tróc.\r\n\r\nThiết kế điện thoại iPhone 8 Plus 64GB\r\n\r\nThay đổi này đồng thời loại bỏ chi tiết đường anten thừa ở mặt lưng như các thế hệ trước, mang đến vẻ đẹp hoàn hảo hơn.\r\n\r\nThiết kế điện thoại iPhone 8 Plus 64GB\r\n\r\nCamera kép chuyên nghiệp\r\nKhông có sự thay đổi trong thông số camera (vẫn là cụm camera kép cùng độ phân giải 12 MP so với chiếc điện thoại IPhone 7 Plus), chiếc điện thoại iPhone này chủ yếu được tập trung nâng cấp về ống kính, cảm biến, vi xử lý hình ảnh để nâng cao chất lượng ảnh chụp.\r\n\r\nKhả năng zoom quang 2X không thay đổi chất lượng cũng như xóa phông chân dung vẫn được tích hợp trên iPhone 8 Plus cùng với Portrait Lighting, tính năng chụp ảnh sân khấu hoàn toàn mới.\r\n\r\nCamera trên điện thoại iPhone 8 Plus 64GB\r\n\r\nCamera trước vẫn là độ phân giải 7 MP cùng tính năng chụp chân dung ánh sáng sân khấu đặc biệt.\r\n\r\nChip Apple A11 cùng với thực tế ảo AR\r\nMột trong những điểm nhất quan trọng nhất ở thế hệ iPhone 8 Plus chính là sức mạnh phần cứng, con chip Apple A11 như trên iPhone X cho hiệu năng vượt trội hơn rất nhiều so với trước đây, đặc biệt tối ưu cho 3D và thực tế ảo tăng cường AR, một trải nghiệm hoàn toàn mới mẻ trên smartphone.\r\n\r\nTính năng thực tế ảo trên điện thoại iPhone 8 Plus 64GB\r\n\r\nMàn hình rộng hoàn hảo\r\nKích thước màn hình vẫn là 5.5 inch, giữ nguyên độ phân giải Retina HD sắc nét nhưng thế hệ iPhone 8 Plus lại có thêm những cải tiến đáng giá hơn, về độ phủ màu lớn hiển thị màu sắc chính xác hay công nghệ True Tone từ iPad Pro 2017.\r\n\r\nMàn hình điện thoại iPhone 8 Plus 64GB\r\n\r\nHỗ trợ sạc nhanh, sạc không dây\r\nNhờ thiết kế mặt lưng kính mà iPhone 8 Plus đã có thể tích hợp thêm công nghệ sạc không dây tiên tiến cho sử dụng an toàn và thuận tiện hơn rất nhiều.\r\n\r\nBên cạnh đó, một nâng cấp phải kể đến nữa là khả năng hỗ trợ sạc nhanh đạt 50% chỉ sau 30 phút, tuy nhiên bộ phụ kiện theo kèm máy chưa bao gồm sạc nhanh.', 18000000, 16900000, 0, '3.png', '2019-03-18 17:15:26', '2019-03-20 18:47:54'),
(4, 1, 1, 'iPhone 8 Plus 256GB', 10, 'Đặc điểm nổi bật của iPhone 8 Plus 256GB\r\n\r\nTìm hiểu thêm\r\nTìm hiểu thêm\r\nTìm hiểu thêm\r\nBộ sản phẩm chuẩn: Hộp, Pin, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim\r\n\r\niPhone 8 Plus là bản nâng cấp nhẹ của chiếc iPhone 7 Plus đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến.\r\nThiết kế quen thuộc vốn có của dòng iPhone Apple\r\nVề ngoại hình điện thoại iPhone 8 Plus không có quá nhiều khác biệt so với người đàn anh đi trước.\r\n\r\nThiết kế điện thoại iPhone 8 Plus\r\n\r\nThay đổi lớn nhất chính là Apple đã chuyển từ thiết kế kim loại nguyên khối sang mặt lưng kính nhằm mang tính năng sạc không dây lên 8 Plus.\r\n\r\nThiết kế điện thoại iPhone 8 Plus\r\n\r\nMàn hình rộng và sắc nét\r\niPhone 8 Plus sở hữu màn hình kích thước 5.5 inch độ phân giải Full HD (1080 x 1920 pixels) đem lại khả năng hiển thị sắc nét.\r\n\r\nMàn hình điện thoại iPhone 8 Plus\r\n\r\nMáy vẫn sử dụng tấm nền LED-backlit IPS LCD kết hợp với công nghệ True Tone giúp bạn dễ dàng quan sát với nhiều điều kiện khác nhau.\r\n\r\nHiệu năng mạnh mẽ hàng đầu\r\nCung cấp sức mạnh cho iPhone 8 Plus chính là con chip Apple A11 Bionic 6 nhân cùng với 3 GB RAM và 32 GB bộ nhớ trong.\r\n\r\nTrình điều khiển trên điện thoại iPhone 8 Plus\r\n\r\nMáy sử dụng mượt mà với tất cả các game và ứng dụng hiện có trên App Store mà không gặp phải bất cứ độ trễ hay giật lag nào trong quá trình sử dụng.\r\n\r\nHiệu năng trên điện thoại iPhone 8 Plus\r\n\r\nNgoài ra iPhone 8 còn được Apple nhấn mạnh về khả năng xử lý các tác vụ AR đem lại một trải nghiệm hoàn toàn mới mẻ trên di động.\r\n\r\nCamera chất lượng hàng đầu\r\nSo với iPhone 7 Plus thì iPhone 8 Plus đã có những cải tiến rõ rệt về chất lượng ảnh chụp. Về phần cứng thì máy vẫn sử dụng bộ đôi camera chính và phụ đều có độ phân giải 12 MP và giờ đây Apple đã tích hợp thêm một con chip xử lý hình ảnh để nâng cao chất lượng ảnh chụp.\r\n\r\nGiao diện camera của điện thoại iPhone 8 Plus\r\n\r\nKhả năng zoom quang 2X không thay đổi chất lượng cũng như xóa phông chân dung vẫn được tích hợp trên iPhone 8 Plus cùng với Portrait Lighting, tính năng chụp ảnh sân khấu hoàn toàn mới.\r\n\r\nGiao diện camera của điện thoại iPhone 8 Plus\r\n\r\nCamera trước độ phân giải 7 MP hỗ trợ chụp ảnh HDR đủ để làm hài lòng những người dùng khó tính năng.\r\n\r\nVẫn còn Touch ID\r\nKhi mà Face ID vẫn chưa thực sự khiến người dùng hoàn toàn yên tâm thì Touch ID trên iPhone 8 vẫn là một cái gì đó quen thuộc và được nhiều người tin dùng hơn.\r\n\r\nBảo mật vân tay trên điện thoại iPhone 8 Plus\r\n\r\nTốc độ nhận diện nhanh chóng giúp bạn dễ dàng mở khóa thiết bị.\r\n\r\n \r\nĐiện thoại iPhone 8 Plus 256GB\r\n25.790.000₫\r\nHết hàng tạm thời', 25790000, 0, 1, '4.png', '2019-03-18 17:17:21', '2019-03-20 18:47:50'),
(5, 1, 7, 'Điện thoại OPPO A7 32GB', 10, 'OPPO luôn mang có sự thay đổi trong thiết kế mới và chiếc điện thoại OPPO A7 đã đem đến cho người dùng những màu sắc mới đáng để lựa chọn với mặt lưng 3D cùng màn hình giọt nước siêu tràn viền.', 4990000, 4290000, 0, '5.png', '2019-03-19 16:59:10', '2019-03-19 17:32:36'),
(9, 4, 9, 'Tai nghe Sony MDR-100AAPYCE\r\n', 10, 'Vòm màng chắn phủ titan cho âm thanh rõ nét vượt trội.\r\nĐiều khiển từ xa và micro trên dây cho phép bạn kiểm soát các cuộc gọi và bài hát.\r\nCáp chống rối giữ tai nghe của bạn không bị thắt nút.\r\nCông nghệ Beat Response Control mang đến âm trầm chắc và sâu.', 2990000, 2590000, 0, '9.jpg', '2019-03-19 17:20:19', '2019-03-19 18:57:02'),
(10, 4, 10, 'Adapter sạc TS-C058S', 10, 'Dòng điện 1A phù hợp với điện thoại cấp thấp như dòng nghe gọi, phụ kiện tai nghe...\r\nKết hợp với các loại dây cáp để sạc cho thiết bị khác.\r\nTương thích với hầu hết thiết bị hiện nay.\r\nChất lượng cao, tương đương hàng chính hãng theo máy.', 100000, 55000, 0, '10.jpg', '2019-03-19 17:21:42', '2019-03-19 18:57:16'),
(11, 2, 1, 'Apple Watch S3 GPS', 10, 'Về mặt tổng thể đồng hồ thông minh Apple Watch S3 GPS 42mm có kích thước tương tự như Apple Watch Series 2. Sản phẩm chú trọng thêm về mặt thẩm mỹ với thiết kế sang trọng, năng động, dây đeo có nhiều màu sắc khác nhau.', 8990000, 7090000, 1, '11.jpg', '2019-03-19 17:23:03', '2019-03-19 18:19:30'),
(12, 2, 2, 'Samsung Galaxy watch 46mm', 10, 'Tổng thể Samsung Galaxy Watch 46mm có màu đen huyền sang trọng đi cùng thiết kế truyền thống với mặt đồng hồ tròn cổ điển, vòng xoay bezel cho khả năng điều hướng dễ dàng.', 7490000, 7190000, 0, '12.jpg', '2019-03-19 17:25:21', '2019-03-19 17:35:45'),
(13, 1, 5, 'Nokia 6.1 Plus', 10, 'Nokia 6.1 Plus (hoặc tên khác Nokia X6) đã khiến người dùng trở nên phấn khích khi lột xác hoàn toàn trong thiết kế đến từ chiếc tai thỏ phá cách cũng như hiệu năng được cải tiến vượt bậc so với các đối thủ của nó.', 5690000, 0, 1, '13.png', '2019-03-19 17:38:05', '2019-03-19 17:38:05'),
(14, 1, 4, 'Xiaomi Mi 8', 10, 'Xiaomi Mi 8 sẽ là cái tên được nhắc đến nhiều trong gia đình Xiaomi khi mang trong mình đầy đủ những gì gọi là cao cấp đến từ vẻ đẹp bên ngoài cũng như phần cứng mạnh mẽ bên trong.', 12990000, 10590000, 1, '14.png', '2019-03-19 17:38:58', '2019-03-19 18:19:41'),
(15, 1, 3, 'Huawei Nova 3', 10, 'Nếu như bạn là một người yêu thích thiết kế của siêu phẩm Huawei P20 Pro nhưng cần một mức giá dễ chịu hơn thì Huawei Nova 3 sẽ là một sự lựa chọn phải chăng dành cho bạn.', 9990000, 8990000, 1, '15.png', '2019-03-19 17:40:14', '2019-03-19 18:19:52'),
(16, 1, 3, 'Huawei Y7 Pro (2019) red', 10, 'Là phiên bản ra mắt riêng vào đầu năm mới, Y7 Pro (2019) màu đỏ như một món quà tặng của Huawei đến người dùng với một lời chúc tài lộc cũng như đầy may mắn.', 3990000, 0, 1, '16.png', '2019-03-19 17:41:28', '2019-03-19 17:41:28'),
(17, 3, 2, 'Samsung Galaxy Tab A6', 10, 'Tiếp nối sự thành công của chiếc Samsung Galaxy Tab A thì mới đây Samsung đã giới thiệu phiên bản cải tiến là chiếc Galaxy Tab A6 10.1 với nhiều nâng cấp đáng giá về cấu hình và thiết kế.', 7490000, 7190000, 1, '17.png', '2019-03-20 18:19:04', '2019-03-20 18:19:04'),
(18, 5, 3, 'Huawei Mediapad T5', NULL, NULL, 5690000, 5290000, 1, '18.png', '2019-03-20 18:20:49', '2019-03-20 18:20:49'),
(19, 3, 2, 'Samsung Galaxy Tab E', 10, 'Samsung Galaxy Tab E 9.6 là một sự lựa chọn cho bạn thích một chiếc máy có màn hình lớn để giải trí thoải mái hơn nhưng cấu hình không quá thấp.', 3990000, 3790000, 1, '19.jpg', '2019-03-20 18:21:49', '2019-03-20 21:21:50'),
(20, 3, 11, 'Lenovo Tab 7 Essential', 10, 'Lenovo Tab 7 Essential 16GB (TB-7304X) là phiên bản nâng cấp với thiết kế mỏng hơn và đặc biệt có tích hợp 4G rất tiện ích.', 2390000, 2190000, 1, '20.png', '2019-03-20 18:23:52', '2019-03-20 18:23:52'),
(21, 4, 12, 'Loa Bluetooth Fenda W8\r\n\r\n', 10, 'Loa Bluetooth Fenda W8 có thiết kế rất bắt mắt với các đường cắt vát kim cương', 500000, 350000, 1, '21.jpg', '2019-03-20 18:27:17', '2019-03-20 18:27:17'),
(22, 1, 1, 'Iphone 6plus 64GB', NULL, 'Đặc điểm nổi bật của iPhone 8 Plus 256GB  Tìm hiểu thêm Tìm hiểu thêm Tìm hiểu thêm Bộ sản phẩm chuẩn: Hộp, Pin, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim  iPhone 8 Plus là bản nâng cấp nhẹ của chiếc iPhone 7 Plus đã ra mắt trước đó với cấu hình mạnh mẽ cùng camera có nhiều cải tiến. Thiết kế quen thuộc vốn có của dòng iPhone Apple Về ngoại hình điện thoại iPhone 8 Plus không có quá nhiều khác biệt so với người đàn anh đi trước.  Thiết kế điện thoại iPhone 8 Plus  Thay đổi lớn nhất chính là Apple đã chuyển từ thiết kế kim loại nguyên khối sang mặt lưng kính nhằm mang tính năng sạc không dây lên 8 Plus.  Thiết kế điện thoại iPhone 8 Plus  Màn hình rộng và sắc nét iPhone 8 Plus sở hữu màn hình kích thước 5.5 inch độ phân giải Full HD (1080 x 1920 pixels) đem lại khả năng hiển thị sắc nét.  Màn hình điện thoại iPhone 8 Plus  Máy vẫn sử dụng tấm nền LED-backlit IPS LCD kết hợp với công nghệ True Tone giúp bạn dễ dàng quan sát với nhiều điều kiện khác nhau.  Hiệu năng mạnh mẽ hàng đầu Cung cấp sức mạnh cho i', 11000000, NULL, NULL, 'KlYb_iphone-6s-plus-32gb-400x450-400x450.png', '2019-04-11 06:27:04', '2019-04-11 06:30:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi phát hành phiên bản Beta 9.3.14 của MIUI 10 Global, khắc phục một số lỗi', 'Theo Gizchina, Xiaomi vừa phát hành phiên bản Beta 9.3.14 của MIUI 10 Global (Quốc tế) cho nhiều thiết bị. Tuy nhiên, bản cập nhật dành cho Redmi Note 4, Redmi Note 4X và Redmi S2 sẽ bị trì hoãn trong một khoảng thời gian do một số vấn đề kỹ thuật phát sinh.\r\nBản Beta 9.3.14 của MIUI 10 Global có một số thay đổi như sau: \r\n\r\n- Hình nền động: Đã sửa lỗi hình nền động không hiển thị sau khi đánh thức thiết bị.\r\n\r\n- Màn hình khóa: Bây giờ, người dùng vẫn có thể giữ máy ở trạng thái màn hình khóa ngay cả khi khuôn mặt đã được nhận dạng thành công. Chức năng này có thể được kích hoạt bằng cách vào Cài đặt -> Màn hình khóa và mật khẩu -> Quản lý dữ liệu khuôn mặt.\r\n\r\nmiui-10\r\nTrước khi tiến hành cài đặt, nếu bạn dùng phiên bản ROM cũ hơn MIUI 9 hoặc MIUI 10, bạn sẽ cần mở khóa bootloader và cập nhật bằng phương pháp fastboot. Trên MIUI 9 và MIUI 10, bạn có thể vào ứng dụng Trình cập nhật (Updater) và tìm kiếm bản cập nhật mới. Ngoài ra, do đây là phiên bản beta nên bạn nhớ sao lưu dữ liệu trước khi tiến hành nâng cấp.\r\n\r\nSau đây là danh sách các thiết bị đã có thể tải xuống bản cập nhật:\r\n\r\nDòng Redmi: \r\n\r\nRedmi 3S\r\nRedmi 4A\r\nRedmi 4X\r\nRedmi 5\r\nRedmi 5A\r\nRedmi 6\r\nRedmi 6A\r\nRedmi 6 Pro Ấn Độ\r\nDòng Redmi Note: \r\n\r\nRedmi Note 3 Special Edition\r\nRedmi Note 4\r\nRedmi Note 5A/Redmi Y1 Lite\r\nRedmi Note 5A Prime/Redmi Y1\r\nRedmi Note 5/Pro\r\nRedmi Note 6 Pro.\r\nDòng Mi:\r\n\r\nMi 5s\r\nMi 5s Plus\r\nMi 6\r\nMi 8\r\nMi 8 Pro\r\nMi 8 Lite\r\nMi Max 2\r\nMi Max 3\r\nMi MIX\r\nMi MIX 2\r\nMi MIX 2S\r\nMi MIX 3\r\nMi Note 2\r\nMi Note 3', 'slide1.jpg', '2019-03-17 10:07:59', '2019-03-24 01:30:33'),
(2, 'Galaxy A50 quá “hot”, đã có hơn 10.000 khách đặt cọc', 'Với cấu hình tốt và nhiều công nghệ hiện đại, lại có giá bán rất hợp lý kèm theo hàng loạt phần quà giá trị, Galaxy A50 nhanh chóng được hơn 15.100 khách đặt mua, trong đó hơn 10.200 khách đã đặt cọc để trở thành một trong những người đầu tiên sở hữu chiếc smartphone mới nhất thuộc dòng A của Samsung tại Việt Nam.\r\n\r\nKhông khó để lý giải cho sức hút của Galaxy A50. Máy có cấu hình mạnh mẽ (chip Exynos 9610, RAM 4 – 6 GB, ROM 64 – 128 GB), camera chất lượng (3 camera sau hỗ trợ chụp thiếu sáng, chụp góc siêu rộng lẫn chụp xóa phông, camera seflie lên đến 25 MP), viên pin dung lượng cao (4.000 mAh) và lại còn được trang bị công nghệ cảm biến vân tay nhúng dưới màn hình.\r\n\r\nBên cạnh đó, khi đặt trước Galaxy A50 trong khoảng thời gian từ 10/3 – 22/3/2019, khách hàng sẽ được hưởng những ưu đãi hấp dẫn bao gồm:\r\n\r\nPin dự phòng Samsung 10.000 mAh tích hợp sạc nhanh.\r\nGói bảo hiểm rơi vỡ 6 tháng.\r\nTrả góp 0% lãi suất.\r\nCơ hội trúng 100 bao lì xì trị giá 2 tỷ đồng.\r\nTai nghe Roman (áp dụng khi mua phiên bản 128 GB bộ nhớ trong).', 'slide2.jpg', '2019-03-17 10:08:49', '2019-03-19 16:16:36'),
(3, 'Đây là những cải tiến mới của Android Q trong bản beta đầu tiên', 'Android Q là phiên bản lớn tiếp theo của hệ điều hành Android sau Android 9 Pie và nó vừa được ra mắt phiên bản beta đầu tiên. Dưới đây là tất cả những sự thay đổi trong phiên bản thử nghiệm mới nhất của Android Q.\r\n*Lưu ý: Một số ảnh dùng trong bài được chụp từ máy đang ở dạng beta nên chất lượng ảnh không tốt lắm, mong bạn thông cảm!\r\n\r\nThay đổi màu nhấn\r\nAndroid Q hỗ trợ nhiều các màu nhấn khác nhau thông qua mục “theming” mới trong Cài đặt dành cho nhà phát triển, ngoài ra còn có hai lựa chọn khác trong mục này là font Headline/Body và hình dạng biểu tượng. Người dùng có thể chọn lựa bốn màu nhấn khác nhau gồm xanh lam, xanh lá, đen và tím.\r\n\r\nSự lựa chọn font Headline/Body sẽ cho phép người dùng chọn giữa phông chữ mặc định của thiết bị (như hình trên) và Noto Serif/Source Sans Pro\r\nCuối cùng là tùy chọn hình dạng biểu tượng. Tính năng này khá quen thuộc, cho phép người dùng thay đổi toàn bộ các biểu tượng ứng dụng thành các hình dạng như hình tròn (mặc định của điện thoại), hình giọt nước, hình vuông bo tròn hoặc hình chữ nhật.\r\n\r\nBiểu tượng pin trên màn hình luôn hiển thị (AOD)\r\nGoogle đã chuyển biểu tượng pin từ vị trí phía dưới sang góc trên bên phải của màn hình luôn hiển thị.\r\n\r\nƯớc tính thời lượng sử dụng trong cài đặt nhanh\r\nCài đặt nhanh của Android Q sẽ hiển thị thời lượng sử dụng dự kiến của điện thoại.\r\n\r\nMenu chia sẻ được cải tiến\r\nGoogle đã mang đến một số cải tiến cần thiết cho menu chia sẻ của Android. Tuy giao diện chỉ khác một chút nhưng toàn bộ menu lại hiển thị nhanh hơn so với các phiên bản Android trước đây.\r\n\r\nThiết kế notch và các góc bo tròn được hiển thị trong ảnh chụp màn hình\r\nTrong các phiên bản Android trước, hệ thống sẽ lấp đầy các khoảng trống nếu nó nhận biết được phần bị mất từ thiết kế notch hay các cạnh tròn của màn hình. Nhưng với Android Q, điều này đã không còn.\r\n\r\nVuốt sang phải để xóa các thông báo\r\nNgười dùng sẽ không thể vuốt để xóa thông báo theo nhiều cách như trước. Với Android Q, vuốt sang phải vẫn sẽ xóa các thông báo và khi vuốt sang trái sẽ hiển thị menu ngữ cảnh, cho phép người dùng báo lại hoặc tắt tiếng thông báo. Khi mở rộng, nó sẽ cung cấp nhiều tùy chọn hơn như chặn, hiển thị yên lặng, tiếp tục thông báo.\r\n\r\nAndroid Q không có chế độ tối\r\nGoogle có thể bổ sung hoặc xóa vài tính năng trong bản beta và những tính năng này có thể được xuất hiện trở lại trong các phiên bản tương lai. Trong phiên bản beta hiện tại, chế độ tối của Android đã biến mất trong menu Cài đặt hiển thị (trừ khi người dùng đã kích hoạt chế độ tối lúc cài đặt Android Q). Hiện tại có hai cách để bật chế độ tối là kích hoạt tùy chọn Tiết kiệm pin hoặc thông qua các lệnh ADB.\r\n\r\nChuông bên cạnh mốc thời gian thông báo\r\nNếu điện thoại của người dùng đổ chuông từ một thông báo thì sẽ có một cái chuông nhỏ bên cạnh mốc thời gian của thông báo đó.\r\n\r\nChia sẻ Wi-Fi với mã QR\r\nNgười dùng có thể chia sẻ Wi-Fi với bạn bè bằng chọn mạng muốn chia sẻ, nhấn vào biểu tượng Chia sẻ, sau đó nhập mật khẩu của điện thoại để xác nhận. Một mã QR đặc biệt sẽ được hiển thị để người bạn này có thể quét và kết nối vào mạng.\r\n\r\nNút khẩn cấp trong menu nguồn\r\nVới Android Q, khi người dùng nhấn giữ nút nguồn, màn hình sẽ hiển thị thêm biểu tượng khẩn cấp mới để truy cập nhanh vào trình quay số khẩn cấp.\r\n\r\nMục bảo mật trong Cài đặt\r\nTrong Cài đặt của Android Q có mục Bảo mật mới, thông qua nó người dùng có thể cấp phép ứng dụng, cài đặt nội dung trên màn hình khóa, dịch vụ autofill, lịch sử vị trí, thói quen và chẩn đoán.\r\n\r\nTheme Material được làm lại\r\nNhững ứng dụng hình nền, trang thông tin ứng dụng và nhiều cái khác đã được điều chỉnh trong theme Material mới của Google.\r\n\r\nChế độ desktop ẩn\r\nChế độ này sẽ cung cấp giao diện phong cách máy tính khi người dùng kết nối điện thoại với màn hình ngoài.\r\n\r\nTrên đây là những thay đổi hiện tại trong bản beta đầu tiên của Android Q. Bạn thấy những thay đổi này như thế nào? Hãy để lại bình luận ở bên dưới!\r\n\r\nNguồn: AndroidAuthority', 'slide3.jpg', '2019-03-17 10:10:50', '2019-03-24 01:30:38'),
(4, 'Apple bán ra thị trường 35 triệu cặp tai nghe AirPods trong năm 2018', 'Hôm nay, báo cáo của Counterpoint Research cho thấy, trong năm 2018 Apple đã bán được khoảng 35 triệu cặp tai nghe không dây AirPods. Theo hãng phân tích này, AirPods hiện là tai nghe không dây phổ biến nhất.\r\nĐã có một số tin đồn cho biết, tai nghe không dây AirPods thế hệ thứ hai cũng có thể tích hợp các tính năng theo dõi sức khỏe.\r\n\r\nCounterpoint Research cho biết, trong một cuộc khảo sát trực tuyến với hơn 200 người tham gia, 19% số người được hỏi thích tai nghe mang nhãn hiệu Apple. Theo kết quả khảo sát, trong số những người mua tai nghe không dây AirPods, sự thoải mái và phù hợp là sự cân nhắc chính, tiếp theo là dễ dàng sử dụng.\r\n\r\nApple bán ra thị trường 35 triệu cặp tai nghe AirPods trong năm 2018\r\nTrong thực tế, chất lượng âm thanh là yếu tố cuối cùng mà người trả lời xem xét. Khi nói đến chất lượng âm thanh, khảo sát của Counterpoint Research cho thấy có tới 72% người dùng mua tai nghe không dây Bose đã làm như vậy vì chất lượng âm thanh.\r\n\r\nCho đến nay, Apple vẫn chưa công bố doanh số cụ thể của tai nghe không dây AirPods, nhưng hãng vẫn tiếp tục tập trung quảng cáo AirPods rất dễ dàng sử dụng. Gần đây, công ty cho biết AirPods đã đạt được sự đơn giản hóa, 1 bước là kết nối, 1 bước là ngừng kết nối.\r\n\r\nApple sẽ tổ chức buổi ra mắt sản phẩm mới vào ngày 26/3 tới và tai nghe không dây AirPods thế hệ thứ 2 có thể được phát hành tại đây. Theo các tin đồn gần đây, AirPods 2 có thể có 2 màu là đen và trắng, ngoài ra, nó vẫn giữ mức giá là 199 USD (khoảng 4.6 triệu đồng).\r\n\r\nNguồn: Gizchina', 'slide4.jpg', '2019-03-17 10:11:35', '2019-03-24 01:30:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_produce`
--

CREATE TABLE `type_produce` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `type_produce`
--

INSERT INTO `type_produce` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', '2019-03-17 09:37:26', '2019-03-17 09:37:26'),
(2, 'Smart Watch', '2019-03-17 09:37:50', '2019-03-17 09:37:50'),
(3, 'Tablet', '2019-03-17 09:38:01', '2019-03-17 09:38:01'),
(4, 'Phụ Kiện', '2019-03-17 09:38:19', '2019-03-17 09:38:19'),
(5, 'Ipad', '2019-03-19 17:01:31', '2019-04-08 18:13:10'),
(22, 'Iphone 6plus 64GB', '2019-04-11 06:17:04', '2019-04-11 06:17:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `position` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `gender`, `phone`, `image`, `position`, `created_at`, `updated_at`) VALUES
(1, 'huynh11khang@gmail.com', '$2y$10$qtOCXYMxBDw0.JpywCcBM.b5g3qmdwm6bDFQKWEKeaTuKGStbe4h.', 'Huỳnh Huy Khang', 1, '0981646415', 'pGk6_face15.jpg', 1, '2019-04-05 11:25:17', '2019-04-08 18:38:15'),
(7, 'xuantruong@gmail.com', '$2y$10$CypXo.cU8932k/RrqRc1S.NEcR0omfr/AFJD5qllBkSu4qqVUd1me', 'Nguyễn Xuân Trường', 1, '0989108802', 'xhdX_face9.jpg', 0, '2019-04-07 10:23:09', '2019-04-07 11:47:37'),
(9, 'minhanh1603@gmail.com', '$2y$10$jGzwQAzZ.zoOsja2TT9QoOZvmnzehJYQWHtttqxRcczXsUkP4tNYq', 'Minh Anh', 0, '0121255968', 'jVwC_face2.jpg', NULL, '2019-04-08 18:32:58', '2019-04-09 11:38:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id customer` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_bills` (`id_bills`),
  ADD UNIQUE KEY `id_bills_2` (`id_bills`,`id_produce`),
  ADD KEY `id_produce` (`id_produce`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_manu` (`id_manu`) USING BTREE,
  ADD KEY `id_type` (`id_type`) USING BTREE;

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_produce`
--
ALTER TABLE `type_produce`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_produce`
--
ALTER TABLE `type_produce`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`id_bills`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`id_produce`) REFERENCES `produce` (`id`);

--
-- Các ràng buộc cho bảng `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `a2` FOREIGN KEY (`id_type`) REFERENCES `type_produce` (`id`),
  ADD CONSTRAINT `produce_ibfk_2` FOREIGN KEY (`id_manu`) REFERENCES `manufacturer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
