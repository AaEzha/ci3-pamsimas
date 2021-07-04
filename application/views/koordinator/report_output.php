        <!-- Begin Page Content -->
        <div class="container-fluid" id="cetakyuk">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

        	<?php echo "<b> <i> ~ Report $bulannya - $tahun ~ </i> </b>"; ?>
			<?php $total = 0; ?>
        	<div class="card">
        		<div class="card-body">
        			<?php $jumlah_saldo = 0; ?>
        			<div class="row mb-3 mt-3">
        				<div class="col">
        					<div class="row mb-2">
        						<div class="col-md-6 font-weight-bold">1. Saldo Awal</div>
        						<div class="col-md-3">Rp.</div>
        						<div class="col-md-3">Rp.</div>
        					</div>
        					<div class="row">
        						<div class="col-md-6">a. Kas</div>
        						<div class="col-md-3"><?= number_format($saldo_kas, 0, ',', '.'); ?></div>
        						<div class="col-md-3"></div>
        					</div>
							<?php $jumlah_saldo += $saldo_kas; ?>
        					<div class="row mt-2 font-weight-bold">
        						<div class="col-md-6">Jumlah</div>
        						<div class="col-md-3">&nbsp;</div>
        						<div class="col-md-3"><?= number_format($jumlah_saldo, 0, ',', '.'); ?></div>
        					</div>
        				</div>
        			</div>
					<?php $total += $jumlah_saldo; ?>

        			<?php $jumlah_pemasukan = 0; ?>
        			<div class="row mb-3 mt-5">
        				<div class="col">
        					<div class="row mb-2">
        						<div class="col-md-12 font-weight-bold">2. Pemasukan</div>
        					</div>
        					<?php $no = "a";
							foreach ($kas_masuk as $kas) : ?>
        						<?php if ($kas->nominal > 0) : ?>
        							<div class="row">
        								<div class="col-md-6"><?= $no++; ?>. <?= $kas->ket; ?></div>
        								<div class="col-md-6"><?= number_format($kas->nominal, 0, ',', '.'); ?></div>
        							</div>
        							<?php $jumlah_pemasukan += $kas->nominal; ?>
        						<?php endif; ?>
        					<?php endforeach; ?>
        					<div class="row mt-2 font-weight-bold">
        						<div class="col-md-6">Jumlah</div>
        						<div class="col-md-3">&nbsp;</div>
        						<div class="col-md-3"><?= number_format($jumlah_pemasukan, 0, ',', '.'); ?></div>
        					</div>
        				</div>
        			</div>
					<?php $total += $jumlah_pemasukan; ?>

        			<?php $jumlah_pengeluaran = 0; ?>
        			<div class="row mb-3 mt-5">
        				<div class="col">
        					<div class="row mb-2">
        						<div class="col-md-12 font-weight-bold">3. Pengeluaran</div>
        					</div>
        					<?php $no = "a";
							foreach ($kas_keluar as $kas) : ?>
        						<?php if ($kas->nominal > 0) : ?>
        							<div class="row">
        								<div class="col-md-6"><?= $no++; ?>. <?= $kas->ket; ?></div>
        								<div class="col-md-6"><?= number_format($kas->nominal, 0, ',', '.'); ?></div>
        							</div>
        							<?php $jumlah_pengeluaran += $kas->nominal; ?>
        						<?php endif; ?>
        					<?php endforeach; ?>
        					<div class="row mt-2 font-weight-bold">
        						<div class="col-md-6">Jumlah</div>
        						<div class="col-md-3">&nbsp;</div>
        						<div class="col-md-3"><?= number_format($jumlah_pengeluaran, 0, ',', '.'); ?></div>
        					</div>
        				</div>
        			</div>
					<?php $total -= $jumlah_pengeluaran; ?>

        			<div class="row mb-3 mt-5">
        				<div class="col">
        					<div class="row mb-2">
        						<div class="col-md-9 font-weight-bold">Saldo Akhir {(1 + 2) - 3}</div>
        						<div class="col-md-3 font-weight-bold"><?= number_format($total, 0, ',', '.'); ?></div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>


        	<div class="row my-4">
        		<div class="col">
        			.................................., ..................... 20.....
        		</div>
        	</div>

        	<div class="row">
        		<div class="col-md-4">
        			<p style="margin-bottom: 100px;">Dibuat Oleh <br>
        				Sekretariat KPSPAMS</p>
        			<p>M A I E S N I T A</p>
        		</div>
        		<div class="col-md-4">
        			<p style="margin-bottom: 100px;">Diketahui Oleh <br>
        				Ketua</p>
        			<p>I R W A N</p>
        		</div>
        	</div>

        </div>
        <!-- /.container-fluid -->

		<button class="btn btn-primary m-5" onclick="printDiv('cetakyuk')" /><i class="fa fa-print" aria-hidden="true"></i> Print</button>
		<a href="<?=base_url('koordinator/report');?>" class="btn btn-dark">Kembali</a>

        </div>
        <!-- End of Main Content -->
