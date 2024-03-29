<?php
require_once('controllers/baseController.php');
require "vendor/autoload.php";

use models\SanPham;
use models\GioHang;
use models\TaiKhoan;

class giohangController extends BaseController
{
    function __construct()
    {
        $this->folder = 'giohang';
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $data = ['giohang' => GioHang::LayGioHangTheoKH($_SESSION['user'])];
            $this->render('index', $data);
        } else {
            require "views/taikhoan/dangnhap.php";
            exit();
        }
    }
    public function themmoi()
    {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=taikhoan&action=dangnhap");
            exit();
        }

        // Xử lý dữ liệu từ form
        $maSanPham = $_POST['maSanPham'];
        $soLuong = $_POST['soluongsp'];

        /// Kiểm tra sản phẩm có trong giỏ hàng hay chưa
        $tenKH = $_SESSION['user'];
        $kiemTraTonTai = GioHang::KiemTraTonTai($tenKH, $maSanPham);

        if ($kiemTraTonTai) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $result = GioHang::CapNhatSoLuong($tenKH, $maSanPham, $soLuong);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $result = GioHang::ThemSanPham($tenKH, $maSanPham, $soLuong);
        }

        if ($result) {
            header("Location: index.php?controller=giohang&action=index");
            exit();
        } else {
            $thongBao = "Lỗi khi thêm sản phẩm vào giỏ hàng.";
            require "views/sanpham/chitietsp.php";
            exit();
        }


    }
    public function edit()
    {
        $tenkh = $_SESSION['user'];
        $masp = $_POST['masp'];
        $soluong = $_POST['soLuong'];

        $result = GioHang::CapNhatSoLuong($tenkh, $masp, $soluong);
        if ($result) {
            header("Location: index.php?controller=giohang&action=index");
            exit();
        } else {
            $thongBao = "Lỗi khi thêm sản phẩm vào giỏ hàng.";
            require "views/giohang/index.php";
            exit();
        }
    }

    public function delete()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            if (isset($data['GioHang'])) {
                $MaGH = $data['GioHang'];

                $result = GioHang::Delete($MaGH);

                if ($result > 0) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error']);
                }
            } else {
                echo json_encode(['status' => 'error']);
            }
        } else {
            echo json_encode(['status' => 'error']);
        }
    }

    public function thanhtoan()
    {
        $this->render('thanhtoan');
    }
    public function thucthithanhtoan()
    {
        // Kiểm tra xem người dùng đã ấn nút thanh toán hay chưa
        if (isset($_POST['thanhtoan'])) {

            $TenKH = $_SESSION['user'];
            $giohang = GioHang::LayGioHangTheoKH($TenKH);
            $hoten = $_POST['hoten'];
            $sodienthoai = $_POST['sodienthoai'];
            $diachi = $_POST['diachi'];
            $tongtien = $_POST['tongtien'];

            //Lưu thông tin đơn hàng vào bảng 'donhang'
            $id_donhang = GioHang::LuuDonHang($TenKH, $hoten, $sodienthoai, $diachi, $tongtien);

            // Lưu chi tiết đơn hàng vào bảng 'chitietdonhang' cho từng sản phẩm trong giỏ hàng
            for ($i = 0; $i < count($giohang); $i++) {
                $masanpham = $giohang[$i]['MaSP'];
                $soluong = $giohang[$i]['SoLuong'];
                $dongia = SanPham::GetById($masanpham)->GiaTien;

                GioHang::LuuChiTietDonHang($id_donhang, $masanpham, $soluong, $dongia);
            }

            //Xóa dữ liệu trong bảng 'giohang' sau khi đã đặt hàng thành công
            GioHang::XoaGioHang($_SESSION['user']);

            header("Location: index.php?controller=taikhoan&action=lichsumuahang");
            exit();
        }

    }

    public function error()
    {
        $this->render('error');
    }
}