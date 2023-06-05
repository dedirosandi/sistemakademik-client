<?php
include_once "env/page-session-admin.php";
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
    <?php } ?>

<?php
} ?>

<section class="section">
    <div class="card shadow">
        <div class="card-header">
            <h5>Tambah Jadwal Pelajaran</h5>
        </div>
        <div class="card-body">
            <form action="?pages=jadwal-pelajaran&act=proses-tambah-jadwal-pelajaran" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Nama Jadwal Pelajaran</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_jadwal_pelajaran" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Kelas</label>
                        <div class="col-sm-9">
                            <select name="id_kelas" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="">Pilih...</option>
                                <?php
                                $no = 1;
                                $GetKelas = query("SELECT * FROM tb_kelas WHERE status='1'");
                                foreach ($GetKelas as $kelas) {
                                ?>
                                    <option value="<?= $kelas["id"]; ?>"><?= $kelas["nama_kelas"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-9">
                            <button type="submit" name="submit" class="btn btn-success">Tambahkan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>