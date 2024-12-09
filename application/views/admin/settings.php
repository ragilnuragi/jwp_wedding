<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Setting Profile</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('admin/Settings/updateData'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $settings->id; ?>" name="id">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Nama Website</label>
                                            <input type="text" class="form-control" value="<?= $settings->website_name; ?>" id="exampleInputName1" name="website_name" placeholder="Website Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Nomor Telepon</label>
                                            <input type="text" class="form-control" value="<?= $settings->phone_number; ?>" id="exampleInputName1" name="phone_number" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Email</label>
                                            <input type="text" class="form-control" value="<?= $settings->email; ?>email" id="exampleInputName1" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleAddress1">Alamat</label>
                                            <textarea class="form-control" id="exampleAddress1" name="address" rows="4"><?= $settings->address; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleMaps1">Peta</label>
                                            <textarea class="form-control" id="exampleMaps1" name="maps" rows="4"><?= $settings->maps; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Facebook</label>
                                            <input type="text" class="form-control" value="<?= $settings->facebook_url; ?>" id="exampleInputName1" name="facebook_url" placeholder="Facebook">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">Instagram</label>
                                            <input type="text" class="form-control" value="<?= $settings->instagram_url; ?>" id="exampleInputName1" name="instagram_url" placeholder="Instagram">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleHeaderBussinessHour1">Header Bussiness Hour</label>
                                            <textarea class="form-control" value="" id="exampleHeaderBussinessHour1" name="header_bussiness_hour" rows="4"><?= $settings->header_bussiness_hour; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTimeBussinessHour1">Time Bussiness Hour</label>
                                            <textarea class="form-control" value="" id="exampleTimeBussinessHour1" name="time_bussiness_hour" rows="4"><?= $settings->time_bussiness_hour; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>