<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
    </div>
    <div class="card-body" style="font-size: 14px;">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori Pengaduan</th>
                        <th>Tgl Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kategori Pengaduan</th>
                        <th>Tgl Pengaduan</th>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    include '../koneksi/koneksi.php';
                    $sql    = "SELECT * FROM pengaduan WHERE nik='$_SESSION[nik]' ORDER BY id_pengaduan DESC";
                    $query  = mysqli_query($koneksi, $sql);
                    $no     = 1;

                    while($data = mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['kategori_pengaduan']; ?></td>
                        <td><?= $data['tgl_pengaduan']; ?></td>
                        <td><?= $data['isi_laporan']; ?></td>
                        <td><?= $data['foto']; ?></td>
                        <td>
                            <?php
                            if ($data['status'] == 'SELESAI') {
                                echo 'Laporan Anda Telah Di Selesaikan';
                                // Jika ada keterangan dari petugas, tampilkan keterangan
                                if (!empty($data['keterangan_petugas'])) {
                                    echo ' - ' . $data['keterangan_petugas'];
                                }
                            } else {
                                echo 'Maaf, Pengaduan Anda Belum Di Tanggapi';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="?url=detail-pengaduan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-5">
                                    <i class="fa fa-info"></i>
                                </span>
                                <span class="text"> Detail </span>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
