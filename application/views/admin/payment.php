        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

        	<div class="row">
        		<div class="offset-md-6 col-md-6">
        			<form class="form-inline" method="POST" action="<?= base_url('admin/filterpayment'); ?>">

        				<label class="sr-only" for="bulan">Bulan</label>
        				<div class="input-group mb-2 mr-sm-2">
        					<div class="input-group-prepend">
        						<div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
        					</div>
        					<input type="month" class="form-control" id="bulan" name="bulan" placeholder="Bulan dan Tahun">
        				</div>

        				<button type="submit" class="btn btn-primary mb-2">Filter</button>
        				<a href="<?= base_url('admin/payment'); ?>" class="btn btn-warning mb-2 ml-2">Reset</a>
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
        						<th scope="col">#</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php $i = 1; $total = 0; ?>
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
											$total += $p->tagihan;
											echo "Diterima";
										} else {
											echo "Ditolak";
										}
										?>
        							</td>
        							<td>
        								<?php if ($p->status == 0) { ?>
        									<a class="btn btn-primary btn-sm" href="<?= base_url('admin/payment_ubah/' . $p->id . '/' . md5('1')); ?>" role="button" title="terima pembayaran"><i class="fa fa-check" aria-hidden="true"></i></a>
        									<a class="btn btn-danger btn-sm" href="#" role="button" title="tolak pembayaran" onclick="batal(<?= $p->id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>
        								<?php } else if ($p->status == 1) { ?>
        									<!-- <a class="btn btn-danger btn-sm" href="#" role="button" title="tolak pembayaran" onclick="batal(<?= $p->id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>
        									<a class="btn btn-dark btn-sm" href="<?= base_url('admin/payment_ubah/' . $p->id . '/' . md5('0')); ?>" role="button" title="tahan pembayaran"><i class="fa fa-recycle" aria-hidden="true"></i></a> -->
        								<?php } else if ($p->status == 3) { ?>
        									<a class="btn btn-dark btn-sm" href="<?= base_url('admin/payment_ubah/' . $p->id . '/' . md5('0')); ?>" role="button" title="tahan pembayaran"><i class="fa fa-recycle" aria-hidden="true"></i></a>
        								<?php } ?>
        								<!-- <?= base_url('admin/payment_ubah/' . $p->id . '/' . md5('3')); ?> -->
        							</td>
        						</tr>
        						<?php $i++; ?>
        					<?php endforeach; ?>
        				</tbody>
						<tfooter>
							<tr>
								<th colspan="7" class="text-right">Total Diterima</th>
								<th colspan="4"> Rp <?= number_format($total, 0, ',', '.'); ?>,-</th>
							</tr>
						</tfooter>
        			</table>
        		</div>
        	</div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
