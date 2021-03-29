<?php
if (isset($_POST['loginButton'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
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
                header("location: welcome.php");
            }
        }
    }
    echo "<script>alert('Wrong username or password');window.location.href='index.html';</script>";
    fclose($file);
}
?>
