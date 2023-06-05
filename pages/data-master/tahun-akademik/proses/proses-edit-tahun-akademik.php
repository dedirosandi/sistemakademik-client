<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$tahun = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun"]));
$nama_tahun = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_tahun"]));

$update = mysqli_query($koneksi, "UPDATE tb_tahun_akademik SET tahun = '$tahun', nama_tahun = '$nama_tahun' WHERE id = '$id'");

if ($update) {
	echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&act=edit-tahun-akademik&id=$id&pesan=gagal';
    	    	</script>";
}
