<?php 
include "../config/koneksi.php";
include "../config/auth_siswa.php";

$id_user = $_SESSION['id_user'];

// Ambil data user login
$q = mysqli_query($conn, "SELECT * FROM tabel_user WHERE id_user='$id_user'");
$u = mysqli_fetch_assoc($q);

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn, "
        UPDATE tabel_user SET
        username='$username',
        password='$password'
        WHERE id_user='$id_user'
    ");

    // Notifikasi sekali tampil
    $_SESSION['update_success'] = true;

    header("Location: pengaturan.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Akun</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/form.css">
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

        <div class="form-wrapper">
            <h2>Pengaturan Akun</h2>

            <form method="POST">

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?= $u['username']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" value="<?= $u['password']; ?>" required>
                </div>

                <div class="form-actions">
                    <button type="submit" name="simpan" class="btn btn-save">
                        Simpan
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<!-- NOTIFIKASI -->
<?php if (isset($_SESSION['update_success'])) { ?>
<script>
    alert("Pengaturan berhasil disimpan");
</script>
<?php unset($_SESSION['update_success']); } ?>

</body>
</html>
