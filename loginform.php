<?php
include "head.php";
require "db/connect.php"; 
require "functions/userfunctions.php";
?>

<div class="row" id="subcriptionSection">

	<div class="row">
		<div class="small-10 small-centered columns floating">
            <?php
            if(isset($_SESSION['username'])) {
                echo "<p>You're already logged in.</p>";
            } else {
            ?>
            <div class="small-12 medium-6 columns">
                
                <?php
				if(!empty($_POST)) {
					if(isset($_POST['usernameLogin'], $_POST['passwordLogin'])) {
						$username = trim($_POST['usernameLogin']);
						$password = trim($_POST['passwordLogin']);
						if(!empty($username) && !empty($password)) {				
							$password = md5($password);
							//echo $username , ' ', $password;
							if ($results = $db->query("SELECT username FROM users 
								WHERE username='$username' AND password='$password'")) {
								if($results->num_rows) {
									$_SESSION['username'] = $username;
									header('Location: userprofile.php?logged_in');
								}
								$results->free();
							}
						}
					}
				}
				?>
				<form method="post" id="loginForm">
					<fieldset>
                        <h3>Log In</h3>
                        <?php
                        
                        ?>
				    	<label for="usernameLogin">Username</label>
				    	  <input name="usernameLogin" id="usernameLogin" type="text">
						<label for="passwordLogin">Password</label>
						  <input name="passwordLogin" id="passwordLogin" type="password">
						<button type="submit" id="wikiButton">Log in</button>
					</fieldset>
				</form>
			</div>
			<div class="small-12 medium-6 columns">
				
				<?php
				if(!empty($_POST)) {
					if(isset($_POST['email'], $_POST['username'], $_POST['password'])) {
						$email = trim($_POST['email']);
						$username = trim($_POST['username']);
						$password = trim($_POST['password']);
						if(!empty($email) && !empty($username) && !empty($password)) {					
							$password = md5($password);
							$insert = $db->prepare("INSERT INTO users (email, username, password) 
								VALUES (?, ?, ?)");
							$insert->bind_param('sss', $email, $username, $password);
							if($insert->execute()) {
								header('Location: loginform.php?registered');
								die();
							}
						}
					}
				}
				?>
				<form method="post" id="registerForm">
					<fieldset>
                        <h3>Register</h3>
                        <?php
                        if(isset($_GET['registered'])) {
                            echo "<p>You have successfully registered for an account.
                                    You may now log in.</p>";
                        }
                        ?>
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
            <?php
            }
            ?>
		</div>
	</div>

</body>
</html>