<?php

require_once 'db/connect.php';

	$RestaurantName = $_POST['RestaurantName'];
	$DishName = $_POST['DishName'];
	$Price = $_POST['Price'];
	$Rating = $_POST['Rating'];
	$Type = $_POST['Type'];
	$Course = $_POST['Course'];
	$Description = $_POST['Description'];


$dishAdd = "INSERT INTO dishRequests (restaurant, dishName, price, averageRating, typetag, course, Description)
VALUES ('$RestaurantName', '$DishName', '$Price', '$Rating', '$Type', '$Course', '$Description')";

$result = $db->query($dishAdd);
if($result) {
	echo "Your request was successfully submitted. The admins will review your request.";
}
else {
	echo "Faliure";
}

?>

