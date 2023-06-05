<?php
// require_once "../../../../env/connection.php";
$id_jadwal_pelajaran = $_GET["id_jadwal_pelajaran"];
$id_user = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["id_user"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_guru_pelajaran VALUES ('','$id_user','$id_jadwal_pelajaran')");

if ($insert) {
    echo "  <script>
    		    document.location.href='?pages=jadwal-pelajaran&act=detail-jadwal-pelajaran&id=$id_jadwal_pelajaran&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='?pages=jadwal-pelajaran&act=detail-jadwal-pelajaran&id=$id_jadwal_pelajaran&pesan=gagal';
    	    	</script>";
}
