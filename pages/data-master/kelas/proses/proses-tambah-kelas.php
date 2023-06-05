<?php
// require_once "../../../../env/connection.php";
// $tahun_akademik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_akademik"]));
$nama_kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_kelas"]));
$wali_kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["wali_kelas"]));
$jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jurusan"]));
$ruangan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["ruangan"]));
$tahun_akademik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_akademik"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_kelas VALUES ('','$nama_kelas','$wali_kelas','$jurusan','$ruangan','$tahun_akademik','1')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=kelas&act=tampil-kelas&id_tahun_akademik=$tahun_akademik&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=kelas&act=tampil-kelas&id_tahun_akademik=$tahun_akademik&pesan=gagal';
    	    	</script>";
}
