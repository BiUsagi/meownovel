<?php
require "views/layout/header.php";
require "vendor/autoload.php";

use models\GioHang;
use models\SanPham;

?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách đơn hàng</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>ID đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Đơn hàng</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Tình trạng</th>
                                <th>Tính năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($donhang as $dh) {
                                ?>

                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>
                                        <?= $dh['MaDH']; ?>
                                    </td>
                                    <td>
                                        <?= $dh['TenNN']; ?>
                                    </td>
                                    <td class="col-4">
                                        <?php
                                        $chitiet = GioHang::LayThongTinChiTietDH($dh['MaDH']);
                                        for ($i = 0; $i < count($chitiet); $i++) {
                                            $chitietsp = SanPham::GetById($chitiet[$i]['MaSP']);
                                            echo '- ' . $chitietsp->TenSP . ' <br>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $soluong = 0;
                                        $chitiet = GioHang::LayThongTinChiTietDH($dh['MaDH']);
                                        for ($i = 0; $i < count($chitiet); $i++) {
                                            $soluong = $soluong + $chitiet[$i]['SoLuong'];
                                        }
                                        echo $soluong;
                                        ?>
                                    </td>
                                    <td>
                                        <?= number_format($dh['TongTien'], 0, ',', '.'); ?> đ
                                    </td>
                                    <td><span class="badge bg-warning">Đang giao hàng</span></td>
                                    <td>
                                        <a href="index.php?controller=donhang&action=chitietdonhang&madh=<?= $dh['MaDH']; ?>"
                                            class="btn btn-primary btn-sm edit">Chi
                                            tiết
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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