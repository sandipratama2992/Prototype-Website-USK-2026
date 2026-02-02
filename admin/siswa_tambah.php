<?php
include "../config/koneksi.php";
include "../config/auth_admin.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $jurusan = $_POST['jurusan'];
    $id_user = $_SESSION['id_user'];

    mysqli_query($conn, 
        "INSERT INTO tabel_siswa (nama, nisn, jurusan, id_user)
         VALUES('$nama', '$nisn', '$jurusan', '$id_user')");

    header("Location: siswa_data.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>

<div class="dashboard-layout">

    <!-- SIDEBAR ADMIN -->
    <div class="sidebar">
        <h2>SIAKAD</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="siswa_data.php">Data Siswa</a></li>
            <li><a href="nilai_data.php">Data Nilai</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="dashboard-content">

        <div class="form-wrapper">
            <h2>Tambah Data Siswa</h2>

            <form method="POST">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" required>
                </div>

                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" name="nisn" required>
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn btn-save">
                        Simpan
                    </button>
                    <a href="siswa_data.php" class="btn btn-cancel">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>
