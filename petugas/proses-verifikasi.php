<?php
session_start();

include '../koneksi/koneksi.php';

$kategori_pengaduan = isset($_POST['kategori_pengaduan']) ? $_POST['kategori_pengaduan'] : '';
$tgl_pengaduan = isset($_POST['tgl_pengaduan']) ? $_POST['tgl_pengaduan'] : '';
$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
$isi_laporan = isset($_POST['isi_laporan']) ? $_POST['isi_laporan'] : '';
$status = 0;


$verifikasi = isset($_POST['verifikasi']) ? $_POST['verifikasi'] : array();

if (isset($_FILES['foto'])) {
    $lokasi_foto = $_FILES['foto']['tmp_name'];
    $nama_foto = $_FILES['foto']['name'];

    if (move_uploaded_file($lokasi_foto, '../foto/' . $nama_foto)) {

        $sql = "INSERT INTO tanggapan(kategori_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, status, verifikasi) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssssssi", $kategori_pengaduan, $tgl_pengaduan, $nik, $isi_laporan, $nama_foto, $status, $verifikasi);
        $stmt->execute();
        $stmt->close();

        foreach ($verifikasi as $verifikasiId) {
            $verifikasiId = intval($verifikasiId);
            if ($verifikasiId > 0) {
                $updateSql = "UPDATE pengaduan SET status='SELESAI' WHERE id_pengaduan = $verifikasiId";
                mysqli_query($koneksi, $updateSql);
            }
        }

        echo 'Verifikasi berhasil dilakukan untuk pengaduan yang dipilih.';
    } else {
        echo 'Gagal mengunggah file foto.';
    }
} else {
    $alert = 'Foto tidak diupload gagal diverifikasi.';
    echo "<script>alert('$alert'); window.location.assign('petugas.php?url=verifikasi-laporan');</script>";
}
?>
