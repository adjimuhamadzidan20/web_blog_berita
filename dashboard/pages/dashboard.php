<?php  
    $dataKat = "SELECT COUNT(*) AS jumlah_kategori FROM tb_kategori";
    $dataPost = "SELECT COUNT(*) AS jumlah_post FROM tb_post";
    $dataKomen = "SELECT COUNT(*) AS jumlah_komentar FROM tb_komentar";

    $query1 = mysqli_query($koneksi, $dataKat);
    $query2 = mysqli_query($koneksi, $dataPost);
    $query3 = mysqli_query($koneksi, $dataKomen);

    $jumKat = mysqli_fetch_assoc($query1);
    $jumPost = mysqli_fetch_assoc($query2);
    $jumKomen = mysqli_fetch_assoc($query3);
?>

<div class="container-fluid px-3">
    <h2 class="mt-3">Dashboard</h2>
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5>Kategori</h5>
                    <p><?= $jumKat['jumlah_kategori']; ?> Data</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=kategori">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5>Artikel Post</h5>
                    <p><?= $jumPost['jumlah_post']; ?> Data</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=postingan">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5>Jumlah Komentar</h5>
                    <p><?= $jumKomen['jumlah_komentar']; ?> Data</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="index.php?page=komentar">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>