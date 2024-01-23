<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEOW NOVEL</title>
    <link rel="stylesheet" href="/public/css/gioithieu.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/nav.css">
    <link rel="stylesheet" href="/public/css/giohangdungchung.css">
    <link rel="stylesheet" href="/public/css/article.css">

    <script src="/public/js/topnew.js"></script>
</head>

<body>
    <!-- Header  -->
    <?php include "../layout/header.php"; ?>
    <!-- End Header  -->



    </div>
    <div class="baomuc">
        <div class="muc">
            <h3>GIỚI THIỆU</h3>
            <p>MEOW NOVEL shop là 1 đơn vị bán hàng mới được thành lập trong năm 2023 ở thành phố Đà Nẵng.
                Shop chuyên bán các tựa sách truyện dành cho nhiều lứa tuổi. Đảm bảo uy tín chất lượng khi trải
                nghiệm.</p>
        </div>
        <div class="muc">
            <h3>SỨ MỆNH</h3>
            <p>Mang các tác phẩm giá trị với chất lượng cao nhằm góp phần đáp ứng nhu cầu hưởng thụ văn hóa ngày
                càng cao của độc giả cả nước, góp phần xây dựng và phát triển một nền văn hóa đọc lành mạnh, phong
                phú và tiên tiến.</p>
        </div>
        <div class="muc">
            <h3>GIÁ TRỊ CỐT LÕI</h3>
            <p>Xây dựng, phát triển mô hình kinh doanh bền vững trên nền tảng đảm bảo phục vụ tốt nhất các quyền lợi
                của khách hàng, nhân viên.</p>
        </div>
        <div class="muc">
            <h3>ĐÔI LỜI TỪ ADMIN </h3>
            <p>Ừ thì code cái web này cũng có bán hàng gì đâu :D</p>
            <P>Tất cả vì một bài asm điểm 10 :3</P>
            <p>Nhớ cho bài này 10 điểm nhá :3</p>
        </div>
        <div class="muc">
            <h3>GIỚI THIỆU VỀ LIGHTNOVEL</h3>
            <iframe class="youtube" width="500" height="285" src="https://www.youtube.com/embed/B69Gn3HK3-8"
                title="Sự Thật về Light Novel" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
            <iframe width="500" height="285" src="https://www.youtube.com/embed/DAeDa1mXntA"
                title="Nghề Vẽ Manga có NHÀN Như Bạn Tưởng ???" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>
    </div>



    <!-- gio hang -->
    <div id="storeee">
        <div id="sto-thongtinchitiet"></div>
        <div id="sto-trong"></div>
        <div id="sto-tong">
            <h4>TỔNG TIỀN:</h4>
            <div id="tong-tien">0₫</div>
        </div>
        <div id="sto-thaotac">
            <a href="./giohang.php"><button id="thaotac-01">XEM GIỎ HÀNG</button></a>
            <button id="thaotac-02">THANH TOÁN</button>
        </div>
    </div>


    </article>
    <aside></aside>
    <footer>
        <div class="foo-lh">
            <div class="foo-01">
                <img src="/public/images/Logo/cat.jpg" alt="" width="70px">
                <p>MEOW NOVEL</p>
            </div>
            <div class="thongtinfoo">
                <p>Địa chỉ: 9 Hà Văn Tính, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng</p>
                <p>Email: tubanovel@gmail.com</p>
                <p>SDT: 0343561287</p>
                <p>Fb: facebook.com/sonthichnovel</p>
            </div>
        </div>
        <div class="foo-nhantt">
            <h4>ĐĂNG KÝ NHẬN TIN</h4>
            <p>Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận được tất cả các tin tức mới nhất của MEOW
                NOVEL về các sản phẩm mới, các chương trình khuyến mãi mới. MEOW NOVEL xin đảm bảo sẽ không gửi mail
                rác, mail spam tới bạn.</p>
            <form>
                <label>
                    <input type="text" placeholder="Nhập email của bạn tại đây...">
                    <button type="submit">Gửi</button>
                </label>
            </form>
        </div>
        <div id="backtop">
            <img src="/public/images/Logo/fighter2.png" width="">
        </div>

    </footer>
</body>

</html>
<script src="/public/js/giohangdungchung.js"></script>


<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#backtop').fadeIn();
        } else {
            $('#backtop').fadeOut();
        }
    });
    $('#backtop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });
});
</script>