<?php
class SanPhams
{
    public $conn; // Kết nối cơ sở dữ liệu
 
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*
                    FROM san_phams
                    JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.trang_thai = 1 AND danh_mucs.trang_thai = 1
                    ORDER BY san_phams.id DESC;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getSPYeuThich()
    {
           try {

            $sql = 'SELECT sp.*, top_san_pham.sl
FROM san_phams sp
JOIN (
    SELECT san_pham_id, COUNT(san_pham_id) AS sl
    FROM chi_tiet_don_hangs
    GROUP BY san_pham_id
    ORDER BY sl DESC
) top_san_pham ON sp.id = top_san_pham.san_pham_id;';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();


        } catch (PDOException $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return [];  // Trả về mảng rỗng nếu có lỗi
    }
    }
    public function getTenDanhMuc($id){
        try {
            $sql = 'SELECT ten_danh_muc
                    FROM danh_mucs
                    WHERE 
                    id = :id;
                    ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getSanPhamByDanhMucAndPrice($danhMucId, $priceFrom, $priceTo, $page, $limit, $sortby)
{
    try {
        $offset = ($page - 1) * $limit;

        if ($sortby === 'asc') {
            $orderBy = 'ORDER BY sp.gia_khuyen_mai ASC';
        } elseif ($sortby === 'desc') {
            $orderBy = 'ORDER BY sp.gia_khuyen_mai DESC';
        } elseif ($sortby === 'newest') {
            $orderBy = 'ORDER BY sp.id DESC';
        } else {
            $orderBy = 'ORDER BY sp.id DESC';
        }

        $sql = "SELECT sp.*, dm.ten_danh_muc 
                FROM san_phams sp 
                JOIN danh_mucs dm ON sp.danh_muc_id = dm.id 
                WHERE sp.danh_muc_id = :danh_muc_id 
                AND sp.trang_thai = 1 
                AND dm.trang_thai = 1";

        if (!is_null($priceFrom)) {
            $sql .= " AND sp.gia_khuyen_mai >= :price_from";
        }
        if (!is_null($priceTo)) {
            $sql .= " AND sp.gia_khuyen_mai <= :price_to";
        }

        $sql .= " $orderBy LIMIT :offset, :limit";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
        if (!is_null($priceFrom)) {
            $stmt->bindParam(':price_from', $priceFrom, PDO::PARAM_INT);
        }
        if (!is_null($priceTo)) {
            $stmt->bindParam(':price_to', $priceTo, PDO::PARAM_INT);
        }
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
public function getAllSanPhamWithPrice($priceFrom, $priceTo, $page, $limit, $sortby)
{
    try {
        $offset = ($page - 1) * $limit;

        // Xử lý sắp xếp
        if ($sortby === 'asc') {
            $orderBy = 'ORDER BY sp.gia_khuyen_mai ASC';
        } elseif ($sortby === 'desc') {
            $orderBy = 'ORDER BY sp.gia_khuyen_mai DESC';
        } elseif ($sortby === 'newest') {
            $orderBy = 'ORDER BY sp.id DESC';
        } else {
            // Mặc định sắp xếp theo id DESC nếu không có sortby hợp lệ
            $orderBy = 'ORDER BY sp.id DESC';
        }

        // Xây dựng câu SQL
        $sql = "SELECT sp.*, dm.ten_danh_muc 
                FROM san_phams sp 
                JOIN danh_mucs dm ON sp.danh_muc_id = dm.id 
                WHERE sp.trang_thai = 1 AND dm.trang_thai = 1";

        // Điều kiện lọc theo giá
        if (!is_null($priceFrom)) {
            $sql .= " AND sp.gia_khuyen_mai >= :price_from";
        }
        if (!is_null($priceTo)) {
            $sql .= " AND sp.gia_khuyen_mai <= :price_to";
        }

        $sql .= " $orderBy LIMIT :offset, :limit";

        // Chuẩn bị và gán tham số
        $stmt = $this->conn->prepare($sql);
        if (!is_null($priceFrom)) {
            $stmt->bindParam(':price_from', $priceFrom, PDO::PARAM_INT);
        }
        if (!is_null($priceTo)) {
            $stmt->bindParam(':price_to', $priceTo, PDO::PARAM_INT);
        }
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

    
    // Lấy tổng số sản phẩm theo danh mục và giá
    public function getTotalItemsByDanhMucAndPrice($danhMucId, $priceFrom, $priceTo)
    {
        try {
            $sql = "SELECT COUNT(*) AS total 
                    FROM san_phams 
                    WHERE danh_muc_id = :danh_muc_id ";
    
            // Điều kiện lọc theo giá
            if ($priceFrom) {
                $sql .= " AND gia_khuyen_mai >= :price_from";
            }
            if ($priceTo) {
                $sql .= " AND gia_khuyen_mai <= :price_to";
            }
    
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':danh_muc_id', $danhMucId, PDO::PARAM_INT);
            if ($priceFrom) {
                $stmt->bindParam(':price_from', $priceFrom, PDO::PARAM_INT);
            }
            if ($priceTo) {
                $stmt->bindParam(':price_to', $priceTo, PDO::PARAM_INT);
            }
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
    // Lấy tất cả sản phẩm khi không có danh mục và lọc theo giá
    
    
    // Lấy tổng số sản phẩm khi không có danh mục và lọc theo giá
    public function getTotalItemsWithPrice($priceFrom, $priceTo)
    {
        try {
            $sql = "SELECT COUNT(*) AS total 
                    FROM san_phams 
                    WHERE 1 ";
    
            // Điều kiện lọc theo giá
            if ($priceFrom) {
                $sql .= " AND gia_khuyen_mai >= :price_from";
            }
            if ($priceTo) {
                $sql .= " AND gia_khuyen_mai <= :price_to";
            }
    
            $stmt = $this->conn->prepare($sql);
            if ($priceFrom) {
                $stmt->bindParam(':price_from', $priceFrom, PDO::PARAM_INT);
            }
            if ($priceTo) {
                $stmt->bindParam(':price_to', $priceTo, PDO::PARAM_INT);
            }
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
   
       // Lấy tất cả danh mục
       public function getAllDanhMuc()
       {
           try {
               $sql = 'SELECT * FROM danh_mucs WHERE trang_thai = 1';
               $stmt = $this->conn->prepare($sql);
               $stmt->execute();
               return $stmt->fetchAll();
           } catch (Exception $e) {
               echo "Lỗi: " . $e->getMessage();
           }
       }
       public function getSanPhamWithPagination($offset, $limit)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    ORDER BY san_phams.id DESC
                    LIMIT :offset, :limit';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


        // Lấy tất cả danh mục

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
        public function getListAnhSanPham($id)
        {
            try {
                $sql = 'SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id';
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute([':id' => $id]);
    
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
        public function getBinhLuanFromSanPham($id)
        {
            try {
                $sql = 'SELECT binh_luans.*, nguoi_dungs.ten_nguoi_dung, nguoi_dungs.avatar
                FROM binh_luans
                INNER JOIN nguoi_dungs ON binh_luans.nguoi_dung_id = nguoi_dungs.id
                WHERE binh_luans.san_pham_id = :id
                ORDER BY binh_luans.id DESC
                ';
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute([':id' => $id]);
    
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "lỗi" . $e->getMessage();
            }
        }
        public function getListSanPhamDanhMuc($danh_muc_id)
        {
            try {
                $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE san_phams.danh_muc_id = ' . $danh_muc_id;
    
                $stmt = $this->conn->prepare($sql);
    
                $stmt->execute();
    
                return $stmt->fetchAll();
            } catch (Exception $e) {
                echo "Lõi" . $e->getMessage();
            }
        }
        public function getSoLuongSanPham($san_pham_id) {
            $sql = "SELECT so_luong FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $san_pham_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['so_luong'] ?? 0; // Trả về 0 nếu không tìm thấy
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

public function searchSanPham($search, $priceFrom, $priceTo, $page, $limit, $sortby)
{
    try {
        // Tính toán phân trang
        $offset = ($page - 1) * $limit;

        // Xử lý phần sắp xếp
        $orderBy = 'sp.id DESC'; // Mặc định sắp xếp theo ID giảm dần
        if ($sortby == 'asc') {
            $orderBy = 'sp.gia_khuyen_mai ASC';
        } elseif ($sortby == 'desc') {
            $orderBy = 'sp.gia_khuyen_mai DESC';
        } elseif ($sortby == 'newest') {
            $orderBy = 'sp.id DESC';
        }

        // Bắt đầu câu lệnh SQL với điều kiện tìm kiếm
        $sql = "SELECT sp.*, dm.ten_danh_muc 
                FROM san_phams sp 
                JOIN danh_mucs dm ON sp.danh_muc_id = dm.id 
                WHERE sp.trang_thai = 1 AND dm.trang_thai = 1";

        // Thêm điều kiện tìm kiếm (tên sản phẩm)
        if ($search) {
            $sql .= " AND sp.ten_san_pham LIKE :search";  // Lưu ý dấu cách ở đây
        }

        // Điều kiện lọc theo giá
        if (!is_null($priceFrom)) {
            $sql .= " AND sp.gia_khuyen_mai >= :price_from";
        }
        if (!is_null($priceTo)) {
            $sql .= " AND sp.gia_khuyen_mai <= :price_to";
        }

        // Sắp xếp và phân trang
        $sql .= " ORDER BY $orderBy LIMIT :offset, :limit"; // Lưu ý có dấu cách trước ORDER BY

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->conn->prepare($sql);

        // Gán các tham số vào câu lệnh
        if ($search) {
            $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        }
        if (!is_null($priceFrom)) {
            $stmt->bindValue(':price_from', $priceFrom, PDO::PARAM_INT);
        }
        if (!is_null($priceTo)) {
            $stmt->bindValue(':price_to', $priceTo, PDO::PARAM_INT);
        }
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

        // Thực thi câu lệnh
        $stmt->execute();

        return $stmt->fetchAll();
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}











public function getTotalItemsBySearch($search, $priceFrom, $priceTo)
{
    try {
        // Câu truy vấn SQL để đếm tổng số sản phẩm
        $sql = "SELECT COUNT(*) AS total FROM san_phams WHERE ten_san_pham LIKE :search";
        $params = [':search' => "%$search%"];

        // Thêm điều kiện lọc giá
        if ($priceFrom !== null) {
            $sql .= " AND gia_khuyen_mai >= :priceFrom";
            $params[':priceFrom'] = $priceFrom;
        }
        if ($priceTo !== null) {
            $sql .= " AND gia_khuyen_mai <= :priceTo";
            $params[':priceTo'] = $priceTo;
        }

        // Sử dụng PDO để thực thi truy vấn
        $stmt = $this->conn->prepare($sql);

        // Liên kết các tham số
        $stmt->bindParam(':search', $params[':search'], PDO::PARAM_STR);

        if ($priceFrom !== null) {
            $stmt->bindParam(':priceFrom', $params[':priceFrom'], PDO::PARAM_INT);
        }
        if ($priceTo !== null) {
            $stmt->bindParam(':priceTo', $params[':priceTo'], PDO::PARAM_INT);
        }

        // Thực thi câu lệnh
        $stmt->execute();

        // Lấy kết quả và trả về tổng số sản phẩm
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

    
    
}
?>