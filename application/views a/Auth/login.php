<div class="wrapper">
	<div class="inner">
       
        <img src="<?= base_url('vendor/img/hospital.png') ?>" alt="" class="image-1">

		<form action="<?= base_url('Auth') ?>" method="post">
			<h3>Login Access</h3>
			<h4><?= $this->session->flashdata('message'); ?></h4> 
			<div class="form-holder">
				<span class="lnr lnr-envelope"></span>
				<input type="text" name="email" id="email" class="form-control" placeholder="Email">
				<?= form_error('email', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
			</div>
			<div class="form-holder">
				<span class="lnr lnr-lock"></span>
				<input type="password" name="password" id="password" class="form-control" placeholder="Password">
				<?= form_error('password', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
			</div>
			<div class="form-holder">
                <span class="lnr lnr-user"></span>
                <select  name="role" id="role" class="form-control" >
        <option selected="selected" value="">Select One...</option>
        <?php foreach($role as $r) :?>
        <option value="<?= $r['id_jabatan']; ?>"> <?=$r['nama_jabatan'] ?></option>
        <?php endforeach; ?>
      </select>
			
			</div>
			<button>
				<span>Login</span>
			</button>
			<br>
            <div class="text-center">
                <a class="small" href="<?= base_url('auth/regis'); ?>">Belum Punya Akun? Daftar!</a>
              </div>
		</form>
		<img src="<?= base_url('vendor/img/image-2.png') ?>" alt="" class="image-2">
	</div>

</div>