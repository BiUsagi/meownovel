<!-- Header  -->
<?php
include "views/layout/header.php";
require "vendor/autoload.php";

use models\SanPham;
use models\GioHang;

if (!isset($giohang)) {
    $TenKH = $_SESSION['user'];
    $giohang = GioHang::LayGioHangTheoKH($TenKH);
}
?>
<!-- End Header  -->

<div class="giohangmain">
    <h3>GIỎ HÀNG</h3>
    <div class="gh-chitietgh row">
        <div class="col-2"></div>
        <div class="gh-tensp col-4">Tên sản phẩm</div>
        <div class="gh-soluong col-2">Số lượng</div>
        <div class="gh-giatien col-2">Giá tiền</div>
        <div class="gh-thaotac col-2">Hành Động</div>
    </div>
    <?php
    $TongTien = 0;
    for ($i = 0; $i < count($giohang); $i++) {
        $sanpham = SanPham::GetById($giohang[$i]['MaSP']);
        ?>
    <div class="ds-sp row ">
        <!-- Hình ảnh -->
        <div class="sto-anh col-2"><img src="admin/<?= $sanpham->HinhAnh; ?>" alt=""></div>
        <!-- Tên sản phẩm -->
        <div class="sto-ten col-4 d-flex align-items-center">
            <?= $sanpham->TenSP; ?>
        </div>
        <!-- Số lượng -->
        <form action="index.php?controller=giohang&action=edit&magh=<?= $giohang[$i]['MaGH']; ?>" method="post"
            class="col-2 d-flex justify-content-center align-items-center">
            <input type="hidden" name="masp" value="<?= $giohang[$i]['MaSP']; ?>">
            <input type="number" class="sto-sl" name="soLuong" max="<?= $sanpham->SoLuong; ?>" min="1"
                value="<?= $giohang[$i]['SoLuong']; ?>" data-initial="<?= $giohang[$i]['SoLuong']; ?>">
            <button type="submit" class="btn btn-primary btn-sm edit luuBtn" style="display: none;"><i
                    class="fas fa-edit"></i>Lưu</button>
        </form>
        <!-- Giá Tiền -->
        <div class="sto-gia col-2 d-flex justify-content-center align-items-center">
            <?= number_format(($sanpham->GiaTien * $giohang[$i]['SoLuong']), 0, ',', '.'); ?> ₫
        </div>
        <!-- Xóa sản phẩm -->
        <div class="col-2  d-flex justify-content-center align-items-center">
            <button class="trash btn" type="button" title="Xóa" data-id="<?= $giohang[$i]['MaGH']; ?>">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
    <?php
        $TongTien = $TongTien + ($sanpham->GiaTien * $giohang[$i]['SoLuong']);
    }
    ?>
    <div class="gh-tong row">
        <div class="col-6"></div>
        <h4 class="col-2">Tổng cộng</h4>
        <div class="tong-tien col-2">
            <?= number_format($TongTien, 0, ',', '.'); ?> ₫
        </div>
        <button class="gh-thanhtoan col-2">THANH TOÁN</button>
    </div>

</div>

<!-- footer  -->
<?php include "views/layout/footer.php"; ?>
<!-- End footer  -->

<script src="public/js/store.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
jQuery(function() {
    jQuery(".trash").click(function() {
        var GioHang = jQuery(this).data('id');

        Swal.fire({
            title: "Cảnh báo",
            text: "Bạn có chắc chắn muốn xóa sản phẩm này?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Hủy bỏ",
        }).then((result) => {
            if (result.isConfirmed) {
                // Gửi yêu cầu xóa sản phẩm
                jQuery.ajax({
                    type: "POST",
                    url: "index.php?controller=giohang&action=delete",
                    data: JSON.stringify({
                        GioHang: GioHang
                    }),
                    contentType: 'application/json',
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                title: "Đã xóa thành công!",
                                icon: "success",
                            }).then(() => {
                                // Reload trang sau khi xóa
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Xóa thất bại!",
                                icon: "error",
                            });
                        }
                    }
                });
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    // Sự kiện khi giá trị số lượng thay đổi
    $(".sto-sl").on("input", function() {
        // Lấy giá trị ban đầu từ data-attribute
        var initialQuantity = $(this).data("initial");
        // Hiển thị hoặc ẩn nút "Lưu" tùy thuộc vào giá trị của ô input
        if ($(this).val() !== initialQuantity.toString()) {
            $(this).siblings(".luuBtn").show();
        } else {
            $(this).siblings(".luuBtn").hide();
        }
    });
});
$(".luuBtn").hide();
</script>