<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/main.css"/>
    <title>SHAREDEA</title>
  </head>
  <body>
    <form method="post" action="../process/signin.php" onsubmit="return validateForm()">
        <div class="login-wrapper">
        <h1>ShareDea</h1>
        <input type='text' name='username' placeholder='Id' pattern="[A-Za-z0-9]{6,}" title="아이디는 영어와 숫자로 6글자 이상이어야 합니다." required>
        <input type='password' name='password' id='password' placeholder='Password' pattern="(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*_])[A-Za-z\d!@#$%^&*_]{6,}" title="비밀번호는 영어와 숫자, 특수문자를 포함하여 6글자 이상이어야 합니다." required>
        <input type='button' class='login_btn' value='Login' onclick='login()'>
        <input type='submit' class='signin_btn' value='Signin'>
        </div>
        <script>
            function login() {
                window.location.href = 'mainpage.php';
            }
            function validateForm() {
                const username = document.querySelector('input[name="username"]').value;
                const password = document.querySelector('input[name="password"]').value;

                const usernamePattern = /^[A-Za-z0-9]{6,}$/;
                const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*_])[A-Za-z\d!@#$%^&*_]{6,}$/;

                if (!usernamePattern.test(username)) {
                    alert("아이디는 영어와 숫자로 6글자 이상이어야 합니다.");
                    return false;
                }

                if (!passwordPattern.test(password)) {
                    alert("비밀번호는 영어와 숫자, 특수문자를 포함하여 6글자 이상이어야 합니다.");
                    return false;
                }

                return true;
            }
        </script>
    </form>
  </body>
</html>