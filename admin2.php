<?php 
ob_start(); // suppress "header must be called before first output" error
require "db/connect.php"; 
session_start(); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require "functions/userfunctions.php";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pending Restaurants</title>
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

<?php prevent_intruders_admin(); // prevent people who aren't admin from seeing page ?>     
	<h1 style="color: #8B0000" align="center"> Pending Restaurant Requests </h1>
    <p align="center"><a href="admin.php">Pending Dish Requests</a></p>
	<hr>

	<?php
    

$sql = "SELECT * FROM restaurantrequests";
$result = $db->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$restaurantName = $row['name'];
		$restaurantAddress = $row['address'];
		$id = $row['id'];

		?>

 
		<form method="POST" formaction="admin2.php">
			<div class="row">
	  			<div class="small-12 text-center columns">
	  				<table style = "width:100%">
	  					<tr>
	  				  	  <th style="color: #8B0000"> Id </th>
	  				  	  <th style="color: #8B0000"> Restaurant Name </th>
	  				  	  <th style="color: #8B0000"> Restaurant Address </th>
	  				  	  <th style="color: #8B0000"> Submit </th>
	  				  	  <th style="color: #8B0000"> Delete </th>
	  				  	</tr>

	  				  	<tr>
							<td><input align="center" name="id" value=<?=$id?> /></td>
						    <td><input align="center" name="restaurant" value="<?=$restaurantName?>" /></td>
						    <td><input align="center" type= "text" name="address" value="<?=$restaurantAddress?>" /></td>
				  			<td><input class="button round tiny success" type="submit" name="add" value="Add"  ></td>
				  			<td><input class="button round tiny alert" type="submit" name="delete" value="Delete" ></td>
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

//Will execute once submit is pressed
require_once 'db/connect.php';

//if (isset($_POST['add']) && isset($_SERVER['REQUEST_URI']))
if (isset($_POST['add']) )
{
    //header ('Location: ' . $_SERVER['REQUEST_URI']);
    
	$id = $_POST['id'];
	$restaurant = $_POST['restaurant'];
	$address = $_POST['address'];	

	$restaurantAdd = $db->prepare("INSERT INTO restaurants(name, address) VALUES (?, ?)");
	$restaurantAdd->bind_param('ss', $restaurant, $address);
	$result = $restaurantAdd->execute();
	//$result = $db->query($restaurantAdd);
	
	if($result)
		echo "The restaurant has been successfully added to restaurants table.";
	else 
		echo "Restaurant hasn't been added to database";
	
	$dishDelete = "DELETE FROM restaurantrequests WHERE id='$id'";

	if ($db->query($dishDelete) === TRUE)
	    echo " Record deleted successfully";
	else
	    echo " Error deleting record: " . $db->error;
	header ('Location: admin2.php');
}

?>

<?php
require_once 'db/connect.php';
//will execute once delete is pressed
//if (isset($_POST['delete']) && isset($_SERVER['REQUEST_URI'])) {
if (isset($_POST['delete'])) {
	//header ('Location: ' . $_SERVER['REQUEST_URI']);
	header ('Location: admin2.php');
	$id = $_POST['id'];
	$dishDelete = "DELETE FROM restaurantrequests WHERE id='$id'";
	if ($db->query($dishDelete) === TRUE)
	    echo " Record deleted successfully";
	else
	    echo " Error deleting record: " . $db->error;
}
?>
