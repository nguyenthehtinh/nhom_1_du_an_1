<?php

class Banner 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getAllBanner(){
        try {
            //code...
            $sql = 'SELECT  * FROM banners
            ORDER BY id DESC';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
     // Tìm kiếm
     public function searchBanner($keyword)
     {
   $sql = "SELECT * FROM banners WHERE ten_banner LIKE ? ";
   $stmt = $this->conn->prepare($sql);
   $stmt->bindValue(1, "%$keyword%");


   try {
       $stmt->execute();
       $lienHes = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $lienHes;
   } catch (PDOException $e) {
       echo "Error: " . $e->getMessage();
       return []; // Return an empty array to avoid errors in the view
   }
     }
    public function createBanner($ten_banner,$file_thumb){
        try {
            //code...
            $sql = 'INSERT INTO  banners (ten_banner,hinh_anh)
                    VALUES (:ten_banner,:hinh_anh)';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':ten_banner',$ten_banner);
            $stmt->bindParam(':hinh_anh',$file_thumb);


            $stmt->execute();
            // laays id sp vua them
            // return $this->conn->lastInsertId();
            return true;
            
        } catch (PDOException $e) {
            echo 'Lỗi: '. $e->getMessage();
        }
    }
         public function deleteBanner($id){
        try {
            //code...
            $sql = 'DELETE FROM banners WHERE id= :id';

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);

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