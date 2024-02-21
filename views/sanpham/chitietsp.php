<?php
require "views/layout/header.php";
require "vendor/autoload.php";


use models\SanPham;

if (isset($_GET['id'])) {
    $sanpham = SanPham::GetById($_GET['id']);
}

?>


<div class="container ">
    <div class="row">
        <a href="index.php?controller=sanpham&action=index"
            class="sp-bt d-flex justify-content-center align-items-center"><i
                class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 fa-xl"></i></a>
        <div class="col-1"></div>
        <div class="col-4">
            <img src="admin/<?= $sanpham->HinhAnh; ?>" alt id="anhsp">
        </div>
        <div class="col-5">
            <h3 id="tensp1">
                <?= $sanpham->TenSP; ?>
            </h3>
            <div id="giasp">
                <?= number_format($sanpham->GiaTien, 0, ',', '.'); ?> ₫
            </div>
            <div class="row">
                <div class="boiden col-6">
                    <h4>Nhà xuất bản</h4>
                    <h4>Kích thước</h4>
                    <h4>Nội dung:</h4>
                </div>
                <div class="nonden col-6">
                    <p>
                        <?= $sanpham->NhaXB; ?>
                    </p>
                    <p>13cm x 17cm</p>
                </div>

            </div>
            <div class="col-12" id="noi-dung">
                <?= $sanpham->MoTa; ?>
            </div>

            <form method="post" action="index.php?controller=giohang&action=themmoi" class="row">
                <input type="hidden" name="maSanPham" value="<?= $sanpham->MaSP; ?>">
                <div id="soluong-sp" class="col-5">
                    <label for="soluongsp"></label>
                    <input type="button" value="-" id="trusl" onclick="tru()">
                    <input type="text" name="soluongsp" id="soluongsp" value="1" min="1"
                        max="<?= $sanpham->SoLuong; ?>">
                    <input type="button" value="+" id="congsl" onclick="cong()">
                </div>
                <div class="col-1"></div>

                <button type="submit" name="themVaoGioHang" id="themgh" class="col-5">THÊM VÀO GIỎ
                    HÀNG<i class="fa-solid fa-cart-arrow-down fa-xl"></i></button>
            </form>
            <?php
            if (isset($thongBao)) { ?>
                <p class="col-md-12 mt-3 text-center" style="color: red;">
                    <?= $thongBao; ?>
                </p>
            <?php } ?>

        </div>
        <div class="col-1"></div>
    </div>
</div>


<?php
require "views/layout/footer.php";
?>

<script>
    let soluong = document.getElementById("soluongsp")
    let soluongct = soluong.value
    // let cong1 = document.getElementById("congsl")
    // let tru2 = document.getElementById("trusl")

    function render(soluongct) {
        soluong.value = soluongct;
    };

    function tru() {
        if (soluongct > 1) {
            soluongct--
            render(soluongct);
        }
    };

    function cong() {
        if (soluongct < <?= $sanpham->SoLuong; ?>)
            soluongct++
        render(soluongct);
    };


    soluong.addEventListener('input', function () {
        soluongct = soluong.value;
        soluongct = parseInt(soluongct);
        soluongct = (isNaN(soluongct) || soluongct == 0) ? 1 : soluongct;
        render(soluongct);
    });
</script>