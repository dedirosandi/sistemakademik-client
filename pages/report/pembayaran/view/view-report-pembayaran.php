<div class="page-heading">
    <h3>Report Pembayaran</h3>
</div>
<?php
include_once "env/page-session-admin.php";
if (isset($_GET["pesan"])) { ?>
    <?php if ($_GET["pesan"] == "berhasil") { ?>
        <div class="alert alert-success" role="alert">
            Proses berhasil...
        </div>
    <?php } else if ($_GET["pesan"] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Proses Gagal...
        </div>
    <?php } ?>
<?php
} ?>

<section class="section">
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Pembayaran</th>
                        <th>Siswa</th>
                        <th>Nominal</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $GetTrxPembayaran = query("SELECT * FROM tb_transaksi_pembayaran");
                    foreach ($GetTrxPembayaran as $trx_pembayaran) {
                        $nama_user = $trx_pembayaran["nama_user"];
                        $GetNamaUser = query("SELECT * FROM tb_user WHERE id='$nama_user'")[0];

                        $nama_tahun = $pembayaran["tahun_akademik"];
                        $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$nama_tahun'")[0];


                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $trx_pembayaran["order_id"]; ?></td>
                            <td><?= $trx_pembayaran["nama_pembayaran"]; ?></td>
                            <td><?= $GetNamaUser["nama"]; ?></td>
                            <td><?= $trx_pembayaran["nominal_pembayaran"]; ?></td>
                            <td><?= $trx_pembayaran["metode_pembayaran"]; ?></td>
                            <td>
                                <?php

                                if (!empty($trx_pembayaran["transaction_id"])) {
                                ?>
                                    <span class="btn btn-sm btn-success"><i class="bi bi-check-circle-fill"></i></span>
                                <?php } else { ?>
                                    <span class="badge bg-danger"><i class="bi bi-x-circle-fill"></i></span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>