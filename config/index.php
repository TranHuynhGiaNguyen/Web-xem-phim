
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTNNMovie</title>
    <link rel="stylesheet" href="CSS/index.css?=v1.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php session_start(); ?>
<header>
    <div class="logo">LTNNMovie</div>
    <nav>
        <a href="trangluuphim.php">Phim mới</a>
        <a href="admin.php">Quản trị</a>
        
    </nav>
    <div class="user-actions">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div class="user-info" style="margin-right: 10px; color: white;">
                👋 Xin chào, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
            </div>
            <!-- ĐÃ ĐĂNG NHẬP: Hiện nút Đăng xuất -->
            <a href="logout.php" class="Btn">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Đăng xuất</div>
            </a>
        <?php else: ?>
            <!-- CHƯA ĐĂNG NHẬP: Hiện nút Đăng nhập -->
            <a href="login.php" class="Btn" style="background-color:rgb(0, 255, 60); color: white;">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Đăng nhập</div>
            </a>
        <?php endif; ?>
    </div>
</header>

    <main>
        <div class="movie-container">
            <div id="movie-details">
                <h1 id="movie-title">Dark Gathering</h1>
                <h2 id="movie-subtitle">Tập hợp bóng tối</h2>
                <div class="movie-meta">
                    <span id="movie-quality">HD</span>
                    <span id="movie-rating">T16</span>
                    <span id="movie-year">2022</span>
                    <span id="movie-episodes">12 tập</span>
                </div>
                <p id="movie-description"> Alex là một sinh viên năm nhất đại học ghét ma. Thật không may cho anh ta, anh ta có một sở trường thu hút các linh hồn. Hai năm trước, mối liên hệ này đã khiến anh ta bị chấn thương tâm linh ở tay phải, và bạn của anh ta bị cuốn vào làn đạn. Sự kiện này khiến anh ấy trở thành một người khép kín, khiến anh ấy có các kỹ năng xã hội rất kém. May mắn thay, Alex đang dần bắt đầu hòa nhập với xã hội, nhờ sự giúp đỡ của người bạn thời thơ ấu, Reni. Là một phần trong quá trình phục hồi chức năng, Alex đảm nhận công việc bán thời gian của một gia sư riêng, và học trò đầu tiên của anh không ai khác chính là anh họ của Reni, Erez. Bên cạnh việc là một đứa trẻ thần đồng, còn có một điểm đặc biệt khác liên quan đến Erez cô ấy có thể chất tâm linh, giống như Alex. Tuy nhiên, trái ngược với Alex, cô khao khát được chạm trán với các linh hồn, hy vọng tìm thấy hồn ma đã bắt mẹ cô đi. Khi Alex bị Reni và Erez kéo đến những địa điểm bị ma ám, </p>

            <a id="watch-now-button" href="" class="button">
                <span class="button_lg">
                    <span class="button_sl"></span>
                    <span class="button_text">Xem ngay</span>                       
                </span>
            </a>
            </div>
            <div class="movie-image">
                <img id="main-image" src="media/darkgather1.jpg" alt="Main characters of the show darkgather" width="600" height="400">
            </div>
        </div>
        <div class="movie-carousel">
            <div class="carousel-item">
                <img onclick="changeMovie('Dark Gathering', 'Tập hợp bóng tối', 'HD', 'T16', '2022', '12 tập', ' Keitarou Gentouga là một sinh viên năm nhất đại học ghét ma. Thật không may cho anh ta, anh ta có một sở trường thu hút các linh hồn. Hai năm trước, mối liên hệ này đã khiến anh ta bị chấn thương tâm linh ở tay phải, và bạn của anh ta bị cuốn vào làn đạn. Sự kiện này khiến anh ấy trở thành một người khép kín, khiến anh ấy có các kỹ năng xã hội rất kém. May mắn thay, Keitarou đang dần bắt đầu hòa nhập với xã hội, nhờ sự giúp đỡ của người bạn thời thơ ấu, Eiko Houzuki. Là một phần trong quá trình phục hồi chức năng, Keitarou đảm nhận công việc bán thời gian của một gia sư riêng, và học trò đầu tiên của anh không ai khác chính là anh họ của Eiko, Yayoi Houzuki. Bên cạnh việc là một đứa trẻ thần đồng, còn có một điểm đặc biệt khác liên quan đến Yayoi—cô ấy có thể chất tâm linh, giống như Keitarou. Tuy nhiên, trái ngược với Keitarou, cô khao khát được chạm trán với các linh hồn, hy vọng tìm thấy hồn ma đã bắt mẹ cô đi. Khi Keitarou bị Yayoi và Eiko kéo đến những địa điểm bị ma ám, ', 'media/darkgather1.jpg','http://localhost/web-xem-phim/config/viewscreen.php?movie_id=29')" src="media/darkgather.jpg" alt="Thumbnail for Dark gathering" width="200" height="300">
                <p>Dark Gathering</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('God Father', 'Bố già', 'HD', 'T16', '1972', '1 tập', 'Bố già xoay quanh cuộc sống trong vòng 10 năm một gia đình tài phiệt mafia gốc Ý, nhà Corleone. Diễn biến của phim xoay quanh cuộc trả thù đẫm máu của Michael – người con trai cả của ông trùm Vito Corleone trong cuộc chiến báo thù cho cha sau khi ông trùm Vito bị ám sát.', 'media/godfather1.jpg', 'http://localhost/web-xem-phim/config/viewscreen.php?movie_id=31')" src="media/godfather.jpg" alt="Thumbnail for God Father" width="200" height="300">
                <p>Bố già</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('The Darknight', 'Kị sĩ bóng đêm', 'HD', 'T16', '2008', '1', 'Nội dung phim kể về siêu anh hùng nhưng thực chất là tái hiện lại cuộc chiến cam go giữa thiện và ác, giữa tội ác và công lý, giữa cái xấu xa và tàn bạo. Hai nhân vật trong phim hoàn toàn đối lập nhau, ở hai đầu chiến tuyến của chính và tà nhưng mang lại cho người xem nhiều trăn trở và những bài học đáng quý', './media/thedarknight1.jpg', 'http://localhost/web-xem-phim/config/viewscreen.php?movie_id=33')" src="./media/thedarknight.jpg" alt="Thumbnail for The Dark Knight" width="200" height="300">
                <p>Kị sĩ bóng đêm</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('12 Angry Man', '12 người đàn ông giận dữ', 'HD', 'T16', '1975', '1 tập', 'Phim được chuyển thể từ vở kịch cùng tên của Reginald Rose. Nội dung phim 12 người đàn ông giận dữ xoay quanh bồi thẩm đoàn gồm 12 người đàn ông đang bàn thảo về tội trạng của một thanh niên bị nghi ngờ giết cha ruột. Hầu hết diễn biến phim xoay quanh cuộc bàn luận này, trong phòng họp bồi thẩm và chỉ có 3 phút diễn ra ngoài căn phòng.', './media/12angryman1.jpg', 'http://localhost/web-xem-phim/config/viewscreen.php?movie_id=28')" src="./media/12 angry man.jpg" alt="Thumbnail for 12 Angry Men" width="200" height="300">
                <p>12 Người đàn ông giận dữ</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('The Lord Of The Rings: The return of the king', 'Chúa tể của những chiếc nhẫn: Sự trở lại của nhà vua', 'HD', 'T16', '2003', '1 tập', 'Nối tiếp nội dung 2 phần đầu, ở phần này, chúa tể hắc ám Sauron bao vây thành Gondor để giết chết những người sống tại đây. Trước tình thế đó, phải có một vị vua lên làm lãnh đạo. Aragorn có hoàn thành được trọng trách cao cả mà người dân của vương quốc đặt lên vai anh trong cuộc chiến chống lại thế lực hùng mạnh?', './media/lordring1.jpg', 'https://www.facebook.com')" src="./media/lordring.jpg" alt="Thumbnail for lordringlordring" width="200" height="300">
                <p>Chúa tể của những chiếc nhẫn</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Pulp Fiction', 'Chuyện tào lao', 'HD', 'T13', '1994', '1 tập', 'Nội dung phim xoay quanh những câu chuyện tào lao của các nhân vật như Pumpkin, Yolanda, bộ đôi Gangster Vincent Vega và Jules Winnfield… Mặc dù là những câu chuyện tào lao nhưng được đánh giá là không hề tào lao. Ẩn sau từng câu chuyện là những lời châm biếm sâu cay, chứa đựng tư tưởng sâu sắc và đầy ý nghĩa.', './media/pulpfiction1.jpg', 'http://localhost/web-xem-phim/config/viewscreen.php?movie_id=34')" src="./media/pulpfiction.jpg" alt="Thumbnail for pulpfiction width="200" height="300">
                <p>Chuyện tào lao</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Schindler’s list', 'Bản danh sách của Schindler', 'HD', 'T16', '1993', '11 tập', 'Bộ phim khoa học viễn tưởng về hành trình khám phá vũ trụ của các phi hành gia, những người đã tìm ra một hiện tượng kỳ lạ có thể thay đổi hiểu biết của nhân loại về không gian và thời gian.', './media/schidnler1.jpg', 'http://localhost/web-xem-phim/config/viewscreen.php?movie_id=35')" src="./media/schidnler.jpg" alt="Thumbnail for schidnler" width="200" height="300">
                <p>Danh sách của Schindler</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Interstellar', 'Hố Đen Tử Thần', 'HD', 'T13', '2025', '1 tập', 'Năm 2067, một chứng bệnh lạ xuất hiện đang dần giết chết các loại cây lương thực, những cơn bão cát xảy ra một cách triền miên, lượng oxy trong khí quyển giảm dần, những sự việc trên đẩy loài người đến bờ vực của sự diệt vong. Cooper, một nông dân góa vợ trước đây từng là kỹ sư và phi công của NASA, đang sống cùng với bố vợ Donald, con trai Tom 15 tuổi và con gái Murphy 10 tuổi. Murphy tin rằng, căn phòng của mình bị ám bởi một bóng ma đang cố gắng liên lạc với mình. Murphy và Cooper phát hiện ra rằng bóng ma đó là một dạng thông minh chưa được biết đến, đang cố gắng gửi các thông điệp cho mình thông qua sóng hấp dẫn, thể hiện bằng các vệt bụi kì lạ xuất hiện sau cơn bão cát. Các thông điệp này được trình bày bằng mã nhị phân, tiết lộ toạ độ của một căn cứ bí mật của NASA, hiện đang được dẫn dắt bởi Giáo sư Brand.', 'media/instellar1.jpg', 'http://localhost/web-xem-phim/config/viewscreen.php?movie_id=36')" src="media/instellar.jpg" alt="Thumbnail for Interstellar" width="200" height="300">
                <p>IInterstellar</p>
            </div>
        </div>
        <div class="category-title">
            <h1>Phim Đề Xuất</h1>
        </div>
        <div class="movie-carousel second-row">
            <div class="carousel-item">
                <img onclick="changeMovie('Inception', 'Kẻ cắp giấc mơ', 'HD', 'T13', '2010', '1 tập', 'Phim kể về lần hợp tác của một kẻ chuyên đi đánh cắp tin mật của người khác thông qua giấc mơ. Đó là Dom Cobb và Saito, một doanh nhân người Nhật trong một phi vụ xâm nhập vào giấc mơ của Robert Fischer.', './media/Inception1.jpg', 'https://example.com/nguoi-hung-tia-chop')" src="./media/inception.jpg" alt="Thumbnail for Inception" width="200" height="300">
                <p>Kẻ cắp giấc mơ</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Fight Club', 'Sàn đấu', 'HD', 'T16', '1999', '1 tập', 'Nhân vật chính và cũng là người kể chuyện của phim là Edward Norton, thanh tra bảo hiểm của một hãng sản xuất ô tô nổi tiếng và cũng là người mắc bệnh mất ngủ. Để thoát khỏi tình trạng này, anh thường xuyên giả vờ bị những căn bệnh khác nhau, tới các câu lạc bộ trợ giúp những người mắc bệnh hiểm nghèo để được lắng nghe, an ủi. Sau đó, anh sẽ về nhà và ngủ ngon lành. Thế nhưng, chuyện của anh bị một người đàn bà phát hiện, nên Edward Norton không thể tiếp tục', './media/fightclub1.jpg', 'https://example.com/bi-mat-cua-dai-duong')" src="./media/fightclub.jpg" alt="Thumbnail for fightclub" width="200" height="300">
                <p>Sàn đấu</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Lion King', 'Vua sư tử', 'HD', 'T0', '1994', '1 tập', 'Phim lấy bối cảnh thiên nhiên hoang dã của Phi châu, kể về chú sư tử con Simba, con trai của vị vua Mufasa đang thống trị thế giới hoang dã. Cuộc sống hạnh phúc, yên bình của Simba nhanh chóng chấm dứt khi người chú ruột lập mưu giết chết vua Mufasa rồi cướp ngôi. Sau khi Scar lên ngôi vua, cuộc sống ở thảo nguyên trở nên tồi tệ hết sức, không khí ảm đạm chết chóc', './media/lionking1.jpg', 'https://example.com/tieng-goi-tu-qua-khu')" src="./media/lionking.jpg" alt="Thumbnail for lionking" width="200" height="300">
                <p>Vua sư tử</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Forrest Gump', ' Cuộc đời Forrest Gump', 'HD', 'T13', '1994', '1 tập', 'CNội dung phim nói về cuộc đời của Forrest Gump, một người có chỉ số IQ là 75. Forrest bị thiểu năng trí tuệ và lưng không thẳng, phải giữ chân bằng khung sắt. Tuy vậy, mẹ cậu vẫn cho cậu học trong một trường học bình thường. Và ở ngôi trường này, Forrest thường bị mọi người chọc phá. Người bạn duy nhất của Forrest là Jenny – một cô bé có tuổi thơ bất hạnh', './media/forrestgump1.jpg', 'https://example.com/thanh-pho-mong-mo')" src="./media/forrestgump.jpg" alt="Thumbnail for Forrestgump" width="200" height="300">
                <p>Cuộc đời Forrest Gump</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Matrix', 'Ma trận', 'HD', 'T16', '1999', '1 tập', 'Ma trận xoay quanh lập trình viên Thomas A. Anderson (Keanu Reeves). Anh làm việc trong một công ty phần mềm và còn là một hacker với biệt danh Neo. Neo gặp gỡ một nhóm hacker bí ẩn. Họ thường giới thiệu với anh về thuật ngữ “ma trận”. Sau đó, Neo bị một nhóm đặc vụ bắt giữ. Họ muốn anh giúp chúng bắt Morpheus (Laurence Fishburne) – người đứng đầu của ma trận, người mà chúng cho là “kẻ khủng bố”', './media/matrix1.jpg', 'https://example.com/cuoc-song-tham-lang')" src="./media/matrix.jpg" alt="Thumbnail for matrix" width="200" height="300">
                <p>Ma trận</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Chainsaw Man', 'Người cưa', 'HD', 'T16', '2023', '12 tập', 'Denji là một cậu trai trẻ sống trong cảnh nghèo đói, phải làm thợ săn quỷ để kiếm tiền trả khoản nợ mà người cha đã mất của cậu vay đám yakuza. Cậu nuôi Pochita, một con quỷ có hình dạng giống chó. Bị tên yakuza phục kích, Denji biến thành một sinh vật nửa người nửa quỷ nhờ lập khế ước với Pochita, với điều kiện cậu phải cho Pochita thấy những ước mơ của mình. Denji gặp Makima, một nhân vật cấp cao đến từ Sở Trị An. Được cô thuyết phục gia nhập hàng ngũ thợ săn quỷ, Denji đồng ý và trở thành bạn đồng hành với Aki và Power, một quỷ nhân. Makima hứa với Denji sẽ thực hiện bất kì mong muốn nào của cậu nếu cậu giết được Quỷ Súng, thủ phạm của vụ thảm sát khủng khiếp nhất trong lịch sử nhân loại', './media/chainsaw1.jpg', 'https://example.com/san-tim-bau-vat')" src="./media/chainsawman.jpg" alt="Thumbnail for chainsawman" width="200" height="300">
                <p>Người cưa</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('S7ven', 'Thất hình đại tội', 'HD', 'T18', '1995', '1 tập', 'Bảy tội lỗi chết người kể về hành trình điều tra một vụ án giết người hàng loạt của hai thám tử. Đó là David Mills (Brad Pitt) – một người non trẻ, ít kinh nghiệm và William Somerset (Morgan Freeman) – một thám tử sắp nghỉ hưu.', './media/se7en1.jpg', 'https://example.com/hon-ma-hoc-duong')" src="./media/s7ven.jpg" alt="Thumbnail for s7ven" width="200" height="300">
                <p>Thất hình đại tội</p>
            </div>
            <div class="carousel-item">
                <img onclick="changeMovie('Saving Private Ryan', ' Giải cứu binh nhì Ryan', 'HD', 'T13', '1998', '1 tập', 'Đội của Miller không biết Ryan nhảy dù lạc ở đâu. Vì thế công cuộc tìm kiếm không hề đơn giản. Sau khi trải qua nhiều khó khăn, nguy hiểm, cả đội cũng tìm thấy Ryan. Thế nhưng Ryan vẫn không chịu quay về, vì không muốn bỏ những đồng đội khác. Miller cùng đội của mình quyết định ở lại giúp đội của Ryan. Và tất cả họ đã trải qua một cuộc chiến vô cùng khốc liệt', './media/savingryan1.jpg', 'https://example.com/nhat-ky-tuoi-hong')" src="./media/SavingPrivateRyan.jpg" alt="Thumbnail for savingryan" width="200" height="300">
                <p> Giải cứu binh nhì Ryan</p>
            </div>
            
       
