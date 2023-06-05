<?php
$id_tahun_akademik = $_GET["id_tahun_akademik"];
$GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'")[0];

$id_kelas = $_GET["id_kelas"];
$GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'")[0];

$GetTahun = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'")[0];


$GetDataSiswa = query("SELECT * FROM tb_data_siswa WHERE nama_siswa='$id_user'")[0];
$id_tahun_akademik = $GetDataSiswa["tahun_akademik"];
$id_kelas = $GetDataSiswa["kelas"];


// $lama = 1; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 1 hari

// // proses untuk melakukan penghapusan data

$query = "DELETE FROM tb_transaksi_pembayaran WHERE transaction_status IN ('1', '2')";
$hasil = mysqli_query($koneksi, $query);
// var_dump($hasil);
// die;
?>
<div class="page-heading">
	<h3>Pembayaran</h3>
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
							<input type="text" name="act" value="tampil-pembayaran-siswa" hidden>
							<select name="id_tahun_akademik" class="form-select form-select-sm" aria-label="Default select example" required>
								<option value="">Pilih Tahun Akademik</option>
								<?php
								$no = 1;
								$GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$id_tahun_akademik'");
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
								$GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id_kelas'");
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
		<div class="card-body">
			<table class="table table-striped" id="table1">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Pembayaran</th>
						<th>Nominal</th>
						<th>Tanggal Bayar</th>
						<th>Metode Pembayaran</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$no = 1;
					$GetPembayaran = query("SELECT * FROM tb_pembayaran WHERE kelas='$id_kelas' AND tahun_akademik='$id_tahun_akademik'");
					foreach ($GetPembayaran as $pembayaran) {
						$id_pembayaran = $pembayaran["id"];
						$GetTrxPembayaran = query("SELECT * FROM tb_transaksi_pembayaran WHERE id_pembayaran='$id_pembayaran'")[0];
						
					?>

						<tr>
							<td><?= $no++; ?></td>
							<td><?= $pembayaran["nama_pembayaran"]; ?></td>
							<td>Rp.<?= number_format($pembayaran['nominal'], 0, ',', '.'); ?></td>
							<td>
								<?php

								if (!empty($GetTrxPembayaran["transaction_id"])) {
								?>
									<?= $GetTrxPembayaran["tanggal"] ?>
								<?php } else { ?>
									<b>Belum Melakukan Pembayaran</b>
								<?php } ?>
							</td>
							<td>
								<?php

								if (!empty($GetTrxPembayaran["transaction_id"])) {
								?>
									<?= $GetTrxPembayaran["metode_pembayaran"] ?>
								<?php } else { ?>
									<b>Belum Melakukan Pembayaran</b>
								<?php } ?>
							</td>
							<td>

								<form action="?pages=pembayaran&act=proses-pembayaran-siswa" method="post">
									<input type="text" name="id_pembayaran" value="<?= $pembayaran["id"]; ?>" hidden>
									<input type="text" name="nama_user" value="<?= $id_user ?>" hidden>
									<input type="text" name="nama_pembayaran" value="<?= $pembayaran["nama_pembayaran"]; ?>" hidden>
									<input type="text" name="nominal_pembayaran" value="<?= $pembayaran["nominal"]; ?>" hidden>
									

									<?php

								if (!empty($GetTrxPembayaran["transaction_id"])) {
								?>
									<span class="btn btn-sm btn-success"><i class="bi bi-check-circle-fill"></i></span>
								<?php } else { ?>
									<?php
									$today = date('Y-m-d');
									if ($pembayaran["tanggal_pembayaran"] < $today) { ?>
										<button type="submit" class="btn btn-sm btn-danger"> Bayar</button>
									<?php } else { ?>
										<span class="btn btn-sm btn-secondary"> Bayar</span>
									<?php } ?>
								<?php } ?>

								</form>

							</td>
						<?php } ?>
						</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>