<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopbanhang";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Hàm setAttribute() được sử dụng để thiết lập chế độ báo lỗi
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>