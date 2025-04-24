-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2025 lúc 05:58 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `movie_id`, `username`, `content`, `created_at`) VALUES
(7, 17, 'Nguyễn', 'phim hay', '2025-04-24 08:01:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `ten_phim` varchar(255) NOT NULL,
  `so_tap` int(11) NOT NULL,
  `thoi_luong` varchar(50) NOT NULL,
  `duong_dan` text NOT NULL,
  `mo_ta` text NOT NULL,
  `dinh_dang` varchar(50) NOT NULL,
  `danh_muc` varchar(50) NOT NULL,
  `quoc_gia` varchar(100) NOT NULL,
  `the_loai` text NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `video_path` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `ten_phim`, `so_tap`, `thoi_luong`, `duong_dan`, `mo_ta`, `dinh_dang`, `danh_muc`, `quoc_gia`, `the_loai`, `ngay_tao`, `video_path`, `image_path`) VALUES
(17, 'Doraemon: Nobita và bản giao hưởng Địa Cầu', 1, '1h55p', 'doraemon-nobita-va-ban-giao-huong-dia-cau-086@', 'Chuẩn bị cho buổi hòa nhạc ở trường, Nobita đang tập thổi sáo recorder - nhạc cụ mà cậu chơi dở tệ nhất. Thích thú trước nốt \"No\" lạc quẻ của Nobita , Micca - cô bé bí ẩn đã mời Doraemon , Nobita cùng nhóm bạn đến \"Farre\" - Cung điện âm nhạc tọa lạc trên một hành tinh nơi âm nhạc sẽ hóa thành năng lượng. Nhằm cứu cung điện này, Micca và Chapeck đang tìm kiếm 5 \"Virtouso\" - bậc thầy âm nhạc huyền thoại sẽ cùng mình biểu diễn! Với bảo bối thần kì \"Chứng chỉ chuyên viên âm nhạc\", Doraemon và các bạn đã chọn nhạc cụ bằng sợi dây thần định mệnh, cùng Micca hòa tấu, từng bước khôi phục cung điện \"Farre\". Tuy nhiên, một vật thể sống đáng sợ rất ghét âm nhạc sẽ xóa sổ âm nhạc khỏi thế giới đang đến gần, Trái Đất đang rơi vào nguy hiểm...! Liệu nhóm người bạn có thể cứu được \"tương lai âm nhạc\" và địa cầu này?', '1080p60 HD', 'Phim Bộ', 'Nhật Bản', 'Khoa Học Viễn Tưởng, Anime, Vietsub', '2025-04-21 19:19:18', '1745263158_PHIM ĐIỆN ẢNH DORAEMON_ NOBITA VÀ BẢN GIAO HƯỞNG ĐỊA CẦU - TRAILER _ DKKC_ 05.2024.mp4', '1745263158_doreamon-2024.jpg'),
(18, 'Kung Fu Panda 4', 1, '1h34p/Tập', 'Kung-Fu-Panda-4', 'Po sau khi chiến đấu với Kai, kẻ phản diện gây nỗi khiếp sợ cho mọi người trong phần 3, trong phần 4 này cậu sẽ đối diện với thử thách lớn nhất của mình. Nhưng liệu cậu ta có sống sót qua thử thách ấy hay không?.', '1440p60 HD', 'Phim Bộ', 'Việt Nam', 'Hành động, Vietsub, Hoạt Hình', '2025-04-21 19:25:10', '1745263510_KUNG FU PANDA 4 _ Official Trailer.mp4', '1745263510_unnamed.jpg'),
(28, '12 Angry Man', 1, '190\'', '12angry', 'Phim được chuyển thể từ vở kịch cùng tên của Reginald Rose. Nội dung phim 12 người đàn ông giận dữ xoay quanh bồi thẩm đoàn gồm 12 người đàn ông đang bàn thảo về tội trạng của một thanh niên bị nghi ngờ giết cha ruột. Hầu hết diễn biến phim xoay quanh cuộc bàn luận này, trong phòng họp bồi thẩm và chỉ có 3 phút diễn ra ngoài căn phòng.', '1440p60 HD', 'Phim Bộ', 'Mỹ', 'Hành động, Hài Hước', '2025-04-24 15:31:12', '1745508672_1745150207_9convert.com - 12 ANGRY MEN 1957  Official Trailer  MGM.mp4', '1745508672_unnamed.jpg'),
(29, 'Dark', 1, '190\'', 'dark', 'Alex là một sinh viên năm nhất đại học ghét ma. Thật không may cho anh ta, anh ta có một sở trường thu hút các linh hồn. Hai năm trước, mối liên hệ này đã khiến anh ta bị chấn thương tâm linh ở tay phải, và bạn của anh ta bị cuốn vào làn đạn. Sự kiện này khiến anh ấy trở thành một người khép kín, khiến anh ấy có các kỹ năng xã hội rất kém. May mắn thay, Alex đang dần bắt đầu hòa nhập với xã hội, nhờ sự giúp đỡ của người bạn thời thơ ấu, Reni. Là một phần trong quá trình phục hồi chức năng, Alex đảm nhận công việc bán thời gian của một gia sư riêng, và học trò đầu tiên của anh không ai khác chính là anh họ của Reni, Erez. Bên cạnh việc là một đứa trẻ thần đồng, còn có một điểm đặc biệt khác liên quan đến Erez cô ấy có thể chất tâm linh, giống như Alex. Tuy nhiên, trái ngược với Alex, cô khao khát được chạm trán với các linh hồn, hy vọng tìm thấy hồn ma đã bắt mẹ cô đi. Khi Alex bị Reni và Erez kéo đến những địa điểm bị ma ám,', '1440p60 HD', 'Phim Bộ', 'Mỹ', 'Hành động, Khoa Học Viễn Tưởng, Kinh Dị', '2025-04-24 15:33:37', '1745508817_1745505396_IT - Official Trailer 1.mp4', '1745508817_MV5BOWJjMGViY2UtNTAzNS00ZGFjLWFkNTMtMDBiMDMyZTM1NTY3XkEyXkFqcGc@._V1_.jpg'),
(31, 'God Father', 1, '190\'', 'father', 'Bố già xoay quanh cuộc sống trong vòng 10 năm một gia đình tài phiệt mafia gốc Ý, nhà Corleone. Diễn biến của phim xoay quanh cuộc trả thù đẫm máu của Michael – người con trai cả của ông trùm Vito Corleone trong cuộc chiến báo thù cho cha sau khi ông trùm Vito bị ám sát.', '1440p60 HD', 'Phim Bộ', 'Mỹ', 'Hành động, Hình Sự', '2025-04-24 15:36:25', '1745508985_1745150207_9convert.com - 12 ANGRY MEN 1957  Official Trailer  MGM.mp4', '1745508985_1745146597_godfather.jpg'),
(32, 'The Lord Of The Rings: The return of the king', 1, '190\'', 'ring', 'The Lord Of The Rings: The return of the king', '1440p60 HD', 'Phim Bộ', 'Việt Nam', '', '2025-04-24 15:37:39', '1745509059_1745150667_CHÚA TỂ CỦA NHỮNG CHIẾC NHẪN_ SỰ TRỞ VỀ CỦA NHÀ VUA - Trailer chính thức _ KC_ 29.11.2023.mp4', '1745509059_9780008537777.jpg'),
(33, 'Darknights', 1, '190\'', '', 'Nối tiếp nội dung 2 phần đầu, ở phần này, chúa tể hắc ám Sauron bao vây thành Gondor để giết chết những người sống tại đây. Trước tình thế đó, phải có một vị vua lên làm lãnh đạo. Aragorn có hoàn thành được trọng trách cao cả mà người dân của vương quốc đặt lên vai anh trong cuộc chiến chống lại thế lực hùng mạnh?', '1440p60 HD', 'Phim Bộ', 'Mỹ', 'Khoa Học Viễn Tưởng, Kinh Dị', '2025-04-24 15:39:42', '1745509182_the-dark-knight-2008-official-trailer-1-christopher-nolan-movie-hd-362-ytshorts.savetube.me.mp4', '1745509182_unnamed.png'),
(34, 'Pulf Fiction', 1, '190\'', 'pulf', 'Nội dung phim xoay quanh những câu chuyện tào lao của các nhân vật như Pumpkin, Yolanda, bộ đôi Gangster Vincent Vega và Jules Winnfield… Mặc dù là những câu chuyện tào lao nhưng được đánh giá là không hề tào lao. Ẩn sau từng câu chuyện là những lời châm biếm sâu cay, chứa đựng tư tưởng sâu sắc và đầy ý nghĩa.', '1440p60 HD', 'Phim Bộ', 'Mỹ', '', '2025-04-24 15:41:48', '1745509308_pulp-fiction-official-trailer-hd-john-travolta-uma-thurman-samuel-l-jackson-miramax-ytshorts.savetube.me.mp4', '1745509308_lao-6449-1380698084-4432-1648714161.jpg'),
(35, 'Schindler List', 1, '1', '', 'Bộ phim khoa học viễn tưởng về hành trình khám phá vũ trụ của các phi hành gia, những người đã tìm ra một hiện tượng kỳ lạ có thể thay đổi hiểu biết của nhân loại về không gian và thời gian.', '1080p60 HD', 'Phim Bộ', 'Việt Nam', 'Kinh Dị, Hình Sự', '2025-04-24 15:43:50', '1745509430_schindler-s-list-1993-official-trailer-screen-bites-ytshorts.savetube.me.mp4', '1745509430_MV5BNjM1ZDQxYWUtMzQyZS00MTE1LWJmZGYtNGUyNTdlYjM3ZmVmXkEyXkFqcGc@._V1_.jpg'),
(36, 'Interstellar', 1, '190\'', 'instellar', 'Năm 2067, một chứng bệnh lạ xuất hiện đang dần giết chết các loại cây lương thực, những cơn bão cát xảy ra một cách triền miên, lượng oxy trong khí quyển giảm dần, những sự việc trên đẩy loài người đến bờ vực của sự diệt vong. Cooper, một nông dân góa vợ trước đây từng là kỹ sư và phi công của NASA, đang sống cùng với bố vợ Donald, con trai Tom 15 tuổi và con gái Murphy 10 tuổi. Murphy tin rằng, căn phòng của mình bị ám bởi một bóng ma đang cố gắng liên lạc với mình. Murphy và Cooper phát hiện ra rằng bóng ma đó là một dạng thông minh chưa được biết đến, đang cố gắng gửi các thông điệp cho mình thông qua sóng hấp dẫn, thể hiện bằng các vệt bụi kì lạ xuất hiện sau cơn bão cát. Các thông điệp này được trình bày bằng mã nhị phân, tiết lộ toạ độ của một căn cứ bí mật của NASA, hiện đang được dẫn dắt bởi Giáo sư Brand.', '1440p60 HD', 'Phim Bộ', 'Mỹ', 'Hành động, Khoa Học Viễn Tưởng', '2025-04-24 15:45:22', '1745509522_interstellar-official-trailer-2-2014-matthew-mcconaughey-christopher-nolan-sci-fi-movie-hd-ytshorts.savetube.me.mp4', '1745509522_images.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(10, 'gianguyen7890', 'admin123@gmail.com', '$2y$10$GYZr.MrPiLNAqzTqR5ceS.sjemxddrq6ho.71Hx6U8hbHElTLRH.m', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
