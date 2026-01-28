<?php
session_start();
include "config/koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cari user di database
    $query = mysqli_query($conn, "SELECT * FROM tabel_user WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data && $password == $data['password']) {

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['role'] = $data['role'];

        // Tambahkan pesan sukses login
        $_SESSION['login_success'] = true;


        if ($data['role'] == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: siswa/index.php");
        }
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login SIAKAD</title>
<link rel="stylesheet" href="assets/css/base.css">
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-box">
    <h2>LOGIN SIAKAD</h2>

    <?php if(!empty($error)) { ?>
        <p class="error"><?= $error ?></p>
    <?php } ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Masuk</button>
    </form>
</div>

</body>
</html>
