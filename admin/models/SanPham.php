<?php

class SanPham
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach san pham
    public function getAllSanPham (){
        try {
            //code...
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    ORDER BY id DESC
';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    // tìm kiếm
    public function searchSanPham($keyword)
      {
    $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.ten_san_pham LIKE ?    
               OR danh_mucs.ten_danh_muc LIKE ?
               OR san_phams.gia_ban LIKE ?
               ORDER BY san_phams.id DESC";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindValue(1, "%$keyword%");
    $stmt->bindValue(2, "%$keyword%");
    $stmt->bindValue(3, "%$keyword%");


    try {
        $stmt->execute();
        $sanPhams = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sanPhams;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return []; 
    }
      }

    //thêm sản phẩm
    public function createSanPham($ten_san_pham,$danh_muc_id,$gia_ban,$gia_khuyen_mai,$so_luong,$ngay_nhap,$mo_ta,$trang_thai,$hinh_anh){
        try {
            //code...
            $sql = 'INSERT INTO  san_phams (ten_san_pham,danh_muc_id,gia_ban,gia_khuyen_mai,so_luong,ngay_nhap,mo_ta,trang_thai,hinh_anh)
                    VALUES (:ten_san_pham,:danh_muc_id,:gia_ban,:gia_khuyen_mai,:so_luong,:ngay_nhap,:mo_ta,:trang_thai,:hinh_anh)';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':ten_san_pham',$ten_san_pham);
            $stmt->bindParam(':danh_muc_id',$danh_muc_id);
            $stmt->bindParam(':gia_ban',$gia_ban);
            $stmt->bindParam(':gia_khuyen_mai',$gia_khuyen_mai);
            $stmt->bindParam(':so_luong',$so_luong);
            $stmt->bindParam(':ngay_nhap',$ngay_nhap);
            $stmt->bindParam(':mo_ta',$mo_ta);
            $stmt->bindParam(':trang_thai',$trang_thai);
            $stmt->bindParam(':hinh_anh',$hinh_anh);


            $stmt->execute();
            // laays id sp vua them
            return $this->conn->lastInsertId();
            // return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
        public function insertAlbumAnhSanPham($san_pham_id,$link_hinh_anh){
        try {
            //code...
            $sql = 'INSERT INTO  hinh_anh_san_phams (san_pham_id,link_hinh_anh)
                    VALUES (:san_pham_id,:link_hinh_anh)';

            $stmt = $this->conn->prepare($sql);
            


            $stmt->execute([
                'san_pham_id' => $san_pham_id,
                'link_hinh_anh' => $link_hinh_anh,

            ]);
           
            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }

    // xóa danh mục
     public function deleteSanPham($id){
        try {
            //code...
            $sql = 'DELETE FROM san_phams WHERE id= :id';

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
            $sql = 'SELECT * FROM san_phams WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
    public function getListAnhSanPham($id){
        try {
            //code...
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetchAll();

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();
        }
    }
public function updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $hinh_anh)
    {
        try {
            $sql = 'UPDATE san_phams SET
            ten_san_pham = :ten_san_pham,
            gia_ban = :gia_ban,
            gia_khuyen_mai = :gia_khuyen_mai,
            so_luong = :so_luong,
            ngay_nhap = :ngay_nhap,
            danh_muc_id = :danh_muc_id,
            trang_thai = :trang_thai,
            mo_ta = :mo_ta,
            hinh_anh = :hinh_anh
            WHERE id = :id';
            // var_dump($hinh_anh);die;


            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$san_pham_id);
            $stmt->bindParam(':ten_san_pham',$ten_san_pham);
            $stmt->bindParam(':danh_muc_id',$danh_muc_id);
            $stmt->bindParam(':gia_ban',$gia_san_pham);
            $stmt->bindParam(':gia_khuyen_mai',$gia_khuyen_mai);
            $stmt->bindParam(':so_luong',$so_luong);
            $stmt->bindParam(':ngay_nhap',$ngay_nhap);
            $stmt->bindParam(':mo_ta',$mo_ta);
            $stmt->bindParam(':hinh_anh',$hinh_anh);
            $stmt->bindParam(':trang_thai',$trang_thai);

            $stmt->execute();

            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
        public function destroyAnhSanPham($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDetailAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id){
        try {
            //code...
            $sql ='SELECT 
                binh_luans.*, 
                nguoi_dungs.ten_nguoi_dung AS ten_nguoi_dung
            FROM binh_luans
            INNER JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id
            WHERE binh_luans.san_pham_id = :id';
              $stmt = $this->conn->prepare($sql);

              $stmt->execute([':id' => $id]);
  
              return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDanhGiaFromSanPham($id){
        try {
            //code...
            $sql ='SELECT 
                danh_gias.*, 
                nguoi_dungs.ten_nguoi_dung AS ten_nguoi_dung
            FROM danh_gias
            INNER JOIN nguoi_dungs ON danh_gias.nguoi_dung_id = nguoi_dungs.id
            WHERE danh_gias.san_pham_id = :id';
              $stmt = $this->conn->prepare($sql);

              $stmt->execute([':id' => $id]);
  
              return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function diemDanhGia($id){
        try {
            //code...
            $sql ='SELECT AVG(diem_danh_gia) AS diem_trung_binh
                   FROM danh_gias
                   WHERE san_pham_id = :id';
              $stmt = $this->conn->prepare($sql);

              $stmt->execute([':id' => $id]);
              $ketQua = $stmt->fetch();
              return $ketQua['diem_trung_binh'] ?? 0;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
     public function updateSoLuong($san_pham_id, $so_luong_moi) {
    try {
        // Chuẩn bị câu lệnh SQL
        $sql = "UPDATE san_phams SET so_luong = :so_luong WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với các tham số
        $stmt->execute([
            ':id' => $san_pham_id,
            ':so_luong' => $so_luong_moi,
        ]);

        // Kiểm tra kết quả
        if ($stmt->rowCount() > 0) {
            return true; // Thành công
        } else {
            return false; // Không có hàng nào được cập nhật
        }
    } catch (PDOException $e) {
        // Ghi log lỗi hoặc xử lý lỗi nếu cần
        error_log("Cập nhật số lượng thất bại: " . $e->getMessage());
        return false; // Thất bại
    }
}
    


    // huy ket noi csdl
    public function  __destruct()
    {
        $this->conn = null;
    }
}




?>