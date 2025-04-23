<?php
include 'db.php';

if (isset($_GET['kodemk'])) {
    $kodemk = $_GET['kodemk'];

    $sql = "DELETE FROM matakuliah WHERE kodemk = '$kodemk'";
    if ($conn->query($sql) === TRUE) {
        header("Location: read_mk.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>