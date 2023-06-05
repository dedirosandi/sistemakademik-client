<div class="page-heading">
    <h3>Data Jurusan</h3>
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
            <a class="btn btn-success" href="?pages=jurusan&act=tambah-jurusan">Tambah Jurusan</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Jurusan</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetJurusan = query("SELECT * FROM tb_jurusan");
                    foreach ($GetJurusan as $jurusan) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $jurusan["nama_jurusan"]; ?></td>
                            <td>
                                <?php if ($jurusan["status"] == "1") { ?>
                                    <a href="?pages=jurusan&act=status-jurusan&id=<?= $jurusan["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></a>
                                <?php } elseif ($jurusan["status"] == "0") { ?>
                                    <a href="?pages=jurusan&act=status-jurusan&id=<?= $jurusan["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash-fill"></i></a>
                                <?php } ?>
                                <a href="?pages=jurusan&act=edit-jurusan&id=<?= $jurusan["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=jurusan&act=proses-hapus-jurusan&id=<?= $jurusan["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>