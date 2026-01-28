<?php
include "../config/koneksi.php";
include "../config/auth_admin.php";

// Join nilai + nama siswa
$query = mysqli_query($conn, 
    "SELECT tabel_nilai.*, tabel_siswa.nama 
     FROM tabel_nilai 
     JOIN tabel_siswa ON tabel_nilai.id_siswa = tabel_siswa.id_siswa");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Nilai</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/table.css">
</head>
<body>

<div class="dashboard-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>SIAKAD</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="nilai_data.php">Data Nilai</a></li>
            <li><a href="siswa_data.php">Data Siswa</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="dashboard-content">

        <h2>Data Nilai Siswa</h2>

        <div class="table-actions">
            <a href="nilai_input.php" class="btn btn-primary">+ Input Nilai</a>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Mata Pelajaran</th>
                        <th>Pengetahuan</th>
                        <th>Keterampilan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) { 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['mapel'] ?></td>
                        <td><?= $data['pengetahuan'] ?></td>
                        <td><?= $data['keterampilan'] ?></td>
                        <td>
                            <a href="nilai_edit.php?id=<?= $data['id_nilai'] ?>" class="btn btn-edit">Edit</a>
                            <a href="nilai_hapus.php?id=<?= $data['id_nilai'] ?>"
                               class="btn btn-delete"
                               onclick="return confirm('Hapus data nilai?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
