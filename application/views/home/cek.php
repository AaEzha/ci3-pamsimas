<h1 class="h4 text-gray-900 mb-4"> <b> <?= $title; ?> </b> </h1>

<p>Ini adalah simulasi untuk melihat tagihan Anda. Masukkan bulan tagihan, maka akan muncul tagihan yang harus dibayarkan.</p>

<div class="card">
	<div class="card-body">
		<?php if (!is_null($this->session->flashdata('message'))) { ?>
			Tagihan Anda untuk <?= tanggal($tagihan); ?> adalah <?=number_format($total, 0, ',', '.'); ?>
			<hr>
		<?php } ?>
		<form action="" method="post">

			<div class="form-group">
				<label for="bulan">Bulan Tagihan</label>
				<input type="month" class="form-control" name="bulan" id="bulan" aria-describedby="" placeholder="Bulan Tagihan" required>
			</div>

			<button type="submit" class="btn btn-primary btn-block">Periksa Tagihan</button>
		</form>
	</div>
</div>
