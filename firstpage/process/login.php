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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);

    if ($stmt !== false) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            print_r($row);

            $db_password = $row['password'];
            $hashed_dbpassword = password_hash($db_password, PASSWORD_DEFAULT);
            print_r($db_password);

            if (password_verify($password, $hashed_dbpassword)) {
                $_SESSION['username'] = $username;
                header("Location: ../pages/mainpage.php");
                exit;
            } else {
                echo "<script>
                    alert('비밀번호가 맞지 않습니다.');
                    location.replace('../pages/mainpage.php');
                    </script>";
            }
        } else {
            echo "<script>
                alert('존재하지 않는 회원입니다.');
                location.replace('../pages/mainpage.php');
                </script>";
        }
        $stmt->close();
    } else {
        echo "<script>SQL 접속에 문제가 있습니다: </script>" . $conn->error;
    }
}
$conn->close();
?>