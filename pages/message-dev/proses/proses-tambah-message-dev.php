<?php
$isi_pesan = mysqli_real_escape_string($koneksi, $_POST["isi_pesan"]);

$insert = mysqli_query($koneksi, "INSERT INTO tb_message_dev VALUES ('','$isi_pesan', now())");

if ($insert) {
    echo "  <script>
    		    document.location.href='/?pages=update&pesan=berhasil';
    	    	</script>";
} else {
    echo "  <script>
    		    document.location.href='/?pages=update&act=update-terbaru&pesan=gagal';
    	    	</script>";
}
