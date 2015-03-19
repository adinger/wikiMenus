<?php

function login($username, $password) {
	$username = sanitize($username);	
	$password = md5($password);
	$query = $db->query("SELECT COUNT(*) FROM users WHERE username='$username' AND password='$password'");
	return (mysql_result($query,0) == 1) ? $username : false;
}

?>