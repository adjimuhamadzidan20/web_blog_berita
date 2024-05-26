<?php  
	require 'koneksi.php';

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();
			$kategori = $_POST['kategori'];
			$created = date_format($date, 'Y-m-d H:i:s');

			$sql = "INSERT INTO tb_kategori VALUES ('', '$kategori', '$created', '')";
			mysqli_query($koneksi, $sql);

			header('Location: ../index.php?page=kategori');
			exit();
		} 
		else if ($_GET['proses'] == 'edit') {
			$date = date_create();
	    $id = $_POST['id'];
	    $kategori = $_POST['kategori'];
	    $created = $_POST['created'];
	    $updated = date_format($date, 'Y-m-d H:i:s');
	   
	    $sql = "UPDATE tb_kategori SET kategori = '$kategori', created_at = '$created', updated_at = '$updated'
	    WHERE id = '$id'";
	    mysqli_query($koneksi, $sql);

	    header('Location: ../index.php?page=kategori');
	    exit();
		}
		else if ($_GET['proses'] == 'hapus') {
			$id = $_GET['id'];
			$sql = "DELETE FROM tb_kategori WHERE id = '$id'";
	    mysqli_query($koneksi, $sql);

	    header('Location: ../index.php?page=kategori');
	    exit();
		}
	}
	
?>