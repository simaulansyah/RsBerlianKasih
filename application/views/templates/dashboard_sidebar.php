<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('vendor/img/logo1.jpg') ?>" href="<?= base_url('admin'); ?>" >
    </div>
    <div class="sidebar-brand-text mx-3" href="<?= base_url('admin'); ?>" > Berlian-Kasih</div>
  </a>
  <hr class="sidebar-divider my-0">
  
  <li <?= $this->uri->segment(1) == 'admin' ? 'class = "nav-item active"' : 'class = "nav-item"' ?>>
    <a class="nav-link" href="<?= base_url('admin'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">


      <!-- QUERY MENU -->
      <?php 
      $role_id = $this->session->userdata('role_id');

    $this->db->select('user_menu.id_menu, user_menu.menu');
    $this->db->from('user_menu');//jabatan adalah anak & pegawai adalah tabel utama 
    $this->db->join('user_access_menu', 'user_access_menu.menu_id = user_menu.id_menu');
    $this->db->where('user_access_menu.role_id', $role_id) ;
    $this->db->order_by('user_access_menu.menu_id ASC');

    $query = $this->db->get();
    $menu = $query->result_array();

?>


 <!-- LOOPING MENU -->
 <?php foreach($menu as $m) : ?>
        <div class="sidebar-heading">
          <?= $m['menu']; ?>
        </div>

         <!-- SIAPKAN SUB-MENU SESUAI MENU -->
         <?php 
          $menuId = $m['id_menu'];
          $querySubMenu = "SELECT* 
                              FROM `user_sub_menu`
                             WHERE `menu_id` = $menuId
                               AND `is_active` = 1
          ";
          $subMenu = $this->db->query($querySubMenu)->result_array(); 
        ?> 
        <?php foreach ($subMenu as $sm) : ?>
          <!-- Nav Item -->
          <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
              <?php else : ?>
                <li class="nav-item">
          <?php endif; ?>

            <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']; ?>"></i>
              <span><?= $sm['title']; ?></span></a>
          </li>
        <?php endforeach; ?>
        


        <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>




  <!-- <div class="sidebar-heading">
        Management
      </div>

      <li  <?= $this->uri->segment(1) == 'pegawai' ? 'class = "nav-item active"' : 'class = "nav-item"' ?>>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Office"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Office</span>
        </a>
        <div id="Office" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item active " href="<?= base_url('pegawai') ?>">Data Pegawai</a>
            <a class="collapse-item" href="<?= base_url('pegawai/kategori') ?>">Kategori Jabatan & Gaji</a>
            <a class="collapse-item" href="<?= base_url('gaji') ?>">Data Penggajian</a>
            <a class="collapse-item" href="<?= base_url('Dokter/Dokter') ?>">Data Dokter</a>
            <a class="collapse-item" href="<?= base_url('Dokter/Spesialisasi') ?>">Data Spesialisasi</a>
          </div>
        </div>
      </li>


  <hr class="sidebar-divider">


  <div class="sidebar-heading">
        Apotek
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Admin Apotek</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('pegawai') ?>">Stok Masuk</a>
            <a class="collapse-item" href="buttons.html">Penjualan</a>
            <a class="collapse-item" href="<?= base_url('gaji') ?>">Data Obat</a>
            <a class="collapse-item" href="<?= base_url('gaji') ?>">Kategori Data Obat</a>
            <a class="collapse-item" href="<?= base_url('Apotek/Obat/Suplier') ?>">Suplier Data Obat</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">


      <div class="sidebar-heading">
        Ruangan
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Ruangan"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Admin Ruangan</span>
        </a>
        <div id="Ruangan" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Ruangan/Ruangan') ?>">Data Ruangan</a>
            <a class="collapse-item" href="<?= base_url('Ruangan/Bed') ?>">Data Tempat Tidur</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Asset
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Aset"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Admin Inventaris</span>
        </a>
        <div id="Aset" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('Asset/Asset') ?>">Data Asset</a>
            <a class="collapse-item" href="<?= base_url('Asset/Asset/Kategori') ?>">Kategori Asset</a>
            <a class="collapse-item" href="<?= base_url('Asset/Asset/Lokasi') ?>">Lokasi Asset</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

<div class="sidebar-heading">
  Data Akun
</div>

<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>User Akun</span>
        </a>
        <div id="user" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('User/User') ?>">Data User</a>
            <a class="collapse-item" href="<?= base_url('Asset/Asset/Kategori') ?>">User Role</a>
            <a class="collapse-item" href="<?= base_url('Asset/Asset/Lokasi') ?>">User Token</a>
          </div>
        </div>
      </li> -->
   
   
    <div class="version" id="version-ruangadmin"></div>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">