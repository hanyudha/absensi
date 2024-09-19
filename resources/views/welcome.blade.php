<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Aplikasi Absensi Karyawan</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/logoo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
    <h1 class="sitename" style="font-family: 'Brioche', Brioche;">Pustipanda</h1>
</a>
            <nav id="navmenu" class="navmenu">
    <ul>
    @if (Route::has('login'))
    @auth
        <li>
            @if(Auth::user()->role_as == 'admin')
                <a href="{{ url('/admin/dashboard') }}" 
                   class="btn btn-primary d-flex align-items-center justify-content-center" 
                   style="padding: 5px 10px; background-color: #F0F8FF;">
                   Home
                </a>
            @else
                <a href="{{ url('/user/dashboard') }}" 
                   class="btn btn-primary d-flex align-items-center justify-content-center" 
                   style="padding: 5px 10px; background-color: #F0F8FF;">
                   Home
                </a>
            @endif
        </li>
    @else
        <!-- Tombol Login dengan background putih dan teks hitam -->
        <a href="{{ route('login') }}" 
           class="btn btn-light d-flex align-items-center justify-content-center" 
           style="background-color: #5D87FF; color: white; border: 1px solid #ccc; padding: 5px 10px;">
           Login
        </a>
    @endauth
@endif
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
        </div>
    </header>
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Aplikasi Absensi Karyawan Pustipanda</h1>
                        <p><small>University information technology institution that excels in developing the integration of Islamic, Indonesian and scientific knowledge with a global reputation</small></p>

                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img">
                        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <!-- Preloader -->
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>
