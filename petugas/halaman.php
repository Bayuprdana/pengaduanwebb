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
    echo "Selamat Datang Di Aplikasi Pengaduan Masyarakat, Dimana Aplikasi ini dibuat untuk melaporkan keluh-kesah masyarakat.<br>";
    echo "Anda Login Sebagai : " . $_SESSION['nama_petugas'];
}
?> 