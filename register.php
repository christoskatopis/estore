<?php 
	include('login-func.php');
	require_once('recaptchalib.php');
  $privatekey = "6Leo7CgTAAAAAF4IRE27XDhUdar3AKaILqb8e4RQ";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	/*CAPTCHA KEYS: Site key
Use this in the HTML code your site serves to users.
6Leo7CgTAAAAAByzuIDTnLU0CuSjKZFxTM7ErONi
Secret key
Use this for communication between your site and Google. Be sure to keep it a secret.
6Leo7CgTAAAAAF4IRE27XDhUdar3AKaILqb8e4RQ*/

?>
<div id="npost-area">

	<h1>Create a new account</h1>
	<?php
			
		if (isset($_POST["submit"])) {
		
			$myname = $_POST["myname"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$email = $_POST["email"];
			$creditcard=$_POST["creditcard"];
			
			if ($myname == "")
				echo "<div id='error'><p>Please insert your name.</p></div>";
			elseif (validate_username($username) != "OK") {
				$error = validate_username($username);
				echo "<div id='error'><p>$error</p></div>";
				$username = "";
			}
			elseif (validate_password($password) != "OK") {
				$error = validate_password($password);
				echo "<div id='error'><p>$error</p></div>";
				$password = "";
			}
			elseif (!validate_email($email)) {
				echo "<div id='error'><p>Please insert a valid e-mail</p></div>";
				$email = "";
			}
			elseif (!$resp->is_valid) {
            echo"<div id='error'><p>Please enter the number you see on your screen correctly</p></div>";
       }

            elseif (validate_credit($creditcard)!="OK") {
       	      $error=validate_credit($creditcard);
       	      echo "<div id='error'>$error</div>";
            }

			else {
				$query="SELECT * FROM users WHERE username='$username'";
				$result = mysql_query($query) or die(mysql_error());
			
				if (mysql_num_rows($result) > 0) {
					echo "<div id='error'><p>This username is taken.</p></div>";
					$username = "";
				}
				else {
				
					$date = date( 'Y-m-d H:i:s');
					$pass_changed=date('Y-m-d');
					
					$query = "INSERT INTO users (username, fullname, password, email, creditcard, date_registered, access, deleted,pass_changed) VALUES ('$username','$myname', '". md5($password)."','$email', '".md5($creditcard)."','$date', 0,0,'$pass_changed')";
					mysql_query($query) or die(mysql_error());
					
					$message = "Thank you for registering in e-store.com";
						
					mail ($email,'Chrisandjohns.gr Team', $message, 'From: johnk@123.gr');
	
					echo "<div id='confirmation'><p>You have successfuly created a new account. Please visit the <a href='index.php'>main page</a>and log in</p></div>";
				}
			}
			
		
		}
		else { 
			$myname = "";
			$username = "";
			$password = "";
			$email = "";
			$creditcard="";
		
		}
		
		
		
	?>
	<div class="gap"></div>
	
	
	<form action="index.php?action=register" method="POST" id="np-form">
		<div class="inp">
			<label for="myname">Name</label>
			<input type="text" name="myname" value="<?php echo $myname; ?>"/>
		</div>
		
		<div class="inp">
			<label for="username">Username <i>(username) (5-15 characters)</i></label>
			<input type="text" name="username" value="<?php echo $username; ?>"/>
		</div>
		
		<div class="inp">
			<label for="password">Password</label>
			<input type="password" name="password" value="<?php echo $password; ?>"/>
		</div>
		
		<div class="inp">
			<label for="email">e-mail</label>
			<input type="text" name="email" value="<?php echo $email; ?>"/>
		</div>
		<div class="inp">
			<label for="credit">Credit Card Number</label>
			<input type="text" name="creditcard" value="<?php echo $creditcard; ?>"/>
		</div>
			
        <?php
         $publickey = "6Leo7CgTAAAAAByzuIDTnLU0CuSjKZFxTM7ErONi"; 
          echo recaptcha_get_html($publickey); ?>
		<div style="margin-top:5px;">
			<input class="button" type="submit" name="submit" value="Sign in" id="submit"/>
		</div>
			</form>

</div>

