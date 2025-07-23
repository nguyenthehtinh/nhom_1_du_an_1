


<?php

class BannerController
{

    public $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new Banner();
    }

    // hàm hiển thị danh sách 
    public function index()
    {
        // lấy dữ liệu người dùng
        $Banners = $this->modelBanner->getAllBanner();
        return $Banners;
        
    }





}

?>