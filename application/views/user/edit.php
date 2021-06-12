        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

			<?= $this->session->flashdata('message'); ?>

        	<div class="row">
        		<div class="col-lg-6">
        			<?= form_open_multipart('user/edit'); ?>
        			<div class="form-group row">
        				<label for="email" class="col-sm-3 col-form-label">Email</label>
        				<div class="col-sm-9">
        					<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>

        				</div>

        			</div>
        			<div class="form-group row">
        				<label for="name" class="col-sm-3 col-form-label">Nama</label>
        				<div class="col-sm-9">
        					<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
        					<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        				</div>

        			</div>
        			<div class=" form-group row">
        				<div class="col-sm-3">Photo</div>
        				<div class="col-sm-9">
        					<div class="row">
        						<div class="col-sm-4">
        							<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
        						</div>
        						<div class="col-sm-8">
        							<input type="file" class="costum-file-input" id="image" name="image">
        							<label class="costum-file-label" for="image">Pilih gambar</label>
        						</div>
        					</div>
        				</div>
        			</div>

        			<div class="form group row justify-content-end">
        				<div class="col-sm-9">
        					<button type="submit" class="btn btn-primary">Simpan</button>

        				</div>

        			</div>
        		</div>
        		<div class="col-lg-6">
        			<div class="form-group row">
        				<label for="nik" class="col-sm-3 col-form-label">No. NIK</label>
        				<div class="col-sm-9">
        					<input type="text" class="form-control" id="nik" name="nik" value="<?= $pelanggan['nik'] ?? "" ?>">
        					<?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
        				</div>
        			</div>

        			<div class="form-group row">
        				<label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
        				<div class="col-sm-9">
        					<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pelanggan['alamat'] ?? "" ?>">
        					<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
        				</div>
        			</div>

        			<div class="form-group row">
        				<label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
        				<div class="col-sm-9">
        					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pelanggan['pekerjaan'] ?? "" ?>">
        					<?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
        				</div>
        			</div>

        			</form>
        		</div>


        	</div>
        	<!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
