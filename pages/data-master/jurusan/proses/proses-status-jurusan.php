<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];

$GetJurusan = query("SELECT * FROM tb_jurusan WHERE id='$id'")[0];

if ($GetJurusan["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_jurusan SET status = '0' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=jurusan&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=jurusan&pesan=gagal';
    	    	</script>";
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_jurusan SET status = '1' WHERE id='$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=jurusan&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=jurusan&pesan=gagal';
    	    	</script>";
    }
}
