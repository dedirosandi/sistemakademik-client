<div class="page-heading">
    <h3>Data Siswa</h3>
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
                            <!-- <a href="?pages=pembayaran&act=tambah-pembayaran-multiple" class="btn btn-sm btn-success">Tambah Pembayaran Multiple</a> -->
                            <h5><i class="bi bi-funnel-fill"></i> Pilih Untuk tampilkan</h5>
                        </div>

                        <div class="col-3">
                            <input type="text" name="pages" value="siswa" hidden>
                            <input type="text" name="act" value="tampil-siswa" hidden>
                            <select name="tahun_masuk" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option selected value="">Pilih Tahun Masuk</option>
                                <?php
                                $no = 1;
                                $GetTahunMasuk = query("SELECT * FROM tb_info_siswa");
                                foreach ($GetTahunMasuk as $tahun_masuk) {
                                ?>
                                    <option value="<?= $tahun_masuk["tahun_masuk"]; ?>"><?= $tahun_masuk["tahun_masuk"]; ?></option>
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
        <div class="card-header">
            <a class="btn btn-success" href="?pages=siswa&act=tambah-siswa">Tambah Siswa</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIPD</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tahun Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tahun_masuk = $_GET["tahun_masuk"];
                    $no = 1;
                    $GetSiswa = query("SELECT * FROM tb_info_siswa WHERE tahun_masuk='$tahun_masuk'");
                    foreach ($GetSiswa as $siswa) {
                        $id_siswa = $siswa["id_user"];
                        $GetAkun = query("SELECT * FROM tb_user WHERE id='$id_siswa'")[0];
                        // $jurusan = $GetInfoSiswa["jurusan"];
                        // $kelas = $GetInfoSiswa["kelas"];
                        // $GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];
                        // $GetKelas = query("SELECT * FROM tb_kelas WHERE id='$kelas'")[0];
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $GetAkun["username"]; ?></td>
                            <td><?= $siswa["nisn"]; ?></td>
                            <td><?= $GetAkun["nama"]; ?></td>
                            <td><?= $siswa["tahun_masuk"]; ?></td>
                            <td>
                                <?php if ($GetAkun["status"] == "1") { ?>
                                    <a href="?pages=siswa&act=status-siswa&id=<?= $GetAkun["id"]; ?>" class="btn btn-sm btn-success"><i class="bi bi-person-check"></i></a>
                                <?php } elseif ($GetAkun["status"] == "0") { ?>
                                    <a href="?pages=siswa&act=status-siswa&id=<?= $GetAkun["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-person-x"></i></a>
                                <?php } ?>
                                <a href="?pages=siswa&act=detail-siswa&id=<?= $siswa["id"]; ?>" class="btn btn-sm btn-info"><i class="bi bi-search"></i></a>
                                <a href="?pages=siswa&act=edit-siswa&id=<?= $siswa["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>