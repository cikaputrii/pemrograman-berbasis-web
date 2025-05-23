<?php
include 'db.php';

$sql = "
    SELECT 
        krs.id, 
        mahasiswa.npm, 
        mahasiswa.nama AS nama_mahasiswa, 
        matakuliah.nama AS nama_matakuliah, 
        matakuliah.jumlah_sks
    FROM 
        krs
    JOIN 
        mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
    JOIN 
        matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container">
        <a class="navbar-brand" href="beranda.html">
            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" width="30" height="24" class="d-inline-block align-text-top">
            <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
            </svg>                               
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="beranda.php">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="read_mhsw.php">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="read_mk.php">Mata Kuliah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="read_krs.php">KRS</a>
            </li>
            </ul>
        </div>    
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Data KRS</h2>
        <a href="create_krs.php" class="btn btn-dark mb-3">Tambah KRS</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $no = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row["nama_mahasiswa"] . "</td>";
                        echo "<td>" . $row["nama_matakuliah"] . "</td>";
                        echo "<td><span class='text-danger'>" . $row["nama_mahasiswa"] . "</span> Mengambil Mata Kuliah <span class='text-danger'>" . $row["nama_matakuliah"] . "</span> (" . $row["jumlah_sks"] . " SKS)</td>";
                        echo "<td>";
                        echo "<a href='delete_krs.php?id=" . $row["id"] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data KRS.</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>