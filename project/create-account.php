<!-- A simple create account website with many assumptions. 
Some assumptions are:
1. Assume usernames are unique
2. Assume users enter strong passwords

-->

<?php
if(isset($_POST['createAccount'])) {
    include_once 'libraries/HTMLPurifier/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);

    $username = $purifier->purify($_POST['username']); //Input sanitization 
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if($password != $confirmPassword) {
        echo'<script>alert("Passwords do not match!");</script>';
    }
    else{
        $fp = fopen('accounts.txt', 'a+');
        
        // This creates a strong salted hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $text = $username . ":" . $hashedPassword . "\n";
        fwrite ($fp, $text);
        fclose ($fp);
        echo'<script>alert("Account created!");window.location.href="index.php";</script>';
    }
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
    <div class="login-form">
        <form action="" id="createAccountForm" method="post">
            <h2 class="text-center">Create an account</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="usernameField" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="passwordField" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirmPassword" id="confirmPasswordField" placeholder="Reenter Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="createAccount" id="createAccount">Create an account</button>
            </div>
        </form>
    </div>
</body>

</html>
