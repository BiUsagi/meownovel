<?php
require "views/layout/header.php";
require "vendor/autoload.php";

use models\GioHang;
use models\SanPham;

$MaDH = $_GET['madh'];
if (!isset($chitietdh)) {
    $chitietdh = GioHang::LayThongTinChiTietDH($MaDH);
}

if (!isset($donhang)) {
    $donhang = GioHang::LayThongTinDonHangTheoMaDH($MaDH);
}

?>
<link rel="stylesheet" href="public/css/alo.css">
<!-- main -->
<main class="app-content">
    <div class="col-12  ctiet-thongtin">
        <div class="row">
            <!-- lich su -->
            <div class="col-12 row">
                <div class="boxmain col-12 ">
                    <h3 class="col-12">Thông Tin Thanh Toán</h3>
                    <div class="thongtin col-12 row">
                        <div class="form-group col-6">
                            <label class="control-label">Tên người nhận hàng: </label>
                            <input class="form-control" type="text" name="hoten" value="<?= $donhang[0]['TenNN']; ?>"
                                readonly>
                        </div>

                        <div class="form-group col-6">
                            <label class="control-label">Số điện thoại: </label>
                            <input class="form-control" type="text" name="sodienthoai"
                                value="<?= $donhang[0]['SoDT']; ?>" readonly>
                        </div>

                        <div class="form-group col-12">
                            <label class="control-label">Địa chỉ: </label>
                            <input class="form-control" type="text" name="diachi" value="<?= $donhang[0]['DiaChi']; ?>"
                                readonly>
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
                            <div class="sto-anh-thanhtoan col-1"><img src="<?= $sanpham->HinhAnh; ?>" alt="">
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
                    <div class=" col-12 row giohangmain">
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



            </div>
            <!-- lich su -->

        </div>
    </div>
    <!-- END main -->
</main>
<!-- Essential javascripts for application to work-->
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="src/jquery.table2excel.js"></script>
<script src="public/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="public/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="public/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="public/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>
<script>
    function deleteRow(r) {
        var i = r.parentNode.parentNode.rowIndex;
        document.getElementById("myTable").deleteRow(i);
    }
    jQuery(function () {
        jQuery(".trash").click(function () {
            swal({
                title: "Cảnh báo",

                text: "Bạn có chắc chắn là muốn xóa đơn hàng này?",
                buttons: ["Hủy bỏ", "Đồng ý"],
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Đã xóa thành công.!", {

                        });
                    }
                });
        });
    });
    oTable = $('#sampleTable').dataTable();
    $('#all').click(function (e) {
        $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
        e.stopImmediatePropagation();
    });


    //Thời Gian
    function time() {
        var today = new Date();
        var weekday = new Array(7);
        weekday[0] = "Chủ Nhật";
        weekday[1] = "Thứ Hai";
        weekday[2] = "Thứ Ba";
        weekday[3] = "Thứ Tư";
        weekday[4] = "Thứ Năm";
        weekday[5] = "Thứ Sáu";
        weekday[6] = "Thứ Bảy";
        var day = weekday[today.getDay()];
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        nowTime = h + " giờ " + m + " phút " + s + " giây";
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = day + ', ' + dd + '/' + mm + '/' + yyyy;
        tmp = '<span class="date"> ' + today + ' - ' + nowTime +
            '</span>';
        document.getElementById("clock").innerHTML = tmp;
        clocktime = setTimeout("time()", "1000", "Javascript");

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    }
    //In dữ liệu
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('sampleTable');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }


    //Modal
    $("#show-emp").on("click", function () {
        $("#ModalUP").modal({
            backdrop: false,
            keyboard: false
        })
    });
</script>
</body>

</html>