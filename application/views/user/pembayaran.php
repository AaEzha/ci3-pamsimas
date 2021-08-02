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

			<?php if ($this->session->flashdata('message')){ ?>
				<div class="alert alert-danger" role="alert">
					<?= $this->session->flashdata('message') ?>
				</div>
			<?php } ?>

			<form action="<?= base_url('user/pembayaran'); ?>" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<label for="name" class="col-sm-4 col-form-label">Nama Pelanggan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pelanggan['alamat']; ?>" readonly>
						<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="tahun" class="col-sm-12 col-form-label">Tagihan Pembayaran</label>
					<div class="row m-auto">
						<div class="col-sm-3">
							<input type="text" class="form-control" id="tahun" name="tahun" value="<?= set_value('tahun') ?>" placeholder="Tahun">
							<?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-sm-7">
							<select name="bulan" id="bulan" class="form-control" readonly>
									<option value="">Pilih Bulan</option>
								<?php $arrs = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; ?>
								<?php foreach ($arrs as $key => $arr) : ?>
									<option value="<?= $key + 1; ?>"><?= $arr; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="date" class="col-sm-4 col-form-label">Tanggal Pembayaran</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="datePembayaran" name="date" value="<?= set_value('date') ?>" readonly>
						<?= form_error('date', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="biaya" class="col-sm-4 col-form-label">Biaya Per Bulan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="biaya" name="biaya" value="15000" readonly>
						<?= form_error('biaya', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="denda" class="col-sm-4 col-form-label">Denda Keterlambatan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="denda" name="denda" value="<?= set_value('denda') ?>" readonly>
						<?= form_error('denda', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="tunggakan" class="col-sm-4 col-form-label">Jumlah Tunggakan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tunggakan" name="tunggakan" value="<?= set_value('tunggakan') ?>" readonly>
						<?= form_error('tunggakan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="tagihan" class="col-sm-4 col-form-label">Jumlah Tagihan</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tagihan" name="tagihan" value="<?= set_value('tagihan') ?>" readonly>
						<?= form_error('tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="bukti" class="col-sm-4 col-form-label">Bukti Pembayaran</label>
					<div class="col-sm-8">
						<input type="file" class="costum-file-input" id="bukti" name="bukti" value="<?= set_value('bukti') ?>">
						<label class="costum-file-label" for="bukti">Upload Bukti Pembayaran</label>
						<?= form_error('bukti', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

				</div>
				<div class="form group">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Kirim</button>

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
</head>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
