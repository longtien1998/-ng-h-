<?php
// Thông tin cấu hình shop
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ass";

// Kết nối tới MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
}else{
//     echo " Kết nối sever Thành công";
}
?>
