<?php
include_once "env/page-session-admin.php";
$id = $_GET["id"];
$GetRuangan = query("SELECT * FROM tb_ruangan WHERE id = '$id'")[0];
$id_gedung = $GetRuangan["nama_gedung"];
$GetGedung = query("SELECT * FROM tb_gedung WHERE id='$id_gedung'")[0];


$Check = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_ruangan WHERE id = '$id'"));
if ($Check == 0) {
    echo "  <script>
    		    document.location.href='?pages=404';
    	    	</script>";
}
?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=ruangan" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Ruangan</li>
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
            <h5>Tambah Data Ruangan</h5>
        </div>
        <div class="card-body">
            <form action="?pages=ruangan&act=proses-edit-ruangan&id=<?= $GetRuangan["id"]; ?>" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm fw-bold">Kode Ruangan</label>
                        <div class="col-sm-9">
                            <input type="text" name="kode_ruangan" class="form-control form-control-sm" value="<?= $GetRuangan["kode_ruangan"]; ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Nama Gedung</label>
                        <div class="col-sm-9">
                            <select name="nama_gedung" class="form-select form-select-sm" aria-label="Default select example">
                                <option selected value="<?= $GetGedung["id"]; ?>">Pilihan Sekarang <?= $GetGedung["nama_gedung"]; ?></option>
                                <?php
                                $no = 1;
                                $GetGedung = query("SELECT * FROM tb_gedung WHERE status='1'");
                                foreach ($GetGedung as $gedung) {
                                ?>
                                    <option value="<?= $gedung["id"]; ?>"><?= $gedung["nama_gedung"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Nama Ruangan</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_ruangan" class="form-control form-control-sm" value="<?= $GetRuangan["nama_ruangan"]; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Kapasitas</label>
                        <div class="col-sm-9">
                            <input type="text" name="kapasitas" class="form-control form-control-sm" value="<?= $GetRuangan["kapasitas"]; ?>" required>
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