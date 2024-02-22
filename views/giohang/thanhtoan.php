<!-- Header -->
<?php
require "views/layout/header.php";
require "vendor/autoload.php";

use models\SanPham;
use models\GioHang;

if (!isset($giohang)) {
    $TenKH = $_SESSION['user'];
    $giohang = GioHang::LayGioHangTheoKH($TenKH);
}

?>

<!-- Form thanh toán -->
<form action="index.php?controller=giohang&action=thucthithanhtoan" method="post" class="container thanhtoan">
    <div class="row">
        <div class="xBNaac"></div>
        <div class="boxmain col-12 ">
            <h3 class="col-12">Thông Tin Thanh Toán</h3>
            <div class="thongtin col-12 row">
                <div class="form-group col-4">
                    <label class="control-label">Tên người nhận hàng: </label>
                    <input class="form-control" type="text" name="hoten">
                </div>

                <div class="form-group col-4">
                    <label class="control-label">Số điện thoại: </label>
                    <input class="form-control" type="text" name="sodienthoai">
                </div>

                <div class="form-group col-4">
                    <label class="control-label">Địa chỉ: </label>
                    <input class="form-control" type="text" name="diachi">
                </div>
                <p class="col-md-12 mt-3 text-center" style="color: red;">
                    <?php
                    if (isset($thongBao))
                        echo $thongBao; ?>
                </p>
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
            for ($i = 0; $i < count($giohang); $i++) {
                $sanpham = SanPham::GetById($giohang[$i]['MaSP']);
                ?>
            <div class="ds-sp row ">
                <!-- Hình ảnh -->
                <div class="sto-anh-thanhtoan col-1"><img src="admin/<?= $sanpham->HinhAnh; ?>" alt=""></div>
                <!-- Tên sản phẩm -->
                <div class="sto-ten col-6 d-flex align-items-center">
                    <?= $sanpham->TenSP; ?>
                </div>
                <!-- Số lượng -->
                <div class="sto-sl col-2 d-flex align-items-center justify-content-center">
                    <?= $giohang[$i]['SoLuong']; ?>
                </div>
                <!-- Giá Tiền -->
                <div class="sto-gia col-3 d-flex justify-content-center align-items-center">
                    <?= number_format(($sanpham->GiaTien * $giohang[$i]['SoLuong']), 0, ',', '.'); ?> ₫
                </div>
            </div>
            <?php
                $TongTien = $TongTien + ($sanpham->GiaTien * $giohang[$i]['SoLuong']);
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
                <input type="hidden" name="tongtien" value="<?= $TongTien; ?>">
                <button type="submit" name="thanhtoan" class="gh-thanhtoan col-12">ĐẶT HÀNG</button>
            </div>
        </div>
    </div>
</form>

<!-- Footer -->
<?php require "views/layout/footer.php"; ?>