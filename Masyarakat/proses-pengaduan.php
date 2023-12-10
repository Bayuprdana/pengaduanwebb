<?php
session_start();

include '../koneksi/koneksi.php';

$kategori_pengaduan = $_POST['kategori_pengaduan'];
$tgl_pengaduan = $_POST['tgl_pengaduan'];
$nik = $_SESSION['nik'];
$isi_laporan = $_POST['isi_laporan'];
$lokasi_foto = $_FILES['foto']['tmp_name'];
$nama_foto = $_FILES['foto']['name'];
$status = 0;

if (move_uploaded_file($lokasi_foto, '../foto/' . $nama_foto)) {

    $sql = "INSERT INTO pengaduan (kategori_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, status) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);


    mysqli_stmt_bind_param($stmt, "sssssi",$kategori_pengaduan, $tgl_pengaduan, $nik, $isi_laporan, $nama_foto, $status);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Laporan Pengaduan Sudah Tersimpan.'); window.location.assign('masyarakat.php');</script>";
    } else {
        echo "<script>alert('Laporan Pengaduan Gagal Tersimpan.'); window.location.assign('masyarakat.php?url=tulis-pengaduan');</script>";
    }


    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Upload foto gagal.'); window.location.assign('masyarakat.php?url=tulis-pengaduan');</script>";
}
?>
