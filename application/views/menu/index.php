<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhMenu" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Menu</a>
        </div>

        <?= form_error('nama_menu', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>


        <h5><?= $this->session->flashdata('message'); ?></h5> 


        <table class="table table-striped" id="asset">
            <thead>
                <td>#</td>
                <td>ID Menu</td>
                <td>Menu</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($menu as $m ) :?>
                <tr>
                <td><?=$i?></td>   
                <td><?= $m['id_menu']; ?></td> 
                <td><?= $m['menu']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#edtMenu<?= $m['id_menu']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Menu/Menu/delMenu/" . $m['id_menu']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                </td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </tbody>
          </table>


 <!-- modal tambah -->

 <div class="modal fade" id="tbhMenu" tabindex="-1" role="dialog" aria-labelledby="tbhMenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhMenuLabel">Tambah Data Menu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Menu/Menu/tambahMenu'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>Nama Menu :</td>
            <td><input type="text" name="nama_menu" id="nama_menu" class="form-control" ></td>
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
<?php foreach($menu as $m ) :?>
<div class="modal fade" id="edtMenu<?= $m['id_menu']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtMenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtMenuLabel">Edit Data Menu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Menu/Menu/EditMenu'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>ID Menu :</td>
            <td><input type="text" name="id_menu" id="id_menu" class="form-control" value="<?= $m['id_menu']; ?>" readonly ></td>
        </tr>
        <tr>
            <td>Nama Menu :</td>
            <td><input type="text" name="nama_menu" id="nama_menu" class="form-control" value="<?= $m['menu']; ?>" ></td>
            <input type="hidden" name="oldname" value="<?= $m['menu']; ?>" >
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
