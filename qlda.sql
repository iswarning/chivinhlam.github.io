-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2019 lúc 09:21 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlda`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CHITIETHOADON`
--

CREATE TABLE `CHITIETHOADON` (
  `MaHoaDon` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `Gia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `HOADON`
--

CREATE TABLE `HOADON` (
  `MaHoaDon` int(11) NOT NULL,
  `NgayTao` datetime NOT NULL,
  `MaTaiKhoan` int(11) DEFAULT NULL,
  `HoTen` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `LOAISANPHAM`
--

CREATE TABLE `LOAISANPHAM` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `LOAISANPHAM`
--

INSERT INTO `LOAISANPHAM` (`MaLoai`, `TenLoai`, `TrangThai`) VALUES
(1, 'Điện thoại', 1),
(2, 'Phụ kiện', 1),
(3, 'Tablet', 1),
(4, 'Laptop', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `SANPHAM`
--

CREATE TABLE `SANPHAM` (
  `MaSanPham` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenSanPham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gia` float DEFAULT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhCT1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhCT2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HangSanXuat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `SANPHAM` (`MaSanPham`, `MaLoai`, `TenSanPham`, `MoTa`, `Gia`, `HinhAnh`, `HinhCT1`, `HinhCT2`, `HangSanXuat`) VALUES
(1, 1, 'Điện Thoại iPhone X', 'iPhone X được Apple ra mắt ngày 12/9 vừa rồi đánh dấu chặng đường 10 năm lần đầu tiên iPhone ra đời. Sau một thời gian, giá iPhone X cũng được công bố. iPhone X mang trên mình thiết kế hoàn toàn mới với màn hình Super Retina viền cực mỏng và trang bị nhiều công nghệ hiện đại như nhận diện khuôn mặt Face ID, sạc pin nhanh và sạc không dây cùng khả năng chống nước bụi cao cấp.', 34790000, 'image/x.png', 'image/x_item1.png', 'image/x_item2.png', 'Apple'),
(2, 1, 'Điện Thoại Vivo V9', 'Vivo V9 là chiếc smartphone tầm trung cận cao cấp với điểm nhấn là máy có camera kép phía sau và camera selfie độ phân giải cao 24 MP.Cũng giống như ZenFone 5, OPPO R15 hay Huawei P20, chiếc smartphone này của Vivo cũng dõi theo xu hướng thiết kế notch (hay còn gọi là tai thỏ) như trên chiếc iPhone X của Apple.', 7990000, 'image/v9.png', 'image/v9_item1.png', 'image/v9_item.jpg', 'Vivo'),
(3, 1, 'Samsung Galaxy A6', 'Samsung Galaxy A6 (2018) là chiếc smartphone tầm trung vừa được ra mắt của Samsung bên cạnh chiếc Samsung Galaxy A6+ (2018).Thiết kế quen thuộcMáy được hoàn thiện từ kim loại nguyên khối, kết hợp với mặt kính cong nhẹ 2.5D cho cảm giác vuốt chạm thoải mái hơn.Mặt trước là camera \"tự sướng\" và đèn LED trợ sáng 3 cấp độ giúp chụp ảnh selfie trong điều kiện thiếu sáng tốt hơn.Mặt lưng là dãy ăng-ten trên dưới đối xứng hình chữ U và camera chính và cảm biến vân tay được gom chung vào 1 cụm.', 6990000, 'image/a6.png', 'image/a6_item1.png', 'image/a6_item2.png', 'Samsung'),
(4, 1, 'Điện thoại OPPO A83', 'OPPO A83 là chiếc smartphone dòng A đầu tiên sở hữu cho mình màn hình tràn viền và cùng với đó là camera với khả năng làm đẹp bằng AI nổi tiếng của OPPO.Thiết kế thon gọn Với xu thế màn hình 18:9 của năm 2017 thì máy sở hữu một thân hình \"thon thả\" với các góc cạnh được bo tròn mềm mại.', 4990000, 'image/a83.png', 'image/a83_item1.png', 'image/a83_item2.png', 'OPPO'),
(5, 2, 'Chuột Bluetooth Apple', 'Phong cách thiết kế mang đậm bản sắc của Apple. Thời gian sử dụng chuột MLA02 kéo dài, chuột magic mouse MLA02 cho bạn thời gian sử dụng lên tới 1 tháng hoặc hơn chỉ với 1 lần sạc (2 tiếng). Cổng sạc cho chuột nằm ngay mặt dưới, dùng dây sạc đầu lightning (đi kèm với hộp).', 2490000, 'image/pk8.png', 'image/pk8_item1.jpg', 'image/pk8_item2.jpg', 'Apple'),
(6, 2, 'Apple Watch S3 GPS', 'Về mặt tổng thể Apple Watch Series 3 có kích thước tương tự như Apple Watch Series 2. Sản phẩm chú trọng thêm về mặt thẩm mỹ với thiết kế sang trọng, năng động nhiều màu sắc khác nhau. Màn hình Apple Watch phiên bản 42 mm lớn 1.65 inch hiển thị chi tiết ảnh nhiều hơn, mặt đồng hồ cảm ứng trang bị mặt kính cường lực Sapphire crystal glass giúp bảo vệ mặt kính chống trầy xước tốt và hiển thị tốt dù là dưới ánh mặt trời.', 10990000, 'image/pk5.png', 'image/pk5_item1.jpg', '', 'Apple'),
(7, 2, 'Ốp lưng iPhone X', 'Ốp lưng chính hãng Apple, nguyên seal 100%. Kiểu dáng thời trang và đẹp mắt, thiết kế vừa vặn và ôm sát thân máy,dễ dàng tháo/lắp ốp vào máy.', 1590000, 'image/pk4.png', 'image/pk4_item1.jpg', '', 'Apple'),
(8, 2, 'Sạc dự phòng Polymer ', 'Pin sạc dự phòng Polymer Sony CP-S15-BC ULA tuy có dung lượng rất lớn nhưng kiểu dáng vẫn nhỏ gọn. Tích hợp công nghệ Hybrid Gel cho tuổi thọ sạc hơn 1000 lần. Dung lượng pin cao cho nhiều lần sạc,sạc đầy được cho điện thoại và máy tính bảng có dung lượng dưới 13.000 mAh. Sạc song song 2 thiết bị với tốc độ nhanh.', 1780000, 'image/pk1.png', 'image/pk1.png', 'image/pin1.png', 'Sony'),
(9, 2, 'Sạc không dây 1A', 'Thiết kế đẹp mắt, tiện dụng, dễ dàng xếp lại và mang theo bất cứ nơi đâu. Tiện lợi chuyển đổi từ sạc đứng sang sạc nằm. Thưởng thức trọn vẹn cả khung hình, cho trải nghiệm giải trí tối đa ngay khi đang sạc. Chất liệu da cao cấp, giữ chắc điện thoại trên đế khi đang sạc. Sạc nhanh: tương thích với Galaxy Note8, S8, S8+, S7, S7 edge, Note5, S6 edge+ / Qi (Tương thích với Galaxy S6, S6 edge và các thiết bị được chứng nhận Qi).', 1450000, 'image/pk7.png', 'image/pk7.png', 'image/pk7_item1.jpg', 'Samsung'),
(10, 2, 'Tai nghe Bluetooth', 'Airpods sở hữu thiết kế thời trang và nhỏ gọn, trọng lượng cũng rất nhẹ, mọi chi tiết đều được hoàn thiện, cải thiện thêm nhiều tính năng độc đáo. Nút tai nghe được làm rất vừa vặn với tai tạo cảm giác thoải mái, không bị khó chịu khi đeo trong thời gian dài nhưng cũng rất chắc chắn.', 4990000, 'image/pk2.png', 'image/pk2_item1.jpg', 'image/pk2_item2.jpg', 'Apple'),
(11, 2, 'Thẻ nhớ Micro SD 200GB', 'Thẻ nhớ dành cho các mẫu điện thoại cao cấp. Tương thích với thiết bị có thể nhận thẻ nhớ tối đa 200 GB. Chép một video dung lượng 10 GB vào thẻ chưa tới 2 phút. Phù hợp cho các dòng máy cơ, quay phim 4K.', 2500000, 'image/pk3.png', 'image/pk3-item1.jpg', 'image/pk3-item2.jpg', 'SD'),
(12, 2, 'USB 3.0 Sandisk iXpand', 'Kết nối kép OTG USB-Lightning. USB 3.0 tốc độ cao. Bổ sung dung lượng lưu trữ tức thì cho iPhone, iPad. Bảo mật dữ liệu bằng hệ thống mã hoá. Chơi nhạc và video trực tiếp trên app SanDisk iXpand Drive. Tốc độ đọc tối đa: iPhone: 90MB/s, máy tính: 150MB/s.', 990000, 'image/pk6.png', 'image/pk6_item1.png', '', 'Apple'),
(13, 3, 'Samsung Galaxy Tab A6', 'Là dòng máy trong phân khúc tầm trung, Samsung Galaxy Tab A6 10.1 Spen được thiết kế với vỏ nhựa nhám nhẹ cùng các góc bo tròn cho cảm giác chắc chắn, không bám vân tay khi cầm. Sở hữu màn hình kích thước 10.1 inch không quá lớn, có thể nhét vừa một chiếc balo dạng nhỏ, Samsung Galaxy Tab A6 10.1 Spen sử dụng tấm nền PLS LCD cho khả năng hiển thị tốt. Độ phân giải  WUXGA 1920 x 1200 pixels cho chất lượng hình ảnh sắc nét, sử dụng tốt khi đi ngoài trời.', 7990000, 'image/tb1.png', 'image/tb1.png', 'image/tb1_item1.jpg', 'Samsung'),
(14, 3, 'Máy tính bảng iPad Pro', 'Apple vẫn giữ ngôn ngữ thiết kế từ xa xưa tới nay, nên phiên bản 10.5 inch cũng không có gì khác lắm với những người tiền nhiệm còn lại. Tuy không mới nhưng đây vẫn là một thiết kế vượt thời gian và rất sang trọng.', 19990000, 'image/tb2.png', 'image/tb2.png', 'image/tb2_item1.jpg', 'Apple'),
(15, 3, 'Huawei MediaPad', 'Về tổng thể, máy nổi bật với phần khung viền kim loại sang trọng, kết hợp màu sắc hiện đại cho cảm giác khá thanh lịch, nhẹ nhàng. Ngoài ra, với trọng lượng khá nhẹ cùng với 4 góc bo tròn giúp máy có trải nghiệm cầm nắm khá thoải mái. Sở hữu màn hình kích thước 10 inch không quá lớn, có thể nhét vừa một chiếc balo dạng nhỏ, Huawei MediaPad T3 10 (2017) Spen sử dụng tấm nền PLS LCD cho khả năng hiển thị tốt.', 4490000, 'image/tb3.png', 'image/tb3.png', 'image/tb3_item1.jpg', 'Huawei'),
(16, 3, 'Lenovo Phab2', 'Lenovo Phab 2 lại có kích thước khá nặng cho người dùng cảm giác cầm nắm chắc chắn và cứng cáp. Máy được thiết kế từ nhôm, mặt lưng được bo cong về các cạnh cho máy ôm tay hơn khi sử dụng. Về phần màn hình khi máy sở hữu kích thước khá lớn 6.4 inch cùng độ phân giải 1280 x 720 pixels trên tấm nền IPS cho hình ảnh rõ nét.', 3990000, 'image/tb4.png', 'image/tb4.png', 'image/tb4_item1.jpg', 'Lenovo'),
(17, 4, 'Apple Macbook Pro', 'Touch Bar sẽ thay thế các phím chức năng ở hàng đầu của bàn phím. Có thể xem đây là một màn hình thứ 2 của chiếc MacBook, nó hiển thị các hình ảnh với chất lượng cao hoặc các nút chức năng, công cụ tùy chỉnh tuỳ theo ứng dụng bạn đang dùng.', 44990000, 'image/lt1.png', 'image/lt1.png', 'image/lt1_item1.jpg', 'Apple'),
(18, 4, 'Acer PREDATOR 21X', 'Acer PREDATOR 21 X là sản phẩm cực kỳ cao cấp và là laptop mạnh nhất thế giới ở thời điểm hiện tại với những trang thiết bị tối tân đặc cách cho \"Game Thủ\". Máy có cấu hình cực mạnh bao gồm CPU i7 thế hệ 7 7820HK, RAM 64 GB, ổ cứng 2 TB và đặc biệt là vũ khí hạng nặng 2 card đồ họa rời NVIDIA GeForce GTX 1080 với dung lượng 16 GB.', 229000000, 'image/lt2.png', 'image/lt2.png', 'image/lt2_item6.jpg', 'Acer'),
(19, 4, 'Laptop Asus A541UA', 'Việc sử dụng chip Intel Core i3 6006U giúp máy hoạt động ổn định, khả năng xử lý tác vụ khá mượt mà. Kèm theo RAM DDR4 4 GB và ổ cứng HDD 1 TB rất phù hợp với sinh viên khi thường làm bài thuyết trình, người làm văn phòng hay nhập liệu và lưu dữ liệu thoải mái hơn.', 10790000, 'image/lt3.png', 'image/lt3.png', 'image/lt3_item1.png', 'Asus'),
(20, 4, 'Laptop HP Pavilion 14', 'Mẫu laptop HP Core i3 sử dụng chip thế hệ thứ 7 mang lại hiệu năng hoạt động khá ổn định và có thể chơi các tựa game online khá ổn. Tiếp đó là RAM DDR4 4 GB hiệu quả và có hiệu suất hoạt động ổn định, cùng ổ cứng HDD 1 TB có thể lưu trữ nhiều dữ liệu cá nhân.', 12990000, 'image/lt4.png', 'image/lt4.png', 'image/lt4_item4.png', 'HP');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TAIKHOAN`
--

CREATE TABLE `TAIKHOAN` (
  `id` int(11) NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(320) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTen` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` int(11) DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AnhDaiDien` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `TAIKHOAN` (`id`, `TenDangNhap`, `MatKhau`, `Email`, `HoTen`, `NgaySinh`, `SDT`, `DiaChi`, `AnhDaiDien`) VALUES
(1, 'admin', '123456', 'chivinh1998@gmail.com', 'Lâm Chí Vĩnh', '10/10/1998', 769652731, '123/45/678aikejwuoaade', 'image/tokuda.png'),
(2, 'asd', '789', 'chivinh1998@gmail.com', 'Lâm Chí Vĩnh', '10/10/1998', 769652735, '124/45/678 aikejsakndbqqade', 'image/bg.png'),
(3, 'asdf', '741', 'chivinh1998@gmail.com', 'Lâm Chí Vĩnh', '10/10/1998', 769652736, '126/45/678 aikwqeqwfasfaade', 'image/dn.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `CHITIETHOADON`
  ADD PRIMARY KEY (`MaHoaDon`,`MaSanPham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `HOADON`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `LOAISANPHAM`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `SANPHAM`
  ADD PRIMARY KEY (`MaSanPham`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `TAIKHOAN`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `CHITIETHOADON`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `HOADON`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `LOAISANPHAM`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `SANPHAM`
--
ALTER TABLE `SANPHAM`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `TAIKHOAN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
