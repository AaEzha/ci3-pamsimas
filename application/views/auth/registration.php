<div class="row">
	<div class="col-md-7">
		<img src="<?= base_url('assets/img/bg.jpg'); ?>" class="img-fluid" alt="">
	</div>
	<div class="col-md-5">
		<div class="p-5">
			<div class="text-center">
				<h1 class="h4 text-gray-900 mb-4">
					<b> Daftar Akun Baru </b>
				</h1>
			</div>
			<form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama lengkap" value="<?= set_value('name') ?>">
					<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat email" value="<?= set_value('email') ?>">
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
					<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
				</div>
				<button type="submit" class="btn btn-primary btn-user btn-block">
					Daftar
				</button>
			</form>
			<hr>
			<div class="text-center">
				<!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
			</div>
			<div class="text-center">
				<a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Login!</a>
			</div>
		</div>
	</div>
</div>
