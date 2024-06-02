<?php  
	require 'koneksi.php';
	session_start();

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();
			$idArtikel = $_POST['data'];
			$created = date_format($date, 'Y-m-d H:i:s');
			$jmlDataTerpilih = count($idArtikel);
			
			for ($i = 0; $i < $jmlDataTerpilih; $i++) { 
				$sql = "INSERT INTO tb_sidebar VALUES ('', '$idArtikel[$i]', '$created')";
				$result = mysqli_query($koneksi, $sql);
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