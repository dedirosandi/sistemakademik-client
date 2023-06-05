<?php
$id_mata_pelajaran = $_GET["id_mata_pelajaran"];
$id_guru = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["id_guru"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_guru_pelajaran_2 VALUES ('','$id_guru','$id_mata_pelajaran')");

if ($insert) {
    echo "  <script>
    		    document.location.href='?pages=mata-pelajaran&act=detail-mata-pelajaran&id=$id_mata_pelajaran&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='?pages=mata-pelajaran&act=detail-mata-pelajaran&id=$id_mata_pelajaran&pesan=gagal';
    	    	</script>";
}
