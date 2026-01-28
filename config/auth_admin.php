<?php
session_start();

// Cek role agar siswa tidak bisa masuk halaman admin
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

?>