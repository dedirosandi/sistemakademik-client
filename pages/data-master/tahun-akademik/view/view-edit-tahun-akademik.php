<?php
include_once "env/page-session-admin.php";
$id = $_GET["id"];
$GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id = '$id'")[0];

$Check = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_tahun_akademik WHERE id = '$id'"));
if ($Check == 0) {
    echo "  <script>
    		    document.location.href='?pages=404';
    	    	</script>";
}

?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=tahun-akademik" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Tahun Akademik</li>
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
            <h5>Tambah Data Tahun Akademik</h5>
        </div>
        <div class="card-body">
            <form action="?pages=tahun-akademik&act=proses-edit-tahun-akademik&id=<?= $GetTahunAkademik["id"]; ?>" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Tahun</label>
                        <div class="col-sm-9">
                            <input type="text" name="tahun" class="form-control form-control-sm" value="<?= $GetTahunAkademik["tahun"]; ?>" readonly required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Nama Tahun</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_tahun" class="form-control form-control-sm" value="<?= $GetTahunAkademik["nama_tahun"]; ?>" required>
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