<?php
require_once "../../../env/connection.php";

$nama = htmlspecialchars($_POST["nama"]);
$email = mysqli_escape_string($koneksi, $_POST["email"]);
$role = mysqli_escape_string($koneksi, $_POST["role"]);
$password = htmlspecialchars(mysqli_escape_string($koneksi, $_POST["password"]));
$data = mysqli_query($koneksi, "SELECT email FROM tb_user WHERE email = '$email'");
if (mysqli_fetch_assoc($data)) {
    header("location:/?pages=akun-pengelola&pesan=terdaftar");
    return false;
}
$password = password_hash($password, PASSWORD_DEFAULT);

$insert = mysqli_query($koneksi, "INSERT INTO tb_user (nama, email, password,role) VALUES ('$nama', '$email', '$password','$role')");
if ($insert) {
    header("location:/?pages=akun-pengelola&pesan=berhasil");
} else {
    header("location:/?pages=akun-pengelola&pesan=gagal");
}
