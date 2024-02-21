<!-- Header  -->
<?php include "views/layout/header.php";
require "vendor/autoload.php";

use models\DanhMuc;
use models\SanPham;

if (!isset($danhmuc)) {
    $danhmuc = DanhMuc::TatCaDanhMuc();
}

if (!isset($sanpham)) {
    $sanpham = SanPham::TatCaSanPham();
} ?>
<!-- End Header  -->



<div class="boxchungaa">
    <aside id="sanpham4">
        <div class="Muc-as">
            <h3>DANH MỤC</h3>
            <p class="as-av"><a href>TẤT CẢ SẢN PHẨM</a></p>
            <?php for ($i = 0; $i < count($danhmuc); $i++) { ?>
                <p><a href>
                        <?= mb_strtoupper($danhmuc[$i]->TenDM); ?>
                    </a></p>
            <?php } ?>

        </div>
    </aside>
    <div class="new-sp" id="new-sp">
        <p>TẤT CẢ SẢN PHẨM</p>
        <?php
        for ($i = 0; $i < count($sanpham); $i++) {
            if ($i < 12) {
                ?>

                <div class="new-spm bg-cl product-item" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                    <div class="thao-tacsp">
                        <i class="fa-regular fa-heart fa-lg"></i>
                        <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                    </div>
                    <a href="index.php?controller=sanpham&action=chitietsp&id=<?= $sanpham[$i]->MaSP; ?>" class="img5"><img
                            src="admin/<?= $sanpham[$i]->HinhAnh; ?>" alt></a>
                    <p class="tieude"><a href="index.php?controller=sanpham&action=chitietsp&id=<?= $sanpham[$i]->MaSP; ?>">
                            <?= $sanpham[$i]->TenSP; ?>
                        </a></p>
                    <div class="gia">
                        <?= number_format($sanpham[$i]->GiaTien, 0, ',', '.'); ?> đ
                    </div>
                    <div class="tacgia-sp">Kinugasa Syougo</div>
                    <div class="nxb-sp">IMP</div>
                    <div class="namxb-sp">2022</div>
                    <div class="kichthuoc-sp">18 x 13 cm</div>
                    <div class="noidung-sp">
                        <?= $sanpham[$i]->MoTa; ?>
                    </div>
                    <input type="number" value="1" min="1" class="none1">
                    <input type="number" value="42.750" class="none1 giacuoinha">
                </div>

            <?php }
        } ?>
        <div class="nexttr">
            <a href="index.php?controller=sanpham&action=index" class="dangc">1</a>
            <a href="index.php?controller=sanpham&action=page2">2</a>
        </div>
    </div>

</div>

</article>

<!-- footer  -->
<?php include "views/layout/footer.php"; ?>
<!-- End footer  -->
<script src="/public/js/sanpham.js"></script>
<script src="/public/js/store.js"></script>