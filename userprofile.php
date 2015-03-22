<?php
include "head.php";
require "db/connect.php"; 
include "functions/userfunctions.php";
prevent_intruders();

$restaurant = favorite_restaurant($db, $_SESSION["username"]);

?>

<script type="text/javascript">
$(document).ready(function() {
	var review = $('#review');
	review.text(review.text().substring(0,250)+' . . . ');
	/*var str = '<a href="#">Read more</a>',
	html = $.parseHTML(str);
	review.append($(html))*/
});
</script>
<div class="row">
	<div class="small-10 small-centered columns floating">
		<div class="small-12 medium-4 columns profile-info">
			<div class="profilepic">
				<a href="" class="th"><img src="data/pics/profPicPlaceholder.jpg" alt="alt"></a>
			</div>
			<h4 class="username-title"><strong><?php echo $_SESSION['username'] ?></strong></h4>
            <!-- TODO: logout functionality -->
			<p><strong>Favorite Restaurant:</strong><br><?php echo $restaurant; ?></p>
			<p><strong>Highest Rated Dish:</strong><br>[favorite dish]</p>
		</div>
		<div class="small-12 medium-8 columns">
			<div class="panel">
				<h4><strong><?php echo $_SESSION['username'], "'s Reviews" ?></strong></h4>
				<hr>
				<div class="usersReview">
					<h5 class="dishName">Dish: McChicken Sandwich</h5>
					<h5>Restaurant: McDonald's</h5>
					<h5>Rating: <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></h5>
					<p id="review">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet quis magna.
					</p>					
				</div>
				<hr>

			</div>
		</div>
	</div>
</div>

</body>
</html>