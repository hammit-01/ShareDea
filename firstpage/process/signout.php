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
}

$sql = "DELETE FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    session_destroy();
    echo "<script>
        alert('회원탈퇴가 완료되었습니다.');
        location.replace('../pages/mainpage.php');
        </script>";
} else {
    echo "<script>
            alert('회원탈퇴에 문제가 있습니다.');
            location.replace('../pages/mainpage.php');
            </script>" . $stmt->error;
}
$stmt->close();
$conn->close();
?>