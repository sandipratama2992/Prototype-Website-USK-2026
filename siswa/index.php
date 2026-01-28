<?php
include "../config/koneksi.php";
include '../config/auth_siswa.php';

$id_user = $_SESSION['id_user'];

// Ambil data siswa login
$q = mysqli_query($conn, "SELECT * FROM tabel_siswa WHERE id_user='$id_user'");
$siswa = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
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

        <!-- HEADER SEKOLAH -->
        <div class="school-header">
            <img src="../assets/img/logoybn.png" alt="Logo Sekolah">
            <div class="school-info">
                <h1>SMK BARUNAWATI JAKARTA</h1>
                <p>Jl. Ganggeng II No.1, Sungai Bambu, Kec. Tj. Priok, Jkt Utara, Daerah Khusus Ibukota Jakarta 14330</p>
            </div>
        </div>

        <!-- SAMBUTAN -->
        <div class="section">
            <h3>Selamat Datang</h3>
            <p>
                Halo <b><?= $siswa['nama']; ?></b>,  
                selamat datang di dashboard siswa.  
                Silakan gunakan menu di samping untuk melihat data akademik kamu.
            </p>
        </div>

        <!-- INFORMASI SINGKAT -->
        <div class="section">
            <h3>Informasi Pribadi</h3>

            <div class="card-row">
                <div class="simple-card">
                    <b>Nama</b>
                    <p><?= $siswa['nama']; ?></p>
                </div>

                <div class="simple-card">
                    <b>NISN</b>
                    <p><?= $siswa['nisn']; ?></p>
                </div>

                <div class="simple-card">
                    <b>Jurusan</b>
                    <p><?= $siswa['jurusan']; ?></p>
                </div>
            </div>
        </div>

        <!-- PETUNJUK -->
        <div class="section">
            <h3>Petunjuk Penggunaan</h3>
            <ul>
                <li>Lihat jadwal pelajaran melalui menu <b>Jadwal Pelajaran</b></li>
                <li>Cek nilai dan rapor di menu <b>Nilai / Rapor</b></li>
                <li>Ubah username dan password di menu <b>Pengaturan Akun</b></li>
            </ul>
        </div>

    </div>

</div>

<?php if (isset($_SESSION['login_success'])): ?>
<script>
  alert("Anda berhasil login");
</script>
<?php unset($_SESSION['login_success']); ?>
<?php endif; ?>

</body>
</html>
