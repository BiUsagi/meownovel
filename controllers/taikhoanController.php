<?php
require 'vendor/autoload.php';
require_once('controllers/baseController.php');

use models\TaiKhoan;

class taikhoanController extends BaseController
{
    function __construct()
    {
        $this->folder = 'taikhoan';
    }

    // public function index()
    // {
    //     $data = ['taikhoan' => TaiKhoan::TatCaTaiKhoan()];
    //     $this->render('index', $data);
    // }

    public function dangky()
    {
        $this->render('dangky');
    }
    public function thongtin()
    {
        $this->render('thongtin');
    }
    public function dangnhap()
    {
        $this->render('dangnhap');
    }
    public function sua()
    {
        $this->render('sua');
    }
    public function doimk()
    {
        $this->render('doimk');
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $hoten = $_POST['hoten'];
            $email = $_POST['email'];
            $id = $_POST['id'];

            $name = TaiKhoan::LayThongTinTheoTen($hoten);


            if ($hoten == $_SESSION['user']) {
                $hoten = $_SESSION['user'];
            } else {
                if (isset($name)) {
                    $thongBao = "Tên đăng nhập đã tồn tại!";
                    require "views/taikhoan/sua.php";
                    exit();
                }
            }


            $hinhanh = $_FILES['hinhanh'];

            $result = TaiKhoan::Update($id, $hoten, $email, $hinhanh);

            if ($result === true) {
                $thongBao = "Cập nhật thành công!";
                $_SESSION['user'] = $hoten;
                require "views/taikhoan/sua.php";
            } else {
                $thongBao = "Cập nhật thất bại, có lỗi xảy ra!";
                require "views/taikhoan/sua.php";
            }
        } else {
            require "views/taikhoan/sua.php";
        }
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tentk = $_POST['tentk'];
            $email = "Chưa có";
            $matkhau = $_POST['matkhau'];
            $nhaplai = $_POST['nhaplai'];
            $datetime = date('Y-m-d H:i:s');
            $quyen = 0;

            $existingAccount = TaiKhoan::LayThongTinTheoTen($tentk);

            if ($existingAccount) {
                $thongBao = "Tên tài khoản đã tồn tại. Vui lòng chọn tên khác.";
                require "views/taikhoan/dangky.php";
                return;
            }


            // Kiểm tra mật khẩu nhập lại
            if ($matkhau !== $nhaplai) {
                $thongBao = "Mật khẩu nhập lại không khớp.";
                require "views/taikhoan/dangky.php";
            }

            // Gọi hàm tạo tài khoản từ model
            $result = Taikhoan::Create($tentk, $matkhau, $email, $datetime, $quyen);

            if ($result) {
                $thongBao = "Tạo tài khoản thành công.";
                require "views/taikhoan/dangky.php";
            } else {
                $thongBao = "Đã xảy ra lỗi khi tạo tài khoản.";
                require "views/taikhoan/dangky.php";
            }
        }
    }



    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tentk = $_POST['tentk'];
            $matkhau = $_POST['matkhau'];

            $result = TaiKhoan::login($tentk, $matkhau);

            if ($result['success']) {
                $_SESSION['user'] = $tentk;
                header("Location: index.php");
                exit();
            } else {
                // Đăng nhập thất bại
                $thongBao = "Tên tài khoản hoặc mật khẩu không đúng.";
                require "views/taikhoan/dangnhap.php";
            }
        }
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header("Location: index.php");
    }

    public function resetpass()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaKH = $_POST['MaKH'];
            $matKhauCu = $_POST['passcu'];
            $matKhauMoi = $_POST['passmoi'];
            $nhapLaiMatKhau = $_POST['nhaplai'];


            if ($matKhauMoi != $nhapLaiMatKhau) {
                $thongBao = "Xác nhận mật khẩu không khớp!";
            }else if($matKhauMoi == $matKhauCu){
                $thongBao = "Mật khẩu cũ không được trùng mới mật khẩu mới!";
            } else {
                $result = TaiKhoan::DoiMatKhau($MaKH, $matKhauCu, $matKhauMoi);

                if ($result) {
                    $thongBao = "Đổi mật khẩu thành công!";
                } else {
                    $thongBao = "Đổi mật khẩu thất bại, mật khẩu cũ không đúng!";
                }
            }
        }

        require "views/taikhoan/doimk.php";
    }


    public function error()
    {
        $this->render('error');
    }
}