<?php
    require 'dashboard/config/koneksi.php';  
    $idArtikel = $_GET['id_artikel'];

    $sql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
    tb_post.id_kategori, tb_kategori.kategori, tb_post.created_at FROM tb_post INNER JOIN tb_kategori 
    ON tb_post.id_kategori = tb_kategori.id WHERE tb_post.id = '$idArtikel'";

    $res = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($res);

    $sql2 = "SELECT * FROM tb_komentar WHERE id_post = '$idArtikel'";
    $res2 = mysqli_query($koneksi, $sql2);
    $jmlKomen = mysqli_affected_rows($koneksi);

?>

<div class="articel">
    <div class="title-articel">
        <h3><?= $data['judul_post']; ?></h3>
    </div>
    <div class="time-post">
        <p><i class="bi bi-collection"></i> <?= $data['kategori']; ?> | <i class="bi bi-calendar3"></i> <?= $data['tanggal_post']; ?></p>
    </div>
    <div>
        <img class="pict img-thumbnail" src="dashboard/thumbnail/<?= $data['thumbnail']; ?>" alt="thumbnail">
    </div>
    <div class="desc-isi-artikel">
        <?= $data['artikel_post']; ?>
    </div>

    <div class="Komentar">
        <label for="komentar"><i class="bi bi-chat-square-text"></i> Komentar</label>
        <form action="dashboard/config/proses_komentar.php?proses=tambah&id=<?= $data['id']; ?>" method="post">
            <textarea id="komentar" placeholder="Komentar anda" name="komentar" required></textarea>
            <button type="submit" class="submit-komen"><i class="bi bi-send"></i> Kirim</button>
        </form>
    </div>
</div>

<div class="articel-komentar">
    <?php  
        if ($jmlKomen == 0) {
    ?>
        <span>Belum ada komentar...</span>
    <?php
        } else {  
            while ($data2 = mysqli_fetch_assoc($res2)) :
    ?>
        <div class="data-komentar">
            <div class="visitor">
                <div class="visitor-nama">
                    <img src="picture/user_2.png" alt="visitor">
                </div>
                <div class="visitor-rinci">
                    <span>Visitor | <?= $data2['tanggal_komentar']; ?></span>
                </div>
            </div>
            <div class="visitor-komen">
                <i class="bi bi-chat-square-text me-2"></i><?= $data2['komentar']; ?>
            </div>
        </div>
    <?php 
            endwhile;
        } 
    ?>
</div>