<?php
    require 'dashboard/config/koneksi.php';

    $sql = "SELECT tb_sidebar.id, tb_sidebar.id_sidepost, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, 
    tb_post.artikel_post, tb_sidebar.created_at FROM tb_sidebar INNER JOIN tb_post ON tb_sidebar.id_sidepost = tb_post.id";
    $query = mysqli_query($koneksi, $sql);
    $jmlData = mysqli_affected_rows($koneksi);
?>    

<div class="side-bar">

    <div class="search">
        <form class="d-flex" method="post">
            <input class="form-control me-2 rounded-0 " type="search" placeholder="Cari sesuatu.." aria-label="Search" name="cari">
            <button class="btn rounded-0 cari" type="submit" name="submit" style="background-color: black; color: white;">Cari</button>
        </form>
    </div>
    
    <!-- artikel sidebar -->
    <?php  
        if ($jmlData == 0) {
    ?>
        <div class="popular articel-post">
            <span>Sidebar artikel belum tersedia..</span>
        </div>
    <?php
        } else {  
            while ($data = mysqli_fetch_assoc($query)) :
    ?>
        <div class="popular articel-post">
            <div class="title-articel-side">
                <h5><?= $data['judul_post']; ?></h5>
            </div>
            <div class="time-post">
                <p><i class="bi bi-calendar3"></i> Posting pada <?= $data['tanggal_post']; ?></p>
            </div>
            <div>
                <img class="pict img-thumbnail" src="dashboard/thumbnail/<?= $data['thumbnail']; ?>" alt="thumbnail">
            </div>
            <div class="desc">
                <div class="side-artikel-desc">
                    <p><?= $data['artikel_post']; ?></p>
                </div>
                <a href="index.php?id_artikel=<?= $data['id_sidepost']; ?>"><i class="bi bi-arrow-right-square me-2"></i>Selengkapnya</a>
            </div>
        </div>
    <?php  
            endwhile;
        }
    ?>
    
</div>