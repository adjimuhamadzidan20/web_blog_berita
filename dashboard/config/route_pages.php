<?php  
	require 'koneksi.php';
	error_reporting(E_ERROR | E_WARNING);

	if (isset($_GET['page'])) {
	 	if ($_GET['page'] == 'dashboard') {
			include 'pages/dashboard.php';
		}
		else if ($_GET['page'] == 'kategori') {
			include 'pages/hal_kategori.php';
		} 
		else if ($_GET['page'] == 'edit_kategori') {
			include 'pages/hal_edit_kategori.php';
		} 
		else if ($_GET['page'] == 'postingan') {
			include 'pages/hal_postingan.php';
		}
		else if ($_GET['page'] == 'edit_post') {
			include 'pages/hal_edit_post.php';
		}
		else if ($_GET['page'] == 'komentar') {
			include 'pages/hal_komentar.php';
		} 
		else if ($_GET['page'] == 'sidebar_post') {
			include 'pages/hal_sidebar_post.php';
		} 
		else if ($_GET['page'] == 'footer_info') {
			include 'pages/hal_footer_info.php';
		}
		else if ($_GET['page'] == 'pengaturan_akun') {
			include 'pages/hal_pengaturan_akun.php';
		}
		else if ($_GET['page'] == 'edit_nama') {
			include 'pages/hal_edit_nama_admin.php';
		}
		else if ($_GET['page'] == 'edit_user') {
			include 'pages/hal_edit_username.php';
		} 
		else {
			include 'pages/404.php';
		}
	}
	else {
		include 'pages/dashboard.php';
	}


?>