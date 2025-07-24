<?php
require_once __DIR__ . '/../models/Dashboard.php';
class DashboardController {

    public $modelDashboard;

    public function __construct()
    {
        $this->modelDashboard = new Dashboard();
    }

    public function index() {
        $tongThuNhapNgay            = $this->modelDashboard->layTongThuNhapHomNay();
        $soLuongDonHangHomNay       = $this->modelDashboard->demSoLuongDonHangHomNay();
        $soLuongKhachHangHomNay     = $this->modelDashboard->demSoLuongKhachHangHomNay();
        $soLuongLienHeHomNay        = $this->modelDashboard->demSoLuongLienHeHomNay();
        $soLuongKMHomNay            = $this->modelDashboard->demSoLuongKhuyenMaiHomNay();
        $soLuongDGHomNay            = $this->modelDashboard->demSoLuongDanhGiaHomNay();


        
        $soLuongKhachHang           = $this->modelDashboard->demSoLuongKhachHang();
        $tongSoLuongDonHang         = $this->modelDashboard->thongKeTongDonHang();
        $thuNhap                    = $this->modelDashboard->thongKeTongTien();
        $hoanTien                   = $this->modelDashboard->thongKeHoanTien();
        $donHoanHuy                 = $this->modelDashboard-> thongKeTongDonHangHoanTra();
        $sanPham                    = $this->modelDashboard-> thongKeSanPham();
        $baiViet                    = $this->modelDashboard-> thongKeBaiViet();
        $danhGia                    = $this->modelDashboard-> thongKeDanhGia();



        $donHangThang               = $this->modelDashboard->soLuongDonHangTheoThang();
        // var_dump($donHangThang);die;
        $tienHangThang              = $this->modelDashboard->tongTienTheoThang();
        $khachHangThang             = $this->modelDashboard->soNguoiDungMoiTheoThang();


        $donHangThangData = array_column($donHangThang, 'tong_so_don_hang');
        $tienHangThangData = array_column($tienHangThang, 'tong_tien');
        $khachHangThangData = array_column($khachHangThang, 'tong_nguoi_dung_moi');


         // Mảng chứa dữ liệu JSON
        $data = [
            'donHangThang' => $donHangThangData,
            'tienHangThang' => $tienHangThangData,
            'khachHangThang' => $khachHangThangData
        ];

        // Chuyển dữ liệu thành JSON để gửi tới View
        $jsonData = json_encode($data);


        $sanPhamYeuThich = $this->modelDashboard->getSPYT();

        // var_dump($khachHangThang);die;

        require_once "./views/dashboard.php";

    }
}