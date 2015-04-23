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
  <title>Pending Dishes</title>
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
	<?php prevent_intruders_admin(); ?>
	<h1 style="color: #8B0000" align="center"> Pending Dish Requests </h1>
	    <p align="center"><a href="admin2.php">Pending Restaurant Requests</a></p>
	<hr>


	<?php

$sql = "SELECT * FROM dishrequests";
$result = $db->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$restaurantName = $row['restaurant'];
		$dishName = $row["dishName"];
		$rating =  $row['averagerating'];
		$price = $row['price'];
		$type = $row["tags"];
		$course = $row['course'];
		$id = $row['id'];
		$description = $row['description'];

		?>

		<form method="POST">
			<div class="row">
	  			<div class="small-12 text-center columns">
	  				<table style = "width:100%">
	  					<tr>
	  				  	  <th class="text-center"> Request Number: <input align="center" name="id" value=<?=$id?> /> <br> <br>
	  				  	  <input class="button round tiny success" type="submit" name="submit" value="Submit"  formaction="admin.php">
	  				  	  <input class="button round tiny alert" type="submit" name="delete" value="Delete" formaction="admin.php"></th>
	  				  	</tr>

						<tr>
							<td>
								<br> <label style="color: #8B0000">Restaurant Name: <input align="center" name="restaurant" value="<?=$restaurantName?>" /><br>
							    <br> Dish Name: <input align="center" type= "text" name="dishName" value="<?=$dishName?>" />
							    <br> Description: <input align="center" type= "text" name="description" value="<?=$description?>" />
							    <br> Rating: <input align="center" name="rating" value=<?=$rating?> /> <br>
							    <br> Price: <input align="center" name="price" value=<?=$price?> /> <br>
							    <br> Type: <input name="type" value="<?=$type?>" /> <br>
							    <br> Course: <input align="center" name="course" value="<?=$course?>" /> <br> <br>
							</td>
						    
				  		</tr>
				  	</table>
	  			</div>
	  		</div>
	  	</form>


  <script src="./js/script.js"></script>
  <script src="./lib/jquery-2.1.3.min/index.js"></script>
  <script src="./foundation/js/foundation.min.js"></script>
  <script src="http://localhost:35729/livereload.js"></script>
</body>
</html>


  		<?php
	}
}

else {
	echo "0 results";
	}

?>

<?php
if(isset($_POST['submit'])) {
	//header ('Location: ' . $_SERVER['REQUEST_URI']);
	
	$id = $_POST['id'];
	$restaurant = $_POST['restaurant'];
	$dish = $_POST['dishName'];	
	$type = $_POST['type'];

	$parsedType = explode(" ", $type);

	$course = $_POST['course'];
	$price = $_POST['price'];
	$rating = $_POST['rating'];
	$description = $_POST['description'];
    //$restaurant = htmlspecialchars($_GET['name']);
	$dishAdd = $db->prepare("INSERT INTO dish(restaurant, name, price, averagerating, course, description) VALUES (?, ?, ?, ?, ?, ?)");
	$dishAdd->bind_param('ssdiss', $restaurant, $dish, $price, $rating, $course, $description);
	$dishAdd->execute();
    //echo 'dishAdd query:' . $dishAdd;
	/*$tagAdd = $db->prepare("INSERT INTO tags(tag) VALUES (?)";
	$tagAdd->bind_param('s', $type);
	$tagAdd->execute();
	*/
	//$r = $db->query($dishAdd);	
    //if(!$r) echo $db->error;
	//the line above will add the dish to the database

	foreach($parsedType as $v) {
		$finalType = str_replace(",", " ", $v);
       // echo 'finaltype: ' . $finalType;
		$tagAdd = $db->prepare("INSERT INTO tags(tag) VALUES (?)");
		$tagAdd->bind_param('s', $finalType);
		$tagAdd->execute();
	}

// FIX RESTAURANT NAME APOSTROPHE'S ISSUE
	//dishes and tags implementation ... fragile don't change
//-------------------------------
	$identity = "";
	$tagidentity = "";

	$findDish = "SELECT * FROM dish WHERE name = '$dish' AND restaurant = '$restaurant'";
	$result1 = $db->query($findDish);
	while($row = $result1->fetch_object()) {
		$identity = $row->dishid;
	}

	foreach($parsedType as $r) {
		$finalType = str_replace(",", " ", $r);
		$tagID = "SELECT * FROM tags WHERE tag = '$finalType'";
		$result2 = $db->query($tagID);
		while($row = $result2->fetch_assoc()) {
			$tagidentity = $row['tagid'];
		}
		$tagIDinsert = $db->prepare("INSERT INTO dishesandtags(dishid, tagid) VALUES (?, ?)");
		$tagIDinsert->bind_param('ii', $identity, $tagidentity);
		$tagIDinsert->execute();

        if(!$result) die('could not insert into dishesandtags');
	}
//delete dish from admin page
	$dishDelete = "DELETE FROM dishrequests WHERE id='$id'";
	$db->query($dishDelete);
	header ('Location: admin.php');
	
}
//if(!isset($_POST['submit'])) //die('submit not set');
?>

<?php
require_once 'db/connect.php';
//will execute once delete is pressed
if (isset($_POST['delete']) && isset($_SERVER['REQUEST_URI'])) {
	header ('Location: ' . $_SERVER['REQUEST_URI']);
	$id = $_POST['id'];
	$dishDelete = "DELETE FROM dishrequests WHERE id=$id";
	$db->query($dishDelete);
}
?>
