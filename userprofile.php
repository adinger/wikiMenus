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
<?php
if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
    header('Location: admin.php');
}
?>
<div class="row">
	<div class="small-10 small-centered columns floating">
		<div class="small-12 medium-4 columns profile-info">
			<!--<div class="profilepic">
				<a href="" class="th"><img src="data/pics/profPicPlaceholder.jpg" alt="alt"></a>
			</div>-->
			<h2 class="username-title"><strong><?php echo $_GET['username'] ?></strong></h2>
            
			<p><strong>Favorite Restaurants:</strong><br>
            <?php 
            $restaurant = get_fave_restaurant($db, $_GET["username"]);
            if($restaurant) {
                if($count = $restaurant->num_rows) {
                    while($row = $restaurant->fetch_object()) {
                        echo ucwords($row->restaurant),'<br>';
                    }
                }
                else echo 'None';
            } 
            ?>
            </p>
			<p><strong>Favorite Dishes:</strong><br>
            <?php 
            $dish = get_fave_dish($db, $_GET["username"]);
            if($dish) {
                if($count = $dish->num_rows) {
                    while($row = $dish->fetch_object()) {
                        echo ucwords($row->dish),' (',ucwords($row->restaurant),')<br>';
                    }
                }
                else echo 'None';
            }
            ?>
            </p>
		</div>
        <!-- user's reviews -->
		<div class="small-12 medium-8 columns">
			<div class="panel">
				<h4 class="username-title text-center"><strong>
                    <?php echo $_GET['username'], "'s Reviews" ?>
                </strong></h4>
                <?php
                $result = get_users_reviews($db, $_GET["username"]);
                if($result) {
                    if($count = $result->num_rows) {
                        while($row = $result->fetch_object()) {
                            $dish = ucwords($row->name);
                            $restaurant = ucwords($row->restaurant);
                            $reviewid = $row->reviewid;
                            $review = $row->verbalreview;
                            $rating = $row->numericalrating;
                            echo '
                            <hr>
                            <div class="usersReview row">
                                <div class="small-11 small-centered columns">
                                    <h5 style="display: inline" class="dishName"><strong><a href="dishprofile.php?dish='.$row->dishid.'">',$dish,'</a></strong> from <strong><a href="menus/#/menu/'.$restaurant.'">',$restaurant,'</a></strong></h5>
                                    ';
                            if( isset($_SESSION['username']) && $_SESSION['username'] == $_GET['username']) {  // only display 'edit' and 'delete buttons when user is logged in
                               echo '<p><a href="#" data-reveal-id="editReview',$reviewid,'">Edit</a>
                                    &nbsp;&nbsp;<a href="#" data-reveal-id="deleteReview',$reviewid,'">Delete</a>
                                    </p>';
                            }
                            echo '
                                    <h5>Rating: <strong>',$rating,'/5</strong></h5>
                                    <p>',$review,'</p>
                                </div>
                                <div id="editReview',$reviewid,'"  class="reveal-modal" data-reveal>
                                    <form method="post" class="editReview" data-reviewid="',$reviewid,'">
                                      <h3>Editing review for ',$dish,' from ',$restaurant,'</h3>
                                      <label for="rating">Rating:</label>
                                      <input name="rating" class="rating" value=',$rating,' /> /5
                                      
                                      <label for="review">Review:</label>
                                      <textarea name="review" class="review" >',$review,'</textarea>
                                      
                                      <p id="feedback',$reviewid,'"></p>
                                      <input class="button" type="submit" value="Update" />
                                      <a class="close-reveal-modal">&#215;</a>
                                    </form>
                                </div>
                                <div id="deleteReview',$reviewid,'"  class="reveal-modal" data-reveal>
                                    <form method="post" class="deleteReview" data-reviewid="',$reviewid,'">
                                        <p>Are you sure you want to delete this review?</p>
                                        <p id="feedback2',$reviewid,'"></p>
                                        <input class="button" type="submit" value="Yes" />
                                        <a class="close-reveal-modal">&#215;</a>
                                    </form>
                                </div>
                            </div>
                            ';
                        }
                    }
                    else echo '<p>This user has not reviewed anything yet</p>';
                } 
                ?>

			</div>
		</div>
	</div>
</div>
<script>    
$(document).ready(function() {
    //$('#feedback').load('functions/updateReview.php').show();
    $('.editReview').submit(function(event) {
        event.preventDefault();
        var $form = $(this);
        var _reviewid = String($form.data('reviewid'));
        var _rating = String($form.find(".rating").val());
        var _review = String($form.find(".review").val());
        $('#feedback' + _reviewid).load('functions/updateReview.php').show();
        $.post('functions/updateReview.php', { reviewid: _reviewid, rating: _rating, review: _review }, function(result) {
            $('#feedback' + _reviewid).html(result).show();
        });
    });
    $('.deleteReview').submit(function(event) {
        event.preventDefault();
        var $form = $(this);
        var _reviewid = String($form.data('reviewid'));
        $('#feedback2' + _reviewid).load('functions/deleteReview.php');
        $.post('functions/deleteReview.php', { reviewid: _reviewid }, function(result) {
            document.location.href = window.location.href;
        });
    }); 
}); 
</script>
<?php include 'tail.php' ?>