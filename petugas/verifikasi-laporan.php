<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
    </div>
    <div class="card-body" style="font-size: 14px;">
        <form action="proses-verifikasi.php" method="post">
            <div class="table-responsive">
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
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tgl Pengaduan</th>
                            <th>Kategori Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include '../koneksi/koneksi.php';
                        //query based on level
                        if($_SESSION['level']=="petugas"){
                            $sql    = "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC";
                        }
                        elseif($_SESSION['level']=="pengguna"){
                            $sql    = "SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]' ORDER BY id_pengaduan DESC";
                        }

                        $query  = mysqli_query($koneksi, $sql);
                        $no     = 1;

                        while ($data = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['tgl_pengaduan']; ?></td>
                                <td><?= $data['kategori_pengaduan']; ?></td>
                                <td><?= $data['isi_laporan']; ?></td>
                                <td><?= $data['foto']; ?></td>
                                <td><?= $data['status']; ?></td>
                                <td>
                                    <!-- Tambahkan checkbox verifikasi -->
                                    <input type="checkbox" name="verifikasi[]" value="<?= $data['id_pengaduan'] ?>">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Tombol untuk memproses verifikasi -->
                <input type="submit" value="Verifikasi Yang Dipilih">
            </div>
        </form>
    </div>
</div>