<?php
$servername = "localhost";
$username = "admin";
$password = "";

// Create connection

// Check connection
try {
    $conn = new PDO("mysql:host=$servername" , $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "kêt nối thành công";
}
catch(PDOException $e)
{
    echo "kết nối thất bại: " . $e->getMessage();
}
?>