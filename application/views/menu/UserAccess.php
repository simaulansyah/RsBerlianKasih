<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhAccess" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Acces</a>
        </div>

        <?= form_error('role', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('menu', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>


        <h5><?= $this->session->flashdata('message'); ?></h5> 

        <table class="table table-striped" id="asset">
            <thead>
                <td>#</td>
                <td>ID User Acces</td>
                <td>Role ID</td>
                <td>Menu ID</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($userAccess as $u ) :?>
                <tr>
                <td><?=$i?></td>   
                <td><?= $u['id_access']; ?></td> 
                <td><?= $u['nama_jabatan']; ?></td>
                <td><?= $u['menu']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#edtAccess<?= $u['id_access']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Menu/UserAcces/delAccess/" . $u['id_access']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                </td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </tbody>
          </table>



<!-- modal tambah -->

<div class="modal fade" id="tbhAccess" tabindex="-1" role="dialog" aria-labelledby="tbhAccessLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhAccessLabel">Tambah Data Menu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Menu/UserAcces/tambahAccess'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>Role:</td>
            <td>
              <select  name="role" id="role" class="form-control" >
              <option selected="selected" value="">Select One...</option>
                    <?php foreach($role as $r) :?>
                    <option value="<?= $r['id_jabatan']; ?>"> <?=$r['nama_jabatan'] ?></option>
                    <?php endforeach; ?>
              </select>
            </td>
        </tr>
        <tr>
            <td> Menu :</td>
            <td>

            <select  name="menu" id="menu" class="form-control" >
              <option selected="selected" value="">Select One...</option>
                    <?php foreach($menu as $m) :?>
                    <option value="<?= $m['id_menu']; ?>"> <?=$m['menu'] ?></option>
                    <?php endforeach; ?>
              </select>


            </td>
        </tr>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </Form>
    </div>
  </div>
</div>


<!-- edit Menu -->
<?php $i = 1;?>
<?php foreach($userAccess as $u ) :?>
<div class="modal fade" id="edtAccess<?= $u['id_access']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtAccessLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtAccessLabel">Edit Data Menu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Menu/UserAcces/EditAccess'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>Role :</td>
            <td>
            <select name="role" id="role" class="form-control">
                                    <?php foreach ($role as $r) : ?> 
                                    <!-- get selected option -->
                                    <option <?php if($r['id_jabatan'] == $u['role_id'] ){ echo 'selected="selected"'; } ?> value="<?= $r['id_jabatan']; ?>"> <?= $r['nama_jabatan']; ?> </option> 
                                    <?php endforeach; ?>
                                </select>
            </td>
            <input type="hidden" name="id_access" value="<?= $u['id_access']; ?>">
        </tr>
        <tr>
            <td>Menu :</td>
            <td>
            <select name="menu" id="menu" class="form-control">
                                    <?php foreach ($menu as $m) : ?> 
                                    <!-- get selected option -->
                                    <option <?php if($m['id_menu'] == $u['menu_id'] ){ echo 'selected="selected"'; } ?> value="<?= $m['id_menu']; ?>"> <?= $m['menu']; ?> </option> 
                                    <?php endforeach; ?>
                                </select>
            </td>
           
        </tr>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </Form>
    </div>
  </div>
</div>
<?php $i++?>
<?php endforeach; ?>

         <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="<?= base_url('Auth/logout') ?>" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
    </div>
    <!-- Footer -->
