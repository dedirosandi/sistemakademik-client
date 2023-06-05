<?php
$nama_pembayaran = $_POST["nama_pembayaran"];
$tanggal_pembayaran = $_POST["tanggal_pembayaran"];
$nominal = $_POST["nominal"];
$kelas = $_POST["kelas"];
$tahun_akademik = $_POST["tahun_akademik"];

$total = count($nama_pembayaran);

for ($i = 0; $i < $total; $i++) {
	$nama_pembayaran[$i] = htmlspecialchars(mysqli_real_escape_string($koneksi, $nama_pembayaran[$i]));
	$tanggal_pembayaran[$i] = htmlspecialchars(mysqli_real_escape_string($koneksi, $tanggal_pembayaran[$i]));
	$nominal[$i] = htmlspecialchars(mysqli_real_escape_string($koneksi, $nominal[$i]));
	$insert = mysqli_query($koneksi, "INSERT INTO tb_pembayaran (nama_pembayaran, tanggal_pembayaran, nominal, kelas, tahun_akademik) VALUES ('$nama_pembayaran[$i]', '$tanggal_pembayaran[$i]', '$nominal[$i]', '$kelas', '$tahun_akademik')");
}

if ($insert) {
	echo "<script>
            document.location.href='/?pages=pembayaran&act=tampil-pembayaran&id_tahun_akademik=$tahun_akademik&id_kelas=$kelas&pesan=berhasil';
        </script>";
} else {
	echo "<script>
            document.location.href='/?pages=pembayaran&act=tampil-pembayaran&id_tahun_akademik=$tahun_akademik&id_kelas=$kelas&pesan=gagal';
        </script>";
}
