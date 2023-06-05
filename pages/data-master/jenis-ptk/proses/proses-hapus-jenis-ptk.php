<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_jenis_ptk WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=jenis-ptk&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=jenis-ptk&pesan=gagal';
    </script>";
}
