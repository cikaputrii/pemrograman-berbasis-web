<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Web Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="text-center">
            <h1>
                Halo!
                <small class="text-muted">Selamat datang di Web Kuliah</small>
            </h1>
            <p class="mt-3">Pilihan untuk mengelola data:</p>
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="read_mhsw.php" class="btn btn-dark">Data Mahasiswa</a>
                <a href="read_mk.php" class="btn btn-dark">Data Mata Kuliah</a>
                <a href="read_krs.php" class="btn btn-dark">Data KRS</a>
            </div>
        </div>
    </div>
</body>
</html>