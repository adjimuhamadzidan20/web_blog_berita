<?php
    $id = $_GET['id'];  
    $sql = "SELECT * FROM tb_admin WHERE id = '$id'";
    $res = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($res);
?>

<div class="container-fluid px-3">
    <h2 class="mt-3 mb-4">Ganti Nama Admin</h2>

    <div class="card">
        <div class="card-body">
            <form action="config/proses_akun.php?proses=ganti_nama" method="post" name="form_kategori" onsubmit="return validasiEditKategori()">
                <input type="text" class="form-control" name="id" value="<?= $data['id']; ?>" hidden="hidden">
                <div class="mb-4">
                  <label for="exampleFormControlInput1" class="form-label">Nama Admin</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_admin" value="<?= $data['nama_admin'];  ?>">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php?page=pengaturan_akun" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>  
            </form>
        </div>   
    </div>
</div>