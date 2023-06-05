<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$nama_gedung = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_gedung"]));
$jumlah_lantai = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jumlah_lantai"]));

$update = mysqli_query($koneksi, "UPDATE tb_gedung SET nama_gedung = '$nama_gedung', jumlah_lantai = '$jumlah_lantai' WHERE id = '$id'");

if ($update) {
	echo "  <script>
    		    document.location.href='/?pages=gedung&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=gedung&act=edit-gedung&id=$id&pesan=gagal';
    	    	</script>";
}
