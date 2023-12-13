<?php

if(isset($_GET['url'])){
    switch ($_GET['url']){
        
        case 'verifikasi-laporan':
            include 'verifikasi-laporan.php';
            break;


            default :
                echo "Halaman Tidak Ditemukan";
                break;
    }
}else{
    echo "Anda Login Sebagai : " . $_SESSION['nama_petugas'];
    echo "<br>";
    include '../pages/fotoatas.php';
    echo "<br>";
    include '../pages/statistik.php';
}
?>