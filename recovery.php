<?php 

?>

<div id="npost-area">
<?php if ($_SESSION["unchanged"]=="yes"){
	echo "<div id='error'>Your password has expired. Please enter your e - mail to change your password</div>";} ?>
	<h1>User Password Recovery</h1>
	
	<div class="gap"></div>
	
	
	<?php
			
		if (isset($_POST["submit"])) {
		
			$email = $_POST["email"];
			
			
			if ($email == "")
				echo "<div id='error'><p>Please insert your email</p></div>";
			else {
				$query="SELECT * FROM users WHERE email='$email'";
				$result = mysql_query($query) or die(mysql_error());
			
				if (mysql_num_rows($result) == 0) {
					echo "<div id='error'><p>The e-mail you have given does not exist in our database</p></div>";
					$email = "";
				}
				else {
				
					$user = mysql_fetch_array($result);
					
					$username = $user["username"];
					$password = md5($email."recovery");
					$hashed_pass = md5($password);
					
					$message = "This is an email for user id recovery".
					"\n\nUsername: $username".
					"\nNew Password (sign in to change it): $password";
					mail ($email,'Googlareto Team',$message,'From: noreply@googlareto.gr');
					
					$query = "UPDATE users SET password = '$hashed_pass' WHERE username = '$username'";
					mysql_query($query) or die(mysql_error());
					
					echo "<div id='confirmation'><p>The recovery was succesfull. Your new credentials haw been sent to your email</p></div>";			
					
				}
			}
			
			
		
		}
		else {
		
			$email = "";
		}
		
		
		
	?>
	<div class="gap"></div>
	
	<form action="index.php?action=recovery" method="POST" id="np-form">		
		<div class="inp">
			<label for="email">Insert your e - mail</i></label>
			<input type="text" name="email" value="<?php echo $email; ?>"/>
		</div>

			
		<div style="margin-top:5px;">
			<input class="button" type="submit" name="submit" value="Recover my password" id="submit" />
		</div>
		
	</form>

</div>

