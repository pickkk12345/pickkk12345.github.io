<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM donasi WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: list_donasi.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>