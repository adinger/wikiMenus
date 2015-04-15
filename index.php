<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>wikiMenus</title>

 <meta charset="UTF-8">
  <title>wikiMenus</title>
  <!-- <script src="./lib/angular/angular.min.js"></script>
  <script src="./js/app.js"></script>
  <script src="./js/controllers.js"></script> -->
  <link rel="stylesheet" href="./css/styles.css">
  <link rel="stylesheet" href="./foundation/css/foundation.css">
  

  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
  <script src="./js/app.js"></script>
  <script src="./js/controllers.js"></script> 

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
  <link rel="shortcut icon" href="data/pics/favicon.ico" type="image/x-icon" />  
  <link href="http://fonts.googleapis.com/css?family=Rancho" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Gudea" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <?php require "db/connect.php"; ?>	<!--connect to database-->
</head>


<body ng-app="menuApp" ng-controller="mainPageController">
	<div class="contain-to-grid sticky">
		<nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: [small,medium,large]">
		  <ul class="title-area">
		    <li class="name">
		      <h1><a href="#"><img src="data/pics/mainLogoWhite.png" class="mainLogo"/></a></h1>
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
		      <li><a href="#missionSection">Mission</a></li>
		      <li class="divider"></li>
		      <li><a href="#restrauntSection">Business</a></li>
		      <li class="divider"></li>
		      <li><a href="#teamSection">Team</a></li>
		      <li class="divider"></li>
		      <li><a href="#videoSection">See It In Action</a></li>
		      <li class="divider"></li>
		      <li><a href="#contactSection">Contacts</a></li>
		      <li class="divider"></li>
		      <li><a href="loginform.php">Log in / Register</a></li>
		    </ul>
		  </section>
		</nav>
	</div>
	

	<header id= "mainHeader"class="row">
			
		<div class="small-7 small-centered columns backdrop" id="searchBox">

			<h2 id="dynamicText" class="text-center"></h2>

            <div class="row collapse postfix-radius">
                <div class="small-10 small-centered columns">
                    <div class="row collapse postfix-radius">
                        <div class="small-10 columns">
                            <input id="autocomplete" type="text" placeholder="Restraunt Name, ZipCode, Cusine">
                        </div>
                        <div class="small-2 columns">
                             <a href="#" class="button postfix custom-button-class" id="wikiButton">Go</a>
                        </div>
                    </div>
                </div>
			</div>
            
            <h4 class="text-center" style="color:white">- OR -</h4>
            <h3 class="text-center" style="color:white">What would you like to eat today?</h3>
            
            <div class="row collapse postfix-radius">
                <div class="small-10 small-centered columns">
                    <form method="post" action="tagSearch.php">
                        <div class="row collapse postfix-radius">
                            <div class="small-10 columns">
                                 <input name="tag" type="text" placeholder="e.g. hamburger" required>
                            </div>
                            <div class="small-2 columns">
                                <input class="button postfix custom-button-class" id="wikiButton" type="submit">Go</input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                
        </div>
	</header>
	<!-- <div id="missionAnchor"></div> -->
	<div class="row" id="missionSection">
		<div class="small-12 columns">
			
			<div class="row">
				<div class="small-10 small-centered columns text-center">
					<h3 class="title">Let's tell the world exactly what's good and what's not!</h3>
					<h4 class="subTitle"> Ever wonder what to eat at a restraunt? Wikimenus hopes to solve the problem. We have millions of review on actual menu items. At a restraunt already? Join the movement! Its easy as three steps: </h4>
				</div>
			</div>


			<div class="row">
				
				<div class="small-12 medium-4 large-4 columns text-center" id="rightBefore">
					<h5 id="missionSubtitle"> Just open our app</h5>
					<div class="imageWrapper" id="imageWrapper1">
						<img src="data/pics/iphoneScreen.png" width="100px" height="200px">
						<img id ="iphoneLogo" src="data/pics/mainLogo.png">
					</div>
				</div>

				<div class="small-12 medium-4 large-4 columns text-center">
					<h5 id="missionSubtitle"> We'll open the menu </h5>
					<div class="imageWrapper" id="imageWrapper2">
						<img src="data/pics/iphoneTracked.png" width="200px" height="200px">
					</div>
				</div>

				<div class="small-12 medium-4 large-4 columns text-center">
					<h5 id="missionSubtitle">  Tell us how it is</h5>
					<div class="imageWrapper" id="imageWrapper3">
						<img src="data/pics/iphoneScreen.png" width="100px" height="200px">
						<h3> BBQ Chicken Pizza</h3>
						<div id="dynamicReviewWrapper">
							<h4 id="dynamicReview"> </h2>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="row" id="restrauntSection">
		<div class="small-12 columns">	
			<div class="row">
					<div class="small-10 small-centered columns text-center">
						<h3 class="title" id="restrauntTitle">The best chefs and restraunts love wikiMenus! </h3>
						<h4 class="subTitle"> If you own a restraunt you can personally work with us to provide your customers with your most up to date menus. Thats not all! We will provide with an interface that will give you the most up to date data on exactly which menu items are good and whats not. Don't think you need it, look what some of your contemporaries have to say about us. </h4>
							
					</div>
			</div>
			
			<div class="row">
				<div class="small-10 small-centered columns text-center">
					<ul class="example-orbit-content" data-orbit>
					  
					  <li data-orbit-slide="headline-1">
					    
					    <div class="row" id="restraunt">

					      <div class="small-4 columns text-center" id="collumn1">
					      	<!-- <h1>Gordon Ramsey</h1> -->
					 
					      	<img class= "text-center"src="data/pics/Ramsay.png" id="chefImage" width="50%" height="50%">

					      </div>

					      <div class="small-8 columns text-center">
					      	<h5><blockquote id="myBlockQuote"><i class="fa fa-quote-left fa-3x pull-left fa-border"></i>
							...tomorrow we will run faster, stretch out our arms farther...
							And then one fine morning— So we beat on, boats against the
							current, borne back ceaselessly into the past. </i> <i class="fa fa-quote-right fa-3x pull-right fa-border"></i></blockquote></h5>
							<h2><blockquote><cite>Gordon Ramsay</cite></blockquote></h2>
					      </div>

					    </div>

					  </li>

					  <li data-orbit-slide="headline-2">
					    
					    <div class="row" id="restraunt">

					      <div class="small-4 columns text-center" id="collumn1">
					      	<!-- <h1>Gordon Ramsey</h1> -->
					 
					      	<img class= "text-center"src="data/pics/wolfgangPuck.png" id="chefImage" width="50%" height="50%">

					      </div>

					      <div class="small-8 columns text-center">
					      	<h5><blockquote id="myBlockQuote"><i class="fa fa-quote-left fa-3x pull-left fa-border"></i>
							Any time I want to inform millions of potential of our delicious daily special or a new menu item, I use wikiMenus. My customers love it and I love it too!</i> <i class="fa fa-quote-right fa-3x pull-right fa-border"></i></blockquote></h5>
					      	<h2><blockquote><cite>Wolfgang Puck</cite></blockquote></h2>
					      </div>

					    </div>

					  </li>

					  <li data-orbit-slide="headline-3">
					    
					    <div class="row" id="restraunt">

					      <div class="small-4 columns text-center" id="collumn1">
					      <!-- 	<h1>Gordon Ramsey</h1> -->
					 
					      	<img class= "text-center"src="data/pics/anthony.png" id="chefImage" width="50%" height="50%">

					      </div>

					      <div class="small-8 columns">
					      	<h5><blockquote id="myBlockQuote"><i class="fa fa-quote-left fa-3x pull-left fa-border"></i>
							I travel all around the world and am never completely sure what to get. Wiki Menu has menus for the most obscure restraunts and I can always rely on their reviews to pick the best things to eat a potential restraunt. <i class="fa fa-quote-right fa-3x pull-right fa-border"></i></blockquote></h5>
					      	<h2><blockquote><cite>Anthony Bordain</cite></blockquote></h2>
					      	
					      </div>

					    </div>

					  </li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="row" id="teamSection">
		<div class="small-12 columns">

			<div class="row">
				<div class="small-10 small-centered columns text-center">
					<h3 class="title" id="teamTitle">Small Company with Big Dreams</h3>
					<h4 class="subTitle" id="teamSubTitle">Like many startups, wikiMenus started with a conversation in a dorm room. We hope that one day it emcompasses restraunts and menus from the entire world. Hopefully it informs the world and its restraunts on exactly what's good and what's not!</h4>
				</div>

			</div>


			<div class="row">

				<div class="small-6 columns text-center">
					<h1 class="employeeName">Danish Noorani</h1>
					<a href="#" data-reveal-id="DanishDescription"><img class= "employeePicture" id="employeePicture1" src="data/pics/Me2.jpg"> </a>
				</div>

				<div class="small-6 columns text-center">
					<h1 class="employeeName">Khurram Ghullamani</h1>
					<a href="#" data-reveal-id="KhurramDescription"><img class= "employeePicture" id="employeePicture1" src="data/pics/Khurram.png"> </a>
				</div>
				

			</div>
		

	

			<div class="row" id="meetTheTeam">

				<div class="small-6 columns text-center">
					<h1 class="employeeName">Angela Ding</h1>
					<a href="#" data-reveal-id="AngelaDescription"><img class= "employeePicture" id="employeePicture1" src="data/pics/AngelaDing.jpg"> </a>
				</div>

				<div class="small-6 columns text-center">
					<h1 class="employeeName">April Xu</h1>
					<a href="#" data-reveal-id="AprilDescription"><img class= "employeePicture" id="employeePicture1" src="data/pics/AprilXu.jpg"> </a>
				</div>
				

			</div>

		</div>
	</div>

	<div class="row" id="videoSection">
		<div class="small-10 small-centered columns">
			<div class="row">
				<div class="small-12 small-centered columns text-center">
					
					<h3 class="title">Check us out in action</h3>
					<h4 class="subTitle" id="videoSubTitle"> WikiMenus hopes to transform the dining experience. We want you get the most enjoyable meal that you can at a restraunt. We want to provide the restraunts with the data to provide the meals that their customers want. Look at how it works: </h4>
							
				</div>
			</div>
			<div class="flex-video">
		       <video autoplay loop muted id="bizVideo" src="data/videos/openTableVideo.mp4"></video>
			</div>

		</div>
	</div>

		
	<footer class="footer" id="contactSection">
		  <div class="row">
		    <div class="small-12 medium-3 large-4 columns">
		     <i class="fa fa-cutlery"></i>
		      <p>Own a business? Come work directly with us to have your most up to date menu on our site. We can help you add daily specials and you can use our data to serve the people what they want.</p>
		    </div>
		    <div class="small-12 medium-3 large-4 columns">
		     <i class="fa fa-credit-card"></i>
		      <p>We are a growing company looking for investors to help us grow our product! We have thousands of users and limitless ideas in the pipeline. Join the team and grow tih us!</p>
		    </div>
		    <div class="small-6 medium-3 large-2 columns">
		      <h4>Work With Us</h4>
		      <ul class="footer-links">
		        <li><a href="#">Potential Employee</a></li>
		        <li><a href="#">Restraunts</a></li>
		        <li><a href="#">Investors</a></li>
		        <li><a href="#">Blog</a></li>
		        <li><a href="#">FAQ's</a></li>
		      <ul>
		    </div>
		    <div class="small-6 medium-3 large-2 columns">
		      <h4>Follow Us</h4>
		      <ul class="footer-links">
		        <li><a href="#">GitHub</a></li>
		        <li><a href="#">Facebook</a></li>
		        <li><a href="#">Twitter</a></li>
		        <li><a href="#">Instagram</a></li>
		        <li><a href="#">Dribbble</a></li>
		      <ul>
		    </div>
		  </div>
	</footer>



	<div id="DanishDescription" class="reveal-modal" data-reveal>
	  <h2>Danish Noorani</h2>
	  <p class="lead">Sophmore in CS</p>
	  <p></p>
	  <a class="close-reveal-modal">&#215;</a>
	</div>
	<div id="KhurramDescription" class="reveal-modal" data-reveal>
	  <h2>Khurram Ghullamani</h2>
	  <p class="lead">Sophmore in CS</p>
	  <p></p>
	  <a class="close-reveal-modal">&#215;</a>
	</div>
	<div id="AngelaDescription" class="reveal-modal" data-reveal>
	  <h2>Angela Ding</h2>
	  <p class="lead">Sophmore in CS</p>
	  <p></p>
	  <a class="close-reveal-modal">&#215;</a>
	</div>
	<div id="AprilDescription" class="reveal-modal" data-reveal>
	  <h2>April Xu</h2>
	  <p class="lead">Sophmore in CS</p>
	  <p></p>
	  <a class="close-reveal-modal">&#215;</a>
	</div>

	<div id="Subscribe" class="reveal-modal" data-reveal>
		<div class="row" id="subcriptionSection">

		<div class="small-12 medium-6 columns">

			<h1 id="subscriptHeading">Stay informed!</h1>
			<h4 id="subscriptionSubHeading"> By subscribing, you will be the first to hear about future launches and company announcements. Feel free to also follow us on Twitter or LinkedIn.</h4>
			<div id="iconWrapper">
				<div class="icon" id="icon1">
					<i class="fa fa-facebook-square"></i>
				</div>

				<div class="icon" id="icon2">
					<i class="fa fa-twitter-square"></i>
				</div>
				<div class="icon" id="icon3">
					<i class="fa fa-linkedin-square"></i>
				</div>

				<div class="icon" id="icon4">
					<i class="fa fa-pinterest-square"></i>
				</div>		
			</div>


		</div>

		<div class="small-12 medium-6 columns">

				<h1 id="subscribeText">Subscribe to our mailing list</h1>
				<form>
				  <fieldset>
				    <legend>Subscribe to our mailing list</legend>

				    <label>Name
				      <input type="text" placeholder="John Doe">
				    </label>

				    <label>Email Address
				      <input type="text" placeholder="JDoe@gmail.com">
				    </label>

				     <label>Comments
        				<textarea placeholder="small-12.columns"></textarea>
      				</label>
      				<button type="submit" id="wikiButton">Submit</button>
				  </fieldset>
				</form>

		</div>

		<div class="">
			

		</div>
		
	</div>
	</div>

  <!-- <script src="./js/script.js"></script>
  // <script src="./lib/jquery-2.1.3.min/index.js"></script> -->
  <script src="./foundation/js/foundation.min.js"></script>
  <!--<script src="http://localhost:35729/livereload.js"></script>-->
</body>
</html>