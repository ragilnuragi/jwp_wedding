<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url('assets/landing/') ?>img/pernikahan.jpeg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 text-center">
                                <p class="fs-4 text-white animated zoomIn">Selamat Datang di <strong class="text-dark">WO JeWePe</strong></p>
                                <h1 class="display-1 text-dark mb-4 animated zoomIn">Buat Pernikahanmu supaya dikenang selamanya</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?= base_url('assets/landing/') ?>img/pernikahan2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7 text-center">
                                <p class="fs-4 text-white animated zoomIn">Selamat Datang di <strong class="text-dark">WO JeWePe</strong></p>
                                <h1 class="display-1 text-dark mb-4 animated zoomIn">Persiapkan Pernikahan anda agar tidak menyesal dikemudian hari</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- Contact Start -->
<div class="container-xxl contact py-5">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium fst-italic text-primary">About Us</p>
            <h1 class="display-6">JeWePe Wedding Organizer</h1>
        </div>
        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-8">
                <p class="text-center mb-5">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Store Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-6">Paket Pernikahan Terpopuler</h1>
        </div>
        <div class="row g-4">
            <?php
            $counter = 0;
            foreach ($getAllKatalog as $row) :
                if ($counter == 4) break; // Stop after 4 items
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
            <?php 
                $counter++;
            endforeach; ?>
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                <a href="<?= base_url('Paket'); ?>" class="btn btn-primary rounded-pill py-3 px-5">View More Products</a>
            </div>
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
