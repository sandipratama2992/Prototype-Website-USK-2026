<?php
session_start();

if (!isset($_SESSION['id_user']) || $_SESSION['role'] != "siswa") {
    header("Location: ../login.php");
    exit;
}
?>

