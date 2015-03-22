<?php

function favorite_restaurant($db, $username) {
    $email = $db->query("
        SELECT email 
        FROM users 
        WHERE users.username = '$username'");
    $email = $email->fetch_object();
    $email = $email->email;
    $make_view = $db->query("
        CREATE OR REPLACE VIEW restaurantRatings AS
        SELECT restaurant, avg(review.numericalrating) as avgrating 
        FROM dishreview, dish, review 
        WHERE dishreview.useremail = '$email' 
        AND dishreview.reviewid = review.reviewid 
        AND dishreview.dishid = dish.dishid 
        GROUP BY dish.restaurant
        ");

    $result = $db->query("
        SELECT restaurant
        FROM restaurantRatings
        WHERE avgrating = 
        ( 
            SELECT max(avgrating)
            FROM restaurantRatings
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