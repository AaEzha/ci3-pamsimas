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
                                 <input type="hidden" name="id" value="<?= $user_sub_menu["id"]; ?>">
                                 <div class="form-group">
                                     <label for="menu_id">Menu</label>
                                     <input type="text" name="menu_id" class="form-control" id="menu_id" value="<?= $user_sub_menu['menu_id']; ?>">
                                 </div>

                                 <div class="form-group">
                                     <label for="title">Title</label>
                                     <input type="text" name="title" class="form-control" id="title" value="<?= $user_sub_menu['title']; ?>">
                                 </div>

                                 <div class="form-group">
                                     <label for="url">Url</label>
                                     <input type="text" name="url" class="form-control" id="url" value="<?= $user_sub_menu['url']; ?>">

                                 </div>
                                 <div class="form-group">
                                     <label for="icon">Icon</label>
                                     <input type="icon" name="icon" class="form-control" id="icon" value="<?= $user_sub_menu['icon']; ?>">
                                 </div>

                                 <div class="form-group">
                                     <label for="is_active">Active</label>
                                     <input type="text" name="is_active" class="form-control" id="is_active" value="<?= $user_sub_menu['is_active']; ?>">
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