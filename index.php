<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// var_dump($_SESSION['user_client']['vai_tro']);die;
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ
require_once './commons/Exception.php';
require_once './commons/PHPMailer.php';
require_once './commons/SMTP.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
//require_once './controllers/LienHeController.php';
//require_once './controllers/TintucController.php';
require_once './controllers/BannerController.php';
//require_once './controllers/NguoiDungController.php';
require_once './controllers/DanhMucController.php';
require_once './controllers/SanPhamController.php';
// require_once './controllers/KhuyenMaiController.php';
// require_once './controllers/BinhLuanController.php';
// require_once './controllers/GioHangController.php';
// require_once './controllers/DonHangController.php';


// Require toàn bộ file Models
//require_once './models/Lienhe.php';
//require_once './models/Tintuc.php';
require_once './models/Banner.php';
//require_once './models/NguoiDung.php';
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';
require_once './models/SanPham.php';
// require_once './models/BinhLuan.php';
// require_once './models/KhuyenMai.php';
// require_once './models/GioHang.php';
// require_once './models/DonHang.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo đảm tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),


    'list-san-pham'         => (new SanPhamController())->index(),
 
    // Load thêm sản phẩm
    'load-more-products' => (new HomeController())->loadMoreProducts(),
    // detail sản phẩm
    'chi-tiet-san-pham' => (new SanPhamController())->chiTietSanPham(),

    // Liên hệ
    'form-lien-he'      => (new LienHeControler())->index(),
    'gui-thong-tin'     => (new LienHeControler())->guilienhe(),

    // Tin tức
    'list-tin-tucs'     => (new TintucController())->index(),
    'chi-tiet-tin-tuc'   => (new TintucController())->chiTiet(),

    //bình luận
    'dang-binh-luan' => (new BinhLuanController())->postBinhLuan(),

    // Đăng nhập
    'login'               => (new NguoiDungController())->formLogin(),
    'check-login'         => (new NguoiDungController())->login(),


    //đky
    'dang-ky'             => (new NguoiDungController())->dangKy(),
    'post-dang-ky'             => (new NguoiDungController())->postcreate(),


    //khuyến mãi
    'form-khuyen-mai'     =>(new KhuyenMaiController())->index(),
    






    // giỏ hàng 
    'them-gio-hang' => (new GioHangController())->addGioHang(),
    'gio-hang'=> (new GioHangController())->gioHang(),
    'xoa-san-pham-gio-hang'   => (new GioHangController())->DeleteSpGioHang(),


   // thanh toán 
   'thanh-toan'=> (new GioHangController())->thanhToan(),
   'thanh-toan-khuyen-mai'=> (new GioHangController())->thanhToanKhuyenMai(),
   'xu-ly-thanh-toan'=> (new GioHangController())->postThanhToan(),
   'thong-bao' => (new GioHangController())->thongBao(),


   // tài khoản của tôi
   'my-account'          => (new NguoiDungController())->myAccount(),
   'cap-nhat-tai-khoan'          => (new NguoiDungController())->capNhatTaiKhoan(),
   'doi-mat-khau'          => (new NguoiDungController())->doiMatKhau(),
   
   'post-edit-mat-khau'          => (new NguoiDungController())->postEditMatKhau(),
    'list-don-hang'        => (new NguoiDungController())->listDonHang(),
    'huy-don-hang'        => (new DonHangController())->huyDonHang(),
    'hoan-don-hang'        => (new DonHangController())->hoanDonHang(),
    'xac-nhan'        => (new DonHangController())->xacNhan(),
   'chi-tiet-don-hang' => (new DonHangController())->chiTietDonHang(), 
};
