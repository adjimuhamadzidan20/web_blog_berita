<?php  
  $id = $_GET['id'];
  $sql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
  tb_post.id_kategori, tb_kategori.kategori, tb_post.created_at FROM tb_post INNER JOIN tb_kategori ON tb_post.id_kategori = tb_kategori.id 
  WHERE tb_post.id = '$id'";
  
  $res = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($res);

?>

<div class="container-fluid px-3">
  <h2 class="mt-3">Edit Postingan</h2>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Postingan</li>
    <li class="breadcrumb-item active">Edit Postingan</li>
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
        <form action="config/proses_postingan.php?proses=edit" method="post" enctype="multipart/form-data" name="form_posting" onsubmit="return validasiEditPosting()" novalidate>
          <input type="text" class="form-control" name="id" value="<?= $data['id']; ?>" hidden>
          <input type="text" class="form-control" name="tanggal" value="<?= $data['tanggal_post']; ?>" hidden>
          <input type="text" class="form-control" name="created" value="<?= $data['created_at']; ?>" hidden>
          <input type="text" class="form-control" name="thumb_lama" value="<?= $data['thumbnail']; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul Post</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" placeholder="Masukkan judul post" value="<?= $data['judul_post']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Thumbnail</label><br>
            <img src="thumbnail/<?= $data['thumbnail']; ?>" alt="thumbnail" width="120" height="120" class="mb-2 img-thumbnail">
            <input type="file" class="form-control" name="thumbnail" accept=".jpg"></input>
            <i class="text-muted small ket-thumbnail">*Ukuran file thumbnail maksimal 1MB</i>
          </div>
          <div class="mb-3">
            <label for="artikel" class="form-label">Artikel Post</label>
            <textarea class="form-control" id="artikel" placeholder="Masukan isi artikel" name="artikel" required>
              <?= $data['artikel_post']; ?>
            </textarea>
          </div>
          <div class="mb-4">
            <?php  
              $sql = "SELECT * FROM tb_kategori";
              $res = mysqli_query($koneksi, $sql);
            ?>
            <label for="exampleFormControlInput4" class="form-label">Pilih Kategori</label>
            <select class="form-select" aria-label="Default select example" name="kategori">
              <option value="<?= $data['id_kategori']; ?>" selected><?= $data['kategori']; ?></option>
              <?php  
                while ($data = mysqli_fetch_assoc($res)) :
              ?>
                  <option value="<?= $data['id']; ?>"><?= $data['kategori']; ?></option>
              <?php  
                endwhile;
              ?>    
            </select>
          </div>
          <div class="mb-4 d-flex justify-content-between">
            <a href="index.php?page=postingan" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>    
  </div>
</div>