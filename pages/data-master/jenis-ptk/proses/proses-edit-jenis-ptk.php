<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$nama_ptk = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_ptk"]));

$update = mysqli_query($koneksi, "UPDATE tb_jenis_ptk SET nama_ptk = '$nama_ptk' WHERE id = '$id'");

if ($update) {
	echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&act=edit-jenis-ptk&id=$id&pesan=gagal';
    	    	</script>";
}
