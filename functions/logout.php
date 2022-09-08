<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

echo "<script>
    alert('Berhasil logout!');
</script>";
header("Location: ../login.php");
exit;
