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
    public function page2()
    {
        $data = ['sanpham' => SanPham::TatCaSanPham()];
        $this->render('page2', $data);
    }
    public function sptheodm()
    {
        $iddm = $_GET['iddm'];
        $data = ['sanpham' => SanPham::SanPhamTheoDanhMuc($iddm)];
        $this->render('sptheodm', $data);
    }
    public function sptheonxb()
    {
        $nxb = $_GET['nxb'];
        $data = ['sanpham' => SanPham::SanPhamTheoNXB($nxb)];
        $this->render('sptheonxb', $data);
    }
    public function chitietsp()
    {
        $this->render('chitietsp');
    }
    public function error()
    {
        $this->render('error');
    }
}