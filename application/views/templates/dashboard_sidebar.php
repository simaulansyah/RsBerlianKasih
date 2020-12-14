<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('vendor/img/logo1.jpg') ?>">
    </div>
    <div class="sidebar-brand-text mx-3"> Berlian-Kasih</div>
  </a>
  <hr class="sidebar-divider my-0">
  
  <li <?= $this->uri->segment(1) == 'admin' ? 'class = "nav-item active"' : 'class = "nav-item"' ?>>
    <a class="nav-link" href="<?= base_url('admin'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">

  <div class="sidebar-heading">
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







   
    
    
    
   
   
    <div class="version" id="version-ruangadmin"></div>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">