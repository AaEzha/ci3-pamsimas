        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

            <div class="row">
                <div class="col-lg-10">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataModal"> Tambah Data Harian </a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col-lg">Date</th>
                                <th scope="col-lg">Keterangan</th>
                                <th scope="col">Debet</th>
                                <th scope="col">Kredit</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kas as $k) : ?>
                                <tr>
                                    <td> <?= $k['date']; ?> </td>
                                    <td> <?= $k['ket']; ?></td>
                                    <td> <?= $k['debet']; ?> </td>
                                    <td> <?= $k['kredit']; ?> </td>
                                    <td> <?= $k['jumlah']; ?> </td>
                                    <td>

                                        <a href="<?= base_url(); ?>Admin/editKas/<?= $k['id']; ?>" class="badge badge-success"> Edit </a>
                                        <a href="<?= base_url(); ?>Admin/hapus/<?= $k['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');"> Delete </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tr>
                            <th scope="col-lg">Jumlah Saldo</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal -->
        <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newDataModalLabel">Tambahkan Data Harian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="<?= base_url('admin/kasharian'); ?>" method="post">

                        <div class="modal-body">

                            <div class="form-group">
                                <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="debet" name="debet" placeholder="Debet">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kredit" name="kredit" placeholder="Kredit">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Total">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>