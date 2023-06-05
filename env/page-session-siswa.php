<?php
// session_start();
if ($_SESSION["role"] !== "siswa") {
    echo "  <script>
    		    document.location.href='/?pages=404';
    	    	</script>";
    exit;
}
