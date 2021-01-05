<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhMenu" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Acces</a>
        </div>

        <?= form_error('nama_menu', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>

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
                <td><?= $u['role']; ?></td>
                <td><?= $u['menu']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#edtMenu<?= $u['id_access']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Menu/Menu/delMenu/" . $u['id_access']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                </td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </tbody>
          </table>







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
