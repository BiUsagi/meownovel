<?php
session_start();
require 'vendor/autoload.php';
require_once('controllers/baseController.php');

use models\TaiKhoan;

class taikhoanController extends BaseController
{
    function __construct()
    {
        $this->folder = 'taikhoan';
    }

    public function index()
    {
        $data = ['taikhoan' => TaiKhoan::TatCaTaiKhoan()];
        $this->render('index', $data);
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


    public function error()
    {
        $this->render('error');
    }
}