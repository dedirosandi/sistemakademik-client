<?php
// require_once "../../../../env/connection.php";
$id = $_GET["id"];
$nama_jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_jurusan"]));

$update = mysqli_query($koneksi, "UPDATE tb_jurusan SET nama_jurusan = '$nama_jurusan' WHERE id = '$id'");

if ($update) {
    echo "  <script>
    		    document.location.href='/?pages=jurusan&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='/?pages=jurusan&act=edit-jurusan&id=$id&pesan=gagal';
    	    	</script>";
}
