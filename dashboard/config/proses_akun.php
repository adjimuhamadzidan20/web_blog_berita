<?php  
	require 'koneksi.php';
	session_start();

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'ganti_nama') {
			$id = $_POST['id'];
	    $namaAdmin = htmlspecialchars($_POST['nama_admin']);
	   	
	    $sql = "UPDATE tb_admin SET nama_admin = '$namaAdmin' WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    $namaAdminBaru = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id = '$id'");
	    $dataAdminBaru = mysqli_fetch_assoc($namaAdminBaru);

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Nama akun berhasil terubah!';
				$_SESSION['nama_admin'] = $dataAdminBaru['nama_admin'];

				header('Location: ../index.php?page=pengaturan_akun');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Nama akun gagal terubah!';
				header('Location: ../index.php?page=pengaturan_akun');
				exit();
			}
		} 
		else if ($_GET['proses'] == 'ganti_user') {
	    $id = $_POST['id'];
	    $username = htmlspecialchars($_POST['username']);
	   
	    $sql = "UPDATE tb_admin SET username = '$username' WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Username akun berhasil terubah!';
				header('Location: ../index.php?page=pengaturan_akun');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Username akun gagal terubah!';
				header('Location: ../index.php?page=pengaturan_akun');
				exit();
			}
		} 
		else if ($_GET['proses'] == 'ganti_password') {
	    $id = $_POST['id_admin'];
	    $password = htmlspecialchars(md5($_POST['password']));
	   
	    $sql = "UPDATE tb_admin SET password = '$password' WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Password akun berhasil terubah!';
				header('Location: ../index.php?page=pengaturan_akun');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Password akun gagal terubah!';
				header('Location: ../index.php?page=pengaturan_akun');
				exit();
			}
		}
	}
	
?>