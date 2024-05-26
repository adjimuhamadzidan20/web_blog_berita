<?php  
    $sql = "SELECT * FROM tb_kategori";
    $res = mysqli_query($koneksi, $sql);
    
?>

<div class="container-fluid px-3">
    <h2 class="mt-3">Kategori</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Kategori</li>
    </ol>
    <div class="row">
        <div class="col">
            <div class="card-header d-flex justify-content-between">
                <div class="nama-tabel d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Data Kategori Post
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Ditambahkan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 0; 
                            while ($data = mysqli_fetch_assoc($res)) :
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['kategori']; ?></td>
                                <td><?= $data['created_at']; ?></td>
                                <td>
                                    <a href="index.php?page=edit_kategori&id=<?= $data['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="config/proses_kategori.php?proses=hapus&id=<?= $data['id']; ?>" class="btn btn-primary btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="config/proses_kategori.php?proses=tambah" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Kategori</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" placeholder="Masukkan jenis kategori" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div> 
    </form>
  </div>
</div>