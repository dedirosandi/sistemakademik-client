<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetGedung = query("SELECT * FROM tb_gedung WHERE id='$id'")[0];

if ($GetGedung["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_gedung SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=gedung&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=gedung&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_gedung SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=gedung&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=gedung&pesan=gagal';
    	    	</script>";
    }
}
