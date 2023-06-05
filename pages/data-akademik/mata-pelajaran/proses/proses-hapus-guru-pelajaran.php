<?php

$id = $_GET["id"];

$GetMataPelajaran = query("SELECT * FROM tb_guru_pelajaran_2 WHERE id='$id'")[0];
$id_mata_pelajaran = $GetMataPelajaran["id_mata_pelajaran"];
// $delete = mysqli_query($koneksi, "DELETE FROM tb_mata_pelajaran_2 WHERE id = '$id'");
$delete = mysqli_query($koneksi, "DELETE FROM tb_guru_pelajaran_2 WHERE id = '$id'");


// var_dump($id_mata_pelajaran);
// die;

if ($delete) {
    echo "  <script>
    document.location.href='?pages=mata-pelajaran&act=detail-mata-pelajaran&id=$id_mata_pelajaran&pesan=berhasil';
    </script>";
} else {
    echo "  <script>
    document.location.href='?pages=mata-pelajaran&act=detail-mata-pelajaran&id=$id_mata_pelajaran&pesan=gagal';
    </script>";
}
