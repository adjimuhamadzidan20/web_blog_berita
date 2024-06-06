<?php
	require 'koneksi.php';
	session_start();

  // cek cookie fitur remember me
  if (isset($_COOKIE['ID']) && isset($_COOKIE['Key'])) {
    $query = mysqli_query($koneksi, "SELECT username FROM tb_admin WHERE id = '$_COOKIE[ID]'");
    $res = mysqli_fetch_assoc($query);

    if ($_COOKIE['Key'] === hash('sha256', $res['username'])) {
        $_SESSION['login'] = true;
    }
  }

  // tolak masuk ke dashboard
  if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
  }

	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);

	$sql = "SELECT * FROM tb_admin WHERE username = '$username'";
  $res = mysqli_query($koneksi, $sql);
  $dt_admin = mysqli_fetch_assoc($res);

  // validasi user / admin
  if (mysqli_num_rows($res) === 1) {
    if (md5($password, TRUE)) {
      // nama username
      $_SESSION['user'] = $dt_admin['username'];
      $_SESSION['nama_admin'] = $dt_admin['nama_admin'];
      $_SESSION['login'] = true;

      // remember me
      if ($_POST['remember']) {
          setcookie('ID', $dt_admin['id'], time()+60, '/');
          setcookie('Key', hash('sha256', $dt_admin['username']), time()+60, '/');
      }

      header('Location:	../index.php');
      exit;
    }
  } 
  else {
    $_SESSION['status'] = 'danger';
    $_SESSION['pesan'] = 'Username atau password tidak sesuai!';
    
    header('Location: ../../login.php');
    exit;
  }

?>