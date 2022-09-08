<?php
session_start();
if (!isset($_SESSION['leveluser'])) {
    header("Location: login.php");
    exit;
} else {
    header("Location: dashboard.php");
    exit;
}
