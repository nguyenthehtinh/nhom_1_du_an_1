<?php 

class HomeController
{
    public $modelSanPham; 
    public $tinTucModel;


    public function __construct()
    {
        $this->modelSanPham = new SanPhams();
//       $this->tinTucModel = new TinTuc();

    }

    public function index()
    {
        require_once "./views/home.php";
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
//        $tinTucs = $this->tinTucModel->getAllTinTuc();
        $listSanPhamYeuThich = $this->modelSanPham->getSPYeuThich();
        require_once './views/home.php';
    }

    public function loadMoreProducts()
    {
        // Lấy dữ liệu từ yêu cầu AJAX
        $jsonInput = file_get_contents('php://input');
        $data = json_decode($jsonInput, true);

        $offset = isset($data['offset']) ? (int)$data['offset'] : 0;
        $limit = isset($data['limit']) ? (int)$data['limit'] : 4;

        // Gọi model để lấy thêm sản phẩm
        $products = $this->modelSanPham->getSanPhamWithPagination($offset, $limit);

        // Chuẩn bị dữ liệu phản hồi
        $response = [];
        if (!empty($products)) {
            $response['success'] = true;
            $response['products'] = array_map(function ($product) {
                return [
                    'id' => $product['id'],
                    'name' => $product['ten_san_pham'],
                    'imageUrl' => BASE_URL . $product['hinh_anh'],
                    'detailUrl' => BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $product['id'],
                    'originalPrice' => number_format($product['gia_ban'], 0, ',', '.') . 'đ',
                    'discountPrice' => $product['gia_khuyen_mai'] ? number_format($product['gia_khuyen_mai'], 0, ',', '.') . 'đ' : null,
                ];
            }, $products);
        } else {
            $response['success'] = false;
        }

        // Trả phản hồi dưới dạng JSON
        echo json_encode($response);
    }

   
//     public function login() {

//         if($_SERVER['REQUEST_METHOD'] == 'POST'){
//             // lấy mail và pass gửi từ form 
    
//             $email = $_POST['email'];
//             $mat_khau = $_POST['mat_khau'];
    
            
            
//             // xử lý kiểm tra thông tin đăng nhập 
            
//             $user = '2345' ;
//             // $this->modelNguoiDung->checkLogin($email);
            
//             // var_dump($email);die;
            

//         if ($user['email'] == $email ) {
//             // Kiểm tra mật khẩu
//             // if (password_verify($mat_khau, $user['mat_khau'])) {
//             if ($mat_khau === $user['mat_khau']) {
//                 // Kiểm tra vai trò và trạng thái
//                 if ($user['vai_tro'] == 1) {
//                     if ($user['trang_thai'] == 1) {
//                         $_SESSION['user_admin'] = $user;
//                         header("Location: /base_du_an_1/admin/" );
//                         exit;
//                     }else{
//                         $_SESSION['error'] = 'Tài khoản đã bị cấm';
//                         $_SESSION['flash'] = true ;
//                         header("Location:?act=login");
//                         exit;
        
//                     }
//                 }else{
//                     $_SESSION['error'] = 'Tài khoản không có quyền đăng nhập';
//                     $_SESSION['flash'] = true ;
//                     header("Location:?act=login");
//                     exit;
//                 }
//             }else{
//                 $_SESSION['error'] = 'Mật khẩu không chính xác';
//                     $_SESSION['flash'] = true ;
//                     header("Location:?act=login");
//                     exit;
//             }
//         }else{
//             $_SESSION['error'] = 'Email không tồn tại';
//                     $_SESSION['flash'] = true ;
//                     header("Location:?act=login");
//                     exit;
//         }

               
//                     // lỗi thì lưu lỗi vào session
                     
//                     // var_dump($_SESSION['error']); die;
        

//         }
            
    
    
// }



}