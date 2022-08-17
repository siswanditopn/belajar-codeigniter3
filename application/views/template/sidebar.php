<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">BelajarCI <sup>3</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- QUERY MENU -->
<?php
  $role_id   = $this->session->userdata('role_id');
  $queryMenu = "SELECT m.id, m.menu
                FROM user_menu m
                JOIN user_access_menu a
                ON m.id = a.menu_id
                WHERE a.role_id = $role_id
                ORDER BY a.menu_id ASC
                ";
  $menu      = $this->db->query($queryMenu)->result_array();
?>

<!-- LOOPING MENU -->
<?php foreach ($menu as $m) : ?>
<div class="sidebar-heading">
  <?= $m['menu']; ?>
</div>

<!-- SUB MENU -->
<?php
    $menuId       = $m['id'];
    $querySubMenu = "SELECT *
                    FROM user_sub_menu
                    WHERE menu_id = $menuId
                    AND is_active = 1
                    ";
    $subMenu      = $this->db->query($querySubMenu)->result_array();

    foreach ($subMenu as $sm) :
?>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
        <i class="<?= $sm['icon'] ?>"></i>
        <span><?= $sm['title'] ?></span></a>
</li>
<?php endforeach; ?>
<hr class="sidebar-divider">
<?php endforeach; ?>

<li class="nav-item">
    <a class="nav-link" href="#"  data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->