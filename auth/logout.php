<?php
session_start();
session_unset();
session_reset();
session_destroy();

echo "<script>
						document.location.href='/auth/login.php';
					</script>";
