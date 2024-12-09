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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Manajemen Katalog Paket Pernikahan
                        </h4>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <a href="<?= base_url('admin/Katalog/add')?>" class="btn btn-primary">Tambah Data</a>
                                </div>
                                <div class="col-lg-4">
                                    <?= $this->session->flashdata('message');?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Gambar</th>
                                                <th class="text-center">Nama Paket</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($getAllKatalog as $row):
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $no++;?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('assets/files/katalog/'). $row->image; ?>" target="_blank">
                                                        <img src="<?= base_url('assets/files/katalog/'). $row->image; ?>" class="img-fluid" 
                                                        style="border-radius:10%; width:60px;height: 60px;" alt="">
                                                    </a>
                                                </td>
                                                <td><?= $row->package_name; ?></td>
                                                <td class="text_center">Rp. <?= number_format($row->price, 2, ",", ".")?></td>
                                                <td class="text_center"><?= $row->status_publish; ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/Katalog/edit?id='). $row->catalogue_id?>" title="Edit">Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="<?= base_url('admin/Katalog/delete?id='). $row->catalogue_id?>" title="Hapus"
                                                    onclick="if(! confirm('Apakah anda yakin akan menghapus Katalog ini?')) {return false;}">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endforeach;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
