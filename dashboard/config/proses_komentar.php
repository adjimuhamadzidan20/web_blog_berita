<?php  
	require 'koneksi.php';

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
	    mysqli_query($koneksi, $sql);

	    header('Location: ../index.php?page=komentar');
	    exit();
		}
	}
	
?>