<?php

	require_once 'db/connect.php';
	?>

	<h1 align="center"> Pending Requests </h1>
	<title>Pending</title>

	<?php

$sql = "SELECT * FROM dishRequests";
$result = $db->query($sql);

$sql2 = "SELECT * FROM restaurantRequests";
$result2 = $db->query($sql2);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$restaurantName = $row['restaurant'];
		$dishName = $row["dishName"];
		$rating =  $row['averageRating'];
		$price = $row['price'];
		$type = $row["typetag"];
		$course = $row['course'];
		$id = $row['id'];
		$description = $row['Description'];

		?>

		<form method="POST" action="submitAdmin.php">
			<div class="row">
	  			<div class="small-4 text-center columns">
	  				  <ul>
	  				  	  <li style="visibility: hidden">
			  				  <label>Id
						      <input align="center" name="id" value=<?=$id?> />
						  </li>
		  				  <li>
			  				  <label>Restraunt Name
						      <input align="center" name="restaurant" value="<?=$restaurantName?>" />
						  </li>

						  <li> 
						      <label>Dish Name
						      <input align="center" type= "text" name="dishName" value="<?=$dishName?>" /> 
					  	  </li>

					  	  <li> 
						      <label>Description
						      <input align="center" type= "text" name="description" value="<?=$description?>" /> 
					  	  </li>

					      
					      <li>
						      <label>Rating
						      <input align="center" name="rating" value=<?=$rating?> />
					  	  </li>


					      <li>
						      <label>Price 
						      <input align="center" name="price" value=<?=$price?> />
					      </li>

					      <li>
						      <label>Type
						      <input align="center" name="type" value=<?=$type?> /> 
						  </li>
					      
					      <li>
						      <label>Course
						      <input align="center" name="course" value=<?=$course?> /> 
						  </li>

						</ul>

						<div style="text-align:left">
				  			<input type="submit" name="submit" value="Submit">
				  		</div>
	  			
	  			</div>
	  		</div>
	  	</form>
  		
  		<?php
	}
}

else {
	echo "0 results";
	}

	?>

	<?php


if($result2->num_rows > 0) {
	while($row2 = $result2->fetch_assoc()) {
		$nameRestaurant = $row2['Name'];
		$restaurantAddress = $row2["Address"];
		$restaurantType = $row2["Type"];
		$restaurantid = $row2['ID'];

		?>

		<form method="POST" action="submitAdmin2.php">
			<div class="row">
	  			<div class="small-4 text-center columns">
	  				  <ul>
	  				  	  <li style="visibility: hidden">
			  				  <label>Id
						      <input align="center" name="rID" value=<?=$restaurantid?> />
						  </li>
		  				  <li>
			  				  <label>Restraunt Name
						      <input align="center" name="rN" value="<?=$nameRestaurant?>" />
						  </li>

						  <li> 
						      <label>Address
						      <input align="center" type= "text" name="rA" value="<?=$restaurantAddress?>" /> 
					  	  </li>

					  	  <li> 
						      <label>Type
						      <input align="center" type= "text" name="rT" value="<?=$restaurantType?>" /> 
					  	  </li>

						</ul>

						<div style="text-align:left">
				  			<input type="submit" name="submit" value="Submit">
				  		</div>
	  			
	  			</div>
	  		</div>
	  	</form>
  		<?php
	}
}

else {
	echo "0 results";
	}

?>
