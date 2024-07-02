<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// 데이터베이스 연결 생성
$conn = new mysqli($servername, $username, $password, $dbname);
// 데이터베이스 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // 세션 시작

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $id = $_SESSION['contentid'];

    $sql = "UPDATE text SET likes = likes + 1 WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['good_flag'] = true;
    } else {
        echo "Error updating record: " . $conn->error;
    }
    echo "<script>
        location.replace('../pages/contentpage.php');
        </script>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>