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

            <div class="row">
                <div id="soluong-sp" class="col-5">
                    <label for="soluongsp"></label>
                    <input type="button" value="-" id="trusl" onclick="tru()">
                    <input type="text" name="soluongsp" id="soluongsp" value="1" min="1">
                    <input type="button" value="+" id="congsl" onclick="cong()">
                </div>
                <div class="col-1"></div>
                <div id="themgh" class="col-5" onclick="themspvaogio(this)">THÊM VÀO GIỎ
                    HÀNG<i class="fa-solid fa-cart-arrow-down fa-xl"></i></div>

            </div>



        </div>
        <div class="col-1"></div>
    </div>
</div>


<?php
require "views/layout/footer.php";
?>