<div class="page-heading">
    <h3>Data Guru</h3>
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
            <a class="btn btn-success" href="?pages=guru&act=tambah-guru">Tambah Guru</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>No Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetGuru = query("SELECT * FROM tb_user WHERE role='guru'");
                    foreach ($GetGuru as $guru) {
                        $id_user = $guru["id"];
                        $GetInfo = query("SELECT * FROM tb_info_guru WHERE id_user='$id_user'")[0];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $guru["username"]; ?></td>
                            <td><?= $guru["nama"]; ?></td>
                            <td><?= $GetInfo["jenis_kelamin"]; ?></td>
                            <td><?= $GetInfo["no_hp"]; ?></td>
                            <td>
                                <?php if ($guru["status"] == "1") { ?>
                                    <a href="?pages=guru&act=status-guru&id=<?= $guru["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-person-check"></i></a>
                                <?php } elseif ($guru["status"] == "0") { ?>
                                    <a href="?pages=guru&act=status-guru&id=<?= $guru["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-person-x"></i></a>
                                <?php } ?>
                                <a href="?pages=guru&act=detail-guru&id=<?= $GetInfo["id"]; ?>" class="btn btn-sm btn-info"><i class="bi bi-search"></i></a>
                                <a href="?pages=guru&act=edit-guru&id=<?= $GetInfo["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>