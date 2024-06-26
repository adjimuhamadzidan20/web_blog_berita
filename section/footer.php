<?php
    require 'dashboard/config/koneksi.php';

    $sql = "SELECT * FROM tb_kategori LIMIT 0, 5";
    $res = mysqli_query($koneksi, $sql);
    $jmlDataKat = mysqli_affected_rows($koneksi);

    $sql2 = "SELECT id, judul_post FROM tb_post LIMIT 0, 4";
    $res2 = mysqli_query($koneksi, $sql2);
    $jmlDataPost = mysqli_affected_rows($koneksi);
?>

<footer>
    <div class="foot-wrap">
        <div class="sect-1">
            <h4>Berita Lokal</h4>
            <p class="deskripsi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi blanditiis possimus alias eaque laboriosam maxime nobis incidunt sit officia aperiam non ducimus et optio accusamus, culpa quisquam impedit dolores facere. Iste, unde ducimus, saepe distinctio officiis perspiciatis sint. Minus magni repellendus iure. </p>
            <p class="deskripsi">&copy; Berita Lokal 2022 - <?= date("Y"); ?></p>
        </div>
        <div class="sect-2">
            <h5>Terpopuler</h5>
            <?php 
                if ($jmlDataPost == 0) { 
            ?>
                <div>
                    Artikel belum tersedia..
                </div>
            <?php
                } else {  
                    while ($data = mysqli_fetch_assoc($res2)) :
            ?>
                <div class="link">
                    <a href="index.php?id_artikel=<?= $data['id']; ?>">
                    <i class="bi bi-newspaper me-2"></i><?= $data['judul_post']; ?></a>
                </div>
            <?php  
                    endwhile;
                }
            ?>   
        </div>
        <div class="sect-3">
            <h5>Kategori Utama</h5>
            <?php 
                if ($jmlDataPost == 0) { 
            ?>
                <div>
                    Kategori belum tersedia..
                </div> 
            <?php 
                } else { 
                    while ($data = mysqli_fetch_assoc($res)) :
            ?>
                <div class="link-cat">
                    <a href="index.php?kategori=<?= $data['kategori']; ?>"><i class="bi bi-collection me-2"></i><?= $data['kategori']; ?></a>
                </div> 
            <?php  
                    endwhile;
                }
            ?>   
        </div>
    </div>
</footer>  