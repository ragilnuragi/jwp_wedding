<?php $url = $this->uri->segment(1);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('assets/landing/')?>img/logo2.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/landing/')?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/landing/')?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/landing/')?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/landing/')?>css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    
    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <img class="img-fluid" src="<?= base_url('assets/landing/')?>img/logo2.png" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="<?= base_url('')?>" class="nav-item nav-link <?= ($url=='' || $url=='Beranda') ?'active':''; ?>">Home</a>
                        <a href="<?= base_url('Paket')?>" class="nav-item nav-link <?= ($url=='Paket') ?'active':''; ?>">Paket Pernikahan</a>
                        <a href="<?= base_url('Kontak')?>" class="nav-item nav-link <?= ($url=='Kontak') ?'active':''; ?>">Kontak Kami</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <?php $this->load->view($page); ?>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-primary mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i><?= $getDataWeb->address ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i><?= $getDataWeb->phone_number ?></p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i><?= $getDataWeb->email ?></p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href="<?= $getDataWeb->facebook_url ?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href="<?= $getDataWeb->instagram_url ?>"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-primary mb-4">Business Hours</h4>
                    <p class="mb-1"><?= $getDataWeb->header_bussiness_hour ?></p>
                    <h6 class="text-light"><?= $getDataWeb->time_bussiness_hour ?></h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/landing/')?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('assets/landing/')?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('assets/landing/')?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('assets/landing/')?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('assets/landing/')?>js/main.js"></script>
</body>

</html>