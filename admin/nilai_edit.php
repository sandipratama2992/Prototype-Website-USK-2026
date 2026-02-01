<?php
include "../config/koneksi.php";
include "../config/auth_admin.php";

$id = $_GET['id'];

// Ambil data nilai + nama siswa (JOIN)
$query = mysqli_query($conn, "
    SELECT tabel_nilai.*, tabel_siswa.nama
    FROM tabel_nilai
    JOIN tabel_siswa ON tabel_nilai.id_siswa = tabel_siswa.id_siswa
    WHERE id_nilai='$id'
");
$data = mysqli_fetch_assoc($query);

// Jika tombol update ditekan
if (isset($_POST['update'])) {

    $id_siswa = $_POST['id_siswa']; // dikunci (hidden)
    $mapel = $_POST['mapel'];
    $pengetahuan = $_POST['pengetahuan'];
    $keterampilan = $_POST['keterampilan'];

    mysqli_query($conn, "
        UPDATE tabel_nilai SET
            mapel='$mapel',
            pengetahuan='$pengetahuan',
            keterampilan='$keterampilan'
        WHERE id_nilai='$id'
    ");

    header("Location: nilai_data.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Nilai</title>

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
            <h2>Edit Nilai Siswa</h2>

            <form method="POST">

                <!-- Nama siswa ditampilkan saja -->
                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" value="<?= $data['nama']; ?>" readonly>
                </div>

                <!-- id_siswa dikunci -->
                <input type="hidden" name="id_siswa" value="<?= $data['id_siswa']; ?>">

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mapel" value="<?= $data['mapel']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Nilai Pengetahuan</label>
                    <input type="number" name="pengetahuan" value="<?= $data['pengetahuan']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Nilai Keterampilan</label>
                    <input type="number" name="keterampilan" value="<?= $data['keterampilan']; ?>" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-save">
                        Update
                    </button>
                    <a href="nilai_data.php" class="btn btn-cancel">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>