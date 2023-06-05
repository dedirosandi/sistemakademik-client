<div class="page-heading">
    <h3>Data Tahun Akademik</h3>
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
            <a class="btn btn-success" href="?pages=tahun-akademik&act=tambah-tahun-akademik">Tambah Tahun Akademik</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun</th>
                        <th>Nama Akademik</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik");
                    foreach ($GetTahunAkademik as $tahun_akademik) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $tahun_akademik["tahun"]; ?></td>
                            <td><?= $tahun_akademik["nama_tahun"]; ?></td>
                            <td>
                                <?php if ($tahun_akademik["status"] == "1") { ?>
                                    <a href="?pages=tahun-akademik&act=status-tahun-akademik&id=<?= $tahun_akademik["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></a>
                                <?php } elseif ($tahun_akademik["status"] == "0") { ?>
                                    <a href="?pages=tahun-akademik&act=status-tahun-akademik&id=<?= $tahun_akademik["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash-fill"></i></a>
                                <?php } ?>
                                <a href="?pages=tahun-akademik&act=edit-tahun-akademik&id=<?= $tahun_akademik["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=tahun-akademik&act=proses-hapus-tahun-akademik&id=<?= $tahun_akademik["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>