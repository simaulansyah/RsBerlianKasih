<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhSpsModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Spesialisasi</a>
        </div>

        <?= form_error('id_spesialisasi', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('nama_spesialisasi', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>

        <h5><?= $this->session->flashdata('message'); ?></h5> 

        <table class="table table-striped" id="datatabel">
            <thead>
                <td>#</td>
                <td>ID Spesialisasi</td>
                <td>Nama Spesialisasi</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($spesialisasi as $s ) :?>
                <tr>
                <td><?=$i?></td>   
                <td><?= $s['id_spesialisasi']; ?></td> 
                <td><?= $s['nama_spesialisasi']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#edtSpsModal<?= $s['id_spesialisasi']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Dokter/Spesialisasi/delSpesialisasi/" . $s['id_spesialisasi']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                </td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </tbody>
          </table>
<!-- akhir  tabel -->




    <!-- modal tambah data -->

<div class="modal fade" id="tbhSpsModal" tabindex="-1" role="dialog" aria-labelledby="tbhSpsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhSpsModalLabel">Tambah Data Spesialisasi </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Dokter/Spesialisasi/tambahdata'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>ID Spesialisasi :</td>
            <td><input type="text" name="id_spesialisasi" class="form-control" ></td>
        </tr>
        <tr>
            <td>Nama Spesialisasi :</td>
            <td><input type="text" name="nama_spesialisasi" class="form-control" ></td>
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
<!-- akhir tambah data -->


<!-- edit data -->
<?php $i=0?>
    <?php foreach($spesialisasi as $s) : $i++ ?>
<div class="modal fade" id="edtSpsModal<?= $s['id_spesialisasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtSpsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtSpsModalLabel">Edit Data Spesialisasi </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Dokter/Spesialisasi/editSpesialisasi'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>ID Spesialisasi :</td>
            <input type="hidden" name="oldid" id="oldid" value="<?= $s['id_spesialisasi']?>">
            <td><input type="text" name="id_spesialisasi" class="form-control" value="<?=$s['id_spesialisasi']?>"  ></td>
        </tr>
        <tr>
            <td>Nama Spesialisasi :</td>
            <input type="hidden" name="oldname" id="oldname" value="<?= $s['nama_spesialisasi']?>">
            <td><input type="text" name="nama_spesialisasi" class="form-control"  value="<?=$s['nama_spesialisasi']?>" ></td>
        </tr>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</Form>
<?php endforeach;?>








<!-- akhir edit data -->


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