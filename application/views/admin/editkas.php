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
                                 <input type="hidden" name="id" value="<?= $kas_harian["id"]; ?>">
                                 <div class="form-group">
                                     <label for="date">Date</label>
                                     <input type="date" name="date" class="form-control" id="date" value="<?= $kas_harian['date']; ?>">
                                 </div>

                                 <div class="form-group">
                                     <label for="ket">Keterangan</label>
                                     <input type="text" name="ket" class="form-control" id="ket" value="<?= $kas_harian['ket']; ?>">
                                 </div>

                                 <div class="form-group">
                                     <label for="debet">Debet</label>
                                     <input type="text" name="debet" class="form-control" id="debet" value="<?= $kas_harian['debet']; ?>">

                                 </div>
                                 <div class="form-group">
                                     <label for="kredit">Kredit</label>
                                     <input type="text" name="kredit" class="form-control" id="kredit" value="<?= $kas_harian['kredit']; ?>">
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
