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

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
}

$sql = "DELETE FROM text WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        location.replace('../pages/bookmark.php');
        </script>";
} else {
    echo "<script>
    location.replace('../pages/bookmark.php');
    </script>";
}
$conn->close();
?>