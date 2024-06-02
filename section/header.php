<?php
  require 'dashboard/config/koneksi.php';

  $sql = "SELECT * FROM tb_kategori";
  $res = mysqli_query($koneksi, $sql);

?>

<div class="header">
  <div class="judul-web-berita">
    <div class="title">
      <h1 class="text-uppercase">Berita Lokal</h1>
    </div>
    <div class="sub-title">
      <p>Semua informasi terupdate ada disini</p>
    </div>
  </div>
</div>

<!-- navigasi -->
<nav class="navbar navbar-expand-lg navbar-dark py-1 py-lg-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item profile">
          <a class="nav-link active" href="index.php?halaman=tentang">Tentang</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <?php  
              while ($data = mysqli_fetch_assoc($res)) :
            ?>
              <li><a class="dropdown-item" href="index.php?kategori=<?= $data['kategori']; ?>"><?= $data['kategori']; ?></a></li>
            <?php  
              endwhile;
            ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>