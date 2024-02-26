<?php
require 'vendor/autoload.php';
require_once('controllers/baseController.php');

use models\SanPham;
use models\DanhMuc;
use models\TaiKhoan;

class sanphamController extends BaseController
{
    function __construct()
    {
        $this->folder = 'sanpham';
    }
    public function index()
    {
        $data = ['sanpham' => SanPham::TatCaSanPham()];
        $this->render('index', $data);
    }
    public function themmoi()
    {
        $this->render('themmoi');
    }
    public function create()
    {
        if (isset($_POST['submit'])) {
            $tenSanPham = $_POST['tenSanPham'];
            $soLuong = $_POST['soLuong'];
            $giaBan = $_POST['giaBan'];
            $NhaXB = $_POST['NhaXB'];
            $moTa = $_POST['moTa'];
            $maDanhMuc = $_POST['danhMuc'];

            if ($tenSanPham == null || $soLuong == null || $giaBan == null || $NhaXB == null || $moTa == null) {
                $thongBao = "Vui lòng điền đầy đủ thông tin sản phẩm!";
                require "views/sanpham/themmoi.php";
                exit();
            }

            $hinhAnhPath = '';

            if (isset($_FILES['anhSanPham']) && $_FILES['anhSanPham']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'public/images/img-sanpham/';
                $uploadFile = $uploadDir . basename($_FILES['anhSanPham']['name']);

                if (move_uploaded_file($_FILES['anhSanPham']['tmp_name'], $uploadFile)) {
                    $hinhAnhPath = $uploadFile;
                }
            }

            if (SanPham::Create($tenSanPham, $soLuong, $giaBan, $moTa, $NhaXB, $hinhAnhPath, $maDanhMuc) > 0) {
                $thongBao = "Thêm sản phẩm thành công!";
                require "views/sanpham/themmoi.php";
            } else {
                $thongBao = "Thêm sản phẩm thất bại!";
                require "views/sanpham/themmoi.php";
            }
        }
    }
    public function sua()
    {
        if (isset($_GET['id'])) {
            $MaSP = $_GET['id'];
            $data = ['sanpham' => SanPham::GetById($MaSP)];
            $this->render('sua', $data);
        }
    }
    public function edit()
    {
        $maSanPham = $_POST['maSanPham'];
        $tenSanPham = $_POST['tenSanPham'];
        $soLuong = $_POST['soLuong'];
        $danhMuc = $_POST['danhMuc'];
        $giaBan = $_POST['giaBan'];
        $NhaXB = $_POST['NhaXB'];
        $moTa = $_POST['moTa'];

        $hinhAnh = '';
        if (isset($_FILES['anhSanPham']) && $_FILES['anhSanPham']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'public/images/img-sanpham/';
            $uploadFile = $uploadDir . basename($_FILES['anhSanPham']['name']);

            if (move_uploaded_file($_FILES['anhSanPham']['tmp_name'], $uploadFile)) {
                $hinhAnh = $uploadFile;
            }
        } else {
            $hinhAnh = $_POST['hinhAnhCu'];
        }

        $result = SanPham::Update($maSanPham, $tenSanPham, $soLuong, $giaBan, $moTa, $NhaXB, $hinhAnh, $danhMuc);

        if ($result > 0) {
            $thongBao = 1;
            header("Location: index.php?controller=sanpham&action=sua&id=" . $maSanPham . "&thongBao=" . $thongBao);
        } else {
            $thongBao = 0;
            header("Location: index.php?controller=sanpham&action=sua&id=" . $maSanPham . "&thongBao=" . $thongBao);
        }
    }
    public function delete()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);

            if (isset($data['productId'])) {
                $MaSP = $data['productId'];

                $result = SanPham::Delete($MaSP);

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
    public function error()
    {
        $this->render('error');
    }
}