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
                                 <input type="hidden" name="id" value="<?= $user_menu["id"]; ?>">
                                 <div class="form-group">

                                     <label for="menu">Menu</label>
                                     <input type="text" name="menu" class="form-control" id="menu" value="<?= $user_menu['menu']; ?>">
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