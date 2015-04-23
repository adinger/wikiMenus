<?php
include "head.php";
require "db/connect.php"; 

if(!isset($_SESSION['username'])){
	header('Location: loginform.php');
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

<html>
<center><h2 class="username-title">Write A Review</h2></center>
	<div class="small-10 small-centered columns floating">
		<div class = "reviewform">
	<fieldset>
	<form method = "post", id = "review">
		<h3 class = "username-title">Review a Dish for 
			<?php 
			$name = $db->query("SELECT name FROM restaurants WHERE id = $_GET[restaurant]");
			$restaurant = ucwords($name->fetch_assoc()['name']);
			echo $restaurant;
			$name->free();
			?>
		</h3>
		<label for="reviewdish">Dish Name:</label>
			<select name="reviewdish" id="reviewdish">
			<?php
			$dishname = $db->query("SELECT name FROM dish WHERE restaurant = (SELECT name FROM restaurants WHERE id = $_GET[restaurant])");
			
			while($row = $dishname->fetch_assoc()){
                if(ucwords($row['name']) == $_GET['dishname']) {
                    echo "<option value ='" .$row['name']. "' selected> " .ucwords($row['name']). " </option>";
                } else
                    echo "<option value ='" .$row['name']. "' > " .ucwords($row['name']). " </option>";
			}
			$dishname->free();
			?>
				
			</select>
		<label for="reviewrating">Your Rating:</label>
			<input type="text" name="reviewrating" id="reviewrating" placeholder="e.g. 4.5"></input>
		<label for="reviewtext">Your Review:</label>
			<textarea name="reviewtext" id="reviewtext" rows="10" cols="30"></textarea>
		<button type = "submit" id="reviewsubmit">Submit Review</button>
	</form>
	</fieldset>
</div>

<?php
	if(!empty($_POST)) {
		if(isset($_POST['reviewdish'], $_POST['reviewrating'], $_POST['reviewtext'])){
			$dish_name = $db->real_escape_string($_POST['reviewdish']);
			
			$n = $db->query("SELECT * FROM dish WHERE name = '$dish_name'");
			$dish_id = $n->fetch_assoc()['dishid'];
			
			$dish_rating = trim($_POST['reviewrating']);
			$dish_review = trim($_POST['reviewtext']);
			$email = $db->query("SELECT email FROM users WHERE username = '$_SESSION[username]' ");
			$user_email = $email->fetch_assoc()['email'];
			if(!empty($dish_name) && !empty($dish_rating) && !empty($dish_review)){
				$insert = $db->prepare("INSERT INTO review(verbalreview, numericalrating) VALUES (?, ?)");
				$insert->bind_param('si', $dish_review, $dish_rating);

				if($insert->execute()){
					$dish_review2 = $db->real_escape_string($dish_review);

					$review= $db->query("SELECT reviewid FROM review WHERE verbalreview = '$dish_review2'");
					
					$review_id = $review->fetch_assoc()['reviewid'];
					
					$in = $db->prepare("INSERT INTO dishreview(dishid, reviewid, useremail) VALUES(?, ?, ?)");
					$in->bind_param('iis', $dish_id, $review_id, $user_email);
					
					if($in->execute()){
						header('Location: userprofile.php?username='.$_SESSION['username']);
						die();
					}
				}
			}
		}
	}
?>
<div>
</html>
<?php include 'tail.php' ?>
    