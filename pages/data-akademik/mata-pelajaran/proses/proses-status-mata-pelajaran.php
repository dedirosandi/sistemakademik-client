<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetMataPelajaran = query("SELECT * FROM tb_mata_pelajaran WHERE id='$id'")[0];

if ($GetMataPelajaran["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_mata_pelajaran SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=mata-pelajaran&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=mata-pelajaran&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_mata_pelajaran SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=mata-pelajaran&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=mata-pelajaran&pesan=gagal';
    	    	</script>";
    }
}
