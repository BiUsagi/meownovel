<?php
require 'vendor/autoload.php';
require_once('controllers/baseController.php');

use models\SanPham;

class homeController extends BaseController
{
  function __construct()
  {
    $this->folder = null;
  }

  public function index()
  {
    $data = ['sanpham' => SanPham::TatCaSanPham()];
    $this->render('home', $data);
  }

  public function lienhe()
  {
    $this->render('lienhe');
  }
  public function gioithieu()
  {
    $this->render('gioithieu');
  }
  public function error()
  {
    $this->render('error');
  }
}