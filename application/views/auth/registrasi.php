<div class="">

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
	<div class="card-body p-0">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class="col-lg">
				<div class="p-5">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
					</div>
					<form class="user" method="POST" action="<?= base_url('auth/registration') ?>">
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama lengkap" value="<?= set_value('nama') ?>">
							<?= form_error('nama', '<small><p class="text-danger pl-3">', '</p></small>'); ?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat email" value="<?= set_value('email') ?>">
							<?= form_error('email', '<small><p class="text-danger pl-3">', '</p></small>'); ?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="j_kelamin" name="j_kelamin" placeholder="Jenis kelamin" value="<?= set_value('j_kelamin') ?>">
							<?= form_error('j_kelamin', '<small><p class="text-danger pl-3">', '</p></small>'); ?>
						</div>
						<div class=" form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata sandi">
								<?= form_error('password1', '<small><p class="text-danger pl-3">', '</p></small>'); ?>
							</div>
							<div class="col-sm-6">
								<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Masukan ulang kata sandi">

							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-user btn-block">
							Register Account
						</button>
					</form>
					<hr>
					<div class="text-center">
						<a class="small" href="forgot-password.html">Lupa kata sandi?</a>
					</div>
					<div class="text-center">
						<a class="small" href="<?= base_url('Auth') ?>">Sudah punya akun? Login!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>