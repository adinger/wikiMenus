<?php
include "head.php";
prevent_intruders();
?>
<div class="row">
	<div class="small-10 small-centered columns floating">
		<div class="small-12 medium-4 columns profile-info">
			<div class="profilepic">
				<a href="" class="th"><img src="data/pics/profPicPlaceholder.jpg" alt="alt"></a>
			</div>
			<h2 class="username-title"><strong><?php echo $_SESSION['username'] ?></strong></h2>
			<p><strong>Favorite Restaurants:</strong><br>
            <?php 
            $restaurant = get_fave_restaurant($db, $_SESSION["username"]);
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
            $dish = get_fave_dish($db, $_SESSION["username"]);
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
                    <?php echo $_SESSION['username'], "'s Reviews" ?>
                </strong></h4>
                <?php
                $result = get_users_reviews($db, $_SESSION["username"]);
                if($result) {
                    if($count = $result->num_rows) {
                        while($row = $result->fetch_object()) {
                            $dish = ucwords($row->name);
                            $restaurant = ucwords($row->restaurant);
                            $verbalReview = $row->verbalreview;
                            $reviewid = $row->reviewid;
                            echo '
                            <hr>
                            <div class="usersReview row">
                                <div class="small-11 small-centered columns">
                                    <h5 class="dishName"><strong>',$dish,'</strong> from <strong>',$restaurant,'</strong>&nbsp;&nbsp;&nbsp; <a href="#" data-reveal-id="writtenReview',$reviewid,'">Edit</a></h5>
                                    <h5>Rating: <strong>',$row->numericalrating,'/5</strong></h5>
                                    <p>',$verbalReview,'</p>
                                </div>
                                <div id="writtenReview',$reviewid,'" class="reveal-modal" data-reveal>
                                      <h3>',$dish,' from ',$restaurant ,'</h3>
                                      <h5>Rating: <strong>',$row->numericalrating,'/5</strong></h5>
                                      <a class="close-reveal-modal">&#215;</a>
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

<?php include 'tail.php' ?>