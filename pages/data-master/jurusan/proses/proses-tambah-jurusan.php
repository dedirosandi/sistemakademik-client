<?php
// require_once "../../../../env/connection.php";
$nama_jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_jurusan"]));

$insert = mysqli_query($koneksi, "INSERT INTO tb_jurusan VALUES ('','$nama_jurusan','1')");

if ($insert) {
    echo "  <script>
    		    document.location.href='/?pages=jurusan&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='/?pages=jurusan&act=tambah-jurusan&pesan=gagal';
    	    	</script>";
}
