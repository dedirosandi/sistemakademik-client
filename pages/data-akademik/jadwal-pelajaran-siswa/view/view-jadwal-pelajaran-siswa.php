<div class="page-heading">
    <h3>Pembayaran</h3>
</div>
<?php
$GetDataSiswa = query("SELECT * FROM tb_data WHERE id_siswa='$id_user'")[0];
$id_tahun_akademik = $GetDataSiswa["id_tahun_akademik"];
$id_kelas = $GetDataSiswa["id_kelas"];
include_once "env/page-session-siswa.php";
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
            <form action="" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            Pilih tahun akademik & Kelas
                        </div>
                        <div class="col-md-auto">
                            <input type="text" name="pages" value="jadwal-pelajaran-siswa" hidden>
                            <input type="text" name="act" value="tampil-jadwal-pelajaran-siswa" hidden>
                            <select name="id_tahun_akademik" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option selected value="">Pilih Tahun Akademik</option>
                                <?php
                                $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'");
                                foreach ($GetTahunAkademik as $tahun_akademik) {
                                ?>
                                    <option value="<?= $tahun_akademik["id"]; ?>"><?= $tahun_akademik["nama_tahun"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="id_kelas" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option selected value="">Pilih Kelas</option>
                                <?php
                                $GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'");
                                foreach ($GetKelas as $kelas) {
                                    $jurusan = $kelas["jurusan"];
                                    $GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];
                                ?>
                                    <option value="<?= $kelas["id"]; ?>"><?= $kelas["nama_kelas"]; ?> - <?= $GetJurusan["nama_jurusan"]; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-sm btn-success">Lihat</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>