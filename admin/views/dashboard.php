<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>King Manga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "layouts/header.php";

        require_once "layouts/siderbar.php";
        ?>
        
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                  

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Hello, <?= $_SESSION['user_admin']['ten_nguoi_dung']?></h4>
                                                <p class="text-muted mb-0">Sau đây là những gì đang diễn ra tại cửa hàng của bạn ngày hôm nay.</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <form action="javascript:void(0);">
                                                    <div class="row g-3 mb-0 align-items-center">
                                                        <!-- <div class="col-auto">
                                                            <button type="button" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> Add Product</button>
                                                        </div> -->
                                                        <!--end col-->
                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Thu nhập</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target="<?= $tongThuNhapNgay ?>">0</span>VND </h4>
                                                        <a href="?act=don-hangs" class="text-decoration-underline">View net earnings</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng Mới</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $soLuongDonHangHomNay ?>">0</span> Orders</h4>
                                                        <a href="?act=don-hangs" class="text-decoration-underline">View all orders</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách Hàng Mới</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $soLuongKhachHangHomNay ?>">0</span> Persons</h4>
                                                        <a href="?act=nguoi-dungs" class="text-decoration-underline">See details</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Liên Hệ Mới</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $soLuongLienHeHomNay ?>">0</span> Contacts </h4>
                                                        <a href="?act=lien-hes" class="text-decoration-underline">See more</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                          <i class="bx bx-envelope text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Khuyến Mãi Hôm Nay</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $soLuongKMHomNay ?>">0</span> Coupon </h4>
                                                        <a href="?act=khuyen-mais" class="text-decoration-underline">View All Coupon</a>
                                                    </div>
                                                   <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bxs-coupon text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <!-- end card body -->
                                        </div><!-- end card -->
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Đánh Giá Mới</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h5 class="text-muted fs-14 mb-0">
                                                            +0.00 %
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $soLuongDGHomNay ?>">0</span> Evaluate </h4>
                                                        <a href="#" class="text-decoration-underline">View All Evaluate</a>
                                                    </div>
                                                   <div class="avatar-sm flex-shrink-0">
                                                         <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bxs-star text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <!-- end card body -->
                                        </div><!-- end card -->
                                    </div>

                                    
                                </div> <!-- end row-->

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header border-0 align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Toàn bộ số liệu thống kê</h4>
                                                <div>
                                                    <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                                        ALL
                                                    </button>
                                                    <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                                        1M
                                                    </button>
                                                    <button type="button" class="btn btn-soft-secondary material-shadow-none btn-sm">
                                                        6M
                                                    </button>
                                                    <button type="button" class="btn btn-soft-primary material-shadow-none btn-sm">
                                                        1Y
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card-header p-0 border-0 bg-light-subtle">
                                                <div class="row g-0 text-center">
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?= $sanPham?>">0</span></h5>
                                                            <p class="text-muted mb-0">Sản Phẩm</p>
                                                        </div>
                                                    </div>
                                            <!-- end col-->
                                                
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?= $soLuongKhachHang?>">0</span></h5>
                                                            <p class="text-muted mb-0">Khách Hàng</p>
                                                        </div>
                                                    </div>
                                                     <!-- end col-->
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?= $tongSoLuongDonHang?>">0</span></h5>
                                                            <p class="text-muted mb-0">Đơn hàng Thành Công</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?= $donHoanHuy?>">0</span></h5>
                                                            <p class="text-muted mb-0">Đơn hàng Hủy/Hoàn Trả</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1 text-success">$<span class="counter-value" data-target="<?= $thuNhap/1000?>">0</span>k</h5>
                                                            <p class="text-muted mb-0">Doanh Thu</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?= $hoanTien/1000 ?>">0</span>k</h5>
                                                            <p class="text-muted mb-0">Hoàn Trả</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0 ">
                                                            <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?= $baiViet ?>">0</span></h5>
                                                            <p class="text-muted mb-0">Bài Viết</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0 border-end-0">
                                                            <h5 class="mb-1 text-success"><span class="counter-value" data-target="<?= number_format($danhGia / $tongSoLuongDonHang , 2) ?>">0</span>%</h5>
                                                            <p class="text-muted mb-0">Tỷ Lệ Đánh Giá</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                            </div><!-- end card header -->

                                            <div class="row">
                                             <div class="col-12">
                
                                <div class="card shadow">
                                <div class="card-body">
                                 <canvas id="comparisonChart" height="350px"></canvas>
                             </div>
                            </div>
                         </div>
                       </div>
                                  
                                    <!-- end col -->
                                </div>
           

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Best Selling Products</h4>
                                               
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                        <tbody>
                                                            <?php foreach($sanPhamYeuThich as $SP): ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                            <img src="<?= BASE_URL . $SP['hinh_anh'] ?>" alt="" class="img-fluid d-block" style="width:50px;height:50px;border-radius:5px;" />
                                                                        </div>
                                                                        <div>
                                                                            <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset"><?= $SP['ten_san_pham']?></a></h5>
                                                                            <span class="text-muted"><?=date("d M, Y", strtotime($SP['ngay_nhap']))  ?></span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 my-1 fw-normal"><del><?=formatPrice($SP['gia_ban']).' đ'?></del></h5>
                                                                    <span class="text-muted">Giá Bán</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 my-1 fw-normal"><?=formatPrice($SP['gia_khuyen_mai']).' đ'?></h5>
                                                                    <span class="text-muted">Giá khuyến mãi</span>
                                                                </td>
                                                                <td>
                                                                    <h5 class="fs-14 my-1 fw-normal"><?= $SP['sl']?></h5>
                                                                    <span class="text-muted">Đơn Hàng</span>
                                                                </td>
                                                             
                                                            </tr>
                                                            <?php endforeach; ?>
                                                         
                                                        </tbody>
                                                    </table>
                                                </div>

                                          

                                            </div>
                                        </div>
                                    </div>

                                
                                </div> <!-- end row-->

                               

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © King Manga.

                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
  <script>
       // Lấy dữ liệu JSON đã truyền từ Controller
        const jsonData = <?php echo $jsonData; ?>;

        const donHangThang = jsonData.donHangThang;
        const tienHangThang = jsonData.tienHangThang;
        const khachHangThang = jsonData.khachHangThang;

        // Lấy đối tượng Canvas
        const ctx = document.getElementById('comparisonChart').getContext('2d');

        // Dữ liệu cho biểu đồ
        const data = {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 
                     'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [
                {
                    label: 'Doanh thu (Triệu VND)',
                    data: tienHangThang,  // Dữ liệu doanh thu từ PHP
                    backgroundColor: 'rgba(0, 255, 21, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Đơn hàng (Thành Công)',
                    data: donHangThang,  // Dữ liệu số đơn hàng từ PHP
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderWidth: 1
                },
                {
                    label: 'Người dùng mới',
                    data: khachHangThang,  // Dữ liệu số người dùng mới từ PHP
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderWidth: 1
                }
            ]
        };

        // Cấu hình biểu đồ
        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial, sans-serif',
                                weight: 'bold'
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false // Ẩn lưới dọc
                        },
                        barThickness: 20, // Chiều rộng cột
                        categoryPercentage: 0.8 // Khoảng cách giữa các nhóm cột
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.5)'
                        },
                        ticks: {
                            stepSize: 3 // Bước giá trị trên trục Y, nhỏ hơn để cột cao hơn
                        },
                        max: 30 // Đặt giá trị tối đa trên trục Y để tăng khoảng so sánh
                    }
                }
            }
        };

        // Khởi tạo biểu đồ
        new Chart(ctx, config);
    </script>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "layouts/libs_js.php";
    ?>

</body>

</html>