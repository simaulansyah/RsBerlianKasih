<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhSplrModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Suplier</a>
        </div>
        
        <?= form_error('id_suplier', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('nama_suplier', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>


        <h5><?= $this->session->flashdata('message'); ?></h5> 
        
        <table class="table table-striped" id="datatabel">
        <thead>
            <tr>
                <td>#</td>
                <td>ID Suplier</td>
                <td>Nama Suplier</td>
                <td>Alamat Suplier</td>
                <td>Telepon Suplier</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0?>
            <?php foreach($suplier as $sup) : $i++ ?>
            <tr>
            <td><?=$i?></td>
              <td><?= $sup['id_suplier']?></td>  
              <td><?= $sup['nama_suplier']?></td>  
              <td><?= $sup['alamat_suplier']?></td>  
              <td><?= $sup['telepon_suplier']?></td>  
               
            </tr>
            
<?php endforeach;?>
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

        <!-- akhir logout -->



        <!-- modal tambah -->
        <div class="modal fade" id="tbhSplrModal" tabindex="-1" role="dialog" aria-labelledby="tbhSplrModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhSplrModalLabel">Tambah Data Asset </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <Form action="<?= base_url('Apotek/Obat/tambahSuplier'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
      <tr>
            <td>ID Suplier :</td>
            <td><input type="text" name="id_suplier" id="id_suplier" class="form-control">
        </td>
        </tr>
        <tr>
            <td>Nama Suplier :</td>
            <td><input type="text" name="nama_suplier" id="nama_suplier" class="form-control" >
        </td>
        </tr>
        <tr>
            <td>Alamat Supilier :</td>
            <td><input type="text" name="alamat_suplier" id="alamat_suplier" class="form-control" ></td>
        </tr>
        <tr>
            <td>Telepon :</td>
            <td><input type="text" name="telepon_suplier" id="telepon_suplier" class="form-control" ></td>
        </tr>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save changes</button>
      </div>
      </Form>
    </div>
  </div>
</div>
<!-- akhir modal tambah -->