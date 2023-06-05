<?php
$id_pembayaran = $_GET["id"];


$delete = mysqli_query($koneksi, "DELETE FROM tb_pembayaran WHERE id = '$id_pembayaran'");

if ($delete) {
    echo "  <script>
             document.location.href='/?pages=pembayaran';
             </script>";
} else {
    echo "  <script>
             document.location.href='/?pages=pembayaran';
             </script>";
}
