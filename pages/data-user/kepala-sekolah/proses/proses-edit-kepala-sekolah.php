<?php
$id = $_GET["id_kepala_sekolah"];
$nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));
$username = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["username"]));
$password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password"]));
$password = password_hash($password, PASSWORD_DEFAULT);

if ($password == "") {
    $update = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$nama', username = '$username' WHERE id = '$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=kepala-sekolah&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=kepala-sekolah&act=edit-kepala-sekolah&id_kepala_sekolah=$id';
    	    	</script>";
    }
    return false;
} else {

    $update = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$nama', username = '$username', password = '$password' WHERE id = '$id'");

    if ($update) {
        echo "  <script>
    		    document.location.href='/?pages=kepala-sekolah&pesan=berhasil';
    	    	</script>";
    } else {
        echo "  <script>
    		    document.location.href='/?pages=kepala-sekolah&act=edit-kepala-sekolah&id_kepala_sekolah=$id';
    	    	</script>";
    }
    return false;
}
