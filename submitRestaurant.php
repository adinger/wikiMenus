<?php

require_once 'db/connect.php';

	$Name = $_POST['Name'];
	$Address = $_POST['Address'];	
	$Type = $_POST['Type'];


$restaurantAdd = "INSERT INTO restaurantRequests (Name, Address, Type)
VALUES ('$Name', '$Address', '$Type')";

$result = $db->query($restaurantAdd);
if($result) {
	echo "Your request was successfully submitted. The admins will review your request.";
}
else {
	echo "Faliure";
}

?>

