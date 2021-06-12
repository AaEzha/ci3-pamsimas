        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

        	<div class="row">
        		<div class="col-lg-8">
        			<?= $this->session->flashdata('message'); ?>
        		</div>

        	</div>

        	<div class="row">
        		<div class="col-md-6 mb-3">
        			<div class="card">
        				<div class="row no-gutters">
        					<div class="col-md-4">
        						<img src="<?= base_url('assets/img/profile/') .
												$user['image']; ?>" class="card-img">
        					</div>
        					<div class="col-md-8">
        						<div class="card-body">
        							<h5 class="card-title"><?= $user['name']; ?></h5>
        							<p class="card-text"><?= $user['email']; ?></p>
        							<p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?>
        								</small></p>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="card">
						<img class="card-img-top" src="holder.js/100x180/" alt="">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-md-3">
									<p class="card-text font-weight-bold">NIK</p>
								</div>
								<div class="col-md-9">
									<p class="card-text"><?= $pelanggan['nik'] ?? ""; ?></p>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-3">
									<p class="card-text font-weight-bold">Alamat</p>
								</div>
								<div class="col-md-9">
									<p class="card-text"><?= $pelanggan['alamat'] ?? ""; ?></p>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-3">
									<p class="card-text font-weight-bold">Pekerjaan</p>
								</div>
								<div class="col-md-9">
									<p class="card-text"><?= $pelanggan['pekerjaan'] ?? ""; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
        	</div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
