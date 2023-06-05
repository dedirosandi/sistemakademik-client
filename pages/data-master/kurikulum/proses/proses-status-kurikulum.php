<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetKurikulum = query("SELECT * FROM tb_kurikulum WHERE id='$id'")[0];

if ($GetKurikulum["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_kurikulum SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=kurikulum&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=kurikulum&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_kurikulum SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=kurikulum&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=kurikulum&pesan=gagal';
    	    	</script>";
    }
}
