<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center" href="<?php echo base_url('user'); ?>">
        <div class="sidebar-brand-icon">
            <img class="img-fluid px-3 mt-0 mb-1" src="<?php echo base_url('assets/img/'); ?>um.png" alt="logo" style="width: 92px;">
        </div>
        <div class="sidebar-brand-text mx-3 ml-2">SUPERSIP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Features
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-fw fa-database"></i>
            <span>Data Arsip</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fitur :</h6>
                <a class="collapse-item" href="<?= base_url('arsip/arsip_baru'); ?>">Arsip Baru</a>
                <a class="collapse-item" href="<?= base_url('arsip/peminjaman'); ?>">Peminjaman</a>
                <a class="collapse-item" href="<?= base_url('arsip/manajemen_arsip'); ?>">Manajemen Arsip</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-fw fa-database"></i>
            <span>Data Penduduk</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fitur :</h6>
                <a class="collapse-item" href="<?= base_url('pendataan/input_data') ?>">Input Data</a>
                <a class="collapse-item" href="<?= base_url('pendataan/manajemen_data') ?>">Manajemen Data</a>
                <a class="collapse-item" href="<?= base_url('pendataan/manajemen_kk') ?>">Manajemen KK</a>
            </div>
        </div>
    </li>

    <?php
    if ($this->session->username == "admin") {
    ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Personal
        </div>

        <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('auth/register') ?>">
                <i class="fa fa-fw fa-user"></i>
                <span>Tambah User</span></a>
        </li>
    <?php
    }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fa fa-sign-out-alt fa-fw"></i>
            <span>Log out</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->