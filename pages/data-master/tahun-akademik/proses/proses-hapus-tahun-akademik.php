<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_tahun_akademik WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=tahun-akademik&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=tahun-akademik&pesan=gagal';
    </script>";
}
