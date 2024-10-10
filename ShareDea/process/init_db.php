<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// MySQL 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 연결 종료
$conn->close();
?>