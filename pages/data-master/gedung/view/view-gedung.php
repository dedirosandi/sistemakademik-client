<div class="page-heading">
    <h3>Data Gedung</h3>
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
            <a class="btn btn-success" href="?pages=gedung&act=tambah-gedung">Tambah Gedung</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Gedung</th>
                        <th>Nama Gedung</th>
                        <th>Jumlah Lantai</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetGedung = query("SELECT * FROM tb_gedung");
                    foreach ($GetGedung as $gedung) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $gedung["kode_gedung"]; ?></td>
                            <td><?= $gedung["nama_gedung"]; ?></td>
                            <td><?= $gedung["jumlah_lantai"]; ?></td>
                            <td>
                                <?php if ($gedung["status"] == "1") { ?>
                                    <a href="?pages=gedung&act=status-gedung&id=<?= $gedung["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></a>
                                <?php } elseif ($gedung["status"] == "0") { ?>
                                    <a href="?pages=gedung&act=status-gedung&id=<?= $gedung["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash-fill"></i></a>
                                <?php } ?>
                                <a href="?pages=gedung&act=edit-gedung&id=<?= $gedung["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=gedung&act=proses-hapus-gedung&id=<?= $gedung["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>