<?php

$id = $_GET["id"];

$delete = mysqli_query($koneksi, "DELETE FROM tb_kurikulum WHERE id = '$id'");

if ($delete) {
    echo "  <script>
    document.location.href='/?pages=kurikulum&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='/?pages=kurikulum&pesan=gagal';
    </script>";
}
