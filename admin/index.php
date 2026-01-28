<?php
include "../config/koneksi.php";
include '../config/auth_admin.php';

// Hitung jumlah siswa
$query = mysqli_query($conn, "SELECT COUNT(*) as total FROM tabel_siswa");
$data = mysqli_fetch_assoc($query);
$jumlah_siswa = $data['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
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
            <li><a href="siswa_data.php">Data Siswa</a></li>
            <li><a href="nilai_data.php">Nilai Siswa</a></li>
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
                Selamat datang di sistem informasi akademik sekolah.
                Sistem ini digunakan untuk mengelola data siswa dan nilai.
            </p>
        </div>

        <!-- RINGKASAN -->
        <div class="section">
            <h3>Informasi Singkat</h3>

            <div class="card-row">
                <div class="simple-card">
                    <b>Total Siswa</b>
                    <p class="angka">138</p>
                </div>

                <div class="simple-card">
                    <b>Jumlah Jurusan</b>
                    <p class="angka">4</p>
                </div>

                <div class="simple-card">
                    <b>Jumlah Guru</b>
                    <p class="angka">26</p>
                </div>
            </div>
        </div>

        <!-- VISI MISI -->
        <div class="section">
            <h3>Visi</h3>
            <p>
                “Berkarakter, Terampil dan Berjiwa Enterpreuneur.”
            </p>
            <h3>Misi</h3>
            <ul>
                <li>Menyelenggarakan pembiasaan beribadah sesuai agama masing-masing;</li>
                <li>Menyelenggarakan pembelajaran berbasis teknologi dan informasi;</li>
                <li>Meningkatkan kompetensi peserta didik untuk memasuki dunia kerja baik tingkat; nasional maupun internasional;</li>
                <li>Meningkatkan mutu kompetensi pendidik dan tenaga kependidikan yang profesional;</li>
                <li>Menyelenggarakan pembelajaran yang link and match dengan kebutuhan dunia kerja, dunia usaha dan industri;</li>
                <li>Menyelenggarakan pengembangan kewirausahaan berbasis produktif kreatif;</li>
                <li>Menyelenggarakan sertifikasi kompetensi berstandar nasional dan internasional.</li>
            </ul>
        </div>

        <!-- DAFTAR JURUSAN -->
        <div class="section">
            <h3>Program Keahlian</h3>
            <ul>
                <li>Rekayasa Perangkat Lunak (RPL)</li>
                <li>Bisnis Retail (BR)</li>
                <li>Manajemen Perkantoran (MP)</li>
                <li>Akuntansi</li>
            </ul>
        </div>

        <!-- DAFTAR GURU -->
        <div class="section">
            <h3>Struktur Guru</h3>

            <div class="card-row">
                <div class="simple-card">
                    <img src="../assets/img/guru/paksandi.jpg" width="70">
                    <p><b>Sandi Pratama</b></p>
                    <p>Kepala Jurusan RPL</p>
                </div>

                <div class="simple-card">
                    <img src="../assets/img/guru/pakakbar.jpg" width="70">
                    <p><b>Akbar Ariya Caraka</b></p>
                    <p>Guru Produktif RPL</p>
                </div>
            </div>
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
