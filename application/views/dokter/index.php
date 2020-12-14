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
                <a href="" data-toggle="modal" data-target="#dtailasetModal<?= $d['id_dokter']?>"  class="badge badge-success">detail</a>
                <a href="" data-toggle="modal" data-target="#edtasetModal<?= $d['id_dokter']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Asset/Asset/delAsset/" . $d['id_dokter']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
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

                    <?= form_open_multipart('Dokter/tambahDokter');?>
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
                                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" placeholder="Spesialisasi">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="lokasi_praktek" name="lokasi_praktek" placeholder="Lokasi Praktek">
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