<div class="page-heading">
    <h3>Data Ruangan</h3>
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
            <a class="btn btn-success" href="?pages=ruangan&act=tambah-ruangan">Tambah Ruangan</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Ruangan</th>
                        <th>Nama Gedung</th>
                        <th>Nama Ruangan</th>
                        <th>Kapasitas Siswa</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetRuangan = query("SELECT * FROM tb_ruangan");
                    foreach ($GetRuangan as $ruangan) {
                        $id_gedung = $ruangan["nama_gedung"];
                        $GetGedung = query("SELECT * FROM tb_gedung WHERE id='$id_gedung'")[0];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $ruangan["kode_ruangan"]; ?></td>
                            <td><?= $GetGedung["nama_gedung"]; ?></td>
                            <td><?= $ruangan["nama_ruangan"]; ?></td>
                            <td><?= $ruangan["kapasitas"]; ?></td>
                            <td>
                                <?php if ($ruangan["status"] == "1") { ?>
                                    <a href="?pages=ruangan&act=status-ruangan&id=<?= $ruangan["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></a>
                                <?php } elseif ($ruangan["status"] == "0") { ?>
                                    <a href="?pages=ruangan&act=status-ruangan&id=<?= $ruangan["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash-fill"></i></a>
                                <?php } ?>
                                <a href="?pages=ruangan&act=edit-ruangan&id=<?= $ruangan["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=ruangan&act=proses-hapus-ruangan&id=<?= $ruangan["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>