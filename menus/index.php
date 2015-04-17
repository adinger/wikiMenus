<?php 
ob_start(); // suppress "header must be called before first output" error
require "../db/connect.php"; 
session_start(); 
require "../functions/userfunctions.php";
?>


<!DOCTYPE html>
<html>
<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="app.js"></script>
  <script type="text/javascript" src="controller.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
<!--   <link rel="stylesheet" href="../css/styles.css"> -->
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,500|Arvo:700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 
  

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
  <link rel="shortcut icon" href="../data/pics/favicon.ico" type="image/x-icon" />  
  <link rel="stylesheet" href="../foundation/css/foundation.css">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body ng-app="menuApp">

  <div class="contain-to-grid sticky">
    <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: [small,medium,large]">
      <ul class="title-area">
        <li class="name">
          <h1><a href="../index.php"><img src="../data/pics/mainLogoWhite.png" class="mainLogo2"/></a></h1>
        </li>
       <!--  <li class="name">Help change Menus</li> -->
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
        <!-- Left Nav Section -->
         <ul class="left">
           <li><a href="../restaurantRequest.php" data-reveal-id="Subscribe">Request New Restaurant</a></li>
          
        </ul>
        <ul class="right">
          <li><a href="~alding2/wikimenus">Mission</a></li>
          <li class="divider"></li>
          <li><a href="~alding2/wikimenus/#restrauntSection">Business</a></li>
          <li class="divider"></li>
          <li><a href="~alding2/wikimenus/#teamSection">Team</a></li>
          <li class="divider"></li>
          <li><a href="~alding2/wikimenus/#videoSection">See It In Action</a></li>
          <li class="divider"></li>
          <li><a href="~alding2/wikimenus/#contactSection">Contacts</a></li>
          <li class="divider"></li>
                <?php
                    if(logged_in()) {
                        echo '<li><a href="../logout.php">Log out</a></li>';
                    } else {
                        echo '<li><a href="../loginform.php">Log in / Register</a></li>';
                    }
                ?>
        </ul>
      </section>
    </nav>
  </div>
    

	<div ng-view class="row">

		

		
		
	</div>

</body>
</html>


