<?php
require "vendor/autoload.php";
use models\TaiKhoan;


if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = $_GET['id'];
}

if (isset($_SESSION['user'])) {
    $user = TaiKhoan::LayThongTinTheoTen($_SESSION['user']);
    extract($user);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>MeowNovel</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">

            <!-- User Menu-->
            <li><a class="app-nav__item" href="/index.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <?php if ($HinhAnh != null) { ?>
            <img class="app-sidebar__user-avatar" src="../<?= $HinhAnh; ?>"
                style="width: 75px; height:75px; object-fit: cover;" alt="User Image">
            <?php } else { ?>
            <img class="app-sidebar__user-avatar" src="public/images/cat.jpg"
                style="width: 75px; height:75px; object-fit: cover;" alt="User Image">
            <?php } ?>
            <div>
                <p class="app-sidebar__user-name"><b>
                        <?= $TenKH; ?>
                    </b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li><a class="app-menu__item haha" href="../index.php"><i class='app-menu__icon bx bx-cart-alt'></i>
                    <span class="app-menu__label">Trang WEB</span></a></li>
            <!-- <li><a class="app-menu__item " href="index.php"><i class='app-menu__icon bx bx-tachometer'></i><span
                        class="app-menu__label">Bảng điều khiển</span></a></li> -->
            <li><a class="app-menu__item" href="index.php?controller=taikhoan&action=index"><i
                        class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách
                        hàng</span></a></li>
            <li><a class="app-menu__item"
                    href="index.php?controller=danhmuc&action=index&id=<?= $_SESSION['user']; ?>"><i
                        class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý danh mục</span></a>
            </li>
            <li><a class="app-menu__item" href="index.php?controller=sanpham&action=index"><i
                        class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản
                        phẩm</span></a>
            </li>
            <!-- <li><a class="app-menu__item" href="index.php?controller=donhang&action=index"><i
                        class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a>
            </li> -->
            <!-- <li><a class="app-menu__item" href="quan-ly-bao-cao.php"><i
                        class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh
                        thu</span></a>
            </li>
            <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span
                        class="app-menu__label">Cài
                        đặt hệ thống</span></a></li> -->
        </ul>
    </aside>