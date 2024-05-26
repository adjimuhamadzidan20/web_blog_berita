<?php  
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'berita_lokal';

	$koneksi = mysqli_connect($host, $username, $password, $database);
	
	// if ($koneksi) {
	// 	echo "koneksi oke";
	// } else {
	// 	echo "koneksi not oke ". mysqli_connect_error();
	// }

?>