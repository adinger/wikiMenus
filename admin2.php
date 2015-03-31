<?php


	require_once 'db/connect.php';

	?>

	<h1 align="center"> Pending Restaurant Requests </h1>
	<title>Pending</title>

	<?php
$sql = "SELECT * FROM restaurantRequests";
$result = $db->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$restaurantName = $row['Name'];
		$restaurantAddress = $row["Address"];
		$restaurantType = $row["Type"];
		$id = $row['ID'];

		?>

		<form method="POST" action="submitAdmin2.php">
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
						      <label>Address
						      <input align="center" type= "text" name="address" value="<?=$restaurantAddress?>" /> 
					  	  </li>

					  	  <li> 
						      <label>Type
						      <input align="center" type= "text" name="type" value="<?=$restaurantType?>" /> 
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
