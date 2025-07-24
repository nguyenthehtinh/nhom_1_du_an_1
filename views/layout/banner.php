
<?php
$Banners = (new BannerController())->index();
?>

<section class="slider-area container-fluid p-0">
    <div class="hero-slider-active slick-arrow-style">
        <?php foreach ($Banners as $banner): ?>
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item" style="background-image: url('<?= $banner['hinh_anh']; ?>'); background-size: cover; background-position: center; height: 600px;"> <!-- Đã thay đổi chiều cao -->
                    <img src="<?= $banner['hinh_anh']; ?>" class="img-fluid d-none" alt="Banner">
                </div>
            </div>
            <!-- single slider item end -->
        <?php endforeach; ?>
    </div>
</section>
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"> -->



<style>
.hero-slider-item {
    width: 100%;
    height: 600px; /* Đã thay đổi chiều cao slider */
    position: relative;
    overflow: hidden;
}
.hero-slider-active {
    overflow: hidden; /* Ngăn lỗi tràn */
}
</style>