<?php 
include '../head.php';

if(!empty($_POST)) {
    if(isset($_POST['username'])) {
        $username = trim($_POST['username']);
        $str = 'Location: ../userprofile.php?username='.$username;
        header($str);

    } else echo 'post is not set';
} else echo 'post is empty';

include '../tail.php';

?>