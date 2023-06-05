<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_mata_pelajaran_2 WHERE id = '$id'");
$delete = mysqli_query($koneksi, "DELETE FROM tb_guru_pelajaran_2 WHERE id_mata_pelajaran = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=mata-pelajaran&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=mata-pelajaran&pesan=gagal';
    </script>";
}
