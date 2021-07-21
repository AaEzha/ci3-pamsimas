<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

	<p>Kirim notifikasi email ke seluruh pelanggan.</p>

	<?= $this->session->flashdata('message'); ?>

	<div class="card">
		<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
				  <label for="pesan">Pesan</label>
				  <textarea class="form-control" name="pesan" id="pesan" rows="3" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Kirim Email</button>
			</form>
		</div>
	</div>

</div>
