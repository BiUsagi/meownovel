<!-- Header  -->
<?php include "views/layout/header.php"; ?>
<!-- End Header  -->

<div id="giohangmain">
    <h3>GIỎ HÀNG</h3>
    <div class="gh-chitietgh">
        <div class="gh-tensp">Tên sản phẩm</div>
        <div class="gh-soluong">Số lượng</div>
        <div class="gh-giatien">Giá tiền</div>
    </div>
    <div id="sto-thongtinchitiet"></div>
    <div id="gh-tong">
        <h4>Tổng cộng</h4>
        <div id="tong-tien">0₫</div>
    </div>
    <button id="gh-capnhat" onclick="updategh()">CẬP NHẬT</button>
    <button id="gh-thanhtoan">THANH TOÁN</button>
</div>

<div style="clear: both;"></div>
<!-- footer  -->
<?php include "views/layout/footer.php"; ?>
<!-- End footer  -->

<script src="/public/js/giohang.js"></script>
<script src="/public/js/store.js"></script>

<script>
    showghmain();
</script>