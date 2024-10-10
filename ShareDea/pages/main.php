<?php
require_once('../process/init_db.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/main.css"/>
    <title>SHAREDEA</title>
  </head>
  <body>
    <form method="post" action="../process/init_db.php">
      <div class="login-wrapper">
        <h1 onclick='main()'>ShareDea</h1>
        <img src="../style/mainimg.png">
        <input type='button' class='login_btn' value='시작하기' onclick='goto_main()'>
      </div>
      <script>
        function main() {
            window.location.href = 'main.php';
        }
        function goto_main() {
            window.location.href = 'mainpage.php';
        }
     </script>
    </form>
  </body>
</html>