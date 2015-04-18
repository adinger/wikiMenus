<?php 

ob_start(); // suppress "header must be called before first output" error
require "db/connect.php"; 
session_start(); 
require "functions/userfunctions.php";
//$FORM['name'] = "";
if (isset($_GET['name'])) {
   $temp = htmlspecialchars($_GET['name']);
} else {
     die("name isn't set");
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dish Request</title>
<!--   hh
   <script src="./lib/angular/angular.min.js"></script>
   <script src="./js/controllers.js"></script>
   hh -->
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./foundation/css/foundation.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
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
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
        <!-- Left Nav Section -->
         <ul class="left">
           <li><a href="./restaurantRequest.php" data-reveal-id="Subscribe">Request New Restaurant</a></li>
          
        </ul>
        <ul class="right">
              <li class="divider"></li>
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

<!--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css">
 -->
	<h1 style="color: #8B0000" class="text-center"> Submit Your Dish Request </h1>
	<hr>
<?php

if (!empty($_POST)) {
    if(isset($_POST['submit'])) {
        $RestaurantName = $_POST['RestaurantName'];
        $DishName = $_POST['DishName'];
        $Price = $_POST['Price'];
        $Rating = $_POST['Rating'];
        $Type = $_POST['Type'];
        $Course = $_POST['Course'];
        $Description = $_POST['Description'];
        $insert = $db->prepare("INSERT INTO dishrequests (dishName, restaurant, price, tags, course, description, averagerating) VALUES (?,?,?,?,?,?,?)");
        $insert->bind_param('ssisssi',$DishName, $RestaurantName, $Price, $Type, $Course, $Description, $Rating);
        if($insert->execute()) {
            echo '<p align="center" style="color:green">Your dish request has successfully been sent.</p>';
        } else {
            die("could not execute query"); 
        }
    } //else die("submit not set");
} //else die("post is empty");

?>
 	<form method="POST" data-abide>
		
    <div class ="row">
			<div class="large-12 large-centered columns">
      	<label style="color: #8B0000">Restaurant Name
        <input name = "RestaurantName" value="<?php echo $temp;?>" readonly="readonly" type="text" required/>
      </div>
    </div>
      	
    <div class ="row">
			 <div class="large-12 large-centered columns">
  			 <label style="color: #8B0000">Dish Name <small>Required</small>
    		  <input name ="DishName" type="text" placeholder="Burrito Bowl" required/>
  		  </div>
  	</div>

      	<div class ="row">
			     <div class="large-12 large-centered columns">
      			   <label style="color: #8B0000">Description <small>Required</small>
        			<input name ="Description" type="text" placeholder="Flour tortilla, choice of cilantro-lime rice, pinto or black beans, meat" required/>
      		</div>
      	</div>

      	<div class ="row">
			       <div class="large-12 large-centered columns">
      			 <label style="color: #8B0000">Price <small>Required</small>
        			<input name = "Price" type="number" placeholder="5" required/>
      		</div>
      	</div>
      	
        <div class ="row">
			     <div class="large-12 large-centered columns">
      			<label style="color: #8B0000">Rating <small>Required</small> <small> Only integers will be accepted!</small>
        			<input name = "Rating" type="number" placeholder="1-5" min="1" max="5" required/>
      		</div>
      	</div>

      	 <div class="row">
		      <div class="large-12 large-centered columns">
		      <label style="color: #8B0000">Tags <small>Enter separated by spaces and NO punctuation.</small>
		        <input name = "Type" type="text" placeholder="koreanfood healthy " />
		      <!-- </label> -->
		    </div>
  		</div>

  		 <div class="row">
		    <div class="large-12 large-centered columns">
		      <label style="color: #8B0000">Course
		        <select name="Course">
		          <option value="Appetizer">Appetizer</option>
		          <option value="Entree">Entree</option>
		          <option value="Dessert">Dessert</option>
		          <option value="Beverage">Beverage</option>
		        </select>
		      </label>
		    </div>
  		</div>
  		
  		<div class="row">
  			<div class="large-12 large-centered text-center columns">
  				<input class="button alert tiny round" type="submit" name="submit" value="Submit">
  			</div>
  		</div>
  	</form>

<!-- hh
  <script src="./js/script.js"></script>
  <script src="./lib/jquery-2.1.3.min/index.js"></script>
  <script src="./foundation/js/foundation.min.js"></script>
  <script src="http://localhost:35729/livereload.js"></script>
  hh -->
</body>
</html>
<?php ob_end_flush();  ?>