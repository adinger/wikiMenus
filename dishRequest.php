<?php

require_once 'db/connect.php';

if (isset ($_POST['RestaurantName']) && ($_POST['DishName']) && ($_POST['Price']) && ($_POST['Rating']) && ($_POST['Description']) && ($_POST['Type']) && ($_POST['Course'])) {
	$RestaurantName = $_POST['RestaurantName'];
	$DishName = $_POST['DishName'];
	$Price = $_POST['Price'];
	$Rating = $_POST['Rating'];
	$Type = $_POST['Type'];
	$Course = $_POST['Course'];
	$Description = $_POST['Description'];


	if(!empty($RestaurantName) && !empty($DishName) && !empty($Description) && !empty($Price) && !empty($Rating) && !empty($Type) && !empty($Course)) {
		echo 'OK!';
	}
	else {
		echo 'All Fields Are Needed';
	}

}

?>

<html>
<head>
	<title>DishRequest</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css">
</head>
<body>

	<h1 class="text-center"> Submit Your Dish Request </h1>

	<form method="POST" action="submitDish.php">
		<div class ="row">
			<div class="large-8 large-centered columns">
      			<label>Restraunt Name
        			<input name = "RestaurantName" type="text" placeholder="Chipotle" />
      		</div>
      	</div>
      	<div class ="row">
			<div class="large-8 large-centered columns">
      			<label>Dish Name
        			<input name ="DishName" type="text" placeholder="Burrito Bowl" />
      		</div>
      	</div>

      	<div class ="row">
			<div class="large-8 large-centered columns">
      			<label>Description
        			<input name ="Description" type="text" placeholder="Flour tortilla, choice of cilantro-lime rice, pinto or black beans, meat" />
      		</div>
      	</div>

      	<div class ="row">
			<div class="large-8 large-centered columns">
      			<label>Price
        			<input name = "Price" type="number" placeholder="$5" />
      		</div>
      	</div>
      	<div class ="row">
			<div class="large-8 large-centered columns">
      			<label>Rating
        			<input name = "Rating" type="number" placeholder="1-5" min="1" max="5" />
      		</div>
      	</div>

      	 <div class="row">
		    <div class="large-8 large-centered columns">
		      <label>Type
		        <select name="Type">
		          <option value="Sandwich">Sandwich</option>
		          <option value="Pizza">Pizza</option>
		          <option value="Burger">Burger</option>
		          <option value="Burrito">Burrito</option>
		        </select>
		      </label>
		    </div>
  		</div>

  		 <div class="row">
		    <div class="large-8 large-centered columns">
		      <label>Course
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
  			<div class="large-8 large-centered text-center columns">
  				<input type="submit" name="submit" value="Sent">
  			</div>
  		</div>
  	</form>

</body>
</html>



