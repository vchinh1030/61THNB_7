-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 11, 2022 lúc 07:05 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bartender_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'admin', '$2y$10$mI/hpZ59vGgjs/lPTQWLJu.I82O93AEJ3gwFycAjuibOjAGi9dcTm', 'admin123@gmail.com', '2021-02-26 16:24:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `success-date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`o_id`, `u_id`, `d_id`, `d_name`, `quantity`, `price`, `status`, `date`, `success-date`, `r_id`) VALUES
(18, 18, 9, 'Maltesers Tiramisu', 1, 4, 'closed', '2021-05-16 18:01:05', '2021-05-16 16:02:09', 3),
(20, 19, 10, 'Arancini', 1, 12, NULL, '2021-05-17 12:01:04', '2021-05-17 06:16:04', 6),
(21, 21, 18, 'Chimichanga', 1, 9, 'in process', '2021-05-17 13:38:29', '2021-05-17 12:21:29', 2),
(22, 23, 16, 'Sesame Chicken', 3, 33, 'closed', '2021-05-17 14:19:58', '2021-05-17 12:30:47', 4),
(23, 24, 1, 'Grilled Cheese Sandwich', 2, 12, NULL, '2021-05-17 14:30:02', '2021-05-17 08:45:02', 1),
(24, 24, 20, 'Chop Suey', 1, 8, 'closed', '2021-05-17 14:30:02', '2021-05-17 14:32:49', 2),
(25, 31, 7, 'Spaghetti Carbonara', 1, 9, NULL, '2021-05-17 14:38:44', '2021-05-17 08:53:44', 1),
(27, 32, 21, 'PoBoy', 2, 10, 'in process', '2021-05-17 15:55:55', '2021-05-17 13:57:23', 5),
(28, 34, 8, 'Toasted Ravioli', 4, 44, 'rejected', '2021-05-17 16:22:34', '2021-05-17 14:31:36', 2),
(29, 34, 21, 'PoBoy', 2, 10, 'closed', '2021-05-17 16:22:34', '2021-05-17 14:32:07', 5),
(30, 34, 11, 'Currywurst', 7, 49, 'closed', '2021-05-17 16:22:34', '2021-05-17 14:32:42', 6),
(32, 34, 22, 'Reuben Sandwich', 3, 24, 'closed', '2021-05-17 16:31:02', '2021-05-17 14:32:38', 7),
(39, 36, 14, 'Gin ', 2, 40, 'closed', '2022-03-11 06:47:08', '2022-03-11 05:47:33', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `o_hr` varchar(255) NOT NULL,
  `c_hr` varchar(255) NOT NULL,
  `o_days` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`r_id`, `c_id`, `name`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `img`) VALUES
