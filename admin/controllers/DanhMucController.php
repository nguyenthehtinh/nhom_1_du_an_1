<?php


class DanhMucController
{
    public $modelDanhMuc;
    public function __construct(){
        $this->modelDanhMuc = new DanhMuc();
    }


    // hàm hiển thị danh sách 
    public function index(){
        // lấy dữ liệu người dùng
        $danhMucs = $this->modelDanhMuc->getAllDanhMuc();
        // var_dump($danhMucs);
        require_once "./views/danhmuc/list_danh_muc.php";
    }
    public function search()
    {
        // lấy dữ liệu từ yêu cầu (request)
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $keyword = $_POST['keyword'];
            $DanhMucModel = new DanhMuc();
            $danhMucs = $DanhMucModel->searchDanhMuc($keyword);

            // var_dump($trangThai);
        }

        // tìm kiếm danh mục 
        $this->modelDanhMuc->searchDanhMuc($keyword);

        // hiển thị kết quả tìm kiếm
        require_once "./views/danhmuc/list_danh_muc.php";
    }

    // ham hien thi form them
    public function create(){
        require_once "./views/danhmuc/add_danh_muc.php";
        unset($_SESSION['errors']);
    }

    // ham xu ly form them 
    public function postcreate(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $ten_danh_muc = $_POST["ten_danh_muc"];
            $trang_thai = $_POST["trang_thai"];
            // var_dump($trangThai);
        }

        // varlidate
        $errors = [];
        if(empty($ten_danh_muc)){
            $errors["ten_danh_muc"] = "Vui Lòng Nhập Tên Danh Mục";
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelDanhMuc->createDanhMuc($ten_danh_muc,$trang_thai);
            unset($_SESSION['errors']);
            header("Location: ?act=danh-mucs");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            header("Location:?act=form-them-danh-muc");
            exit();
        }
    }

    // ham hien thi form sua
    public function edit(){
        // lấy id
        $id = $_GET['danh_muc_id'];

        // Lây thông tin chi tiết cảu danh mục
        $danhMuc = $this->modelDanhMuc->getDetailData($id);

        // echo $danhMuc["tenDanhMuc"];
        require_once "./views/danhmuc/edit_danh_muc.php";
        unset($_SESSION['errors']);
    }

    //ham xu ly form sua
    public function postedit(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id"];
            $ten_danh_muc = $_POST["ten_danh_muc"];
            $trang_thai = $_POST["trang_thai"];
            // var_dump($trangThai);
        }

        // varlidate
        $errors = [];
        if(empty($ten_danh_muc)){
            $errors["ten_danh_muc"] = "Vui Lòng Nhập Tên Danh Mục";
        }


        // Thêm dữ liệu
        if(empty($errors)){
            // nếu không co lỗi thì thêm dữ liệu
            // thêm vào csdl
            $this->modelDanhMuc->editDanhMuc($id,$ten_danh_muc,$trang_thai);
            unset($_SESSION['errors']);
            header("Location: ?act=danh-mucs");
            exit();
        }else{
            // nếu có lỗi thì nhập lại
            $_SESSION['errors'] = $errors;
            header("Location: ?act=form-sua-danh-muc&danh_muc_id=$id");
            exit();
        }
    }

    // ham xoa danh muc trong csdl
    public function destroy(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["danh_muc_id"];
            // xóa danh mục
            $this->modelDanhMuc->deleteDanhMuc($id);
            header("Location: ?act=danh-mucs");
            exit();

        }
    }

}







?>