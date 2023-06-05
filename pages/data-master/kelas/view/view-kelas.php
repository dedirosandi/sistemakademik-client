<div class="page-heading">
    <h3>Kelas</h3>
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
            <form action="" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            Pilih tahun akademik
                        </div>
                        <div class="col-md-auto">
                            <input type="text" name="pages" value="kelas" hidden>
                            <input type="text" name="act" value="tampil-kelas" hidden>
                            <select name="id_tahun_akademik" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option selected value="">Pilih Tahun Akademik</option>
                                <?php
                                $no = 1;
                                $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik");
                                foreach ($GetTahunAkademik as $tahun_akademik) {
                                ?>
                                    <option value="<?= $tahun_akademik["id"]; ?>"><?= $tahun_akademik["nama_tahun"]; ?></option>
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

<section class="section">
    <div class="card shadow">

        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Jurusan</th>
                        <th>Ruangan</th>
                        <th>Gedung</th>
                        <th>Jumlah Siswa</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $GetKelas = query("SELECT * FROM tb_kelas");
                    foreach ($GetKelas as $kelas) {
                        $wali_kelas = $kelas["wali_kelas"];
                        $jurusan = $kelas["jurusan"];
                        $ruangan = $kelas["ruangan"];
                        $GetWaliKelas = query("SELECT * FROM tb_user WHERE id='$wali_kelas'")[0];
                        $GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];
                        $GetRuangan = query("SELECT * FROM tb_ruangan WHERE id='$ruangan'");
                        $nama_gedung = $GetRuangan[0]["nama_gedung"];
                        $GetGedung = query("SELECT * FROM tb_gedung WHERE id='$nama_gedung'")[0];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kelas["nama_kelas"]; ?></td>
                            <td>
                                <?php
                                if (!empty($GetWaliKelas["id"])) {
                                ?>
                                    <?= $GetWaliKelas["nama"]; ?>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Kosong</span>
                                <?php } ?>

                            </td>
                            <td>
                                <?php
                                if (!empty($GetJurusan["id"])) {
                                ?>
                                    <?= $GetJurusan["nama_jurusan"]; ?>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Kosong</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($GetRuangan[0]["id"])) {
                                ?>
                                    <?= $GetRuangan[0]["nama_ruangan"]; ?>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Kosong</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($GetGedung["id"])) {
                                ?>
                                    <?= $GetGedung["nama_gedung"]; ?>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Kosong</span>
                                <?php } ?>
                            </td>
                            <td>*</td>
                            <td>
                                <?php if ($kelas["status"] == "1") { ?>
                                    <a href="?pages=kelas&act=status-kelas&id=<?= $kelas["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></a>
                                <?php } elseif ($kelas["status"] == "0") { ?>
                                    <a href="?pages=kelas&act=status-kelas&id=<?= $kelas["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-eye-slash-fill"></i></a>
                                <?php } ?>
                                <a href="?pages=kelas&act=edit-kelas&id=<?= $kelas["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=kelas&act=proses-hapus-kelas&id=<?= $kelas["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>