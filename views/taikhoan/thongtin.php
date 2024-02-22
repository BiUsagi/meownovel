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
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=thongtin" class="activetk"><i
                                class="fa-solid fa-user redtk"></i>
                            Thông tin tài khoản</a></p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=sua"><i
                                class="fa-solid fa-pen"></i>
                            Sửa hồ
                            sơ</a></p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=doimk"><i
                                class="fa-solid fa-lock "></i>
                            Thay đổi mật khẩu</a>
                    </p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=lichsumuahang"><i
                                class="fa-solid fa-clock-rotate-left "></i>
                            Lịch sử mua hàng </a></p>

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
                <div class="col-8 ctiet-center">
                    <div class="row">
                        <div class="col-4 justify-content-end d-flex mg-top">Tên:</div>
                        <div class="col-8 mg-top">
                            <?= $TenKH; ?>
                        </div>
                        <div class="col-4 justify-content-end d-flex mg-top">Email:</div>
                        <div class="col-8 mg-top">
                            <?= $Email; ?>
                        </div>
                        <div class="col-4 justify-content-end d-flex mg-top">Ngày tham gia:</div>
                        <div class="col-8 mg-top">
                            <?= $NgayDK; ?>
                        </div>
                    </div>
                </div>
                <!-- END thong tin -->

                <!-- avata -->
                <div class="col-4 row">
                    <div class="col-12 mg-top">Hình ảnh cá nhân:</div>
                    <div class="col-12 d-flex justify-content-center">
                        <img src="<?= $HinhAnh; ?>" alt="" class="ctiet-imguserbig">
                    </div>
                </div>
                <!-- END avata -->
            </div>
        </div>
        <!-- END main -->
    </div>
</div>
<?php require "views/layout/footer.php"; ?>