<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEOW NOVEL</title>
    <link rel="stylesheet" href="/public/css/dangnhap.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/nav.css">
    <link rel="stylesheet" href="/public/css/giohangdungchung.css">
    <link rel="stylesheet" href="/public/css/article.css">

    <script src="/public/js/formdk.js"></script>
    <script src="/public/js/topnew.js"></script>
</head>

<body>
    <!-- Header  -->
    <?php include "../layout/header.php"; ?>
    <!-- End Header  -->

    <form action="dangnhap.php" onsubmit="return chekform()" method="get" name="myform">
        <div class="container">
            <h1>ĐĂNG KÝ</h1>
            <hr>
            <div class="boc-tt">
                <label for="tentk"><b>Tên Tài Khoản</b></label>
                <input type="text" placeholder="Đây sẽ là tên đang nhập của bạn" name="tentk" id="tentk">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Nhập Email" name="email" id="email">
                <label for="matkhau"><b>Mật Khẩu</b></label>
                <input type="password" placeholder="Nhập Mật Khẩu" name="matkhau" id="matkhau">
                <label for="nhaplai"><b>Nhập Lại Mật Khẩu</b></label>
                <input type="password" placeholder="Nhập Lại Mật Khẩu" name="nhaplai" id="nhaplai">
                <div id="checkform"></div>
                <div class="clearfix">
                    <button type="submit" class="signupbtn" id="signupbtn">Đăng Ký</button>
                </div>
            </div>
        </div>
        <p class="login">Nếu bạn đã có tài khoản, hãy chọn <a href="./dangnhap.php">Đăng nhập.</a></p>
    </form>

    <!-- gio hang -->
    <div id="storeee">
        <div id="sto-thongtinchitiet"></div>
        <div id="sto-trong"></div>
        <div id="sto-tong">
            <h4>TỔNG TIỀN:</h4>
            <div id="tong-tien">0₫</div>
        </div>
        <div id="sto-thaotac">
            <a href="./giohang.php"><button id="thaotac-01">XEM GIỎ
                    HÀNG</button></a>
            <button id="thaotac-02">THANH TOÁN</button>
        </div>
    </div>

    </article>
    <aside></aside>
    <footer>
        <div class="foo-lh">
            <div class="foo-01">
                <img src="/public/images/Logo/cat.jpg" alt width="70px">
                <p>MEOW NOVEL</p>
            </div>
            <div class="thongtinfoo">
                <p>Địa chỉ: 9 Hà Văn Tính, Hòa Khánh Nam, Liên Chiểu, Đà
                    Nẵng</p>
                <p>Email: tubanovel@gmail.com</p>
                <p>SDT: 0343561287</p>
                <p>Fb: facebook.com/sonthichnovel</p>
            </div>
        </div>
        <div class="foo-nhantt">
            <h4>ĐĂNG KÝ NHẬN TIN</h4>
            <p>Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận
                được tất cả các tin tức mới nhất của MEOW NOVEL về các sản
                phẩm mới, các chương trình khuyến mãi mới. MEOW NOVEL xin
                đảm bảo sẽ không gửi mail rác, mail spam tới bạn.</p>
            <form>
                <label>
                    <input type="text" placeholder="Nhập email của bạn tại đây...">
                    <button type="submit">Gửi</button>
                </label>
            </form>
        </div>
        <div id="backtop">
            <img src="/public/images/Logo/fighter2.png" width>
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