<?php  
    $sql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
    tb_post.id_kategori, tb_kategori.kategori FROM tb_post INNER JOIN tb_kategori ON tb_post.id_kategori = tb_kategori.id";

    $res = mysqli_query($koneksi, $sql);
?>

<div class="container-fluid px-3">
    <h3 class="mt-3"><i class="fas fa-info-circle"></i> Sidebar Artikel</h3>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Sidebar Artikel</li>
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
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    List Artikel Postingan
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     <form action="config/proses_sidebar.php?proses=tambah" method="post">
                        <div class="data-artikel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="sticky-top bg-white">
                                        <tr>
                                            <th nowrap="nowrap">Opsi</th>
                                            <th nowrap="nowrap">Judul Artikel</th>
                                            <th nowrap="nowrap">Tanggal Post</th>
                                            <th nowrap="nowrap">Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 0;  
                                            while ($data = mysqli_fetch_assoc($res)) :
                                            $no++;
                                        ?>
                                            <tr>
                                                <td nowrap="nowrap">
                                                    <input type="checkbox" class="btn-check btn-sm" id="btncheck<?= $no; ?>" value="<?= $data['id']; ?>" name="data[]">
                                                    <label class="btn btn-outline-primary btn-sm" for="btncheck<?= $no; ?>">Pilih</label>
                                                </td>
                                                <td nowrap="nowrap"><?= $data['judul_post']; ?></td>
                                                <td nowrap="nowrap"><?= $data['tanggal_post']; ?></td>
                                                <td nowrap="nowrap"><?= $data['kategori']; ?></td>
                                            </tr>
                                        <?php 
                                            endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-block d-md-flex justify-content-between my-3">
                            <span class="small mb-3 mb-md-0 text-muted d-flex align-items-center ket-thumbnail"><i>*Pilihan maksimal 3 artikel</i></span>
                            <button type="submit" class="btn btn-primary">Tambah ke sidebar</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <?php  
        $sql2 = "SELECT tb_sidebar.id, tb_sidebar.id_sidepost, tb_post.judul_post, tb_sidebar.created_at FROM tb_sidebar 
        INNER JOIN tb_post ON tb_sidebar.id_sidepost = tb_post.id";
        $res2 = mysqli_query($koneksi, $sql2); 
    ?>
    
    <div class="row mt-3">
        <div class="col">
            <div class="card-body border">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th nowrap="nowrap">No</th>
                                <th nowrap="nowrap">Artikel</th>
                                <th nowrap="nowrap">Tanggal Set</th>
                                <th nowrap="nowrap">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                while ($data = mysqli_fetch_assoc($res2)) :
                                $no++;
                            ?>
                                <tr>
                                    <td nowrap="nowrap"><?= $no; ?></td>
                                    <td nowrap="nowrap"><?= $data['judul_post']; ?></td>
                                    <td nowrap="nowrap"><?= $data['created_at']; ?></td>
                                    <td nowrap="nowrap">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalHapus<?= $data['id']; ?>"><i class="fas fa-trash"></i> Hapus dari sidebar</button>

                                        <!-- Modal hapus -->
                                        <div class="modal fade" id="exampleModalHapus<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Sidebar Artikel</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                Anda ingin menghapus artikel pada sidebar?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <a href="config/proses_sidebar.php?proses=hapus&id=<?= $data['id']; ?>" class="btn btn-primary">Hapus</a>
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