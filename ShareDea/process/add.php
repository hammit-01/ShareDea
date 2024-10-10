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

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_SESSION['username']!= null and $_POST['text']!= null) {
    $username = $_SESSION['username'];
    $text = $_POST['text'];

    $sql = "INSERT INTO `text` (`username`, `content`) VALUES (?, ?);";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $username, $text);

        if ($stmt->execute()) {
            echo "<script>
                alert('글이 게시되었습니다');
                window.location.href = '../pages/addcontent.php';
                </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "<script>
            alert('글 게시에 문제가 생겼습니다.');
            location.replace('../pages/addcontent.php');
            </script>";
}

$conn->close();
?>