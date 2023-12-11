<?php
session_start();

include '../koneksi/koneksi.php';

$kategori_pengaduan = isset($_POST['kategori_pengaduan']) ? $_POST['kategori_pengaduan'] : '';
$tgl_pengaduan = isset($_POST['tgl_pengaduan']) ? $_POST['tgl_pengaduan'] : '';
$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
$isi_laporan = isset($_POST['isi_laporan']) ? $_POST['isi_laporan'] : '';
$status = 0;

// Menambahkan opsi ceklis pada formulir
$verifikasi = isset($_POST['verifikasi']) ? 1 : 0;

// Pemeriksaan file foto yang diunggah
if (isset($_FILES['foto'])) {
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $nama_foto = $_FILES['foto']['name'];

    if (move_uploaded_file($lokasi_foto, '../foto/' . $nama_foto)) {
        // Memproses tanggapan
        $sql = "INSERT INTO tanggapan(kategori_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, status, verifikasi) 
        VALUES ('$kategori_pengaduan', '$tgl_pengaduan', '$nik', '$isi_laporan', '$nama_foto', '$status', '$verifikasi')";

        mysqli_query($koneksi, $sql);

        // Verifikasi pengaduan yang dipilih
        if (!empty($_POST['verifikasi'])) {
            $verifikasiIds = implode(',', $_POST['verifikasi']);
            $updateSql = "UPDATE pengaduan SET status='SELESAI' WHERE id_pengaduan IN ($verifikasiIds)";
            mysqli_query($koneksi, $updateSql);
        }

        echo 'Verifikasi berhasil dilakukan untuk pengaduan yang dipilih.';
    } else {
        echo 'Gagal mengunggah file foto.';
    }
} else {
    echo 'Foto tidak diunggah.';
}
?>
