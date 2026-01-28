<?php

include "../config/koneksi.php";
include '../config/auth_admin.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tabel_siswa WHERE id_siswa='$id'");

header("Location: siswa_data.php");
exit;
