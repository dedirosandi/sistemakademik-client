<div class="page-heading">
    <h3>Jadwal Pelajaran</h3>
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
            <a class="btn btn-success" href="?pages=jadwal-pelajaran&act=tambah-jadwal-pelajaran">Tambah Jadwal Pelajaran</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Jadwal Pelajaran</th>
                        <th>Kelas</th>
                        <th>Total Guru</th>
                        <th>Jadwal Submit</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetJadwalPelajaran = query("SELECT * FROM tb_jadwal_pelajaran");
                    foreach ($GetJadwalPelajaran as $jadwal_pelajaran) {
                        $id_kelas = $jadwal_pelajaran["id_kelas"];
                        $id_jadwal_pelajaran = $jadwal_pelajaran["id"];
                        $GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran WHERE id_jadwal_pelajaran='$id_jadwal_pelajaran'")[0];
                        $GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'")[0];
                        $GetCountGuru = query("SELECT COUNT(id) AS TotalGuru FROM tb_guru_pelajaran WHERE id_jadwal_pelajaran='$id_jadwal_pelajaran'")[0];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $jadwal_pelajaran["nama_jadwal_pelajaran"]; ?></td>
                            <td><?= $GetKelas["nama_kelas"]; ?></td>
                            <td><?= $GetCountGuru["TotalGuru"]; ?> Guru</td>
                            <td>
                                <?php
                                if (!empty($GetMataPelajaran["id_jadwal_pelajaran"])) {
                                ?>
                                    <span class="badge bg-success">Submited</span>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Unsubmited</span>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="?pages=jadwal-pelajaran&act=detail-jadwal-pelajaran&id=<?= $jadwal_pelajaran["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>