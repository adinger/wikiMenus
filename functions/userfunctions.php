<?php

function favorite_restaurant($db, $username) {
    $email = $db->query("SELECT email FROM users WHERE users.username = '$username'");
    $email = $email->fetch_object();
    $email = $email->email;
    $make_view = $db->query("create view restaurantRatings as 
        (
            select restaurant, avg(review.numericalrating) as avgrating 
            from dishreview, dish, review 
            where dishreview.useremail = '$email' 
            and dishreview.reviewid = review.reviewid 
            and dishreview.dishid = dish.dishid 
            group by dish.restaurant
        )");

    $result = $db->query("
        select restaurant
        from restaurantRatings
        where avgrating = 
        ( 
            select max(avgrating)
            from restaurantRatings
        )");
    $result = $result->fetch_object();
    return $result->restaurant;
}

function logged_in() {
	return isset($_SESSION['username']) ? true : false;
}

function prevent_intruders() {
	if (!logged_in()) {
		echo '<h4>You must be logged in to access the contents of this page.</h4>
		<h4>Please <a href="index.php">go to the homepage</a> and log in.</h4>';
		exit();
	}
}

?>