<?php
// require_once "../../../../env/connection.php";
$tahun = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun"]));
$nama_tahun = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_tahun"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_tahun_akademik VALUES ('','$tahun','$nama_tahun','1')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&act=tambah-tahun-akademik&pesan=gagal';
    	    	</script>";
}
