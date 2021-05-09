-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2021 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webkh1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihoc`
--

CREATE TABLE `baihoc` (
  `mabh` int(11) NOT NULL,
  `tenbh` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `lythuyet` text NOT NULL,
  `makh_onl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baihoc`
--

INSERT INTO `baihoc` (`mabh`, `tenbh`, `video`, `lythuyet`, `makh_onl`) VALUES
(2, 'Bài 1: Front-end căn bản', 'Chữa bài Reading Unit 2 (kèm từ vựng)99.mp4', '<p>Bước đầu ti&ecirc;n bạn cần phải học HTML&amp;CSS, đ&acirc;y l&agrave; hai ng&ocirc;n ngữ ph&iacute;a client gi&uacute;p bạn tạo giao diện của website. Thường th&igrave; bạn sẽ nhận một file thiết kế bằng Photoshop (<em>PSD</em>), sau đ&oacute; bạn sẽ cắt ch&uacute;ng ra th&agrave;nh một file&nbsp;<code>.html</code>&nbsp;v&agrave; kết hợp với CSS để tạo ra giao diện y hệt như file PSD.</p>\r\n\r\n<p>B&agrave;i viết được đăng tại&nbsp;<a href=\"https://freetuts.net/\" target=\"_blank\" title=\"freetuts\">freetuts.net</a></p>\r\n\r\n<ul>\r\n	<li>Khi bạn x&acirc;y một căn nh&agrave; th&igrave; cần c&aacute;c vật liệu như:&nbsp;<em>gạch, xi măng, c&aacute;t</em>, .. th&igrave; HTML ch&iacute;nh l&agrave; c&aacute;c vật liệu đ&oacute;.</li>\r\n	<li>Khi bạn sử dụng sơn, đồ trang tr&iacute; nội thất để trang tr&iacute; gi&uacute;p căn nh&agrave; đẹp hơn th&igrave; n&oacute; giống như l&agrave; CSS.</li>\r\n</ul>\r\n\r\n<p>Như vậy HTML sẽ gi&uacute;p hiển thị dữ liệu ở mức đơn sơ, c&ograve;n CSS sẽ gi&uacute;p trang web hiển thị đẹp v&agrave; lộng lẫy hơn. Kết quả của bước n&agrave;y bạn phải nắm vững v&agrave; cắt được một file PSD sang file HTML nh&eacute;.</p>\r\n\r\n<p><strong>T&agrave;i liệu</strong>:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://freetuts.net/hoc-html-css\" target=\"_blank\" title=\"hoc html css\">HTML &amp; CSS</a></li>\r\n	<li><a href=\"https://www.w3schools.com/css/\" rel=\"noopener noreferrer nofollow external\" target=\"_blank\" title=\"no title\">https://www.w3schools.com/css/</a></li>\r\n	<li><a href=\"https://www.w3schools.com/html/\" rel=\"noopener noreferrer nofollow external\" target=\"_blank\" title=\"no title\">https://www.w3schools.com/html/</a></li>\r\n</ul>\r\n\r\n<p><strong>Kh&oacute;a học:</strong></p>\r\n\r\n<ul>\r\n	<li>=&gt;&nbsp;<a href=\"https://freetuts.net/khoa-hoc/khoa-hoc-html-css-co-ban-84.html\" target=\"_blank\" title=\"khoa hoc html css co ban 84 html\">Kh&oacute;a học HTML &amp; CSS&nbsp;</a>: Nội dung kh&aacute; đầy đủ, bao gồm cả responsive v&agrave; thực h&agrave;nh l&agrave;m giao diện như tiki.</li>\r\n</ul>', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitest`
--

