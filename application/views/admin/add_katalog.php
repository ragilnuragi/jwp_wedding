<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Katalog Paket</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/Katalog/addData'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Nama Paket</label>
                                            <input type="text" class="form-control" value="" id="exampleInputName1" name="package_name" placeholder="Package Name" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="editor-container">
                                                <label for="exampleAddress1">Deskripsi</label>
                                                <textarea class="form-control" name="description" id="editor" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="editor-container">
                                                <label for="exampleInputName1">Harga (Rp)</label>
                                                <input type="text" class="form-control" id="exampleInputName1" name="price" placeholder="Harga" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="editor-container">
                                                <label>Gambar Header</label>
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="editor-container">
                                                <label for="exampleSelectStatusPublish">Status Publish</label>
                                                <select class="form-control" name="status_publish" id="exampleSelectStatusPublish">
                                                    <option value="publish">Publish</option>
                                                    <option value="draft">Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right">
                                    <a href="<?= base_url('admin/Katalog');?>" class="btn btn-secondary mr-2">Kembali</a>
                                    <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>