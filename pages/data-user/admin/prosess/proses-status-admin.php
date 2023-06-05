<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetUser = query("SELECT * FROM tb_user WHERE id='$id'")[0];

if ($GetUser["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_user SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=admin&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=admin&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_user SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=admin&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=admin&pesan=gagal';
    	    	</script>";
    }
}
