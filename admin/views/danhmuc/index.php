<?php
require "views/layout/header.php";
?>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách danh mục</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="index.php?controller=danhmuc&action=themmoi"
                                title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới danh mục</a>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                    class="fas fa-trash-alt"></i> Xóa tất cả </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="10"><input type="checkbox" id="all"></th>
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($danhmuc); $i++) {
                                ?>
                            <tr>
                                <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                <td>
                                    <?= $danhmuc[$i]->MaDM; ?>
                                </td>
                                <td>
                                    <?= $danhmuc[$i]->TenDM; ?>
                                </td>
                                <td>
                                    <?= $danhmuc[$i]->NgayTao; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                        data-id="<?= $danhmuc[$i]->MaDM; ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a href="index.php?controller=danhmuc&action=sua&id=<?= $danhmuc[$i]->MaDM; ?>"
                                        class="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i></a>
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
</script>
<script>
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}
// jQuery(function () {
//     jQuery(".trash").click(function () {
//         swal({
//             title: "Cảnh báo",
//             text: "Bạn có chắc chắn là muốn xóa sản phẩm này?",
//             buttons: ["Hủy bỏ", "Đồng ý"],
//         })
//             .then((willDelete) => {
//                 if (willDelete) {
//                     swal("Đã xóa thành công.!", {

//                     });
//                 }
//             });
//     });
// });

jQuery(function() {
    jQuery(".trash").click(function() {
        var DanhMuc = jQuery(this).data('id');

        swal({
                title: "Cảnh báo",
                text: "Bạn có chắc chắn là muốn xóa sản phẩm này?",
                buttons: ["Hủy bỏ", "Đồng ý"],
            })
            .then((willDelete) => {
                DanhMuc
                if (willDelete) {
                    jQuery.ajax({
                        type: "POST",
                        url: "index.php?controller=danhmuc&action=delete",
                        data: JSON.stringify({
                            DanhMuc: DanhMuc
                        }),
                        contentType: 'application/json',
                        success: function(response) {
                            if (response.status === "success") {
                                swal("Đã xóa thành công!", {
                                    icon: "success",
                                }).then(() => {
                                    // Reload trang sau khi xóa
                                    location.reload();
                                });
                            } else {
                                swal("Xóa thất bại!", {
                                    icon: "error",
                                });
                            }
                        }
                    });
                }
            });
    });
});
oTable = $('#sampleTable').dataTable();
$('#all').click(function(e) {
    $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
    e.stopImmediatePropagation();
});
</script>
</body>

</html>