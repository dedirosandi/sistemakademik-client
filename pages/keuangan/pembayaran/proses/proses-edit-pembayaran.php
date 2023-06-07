<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id_pembayaran"];
$nama_pembayaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_pembayaran"]));
$tanggal_pembayaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tanggal_pembayaran"]));
$nominal = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nominal"]));

$update = mysqli_query($koneksi, "UPDATE tb_pembayaran SET nama_pembayaran = '$nama_pembayaran',tanggal_pembayaran = '$tanggal_pembayaran',nominal = '$nominal' WHERE id = '$id'");

if ($update) {
    echo "  <script>
    		    document.location.href='/?pages=pembayaran&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='/?pages=pembayaran&act=edit-pembayaran&id=$id&pesan=gagal';
    	    	</script>";
}
