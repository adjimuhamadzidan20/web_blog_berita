<?php  
    if (isset($_GET['id_artikel'])) {
        if ($_GET['id_artikel'] == $_GET['id_artikel']) {
            include 'isi_artikel.php';
        }
    }
    else if (isset($_GET['kategori'])) {
        if ($_GET['kategori'] == $_GET['kategori']) {
            include 'list_artikel.php';
        } 
    }
    else if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == 'tentang') {
            include 'tentang.php';
        }
    }
    else {
        include 'list_artikel.php';
    }

?>