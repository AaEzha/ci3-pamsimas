<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

	<div class="row">
		<div class="col-md-6">

			<div class="card">

				<div class="card-header bg-primary text-white">
					Data Pelanggan
				</div>

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
					</form>
				</div>

			</div>

		</div>

		<div class="col-md-6">

			<div class="card">

				<div class="card-header bg-primary text-white">
					Pengaturan Tagihan Selanjutnya
				</div>

				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				<?php endif; ?>

				<?= $this->session->flashdata('message'); ?>


				<div class="card-body">

					<form action="<?=base_url('admin/ubah_tagihan');?>" method="post">
						<input type="hidden" name="id" value="<?= $tagihan["user_id"]; ?>">

						<div class="form-group">

							<label for="bulann">Bulan</label>
							<input type="number" name="bulan" class="form-control" id="bulann" value="<?= $tagihan['bulan']; ?>" placeholder="Bulan (angka saja). Harus diisi." required aria-describedby="helpId"> 
							<small id="helpId" class="form-text text-muted">Contoh. Untuk bulan Januari, cukup tulis "1", atau untuk Desember, cukup tulis "12" (tanpa tanda kutip)</small>
						</div>

						<div class="form-group">
							<label for="tahunn">Tahun</label>
							<input type="number" name="tahun" class="form-control" id="tahunn" value="<?= $tagihan['tahun']; ?>" placeholder="Tahun (angka saja). Harus diisi." required>
						</div>

						<div class="form-group">
							<label for="tunggakan">Tunggakan</label>
							<input type="number" name="tunggakan" class="form-control" id="tunggakan" value="<?= $tagihan['tunggakan'] ?? "0"; ?>" required min="0">
						</div>

				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>

			</div>

		</div>

	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
