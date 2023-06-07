<?php
$id_pembayaran = $_GET["id_pembayaran"];
$GetPembayaran = query("SELECT * FROM tb_pembayaran WHERE id='$id_pembayaran'")[0];

$id_tahun_akademik = $_GET["id_tahun_akademik"];
$GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'")[0];

$id_kelas = $_GET["id_kelas"];
$GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'")[0];

$jurusan = $GetKelas["jurusan"];
$GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];

include_once "env/page-session-admin.php";
?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=pembayaran&act=tampil-pembayaran&id_tahun_akademik=<?= $id_tahun_akademik ?>&id_kelas=<?= $id_kelas ?>" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Pembayaran</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Pembayaran</li>
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
            <h5>Tambah Pembayaran</h5>
        </div>
        <div class="card-body">
            <form action="?pages=pembayaran&act=proses-edit-pembayaran&id_pembayaran=<?= $id_pembayaran ?>" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Tahun Akademik</label>
                        <div class="col-sm-9">
                            <input type="text" name="tahun_akademik" value="<?= $GetTahunAkademik["nama_tahun"]; ?>" class="form-control form-control-sm" disabled>
                            <input type="text" name="tahun_akademik" value="<?= $id_tahun_akademik ?>" class="form-control form-control-sm" hidden>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kelas" value="<?= $GetKelas["nama_kelas"]; ?> - <?= $GetJurusan["nama_jurusan"]; ?>" class="form-control form-control-sm" disabled>
                            <input type="text" name="kelas" value="<?= $id_kelas ?>" class="form-control form-control-sm" hidden>
                        </div>
                    </div>

                    <div class="add-after-more">
                        <div class="grouping-add">
                            <div class="mb-3 row">
                                <label class="col-3 col-form-label col-form-label-sm">Pembayaran</label>
                                <div class="col-3">
                                    <input type="text" name="nama_pembayaran" value="<?= $GetPembayaran["nama_pembayaran"]; ?>" class="form-control form-control-sm" placeholder="Nama Pembayaran" required>
                                </div>
                                <div class="col-3">
                                    <input type="number" name="nominal" value="<?= $GetPembayaran["nominal"]; ?>" class="form-control form-control-sm" placeholder="Nominal Pembayaran" required>
                                </div>
                                <div class="col-3">
                                    <input type="date" name="tanggal_pembayaran" value="<?= $GetPembayaran["tanggal_pembayaran"]; ?>" class="form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-9">
                            <button type="submit" name="submit" class="btn btn-success">Proses Edit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>