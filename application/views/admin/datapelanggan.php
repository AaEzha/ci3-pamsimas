       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

           <div class="row">
               <div class="col-lg-12">
                   <div class="col-md-5">
                       <form action="" method="post">
                           <div class="input-group mb-4">
                               <input type="text" class="form-control" placeholder="Cari Data Pelanggan..." name="keyword" autocomplete="off" autofocus>
                               <div class="input-group-append">
                                   <button class="btn btn-primary" type="submit">Cari</button>

                               </div>
                           </div>

                   </div>

                   </form>

                   <?= $this->session->flashdata('message'); ?>

                   <table class="table table-hover" id="tabel">
                       <thead>
                           <tr>
                               <th scope="col-lg">No.</th>
                               <th scope="col-lg">Email</th>
                               <th scope="col-lg">Nama Pelanggan</th>
                               <th scope="col">NIK</th>
                               <th scope="col">Alamat</th>
                               <th scope="col">Pekerjaan</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($datapelanggan as $p) : ?>
                               <tr>
                                   <th scope="row"><?= $i; ?> </th>
                                   <td> <?= $p['email']; ?> </td>
                                   <td> <?= $p['name']; ?></td>
                                   <td> <?= $p['nik']; ?> </td>
                                   <td> <?= $p['alamat']; ?> </td>
                                   <td> <?= $p['pekerjaan']; ?> </td>
                                   <td><a href="<?= base_url(); ?>Admin/editpelanggan/<?= $p['id']; ?>" class="badge badge-success"> Edit </a>
                                       <a href="<?= base_url(); ?>Admin/hapuspelanggan/<?= $p['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');" class=" badge badge-danger"> Delete </a>
                                   </td>
                               </tr>
                               <?php $i++; ?>
                           <?php endforeach; ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
       <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->
