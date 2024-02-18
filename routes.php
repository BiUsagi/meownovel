<?php
class routes
{
  private $controllers = [
    'home' => ['home', 'index', 'lienhe', 'gioithieu'],
    'sanpham' => ['index', 'page2', 'chitietsp'],
    'danhmuc' => ['index', 'themmoi', 'sua', 'create', 'edit', 'delete'],
    'taikhoan' => ['dangky', 'dangnhap', 'create', 'login', 'thongtin', 'sua', 'edit', 'doimk', 'resetpass', 'logout'],
    'giohang' => ['index', 'themmoi', 'sua', 'create', 'edit', 'delete']
  ];
  public function checkRoute($controller, $action)
  {
    if (
      !array_key_exists($controller, $this->controllers) ||
      !in_array($action, $this->controllers[$controller])
    ) {
      $this->processRoute('home', 'error');
    } else {
      $this->processRoute($controller, $action);
    }
  }
  public function processRoute($controller, $action)
  {
    include_once('controllers/' . $controller . 'Controller.php');
    $class = $controller . 'Controller';
    $controller = new $class;
    $controller->$action();
  }
}