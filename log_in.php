<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href = "log_in.css" rel = "stylesheet">
</head>
<body>
    <?php
    session_start();
    $_SESSION['active'] = 'False';
    ?>

    <div class="login-box">
        <h2>Login</h2>
        <form name="myForm" action="loginBack.php" method="post">
            <div class="user-box">
                <input type="text" name="email" required="">
                <label>Username</label>
            </div>

            <div class="user-box">
                <input type="password"
                name="password" required="">
                <label>Password</label>
            </div>

            <div>
            <a class="btn__submit" href="#" onclick="myForm.submit()">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </a>

        </form>
    </div>
</body>
</html>