<?php
require "views/layout/header.php";
require "vendor/autoload.php";

use models\DanhMuc;



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
            <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới sản phẩm</h3>
                <div class="tile-body">
                    <form class="row" action="index.php?controller=sanpham&action=create" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="tenSanPham">
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Số lượng</label>
                            <input class="form-control" type="number" name="soLuong">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <select class="form-control" id="exampleSelect1" name="danhMuc">
                                <option>-- Chọn danh mục --</option>
                                <?php
                                $danhmuc = DanhMuc::TatCaDanhMuc();
                                for ($i = 0; $i < count($danhmuc); $i++) {
                                    ?>
                                    <option value="<?php echo $danhmuc[$i]->MaDM; ?>">
                                        <?php echo $danhmuc[$i]->MaDM . ' - ' . $danhmuc[$i]->TenDM; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Giá bán</label>
                            <input class="form-control" type="text" name="giaBan">
                        </div>

                        <div class="form-group col-md-3 ">
                            <label for="NhaXB" class="control-label">Nhà xuất bản/phát hành</label>
                            <select class="form-control" id="exampleSelect1" name="NhaXB">
                                <option>
                                    -- Chọn nhà xuất bản/phát hành --
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
                            <div id="myfileupload">
                                <input type="file" id="anhSanPham" name="anhSanPham" />
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="mota" class="control-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" name="moTa" id="mota"></textarea>
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