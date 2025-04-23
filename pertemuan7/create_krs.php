<?php
include 'db.php';

$mahasiswa_query = "SELECT * FROM mahasiswa";
$matakuliah_query = "SELECT * FROM matakuliah";

$mahasiswa_result = $conn->query($mahasiswa_query);
$matakuliah_result = $conn->query($matakuliah_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Tambah KRS</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
            <label for="mahasiswa_npm">Mahasiswa:</label>
            <select name="mahasiswa_npm" class="form-control" required>
                <option value="">Pilih Mahasiswa</option>
                    <?php
                    if ($mahasiswa_result->num_rows > 0) {
                        while ($row = $mahasiswa_result->fetch_assoc()) {
                            echo "<option value='" . $row['npm'] . "'>" . $row['nama'] . "</option>";
                        }
                    }
                ?>
            </select>

            <br>

            <label for="matakuliah_kodemk">Mata Kuliah:</label>
            <select name="matakuliah_kodemk" class="form-control" required>
                <option value="">Pilih Mata Kuliah</option>
                <?php
                    if ($matakuliah_result->num_rows > 0) {
                        while ($row = $matakuliah_result->fetch_assoc()) {
                            echo "<option value='" . $row['kodemk'] . "'>" . $row['nama'] . "</option>";
                        }
                    }
                ?>
            </select>

            <br>
        </div>

        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

        <a href="read_krs.php" class="btn btn-dark">Kembali</a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mahasiswa_npm = $_POST['mahasiswa_npm'];
        $matakuliah_kodemk = $_POST['matakuliah_kodemk'];

        // Validasi input
        if (empty($mahasiswa_npm) || empty($matakuliah_kodemk)) {
            echo "Mohon pilih mahasiswa dan mata kuliah.";
        } else {
            // Query untuk menambahkan data KRS
            $sql = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$mahasiswa_npm', '$matakuliah_kodemk')";
            if ($conn->query($sql) === TRUE) {
                header("Location: read_krs.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    ?>
</body>
</html>