<?php
$servername = "localhost";
$username = "admin";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("kết nối thất bại: " . mysqli_connect_error());
}
echo "kết nối thành công";
?>