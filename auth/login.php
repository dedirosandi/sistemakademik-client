<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMK INFORMATIKA CIPUTAT</title>
    <link rel="stylesheet" href="../assets/css/main/app.css">
    <link rel="stylesheet" href="../assets/css/pages/auth.css">
    <link rel="shortcut icon" href="../assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-7 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">SMK INFORMATIKA CIPUTAT</h1>
                    <p class="auth-subtitle mb-5">Sistem Akademik</p>

                    <form action="proses-login.php" method="post">
                        <?php
                        if (isset($_GET["pesan"])) { ?>
                            <?php if ($_GET["pesan"] == "deactive") { ?>
                                <div class="alert alert-danger" role="alert">
                                    Akun anda sudah tidak aktif...
                                </div>
                            <?php } else if ($_GET["pesan"] == "wrong") { ?>
                                <div class="alert alert-danger" role="alert">
                                    Password anda salah...
                                </div>
                            <?php } else if ($_GET["pesan"] == "unregitered") { ?>
                                <div class="alert alert-danger" role="alert">
                                    Anda belum terdaftar...
                                </div>
                            <?php } ?>
                        <?php
                        } ?>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="username" type="text" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="password" type="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary shadow-lg mt-5">Masuk</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div id="auth-right">
                    <img src="../assets/images/auth-banner/banner.svg" class="img-fluid" alt="...">
                </div>
            </div>
        </div>

    </div>
</body>

</html>