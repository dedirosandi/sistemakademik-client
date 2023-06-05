<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetJadwalPelajaran = query("SELECT * FROM tb_jadwal_pelajaran_2 WHERE id = '$id'")[0];
$id_kelas = $GetJadwalPelajaran["kelas"];
$id_tahun_akademik = $GetJadwalPelajaran["tahun_akademik"];

$mata_pelajaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["mata_pelajaran"]));
$guru = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["guru"]));
$jam_mulai = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jam_mulai"]));
$jam_selesai = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jam_selesai"]));
$hari = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["hari"]));

$update = mysqli_query($koneksi, "UPDATE tb_jadwal_pelajaran_2 SET mata_pelajaran = '$mata_pelajaran', guru = '$guru', jam_mulai = '$jam_mulai', jam_selesai = '$jam_selesai', hari = '$hari' WHERE id = '$id'");

if ($update) {
    echo "  <script>
    		    document.location.href='/?pages=jadwal-pelajaran-2&act=tampil-jadwal-pelajaran-2&id_tahun_akademik=$id_tahun_akademik&id_kelas=$id_kelas&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='/?pages=jadwal-pelajaran-2&act=tampil-jadwal-pelajaran-2&id_tahun_akademik=$id_tahun_akademik&id_kelas=$id_kelas&pesan=gagal';
    	    	</script>";
}
