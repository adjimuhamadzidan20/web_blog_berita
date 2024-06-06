<?php  
	require 'koneksi.php';
	session_start();
	error_reporting(E_ERROR | E_WARNING);
	
	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();
			$idArtikel = $_POST['data'];
			$created = date_format($date, 'Y-m-d H:i:s');
			$jmlDataTerpilih = count($idArtikel);
			
			if ($jmlDataTerpilih < 1) {
				$_SESSION['status'] = 'warning';
				$_SESSION['pesan'] = 'Silahkan pilih artikel!';
				header('Location: ../index.php?page=sidebar_post');
				exit();
			} 
			else {
				for ($i = 0; $i < $jmlDataTerpilih; $i++) {
					$sql1 = "SELECT id_sidepost FROM tb_sidebar WHERE id_sidepost = '$idArtikel[$i]'";
					$result1 = mysqli_query($koneksi, $sql1);
					$data = mysqli_fetch_row($result1);

					if ($data[0] == $idArtikel[$i]) {
						$_SESSION['status'] = 'warning';
						$_SESSION['pesan'] = 'Artikel tersebut sudah terpilih!';
						header('Location: ../index.php?page=sidebar_post');
						exit();
					} 
					else {
						$jumlahData = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tb_sidebar");
						$hasilJum = mysqli_fetch_assoc($jumlahData);
						
						if ($hasilJum['jumlah'] == 3) {
							$_SESSION['status'] = 'warning';
							$_SESSION['pesan'] = 'Artikel pada sidebar maksimal 3!';
							header('Location: ../index.php?page=sidebar_post');
							exit();
						} 
						else {
							$sql = "INSERT INTO tb_sidebar VALUES ('', '$idArtikel[$i]', '$created')";
							$result = mysqli_query($koneksi, $sql);
						}
					}
				}
			}

			if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Post Sidebar berhasil ditambahkan!';
				header('Location: ../index.php?page=sidebar_post');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Post Sidebar gagal ditambahkan!';
				header('Location: ../index.php?page=sidebar_post');
				exit();
			}
		} 
		else if ($_GET['proses'] == 'hapus') {
			$id = $_GET['id'];
			$sql = "DELETE FROM tb_sidebar WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Postingan berhasil terhapus dari sidebar!';
				header('Location: ../index.php?page=sidebar_post');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Postingan gagal terhapus dari sidebar!';
				header('Location: ../index.php?page=sidebar_post');
				exit();
			}
		}
	}
	
?>