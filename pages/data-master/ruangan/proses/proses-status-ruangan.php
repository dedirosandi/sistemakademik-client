<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetRuangan = query("SELECT * FROM tb_ruangan WHERE id='$id'")[0];

if ($GetRuangan["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_ruangan SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=ruangan&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=ruangan&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_ruangan SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=ruangan&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=ruangan&pesan=gagal';
    	    	</script>";
    }
}
