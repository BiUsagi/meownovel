<?php
require "views/layout/header.php";
require "vendor/autoload.php";
use models\TaiKhoan;
use models\GioHang;
use models\SanPham;

$MaDH = $_GET['madh'];
$user = TaiKhoan::LayThongTinTheoTen($_SESSION['user']);
extract($user);
if ($HinhAnh == Null) {
    $HinhAnh = "public/images/cat.jpg";
}

if (!isset($chitietdh)) {
    $chitietdh = GioHang::LayThongTinChiTietDH($MaDH);
}

if (!isset($donhang)) {
    $donhang = GioHang::LayThongTinDonHangTheoMaDH($MaDH);
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
                                class="fa-solid fa-user "></i>
                            Thông tin tài khoản</a></p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=sua"><i
                                class="fa-solid fa-pen"></i>
                            Sửa hồ
                            sơ</a></p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=doimk"><i
                                class="fa-solid fa-lock "></i>
                            Thay đổi mật khẩu</a>
                    </p>
                    <p class="mg-top-sb"><a href="index.php?controller=taikhoan&action=lichsumuahang"
                            class="activetk"><i class="fa-solid fa-clock-rotate-left "></i>
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
                    <p>Lịch sử mua hàng</p>
                    Mọi giao dịch của bạn đều có ở đây
                </div>
                <!-- lich su -->
                <div class="col-12 row">
                    <div class="boxmain col-12 ">
                        <h3 class="col-12">Thông Tin Thanh Toán</h3>
                        <div class="thongtin col-12 row">
                            <div class="form-group col-6">
                                <label class="control-label">Tên người nhận hàng: </label>
                                <input class="form-control" type="text" name="hoten"
                                    value="<?= $donhang[0]['TenNN']; ?>" readonly>
                            </div>

                            <div class="form-group col-6">
                                <label class="control-label">Số điện thoại: </label>
                                <input class="form-control" type="text" name="sodienthoai"
                                    value="<?= $donhang[0]['SoDT']; ?>" readonly>
                            </div>

                            <div class="form-group col-12">
                                <label class="control-label">Địa chỉ: </label>
                                <input class="form-control" type="text" name="diachi"
                                    value="<?= $donhang[0]['DiaChi']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="giohangmain boxmain col-12">
                        <h3>Sản Phẩm</h3>
                        <div class="gh-chitietgh row">
                            <div class="col-1"></div>
                            <div class="gh-tensp col-6">Tên sản phẩm</div>
                            <div class="gh-soluong col-2">Số lượng</div>
                            <div class="gh-giatien col-3">Giá tiền</div>
                        </div>
                        <?php
                        $TongTien = 0;
                        for ($i = 0; $i < count($chitietdh); $i++) {
                            $sanpham = SanPham::GetById($chitietdh[$i]['MaSP']);
                            ?>
                            <div class="ds-sp row ">
                                <!-- Hình ảnh -->
                                <div class="sto-anh-thanhtoan col-1"><img src="admin/<?= $sanpham->HinhAnh; ?>" alt="">
                                </div>
                                <!-- Tên sản phẩm -->
                                <div class="sto-ten col-6 d-flex align-items-center">
                                    <?= $sanpham->TenSP; ?>
                                </div>
                                <!-- Số lượng -->
                                <div class="sto-sl col-2 d-flex align-items-center justify-content-center">
                                    <?= $chitietdh[$i]['SoLuong']; ?>
                                </div>
                                <!-- Giá Tiền -->
                                <div class="sto-gia col-3 d-flex justify-content-center align-items-center">
                                    <?= number_format(($sanpham->GiaTien * $chitietdh[$i]['SoLuong']), 0, ',', '.'); ?> ₫
                                </div>
                            </div>
                            <?php
                            $TongTien = $TongTien + ($sanpham->GiaTien * $chitietdh[$i]['SoLuong']);
                        }
                        ?>

                    </div>


                    <div class="boxmain col-12 row giohangmain">
                        <div class="col-6">
                            <h3>Phương Thức Thanh Toán</h3>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-4 d-flex align-items-center">Thanh toán khi nhận hàng</div>
                        <div class="gh-tong row col-12">
                            <div class="col-8"></div>
                            <h4 class="col-2">Tổng cộng</h4>
                            <div class="tong-tien col-2">
                                <?= number_format($TongTien, 0, ',', '.'); ?> ₫
                            </div>
                        </div>
                    </div>
                </div>
                <!-- lich su -->

            </div>
        </div>
        <!-- END main -->
    </div>
</div>
<?php require "views/layout/footer.php"; ?>