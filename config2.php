<?php
/**
 * Khai báo 4 hằng số kết nối CSDL
 */
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "product");
/**
 * kết nối CSDL
 */
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    die("Không thể kết nối đến CSDL");
}
echo"kết nối thành công";