(1, 2, 'Shaker', 'chinhgaming05@gmail.com', '098734828', 'giuliarestroo.com', '1', '4', 'Bốn sản phẩm', 'Bình lắc rượu', 'binhlac.jpg'),
(2, 6, 'Glasses', 'chinhgaming05@gmail.com', '098734828', 'foodvernick.com', '1', '3', 'Ba sản phẩm ', 'Cốc uống rượu ', 'coc.jpg'),
(3, 6, 'Tool bar', 'chinhgaming05@gmail.com', '098734828', 'townsend.com', '1', '2', 'Hai sản phẩm', 'Dụng cụ pha chế', 'dungcuphache.jpg'),
(4, 6, 'Machine', 'chinhgaming05@gmail.com', '098734828', 'artisanbargr.com', '1', '3', 'Ba sản phẩm', 'Máy móc', 'maymoc.jpg'),
(5, 6, 'Base wine', 'chinhgaming05@gmail.com', '098734828', 'highlandrestro.com', '1', '3', 'Ba sản phẩm', 'Rượu nền', 'ruounen.jpg'),
(6, 3, 'Cocktail', 'chinhgaming05@gmail.com', '098734828', 'alchemist.food', '1', '3', 'Ba sản phẩm', 'Rượu hoa quả', 'ruoupha.jpg'),
(7, 6, 'Bar carpet', 'chinhgaming05@gmail.com', '098734828', 'treehouserestr.com', '1', '1', 'Một sản phẩm', 'Thảm lót quầy bar', 'thamlotbar.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `d_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`d_id`, `r_id`, `name`, `about`, `price`, `img`) VALUES
(1, 1, 'Bình lắc shaker 2 mảnh Boston Gold', 'Bình lắc cocktail boston shaker inox2 mảnh 550ml - 750ml\n+ Được dùng để lắc, trộn rượu và các nguyên liệu để tạo nên những món cocktail khác nhau.\n', 18, 'r1.jpeg'),
(2, 1, 'Bình lắc inox shaker 500ml', 'Sản phẩm bình shaker mang đến bạn sự tiện dụng trong việc pha chế các món nước uống thơm ngon, từ trà sữa, cocktail, mocktail cho đến các món siro theo cách riêng của bạn', 9, 'r2.jpg'),
(5, 3, 'Jigger 45ml/15ml', 'Jigger hay ly đo lường jigger, ly định lượng là dụng cụ đo lường có tác dụng đong đếm và định lượng chính xác thể tích các loại nguyên liệu.', 5, 'a1.jpeg'),
(6, 1, 'Bình lắc shaker 2 mảnh Boston Silver', 'Bình lắc cocktail boston shaker inox2 mảnh 550ml\n+ Được dùng để lắc, trộn rượu và các nguyên liệu để tạo nên những món cocktail khác nhau.\n', 16, 'r3.jpg'),
(7, 1, 'Bình lắc inox shaker 350ml', 'Sản phẩm bình shaker mang đến bạn sự tiện dụng trong việc pha chế các món nước uống thơm ngon, từ trà sữa, cocktail, mocktail cho đến các món siro theo cách riêng của bạn', 6, 'r4.jpg'),
(8, 2, 'Julep Cup Copper', 'Bạc Hà Julep Ly Cocktail Inox Không Gỉ Mug Cup Loại Đồ Uống Ly Martini Mojito Uống Thanh Đảng Bia Cốc Cốc', 11, '1.jpg'),
(9, 3, 'Thìa xúc đá', 'Muỗng xúc đá inox là dụng cụ không thể thiếu trong các quán cafe, bar.. hoặc tại gia đình. Muỗng không chỉ có công dụng trong việc xúc đá, mà bạn có thể xúc đường, hạt rang…', 4, 'a2.jpg'),
(10, 6, 'Baileys Original Irish Cream', 'Cùng nhau, họ tạo nên một hương vị mang đến cảm giác chiến thắng khi bạn thưởng thức. Đối với họ, cho dù có đi đến bất kỳ nơi nào, họ cũng không bao giờ quên gốc rễ của mình. .', 30, 'd1.jpg'),
(11, 6, 'Bols Cacao White', 'Đây là một loại rượu mùi trong suốt. Với hương vị của sô cô la sữa thơm ngon, cùng với vị vani nhẹ nhàng và thoang thoảng hương đào.', 25, 'd2.jpg'),
(12, 6, 'Cherry Brandy', 'Bols Cherry Brandy là một loại rượu mùi anh đào đỏ đậm. Sử dụng anh đào tươi thu hoạch từ Đông Âu. Nơi rượu brandy cherry từ lâu đã trở thành truyền thống, loại cocktail nổi tiếng nhất được pha chế với Bols Cherry brandy là Singapore Sling.', 25, 'd3.jpg'),
(13, 5, 'Tequila', 'Tequila là loại rượu có thể pha trộn với hầu các loại nước trái cây nên được sử dụng để pha chế nên nhiều loại cocktail khác nhau.', 25, 'tequila.jpg'),
(14, 5, 'Gin ', 'Rượu Gin thường được dùng để làm rượu nền cho các loại cocktail không ngọt, có hương vị trái cây nhẹ, tự nhiên. Loại rượu này được uống trực tiếp với đá hoặc pha với nước tonic.', 20, 'gin.jpg'),
(15, 4, 'Máy ép vắt chanh', 'Không giới hạn số lượng ép , máy tự động phân chia giữa vỏ và hạt nên khi vắt sẽ không bị đắng mà còn giúp người vắt tiết kiệm thời gian và còn dễ dàng vệ sinh máy.', 50, 'b1.jpg'),
(16, 4, 'Máy ép hoa quả ', 'Máy ép chậm ép hoa quả dưới lực ép của trục vít đặc biệt và động cơ giảm tốc, vận tốc chỉ khoảng 45 – 85 vòng quay/phút.', 80, 'b2.jpeg'),
(17, 4, 'Máy xay sinh tố', 'Hiện nay máy xay sinh tố không còn xa lạ mà được xem là một trong những vật dụng không thể thiếu trong mỗi căn bếp. Máy xay sinh tố giúp bạn trong việc nấu ăn và pha chế các món đồ uống thơm ngon, mát lành.', 9, 'b3.jpeg'),
(18, 2, 'Ly Margarita Japan', 'Dòng Ly Classic có kiểu miệng bo tròn dùng uống các loại Margarita là loại cocktail gốc rượu Tequila phổ biến nhất.', 9, '4.jpg'),
(20, 2, 'Ly Shot Sọc', 'Ly thủy tinh uống rượu Whiskey kẻ sọc dọc sáng tạo phong cách Retro nhật bản', 8, '8.jpg'),
(21, 5, 'Vodka Absolut', 'Vodka là loại rượu được sử dụng rất phổ biến trong pha chế cocktail với đặc trưng không màu, không mùi. Rượu vodka được dùng để pha chế cho nhiều loại cocktail, từ loại có vị mằn mặn đến ngọt, thảo mộc hay vị trái cây.', 20, 'vodka.jpg'),
(22, 7, 'Thảm lót quầy bar', 'Thảm Lót Cao Su Quầy Bar, Thảm bar pha chế, Thảm bar cao su chống trượt cao cấp (Rubber Bar Mat)', 8, 'thamlot.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`) VALUES
(35, 'chinh2001', 'Nguyen', 'chinh', 'admin@gmail.com', '0356803635', '$2y$10$bXeVsfI6mef1ohdYaYqEQ.zvhBlTd.aLoZ0rhzjgOqlJU9g2u7ljC', 'Hà Nội'),
(36, 'vthony', 'Chính', 'Nguyễn', 'chinhtogaming05@gmail.com', '0981732731', '$2y$10$bB4.OsArRJGmM8VBW.VmieuZjXswQPzVChkFODDcLDW4thkepKKUC', 'Hà Nội');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`o_id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`r_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`d_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
