<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <table class="table table-striped" id="ruangan">
        <thead>
            <td>#</td>
                <td>Nip</td>
                <td>Nama Pengguna</td>
                <td>Email</td>
                <td>Jabatan </td>
                <td>Status</td>
                <td>Waktu Dibuat</td>
                <td>Opsi</td>

                
        </thead>
        <tbody>
        <?php $i = 1;?>
            <?php foreach($queryUser as $s) :?>
        <tr>
                <td><?=$i?></td>    
                <td><?= $s['id_user']; ?></td>
                <td><?= $s['nama_user']; ?></td>
                <td><?= $s['email']; ?></td>
                <td><?= $s['role']; ?></td>
                <td><?= ($s['is_active'] == 1) ? "aktif" : "tidak aktif ";  ?></td>
                <td><?= $s['date_created']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#editRuanganModal<?= $s['id_user']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?=site_url("Ruangan/Ruangan/hapusRuangan/" . $s['id_user']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                
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