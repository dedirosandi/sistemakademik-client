<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_ruangan WHERE nama_gedung = '$id'");
$delete = mysqli_query($koneksi, "DELETE FROM tb_gedung WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=gedung&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=gedung&pesan=gagal';
    </script>";
}
