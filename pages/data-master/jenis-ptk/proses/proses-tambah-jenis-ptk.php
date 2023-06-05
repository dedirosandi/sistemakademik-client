<?php
// require_once "../../../../env/connection.php";
$nama_ptk = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_ptk"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_jenis_ptk VALUES ('','$nama_ptk','1')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&act=tambah-jenis-ptk&pesan=gagal';
    	    	</script>";
}
