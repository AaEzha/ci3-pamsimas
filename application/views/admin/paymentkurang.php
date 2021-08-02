        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>


        	<div class="row">
        		<div class="col-md-5">
        			<div class="card">
        				<div class="card-header">
        					Input Kekurangan Pembayaran
        				</div>
        				<div class="card-body">
        					<form action="" method="post">
        						<input type="hidden" name="id" value="<?= $id; ?>">
        						<div class="form-group">
        							<label for="kurang">Nominal Kekurangan</label>
        							<input type="number" class="form-control" name="kurang" id="kurang" aria-describedby="helpId" placeholder="Jumlah nominal kekurangan pembayaran" required>
									<?= form_error('kurang', '<small class="text-danger pl-3">', '</small>'); ?>
        						</div>
        						<input type="submit" value="Simpan" class="btn btn-primary">
        					</form>
        				</div>
        			</div>
        		</div>
        		<div class="col">
        			<div class="card">
        				<div class="card-header">
        					Data Pembayaran
        				</div>
        				<div class="card-body">

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Nama Pelanggan</label>
        						<div class="col-sm-9">
        							<input type="text" class="form-control" value="<?= $data->name; ?>" disabled>
        						</div>
        					</div>

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Alamat</label>
        						<div class="col-sm-9">
        							<input type="text" class="form-control" value="<?= $data->alamat; ?>" disabled>
        						</div>
        					</div>

        					<?php
							$arrs = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
							?>

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Tagihan</label>
        						<div class="col-sm-9">
        							<input type="text" class="form-control" value="<?= $arrs[$data->bulan]; ?> <?= $data->tahun; ?>" disabled>
        						</div>
        					</div>

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Biaya</label>
        						<div class="col-sm-9">
        							<input type="text" class="form-control" value="<?= $data->biaya; ?>" disabled>
        						</div>
        					</div>

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Denda</label>
        						<div class="col-sm-9">
        							<input type="text" class="form-control" value="<?= $data->denda; ?>" disabled>
        						</div>
        					</div>

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Tunggakan</label>
        						<div class="col-sm-9">
        							<input type="text" class="form-control" value="<?= $data->tunggakan; ?>" disabled>
        						</div>
        					</div>

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Total Tagihan</label>
        						<div class="col-sm-9">
        							<input type="text" class="form-control" value="<?= $data->tagihan; ?>" disabled>
        						</div>
        					</div>

        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Bukti Pembayaran</label>
        						<div class="col-sm-9">
								<a href="<?= base_url('assets/uploads/'); ?><?= $data->bukti; ?>" target="_blank"><img src="<?= base_url('assets/uploads/'); ?><?= $data->bukti; ?>" width="100"></a>
        						</div>
        					</div>

        				</div>
        			</div>
        		</div>
        	</div>


        </div>
