<?php 
include "../config/koneksi.php";
include '../config/auth_siswa.php';

$id_user = $_SESSION['id_user'];
$q = mysqli_query($conn, "SELECT * FROM tabel_siswa WHERE id_user='$id_user'");
$s = mysqli_fetch_assoc($q);

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
                <img src="../assets/img/profile/default.png">
            </div>

            <div class="profile-info">
                <table>
                    <tr>
                        <td>Nama Peserta Didik</td>
                        <td>: <?= $s['nama']; ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:  <?= $s['nisn']; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Tanggal lahir</td>
                        <td>: Jakarta, 29 Desember 2006</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: Laki-laki</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: JL. Warakas I NO. 46</td>
                    </tr>
                    <tr>
                        <td>No. HP Peserta Didik</td>
                        <td>: 0895478956</td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>: <?= $s['jurusan']; ?></td>
                    </tr>
                    <tr>
                        <td>Rombel</td>
                        <td>: XII RPL</td>
                    </tr>
                    <tr>
                        <td>Nama Wali</td>
                        <td>: Wahyudin</td>
                    </tr>
                    <tr>
                        <td>No. HP Wali</td>
                        <td>: 08778546231455</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>