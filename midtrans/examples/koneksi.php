<?php
$koneksi = mysqli_connect("localhost", "skip3428_siakad", "Indonesia12345", "skip3428_siakad");
if (!$koneksi) {
    die("Gagal Koneksi") . mysqli_connect_error();
}
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
