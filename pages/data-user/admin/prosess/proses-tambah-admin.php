<?php
// require_once "../../../../env/connection.php";
$nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));
$username = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["username"]));
$password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password"]));
$password = password_hash($password, PASSWORD_DEFAULT);

$Cek = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$username'");
if (mysqli_fetch_assoc($Cek)) {
    echo "  <script>
    		    document.location.href='/?pages=admin&pesan=coba-lagi';
    	    	</script>";
    return false;
}


$query = mysqli_query($koneksi, "SELECT max(id) as kodeTerbesar FROM tb_user WHERE role='admin'");
$data = mysqli_fetch_array($query);
$userid = $data['kodeTerbesar'];
$urutan = (int) substr($userid, 3, 3);
$urutan++;
$huruf = "A";
$userid = $huruf . sprintf("%03s", $urutan);

$insert = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$userid','$nama','$username','$password','admin','1')");

if ($insert) {
    echo "  <script>
            document.location.href='/?pages=admin&pesan=berhasil';
            </script>";
} else {
    echo "  <script>
            document.location.href='/?pages=admin&act=tambah-admin';
            </script>";
}
