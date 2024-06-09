<?php  
    require 'config/link_active_menu.php';
?>

<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link <?= $link1; ?>" href="index.php?page=dashboard">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>
        <div class="sb-sidenav-menu-heading">Interface</div>
        <a class="nav-link <?= $link2; ?>" href="index.php?page=kategori">
            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
            Kategori
        </a>
        <a class="nav-link <?= $link3; ?>" href="index.php?page=postingan">
            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
            Postingan
        </a>
        <a class="nav-link <?= $link4; ?>" href="index.php?page=komentar">
            <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
            Komentar
        </a>
        <a class="nav-link <?= $link5; ?>" href="index.php?page=sidebar_post">
            <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
            Sidebar Artikel
        </a>
    </div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    Start Bootstrap
</div>