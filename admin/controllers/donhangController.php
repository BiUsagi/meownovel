<?php
require_once('controllers/baseController.php');

class donhangController extends BaseController
{
    function __construct()
    {
        $this->folder = 'donhang';
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