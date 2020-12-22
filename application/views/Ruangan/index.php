    <!-- Sidebar -->

    <!-- Sidebar -->

    <!-- TopBar -->

    <!-- Topbar -->

    <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhRuanganModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Ruangan</a>
        </div>

        <?= form_error('idruangan', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('namaruangan', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('kapaitas', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('kelas', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('jenis', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        

        <h5><?= $this->session->flashdata('message'); ?></h5> 

        <table class="table table-striped" id="ruangan">
        <thead>
            <td>#</td>
                <td>ID Ruangan</td>
                <td>Nama Ruangan</td>
                <td>Kapasitas</td>
                <td>Kelas</td>
                <td>Jenis</td>
                <td>aksi</td>
        </thead>
        <tbody>
        <?php $i = 1;?>
            <?php foreach($ruangan as $s) :?>
        <tr>
                <td><?=$i?></td>    
                <td><?= $s['id_ruangan']; ?></td>
                <td><?= $s['nama_ruangan']; ?></td>
                <td><?= $s['kapasitas']; ?></td>
                <td><?= $s['kelas']; ?></td>
                <td><?= $s['jenis']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#editRuanganModal<?= $s['id_ruangan']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?=site_url("Ruangan/Ruangan/hapusRuangan/" . $s['id_ruangan']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                
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


    <!-- modal tambah data -->

<div class="modal fade" id="tbhRuanganModal" tabindex="-1" role="dialog" aria-labelledby="tbhRuanganModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhRuanganModalLabel">Tambah Data Ruangan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Ruangan/Ruangan/tambahdata'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>ID Ruangan :</td>
            <td><input type="text" name="idruangan" class="form-control" ></td>
        </tr>
        <tr>
            <td>Nama Ruangan :</td>
            <td><input type="text" name="namaruangan" class="form-control" ></td>
        </tr>
        <tr>
            <td>Kapasitas :</td>
            <td><input type="text" name="kapasitas" class="form-control" ></td>
        </tr>
        <tr>
            <td>Kelas :</td>
            <td><input type="text" name="kelas" class="form-control" ></td>
        </tr>
        <tr>
            <td>Jenis :</td>
            <td><input type="text" name="jenis" class="form-control" ></td>
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


      <!-- modal edit  data -->
      <?php $i=0?>
    <?php foreach($ruangan as $r) : $i++ ?>
<div class="modal fade" id="editRuanganModal<?= $r['id_ruangan']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRuanganModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRuanganModalLabel">edit Data Ruangan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <Form action="<?= base_url('Ruangan/Ruangan/editDataRuangan'); ?>" method="POST">
         <!-- isi edit --> 
     <table class="table" >
        <tr>
            <td>ID Ruangan :</td>
            <input type="hidden" name="oldid" value="<?= $r['id_ruangan'] ?>">
            <td><input type="text" name="idruangan" class="form-control" value="<?= $r['id_ruangan']?>"></td>
        </tr>
        <tr>
            <td>Nama Ruangan :</td>
            <input type="hidden" name="oldname" value="<?= $r['nama_ruangan'] ?>">
            <td><input type="text" name="namaruangan" class="form-control" value="<?= $r['nama_ruangan'] ?>"></td>
        </tr>
        <tr>
            <td>Kapasitas :</td>
            <td><input type="text" name="kapasitas" class="form-control" value="<?= $r['kapasitas']?>"></td>
        </tr>
        <tr>
            <td>Kelas :</td>
            <td><input type="text" name="kelas" class="form-control" value="<?= $r['kelas']?>"></td>
        </tr>
        <tr>
            <td>Jenis :</td>
            <td><input type="text" name="jenis" class="form-control" value="<?= $r['jenis']?>"></td>
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


