<?php
session_start();
if(isset($_SESSION['logged_in'])) {
    header("location: welcome.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/main.css">
</head>

<body>
    <?php
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    ?>

    <div class="login-form">
        <form action="login.php" id="loginForm" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="usernameField" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="passwordField" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="loginButton" id="loginButton">Log in</button>
            </div>
            <div class="clearfix">
                <label class="pull-left checkbox-inline"><input type="checkbox" name="rememberMe"> Remember me</label>
                <a href="#" id="forgetPassword" class="pull-right">Forgot Password?</a>
            </div>
            <!-- Embed CSRF token into the form -->
            <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>"/>
        </form>
        <p class="text-center"><a href="/create-account.php">Create an Account</a></p>
    </div>
</body>

</html>
