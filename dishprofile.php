<?php
include "head.php";
require "db/connect.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

<html>
<h2>
	<?php 
		$name = $db->query("SELECT name FROM dish WHERE dishid = $_GET[dish]");
		$dish = ucwords($name->fetch_assoc()['name']);
		echo $dish;
	?>
</h2>
<h3>
	<?php
		$r = $db->query("SELECT averagerating FROM dish WHERE dishid = $_GET[dish]");
		$rating = $r->fetch_assoc()['averagerating'];
		echo $rating;
		echo " stars<br>";
		$p = $db->query("SELECT price FROM dish WHERE dishid = $_GET[dish]");
		$price = $p->fetch_assoc()['price'];
		echo "$";
		echo $price;
		echo " ";
		$p->free();
	?>
	(Tax not included)<div>
</h3>
<h3>
	<?php
		$t = $db->query("SELECT tagid FROM dishesandtags WHERE dishid = $_GET[dish]");
		while($row = $t->fetch_assoc()){
			$tag = $db->query("SELECT tag FROM tags WHERE tagid = $row[tagid]");
			$tags = $tag->fetch_assoc()['tag'];
			echo "Tags: ";
			echo $tags;
			$tag->free();
		}
		$t->free();
	?>
</h3>
<h5>
	<?php
		$d = $db->query("SELECT description FROM dish WHERE dishid = $_GET[dish]");
		$description = $d->fetch_assoc()['description'];
		echo $description;
		$d->free();
	?>
</h5>
<form method = "get" action="writereview.php?restaurant ='.$rid. '">
	<?php 
		$r = $db->query("SELECT restaurant FROM dish WHERE dishid = $_GET[dish]");
		$rname = $db->real_escape_string($r->fetch_assoc()['restaurant']);
		$restaurant = $db->query("SELECT id FROM restaurants WHERE name = '$rname'");
		$rid = $restaurant->fetch_assoc()['id'];
		echo "<input type='hidden' name='restaurant' value='".$rid."'>";
	?>
    <input type="submit" value="Write a Review">
</form>
<br>
<br>
<h3>Reviews</h3>

<?php
	$reviewids= $db->query("SELECT reviewid FROM dishreview WHERE dishid = $_GET[dish]");
	while($row = $reviewids->fetch_assoc()['reviewid']){
		echo "<div class='small-9 small-centered columns floating'><fieldset>";
		$u = $db->query("SELECT useremail FROM dishreview WHERE reviewid = $row");
		$useremail = $u->fetch_assoc()['useremail'];
		$useremail = $db->real_escape_string($useremail);
		$name = $db->query("SELECT username FROM users WHERE email = '$useremail'");
		$username = $name->fetch_assoc()['username'];
		echo "<p>Written by ";
		echo $username;
		echo "</p>";
		$rev = $db->query("SELECT * FROM review WHERE reviewid = $row");
		$review = $rev->fetch_assoc();
		echo $review['numericalrating'];
		echo " stars<br><br>";
		echo $review['verbalreview'];
		echo "</fieldset></div>";
		$u->free();
		$name->free();
		$rev->free();
	}
?>


</html?>