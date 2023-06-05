<?php
include_once "env/page-session-admin.php";
$id = $_GET["id"];
$GetJadwalPelajaran = query("SELECT * FROM tb_jadwal_pelajaran_2 WHERE id = '$id'")[0];
$id_mata_pelajaran = $GetJadwalPelajaran["mata_pelajaran"];

$id_guru = $GetJadwalPelajaran["guru"];
$GetInfoGuru = query("SELECT * FROM tb_info_guru WHERE id_user='$id_guru'")[0];
$GetGuru = query("SELECT * FROM tb_user WHERE id='$id_guru'")[0];

$GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran_2 WHERE id='$id_mata_pelajaran'")[0];

$id_kelas = $GetJadwalPelajaran["kelas"];
$GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'")[0];

$id_ruang = $GetKelas["ruangan"];
$GetRuang = query("SELECT * FROM tb_ruangan WHERE id='$id_ruang'")[0];

$id_gedung = $GetRuang["nama_gedung"];
$GetGedung = query("SELECT * FROM tb_gedung WHERE id='$id_gedung'")[0];

$id_tahun_akademik = $GetKelas["tahun_akademik"];
$GetTahun = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'")[0];
?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=jadwal-pelajaran-2" class="btn btn-success"> Kembali</a>
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
<section class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="font-bold"><?= $GetTahun["nama_tahun"]; ?></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card shadow" style="height: 10rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted font-semibold">Info Kelas</h6>
                                <h6 class="font-semibold mb-0">Nama Kelas : <?= $GetKelas["nama_kelas"]; ?></h6>
                                <h6 class="font-semibold mb-0">Ruang : <?= $GetRuang["nama_ruangan"]; ?></h6>
                                <h6 class="font-semibold mb-0">Gedung : <?= $GetGedung["nama_gedung"]; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow" style="height: 10rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted font-semibold">Info Mata Pelajaran</h6>
                                <h6 class="font-semibold mb-0">Mata Pelajaran : <?= $GetMataPelajaran["nama_mata_pelajaran"]; ?></h6>
                                <h6 class="font-semibold mb-0">Hari : <?= $GetJadwalPelajaran["hari"]; ?></h6>
                                <h6 class="font-semibold mb-0">Jam Mulai : <?= $GetJadwalPelajaran["jam_mulai"]; ?></h6>
                                <h6 class="font-semibold mb-0">Jam Selesai : <?= $GetJadwalPelajaran["jam_selesai"]; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card shadow" style="height: 10rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-muted font-semibold">Info Guru</h6>
                                <h6 class="font-semibold mb-0">Nama Guru : <?= $GetGuru["nama"]; ?></h6>
                                <h6 class="font-semibold mb-0">NIP : <?= $GetGuru["username"]; ?></h6>
                                <h6 class="font-semibold mb-0">No HP : <?= $GetInfoGuru["no_hp"]; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <!--  -->
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Siswa/Sisswi</th>
                        <th>NIK</th>
                        <th>Nomor Hp</th>

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



    </div>
</section>