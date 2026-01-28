<?php 
include "../config/koneksi.php";
include "../config/auth_siswa.php";

$id_user = $_SESSION['id_user'];

// Ambil id_siswa
$qs = mysqli_query($conn, "SELECT * FROM tabel_siswa WHERE id_user='$id_user'");
$s  = mysqli_fetch_assoc($qs);
$id_siswa = $s['id_siswa'];

// Ambil nilai siswa
$nilai = mysqli_query($conn, "SELECT * FROM tabel_nilai WHERE id_siswa='$id_siswa'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rapor Bayangan</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/table.css">
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

        <h2>Rapor Bayangan</h2>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Pengetahuan</th>
                        <th>Keterampilan</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($n = mysqli_fetch_assoc($nilai)) { ?>
                    <tr>
                        <td><?= $n['mapel']; ?></td>
                        <td><?= $n['pengetahuan']; ?></td>
                        <td><?= $n['keterampilan']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
