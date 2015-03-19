<?php

function logged_in() {
	return isset($_SESSION['username']) ? true : false;
}
function prevent_intruders() {
	if (!logged_in()) {
		echo '<h4>Sorry, you must be logged in to access the contents of this page.</h4>
		<h4>Please <a href="loginform.php">log in</a>.</h4>';
		exit();
	}
}
?>