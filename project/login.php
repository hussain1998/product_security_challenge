<?php
session_start();

if (isset($_POST['loginButton'])) {
    if ($_POST['csrf_token'] != $_SESSION['csrf_token']) {
        die("Invalid CSRF token");
    }

    include_once 'libraries/HTMLPurifier/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);

    $username = $purifier->purify($_POST['username']); //Input sanitization 
    $password = $_POST['password'];
    
    // Ideally should use a database to store passwords
    $pwd_file = 'accounts.txt';
    if (!$fh = fopen($pwd_file, "r")) {die("<p>Could not open password file");}

    while (!feof($fh)) {
        $line = fgets($fh);
        if($line == ""){
            break;
        }
        $user_pass = explode(":", $line);
        if ($user_pass[0] == $username) {
            if (password_verify($password, rtrim($user_pass[1]))) {
                $_SESSION['logged_in'] = 1;
                header("location: welcome.php");
            }
        }
    }
    echo "<script>alert('Wrong username or password');window.location.href='index.php';</script>";
    fclose($file);
}
?>
