<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
// $tahun_akademik = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tahun_akademik"]));
$nama_kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_kelas"]));
$wali_kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["wali_kelas"]));
$jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jurusan"]));
$ruangan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["ruangan"]));

$update = mysqli_query($koneksi, "UPDATE tb_kelas SET nama_kelas = '$nama_kelas', wali_kelas = '$wali_kelas', jurusan = '$jurusan', ruangan = '$ruangan' WHERE id = '$id'");

if ($update) {
	echo "  <script>
    		    document.location.href='/?pages=kelas&pesan=berhasil';
    	    	</script>";
} else {
	echo "  <script>
    		    document.location.href='/?pages=kelas&act=edit-kelas&id=$id&pesan=gagal';
    	    	</script>";
}
