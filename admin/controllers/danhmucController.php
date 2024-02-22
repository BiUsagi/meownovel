<?php
session_start();
require_once('controllers/baseController.php');
require 'vendor/autoload.php';

use models\DanhMuc;
use models\TaiKhoan;

class danhmucController extends BaseController
{
  function __construct()
  {
    $this->folder = 'danhmuc';
  }
  public function index()
  {
    $data = ['danhmuc' => DanhMuc::TatCaDanhMuc()];
    $this->render('index', $data);
  }
  public function themmoi()
  {
    $this->render('themmoi');
  }

  public function create()
  {
    if (isset($_POST['submit'])) {
      $TenDM = $_POST['tenDanhMuc'];
      $NgayTao = date('Y-m-d H:i:s');

      if (DanhMuc::Create($TenDM, $NgayTao) > 0) {
        $thongBao = "Thành Công!!";
        require "views/danhmuc/themmoi.php";
      } else {
        $thongBao = "Thất bại";
        require "views/danhmuc/themmoi.php";
      }

    }
  }

  public function sua()
  {
    if (isset($_GET['id'])) {
      $MaDM = $_GET['id'];
      $data = ['danhmuc' => DanhMuc::GetById($MaDM)];
      $this->render('sua', $data);
    }
  }
  public function edit()
  {
    if (isset($_POST['submit'])) {
      $MaDM = $_POST['maDanhMuc'];
      $TenDM = $_POST['tenDanhMuc'];

      $result = DanhMuc::Update($MaDM, $TenDM);

      if ($result) {
        $thongBao = 1;
        header("Location: index.php?controller=danhmuc&action=sua&id=" . $MaDM . "&thongBao=" . $thongBao . "");

      } else {
        $thongBao = 0;
        header("Location: index.php?controller=danhmuc&action=sua&id=" . $MaDM . "&thongBao=" . $thongBao . "");
      }
    }
  }
  public function xoa()
  {
    $this->render('xoa');
  }

  public function delete()
  {
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = json_decode(file_get_contents('php://input'), true);

      if (isset($data['DanhMuc'])) {
        $MaDM = $data['DanhMuc'];

        $result = DanhMuc::Delete($MaDM);

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