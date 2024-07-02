<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('로그인 정보가 없습니다.');
        location.replace('../pages/mainpage.php');
        </script>";
    exit;
} else {
    $name = $_SESSION['username'];
    session_destroy();
    echo "<script>
        var name = '".addslashes($name)."';
        alert(name+'님 로그아웃 되었습니다.');
        location.replace('../pages/mainpage.php');
        </script>";
}
?>