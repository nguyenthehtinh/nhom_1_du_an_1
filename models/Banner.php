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
            $sql = 'SELECT  * FROM banners';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
            
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