<?php  
    $sql = "SELECT * FROM tb_admin WHERE nama_admin = '$_SESSION[nama_admin]'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);
?>

<div class="container-fluid px-3">
    <h3 class="mt-3"><i class="fas fa-cog fa-fw"></i> Pengaturan Akun</h3>
    <ol class="breadcrumb mb-3">
        <li class="breadcrumb-item active">Pengaturan Akun Admin</li>
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

    <!-- Profile Image -->
    <div class="card card-primary card-outline py-3 mb-5">
      <div class="card-body box-profile">
            <div class="row">
                <div class="col-12 col-lg d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                    <div class="profil-akun">
                        <div class="text-center mb-3">
                          <img class="profile-user-img img-fluid img-circle"
                               src="profile/user_2.png"
                               alt="user profile picture"
                               title="User Profile"
                               width="100"
                               height="100">
                        </div>

                        <h4 class="profile-username text-center"><?= $data['nama_admin']; ?></h4>
                        <p class="text-muted text-center">Administrator</p>  
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="data-akun">
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Nama Admin</b> : <?= $data['nama_admin']; ?>
                          </li>
                          <li class="list-group-item">
                            <b>Username</b> : <?= $data['username']; ?>
                          </li>
                        </ul>
                        <div class="d-flex flex-column">
                            <a href="index.php?page=edit_nama&id=<?= $data['id']; ?>" class="btn btn-primary btn-block mb-2"><b>Ganti Nama Admin</b></a>
                            <a href="index.php?page=edit_user&id=<?= $data['id']; ?>" class="btn btn-primary btn-block mb-2"><b>Ganti Username</b></a>
                            <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#gantiPassword<?= $data['id']; ?>"><b>Ganti Password</b></button>
                        </div>
                    </div>
                </div>
            </div>                   
      </div>
      <!-- /.card-body -->
    </div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="gantiPassword<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="config/proses_akun.php?proses=ganti_password" method="post" name="form_ganti_password" onsubmit="return validasiPassword()">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ganti Password</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <div class="alert alert-warning small" role="alert" id="notif_modal">
                <span id="pesan"></span>
            </div>
            
            <input type="text" class="form-control" name="id_admin" value="<?= $data['id']; ?>" hidden="hidden">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Masukkan Password Baru</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Masukkan password baru">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Ganti</button>
          </div>
        </div> 
    </form>
  </div>
</div>