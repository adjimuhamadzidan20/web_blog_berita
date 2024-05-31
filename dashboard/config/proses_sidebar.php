<?php  
	require 'koneksi.php';

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();
			$idArtikel = $_POST['data'];
			$created = date_format($date, 'Y-m-d H:i:s');
			$jmlDataTerpilih = count($idArtikel);
			
			for ($i = 0; $i < $jmlDataTerpilih; $i++) { 
				$sql = "INSERT INTO tb_sidebar VALUES ('', '$idArtikel[$i]', '$created')";
				mysqli_query($koneksi, $sql);
			}

			header('Location: ../index.php?page=sidebar_post');
			exit();
		} 
		else if ($_GET['proses'] == 'hapus') {
			$id = $_GET['id'];
			$sql = "DELETE FROM tb_sidebar WHERE id = '$id'";
	    mysqli_query($koneksi, $sql);

	    header('Location: ../index.php?page=sidebar_post');
	    exit();
		}
	}
	
?>