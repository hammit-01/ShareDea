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

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST['username']!= null and $_POST['password'] != null) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        echo "<script>
            alert('회원가입이 완료되었습니다.');
            location.replace('../pages/mainpage.php');
            </script>";
    } else {
        echo "<script>
            alert('회원가입에 문제가 있습니다.');
            location.replace('../pages/signinpage.php');
            </script>" . $stmt->error;
    }
    $stmt->close();
} else {
    echo "<script>
            alert('아이디와 비밀번호를 입력하고 회원가입 버튼을 눌러주세요.');
            location.replace('../pages/signinpage.php');
            </script>";
}
$conn->close();
?>