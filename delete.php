<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `table` WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: display.php");
    } else {
        echo "Error deleting record: ";
    }
}
?>
