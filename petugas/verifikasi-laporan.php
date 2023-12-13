<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['verifikasi'])) {
    $verifikasi_ids = $_POST['verifikasi'];

    foreach ($verifikasi_ids as $id_pengaduan) {
        $update_sql = "UPDATE pengaduan SET status = 'SELESAI' WHERE id_pengaduan = $id_pengaduan";
        mysqli_query($koneksi, $update_sql);
    
        // Mendapatkan nilai dari input tersembunyi untuk setiap item yang dicentang
        $kategori_pengaduan = $_POST['kategori_pengaduan'][$id_pengaduan] ?? '';
        $tgl_pengaduan = $_POST['tgl_pengaduan'][$id_pengaduan] ?? '';
        $nik = $_POST['nik'][$id_pengaduan] ?? '';
        $isi_laporan = $_POST['isi_laporan'][$id_pengaduan] ?? '';
        $foto = $_POST['foto'][$id_pengaduan] ?? '';
    
        $insert_tanggapan_sql = "INSERT INTO tanggapan (kategori_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, status, verifikasi) VALUES ('$kategori_pengaduan', '$tgl_pengaduan', '$nik', '$isi_laporan', '$foto', 1, 1)";
        mysqli_query($koneksi, $insert_tanggapan_sql);
    }
}

if ($_SESSION['level'] == "petugas") {
    $sql = "SELECT * FROM pengaduan ORDER BY kategori_pengaduan, id_pengaduan DESC";
} elseif ($_SESSION['level'] == "pengguna") {
    $sql = "SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]' ORDER BY kategori_pengaduan, id_pengaduan DESC";
}

$query = mysqli_query($koneksi, $sql);
$no = 1;
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Verifikasi Pengaduan</h6>
    </div>
    <div class="card-body" style="font-size: 14px;">
        <form action="" method="post">
            <div class="table-responsive">
                <!-- Tabel Checkbox -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Pengaduan</th>
                            <th>Kategori Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $current_category = null; // untuk melacak kategori saat ini

                        while ($data = mysqli_fetch_array($query)) : 
                            // Jika kategori berubah, tampilkan judul kategori baru
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['tgl_pengaduan']; ?></td>
                                <td><?= $data['kategori_pengaduan']; ?></td>
                                <td><?= $data['isi_laporan']; ?></td>
                                <td><?= $data['foto']; ?></td>
                                <td><?= $data['status']; ?></td>
                                <td>
                                    <input type="checkbox" name="verifikasi[]" value="<?= $data['id_pengaduan'] ?>">
                                    <!-- ... (input tersembunyi) ... -->
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <input type="submit" value="Verifikasi Laporan Yang Dipilih" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<!-- Tabel Detail -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Laporan</h6>
    </div>
    <div class="card-body" style="font-size: 14px;">
        <div class="table-responsive">
            <table class="table table-bordered" id="detailTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl Pengaduan</th>
                        <th>Kategori Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query_detail = mysqli_query($koneksi, $sql); // Ganti dengan query yang sesuai untuk detail
                    
                    while ($data_detail = mysqli_fetch_array($query_detail)) : 
                        // Jika kategori berubah, tampilkan judul kategori baru
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data_detail['tgl_pengaduan']; ?></td>
                            <td><?= $data_detail['kategori_pengaduan']; ?></td>
                            <td><?= $data_detail['isi_laporan']; ?></td>
                            <td><?= $data_detail['foto']; ?></td>
                            <td><?= $data_detail['status']; ?></td>
                            <td>
                                <a href="../Masyarakat/detail-pengaduan.php?id=<?= $data_detail['id_pengaduan'] ?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-5">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    <span class="text"> Detail </span>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
