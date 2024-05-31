<?php  
    $sql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
    tb_post.id_kategori, tb_kategori.kategori FROM tb_post INNER JOIN tb_kategori ON tb_post.id_kategori = tb_kategori.id";

    $res = mysqli_query($koneksi, $sql);
?>

<div class="container-fluid px-3">
    <h2 class="mt-3">Postingan</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Postingan</li>
    </ol>
    <div class="row">
        <div class="col">
            <div class="card-header d-flex justify-content-between">
                <div class="nama-tabel d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Data Postingan Artikel
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th nowrap="nowrap" class="text-center">No</th>
                            <th nowrap="nowrap" class="text-center">Judul Post</th>
                            <th nowrap="nowrap" class="text-center">Thumbnail</th>
                            <th nowrap="nowrap" class="text-center">Tanggal Post</th>
                            <th nowrap="nowrap" class="text-center">Artikel Post</th>
                            <th nowrap="nowrap" class="text-center">Kategori</th>
                            <th nowrap="nowrap" class="text-center">Opsi</th>
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
                                <td><?= $data['judul_post']; ?></td>
                                <td class="text-center">
                                    <img src="thumbnail/<?= $data['thumbnail']; ?>" alt="thumbnail" width="80" height="80" class="thumb-post">
                                </td>
                                <td class="text-center"><?= $data['tanggal_post']; ?></td>
                                <td class="w-50">
                                    <div class="artikel-post">
                                        <?= $data['artikel_post']; ?>
                                    </div>
                                </td>
                                <td><?= $data['kategori']; ?></td>
                                <td class="d-block">
                                    <a href="index.php?page=edit_post&id=<?= $data['id']; ?>" class="btn btn-primary btn-sm w-100 mb-1">Edit</a>
                                    <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id']; ?>">Hapus</button>

                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Postingan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            Anda ingin menghapus postingan <?= $data['judul_post']; ?>?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="config/proses_postingan.php?proses=hapus&id=<?= $data['id']; ?>" class="btn btn-primary">Hapus</a>
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

<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah postingan baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="config/proses_postingan.php?proses=tambah" method="post" enctype="multipart/form-data" novalidate>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Judul Post</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="Masukkan judul post" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput2" class="form-label">Thumbnail</label>
              <input type="file" class="form-control" name="thumbnail" accept=".jpg"></input>
            </div>
            <div class="mb-3">
              <label for="artikel" class="form-label">Artikel Post</label>
              <textarea class="form-control" id="artikel" placeholder="Masukan isi artikel" name="artikel" required></textarea>
            </div>
            <div class="mb-3">
              <?php  
                $sql = "SELECT * FROM tb_kategori";
                $res = mysqli_query($koneksi, $sql);
              ?>
              <label for="exampleFormControlInput4" class="form-label">Pilih Kategori</label>
              <select class="form-select" aria-label="Default select example" name="kategori">
                  <option selected>-- Kategori --</option>
                  <?php  
                    while ($data = mysqli_fetch_assoc($res)) :
                  ?>
                      <option value="<?= $data['id']; ?>"><?= $data['kategori']; ?></option>
                  <?php  
                    endwhile;
                  ?>    
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>