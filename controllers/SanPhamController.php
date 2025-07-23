<?php
class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new SanPhams();
        $this->modelDanhMuc = new DanhMucs();
    }

    public function index()
{
    // Lấy các tham số từ URL
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $sortby = isset($_GET['xep']) ? $_GET['xep'] : 'newest'; 
    $danhMucId = isset($_GET['danh_muc_id']) ? $_GET['danh_muc_id'] : null;
    $priceFrom = isset($_GET['tu']) ? $_GET['tu'] : null;
    $priceTo = isset($_GET['den']) ? $_GET['den'] : null;
    $search = isset($_GET['search']) ? trim($_GET['search']) : null;

    // Số lượng sản phẩm trên mỗi trang
    $limit = 15;

    // Xử lý lọc theo danh mục và sắp xếp theo giá hoặc theo id
    if ($search) {
        $sanPhams = $this->modelSanPham->searchSanPham($search, $priceFrom, $priceTo, $page, $limit, $sortby);
        // var_dump($sanPhams);die;
        $totalItems = $this->modelSanPham->getTotalItemsBySearch($search, $priceFrom, $priceTo);
    } else {
        // Nếu không có tìm kiếm, lấy sản phẩm theo các điều kiện khác
        if ($danhMucId) {
        // Lọc theo danh mục và phân trang
        $sanPhams = $this->modelSanPham->getSanPhamByDanhMucAndPrice($danhMucId, $priceFrom, $priceTo, $page, $limit, $sortby);
        $totalItems = $this->modelSanPham->getTotalItemsByDanhMucAndPrice($danhMucId, $priceFrom, $priceTo); // Tổng số sản phẩm trong danh mục
        $tenDanhMuc = $this->modelSanPham->getTenDanhMuc($danhMucId);
    } else {
        // Lấy tất cả sản phẩm nếu không có danh mục
        $sanPhams = $this->modelSanPham->getAllSanPhamWithPrice($priceFrom, $priceTo, $page, $limit, $sortby);
        $totalItems = $this->modelSanPham->getTotalItemsWithPrice($priceFrom, $priceTo); // Tổng số sản phẩm
    }

    }
    
    // Tính tổng số trang
    $totalPages = ceil($totalItems / $limit);

    // Tính các trang gần nhất (chỉ hiển thị tối đa 3 trang)
    $paginationRange = range(max(1, $page - 1), min($totalPages, $page + 1));

    // Lấy tất cả danh mục
    $danhMucs = $this->modelSanPham->getAllDanhMuc();

    // Truyền dữ liệu vào view
    require_once "./views/sanpham/list_san_pham.php";
}

public function chiTietSanPham()
{
    // Hàm này dùng để hiển thị form nhập
    // Lấy ra thông tin của sản phẩm cần sửa
    $id = $_GET['id_san_pham'];

    $sanPham = $this->modelSanPham->getDetailSanPham($id);
    // var_dump($sanPham);die;
    $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    // var_dump($listAnhSanPham);die;
    $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);

    $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
    // var_dump($listSanPhamCungDanhMuc);die;

    if ($sanPham) {
        require_once './views/sanpham/detail_san_pham.php';
    } else {
        header("Location: " . BASE_URL);
        exit();
    }
}
// serach


}
