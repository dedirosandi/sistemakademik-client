<?php
$id_dokumen = $_GET["id_dokumen"];

$GetDokumen = query("SELECT * FROM tb_dokumen WHERE id='$id_dokumen'")[0];

$delete = mysqli_query($koneksi, "DELETE FROM tb_dokumen WHERE id = '$id_dokumen'");
unlink("files/dokumen/" . $GetDokumen["file_dokumen"]);

if ($delete) {
    echo "  <script>
             document.location.href='/?pages=dokumen';
             </script>";
} else {
    echo "  <script>
             document.location.href='/?pages=dokumen';
             </script>";
}
