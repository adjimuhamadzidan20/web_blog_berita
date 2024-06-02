<?php  
	require 'koneksi.php';
	session_start();

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();
			$idPost = $_GET['id'];
			$komentar = $_POST['komentar'];
			$tglKomen = date_format($date, 'Y-m-d H:i:s');
			$created = date_format($date, 'Y-m-d H:i:s');

			$sql = "INSERT INTO tb_komentar VALUES ('', '$komentar', '$idPost', '$tglKomen', '$created')";
			mysqli_query($koneksi, $sql);

			header('Location: ../../index.php?id_artikel='. $idPost);
			exit();
		}
		else if ($_GET['proses'] == 'hapus') {
			$id = $_GET['id'];
			$sql = "DELETE FROM tb_komentar WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Komentar berhasil terhapus!';
				header('Location: ../index.php?page=komentar');
	    	exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Komentar gagal terhapus!';
				header('Location: ../index.php?page=komentar');
	    	exit();
			}
		}
	}
	
?>