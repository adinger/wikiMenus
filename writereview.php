<?php
include "head.php";
require "db/connect.php"; 

//if(isset($_GET['restaurant_name'])){
///	$restaurant_name= $db->real_escape_string(trim($_GET['restaurant_name']));
//}

?>

<html>
<h1>Write a Review</h1>
<fieldset>
<form method = "post", id = "review">
	<h3>Review Dish for <?php echo $_GET['restaurant_name']; ?></h3>
	<label for="reviewdish">Dish Name:</label>
		<select name="reviewdish" id="reviewdish">
			<option value ="dishname">Dish Name</option>
		</select>
	<label for="reviewrating">Your Rating:</label>
		<select name="reviewrating" id="reviewrating">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	<label for="reviewtext">Your Review:</label>
		<textarea name="reviewtext" id="reviewtext" rows="10" cols="30">
		</textarea>
	<label for="reviewtags">Tags (separate with commas):</label>
		<input name="reviewtags" id = "reviewtags" type = "text">
	<button type = "submit" id="reviewsubmit">Submit Review</button>
</form>
</fieldset>

<?php
	if(!empty($_POST)) {
		if(isset($_POST['reviewdish'], $_POST['reviewrating'], $_POST['reviewtext'], $_POST['reviewtags'])){
			$dish_name = trim($_POST['reviewdish']);
			$dish_rating = trim($_POST['reviewrating']);
			$dish_review = trim($_POST['reviewtext']);
			//$dish_tags = trim($_POST['reviewtags']);
			if(!empty($dish_name) && !empty($dish_rating) && !empty($dish_review)){
				$insert = $db->prepare("INSERT INTO review(reviewid, verbalreview, numericalrating) VALUES (?, ?, ?)")
				$insert->bind_param('ssi');
			}
		}
?>