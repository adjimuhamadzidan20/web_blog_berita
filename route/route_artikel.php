<?php  
    if (isset($_GET['id_artikel'])) {
        if ($_GET['id_artikel'] == $_GET['id_artikel']) {
            include 'pages/isi_artikel.php';
        }
    }
    else if (isset($_GET['kategori'])) {
        if ($_GET['kategori'] == $_GET['kategori']) {
            include 'pages/list_artikel.php';
        } 
    }
    else if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == 'tentang') {
            include 'pages/tentang.php';
        }
    }
    else {
        include 'pages/list_artikel.php';
    }

?>