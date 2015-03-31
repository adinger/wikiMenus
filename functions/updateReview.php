<?php
include '../db/connect.php';
include 'userfunctions.php';

if (isset($_POST['rating']) && isset($_POST['review'])) {
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $reviewid = $_POST['reviewid'];
    /*$db->query("
        UPDATE review
        SET numericalrating='$rating', verbalreview='$review'
        WHERE reviewid='$reviewid'
    ");
    echo 'Your review has been updated.';*/
    $update = $db->prepare("
        UPDATE review
        SET numericalrating='?', verbalreview='?'
        WHERE reviewid='$reviewid'
    ");
    $update->bind_param('ds', $rating, $review);    // "ds" = double, String
    if($update->execute()) {
        echo 'Your review has been updated.';
    }
}
?>
