<?php
// require_once "../../../../env/connection.php";
$kode_gedung = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kode_gedung"]));
$nama_gedung = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_gedung"]));
$jumlah_lantai = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jumlah_lantai"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_gedung VALUES ('','$kode_gedung','$nama_gedung','$jumlah_lantai','1')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=gedung&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=gedung&act=tambah-gedung&pesan=gagal';
    	    	</script>";
}