<ul class="example-2">
<li class="icon-content">
    <a href="https://github.com/TranHuynhGiaNguyen/Web-xem-phim" aria-label="GitHub" data-social="github" target="_blank">
        <div class="filled"></div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16" xml:space="preserve">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" fill="currentColor"></path>
        </svg>
    </a>
    <div class="tooltip">GitHub</div>
</li>
</ul>

        </div>
        <script>
        function changeMovie(title, subtitle, quality, rating, year, episodes, description, imageSrc, link) {
        const container = document.querySelector('.movie-container');
    // Thêm class changing để kích hoạt animation
        container.classList.add('changing');
        window.scrollTo({
        top: 0,
        behavior: 'smooth'
        });
    // Đợi một chút trước khi thay đổi nội dung
    setTimeout(() => {
        document.getElementById('movie-title').textContent = title;
        document.getElementById('movie-subtitle').textContent = subtitle;
        document.getElementById('movie-quality').textContent = quality;
        document.getElementById('movie-rating').textContent = rating;
        document.getElementById('movie-year').textContent = year;
        document.getElementById('movie-episodes').textContent = episodes;
        document.getElementById('movie-description').textContent = description;
        document.getElementById('main-image').src = imageSrc;
        document.getElementById('watch-now-button').href = link;
        container.classList.remove('changing');}, 300);
                
                // Cập nhật href của nút "Xem ngay"
                
            }
function changeImage(imageUrl) {
    const mainImage = document.getElementById('main-image');
    mainImage.classList.remove('animate-fade');
    void mainImage.offsetWidth;
    mainImage.src = imageUrl;
    mainImage.alt = 'Main characters of the show';
    mainImage.classList.add('animate-fade');
}
</script>
</body>

</html>