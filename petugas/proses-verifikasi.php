<?php
session_start();


// Menambahkan opsi ceklis pada formulir
$verifikasi     = isset($_POST['verifikasi']) ? 1 : 0;

if (move_uploaded_file($lokasi_foto, '../foto/' . $nama_foto)) {
    $sql = "INSERT INTO pengaduan(tgl_pengaduan, nik, isi_laporan, foto, status, verifikasi) 
    VALUES ('$tgl_pengaduan', '$nik', '$isi_laporan', '$nama_foto', '$status', '$verifikasi')";

    include '../koneksi/koneksi.php';
    if (isset($_POST['verifikasi']) && is_array($_POST['verifikasi'])) {
        foreach ($_POST['verifikasi'] as $id_pengaduan) {
            // Lakukan tindakan verifikasi, misalnya update status
            $updateSql = "UPDATE pengaduan SET status='SELESAI' WHERE id_pengaduan=$id_pengaduan";
            mysqli_query($koneksi, $updateSql);
        }

        echo 'Verifikasi berhasil dilakukan untuk pengaduan yang dipilih.';
    } else {
        echo 'Tidak ada pengaduan yang dipilih untuk diverifikasi.';
    }
} else {
    echo 'Metode pengiriman form tidak valid.';
}

?>
