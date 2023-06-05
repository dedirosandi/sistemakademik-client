<?php
// require_once "../../../../env/connection.php";
$nama_jadwal_pelajaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_jadwal_pelajaran"]));
$id_kelas = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["id_kelas"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_jadwal_pelajaran VALUES ('','$nama_jadwal_pelajaran','$id_kelas')");

if ($insert) {
    echo "  <script>
    		    document.location.href='/?pages=jadwal-pelajaran&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='/?pages=jadwal-pelajaran&act=tambah-jadwal-pelajaran&pesan=gagal';
    	    	</script>";
}
