</body>
<footer id="sanpham3">
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

</html>

<script src="/public/js/giohangdungchung.js"></script>
<script src="/public/js/topnew.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop()) {
                $('#backtop').fadeIn();
            } else {
                $('#backtop').fadeOut();
            }
        });
        $('#backtop').click(function () {
            $('html, body').animate({
                scrollTop: 0
            }, 1000);
        });
    });
</script>