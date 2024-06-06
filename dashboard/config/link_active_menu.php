<?php  
	if (@$_GET['page'] == 'dashboard') {
    $link1 = 'active';
    $link2 = '';
    $link3 = '';
    $link4 = '';
    $link5 = '';
	} else if (@$_GET['page'] == 'kategori') {
    $link1 = '';
    $link2 = 'active';
    $link3 = '';
    $link4 = '';
    $link5 = '';
	} else if (@$_GET['page'] == 'edit_kategori') {
    $link1 = '';
    $link2 = 'active';
    $link3 = '';
    $link4 = '';
    $link5 = '';
	} else if (@$_GET['page'] == 'postingan') {
    $link1 = '';
    $link2 = '';
    $link3 = 'active';
    $link4 = '';
    $link5 = '';
	} else if (@$_GET['page'] == 'edit_post') {
    $link1 = '';
    $link2 = '';
    $link3 = 'active';
    $link4 = '';
    $link5 = '';
	} else if (@$_GET['page'] == 'komentar') {
    $link1 = '';
    $link2 = '';
    $link3 = '';
    $link4 = 'active';
    $link5 = '';
	} else if (@$_GET['page'] == 'sidebar_post') {
    $link1 = '';
    $link2 = '';
    $link3 = '';
    $link4 = '';
    $link5 = 'active';
	} else {
    $link1 = 'active';
    $link2 = '';
    $link3 = '';
    $link4 = '';
    $link5 = '';
	}
?>