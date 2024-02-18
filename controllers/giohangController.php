<?php
require_once('controllers/baseController.php');

class giohangController extends BaseController
{
    function __construct()
    {
        $this->folder = 'giohang';
    }

    public function index()
    {
        $this->render('index');
    }
    public function error()
    {
        $this->render('error');
    }
}