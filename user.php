<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $mobile = $_POST['mobile'];
    $package = $_POST['package'];
    $fee = $_POST['fee'];
    $month = $_POST['month'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `table` (name, gmail, mobile, package, fee, month, password) 
            VALUES ('$name', '$gmail', '$mobile', '$package', '$fee', '$month', '$password')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    } else {
        // Redirect to login.html after successful registration
        header("Location: login.html");
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #222;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px #000;
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #e91e63;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        input {
            width: 100%;
            padding: 10px;
            border: none;
            margin-top: 5px;
            border-radius: 5px;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background: #e91e63;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #d81b60;
        }
    </style>
</head>
<body>
    <form method="post" action="user.php">
        <h2>Gym Registration</h2>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="gmail">Email:</label>
        <input type="email" id="gmail" name="gmail" required>

        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" required>

        <label for="package">Package:</label>
        <input type="text" id="package" name="package" placeholder="Monthly/Half Yearly/Yearly" required>

        <label for="fee">Fee:</label>
        <input type="number" id="fee" name="fee" required>

        <label for="month">Month:</label>
        <input type="number" id="month" name="month" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
