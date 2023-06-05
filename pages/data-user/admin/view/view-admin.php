<div class="page-heading">
    <h3>Data Admin</h3>
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
            <a class="btn btn-success" href="?pages=admin&act=tambah-admin">Tambah Admin</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetAdmin = query("SELECT * FROM tb_user WHERE role='admin'");
                    foreach ($GetAdmin as $admin) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $admin["nama"]; ?></td>
                            <td><?= $admin["username"]; ?></td>
                            <td>
                                <?php if ($admin["status"] == "1") { ?>
                                    <a href="?pages=admin&act=proses-status-admin&id=<?= $admin["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-person-check"></i></a>
                                <?php } elseif ($admin["status"] == "0") { ?>
                                    <a href="?pages=admin&act=proses-status-admin&id=<?= $admin["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-person-x"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>