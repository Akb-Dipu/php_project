<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "gymdatabase";

$conn= mysqli_connect('localhost','root',"",'gymdatabase');

//$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
