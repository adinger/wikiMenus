<?php
include '../db/connect.php';
include 'userfunctions.php';
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    if(username_exists($db, $username)) {
        echo 'That username has been taken.';    
    } elseif(strlen($username) != 0) {
        echo 'That username is available.';   
    }
}
if(isset($_POST['email'])) {
    $email = $_POST['email'];
    if(email_exists($db, $email)) {        
        echo 'That email has already been registered with an account.';
    } elseif(strlen($email) != 0) {
        echo 'Valid email.';
    }
}
?>
