<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhBedModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Tempat Tidur</a>
        </div>

        <?= form_error('nokasur', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('idruangan', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('namaruangan', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('kapaitas', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('kelas', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('tarif', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('status', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        

        <h5><?= $this->session->flashdata('message'); ?></h5>

    

        <table class="table table-striped" id="ruangan">
        <thead>
            <td>#</td>
                <td>No Kasur</td>
                <td>ID Ruangan</td>
                <td>Nama Ruangan</td>
                <td>Kelas</td>
                <td>Tarif Kamar</td>
                <td>Status</td>
                <td>aksi</td>
        </thead>
        <tbody>
        <?php $i = 1;?>
<?php foreach ($bed as $b) : ?>
        <tr>
        <td><?= $i?></td>
        <td><?= $b['id_kasur']?></td>
        <td><?= $b['id_ruangan']?></td>
                <td><?= $b['nama_ruangan']?></td>
                <td><?= $b['kelas'] ?></td>
                <td><?= $b['tarif'] ?></td>
                <td><?= ($b['status'] == 1 ) ? "isi" : "kosong"; ?></td>
        <td>
                <a href="" data-toggle="modal" data-target="#edtBedModal<?= $b['id_kasur']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?=site_url("Ruangan/Bed/hapusKasur/" . $b['id_kasur']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                
                </td>
                </tr>
                <?php $i++?>
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

    
    <!---Container Fluid-->
    
    <!-- Footer -->


     <!-- modal tambah data -->

<div class="modal fade" id="tbhBedModal" tabindex="-1" role="dialog" aria-labelledby="tbhBedModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhBedModalLabel">Tambah Data Ruangan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Ruangan/Bed/tambahdata'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>No Kasur :</td>
            <td><input type="text" name="nokasur" class="form-control" ></td>
        </tr>
        <tr>
            <td>ID Ruangan :</td>
            <td><input type="text" id="id_ruangan" name="idruangan" class="form-control" readonly ></td>
            <td><button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#idRuangan"><i class="fa fa-search "></i></button>
        </td>
        </tr>
        <tr>
            <td>Nama Ruangan :</td>
            <td><input type="text" id="nama_ruangan" name="namaruangan" class="form-control" readonly ></td>
        </tr>
        <tr>
            <td>Kelas :</td>
            <td><input type="text" id="kelas"  name="kelas" class="form-control"readonly ></td>
        </tr>
        <tr>
            <td>Tarif Kamar :</td>
            <td><input type="text" name="tarif"  id="tarif" class="form-control" ></td>
        </tr>
        <tr>
            <td>Status : </td>
            <td>
            <select name="status" id="status" class="form-control">
                            <option value="" >Pilih Status Kamar</option> 
                            <option value=1> isi </option> 
                            <option value=0> kosong </option>   
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

        <!-- modal Id Ruangan search -->

        <div class="modal fade bd-example-modal-lg" id="idRuangan" tabindex="-1" aria-labelledby="idRuanganLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="idRuanganLabel">Tambah Data Gaji</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                        <div class="modal-body">

         
          <table class="table table-striped" id="serachnip">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ID Ruangan</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Kelas</th>
             
                <th scope="col">opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($ruangan as $g) : ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $g['id_ruangan']; ?></td>
                  <td><?= $g['nama_ruangan']; ?></td>
                  <td><?= $g['kapasitas']; ?></td>
                  <td><?= $g['kelas']; ?></td>
                  <td>
                    <button class="btn btn-xs btn-info" id="selectidRuangan" data-id_ruangan="<?= $g['id_ruangan'] ?>" data-nama_ruangan="<?= $g['nama_ruangan'] ?>"  data-kelas="<?= $g['kelas'] ?>" >
                      <i class="fa fa-check"></i>Select
                    </button>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">simpan</button>
                        </div>
                    
                </div>
            </div>
        </div>



        <!-- modal edit kasur -->
        <?php $i=0?>
    <?php foreach($bed as $b) : $i++ ?>
        <div class="modal fade" id="edtBedModal<?= $b['id_kasur']?>" tabindex="-1" role="dialog" aria-labelledby="edtBedModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtBedModalLabel">Edit Data Kasur </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Ruangan/Bed/editKasur'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>No Kasur :</td>
            <td><input type="text" name="nokasur" class="form-control" value="<?= $b['id_kasur'];?>"  ></td>
            <input type="hidden" name="oldid" value="<?= $b['id_kasur'];?>"> 
        </tr>
        <tr>
            <td>ID Ruangan :</td>
            <td><input type="text" id="eid_ruangan" name="idruangan" class="form-control" value="<?= $b['id_ruangan'];?>"    readonly ></td>
           
        </td>
        </tr>
        <tr>
            <td>Nama Ruangan :</td>
            <td><input type="text" id="enama_ruangan" name="namaruangan" class="form-control" value="<?= $b['nama_ruangan'];?>"  readonly ></td>
        </tr>
        <tr>
            <td>Kelas :</td>
            <td><input type="text" id="ekelas"  name="kelas" class="form-control" value="<?= $b['kelas'];?>" readonly ></td>
        </tr>
        <tr>
            <td>Tarif Kamar :</td>
            <td><input type="text" name="tarif"  id="tarif" class="form-control" value="<?= $b['tarif'];?>"  ></td>
        </tr>
        <tr>
            <td>Status : </td>
            <td>
            <select name="status" id="status" class="form-control">
                            <?php for($i=0;$i<count($stat);$i++){ ?> 
                                                <option <?php if($stat[$i] == $b['status'] ){ echo 'selected="selected"'; } ?> value="<?= $stat[$i]; ?>"> <?= ($stat[$i] == 1)? "isi" : "kosong"; ?> </option> 
                                                <?php }?>
                                                
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
<?php endforeach;?>



  