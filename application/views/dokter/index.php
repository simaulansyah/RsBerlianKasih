<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhDokterModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Dokter</a>
        </div>


        <?= form_error('id_dokter', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('nama_dokter', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('telepon', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('alamat', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('spesialisasi', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('lokasi_praktek', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('jam_praktek', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('tgl', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>

        <h5><?= $this->session->flashdata('message'); ?></h5> 

        <table class="table table-striped" id="dokter">
            <thead>
                <td>#</td>
                <td>ID Dokter</td>
                <td>Nama Dokter</td>
                <td>Telepon</td>
                <td>Spesialisasi</td>
                <td>Lokasi Praktek</td>
                <td>Jam Praktek</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($dokter as $d ) :?>
                <tr>
                <td><?=$i?></td>   
                <td><?= $d['id_dokter']; ?></td> 
                <td><?= $d['nama_dokter']; ?></td>
                <td><?= $d['telepon']; ?></td>
                <td><?= $d['spesialisasi']; ?></td>
                <td><?= $d['lokasi_praktek']; ?></td>
                <td><?= $d['jam_praktek']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#dtailDokterModal<?= $d['id_dokter']?>"  class="badge badge-success">detail</a>
                <a href="" data-toggle="modal" data-target="#edtDokterModal<?= $d['id_dokter']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Dokter/Dokter/delDokter/" . $d['id_dokter']."/".$d['foto']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                </td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </tbody>
          </table>
<!-- akhir  tabel -->


 <!-- modal tambah Dokter -->

 <div class="modal fade" id="tbhDokterModal" tabindex="-1" aria-labelledby="tbhDokterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tbhDokterModalLabel">Tambah Data Dokter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?= form_open_multipart('Dokter/Dokter/tambahDokter');?>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="id_dokter" name="id_dokter" placeholder="ID Dokter">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Nama Dokter">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="datepickerlahir" name="tgl" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                            <select name="gender" id="gender" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option> 
                            <option value="Pria"> Pria </option> 
                            <option value="Wanita"> Wanita </option>   
                        </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
                            </div>
                            <div class="form-group">
                            <select name="spesialisasi" id="spesialisasi" class="form-control">
                            <option value="">Pilih Spesialisasi</option>
                            <?php foreach($spesialisasi as $s) : ?> 
                            <option><?= $s['nama_spesialisasi']?> </option>
                            <?php endforeach;?>     
                        </select>
                               
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lokasi_praktek" name="lokasi_praktek" placeholder="Lokasi Praktek">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="jam_praktek" name="jam_praktek" placeholder="Jam Praktek">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" >
                                    <label class="custom-file-label" for="imagae">Upload Foto Dokter</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
        <!-- akhir tambah -->

<!-- modal detail -->
<?php $i = 1;?>
<?php foreach($dokter as $d ) :?>
<div class="modal fade bd-example-modal-lg" id="dtailDokterModal<?= $d['id_dokter']?>"  tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- isi detail -->


    <div class="team-boxed">
    <div class="container">
  <div class="row">
    <div class="col-sm">
    

    <table class="table" >
        <tr>
        <td style="width: 40.66%" >Lokasi Praktek :</td>
        <td><?= $d['lokasi_praktek']?></td>
        </tr>
        <tr>
        <td> Jam Praktek :</td>
            <td><?= $d['jam_praktek']?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir :</td>
            <td><?= $d['tanggal_lahir']?></td>
        </tr>
        <tr>
            <td>Gender :</td>
            <td><?= $d['jenis_kelamin']?></td>
        </tr>
        <tr>
      <td>Telepon :</td>
      <td><?= $d['telepon']?></td>  
        </tr>
        <tr>
        <td>Alamat :</td>
            <td><?= $d['alamat'] ?></td> 
        </tr>
      </table>

      
    </div>
    <div class="col-sm">
    <img class="img-thumbnail"  style="float: right;"  src="<?=base_url('upload/profil/Dokter/').$d['foto']?>">
    <div style="clear: right">
    <h3 class="text-right"><?= $d['nama_dokter']?></h3>
    <h5 class="text-right"><?= "ID Dokter : ". $d['id_dokter']?></h5>
    <h5 class="text-right"><?= "Spesialis : ". $d['spesialisasi']?></h5>
</div>   
    </div>
  </div>
</div>

    </div>
 <!-- akhir isi detail -->
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

      <!-- akhir detail -->


      <!-- modal edit -->
      <?php $i = 1;?>
<?php foreach($dokter as $d ) :?>
<div class="modal fade bd-example-modal-lg" id="edtDokterModal<?= $d['id_dokter']; ?>"  tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- isi edit -->
<?= form_open_multipart('Dokter/Dokter/editDokter');?>

    <div class="team-boxed">
    <div class="container">
    <div class="row">
    <div class="col-sm">
    
    
    <table class="table" >
    <tr>
    <td>ID Dokter</td>
    <input type="hidden" name="oldid" id="oldid" value="<?= $d['id_dokter']?>" >
        <td><input type="text" class="form-control" name="id_dokter" id="id_dokter" value="<?= $d['id_dokter']?>"></td>
        </tr>
        <tr>
        <td>Nama Dokter</td>
       <td> <input type="text" class="form-control" name="nama_dokter" id="nama_dokter" value="<?= $d['nama_dokter']?>"></td>
        </tr>
        <tr>
            <td>Spesialisasi</td>
            <td>
                <select name="spesialisasi" id="spesialisasi" class="form-control">
                    <?php foreach($spesialisasi as $s) : ?> 
                    <option <?php if($s['nama_spesialisasi'] == $d['spesialisasi'] ){ echo 'selected="selected"'; } ?> value="<?= $s['nama_spesialisasi']; ?>"> <?= $s['nama_spesialisasi'] ?> </option> 
                    <?php endforeach;?>
                    </select>
                </td>
        </tr>
        <tr>
        <td style="width: 40.66%" >Lokasi Praktek :</td>
        <td><input type="text" name="lokasi_praktek" class="form-control" value="<?= $d['lokasi_praktek']?>"></td>
        </tr>
        <tr>
        <td> Jam Praktek :</td>
        <td> <input type="text" name="jam_praktek" class="form-control" value="<?= $d['jam_praktek']?>"> </td>
        </tr>
        <tr>
            <td>Tanggal Lahir :</td>
            <td>  <input type="text" name="tgl" class="form-control" value="<?= $d['tanggal_lahir']?>"> </td>
        </tr>
        <tr>
            <td>Gender :</td>
            <td><select name="gender" id="gender" class="form-control">
            <?php for($i=0;$i<count($gender);$i++){ ?> 
            <option <?php if($gender[$i] == $d['jenis_kelamin'] ){ echo 'selected="selected"'; } ?> value="<?= $gender[$i]; ?>"> <?= $gender[$i]; ?> </option> 
            <?php }?>
            </select>            
        </td>

        </tr>
        <tr>
      <td>Telepon :</td>
      <td> <input type="text" name="telepon" class="form-control" value="<?= $d['telepon']?>"> </td>
        </tr>
        <tr>
        <td>Alamat :</td>
        <td> <textarea class="form-control" id="alamat" name="alamat" rows="3">
        <?= $d['alamat'] ?>
    </textarea></td>
        <!-- <td>  <input type="text" name="idruangan" class="form-control" "></td> -->

        </tr>
      </table>

    </div>
    <div class="col-sm">
    <input type="hidden" name="old"  id="old" value="<?=$d['foto']; ?>">
    <img class="img-thumbnail"  style="float: right;"  src="<?=base_url('upload/profil/Dokter/').$d['foto']?>">
    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" value="<?$d['foto']?>" >
                                    <label class="custom-file-label" for="imagae">Change Foto</label>
                                </div>
    <div style="clear: right">
    <table class="table" >
        
    
</table>
</div>   
    </div>
  </div>
</div>

    </div>
 <!-- akhir isi edit -->
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php endforeach; ?>
<!-- akhir edit -->























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