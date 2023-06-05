<div class="page-heading">
	<h3>Dokumen</h3>
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
			<a class="btn btn-success" href="?pages=dokumen&act=tambah-dokumen">Tambah Dokumen</a>
		</div>
		<div class="card-body">
			<table class="table table-striped" id="table1">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Dokumen</th>
						<th>Aksi</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$getDokumen = query("SELECT * FROM tb_dokumen");
					foreach ($getDokumen as $dokumen) {
					?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $dokumen["nama_dokumen"]; ?></td>
							<td>
								<a href="files/dokumen/<?= $dokumen['file_dokumen']; ?>" class="btn btn-sm btn-primary" download="">
									<i class="bi bi-download"></i>
								</a>
								<a href="?pages=dokumen&act=hapus-dokumen&id_dokumen=<?= $dokumen["id"]; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>