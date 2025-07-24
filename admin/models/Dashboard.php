<?php

class Dashboard 
{
    public $conn;

    // kết nối cơ sở dữ liệu
    public  function __construct()
    {
        $this->conn = connectDB();
    }



     public function layTongThuNhapHomNay() {

        try {
            //code...
            $ngayHienTai = date('Y-m-d'); // Lấy ngày hiện tại
            $sql = "SELECT SUM(tong_don_hang) AS tong_thu_nhap 
                    FROM don_hangs 
                    WHERE date(ngay_nhan) = :ngay_hien_tai AND trang_thai_id = 10";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ngay_hien_tai' => $ngayHienTai]);

            $ketQua = $stmt->fetch();
            return $ketQua['tong_thu_nhap'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();
        }
        
    }


    public function demSoLuongDonHangHomNay() {
        try {
            
            $ngayHienTai = date('Y-m-d'); // Ngày hiện tại
            // echo $ngayHienTai;die;
            $sql = "SELECT COUNT(*) AS so_luong_don_hang FROM don_hangs WHERE DATE(ngay_dat) = :ngay_hien_tai";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ngay_hien_tai' => $ngayHienTai]);
            
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_don_hang'] ?? 0 ; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
    public function demSoLuongKhachHangHomNay() {
        try {
            $ngayHienTai = date('Y-m-d'); // Ngày hiện tại
            $sql = "SELECT COUNT(*) AS so_luong_khach_hang FROM nguoi_dungs WHERE ngay_tao = :ngay_hien_tai";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ngay_hien_tai' => $ngayHienTai]);
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_khach_hang'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
    public function demSoLuongLienHeHomNay() {
        try {
            $ngayHienTai = date('Y-m-d'); // Ngày hiện tại
            $sql = "SELECT COUNT(*) AS so_luong_lien_he FROM lien_hes WHERE DATE(ngay_lien_he) = :ngay_hien_tai";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ngay_hien_tai' => $ngayHienTai]);
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_lien_he'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
    public function demSoLuongKhuyenMaiHomNay() {
        try {
            
            $sql = "SELECT COUNT(*) AS so_luong_khuyen_mai FROM khuyen_mais WHERE trang_thai = 2";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_khuyen_mai'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
    public function demSoLuongDanhGiaHomNay() {
        try {
            $ngayHienTai = date('Y-m-d'); // Ngày hiện tại
            $sql = "SELECT COUNT(*) AS so_luong_danh_gia FROM danh_gias WHERE DATE(ngay_danh_gia)= :ngay_hien_tai ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['ngay_hien_tai' => $ngayHienTai]);
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_danh_gia'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
    public function demSoLuongKhachHang() {
        try {
            
            $sql = "SELECT COUNT(*) AS so_luong_khach_hang FROM nguoi_dungs";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();

            return $ketQua['so_luong_khach_hang'] ?? 0; // Trả về 0 nếu không có đơn hàng nào
            //code...
        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }
    }
        
     public function thongKeTongDonHang() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_luong_don_hang 
            FROM don_hangs 
            WHERE trang_thai_id = 10 ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            return $ketQua['tong_so_luong_don_hang'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
     public function thongKeTongDonHangHoanTra() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_luong_don_hang 
            FROM don_hangs 
            WHERE trang_thai_id = 8 OR trang_thai_id = 9";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            return $ketQua['tong_so_luong_don_hang'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
    public function thongKeTongTien() {
        try {
            $nam = date('Y'); 
            $sql = "SELECT SUM(tong_don_hang) AS tong_thu_nhap_nam
            FROM don_hangs 
            WHERE trang_thai_id = 10";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['tong_thu_nhap_nam'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
    public function thongKeHoanTien() {
        try {
            $nam = date('Y'); 
            $sql = "SELECT SUM(tong_don_hang) AS hoan_tien
FROM don_hangs 
WHERE YEAR(ngay_dat) = :nam AND (trang_thai_id = 8 OR trang_thai_id = 9)";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['nam' => $nam]);
            $ketQua = $stmt->fetch();
            
            return $ketQua['hoan_tien'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
    public function thongKeSanPham() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_luong_san_pham 
                    FROM san_phams;
                    ";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['tong_so_luong_san_pham'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
    public function thongKeBaiViet() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_luong_bai_viet
                    FROM tin_tucs;
                    ";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['tong_so_luong_bai_viet'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }
    public function thongKeDanhGia() {
        try {
             
            $sql = "SELECT COUNT(*) AS tong_so_luong_danh_gia
                    FROM danh_gias;
                    ";
            
                    

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $ketQua = $stmt->fetch();
            
            return $ketQua['tong_so_luong_danh_gia'] ?? 0;
                

        } catch (PDOException $e) {
            //throw $th;
            echo 'Lỗi: '. $e->getMessage();

        }

    }

    // đơn theo tháng
    public function soLuongDonHangTheoThang() {
    try {
        $nam = date('Y'); 

        $sql = "
            SELECT 
                MONTH(dh.ngay_nhan) AS thang,
                COUNT(DISTINCT dh.id) AS tong_so_don_hang
            FROM 
                don_hangs AS dh
            WHERE YEAR(dh.ngay_nhan) = :nam AND dh.trang_thai_id = 10
            GROUP BY MONTH(dh.ngay_nhan)
            ORDER BY thang;
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['nam' => $nam]);

        // Khởi tạo mảng mặc định với tháng từ 1 đến 12
        $thangData = [];
        for ($i = 1; $i <= 12; $i++) {
            $thangData[$i] = ['thang' => $i, 'tong_so_don_hang' => 0];
        }

        // Duyệt kết quả từ câu truy vấn và cập nhật mảng $thangData
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            $thangData[$row['thang']]['tong_so_don_hang'] = $row['tong_so_don_hang'];
        }

        return $thangData;

    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return [];  // Trả về mảng rỗng nếu có lỗi
    }
}


// thu nhập theo tháng
public function tongTienTheoThang() {
    try {
        $nam = date('Y'); 

        $sql = "
            SELECT 
                MONTH(dh.ngay_nhan) AS thang,
                COALESCE(SUM(dh.tong_don_hang), 0) AS tong_tien
            FROM 
                don_hangs AS dh
            WHERE YEAR(dh.ngay_nhan) = :nam AND dh.trang_thai_id = 10
            GROUP BY MONTH(dh.ngay_nhan)
            ORDER BY thang;
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['nam' => $nam]);

        // Lấy kết quả và khởi tạo mảng mặc định
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $thangData = array_fill(1, 12, ['thang' => 0, 'tong_tien' => 0]);

        foreach ($data as $row) {
            $thangData[$row['thang']]['thang'] = $row['thang'];
            $thangData[$row['thang']]['tong_tien'] = $row['tong_tien'] / 1000000;
        }

        return $thangData;

    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return [];  // Trả về mảng rỗng nếu có lỗi
    }
}

// khách hàng theo tháng
public function soNguoiDungMoiTheoThang() {
    try {
        $nam = date('Y'); 

        $sql = "
            SELECT 
                MONTH(nd.ngay_tao) AS thang,
                COALESCE(COUNT(DISTINCT nd.id), 0) AS tong_nguoi_dung_moi
            FROM 
                nguoi_dungs AS nd
            WHERE YEAR(nd.ngay_tao) = :nam
            GROUP BY MONTH(nd.ngay_tao)
            ORDER BY thang;
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['nam' => $nam]);

        // Lấy kết quả và khởi tạo mảng mặc định
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $thangData = array_fill(1, 12, ['thang' => 0, 'tong_nguoi_dung_moi' => 0]);

        foreach ($data as $row) {
            $thangData[$row['thang']]['thang'] = $row['thang'];
            $thangData[$row['thang']]['tong_nguoi_dung_moi'] = $row['tong_nguoi_dung_moi'];
        }

        return $thangData;

    } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return [];  // Trả về mảng rỗng nếu có lỗi
    }
}
public function getSPYT(){
      try {

            $sql = 'SELECT sp.*, top_san_pham.sl
FROM san_phams sp
JOIN (
    SELECT san_pham_id, COUNT(san_pham_id) AS sl
    FROM chi_tiet_don_hangs
    GROUP BY san_pham_id
    ORDER BY sl DESC
    LIMIT 5
) top_san_pham ON sp.id = top_san_pham.san_pham_id;';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();


        } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return [];  // Trả về mảng rỗng nếu có lỗi
    }
}

    







    // huy ket noi csdl
    public function  __destruct()
    {
        $this->conn = null;
    }
}




?>