<?php
session_start();
if(!isset($_SESSION['logged_in'])) {
    echo "<script>alert('Log in first!');window.location.href='index.php';</script>";
}
?>

<h1>Logged in!</h1>