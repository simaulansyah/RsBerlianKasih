<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>



        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhLokasiModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Lokasi Asset</a>
        </div>

        <?= form_error('nama_lokasi', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <h5><?= $this->session->flashdata('message'); ?></h5> 

        <table class="table table-striped" id="lokasi_aset">
            <thead>
                <td>#</td>
                <td>Nama Lokasi</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($lokasi as $l ) :?>
                <tr>
                <td><?=$i?></td>    
                <td><?= $l['nama_lokasi']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#edtLokasiModal<?= $l['id_lokasi']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Asset/Asset/delLokasi/" . $l['id_lokasi']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                
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


<!-- modal tambah lokasi -->
        <div class="modal fade" id="tbhLokasiModal" tabindex="-1" role="dialog" aria-labelledby="tbhLokasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhLokasiModalLabel">Tambah Data Kategori Asset </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Asset/Asset/tambahLokasi'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>Nama Lokasi </td>
            <td><input type="text" name="nama_lokasi" id="nama_lokasi" class="form-control" ></td>
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

<!-- akhir tambah -->
<!-- modal edit  -->

<?php $i = 1;?>
<?php foreach($lokasi as $l ) :?>
<div class="modal fade" id="edtLokasiModal<?= $l['id_lokasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtLokasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtLokasiModalLabel">Edit Data Lokasi </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Asset/Asset/EditLokasi'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>Nama Lokasi :</td>
            <input type="hidden" name="id_lokasi" id="id_lokasi" value="<?= $l['id_lokasi']; ?>" >
            <input type="hidden" name="oldname" id="oldname" value="<?= $l['nama_lokasi']; ?>" >            
            <td><input type="text" name="nama_lokasi" id="nama_lokasi" class="form-control" value="<?= $l['nama_lokasi']; ?>" ></td>
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

