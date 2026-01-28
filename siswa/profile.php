<?php 
include "../config/koneksi.php";
include '../config/auth_siswa.php';

$id_user = $_SESSION['id_user'];
$q = mysqli_query($conn, "SELECT * FROM tabel_siswa WHERE id_user='$id_user'");
$s = mysqli_fetch_assoc($q);

// upload foto
if (isset($_POST['upload_foto'])) {
    $nama_file = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if (!empty($nama_file)) {
        $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
        $nama_baru = 'siswa_'.$s['id_siswa'].'.'.$ext;
        $folder = "../assets/img/profile/";

        move_uploaded_file($tmp, $folder.$nama_baru);

        mysqli_query($conn, "UPDATE tabel_siswa SET foto='$nama_baru' WHERE id_user='$id_user'");
        header("Location: profile.php");
        exit;
    }
}

$foto = !empty($s['foto']) ? $s['foto'] : 'default.png';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Siswa</title>

    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body>

<div class="dashboard-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Sistem Informasi Akademik</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="profile.php">Profil Saya</a></li>
            <li><a href="jadwal.php">Jadwal Pelajaran</a></li>
            <li><a href="rapor.php">Nilai / Rapor</a></li>
            <li><a href="pengaturan.php">Pengaturan Akun</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="dashboard-content">
        <h2>Profil Pribadi</h2>

        <div class="profile-card">

            <div class="profile-photo">
                <img src="../assets/img/profile/<?= $foto ?>">

                <form method="POST" enctype="multipart/form-data" style="margin-top:10px;">
                    <input type="file" name="foto" required>
                    <button type="submit" name="upload_foto">Upload</button>
                </form>
            </div>

            <div class="profile-info">
                <h3><?= $s['nama']; ?></h3>
                <p><b>NISN:</b> <?= $s['nisn']; ?></p>
                <p><b>Jurusan:</b> <?= $s['jurusan']; ?></p>
            </div>

        </div>
    </div>

</div>

</body>
</html>
