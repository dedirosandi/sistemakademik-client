<div class="page-heading">
    <h3>Mata Pelajaran</h3>
</div>
<?php
$id = $_GET["id"];
$GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran_2 WHERE id='$id'")[0];
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

<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=mata-pelajaran" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Akademik</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Mata Pelajaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>



<section class="section">
    <div class="card text-white bg-primary" style="max-width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-white">Pelajaran : <?= $GetMataPelajaran["nama_mata_pelajaran"]; ?></h5>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <form action="/?pages=mata-pelajaran&act=proses-tambah-guru-pelajaran&id_mata_pelajaran=<?= $id; ?>" method="post">
                <div class="mb-3 row">
                    <div class="col-sm-3">
                        <select name="id_guru" class="form-select form-select-sm" aria-label="Default select example" required>
                            <option selected value="">Pilih...</option>
                            <?php
                            $no = 1;
                            $GetGuru = query("SELECT * FROM tb_user WHERE role='guru'");
                            foreach ($GetGuru as $guru) {
                                $id_user = $guru["id"];
                                $GetGuruPelajaran = query("SELECT * FROM tb_guru_pelajaran_2 WHERE id_mata_pelajaran='$id' AND id_guru='$id_user'")[0];
                            ?>
                                <?php

                                if (!empty($GetGuruPelajaran["id_guru"])) {
                                ?>
                                    <option disabled><?= $guru["nama"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $guru["id"]; ?>"><?= $guru["nama"]; ?></option>
                                <?php } ?>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-sm btn-success">Input</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Guru Pengajar</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetGuruPelajaran = query("SELECT * FROM tb_guru_pelajaran_2 WHERE id_mata_pelajaran='$id'");
                    foreach ($GetGuruPelajaran as $guru_pelajaran) {
                        $id_guru = $guru_pelajaran["id_guru"];
                        $GetGuruPelajaran = query("SELECT * FROM tb_user WHERE role='guru' AND id='$id_guru'")[0];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $GetGuruPelajaran["nama"]; ?></td>
                            <td>
                                <a href="?pages=mata-pelajaran&act=detail-mata-pelajaran&id=<?= $guru_pelajaran["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                <a href="?pages=mata-pelajaran&act=proses-hapus-guru-pelajaran&id=<?= $guru_pelajaran["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>