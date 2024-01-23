<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEOW NOVEL</title>
    <link rel="stylesheet" href="/public/css/giohang.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/nav.css">
    <link rel="stylesheet" href="/public/css/article.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="/public/js/topnew.js"></script>

</head>

<body>
    <!-- Header  -->
    <?php include "../layout/header.php"; ?>
    <!-- End Header  -->

    <div id="giohangmain">
        <h3>GIỎ HÀNG</h3>
        <div class="gh-chitietgh">
            <div class="gh-tensp">Tên sản phẩm</div>
            <div class="gh-soluong">Số lượng</div>
            <div class="gh-giatien">Giá tiền</div>
        </div>
        <div id="sto-thongtinchitiet"></div>
        <div id="gh-tong">
            <h4>Tổng cộng</h4>
            <div id="tong-tien">0₫</div>
        </div>
        <button id="gh-capnhat" onclick="updategh()">CẬP NHẬT</button>
        <button id="gh-thanhtoan">THANH TOÁN</button>
    </div>

    <div style="clear: both;"></div>
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

<script src="/public/js/giohang.js"></script>
<script src="/public/js/store.js"></script>

<script>
showghmain();
</script>

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