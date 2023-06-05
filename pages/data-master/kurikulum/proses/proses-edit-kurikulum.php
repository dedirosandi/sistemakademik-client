<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$nama_kurikulum = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_kurikulum"]));

$update = mysqli_query($koneksi, "UPDATE tb_kurikulum SET nama_kurikulum = '$nama_kurikulum' WHERE id = '$id'");

if ($update) {
	echo "  <script>
    		    document.location.href='/?pages=kurikulum&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=kurikulum&act=edit-kurikulum&id=$id&pesan=gagal';
    	    	</script>";
}
