<?php
    $sql = "SELECT * FROM tb_kategori";
    $res = mysqli_query($koneksi, $sql);
?>

<div class="container-fluid px-3">
    <h3 class="mt-3"><i class="fas fa-tasks"></i> Kategori</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Kategori</li>
    </ol>

    <?php  
        if (isset($_SESSION['status']) && isset($_SESSION['pesan'])) :
    ?>
        <div class="alert alert-<?= $_SESSION['status']; ?>" role="alert" id="alert">
          <?= $_SESSION['pesan']; ?>
        </div>
    <?php 
        endif;
        unset($_SESSION['status']);
        unset($_SESSION['pesan']);
    ?>

    <div class="row">
        <div class="col">
            <div class="card-header d-flex justify-content-between">
                <div class="nama-tabel d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Data Kategori Post
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah <i class="fas fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th nowrap="nowrap">No</th>
                                <th nowrap="nowrap">Kategori</th>
                                <th nowrap="nowrap">Ditambahkan</th>
                                <th nowrap="nowrap">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0; 
                                while ($data = mysqli_fetch_assoc($res)) :
                                $no++;
                            ?>
                                <tr>
                                    <td nowrap="nowrap"><?= $no; ?></td>
                                    <td nowrap="nowrap"><?= $data['kategori']; ?></td>
                                    <td nowrap="nowrap"><?= $data['created_at']; ?></td>
                                    <td nowrap="nowrap">
                                        <a href="index.php?page=edit_kategori&id=<?= $data['id']; ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id']; ?>" title="Hapus"><i class="fas fa-trash"></i></button>

                                        <!-- Modal hapus -->
                                        <div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kategori</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                Anda ingin menghapus kategori <?= $data['kategori']; ?>?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a href="config/proses_kategori.php?proses=hapus&id=<?= $data['id']; ?>" class="btn btn-primary">Hapus</a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
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
</div>

<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="config/proses_kategori.php?proses=tambah" method="post" name="form_kategori" onsubmit="return validasiKategori()">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <div class="alert alert-warning small" role="alert" id="notif_modal">
                <span id="pesan"></span>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Kategori</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="kategori" placeholder="Masukkan jenis kategori">
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