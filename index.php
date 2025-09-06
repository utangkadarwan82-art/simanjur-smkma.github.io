<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMANJur - SMK Mathla'ul Anwar</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        .role-card {
            transition: all 0.3s ease-in-out;
        }
        .role-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        }
        footer {
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <main class="container py-5 text-center">
        <div class="mb-4">
            <div class="mb-3">
            <?php $base_url = "http://localhost/simanjur-smkma"; ?>            
            <img src="<?php echo $base_url; ?>/assets/images/decision.png" 
            alt="Decision Icon" class="me-2" style="width: 100px; height: 100px;">

            </div>
            <h1 class="fw-bold">Selamat Datang di SIMANJur</h1>
            <p class="text-muted">
                Sistem Rekomendasi Pemilihan Jurusan di SMK Mathla'ul Anwar Berbasis<br>
                Metode <i>Simple Additive Weighting</i> (SAW).
            </p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <!-- Siswa -->
            <div class="col">
                <div class="card h-100 p-3 role-card">
                    <div class="card-body">
                        <i class="fa fa-user fa-2x text-primary mb-3"></i>
                        <h5 class="card-title fw-semibold">Siswa</h5>
                        <p class="card-text text-muted">Lihat rekomendasi jurusan dan kelola profil Anda.</p>
                        <a href="auth/login-siswa.php" class="btn btn-primary w-100 mt-2">Masuk sebagai Siswa</a>
                    </div>
                </div>
            </div>

                        <!-- Admin -->
            <div class="col">
                <div class="card h-100 p-3 role-card">
                    <div class="card-body">
                        <i class="fa fa-user-gear fa-2x text-primary mb-3"></i>
                        <h5 class="card-title fw-semibold">Admin</h5>
                        <p class="card-text text-muted">Kelola kriteria, alternatif, dan pengguna sistem.</p>
                        <a href="auth/login-admin.php" class="btn btn-primary w-100 mt-2">Masuk sebagai Admin</a>
                    </div>
                </div>
            </div>

            <!-- Kepala Sekolah -->
            <div class="col">
                <div class="card h-100 p-3 role-card">
                    <div class="card-body">
                        <i class="fa fa-school fa-2x text-primary mb-3"></i>
                        <h5 class="card-title fw-semibold">Kepala Sekolah</h5>
                        <p class="card-text text-muted">Pantau statistik dan laporan keseluruhan.</p>
                        <a href="auth/login-kepsek.php" class="btn btn-primary w-100 mt-2">Masuk sebagai Kepala Sekolah</a>
                    </div>
                </div>
            </div>

            <!-- Guru BK -->
            <div class="col">
                <div class="card h-100 p-3 role-card">
                    <div class="card-body">
                        <i class="fa fa-heart fa-2x text-primary mb-3"></i>
                        <h5 class="card-title fw-semibold">Guru BK</h5>
                        <p class="card-text text-muted">Akses data guru bk dan berikan bimbingan konseling.</p>
                       <a href="auth/login-bk.php" class="btn btn-primary w-100 mt-2">Masuk sebagai Guru BK</a>
                    </div>
                </div>
            </div>

            <!-- Wali Kelas -->
            <div class="col">
                <div class="card h-100 p-3 role-card">
                    <div class="card-body">
                        <i class="fa fa-users fa-2x text-primary mb-3"></i>
                        <h5 class="card-title fw-semibold">Wali Kelas</h5>
                        <p class="card-text text-muted">Lihat data dan perkembangan siswa perwalian Anda.</p>
                        <a href="auth/login-wali.php" class="btn btn-primary w-100 mt-2">Masuk sebagai Wali Kelas</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-5">
            &copy; 2025 SMK Mathla'ul Anwar. All rights reserved.
        </footer>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
