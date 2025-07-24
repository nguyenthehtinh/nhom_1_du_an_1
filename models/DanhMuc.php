<?php

class DanhMucs 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }

    // damh sach danh muc 
    public function getDanhMuc() {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE trang_thai = 1 ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
    
            $result = $stmt->fetchAll();
            return $result ?: []; // Trả về mảng rỗng nếu không có dữ liệu
        } catch (PDOException $e) {
            error_log('Database error: ' . $e->getMessage());
            return [];
        }
    }
    
}