<?php  
	require 'koneksi.php';
	session_start();

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();
			$kategori = $_POST['kategori'];
			$created = date_format($date, 'Y-m-d H:i:s');

			$sql = "INSERT INTO tb_kategori VALUES ('', '$kategori', '$created', '')";
			$result = mysqli_query($koneksi, $sql);

			if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Kategori berhasil ditambahkan!';
				header('Location: ../index.php?page=kategori');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Kategori gagal ditambahkan!';
				header('Location: ../index.php?page=kategori');
				exit();
			}
		} 
		else if ($_GET['proses'] == 'edit') {
			$date = date_create();
	    $id = $_POST['id'];
	    $kategori = $_POST['kategori'];
	    $created = $_POST['created'];
	    $updated = date_format($date, 'Y-m-d H:i:s');
	   
	    $sql = "UPDATE tb_kategori SET kategori = '$kategori', created_at = '$created', updated_at = '$updated'
	    WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Kategori berhasil terubah!';
				header('Location: ../index.php?page=kategori');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Kategori gagal terubah!';
				header('Location: ../index.php?page=kategori');
				exit();
			}
		}
		else if ($_GET['proses'] == 'hapus') {
			$id = $_GET['id'];
			$sql = "DELETE FROM tb_kategori WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Kategori berhasil terhapus!';
				header('Location: ../index.php?page=kategori');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Kategori gagal terhapus!';
				header('Location: ../index.php?page=kategori');
				exit();
			}
		}
	}
	
?>