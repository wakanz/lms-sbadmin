<?php include "header.php"?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SLMS <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>book_list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Books</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>ebook_list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>E-Books</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>author_list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Authors</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>section_list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Sections</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>location_list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Locations</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>posts.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Blog</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>categories.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Categories</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_PATH; ?>settings.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Settings</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->