<?php
require "views/layout/header.php";
require "vendor/autoload.php";
use models\TaiKhoan;

$user = TaiKhoan::LayThongTinTheoTen($_SESSION['user']);
extract($user);
if ($HinhAnh == Null) {
    $HinhAnh = "public/images/cat.jpg";
}
?>



<div class="container ctiet-main">
    <div class="row">
        <!-- sidebar -->
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <div class="row ctiet-top">
                        <div class="col-3"><img src="<?= $HinhAnh; ?>" alt="" class="ctiet-imguser">
                        </div>
                        <div class="col-9 d-flex align-items-center">
                            <?= $TenKH; ?> <br>
                            <?= $quanLy == 1 ? "ADMIN" : "Người dùng"; ?>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=thongtin"><i
                                class="fa-solid fa-user"></i>
                            Thông tin tài khoản</a></p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=sua" class="activetk"><i
                                class="fa-solid fa-pen"></i>
                            Sửa hồ
                            sơ</a></p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=doimk"><i
                                class="fa-solid fa-lock "></i>
                            Thay đổi mật khẩu</a>
                    </p>
                    <p class="mg-top-sb"><a href="index.php?tkh=congthucdamua"><i
                                class="fa-solid fa-clock-rotate-left "></i> Lịch sử đơn hàng </a></p>

                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=logout"><i
                                class="fa-solid fa-right-from-bracket "></i> Đăng xuất</a></p>
                </div>
            </div>
        </div>
        <!-- END sidebar -->


        <!-- main -->
        <div class="col-9 bd-left ctiet-thongtin">
            <div class="row">
                <div class="col-12 ctiet-title">
                    <p>HỒ SƠ CỦA TÔI</p>
                    Quản lý thông tin hồ sơ để bảo mật tài khoản
                </div>
                <!-- thongtin -->
                <form action="index.php?controller=taikhoan&action=edit" method="post" enctype="multipart/form-data"
                    class="row">
                    <div class="col-8">
                        <div class="mg-top row ctiet-center1">
                            <label for="id" class="col-4 justify-content-end d-flex">Mã tài khoản:</label>
                            <input type="id" class="col-8 ctiet-input" name="id" value="<?= $MaKH; ?>" readonly>
                        </div>
                        <div class="mg-top row ">
                            <label for="hoten" class="col-4 justify-content-end d-flex">Tên:</label>
                            <input type="hoten" class="col-8 ctiet-input" name="hoten" value="<?= $TenKH; ?>">
                        </div>
                        <div class="mg-top row">
                            <label for="email" class=" col-4 justify-content-end d-flex">Email:</label>
                            <input type="email" class="col-8 ctiet-input" name="email" placeholder="Email"
                                value="<?= $Email ?>">
                        </div>
                    </div>
                    <!-- END thong tin -->

                    <!-- avata -->
                    <div class="col-4  row">
                        <div class="col-12 mg-top">Hình ảnh cá nhân:</div>
                        <div class="col-12 d-flex  justify-content-center">
                            <img src="<?= $HinhAnh; ?>" alt="" class="ctiet-imguserbig" id="previewImg">
                        </div>
                        <div class="col-12 justify-content-center">
                            <label for="hinh" class="custom-file-upload ">
                                <input type="file" name="hinhanh" id="hinh" onchange="previewImage(event)">
                                Chọn ảnh
                            </label>
                        </div>
                    </div>
                    <!-- END avata -->

                    <div class="row">
                        <div class="col-12">

                            <div class="col-9">
                                <div class="mg-top">
                                    <input type="submit" name="update-infor" class="product__price-ranger-filter"
                                        value="Lưu">
                                </div>
                            </div>
                            <p class="col-md-12 mt-3 text-center" style="color: red;">
                                <?php
                                if (isset($thongBao))
                                    echo $thongBao; ?>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END main -->
    </div>
</div>
<?php require "views/layout/footer.php"; ?>

<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('previewImg');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>