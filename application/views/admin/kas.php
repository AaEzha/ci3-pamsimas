        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

        	<div class="row">
        		<div class="col-lg-12">

        			<?php if (validation_errors()) : ?>
        				<div class="alert alert-danger" role="alert">
        					<?= validation_errors() ?>
        				</div>
        			<?php endif; ?>

        			<?= $this->session->flashdata('message'); ?>

        			<div class="row">
        				<div class="col-md-6">
        					<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataModal"> Tambah Data Harian </a>
        				</div>
        				<div class="col-md-6">
        					<form class="form-inline" method="POST" action="<?= base_url('admin/filterkas'); ?>">

        						<label class="sr-only" for="bulan">Bulan</label>
        						<div class="input-group mb-2 mr-sm-2">
        							<div class="input-group-prepend">
        								<div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
        							</div>
        							<input type="month" class="form-control" id="bulan" name="bulan">
        						</div>

        						<button type="submit" class="btn btn-primary mb-2">Filter</button>
        						<a href="<?= base_url('admin/kasharian'); ?>" class="btn btn-warning mb-2 ml-2">Reset</a>
        					</form>
        				</div>
        			</div>

        			<table class="table table-hover" id="tabel">
        				<thead>
        					<tr>
        						<th scope="col-lg">Date</th>
        						<th scope="col-lg">Keterangan</th>
        						<th scope="col">Debet</th>
        						<th scope="col">Kredit</th>
        						<th scope="col">Saldo</th>
        						<th scope="col">Action</th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php
							$jdebet = 0;
							$jkredit = 0;
							$jsaldo = 0;
							?>
        					<?php foreach ($kas as $k) : ?>
        						<tr>
        							<td> <?= $k['date']; ?> </td>
        							<td> <?= $k['ket']; ?></td>
        							<td> Rp.<?= number_format($k['debet'], 0, ',', '.'); ?> </td>
        							<td> Rp.<?= number_format($k['kredit'], 0, ',', '.'); ?> </td>
        							<td> Rp.<?= number_format($k['jumlah'], 0, ',', '.'); ?> </td>
        							<td>

        								<a href="<?= base_url(); ?>Admin/editKas/<?= $k['id']; ?>" class="badge badge-success"> Edit </a>
        								<a href="<?= base_url(); ?>Admin/hapus/<?= $k['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');"> Delete </a>
        							</td>
        						</tr>
        						<?php
								$jdebet += $k['debet'];
								$jkredit += $k['kredit'];
								$jsaldo = $k['jumlah'];
								?>
        					<?php endforeach; ?>
        				</tbody>
        				<tr>
        					<th scope="col-lg" colspan="2">Jumlah Saldo</th>
        					<th>Rp.<?= number_format($jdebet, 0, ',', '.'); ?></th>
        					<th>Rp.<?= number_format($jkredit, 0, ',', '.'); ?></th>
        					<th>Rp.<?= number_format($jsaldo, 0, ',', '.'); ?></th>
        				</tr>
        			</table>
        		</div>
        	</div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal -->
        <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h5 class="modal-title" id="newDataModalLabel">Tambahkan Data Harian</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>

        			<form action="<?= base_url('admin/kasharian'); ?>" method="post">

        				<div class="modal-body">

        					<div class="form-group">
        						<label for="date">Tanggal</label>
        						<input type="date" class="form-control" id="date" name="date" placeholder="Date">
        					</div>

        					<div class="form-group">
        						<input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan">
        					</div>

        					<div class="form-group">
        						<label for="jenis">Jenis Kas</label>
        						<select class="form-control" name="jenis" id="jenis">
        							<option value="debet">Debet</option>
        							<option value="kredit">Kredit</option>
        						</select>
        					</div>

        					<div class="form-group">
        						<input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal, contoh: 1500000">
        					</div>

        				</div>
        				<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        					<button type="submit" class="btn btn-primary">Tambah</button>
        				</div>
        			</form>
        		</div>
        	</div>
        </div>
