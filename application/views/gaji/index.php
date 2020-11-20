<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div>
        <a href="" data-toggle="modal" data-target="#tbhObtModal" class="badge badge-warning"> Tambah Data Gaji </a>
        </div>




    <table id="example" class="table table-bordered ">
        <thead>
            <tr>
            <th scope="col">#</th>
                <th scope="col">No Slip</th>
                <th scope="col">Tgl Slip</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Tunj. Jabatan</th>
                <th scope="col">Potongan</th>
                <th scope="col">Gaji Bersih</th>
                <th scope="col">Nip</th>
                <th scope="col">aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;?>
            <?php foreach($gaji as $g) : $i++ ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$g['no_slip']?></td>
                <td><?=$g['tgl_slip']?></td>
                <td><?=$g['gaji_pokok']?></td>
                <td><?=$g['tunj_jabatan']?></td>
                <td><?=$g['potongan']?></td>
                <td><?=$g['gaji_bersih']?></td>
                <td><?=$g['nip']?></td>
                <td><a href="<?= base_url('Laporanpdf') ?> " class="badge badge-primary">cetak slip</a></td>
            </tr>
        </tbody>
<?php endforeach; ?>
    </table>







</div>

</div>





<!-- modal gaji -->

<div class="modal fade" id="tbhObtModal" tabindex="-1" aria-labelledby="tbhObtModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tbhObtModalLabel">Tambah Data Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <Form action="<?= base_url('apotek/tambahdataobat'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Nip</label>
                                <div class="form-group input-group">
                                <input type="text" class="form-control" id="kode_obat" name="kode_obat[]" readonly >
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-search "></i>
                                        </button>
                                </div>
                            </div>
                            <label>Tgl Slip</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Tanggal">
                            </div>
                            <div class="form-group">
                            <label>Gaji Pokok</label>
                            <input type="text" class="form-control" id="Gp" name="Gp" readonly >
                            </div>
                            <div class="form-group">
                            <label>Tunjangan jabatan</label>
                            <input type="text" class="form-control" id="Tj" name="Tj" readonly >
                            </div>
                            <div class="form-group">
                            <label>Potongan</label>
                            <input type="text" class="form-control" id="potongan" name="potongan" >
                            </div>
                            <div class="form-group">
                            <label>Gaji Total</label>
                                <input type="text" class="form-control" id="gajitotal" name="gajitotal">
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
        </div>
