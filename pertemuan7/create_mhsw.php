<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    if (empty($npm) || empty($nama) || empty($jurusan)) {
        echo "Mohon isi semua field yang wajib.";
    } else {
        $sql = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
        if ($conn->query($sql) === TRUE) {
            header("Location: read_mhsw.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Tambah Mahasiswa</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="npm">NPM:</label>
            <input type="text" name="npm" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jurusan">Jurusan:</label>
            <select name="jurusan" class="form-control" required>
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat:</label>
            <textarea type="text" name="alamat" class="form-control" required></textarea>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

        <a href="read_mhsw.php" class="btn btn-dark">Kembali</a>
    </form>
</body>
</html>