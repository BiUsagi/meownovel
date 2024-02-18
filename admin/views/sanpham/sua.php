<?php
require "views/layout/header.php";
require "vendor/autoload.php";

use models\DanhMuc;
use models\SanPham;

if (!isset($danhmuc)) {
    $danhmuc = DanhMuc::TatCaDanhMuc();
}
if (!isset($sanpham)) {
    $MaSP = $_GET['id'];
    $sanpham = SanPham::GetById($MaSP);
}
if (isset($_GET['thongBao'])) {
    $check = $_GET['thongBao'];
    if ($check == 1) {
        $thongBao = "Thành Công!";
    } else {
        $thongBao = "Thất Bại!";
    }
}



?>
<style>
    .Choicefile {
        display: block;
        background: #14142B;
        border: 1px solid #fff;
        color: #fff;
        width: 150px;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        padding: 5px 0px;
        border-radius: 5px;
        font-weight: 500;
        align-items: center;
        justify-content: center;
    }

    .Choicefile:hover {
        text-decoration: none;
        color: white;
    }

    #uploadfile,
    .removeimg {
        display: none;
    }

    #thumbbox {
        position: relative;
        width: 100%;
        margin-bottom: 20px;
    }

    .removeimg {
        height: 25px;
        position: absolute;
        background-repeat: no-repeat;
        top: 5px;
        left: 5px;
        background-size: 25px;
        width: 25px;
        /* border: 3px solid red; */
        border-radius: 50%;

    }

    .removeimg::before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        content: '';
        border: 1px solid red;
        background: red;
        text-align: center;
        display: block;
        margin-top: 11px;
        transform: rotate(45deg);
    }

    .removeimg::after {
        /* color: #FFF; */
        /* background-color: #DC403B; */
        content: '';
        background: red;
        border: 1px solid red;
        text-align: center;
        display: block;
        transform: rotate(-45deg);
        margin-top: -2px;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách sản phẩm</li>
            <li class="breadcrumb-item"><a href="#">Sửa sản phẩm</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Sửa sản phẩm</h3>
                <div class="tile-body">
                    <form class="row" action="index.php?controller=sanpham&action=edit" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group col-md-3">
                            <label class="control-label">Mã sản phẩm</label>
                            <input class="form-control" type="text" name="maSanPham" value="<?= $sanpham->MaSP; ?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="tenSanPham" value="<?= $sanpham->TenSP; ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Số lượng</label>
                            <input class="form-control" type="number" name="soLuong" value="<?= $sanpham->SoLuong; ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <select class="form-control" id="exampleSelect1" name="danhMuc">
                                <?php
                                for ($i = 0; $i < count($danhmuc); $i++) {
                                    if ($danhmuc[$i]->MaDM == $sanpham->MaDM) {
                                        ?>
                                        <option value="<?= $danhmuc[$i]->MaDM; ?>" selected>
                                            <?php echo $danhmuc[$i]->MaDM . ' - ' . $danhmuc[$i]->TenDM; ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?php echo $danhmuc[$i]->MaDM; ?>">
                                            <?php echo $danhmuc[$i]->MaDM . ' - ' . $danhmuc[$i]->TenDM; ?>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Giá bán</label>
                            <input class="form-control" type="text" name="giaBan" value="<?= $sanpham->GiaTien; ?>">
                        </div>
                        <div class="form-group col-md-3 ">
                            <label for="NhaXB" class="control-label">Nhà xuất bản/phát hành </label>
                            <select class="form-control" id="exampleSelect1" name="NhaXB">
                                <option>
                                    <?php if ($sanpham->NhaXB != Null) {
                                        echo $sanpham->NhaXB;
                                    } else { ?>-- Chọn nhà xuất bản/phát hành --
                                    <?php } ?>
                                </option>
                                <option>IPM</option>
                                <option>Kim Đồng</option>
                                <option>Hikari</option>
                                <option>Sakura Books</option>
                                <option>Sky Books</option>
                                <option>Nxb Trẻ</option>
                                <option>Tsuki</option>
                                <option>Amak Books</option>
                                <option>Thái Hà</option>
                                <option>Nhã Nam</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh sản phẩm</label>
                            <img src="<?= $sanpham->HinhAnh; ?>" alt="Hình Ảnh"
                                style="width: 100px; height: 100px; object-fit: cover;">
                            <div id="myfileupload">
                                <input type="file" id="anhSanPham" name="anhSanPham" value="<?= $sanpham->HinhAnh; ?>"
                                    accept="image/*" />
                            </div>

                        </div>
                        <input type="hidden" name="hinhAnhCu" value="<?= $sanpham->HinhAnh; ?>">

                        <div class="form-group col-md-12">
                            <label for="mota" class="control-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="moTa" id="mota"><?= $sanpham->MoTa; ?></textarea>
                        </div>
                        <p class="col-md-12 mt-3 text-center" style="color: red;">
                            <?php
                            if (isset($thongBao))
                                echo $thongBao; ?>
                        </p>
                        <button class="btn btn-save" type="submit" name="submit">Lưu lại</button>
                        <a class="btn btn-cancel" href="index.php?controller=sanpham&action=index">Hủy bỏ</a>
                    </form>
                </div>
            </div>
</main>


<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/popper.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/plugins/pace.min.js"></script>
</body>

</html>