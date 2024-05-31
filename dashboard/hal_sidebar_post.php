<?php  

    $sql = "SELECT tb_post.id, tb_post.judul_post, tb_post.tanggal_post, tb_post.thumbnail, tb_post.artikel_post, 
    tb_post.id_kategori, tb_kategori.kategori FROM tb_post INNER JOIN tb_kategori ON tb_post.id_kategori = tb_kategori.id";

    $res = mysqli_query($koneksi, $sql);
    
?>

<div class="container-fluid px-3">
    <h2 class="mt-3">Sidebar Post</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Sidebar Post</li>
    </ol>
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
                            <table class="table">
                                <thead class="sticky-top bg-white">
                                    <tr>
                                        <th>Opsi</th>
                                        <th>Judul Artikel</th>
                                        <th>Tanggal Post</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;  
                                        while ($data = mysqli_fetch_assoc($res)) :
                                        $no++;
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="btn-check btn-sm" id="btncheck<?= $no; ?>" value="<?= $data['id']; ?>" name="data[]">
                                                <label class="btn btn-outline-primary btn-sm" for="btncheck<?= $no; ?>">Pilih</label>
                                            </td>
                                            <td><?= $data['judul_post']; ?></td>
                                            <td><?= $data['tanggal_post']; ?></td>
                                            <td><?= $data['kategori']; ?></td>
                                        </tr>
                                    <?php 
                                        endwhile;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end my-3">
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
                                <td><?= $no; ?></td>
                                <td><?= $data['judul_post']; ?></td>
                                <td><?= $data['created_at']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalHapus<?= $data['id']; ?>">Hapus dari sidebar</button>

                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="exampleModalHapus<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Post Sidebar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            Anda ingin menghapus postingan pada sidebar?
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