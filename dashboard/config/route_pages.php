<?php  
	require 'koneksi.php';

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
	}
	else {
		include 'dashboard.php';
	}


?>