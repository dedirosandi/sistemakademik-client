<?php
session_start();
if ($_SESSION["login"] !== "login") {
    header("location:../../../auth/login.php");
    exit;
}
$id_user = $_SESSION["id"];
$GetUser = query("SELECT * FROM tb_user WHERE id = '$id_user'")[0];
