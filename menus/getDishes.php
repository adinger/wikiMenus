<?php
require 'connect.php'; // The mysql database connection script
	$status = '%';
	if(isset($_GET['status'])){
	$status = $_GET['status'];
	}
	$sql ="SELECT description, course, restaurantName, dishName, price, type, averageRating FROM `Dish`";
	$result = $mysqli->query($sql);
	 
	// echo $result->num_rows;
	$arr = array();

	if($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
		 	$arr[] = $row;

		 }
	}
	
	# JSON-encode the response
	echo $json_response = json_encode($arr);
?>