<?php
require "views/layout/header.php";

use models\TaiKhoan;
use models\SanPham;
use models\GioHang;

?>
<main class="app-content">
    <div class="row">
        <div class="col-md-12">
            <div class="app-title">
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><b>Bảng điều
                                khiển</b></a></li>
                </ul>
                <div id="clock"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <!--Left-->
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <!-- col-6 -->
                <div class="col-md-6">
                    <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                        <div class="info">
                            <h4>Tổng khách hàng</h4>
                            <?php
                            $khachhang = TaiKhoan::TatCaTaiKhoan();
                            ?>
                            <p><b>
                                    <?= count($khachhang); ?> khách hàng
                                </b></p>
                            <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                        </div>
                    </div>
                </div>
                <!-- col-6 -->
                <div class="col-md-6">
                    <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                        <div class="info">
                            <h4>Tổng sản phẩm</h4>
                            <?php
                            $allsanpham = SanPham::TatCaSanPham();
                            ?>
                            <p><b>
                                    <?= count($allsanpham); ?> sản phẩm
                                </b></p>
                            <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                        </div>
                    </div>
                </div>
                <!-- col-6 -->
                <div class="col-md-6">
                    <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                        <div class="info">
                            <h4>Tổng đơn hàng</h4>
                            <?php
                            $alldonhang = GioHang::TatCaDonHang();
                            ?>
                            <p><b>
                                    <?= count($alldonhang); ?> đơn hàng
                                </b></p>
                            <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
                        </div>
                    </div>
                </div>
                <!-- col-6 -->
                <div class="col-md-6">
                    <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
                        <div class="info">
                            <h4>Sắp hết hàng ( < 3 ) </h4>
                                    <?php
                                    $sphethang = 0;
                                    for ($i = 0; $i < count($allsanpham); $i++) {
                                        if ($allsanpham[$i]->SoLuong <= 3) {
                                            $sphethang++;
                                        }
                                    } ?>
                                    <p><b>
                                            <?= $sphethang; ?> sản phẩm
                                        </b></p>
                                    <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập
                                        thêm.</p>
                        </div>
                    </div>
                </div>
                <!-- col-12 -->
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Tình trạng đơn hàng</h3>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AL3947</td>
                                        <td>Phạm Thị Ngọc</td>
                                        <td>
                                            19.770.000 đ
                                        </td>
                                        <td><span class="badge bg-info">Chờ xử lý</span></td>
                                    </tr>
                                    <tr>
                                        <td>ER3835</td>
                                        <td>Nguyễn Thị Mỹ Yến</td>
                                        <td>
                                            16.770.000 đ
                                        </td>
                                        <td><span class="badge bg-warning">Đang vận
                                                chuyển</span></td>
                                    </tr>
                                    <tr>
                                        <td>MD0837</td>
                                        <td>Triệu Thanh Phú</td>
                                        <td>
                                            9.400.000 đ
                                        </td>
                                        <td><span class="badge bg-success">Đã hoàn
                                                thành</span></td>
                                    </tr>
                                    <tr>
                                        <td>MT9835</td>
                                        <td>Đặng Hoàng Phúc </td>
                                        <td>
                                            40.650.000 đ
                                        </td>
                                        <td><span class="badge bg-danger">Đã hủy </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- / div trống-->
                    </div>
                </div>
                <!-- / col-12 -->
                <!-- col-12 -->
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">Khách hàng mới</h3>
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th>Ngày sinh</th>
                                        <th>Số điện thoại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#183</td>
                                        <td>Hột vịt muối</td>
                                        <td>21/7/1992</td>
                                        <td><span class="tag tag-success">0921387221</span></td>
                                    </tr>
                                    <tr>
                                        <td>#219</td>
                                        <td>Bánh tráng trộn</td>
                                        <td>30/4/1975</td>
                                        <td><span class="tag tag-warning">0912376352</span></td>
                                    </tr>
                                    <tr>
                                        <td>#627</td>
                                        <td>Cút rang bơ</td>
                                        <td>12/3/1999</td>
                                        <td><span class="tag tag-primary">01287326654</span></td>
                                    </tr>
                                    <tr>
                                        <td>#175</td>
                                        <td>Hủ tiếu nam vang</td>
                                        <td>4/12/20000</td>
                                        <td><span class="tag tag-danger">0912376763</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- / col-12 -->
            </div>
        </div>
        <!--END left-->
    </div>

    <div class="text-center" style="font-size: 13px">
    </div>
</main>

<?php
require "views/layout/footer.php";
?>