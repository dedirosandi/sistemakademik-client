<div class="page-heading">
    <h3>Data Kepala Sekolah</h3>
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
            <?php
            $GetKepsekBtn = query("SELECT * FROM tb_user WHERE role='kepsek'")[0];
            if ($GetKepsekBtn["role"] == "kepsek") {
            ?>

            <?php } else { ?>
                <a class="btn btn-success" href="?pages=kepala-sekolah&act=tambah-kepala-sekolah">Tambah Kepala Sekolah</a>
            <?php } ?>

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
                    $GetKepsek = query("SELECT * FROM tb_user WHERE role='kepsek'");
                    foreach ($GetKepsek as $kepsek) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kepsek["nama"]; ?></td>
                            <td><?= $kepsek["username"]; ?></td>
                            <td>
                                <a href="?pages=kepala-sekolah&act=edit-kepala-sekolah&id_kepala_sekolah=<?= $kepsek["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>