<?php
include "../config/koneksi.php";
include "../config/auth_admin.php";

$id = $_GET['id'];

// Ambil data siswa berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM tabel_siswa WHERE id_siswa='$id'");
$data = mysqli_fetch_assoc($query);

// Jika tombol update ditekan
if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "UPDATE tabel_siswa SET
                            nama='$nama',
                            nisn='$nisn',
                            jurusan='$jurusan'
                          WHERE id_siswa='$id'");

    header("Location: siswa_data.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa</title>

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
            <h2>Edit Data Siswa</h2>

            <form method="POST">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="<?= $data['nama']; ?>" required>
                </div>

                <div class="form-group">
                    <label>NISN</label>
                    <input type="text" name="nisn" value="<?= $data['nisn']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-save">
                        Update
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
