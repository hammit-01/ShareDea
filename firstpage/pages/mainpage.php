<?php
session_start(); // 세션 시작
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/main.css"/>
    <title>SHAREDEA</title>
  </head>
  <body>
    <form method="post" action="../process/login.php">
      <div class="login-wrapper">
        <h1>ShareDea</h1>
        <?php
        if (!isset($_SESSION['username'])) {
          echo "<input type='text' name='username' placeholder='Id'>
          <input type='password' name='password' placeholder='Password'>
  
          <input type='submit' class='login_btn' value='Login'>
          <input type='button' class='signin_btn' value='Signin' onclick='signinpage()'>";
        }
        else {
          $username = $_SESSION['username'];
          echo "<h6>환영합니다, $username 님</h6>
          <input type='button' class='logout_btn' value='Logout' onclick='logout()'>
          <input type='button' class='signout_btn' value='Signout' onclick='signout()'>
          <button type='button' class='learn-more' onclick='goToContentPage()'>
            <span class='circle' aria-hidden='true'>
            <span class='icon arrow'></span>
            </span>
            <span class='button-text'>ENTER</span>
            <div class='tooltiptext'>여러가지 재미있는 글들을<br>보고 쓰고 평가하세요!</div>
          </button>";
        }
        ?>
      </div>
      <script>
        function logout() {
            window.location.href = '../process/logout.php';
        }
        function signout() {
            window.location.href = '../process/signout.php';
        }
        function signinpage() {
            window.location.href = 'signinpage.php';
        }
        function goToContentPage() {
            window.location.href = 'contentpage.php';
        }
     </script>
    </form>
  </body>
</html>