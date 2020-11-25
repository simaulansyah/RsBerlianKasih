<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

      <?=  $this->session->flashdata('message');?>

      <?= form_error('tbhid_jabatan', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
      <?= form_error('tbhnama_jabatan', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
      <?= form_error('tbhgaji_pokok', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
     
      
      
      
        <div>
        <a href="" data-toggle="modal" data-target="#tbhjbtnModal" class="badge badge-warning"> Tambah Data jabatan </a>
        </div>

        <table id="example" class="table table-bordered ">
        <thead>
            <tr>
            <th scope="col">#</th>
                <th scope="col">ID Jabatan</th>
                <th scope="col">Nama Jabatan</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Tunjangan Jabatan</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;?>
            <?php foreach($jabatan as $j) : $i++ ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$j['id_jabatan']?></td>
                <td><?=$j['nama_jabatan']?></td>
                <td><?=$j['gaji_pokok']?></td>
                <td><?=$j['tunj_jabatan']?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#editbtnModal<?= $j['id_jabatan']; ?>"  class="badge badge-primary">edit</a>

                <a href="<?php echo site_url("pegawai/hapusKategori/" . $j['id_jabatan']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



        <!-- modal tambah Jabatan -->

<div class="modal fade" id="tbhjbtnModal" tabindex="-1" aria-labelledby="tbhjbtnModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tbhjbtnModalLabel">Tambah Data Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form action="<?= base_url('pegawai/tambahJabatan'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>ID_Jabatan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tbhid_jabatan" name="tbhid_jabatan" >
                            </div>
                            <label>Nama Jabatan</label>
                                <div class="form-group input-group">
                                <input type="text" class="form-control" id="tbhnama_jabatan" name="tbhnama_jabatan">
                                </div>
                            </div>
                            <label>Gaji Pokok</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tbhgaji_pokok" name="tbhgaji_pokok">
                            </div>
                            <label>Tunjangan Jabatan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tbhtunj_jabatan" name="tbhtunj_jabatan">
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

<!-- dibawah footer -->

<!-- modal edit -->
<?php $i=0?>
<?php foreach($jabatan as $p) : $i++ ?>

<div class="modal fade" id="editbtnModal<?= $j['id_jabatan'] ?>" tabindex="-1" aria-labelledby="tbhjbtnModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tbhjbtnModalLabel">Edit Data Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('pegawai/editJabatan'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Id_Jabatan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="id_jabatan" name="id_jabatan" value="<?=$p ['id_jabatan']?>"  >
                            </div>
                            <label>Nama Jabatan</label>
                                <div class="form-group input-group">
                                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?=$p ['nama_jabatan']?>"  >
                                </div>
                            </div>
                            <label>Gaji Pokok</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?=$p ['nama_jabatan']?>"   >
                            </div>
                            <label>Tunjangan Jabatan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tunj_jabatan" name="tunj_jabatan" value="<?=$p ['tunj_jabatan']?>"  >
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                    </form>
                    <?php endforeach;?>
                </div>
            </div>
            
</div>
