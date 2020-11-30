<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="">
            <img src="<?php echo base_url('assets/img/A.png'); ?>" style="width:55px;height:55px;" alt="" />
        </div>
        <div class="sidebar-brand-text mx-3">Halaman Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administratior
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Master Data-->
    <!-- Master Data User -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/list_user') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>List User</span></a>
    </li>
    <!-- Master Data Lokasi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/list_pengelola') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>List Pengelola</span></a>
    </li>
    <!-- Master Data User Prodi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/data_prodi') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>List Masukan User</span></a>
    </li>
    <!-- Data Pelaporan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/data_pelaporan') ?>">
            <i class="fas fa-fw fa-search"></i>
            <span>List dan Input Berita</span></a>
    </li>
    <!-- Data Aset -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/data_aset') ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>List Desa</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - User -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil Saya</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - User Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->