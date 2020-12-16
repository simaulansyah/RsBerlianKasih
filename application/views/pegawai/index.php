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
        <?= form_error('nip', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('nama', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('alamat', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('telepon', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('jabatan', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhPgwModal" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data Pegawai</a>
        </div>

        <h5><?= $this->session->flashdata('message'); ?></h5> 

          <table class="table table-striped" id="pegawai">
            <thead>
                <td>#</td>
                <td>Nip</td>
                <td>Nama Pegawai</td>
                <td>No Telepon</td>
                <td>Jabatan</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
              
            <?php foreach($queryjabatan as $p ) :?>
                <tr>
                <td><?=$i?></td>    
                <td><?= $p['nip']; ?></td>
                <td><?= $p['nama_pegawai']; ?></td>
                <td><?= $p['no_telp']; ?></td>
                <td><?= $p['nama_jabatan']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#dtlPgwModal<?= $p['nip']; ?>" class="badge badge-success">detail</a>
                <a href="" data-toggle="modal" data-target="#edtPgwModal<?= $p['nip']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("pegawai/hapusKaryawan/" . $p['nip']."/".$p['poto']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                
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

    <!-- modal tambah -->

    <div class="modal fade" id="tbhPgwModal" tabindex="-1" aria-labelledby="tbhPgwModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tbhPgwModalLabel">Tambah Data Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?= form_open_multipart('pegawai/tambahpegawai');?>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nip" name="nip" placeholder="input Nip Pegawai">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="input nama Pegawai">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tlahir" name="tlahir" placeholder="tempat lahir">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="datepickerlahir" name="tgl" placeholder="tanggal lahir">
                            </div>
                            <div class="form-group">
                            <select name="gender" id="gender" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option> 
                            <option value="Pria"> Pria </option> 
                            <option value="Wanita"> Wanita </option>   
                        </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="no telepon">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="datepickermasuk" name="tglmasuk" placeholder="tanggal masuk">
                            </div>

                            <div class="form-group">
                            <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option> 
                            <option value="Lajang"> Lajang </option> 
                            <option value="Menikah"> Menikah </option>  
                            <option value="Cerai"> Cerai </option>   
                            </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="anak" name="anak" placeholder="jumlah anak">
                            </div>

                            <div class="form-group">
                            <select name="jabatan" id="jabatan" class="form-control">
                            <option value="">Pilih jabatan</option> 
                            <?php foreach($jabatan as $j ) : ?>
                            <option value="<?= $j['id_jabatan']?>"> <?= $j['nama_jabatan']; ?> </option> 
                            <?php endforeach; ?>   
                            </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" >
                                    <label class="custom-file-label" for="imagae">Upload Foto Karyawan</label>
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




    <!-- modal detail -->

   
    <?php $i=0?>
                                    <?php foreach($queryjabatan as $p) : $i++ ?>
                                 <div class="modal fade bd-example-modal-lg" id="dtlPgwModal<?= $p['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtPgwModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="dtlPgwModal">Detail Karyawan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                
                                        <!-- isi detail -->

                                        <div class="page-content page-container" id="page-content">
                       
                            
                                
                       <div class="card user-card-full">
                           <div class="row m-l-0 m-r-0">
                               <div class="col-sm-4 bg-c-lite-green user-profile">
                                   <div class="card-block text-center text-white">
                                       <div class="m-b-25"> <img src="<?= base_url('upload/profil/user/') . $p['poto']?>" class="img-radius" alt="User-Profile-Image" width="100" > </div>
                                       <!-- <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image" width="155" > </div> -->
                                       <h6 class="f-w-600"><?= $p['nip']?></h6>
                                       <h6 class="f-w-600"><?= $p['nama_pegawai']?></h6>
                                       <p><?=$p['nama_jabatan'] ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                   </div>
                               </div>
                               <div class="col-sm-8">
                                   <div class="card-block">
                                       <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                       <div class="row">
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Tempat & Tanggal Lahir</p>
                                               <h6 class="text-muted f-w-400"><?= $p['tempat_lahir'] ?></h6>
                                               <h6 class="text-muted f-w-400"><?= $p['tgl_lahir']?></h6>
                                               <h6 class="text-muted f-w-400"><?= $p['jenis_kelamin']?></h6>
                                           </div>
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Alamat & No Telepon</p>
                                               <h6 class="text-muted f-w-400"><?= $p['alamat'];?></h6>
                                               <h6 class="text-muted f-w-400"><?= $p ['no_telp']; ?></h6>
                                           </div>
                                       </div>
                                       <h6 class="m-b-20 p-b-5 b-b-default f-w-600">----</h6>
                                       <div class="row">
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Status & Jumlah Anak</p>
                                               <h6 class="text-muted f-w-400">Status : <?= $p['status_pernikahan']?></h6>
                                               <h6 class="text-muted f-w-400">jumlah Anak  : <?= $p['jumlah_anak']?> </h6>
                                           </div>
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Tanggal Mulai Bekerja</p>
                                               <h6 class="text-muted f-w-400"><?=$p['tgl_masuk']; ?></h6>
                                           </div>
                                       </div>
                                       
                                   </div>
                               </div>
                            </div>
                   </div>
           
       </div>





                                        <!-- akhir isi detail -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            <?php endforeach;?>

                             <!-- akhir  modal detail -->






                                 <!-- modal edit -->

                                 <?php $i=0?>
                                    <?php foreach($queryjabatan as $p) : $i++ ?>
                                 <div class="modal fade bd-example-modal-lg" id="edtPgwModal<?= $p['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtPgwModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edtPgwModal">Edit Karyawan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <?= form_open_multipart('pegawai/editKaryawan');?>
                                        <!-- isi edit -->

                                        <div class="page-content page-container" id="page-content">
                       
                            
                                
                       <div class="card user-card-full">
                           <div class="row m-l-0 m-r-0">
                               <div class="col-sm-4 bg-c-lite-green user-profile">
                                   <div class="card-block text-center text-white">
                                       <div class="m-b-25"> <img src="<?= base_url('upload/profil/user/') . $p['poto']?>" class="img-radius" alt="User-Profile-Image" width="100" > </div>
                                
                                        <h6 class="f-w-600">Nip</h6> 
                                        <input type="hidden" id="oldnip" name="oldnip" value="<?= $p['nip'];?>">
                                      
                                       <input type="text" class="form-control" id="nip" name="nip"  value="<?= $p['nip'];?>">
                                       <h6 class="f-w-600">Nama</h6>
                                       <input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama_pegawai'];?>">
                                       <h6 class="f-w-600">Jabatan</h6>
                                       <select name="jabatan" id="jabatan" class="form-control">
                                    <?php foreach ($jabatan as $j) : ?> 
                                    <!-- get selected option -->
                                    <option <?php if($j['nama_jabatan'] == $p['nama_jabatan'] ){ echo 'selected="selected"'; } ?> value="<?= $j['id_jabatan']; ?>"> <?= $j['nama_jabatan']; ?> </option> 

                                    <?php endforeach; ?>
                                </select>
     


                                   </div>
                               </div>
                               <div class="col-sm-8">
                                   <div class="card-block">
                                       <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                       <div class="row">
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Tempat & Tanggal Lahir</p>
                                               <h6 class="text-muted f-w-400">Tempat Lahir</h6>
                                               <input type="text" class="form-control" id="tlahir" name="tlahir" value="<?= $p['tempat_lahir'];?>">
                                               <h6 class="text-muted f-w-400">Tanggal Lahir</h6>
                                               <input type="text" class="form-control" id="datepickerlahiredit" name="tgl" value="<?= $p['tgl_lahir'];?>">
                                               <h6 class="text-muted f-w-400">Gender</h6>
                                               <select id="gender" name="gender" class="form-control">
                                              <?php for($i=0;$i<count($jk);$i++){ ?> 
                                                <option <?php if($jk[$i] == $p['jenis_kelamin'] ){ echo 'selected="selected"'; } ?> value="<?= $jk[$i]; ?>"> <?= $jk[$i]; ?> </option> 
                                                <?php }?>
                                                </select>
                                           </div>
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Alamat & No Telepon</p>
                                               <h6 class="text-muted f-w-400">Alamat</h6>
                                               <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $p['alamat'];?>">
                                               <h6 class="text-muted f-w-400">No Telepon</h6>
                                               <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $p ['no_telp']; ?>">
                                               
                                           </div>
                                       </div>
                                       <h6 class="m-b-20 p-b-5 b-b-default f-w-600">----</h6>
                                       <div class="row">
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Status & Jumlah Anak</p>
                                               <h6 class="text-muted f-w-400">Status Pernikahan</h6>
                                               <select id="status" name="status" class="form-control">
                                              <?php for($i=0;$i<count($stat);$i++){ ?> 
                                                <option <?php if($stat[$i] == $p['status_pernikahan'] ){ echo 'selected="selected"'; } ?> value="<?= $stat[$i]; ?>"> <?= $stat[$i]; ?> </option> 
                                                <?php }?>
                                                </select>
                                               <h6 class="text-muted f-w-400">Jumlah Anak </h6>
                                               <input type="text" class="form-control" id="anak" name="anak" value="<?= $p['jumlah_anak']?>">
                                           </div>
                                           <div class="col-sm-6">
                                               <p class="m-b-10 f-w-600">Tanggal Mulai Bekerja</p>
                                               <h6 class="text-muted f-w-400">Pilih Tanggal </h6>
                                               <input type="text" class="form-control" id="tglmasuk" name="tglmasuk" value="<?=$p['tgl_masuk']; ?>">
                                               <h6 class="text-muted f-w-400">Ganti Foto </h6>
                                               <div class="custom-file">
                                                   <input type="hidden" name="old"  id="old" value="<?=$p['poto']; ?>">
                                                    <input type="file" class="custom-file-input" id="image" name="image" value="<?=$p['poto']; ?>" >
                                                    <label class="custom-file-label" for="imagae">Upload Foto </label>
                                                </div>
                                           </div>
                                           
                                           
                                       </div>
                                       
                                   </div>
                               </div>
                            </div>
                   </div>
           
       </div>



                                    

                                        <!-- akhir isi edit -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </form>
                            <?php endforeach;?>

                            <!-- akhir modal edit -->
    