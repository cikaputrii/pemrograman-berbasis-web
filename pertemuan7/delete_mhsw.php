<?php
include 'db.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $sql = "DELETE FROM mahasiswa WHERE npm = '$npm'";
    if ($conn->query($sql) === TRUE) {
        header("Location: read_mhsw.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>