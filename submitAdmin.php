<?php
	require_once 'db/connect.php';

	$id = $_POST['id'];
	$restaurant = $_POST['restaurant'];
	$dish = $_POST['dishName'];	
	$type = $_POST['type'];
	$course = $_POST['course'];
	$price = $_POST['price'];
	$rating = $_POST['rating'];
	$description = $_POST['description'];
	
$dishAdd = "INSERT INTO Dish (restaurantName, dishName, price, description, averageRating, type, course)
VALUES ('$restaurant', '$dish', '$price', '$description', '$rating', '$type', '$course')";

$result = $db->query($dishAdd);
if($result) {
	echo " Your request was successfully submitted. The admins will review your request.";
}
else {
	echo "Faliure";
}

$dishDelete = "DELETE FROM dishRequests WHERE id=$id";

if ($db->query($dishDelete) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}


?>