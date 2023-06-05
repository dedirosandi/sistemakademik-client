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
        <div class="card-header">
            <form action="" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <!-- <a href="?pages=pembayaran&act=tambah-pembayaran-multiple" class="btn btn-sm btn-success">Tambah Pembayaran Multiple</a> -->
                            <h5><i class="bi bi-funnel-fill"></i> Pilih Untuk tampilkan</h5>
                        </div>
                        <div class="col-md-auto">
                            <input type="text" name="pages" value="pembayaran" hidden>
                            <input type="text" name="act" value="tampil-pembayaran" hidden>
                            <select name="id_tahun_akademik" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option selected value="">Pilih Tahun Akademik</option>
                                <?php
                                $no = 1;
                                $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik");
                                foreach ($GetTahunAkademik as $tahun_akademik) {
                                ?>
                                    <option value="<?= $tahun_akademik["id"]; ?>"><?= $tahun_akademik["nama_tahun"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="id_kelas" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option selected value="">Pilih Kelas</option>
                                <?php
                                $no = 1;
                                $GetKelas = query("SELECT * FROM tb_kelas");
                                foreach ($GetKelas as $kelas) {
                                    $jurusan = $kelas["jurusan"];
                                    $GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];
                                ?>
                                    <option value="<?= $kelas["id"]; ?>"><?= $kelas["nama_kelas"]; ?> - <?= $GetJurusan["nama_jurusan"]; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-sm btn-success">Lihat</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
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
                        <th>Kelas</th>
                        <th>Nominal</th>
                        <th>Tahun Akademik</th>
                        <th>Kelas</th>
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

                            <td>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>