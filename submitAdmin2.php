<?php
	require_once 'db/connect.php';
	$id = $_POST['rID'];
	$restaurant = $_POST['rN'];
	$address = $_POST['rA'];	
	$type = $_POST['rT'];

if($type == "Chain") {	
	$restaurantAdd = "INSERT INTO chainrestaurant (Name)
	VALUES ('$restaurant')";
	$result = $db->query($restaurantAdd);
	
	if($result)
		echo " Your request was successfully submitted. The admins will review your request.";
	else 
		echo "Faliure";
	
	$dishDelete = "DELETE FROM restaurantRequests WHERE id=$id";

	if ($db->query($dishDelete) === TRUE)
	    echo "Record deleted successfully";
	else
	    echo "Error deleting record: " . $db->error;
}

if($type == "Non Chain") {
	$restaurantAdd = "INSERT INTO nonchainrestaurant (Name, Address)
	VALUES ('$restaurant', '$address')";
	$result = $db->query($restaurantAdd);
		if($result)
			echo " Your request was successfully submitted. The admins will review your request.";
		else
			echo "Faliure";

		$dishDelete = "DELETE FROM restaurantRequests WHERE id=$id";

		if ($db->query($dishDelete) === TRUE)
		    echo "Record deleted successfully";
		else
		    echo "Error deleting record: " . $db->error;

}

?>
