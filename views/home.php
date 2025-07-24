<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from htmldemo.net/corano/corano/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 09:53:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KINGMANGA - Dự Án 1 - Nhóm 1</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/KMT.png">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .product-thumb img {
    width: 100%; /* Chiều rộng ảnh chiếm toàn bộ không gian container */
    height: auto; /* Giữ nguyên tỷ lệ ban đầu nếu không bị cắt */
    aspect-ratio: 3 / 5; /* Đảm bảo tỷ lệ 3x4 */
    object-fit: cover; /* Cắt ảnh nếu cần để phù hợp với container */
    border-radius: 8px; /* (Tuỳ chọn) Bo góc để ảnh trông mượt mà */
}

        .blog-thumb {
    position: relative;
    width: 100%; /* Ảnh chiếm toàn bộ chiều rộng */
    padding-bottom: 56.25%; /* Tỷ lệ 16:9 (9/16 = 0.5625) */
    overflow: hidden;
    background-color: #f0f0f0; /* Màu nền dự phòng */
    border-radius: 3px; /* Bo góc nếu cần */
}

.blog-thumb img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Đảm bảo hình ảnh đẹp, không bị méo */
}
  
    </style>

</head>

<body>
        <!-- HEADER -->
        <?php
        require_once "layout/header.php";

        ?>


    <main>
        <!-- BANNER -->
        <?php require_once "layout/banner.php"; ?>

        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h8>Giao Hàng Miễn Phí</h8>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h8>Hỗ trợ khách hàng 24/7</h8>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h8>Trả hàng miễn phí trong 15 ngày</h8>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h8>100% Thanh toán khi giao hàng</h8>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->



        <!-- product area start -->
        <section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Truyện Tranh Mới Nhất</h2>
                    <p class="sub-title">Thêm Sản phẩm của chúng tôi vào giỏ hàng của bạn</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-container">
                    <!-- product tab content start -->
                    <div class="tab-content" id="content">
                        <div class="tab-pane fade show active" id="tab1">
                            <!-- Sản phẩm được hiển thị theo dạng grid -->
                            <div class="row" id="product-list">
                                <?php foreach (array_slice($listSanPham, 0, 4) as $key => $sanPham): ?>
                                    <div class="col-md-3 col-sm-6 mb-4 product-item">
                                        <div class="product-item search-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham["hinh_anh"] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham["hinh_anh"] ?>" alt="product">
                                                </a>
                                                <div class="cart-hover">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>" class="btn btn-cart">Xem chi tiết</a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham["ten_san_pham"] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if (!empty($sanPham["gia_khuyen_mai"])): ?>
                                                        <span class="price-regular"><?= number_format($sanPham["gia_khuyen_mai"])  ?>đ</span>
                                                        <span class="price-old"><del><?= number_format($sanPham["gia_ban"])  ?>đ</del></span>
                                                    <?php else: ?>
                                                        <span class="price-regular"><?= number_format($sanPham["gia_ban"])  ?>đ</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- Add "Xem thêm" button -->
                            <div class="text-center">
                                <button id="load-more" style="background-color: #ccac78" class="btn-cart">Xem thêm</button>
                            </div>
                        </div>
                    </div>
                    <!-- product tab content end -->
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Truyện tranh yêu thích</h2>
                        <p class="sub-title"></p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <?php foreach ($listSanPhamYeuThich as $key => $sanPham): ?>
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                        <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                        <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                    </a>
                                    
                                    
                                </figure>
                                <div class="product-caption text-center">
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= formatPrice($sanPham['gia_ban']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($sanPham['gia_ban']) . 'đ' ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- product area end -->



        <!-- latest blog area start -->
        <section class="latest-blog-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Bài viết</h2>
                            <p class="sub-title">Chia sẻ bài viết của chúng tôi để mọi người có thể biết đến KingManga nhiều hơn</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                            <!-- blog post item start -->
                             <?php foreach($tinTucs as $tt): ?>
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="?act=chi-tiet-tin-tuc&id=<?= $tt["id"]?>">
                                        <img src="<?= BASE_URL . $tt['hinh_anh']?>" alt="blog image">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <p><?= date("Y-m-d", strtotime($tt["ngay_tao"])) ?> | <a href="#">KINGMANGA</a></p>
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="blog-details.html"><?= $tt['tieu_de']?></a>
                                    </h5>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <!-- blog post item end -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- latest blog area end -->

    </main>
    


    <!-- FOOTER -->
     <?php require_once "./views/layout/footer.php"; ?>


     <!-- Mini cart -->
      <?php require_once "./views/layout/cart.php"; ?>
   





    <!-- JS
============================================ -->
<script>
    let offset = 4; // Bắt đầu từ sản phẩm thứ 9 (vì đã hiển thị 8 sản phẩm đầu tiên)

    document.getElementById('load-more').addEventListener('click', function () {
        fetch('<?= BASE_URL ?>?act=load-more-products', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ offset: offset, limit: 4 }) // Gửi offset và limit
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Render thêm sản phẩm vào danh sách
                const productList = document.getElementById('product-list');
                data.products.forEach(product => {
                    const productHTML = `
                                                 <div class="col-md-3 col-sm-6 mb-4 product-item">
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                    <a href="${product.detailUrl}">
                                        <img class="card-img-top" src="${product.imageUrl}" alt="${product.name}">
                                    </a>
                                    <div class="cart-hover">
                                        <a href="${product.detailUrl}" class="btn btn-cart">Xem chi tiết</a>
                                    </div>
                                </figure>
                              
                                 <div class="product-caption text-center">
                                                <h6 class="product-name">
                                        <a href="${product.detailUrl}">${product.name}</a>
                                    </h6>
                                    <div class="price-box">
                                        ${product.discountPrice
                                            ? `<span class="price-regular">${product.discountPrice}</span>
                                               <span class="price-old"><del>${product.originalPrice}</del></span>`
                                            : `<span class="price-regular">${product.originalPrice}</span>`
                                        }
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    productList.insertAdjacentHTML('beforeend', productHTML);
                });

                // Cập nhật offset
                offset += data.products.length;

                // Ẩn nút nếu không còn sản phẩm
                if (data.products.length < 4) {
                    document.getElementById('load-more').style.display = 'none';
                }
            } else {
                alert('Không có thêm sản phẩm để hiển thị!');
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>
                                                        
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="assets/js/plugins/image-zoom.min.js"></script>
    <!-- Images loaded JS -->
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- mail-chimp active js -->
    <script src="assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script>
        
    
    
        $(document).ready(function () {
        console.log("jQuery đã sẵn sàng");
    
        // Toggle thanh tìm kiếm khi nhấn nút (mobile)
        $('.search-trigger').on('click', function () {
            console.log("Nút tìm kiếm được nhấn");
            $('.header-search-box').toggleClass('active');
        });
    
        // Tìm kiếm nội dung
        $('#searchInput').on('keyup', function () {
            let value = $(this).val().toLowerCase();
            console.log("Giá trị nhập:", value);
    
            $('.search-item').filter(function () {
                const match = $(this).text().toLowerCase().indexOf(value) > -1;
                console.log("Đang kiểm tra:", $(this).text(), "Kết quả:", match);
                $(this).toggle(match);
            });
        });
    });
    console.log(typeof $);
    </script>
</body>



</html>