       <!-- Begin Page Content -->
       <div class="container-fluid">

       	<!-- Page Heading -->
       	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

       	<div class="row">
       		<div class="col-lg-12">
       			</form>

       			<?= $this->session->flashdata('message'); ?>

       			<table class="table table-hover" id="tabel">
       				<thead>
       					<tr>
       						<th scope="col-lg">No.</th>
       						<th scope="col-lg">Email</th>
       						<th scope="col-lg">Nama Pelanggan</th>
       						<th scope="col">Tanggal Daftar</th>
       						<th scope="col">Pembayaran Selanjutnya</th>
       						<th scope="col">NIK</th>
       						<th scope="col">Alamat</th>
       						<th scope="col">Pekerjaan</th>
       						<th scope="col">Status</th>
       						<th scope="col">Action</th>
       					</tr>
       				</thead>
       				<tbody>
       					<?php 
						$i = 1; 
						$arrs = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						?>
       					<?php foreach ($datapelanggan as $p) : ?>
       						<?php
								$this->db->where('email', $p['email']);
								$d = $this->db->get('user');
								$q = $d->row();

								// pembayaran terakhir
								// $bulan = date('n');
								// $this->db->where('tahun', date('Y'));
								// $this->db->where('bulan', $bulan);
								// $this->db->where('user_id', $q->id);
								// $pem = $this->db->get('payment');
								// $qp = $pem->row();

								// pembayaran selanjutnya
								$this->db->where('user_id', $q->id);
								$tag = $this->db->get('tagihan');
								$qt = $tag->row();
								?>
       						<tr>
       							<th scope="row"><?= $i; ?> </th>
       							<td> <?= $p['email']; ?> </td>
       							<td> <?= $p['name']; ?></td>
       							<td> <?= date('d F Y', $q->date_created); ?> </td>
       							<td>
       								<?= $arrs[$qt->bulan] . " " . $qt->tahun; ?>
       							</td>
       							<td> <?= $p['nik']; ?> </td>
       							<td> <?= $p['alamat']; ?> </td>
       							<td> <?= $p['pekerjaan']; ?> </td>
       							<td>
       								<?= ($q->is_active == 1) ? "Aktif" : "Non-Aktif"; ?>
       							</td>
       							<td><a href="<?= base_url(); ?>Admin/editpelanggan/<?= $p['id']; ?>" class="badge badge-success"> Edit </a>
       								<a href="<?= base_url(); ?>Admin/hapuspelanggan/<?= $p['id']; ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');" class=" badge badge-danger"> Delete </a>
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
