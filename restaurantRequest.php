<?php

require_once 'db/connect.php';


// if (isset ($_POST['Name']) && ($_POST['Address']) && ($_POST['Type'])) {
// 	$Name = $_POST['Name'];
// 	$Address = $_POST['Address'];
// 	$Type = $_POST['Type'];
	
// 	if(!empty($Name) && !empty($Address) && !empty($Type)) {
// 		echo 'OK!';
// 	}
// 	else {
// 		echo 'All Fields Are Needed';
// 	}

// }

?>

<html>
<head>
	<title>RestaurantRequest</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css">
</head>
<body>

	<h1 class="text-center"> Submit Your Restaurant Request </h1>

	<form method="POST" action="submitRestaurant.php">
		<div class ="row">
			<div class="large-8 large-centered columns">
      			<label>Restraunt Name
        			<input name = "Name" type="text" placeholder="Chipotle" />
      		</div>
      	</div>
      	<div class ="row">
			<div class="large-8 large-centered columns">
      			<label>Address
        			<input name ="Address" type="text" placeholder="1010 W. Green St. Urbana, IL, 61801" />
      		</div>
      	</div>

      	<div class="row">
		    <div class="large-8 large-centered columns">
		      <label>Type
		        <select name="Type">
		          <option value="Chain">Chain</option>
		          <option value="Non Chain">Non Chain</option>
		        </select>
		      </label>
		    </div>
  		</div>

  		<div class="row">
  			<div class="large-8 large-centered text-center columns">
  				<input type="submit" name="submit" value="Sent">
  			</div>
  		</div>
  	</form>

</body>
</html>



