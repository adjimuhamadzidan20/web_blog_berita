<?php
    $id = $_GET['id'];  
    $sql = "SELECT * FROM tb_kategori WHERE id = '$id'";
    $res = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($res);
?>

<div class="container-fluid px-3">
    <h2 class="mt-3">Edit Kategori</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Kategori</li>
        <li class="breadcrumb-item active">Edit Kategori</li>
    </ol>

    <div class="alert alert-warning small" role="alert" id="notif_modal">
        <span id="pesan"></span>
    </div>

    <div class="row">
        <div class="col">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Data Kategori
            </div>
            <div class="card-body">
                <form action="config/proses_kategori.php?proses=edit" method="post" name="form_kategori" onsubmit="return validasiEditKategori()">
                    <input type="text" class="form-control" name="id" value="<?= $data['id'];  ?>" hidden="hidden">
                    <input type="text" class="form-control" name="created" value="<?= $data['created_at'];  ?>" hidden="hidden">
                    <div class="mb-4">
                      <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" value="<?= $data['kategori']; ?>">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="index.php?page=kategori" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>  
                </form>
            </div>
        </div>    
    </div>
</div>