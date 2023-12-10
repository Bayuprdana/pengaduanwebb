<?php
$id = $_GET['id'];
if (empty($id)) {
    header("Location: masyarakat.php");
}

include '../koneksi/koneksi.php';
$query  = mysqli_query($koneksi, "SELECT * FROM pengaduan,tanggapan 
WHERE tanggapan.id_pengaduan='$id' AND tanggapan.id_pengaduan=pengaduan.id_pengaduan");

?>
<div class="card shadow">
    <div class="card-header">
        <a href="?url=lihat-pengaduan" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text"> Kembali </span>
        </a>
    </div>
    <div class="card-body">
        <?php
        if (mysqli_num_rows($query) == 0) {
            echo "<div class='alert alert-danger'>Maaf Pengaduan Anda Belum Di Tanggapi</div>";
        } else {
            $data = mysqli_fetch_array($query);
        ?>
            <form>
                <div class="form-group">
                    <label style="font-size: 14px;">Kategori Pengaduan </label>

                    <input type="text" name="kategori_pengaduan" class="form-control" readonly value="<?= $data['kategori_pengaduan'] ?>">
                </div>

                <div class="form-group">
                    <label style="font-size: 14px;">Tgl Pengaduan </label>

                    <input type="date" name="tgl_pengaduan" class="form-control" readonly value="<?= $data['tgl_tanggapan'] ?>">
                </div>

                <div class="form-group">
                    <label style="font-size: 14px">Laporan </label>
                    <textarea name="isi_laporan" class="form-control" readonly><?= $data['isi_laporan'] ?></textarea>
                </div>

                <div class="form-group">
                    <label style="font-size: 14px">Tanggapan </label>

                    <textarea name="tanggapan" class="form-control" readonly><?= $data['tanggapan'] ?></textarea>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
