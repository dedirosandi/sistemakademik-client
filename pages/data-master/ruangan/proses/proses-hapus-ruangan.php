<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_ruangan WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=ruangan&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=ruangan&pesan=gagal';
    </script>";
}
