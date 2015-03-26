<?php 
require "db/connect.php"; 
session_start(); 
require "functions/userfunctions.php";
?>
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
    	<div class="contain-to-grid sticky">
		<nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: [small,medium,large]">
		  <ul class="title-area">
		    <li class="name">
		      <h1><a href="index.php"><img src="data/pics/mainLogoWhite.png" class="mainLogo"/></a></h1>
		    </li>
		   <!--  <li class="name">Help change Menus</li> -->
		     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		  </ul>

		  <section class="top-bar-section">
		    <!-- Left Nav Section -->
		     <ul class="left">
		      <li><a href="#" data-reveal-id="Subscribe">Subscribe</a></li>
		      
		    </ul>
		    <ul class="right">
		      <li><a href="#missionSection">Mission</a></li>
		      <li class="divider"></li>
		      <li><a href="#restrauntSection">Business</a></li>
		      <li class="divider"></li>
		      <li><a href="#teamSection">Team</a></li>
		      <li class="divider"></li>
		      <li><a href="#videoSection">See It In Action</a></li>
		      <li class="divider"></li>
		      <li><a href="#contactSection">Contacts</a></li>
		      <li class="divider"></li>
                <?php
                    if(logged_in()) {
                        echo '<li><a href="logout.php">Log out</a></li>';
                    } else {
                        echo '<li><a href="loginform.php">Log in / Register</a></li>';
                    }
                ?>
		    </ul>
		  </section>
		</nav>
	</div>