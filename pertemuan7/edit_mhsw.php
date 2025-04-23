<?php
include 'db.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $sql = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data mahasiswa tidak ditemukan.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', alamat='$alamat' WHERE npm='$npm'";
    if ($conn->query($sql) === TRUE) {
        header("Location: read_mhsw.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Edit Mahasiswa</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="npm" value="<?php echo $row['npm']; ?>">

        <div class="mb-3">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jurusan">Jurusan:</label>
            <select name="jurusan" class="form-control" required>
                <option value="Informatika" <?php if ($row['jurusan'] == 'Informatika') echo 'selected'; ?>>Informatika</option>
                <option value="Sistem Informasi" <?php if ($row['jurusan'] == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat:</label>
            <textarea type="text" name="alamat" class="form-control" required><?php echo $row['alamat']; ?></textarea>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

        <a href="read_mhsw.php" class="btn btn-dark">Kembali</a>
    </form>
</body>
</html>