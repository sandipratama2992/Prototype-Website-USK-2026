<?php
include "../config/koneksi.php";
include "../config/auth_admin.php";

if (isset($_POST['simpan'])) {

    $id_siswa = $_POST['id_siswa'];
    $mapel = $_POST['mapel'];
    $pengetahuan = $_POST['pengetahuan'];
    $keterampilan = $_POST['keterampilan'];

    mysqli_query($conn, 
        "INSERT INTO tabel_nilai(id_siswa, mapel, pengetahuan, keterampilan)
         VALUES('$id_siswa', '$mapel', '$pengetahuan', '$keterampilan')");

    header("Location: nilai_data.php");
    exit;
}

// Ambil data siswa untuk select
$siswa = mysqli_query($conn, "SELECT * FROM tabel_siswa");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Nilai</title>

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
            <h2>Input Nilai Siswa</h2>

            <form method="POST">

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <select name="id_siswa" required>
                        <option value="">-- Pilih Siswa --</option>
                        <?php while($s = mysqli_fetch_assoc($siswa)) { ?>
                            <option value="<?= $s['id_siswa'] ?>">
                                <?= $s['nama'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mapel" required>
                </div>

                <div class="form-group">
                    <label>Nilai Pengetahuan</label>
                    <input type="number" name="pengetahuan" required>
                </div>

                <div class="form-group">
                    <label>Nilai Keterampilan</label>
                    <input type="number" name="keterampilan" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn btn-save">
                        Simpan
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
