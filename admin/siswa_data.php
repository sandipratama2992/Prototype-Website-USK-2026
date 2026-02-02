<?php
include "../config/koneksi.php";
include "../config/auth_admin.php";

// Ambil semua data siswa
$query = mysqli_query($conn, "SELECT * FROM tabel_siswa");
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>

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
            <li><a href="siswa_data.php">Data Siswa</a></li>
            <li><a href="nilai_data.php">Data Nilai</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="dashboard-content">

        <h2>Data Siswa</h2>

        <div class="table-actions">
            <a href="siswa_tambah.php" class="btn btn-primary">+ Tambah Siswa</a>
        </div>

        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Jurusan</th>
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
                        <td><?= $data['nisn'] ?></td>
                        <td><?= $data['jurusan'] ?></td>
                        <td>
                            <a href="siswa_edit.php?id=<?= $data['id_siswa'] ?>" class="btn btn-edit">Edit</a>
                            <a href="siswa_hapus.php?id=<?= $data['id_siswa'] ?>"
                               class="btn btn-delete"
                               onclick="return confirm('Hapus data siswa?')">Hapus</a>
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
