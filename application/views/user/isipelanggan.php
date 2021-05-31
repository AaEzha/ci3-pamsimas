         <!-- Begin Page Content -->
         <div class="container-fluid">

             <!-- Page Heading -->
             <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

             <div class="row">
                 <div class="col-lg-6">
                     <?php if (validation_errors()) : ?>
                         <div class="alert alert-danger" role="alert">
                             <?= validation_errors() ?>
                         </div>
                     <?php endif; ?>

                     <?= $this->session->flashdata('message'); ?>

                     <form action="<?= base_url('user/isipelanggan'); ?>" method="post">

                         <div class="form-group">
                             <label for="email" class="col-sm-4 col-form-label">Email</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                             </div>

                             <div class="form-group">
                                 <label for="name" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                                 <div class="col-sm-10">
                                     <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                     <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                 </div>

                                 <div class="form-group">
                                     <label for="nik" class="col-sm-4 col-form-label">No. NIK</label>
                                     <div class="col-sm-10">
                                         <input type="text" class="form-control" id="nik" name="nik" value="<?= set_value('nik') ?>">
                                         <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                     </div>

                                     <div class="form-group">
                                         <label for="alamat" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat') ?>">
                                             <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                         </div>

                                         <div class="form-group">
                                             <label for="pekerjaan" class="col-sm-4 col-form-label">Pekerjaan</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan') ?>">
                                                 <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                             </div>

                                         </div>
                                         <div class="form group">
                                             <div class="col-sm-10">
                                                 <button type="submit" class="btn btn-primary">Kirim Data</button>

                                             </div>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>

             </div>


         </div>
         <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->