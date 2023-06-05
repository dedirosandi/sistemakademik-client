<?php
// require_once "../../../../env/connection.php";
$kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kelas"]));
$mata_pelajaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["mata_pelajaran"]));
$tahun_akademik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_akademik"]));
$guru = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["guru"]));
$jam_mulai = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jam_mulai"]));
$jam_selesai = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jam_selesai"]));
$hari = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["hari"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_jadwal_pelajaran_2 VALUES ('','$kelas','$mata_pelajaran','$tahun_akademik','$guru','$jam_mulai','$jam_selesai','$hari')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=jadwal-pelajaran-2&act=tampil-jadwal-pelajaran-2&id_tahun_akademik=$tahun_akademik&id_kelas=$kelas&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=jadwal-pelajaran-2&act=tampil-jadwal-pelajaran-2&id_tahun_akademik=$tahun_akademik&id_kelas=$kelas&pesan=gagal';
    	    	</script>";
}
