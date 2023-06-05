<?php
include_once "env/page-session-admin.php";
$dataSiswa = query("SELECT * FROM tb_user WHERE role = 'guru' ORDER BY nama ASC");
?>
<div class="page-title mb-3">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<a href="?pages=dokumen" class="btn btn-success"> Kembali</a>
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Dokumen</a></li>
					<li class="breadcrumb-item active" aria-current="page">Tambah Dokumen</li>
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
			<h5>Tambah Dokumen</h5>
		</div>
		<div class="card-body">
			<form action="?pages=dokumen&act=proses-tambah-dokumen" enctype="multipart/form-data" method="post">
				<div class="col-lg-12">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label col-form-label-sm">Nama File</label>
						<div class="col-sm-9">
							<input type="text" name="nama_file" class="form-control form-control-sm" required>
						</div>
					</div>

					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label col-form-label-sm">Upload File</label>
						<div class="col-sm-9">
							<input type="file" name="file_dokumen" class="form-control form-control-sm" required>
						</div>
					</div>

					<!-- <div class="mb-3 row">
						<label class="col-sm-3 col-form-label col-form-label-sm"></label>
						<div class="col-sm-9">
							<button type="button" id="kirim" class="btn btn-sm btn-primary">Kirim Ke</button>
							<button type="button" id="clear-select" class="btn btn-sm btn-warning">Clear</button>
						</div>
					</div> -->


					<!-- <div class="mb-3 row">
						<label class="col-sm-3 col-form-label col-form-label-sm">Kirim Ke</label>
						<div class="col-sm-9">
							<select name="id_siswa[]" id="select-siswa" class="form-select form-select-sm" multiple>
								<option value="semua" selected>Semua Siswa</option>
								<?php foreach ($dataSiswa as $row) : ?>
									<option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div> -->

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