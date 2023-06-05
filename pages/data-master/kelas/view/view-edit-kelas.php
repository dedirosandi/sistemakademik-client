<?php
include_once "env/page-session-admin.php";
$id = $_GET["id"];
$GetKelas = query("SELECT * FROM tb_kelas WHERE id = '$id'")[0];
$wali_kelas = $GetKelas["wali_kelas"];
$jurusan = $GetKelas["jurusan"];
$ruangan = $GetKelas["ruangan"];
$tahun_akademik = $GetKelas["tahun_akademik"];
$TahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$tahun_akademik'")[0];
$GetWaliKelas = query("SELECT * FROM tb_user WHERE id='$wali_kelas'")[0];
$GetJurusanView = query("SELECT * FROM tb_jurusan WHERE id='$jurusan'")[0];
$GetRuangan = query("SELECT * FROM tb_ruangan WHERE id='$ruangan'");
$nama_gedung = $GetRuangan[0]["nama_gedung"];
$GetGedung = query("SELECT * FROM tb_gedung WHERE id='$nama_gedung'")[0];

$Check = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id = '$id'"));
if ($Check == 0) {
    echo "  <script>
    		    document.location.href='?pages=404';
    	    	</script>";
}
?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=kelas" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Kelas</li>
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
            <h5>Edit Data Kelas</h5>
        </div>
        <div class="card-body">
            <form action="?pages=kelas&act=proses-edit-kelas&id=<?= $GetKelas["id"]; ?>" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Nama Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_kelas" class="form-control form-control-sm" value="<?= $GetKelas["nama_kelas"]; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Wali Kelas</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm" value="<?= $GetWaliKelas["nama"]; ?>" disabled>
                        </div>
                        <div class="col-sm-6">
                            <select name="wali_kelas" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="<?= $GetKelas["wali_kelas"]; ?>">Pilih...</option>
                                <?php
                                $no = 1;
                                $GetGuru = query("SELECT * FROM tb_user WHERE status='1' AND role='guru'");
                                foreach ($GetGuru as $guru) {
                                ?>
                                    <option value="<?= $guru["id"]; ?>"><?= $guru["nama"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Jurusan</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm" value="<?= $GetJurusanView["nama_jurusan"]; ?>" disabled>
                        </div>
                        <div class="col-sm-6">
                            <select name="jurusan" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="<?= $GetKelas["jurusan"]; ?>">Pilih...</option>
                                <?php
                                $no = 1;
                                $GetJurusan = query("SELECT * FROM tb_jurusan WHERE status='1'");
                                foreach ($GetJurusan as $jurusan) {
                                ?>
                                    <option value="<?= $jurusan["id"]; ?>"><?= $jurusan["nama_jurusan"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Ruangan</label>
                        <div class="col-sm-3">
                            <input class="form-control form-control-sm" value="<?= $GetRuangan[0]["nama_ruangan"]; ?>" disabled>
                        </div>
                        <div class=" col-sm-6">
                            <select name="ruangan" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="<?= $GetKelas["ruangan"]; ?>">Pilih...</option>
                                <?php
                                $no = 1;
                                $GetRuangan = query("SELECT * FROM tb_ruangan WHERE status='1'");
                                foreach ($GetRuangan as $ruangan) {
                                    $id_gedung = $ruangan["nama_gedung"];
                                    $GetGedung = query("SELECT * FROM tb_gedung WHERE id='$id_gedung'")[0];
                                ?>
                                    <option value="<?= $ruangan["id"]; ?>"><?= $ruangan["nama_ruangan"]; ?> - <?= $GetGedung["nama_gedung"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-9">
                            <button type="submit" name="submit" class="btn btn-success">Edit Proses</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>