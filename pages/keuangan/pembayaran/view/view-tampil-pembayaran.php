<?php
$id_tahun_akademik = $_GET["id_tahun_akademik"];
$GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'")[0];

$id_kelas = $_GET["id_kelas"];
$GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'")[0];

$GetTahun = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'")[0];
?>
<div class="page-heading">
    <a class="btn btn-sm btn-success" href="?pages=pembayaran">Kembali</a>
</div>
<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <form action="" method="get">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <?= $GetTahunAkademik["nama_tahun"]; ?> - <?= $GetKelas["nama_kelas"]; ?>
                        </div>

                        <div class="col-md-auto">
                            <input type="text" name="pages" value="pembayaran" hidden>
                            <input type="text" name="act" value="tampil-pembayaran" hidden>
                            <select name="id_tahun_akademik" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option value="">Pilih Tahun Akademik</option>
                                <?php
                                $no = 1;
                                $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik");
                                foreach ($GetTahunAkademik as $tahun_akademik) {
                                ?>
                                    <option value="<?= $tahun_akademik["id"]; ?>" <?php if ($tahun_akademik["id"] == "$id_tahun_akademik") { ?> selected <?php } else { ?> <?php } ?>><?= $tahun_akademik["nama_tahun"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="id_kelas" class="form-select form-select-sm" aria-label="Default select example" required>
                                <option value="">Pilih Kelas</option>
                                <?php

                                $no = 1;
                                $GetKelas = query("SELECT * FROM tb_kelas");
                                foreach ($GetKelas as $kelas) {
                                    $jurusan = $kelas["jurusan"];
                                    $GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];
                                ?>
                                    <option value="<?= $kelas["id"]; ?>" <?php if ($kelas["id"] == "$id_kelas") { ?> selected <?php } else { ?> <?php } ?>><?= $kelas["nama_kelas"]; ?> - <?= $GetJurusan["nama_jurusan"]; ?></option>
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
            <a class="btn btn-sm btn-success" href="?pages=pembayaran&act=tambah-pembayaran&id_tahun_akademik=<?= $id_tahun_akademik ?>&id_kelas=<?= $id_kelas ?>">Tambah Pembayaran</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pembayaran</th>
                        <th>Nominal</th>
                        <th>Kelas</th>
                        <th>Tahun Akademik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    $GetPembayaran = query("SELECT * FROM tb_pembayaran WHERE kelas='$id_kelas' AND tahun_akademik='$id_tahun_akademik'");
                    foreach ($GetPembayaran as $pembayaran) {
                        $nama_kelas = $pembayaran["kelas"];
                        $GetNamaKelas = query("SELECT * FROM tb_kelas WHERE id='$nama_kelas'")[0];

                        $nama_tahun = $pembayaran["tahun_akademik"];
                        $GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$nama_tahun'")[0];

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pembayaran["nama_pembayaran"]; ?></td>
                            <td><?= $pembayaran["nominal"]; ?></td>
                            <td><?= $GetNamaKelas["nama_kelas"]; ?></td>
                            <td><?= $GetTahunAkademik["nama_tahun"]; ?></td>
                            <td>
                                <a href="?pages=pembayaran&act=edit-pembayaran&id=<?= $pembayaran["id"]; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="?pages=pembayaran&act=proses-hapus-pembayaran&id=<?= $pembayaran["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>