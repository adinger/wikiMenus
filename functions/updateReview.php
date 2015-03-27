<?php
include '../db/connect.php';
include 'userfunctions.php';
//echo '<p>hiiii</p>';
if (isset($_POST['rating']) && isset($_POST['review'])) {
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $reviewid = $_POST['reviewid'];
    $db->query("
        UPDATE review
        SET numericalrating='$rating', verbalreview='$review'
        WHERE reviewid='$reviewid'
    ");
    echo 'Your review has been updated.';
}
?>
