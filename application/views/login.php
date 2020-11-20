<div class="wrapper">
	<div class="inner">
       
        <img src="<?= base_url('vendor/img/hospital.png') ?>" alt="" class="image-1">

		<form action="<?= base_url('Auth') ?>" method="post">
			<h3>Login Access</h3>	
			<div class="form-holder">
				<span class="lnr lnr-envelope"></span>
				<input type="text" name="username" id="username" class="form-control" placeholder="UserName">
				<?= form_error('username', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
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
        <option value="<?= $r['role_id']; ?>"> <?=$r['role'] ?></option>
        <?php endforeach; ?>
      </select>
			
			</div>
			<button>
				<span>Login</span>
			</button>
		</form>
		<img src="<?= base_url('vendor/img/image-2.png') ?>" alt="" class="image-2">
	</div>

</div>