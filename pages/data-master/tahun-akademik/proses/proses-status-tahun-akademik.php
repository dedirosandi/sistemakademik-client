<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetTahunAkademik = query("SELECT * FROM tb_tahun_akademik WHERE id='$id'")[0];

if ($GetTahunAkademik["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_tahun_akademik SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_tahun_akademik SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=tahun-akademik&pesan=gagal';
    	    	</script>";
    }
}
