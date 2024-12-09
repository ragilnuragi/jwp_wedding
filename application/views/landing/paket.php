<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Paket Pernikahan</h1>
    </div>
</div>
<!-- Page Header End -->


<!-- Store Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium fst-italic text-primary">Paket Pernikahan</p>
            <h1 class="display-6">Pilih Paket Pernikahan yang cocok untuk Anda</h1>
        </div>
        <div class="row g-4">
            <?php
            foreach ($getAllKatalog as $row) :
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid fixed-size" src="<?= base_url('assets/files/katalog/') . $row->image ?>" alt="">
                        <div class="p-4">
                            <h4 class="mb-3"><?= $row->package_name?></h4>
                            <h4 class="text-primary">Rp. <?= number_format($row->price,2,",", ".") ?></h4>
                        </div>
                        <div class="store-overlay">
                            <a href="<?= base_url('Paket/detail?id=') . $row->catalogue_id; ?>" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Store End -->

<!-- CSS for fixed image size -->
<style>
    .store-item img.fixed-size {
        width: 100%;
        height: 200px; /* Set a fixed height */
        object-fit: cover; /* Ensure the image covers the area */
    }
</style>