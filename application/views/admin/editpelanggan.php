<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg-10">
            <div class="row mt-3">
                <div class="col-md-6">

                    <div class="card">

                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        <?php endif; ?>

                        <?= $this->session->flashdata('message'); ?>


                        <div class="card-body">

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $pelanggan["id"]; ?>">

                                <div class="form-group">

                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?= $pelanggan['email']; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= $pelanggan['name']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" class="form-control" id="nik" value="<?= $pelanggan['nik']; ?>">

                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $pelanggan['alamat']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $pelanggan['pekerjaan']; ?>">
                                </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->