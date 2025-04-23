<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM krs WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: read_krs.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>