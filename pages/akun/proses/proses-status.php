<?php
require_once "../../../env/connection.php";
$id = $_GET["id"];

$GetAkun = query("SELECT * FROM tb_user WHERE id='$id'")[0];

if ($GetAkun["status"] == '1') {
    $update = mysqli_query($koneksi, "UPDATE tb_user SET status = '0' WHERE id = '$id'");

    if ($update) {
        header("location:/?pages=akun-pengelola&pesan=berhasil");
    } else {
        header("location:/?pages=akun-pengelola&pesan=gagal");
    }
} else {
    $update = mysqli_query($koneksi, "UPDATE tb_user SET status = '1' WHERE id = '$id'");

    if ($update) {
        header("location:/?pages=akun-pengelola&pesan=berhasil");
    } else {
        header("location:/?pages=akun-pengelola&pesan=gagal");
    }
}
