<!-- Header  -->
<?php include "views/layout/header.php"; ?>
<!-- End Header  -->

<form action="index.php?controller=taikhoan&action=login" name="myform" method="post" class="custom-form">
    <div class="custom-container">
        <h1>ĐĂNG NHẬP</h1>
        <hr>
        <div class="custom-boc-tt">
            <label for="tentk"><b>Tên Tài Khoản</b></label>
            <input type="text" placeholder="Nhập tên tài khoản" id="tentk" name="tentk">
            <label for="matkhau"><b>Mật Khẩu</b></label>
            <input type="password" placeholder="Nhập Mật Khẩu" id="matkhau" name="matkhau">
            <!-- <input type="checkbox" checked="checked" <?php //echo isset($_COOKIE['ghinho_tentk']) ? 'checked' : '';  ?>
                name="ghinho" style="margin-bottom:15px"> Nhớ Đăng Nhập -->
            <?php
            if (isset($thongBao)) { ?>
            <p style="color: red; text-align: center;">
                <?= $thongBao; ?>
            </p>
            <?php } ?>
            <div class="clearfix">
                <button type="submit" class="signupbtn">Đăng Nhập</button>
            </div>
        </div>
    </div>
    <p>Nếu bạn chưa có tài khoản, hãy chọn <a href="index.php?controller=taikhoan&action=dangky">Đăng ký.</a></p>
</form>



<!-- footer  -->
<?php include "views/layout/footer.php"; ?>
<!-- End footer  -->

<script>
function checkForm() {
    var tentk = document.getElementById('tentk').value;

    var ghinhoCheckbox = document.getElementsByName('ghinho')[0];
    var isChecked = ghinhoCheckbox.checked;

    if (isChecked) {
        document.cookie = "ghinho_tentk=" + tentk + "; expires=Thu, 01 Jan 2030 00:00:00 UTC; path=/;";
    } else {
        document.cookie = "ghinho_tentk=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
    return true;
}
</script>