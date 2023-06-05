<?php
session_start();
require_once "../env/connection.php";

$username = mysqli_escape_string($koneksi, $_POST["username"]);
$password = mysqli_escape_string($koneksi, $_POST["password"]);

$check = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

$result = mysqli_fetch_assoc($check);

if (mysqli_num_rows($check) === 1) {
    if (password_verify($password, $result["password"])) {
        $id = $result["id"];
        $username = $result["username"];
        $role = $result["role"];
        $status = $result["status"];
        // var_dump($status);
        // die;


        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $role;
        $_SESSION["login"] = "login";

        if ($status === "0") {
            echo "  <script>
            document.location.href='/auth/login.php?pesan=deactive';
            </script>";
            return false;
        } elseif ($status === "1") {
            echo "  <script>
            document.location.href='../../../?pages=dashboard';
            </script>";
            return false;
        }

        // header("location:../../../?pages=dashboard");
    } else {
        header("location:/auth/login.php?pesan=wrong");
        return false;
    }
} else {
    header("location:/auth/login.php?pesan=unregitered");
}
