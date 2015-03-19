<?php
require "db/connect.php"; 
require "functions/userfunctions.php";
?>

<div class="row" id="subcriptionSection">

	<div class="small-12 medium-6 columns">
		<h1 id="subscribeText">Register</h1>		
		<?php
		if(!empty($_POST)) {
			if(isset($_POST['email'], $_POST['username'], $_POST['password'])) {
				$email = trim($_POST['email']);
				$username = trim($_POST['username']);
				$password = trim($_POST['password']);
				if(!empty($email) && !empty($username) && !empty($password)) {
					echo "<p>You have successfully registered for an account.
					You may now log in on the right.";
					$password = md5($password);
					$insert = $db->prepare("INSERT INTO users (email, username, password) 
						VALUES (?, ?, ?)");
					$insert->bind_param('sss', $email, $username, $password);
					if($insert->execute()) {
						header('Location: loginform.php?');
						die();
					}
				}
			}
		}
		?>
		<form  action="" method="post" id="registerForm">
			<fieldset>
				<legend>New user? Register for an account</legend>
				<label for="email">Email Address</label>
					<input name="email" id="email" type="email">		    
				<label for="username">Username</label>
					<input name="username" id="username" type="text">				    
				<label for="password">Password</label>
					<input name="password" id="password" type="password">			    
				<button type="submit" id="wikiButton">Register</button>
			</fieldset>
		</form>
	</div>

	<div class="small-12 medium-6 columns">
		<h1 id="subscribeText">Log In</h1>
		<form action="" method="" id="loginForm">
			<fieldset>
		    	<legend>Existing user? Log in here</legend>
		    	<label for="usernameLogin">Username</label>
		    	  <input name="usernameLogin" id="usernameLogin" type="text">
				<label for="passwordLogin">Password</label>
				  <input name="passwordLogin" id="passwordLogin" type="password">
				<button type="submit" id="wikiButton">Log in</button>
			</fieldset>
		</form>
	</div>

</div>