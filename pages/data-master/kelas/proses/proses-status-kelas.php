<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetKelas = query("SELECT * FROM tb_kelas WHERE id='$id'")[0];

if ($GetKelas["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_kelas SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=kelas&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=kelas&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_kelas SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=kelas&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=kelas&pesan=gagal';
    	    	</script>";
    }
}
