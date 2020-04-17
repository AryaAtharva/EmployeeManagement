<?php
$servername = "localhost";
$username = "root";
$password = "googly";
$dbname = "intern";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo "<script>alert('unable to fetch data')</script>";
    header("location:index.php");
    //die("Connection failed: " . $conn->connect_error);
}
?>
