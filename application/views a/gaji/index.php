<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>


        <h5><?= $this->session->flashdata('message'); ?></h5> 


        <div>
        <a href="" data-toggle="modal" data-target="#tbhgajiModal" class="badge badge-warning"> Tambah Data Gaji </a>
        </div>

        <table class="table table-striped" id="datagaji">
        <thead>
            <td>#</td>
                <td>No Slip</td>
                <td>Nip</td>
                <td>Nama</td>
                <td>Tgl Slip</td>
                <td>Gaji Pokok</td>
                <td>Tunj. Jabatan</td>
                <td>Potongan</td>
                <td>Gaji Bersih</td>
                <td>aksi</td>
       
        </thead>
        <tbody>
        <?php $i = 1;?>
            <?php foreach($gaji as $g) :?>
            <tr>
                <td><?=$i?></td>
                <td><?=$g['no_slip']?></td>
                <td><?=$g['nip']?></td>
                <td><?=$g['nama_pegawai']?></td>
                <td><?=$g['tgl_slip']?></td>
                <td><?=$g['gaji_pokok']?></td>
                <td><?=$g['tunj_jabatan']?></td>
                <td><?=$g['potongan']?></td>
                <td><?=$g['gaji_bersih']?></td>
                <td><a href="<?= base_url("Laporan/Karyawan/Laporanpdf?param=$g[id]"); ?> " class="badge badge-primary">cetak slip</a>
                <a href="<?= base_url("gaji/hapusGaji?param=$g[id]"); ?> " class="badge badge-danger">delete</a></td>
            </tr>
            <?php $i++?>
            <?php endforeach; ?>
        </tbody>

    </table>




</div>

</div>


</div>





<!-- modal gaji -->

<div class="modal fade" id="tbhgajiModal" tabindex="-1" aria-labelledby="tbhgajiModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tbhgajiModalLabel">Tambah Data Gaji</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form action="<?= base_url('Gaji/tambahGaji'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>No Slip</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_slip" name="no_slip" readonly >
                            </div>
                            <label>Nip</label>
                                <div class="form-group input-group">
                                <input type="text" class="form-control" id="nip" name="nip" readonly >
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#myModal">
                                        <i class="fa fa-search "></i>
                                        </button>
                                </div>
                            </div>
                            <label>Nama Pegawai</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                            </div>
                            <label>Tgl Slip</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="tgl" name="tgl">
                            </div>
                            <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" readonly >
                            </div>
                            <div class="form-group">
                            <label>Tunjangan jabatan</label>
                            <input type="text" class="form-control" id="tunj_jabatan" name="tunj_jabatan" readonly >
                            </div>
                            <div class="form-group">
                            <label>Potongan</label>
                            <input type="text" class="form-control" id="potongan" name="potongan" >
                            </div> 
                            <div class="form-group">
                            <label>Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </div>
                    </Form>
                </div>
            </div>
        </>


        <!-- modal nip search -->

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalModalLabel">Tambah Data Gaji</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   
                        <div class="modal-body">

         
          <table class="table table-striped" id="serachnip">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nip</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Gaji Pokok</th>
             
                <th scope="col">opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1 ?>
              <?php foreach ($qgaji as $g) : ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $g['nip']; ?></td>
                  <td><?= $g['nama_pegawai']; ?></td>
                  <td><?= $g['nama_jabatan']; ?></td>
                  <td><?= $g['gaji_pokok']; ?></td>
                  <td>
                    <button class="btn btn-xs btn-info" id="select" data-nip="<?= $g['nip'] ?>" data-nama_pegawai="<?= $g['nama_pegawai'] ?>" data-nama_jabatan="<?= $g['nama_jabatan'] ?>" data-gaji_pokok="<?= $g['gaji_pokok'] ?>"  data-tunj_jabatan="<?= $g['tunj_jabatan'] ?>" >
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