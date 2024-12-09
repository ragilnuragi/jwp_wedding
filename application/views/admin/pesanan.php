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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Pemesanan</h4>
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
                        <h4 class="card-title">Daftar Pemesan</h4>
                        <div class="col-lg-4">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="table-responsive">
                            <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Nama Pemesan</th>
                                        <th>Email Pemesan</th>
                                        <th>No Handphone</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Pernikahan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($getAllPesanan as $row) :
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $no++; ?>
                                            </td>
                                            <td><?= $row->package_name; ?></td>
                                            <td><?= $row->name; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->phone_number; ?></td>
                                            <td><?= $row->address; ?></td>
                                            <td><?= $row->wedding_date; ?></td>
                                            <td class="text_center">
                                                <?php if ($row->status == 'requested') {
                                                    echo '<div class="badge badge-primary">Menunggu Konfirmasi</div>';
                                                } elseif ($row->status == 'approved') {
                                                    echo '<div class="badge badge-success">Pesanan Diterima</div>';
                                                } else {
                                                    echo '<div class="badge badge-danger">Pesanan Dibatalkan</div>';
                                                }?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($row->status == 'requested') { ?>
                                                    <a class="btn btn-sm btn-info" href="<?= base_url('admin/Pesanan/updateStatus?status=approved&id=') . $row->order_id ?>" title="Terima">Terima</a>
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/Pesanan/updateStatus?status=cancelled&id=') . $row->order_id ?>" title="Batalkan">Batalkan</a>
                                                <?php } elseif ($row->status == 'approved') { ?>
                                                    <a class="btn btn-sm btn-warning" href="<?= base_url('admin/Pesanan/updateStatus?status=cancelled&id=') . $row->order_id ?>" title="Batalkan">Batalkan</a>
                                                <?php } ?>
                                                <a class="btn btn-sm btn-danger" href="<?= base_url('admin/Pesanan/delete?id=') . $row->order_id ?>" title="Hapus" onclick="if(!confirm('Apakah anda yakin akan menghapus Pesanan ini?')){ return false; }">Hapus</a>
                                            </td>
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
