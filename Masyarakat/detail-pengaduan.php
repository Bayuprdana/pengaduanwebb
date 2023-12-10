<?php
$id = $_GET['id'];
if (empty($id)) {
    header("Location: masyarakat.php");
}

include '../koneksi/koneksi.php';
$query  = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='$id'");
$data   = mysqli_fetch_array($query);
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
        <form>
            <div class="form-group">
                <label style="font-size: 14px;">Kategori Pengaduan </label>
                <select name="kategori_pengaduan" class="form-control" disabled>
                    <option value=""><?= $data['kategori_pengaduan'] ?></option>
                    <option value="Pengaduan Fasilitas" <?= ($data['kategori_pengaduan'] == 'Pengaduan Fasilitas') ? 'selected' : '' ?>>Pengaduan Fasilitas</option>
                    <option value="Pengaduan Kebersihan" <?= ($data['kategori_pengaduan'] == 'Pengaduan Kebersihan') ? 'selected' : '' ?>>Pengaduan Kebersihan</option>
                    <option value="Pengaduan Kegiatan" <?= ($data['kategori_pengaduan'] == 'Pengaduan Kegiatan') ? 'selected' : '' ?>>Pengaduan Kegiatan</option>
                    <option value="Pengaduan Perangkat Desa" <?= ($data['kategori_pengaduan'] == 'Pengaduan Perangkat Desa') ? 'selected' : '' ?>>Pengaduan Perangkat Desa</option>
                    <option value="Pengaduan Keamanan" <?= ($data['kategori_pengaduan'] == 'Pengaduan Keamanan') ? 'selected' : '' ?>>Pengaduan Keamanan</option>
                </select>
            </div>

            <div class="form-group">
                <label style="font-size: 14px;">Tgl Pengaduan </label>
                <input type="date" name="tgl_pengaduan" class="form-control" disabled value="<?= $data['tgl_pengaduan'] ?>">
            </div>

            <div class="form-group">
                <label style="font-size: 14px">Isi Laporan </label>
                <textarea name="isi_laporan" class="form-control" disabled><?= $data['isi_laporan'] ?></textarea>
            </div>

            <div class="form-group">
                <label style="font-size: 14px">Foto </label>
                <img class="img-thumbnail" src="../foto/<?= $data['foto'] ?>" width="300">
            </div>
        </form>
    </div>
</div>
