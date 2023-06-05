<?php
// require_once "../../../../env/connection.php";
$nama_kurikulum = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_kurikulum"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_kurikulum VALUES ('','$nama_kurikulum','1')");

if ($insert) {
	echo "  <script>
    		    document.location.href='/?pages=kurikulum&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=kurikulum&act=tambah-kurikulum&pesan=gagal';
    	    	</script>";
}
