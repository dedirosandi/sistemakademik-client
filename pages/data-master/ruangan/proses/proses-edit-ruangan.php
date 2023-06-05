<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$nama_gedung = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_gedung"]));
$nama_ruangan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_ruangan"]));
$kapasitas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["kapasitas"]));

$update = mysqli_query($koneksi, "UPDATE tb_ruangan SET nama_gedung = '$nama_gedung', nama_ruangan = '$nama_ruangan', kapasitas = '$kapasitas' WHERE id = '$id'");

if ($update) {
	echo "  <script>
    		    document.location.href='/?pages=ruangan&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=ruangan&act=edit-ruangan&id=$id&pesan=gagal';
    	    	</script>";
}
