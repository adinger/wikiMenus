<?php
function email_exists($db, $email) {
    $result = $db->query("
        SELECT email 
        FROM users
        WHERE email='$email'    
    ");
    return $result->num_rows >= 1;
}
function username_exists($db, $username) {
    $result = $db->query("
        SELECT username 
        FROM users
        WHERE username='$username'    
    ");
    return $result->num_rows >= 1;
}
function get_users_reviews($db, $username) {
    $result = $db->query("
        SELECT dish.dishid, dish.name, dish.restaurant, review.numericalrating, review.verbalreview, review.reviewid
        FROM dish, review, dishreview
        WHERE dishreview.useremail = (
            SELECT email
            FROM users
            WHERE username='$username')
        AND dishreview.reviewid = review.reviewid
        AND dishreview.dishid = dish.dishid
        ");
    return $result;
}

function get_fave_dish($db, $username) {
    $make_view = $db->query("
        CREATE OR REPLACE VIEW usersDishRatings AS
        SELECT dish.name AS dish, dish.restaurant, numericalrating
        FROM dish, review, dishreview
        WHERE dishreview.reviewid = review.reviewid
        AND dishreview.dishid = dish.dishid
        AND dishreview.useremail = (
            SELECT email
            FROM users
            WHERE username='$username'
            )
        ");
    $result = $db->query("
        SELECT *
        FROM usersDishRatings
        GROUP BY dish 
        HAVING numericalrating = (
            SELECT MAX(numericalrating)
            FROM usersDishRatings)
        ");
    return $result;
}

function get_fave_restaurant($db, $username) {
    $make_view = $db->query("
        CREATE OR REPLACE VIEW restaurantRatings AS
        SELECT restaurant, AVG(review.numericalrating) AS avgrating 
        FROM dishreview, dish, review 
        WHERE dishreview.useremail = (
            SELECT email 
            FROM users 
            WHERE users.username = '$username')
        AND dishreview.reviewid = review.reviewid 
        AND dishreview.dishid = dish.dishid 
        GROUP BY dish.restaurant
        ");
    $result = $db->query("
        SELECT restaurant
        FROM restaurantRatings
        WHERE avgrating = (
            SELECT max(avgrating) 
            FROM restaurantRatings)
        ");
    return $result;
}

function logged_in() {
	return isset($_SESSION['username']) ? true : false;
}

function prevent_intruders() {
	if (!logged_in()) {
		echo '
        <div class="small-10 small-centered columns floating">
        <h4>You must be logged in to access the contents of this page.</h4>
		<h4>Please <a href="loginform.php">log in</a>.</h4>
        </div>';
		exit();
	}
}

function prevent_intruders_admin() {
	if (!logged_in() || $_SESSION['username'] != 'admin') {
		echo '
        <div class="small-10 small-centered columns floating">
        <h4>You must be logged in as an administrator to access the contents of this page.</h4>
		<h4>Please <a href="loginform.php">log in</a>.</h4>
        </div>';
		exit();
	}
}

?>
