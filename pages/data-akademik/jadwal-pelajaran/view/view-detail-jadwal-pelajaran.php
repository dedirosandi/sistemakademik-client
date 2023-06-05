<?php
include_once "env/page-session-admin.php";
$id = $_GET["id"];
$GetJadwalPelajaran = query("SELECT * FROM tb_jadwal_pelajaran WHERE id = '$id'")[0];
// $id_jadwal_pelajaran = $GetJadwalPelajaran["id"];
$GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran WHERE id_jadwal_pelajaran='$id'")[0];
?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=jadwal-pelajaran" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Akademik</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Jadwal Pelajaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <span class="badge bg-danger">Jadwal Pelajaran</span>
        </div>
        <?php
        if (!empty($GetMataPelajaran["id_jadwal_pelajaran"])) {
        ?>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Kode Pelajaran</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Hari</th>
                            <th>Jam</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran WHERE id_jadwal_pelajaran='$id'");
                        foreach ($GetMataPelajaran as $mata_pelajaran) {
                        ?>
                            <tr>
                                <td><?= $mata_pelajaran["kode_mata_pelajaran"]; ?></td>
                                <td><?= $mata_pelajaran["nama_mata_pelajaran"]; ?></td>
                                <td><?= $mata_pelajaran["guru_mata_pelajaran"]; ?></td>
                                <td><?= $mata_pelajaran["hari_mata_pelajaran"]; ?></td>
                                <td><?= $mata_pelajaran["jam_mata_pelajaran"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-header">
                <span class="badge bg-primary">Guru Pelajaran</span>
                <form action="/?pages=jadwal-pelajaran&act=proses-input-guru-pelajaran&id_jadwal_pelajaran=<?= $id; ?>" method="post">
                    <div class="mt-3 row">
                        <div class="col-sm-3">
                            <select name="id_user" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option selected value="">Pilih...</option>
                                <?php
                                $no = 1;
                                $GetGuru = query("SELECT * FROM tb_user WHERE role='guru'");
                                foreach ($GetGuru as $guru) {
                                    $id_user = $guru["id"];
                                    $GetGuruPelajaran = query("SELECT * FROM tb_guru_pelajaran WHERE id_jadwal_pelajaran='$id' AND id_user='$id_user'")[0];
                                ?>
                                    <?php

                                    if (!empty($GetGuruPelajaran["id_user"])) {
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
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Nomor Tlp</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $GetGuruPelajaran = query("SELECT * FROM tb_guru_pelajaran WHERE id_jadwal_pelajaran='$id'");
                        foreach ($GetGuruPelajaran as $guru_pelajaran) {
                            $id_user = $guru_pelajaran["id_user"];
                            $GetInfoGuru = query("SELECT * FROM tb_info_guru WHERE id_user='$id_user'")[0];
                            $GetUser = query("SELECT * FROM tb_user WHERE id='$id_user'")[0];
                        ?>
                            <tr>
                                <td><?= $GetUser["nama"]; ?></td>
                                <td><?= $GetUser["username"]; ?></td>
                                <td><?= $GetInfoGuru["no_hp"]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <form enctype="multipart/form-data" action="/?pages=jadwal-pelajaran&act=proses-upload-jadwal-pelajaran&id_jadwal_pelajaran=<?= $id; ?>" method="post">
                <div class="card-header">
                    <div class="row mt-4">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label col-form-label-sm">File Jadwal .xls</label>
                            <div class="col-sm-9">
                                <input name="filejadwal" class="form-control form-control-sm" type="file">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-9">
                                <button name="upload" type="submit" value="Import" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <pre>Template Bulk Upload Jadwal <a target="_blank" href="../../../../files/template-bulk-upload-jadwal.xls">Download</a></pre>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>



    </div>
</section>