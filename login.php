<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM `table` WHERE name='$name' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $name;
        header("Location: index.html"); // Successful login
        exit();
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href='login.html';</script>";
        exit();
    }
}
?>
