<!-- Header  -->
<?php include "views/layout/header.php"; ?>
<!-- End Header  -->

<form action="index.php?controller=taikhoan&action=create" method="post" name="myform" class="custom-form-register">
    <div class="custom-container-register">
        <h1>ĐĂNG KÝ</h1>
        <hr>
        <div class="custom-boc-tt-register">
            <label for="tentk"><b>Tên Tài Khoản</b></label>
            <input type="text" placeholder="Nhập tên tài khoản" name="tentk" id="tentk">
            <label for="matkhau"><b>Mật Khẩu</b></label>
            <input type="password" placeholder="Nhập Mật Khẩu" name="matkhau" id="matkhau">
            <label for="nhaplai"><b>Nhập Lại Mật Khẩu</b></label>
            <input type="password" placeholder="Nhập Lại Mật Khẩu" name="nhaplai" id="nhaplai">
            <div id="custom-checkform-register"></div>
            <?php
            if (isset($thongBao)) { ?>
                <p style="color: red; text-align: center;">
                    <?= $thongBao; ?>
                </p>
            <?php } ?>

            <div class="clearfix">
                <button type="submit" class="signupbtn" id="signupbtn">Đăng Ký</button>
            </div>
        </div>
    </div>
    <p class="login">Nếu bạn đã có tài khoản, hãy chọn <a href="index.php?controller=taikhoan&action=dangnhap">Đăng
            nhập.</a></p>
</form>



<!-- footer  -->
<?php include "views/layout/footer.php"; ?>
<!-- End footer  -->