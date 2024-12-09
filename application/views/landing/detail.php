<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Detail Paket dan Pemesanan</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url('Paket'); ?>">Katalog</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Artikel Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid img-fluid-large" src="<?= base_url('assets/files/katalog/') . $katalog->image ?>" alt="">
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.5s">
                <div class="section-title">
                    <p class="fs-5 fw-medium fst-italic text-primary">JeWePe Wedding Organizer</p>
                    <?= $this->session->flashdata('message');?>
                    <h1 class="display-6"><?= $katalog->package_name; ?></h1>
                </div>
                <?= $katalog->description; ?>
                <h3 class="text-primary">Rp. <?= number_format($katalog->price, 2, ",", ".") ?></h3>
            </div>

            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4 text-center">Tertarik dengan Paket ini? Pesan Sekarang.</h3>
                <form action="<?= base_url('Paket/pesan'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $this->input->get('id');?>">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
                                <label for="name">Nama Anda</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
                                <label for="email">Alamat Email</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="phone_number" placeholder="No Handphone" required>
                                <label for="name">No Handphone</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="subject" name="wedding_date" placeholder="Tanggal Pernikahan" required>
                                <label for="subject">Tanggal Pernikahan</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Alamat" name="address" id="message" style="height: 120px" required></textarea>
                                <label for="message">Alamat</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Pesan Paket</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Artikel End -->
<style>
    .img-fluid-large {
        width: 100%;
        max-width: 700px;
        /* Atur ukuran maksimum gambar sesuai kebutuhan Anda */
        height: auto;
    }
</style>