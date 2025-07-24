<?php 
session_start();
//date_default_timezone_set('Asia/Hà Nội');
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/SanPhamController.php';
require_once 'controllers/DanhMuclienheController.php';
require_once 'controllers/BannerController.php';
//require_once 'controllers/TintucController.php';
//require_once 'controllers/DonHangController.php';
// require_once 'controllers/NguoiDungController.php';
// require_once 'controllers/TrangThaiDonHangController.php';
// require_once 'controllers/KhuyenMaiController.php';
// require_once 'controllers/BinhLuanController.php';
// require_once 'controllers/DanhGiaController.php';


// Require toàn bộ file Models
require_once 'models/Dashboard.php';
require_once 'models/DanhMuc.php';
require_once 'models/SanPham.php';
//require_once 'models/Lienhe.php';
require_once 'models/Banner.php';
// require_once 'models/Tintuc.php';
// require_once 'models/DonHang.php';
// require_once 'models/NguoiDung.php';
// require_once 'models/TrangThaiDonHang.php';
// require_once 'models/KhuyenMai.php';
// require_once 'models/BinhLuan.php';
// require_once 'models/DanhGia.php';



// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'login-admin' && $act !== 'check-login-admin') {
  checkLoginAdmin();
}

match ($act) {
    // Dashboards
    '/'=> (new DashboardController())->index(),


    // route danh mục
    'danh-mucs'                                 => (new DanhMucController())->index(),
    'form-them-danh-muc'                        => (new DanhMucController())->create(),
    'post-them-danh-muc'                        => (new DanhMucController())->postcreate(),
    'form-sua-danh-muc'                         => (new DanhMucController())->edit(),
    'post-sua-danh-muc'                         => (new DanhMucController())->postedit(),
    'xoa-danh-muc'                              => (new DanhMucController())->destroy(),                        
    'search-danh-muc'                           => (new DanhMucController())->search(),
    
    
    // route sản phẩm
    'san-phams'                                 => (new SanPhamController())->index(),
    'form-them-san-pham'                        => (new SanPhamController())->create(),
    'post-them-san-pham'                        => (new SanPhamController())->postcreate(),
    'form-sua-san-pham'                         => (new SanPhamController())->formEditSanPham(),
    'post-sua-san-pham'                         => (new SanPhamController())->postEditSanPham(),
    'xoa-san-pham'                              => (new SanPhamController())->destroy(),
    'search-san-pham'                           => (new SanPhamController())->search(),
    'chi-tiet-san-pham'                         => (new SanPhamController())->detailSanPham(),
    'sua-album-anh-san-pham'                    => (new SanPhamController())->postEditAnhSanPham(),


    // route liên hệ
    // 'lien-hes'                                  => (new DanhMuclienheController())->index(),
    // 'search-lien-he'                            => (new DanhMuclienheController())->search(),
    // 'form-sua-lien-he'                          => (new DanhMuclienheController())->edit(),
    // 'post-sua-lien-he'                          => (new DanhMuclienheController())->postedit(),
    
    // banners
    'banners'                                   => (new BannerController())->index(),
    'form-them-banner'                          => (new BannerController())->create(),
    'post-them-banner'                          => (new BannerController())->postcreate(),
    'xoa-banner'                                => (new BannerController())->destroy(),
    'search-banner'                             => (new BannerController())->search(),
    
    // route tin tức
    // 'tin-tucs'                                  => (new TinTucController())->index(),
    // 'form-them-tin-tuc'                         => (new TinTucController())->create(),
    // 'post-them-tin-tuc'                         => (new TinTucController())->postcreate(),
    // 'form-sua-tin-tuc'                          => (new TinTucController())->edit(),
    // 'post-sua-tin-tuc'                          => (new TinTucController())->postedit(),
    // 'xoa-tin-tuc'                               => (new TinTucController())->destroy(),
    // 'search-tin-tuc'                            => (new TinTucController())->search(),
    
    // route trạng thái đơn hàng
    // 'trang-thai-don-hangs'                      => (new TrangThaiController())->index(),
    // 'form-them-trang-thai-don-hang'             => (new TrangThaiController())->create(),
    // 'post-them-trang-thai-don-hang'             => (new TrangThaiController())->postcreate(),
    // //'form-sua-trang-thai-don-hang'            => (new TrangThaiController())->edit(),
    // //'post-sua-trang-thai-don-hang'            => (new TrangThaiController())->postedit(),                     
    // 'xoa-trang-thai-don-hang'                   => (new TrangThaiController())->destroy(),
    // 'search-trang-thai-don-hang'                => (new TrangThaiController())->search(),
    
    // route dơn hàng
  //   'don-hangs'                                 => (new DonHangController())->index(),
  //  'form-sua-don-hang'                          => (new DonHangController())->formEditDonHang(),
  //   'sua-don-hang'                              => (new DonHangController())->postEditDonHang(),
  //   'chi-tiet-don-hang'                         => (new DonHangController())->detailDonHang(),
  //   'search-don-hang'                           => (new DonHangController())->search(),

    // route tài khoản 
    // 'nguoi-dungs'                               => (new NguoiDungController())->index(),
    // 'chi-tiet-nguoi-dung'                       => (new NguoiDungController())->getDetail(),
    // 'search-nguoi-dung'                         => (new NguoiDungController())->search(),
    // 'form-sua-nguoi-dung'                       => (new NguoiDungController())->edit(),
    // 'sua-nguoi-dung'                       => (new NguoiDungController())->postEdit(),

    // route  khuyến mãi
    // 'khuyen-mais'                               => (new KhuyenMaiController())->index(),
    // 'form-them-khuyen-mai'                      => (new KhuyenMaiController())->create(),
    // 'post-them-khuyen-mai'                      => (new KhuyenMaiController())->postcreate(),
    // 'form-sua-khuyen-mai'                       => (new KhuyenMaiController())->edit(),
    // 'post-sua-khuyen-mai'                       => (new KhuyenMaiController())->postedit(),
    // 'xoa-khuyen-mai'                            => (new KhuyenMaiController())->destroy(),
    // 'search-khuyen-mai'                         => (new KhuyenMaiController())->search(),
    // 'khuyen-mai-cap-nhat-ngay'                  => (new KhuyenMaiController())->editTrangThai(),



    // login
    // check login
      // 'login-admin'                             =>(new NguoiDungController())->formLogin(),
      // 'check-login-admin'                       =>(new NguoiDungController())->login(),


      
      // route bình luận
      // 'binh-luans'                              => (new BinhLuanController())->index(),
      // 'xoa-binh-luan'                           => (new BinhLuanController())->destroy(),
      // 'search-binh-luan'                        => (new BinhLuanController())->search(),
      
      // route đánh giá
      // 'danh-gias'                               => (new DanhGiaController())->index(),
      // 'xoa-danh-gia'                            => (new DanhGiaController())->destroy(),
      // 'search-danh-gia'                         => (new DanhGiaController())->search(),
    
    // Default case - xử lý tất cả các trường hợp không khớp
    default                                   => (new DashboardController())->index(),




    
};