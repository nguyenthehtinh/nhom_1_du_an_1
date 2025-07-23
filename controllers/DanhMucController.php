<?php


class DanhMucsController
{
    public $modelDanhMuc;
    public function __construct(){
        $this->modelDanhMuc = new DanhMucs();
    }


    // hàm hiển thị danh sách 
    public function DanhMuc(){
        // lấy dữ liệu người dùng
        $danhMucs = $this->modelDanhMuc->getDanhMuc();
        // var_dump($danhMucs);die;
        // require_once "./views/layout/header.php";
        return $danhMucs;
  
    }

}