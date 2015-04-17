<?php 
ob_start(); // suppress "header must be called before first output" error
require "db/connect.php"; 
session_start(); 
require "functions/userfunctions.php";
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Restaurant Request</title>

  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./foundation/css/foundation.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
  <link rel="shortcut icon" href="data/pics/favicon.ico" type="image/x-icon" />  
  <link href="http://fonts.googleapis.com/css?family=Rancho" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Gudea" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
           <li><a href="./restaurantRequest.php" data-reveal-id="Subscribe">Request New Restaurant</a></li>
          
        </ul>
        <ul class="right">
          <li><a href="http://web.engr.illinois.edu/~alding2/wikimenus/#missionSection">Mission</a></li>
		      <li class="divider"></li>
		      <li><a href="http://web.engr.illinois.edu/~alding2/wikimenus/#restrauntSection">Business</a></li>
		      <li class="divider"></li>
		      <li><a href="http://web.engr.illinois.edu/~alding2/wikimenus/#teamSection">Team</a></li>
		      <li class="divider"></li>
		      <li><a href="http://web.engr.illinois.edu/~alding2/wikimenus/#videoSection">See It In Action</a></li>
		      <li class="divider"></li>
		      <li><a href="http://web.engr.illinois.edu/~alding2/wikimenus/#contactSection">Contacts</a></li>
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

  <h1 style="color: #8B0000" class="text-center"> Submit Your Restaurant Request </h1>
  <hr>

  <form method="POST" data-abide>
    <div class ="row">
      <div class="large-12 large-centered columns">
            <label style="color: #8B0000">Restraunt Name <small>Required</small>
              <input name = "NameN" type="text" placeholder="Chipotle" required />
          </div>
        </div>
        <div class ="row">
      <div class="large-12 large-centered columns">
            <label style="color: #8B0000">Address <small>Enter Only if Non-Chain restaurant</small>
              <input name ="Address" type="text" placeholder="1010 W. Green St" />
          </div>
        </div>

      <div class="row">
        <div class="large-12 large-centered text-center columns">
          <input class="button alert tiny round" type="submit" name="submit" value="Submit">
        </div>
      </div>
    </form>

  
  <script src="./lib/jquery-2.1.3.min/index.js"></script>
  <script src="./foundation/js/foundation.min.js"></script>

</body>
</html>


<?php

if (isset($_POST['submit']) && isset($_SERVER['REQUEST_URI']))

{
    header ('Location: ' . $_SERVER['REQUEST_URI']);
    $Name = $_POST['NameN'];
    $Address = $_POST['Address']; 
    $restaurantAdd = "INSERT INTO restaurantrequests(name, address) VALUES ('$Name', '$Address')"; 
    $result = $db->query($restaurantAdd);

}

?>

<?php ob_end_flush();  ?>