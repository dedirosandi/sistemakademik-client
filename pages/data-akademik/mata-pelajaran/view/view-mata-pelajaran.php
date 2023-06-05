<div class="page-heading">
    <h3>Mata Pelajaran</h3>
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
            <a class="btn btn-success" href="?pages=mata-pelajaran&act=tambah-mata-pelajaran">Tambah Mata Pelajaran</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran_2");
                    foreach ($GetMataPelajaran as $mata_pelajaran) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $mata_pelajaran["nama_mata_pelajaran"]; ?></td>
                            <td>
                                <a href="?pages=mata-pelajaran&act=detail-mata-pelajaran&id=<?= $mata_pelajaran["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-search"></i></a>
                                <a href="?pages=mata-pelajaran&act=proses-hapus-mata-pelajaran&id=<?= $mata_pelajaran["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>