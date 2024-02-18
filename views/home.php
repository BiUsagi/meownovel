<!-- Header  -->
<?php
include "layout/header.php";
require "vendor/autoload.php";
?>
<!-- End Header  -->




<div class="Banner">
    <img src="/public/images/Banner/banner7.jpg" alt>
    <div class="thongtin-banner">
        <h3>MEOW NOVEL</h3>
        <p>BÀI NÀY 10 ĐIỂM</p>

        <div id="tg"></div>
    </div>
</div>



<div class="new-sp-home" id="new-sp">
    <p>SẢN PHẨM NỔI BẬT</p>
    <?php
    for ($i = count($sanpham) - 1; $i > 0; $i--) {
        if ($i >= count($sanpham) - 8) {
            ?>

    <div class="new-spm-home bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
        <div class="thao-tacsp">
            <i class="fa-regular fa-heart fa-lg"></i>
            <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
        </div>
        <a href="index.php?controller=sanpham&action=chitietsp&id=<?= $sanpham[$i]->MaSP; ?>" class="img5"><img
                src="admin/<?= $sanpham[$i]->HinhAnh; ?>" alt></a>
        <p class="tieude"><a>
                <?= $sanpham[$i]->TenSP; ?>
            </a></p>
        <div class="gia">
            <?= number_format($sanpham[$i]->GiaTien, 0, ',', '.'); ?> đ
        </div>
        <div class="noidung-sp">
            <?= $sanpham[$i]->MoTa; ?>
        </div>
        <input type="number" value="1" min="1" class="none1">
    </div>

    <?php }
    } ?>
</div>
<input type="button" value="XEM THÊM" class="xtbt"
    onclick="window.location.href = 'index.php?controller=sanpham&action=index'">

<!-- //Slide js  -->
<div class="slideshow-container" id="new-sp1">

    <div class="mySlides fade" style="display: block;">
        <img src="/public/images/Banner/banner11.jpg" style="width:100%">
        <div class="slide-nav">
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-backward"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-forward"></i></a>
        </div>
    </div>

    <div class="mySlides fade">
        <img src="/public/images/Banner/banner12.jpg" style="width:100%">
        <div class="slide-nav">
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-backward"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-forward"></i></a>
        </div>
    </div>

    <div class="mySlides fade">
        <img src="/public/images/Banner/banner13.jpg" style="width:100%">
        <div class="slide-nav">
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-backward"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-forward"></i></a>
        </div>
    </div>

    <div class="mySlides fade">
        <img src="/public/images/Banner/banner14.jpg" style="width:100%">
        <div class="slide-nav">
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-backward"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-forward"></i></a>
        </div>
    </div>

    <div class="mySlides fade">
        <img src="/public/images/Banner/banner15.png" style="width:100%">
        <div class="slide-nav">
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-backward"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-forward"></i></a>
        </div>
    </div>

    <div class="mySlides fade">
        <img src="/public/images/Banner/banner8.jpg" style="width:100%">
        <div class="slide-nav">
            <a class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-backward"></i></a>
            <a class="next" onclick="plusSlides(1)"><i class="fa-solid fa-forward"></i></a>
        </div>
    </div>

</div>
<br>

<div style="text-align:center" id="new-sp2">
    <span class="dot active" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
    <span class="dot" onclick="currentSlide(6)"></span>
</div>

<div class="new-sp-home" id="new-sp3">
    <p>SÁCH MỚI</p>
    <?php
    for ($i = 0; $i < count($sanpham); $i++) {
        if ($i >= 8 && $i < 16) {
            ?>

    <div class="new-spm-home bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
        <div class="thao-tacsp">
            <i class="fa-regular fa-heart fa-lg"></i>
            <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
        </div>
        <a href="index.php?controller=sanpham&action=chitietsp&id=<?= $sanpham[$i]->MaSP; ?>" class="img5"><img
                src="admin/<?= $sanpham[$i]->HinhAnh; ?>" alt></a>
        <p class="tieude"><a>
                <?= $sanpham[$i]->TenSP; ?>
            </a></p>
        <div class="gia">
            <?= number_format($sanpham[$i]->GiaTien, 0, ',', '.'); ?> đ
        </div>
        <div class="noidung-sp">
            <?= $sanpham[$i]->MoTa; ?>
        </div>
        <input type="number" value="1" min="1" class="none1">
    </div>

    <?php }
    } ?>
</div>
<input type="button" value="XEM THÊM" class="xtbt"
    onclick="window.location.href = 'index.php?controller=sanpham&action=page2'">

</article>

<!-- footer  -->
<?php include "layout/footer.php"; ?>
<!-- End footer  -->

<script src="/public/js/index.js"></script>
<script src="/public/js/slide.js"></script>
<script src="/public/js/xemthem.js"></script>