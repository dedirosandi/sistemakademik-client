<div class="page-heading">
    <h3>Data Jenis PTK</h3>
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
            <a class="btn btn-success" href="?pages=jenis-ptk&act=tambah-jenis-ptk">Tambah Jenis PTK</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama PTK</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetJenisPtk = query("SELECT * FROM tb_jenis_ptk");
                    foreach ($GetJenisPtk as $jenis_ptk) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $jenis_ptk["nama_ptk"]; ?></td>
                            <td>
                                <?php if ($jenis_ptk["status"] == "1") { ?>
                                    <a href="?pages=jenis-ptk&act=status-jenis-ptk&id=<?= $jenis_ptk["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></a>
                                <?php } elseif ($jenis_ptk["status"] == "0") { ?>
                                    <a href="?pages=jenis-ptk&act=status-jenis-ptk&id=<?= $jenis_ptk["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash-fill"></i></a>
                                <?php } ?>
                                <a href="?pages=jenis-ptk&act=edit-jenis-ptk&id=<?= $jenis_ptk["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=jenis-ptk&act=proses-hapus-jenis-ptk&id=<?= $jenis_ptk["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>