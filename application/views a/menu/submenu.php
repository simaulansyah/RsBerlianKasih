<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-3" >
        <a href="" data-toggle="modal" data-target="#tbhSub" class="badge badge-info"> <i class='fas fa-plus-circle'></i>Tambah Data SubMenu</a>
        </div>

        <?= form_error('title', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('menu', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>
        <?= form_error('url', '<small class="text-danger pl-3" role="alert">', '</small>'); ?>

        <h5><?= $this->session->flashdata('message'); ?></h5> 
        <table class="table table-striped" id="asset">
            <thead>
                <td>#</td>
                <td>ID Sub</td>
                <td>Menu</td>
                <td>Title</td>
                <td>URL</td>
                <td>ICON</td>
                <td>is Active</td>
                <td>Opsi</td>
            </thead>
            <tbody>
                <?php $i = 1;?>
            <?php foreach($querysubMenu as $s ) :?>
                <tr>
                <td><?=$i?></td>   
                <td><?= $s['id_sub']; ?></td> 
                <td><?= $s['menu']; ?></td>
                <td><?= $s['title']; ?></td>
                <td><?= $s['url']; ?></td>
                <td><?= $s['icon']; ?></td>
                <td><?= $s['is_active']; ?></td>
                <td>
                <a href="" data-toggle="modal" data-target="#edtSub<?= $s['id_sub']; ?>"  class="badge badge-primary">edit</a>
                <a href="<?php echo site_url("Menu/Submenu/delSub/" . $s['id_sub']);?>" class="badge badge-danger" onclick="return confirm('Delete content?');">hapus</a>
                </td>
                </tr>
                <?php $i++?>
                <?php endforeach; ?>
            </tbody>
          </table>


<!-- modal tambah -->

<div class="modal fade" id="tbhSub" tabindex="-1" role="dialog" aria-labelledby="tbhSubLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tbhSubLabel">Tambah SubMenu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Menu/Submenu/tambahSubmenu'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>Menu :</td>
            <td>
              <select  name="menu" id="menu" class="form-control" >
              <option selected="selected" value="">Select One...</option>
                    <?php foreach($menu as $m) :?>
                    <option value="<?= $m['id_menu']; ?>"> <?=$m['menu'] ?></option>
                    <?php endforeach; ?>
              </select>
            </td>
        </tr>
        <tr>
            <td> Title :</td>
            <td><input type="text" name="title" id="title" class="form-control"></td>
        </tr>
        <tr>
            <td> URL :</td>
            <td><input type="text" name="url" id="url" class="form-control"></td>
        </tr>
        <tr>
            <td> Icon :</td>
            <td><input type="text" name="icon" id="icon" class="form-control"></td>
        </tr>
        <tr>
            <td> Is Active :</td>
            <td>
            <input type="hidden" name="check[0]" value="0" />
            <input type="checkbox" id="Active" name="check[0]" value="1"/>
            <label for="Active">Active</label><br>
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




<!-- edit Menu -->
<?php $i = 1;?>
<?php foreach($querysubMenu as $s ) :?>
<div class="modal fade" id="edtSub<?= $s['id_sub']; ?>" tabindex="-1" role="dialog" aria-labelledby="edtSubLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edtSubLabel">Edit Sub Menu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <Form action="<?= base_url('Menu/Submenu/editSub'); ?>" method="POST">
      <div class="modal-body">

      <table class="table" >
        <tr>
            <td>Menu :</td>
            <td>
            <select name="menu" id="menu" class="form-control">
                                    <?php foreach ($menu as $m) : ?> 
                                    <!-- get selected option -->
                                    <option <?php if($m['id_menu'] == $s['menu_id'] ){ echo 'selected="selected"'; } ?> value="<?= $m['id_menu']; ?>"> <?= $m['menu']; ?> </option> 
                                    <?php endforeach; ?>
                                </select>
            </td>
            <input type="hidden" name="oldmenu"   value="<?= $s['menu_id']; ?>">
            <input type="hidden" name="id_sub"   value="<?= $s['id_sub']; ?>">
        </tr>
        <tr>
            <td>Title :</td>
            <input type="hidden" name="oldtitle"   value="<?= $s['title']; ?>">
            <td><input type="text" name="title" class="form-control" value="<?= $s['title']; ?>"></td>
        </tr>
        <tr>
            <td>URL :</td>
            <td><input type="text" name="url"  class="form-control" value="<?= $s['url']; ?>"></td>
        </tr>
        <tr>
            <td>Icon :</td>
            <td><input type="text" name="icon"  class="form-control" value="<?= $s['icon']; ?>"></td>
        </tr>
        <tr>
            <td> Is Active :</td>
            <td>
            <input type="hidden" name="check[0]" value="0" />
            <input type="checkbox" id="Active" name="check[0]" value="1" <?php if($s['is_active'] == "1" ){ echo "checked"; } ?> >
            <label for="Active">Active</label><br>
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
<?php $i++?>
<?php endforeach; ?>





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
