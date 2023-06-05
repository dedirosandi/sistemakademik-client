<?php
include_once "env/page-session-admin.php";
$id = $_GET["id_kepala_sekolah"];
$GetKepsek = query("SELECT * FROM tb_user WHERE role='kepsek' AND id='$id'")[0];

?>
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="?pages=admin" class="btn btn-success"> Kembali</a>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Data Kepala Sekolah</li>
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
            <h5>Tambah Data Kepala Sekolah</h5>
        </div>
        <div class="card-body">
            <form action="?pages=kepala-sekolah&act=proses-edit-kepala-sekolah&id_kepala_sekolah=<?= $GetKepsek["id"]; ?>" method="post">
                <div class="col-lg-12">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Nama Kepala Sekolah</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control form-control-sm" value="<?= $GetKepsek["nama"]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Username Kepala Sekolah</label>
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control form-control-sm" value="<?= $GetKepsek["username"]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label col-form-label-sm">Password Kepala Sekolah</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control form-control-sm">
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