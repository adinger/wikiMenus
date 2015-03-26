<?php
include "head.php";
require "db/connect.php"; 
include "functions/userfunctions.php";
prevent_intruders();
// TODO: user's favorite dish

// TODO: show all user's reviews
?>
<div class="row">
	<div class="small-10 small-centered columns floating">
		<div class="small-12 medium-4 columns profile-info">
			<div class="profilepic">
				<a href="" class="th"><img src="data/pics/profPicPlaceholder.jpg" alt="alt"></a>
			</div>
			<h2 class="username-title"><strong><?php echo $_SESSION['username'] ?></strong></h2>
            <!-- TODO: logout functionality -->
			<p><strong>Favorite Restaurant(s):</strong><br>
            <?php 
            $restaurant = get_fave_restaurant($db, $_SESSION["username"]);
            if($restaurant) {
                if($count = $restaurant->num_rows) {
                    while($row = $restaurant->fetch_object()) {
                        echo ucwords($row->restaurant),'<br>';
                    }
                }
            
            } else echo 'This user has not rated anything yet';
            ?>
            </p>
			<p><strong>Favorite Dish(es):</strong><br>
            <?php 
            $dish = get_fave_dish($db, $_SESSION["username"]);
            if($dish) {
                if($count = $dish->num_rows) {
                    while($row = $dish->fetch_object()) {
                        echo ucwords($row->dish),' (',ucwords($row->restaurant),')<br>';
                    }
                }
            
            } else echo 'This user has not rated anything yet';
            ?>
            </p>
		</div>
        <!-- user's reviews -->
		<div class="small-12 medium-8 columns">
			<div class="panel">
				<h4 class="username-title"><strong>
                    <?php echo $_SESSION['username'], "'s Reviews" ?>
                </strong></h4>
				<hr>
                <?php
                $result = get_users_reviews($db, $_SESSION["username"]);
                if($result) {
                    if($count = $result->num_rows) {
                        while($row = $result->fetch_object()) {
                            echo '
                            <div class="usersReview">
                                <h5 class="dishName"><strong>',ucwords($row->name),'</strong> from <strong>',ucwords($row->restaurant),'</strong></h5>
                                <h5>Rating: <strong>',$row->numericalrating,'/5</strong></h5>
                            </div>
                            <hr>';
                        }
                    }

                } else echo 'This user has not rated anything yet';
                ?>

			</div>
		</div>
	</div>
</div>

</body>
</html>