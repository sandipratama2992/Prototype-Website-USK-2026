<?php

include "../config/koneksi.php";
include '../config/auth_admin.php';


$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tabel_nilai WHERE id_nilai='$id'");

header("Location: nilai_data.php");
exit;
