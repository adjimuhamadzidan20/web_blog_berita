<?php
    require 'dashboard/config/koneksi.php';
    
    if (isset($_GET['kategori'])) {
        $kategori = $_GET['kategori'];

        $sql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
        tb_post.id_kategori, tb_kategori.kategori, tb_post.created_at FROM tb_post INNER JOIN tb_kategori 
        ON tb_post.id_kategori = tb_kategori.id WHERE kategori = '$kategori'";
        $res = mysqli_query($koneksi, $sql);

        $rows = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row; 
        }

        // paginasi hal
        $jmlDataHal = 3;
        $jmlData = count($rows);
        $jmlHal = ceil($jmlData / $jmlDataHal) + 1;

        // posisi hal aktif
        $posisiHal = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
        // data awal hal
        $awalData = ($jmlDataHal * $posisiHal) - $jmlDataHal;

        $sqlLimit = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
        tb_post.id_kategori, tb_kategori.kategori, tb_post.created_at FROM tb_post INNER JOIN tb_kategori 
        ON tb_post.id_kategori = tb_kategori.id WHERE kategori = '$kategori' LIMIT $awalData, $jmlDataHal";
    } 
    else {
        $sql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
        tb_post.id_kategori, tb_kategori.kategori, tb_post.created_at FROM tb_post INNER JOIN tb_kategori 
        ON tb_post.id_kategori = tb_kategori.id";
        $res = mysqli_query($koneksi, $sql);

        $rows = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row; 
        }

        // paginasi hal
        $jmlDataHal = 3;
        $jmlData = count($rows);
        $jmlHal = ceil($jmlData / $jmlDataHal) + 1;

        // posisi hal aktif
        $posisiHal = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
        // data awal hal
        $awalData = ($jmlDataHal * $posisiHal) - $jmlDataHal;

        $sqlLimit = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
        tb_post.id_kategori, tb_kategori.kategori, tb_post.created_at FROM tb_post INNER JOIN tb_kategori 
        ON tb_post.id_kategori = tb_kategori.id LIMIT $awalData, $jmlDataHal";
    }

    $resSql = mysqli_query($koneksi, $sqlLimit);
    $dataPost = [];
    while ($row = mysqli_fetch_assoc($resSql)) {
        $dataPost[] = $row; 
    }

    // pencarian data postingan
    if (isset($_POST['submit'])) {
        $kolomPencarian = $_POST['cari'];
        if (empty($kolomPencarian)) {
            $dataPost;
        } else {
            $querySql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
            tb_post.id_kategori, tb_kategori.kategori, tb_post.created_at FROM tb_post INNER JOIN tb_kategori 
            ON tb_post.id_kategori = tb_kategori.id WHERE tb_post.judul_post LIKE '%$kolomPencarian%'";
            
            $dataPost = mysqli_query($koneksi, $querySql);
        }
    }
?>

<?php  
    $jmlPost = mysqli_affected_rows($koneksi);
    if ($jmlPost == 0) {
?>
    <div class="articel">
        Konten artikel tidak tersedia..
    </div>
<?php
    } else {
        foreach ($dataPost as $data) :
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
        <div class="desc">
            <div class="artikel-desc">
                <?= $data['artikel_post']; ?>
            </div>
            <a href="index.php?id_artikel=<?= $data['id']; ?>"><i class="bi bi-arrow-right-square me-2"></i>Selengkapnya</a>
        </div>
    </div>
<?php  
        endforeach;
    }
?>

<!-- paginasi -->
<nav aria-label="...">
    <ul class="pagination pagination-md justify-content-center">
    <?php  
        for ($i = 1; $i < $jmlHal; $i++) :
            if ($i == $posisiHal) { 
    ?>
      <li class="page-item active" aria-current="page">
        <a href="index.php?hal=<?= $i; ?>" class="page-link border-dark" style="background-color: black;"><?= $i; ?></a>
      </li>
        <?php  
            } else {
        ?>
      <li class="page-item">
        <a class="page-link text-body" href="index.php?hal=<?= $i; ?>"><?= $i; ?></a>
      </li>
    <?php  
            }
        endfor;
    ?>
    </ul>
</nav>