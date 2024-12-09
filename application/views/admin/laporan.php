        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Laporan Pemesanan</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- order table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Laporan</h4>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Paket</th>
                                                <th>Harga</th>
                                                <th>Jumlah Pesanan</th>
                                                <th>Total Harga</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($getAllLaporan as $row) :
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('assets/files/katalog/') . $row->image; ?>" target="_blank">
                                                            <img src="<?= base_url('assets/files/katalog/') . $row->image; ?>" class="img-fluid" style="border-radius:10%; width:60px;height: 60px;" alt="">
                                                        </a>
                                                    </td>
                                                    <td><?= $row->package_name; ?></td>
                                                    <td>Rp. <?= number_format($row->price, 2, ",", ".")?></td>
                                                    <td><?= $row->jumlah_pesanan; ?></td>
                                                    <td>
                                                        <?php
                                                        $total = $row->price * $row->jumlah_pesanan;
                                                        echo 'Rp.'. number_format($total, 2, ",", ".")
                                                        ?>
                                                    </td>
                                                    <td><?= $row->status; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
