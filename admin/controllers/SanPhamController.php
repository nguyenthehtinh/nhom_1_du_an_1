
<?php

class SanPhamController
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct(){
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        
    }


    // hàm hiển thị danh sách 
    public function index(){
        // lấy dữ liệu người dùng
        $sanPhams = $this->modelSanPham->getAllSanPham();
        // var_dump($sanPhams);
        require_once "./views/sanpham/list_san_pham.php";
    }
    // serach
    public function search()
    {
        // lấy dữ liệu từ yêu cầu (request)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $keyword = $_POST['keyword'];
            $sanPhamModel = new SanPham();
            $sanPhams = $sanPhamModel->searchSanPham($keyword);

            // var_dump($trangThai);
        }

        // tìm kiếm danh mục liên hệ
        $this->modelSanPham->searchSanPham($keyword);

        // hiển thị kết quả tìm kiếm
        require_once "./views/sanpham/list_san_pham.php";
    }
        

    // ham hien thi form them
    public function create(){

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once "./views/sanpham/add_san_pham.php";
        unset($_SESSION['errors']);
    }

    // ham xu ly form them 
    public function postcreate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ten_san_pham = $_POST["ten_san_pham"] ?? '';
            $danh_muc_id = $_POST["danh_muc_id"] ?? '';
            $gia_ban = $_POST["gia_ban"] ?? '';
            $gia_khuyen_mai = $_POST["gia_khuyen_mai"] ?? '';
            $so_luong = $_POST["so_luong"] ?? '';
            $ngay_nhap = $_POST["ngay_nhap"] ?? '';
            $mo_ta = $_POST["mo_ta"];
            $trang_thai = $_POST["trang_thai"] ?? '';

            $hinh_anh = $_FILES["hinh_anh"] ?? NULL;

            $file_thumb = uploadFile($hinh_anh,'./uploads/');


            $img_array = $_FILES["img_array"];




            
            // var_dump($trangThai);


        }

        // varlidate
        $errors = [];
        if(empty($ten_san_pham)){
            $errors["ten_san_pham"] = "Vui Lòng Nhập Tên Sản Phẩm";
        }
        if(empty($gia_ban)){
            $errors["gia_ban"] = "Vui Lòng Nhập Giá Bán";
        }
        if(empty($so_luong)){
            $errors["so_luong"] = "Vui Lòng Nhập Số Lượng";
        }
        if(empty($mo_ta)){
            $errors["mo_ta"] = "Vui Lòng Nhập Mô Tả";
        }
        if(empty($ngay_nhap)){
            $errors["ngay_nhap"] = "Vui Lòng Chọn Ngày Nhập";
        }
        $_SESSION['errors']=$errors;


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $san_pham_id = $this->modelSanPham->createSanPham($ten_san_pham,$danh_muc_id,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai,$file_thumb);
            if(!empty($img_array['name'])){
                
                foreach ($img_array['name'] as $key => $value){
                    $file = [
                    'name' => $img_array['name'][$key],
                    'type' => $img_array['type'][$key],
                    'tmp_name' => $img_array['tmp_name'][$key],
                    'error' => $img_array['error'][$key],
                    'size' => $img_array['size'][$key]
                    ];
                    $link_hinh_anh = uploadFile($file,'./uploads/');
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$link_hinh_anh);
                }
                
            }
            unset($_SESSION['errors']);

            header("Location: ?act=san-phams");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['flash'] = true;
            header("Location: ?act=form-them-san-pham");
            exit();
        }
    }

    // ham hien thi form sua
    public function formEditSanPham()
    {
        // Hàm này dùng để hiển thị form nhập
        // Lấy ra thông tin của sản phẩm cần sửa
        $id = $_GET['san_pham_id'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // var_dump($sanPham);die;
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './views/sanpham/edit_san_pham.php';
            unset($_SESSION['errors']);
        } else {
            header("Location: ?act=san-phams");
            exit();
        }
    }
    public function postEditSanPham()
    {
        // Hàm này dùng để xử lý thêm dữ liệu

        // Kiểm tra xem dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            // Lấy a dữ liệu cũ của sản phẩm
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // Truy vấn
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vu cho sửa ảnh\

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Tạo 1 mảng trống để chứa dữ liệu
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm phảm chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm phảm chọn';
            }

            $_SESSION['errors'] = $errors;
            // var_dump($errors);die;

            // Logic sửa ảnh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
// upload ảnh mới lên
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)){
                    // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            // Nếu ko có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu ko có lỗi thì tiến hành thêm sản phẩm
                // var_dump('Oke');die;

                $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);

                // var_dump($new_file);die;

                header("Location: ?act=san-phams");
                exit();
            } else {
                // Trả về form và lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: ?act=form-sua-san-pham&san_pham_id=" . $san_pham_id);
                exit();
            }
        }
    }
    public function postEditAnhSanPham()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            // Lấy dánh sách ảnh hiện tại của sản phẩm
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            // Xử lý các ảnh được gửi từ form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            // Khai báo mảng để lưu ảnh thêm mới hoặc thay thế ảnh cũ
            $upload_file = [];

            // Upload ảnh mới hoặc thay thế ảnh cũ
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }
            // Lưu ảnh mới vào db và xóa ảnh cũ nếu có
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];

                    // Cập nhật ảnh cũ
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    // Xóa ảnh cũ
                    deleteFile($old_file);
                } else {
                    // Thêm ảnh mới
            $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }
            // Xủa lý xóa ảnh
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    // Xóa ảnh trong db
                    $this->modelSanPham->destroyAnhSanPham($anh_id); 

                    // Xóa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("Location: ?act=san-phams");
            exit();
        }
    }

    // ham xoa danh muc trong csdl
    public function destroy(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["san_pham_id"];
            // xóa danh mục
            $this->modelSanPham->deleteSanPham($id);
            header("Location: ?act=san-phams");
            exit();

        }
    }
    public function detailSanPham()
    {
        // Hàm này dùng để hiển thị form nhập
        // Lấy ra thông tin của sản phẩm cần sửa
        $id = $_GET['san_pham_id'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // var_dump($sanPham);die;
        $listAnhSanPham =  $this->modelSanPham->getListAnhSanPham($id);
        // var_dump($listAnhSanPham);die;
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        
        $listDanhGia = $this->modelSanPham->getDanhGiaFromSanPham($id);
        $diemDanhGia = $this->modelSanPham->diemDanhGia($id);
        
        // var_dump($diemDanhGia);die;

        if ($sanPham) {
            require_once './views/sanpham/detail_san_pham.php';
        } else {
            header("Location: ?act=san-phams");
            exit();
        }
    }
    

}







?>