CREATE TABLE `baitest` (
  `id_baitest` int(11) NOT NULL,
  `tenbaitest` varchar(255) NOT NULL,
  `slcauhoi` int(11) NOT NULL,
  `thoigian` int(11) NOT NULL,
  `diemso` int(11) NOT NULL,
  `madaotao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baitest`
--

INSERT INTO `baitest` (`id_baitest`, `tenbaitest`, `slcauhoi`, `thoigian`, `diemso`, `madaotao`) VALUES
(1, 'Kỹ thuật - Tự động hóa', 30, 30, 100, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `mahv` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`mahv`, `makh`, `ngaydk`) VALUES
(1, 7, '2021-01-27'),
(1, 8, '2021-01-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daotao`
--

CREATE TABLE `daotao` (
  `madaotao` int(11) NOT NULL,
  `tendaotao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `daotao`
--

INSERT INTO `daotao` (`madaotao`, `tendaotao`) VALUES
(1, 'Kỹ thuật - Tự động hoá'),
(2, 'Ngoại ngữ'),
(4, 'An toàn lao động'),
(5, 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_cauhoi`
--

CREATE TABLE `ds_cauhoi` (
  `id_cauhoi` int(11) NOT NULL,
  `cauhoi` varchar(255) NOT NULL,
  `luachona` varchar(255) NOT NULL,
  `luachonb` varchar(255) NOT NULL,
  `luachonc` varchar(255) NOT NULL,
  `luachond` varchar(255) NOT NULL,
  `dapan` varchar(1) NOT NULL,
  `id_baitest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ds_cauhoi`
--

INSERT INTO `ds_cauhoi` (`id_cauhoi`, `cauhoi`, `luachona`, `luachonb`, `luachonc`, `luachond`, `dapan`, `id_baitest`) VALUES
(1, 'Máy tự động là máy hoàn thành một nhiệm vụ nào đó', ' Theo chương trình không có sẵn, không có sự tham gia trực tiếp của con người', 'Theo chương trình định trước, không có sự tham gia trực tiếp của con người', 'Theo chương trình định trước, có sự tham gia trực tiếp của con người', 'Theo chương trình không có sẵn, có sự tham gia trực tiếp của con người', 'b', 1),
(2, 'Máy tự động được chia làm mấy loại?', '2', '3', '4', '5', 'a', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `mahinhanh` int(11) NOT NULL,
  `hinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`mahinhanh`, `hinh`) VALUES
(1, 'hinh1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `mahv` int(11) NOT NULL,
  `tenhv` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `matk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`mahv`, `tenhv`, `diachi`, `email`, `sdt`, `matk`) VALUES
(1, 'Phạm Duy Tan', '448 Lê Văn Việt, Phường Tăng Nhơn Phú A, thành phố Thủ Đức, thành phố Hồ Chí Mình', 'cuahangtienloipdt@gmail.com', '0332173097', 1),
(2, 'Nguyễn Viết Vũ1', '450 Lê Văn Việt , Q9 , TP.Hồ Chí Minh', 'blabla@gmail.com', '0456498453', 3),
(3, 'Minh Thanh', '450 Lê Văn Việt , Q9 , TP.Hồ Chí Minh', 'minhthanh@gmail.com', '23146548', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `anhdaidien` varchar(255) NOT NULL,
  `muctieukh` text NOT NULL,
  `noidunggiangday` text NOT NULL,
  `soluonghv` int(11) NOT NULL,
  `lichkhaigiang` date NOT NULL,
  `thoiluonghoc` varchar(255) NOT NULL,
  `hocphi` double NOT NULL,
  `madaotao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`makh`, `tenkh`, `anhdaidien`, `muctieukh`, `noidunggiangday`, `soluonghv`, `lichkhaigiang`, `thoiluonghoc`, `hocphi`, `madaotao`) VALUES
(7, 'Lập trình điều khiển hệ thống tự động hóa với Robot', '24-03-21--08-43-13_05-01-21--01-34-24_nachi.jpg', '- Người học có thể kết nối và vận hành các hệ thống tích hợp như FMS hay CIM,…\r\n- Học viên có thể thiết kế, lập trình và điều khiển hệ thống.\r\n- Học viên có khả năng phân tích và xử lý các lỗi hệ thống.\r\n- Học viên biết cách lập kế hoạch bảo trì, bảo dưỡng cho hệ thống.', '- Kết nối và điều khiển cho cánh tay Robot (bằng tay/tự động).\r\n- Kết nối và lập trình điều khiển các thiết bị ngoại vi với PLC Mitsubishi.\r\n- Kết nối và điều khiển hệ thống Tự động hóa với cánh tay Robot.\r\n- Phân tích, xử lý lỗi và lập kế hoạch bảo trì, bảo dưỡng cho cánh tay Robot.\r\n- Phương pháp lập kế hoạch và cải tiến các hệ thống sản xuất bằng Robot.', 16, '2021-03-27', '15', 2400000, 1),
(8, 'Lập Trình robot Nachi', '27-03-21--07-50-32_21-01-21--11-19-27_unnamed.png', '- Học viên có thể thiết kế, lập trình và điều khiển cánh tay Robot theo quy trình sản xuất.\r\n- Học viên có khả năng phân tích và xử lý các lỗi khi Robot hoạt động.', '- Kết nối và điều khiển cho cánh tay Robot (bằng tay/tự động).\r\n- Kết nối và lập trình điều khiển các thiết bị ngoại vi với PLC Mitsubishi.\r\n- Kết nối và điều khiển hệ thống Tự động hóa với cánh tay Robot.\r\n- Phân tích, xử lý lỗi và lập kế hoạch bảo trì, bảo dưỡng cho cánh tay Robot.\r\n- Phương pháp lập kế hoạch và cải tiến các hệ thống sản xuất bằng Robot.', 16, '2021-03-30', '16', 2400000, 1),
(9, 'SOLIDWORKS căn bản', '27-01-21--10-01-32_solid.jpg', '- Hướng dẫn cho người học kỹ năng thiết kế và cách sử dụng phần mềm một cách hiệu quả trong từng trường hợp cụ thể.\r\n- Sau khóa học người học có thể phác họa được ý tưởng thiết kế và dựng bản vẽ thiết kế trên phần mềm một cách nhanh chóng.', '- Vẽ phác 2D.                                       \r\n- Extrude, revolve.\r\n- Sweep, loft.                                        \r\n- Fillet, chamfer, shell, rib.\r\n- Hole, draft.                                         \r\n- Mirror, pattern.\r\n- Lắp ráp trong môi trường Assembly.          \r\n- Tạo bản vẽ kỹ thuật từ chi tiết hay cụm chi tiết.\r\n- Kiểm tra cuối khóa.\r\nD.    Hỗ trợ lớp: Thực hành thiết kế. (24 tiết)\r\n\r\nXây dựng chi tiết từ bản vẽ 2D.\r\nĐo vẽ lại chi tiết thực tế.\r\nXây dựng vật thể từ dữ liệu số.\r\nThiết kế, cải tiến chi tiết đã có.', 12, '2021-02-27', '18 buổi (trong vòng 1,5 tháng).', 3000000, 1),
(10, 'Tiếng Anh trong môi trường kỹ thuật', '07-05-21--02-54-58_27-01-21--10-04-09_download(2)5.jpg', '- Tăng cường khả năng phản xạ và sử dụng tiếng Anh trong các tình huống thông thường trong công việc, cuộc sống, đặc biệt trong môi trường kỹ thuật.', '- Các tình huống giao tiếp với đồng nghiệp, chuyên gia trong môi trường kỹ thuật\r\n- Mô tả hoạt động của các loại máy móc, thiết bị\r\n- Báo cáo các sự cố, tai nạn xảy ra trong quá trình làm việc và các qui định về an toàn lao động\r\n- Thực hành thuyết trình và điều hành họp hiệu quả trong môi trường kỹ thuật', 15, '2021-02-27', '45 giờ/cấp độ. 4 cấp độ toàn chương trình.', 2500000, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khonl`
--

CREATE TABLE `khonl` (
  `makh_onl` int(11) NOT NULL,
  `tenkh_onl` varchar(255) NOT NULL,
  `Mota` text NOT NULL,
  `anhdaidien` varchar(255) NOT NULL,
  `hocphi` double NOT NULL,
  `madaotao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khonl`
--

INSERT INTO `khonl` (`makh_onl`, `tenkh_onl`, `Mota`, `anhdaidien`, `hocphi`, `madaotao`) VALUES
(1, 'Lập trình Front - End', 'Khóa học lập trình Frontend phù hợp với các bạn muốn theo con đường lập trình web, cho dù bạn lựa chọn theo mảng Frontend hay Backend thì kiến thức trong khóa học này là điều bắt buộc bạn phải có. Sau khi tham gia khóa học sẽ có được nền tảng vững chắc về HTML CSS, Javascript, jQuery, Bootstrap.\r\n\r\nĐối tượng phù hợp tham gia chương trình học này\r\n\r\nSinh viên muốn tiếp cận với ngành lập trình Web một cách bài bản.\r\nNgười đi làm có hứng thú với lập trình và muốn học chuyên sâu chuyển ngành.\r\nĐã có kiến thức nhưng chưa vững, chưa có sản phẩm thực tế, cần thực hành và tiếp cận nhiều với dự án thực tế.\r\nHình thức học\r\n\r\nCó tư duy lập trình cốt lõi của một người Front End Developer.\r\nCó khả năng xây dựng và phân tích dự án Front End từ bước nhận file thiết kế, ước lượng thời gian hoàn thành đến bước hiện thực giao diện bằng các công nghệ đã học.\r\nNắm cực chắc các kiến thức nền tảng và hoàn toàn có khả năng rút ngắn thời gian học thêm các công nghệ mới (React, Vue, Angular, …).\r\nRèn luyện và có khả năng tra cứu thông tin, đọc tài liệu liên quan tới Front End.\r\nĐược tiếp cận và học hỏi với nhiều kỹ thuật hay và khó từ giảng viên thông qua các dự án thực tế.\r\nTự xây dựng được giao diện các trang Website đáp ứng nhu cầu doanh nghiệp', 'front_end.png', 600000, 5),
(2, 'Back - end developer', 'Nắm rõ toàn bộ qui trình của một lập trình Back End chuyên nghiệp\r\nNắm vững các công thức để tay nghề luôn được vững chắc, cập nhật công nghệ mới nhất\r\nHiểu và nắm các kỹ năng cần thiết liên quan đến nghề Back End, xây dựng hệ thống lớn, giao tiến Back End và Front End', '1003880.png', 300000, 5),
(3, 'javaa', '<h3>Hashing</h3>\r\n\r\n<p><img alt=\"Hashing algorithms\" src=\"https://www.technotification.com/wp-content/uploads/2018/03/Hash_table_wikipedia-300x230.png\" /></p>\r\n\r\n<ul>\r\n	<li>Hiện đang tham gia v&agrave;o việc ph&aacute;t hiện v&agrave; x&aacute;c định dữ liệu th&iacute;ch hợp bằng key v&agrave; ID, theo một nghi&ecirc;n cứu, Hashing&nbsp;l&agrave; thuật to&aacute;n được sử dụng. Với vai tr&ograve; mở rộng việc ph&aacute;t hiện lỗi, quản l&yacute; bộ nhớ cache, mật m&atilde; v&agrave; tra cứu , h&agrave;m Hashing t&iacute;ch hợp c&aacute;c kh&oacute;a ph&ugrave; hợp v&agrave; cho c&aacute;c gi&aacute; trị ch&iacute;nh x&aacute;c. H&agrave;m n&agrave;y cũng c&oacute; thể được sử dụng như một định danh duy nhất cho c&aacute;c tập dữ liệu nhất định v&agrave; c&aacute;c ph&eacute;p t&iacute;nh to&aacute;n cho ph&eacute;p người d&ugrave;ng tạo ra c&aacute;c gi&aacute; trị dữ liệu kh&ocirc;ng tr&ugrave;ng lắp. Th&ocirc;ng thường n&oacute; được &aacute;p dụng trong c&aacute;c bộ định tuyến để lưu trữ địa chỉ IP.</li>\r\n</ul>\r\n\r\n<h3>Search Algorithms</h3>\r\n\r\n<p><img alt=\"Uniform_binary_search\" src=\"https://www.technotification.com/wp-content/uploads/2018/03/Uniform_binary_search-300x92.png\" /></p>\r\n\r\n<ul>\r\n	<li><strong>Thuật to&aacute;n t&igrave;m kiếm</strong>&nbsp;thường được &aacute;p dụng cho d&atilde;y cấu tr&uacute;c dữ liệu tuyến t&iacute;nh hoặc cấu tr&uacute;c dữ liệu đồ họa. Thuật to&aacute;n t&igrave;m kiếm tuyến t&iacute;nh c&ograve;n được gọi l&agrave; t&igrave;m kiếm nhị ph&acirc;n, gi&uacute;p nh&agrave; ph&aacute;t triển tiến h&agrave;nh t&igrave;m kiếm hiệu quả tr&ecirc;n c&aacute;c tập dữ liệu được sắp xếp với h&agrave;m phức tạp thời gian của O (log N). Cơ chế của t&igrave;m kiếm nhị ph&acirc;n l&agrave; chia danh s&aacute;ch th&agrave;nh hai nửa cho đến khi n&oacute; t&igrave;m thấy mục được y&ecirc;u cầu v&agrave; thường được sử dụng để gỡ những lỗi li&ecirc;n quan đến git bisection. C&aacute;c thuật to&aacute;n n&agrave;y c&ograve;n được biết đến với chức năng l&agrave; Chiều s&acirc;u/Chiều rộng T&igrave;m kiếm Đầu ti&ecirc;n, n&oacute; cho ta cấu tr&uacute;c dữ liệu l&agrave; một biểu đồ tr&ograve;n hoặc h&igrave;nh c&acirc;y đ&atilde; bật chức năng t&igrave;m kiếm, x&aacute;c định c&aacute;c tập dữ liệu cần thiết trong m&ocirc; h&igrave;nh c&acirc;y ngang. BFS rất phổ biến trong c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm, cũng được sử dụng để x&acirc;y dựng c&aacute;c bot trong AI hay định vị c&aacute;c con đường ngắn nhất giữa hai th&agrave;nh phố.</li>\r\n</ul>\r\n\r\n<h3>Thuật to&aacute;n sắp xếp (Sort Algorithms)</h3>\r\n\r\n<p><img alt=\"Mergesort algorithms\" src=\"https://www.technotification.com/wp-content/uploads/2018/03/Mergesort_algorithm_diagram-241x300.png\" /></p>\r\n\r\n<ul>\r\n	<li>C&aacute;c&nbsp;<strong>thuật to&aacute;n sắp xếp</strong>&nbsp;thường được c&aacute;c nh&agrave; ph&aacute;t triển d&ugrave;ng để đặt dữ liệu theo c&aacute;ch c&oacute; tổ chức. Trong thuật to&aacute;n QuickSort, c&aacute;c th&agrave;nh phần dữ liệu được so s&aacute;nh với nhau để x&aacute;c định thứ tự tương ứng của ch&uacute;ng. N&oacute; c&oacute; độ phức tạp thời gian của O(nLogn) để thực hiện so s&aacute;nh. Tuy nhi&ecirc;n, Radix Sort l&agrave; một kỹ thuật nhanh hơn QuickSort v&igrave; n&oacute; sắp xếp c&aacute;c phần tử trong một m&ocirc; h&igrave;nh tuyến t&iacute;nh với độ phức tạp thời gian O(n). T&iacute;nh đơn giản của thuật to&aacute;n n&agrave;y l&agrave;m cho n&oacute; được ưa chuộng. C&aacute;c thuật to&aacute;n sắp xếp kh&aacute;c bao gồm Sắp xếp hợp nhất, Sắp xếp nh&oacute;m v&agrave; Sắp xếp đếm.</li>\r\n</ul>\r\n\r\n<h3>Thuật to&aacute;n lập tr&igrave;nh động (Dynamic Programming Algorithms)</h3>\r\n\r\n<p><img alt=\"Expected Value Dynamic Programming\" src=\"https://www.technotification.com/wp-content/uploads/2018/03/Expected_Value_Dynamic_Programming.jpg\" /></p>\r\n\r\n<ul>\r\n	<li><strong>Lập tr&igrave;nh động</strong>&nbsp;thường l&agrave; một h&agrave;m giải quyết vấn đề phức tạp li&ecirc;n quan đến tr&iacute; tuệ bằng c&aacute;ch t&aacute;ch c&aacute;c vấn đề th&agrave;nh c&aacute;c b&agrave;i to&aacute;n con nhỏ hơn, giải quyết ch&uacute;ng sau đ&oacute; x&acirc;y dựng trở lại th&agrave;nh vấn đề phức tạp với bộ nhớ của c&aacute;c kết quả nhỏ hơn để đưa ra c&acirc;u trả lời cho vấn đề phức tạp ban đầu. Lập tr&igrave;nh động c&oacute; khả năng t&iacute;ch hợp để ghi nhớ, cho ph&eacute;p lưu trữ c&aacute;c k&yacute; ức về c&aacute;c vấn đề đ&atilde; giải quyết trước đ&oacute;. Nếu lần tiếp theo vấn đề ấy lại xuất hiện th&igrave; n&oacute; sẽ&nbsp;được giải quyết nhanh hơn nhiều.</li>\r\n</ul>', 'Binh-294672.jpg', 400000, 1),
(7, 'Khóa đào tạo lập trình PLC & SCADA', '<h2 style=\"font-style:italic\"><span style=\"color:#e74c3c\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>1. Kh&oacute;a đ&agrave;o tạo lập tr&igrave;nh cơ bản phần mềm Simatic Step 7</strong></span></span></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Kh&oacute;a học cung cấp kiến thức chung về c&aacute;c d&ograve;ng sản phẩm PLC của Siemens, tổng quan về cấu tr&uacute;c của ng&ocirc;n ngữ trong lập tr&igrave;nh, nắm r&otilde; được c&aacute;c khối h&agrave;m cơ bản (khối h&agrave;m FB &amp; FC, khối h&agrave;m hệ thống OB, khối h&agrave;m chương tr&igrave;nh). Từ đ&oacute;, học vi&ecirc;n c&oacute; khả năng lập tr&igrave;nh v&agrave; kết nối, vận h&agrave;nh với PLC thực.</span></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"color:#e74c3c\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>2. Kh&oacute;a đ&agrave;o tạo thiết kế SCADA (phần mềm WinCC)</strong></span></span></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Tham gia kh&oacute;a học, học vi&ecirc;n được đ&agrave;o tạo về c&aacute;ch thức thiết kế giao diện v&agrave; lập tr&igrave;nh cho hệ thống SCADA. Từ đ&oacute;, học vi&ecirc;n c&oacute; khả năng tự thiết kế, bố tr&iacute; c&aacute;c trang giao diện vận h&agrave;nh theo chuẩn c&ocirc;ng nghiệp; biết sử dụng c&aacute;c t&iacute;nh năng cơ bản trong WinCC (điều khiển, gi&aacute;m s&aacute;t, cảnh b&aacute;o, lưu trữ) để vận dụng v&agrave;o quy tr&igrave;nh vận h&agrave;nh sản xuất thực tế.</span></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"color:#e74c3c\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>3. Kh&oacute;a thiết kế v&agrave; lập tr&igrave;nh PLC cơ bản (phần mềm Simatic Step 7 &amp; WinCC)</strong></span></span></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Sau kh&oacute;a n&agrave;y, học vi&ecirc;n c&oacute; thể tự x&acirc;y dựng được chương tr&igrave;nh điều khiển v&agrave; hiểu được cấu tr&uacute;c chương tr&igrave;nh điều khiển, biết c&aacute;ch x&acirc;y dựng c&aacute;c h&agrave;m chức năng, viết chương tr&igrave;nh bằng ng&ocirc;n ngữ lập tr&igrave;nh Ladder. Từ đ&oacute;, c&oacute; thể lập tr&igrave;nh kiểm so&aacute;t hệ thống cũng như nghi&ecirc;n cứu đưa ra c&aacute;c giải ph&aacute;p xử l&yacute; c&aacute;c vấn đề ph&aacute;t sinh trong sản xuất thực tế ứng dụng phần mềm điều khiển tự động ho&aacute;.</span></span></h2>', 'Chữa bài Reading Unit 2 (kèm từ vựng).mp4', 500000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_hocvien`
--

CREATE TABLE `tk_hocvien` (
  `matk` int(11) NOT NULL,
  `tentk` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tk_hocvien`
--

INSERT INTO `tk_hocvien` (`matk`, `tentk`, `matkhau`) VALUES
(1, 'duytan', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'vietvu98', 'bbb8aae57c104cda40c93843ad5e6db8'),
(3, 'vietvu1', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(4, 'minhthanh', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk_quanly`
--

CREATE TABLE `tk_quanly` (
  `matk` int(11) NOT NULL,
  `tentk` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tk_quanly`
--

INSERT INTO `tk_quanly` (`matk`, `tentk`, `matkhau`) VALUES
(1, 'vietvu', '202cb962ac59075b964b07152d234b70'),
(3, 'duytan', '123456'),
(4, 'admin', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD PRIMARY KEY (`mabh`),
  ADD KEY `fk_baihoc` (`makh_onl`);

--
-- Chỉ mục cho bảng `baitest`
--
ALTER TABLE `baitest`
  ADD PRIMARY KEY (`id_baitest`),
  ADD KEY `fk_baitest` (`madaotao`);

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`mahv`,`makh`),
  ADD KEY `fK_khoahoc` (`makh`);

--
-- Chỉ mục cho bảng `daotao`
--
ALTER TABLE `daotao`
  ADD PRIMARY KEY (`madaotao`);

--
-- Chỉ mục cho bảng `ds_cauhoi`
--
ALTER TABLE `ds_cauhoi`
  ADD PRIMARY KEY (`id_cauhoi`),
  ADD KEY `fk_cauhoi` (`id_baitest`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`mahinhanh`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`mahv`),
  ADD KEY `fk_hv` (`matk`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`makh`),
  ADD KEY `FK_daotao` (`madaotao`);

--
-- Chỉ mục cho bảng `khonl`
--
ALTER TABLE `khonl`
  ADD PRIMARY KEY (`makh_onl`),
  ADD KEY `fk_khonl` (`madaotao`);

--
-- Chỉ mục cho bảng `tk_hocvien`
--
ALTER TABLE `tk_hocvien`
  ADD PRIMARY KEY (`matk`);

--
-- Chỉ mục cho bảng `tk_quanly`
--
ALTER TABLE `tk_quanly`
  ADD PRIMARY KEY (`matk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  MODIFY `mabh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `baitest`
--
ALTER TABLE `baitest`
  MODIFY `id_baitest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `daotao`
--
ALTER TABLE `daotao`
  MODIFY `madaotao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ds_cauhoi`
--
ALTER TABLE `ds_cauhoi`
  MODIFY `id_cauhoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `mahinhanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `mahv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `khonl`
--
ALTER TABLE `khonl`
  MODIFY `makh_onl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tk_hocvien`
--
ALTER TABLE `tk_hocvien`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tk_quanly`
--
ALTER TABLE `tk_quanly`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD CONSTRAINT `fk_baihoc` FOREIGN KEY (`makh_onl`) REFERENCES `khonl` (`makh_onl`);

--
-- Các ràng buộc cho bảng `baitest`
--
ALTER TABLE `baitest`
  ADD CONSTRAINT `fk_baitest` FOREIGN KEY (`madaotao`) REFERENCES `daotao` (`madaotao`);

--
-- Các ràng buộc cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD CONSTRAINT `fK_khoahoc` FOREIGN KEY (`makh`) REFERENCES `khoahoc` (`makh`),
  ADD CONSTRAINT `fk_hocvien` FOREIGN KEY (`mahv`) REFERENCES `hocvien` (`mahv`);

--
-- Các ràng buộc cho bảng `ds_cauhoi`
--
ALTER TABLE `ds_cauhoi`
  ADD CONSTRAINT `fk_cauhoi` FOREIGN KEY (`id_baitest`) REFERENCES `baitest` (`id_baitest`);

--
-- Các ràng buộc cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD CONSTRAINT `fk_hv` FOREIGN KEY (`matk`) REFERENCES `tk_hocvien` (`matk`);

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `FK_daotao` FOREIGN KEY (`madaotao`) REFERENCES `daotao` (`madaotao`);

--
-- Các ràng buộc cho bảng `khonl`
--
ALTER TABLE `khonl`
  ADD CONSTRAINT `fk_khonl` FOREIGN KEY (`madaotao`) REFERENCES `daotao` (`madaotao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
