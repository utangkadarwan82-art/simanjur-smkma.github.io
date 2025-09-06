<?php
session_start();
require_once '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    // Ambil role dari form dan validasi
    $allowed_roles = ['admin', 'siswa', 'bk', 'kepsek', 'walikelas'];
    $role = isset($_POST['role']) && in_array($_POST['role'], $allowed_roles) ? $_POST['role'] : 'siswa';

    // Cek apakah username sudah digunakan
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['error'] = "Username sudah digunakan.";
    } else {
        $simpan = mysqli_query($koneksi, "INSERT INTO users (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')");
        if ($simpan) {
            $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
            
            // Arahkan ke halaman login sesuai role
            if ($role === 'admin') {
                header('Location: login/login-.php');
            } elseif ($role === 'bk') {
                header('Location: login/login-bk.php');
            } elseif ($role === 'kepsek') {
                header('Location: login/login-kepsek.php');
            } elseif ($role === 'walikelas') {
                header('Location: login/login-wali.php');
            } else {
                header('Location: login/login-siswa.php');
            }
            exit;
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi Siswa | SIMANJur-SMKMA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
    }
    .register-container {
      max-width: 450px;
      margin: 80px auto;
    }
  </style>
</head>
<body>

<div class="container register-container">
  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <h4 class="text-center mb-4">Registrasi Akun Siswa</h4>
      <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
      <?php endif; ?>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control" id="nama" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Kata Sandi</label>
          <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Daftar</button>
      </form>
      <div class="text-center mt-3">
        <a href="index.php" class="text-decoration-none">← Kembali ke Beranda</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
