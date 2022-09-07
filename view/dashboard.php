<?php
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>
<h1>Hallo <?= $_SESSION['username']; ?></h1>