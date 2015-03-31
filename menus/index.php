<?php
  
  require 'connect.php';

?>


<!DOCTYPE html>
<html>
<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
 <!--  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.1/css/foundation.min.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
  <script type="text/javascript" src="script.js"></script>
  <script type="text/javascript" src="app.js"></script>
  <script type="text/javascript" src="controller.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,500|Arvo:700' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 

</head>

<body ng-app="menuApp">

    <!-- <div class="row">

      <div class="small-8 columns">
        <input type="text" id="autocomplete" />
      </div>  

      {{names}}
      <br/>
      {{restaurants}}

    </div> -->

	<div ng-view class="row">

	<!-- 	<div class="row">

			<div class="small-8 columns">
				<input type="text" id="autocomplete" />
			</div>	

      {{names}}
      <br/>
      {{restaurants}} -->

		
		
	</div>

</body>
</html>


