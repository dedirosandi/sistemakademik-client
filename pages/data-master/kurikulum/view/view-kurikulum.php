<div class="page-heading">
    <h3>Data Kurikulum</h3>
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
            <a class="btn btn-success" href="?pages=kurikulum&act=tambah-kurikulum">Tambah Kurikulum</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kurikulum</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetKurikulum = query("SELECT * FROM tb_kurikulum");
                    foreach ($GetKurikulum as $kurikulum) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kurikulum["nama_kurikulum"]; ?></td>
                            <td>
                                <?php if ($kurikulum["status"] == "1") { ?>
                                    <a href="?pages=kurikulum&act=status-kurikulum&id=<?= $kurikulum["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></a>
                                <?php } elseif ($kurikulum["status"] == "0") { ?>
                                    <a href="?pages=kurikulum&act=status-kurikulum&id=<?= $kurikulum["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash-fill"></i></a>
                                <?php } ?>
                                <a href="?pages=kurikulum&act=edit-kurikulum&id=<?= $kurikulum["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=kurikulum&act=proses-hapus-kurikulum&id=<?= $kurikulum["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>