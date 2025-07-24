<?php

class DanhMuc 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getAllDanhMuc(){
        try {
            //code...
            $sql = 'SELECT  * FROM danh_mucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
       public function searchDanhMuc($keyword)
    {
  $sql = "SELECT * FROM danh_mucs WHERE ten_danh_muc LIKE ?";
  $stmt = $this->conn->prepare($sql);
  $stmt->bindValue(1, "%$keyword%");

  try {
      $stmt->execute();
      $danhMucs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $danhMucs;
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return []; // Return an empty array to avoid errors in the view
  }
    }
    // thêm danh mục
    public function createDanhMuc($ten_danh_muc,$trang_thai){
        try {
            //code...
            $sql = 'INSERT INTO  danh_mucs (ten_danh_muc,trang_thai)
                    VALUES (:ten_danh_muc, :trang_thai)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_danh_muc',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }

    // xóa danh mục
     public function deleteDanhMuc($id){
        try {
            //code...
            $sql = 'DELETE FROM danh_mucs WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    // sửa danh mục
    // lấy thông tin chi tiết
    public function getDetailData($id){
        try {
            //code...
            $sql = 'SELECT * FROM danh_mucs WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function editDanhMuc($id,$ten_danh_muc,$trang_thai){
        try {
            //code...
            $sql = 'UPDATE  danh_mucs SET ten_danh_muc = :ten_danh_muc , trang_thai = :trang_thai WHERE id= :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':ten_danh_muc',$ten_danh_muc);
            $stmt->bindParam(':trang_thai',$trang_thai);

            $stmt->execute();

            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }



    // huy ket noi csdl
    public function  __destruct()
    {
        $this->conn = null;
    }
}




?>