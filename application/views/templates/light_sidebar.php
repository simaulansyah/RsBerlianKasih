
<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">

        <hr class="sidebar-divider">

        <li class="nav-item" ><a href="<?= base_url(str_replace(' ', '', $linkDashboard)) ?>"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
             <!-- QUERY MENU -->
      <?php 
      $role_id = $this->session->userdata('role_id');

    $this->db->select('user_menu.id_menu, user_menu.menu, user_menu.icon');
    $this->db->from('user_menu');//jabatan adalah anak & pegawai adalah tabel utama 
    $this->db->join('user_access_menu', 'user_access_menu.menu_id = user_menu.id_menu');
    $this->db->where('user_access_menu.role_id', $role_id) ;
    $this->db->order_by('user_access_menu.menu_id ASC');

    $query = $this->db->get();
    $menu = $query->result_array();


?>
<?php $i=1;?>
<?php foreach($menu as $m) : $i++ ?>
        <div class="sidebar-heading">
        <li class="nav-item" ><a href="#<?php echo str_replace(' ', '_', $m['menu']); ?>" data-toggle="collapse" ><i class="<?=$m['icon'];?>"> </i><?= $m['menu']; ?></a></li>
        </div>
             <!-- QUERY SUB MENU -->

        <?php 
          $menuId = $m['id_menu'];
          $querySubMenu = "SELECT* 
                              FROM `user_sub_menu`
                             WHERE `menu_id` = $menuId
                               AND `is_active` = 1
          ";
          $subMenu = $this->db->query($querySubMenu)->result_array(); 
        ?> 

        <ul id="<?php echo str_replace(' ', '_', $m['menu']); ?>" class="list-unstyled collapse">
        <?php $i=0?>
        <?php foreach ($subMenu as $sm) : $i++?>
         
            <li><a href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon']; ?>" ></i><?= $sm['title']; ?></a></li>
         
         
         
         
            <!-- Nav Item -->
          <!-- <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
              <?php else : ?>
                <li class="nav-item">
          <?php endif; ?> -->

            <!-- <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon']; ?>"></i>
              <span><?= $sm['title']; ?></span></a> -->
              
                    
              
            
          </li>
        <?php endforeach; ?>
        </ul>
        <?php endforeach;?>




<!--             
            <li class="nav-item" ><a href="#"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a></li>
            <li>
                <a href="#sm_expand_1" data-toggle="collapse">
                    <i class="fa fa-fw fa-link"></i> Expandable Menu Item
                </a>
                <ul id="sm_expand_1" class="list-unstyled collapse">
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-fw fa-link"></i> Menu Item</a></li>
            <li><a href="#"><i class="fa fa-fw fa-link"></i> Menu Item</a></li>
            <li><a href="#"><i class="fa fa-fw fa-link"></i> Menu Item</a></li> -->
        </ul>
    </div>
