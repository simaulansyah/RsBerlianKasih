<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhAssetModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Asset</a>
        </div>

        <?= form_error('nama_asset', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('kategori', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('lokasi', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('tahun', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>

        <h5><?= $this->session->flashdata('message'); ?></h5> 

        <table class="table table-striped" id="asset">
            <thead>
                <td>#</td>
                <td>Id Asset</td>
                <td>Kategori Asset</td>
                <td>Nama Asset</td>
                <td>Merk</td>
                <td>Lokasi</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($asset as $a ) :?>
                <tr>
                <td><?=$i?></td>   
                <td><?= $a['id_asset']; ?></td> 
                <td><?= $a['nama_k_asset']; ?></td>
                <td><?= $a['nama_asset']; ?></td>
                <td><?= $a['merk']; ?></td>
                <td><?= $a['nama_lokasi']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#dtailasetModal<?= $a['id_asset']?>"  class="badge badge-success">detail</a>
                <a href="" data-toggle="modal" data-target="#edtasetModal<?= $a['id_asset']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Asset/Asset/delAsset/" . $a['id_asset']."/".$a['foto']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
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

<div class="modal fade" id="tbhAssetModal" tabindex="-1" role="dialog" aria-labelledby="tbhAssetModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhAssetModalLabel">Tambah Data Asset </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('Asset/Asset/tambahAsset');?>
      <div class="modal-body">

      <table class="table" >
      <tr>
            <td>ID Asset :</td>
            <td><input type="text" name="id_asset" id="id_asset" class="form-control" value="<?=$idasset?>" readonly >
        </td>
        </tr>
        <tr>
            <td>Kategori Asset :</td>
            <td>
                    <select name="kategori" id="kategori" class="form-control">
                            <option value="">Pilih kategori</option> 
                            <?php foreach($kategori as $k ) : ?>
                            <option value="<?= $k['nama_k_asset']?>"> <?= $k['nama_k_asset']; ?> </option> 
                            <?php endforeach; ?>   
                            </select>

            </td>
        </tr>
        <tr>
            <td>Nama Asset :</td>
            <td><input type="text" name="nama_asset" id="nama_asset" class="form-control" >
        </td>
        </tr>
        <tr>
            <td>Merk :</td>
            <td><input type="text" name="merk" id="merk" class="form-control" ></td>
        </tr>
        <tr>
            <td>Lokasi :</td>
            <td>
                    <select name="lokasi" id="lokasi" class="form-control">
                            <option value="">Pilih Lokasi</option> 
                            <?php foreach($lokasi as $l ) : ?>
                            <option value="<?= $l['nama_lokasi']?>"> <?= $l['nama_lokasi']; ?> </option> 
                            <?php endforeach; ?>   
                            </select>

            </td>
        </tr>
        <tr>
            <td>Tahun Perolehan :</td>
            <td><input type="text" name="tahun" id="tahun" class="form-control" ></td>
        </tr>
        <tr>
            <td>Harga :</td>
            <td><input type="text" name="harga" id="harga" class="form-control" ></td>
        </tr>
        <tr>
            <td>Foto :</td>
            <td>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" >
                                    <label class="custom-file-label" for="imagae">Upload Foto Asset</label>
                                </div>

            </td>
        </tr>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="saveAsset" data-kategori="kategori" data-tahun="tahun"  class="btn btn-primary">Save changes</button>
      </div>
      </Form>
    </div>
  </div>
</div>

<!-- modal detail -->
<?php $i = 1;?>
<?php foreach($asset as $a ) :?>
<div class="modal fade bd-example-modal-lg" id="dtailasetModal<?= $a['id_asset']?>"  tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Asset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- isi detail -->
<div class="container">
  <div class="row">
    <div class="col-md-8">
     
    <td><?= $a['id_asset'] ?></td>
      <div class="row">
      <table class="table" >
      <tr>
            <td>Nama Aset : </td>
            <td><?= $a['nama_asset']?></td>
      </tr>
      <tr>
            <td>Kategori Aset : </td>
            <td><?= $a['nama_k_asset'] ?></td>
      </tr>
      <tr>
            <td>Merk : </td>
            <td><?= $a['merk'] ?></td>
      </tr>
      <tr>
            <td>Lokasi : </td>
            <td><?= $a['nama_lokasi'] ?></td>
      </tr>
      <tr>
            <td>Tahun Perolehan : </td>
            <td><?= $a['tahun_perolehan'] ?></td>
      </tr>
      <tr>
            <td>Harga : </td>
            <td><?= $a['harga'] ?></td>
      </tr>
      <tr>
            <td>Umur Aset : </td>
            <td><?= 2020 - $a['tahun_perolehan']. " Tahun" ; ?></td>
      </tr>
     
      </table>
      </div>
    </div>
    <div class="col-md-4"><img src="<?= base_url('upload/Asset/'). $a['foto']?>" class="card-img" alt="..."></div>
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
<!-- akhir isi detail -->




<!-- modal edit  -->

<?php $i = 1;?>
<?php foreach($asset as $a ) :?>
<div class="modal fade bd-example-modal-lg" id="edtasetModal<?= $a['id_asset']?>"  tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Asset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!-- isi edit -->
<?= form_open_multipart('Asset/Asset/editAsset');?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
     
    <td><?= $a['id_asset'] ?></td>
    <input type="hidden" value="<?= $a['id_asset']?>" id="id_asset" name="id_asset" >
      <div class="row">
      <table class="table" >
      <tr>
            <td>Nama Aset : </td>
            <td><input type="text" value="<?= $a['nama_asset']?>" id="nama_asset" name="nama_asset" ></td>
            <td></td>
      </tr>
      <tr>
            <td>Kategori Aset : </td>
            <td>
                    <select name="kategori" id="kategori" class="form-control">
                    <?php foreach($kategori as $kt) : ?> 
                    <option <?php if($kt['nama_k_asset'] == $a['nama_k_asset'] ){ echo 'selected="selected"'; } ?> value="<?= $kt['nama_k_asset']; ?>"> <?= $kt['nama_k_asset'] ?> </option> 
                    <?php endforeach;?>
                    </select>
            </td>
      </tr>
      <tr>
            <td>Merk : </td>
            <td><input type="text" value="<?= $a['merk']?>" id="merk" name="merk" ></td>
      </tr>
      <tr>
            <td>Lokasi : </td>
            <td>
                    <select name="nama_lokasi" id="nama_lokasi" class="form-control">
                    <?php foreach($lokasi as $lk) : ?> 
                    <option <?php if($lk['nama_lokasi'] == $a['nama_lokasi'] ){ echo 'selected="selected"'; } ?> value="<?= $lk['nama_lokasi']; ?>"> <?= $lk['nama_lokasi'] ?> </option> 
                    <?php endforeach;?>
                    </select>
            </td>
      </tr>
      <tr>
            <td>Tahun Perolehan : </td>
            <td><input type="text" value="<?= $a['tahun_perolehan']?>" id="tahun_perolehan" name="tahun_perolehan" ></td>
      </tr>
      <tr>
            <td>Harga : </td>
            <td><input type="text" value="<?= $a['harga']?>" id="harga" name="harga" ></td>
      </tr>
      <tr>
            <td>Umur Aset : </td>
            <td><input type="text" value="<?= 2020 - $a['tahun_perolehan']. " Tahun";?>" readonly ></td>
 
      </tr>
     
      </table>
      </div>
    </div>
    <div class="col-md-4"><img src="<?= base_url('upload/Asset/'). $a['foto']?>"  class="card-img" alt="...">
    <input type="hidden" id="oldfoto" name="oldfoto" value="<?= $a['foto']?>">
    <br>
    <br>
    <td>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" value="<?$a['foto']?>" >
                                    <label class="custom-file-label" for="imagae">Change Foto</label>
                                </div>

            </td>
    
    </div>
    
  </div>
</div>

      
    <!-- akhir isi edit -->
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
        <button type="submit" id="saveAsset" data-kategori="kategori" data-tahun="tahun"  class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php endforeach; ?>

<!-- akhir modal edit -->