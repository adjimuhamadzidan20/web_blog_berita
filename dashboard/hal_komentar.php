<?php  
    $sql = "SELECT tb_komentar.id, tb_komentar.komentar, tb_komentar.id_post, tb_post.judul_post, 
    tb_komentar.tanggal_komentar FROM tb_komentar INNER JOIN tb_post ON tb_komentar.id_post = tb_post.id";

    $res = mysqli_query($koneksi, $sql);

?>

<div class="container-fluid px-3">
    <h2 class="mt-3">Komentar</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Komentar</li>
    </ol>
    <div class="row">
        <div class="col">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Komentar Post
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Komentar</th>
                            <th>Judul Post</th>
                            <th>Tanggal</th>
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
                            <td><?= $data['komentar']; ?></td>
                            <td><?= $data['judul_post']; ?></td>
                            <td><?= $data['tanggal_komentar']; ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id']; ?>">Lihat</button>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalHapus<?= $data['id']; ?>">Hapus</button>

                                <!-- Modal hapus -->
                                <div class="modal fade" id="exampleModalHapus<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Komentar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        Anda ingin menghapus komentar ini?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="config/proses_komentar.php?proses=hapus&id=<?= $data['id']; ?>" class="btn btn-primary">Hapus</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Modal komentar -->
                                <div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Komentar Postingan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <h3><?= $data['judul_post']; ?></h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p>Dikomentari pada tanggal <?= $data['tanggal_komentar']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p>Komentar yang diberikan :</p>
                                                <div class="p-2 border">
                                                    <?= $data['komentar']; ?>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
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