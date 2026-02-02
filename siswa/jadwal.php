<?php 
include "../config/koneksi.php";
include "../config/auth_siswa.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Pembelajaran</title>

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

        <h2>Jadwal Pembelajaran</h2>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Mata Pelajaran</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- SENIN -->
                    <tr><td rowspan="4"><b>Senin</b></td><td>Upacara</td><td>06.30 - 07.15</td></tr>
                    <tr><td>Pemodelan</td><td>07.15 - 09.30</td></tr>
                    <tr><td>Agama</td><td>09.45 - 12.00</td></tr>
                    <tr><td>Basis Data</td><td>12.30 - 15.10</td></tr>

                    <!-- SELASA -->
                    <tr><td rowspan="5"><b>Selasa</b></td><td>PPKN</td><td>06.30 - 08.00</td></tr>
                    <tr><td>PKK</td><td>08.00 - 09.30</td></tr>
                    <tr><td>Mobile</td><td>09.45 - 12.00</td></tr>
                    <tr><td>Basis Data</td><td>12.30 - 13.50</td></tr>
                    <tr><td>Matematika</td><td>13.50 - 15.10</td></tr>

                    <!-- RABU -->
                    <tr><td rowspan="3"><b>Rabu</b></td><td>Bahasa Indonesia</td><td>06.30 - 08.45</td></tr>
                    <tr><td>Web</td><td>08.45 - 12.00</td></tr>
                    <tr><td>PKK</td><td>12.30 - 15.10</td></tr>

                    <!-- KAMIS -->
                    <tr><td rowspan="4"><b>Kamis</b></td><td>Matematika</td><td>06.30 - 08.00</td></tr>
                    <tr><td>Bahasa Jepang</td><td>08.00 - 09.30</td></tr>
                    <tr><td>Bahasa Inggris</td><td>09.45 - 12.00</td></tr>
                    <tr><td>Game</td><td>12.30 - 15.10</td></tr>

                    <!-- JUMAT -->
                    <tr><td rowspan="4"><b>Jum'at</b></td><td>Sholat Dhuha</td><td>06.30 - 07.15</td></tr>
                    <tr><td>Figma (Pak Akbar)</td><td>07.15 - 08.35</td></tr>
                    <tr><td>Bahasa Inggris</td><td>08.35 - 10.05</td></tr>
                    <tr><td>RPL</td><td>10.05 - 11.15</td></tr>

                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
