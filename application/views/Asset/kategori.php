<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>


        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhKAssetModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Kategori Asset</a>
        </div>

        <?= form_error('id_k_asset', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('nama_k_asset', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>

        <h5><?= $this->session->flashdata('message'); ?></h5> 

        <table class="table table-striped" id="k_asset">
            <thead>
                <td>#</td>
                <td>ID Kategori Asset</td>
                <td>Nama Kategori</td>
                <td>Terakhir Update</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($kategori as $k ) :?>
                <tr>
                <td><?=$i?></td>    
                <td><?= $k['id_k_asset']; ?></td>
                <td><?= $k['nama_k_asset']; ?></td>
                <td><?= $k['update_time']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#edtKasetModal<?= $k['id_k_asset']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Asset/Asset/delkAsset/" . $k['id_k_asset']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                
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

        <!-- akhir logout -->

        <!-- modal tambah -->

<div class="modal fade" id="tbhKAssetModal" tabindex="-1" role="dialog" aria-labelledby="tbhKAssetModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhKAssetModalLabel">Tambah Data Kategori Asset </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Asset/Asset/tambahKategori'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>ID Kategori Asset :</td>
            <td><input type="text" name="id_k_asset" id="id_k_asset" class="form-control" ></td>
        </tr>
        <tr>
            <td>Nama Kategori Asset :</td>
            <td><input type="text" name="nama_k_asset" id="nama_k_asset" class="form-control" ></td>
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

<!-- edit K_aset -->
<?php $i = 1;?>
<?php foreach($kategori as $k ) :?>
<div class="modal fade" id="edtKasetModal<?= $k['id_k_asset']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtKasetModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtKasetModalLabel">Edit Data Kategori Asset </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Asset/Asset/EditKategori'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>ID Kategori Asset :</td>
            <td><input type="text" name="id_k_asset" id="id_k_asset" class="form-control" value="<?= $k['id_k_asset']; ?>" ></td>
            <input type="hidden" name="oldid" value="<?= $k['id_k_asset']; ?>" >
        </tr>
        <tr>
            <td>Nama Kategori Asset :</td>
            <td><input type="text" name="nama_k_asset" id="nama_k_asset" class="form-control" value="<?= $k['nama_k_asset']; ?>" ></td>
            <input type="hidden" name="oldname" value="<?= $k['nama_k_asset']; ?>" >
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