<?php
class routes
{
  private $controllers = [
    'home' => ['home', 'index', 'baocao'],
    'sanpham' => ['index', 'themmoi', 'sua', 'create', 'edit', 'delete'],
    'danhmuc' => ['index', 'themmoi', 'sua', 'create', 'edit', 'delete'],
    'taikhoan' => ['index'],
    'donhang' => ['index', 'themmoi', 'sua', 'xoa', 'create', 'edit', 'delete', 'chitietdonhang']
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