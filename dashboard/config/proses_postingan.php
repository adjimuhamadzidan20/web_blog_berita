<?php  
	require 'koneksi.php';

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();

			$judul = $_POST['judul'];
			$artikel = $_POST['artikel'];
			$kategori = $_POST['kategori'];
			$tanggalPost = date_format($date, 'Y-m-d');
			$created = date_format($date, 'Y-m-d H:i:s');

			$namaThumb = $_FILES['thumbnail']['name'];
			$pathThumb = $_FILES['thumbnail']['tmp_name'];
			$sizeThumb = $_FILES['thumbnail']['size'];

			$thumbSize = 1048000;
			$ext = pathinfo($namaThumb, PATHINFO_EXTENSION);

			if ($sizeThumb > $thumbSize) {
				echo "<script>
					alert('Ukuran thumbnail maks 1MB');
				</script>";

				header('Location: ../index.php?page=postingan');
				exit();
			} 
			else {
				$namaRandom = uniqid();
        $namaFileThumb = $namaRandom .'.'. $ext;
        move_uploaded_file($pathThumb, '../thumbnail/'. $namaFileThumb);

				$sql = "INSERT INTO tb_post VALUES ('', '$judul', '$tanggalPost', '$namaFileThumb', '$artikel', '$kategori', 
				'$created', '')";
				mysqli_query($koneksi, $sql);

				header('Location: ../index.php?page=postingan');
				exit();
			}
		} 
		else if ($_GET['proses'] == 'edit') {
			$date = date_create();

			$id = $_POST['id'];
			$judul = $_POST['judul'];
			$artikel = $_POST['artikel'];
			$kategori = $_POST['kategori'];
			$tanggalPost = $_POST['tanggal'];
			$thumbLama = $_POST['thumb_lama'];
			$created = $_POST['created'];
			$updated = date_format($date, 'Y-m-d H:i:s');

			$namaThumb = $_FILES['thumbnail']['name'];
			$pathThumb = $_FILES['thumbnail']['tmp_name'];
			$sizeThumb = $_FILES['thumbnail']['size'];
			$error = $_FILES['thumbnail']['error'];

			if ($error == 4) {
				$sql = "UPDATE tb_post SET judul_post = '$judul', tanggal_post = '$tanggalPost', thumbnail = '$thumbLama', 
				artikel_post = '$artikel', id_kategori = '$kategori', created_at = '$created', updated_at = '$updated' 
				WHERE id = '$id'";
				mysqli_query($koneksi, $sql);

				header('Location: ../index.php?page=postingan');
				exit();
			} 
			else {
				$thumbSize = 1048000;
				$ext = pathinfo($namaThumb, PATHINFO_EXTENSION);

				if ($sizeThumb > $thumbSize) {
					echo "<script>
						alert('Ukuran thumbnail maks 1MB');
					</script>";

					header('Location: ../index.php?page=postingan');
					exit();
				} 
				else {
					$namaRandom = uniqid();
	        $namaFileThumb = $namaRandom .'.'. $ext;
	        move_uploaded_file($pathThumb, '../thumbnail/'. $namaFileThumb);

					$sql = "UPDATE tb_post SET judul_post = '$judul', tanggal_post = '$tanggalPost', thumbnail = '$namaFileThumb', 
					artikel_post = '$artikel', id_kategori = '$kategori', created_at = '$created', updated_at = '$updated' 
					WHERE id = '$id'";
					mysqli_query($koneksi, $sql);

					header('Location: ../index.php?page=postingan');
					exit();
				}
			}
		}
		else if ($_GET['proses'] == 'hapus') {
			$id = $_GET['id'];
			$sql = "DELETE FROM tb_post WHERE id = '$id'";
	    mysqli_query($koneksi, $sql);

	    header('Location: ../index.php?page=postingan');
	    exit();
		}
	}

?>