<?php
require "vendor/autoload.php";

use models\GioHang;
use models\TaiKhoan;

// Lấy thông tin tài khoản theo tên
if (isset($_SESSION['user'])) {
    $user = TaiKhoan::LayThongTinTheoTen($_SESSION['user']);
}

// Kiểm tra xem biến $user có tồn tại và có thuộc tính "quanLy" hay không
if (isset($user) && is_array($user) && array_key_exists('quanLy', $user)) {
    $quanLy = $user['quanLy'];
} else {
    $quanLy = 0;
}

// Kiểm tra xem thuộc tính "HinhAnh" có tồn tại trong $user không
$hinhAnh = isset($user['HinhAnh']) ? $user['HinhAnh'] : '';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/public/images/Logo/cat.jpg" type="image/x-icon">
    <title> MEOW NOVEL</title>
    <link rel="stylesheet" href="/public/css/giohangdungchung.css">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0"
        nonce="ZMThilCQ"></script>

</head>

<body>
    <!-- Header -->
    <header>
        <div class="avahead">
            <a href="./index.php"><img src="/public/images/Logo/cat.jpg" alt></a>
            <p class="logotiude">MEOW NOVEL</p>
        </div>

        <div class="kiemtra">
            <a href="index.php?controller=giohang&action=index">THÔNG TIN CHI TIẾT GIỎ HÀNG</a>


            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <ul>
                    <?php if ($quanLy == 1) { ?>
                        <li><a href="admin/index.php?id=<?= $_SESSION['user']; ?>" style="margin-right: 10px;">
                                ADMIN - </a></li>

                    <?php }

                    // Kiểm tra hình ảnh tài khoản
                    if ($hinhAnh == Null) { ?>
                        <img src="public/images/cat.jpg" alt="" style=" width: 30px; border-radius: 50%; object-fit: cover;">
                    <?php } else { ?>
                        <img src="<?= $hinhAnh ?>" alt=""
                            style=" width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
                    <?php }
                    ?>


                    <li cass=" gach"><a href="index.php?controller=taikhoan&action=thongtin">
                            <?= $_SESSION['user'] ?>
                        </a>
                    </li>
                </ul>
            <?php } else {
                ?>
                <ul>
                    <li><a href="index.php?controller=taikhoan&action=dangky"> ĐĂNG KÝ</a></li>
                    <li class="gach"><a href="index.php?controller=taikhoan&action=dangnhap"> ĐĂNG
                            NHẬP</a></li>
                </ul>
            <?php } ?>
        </div>

        <div class="stohead">
            <a id="giohang-head" onclick="show()"><img src="/public/images/Logo/cart-icon.webp" alt></a>
            <div id="slsanphamheader">
                <?php
                $slgh = 0;
                if (isset($_SESSION['user'])) {
                    $soluongGH = GioHang::LayGioHangTheoKH($_SESSION['user']);
                    for ($i = 0; $i < count($soluongGH); $i++) {
                        $slgh = $slgh + $soluongGH[$i]['SoLuong'];
                    }
                    echo $slgh;
                } else {
                    echo 0;
                }
                ?>
            </div>
        </div>

    </header>


    <!-- Menu -->
    <nav class="menu">
        <ul>
            <li><a href="index.php" class="dangchon"> TRANG CHỦ</a></li>
            <li><a href="index.php?controller=sanpham&action=index">SẢN PHẨM</a></li>
            <li><a href="index.php?controller=home&action=lienhe">LIÊN HỆ</a></li>
            <li><a href="index.php?controller=home&action=gioithieu">GIỚI THIỆU</a></li>
        </ul>
        <label>
            <input type="text" placeholder="Tìm kiếm...">
            <button type="submit" class="button">
                <img src="/public/images/Logo/1200px-Search_Icon.svg.png" height="10px" width="10px">
            </button>
        </label>
    </nav>

    <!-- NXB noi bat -->
    <article>
        <div class="top-new">
            <p>Các Nhà Xuất Bản, Nhà Phát Hành Nổi Bật</p>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=IPM"><img src="/public/images/Logo/ipm.png"
                        alt></a>
                <p>IMP</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Kim%20Đồng"><img
                        src="/public/images/Logo/Logo_nxb_Kim_Đồng.png" alt></a>
                <p>Kim Đồng</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Hikari"><img
                        src="/public/images/Logo/hikari.jpg" alt></a>
                <p>Hikari</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Sakura%20Books"><img
                        src="/public/images/Logo/sakura.jfif" alt></a>
                <p>Sakura Books</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Sky%20Books"><img
                        src="/public/images/Logo/skybook.jpg" alt></a>
                <p>Sky Books</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Nxb%20Trẻ"><img
                        src="/public/images/Logo/tre.png" alt></a>
                <p>Nxb Trẻ</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Tsuki"><img
                        src="/public/images/Logo/tsuki.png" alt></a>
                <p>Tsuki</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Amak%20Books"><img
                        src="/public/images/Logo/amak.png" alt></a>
                <p>Amak Books</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Thái%20Hà"><img
                        src="/public/images/Logo/thaiha.jpg" alt></a>
                <p>Thái Hà</p>
            </div>
            <div class="pic" onmouseover="noilen(this)" onmouseout="haxuong(this)">
                <a href="index.php?controller=sanpham&action=sptheonxb&nxb=Nhã%20Nam"><img
                        src="/public/images/Logo/nhânm.png" alt></a>
                <p>Nhã Nam</p>
            </div>
        </div>
    </article>



    <!-- gio hang -->
    <div id="storeee" style="z-index: 999;">
        <div id="sto-thongtinchitiet"></div>
        <div id="sto-trong"></div>
        <div id="sto-tong">
            <h4>TỔNG TIỀN:</h4>
            <div id="tong-tien">0₫</div>
        </div>
        <div id="sto-thaotac">
            <a href="/app/views/giohang.php"><button id="thaotac-01">XEM
                    GIỎ HÀNG</button></a>
            <button id="thaotac-02">THANH TOÁN</button>
        </div>
    </div>