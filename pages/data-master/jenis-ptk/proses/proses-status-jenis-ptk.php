<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetJenisPtk = query("SELECT * FROM tb_jenis_ptk WHERE id='$id'")[0];

if ($GetJenisPtk["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_jenis_ptk SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_jenis_ptk SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=jenis-ptk&pesan=gagal';
    	    	</script>";
    }
}
