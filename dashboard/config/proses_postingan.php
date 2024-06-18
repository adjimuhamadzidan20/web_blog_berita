<?php  
	require 'koneksi.php';
	session_start();

	if (isset($_GET['proses'])) {
		if ($_GET['proses'] == 'tambah') {
			$date = date_create();

			$judul = htmlspecialchars($_POST['judul']);
			$artikel = $_POST['artikel'];
			$kategori = $_POST['kategori'];
			$tanggalPost = date_format($date, 'Y-m-d');
			$created = date_format($date, 'Y-m-d H:i:s');

			$namaThumb = $_FILES['thumbnail']['name'];
			$pathThumb = $_FILES['thumbnail']['tmp_name'];
			$sizeThumb = $_FILES['thumbnail']['size'];

			$thumbSize = 1048000;
			$ext = pathinfo($namaThumb, PATHINFO_EXTENSION);

			if ($ext === 'jpg' || $ext === 'JPG' || $ext === 'jpeg' || $ext === 'JPEG' || $ext === 'png' || $ext === 'PNG') {
				if ($sizeThumb > $thumbSize) {
					$_SESSION['status'] = 'warning';
					$_SESSION['pesan'] = 'Ukuran thumbnail maks 1MB!';

					header('Location: ../index.php?page=postingan');
					exit();
				} 
				else {
					$namaRandom = uniqid();
	        $namaFileThumb = $namaRandom .'.'. $ext;
	        move_uploaded_file($pathThumb, '../thumbnail/'. $namaFileThumb);

					$sql = "INSERT INTO tb_post VALUES ('', '$judul', '$tanggalPost', '$namaFileThumb', '$artikel', '$kategori', 
					'$created', '')";
					$result = mysqli_query($koneksi, $sql);

					if ($result) {
						$_SESSION['status'] = 'success';
						$_SESSION['pesan'] = 'Postingan berhasil ditambahkan!';
						header('Location: ../index.php?page=postingan');
						exit();
					} 
					else {
						$_SESSION['status'] = 'danger';
						$_SESSION['pesan'] = 'Postingan gagal ditambahkan!';
						header('Location: ../index.php?page=postingan');
						exit();
					}
				}
			} else {
				$_SESSION['status'] = 'warning';
				$_SESSION['pesan'] = 'File extension harus berupa gambar (jpg, jpeg, png)!';
				header('Location: ../index.php?page=postingan');
				exit();
			}
		} 
		else if ($_GET['proses'] == 'edit') {
			$date = date_create();

			$id = $_POST['id'];
			$judul = htmlspecialchars($_POST['judul']);
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
				$result = mysqli_query($koneksi, $sql);

				if ($result) {
					$_SESSION['status'] = 'success';
					$_SESSION['pesan'] = 'Postingan berhasil terubah!';
					header('Location: ../index.php?page=postingan');
					exit();
				} 
				else {
					$_SESSION['status'] = 'danger';
					$_SESSION['pesan'] = 'Postingan gagal terubah!';
					header('Location: ../index.php?page=postingan');
					exit();
				}
			} 
			else {
				if ($ext === 'jpg' || $ext === 'JPG' || $ext === 'jpeg' || $ext === 'JPEG' || $ext === 'png' || $ext === 'PNG') {
					$thumbSize = 1048000;
					$ext = pathinfo($namaThumb, PATHINFO_EXTENSION);

					if ($sizeThumb > $thumbSize) {
						$_SESSION['status'] = 'warning';
						$_SESSION['pesan'] = 'Ukuran thumbnail maks 1MB!';

						header('Location: ../index.php?page=edit_post&id='. $id);
						exit();
					} 
					else {
						$namaRandom = uniqid();
		        $namaFileThumb = $namaRandom .'.'. $ext;
		        move_uploaded_file($pathThumb, '../thumbnail/'. $namaFileThumb);

						$sql = "UPDATE tb_post SET judul_post = '$judul', tanggal_post = '$tanggalPost', thumbnail = '$namaFileThumb', 
						artikel_post = '$artikel', id_kategori = '$kategori', created_at = '$created', updated_at = '$updated' 
						WHERE id = '$id'";
						$result = mysqli_query($koneksi, $sql);

						if (isset($thumbLama)) {
					  	unlink('../thumbnail/'. $thumbLama);
					  }

						if ($result) {
							$_SESSION['status'] = 'success';
							$_SESSION['pesan'] = 'Postingan berhasil terubah!';
							header('Location: ../index.php?page=postingan');
							exit();
						} 
						else {
							$_SESSION['status'] = 'danger';
							$_SESSION['pesan'] = 'Postingan gagal terubah!';
							header('Location: ../index.php?page=postingan');
							exit();
						}
					}
				} else {
					$_SESSION['status'] = 'warning';
					$_SESSION['pesan'] = 'File extension harus berupa gambar (jpg, jpeg, png)!';
					header('Location: ../index.php?page=edit_post&id='. $id);
					exit();
				}
			}
		}
		else if ($_GET['proses'] == 'hapus') {
			$id = $_GET['id'];
			$thumb = $_GET['thumbnail'];
			$sql = "DELETE FROM tb_post WHERE id = '$id'";
	    $result = mysqli_query($koneksi, $sql);

	    if (isset($thumb)) {
			  	unlink('../thumbnail/'. $thumb);
			  }

	    if ($result) {
				$_SESSION['status'] = 'success';
				$_SESSION['pesan'] = 'Postingan berhasil terhapus!';
				header('Location: ../index.php?page=postingan');
				exit();
			} 
			else {
				$_SESSION['status'] = 'danger';
				$_SESSION['pesan'] = 'Postingan gagal terhapus!';
				header('Location: ../index.php?page=postingan');
				exit();
			}
		}
	}

?>