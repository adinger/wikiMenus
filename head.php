<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>wikiMenus</title>
  <script src="./lib/angular/angular.min.js"></script>
  <script src="./js/controllers.js"></script>
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./foundation/css/foundation.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
  <link rel="shortcut icon" href="data/pics/favicon.ico" type="image/x-icon" />  
  <link href="http://fonts.googleapis.com/css?family=Rancho" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Gudea" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php require "db/connect.php"; ?>	<!--connect to database-->
</head>
<body>