<?php
include '../db/connect.php';
include 'userfunctions.php';
$reviewid = $_POST['reviewid'];
$delete = $db->query("
    DELETE FROM dishreview
    WHERE reviewid='$reviewid';
");
if($delete === TRUE) echo 'Your review has been deleted.';
else echo 'There was an error running the query [' . $db->error . ']';
?>