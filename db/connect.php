<?php

error_reporting(E_ALL);
// Use following line for cpanel:
// $db = new mysqli('engr-cpanel-mysql.engr.illinois.edu', 'alding2_user1', 'cs411sp2015', 'alding2_wikimenus2');
// Use following line for localhost database:
$db = new mysqli('127.0.0.1', 'root', '', 'wikimenus', 8000);
if ($db->connect_errno) {
	echo $db->connect_error;
	die('Sorry, we are having problems.');
}

?>