<?php
include 'db.php';

if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];

    $sql = "SELECT * FROM matakuliah WHERE kodemk = '$kodemk'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data mata kuliah tidak ditemukan.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $sql = "UPDATE matakuliah SET nama='$nama', jumlah_sks='$jumlah_sks' WHERE kodemk='$kodemk'";
    if ($conn->query($sql) === TRUE) {
        header("Location: read_mk.php");
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
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">

    <h2 class="mb-4">Edit Mata Kuliah</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="kodemk" value="<?php echo $row['kodemk']; ?>">

        <div class="mb-3">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_sks">Jumlah SKS:</label>
            <input type="number" name="nama" class="form-control" value="<?php echo $row['jumlah_sks']; ?>" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

        <a href="read_mk.php" class="btn btn-dark">Kembali</a>
    </form>

</body>
</html>