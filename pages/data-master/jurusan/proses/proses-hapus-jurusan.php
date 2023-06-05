<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_jurusan WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=jurusan&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=jurusan&pesan=gagal';
    </script>";
}
