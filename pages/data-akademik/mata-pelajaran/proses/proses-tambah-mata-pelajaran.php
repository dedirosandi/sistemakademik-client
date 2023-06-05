<?php
// require_once "../../../../env/connection.php";
$nama_mata_pelajaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_mata_pelajaran"]));
// $guru = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["guru"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_mata_pelajaran_2 VALUES ('','$nama_mata_pelajaran')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=mata-pelajaran&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=mata-pelajaran&act=tambah-mata-pelajaran&pesan=gagal';
    	    	</script>";
}
