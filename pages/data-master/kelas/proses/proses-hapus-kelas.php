<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=kelas&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=kelas&pesan=gagal';
    </script>";
}
