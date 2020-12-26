<div class="wrapper">
	<div class="inner">
       
        <img src="<?= base_url('vendor/img/hospital.png') ?>" alt="" class="image-1">

		<form action="<?= base_url('Auth/Regis') ?>" method="post">
			<h3>Form Pendaftaran </h3>	
            <h5><?= $this->session->flashdata('message'); ?></h5> 
			<div class="form-holder">
				<span class="lnr lnr-user"></span>
				<input type="text" name="username" id="username" class="form-control" placeholder="UserName" value="<?= set_value('username'); ?>" >
				<?= form_error('username', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
			</div>
            <div class="form-holder">
            <span class="lnr lnr-envelope"></span>
                  <input name="email" type="text" class="form-control form-control-user"  placeholder="Email Address" value="<?= set_value('email'); ?>">
                  <!-- if form error was encountered -->
                  <?= form_error('email','<small class="text-danger pl-2 pt-1">','</small>'); ?>
                </div>
			<div class="form-holder">
				<span class="lnr lnr-lock"></span>
				<input type="password" name="password" id="password" class="form-control" placeholder="Password">
				<?= form_error('password', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
			</div>
            <div class="form-holder">
            <span class="lnr lnr-checkmark-circle"></span>
				<input type="password" name="password2" class="form-control" placeholder="Verify Password">
				<?= form_error('password', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
			</div>
			<div class="form-holder">
                <span class="lnr lnr-users"></span>
                <select  name="role" id="role" class="form-control" >
        <option selected="selected" value="">Select One...</option>
        <?php foreach($role as $r) :?>
        <option value="<?= $r['role_id']; ?>"> <?=$r['role'] ?></option>
        <?php endforeach; ?>
       
      </select>
      <?= form_error('role','<small class="text-danger pl-2 pt-1">','</small>'); ?>
			</div>
			<button>
				<span>Daftar</span>
			</button>
            <br>
            <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun? Login!</a>
              </div>
		</form>
		<img src="<?= base_url('vendor/img/image-2.png') ?>" alt="" class="image-2">
	</div>


</div>