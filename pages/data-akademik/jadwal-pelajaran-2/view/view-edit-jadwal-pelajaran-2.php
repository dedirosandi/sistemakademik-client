<?php
$id = $_GET["id"];
$GetJadwalPelajaran = query("SELECT * FROM tb_jadwal_pelajaran_2 WHERE id='$id'")[0];
$id_kelas = $GetJadwalPelajaran["kelas"];
$id_mata_pelajaran = $GetJadwalPelajaran["mata_pelajaran"];
$id_tahun_akademik = $GetJadwalPelajaran["tahun_akademik"];
$id_guru = $GetJadwalPelajaran["guru"];
$id_jurusan = $GetJadwalPelajaran["guru"];

$GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'")[0];
$jurusan = $GetKelas["jurusan"];
$GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];

$GetMPelajaran = query("SELECT * FROM tb_mata_pelajaran_2 WHERE id='$id_mata_pelajaran'")[0];
$GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'")[0];
$GetGuru = query("SELECT * FROM tb_user WHERE id='$id_guru'")[0];

include_once "env/page-session-admin.php";
?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=jadwal-pelajaran-2&act=tampil-jadwal-pelajaran-2&id_tahun_akademik=<?= $id_tahun_akademik ?>&id_kelas=<?= $id_kelas ?>" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Akademik</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal Pelajaran</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<?php
if (isset($_GET["pesan"])) { ?>
    <?php if ($_GET["pesan"] == "gagal") { ?>
        <div class="alert alert-danger" role="alert">
            Proses gagal...
        </div>
    <?php } else if ($_GET["pesan"] == "berhasil") { ?>
        <div class="alert alert-success" role="alert">
            Proses berhasil...
        </div>
    <?php } ?>

<?php
} ?>

<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <h5>Tambah Jadwal Pelajaran</h5>
        </div>
        <div class="card-body">
            <form action="?pages=jadwal-pelajaran-2&act=proses-edit-jadwal-pelajaran-2&id=<?= $id ?>" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Akademik</label>
                        <div class="col-sm-9">
                            <input type="text" name="tahun_akademik" value="<?= $GetTahunAkademik["nama_tahun"]; ?>" class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas" value="<?= $GetKelas["nama_kelas"]; ?> - <?= $GetJurusan["nama_jurusan"]; ?>" class="form-control form-control-sm" disabled>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Mata Pelajaran</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm" value="<?= $GetMPelajaran["nama_mata_pelajaran"]; ?>" disabled>
                        </div>
                        <div class="col-sm-6">
                            <select name="mata_pelajaran" id="mata_pelajaran" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="<?= $GetMPelajaran["id"]; ?>">Pilih...</option>
                                <?php
                                $no = 1;
                                $GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran_2");
                                foreach ($GetMataPelajaran as $mata_pelajaran) {
                                    $id_mata_pelajaran = $mata_pelajaran["id"];
                                    $GetMPelajaran = query("SELECT * FROM tb_jadwal_pelajaran_2 WHERE mata_pelajaran='$id_mata_pelajaran' AND kelas='$id_kelas' AND tahun_akademik='$id_tahun_akademik'")[0];
                                ?>
                                    <?php

                                    if (!empty($GetMPelajaran["mata_pelajaran"])) {
                                    ?>
                                        <option disabled value="<?= $mata_pelajaran["id"]; ?>"><?= $mata_pelajaran["nama_mata_pelajaran"]; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $mata_pelajaran["id"]; ?>"><?= $mata_pelajaran["nama_mata_pelajaran"]; ?></option>
                                    <?php } ?>



                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Guru Mata Pelajaran</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm" value="<?= $GetGuru["nama"]; ?>" disabled>
                        </div>
                        <div class="col-sm-6">
                            <select name="guru" id="guru" class="form-select form-select-sm" aria-label="Default select example">
                                <option value="<?= $GetGuru["id"]; ?>">Pilih...</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Jam Mulai Pelajaran</label>
                        <div class="col-sm-9">
                            <input name="jam_mulai" type="time" value="<?= $GetJadwalPelajaran["jam_mulai"]; ?>" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Jam Mulai Pelajaran</label>
                        <div class="col-sm-9">
                            <input name="jam_selesai" type="time" value="<?= $GetJadwalPelajaran["jam_selesai"]; ?>" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Hari</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm" value="<?= $GetJadwalPelajaran["hari"]; ?>" disabled>
                        </div>
                        <div class="col-sm-6">
                            <select name="hari" id="hari" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="<?= $GetJadwalPelajaran["hari"]; ?>">Pilih...</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jum'at">Jum'at</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-9">
                            <button type="submit" name="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>