<?php  
	require 'koneksi.php';
	error_reporting(E_ERROR | E_WARNING);

	if (isset($_GET['page'])) {
	 	if ($_GET['page'] == 'dashboard') {
			include 'dashboard.php';
		}
		else if ($_GET['page'] == 'kategori') {
			include 'hal_kategori.php';
		} 
		else if ($_GET['page'] == 'edit_kategori') {
			include 'hal_edit_kategori.php';
		} 
		else if ($_GET['page'] == 'postingan') {
			include 'hal_postingan.php';
		}
		else if ($_GET['page'] == 'edit_post') {
			include 'hal_edit_post.php';
		}
		else if ($_GET['page'] == 'komentar') {
			include 'hal_komentar.php';
		} 
		else if ($_GET['page'] == 'sidebar_post') {
			include 'hal_sidebar_post.php';
		} 
		else if ($_GET['page'] == 'footer_info') {
			include 'hal_footer_info.php';
		} 
		else {
			include '404.php';
		}
	}
	else {
		include 'dashboard.php';
	}


?>