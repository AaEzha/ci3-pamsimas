       <!-- Begin Page Content -->
       <div class="container-fluid">

       	<!-- Page Heading -->
       	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

       	<div class="row">
       		<div class="col-md-6">
				<a name="" id="" class="btn btn-success mb-3" href="<?= base_url('user/pembayaran'); ?>" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Input Data Pembayaran</a>
			</div>
       		<div class="col-md-6">
       			<form class="form-inline" method="POST" action="<?= base_url('user/list'); ?>">

       				<label class="sr-only" for="bulan">Bulan</label>
       				<div class="input-group mb-2 mr-sm-2">
       					<div class="input-group-prepend">
       						<div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
       					</div>
       					<input type="month" class="form-control" id="bulan" name="bulan" placeholder="Bulan dan Tahun">
       				</div>

       				<button type="submit" class="btn btn-primary mb-2">Filter</button>
       				<a href="<?= base_url('user/list'); ?>" class="btn btn-warning mb-2 ml-2">Reset</a>
       			</form>
       		</div>
       	</div>

       	<div class="row">
       		<div class="col-lg-12">

       			<?= $this->session->flashdata('message'); ?>

       			<table class="table table-hover" id="tabel">
       				<thead>
       					<tr>
       						<th scope="col-lg">No.</th>
       						<th scope="col-lg">Nama</th>
       						<th scope="col-lg">Alamat</th>
       						<th scope="col">Tagihan</th>
       						<th scope="col">Tanggal Pembayaran</th>
       						<th scope="col">Biaya per Bulan</th>
       						<th scope="col">Denda</th>
       						<th scope="col">Total Tagihan</th>
       						<th scope="col">Bukti</th>
       						<th scope="col">Status</th>
       					</tr>
       				</thead>
       				<tbody>
       					<?php $i = 1; ?>
       					<?php $arrs = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']; ?>
       					<?php foreach ($data as $p) : ?>
       						<tr>
       							<th scope="row"><?= $i; ?> </th>
       							<td> <?= $p->name; ?> </td>
       							<td> <?= $p->alamat; ?> </td>
       							<td> <?= $arrs[$p->bulan + 1]; ?> <?= $p->tahun; ?> </td>
       							<td> <?= $p->date; ?> </td>
       							<td> <?= number_format($p->biaya, 0, ',', '.'); ?> </td>
       							<td> <?= number_format($p->denda, 0, ',', '.'); ?> </td>
       							<td> <?= number_format($p->tagihan, 0, ',', '.'); ?> </td>
       							<td> <a href="<?= base_url('assets/uploads/'); ?><?= $p->bukti; ?>" target="_blank"><img src="<?= base_url('assets/uploads/'); ?><?= $p->bukti; ?>" width="100"></a> </td>
       							<td>
       								<?php if ($p->status == 0) {
											echo "Menunggu";
										} else if ($p->status == 1) {
											echo "Diterima";
										} else {
											echo "Ditolak";
										}
										?>
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
