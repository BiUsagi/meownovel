<?php
require_once('controllers/baseController.php');
require "vendor/autoload.php";

use models\GioHang;

class donhangController extends BaseController
{
    function __construct()
    {
        $this->folder = 'donhang';
    }

    public function index()
    {
        $data = ['donhang' => GioHang::TatCaDonHangR()];
        $this->render('index', $data);
    }
    public function chitietdonhang()
    {
        $this->render('chitietdonhang');
    }

    public function error()
    {
        $this->render('error');
    }
}