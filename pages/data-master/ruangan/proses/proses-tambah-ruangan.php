<?php
// require_once "../../../../env/connection.php";
$kode_ruangan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kode_ruangan"]));
$nama_gedung = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_gedung"]));
$nama_ruangan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_ruangan"]));
$kapasitas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kapasitas"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_ruangan VALUES ('','$kode_ruangan','$nama_gedung','$nama_ruangan','$kapasitas','1')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=ruangan&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=ruangan&act=tambah-ruangan&pesan=gagal';
    	    	</script>";
}
