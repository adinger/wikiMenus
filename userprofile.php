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
                            $reviewid = $row->reviewid;
                            $review = $row->verbalreview;
                            $rating = $row->numericalrating;
                            echo '
                            <hr>
                            <div class="usersReview row">
                                <div class="small-11 small-centered columns">
                                    <h5 class="dishName"><strong>',$dish,'</strong> from <strong>',$restaurant,'</strong>
                                    &nbsp;&nbsp;&nbsp;<a href="#" data-reveal-id="writtenReview',$reviewid,'">Edit</a></h5>
                                    <h5>Rating: <strong>',$rating,'/5</strong></h5>
                                    <p>',$review,'</p>
                                </div>
                                <div id="writtenReview',$reviewid,'"  class="reveal-modal" data-reveal>
                                    <form method="post" class="editReview" data-reviewid="',$reviewid,'">
                                      <h3>Editting review for ',$dish,' from ',$restaurant,'</h3>
                                      <label for="rating">Rating:</label>
                                      <input name="rating" class="rating" value=',$rating,' /> /5
                                      
                                      <label for="review">Review:</label>
                                      <textarea name="review" class="review" >',$review,'</textarea>
                                      
                                      <p id="feedback',$reviewid,'"></p>
                                      <input class="button" type="submit" value="Update" />
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
        $('#feedback').load('functions/updateReview.php').show();
    $('.editReview').submit(function(event) {
        event.preventDefault();
        //if(request) request.abort();
        var $form = $(this);
        var reviewid1 = String($form.data('reviewid'));
        var rating1 = String($form.find(".rating").val());
        var review1 = String($form.find(".review").val());
        //alert(review1);
        $.post('functions/updateReview.php', { reviewid: reviewid1, rating: rating1, review: review1 }, function(result) {
            $('#feedback'+reviewid1).html(result).show();
        });
    });    
}); 
</script>
<?php include 'tail.php' ?>