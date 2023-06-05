<?php
include_once "../../../../env/connection.php";

$mata_pelajaran = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["mata_pelajaran"]));
$GetGuru = query("SELECT * FROM tb_guru_pelajaran_2 WHERE id_mata_pelajaran='$mata_pelajaran'");
echo "<option value=''>Pilih Guru</option>";
foreach ($GetGuru as $guru) {
    $id_guru = $guru["id_guru"];
    $GetNamaGuru = query("SELECT * FROM tb_user WHERE id='$id_guru'")[0];
?>
    <option value="<?= $guru["id_guru"]; ?>"><?= $GetNamaGuru["nama"]; ?></option>
<?php } ?>