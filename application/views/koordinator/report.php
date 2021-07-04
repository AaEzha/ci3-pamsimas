        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

        	<div class="card">
        		<div class="card-body">
        			<p>Pilih bulan dan tahun dahulu</p>
        			<form action="" method="post">
        				<div class="row">
        					<!-- <div class="col-md-2">
        						<select class="form-control" name="bulan" required>
									<option value="">Pilih bulan</option>
									<?php foreach($bln as $b): ?>
        							<option value="<?=$b['id'];?>"><?=$b['bulan'];?></option>
									<?php endforeach; ?>
        						</select>
        					</div>
        					<div class="col-md-2">
        						<input type="text" class="form-control" placeholder="Tahun" name="tahun" required>
        					</div> -->
        					<div class="col-md-3">
        						<input type="month" class="form-control" placeholder="Bulan dan Tahun" name="bulan" required>
        					</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-primary">Tampilkan</button>
							</div>
        				</div>
        			</form>
        		</div>
        	</div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
