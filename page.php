<?php
    $page = isset($_GET['p']) ? $_GET['p'] : "";
    
    if ($page == 'toko'){ 
        include_once "toko_tani.php";
    } else if ($page == "konfirmasi" ){
        include_once "konfirmasi_p.php";
    } else if ($page == "kesepakatan"){
        include_once "kesepakatan.php";
    } else if ($page == 'info'){
        include_once "info_p.php";
    } else if ($page == 'pengunjung'){
        include_once "pengunjung.php";
    }
?>