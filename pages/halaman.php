<?php

if(isset($_GET['url'])){
    switch ($_GET['url']){
        
        case 'tulis-pengaduan':
            include '../masyarakat/tulis-pengaduan.php';
            break;

        case 'lihat-pengaduan':
            include '../masyarakat/lihat-pengaduan.php';
            break;

        case 'detail-pengaduan':
            include '../masyarakat/detail-pengaduan.php';
            break;

        case 'lihat-tanggapan':
            include '../masyarakat/lihat-tanggapan.php';
            break;

            default :
                echo "Halaman Tidak Ditemukan";
                break;
    }
}else{
    echo "Selamat Datang Di Aplikasi Pengaduan Masyarakat, Dimana Aplikasi ini dibuat untuk melaporkan keluh-kesah masyarakat.<br>";
    echo "Anda Login Sebagai : " . $_SESSION['nama'];
}
?> 